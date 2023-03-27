<?php
include __DIR__ . '/../header.php';
?>

<aside class="filter_events">

<fieldset id="filter_event_type">
    <legend>Select event</legend>

    <div>
      <input type="radio" id="filter_yummy" name="event_type" value="filter_yummy">
      <label for="filter_yummy">Yummy</label>
    </div>
    <div>
      <input type="radio" id="filter_dance" name="event_type" value="filter_dance">
      <label for="filter_dance">Dance</label>
    </div>
    <div>
      <input type="radio" id="filter_history" name="event_type" value="filter_history">
      <label for="filter_history">History</label>
    </div>
    <div>
      <input type="radio" id="filter_jazz" name="event_type" value="filter_jazz">
      <label for="filter_jazz">Jazz</label>
    </div>
    
</fieldset>

<fieldset id="filter_event_date">
    <legend>Select date</legend>

    <div>
      <input type="radio" id="filter_26" name="event_date" value="filter_26">
      <label for="filter_26">July 26th</label>
    </div>
    <div>
      <input type="radio" id="filter_27" name="event_date" value="filter_27">
      <label for="filter_27">July 27th</label>
    </div>
    <div>
      <input type="radio" id="filter_28" name="event_date" value="filter_28">
      <label for="filter_28">July 28th</label>
    </div>
    <div>
      <input type="radio" id="filter_29" name="event_date" value="filter_29">
      <label for="filter_29">July 29th</label>
    </div>
    
</fieldset>
</aside>



<script>
  document.getElementsById("filter_event_date").addEventListener("click",(e)=>{
        switch(e.target.getAttribute(getSelectedValue)){
          case 'filter_26':
                alert("26th")
                break;
            case 'filter_27':
                alert("27th")
                break;
            case 'filter_28':
                alert("28th")
                break;
            case 'filter_29':
                alert("29th")
                break;
        }
    })
</script>


<?php
include __DIR__ . '/../footer.php';
?>


<script>

</script>