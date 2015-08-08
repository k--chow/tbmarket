<html>
<script>
var title;
var ISBN;
var author;
var course;
function formChanged()
{
	title = document.getElementsByName('Title')[0].value;
	ISBN = document.getElementsByName('ISBN')[0].value;
	author = document.getElementsByName('Author')[0].value;
	course = document.getElementsByName('Course')[0].value;
}
function post()
{
	$.post('addTextbook.php', {A: title, B: ISBN, C: author, D: course}, function(data) {
		console.log(data);
		window.location = 'addTextbook.php';
	})
}
</script>
<form method="post" action="addTextbook.php" onsubmit="post()">
	Title: <input type="text" name="Title"/><br><br>
	ISBN: <input type="text" name="ISBN"/><br><br>
	Author: <input type="text" name="Author"/><br><br>
	Course: <input type="text" name="Course"/><br><br>
	<input type="submit" value="Add Textbook"/><br><br>
</form>



</html>