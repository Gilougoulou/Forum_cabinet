<?php require('actions/users/signupPinAction.php'); ?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<link rel="stylesheet" href="./assets/signupPin.css">
<body>
    <div class="container">
        <h3>Inscription : création d'un code pin</h3>
    </div>

    <br>
    <?php
        if (isset($php_errormsg))
            echo '<h4 class="container">' . $php_errormsg . '</h4>';
    ?>

    <form method="POST">
        <p>Votre code pin pour la récupération de votre compte est le : <span name="afficher_code" id="afficher_code"></span></p>

        <button type="submit" name="validate" class="btn btn-primary">J'ai compris !</button>
    </form>
</body>
<script>
    const code          = [];

    while (code.length < 6)
    {
        let value_code = 0; 
        value_code     += Math.floor(Math.random() * 9);
        
        code.push(value_code);

        afficher_code.textContent += `${value_code}`;
    }
</script>
</html>