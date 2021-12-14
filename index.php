<?php
require_once'mysql.localhost.php';
?>
<form action="product_number_seats.php" method="GET">
 Категория маршрута:<input type="text" name="marsh"><br>
<input type="submit" name="submit" value="Поиск"><br>
</form>
<?php
if($_GET['submit'])
{
	
	$result=mysqli_query($link,"SELECT
  brand.brand,
  product.model,
  technical_data.number_of_seats
FROM technical_data
  INNER JOIN product
    ON technical_data.id_product = product.id_product
  INNER JOIN brand
    ON product.id_brand = brand.id_brand
WHERE technical_data.number_of_seats = '$_GET[NameAuthor]'");
$rows=mysqli_fetch_all($result,MYSQLI_ASSOC);
echo '<table border="1">';
echo '<tr>';
echo '<th>'."brand".'</th>';
echo '<th>'."model".'</th>';
echo '<th>'."number_of_seats".'</th>';
echo '</tr>';
foreach ($rows as $row)
{
	echo '<tr>';
	echo '<td>'.$row['brand'].'</td>';
	echo '<td>'.$row['model'].'</td>';
	echo '<td>'.$row['number_of_seats'].'</td>';
	echo '</tr>';
	

}
echo '</table>';
}
?>
<?php

