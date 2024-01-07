<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php
        echo '
        <div class="alert alert-danger" role="alert">
            Votre mot de passe doit  : 
            <ul>
                <li>
                    faire au minimum 12 caractères,
                </li>
                <li>
                    une lettre majuscule,
                </li>  
                <li>
                    une lettre minuscule,
                </li>
                <li>
                    un chiffre,
                </li>
                <li>
                    un caractère spécial.
                </li>
            </ul>
            <a href="signup.php" class="alert-link">Revenir en arrière</a>.
        </div>';
    ?>
</body>
</html>