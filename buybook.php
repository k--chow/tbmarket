<?php
	$db = pg_connect('host=tbminstance.cggqgr2l3a54.us-west-2.rds.amazonaws.com port=5432 dbname=mydb user=kchow password=230497Ao')
	or die ('Could not connect: ' . pg_last_error());
	$title = $_POST['A'];
	$authors = $_POST['B'];
	$count = count($authors);
	$author= $authors[0];
	for($k = 1; $k<$count; $k++)
	{
	$author = $author .  ", " . $authors[$k];
	}
	//$ISBN = $_POST['C'];
	//$publisher = $_POST['D'];
	//$image = $_POST['E'];
	//$year = $_POST['F'];
	//$edition = $_POST['G'];
	//$soldby = $_POST['H'];
	//$price = $_POST['I'];
	//$condition = $_POST['J'];
	//$linkfb = $_POST['K'];
	$query = "Select * from ufl where title = '" . $title . "'";
	$result = pg_query($db, $query) or die('Query failed: ' . pg_last_error());
	$rows = pg_num_rows($result);
	echo "<h1>Listing for " . $title . " by </h1><h3> " . $author . "</h3>";
	for ($i = 0; $i< $rows; ++$i)
	{
		echo '<br>Edition: ' . pg_fetch_result($result, $i, 'edition')	. '<br />';
		echo 'Price: $'	. pg_fetch_result($result, $i, 'price')	. '<br />';
		echo 'Condition: '	. pg_fetch_result($result, $i, 'condition')	. '<br />';
		echo '<button class="btn btn-info" onclick="sendMessage('. pg_fetch_result($result, $i, 'linkfb') . ')">Message Seller</button><br />';
		
	}

	
	//echo $title . $author +  " " + $ISBN + " " + $publisher + " " + $image + " " + $year + " " + $edition + " " + $soldby + " " + $price + " " + $condition + " " + $linkfb;
	if ($rows == 0)
	{
		echo 'No listings for this book.';
	}
	pg_close($db);
?>