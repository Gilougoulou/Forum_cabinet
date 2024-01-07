<?php
/***********************************
 * Permet d'accéder à une question *
 ***********************************
 */
require('actions/database.php');


// validation du formulaire par rapport à l'id de l'url
if (isset($_GET['id']) && !empty($_GET['id']))
{
    $id_of_the_question = $_GET['id'];

    // récupération des infos de la question par rapport à l'id de l'url   
    $check_if_question_exist = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $check_if_question_exist->execute(array($id_of_the_question));


    // vérifie si la question existe
    if ($check_if_question_exist->rowCount() > 0)
    {
        // récupère les infos de la requête dans une nouvelle variable
        $question_info = $check_if_question_exist->fetch();


        // une var pour chaque info pour pouvoir les afficher
        $question_title            = $question_info['titre'];
        $question_content          = $question_info['contenu'];
        $question_id_author        = $question_info['id_auteur'];
        $question_pseudo_author    = $question_info['pseudo_auteur'];
        $question_publication_date = $question_info['date_publication'];
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