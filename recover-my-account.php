<?php

?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>

    <div class="container">
        <h3>Réinitialisation du mot de passe</h3>
    </div>

    <form method="POST" class="container">
    
        <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Pseudo</label>
            <input type="email" class="form-control" placeholder="Tarzan">
        </div>
        
        <button type="submit" class="btn btn-primary" name="validate">Envoyer un mail</button>

        <a href="./login.php"><p>J'ai déjà un compte, je me connecte</p></a>
    </form>

</body>
</html>