<?php 
    function getByUsername($userCreateUsername) 
    {
      include('../server/connect-db.php');
      
      $result = $connect->query("SELECT * FROM user WHERE username = '$userCreateUsername'")->fetch(PDO::FETCH_ASSOC);

      return $result;
    }

    function createUsername($userCreateUsername,$userCreatePassword)
    {
      include('../server/connect-db.php');

      $result = $connect->query("INSERT INTO user SET username = '$userCreateUsername', password = '$userCreatePassword'");

      return $result;
    }
