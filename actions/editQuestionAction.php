<?php
require('database.php');
require('getInfosOfEditedQuestionAction.php');
//validation le boutton validate
if(isset($_POST['validate'])){
    //voir si le champ sont remplis

    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
       
        
        
        //les données à faire rentré dans la requete
        $new_question_title = htmlspecialchars($_POST['title']);
        $new_question_description = nl2br(htmlspecialchars($_POST['description']));
        $new_question_content = nl2br(htmlspecialchars($_POST['content']));

        //modifier les info dans la base

        $editQuestionOnWebSite = $bdd->prepare('UPDATE questions SET titre = ? , description = ?, contenu = ? WHERE id = ?');
        $editQuestionOnWebSite->execute(array( $new_question_title,$new_question_description, $new_question_content, $idOfQuestion));

        //redirection
        
        header("Location: myQuestions.php");

    }else{
        $errorMsg = "Veillez compléter tous les champs ...";
    }

}