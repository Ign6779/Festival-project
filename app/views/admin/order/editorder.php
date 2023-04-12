<?php
require __DIR__ . '/../adminheader.php'
?>

<a href="/order" class="btn btn-primary">Back</a>

<form method="POST" action="/order/updateOrder?orderId=<?php echo $order->getId(); ?>" enctype="multipart/form-data" class="container">
    <div class="form-group row justify-content-center">
        <div class="col-5">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" value="<?php echo $order->getStatus(); ?>" required>
        </div>
    </div>

    <div class="row justify-content-center">
        <button type="submit" class="btn btn-primary col-5" name="updateOrder">Update</button>
    </div>

    <div class="row justify-content-center">
        <p id="errormessage" class="col-5"></p>
    </div>
</form>