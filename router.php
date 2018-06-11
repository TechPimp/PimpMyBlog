<?php

class Router {

  function __construct() {
    if (!file_exists('config.json')) {
      require_once('controllers/init_config_controller.php');
    }
    elseif ($_SERVER["REQUEST_URI"] === '/init_config') {
      require_once('controllers/init_config_controller.php');
    }
    else if ($_SERVER["REQUEST_URI"] === '/pages') {
      $pages = new PagesController;
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        pages.post();
      } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
        pages.get();
      }
    }
  }
}
