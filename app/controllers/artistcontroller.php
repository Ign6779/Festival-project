<?php
require __DIR__ . '/controller.php';
require __DIR__ . '/../services/artistservice.php';

class ArtistController extends Controller
{
    private $artistService;

    function __construct()
    {
        $this->artistService = new ArtistService();
    }

    public function index()
    {
        $artists = $this->artistService->getAll();
        $artist = $this->artistService->getOne($id);
        require __DIR__ . '/../views/admin/artists/index.php';
        require_once __DIR__ . '/../views/components/page.php';
        require_once __DIR__ . '/../views/festival/dance.php';
    }

    public function addArtistForm()
    {
        require __DIR__ . '/../views/admin/artists/addartist.php';
    }

    public function addArtist()
    {
        if (isset($_POST['addartist'])) {
            $name = htmlspecialchars($_POST['artistname']);
            $description = htmlspecialchars($_POST['artistdescription']);
            $song = htmlspecialchars($_POST['artistSong']);
            $topSong = htmlspecialchars($_POST['artisttopsong']);
            $this->artistService->insertArtist($name, $description, $song, $topSong);
            $artist = $this->artistService->getByname($name);
            for ($x = 0; $x < count($_FILES['images']['name']); $x++) {
                $imageName = htmlspecialchars($_FILES['images']['name'][$x]);
                $this->artistService->insetImage($artist->getId(), $imageName);
                $tmp_img = htmlspecialchars($_FILES['images']['tmp_name'][$x]);
                $destination = 'img/' . $_FILES['images']['name'][$x];
                move_uploaded_file($tmp_img, $destination);
            }
            $this->index();
        }
    }

    public function editArtistForm()
    {
        if (isset($_GET['artistId'])) {
            $id = htmlspecialchars($_GET['artistId']);
            $artist = $this->artistService->getOne($id);
            require __DIR__ . '/../views/admin/artists/editartist.php';
        }
    }

    public function updateArtist()
    {
        if (isset($_POST['updateartist'])) {
            $count = 0;
            $id = htmlspecialchars($_GET['artistid']);
            $name = htmlspecialchars($_POST['artistname']);
            $description = htmlspecialchars($_POST['artistdescription']);
            $song = htmlspecialchars($_POST['artistSong']);
            $topSong = htmlspecialchars($_POST['artisttopsong']);
            $this->artistService->update($id, $name, $description, $song, $topSong);
            $artist = $this->artistService->getOne($id);
            foreach ($artist->getImages() as $image) {
                $imageName = htmlspecialchars($_FILES['imagesup']['name'][$count]);
                $this->artistService->updateImage($artist->getId(), $image->getId(), $imageName);
                $tmp_img = htmlspecialchars($_FILES['imagesup']['tmp_name'][$count]);
                $destination = 'img/' . $_FILES['imagesup']['name'][$count];
                move_uploaded_file($tmp_img, $destination);
                $count++;
            }
            $this->index();
        }
    }
}


?>