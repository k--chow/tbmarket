<?php
	$db = pg_connect('host=tbminstance.cggqgr2l3a54.us-west-2.rds.amazonaws.com port=5432 dbname=mydb user=kchow password=230497Ao')
	or die ('Could not connect: ' . pg_last_error());
	$linkfb = $_POST['A'];

	$query = "Select * from ufl where linkfb = '" . $linkfb . "'";
	$result = pg_query($db, $query) or die('Query failed: ' . pg_last_error());
	/*$row = pg_fetch_row($result);
	$yes = $row[0];
	echo $yes;*/
	$rows = pg_num_rows($result);
	echo "<h1>Your Listings</h3>";
	for ($i = 0; $i< $rows; ++$i)
	{
		echo '<br>Title: ' . pg_fetch_result($result, $i, 'title') . '<br>';
		echo 'Author: ' . pg_fetch_result($result, $i, 'author')	. '<br>';
		echo 'ISBN: '	. pg_fetch_result($result, $i, 'ISBN')	. '<br>';
		echo '<img src="' . pg_fetch_result($result, $i, 'image')	. '"></img>' . '<br>';
		echo 'Price: $'	. pg_fetch_result($result, $i, 'price')	. '<br>';
		echo 'Condition: '	. pg_fetch_result($result, $i, 'condition')	. '<br>';
		echo '<button class="btn btn-warning">Delete this listing</button>';
	}
	

	
	//echo $title . $author +  " " + $ISBN + " " + $publisher + " " + $image + " " + $year + " " + $edition + " " + $soldby + " " + $price + " " + $condition + " " + $linkfb;
	if ($rows == 0)
	{
		echo 'You have no listings. ';
	}
	
	pg_close($db);
?>