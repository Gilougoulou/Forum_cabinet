<?php
/******************************
 * publication d'une question *
 ******************************
 */
session_start();
require('actions/database.php');

// validation du formulaire
if (isset($_POST['validate']))
{
    if (!empty($_POST['title']) && !empty($_POST['content']))
    {
        // récup des données du formulaire
        $question_title         = htmlspecialchars($_POST['title']);
        $question_content       = nl2br(htmlspecialchars($_POST['content']));
        $question_id_author     = $_SESSION['id'];
        $question_pseudo_author = $_SESSION['pseudo'];


        // insertion donnée base de donnée
        $insert_question_on_website = $bdd->prepare('INSERT INTO questions (titre, contenu, id_auteur, pseudo_auteur) VALUES (?, ?, ?, ?)');
        $insert_question_on_website->execute(
        array(
                    $question_title,
                    $question_content, 
                    $question_id_author, 
                    $question_pseudo_author
            )
        );

        // message de réussite
        $success_msg = '<h3>Votre question a bien été envoyé.e !</h3>';
    }
    else
    {
        // message si échec
        $error_msg = '<h3>Message non envoyé.</h3>';
    }
}