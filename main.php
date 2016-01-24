<?php
session_start();
?>

<?php

$destinationName = $_SESSION["destName"];
$destinationDistance = $_SESSION["destDist"];
$myLat = $_SESSION["myLat"];
$myLong = $_SESSION["myLong"];
$iter = 0;
$URL ="https://maps.googleapis.com/maps/api/place/nearbysearch/xml?location=".$myLat.",".$myLong."&radius=".$destinationDistance."&name=".$destinationName."&types=food&key=AIzaSyB7mF6y0BARNA80IKOT1zGwG5fw4XhqBew";

$doc = new DOMDocument();
$doc->load($URL);
$items = $doc->GetElementsByTagName('result');
$names = [];
$lats = [];
$longs = [];
if ($items->length == 0){
	?>
		<head>
		<meta charset= "utf -8" >
		<title> GitGrub </title>
		<style>
			input.locationfield {
				width: 2000px;
			}
		
		
			body{
			min-width: 100%;
			min-height: 100%;
			padding: 250px 550px;
			background-image: url("http://i.imgur.com/KsfdwUE.jpg");
			background-position: top center;
			background-repeat: no-repeat;
			background-color: #cccccc;
			bgproperties = "fixed";
			}
		</style>
	</head>
	<input type = "image" src = "http://i.imgur.com/6hcLlR2.png">
		<?php
	header('refresh: 10; url=failed.php');
}else{
	foreach ($items as $tag1)
	{
		$items2 = $tag1->GetElementsByTagName('name');
		$items3 = $tag1->GetElementsByTagName('location');

		foreach($items2 as $tag2)
		{
			$names[$iter] = $tag2->nodeValue;
		}

		foreach($items3 as $tag3)
		{
			$items4 = $tag3->GetElementsByTagName('lat');
			$items5 = $tag3->GetElementsByTagName('lng');
			foreach($items4 as $tag4)
			{
				$lats[$iter] = $tag4->nodeValue;
			}

			foreach($items5 as $tag5)
			{
				$longs[$iter] = $tag5->nodeValue;
			}
		}
		$iter += 1;
		if ($iter == 5){
			break;
		}
	}
}
$count = count($names);
$myArray[] = array();
for ($i = 0; $i < $count; $i++){
	$newArray[] = array();
	$newArray[] = $names[$i];
	$newArray[] = $lats[$i];
	$newArray[] = $longs[$i];
	$myArray[$i] = $newArray;
	unset($newArray);
}

?>

<?php if($count > 0) : ?>
		<head>
		<meta charset= "utf -8" >
		<title> GitGrub </title>
		<style>
			input.locationfield {
				width: 2000px;
			}
		
		
			body{
			min-width: 100%;
			min-height: 100%;
			padding: 250px 675px;
			background-image: url("http://i.imgur.com/KsfdwUE.jpg");
			background-position: top center;
			background-repeat: no-repeat;
			background-color: #cccccc;
			bgproperties = "fixed";
			}
			.boldtable, .boldtable td, .boldtable th, .boldtable tr,  
			{ 
			font-family:sans-serif; 
			font-size:20px;
			color:#ffffff; 
			 
			}
		</style>
	</head>
	<table border class=boldtable>
		<thead>
			<tr>
				<th> <font color = "#ffffff"> Names</font></th>
				<th><font color = "#ffffff">Latitudes</font></th>
				<th><font color = "#ffffff">Longitudes</font></th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($myArray as $row) : ?>
			<tr>
			<td><?php echo '<div style = "Color: white">'.$row[1].'</div>'?></td>
			<td><?php echo '<div style = "Color: white">'.$row[2].'</div>'?></td>
			<td><?php echo '<div style = "Color: white">'.$row[3].'</div>' ?></td>
			</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endif; ?>