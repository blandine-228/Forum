<?php
require('database.php');

$getAllAnswersOfThisQuestions = $bdd->prepare('SELECT id_auteur, pseudo_auteur, id_question, contenu FROM answers WHERE id_question = ? ORDER BY id DESC');
$getAllAnswersOfThisQuestions->execute(array($idOfTheQuestion));