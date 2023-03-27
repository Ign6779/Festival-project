<?php
include __DIR__ . '/../header.php';
?>

<aside class="filter_events">

  <fieldset id="filter_event_type">
    <legend>Select event</legend>

    <div>
      <input type="radio" id="filter_yummy" name="event_type" value="filter_yummy" onclick="filter('yummy')">
      <label for="filter_yummy">Yummy</label>
    </div>
    <div>
      <input type="radio" id="filter_dance" name="event_type" value="filter_dance" onclick="filter('dance')">
      <label for="filter_dance">Dance</label>
    </div>
    <div>
      <input type="radio" id="filter_history" name="event_type" value="filter_history" onclick="filter('history')">
      <label for="filter_history">History</label>
    </div>
    <div>
      <input type="radio" id="filter_jazz" name="event_type" value="filter_jazz" onclick="filter('jazz')">
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
<div id="tickets">

</div>


<script>

  fetch('http://localhost/api/ticket', {
    method: 'GET'
  })
    .then(result => result.json())
    .then((data) => {
      console.log(data);
    })
    .catch(error => console.log(error));


  function filter(event) {
    fetch('http://localhost/api/ticket/filter?event=' + event, {
      method: 'GET'
    })
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