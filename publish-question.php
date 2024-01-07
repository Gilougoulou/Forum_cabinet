<?php 
    require('actions/questions/publishQuestionAction.php'); 
    require('actions/users/securityAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>

    <?php include 'includes/navbar.php'; ?>

    <div class="container">
        <h3>Publier une question</h3>
    </div>

    <form method="POST" class="container">    
        <?php
            // vérifie l'existence de la variable $error_msg, puis l'affiche par rapport à la cdt du fichier signupAction voir ligne.9-21
            if (isset($error_msg))
                echo '<h3>' . $error_msg . '</h3>';
            else if (isset($success_msg))
                echo '<h3>' . $success_msg . '</h3>';
        ?>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
            <textarea class="form-control" name="content"></textarea>
        </div>


        <button type="submit" class="btn btn-primary" name="validate">Publier la question</button>

    </form>

</body>
</html>