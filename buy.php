<?php session_start(); ?>
<html>

<title> Textbook Market | Buy</title> <!--add title-->
<?php include('commons/header2.php');?>


<body>

<div id="header">
<div class="row">

</div>
</div>

<div id="main">
<div id="container-fluid">
<div class="col-xs-12 col-sm-12">
<div id="bar">
<div class="col-md-6"><!--left-->

<form id="searchListingForm">
	<br><br><p>Enter a title or ISBN<p>
	 <input type="text" id ="tit" name="tit" required/>
	 <p>Enter an edition number<p>
	 <input type="text" id="ed" name="ed" required /><br><br>
	 <!--<select name="network">
	 <option value="" disabled selected>Choose a network</option>
	 <option value="ufl">University of Florida</option>
	 </select><br><br>-->
	<input type="submit" value="Search Textbook" class="btn btn-lg btn-success"/><br><br>
</form>
</div>
<div class="col-md-6">
<div id="results"></div>
</div>
</div>

</div><!--end of bar-->
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