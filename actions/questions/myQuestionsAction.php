<?php
/************************************************
 * Réupère les questions posées par l'utilisateur
 ************************************************
 */

require('actions/database.php');

// récupère ces infos par rapport à l'utilisateur connecté
$get_all_my_questions = $bdd->prepare('SELECT id, titre, contenu, date_publication FROM questions WHERE id_auteur = ? ORDER BY id DESC');

// récupère les infos de cet utilisateur
$get_all_my_questions->execute([$_SESSION['id']]); //([par_rapport_à_ces_données])