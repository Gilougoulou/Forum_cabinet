<?php
/***************************************************************
 * Affichage de toutes les questions ou de plusieurs questions *
 ***************************************************************
 */
require('actions/database.php');


// récupérer les questions sans recherche + limité à 5
$get_all_questions = $bdd->query('SELECT id, id_auteur, titre, contenu, pseudo_auteur, date_publication FROM questions ORDER BY id DESC LIMIT 0,5');

// vérifie si une recherche à été lancé par l'user
if (isset($_GET['search']) && !empty($_GET['search']))
{
    // récupération de l'id de l'url
    $user_search = $_GET['search'];
    
    // récupérer une question à partir de la barre de recherche
    $get_all_questions = $bdd->query('SELECT id, id_auteur, titre, contenu, pseudo_auteur, date_publication FROM questions WHERE titre LIKE "%' . $user_search . '%" ORDER BY id DESC');
}