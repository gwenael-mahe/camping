<?php
require '../class/bdd.php';
require '../class/admin.php';
session_start();
if($_SESSION['perm'] != true){
    header('location:../index.php');
}
else{
    $_SESSION['admin']->delete($_GET['id']);
    header('location:../admin.php');
}