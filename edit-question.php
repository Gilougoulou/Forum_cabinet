<?php
    require('actions/users/securityAction.php');
    require('actions/questions/getInfosOfEditedQuestionAction.php');
    require('actions/questions/editQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<?php include 'includes/head.php'; ?>
</head>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container">
        <h3>Modification de ma question</h3>
    </div>

    <div class="container">
        <?php if (isset($error_msg)) echo '<h3>' . $error_msg . '</h3>'; ?>
        
    <?php
        if (isset($question_content))
        {
        ?>
            <form method="POST">    

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
                    <input type="text" class="form-control" name="title" value="<?= $question_title ?>">
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contenu de la question</label>
                    <textarea class="form-control" name="content"><?= $question_content ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary" name="validate">Modifier la question</button>

            </form>
        <?php
        }
    ?>

    </div>
    
</body>
</html>