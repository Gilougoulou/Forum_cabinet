<?php
/****************************************
 * Affichage du profil d'un utilisateur *
 ****************************************
 */

require('actions/database.php');


// vérifie si id url est bien en paramètre
if (isset($_GET['id']) && !empty($_GET['id']))
{
    // récupération id URL
    $id_of_user = $_GET['id'];

    // récupération donnée de l'user
    $check_if_users_exists = $bdd->prepare('SELECT pseudo, nom, prenom FROM users WHERE id = ?'); 
    $check_if_users_exists->execute(array($id_of_user));

    
    // vérifie si user existe
    if ($check_if_users_exists->rowCount() > 0)
    {
        // récupération info user
        $users_infos = $check_if_users_exists->fetch();
        

        // une var par info de l'user
        $user_pseudo    = $users_infos['pseudo'];
        $user_lastname  = $users_infos['nom'];
        $user_firstname = $users_infos['prenom'];


        // récupération des questions de l'user
        $get_his_questions = $bdd->prepare('SELECT * FROM questions WHERE id_auteur = ? ORDER BY id DESC');
        $get_his_questions->execute(array($id_of_user));
    }
    else
    {
        $error_msg = 'Aucun utilisateur trouvé.e.';
    }
}
else
{
    $error_msg = 'Aucun utilisateur trouvé.e.';
}