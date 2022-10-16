
<?php require('database.php');

//voir si le user a bien cliquer sur le boutton valider
if(isset($_POST['validate'])){
    if(!empty($_POST['title']) AND !empty($_POST['description']) AND !empty($_POST['content'])){
        //les donnes concernat la pblication

        $question_title = htmlspecialchars($_POST['title']);
        $question_description = nl2br(htmlspecialchars($_POST['description']));
        $question_content = nl2br(htmlspecialchars($_POST['content']));
        $question_date = date('d/m/y');
        $questionIdAutor = $_SESSION['id'];
        $questionPseudoAutor = $_SESSION['pseudo'];


        //insertion dans la table
        $insertQuestionOnWebsite = $bdd->prepare('INSERT INTO questions(titre, description,contenu,id_auteur,pseudo_auteur,date_publication)VALUES(?,?,?,?,?,?)');
        $insertQuestionOnWebsite->execute(
            array(
                $question_title,
                $question_description, 
                $question_content, 
                $questionIdAutor, 
                $questionPseudoAutor, 
                $question_date
            )
        );

        $successMsg  ="Votre question a bien été publier sur le site";
    }else{
        $errorMsg = "Veillez completer tous les champs";
    }
}