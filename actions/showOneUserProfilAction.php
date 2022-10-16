<?php
require('database.php');
//verifie si l' id existe
if(isset($_GET['id']) AND !empty($_GET['id'])){

    //id de l' utilisateur

    $idOfUser = $_GET['id'];

    //verifier si l'utilisateur existe
    $checkIfUserExists = $bdd->prepare('SELECT pseudo, nom, prenom FROM users WHERE id = ?');
    $checkIfUserExists->execute(array($idOfUser));

    //

    if($checkIfUserExists->rowCount() > 0){
        //recucperer toutes les données du user
        
        $usersInfos = $checkIfUserExists->fetch();

        $user_pseudo = $usersInfos['pseudo'];
        $user_lastname = $usersInfos['nom'];
        $user_firstname = $usersInfos['prenom'];

        //recuperer toute les questions publieer par l'utilisateur
        $getHisQuestions = $bdd->prepare('SELECT * FROM questions WHERE id_auteur = ? ORDER BY id DESC');
        $getHisQuestions->execute(array($idOfUser));

    }else{
        $errorMsg = "Aucun user trouvé";
    }

}else{
    $errorMsg = "Aucun utilisateur trouvéee";
}