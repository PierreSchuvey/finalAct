<?php
if(isset($_POST['startQuestion']) && !empty($_POST['accept'])){
  session_start();
  $_SESSION['connected'] = 1;
}else {
}
?>
