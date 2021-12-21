<?php
require_once 'VideoConnect.php';
?>
<form action = "Video_Director.php" method = "GET">
Выберите гида:<SELECT name = "director">
<?php
$result = mysqli_query($link,"SELECT
  director.Director_Code,
  director.First_Name,
  director.Last_Name
FROM director");
$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach ($rows as $row)
{
	echo "<option>".($row['First_Name']."</option>");
}
?>
</select>
<input type = "submit" name = "submit" value = "Поиск"><br>

</form>
<?php
if ($_GET['submit'])
{
	$result = mysqli_query($link,"SELECT
  films.Name,
  films.Country,
  films.Duration,
  disks.type,
  films.Release_date,
  disks.Rental_price
FROM films
  INNER JOIN director
    ON films.Director_Code = director.Director_Code
    AND director.film_code = films.film_kode
  INNER JOIN disks
    ON disks.film_code = films.film_kode
WHERE director.First_Name = '$_GET[director]'");
$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo '<caption>'."маршруты, которые он проводит " .$_GET['director'].'</caption>';
echo '<table border="1">';
echo '<tr>';
echo '<th>'."маршрут".'</th>';
echo '<th>'."цена".'</th>';
echo '<th>'."по времени".'</th>';
echo '<th>'."Тип ".'</th>';
echo '<th>'."Ценя за 1 день".'</th>';
echo '</tr>';
foreach ($rows as $row)
{
	

	echo '<tr>';
	echo '<td>'.$row['Name'].'</td>';
	echo '<td>'.$row['Country'].'</td>';
	echo '<td>'.$row['Duration']." мин.".'</td>';
	echo '<td>'.$row['type'].'</td>';
	echo '<td>'.$row['Rental_price']." руб.".'</td>';
	echo '</tr>';
	
}

}
echo '</table>';
?>
<form action="Video_MAINMENU.php">
<br>
<input type = "submit" name = "submit5" value = "Перейти на главную"><br>
</form>