<!DOCTYPE html>
<html>
<body>

<p>Click the button to get your coordinates.</p>

<button onclick="getLocation()">Try It</button>

<p id="demo"></p>
<p id="t">0</p>
<script>
var x = document.getElementById("demo");
var t = document.getElementById("t");
setInterval(function() {
  t.innerHTML ++;
}, 10);
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  const d = new Date();
let time = d.getTime();
  x.innerHTML += "Latitude: " + position.coords.latitude +
  "<br>Longitude: " + position.coords.longitude;
}
</script>

</body>
</html>
