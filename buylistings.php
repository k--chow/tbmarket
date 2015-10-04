<?php
	
	$input = $_POST['A'];
	$ed = $_POST['C'];
	
	$db = pg_connect('host=tbminstance.cggqgr2l3a54.us-west-2.rds.amazonaws.com port=5432 dbname=mydb user=kchow password=230497Ao')
	or die ('Could not connect: ' . pg_last_error());
	$query = "Select * from ufl where" . " title " . " = '" . $input . "' AND edition = '" . $ed . "' OR ISBN = '" . $input . "' AND edition = '" . $ed . "'";
	$result = pg_query($db, $query) or die('Query failed: ' . pg_last_error());
	$rows = pg_num_rows($result);
	echo "<h1>Listings for " . $input . " edition </h1><h3> " . $ed . "</h3>";
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