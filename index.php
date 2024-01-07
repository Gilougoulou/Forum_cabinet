<!-- vérifie d'abord que l'utilisateur est bien authentifié (voir signupAction.php l.39 + securityAction.php) -->
<?php 
    session_start();
    require('actions/questions/showAllQuestionsAction.php');
?>
<!DOCTYPE html>
<?php include 'includes/head.php'; ?>
<html lang="fr">
<body>
    <!-- inclusion de la navbar -->
    <?php include 'includes/navbar.php'; ?>
    <?= $_SESSION['pseudo']; ?>

    <div class="container">
        <h3>Les questions des utilisateurs</h3>
    </div>

    <div class="container">
        <form method="GET">

            <div class="form-group row">

                <div class="col-8">
                    <input type="search" name="search" class="form-control" placeholder="Qui peut m'aider en PHP ?">
                </div>

                <div class="col-4">
                    <button class="btn btn-success" type="submit">Rechercher</button>
                </div>

            </div>
        </form>

        <br>

        <?php
            while($question = $get_all_questions->fetch())
            {
            ?>
                <div class="card">
                    <div class="cart-header">
                        <a href="article.php?id=<?= $question['id']; ?>"><?= $question['titre']; ?></a>
                    </div>
                    <div class="card-body">
                        <?= $question['contenu']; ?>
                    </div>
                    <div class="card-footer">
                        <p> Publié par <a href="profile.php?id=<?= $question['id_auteur']; ?>"><?= $question['pseudo_auteur']; ?></a> le <?= $question['date_publication']; ?></p>
                    </div>
                </div>
                <br>
            <?php
            }
        ?>
    </div>
</body>
</html>