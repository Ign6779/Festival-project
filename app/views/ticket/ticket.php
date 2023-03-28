<?php
include __DIR__ . '/../header.php';
?>
<div class="ticketpage">
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
  <div class="cal-section-on-ticketpage">
    <?php
    include __DIR__ . '/../components/Calendar.php';
    ?>
  </div>
</div>

<div id="tickets">

</div>


<script>
  window.onload = cartCount;
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
    var price = document.createElement("p");
    price.className = "card-text";
    var addTocart = document.createElement("a");
    addTocart.className = "btn btn-primary";
    addTocart.innerHTML = "Add to cart";
    addTocart.onclick = function () {
      addToCart(ticketInput.id);
    };
    cardTitle.innerHTML = ticketInput.title;
    price.innerHTML = ticketInput.price;
    divCardBody.append(cardTitle, numberSelector, price, addTocart);
    divCard.appendChild(divCardBody);
    tickets.appendChild(divCard);
  }

  function cartCount() {
    var cartAmount = document.getElementById("cartamount");
    cartAmount.innerHTML = "";
    fetch('/api/cart/cartCount').then(result => result.json())
      .then((data) => {
        console.log(data);
        cartAmount.innerHTML = data;

      })
      .catch(error => console.log(error));
  }

  function addToCart(id) {
    fetch('/api/cart/addToCart?qnt=1&ticketId=' + id, {
      method: 'GET'
    }).then(result => result.json())
      .then((data) => {
        console.log(data);
        cartCount();
        itemCount(id);
      })
      .catch(error => console.log(error));
  }

</script>


<?php
include __DIR__ . '/../footer.php';
?>