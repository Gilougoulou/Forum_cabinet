<?php 
    require('actions/users/securityAction.php');
    require('actions/questions/myQuestionsAction.php'); 
?>
<!DOCTYPE html>
<html lang="fr">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container">
        <h3>Mes questions</h3>
    </div>

    <!-- affichage des questions -->
    <div class="container">
        <?php
        while($question = $get_all_my_questions->fetch())
        {
            ?>
            <div class="card">
                <h5 class="card-header">
                    <a href="article.php?id=<?= $question['id']; ?>"><?= $question['titre']; ?></a>
                    <span>[<?= $question['date_publication']; ?>]</span>
                </h5>
                <div class="card-body">
                    <p class="card-text">
                        <?= $question['contenu']; ?>
                    </p>
                    <a href="article.php?id=<?= $question['id']; ?>" class="btn btn-primary">Accéder à la question</a>
                    <a href="edit-question.php?id=<?= $question['id']; ?>" class="btn btn-warning">Modifier la question</a>
                    <a href="actions/questions/deleteQuestionAction.php?id=<?= $question['id']; ?>" class="btn btn-danger">Supprimer la question</a>
                </div>
            </div>    
            <br>
            
            <?php
        }
        ?>
    </div>
</body>
</html>