<?php
include __DIR__ . '/../header.php';
?>
<!-- top section with title and picture carasol -->
<div class="text-center container-fluid" id="top-section">
    <h1 class="Dance-Title"> Dance! </h1>
    <div class="text-center container" id="carousel">
        <ul class="list">
            <li class="hide"><img src="/img/dance-carousel-1.jpg"></li>
            <li class="prev"><img src="/img/dance-carousel-2.jpg"></li>
            <li class="act"><img src="/img/dance-carousel-3.jpg"></li>
            <li class="next"><img src="/img/dance-carousel-4.jpg"></li>
            <li class="next new-next"><img src="/img/dance-carousel-5.webp"></li>
        </ul>
    </div>

<div class="swipe"></div>
</div>

<!-- detail pages 1 -->
<div class="text-center container-fluid" id="detailPage">
    <h1 class="Dance-Title"> Detail page 1 </h1>
    <div class="text-center container" id="detail-page-block">
        <h1 class="artist-name">Hardwell</h1>
        <p class="artist-description">“Throughout his expansive career as a successful DJ, producer, remixer, label boss, filmmaker, and philanthropist, former 2 x World No.1 DJ, Hardwell has carved out a long-lasting legacy within the electronic music world.”<small><br>https://www.djhardwell.com/biography</small></p>
        <!-- <div class="artist-polaroids"> -->
          <div id="polaroid1" ><img class="polaroid-pic" src="/img/hardwell-pic-1.png" alt="pic1">
              <div class="caption"></div>
          </div>
          <div id="polaroid2"><img class="polaroid-pic" src="/img/hardwell-pic-2.png" alt="pic2">
              <div class="caption"></div>
          </div>
          <div id="polaroid3"><img class="polaroid-pic" src="/img/hardwell-pic-3.png" alt="pic3">
              <div class="caption"></div>
          </div>
        <!-- </div> -->

        <div class="artist-songs" id="top3songs">
            <img src="/img/hardwell-song-1.png" alt="song1">
            <img src="/img/hardwell-song-2.png" alt="song2">
            <img src="/img/hardwell-song-3.png" alt="song3">
        </div>
        <!-- MEDIA PLAYER -->
        <script src="https://kit.fontawesome.com/7c33dff1d8.js" crossorigin="anonymous"></script>
        <div id="overlay"></div>
        <div class="song-container">
            <div class="player" id="player">
                <div id="music-info">
                    <div class="title"></div>
                    <div class="author"></div>
                    <div class="album"></div>
                    <div class="bg"></div>
                </div>
                <div class="timestamp">
                    <div id="bar"></div>
                    <div id="current-time"></div>
                </div>
                <div class="buttons">
                    <div class="button button-medium"><i class="fas fa-step-backward"></i></div>
                    <div class="button button-large" id="play"><i class="fas fa-play"></i></div>
                    <div class="button button-medium"><i class="fas fa-step-forward"></i></div>
                    <div class="button button-small" id="mute"><i class="fas fa-volume-up"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- detail pages 2 -->
<div class="text-center container-fluid" id="detailPage">
    <h1 class="Dance-Title"> Detail page 2 </h1>
    <div class="text-center container" id="detail-page-block">
        <h1 class="artist-name">Martin Garrix</h1>
        <p class="artist-description">“Martijn Gerard Garritsen, known professionally as Martin Garrix, is a Dutch DJ and record producer. Active since 2012, Garrix has had a number of hits. He was also ranked number one on DJ Mag’s Top 100 DJ list in 2016, 2017, and 2018. Garrix has performed at diverse festivals like Coachella, Electric Daisy Carnival, Ultra Music Festival, and Tomorrowland.”<small><br>https://nexus.radio/news/martin-garrix</small></p>
        <!-- <div class="artist-polaroids"> -->
          <div id="polaroid1"><img class="polaroid-pic" src="/img/MG-pic-1.png" alt="pic1">
              <div class="caption"></div>
          </div>
          <div id="polaroid2"><img class="polaroid-pic" src="/img/MG-pic-2.png" alt="pic2">
              <div class="caption"></div>
          </div>
          <div id="polaroid3"><img class="polaroid-pic" src="/img/MG-pic-3.png" alt="pic3">
              <div class="caption"></div>
          </div>
        <!-- </div> -->

        <div class="artist-songs" id="top3songs">
          <div><img src="/img/MG-song-1.png" alt="song1"><p>In the name of love</p><small>1,192,854,477 streams on spotify</small></div>
          <!-- <div><img src="/img/MG-song-2.png" alt="song2"><p>Scared to be lonely</p><small>1,080,844,389 streams on spotify</small></div> -->
          <!-- <div><img src="/img/MG-song-3.png" alt="song3"><p>Summer days</p><small>560,694,909  streams on spotify</small></div> -->
        </div>
        <!-- MEDIA PLAYER -->
        <script src="https://kit.fontawesome.com/7c33dff1d8.js" crossorigin="anonymous"></script>
        <div id="overlay"></div>
        <div class="song-container">
            <div class="player" id="player">
                <div id="music-info">
                    <div class="title"></div>
                    <div class="author"></div>
                    <div class="album"></div>
                    <div class="bg"></div>
                </div>
                <div class="timestamp">
                    <div id="bar"></div>
                    <div id="current-time"></div>
                </div>
                <div class="buttons">
                    <div class="button button-medium"><i class="fas fa-step-backward"></i></div>
                    <div class="button button-large" id="play"><i class="fas fa-play"></i></div>
                    <div class="button button-medium"><i class="fas fa-step-forward"></i></div>
                    <div class="button button-small" id="mute"><i class="fas fa-volume-up"></i></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- schedule overview -->
<div class="text-center container-fluid" id="schedule">
    <h1 class="Dance-Title"> schedule overview </h1>
    <div class="text-center container" id="transparent-block">
        <div class="text-center container" id="artist-list-left">friday artists & daypass price</div>
        <div class="text-center container"id="artist-list-mid">saturday artists & daypass price</div>
        <div class="text-center container" id="artist-list-right">sunday artists & daypass price</div>
    </div>
    <div class="text-center container justify-content-center" id="transparent-block">
        <button class="btn-purple">1 Day Pass</button>
    </div>
    <div class="text-center container" id="transparent-block">
        <div class="text-center container" id="artist-list-right">Three day pass price</div>
    </div>
    <div class="text-center container justify-content-center" id="transparent-block">
        <button class="btn-purple" id="three-day-btn">3 Day Pass</button>
    </div>
</div>

<!-- friday tickets -->
<div class="text-center container-fluid" id="friday-schedule">
    <div class="text-right container" id="schedule-side">
        <h1 class="Dance-Title"> friday tickets </h1>
        <!-- TABLE WITH SCHEDULE -->
        <table class="table table-striped" >
            <thead>
                <tr>
                <th scope="col">Time</th>
                <th scope="col">Artist</th>
                <th scope="col">Venue</th>
                <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>bing</td>
                <td>bong</td>
                <td>bing</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                <th scope="row">2</th>
                <td>bing</td>
                <td>bong</td>
                <td>bing</td>
                </tr>
            </tbody>
        </table>
        <div class="text-center container justify-content-center">
            <button class="btn-purple">Get a Ticket</button>
        </div>
    </div>
    <div class="text-left container" id="green-side-with-picture">
        <img src="/img/dance-pic-1.png" class="pictures" alt="picture">
    </div>
</div>

<!-- saturday tickets -->
<div class="text-center container-fluid" id="saturday-schedule">
  <div class="text-right container" id="white-side-with-picture">
            <img src="/img/dance-pic-2.png" class="picture-left" alt="picture">
        </div>
    <div class="text-left container" id="schedule-side">
            <h1 class="Dance-Title"> saturday tickets </h1>
            <!-- TABLE WITH SCHEDULE -->
            <table class="table table-striped" id="table2">
                <thead>
                    <tr>
                    <th scope="col">Time</th>
                    <th scope="col">Artist</th>
                    <th scope="col">Venue</th>
                    <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>bing</td>
                    <td>bong</td>
                    <td>bing</td>
                    </tr>
                </tbody>
                <tbody>
                    <tr>
                    <th scope="row">2</th>
                    <td>bing</td>
                    <td>bong</td>
                    <td>bing</td>
                    </tr>
                </tbody>
            </table>
            <div class="text-center container justify-content-center">
                <button class="btn-purple">Get a Ticket</button>
            </div>
        </div>
    </div>
</div>

<!-- sunday tickets -->
<div class="text-center container-fluid" id="saturday-schedule">
    <div class="text-right container" id="schedule-side">
        <h1 class="Dance-Title"> Sunday tickets </h1>
        <!-- TABLE WITH SCHEDULE -->
        <table class="table table-striped" id="table2">
            <thead>
                <tr>
                <th scope="col">Time</th>
                <th scope="col">Artist</th>
                <th scope="col">Venue</th>
                <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th scope="row">1</th>
                <td>bing</td>
                <td>bong</td>
                <td>bing</td>
                </tr>
            </tbody>
            <tbody>
                <tr>
                <th scope="row">2</th>
                <td>bing</td>
                <td>bong</td>
                <td>bing</td>
                </tr>
            </tbody>
        </table>
        <div class="text-center container justify-content-center">
            <button class="btn-purple">Get a Ticket</button>
        </div>
    </div>
    <div class="text-left container" id="white-side-with-picture-left">
        <img src="/img/dance-pic-3.png" class="pictures" alt="picture">
    </div>
</div>

<!-- venues -->
<div class="text-center container-fluid" id="venue-section">
    <div class="card">
    <h1> venues </h1>
    <div class="card-body" style="float: left;">
        venues here
    </div>
    <div class="map">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2435.4373439418973!2d4.637868015802284!3d52.38062167978804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c5ef691268e66d%3A0xfa51f5aae7c4d62d!2sTeylers%20Museum!5e0!3m2!1snl!2snl!4v1677013723273!5m2!1snl!2snl"
            width="500px" height="500px" style="border:2px solid black; margin-right:2%;" allowfullscreen="" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        <p >e-mail:
            info@teyeler.nl <br>
            phone:
            023 - 517 58 50 (office)<br>
            <b>open from 10.00 - 17.00 </b>
        </p>
    </div>
    </div>
</div>

<?php
include __DIR__ . '/../footer.php';
?>

 <!-- FUNCTIONALITY FOR CAROUSEL -->
<script>
    const $ = selector => {
  return document.querySelector(selector);
};

function next() {
  if ($(".hide")) {
    $(".hide").remove(); 
  }

  /* Step */

  if ($(".prev")) {
    $(".prev").classList.add("hide");
    $(".prev").classList.remove("prev");
  }

  $(".act").classList.add("prev");
  $(".act").classList.remove("act");

  $(".next").classList.add("act");
  $(".next").classList.remove("next");

  /* New Next */

  $(".new-next").classList.remove("new-next");

  const addedEl = document.createElement('li');

  $(".list").appendChild(addedEl);
  addedEl.classList.add("next","new-next");
}

function prev() {
  $(".new-next").remove();
    
  /* Step */

  $(".next").classList.add("new-next");

  $(".act").classList.add("next");
  $(".act").classList.remove("act");

  $(".prev").classList.add("act");
  $(".prev").classList.remove("prev");

  /* New Prev */

  $(".hide").classList.add("prev");
  $(".hide").classList.remove("hide");

  const addedEl = document.createElement('li');

  $(".list").insertBefore(addedEl, $(".list").firstChild);
  addedEl.classList.add("hide");
}

slide = element => {
  /* Next slide */
  
  if (element.classList.contains('next')) {
    next();
    
  /* Previous slide */
    
  } else if (element.classList.contains('prev')) {
    prev();
  }
}

const slider = $(".list"),
      swipe = new Hammer($(".swipe"));

slider.onclick = event => {
  slide(event.target);
}

swipe.on("swipeleft", (ev) => {
  next();
});

swipe.on("swiperight", (ev) => {
  prev();
});

// FUNCTIONALITY OF MEDIA PLAYER
let audioList = [
  {
    title:"Evolution",
    album:"Bensound",
    author:"Benjamin Tissot",
    source:"https://www.bensound.com/bensound-music/bensound-evolution.mp3",
    type:"audio/mpeg"
  },
  {
    title:"Epic",
    album:"Bensound",
    author:"Benjamin Tissot",
    source:"https://www.bensound.com/bensound-music/bensound-epic.mp3",
    type:"audio/mpeg"
  }
];
let bar = document.getElementById("bar");
let currentTime = document.getElementById("current-time");
let currentAudio;
let player = document.getElementById("player");
let play = document.getElementById("play");
let barPosition = player.offsetLeft;
let overlay = document.getElementById("overlay");
let mute = document.getElementById("mute");
let playing;
let musicInfo = document.getElementById("music-info");
let musicInfoChilds = [...musicInfo.children];

function loadAudio(audio){
  audio = audio || 0;
  if(currentAudio){
    currentAudio.pause();
    currentAudio.currentTime = 0;
  }
  musicInfoChilds[0].innerHTML = audioList[audio].title;
  musicInfoChilds[1].innerHTML = "Author: " + audioList[audio].author;
  musicInfoChilds[2].innerHTML = "Album: " + audioList[audio].album;
  currentAudio = new Audio(audioList[audio].source);
}

function pixelPerSecond(){
  return Number(window.getComputedStyle(bar).getPropertyValue("width").replace("px", "")) / currentAudio.duration;
}

function currentTimeUpdate(){
  if(!window.grabbing){
    currentTime.style.width = (currentAudio.currentTime * pixelPerSecond()) + "px";
  }
}

function currentGrabTimeUpdate(event){
  let eventPageX = event.pageX || event.touches[0].pageX;
  
  if((eventPageX - barPosition) > Number(window.getComputedStyle(bar).getPropertyValue("width").replace("px",""))){
    currentTime.style.width = window.getComputedStyle(bar).getPropertyValue("width");
  }else if((eventPageX - barPosition) < 0){
    currentTime.style.width = 0;
  }else{
    currentTime.style.width = (eventPageX - barPosition) + "px";
  }
}

function barStart(event){
  if(event.target == bar){
    let eventPageX = event.pageX || event.touches[0].pageX;
    window.grabbing = true;
    
    currentTime.style.width = (eventPageX - barPosition) + "px";
    overlay.style.display = "block";
    
    if(event.type == 'touchstart'){
      window.addEventListener("touchmove", currentGrabTimeUpdate);
    }else{
      window.addEventListener("mousemove", currentGrabTimeUpdate);
    }
    currentAudio.muted = true;
  }
}

function barEnd(event){
  if(window.grabbing === true){
    window.grabbing = false;
    currentAudio.muted = false;
    currentAudio.currentTime = Number(currentTime.style.width.replace("px","")) / pixelPerSecond();
    overlay.style.display = "none";
    
    if(event.type == 'touchstart'){
      window.removeEventListener("touchmove", currentGrabTimeUpdate);
    }else{
      window.removeEventListener("mousemove", currentGrabTimeUpdate);
    }
  }
}

play.addEventListener("click", function(){
  if(currentAudio.paused){
    play.innerHTML = '<i class="fas fa-pause"></i>';
    currentAudio.play();
  }else{
    play.innerHTML = '<i class="fas fa-play"></i>';
    currentAudio.pause();
  }
});

mute.addEventListener("click", function(){
  if(!currentAudio.muted){
    this.innerHTML = '<i class="fas fa-volume-mute"></i>';
    currentAudio.muted = true;
  }else{
    this.innerHTML = '<i class="fas fa-volume-up"></i>';
    currentAudio.muted = false;
  }
})

window.addEventListener("mousedown", barStart);
window.addEventListener("mouseup", barEnd);

window.addEventListener("touchstart", barStart);
window.addEventListener("touchend", barEnd);

(function load(){
  playing = setInterval(currentTimeUpdate, 1);
  loadAudio()
})();

currentAudio.addEventListener("ended", function(){
  play.innerHTML = '<i class="fas fa-play"></i>';
});
</script>