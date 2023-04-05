<!-- <?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/editorservice.php';

class FestivalController extends Controller {
    private $editorService;

    public function __construct(){
        $this->editorService = new EditorService();
    }

    public function index(){
        $contents= $this->editorService->getAll();
        require __DIR__ . '/../views/festival/overview.php';
    }

    public function dance(){
        require __DIR__ . '/../views/festival/dance.php';
    }

    public function history(){
        require_once __DIR__ . '/../services/tourservice.php';
        $tourService = new TourService();
        $tours = $tourService->getAll();
        require __DIR__ . '/../views/festival/history.php';
    }

    public function kids(){
        require __DIR__ . '/../views/festival/kids.php';
    }

    public function yummy(){
        require_once __DIR__ . '/../services/restaurantservice.php';
        $restaurantService = new RestaurantService();
        $restaurants = $restaurantService->getBasicInfo();
        require __DIR__ . '/../views/festival/yummy.php';
    }
}
?> -->