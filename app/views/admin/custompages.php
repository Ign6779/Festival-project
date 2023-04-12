<?php
include __DIR__ . '/adminheader.php';
$contentById = [];
foreach ($contents as $content) {
    $contentById[$content->getId()] = $content;
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
  editedContent = encodeURIComponent(editedContent); // encode special characters
  $('#editor-' + index).summernote('destroy');
  saveContent((index + 7), editedContent);
};

function saveContent(index, newContent) {
    fetch(`http://localhost/api/editor/updateContent?id=${index}&content=${newContent}`, { //change this to send the object
      method: 'GET',
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

<div class="custom-edit-section">
<form action="/custompage/addPage" class="add-page" method="post">
    <div>
        <h2>Add a custom page here</h2>
    </div>
    <div><p>im putting this here cuz </p></div>
    <input type="text" class="form-control" id="pagename" name="pagename" placeholder="Name of page" required>
    <input type="text" class="form-control" id="title" name="title" placeholder="Title of page" required>
    <input multiple="true" enctype="multipart/form-data" type="file" name="img" accept=".jpg, .jpeg, .png" onchange="validateFiles(this)"required>
    <textarea name="content" class="form-control" placeholder="Content"></textarea>
    <button type="submit" class="btn btn-primary col-5" name="addpage">Submit</button>
</form>

</div>
<div class="wysiwyg-pages">
    <!-- for each page in content, display page with wysiwyg editor -->
    <?php 
    $index = 0;
    foreach($contents as $content){
        if ($content->getPagename() != "home" && $content->getPagename() != "festival"){
        ?>
        <div class="single-custom">
            <div class="customtitle">
                <button id="edit_<?php echo $index ?>" class="btn btn-primary" onclick="edit(<?php echo $index ?>)" type="button">Edit</button>
                <button id="save_<?php echo $index ?>" class="btn btn-primary" onclick="save(<?php echo $index ?>)" type="button">Save</button>
                <h1 id="custom-title" class="click2edit"><?php echo $content->getTitle()?></h1>
                <?$index = $index + 1;?>
            </div>
            <div class="customimg">
                <button id="edit_<?php echo $index ?>" class="btn btn-primary" onclick="edit(<?php echo $index ?>)" type="button">Edit</button>
                <button id="save_<?php echo $index ?>" class="btn btn-primary" onclick="save(<?php echo $index ?>)" type="button">Save</button>
                <img class="click2edit" src="<?php echo $content->getImg()?>" alt="Image">
                <?$index = $index + 1;?>
            </div>
            <div class="customcontent">
                <button id="edit_<?php echo $index ?>" class="btn btn-primary" onclick="edit(<?php echo $index ?>)" type="button">Edit</button>
                <button id="save_<?php echo $index ?>" class="btn btn-primary" onclick="save(<?php echo $index ?>)" type="button">Save</button>
                <p class="click2edit"><?php echo $content->getContent()?></p>
                <?$index = $index + 1;?>
            </div>
            <button type="submit" class="btn btn-danger col-2" name="delpage">Delete</button>
        </div>
        <?php
        }
    }?>

</div>


<script>
    function validateFiles(input) {
        if (input.files.length != 1) {
            input.value = "";
            document.getElementById("errormessage").style.color = 'red';
            document.getElementById("errormessage").style.textAlign = 'center';
            document.getElementById("errormessage").className = "mt-5";
            document.getElementById("errormessage").innerHTML = "You need to upload 1 pictures.";
        }
        else {
            document.getElementById("errormessage").innerHTML = "";
        }
    }
</script>