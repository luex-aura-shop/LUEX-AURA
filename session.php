<?php
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: login.html");
  exit();
}
?>
<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>
<?php
session_start();
if (!isset($_SESSION['user'])) {
  header("Location: login.html");
  exit();
}
