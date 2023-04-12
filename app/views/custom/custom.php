<?php 
include __DIR__ . '/../header.php';
$contentByType = [];
try{
    foreach ($contents as $content) {
        $contentByType[$content->getId()] = $content->getContent();
    }
    if (empty($contentByType)){
        echo '<p style="color: red; font-weight: bold;">No data in content table in database</p>';
    }
} catch (PDOException $e) {
    echo $e;
}
?>
<script>
function openPage(id) {
  // Declare all variables
  var i, tabcontent, tablinks;

  //hides the pages
  tabcontent = document.getElementsByClassName("tabpagecontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
//makes them active
tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
    tablinks[i].style.backgroundColor = "";
    tablinks[i].style.color = "";
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(id).style.display = "block";
  evt.currentTarget.className += " active";
  evt.currentTarget.style.backgroundColor = "white";
  evt.currentTarget.style.color = "black";
  document.getElementById(id).style.display = "block";
}
</script>
<div class="page-tabs"></div>
<div class="tab">
    <?php foreach ($contents as $content) {
        if ($content->getPagename() !== "home" && $content->getPagename() !== "festival") {
            ?>
            <button class="tablinks" onclick="openPage(<?php echo $content->getId(); ?>)"><?php echo $content->getPagename(); ?></button>
            <?php
        }
    } ?>
</div>

<?php foreach ($contents as $content) {
    if ($content->getPagename() !== "home" && $content->getPagename() !== "festival") {
        ?>
        <div id="<?php echo $content->getId(); ?>" class="tabpagecontent" style="display:none;">
            <?php
            $idForPage = $content->getId();
            // var_dump($content->getContent());
            ?>
            <img class="page-img" src="/../img/<?= $content->getImg() ?>" alt="<?php echo html_entity_decode($content->getImg()); ?>">
            <p class="page-custom-content"><?php echo html_entity_decode($content->getContent()); ?></p>
        </div>
        <?php
    }
} 
?>
<?php
include __DIR__ . '/../footer.php';
?>

