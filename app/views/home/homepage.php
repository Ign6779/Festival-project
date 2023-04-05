<? include __DIR__ . '/../header.php';
$contentById = [];
try{
    foreach ($contents as $content) {
        $contentById[$content->getId()] = $content->getContent();
    }
    if (empty($contentById)){
        echo '<p style="color: red; font-weight: bold;">No data in content table in database</p>';
    }
} catch (PDOException $e) {
    echo $e;
}
?>

<!-- Header of the homepage -->
<section class="homepage-header">
    <div class="homepage-picture">
        <img src="/img/homepage-main.png" alt="Haarlem-overview" class="img-responsive">
        <h1 id="homepage-welcome">Welcome to Haarlem</h1>
    </div>
</section>
<section class="homepage-context">

    <h2><?php echo html_entity_decode($contentById[1]); ?></h2>
    <br><a class="btn-red" href="festival">View Festival Activities</a>
</section>

<!-- History section -->
<div class="homepage-history">
    <div>
        <h2>Haarlem's History</h2>
        <img id="homepage-history-1" src="/img/homepage-history-1.png" />
    </div>
    <div>
        <img id="homepage-history-2" src="/img/homepage-history-2.png" />
        <img id="homepage-history-3" src="/img/homepage-history-3.png" />
        <img id="homepage-history-4" src="/img/homepage-history-4.png" />
    </div>
    <div id="homepage-history-text">
        <h3><?php echo html_entity_decode($contentById[2]); ?></h3>
    </div>

</div>

<!-- Food section -->
<section class="homepage-food">
    <div>
        <h3 class="white-text"><?php echo html_entity_decode($contentById[3]); ?></h3>
    </div>
    <div id="homepage-food-mid-section">
        <h2 id="for-foodies-text">For Foodies!</h2>
        <img src="/img/food-icon.png" id="food-icon" alt="food and drink" />
    </div>
    <div>

    </div>
</section>

<!-- Music section -->
<div class="music-grid">
    <section class="homepage-music">
        <h2 id="homepage-music-h2">Music</h2>
        <img src="/img/homepage-music.png" alt="Music-Artist" width=95%>
        <h3><?php echo html_entity_decode($contentById[4]); ?></h3>
    </section>

    <!-- Theatre section -->
    <section class="homepage-theatre">
        <h2>Theatre</h2>
        <img src="/img/homepage-theatre.png" alt="Theatre" width=95%>
        <h3><?php echo html_entity_decode($contentById[5]); ?></h3>
    </section>

    <!-- Museums section -->
    <section class="homepage-museums">
        <h2>Museums</h2>
        <img src="/img/homepage-museums.png" alt="Museums" width=95%>
        <h3><?php echo html_entity_decode($contentById[6]); ?>
        </h3>
    </section>
</div>

<!-- Festival section -->
<section class="homepage-festival">
    <h2 id="homepage-check-festival-text">Check out the festival here!</h2>
    <a class="btn-purple" href="festival" id="homepage-check-festival-button">See festival events</a>
</section>

<!-- Mobile section -->
<section class="homepage-mobile">
    <h2>Visit us on mobile.</h2>
    <h3> Scan the QR code with your phone.</h3>
</section>
<!-- instagram feed -->
<div class="homepage-instagram">
    <h2 class="ig-title">Keep up with our instragram below!</h2>
</div>
<?php
// query the user media

$fields = "id,caption,media_type,media_url,permalink,thumbnail_url,timestamp,username";
$token = "IGQVJXbW56Y0RkNW5WQjNzSkt3amVrMllOeFcwY1lqU0RMYk1JOHNqSEVoX0lLS0YxczRWLURPQUVmS0VPMDM4dGNhU0drTDl4TUJTR3dSX19pSVMxTWZAfeHREQTAxREt5WEpFYXpqS2tGTmNaZADFSSQZDZD";
$limit = 10;

$json_feed_url = "https://graph.instagram.com/me/media?fields={$fields}&access_token={$token}&limit={$limit}";
$json_feed = @file_get_contents($json_feed_url);
if ($json_feed) {
$contents = json_decode($json_feed, true, 512, JSON_BIGINT_AS_STRING);

echo "<div class='ig_feed_container'>";
foreach ($contents["data"] as $post) {

    $username = isset($post["username"]) ? $post["username"] : "";
    $caption = isset($post["caption"]) ? $post["caption"] : "";
    $media_url = isset($post["media_url"]) ? $post["media_url"] : "";
    $permalink = isset($post["permalink"]) ? $post["permalink"] : "";
    $media_type = isset($post["media_type"]) ? $post["media_type"] : "";

    echo "
            <div class='ig_post_container'>
                <div>";

    if ($media_type == "VIDEO") {
        echo "<video controls style='width:100%; display: block !important;'>
                            <source src='{$media_url}' type='video/mp4'>
                            Your browser does not support the video tag.
                        </video>";
    } else {
        echo "<img src='{$media_url}' />";
    }

    echo "</div>
                <div class='ig_post_details'>
                    <div>
                        <strong>@{$username}</strong> {$caption}
                    </div>
                    <div class='ig_view_link'>
                        <a href='{$permalink}' target='_blank'>View on Instagram</a>
                    </div>
                </div>
            </div>
        ";
}
echo "</div>";
} else{
    echo '<a href="https://www.instagram.com/hfest2023/" target="_blank"style="display: block; text-align: center; font-size: 24px;">Click here to see our Instagram!</a>';
}

    ?>

<!-- pointer to the top of the page -->
<div class="pointer-to-top">
    <a class="arrow-up" href="#top">&#8593</a>
</div>



<?php
include __DIR__ . '/../footer.php';
?>