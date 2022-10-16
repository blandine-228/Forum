<?php 
    session_start();
    require('database.php');

    //validation du forilaire
if(isset($_POST['validate'])){
    // si le champ est vide 
     if(!empty($_POST['pseudo']) AND  !empty($_POST['password'])){
         //les données du user
 
         $user_pseudo = htmlspecialchars($_POST['pseudo']);
         $user_password = htmlspecialchars($_POST['password']);
        //verifier si le user existe(psoeudo)
         $checkIfUserExists = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');

         $checkIfUserExists->execute(array($user_pseudo));

        //voir si le pseudo est correcte
         if($checkIfUserExists->rowCount()>0){

            //recuperer les données du user
            $usersInfos = $checkIfUserExists->fetch();
            //verifier si le pwd est correc
            if(password_verify($user_password, $usersInfos['mdp'])){

                //authetifier le user sur le site et repurer dans des variable global session
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['lastName'] = $usersInfos['nom'];
                $_SESSION['firstName'] = $usersInfos['firstName'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];

                //Redirige le user versla page d'accueil
                header('location: index.php');


            }else{
                $errorMsg = "Mot de pass incorrecte";
            }

         }else{
            $errorMsg = "Votre pseudo est incorrect...";
         }

 
     }else{
         $errorMsg = "Veillez completer tous les champs";
     }
 
 }
