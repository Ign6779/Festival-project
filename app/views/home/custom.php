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
<div class="custom-Title"></div>

<div class="custom-image"></div>

<div class="custom-text"></div>


<?php
include __DIR__ . '/../footer.php';
?>