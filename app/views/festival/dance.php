this is dance page 
<?php
include __DIR__ . '/../header.php';
?>
<!-- top section with title and picture carasol -->
<div class="text-center container-fluid" id="top-section">
    <h1 class="Dance-Title"> Dance! </h1>
</div>

<!-- detail pages -->
<div class="text-center container-fluid" id="detailPage">
    <h1 class="Dance-Title"> Detail page 1 </h1>
</div>

<div class="text-center container-fluid" id="detailPage">
    <h1 class="Dance-Title"> Detail page 2 </h1>
</div>

<!-- schedule overview -->
<div class="text-center container-fluid" id="schedule">
    <h1 class="Dance-Title"> schedule overview </h1>
    <div class="text-center container" id="transparent-block">
        <div class="text-center container" id="artist-list-left">Nicky Romero / Afrojack Tiësto Hardwell Armin van Buuren Martin Garrix All access: €125,00</div>
        <div class="text-center container"id="artist-list-mid"></div>
        <div class="text-center container" id="artist-list-right"></div>
    </div>
</div>

<!-- friday tickets -->
<div class="text-center container-fluid" id="top-section">
    <h1 class="Dance-Title"> friday tickets </h1>
</div>

<!-- saturday tickets -->
<div class="text-center container-fluid" id="top-section">
    <h1 class="Dance-Title"> saturday tickets </h1>
</div>

<!-- sunday tickets -->
<div class="text-center container-fluid" id="top-section">
    <h1 class="Dance-Title"> sunday tickets </h1>
</div>

<!-- venues -->
<div class="text-center container-fluid" id="top-section">
    <h1 class="Dance-Title"> venues </h1>
</div>

<?php
include __DIR__ . '/../footer.php';
?>

<!-- PUT THIS ON STYLE SHEET -->

<style>
#top-section{
    background-color:#9EADEA;
}
#detailPage{
    background: radial-gradient(50% 50% at 50% 50%, rgba(46, 155, 123, 0.68) 26.35%, #9EADEA 100%);
}
#schedule{
    height: 600px;
    background: radial-gradient(57.08% 360.21% at 49.97% 50%, #7A86B6 0%, #529197 53.44%, #2E9B7B 100%);
}
#transparent-block{
    position: relative;
    width: 85%;
    height: 85%;
    background: rgba(244, 237, 237, 0.3);
    display: grid;
    grid-template-columns: 30% 30% 30%;
    grid-gap: 10px;
}
#artist-list-left, #artist-list-mid, #artist-list-right{
    position: relative;
    border:3px solid white;
    margin: 30px;
    width: 100%;
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