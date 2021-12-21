<?php
require_once 'VideoConnect.php';
?>
<form action = "Video.php" method = "GET">
Выбрать маршрут:<SELECT name = "Janre">
<?php
$result = mysqli_query($link,"SELECT
  film_janre.Janre
FROM film_janre");
$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
foreach ($rows as $row)
{
	echo "<option>". ($row['Janre']."</option>");
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
  director.First_Name,
  director.Last_Name,
  films.Country,
  films.Release_date,
  films.Duration,
  films.Language
FROM films
  INNER JOIN film_janre
    ON films.Janre_code = film_janre.Code_janre
  INNER JOIN director
    ON director.film_code = films.film_kode
    AND films.Director_Code = director.Director_Code
WHERE film_janre.Janre = '$_GET[Janre]'");
$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);
echo '<caption>'."маршрут " . $_GET['Janre'] .'</caption>';
echo '<table border="1">';
echo '<tr>';
echo '<th>'."категория".'</th>';
echo '<th>'."гид".'</th>';
echo '<th>'."Стоимость одного дня проживания".'</th>';
echo '<th>'."стоимость проезда".'</th>';
echo '<th>'."Год".'</th>';
echo '<th>'."Время стоянки".'</th>';
echo '</tr>';
foreach ($rows as $row)
{
	

	echo '<tr>';
	echo '<td>'.$row['Name'].'</td>';
	echo '<td>'.$row['First_Name']." ".$row['Last_Name'].'</td>';
	echo '<td>'.$row['Country'].'</td>';
	echo '<td>'.$row['Language'].'</td>';
	echo '<td>'.$row['Release_date']."г.".'</td>';
	echo '<td>'.$row['Duration']." мин.".'</td>';
	echo '</tr>';
	
}

}
echo '</table>';
?>
<form action = "Video_MAINMENU.php">
<br>
<input type = "submit" name = "submit3" value = "Вернуться на главную">
</form>
