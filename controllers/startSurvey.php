<?php
  $theme = new themes();
  $user = new users();
  $survey = new survey();
  $id = $user->lastId();
  $job = $user->takeJob();
  session_start() ;
  $_SESSION['connected'] = 3;
  $_SESSION['id'] = $id->lastId;
  $_SESSION['job'] = $job->job;
  $theme->idUser = $_SESSION['id'];
  $themeBySelect = $theme->themeBySelect();

?>
