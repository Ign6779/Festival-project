<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/tourservice.php';

class TourController extends Controller {
    private $tourService;

    public function __construct() {
        $this->tourService = new TourService();
    }

    public function index() {
        require __DIR__ . '/../views/admin/tours/index.php';
    }

    public function addTourForm() {
        require __DIR__ . '/../views/admin/tours/addtour.php';
    }

    public function addTour() {
        require_once __DIR__ . '/../models/tour.php';

        if (isset($_POST['addtour'])) {
            $tour = new Tour();
            $tour->setDate(htmlspecialchars($_POST['date']));
            $tour->setStartTime(htmlspecialchars($_POST['starttime']));
            $tour->setEndTime(htmlspecialchars($_POST['endtime']));
            $tour->setSeats(htmlspecialchars($_POST['seats']));
            $tour->setPrice(htmlspecialchars($_POST['price']));
            $tour->setLanguage(htmlspecialchars($_POST['language']));
            $this->tourService->createTour($tour);
        }

        header('Location: /tour');
    }

    public function editTourForm() {
        if (isset($_GET['tourId'])) {
            $id = htmlspecialchars($_GET['tourId']);
            $tour = $this->tourService->getById($id);
            require __DIR__ . '/../views/admin/tours/edittour.php';
        } else {
            echo 'something went wrong';
        }
    }

    public function updateTour() {
        if (isset($_POST['updateTour']) && isset($_GET['tourId'])) {
            $tour = new Tour();
            $tour->setId(htmlspecialchars((int)$_GET['tourId']));
            $tour->setDate(htmlspecialchars($_POST['date']));
            $tour->setStartTime(htmlspecialchars($_POST['starttime']));
            $tour->setEndTime(htmlspecialchars($_POST['endtime']));
            $tour->setSeats(htmlspecialchars($_POST['seats']));
            $tour->setPrice(htmlspecialchars($_POST['price']));
            $tour->setLanguage(htmlspecialchars($_POST['language']));
            $tour->setEventid(htmlspecialchars($_POST['eventId']));
            $this->tourService->updateTour($tour);
        } else {
            echo "something has gone wrong";
        }
        header('Location: /tour');
    }
}