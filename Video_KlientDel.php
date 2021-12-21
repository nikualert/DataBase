<?php
require_once 'VideoConnect.php';
?>
<form action = "Video_KlientDel.php" method = "GET">
<caption> Какого клиента вы хотите удалить? </caption>
<table border="1">
<tr>
<th> ФИО клиента </th>
</tr>
<tr>
<td> <SELECT name = "imya">
<?php
$result = mysqli_query($link,"SELECT
klients.Firstname
FROM klients");
$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach ($rows as $row)
{
	echo "<option>".($row['Firstname']."</option>");
}
?>
</select> </td>
</tr>
</table>
<input type = "submit" name = "submit1" value = "Удалить клиента"><br>
<br>
</form>
<?php
if ($_GET['submit1'])
{
	
	$result = mysqli_query($link,"DELETE 
	FROM klients 
	Where Firstname ='$_GET[imya]'
	LIMIT 1000");
	
}
?>
<br>
<form action="Video_MAINMENU.php">
<br>
<input type = "submit" name = "submit5" value = "Перейти на главную"><br>
</form>
