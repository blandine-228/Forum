<?php
session_start();
require('database.php');
 
 //validation du forilaire
if(isset($_POST['validate'])){
   // si le champ est vide 
    if(!empty($_POST['pseudo']) AND !empty($_POST['lastName']) AND !empty($_POST['firstName']) AND !empty($_POST['password'])){
        //les données du user

        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $use_lastName =  htmlspecialchars($_POST['lastName']);
        $user_firstName = htmlspecialchars($_POST['firstName']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        //cerifier si le pseudo entré existe

        $checkIfUserAlreadyExists = $bdd->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo));

        //insrer le user 
    
        if($checkIfUserAlreadyExists->rowCount()==0){
            $insertUserOnWebsite = $bdd->prepare('INSERT INTO users(pseudo,nom,prenom,mdp) VALUES(?,?,?,?)');
            $insertUserOnWebsite->execute(array($user_pseudo, $use_lastName, $user_firstName, $user_password));

             //recuper les info consernant user
            $getInfosUserReq = $bdd->prepare('SELECT id, pseudo, nom, prenom FROM users WHERE nom= ? AND prenom = ? AND pseudo = ?');
            $getInfosUserReq->execute(array($user_lastName, $user_firstName, $user_pseudo));
           
            $usersInfos =  $getInfosUserReq->fetch();

            //authetifier le user sur le site et repurer dans des variable global session
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['lastName'] = $usersInfos['nom'];
            $_SESSION['firstName'] = $usersInfos['firstName'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];

            //rediriger le user vers la page d'accueil
            header('Location: index.php');
        }else{
            //code
            $errorMsg = "l'utilisateur existe deja";
        }


    }else{
        $errorMsg = "Veillez completer tous les champs";
    }

}