<?php
/****************************************************
 * déconnexion (suppression des données de sessions)
 * **************************************************
*/


// récupération des donnée dans un tableau
session_start();
$_SESSION = [];

// suppression des données + redirection
session_destroy();
header('Location: ../../login.php');