<?php
	$db = pg_connect('host=tbminstance.cggqgr2l3a54.us-west-2.rds.amazonaws.com port=5432 dbname=mydb user=kchow password=230497Ao')
	or die ('Could not connect: ' . pg_last_error());
	$title = $_POST['A'];
	$author = $_POST['B'][0];
	$ISBN = $_POST['C'];
	$publisher = $_POST['D'];
	$image = $_POST['E'];
	$year = $_POST['F'];
	$edition = $_POST['G'];
	$soldby = $_POST['H'];
	$price = $_POST['I'];
	$condition = $_POST['J'];
	$linkfb = $_POST['K'];
	$query = "INSERT INTO ufl(title, author, ISBN, publisher, image, year, edition, soldby, price, condition, linkfb) values('" . $title ."', '" . $author . "', '" . $ISBN . "', '" . $publisher . "', '" . $image . "', '" . $year . "', '" . $edition . "', '" . $soldby . "', '" . $price . "', '" . $condition . "', '" . $linkfb . "')";
	$result = pg_query($db, $query) or die('Query failed: ' . pg_last_error());
	/*$row = pg_fetch_row($result);
	$yes = $row[0];
	echo $yes;*/
	if ($result)
	{
		echo "Your listings has been created.";
	}
	//echo $title . $author +  " " + $ISBN + " " + $publisher + " " + $image + " " + $year + " " + $edition + " " + $soldby + " " + $price + " " + $condition + " " + $linkfb;
	pg_close($db);
?>