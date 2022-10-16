<?php

require('database.php');

//velifier s'il il a appuyé sur validate
if(isset($_POST['validate']) ){

    //si le forulaire est vite
    if(!empty($_POST['answer'])){
        $userAnswer = nl2br(htmlspecialchars($_POST['answer']));

        $insertAnswer = $bdd->prepare('INSERT INTO answers(id_auteur, pseudo_auteur, id_question, contenu) VALUES (?, ?, ?, ?)');
        $insertAnswer->execute(array($_SESSION['id'], $_SESSION['pseudo'], $_GET['id'], $userAnswer));

    }

}