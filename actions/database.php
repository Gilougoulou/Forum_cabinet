<?php
/*******************************************
 * fichier de connexion à la base de donnée*
 * *****************************************
 */


// connexion à la bdd + lancement d'une session

$DB_DSN           = "mysql:host=localhost;dbname=forum_video;charset=utf8";
$DB_PSEUDO        = "root";
$DB_user_password = "";

try
{
    $options = 
    [
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    $bdd = new PDO($DB_DSN, $DB_PSEUDO, $DB_user_password, $options);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}