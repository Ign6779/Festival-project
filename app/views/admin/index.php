<?php
include __DIR__ . '/adminheader.php';
?>
<h2>Add information page on Dance</h2>
<select id="cars" name="cars">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="fiat">Fiat</option>
  <option value="audi">Audi</option>
</select>
<a href="" class="btn-primary">ADD</a>
<h2>Add information page on Jazz</h2>
<select id="artists" name="artists"></select>
<a href="" class="btn-primary">ADD</a>
<?php
var_dump($artists);
include '/app/views/footer.php';
?>
<style>
select {
  background: transparent;
  border: none;
  padding: 10px;
  font-size: 16px;
  color: #333;
  cursor: pointer;
}

/* Add custom styles to select element */
select {
  background-color: #f8f8f8;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 200px;
  max-width: 100%;
  height: 40px;
}
select::after {
  position: absolute;
  top: 14px;
  right: 10px;
  font-size: 16px;
  color: #555;
  pointer-events: none;
}

/* Style the option items */
select option {
  padding: 10px;
  background-color: #f8f8f8;
  color: #333;
}

/* Style the option items on hover */
select option:hover {
  background-color: #e0e0e0;
}

/* Style the option items when selected */
select option:checked {
  background-color: #ccc;
  color: #fff;
}
</style>
<script>
// Populate options with artists from $artists array
var artistsSelect = document.getElementById("artists");

// Filter artists based on ID less than 25
var filteredArtists = artists.filter(function(artist) {
  return artist.id < 25;
});

// Add filtered artists as options to the select element
filteredArtists.forEach(function(artist) {
  var option = document.createElement("option");
  option.value = artist.id;
  option.textContent = artist.name;
  artistsSelect.appendChild(option);
});
</script>

