<?php
include __DIR__ . '/../header.php';
?>
<!-- top section with title and picture carasol -->
<div class="text-center container-fluid" id="top-section">
    <h1 class="Dance-Title"> Dance! </h1>
    <div class="text-center container" id="carousel">
        <ul class="list">
            <li class="hide"></li>
            <li class="prev"></li>
            <li class="act"></li>
            <li class="next"></li>
            <li class="next new-next"></li>
        </ul>
    </div>

<div class="swipe"></div>
</div>

<!-- detail pages 1 -->
<div class="text-center container-fluid" id="detailPage">
    <h1 class="Dance-Title"> Detail page 1 </h1>
    <div class="text-center container" id="detail-page-block">
        <h1 class="artist-name">Hardwell</h1>
        <p class="artist-description">description</p>
        <!-- <div class="artist-polaroids"> -->
          <div class="polaroid1"><img src="" alt="pic1">
              <div class="caption"></div>
          </div>
          <div class="polaroid2"><img src="" alt="pic2">
              <div class="caption"></div>
          </div>
          <div class="polaroid3"><img src="" alt="pic3">
              <div class="caption"></div>
          </div>
        <!-- </div> -->

        <div class="artist-songs" id="top3songs">
            <img src="" alt="song1">
            <img src="" alt="song2">
            <img src="" alt="song3">
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
        <p class="artist-description">description</p>
        <!-- <div class="artist-polaroids"> -->
          <div class="polaroid1"><img src="" alt="pic1">
              <div class="caption"></div>
          </div>
          <div class="polaroid2"><img src="" alt="pic2">
              <div class="caption"></div>
          </div>
          <div class="polaroid3"><img src="" alt="pic3">
              <div class="caption"></div>
          </div>
        <!-- </div> -->

        <div class="artist-songs" id="top3songs">
            <img src="" alt="song1">
            <img src="" alt="song2">
            <img src="" alt="song3">
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
        <button class="btn-purple">3 Day Pass</button>
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
        <img src="..." class="pictures" alt="picture">
    </div>
</div>

<!-- saturday tickets -->
<div class="text-center container-fluid" id="saturday-schedule">
<div class="text-right container" id="white-side-with-picture">
            <img src="..." class="pictures" alt="picture">
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
        <img src="..." class="pictures" alt="picture">
    </div>
</div>

<!-- venues -->
<div class="text-center container-fluid" id="venue-section">
    <div class="card">
    <h1> venues </h1>
    <div class="card-body">
        venues here
    </div>
    <img src="" alt="picture" class="card-img-right">
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