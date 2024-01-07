<?php
/***************************************
 * Afficher les réponse à une question *
 ***************************************
 */
require('actions/database.php');


// récupération de toutes les questions pour l'affichage par rapport à l'id de l'url
$get_all_answers_of_this_question = $bdd->prepare('SELECT id_auteur, pseudo_auteur, id_question, contenu FROM answers WHERE id_question = ? ORDER BY id DESC');
$get_all_answers_of_this_question->execute(array($id_of_the_question));