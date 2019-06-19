<div class="row">
  <div class="col-12">
    <h1>
      Les themes
    </h1>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <p>
      Le questionnaire qui vous est proposé se décompose en 7 parties, chacune abordant une thématique
      à forts enjeux pour les années à venir. Ces thématiques sont les suivantes :
    </p>
  </div>
  <div class="offset-1 offset-lg-4">
    <ul>
      <li>- L’offre d’accueil des entreprises</li>
      <li>- L’emploi</li>
      <li>- La mobilité</li>
      <li>- La place du campus Inovia dans le développement économique du territoire</li>
      <li>- L’économie de proximité : le commerce et les services</li>
      <li>- Le numérique dans l’économie territoriale</li>
      <li>- Comment optimiser les retombées de la démarche grand chantier du projet CSNE</li>
    </ul>
  </div>
</div>
</div>
<form class="" action="#" method="post">
  <p>Vous résidez :</p>
  <?php foreach($allThemes as $allThemes) {?>
    <div class="offset-3 offset-sm-5 offset-lg-5">
    <label for="noyon"><?= $allThemes->name ?> </label><br>
      <input type="radio" class="themes" name="<?= $allThemes->id ?>" value="1" checked>1</input>
      <input type="radio" class="themes" name="<?= $allThemes->id ?>" value="2">2</input>
      <input type="radio" class="themes" name="<?= $allThemes->id ?>" value="3">3</input>
      <input type="radio" class="themes" name="<?= $allThemes->id ?>" value="4">4</input>
      <input type="radio" class="themes" name="<?= $allThemes->id ?>" value="5">5</input>
      <input type="radio" class="themes" name="<?= $allThemes->id ?>" value="6">6</input>
      <input type="radio" class="themes" name="<?= $allThemes->id ?>" value="7">7</input>
    </div>
    <?php
  }
  ?>
  <p class="errorMessage"><?php if(isset($formError['errorSame'])){echo $formError['errorSame'];}?></p>
  <button id="startQuestionbutton" type="submit" name="selectTheme">Suivant</button>
</form>
