<?php 
session_start();
require('actions/showArticleContentAction.php');
require('actions/postAnswerAction.php');
require('actions/showAllAswersOfQuestionAction.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php'?>

<body>
    <?php include 'includes/navbar.php' ?>
    <br><br>

    <div class="container">
        <br>
       
        <?php
        

        if(isset($errorMsg)){echo $errorMsg ;}
        if(isset($question_date_publication)){
            ?>
                <section class = "show-content">
                    <h3><?= $question_title; ?></h3>
                    <hr>
                    <p><?= $question_content; ?></p>
                    <hr>
                    <small><?='<a href="profil.php?id='.$question_id_author.'">'. $question_pseudo_author . '</a> ' .$question_date_publication ; ?></small>
                </section>
                <br>
                <section class = "show-answers">
                    <form class = "form-group" method="POST">
                        <div class="mb-3">
                            <label for="exempleInptEmail" class = "form-label">Réponse : </label>
                            <textarea name="answer" class="form-control"></textarea>
                            <br>
                            <button class="btn btn-success" type="submit" name="validate">Répondre</button>

                        </div>
                        

                    </form> 
                    
                    <?php 
                        while($answer = $getAllAnswersOfThisQuestions->fetch()){
                            ?>
                                <div class="card">
                                    <div class="card-header">
                                       <a href="profil.php?id=<?= $answer['id_auteur'] ;?>">
                                            <?=$answer['pseudo_auteur'] ; ?>
                                       </a>
                                    </div>
                                    <div class="card-body">
                                        <?=$answer['contenu']; ?>
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