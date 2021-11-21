<?php

$servername= "localhost";
$sqlusername= "id17528261_silvercodes";
$sqlpassword = "HXzHhTE637c6haI[";
$db_name = "id17528261_fiftyarc_institute";

$conn = mysqli_connect($servername, $sqlusername, $sqlpassword, $db_name);

if (!$conn) {
	die("Connection failed: ". mysqli_connect_error());
}