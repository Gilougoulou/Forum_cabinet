<?php
/****************************************************************
 * Modification des informations d'une question de l'utilsateur *
 ****************************************************************
 */

require('actions/database.php');

// validation du formulaire
if (isset($_POST['validate']))
{
    if (!empty($_POST['title']) && !empty($_POST['content']))
    {
        // récupération des informations a trasnmettre dans la requête
        $new_question_title       = htmlspecialchars($_POST['title']);
        $new_question_content     = nl2br(htmlspecialchars($_POST['content']));


        // modification + insertion de la question dans la bdd par rapport à l'id de l'url
        $edit_question_on_website = $bdd->prepare('UPDATE questions SET titre = ?, contenu = ? WHERE id = ?');
        $edit_question_on_website->execute(array($new_question_title, $new_question_content, $id_of_question));

        // redirection vers page my-questions.php
        header('Location: my-questions.php');
    }
    else
    {
        $error_msg = 'Veuillez remplir tous les champs.';
    }
}

/* changer date publication quand modification faite ! */