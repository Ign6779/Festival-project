<?php
        $name = "";
        $description = "";
        $images = [];
        $song = "";
        $topSong = "";
    foreach ($artists as $artist) {
        if ($artist->getId() == $idForDetailPage) {
            $name = $artist->getName();
            $description = $artist->getDescription();
            $images = array_map(function($artist) {
                return $artist->getImages();
            }, $artists);
            $song = $artist->getSong();
            $topSong = $artist->getTopSong();
        }
    }
?>
<div class="text-center container-fluid" id="detailPage">
    <div class="text-center container" id="detail-page-block">
        <h1 class="artist-name"><?php echo $name ?></h1>
        <p class="artist-description"><?php echo $description ?></p>
          <?php
        //   $index = 1;
        //   $imgsrc = "";
        //   foreach ($images as $image) {
        //     $imgsrc = $image->getName();
        //     echo '<div id="polaroid"' . ($index) . '"><img class="polaroid-pic" src="/img/' . $image1->getName() . '" alt="pic' . $index . '">';
        //         }
            ?>

        <div class="artist-songs" id="top3songs">
          <div><p>Top Song: <?php echo $topSong ?></p>
        </div>
        <!-- MEDIA PLAYER -->
        <div class="audio-player">
          <iframe width="auto" height="100px" scrolling="no" frameborder="no" allow="autoplay" src=<? echo $song?>></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"></div>
        </div>
    </div>
</div>