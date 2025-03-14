<?php
session_start();
if(strip_tags(md5($_GET['key'])=='49477a98792ce189bd503e3f30a0950b'))
{
  $_SESSION['admin'] = true;

}
  header('location:./id.php');
 ?>
