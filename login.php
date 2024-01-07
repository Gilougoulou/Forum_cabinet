<?php require('actions/users/loginAction.php'); ?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>

    <div class="container">
        <h3>Connexion au forum</h3>
    </div>

    <form method="POST" class="container">
        
        <?php if (isset($error_msg)) echo '<h3>' . $error_msg . '</h3>'; ?>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
        </div>

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password">
        </div>

        <button type="submit" class="btn btn-primary" name="validate">Se connecter</button>

        
        <a href="./signup.php"><p>Je n'ai pas de compte, je m'inscris</p></a>
        <small><a href="./recover-my-account.php"><p>Je ne me souviens plus de mon mot de passe</p></a></small>
    </form>

</body>
</html>