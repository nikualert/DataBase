<?php
require_once'mysql.localhost.php';
?>
<form action="маршрут" method="GET">
 Маршрут:<select name="Namemarh">
 <?php
$result=mysqli_query($link,"SELECT
  pyt.Firstmarh
FROM pyt");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach ($rows as $row)
{
	echo"<option>". ($row['Firstmarh']."</option>");
}
?>
 </select><br>
<input type="submit" name="submit" value="Поиск"><br>
</form>
<?php
if($_GET['submit'])
{
	$result=mysqli_query($link,"SELECT
  marh.Namemars
FROM marh
  INNER JOIN pyt
    ON marh.id_author = pyt.id_author
  INNER JOIN janr
    ON marh.id_janr = janr.id_janr
WHERE pyt.FirstName = '$_GET[Namepyt]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach ($rows as $row)
{
	print ($row['Namemarh']."<br>");
}
}
?>