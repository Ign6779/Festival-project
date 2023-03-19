<!-- detail pages 1
<div class="text-center container-fluid" id="detailPage">
    <h1 class="Dance-Title"> Detail page 1 </h1>
    <div class="text-center container" id="detail-page-block">
        <h1 class="artist-name">Hardwell</h1>
        <p class="artist-description">description</p>
        <div class="artist-polaroids">
          <div class="polaroid1"><img src="" alt="pic1">
              <div class="caption"></div>
          </div>
          <div class="polaroid2"><img src="" alt="pic2">
              <div class="caption"></div>
          </div>
          <div class="polaroid3"><img src="" alt="pic3">
              <div class="caption"></div>
          </div>
        </div>

        <div class="artist-songs" id="top3songs">
            <img src="" alt="song1">
            <img src="" alt="song2">
            <img src="" alt="song3">
        </div>
        <div class="audio-player">
        <iframe width="auto" height="100" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/532815123&color=%23404048&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/user-673380444" title="Sidney" target="_blank" style="color: #cccccc; text-decoration: none;">Sidney</a> · <a href="https://soundcloud.com/user-673380444/ntjam-rosie-thinkin-about-you" title="Ntjam Rosie Thinkin&#x27; About You" target="_blank" style="color: #cccccc; text-decoration: none;">Ntjam Rosie Thinkin&#x27; About You</a></div>
        </div>
    </div>
</div> -->


<?php
// Define PHP variables
$artistName = "Hardwell";
$artistDescription = "“Throughout his expansive career as a successful DJ, producer, remixer, label boss, filmmaker, and philanthropist, former 2 x World No.1 DJ, Hardwell has carved out a long-lasting legacy within the electronic music world.”<small><br>https://www.djhardwell.com/biography</small>";
$song1Name = "Power";
$song1ImgSrc = "/img/hardwell-song-1.png";
$song1Streams = "104,227,216 streams on spotify";
$song2Name = "Don't let me down";
$song2ImgSrc = "/img/hardwell-song-2.png";
$song2Streams = "60,046,188 streams on spotify";
$song3Name = "Bella Ciao";
$song3ImgSrc = "/img/hardwell-song-3.png";
$song3Streams = "87,397,129 streams on spotify";
$audioTitle = "Power - Hardwell";
$audioSrc = "https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/343304675&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true";
$audioSubtitle = "<a href='https://soundcloud.com/freedownloadsmusic' title='Hardwell' target='_blank' style='color: #cccccc; text-decoration: none;'>Hardwell</a> · <a href='https://soundcloud.com/freedownloadsmusic/power-original-mix' title='Hardwell &amp; KSHMR - Power' target='_blank' style='color: #cccccc; text-decoration: none;'>Hardwell &amp; KSHMR - Power (Original Mix)[FREE DOWNLOAD]</a>";

// Output the HTML code with PHP variables
echo "<div class='text-center container-fluid' id='detailPage'>
        <div class='text-center container' id='detail-page-block'>
            <h1 class='artist-name'>$artistName</h1>
            <p class='artist-description'>$artistDescription</p>
            <div id='polaroid1' ><img class='polaroid-pic' src='/img/hardwell-pic-1.png' alt='pic1'>
                <div class='caption'></div>
            </div>
            <div id='polaroid2'><img class='polaroid-pic' src='/img/hardwell-pic-2.png' alt='pic2'>
                <div class='caption'></div>
            </div>
            <div id='polaroid3'><img class='polaroid-pic' src='/img/hardwell-pic-3.png' alt='pic3'>
                <div class='caption'></div>
            </div>
            <div class='artist-songs' id='top3songs'>
                <div><img src='$song1ImgSrc' alt='$song1Name'><p>$song1Name</p><small>$song1Streams</small></div>
                <div><img src='$song2ImgSrc' alt='$song2Name'><p>$song2Name</p><small>$song2Streams</small></div>
                <div><img src='$song3ImgSrc' alt='$song3Name'><p>$song3Name</p><small>$song3Streams</small></div>
            </div>
            <div class='audio-player'>