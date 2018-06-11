<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  file_put_contents('config.json', json_encode($_POST));
  header('Location: /');
}
else {
  require_once('views/init_config.html.php');
}
