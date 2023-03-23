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
    <div class="days">
        <div class="day mon">
        <div class="date">
            <p class="date-num">26th</p>
            <p class="date-day">Thu</p>
        </div>
        <div class="events">
            <div class="event start-2 end-5 securities">
            <!-- <p class="title">Securities Regulation</p> -->
            <p class="time">2 PM - 5 PM</p>
            </div>
        </div>
        </div>
        <div class="day tues">
        <div class="date">
            <p class="date-num">27th</p>
            <p class="date-day">Fri</p>
        </div>
        <div class="events">
            <div class="event start-10 end-12 corp-fi">
            <!-- <p class="title">Corporate Finance</p> -->
            <p class="time">10 AM - 12 PM</p>
            </div>
            <div class="event start-1 end-4 ent-law">
            <!-- <p class="title">Entertainment Law</p> -->
            <p class="time">1PM - 4PM</p>
            </div>
        </div>
        </div>
        <div class="day wed">
        <div class="date">
            <p class="date-num">28th</p>
            <p class="date-day">Sat</p>
        </div>
        <div class="events">
            <div class="event start-11 end-12 writing">
            <!-- <p class="title">Writing Seminar</p> -->
            <p class="time">11 AM - 12 PM</p>
            </div>
            <div class="event start-2 end-5 securities">
            <!-- <p class="title">Securities Regulation</p> -->
            <p class="time">2 PM - 5 PM</p>
            </div>
        </div>
        </div>
        <div class="day thurs">
        <div class="date">
            <p class="date-num">29th</p>
            <p class="date-day">Sun</p>
        </div>
        <div class="events">
            <div class="event start-10 end-12 corp-fi">
            <!-- <p class="title">Corporate Finance</p> -->
            <p class="time">10 AM - 12 PM</p>
            </div>
            <div class="event start-4 end-5 ent-law">
            <!-- <p class="title">Entertainment Law</p> -->
            <p class="time">1PM - 4PM</p>
            </div>
        </div>
        </div>
        <div class="day fri">
        <div class="date">
            <p class="date-num">30th</p>
            <p class="date-day">Mon</p>
        </div>
        <div class="events">
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
