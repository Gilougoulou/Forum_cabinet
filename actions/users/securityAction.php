<?php
/***************************************************
 * vérifie qu'un utilisateur est authentifié ou non
 * *************************************************
*/

session_start();
// si la sessions auth n'est pas à true (voir signupAction l.39) alors redirige sur la page de connexion
if (!isset($_SESSION['auth']))
    header('Location: login.php');