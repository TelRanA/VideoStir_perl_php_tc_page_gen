<HTML>
<HEAD>
<TITLE>Test Videostir</TITLE>
<script type="text/javascript">
function MM_jumpMenu(targ,selObj,restore){ //v3.0
  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
  if (restore) selObj.selectedIndex=0;
}
</script>
</HEAD>
<BODY>
<?php
if(!isset($_POST['width']) || !isset($_POST['height']) || !isset($_POST['inputFile'])) {
echo '<form action="upload.php" method="post" enctype="multipart/form-data">
    Select input file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <input type="submit" value="Upload file" name="submit">
</form>
<hr>
<form action="index.php" method="post" name="frm">
	<p>Select input file: <select name="inputFile">
		<option value="">---</option>
		<option value="1">item1</option>
		<option value="2">item2</option>
		<option value="3">item3</option>
		<option value="4">item4</option>
	</select></p><br>
	<p>Input required browser window width: <input name="width" type="text" size="10" maxlength="4"></p>
	<p>Input required browser window height: <input name="height" type="text" size="10" maxlength="4"></p>
	<p><input name="Button" type="button" onMouseUp="document.frm.width.value=window.innerWidth;
	document.frm.height.value= window.innerHeight ;" value="Get current browser window dimensions">
	<input type="submit" value="Generate test cases">
	<input type="reset" value="Reset"></p>
</form>';
}
else {
echo "<h1>Screen Resolution:</h1>";
echo "<p>Width  : ".$_POST['width']."\tHeight : ".$_POST['height']."</p>";
$script_string = "perl perl/player_test_added.pl in/input.txt ".$_POST['width']." ".$_POST['height'];
echo "<hr>\n<p>script Start string: \"$script_string\"</p>";
$result = shell_exec($script_string);
echo $result.
'<hr>
<a href="index.html">Global Index</a>';
}
?>
</BODY>
</HTML>