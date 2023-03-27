<?php
include __DIR__ . '/../header.php';
?>

<aside class="filter_events">

  <fieldset id="filter_event_type">
    <legend>Select event</legend>

    <div>
      <input type="radio" id="" name="event_type" value="yummy">
      <label for="filter_yummy">Yummy</label>
    </div>
    <div>
      <input type="radio" id="" name="event_type" value="dance">
      <label for="filter_dance">Dance</label>
    </div>
    <div>
      <input type="radio" id="" name="event_type" value="history">
      <label for="filter_history">History</label>
    </div>
    <div>
      <input type="radio" id="" name="event_type" value="jazz">
      <label for="filter_jazz">Jazz</label>
    </div>

  </fieldset>

  <fieldset id="filter_event_date">
    <legend>Select date</legend>

    <div>
      <input type="radio" id="" name="event_date" value="2023-07-26">
      <label for="filter_26">July 26th</label>
    </div>
    <div>
      <input type="radio" id="" name="event_date" value="2023-07-27">
      <label for="filter_27">July 27th</label>
    </div>
    <div>
      <input type="radio" id="" name="event_date" value="2023-07-28">
      <label for="filter_28">July 28th</label>
    </div>
    <div>
      <input type="radio" id="" name="event_date" value="2023-07-29">
      <label for="filter_29">July 29th</label>
    </div>

  </fieldset>
</aside>
<div id="tickets">

</div>


<script>

  var isEventSelected = false;
  var isDateSelected = false;

  document.getElementById("filter_event_type").addEventListener('click', function (event) {
    if (event.target && event.target.matches("input[type='radio']")) {
      isEventSelected = true;
      filter(isEventSelected, isDateSelected);
    }
  });

  document.getElementById("filter_event_date").addEventListener('click', function (event) {
    if (event.target && event.target.matches("input[type='radio']")) {
      isDateSelected = true;
      filter(isEventSelected, isDateSelected);
    }
  });


  fetch('http://localhost/api/ticket', {
    method: 'GET'
  })
    .then(result => result.json())
    .then((data) => {
      console.log(data);
    })
    .catch(error => console.log(error));


  function filter(isEventSelected, isDateSelected) {

    var link = "";
    if (isEventSelected && isDateSelected) {
      var event = document.querySelector('input[name = event_type]:checked').value;
      var date = document.querySelector('input[name = event_date]:checked').value;
      link = 'http://localhost/api/ticket/filter?event=' + event + '&date=' + date;
    }
    else if (!isEventSelected && isDateSelected) {
      var date = document.querySelector('input[name = event_date]:checked').value;
      link = "http://localhost/api/ticket/filter?date=" + date;
    }
    else if (isEventSelected && !isDateSelected) {
      var event = document.querySelector('input[name = event_type]:checked').value;
      link = "http://localhost/api/ticket/filter?event=" + event;
    }

    fetch(link)
      .then(result => result.json())
      .then((data) => {
        console.log(data);
        var tickets = document.getElementById("tickets");
        tickets.innerHTML = "";
        data.forEach(element => {
          loadTicket(element);
        });
      })
      .catch(error => console.log(error));
  }

  function loadTicket(ticketInput) {
    var divCard = document.createElement("div");
    divCard.className = "card w-50";
    var divCardBody = document.createElement("div");
    divCardBody.className = "ticket-card-body";
    var cardTitle = document.createElement("h1");
    cardTitle.className = "card-title";
    var numberSelector = document.createElement("div");
    numberSelector.className = "number-selector";
    var price = document.createElement("p");
    price.className = "card-text";
    var addTocart = document.createElement("a");
    addTocart.className = "btn btn-primary";
    addTocart.innerHTML = "Add to cart";
    cardTitle.innerHTML = ticketInput.title;
    price.innerHTML = ticketInput.price;
    divCardBody.append(cardTitle, numberSelector, price, addTocart);
    divCard.appendChild(divCardBody);
    tickets.appendChild(divCard);
  }

</script>


<?php
include __DIR__ . '/../footer.php';
?>