<?php
require_once __DIR__ . '/../../vendor/autoload.php';

use Mollie\Api\Exceptions\ApiException;
use Mollie\Api\MollieApiClient;

require __DIR__ . '/../../services/orderservice.php';

class PaymentController
{
    private $orderService;
    private $mollie;
    public function __construct()
    {
        $this->orderService = new OrderService();
        $this->mollie = new MollieApiClient();
        $this->mollie->setApiKey('test_5qajcu3h8GHTq5CS68PaAWTsNfPpxh');
    }

    public function index()
    {
        try {
            $method = $this->mollie->methods->get(\Mollie\Api\Types\PaymentMethod::IDEAL, ["include" => "issuers"]);
            $issuers = $method->issuers;
            echo json_encode($issuers);
        } catch (Exception $e) {
            echo $e->getMessage();
        }


    }

}

?>