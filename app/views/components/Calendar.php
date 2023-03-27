
<?php
    $eventStartTime = "3";
    $eventEndTime = "5";
    $eventType = "jazz-event";
?>
<!-- the correct time and event name will show up on ticket but position of event itself is just based on closest hour -->
<div class="cal-component">
    <button class="card w-75" id="calendar-toggle" onclick="CalClicked()">
    <div class="card-body" id="cal-text">
        <h3>Calendar</h3>
        <p class="cal-arrow">&#8681;</p>
    </div>
    </button>
    <div class="calendar" id="cal-drop-down">
    <div class="timeline">
        <div class="spacer"></div>
        <div class="time-marker">9 AM</div>
        <div class="time-marker">10 AM</div>
        <div class="time-marker">11 AM</div>
        <div class="time-marker">12 PM</div>
        <div class="time-marker">1 PM</div>
        <div class="time-marker">2 PM</div>
        <div class="time-marker">3 PM</div>
        <div class="time-marker">4 PM</div>
        <div class="time-marker">5 PM</div>
        <div class="time-marker">6 PM</div>
        <div class="time-marker">7 PM</div>
        <div class="time-marker">8 PM</div>
        <div class="time-marker">9 PM</div>
        <div class="time-marker">10 PM</div>
        <div class="time-marker">11 PM</div>
        <div class="time-marker">12 AM</div>
        <div class="time-marker">1 AM</div>
        <div class="time-marker">2 AM</div>
    </div>
    <!-- THE 26TH -->
    <div class="days">
        <div class="day mon">
        <div class="date">
            <p class="date-num">26th</p>
            <p class="date-day">Thu</p>
        </div>
        <div class="events">
            <div class="event start-<?php echo $eventStartTime; ?> end-<?php echo $eventEndTime; ?> <?php echo $eventType; ?>">
            <p class="time">EVENT NAME <br> <?php echo $eventStartTime; ?> - <?php echo $eventEndTime; ?></p>
            </div>
        </div>
        </div>
        <!-- THE 27TH -->
        <div class="day tues">
        <div class="date">
            <p class="date-num">27th</p>
            <p class="date-day">Fri</p>
        </div>
        <div class="events">
            <!-- for all tickets in cart, if event date == 27th, paste events -->
        </div>
        </div>
        <!-- THE 28TH -->
        <div class="day wed">
        <div class="date">
            <p class="date-num">28th</p>
            <p class="date-day">Sat</p>
        </div>
        <div class="events">
            <!-- for all tickets in cart, if event date == 28th, paste events -->
        </div>
        </div>
        <!-- THE 29TH -->
        <div class="day thurs">
        <div class="date">
            <p class="date-num">29th</p>
            <p class="date-day">Sun</p>
        </div>
        <div class="events">
            <!-- for all tickets in cart, if event date == 29th, paste events -->
        </div>
        </div>
        <!-- THE 30TH -->
        <div class="day fri">
        <div class="date">
            <p class="date-num">30th</p>
            <p class="date-day">Mon</p>
        </div>
        <div class="events">
            <!-- for all tickets in cart, if event date == 30th, paste events -->
        </div>
        </div>
    </div>
    </div>
</div>

<script>
    function CalClicked() {
        var container = document.querySelector(".calendar");
        if (container.style.display === "none") {
          container.style.display = "block";
        } else {
          container.style.display = "none";
        }
    }
</script>
