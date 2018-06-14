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

            render('views/default.html.php');
        }
    }

    public function getArticleById($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $response = $this->dbh->query("SELECT * from articles WHERE id = {$id}");
            $data = $response->fetch();
            render('views/article.html.php', $data);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            //

        }
    }

    public function newArticle() {
        $query = $this->dbh->exec('INSERT INTO `articles` (`id`, `title`, `subtitle`, `content`, `date`, `category`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL);');

        $response = $this->dbh->query('SELECT id FROM `articles` ORDER BY ID DESC LIMIT 1');

        header("location: /articles/{$response->fetch()['id']}");
    }
}
