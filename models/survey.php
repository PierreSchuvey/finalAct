<?php

class survey extends dataBase {


    public $idTheme = 0;
    public $idFirstTheme = 0;
    public $idQuestion = 0;
    public $idUser = 0;
    public $reponseUn = '';


    public function __construct() {
        parent::__construct();
    }

    public function takeQuestionFirstTheme() {
        $takeQuestion = $this->db->prepare('SELECT `label`, `id`, `multi` FROM `question` WHERE `idTheme` = :idFirstTheme');
        $takeQuestion->bindValue(':idFirstTheme', $this->idFirstTheme, PDO::PARAM_INT);
        $takeQuestion->execute();
        $takeQuestion = $takeQuestion->fetchAll(PDO::FETCH_OBJ);
        return $takeQuestion;
    }
    public function takeQuestionDe() {
        $takeQuestion = $this->db->prepare('SELECT `label`, `id`, `multi` FROM `question` WHERE `idTheme` = :idFirstTheme AND situation = 1');
        $takeQuestion->bindValue(':idFirstTheme', $this->idFirstTheme, PDO::PARAM_INT);
        $takeQuestion->execute();
        $takeQuestion = $takeQuestion->fetchAll(PDO::FETCH_OBJ);
        return $takeQuestion;
    }
    public function takeQuestionWorker() {
        $takeQuestion = $this->db->prepare('SELECT `label`, `id`, `multi` FROM `question` WHERE `idTheme` = :idFirstTheme AND situation = 2');
        $takeQuestion->bindValue(':idFirstTheme', $this->idFirstTheme, PDO::PARAM_INT);
        $takeQuestion->execute();
        $takeQuestion = $takeQuestion->fetchAll(PDO::FETCH_OBJ);
        return $takeQuestion;
    }
    public function takeQuestionStudent() {
        $takeQuestion = $this->db->prepare('SELECT `label`, `id`, `multi` FROM `question` WHERE `idTheme` = :idFirstTheme AND situation = 3');
        $takeQuestion->bindValue(':idFirstTheme', $this->idFirstTheme, PDO::PARAM_INT);
        $takeQuestion->execute();
        $takeQuestion = $takeQuestion->fetchAll(PDO::FETCH_OBJ);
        return $takeQuestion;
    }
    public function takeQuestionBoss() {
        $takeQuestion = $this->db->prepare('SELECT `label`, `id`, `multi` FROM `question` WHERE `idTheme` = :idFirstTheme AND situation = 4');
        $takeQuestion->bindValue(':idFirstTheme', $this->idFirstTheme, PDO::PARAM_INT);
        $takeQuestion->execute();
        $takeQuestion = $takeQuestion->fetchAll(PDO::FETCH_OBJ);
        return $takeQuestion;
    }
    public function takeAnswers() {
        $takeQuestion = $this->db->prepare('SELECT `label`, `id`, `idQuestion` FROM `answers` WHERE `idQuestion` = :idQuestion');
        $takeQuestion->bindValue(':idQuestion', $this->idQuestion, PDO::PARAM_INT);
        $takeQuestion->execute();
        $takeQuestion = $takeQuestion->fetchAll(PDO::FETCH_OBJ);
        return $takeQuestion;
    }
    public function addAnswers() {
        //On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO  `globalAnswers`(`idUser`, `idThemes`, `idQuestion`, `reponseUn`) VALUES(:idUser, :idTheme, :idQuestion, :reponseUn)';
        $addSelectedThemes = $this->db->prepare($query);
        $addSelectedThemes->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $addSelectedThemes->bindValue(':idTheme', $this->idTheme, PDO::PARAM_INT);
        $addSelectedThemes->bindValue(':idQuestion', $this->idQuestion, PDO::PARAM_INT);
        $addSelectedThemes->bindValue(':reponseUn', $this->reponseUn, PDO::PARAM_STR);
        //Si l'insertion s'est correctement déroulée on retourne vrai
        return $addSelectedThemes->execute();
    }
    public function addAnswersMulti() {
        //On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
        $query = 'INSERT INTO  `globalAnswers`(`idUser`, `idThemes`, `idQuestion`, `reponseUn`) VALUES(:idUser, :idTheme, :idQuestion, :reponseDeux)';
        $addSelectedThemes = $this->db->prepare($query);
        $addSelectedThemes->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        $addSelectedThemes->bindValue(':idTheme', $this->idTheme, PDO::PARAM_INT);
        $addSelectedThemes->bindValue(':idQuestion', $this->idQuestion, PDO::PARAM_INT);
        $addSelectedThemes->bindValue(':reponseDeux', $this->reponseDeux, PDO::PARAM_STR);
        //Si l'insertion s'est correctement déroulée on retourne vrai
        return $addSelectedThemes->execute();
    }
    public function __destruct() {

    }

}

    ?>
