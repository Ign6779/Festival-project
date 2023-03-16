<? include __DIR__ . '/../header.php' ?>



<!-- pointer to the top of the page -->
<div class="pointer-to-top">
<a href="#top">&#8593</a>
</div>

<!-- Header of the homepage -->
<section class="homepage-header">
    <div class="homepage-picture">
    <img src="/img/homepage-main.png" alt="Haarlem-overview" class="img-responsive">
    <h1 id="homepage-welcome">Welcome to Haarlem</h1>
</div>
</section>
<section class="homepage-context">

<h3>Welcome to the city of endless possibilities: A charming historic district, fascinating museums, unique <br>
            shops, a wide variety of dining options, and a lovely beach,
            <br>
        </h3>
        <h2>Haarlem really has it all.</h2>
        <br><a class="btn-red" href="festival/overview">View Festival Activities</a>
    </section>

<!-- History section -->
<div class="homepage-history">
    <div>
        <h2>Haarlem's History</h2>
        <img id = "homepage-history-1" src="/img/homepage-history-1.png"/>
    </div>
    <div>
        <img id="homepage-history-2" src="/img/homepage-history-2.png"/>
        <img id="homepage-history-3"src="/img/homepage-history-3.png"/>
        <img id="homepage-history-4"src="/img/homepage-history-4.png"/>
    </div>
    <div id="homepage-history-text">
        <h3>Haarlem has been an important Dutch city since 1245, functioning initially as a shipping sea port.
            The majority of Haarlem's old gorgeous buildings have stayed intact and are what make the atmosphere in
            Haarlem truly amazing. Well known for its beer making, Haarlem is home to the wonderful Jopenkerk and
            windmill de Adriaan from 1779.</h3>
    </div>

</div>

<!-- Food section -->
<section class="homepage-food">
    <div>
        <h3 class="white-text">No matter when, dining in Haarlem is guaranteed to be an incredible experience.
            Not only does Haarlem have some of the best restaurants with quality food, the atmosphere of the city is
            what makes it all the more special. </h3>
    </div>
    <div id="homepage-food-mid-section">
        <h2 id="for-foodies-text">For Foodies!</h2>
        <img src="/img/food-icon.png" id="food-icon" alt="food and drink"/>
    </div>
    <div>
        <h1>pls work</h1>
    </div>
</section>

<!-- Music section -->
<div class="music-grid">
    <section class="homepage-music">
        <h2 id="homepage-music-h2">Music</h2>
        <img src="/img/homepage-music.png" alt="Music-Artist" width=95%>
        <h3>The city of Haarlem comes alive with music in July. The days are longer and warmer, making it the ideal
            time to go see both well-known and unknown Dutch musicians play for the delightz of the crowd.</h3>
    </section>

        <!-- Theatre section -->
        <section class="homepage-theatre">
            <h2>Theatre</h2>
            <img src="/img/homepage-theatre.png" alt="Theatre" width=95%>
            <h3>When it comes to entertainment, Haarlem is perfect. Theatres such as: Het Kennenmer Theatre, and
                Philharmonie will guarantee you won't leave Haarlem disappointed.
                Don't miss out on the beautiful dramas and the high quality productions!</h3>
        </section>

        <!-- Museums section -->
        <section class="homepage-museums">
            <h2>Museums</h2>
            <img src="/img/homepage-museums.png" alt="Museums" width=95%>
            <h3>If you want to see some amazing historical artefacts and you want to learn their history, then come to
                Haarlem's museums!<br>Some great choices include:
                <br>&#x2022;The corrie ten boom house
                <br>&#x2022;Teylers Museum
                <br>&#x2022;Frans hals museum
                <br>&#x2022;Museum van de geest
            </h3>
        </section>
    </div>

<!-- Festival section -->
<section class="homepage-festival">
    <h2 id="homepage-check-festival-text">Check out the festival here!</h2>
    <a class="btn-purple" href="festival/overview" id="homepage-check-festival-button">See festival events</a>
</section>

<!-- Mobile section -->
<section class="homepage-mobile">
    <h2>Visit us on mobile.</h2>
    <h3> Scan the QR code with your phone.</h3>
</section>
<!-- instagram feed -->
<div class="homepage-instagram">
    <h2 class="ig-title">See our instragram below!</h2>
</div>
<?php 
// query the user media
$fields = "id,caption,media_type,media_url,permalink,thumbnail_url,timestamp,username";
$token = "IGQVJXMnVlWW1TNjNTX1JEM1VCVnhWQmdObzlkZAWhoam9nWGs2em5EUXNNeWZApRGxEUzhCeHBHZAmdvQ0ZAGNlBuRW84NU9fOUpxR3pZARE5JN005MWdYMml1c1VTNktfTW02SWZAjNFBtOGhjUUx0eE5OSAZDZD";
$limit = 10;

$json_feed_url="https://graph.instagram.com/me/media?fields={$fields}&access_token={$token}&limit={$limit}";
$json_feed = @file_get_contents($json_feed_url);
$contents = json_decode($json_feed, true, 512, JSON_BIGINT_AS_STRING);

echo "<div class='ig_feed_container'>";
    foreach($contents["data"] as $post){
        
        $username = isset($post["username"]) ? $post["username"] : "";
        $caption = isset($post["caption"]) ? $post["caption"] : "";
        $media_url = isset($post["media_url"]) ? $post["media_url"] : "";
        $permalink = isset($post["permalink"]) ? $post["permalink"] : "";
        $media_type = isset($post["media_type"]) ? $post["media_type"] : "";
        
        echo "
            <div class='ig_post_container'>
                <div>";

                    if($media_type=="VIDEO"){
                        echo "<video controls style='width:100%; display: block !important;'>
                            <source src='{$media_url}' type='video/mp4'>
                            Your browser does not support the video tag.
                        </video>";
                    }

                    else{
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
echo "</div>"
?>





<?php
include __DIR__ . '/../footer.php';
?>
