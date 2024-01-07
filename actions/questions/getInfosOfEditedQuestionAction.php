<?php
/*********************************************************************
 * Page de récupération d'information d'une question de l'utilsateur *
 *********************************************************************
 */

require('actions/database.php');


// vérifie si id url est bien en paramètre
if (isset($_GET['id']) && !empty($_GET['id']))
{
    $id_of_question = $_GET['id'];


    // vérifie si question existe
    $check_if_question_exist = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $check_if_question_exist->execute([$id_of_question]);


    if ($check_if_question_exist->rowCount() > 0)
    {
        // récupère toutes les données de la question
        $question_infos = $check_if_question_exist->fetch();

        if ($question_infos['id_auteur'] == $_SESSION['id'])
        {
            $question_title       = $question_infos['titre'];
            $question_content     = $question_infos['contenu'];

            //formattage chaine pour ne pas avoir les balises apparentes
            $question_content     = str_replace('<br />', '', $question_content);
        }
        else
        {
            $error_msg = 'Vous n\'êtes pas l\'auteur de cette question.<br/>';
        }
    }
    else
    {
        $error_msg = 'Aucune question n\'a été trouvée.';
    }
}
else
{
    $error_msg = 'Aucune question n\'a été trouvée.';
}