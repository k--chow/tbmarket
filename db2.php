<?php
	$db = pg_connect('host=localhost port=5432 dbname=test1 user=postgres password=apassword')
	or die ('Could not connect: ' . pg_last_error());
	$A = $_POST['A'];
	$query = "SELECT * FROM users WHERE "
?>