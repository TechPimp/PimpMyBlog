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
        $this->dbh = new PDO("mysql:host={$credential['dbhost']};port={$credential['port']};dbname={$credential['dbname']}", $credential["dbuser"], $credential["dbpass"]);
      }
    }

    public function helloAction() {
        if (!file_exists('./config/credentials.yml')) {
            header('Location: /auth');
        } else {
            $datas = $this->dbh->query('SELECT title, date, content FROM articles');
            $response = $datas->fetch();
            render('views/default.html.php', $response);
        }
    }

    public function getArticleById($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $response = $this->dbh->query("SELECT content, date, title, id from articles WHERE id = {$id}");
            $data = [];
            $data['menu'] = $this->dbh->query("SELECT title, id from articles")->fetchAll();
            $data['response'] = $response->fetch();
            render('views/article.html.php', $data);
        } elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
            // put the updated article
        }
    }

    public function newArticle() {
        $query = $this->dbh->exec("
          INSERT INTO `articles` (`title`, `subtitle`, `content`)
          VALUES ('Titre de l’article', 'Sous-titre de l‘article', 'Contenu de l‘article');
        ");

        $response = $this->dbh->query('SELECT id FROM `articles` ORDER BY ID DESC LIMIT 1');

        header("location: /articles/{$response->fetch()['id']}");
    }
}
