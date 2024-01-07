<?php
/* connexion à la base de donnée */
session_start();
require('actions/database.php');


// validation formulaire inscription
if(isset($_POST['validate']))
{
    // vérification des infos
    if ( !empty($_POST['pseudo']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['password']) )
    {
        // Récupère les valeurs du formulaire
        $user_pseudo    = htmlspecialchars($_POST['pseudo']);
        $user_prenom    = htmlspecialchars($_POST["firstname"]);
        $user_nom       = htmlspecialchars($_POST["lastname"]);
        $user_password  = $_POST["password"];


        /******************************************************MOT-DE-PASSE***************************************************/
        // vérifie le mot de passe
        if (strlen($user_password) < 12)
        {
            header('Location: errorSignup.php');
            exit;
        }

        // Vérifier que le mot de passe contient au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial
        if (!preg_match('/[A-Z]/', $user_password) || !preg_match('/[a-z]/', $user_password) || !preg_match('/[0-9]/', $user_password) || !preg_match('/[!@#$%^&*()\-_=+{};:,<.>]/', $user_password))
        {
            echo "Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre et un caractère spécial.";
            exit;
        }
        else
        {
            // double sécurisation du mot de passe avec un sel
            $salt = bin2hex(random_bytes(12));
            $user_password_hashed = password_hash($user_password, PASSWORD_BCRYPT);

            // vérifie que l'user n'existe pas dans la base
            $check_if_user_already_exist = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
            $check_if_user_already_exist->execute([$user_pseudo]); // [valeur à indiquer]

            // var_dump($user_password_hashed);

            // si pseudo n'existe pas alors créer user
            if ($check_if_user_already_exist->rowCount() == 0)
            {
                $insert_user_on_website = $bdd->prepare('INSERT INTO users (prenom, nom, pseudo, mdp) VALUES (?, ?, ?, ?)');
                $insert_user_on_website->execute([$user_prenom, $user_nom, $user_pseudo, $user_password_hashed]);


                // récup les infos par rap à celui qui vient de s'inscrire
                $get_info_of_this_user_req = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND pseudo = ?');
                $get_info_of_this_user_req->execute([$user_nom, $user_prenom, $user_pseudo]);


                $user_infos = $get_info_of_this_user_req->fetch();


                // authentification user + création données sessions
                $_SESSION['auth']      = true;
                $_SESSION['id']        = $user_infos['id'];
                $_SESSION['lastname']  = $user_infos['prenom'];
                $_SESSION['firstname'] = $user_infos['nom'];
                $_SESSION['pseudo']    = $user_infos['pseudo'];


                // redirection de l'user vers page d'accueil
                header('Location: index.php');
            }
            else
            {
                $error_msg = 'L\'utilisateur existe déjà !';
            }
        }
        /*********************************************************************************************************************/
    }
    else
        $error_msg = 'Veuillez compléter tous les champs...';
}