<?php require('database.php');

//verifier si l id est bien passé en para dans l url
if(isset($_GET['id']) AND !empty($_GET['id'])){
 
    $idOfQuestion = $_GET['id']; //pour ne pas mettre $_get a chaque fois

    //verifier que l 'd de question entrer existe
    $checkIfQuestionExists = $bdd->prepare('SELECT * FROM questions WHERE id= ?');
    $checkIfQuestionExists->execute(array($idOfQuestion));

    // si on a belee et bien recuperer une question
    if($checkIfQuestionExists->rowCount() > 0){

        $questionInfos = $checkIfQuestionExists->fetch();
        
        if($questionInfos['id_auteur'] == $_SESSION['id']){
            //code ...
            $question_title = $questionInfos['titre'];
            $question_description = $questionInfos['description']; 
            $question_content = $questionInfos['contenu'];

            $question_description = str_replace('<br />', '', $question_description);
            $question_content = str_replace('<br />', '', $question_content);


           
        }else{
            $errorMsg = "Vous n'etes pas l'auteur de cette question";
        }

    }else{
        $errorMsg = "Aucunee question n'a été retrouvée";
    }

}else{
    $errorMsg = "Aucune question n'a été trouvé";
}
