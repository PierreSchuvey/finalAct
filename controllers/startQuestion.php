<?php
if(isset($_POST['startQuestion']) && !empty($_POST['accept'])){
  $user = new users();
  $user->addUser();
  session_start();
  $_SESSION['connected'] = 1;
}elseif(isset($_POST['perso'])){
  $user = new users();
  $user->city = htmlspecialchars($_POST['local']);
  $user->zip = htmlspecialchars($_POST['zip']);
  $user->sex = htmlspecialchars($_POST['sex']);
  $user->age = htmlspecialchars($_POST['age']);
  $user->grade = htmlspecialchars($_POST['graduate']);
  $user->job = htmlspecialchars($_POST['pro']);
  $user->addPerso();
  $_SESSION['connected'] = 1;
  $themesList = new themes();
  $allThemes = $themesList->allThemes();
}elseif(isset($_POST['selectTheme'])){
  $_SESSION['connected'] = 1;
  $theme = new themes();
  $user = new users();
  $lastId = $user->lastId();
  $theme->idUser = $lastId->lastId;
    if($_POST[1] == 1){
      $theme->firstTheme = 1;
    }
    elseif($_POST[1] == 2){
      $theme->secondTheme = 1;
    }
    elseif($_POST[1] == 3){
      $theme->thirdTheme = 1;
    }
    elseif($_POST[1] == 4){
      $theme->fourthTheme = 1;
    }
    elseif($_POST[1] == 5){
      $theme->fifthTheme = 1;
    }
    elseif($_POST[1] == 6){
      $theme->sixthTheme = 1;
    }
    else{
      $theme->seventhTheme = 1;
    }


    if($_POST[2] == 1){
      $theme->firstTheme = 2;
    }
    elseif($_POST[2] == 2){
      $theme->secondTheme = 2;
    }
    elseif($_POST[2] == 3){
      $theme->thirdTheme = 2;
    }
    elseif($_POST[2] == 4){
      $theme->fourthTheme = 2;
    }
    elseif($_POST[2] == 5){
      $theme->fifthTheme = 2;
    }
    elseif($_POST[2] == 6){
      $theme->sixthTheme = 2;
    }
    else{
      $theme->seventhTheme = 2;
    }


    if($_POST[3] == 1){
      $theme->firstTheme = 3;
    }
    elseif($_POST[3] == 2){
      $theme->secondTheme = 3;
    }
    elseif($_POST[3] == 3){
      $theme->thirdTheme = 3;
    }
    elseif($_POST[3] == 4){
      $theme->fourthTheme = 3;
    }
    elseif($_POST[3] == 5){
      $theme->fifthTheme = 3;
    }
    elseif($_POST[3] == 6){
      $theme->sixthTheme = 3;
    }
    else{
      $theme->seventhTheme = 3;
    }


    if($_POST[4] == 1){
      $theme->firstTheme = 4;
    }
    elseif($_POST[4] == 2){
      $theme->secondTheme = 4;
    }
    elseif($_POST[4] == 3){
      $theme->thirdTheme = 4;
    }
    elseif($_POST[4] == 4){
      $theme->fourthTheme = 4;
    }
    elseif($_POST[4] == 5){
      $theme->fifthTheme = 4;
    }
    elseif($_POST[4] == 6){
      $theme->sixthTheme = 4;
    }
    else{
      $theme->seventhTheme = 4;
    }


    if($_POST[5] == 1){
      $theme->firstTheme = 5;
    }
    elseif($_POST[5] == 2){
      $theme->secondTheme = 5;
    }
    elseif($_POST[5] == 3){
      $theme->thirdTheme = 5;
    }
    elseif($_POST[5] == 4){
      $theme->fourthTheme = 5;
    }
    elseif($_POST[5] == 5){
      $theme->fifthTheme = 5;
    }
    elseif($_POST[5] == 6){
      $theme->sixthTheme = 5;
    }
    else{
      $theme->seventhTheme = 5;
    }


    if($_POST[6] == 1){
      $theme->firstTheme = 6;
    }
    elseif($_POST[6] == 2){
      $theme->secondTheme = 6;
    }
    elseif($_POST[6] == 3){
      $theme->thirdTheme = 6;
    }
    elseif($_POST[6] == 4){
      $theme->fourthTheme = 6;
    }
    elseif($_POST[6] == 5){
      $theme->fifthTheme = 6;
    }
    elseif($_POST[6] == 6){
      $theme->sixthTheme = 6;
    }
    else{
      $theme->seventhTheme = 6;
    }


    if($_POST[7] == 1){
      $theme->firstTheme = 7;
    }
    elseif($_POST[7] == 2){
      $theme->secondTheme = 7;
    }
    elseif($_POST[7] == 3){
      $theme->thirdTheme = 7;
    }
    elseif($_POST[7] == 4){
      $theme->fourthTheme = 7;
    }
    elseif($_POST[7] == 5){
      $theme->fifthTheme = 7;
    }
    elseif($_POST[7] == 6){
      $theme->sixthTheme = 7;
    }
    else{
      $theme->seventhTheme = 7;
    }

  $addSelectedTheme = $theme->addSelectedThemes();
}
?>
