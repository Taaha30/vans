<?php
session_start();
require '../config.php';
if (isset($_POST['action']) && $_POST['action'] == "loginTry") {
    $values = json_decode(stripslashes($_POST['data']));
        if (empty($values[0])) {
      echo "<span class='fail'>Incorrect password</span>";
      exit();
        }
        else {
          $password = $values[0];
          $password = $password;
          $password = mysqli_real_escape_string($connection, $password);

          $query = mysqli_query($connection, "select password from admin where uid = 1");
          $passwordarr = [];
          while($rows = mysqli_fetch_assoc($query)){
              $passwordarr[] = $rows["password"];
          }

          if (password_verify($password, $passwordarr[0])) {
            $_SESSION['login_user'] = $password; // Initializing Session
            $queryup = mysqli_query($connection, "UPDATE admin SET lastlogin = '".$datetime."' WHERE uid = 1");
            echo "<script>window.location.href = './delegates';</script>";
          }
          else {
      echo "<span class='fail'>Incorrect password</span>";
      exit();
          }
          mysqli_close($connection); // Closing Connection
        }
    }
  ?>