<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/historyservice.php';

class TestController extends Controller {
    private $historyService;

    public function __construct() {
        $this->historyService = new HistoryService();
    }
    public function index() {
        $tours = $this->historyService->getAll();
        require __DIR__ . '/../views/festival/test.php';
    }
}