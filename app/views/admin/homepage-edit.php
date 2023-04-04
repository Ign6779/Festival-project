<?php
include __DIR__ . '/adminheader.php';
$contentById = [];
foreach ($contents as $content) {
    $contentById[$content->getId()] = $content->getContent();
}
?>
<script>
$(document).ready(function() {
  $('.click2edit').each(function() {
    $(this).attr('id', 'editor-' + $(this).index('.click2edit'));
  });
});

var edit = function(index) {
  $('#editor-' + index).summernote({
    focus: true
  });
};

var save = function(index) {
  var markup = $('#editor-' + index).summernote('code');
  $('#editor-' + index).summernote('destroy');
};

</script>
<h1>Edit homepage:</h1>
<!-- Header of the homepage -->
<section class="homepage-header">
    <div class="homepage-picture">
        <img src="/img/homepage-main.png" alt="Haarlem-overview" class="img-responsive">
        <h1 id="homepage-welcome">Welcome to Haarlem</h1>
    </div>
</section>
<section class="homepage-context">
    <button id="edit" class="btn btn-primary" onclick="edit(0)" type="button">Edit</button>
    <button id="save" class="btn btn-primary" onclick="save(0)" type="button">Save</button>
    <h3 class="click2edit"><?php echo $contentById[1]; ?></h3>
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
        <button id="edit" class="btn btn-primary" onclick="edit(1)" type="button">Edit</button>
        <button id="save" class="btn btn-primary" onclick="save(1)" type="button">Save</button>
        <h3 class="click2edit"><?php echo $contentById[2]; ?></h3>
    </div>

</div>

<!-- Food section -->
<section class="homepage-food">
    <div>
        <button id="edit" class="btn btn-primary" onclick="edit(2)" type="button">Edit</button>
        <button id="save" class="btn btn-primary" onclick="save(2)" type="button">Save</button>
        <h3 class="click2edit"><?php echo $contentById[3]; ?></h3>
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
        <button id="edit" class="btn btn-primary" onclick="edit(3)" type="button">Edit</button>
        <button id="save" class="btn btn-primary" onclick="save(3)" type="button">Save</button>
        <h3 class="click2edit"><?php echo $contentById[4]; ?></h3>
    </section>

    <!-- Theatre section -->
    <section class="homepage-theatre">
        <h2>Theatre</h2>
        <img src="/img/homepage-theatre.png" alt="Theatre" width=95%>
        <button id="edit" class="btn btn-primary" onclick="edit(4)" type="button">Edit</button>
        <button id="save" class="btn btn-primary" onclick="save(4)" type="button">Save</button>
        <h3 class="click2edit"><?php echo $contentById[5]; ?></h3>
    </section>

    <!-- Museums section -->
    <section class="homepage-museums">
        <h2>Museums</h2>
        <img src="/img/homepage-museums.png" alt="Museums" width=95%>
        <button id="edit" class="btn btn-primary" onclick="edit(5)" type="button">Edit</button>
        <button id="save" class="btn btn-primary" onclick="save(5)" type="button">Save</button>
        <h3 class="click2edit"><?php echo $contentById[6]; ?></h3>
    </section>
</div>
<?php
include '/app/views/footer.php';
?>