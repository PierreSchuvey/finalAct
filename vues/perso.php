<div class="row">
  <div class="col-12">
    <h2>
      Vous concernant
    </h2>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <form class="" action="#" method="post">
      <div class="questionLabel right">
        <h3 class="questionTitlePurple">Vous résidez :</h3>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="noyon" name="local" value="À Noyon"
          checked>
          <label for="noyon">À Noyon</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="noyonnais" name="local" value="Dans le Noyonnais">
          <label for="noyonnais">Dans le Noyonnais</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="outTer" name="local" value="Hors du territoire">
          <label for="outTer">Hors du territoire</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
        <label for="zip">Code postal :</label>
          <input id="zip" placeholder="ex : 60400" name="zip" type="text" pattern="[0-9]*">
        </div>
        <?php if(isset($formError['errorZip'])){?><p class="alert alert-danger"><?php echo $formError['errorZip'];}?></p>
      </div>
      <div class="questionLabel left">
        <h3 class="questionTitleOrange">Vous êtes :</h3>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="man" name="sex" value="Homme"
          checked>
          <label for="man">Un homme</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="woman" name="sex" value="Femme">
          <label for="woman">Une femme</label>
        </div>
      </div>
      <div class="questionLabel right">
        <h3 class="questionTitlePurple">Tranche d'âge :</h3>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="firstPart" name="age" value="18-35"
          checked>
          <label for="firstPart">18 à 35 ans</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="secondPart" name="age" value="36-45">
          <label for="secondPart">36 à 45 ans</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="thirdPart" name="age" value="46-62">
          <label for="thirdPart">46 à 62 ans</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="fourthpart" name="age" value="63+">
          <label for="fourthpart">A partir de 63 ans</label>
        </div>
      </div>
      <div class="questionLabel left">
        <h3 class="questionTitleOrange">Votre niveau de diplôme :</h3>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="none" name="graduate" value="Sans diplôme"
          checked>
          <label for="none">Sans diplôme</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="cap" name="graduate" value="CAP, BEP">
          <label for="cap">CAP, BEP</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="bac" name="graduate" value="Baccalauréat">
          <label for="bac">Baccalauréat</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="bts" name="graduate" value="BAC +1 à BAC +3">
          <label for="bts">BAC +1 à BAC +3</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="master" name="graduate" value="A partir de Bac +5">
          <label for="master">A partir de Bac +5</label>
        </div>
      </div>
      <div class="questionLabel right">
        <h3 class="questionTitlePurple">Situation professionnelle :</h3>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="student" name="pro" value="Etudiant"
          checked>
          <label for="student">Etudiant</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="unjob" name="pro" value="Sans emploi">
          <label for="unjob">Sans emploi</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="lookingFor" name="pro" value="Demandeur d’emploi (DE)">
          <label for="lookingFor">Demandeur d’emploi (DE)</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="agri" name="pro" value="Agriculteur">
          <label for="agri">Agriculteur</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="arti" name="pro" value="Artisan, commerçant, chef d’entreprise">
          <label for="arti">Artisan, commerçant, chef d’entreprise</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="cadre" name="pro" value="Cadre et profession intellectuelle supérieure">
          <label for="cadre">Cadre et profession intellectuelle supérieure</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="inter" name="pro" value="Profession intermédiaire">
          <label for="inter">Profession intermédiaire</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="employee" name="pro" value="Employé">
          <label for="employee">Employé</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="worker" name="pro" value="Ouvrier">
          <label for="worker">Ouvrier</label>
        </div>
        <div class="offset-3 offset-sm-5 offset-lg-5 ">
          <input type="radio" id="retirement" name="pro" value="Retraité">
          <label for="retirement">Retraité</label>
        </div>
      </div>
      <button id="startQuestionbutton" type="submit" name="perso">Suivant</button>
    </form>
  </div>
</div>
