<?php
include __DIR__ . '/../header.php';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2">
            filter options

            <div class="row">
                Event
                <div class="row">
                    <label><span>Dance</span><input type="checkbox" value="Dance" name="dance" onclick="getTickets(2)">
                    </label>
                    <label><span>Jazz</span><input type="checkbox" value="Jazz"> </label>
                    <label><span>Food</span><input type="checkbox" value="Food"> </label>
                    <label><span>Walking</span><input type="checkbox" value="Walking"> </label>
                </div>

            </div>
            <div class="row">
                Date
                <div class="">
                    <label><span>26 july</span><input type="checkbox" value="26"> </label>
                    <label><span>27 july</span><input type="checkbox" value="27"> </label>
                    <label><span>28 july</span><input type="checkbox" value="28"> </label>
                    <label><span>29 july</span><input type="checkbox" value="29"> </label>
                    <label><span>30 july</span><input type="checkbox" value="30"> </label>
                    <label><span>31 july</span><input type="checkbox" value="31"> </label>
                </div>
            </div>

            <div class="row">
                Session
                <div class="row">
                    <label><span>1st</span><input type="checkbox" value="Dance"> </label>
                    <label><span>2nd</span><input type="checkbox" value="Jazz"> </label>
                    <label><span>3rd</span><input type="checkbox" value="Food"> </label>
                    <label><span>4th</span><input type="checkbox" value="Walking"> </label>
                </div>
            </div>

        </div>

        <!-- <div style="border-left: 6px solid black;
  height: 50%;
  position: absolute;
  left: 20%;
 "> -->
        <!-- </div> -->

        <div class="col-md-10 calender-btn">
            Calender
        </div>
    </div>
</div>

<script>
    fetch('http://localhost/api/ticket')
        .then(result => result.json())
        .then((data) => {
            console.log(data);
        }).catch(err => console.error(err));

    function getTickets(x) {
        fetch('http://localhost/api/ticket?dance=' + x, {
            method: 'GET'
        })
            .then(result => result.json())
            .then((data) => {
                console.log(data);
            }).catch(err => console.error(err));
    }

</script>

<?php
include __DIR__ . '/../footer.php';
?>