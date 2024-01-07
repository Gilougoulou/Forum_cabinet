<?php
/**************************
 * Réponse à une question *
 **************************
 */
require('actions/database.php');


//validation du formulaire pour la RÉPONSE
if (isset($_POST['validate']))
{
    // vérifie que le textarea n'est pas vide
    if(!empty($_POST['answer']))
    {
        // récupération du post de réponse
        $user_answer = nl2br(htmlspecialchars($_POST['answer']));


        // insertion en BDD
        $insert_answer = $bdd->prepare('INSERT INTO answers (id_auteur, pseudo_auteur, id_question, contenu) VALUES (?, ?, ?, ?)');
        $insert_answer->execute(array($_SESSION['id'], $_SESSION['pseudo'], $id_of_the_question, $user_answer));

        // redirection si réussite
        $success_msg = 'Réponse envoyé !';
    }
    else
    {
        // message d'erreur en cas d'échec
        $error_msg = "Veuillez remplir le champ réponse.";
    }
}