this is dance page 
<script src="https://hammerjs.github.io/dist/hammer.js"></script>
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
        <button class="ToTicketsbtn">1 Day Pass</button>
    </div>
    <div class="text-center container" id="transparent-block">
        <div class="text-center container" id="artist-list-right">Three day pass price</div>
    </div>
    <div class="text-center container justify-content-center" id="transparent-block">
        <button class="ToTicketsbtn">3 Day Pass</button>
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
            <button class="ToTicketsbtn">Get a Ticket</button>
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
                <button class="ToTicketsbtn">Get a Ticket</button>
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
            <button class="ToTicketsbtn">Get a Ticket</button>
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
    //https://www.bensound.com/bensound-img/epic.jpg
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

<!-- PUT THIS ON STYLE SHEET -->

<style>
#top-section{
    background-color:#9EADEA;
    padding: 3%;
}
#carousel{
    padding: 15%;
}
.Dance-title{
    margin-top: 0px;
}
#detailPage{
    background: radial-gradient(50% 50% at 50% 50%, rgba(46, 155, 123, 0.68) 26.35%, #9EADEA 100%);
    height: 700px;
}
#schedule{
    height: 600px;
    background: radial-gradient(57.08% 360.21% at 49.97% 50%, #7A86B6 0%, #529197 53.44%, #2E9B7B 100%);
}
#transparent-block{
    position: relative;
    width: 85%;
    background: rgba(244, 237, 237, 0.3);
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
}
#artist-list-left, #artist-list-mid, #artist-list-right{
    position: relative;
    border:3px solid white;
    margin: 30px;
    height: 150px;
    flex: 1 0 200px;
    align-content: center;
}
#artist-list-left{
    float:left;
}
#artist-list-mid{
    float:left;
}
#artist-list-right{
    float:right;
}
#friday-schedule{
    background-color: white;
    display: flex;
    flex-wrap: wrap;
}
#saturday-schedule{
    background-color: #2E9B7B;
    display: flex;
    flex-wrap: wrap;
}
#green-side-with-picture{
    background-color: #2E9B7B;
    height: 550px;
    position: relative;
    width: 50%;
    border-radius: 50% 0% 0% 50%;
    margin: 0px;
}
#white-side-with-picture{
    background-color: white;
    height: 550px;
    position: relative;
    width: 50%;
    border-radius: 0% 50% 50% 0%;
    margin: 0px;
}
#white-side-with-picture-left{
    background-color: white;
    height: 550px;
    position: relative;
    width: 50%;
    border-radius: 50% 0% 0% 50%;
    margin: 0px;
}
#schedule-side{
    width: 40%;
    padding: 70px 0;
    text-align: center;
}
.pictures{
    border-radius: 50%;
    height: 70%;
    background-color: black;
    margin: 10%;
}
.table{
    margin: 20px;
    background-color: rgba(46, 155, 123, 0.4);
}
#table2{
    background-color: rgba(255, 255, 255, 0.4);
}
#venue-section {
    background: linear-gradient(180deg, #2E9B7B 0%, #7A86B6 100%);
    height: 550px;
    padding: 30px;
}
.card{
    position: relative;
    height: 80%;
    padding: 30px;
    display: flex;
    flex-wrap: wrap;
    gap: 30%;
    border-radius: 15px;
}
.card-img-right{
    background-color: black;
    height: 100%;
    float: right;
    width: 40%;
}
.list {
  height: 250px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%)
}

.list li {
  list-style-type: none;
  width: 250px;
  height: 250px;
  opacity: .25;
  position: absolute;
  left: 50%;
  margin-left: -100px;
  border-radius: 2px;
  background: #9C89B8;
  transition: transform 1s, opacity 1s;
}

.list .act {
  opacity: 1;
}

.list .prev,
.list .next {
  cursor: pointer;
}

.list .prev {
  transform: translateX(-220px) scale(.85);
}

.list .next {
  transform: translateX(220px) scale(.85);
}

.list .hide {
  transform: translateX(-420px) scale(.85);
}

.list .new-next {
  transform: translateX(420px) scale(.85);
}

.list .hide,
.list .new-next {
  opacity: 0;
  transition: opacity .5s, transform .5s;
}

.swipe {
  width: 300px;
  height: 250px;
  position: absolute;
  background-color: green;
  border-radius: 2px;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  opacity: 0;
}
#detail-page-block{
  display: grid;
  /* grid-auto-columns:1fr; */
  position: relative;
  width: 90%;
  background: rgba(244, 237, 237, 0.3);
  height: 550px;

}
.artist-name{
  grid-column-start: 5;
  grid-column-end: 6;
  grid-row: 1;
}
.artist-description{
  grid-column-start: 3;
  grid-column-end: 7;
  grid-row: 2;
}
/* .artist-polaroids{
  grid-column-start: 1;
  grid-column-end: 3;
  grid-row-start: 3;
  grid-row-end: 6;
} */
.polaroid1{
  position: absolute;
  height: 300px;
  width: 250px;
  background-color: grey;
  z-index: 1;
  grid-column: 1;
  grid-row-start: 2;
  grid-row-end: 4; 
}
.polaroid2{
  position: absolute;
  height: 300px;
  width: 250px;
  background-color: white;
  z-index: 2;
  grid-column: 2;
  grid-row-start: 1;
  grid-row-end: 3; 
}
.polaroid3{
  position: absolute;
  height: 300px;
  width: 250px;
  background-color: black;
  z-index: 3;
  grid-column: 3;
  grid-row-start: 2;
  grid-row-end: 4; 
}
.artist-songs{
  display: table;
  grid-column-start: 4;
  grid-column-end: 7;
  grid-row: 3;
}
.artist-songs img{
  height: 100px;
  width: 100px;
  background-color: white;
  border-radius: 20px;
  margin: 10px;
}
/* AUDIO PLAYER */
#overlay{
  position:relative;
  /* top:0; */
  /* left:0; */
  /* bottom:0; */
  /* right:0; */
  z-index:9999;
  display:none;
}
.player{
  border-radius: 20px;
  width: 400px;
  height: 250px;
  position: absolute;
  box-shadow:6px 6px 15px rgba(51,51,51,0.5);
  overflow:hidden;
  background:#7A86B6;
  grid-column-start: 4;
  grid-column-end: 7;
  grid-row: 4;
  z-index: 99;
  display: none;
}
.player #music-info{
  padding: 15px;
  background-image:url("https://www.bensound.com/bensound-img/evolution.jpg");
  height: 140px;
  background-repeat:no-repeat;
  background-size:100%;
  color: #fff;
}
.player #music-info .title{
  font-size: 23px;
  margin-bottom: 8px;
  z-index:1;
}
.player #music-info .bg{
  width: 100%;
  box-shadow: 0 -100px 100px 100px rgba(0,0,0,0.5);
}
.player #music-info .author{
  font-size: 14px;
  float: right;
}
.player #music-info .album{
  font-size: 14px;
}
.player .timestamp{
  position: absolute;
  width: 100%;
  bottom: 110px;
}
.player .timestamp #bar{
  width: 100%;
  height: var(--bar-height);
  background: #bbb;
}
.player .timestamp #current-time{
  position:absolute;
  left: 0;
  bottom: 0;
  width: 0;
  height: var(--bar-height);
  background: #5453af;
  pointer-events:none;
}
.player .timestamp #current-time:after{
  content:"";
  width: 16px;
  height: 16px;
  background: #5453af;
  position: absolute;
  right: -8px;
  bottom: -4px;
  z-index: 9;
  border-radius: 50%;
  box-shadow: 0 0 3px 2px #eee;
}
.player .buttons{
  position: absolute;
  bottom: 0px;
  border-top: 1px solid #ddd;
  width:100%;
  height:110px;
  display:flex;
  align-items:center;
  justify-content:center;
}
.player .buttons .button{
  border: 1px solid #ddd;
  border-radius: 50%;
  text-align:center;
  margin:7px;
  color: #333;
}
.player .buttons .button-small{
  width: var(--small);
  height: var(--small);
  line-height: var(--small);
}
.player .buttons .button-medium{
  width: var(--medium);
  height: var(--medium);
  line-height: var(--medium);
  font-size: 25px;
}
.player .buttons .button-large{
  width: var(--large);
  height: var(--large);
  line-height: var(--large);
  font-size: 35px;
}
.player .buttons .button-small:hover, .player .buttons .button-medium:hover, .player .buttons .button-large:hover{
  background: #5453af;
  color: #fff;
}


