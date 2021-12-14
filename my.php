<?php 
   $host = 'localhost'; 
   $db_name = 'database';
   $user = 'user'; 
   $password = 'password';


      $connection = mysqli_connect($host, $user, $password, $db_name);

   
      $query = 'SELECT * FROM `USERS`';


      $result = mysqli_query($connection, $query);

   
      while($row = $result->fetch_assoc()){
         echo  $row['NAME'];
         echo  ' - ';
         echo  $row['FOOD'];
         echo  '<br>';
      }

 
      mysqli_close($connection);
?>