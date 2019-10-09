<?php
session_start();

unset($_SESSION['id_admin']);
header('location:login_admin.php');
       

  ?>