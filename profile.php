<?php
    session_start();
    require('actions/users/showOneUsersProfileAction.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <?php 
        if (isset($error_msg)) 
        { 
            echo $error_msg; 
        }

        // si question existe, c'est que l'user existe
        if (isset($get_his_questions))
        {
        ?>
            <div class="card container">
                <div class="card-body">
                    <h4>Profile de <?= $user_pseudo; ?></h4>
                    <hr>
                    <p><?= '<h5> Nom : ' . $user_lastname . ' - Prénom ' . $user_firstname . '</h5>'; ?></p>
                </div>
            </div>
            <br>
        <?php
            while($question = $get_his_questions->fetch())
            {
            ?>
                <div class="card container">
                    <h5 class="card-header">
                        <a href="article.php?id=<?= $question['id']; ?>"><?= $question['titre']; ?></a>
                    </h5>
                    <div class="card-body">
                        <p class="card-text">
                            <?= $question['description']; ?>
                        </p>
                        <p>Question de <?= $question['pseudo_auteur']; ?> le <?= $question['date_publication']; ?></p>
                        <?php
                            if ($question['id_auteur'] == $_SESSION['id'])
                            {
                                ?>
                                <a href="article.php?id=<?= $question['id']; ?>" class="btn btn-primary">Accéder à la question</a>
                                <a href="edit-question.php?id=<?= $question['id']; ?>" class="btn btn-warning">Modifier la question</a>
                                <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id']; ?>" class="btn btn-danger">Supprimer la question</a>
                                <?php
                            }
                            ?>
                    </div>
                </div>    
            <br>
            <?php
            }

        }
    ?>
</body>
</html>