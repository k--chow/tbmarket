
<html>
<head>
<title> Textbook Market | </title> <!--add title-->
<link rel="stylesheet" href="style.css" />

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="main.js"></script>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>


<body>

<div id="header">
<div class="row">
<div class="col-sm-4">
<a href=""><button type="button" class="btn btn-lg btn-success">Home</button></a>
<button type="button" class="btn btn-lg btn-success">About</button>
</div>
<div class="col-sm-8">
<h1 class="title">Textbook Market</h1><hr>
</div>
</div>
<div id="main">

<!--<button onclick="javascript: enter()">Enter</button>-->

<form method="post" id="searchForm">
	 <input type="text" style="width: 50%" id ="query" name="query" style="width: 50%" placeholder="Enter a textbook to buy or sell."/><br><br>
	<input type="submit" value="Search Textbook"/><br><br>
</form>

<div id="results"></div>
</div>

<!--<p id="status"></p>
</div>-->

<div id="sidebar">
<?php include('commons/sidebar.php');?>

</div>

<div id="footer">
<?php include('commons/footer.php');?>
</div>

</body>
</html>