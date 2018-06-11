<?php

class Router {

  function __construct() {
    if (!file_exists('config.yml')) {
      echo 'initConfig';
    }
  }
}
