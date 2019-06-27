
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="publisher" content="Kaiartsu">
  <meta name="author" content="Kaiartsu" />
  <meta name="reply-to" content="contact@kaiartsu.fr">
  <meta name="keywords" content="" />
  <title>Assises du Noyonnais | Questionnaire | Hauts-de-France, Noyon</title>
  <!-- Link CSS -->
  <link href="assets/lib/bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link href="assets/css/footer.css" rel="stylesheet" />
  <link href="assets/css/survey.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <?php
  include_once 'models/dataBase.php';
  include_once 'models/users.php';
  include_once 'models/themes.php';
  include_once 'models/survey.php';
  include 'controllers/startSurvey.php';
  ?>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="#"><img src="assets/images/logo.jpg" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="themes.php">Thématiques</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="ateliers.php">Ateliers</a>
        </li>

        <li class="nav-item  active">
          <a class="nav-link" href="#">Questionnaire</a>
        </li>
      </ul>
      <a class="link" href="contact.php">Contact</a>
    </div>
  </nav>
  <main id="question">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-6 col-sm-5 col-md-5 col-lg-5 col-xl-5" id="breadCrumb">
          <p>
            <a href="index.php">Accueil</a> \ Questionnaire
          </p>
        </div>
      </div>
      <?php
      if(!isset($_POST['finishSurvey']) && empty($_POST['finishSurvey'])){?>
        <h2>Les questions</h2>
        <form class="" action="#" method="post">
          <div id="accordion">
            <?php
            foreach($themeBySelect as $themeBySelect){
              ?>
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <div class="btn btn-link" data-toggle="collapse" data-target="#<?= $themeBySelect->name;?>" aria-expanded="true" aria-controls="collapseOne">
                      <?= $themeBySelect->name;?><br><small>cliquez pour afficher les questions</small>
                    </div>
                  </h5>
                </div>
                <div id="<?= $themeBySelect->name;?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <p><?= $themeBySelect->intro;?></p>
                      </div>
                    </div>
                    <?php
                    if($themeBySelect->id == 1 || $themeBySelect->id == 3 || $themeBySelect->id == 4 || $themeBySelect->id == 5 || $themeBySelect->id == 7 ){
                      $survey->idFirstTheme = $themeBySelect->id;
                      $takeQuestions = $survey->takeQuestionFirstTheme();
                      foreach($takeQuestions as $takeQuestions) {
                        ?><h4 class="questionTitlePurple"><?= $takeQuestions->label;?></h4><?php
                        $survey->idQuestion =$takeQuestions->id;
                        $takeAnswers = $survey->takeAnswers();
                        if(isset($_POST['finishSurvey']) && empty($_POST[''.$takeQuestions->id.''])){
                          $survey->idTheme = $themeBySelect->id;
                          $survey->idQuestion = $takeQuestions->id;
                          $survey->reponseUn = NULL;
                          $survey->idUser = $_SESSION['id'];
                          $survey->addAnswers();
                        }

                        foreach($takeAnswers as $takeAnswers) {
                          if($takeAnswers->label !== "NONE"){
                            if($takeQuestions->multi == 1){
                              ?>
                              <div class="offset-3 offset-sm-5 offset-lg-5 ">
                                <input type="checkbox" id="<?= $takeQuestions->id;?>" name="<?=$takeQuestions->id?>" value="<?= $takeAnswers->id;?>">
                                <label for="<?= $takeQuestions->id;?>"><?= $takeAnswers->label;?></label>
                              </div>
                              <?php
                            }else{
                              ?>
                              <div class="offset-3 offset-sm-5 offset-lg-5 ">
                                <input type="radio" id="<?= $takeQuestions->id;?>" name="<?= $takeQuestions->id;?>" value="<?= $takeAnswers->id;?>">
                                <label for="<?= $takeAnswers->id;?>"><?= $takeAnswers->label;?></label>
                              </div>
                              <?php
                            }
                          }else{
                            ?>
                            <div class="offset-1 offset-sm-5 offset-lg-4 ">
                              <textarea id="<?= $takeQuestions->id;?>" name="<?= $takeQuestions->id;?>" placeholder="Expressions libre ..."></textarea>
                            </div>
                            <?php
                          }
                        }
                        if(isset($_POST['finishSurvey']) && !empty($_POST[''.$takeQuestions->id.''])){

                          $survey->idTheme = $themeBySelect->id;
                          $survey->idQuestion = $takeQuestions->id;
                          $survey->reponseUn = $_POST[''.$takeQuestions->id.''];
                          $survey->idUser = $_SESSION['id'];
                          $survey->addAnswers();
                        }
                      }
                    }elseif($themeBySelect->id == 2 && $_SESSION['job'] == "Etudiant"){
                      $survey->idFirstTheme = $themeBySelect->id;
                      $takeQuestions = $survey->takeQuestionStudent();foreach($takeQuestions as $takeQuestions) {
                        ?><h4 class="questionTitlePurple"><?= $takeQuestions->label;?></h4><?php
                        $survey->idQuestion =$takeQuestions->id;
                        $takeAnswers = $survey->takeAnswers();
                        if(isset($_POST['finishSurvey']) && !empty($_POST[''.$takeQuestions->id.''])){
                          $survey->idTheme = $themeBySelect->id;
                          $survey->idQuestion = $takeQuestions->id;
                          $survey->reponseUn = $_POST[''.$takeQuestions->id.''];
                          $survey->idUser = $_SESSION['id'];
                          $survey->addAnswers();
                        }elseif(isset($_POST['finishSurvey']) && empty($_POST[''.$takeQuestions->id.''])){
                          $survey->idTheme = $themeBySelect->id;
                          $survey->idQuestion = $takeQuestions->id;
                          $survey->reponseUn = NULL;
                          $survey->idUser = $_SESSION['id'];
                          $survey->addAnswers();
                        }

                        foreach($takeAnswers as $takeAnswers) {
                          if($takeAnswers->label !== "NONE"){
                            if($takeQuestions->multi == 1){
                              // code...

                              ?>
                              <div class="offset-3 offset-sm-5 offset-lg-5 ">
                                <input type="checkbox" id="<?= $takeQuestions->id;?>" name="<?= $takeAnswers->id;?>" value="<?= $takeAnswers->id;?>">
                                <label for="<?= $takeQuestions->id;?>"><?= $takeAnswers->label;?></label>
                              </div>
                              <?php


                            }else{
                              ?>
                              <div class="offset-3 offset-sm-5 offset-lg-5 ">
                                <input type="radio" id="<?= $takeQuestions->id;?>" name="<?= $takeQuestions->id;?>" value="<?= $takeAnswers->id;?>">
                                <label for="<?= $takeAnswers->id;?>"><?= $takeAnswers->label;?></label>
                              </div>
                              <?php
                            }
                          }else{
                            ?>
                            <div class="offset-1 offset-sm-5 offset-lg-4 ">
                              <textarea id="<?= $takeQuestions->id;?>" name="<?= $takeQuestions->id;?>" placeholder="Expressions libre ..."></textarea>
                            </div>
                            <?php
                          }
                        }
                      }
                    }elseif($themeBySelect->id == 2 && $_SESSION['job'] == "Sans emploi" || $_SESSION['job'] == "Demandeur d’emploi (DE)"){
                      $survey->idFirstTheme = $themeBySelect->id;
                      $takeQuestions = $survey->takeQuestionDe();
                      foreach($takeQuestions as $takeQuestions) {
                        ?><h4 class="questionTitlePurple"><?= $takeQuestions->label;?></h4><?php
                        $survey->idQuestion =$takeQuestions->id;
                        $takeAnswers = $survey->takeAnswers();
                        if(isset($_POST['finishSurvey']) && !empty($_POST[''.$takeQuestions->id.''])){
                          $survey->idTheme = $themeBySelect->id;
                          $survey->idQuestion = $takeQuestions->id;
                          $survey->reponseUn = $_POST[''.$takeQuestions->id.''];
                          $survey->idUser = $_SESSION['id'];
                          $survey->addAnswers();
                        }elseif(isset($_POST['finishSurvey']) && empty($_POST[''.$takeQuestions->id.''])){
                          $survey->idTheme = $themeBySelect->id;
                          $survey->idQuestion = $takeQuestions->id;
                          $survey->reponseUn = NULL;
                          $survey->idUser = $_SESSION['id'];
                          $survey->addAnswers();
                        }

                        foreach($takeAnswers as $takeAnswers) {
                          if($takeAnswers->label !== "NONE"){
                            if($takeQuestions->multi == 1){
                              // code...

                              ?>
                              <div class="offset-3 offset-sm-5 offset-lg-5 ">
                                <input type="checkbox" id="<?= $takeQuestions->id;?>" name="<?= $takeAnswers->id;?>" value="<?= $takeAnswers->id;?>">
                                <label for="<?= $takeQuestions->id;?>"><?= $takeAnswers->label;?></label>
                              </div>
                              <?php


                            }else{
                              ?>
                              <div class="offset-3 offset-sm-5 offset-lg-5 ">
                                <input type="radio" id="<?= $takeQuestions->id;?>" name="<?= $takeQuestions->id;?>" value="<?= $takeAnswers->id;?>">
                                <label for="<?= $takeAnswers->id;?>"><?= $takeAnswers->label;?></label>
                              </div>
                              <?php
                            }
                          }else{
                            ?>
                            <div class="offset-1 offset-sm-5 offset-lg-4 ">
                              <textarea id="<?= $takeQuestions->id;?>" name="<?= $takeQuestions->id;?>" placeholder="Expressions libre ..."></textarea>
                            </div>
                            <?php
                          }
                        }
                      }
                    }elseif($themeBySelect->id == 2 && $_SESSION['job'] == "Artisan, commerçant, chef d’entreprise" || $_SESSION['job'] == "Cadre et profession intellectuelle supérieure"){
                      $survey->idFirstTheme = $themeBySelect->id;
                      $takeQuestions = $survey->takeQuestionBoss();
                      foreach($takeQuestions as $takeQuestions) {
                        ?><h4 class="questionTitlePurple"><?= $takeQuestions->label;?></h4><?php
                        $survey->idQuestion =$takeQuestions->id;
                        $takeAnswers = $survey->takeAnswers();
                        if(isset($_POST['finishSurvey']) && !empty($_POST[''.$takeQuestions->id.''])){
                          $survey->idTheme = $themeBySelect->id;
                          $survey->idQuestion = $takeQuestions->id;
                          $survey->reponseUn = $_POST[''.$takeQuestions->id.''];
                          $survey->idUser = $_SESSION['id'];
                          $survey->addAnswers();
                        }elseif(isset($_POST['finishSurvey']) && empty($_POST[''.$takeQuestions->id.''])){
                          $survey->idTheme = $themeBySelect->id;
                          $survey->idQuestion = $takeQuestions->id;
                          $survey->reponseUn = NULL;
                          $survey->idUser = $_SESSION['id'];
                          $survey->addAnswers();
                        }

                        foreach($takeAnswers as $takeAnswers) {
                          if($takeAnswers->label !== "NONE"){
                            if($takeQuestions->multi == 1){
                              // code...

                              ?>
                              <div class="offset-3 offset-sm-5 offset-lg-5 ">
                                <input type="checkbox" id="<?= $takeAnswers->id;?>" name="<?= $takeAnswers->id;?>" value="<?= $takeAnswers->id;?>">
                                <label for="<?= $takeQuestions->id;?>"><?= $takeAnswers->label;?></label>
                              </div>

                              <?php


                            }else{
                              ?>
                              <div class="offset-3 offset-sm-5 offset-lg-5 ">
                                <input type="radio" id="<?= $takeQuestions->id;?>" name="<?= $takeQuestions->id;?>" value="<?= $takeAnswers->id;?>">
                                <label for="<?= $takeAnswers->id;?>"><?= $takeAnswers->label;?></label>
                              </div>
                              <?php
                            }
                          }else{
                            ?>
                            <div class="offset-1 offset-sm-5 offset-lg-4 ">
                              <textarea id="<?= $takeQuestions->id;?>" name="<?= $takeQuestions->id;?>" placeholder="Expressions libre ..."></textarea>
                            </div>
                            <?php
                          }
                        }
                      }
                    }
                    elseif($themeBySelect->id == 2 && $_SESSION['job'] == "Agriculteur" || $_SESSION['job'] == "Profession intermédiaire" || $_SESSION['job'] == "Employé" || $_SESSION['job'] == "Ouvrier" || $_SESSION['job'] == "Retraité"){
                      $survey->idFirstTheme = $themeBySelect->id;
                      $takeQuestions = $survey->takeQuestionWorker();
                      foreach($takeQuestions as $takeQuestions) {
                        ?><h4 class="questionTitlePurple"><?= $takeQuestions->label;?></h4><?php
                        $survey->idQuestion =$takeQuestions->id;
                        $takeAnswers = $survey->takeAnswers();
                        if(isset($_POST['finishSurvey']) && !empty($_POST[''.$takeQuestions->id.''])){
                          $survey->idTheme = $themeBySelect->id;
                          $survey->idQuestion = $takeQuestions->id;
                          $survey->reponseUn = $_POST[''.$takeQuestions->id.''];
                          $survey->idUser = $_SESSION['id'];
                          $survey->addAnswers();
                        }elseif(isset($_POST['finishSurvey']) && empty($_POST[''.$takeQuestions->id.''])){
                          $survey->idTheme = $themeBySelect->id;
                          $survey->idQuestion = $takeQuestions->id;
                          $survey->reponseUn = NULL;
                          $survey->idUser = $_SESSION['id'];
                          $survey->addAnswers();
                        }

                        foreach($takeAnswers as $takeAnswers) {
                          if($takeAnswers->label !== "NONE"){
                            if($takeQuestions->multi == 1){
                              // code...

                              ?>
                              <div class="offset-3 offset-sm-5 offset-lg-5 ">
                                <input type="checkbox" id="<?= $takeQuestions->id;?>" name="<?= $takeAnswers->id;?>" value="<?= $takeAnswers->id;?>">
                                <label for="<?= $takeQuestions->id;?>"><?= $takeAnswers->label;?></label>
                              </div>
                              <?php


                            }else{
                              ?>
                              <div class="offset-3 offset-sm-5 offset-lg-5 ">
                                <input type="radio" id="<?= $takeQuestions->id;?>" name="<?= $takeQuestions->id;?>" value="<?= $takeAnswers->id;?>">
                                <label for="<?= $takeAnswers->id;?>"><?= $takeAnswers->label;?></label>
                              </div>
                              <?php
                            }
                          }else{
                            ?>
                            <div class="offset-1 offset-sm-5 offset-lg-4 ">
                              <textarea id="<?= $takeQuestions->id;?>" name="<?= $takeQuestions->id;?>" placeholder="Expressions libre ..."></textarea>
                            </div>
                            <?php
                          }
                        }
                      }
                    }elseif($themeBySelect->id == 6 && $_SESSION['job'] == "Artisan, commerçant, chef d’entreprise" ||  $_SESSION['job'] == "Artisan, commerçant, chef d’entreprise"){
                      $survey->idFirstTheme = $themeBySelect->id;
                      $takeQuestions = $survey->takeQuestionDe();
                      foreach($takeQuestions as $takeQuestions) {
                        ?><h4 class="questionTitlePurple"><?= $takeQuestions->label;?></h4><?php
                        $survey->idQuestion =$takeQuestions->id;
                        $takeAnswers = $survey->takeAnswers();
                        if(isset($_POST['finishSurvey']) && !empty($_POST[''.$takeQuestions->id.''])){
                          $survey->idTheme = $themeBySelect->id;
                          $survey->idQuestion = $takeQuestions->id;
                          $survey->reponseUn = $_POST[''.$takeQuestions->id.''];
                          $survey->idUser = $_SESSION['id'];
                          $survey->addAnswers();
                        }elseif(isset($_POST['finishSurvey']) && empty($_POST[''.$takeQuestions->id.''])){
                          $survey->idTheme = $themeBySelect->id;
                          $survey->idQuestion = $takeQuestions->id;
                          $survey->reponseUn = NULL;
                          $survey->idUser = $_SESSION['id'];
                          $survey->addAnswers();
                        }

                        foreach($takeAnswers as $takeAnswers) {
                          if($takeAnswers->label !== "NONE"){
                            if($takeQuestions->multi == 1){
                              // code...

                              ?>
                              <div class="offset-3 offset-sm-5 offset-lg-5 ">
                                <input type="checkbox" id="<?= $takeQuestions->id;?>" name="<?= $takeAnswers->id;?>" value="<?= $takeAnswers->id;?>">
                                <label for="<?= $takeQuestions->id;?>"><?= $takeAnswers->label;?></label>
                              </div>
                              <?php


                            }else{
                              ?>
                              <div class="offset-3 offset-sm-5 offset-lg-5 ">
                                <input type="radio" id="<?= $takeQuestions->id;?>" name="<?= $takeQuestions->id;?>" value="<?= $takeAnswers->id;?>">
                                <label for="<?= $takeAnswers->id;?>"><?= $takeAnswers->label;?></label>
                              </div>
                              <?php
                            }
                          }else{
                            ?>
                            <div class="offset-1 offset-sm-5 offset-lg-4 ">
                              <textarea id="<?= $takeQuestions->id;?>" name="<?= $takeQuestions->id;?>" placeholder="Expressions libre ..."></textarea>
                            </div>
                            <?php
                          }
                        }
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>
              <?php
            }
            ?>
            <button id="startQuestionbutton" type="submit" name="finishSurvey">Valider</button>
          </div>
        </form>
        <?php
      }else{
        ?>
        <div class="row">
          <div class="col-12 thxSurvey">
            <p>Merci d'avoir répondu au questionnaire</p>
            <p>Vous allez êtres redirigé vers l'accueil dans 2 secs</p>
            <p>Si ce n'est pas le cas cliquez <a href="index.php" title="accueil">ICI</a></p>
          </div>
        </div>
        <meta http-equiv="refresh" content="2;URL=index.php">
        <?php
      }
      ?>
    </div>
  </main>
  <footer id="footer">
    <div class="row">
      <p class="categoriesFooter offset-5 col-2">Partenaires</p>
    </div>
    <div class="row">
      <div class="col-4 col-sm-3 col-md-2 col-lg-2 offset-xl-2 col-xl-2 imgFoot">
        <img src="assets/images/hdf.jpg">
      </div>
      <div class="col-4 col-sm-3 col-md-2 col-lg-2 offset-xl-1 col-xl-2 imgFoot">
        <img src="assets/images/ccpn.jpg">
      </div>
      <div class="col-4 col-sm-3 col-md-2 col-lg-2 offset-xl-1 col-xl-2 imgFoot">
        <img src="assets/images/noyonLogo.jpg">
      </div>
    </div>
    <hr>
    <div class="row">
      <p id="makeBy" class="col-12">Site développé par <a href="https://www.kaiartsu.fr" title="www.kaiartsu.fr">Kaiartsu</a></p>
    </div>
    <div class="row">
      <p id="makeBy" class="col-6"><a href="https://www.kaiartsu.fr" title="www.kaiartsu.fr">Mentions légales</a></p>
      <p id="makeBy" class="col-6"><a href="https://www.kaiartsu.fr" title="www.kaiartsu.fr">Politiques de confidentialité</a></p>
    </div>
  </footer>
  <script src="assets/lib/bootstrap/js/bootstrap.js" type="text/javascript"></script>
</body>
</html>
