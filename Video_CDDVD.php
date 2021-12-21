<?php
require_once 'VideoConnect.php';
?>
<form action = "Video_CDDVD.php" method = "GET">
<br>
Заказ путёвок:
 <input type = "radio" id = 1 name = "knpk" value = "самостоятельно"> <label for = 1>самостоятельно</label>
 <input type = "radio" id = 2 name = "knpk" value = "не самостоятельно"> <label for = 2>не самостоятельно</label>
 <br>
 <input type = "submit" name = "submit2" value = "Искать">
</form>
<?php
if ($_GET['submit2'])
{
	$result1 = mysqli_query($link,"SELECT
  disks.`№_of_disk`,
  disks.Name,
  disks.Receipt_date,
  disks.Rental_price,
  disks.type
FROM disks
WHERE disks.type = '$_GET[knpk]'");
$rows1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
echo '<caption>'."заказ " . $_GET['knpk'] .'</caption>';
echo '<table border="1">';
echo '<tr>';
echo '<th>'."Маршрут".'</th>';
echo '<th>'."Дата начала".'</th>';
echo '<th>'."Количество дней".'</th>';
echo '<th>'."Код клиента".'</th>';
echo '</tr>';
foreach ($rows1 as $row)
{
	

	echo '<tr>';
	echo '<td>'.$row['Name'].'</td>'; 
	echo '<td>'.$row['Receipt_date'].'</td>';
	echo '<td>'.$row['Rental_price']." руб.".'</td>';
	echo '<td>'.$row['type'].'</td>';
	echo '</tr>';
	
}

}
echo '</table>';

?>
<form action="Video_MAINMENU.php">
<br>
<input type = "submit" name = "submit5" value = "Перейти на главную"><br>
</form>