<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/orderservice.php';

class OrderController extends Controller
{
    private $orderService;

    public function __construct()
    {
        $this->orderService = new OrderService();
    }

    public function index()
    {
        require __DIR__ . '/../views/admin/order/index.php';
    }

    public function editOrderForm()
    {
        if (isset($_GET['orderId'])) {
            $id = htmlspecialchars($_GET['orderId']);
            $order = $this->orderService->getById($id);
            require __DIR__ . '/../views/admin/order/editorder.php';
        } else {
            echo 'something went wrong';
        }
    }

    public function updateOrder()
    {
        if (isset($_POST['updateOrder'])) {
            $order = new Order();
            $id = htmlspecialchars($_GET['orderId']);
            $order = $this->orderService->getById($id);
            $order->setStatus(htmlspecialchars($_POST['status']));

            $this->orderService->updateOrder($order);

        } else {
            echo "something has gone wrong";
        }
        $this->index();
    }

    // public function test()
    // {
    //     $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    //     $pdf->SetCreator(PDF_CREATOR);
    //     $pdf->SetAuthor('Haarlem festival');
    //     $pdf->SetTitle('Invoice');
    //     $pdf->SetSubject('Invoice');
    //     $pdf->SetKeywords('TCPDF, PDF, invoice, order, items');
    //     $cart = $_SESSION["cart"];
    //     $pdf->SetMargins(15, 15, 15);
    //     $pdf->AddPage();
    //     $pdf->SetFont('dejavusans', 'B', 16);
    //     $pdf->Cell(0, 15, 'Invoice', 0, 1, 'C');
    //     $pdf->SetFont('dejavusans', '', 12);
    //     $pdf->Cell(0, 10, 'Invoice Number: ' . $order->getId(), 0, 1);
    //     $pdf->Cell(0, 10, 'Invoice Date: ' . date('Y-m-d'), 0, 1);
    //     $pdf->Cell(0, 10, 'Customer Name: ' . $user->getUsername(), 0, 1);
    //     $pdf->Cell(0, 10, 'Customer Email: ' . $user->getEmail(), 0, 1);
    //     $pdf->SetFont('dejavusans', 'B', 12);
    //     $pdf->Cell(0, 10, 'Invoice Items:', 0, 1);
    //     $pdf->SetFont('dejavusans', 'B', 12);
    //     $pdf->Cell(140, 10, 'Item Title', 1, 0, 'C');
    //     $pdf->Cell(20, 10, 'Quantity', 1, 0, 'C');
    //     $pdf->Cell(20, 10, 'Price', 1, 1, 'C');
    //     $pdf->SetFont('dejavusans', '', 12);
    //     $total = 0;
    //     foreach ($cart as $itemId => $quantity) {
    //         $event = $this->eventService->getById($itemId);
    //         $pdf->Cell(140, 10, $event->getTitle(), 1, 0);
    //         $pdf->Cell(20, 10, $quantity, 1, 0, 'C');
    //         $pdf->Cell(20, 10, '€' . number_format($event->getPrice() * $quantity, 2), 1, 1, 'C');
    //         $total += $event->getPrice() * $quantity;
    //     }
    //     $pdf->SetFont('dejavusans', 'B', 12);
    //     $pdf->Cell(120, 10, 'Total:', 0, 0, 'R');
    //     $pdf->SetFont('dejavusans', '', 12);
    //     $pdf->Cell(60, 10, '€' . number_format($total, 2), 0, 1, 'C');
    // }
}