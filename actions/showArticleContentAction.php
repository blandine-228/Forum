<?php
require('database.php');

//verifeir si le user a saisi un truc
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //verifier si le id appartien vraiment a une question
    $idOfTheQuestion = $_GET['id'];
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id = ?');
    $checkIfQuestionExists->execute(array($idOfTheQuestion));

    
    if($checkIfQuestionExists->rowCount() > 0){

        //verifier si on a bien pu recuperer une quesion

        $questionsInfos = $checkIfQuestionExists->fetch();
        
        //stocker les données de la question dans des variable propres
        $question_title = $questionsInfos['titre'];
        $question_content = $questionsInfos['contenu'];
        $question_id_author = $questionsInfos['id_auteur'];
        $question_pseudo_author = $questionsInfos['pseudo_auteur'];
        $question_date_publication = $questionsInfos['date_publication'];


    }else{
        $errorMsg = " Aucune question n'a été trouvés";
    }


}else{
    $errorMsg = "Aucune question n'a été retrouvée";
}