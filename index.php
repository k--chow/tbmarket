<?php session_start(); ?>
<html>
<head>
<title> Textbook Market | </title> <!--add title-->
<link rel="stylesheet" href="style.css" />

<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="main.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>


<body>

<div id="header">
<div class="row">
<div class="col-md-4 col-sm-12" >
<a href=""><button type="button" class="btn btn-lg btn-success">Home</button></a>
<button type="button" class="btn btn-lg btn-success" onclick="aboutPage()">About</button>
<button type="button" class="btn btn-lg btn-success" onclick="getListings()">My Listings</button>
</div>
<div class="col-md-8 col-sm-12">
<h1 class="title"><kbd>Textbook Market</kbd>&nbsp; &nbsp;<small>Buy and sell textbooks!</small></h1><hr>
</div>
</div>
<div id="main">
<div id="container-fluid">
<div class="col-xs-12 col-sm-12">
<!--<button onclick="javascript: enter()">Enter</button>-->
<div id="bar">
<form method="post" id="searchForm">
	<kbd>Enter a textbook to buy or sell<br> <br></kbd>
	 <input type="text" id ="query" name="query" /><br><br>
	 <select name="network">
	 <option value="" disabled selected>Choose a network</option>
	 <option value="ufl">University of Florida</option>
	 </select><br><br>
	<input type="submit" value="Search Textbook" class="btn btn-lg btn-success"/><br><br>
</form>
</div><!--end of bar-->
<div id="results"></div>
</div>
</div>
</div>

<!--<p id="status"></p>
</div>-->

<div id="sidebar">
<?php include('commons/sidebar.php');?>

</div>

<div id="footer">
<!--<?php include('commons/footer.php');?>-->
</div>

</body>
</html>