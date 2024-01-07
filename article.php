<?php
    session_start();
    require('actions/questions/showArticleContentAction.php');
    require('actions/questions/postAnswerAction.php');
    require('actions/questions/showAllAnswersOfQuestion.php');
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <div class="container">

    <?php 
        if (isset($error_msg)) 
        { 
            echo $error_msg; 
        }
        else if (isset($success_msg))
        { 
            echo $success_msg;
        }
    
        if (isset($question_publication_date))
        {
    ?>
    <br>
            <!-- affichage question -->
            <section class="show-content">
                <h2>Question de : <?= $question_pseudo_author; ?> </h2>
                <h3><?= 'Titre : ' . $question_title; ?></h3>
                <hr>
                <p><?= 'Description : ' .  $question_content; ?></p>
                <hr>
                <small><?= '<a href="profile.php?id=' . $question_id_author . '"> ' . $question_pseudo_author . '</a> ' . $question_publication_date; ?></small>
            </section>

            <br>
                <hr class="border border-primary border-3 opacity-75">
            <br>
            <!-- espace commentaire -->
            <section class="show-answers">
                <form class="form-group" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Votre Réponse :</label>
                        <textarea name="answer" class="form-control"></textarea>
                        <button class="btn btn-primary" type="submit" name="validate">Répondre</button>
                        <button class="btn btn-info" type="submit" name="people_answers">Afficher les réponses</button>
                    </div>
                </form>
            </section>

            <hr class="border border-primary border-3 opacity-75">

            <section>
                <div class="container">
                    <h3>Réponses des utilisateurs</h3>
                </div>
                <?php
                    while($answer = $get_all_answers_of_this_question->fetch())
                    {
                    ?>
                        <div class="card">
                            <div class="card-header">
                                <a href="profile.php?id=<?= $answer['id_auteur']; ?>"><p><?= $answer['pseudo_auteur']; ?></p></a>
                            </div>
                            <div class="card-body">
                                <p><?= $answer['contenu']; ?></p>
                            </div>
                        </div>
                        <br>
                    <?php
                    }
                ?>
            </section>
    <?php
        }
    ?>
    </div>
</body>
</html>