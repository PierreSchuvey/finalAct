
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
  <link href="assets/css/question.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <?php
  include_once 'models/dataBase.php';
  include_once 'models/users.php';
  include_once 'models/themes.php';
  include 'controllers/startQuestion.php';
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
      if(empty($_SESSION['connected'])){?>
        <div id="intro">
          <div class="row">
            <div class="col-12">
              <h1>
                Questionnaire
              </h1>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 offset-lg-1 col-lg-10">
              <p>
                La communauté de communes du pays noyonnais est un EPCI (établissement public de coopération
                intercommunale) regroupant 42 communes, pour 35 000 habitants environ.
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 offset-lg-1 col-lg-10">
              <p>
                La CCPN a dû faire face à de nombreuses décennies de désindustrialisation. Le noyonnais a alors subi
                le départ ou la disparition d’entreprises historiques (Federal Mogul, Intersnack, Jacob Delafon,
                Brézillon) et donc la perte significative d’emplois.
                En 2010, la fermeture du Régiment de Marche du Tchad s’est soldé par le départ de 1200 soldats et
                de leur famille. Un CRSD a alors été conclu entre l’Etat et la collectivité ce qui a permis au territoire
                d’investir dans des projets de redynamisation et ainsi de favoriser l’implantation d’entreprises et
                donc la création d’emplois locaux.
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 offset-lg-1 col-lg-10">
              <p>
                Le territoire noyonnais lance une réflexion à l’échelle locale associant tous les acteurs de son
                territoire (porteurs de projets, entreprises, salariés, associations, habitants, communes, etc.). Cette
                grande consultation prend la forme « <span id="specialTxt">d’Assises de l’économie et de l’emploi</span> », permettant au
                territoire d’écrire une véritable feuille de route économique.
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12 offset-lg-1 col-lg-10">
              <p>
                C’est dans ce contexte que la collectivité déploie différents modes de consultation dont ce
                questionnaire en ligne. Ce format a pour volonté de permettre au plus grand nombre de s’exprimer
                sur son territoire. L’objectif étant d’améliorer l’attractivité du territoire, en favorisant des solutions
                endogènes (nouvelles activités économiques).
              </p>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <form class="" action="#" method="post">
                <button id="startQuestionbutton" type="submit" name="startQuestion">Commencer le questionnaire</button>
              </div>
              <div class="col-12 form-group" id="acceptForm">
                <input type="checkbox" id="accept" name="accept">
                <label id="label" for="accept">En répondant à ce questionnaire j'accepte que les données insérées soient enregistrées et étudiées afin d’améliorer l’attractivité du territoire</label>
              </form>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <?php if(isset($formError['errorAccept'])){?><p class="alert alert-danger"><?php echo $formError['errorAccept'];}?></p>
            </div>
          </div>
        </div>
        <?php
      }elseif(isset($_POST['accept']) || $_SESSION['connected']==1){
        include 'vues/perso.php';
      }
      elseif(isset($_POST['perso']) || $_SESSION['connected']==2){
        include 'vues/selectTheme.php';
      }
      elseif(isset($_POST['selectTheme']) || $_SESSION['connected']==3){
        include 'vues/survey.php';
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
