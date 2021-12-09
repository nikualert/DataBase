<?php
require_once'mysql.localhost.php';
?>
<form action="insert_brand.php" method="GET">
Маршрут:<input type="text" name="Namemarsh"><br>
<input type="submit" name="submit" value="Ввод"><br>
</form>
<?php
if($_GET['submit'])
{
	$result=mysqli_query($link,"INSERT HIGH_PRIORITY INTO brand(  id_brand, brand)
  VALUES (0, '$_GET[Namemarsh]')");

}
?>