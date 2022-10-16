<?php
    require('actions/securityAction.php');
    require('actions/myQuestionsAction.php');
    

    
?>
<!DOCTYPE html>
<html lang="en">
    <?php include'includes/head.php';?>
<body>
    <?php include 'includes/navbar.php'; ?>
   
    
    <?php
        while($question = $getAllMyQuestions->fetch()){
            ?>
                <div class="card">
                    <h5 class="card-header">
                        <a href = "article.php?id=<?= $question['id']; ?>">
                            <?php echo $question['titre'];?> 
                        </a>
                      
                    </h5>
                    <div class="card-body">
                        
                        
                        <p class="card-text"><?php echo $question['description'] ?></p>
                        <a href="article.php?id=<?= $question['id']; ?>" class="btn btn-primary">Acceder à la question</a>
                        <a href="editQuestion.php?id=<?= $question['id']; ?>" class="btn btn-warning">Modifier  la question</a>
                        <a href="actions/deleteQuestionAction.php?id=<?= $question['id']; ?>" class="btn btn-danger">Suprimer  la question</a>
                        
                    </div>
                </div> 
                <br>   

            <?php
        }
    ?>
   
</body>
</html>