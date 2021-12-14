<?php
require_once'mysql.localhost';
?>
<form action="marh_pyt2.php" method="GET">
 Автор:<select name="Namepyt">
 <?php
$result=mysqli_query($link,"SELECT
  janr.janr
FROM janr");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach ($rows as $row)
{
	echo"<option>". ($row['janr']."</option>");
}
?>
 </select><br>
<input type="submit" name="submit" value="Поиск"><br>
</form>
<?php
if($_GET['submit'])
{
	$result=mysqli_query($link,"SELECT
  book.Namepyt,
  author.Firstmarh,
  author.Lastmarh
FROM marh
  INNER JOIN pyt
    ON book.id_pyt = pyt.id_pyt
  INNER JOIN janr
    ON book.id_janr = janr.id_janr
WHERE janr.janr = '$_GET[NameAuthor]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach ($rows as $row)
{
	print ($row['Namemarh']."<br>");
}
}
?>