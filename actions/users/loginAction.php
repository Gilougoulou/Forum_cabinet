<?php
/***********************************
 * traitement donnée pour connexion
 ***********************************
*/


session_start();
require('actions/database.php'); // on se réfèrre à partir du fichier principal


if (isset($_POST['validate']))
{
    if (!empty($_POST['pseudo']) && !empty($_POST['password']) )
    {
        $user_pseudo    = htmlspecialchars($_POST['pseudo']);
        $user_password  = htmlspecialchars($_POST['password']);


        // vérifie si l'user existe
        $check_if_user_exist = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $check_if_user_exist->execute(array($user_pseudo));


        if ($check_if_user_exist->rowCount() > 0)
        {
            $user_infos = $check_if_user_exist->fetch();

            if (password_verify($user_password, $user_infos['mdp']))
            {
                // authentification user + création données sessions
                $_SESSION['auth']      = true;
                $_SESSION['id']        = $user_infos['id'];
                $_SESSION['lastname']  = $user_infos['prenom'];
                $_SESSION['firstname'] = $user_infos['nom'];
                $_SESSION['pseudo']    = $user_infos['pseudo'];


                header('Location: index.php');
            }
            else
            {
                $error_msg = 'Votre mot de passe est incorrect.';
            }
        }
        else
        {
            $error_msg = 'Votre pseudo est incorrect.';
        }
    }
    else
    {
        $error_msg = 'Veuillez remplir tous les champs.';
    }
}