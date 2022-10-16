<?php
//voir si le user s'est connecter dabord
session_start();
if(isset($_SESSION['auth'])){
    header("login.php");
}


require('database.php');


//verifier si l'id de la question est bien passé dans l'url
 if(isset($_GET['id']) AND !empty($_GET['id'])){
    //verifier si l'id existe

    $idOfTheQuestion = $_GET['id'];
     //verifier si le user existe
    $checkIfIdQuestionExists = $bdd->prepare('SELECT id_auteur FROM questions WHERE id = ?');
    $checkIfIdQuestionExists->execute(array($idOfTheQuestion));

    //verifier si la question exeste

    if($checkIfIdQuestionExists->rowCount() > 0){
        //verifier si cest l'auteur de la question 
        $questionsInfos = $checkIfIdQuestionExists->fetch();

        if($questionsInfos['id_auteur'] == $_SESSION['id']){

            //deleta la question
            $deleteThisQuestion = $bdd-> prepare('DELETE FROM questions WHERE id = ?');
            $deleteThisQuestion->execute(array($idOfTheQuestion));

            header("Location: ../myQuestions.php");

        }else{
            echo "Vous n'avez pas le droit de suprimer question qui n'est pas la votre!!";
        }
    }else{
        echo "Aucunee question n'a été trouvé";
    }
 }else{
    echo "Aucune question n'a été trouvé";
 }
