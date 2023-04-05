
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
    console.log('index:', index);
  $('#editor-' + index).summernote({
    focus: true
  });
};

var save = function(index) {
  var markup = $('#editor-' + index).summernote('code');
  $(`.click2edit:eq(${index})`).html(markup); // update HTML content
  var editedContent = $(`.click2edit:eq(${index})`).html();
  $('#editor-' + index).summernote('destroy');
  saveContent(index, editedContent);
};

function saveContent(index, newContent) {
    data = {id: index, content: newContent};
    fetch(`http://localhost/api/editor/updateContent?id=${index}&content=${newContent}`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
    //   body: JSON.stringify(data),
      })
      .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        console.log('Content updated successfully.');
    })
    .catch(error => {
        console.error('Error updating content:', error);
    });
}

</script>
<h1>Edit Festival Page:</h1>
<div class="festival-overview-header">
    <img src="/img/festival-overview-head.png" alt="Festival Image" id="overview-header-image">
    <h1 class="title">The Haarlem Festival</h1>
</div>
<div class="festival-description-block">
    <div class="white-block">
        <button id="edit" class="btn btn-primary" onclick="edit(0)" type="button">Edit</button>
        <button id="save" class="btn btn-primary" onclick="save(0)" type="button">Save</button>
        <div class="click2edit"><?php echo $contentById[7]; ?></div>
    </div>
</div>
<!-- YUMMY -->
<section class="event-section" id="yummy-section">
    <div class="left-round" id="yummy-round">
        <img src="/img/overview-yummy.png" class="picture-left" alt="picture" id="overview-left-pic">
    </div>
    <div class="right-text" id="yummy-right">
    <button id="edit" class="btn btn-primary" onclick="edit(1)" type="button">Edit</button>
    <button id="save" class="btn btn-primary" onclick="save(1)" type="button">Save</button>
    <div class="click2edit"><?php echo $contentById[8]; ?></div>

</section>
<!-- HISTORY -->
<section class="event-section" id="history-section">
    <div class="right-round" id="history-picture-round">
        <img src="/img/overview-history.png" class="picture-right" alt="picture" id="overview-right-pic">
    </div>
    <div class="left-text" id="history-left">
    <button id="edit" class="btn btn-primary" onclick="edit(2)" type="button">Edit</button>
    <button id="save" class="btn btn-primary" onclick="save(2)" type="button">Save</button>
        <div class="click2edit"><?php echo $contentById[9]; ?></div>
</section>
<!-- DANCE -->
<section class="event-section" id="dance-section">
    <img src="/img/Overview-dance-cover.png" alt="Dance Event Image" class="dance-image">
    <h1 id="dance-title">Ready to Dance?</h1>
</section>
<!-- JAZZ -->
<section class="event-section" id="jazz-section">
<div class="left-round" id="jazz-picture-round">
    <img src="/img/overview-jazz.png" class="picture-left" alt="picture" id="overview-left-pic">
</div>
<div class="right-text">
    <button id="edit" class="btn btn-primary" onclick="edit(3)" type="button">Edit</button>
    <button id="save" class="btn btn-primary" onclick="save(3)" type="button">Save</button>
    <div class="click2edit"><?php echo $contentById[10]; ?></div>

</section>
<!-- KIDS -->
<section class="event-section" id="kids-section">
    <div class="right-round" id="kids-picture-round">
        <img src="/img/overview-kids.png" class="picture-right" alt="picture" id="overview-right-pic">
    </div>
    <div class="left-text">
    <button id="edit" class="btn btn-primary" onclick="edit(4)" type="button">Edit</button>
    <button id="save" class="btn btn-primary" onclick="save(4)" type="button">Save</button>
        <div class="click2edit"><?php echo $contentById[11]; ?></div>
</section>
