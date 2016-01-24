
<html>
<body onload="getLocation()">
<p id="demo"></p>

<script>
var x = document.getElementsById("demo");
function getLocation()
{
    if (navigator.geolocation)
    {	
	navigator.geolocation.getCurrentPosition(showPosition);
    }
    else
    {
	document.write("Error!");
    }

  
}

function showPosition(position)
{
	self.location='loading2.php?lat=' + position.coords.latitude + '&long=' + position.coords.longitude + '&radius=5000';

}
</script>

</body>
</html>

