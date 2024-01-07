<?php

session_start();
require('actions/database.php');


// vérifie si le bouton validate a été déclenché
if (isset($_POST['validate']))
{
    // vérifie que la valeur de 'afficher_code' n'est pas vide
    if(!empty($_POST['afficher_code']))
    {
        // récupère le code dans la variable $code
        $code   = $_POST['afficher_code'];
        

        // check si l'user existe
        $check_if_user_exist = $bdd->prepare('SELECT id FROM users WHERE pseudo = ?');
        $check_if_user_exist->execute([$_SESSION['id']]);


        // si l'user existe alors insère le code en bdd
        if ($check_if_user_exist->rowCount() > 0)
        {
            // hash la valeur du code pin
            $code = password_hash($code, PASSWORD_BCRYPT);

            echo var_dump($code);

            $insert_user_pin = $bdd->prepare('INSERT INTO code_pin (id_user, code_pin) VALUE (?, ?)');
            $insert_user_pin->execute($_SESSION['id'], $code);


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

            header('Location: index.php');
        }
        else
        {
            header('Location: signup.php');
        }
    }
}