<?php
include __DIR__ . '/../header.php';
?>
<div class="payment-body">
    <div class="cal-body">
        <?php
        include '/app/views/components/Calendar.php';
        ?>
    </div>
    <?php
    include '/app/views/components/paymentForm.php';
    ?>
</div>

<script>
    window.onload = addToCalender;

</script>
<?php
include __DIR__ . '/../footer.php';
?>