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

}