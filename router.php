<?php

class Router {

  function __construct() {
    if (!file_exists('config.json')) {
      require_once('controllers/init_config_controller.php');
    }
    elseif ($_SERVER["REQUEST_URI"] === '/init-config') {
      require_once('controllers/init_config_controller.php');
    }
    elseif ($_SERVER["REQUEST_URI"] === '/') {
      require_once('index.php');
    }
  }
}
