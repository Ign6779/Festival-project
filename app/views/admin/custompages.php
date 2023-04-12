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

var save = function(index, id) {
  var markup = $('#editor-' + index).summernote('code');
  $(`.click2edit:eq(${index})`).html(markup); // update HTML content
  var editedContent = $(`.click2edit:eq(${index})`).html();
  editedContent = encodeURIComponent(editedContent); // encode special characters
  $('#editor-' + index).summernote('destroy');
  saveContent(id, editedContent);
};

function saveContent(index, newContent) {
    fetch(`http://localhost/api/editor/updatePageContent?id=${index}&content=${newContent}`, { 
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

    function deletePage(id) {
        fetch('http://localhost/api/editor/deletePage?pageid=' + id, {
            method: 'GET'
        })
            .then(result => {
                console.log(result)
                window.location.href = 'http://localhost/custompage';
            })
            .catch(error => console.log(error));
    }
</script>

<div class="custom-edit-section">
<form action="/custompage/addPage" enctype="multipart/form-data" class="add-page" name ="addpage" method="post">
    <div>
        <h2>Add a custom page here</h2>
    </div>
    <div><p>im putting this here cuz </p></div>
    <input type="text" class="form-control" id="pagename" name="pagename" placeholder="Name of page" required>
    <!-- <input id="img" type="file" name="image" accept=".jpg, .jpeg, .png" required> -->
    <input type="file" class="form-control" id="image" name="image" accept=".png, .jpg, .jpeg" required>
    <textarea id="customcontent" name="content" class="form-control" placeholder="Content"></textarea>
    <button id="submitpage" type="submit" class="btn btn-primary col-5" name="addpage">Submit</button>
</form>

</div>
<div class="wysiwyg-pages">
    <!-- for each page in content, display page with wysiwyg editor -->
    <?php 
    $index = 0;
    foreach($contents as $content){
        if ($content->getPagename() != "home" && $content->getPagename() != "festival"){
        ?>
        <div class="seperator"></div>
        <div class="single-custom">
            <div class="customimg">
                <!-- <button id="edit" class="btn btn-primary" onclick="edit(<?php echo $index ?>)" type="button">Edit</button> -->
                <!-- <button id="save" class="btn btn-primary" onclick="save(<?php echo $index ?>, <?php echo $content->getId(); ?>)" type="button">Save</button> -->
                <img class="click2edit" src="/../img/<?= $content->getImg() ?>" alt="Custom Page Image">
                <?$index = $index + 1;?>
            </div>
            <div class="customcontent">
                <button id="edit" class="btn btn-primary" onclick="edit(<?php echo $index ?>)" type="button">Edit</button>
                <button id="save" class="btn btn-primary" onclick="save(<?php echo $index ?>, <?php echo $content->getId(); ?>)" type="button">Save</button>
                <p class="click2edit"><?php echo html_entity_decode($content->getContent())?></p>
                <?$index = $index + 1;?>
            </div>
            <button class="btn btn-danger col-2" name="delpage" onclick='deletePage(<?php echo $content->getId();?>)'>Delete</button>

        </div>
        <?php
        }
    }?>

</div>
