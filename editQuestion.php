<?php 

    require('actions/securityAction.php');
    require('actions/editQuestionAction.php');
    require('actions/getInfosOfEditedQuestionAction.php');
    
  
?>
<!DOCTYPE html>
<html lang="en">

	<?php include 'includes/head.php';?>

<body>
    <?php include 'includes/navbar.php';?>

    <br><br>

    <div class = "container">
        <?php
            if(isset($errorMsg)){ 
                echo '<p>'.$errorMsg.'<p>';
            } 
        ?>
        <?php
            if(isset($question_content)){
                ?>
                    <form method="POST">

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Titre de la question</label>
                            <input type="text" class="form-control" name="title" value= "<?php echo $question_title ;?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Description de la question</label>
                            <textarea  class="form-control" name="description"><?php echo $question_description ;?></textarea> 
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Contenu de la question</label> <textarea class="form-control" name="content"><?php echo $question_content ;?>

                            </textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name = "validate">Modifier la question</button><br><br>     
                    </form>
                <?php

            }
        ?>

        
    </div>    
    

</body>
</html>

