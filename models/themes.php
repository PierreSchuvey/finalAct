<?php

class themes extends dataBase {

    public $firstTheme = 0;
    public $secondTheme = 0;
    public $thirdTheme = 0;
    public $fourthTheme = 0;
    public $fifthTheme = 0;
    public $sixthTheme = 0;
    public $seventhTheme = 0;
    public $iduser = 0;

    public function __construct() {
        parent::__construct();
    }
public function allThemes() {
        $query = 'SELECT `name`, `id` FROM `themes`';
        $themesList = $this->db->query($query);
        if (is_object($themesList)) {
            $themesList = $themesList->fetchAll(PDO::FETCH_OBJ);
        }
        return $themesList;
    }
    public function addSelectedThemes() {
        //On prépare la requête sql qui insert dans les champs selectionnés, les valeurs sont des marqueurs nominatifs
          $query = 'INSERT INTO  `selectedthem`(`firstTheme`, `secondTheme`, `thirdTheme`, `fourthTheme`, `fifthTheme`, `sixthTheme`, `seventhTheme`, `idUser`) VALUES(:firstTheme, :secondTheme, :thirdTheme, :fourthTheme, :fifthTheme, :sixthTheme, :seventhTheme, :idUser)';
        $addSelectedThemes = $this->db->prepare($query);
        $addSelectedThemes->bindValue(':firstTheme', $this->firstTheme, PDO::PARAM_INT);
        $addSelectedThemes->bindValue(':secondTheme', $this->secondTheme, PDO::PARAM_INT);
        $addSelectedThemes->bindValue(':thirdTheme', $this->thirdTheme, PDO::PARAM_INT);
        $addSelectedThemes->bindValue(':fourthTheme', $this->fourthTheme, PDO::PARAM_INT);
        $addSelectedThemes->bindValue(':fifthTheme', $this->fifthTheme, PDO::PARAM_INT);
        $addSelectedThemes->bindValue(':sixthTheme', $this->sixthTheme, PDO::PARAM_INT);
        $addSelectedThemes->bindValue(':seventhTheme', $this->seventhTheme, PDO::PARAM_INT);
        $addSelectedThemes->bindValue(':idUser', $this->idUser, PDO::PARAM_INT);
        //Si l'insertion s'est correctement déroulée on retourne vrai
        return $addSelectedThemes->execute();
    }

    public function __destruct() {

    }

}

    ?>
