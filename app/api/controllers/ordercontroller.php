<?php
require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../services/orderservice.php';
require_once __DIR__ . '/../../services/eventservice.php';
require_once __DIR__ . '/../../services/userservice.php';
require_once __DIR__ . '/../../services/ticketorderservice.php';


class OrderController
{
    private $orderService;
    private $eventService;
    private $userService;
    private $ticketOrdeService;

    public function __construct()
    {
        $this->orderService = new OrderService();
        $this->eventService = new EventService();
        $this->userService = new UserService();
        $this->ticketOrdeService = new TicketOrderService();
    }

    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $orders = $this->orderService->getAll();
            echo json_encode($orders);
        }
    }

    public function test()
    {
        if (isset($_GET['orderId'])) {
            $id = htmlspecialchars($_GET['orderId']);
            $order = $this->orderService->getById($id);
            $user = $this->userService->getUserById($order->getUserId());
            $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
            $pdf->SetCreator(PDF_CREATOR);
            $pdf->SetAuthor('Haarlem festival');
            $pdf->SetTitle('Invoice');
            $pdf->SetSubject('Invoice');
            $pdf->SetKeywords('TCPDF, PDF, invoice, order, items');
            $cart = array();
            $orderItems = $this->ticketOrdeService->getItemsByOrderId($order->getId());
            foreach ($orderItems as $orderItem) {
                if (in_array($orderItem->getTicketId(), array_keys($cart))) {
                    $cart[$orderItem->getTicketId()] += 1;

                } else {
                    $cart[$orderItem->getTicketId()] = 1;
                }
            }
            $pdf->SetMargins(15, 15, 15);
            $pdf->AddPage();
            $pdf->SetFont('dejavusans', 'B', 16);
            $pdf->Cell(0, 15, 'Invoice', 0, 1, 'C');
            $pdf->SetFont('dejavusans', '', 12);
            $pdf->Cell(0, 10, 'Invoice Number: ' . $order->getId(), 0, 1);
            $pdf->Cell(0, 10, 'Invoice Date: ' . date('Y-m-d'), 0, 1);
            $pdf->Cell(0, 10, 'Customer Name: ' . $user->getUsername(), 0, 1);
            $pdf->Cell(0, 10, 'Customer Email: ' . $user->getEmail(), 0, 1);
            $pdf->SetFont('dejavusans', 'B', 12);
            $pdf->Cell(0, 10, 'Invoice Items:', 0, 1);
            $pdf->SetFont('dejavusans', 'B', 12);
            $pdf->Cell(140, 10, 'Item Title', 1, 0, 'C');
            $pdf->Cell(20, 10, 'Quantity', 1, 0, 'C');
            $pdf->Cell(20, 10, 'Price', 1, 1, 'C');
            $pdf->SetFont('dejavusans', '', 12);
            $total = 0;
            foreach ($cart as $itemId => $quantity) {
                $event = $this->eventService->getById($itemId);
                $pdf->Cell(140, 10, $event->getTitle(), 1, 0);
                $pdf->Cell(20, 10, $quantity, 1, 0, 'C');
                $pdf->Cell(20, 10, '€' . number_format($event->getPrice() * $quantity, 2), 1, 1, 'C');
                $total += $event->getPrice() * $quantity;
            }
            $pdf->SetFont('dejavusans', 'B', 12);
            $pdf->Cell(120, 10, 'Total:', 0, 0, 'R');
            $pdf->SetFont('dejavusans', '', 12);
            $pdf->Cell(60, 10, '€' . number_format($total, 2), 0, 1, 'C');

            $tempDir = sys_get_temp_dir() . '/invoice'; // temporary directory path
            if (!is_dir($tempDir)) {
                mkdir($tempDir, 0777, true); // create the temporary directory if it doesn't exist
            }
            $pdfPath = $tempDir . '/invoice_' . $order->getId() . '.pdf'; // path for temporary PDF file
            $pdf->Output($pdfPath, 'F'); // save PDF to temporary file
            $pdfUrl = 'http://localhost/api/order/download?orderId=' . $order->getId(); // URL to download the PDF
            echo json_encode(array('pdfUrl' => $pdfUrl)); // send the PDF URL as JSON response
        }
    }

    public function download()
    {
        if (isset($_GET['orderId'])) {
            $orderId = $_GET['orderId'];
            $pdfPath = sys_get_temp_dir() . '/invoice/invoice_' . $orderId . '.pdf'; // path to the temporary PDF file
            if (file_exists($pdfPath)) {
                header('Content-Type: application/pdf');
                header('Content-Disposition: attachment; filename="invoice_' . $orderId . '.pdf"');
                readfile($pdfPath); // send the contents of the PDF file as download
                unlink($pdfPath); // delete the temporary PDF file
                exit;
            }
        }
    }
}