<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 12/06/2018
 * Time: 14:29
 */

namespace CMS\Controllers;

use Symfony\Component\Yaml\Yaml;
use PDO;

class DefaultController {

    private $dbh;

    function __construct() {
      if (file_exists('./config/credentials.yml')) {
        $credential = Yaml::parseFile('config/credentials.yml');
        $this->dbh = new PDO("mysql:host={$credential['dbhost']};dbname={$credential['dbname']}", $credential["dbuser"], $credential["dbpass"]);
      }
    }

    public function helloAction() {
        if (!file_exists('./config/credentials.yml')) {
            header('Location: /auth');
        } else {

            $datas = [];
            foreach($this->dbh->query('SELECT title, subtitle from articles') as $row) {
                array_push($datas, $row);
            }
            var_dump($datas);

            require_once './views/layout.html.php';
        }
    }

    public function getArticleById($id) {
        echo "articleId: " . $id;
    }

    public function newArticle() {
        // $this->dbh->query('SELECT title, subtitle from articles');
    }
}
