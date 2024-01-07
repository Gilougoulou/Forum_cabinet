<?php require('actions/users/signupAction.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>

    <div class="container">
        <h3>Inscription au forum</h3>
    </div>

    <form method="POST" class="container">
        
        <?php
            // affiche msg erreur si pb lors de l'inscription ligne.9-21
            if (isset($error_msg))
                echo '<h3>' . $error_msg . '</h3>';
        ?>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo" placeholder="Tarzan">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nom</label>
            <input type="text" class="form-control" name="lastname" placeholder="Mon nom de famille">
        </div>
        
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Prénom</label>
            <input type="text" class="form-control" name="firstname" placeholder="Mon prénom">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" placeholder="************">
        </div>

        <button type="submit" class="btn btn-primary" name="validate">S'inscrire</button>

        
        <a href="./login.php"><p>J'ai déjà un compte, je me connecte</p></a>
    </form>

</body>
</html>