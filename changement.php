<?php
include("connect.php");

$id = $_GET['ID'];
$stat = $_GET['statut'];

$query = "UPDATE emprunt SET statut=$stat WHERE id=$id";
$dbs -> query($query);
header('Location:reservationadmin.php');
?>