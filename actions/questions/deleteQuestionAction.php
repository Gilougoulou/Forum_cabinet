<?php
/******************************
 * Suppression d'une question *
 ******************************
 */

// récup les données de sessions
session_start();


// vérifie si l'user est bien authentifié
if (!isset($_SESSION['auth']))
{
    header('Location: ../../login.php');
}


require('../database.php');


// validation de l'URL
if (isset($_GET['id']) && !empty($_GET['id']))
{
    $id_of_the_question = $_GET['id'];


    // récupère toutes les données de la question ou l'id celui du paramètre de l'URL, car c'est qui indique si une question existe par rapport à la BDD
    $check_if_question_exist = $bdd->prepare('SELECT id_auteur FROM questions WHERE id = ?');
    $check_if_question_exist->execute(array($id_of_the_question));


    // vérifie si la question existe dans la base par rapport à la requête précédente
    if ($check_if_question_exist->rowCount() > 0)
    {
        // récup toutes les données de question pour récupérer l'id auteur
        $question_info = $check_if_question_exist->fetch();
        
        // vérifie que l'auteur de la question correspond à l'user courant
        if ($question_info['id_auteur'] == $_SESSION['id'])
        {
            // suppression de la question
            $delete_this_question = $bdd->prepare('DELETE FROM questions WHERE id = ?');
            $delete_this_question->execute(array($id_of_the_question));

            header('Location: ../../my-questions.php');
        }
        else
        {
            echo 'Vous n\'avez pas le droit de supprimer cette question';    
        }
    }
    else
    {
        echo 'Aucune question n\'a été trouvé.';    
    }
}
else
{
    echo 'Aucune question n\'a été trouvé.';
}