<?php
include __DIR__ . '/../header.php';
?>

<button onclick="changeScannedStatus()">Click me</button>

<script>
    function changeScannedStatus(){
        changeScannedStatus($order_id);
    }
</script>