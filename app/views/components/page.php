<!-- detail pages 1 -->
<div class="text-center container-fluid" id="detailPage">
  <h1 class="Dance-Title"> Detail page 1 </h1>
  <div class="text-center container" id="detail-page-block">

    <h1 class="artist-name">
      <?php echo $name ?>
    </h1>
    <p class="artist-description">
      <?php echo $description ?>
    </p>
    <?php
    $index = 1;
    $imgsrc = "";
    foreach ($images as $image) {
      $imgsrc = $image->getName();
      echo '<div id="polaroid' . $index . '"><img class="polaroid-pic" src="' . $imgsrc . '" alt="pic' . $index . '"></div>';
      $index++;
    }

    ?>

    <div class="artist-songs" id="top3songs">
      <img src="" alt="song1">
      <img src="" alt="song2">
      <img src="" alt="song3">
    </div>
    <!-- MEDIA PLAYER -->
    <div class="audio-player">
      <iframe width="auto" height="100" scrolling="no" frameborder="no" allow="autoplay"
        src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/532815123&color=%23404048&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>
      <div
        style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;">
        <a href="https://soundcloud.com/user-673380444" title="Sidney" target="_blank"
          style="color: #cccccc; text-decoration: none;">Sidney</a> · <a
          href="https://soundcloud.com/user-673380444/ntjam-rosie-thinkin-about-you"
          title="Ntjam Rosie Thinkin&#x27; About You" target="_blank"
          style="color: #cccccc; text-decoration: none;">Ntjam Rosie Thinkin&#x27; About You</a></div>
    </div>
  </div>
</div>