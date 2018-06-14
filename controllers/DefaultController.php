<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 12/06/2018
 * Time: 14:29
 */

namespace CMS\Controllers;

class DefaultController {
    public function helloAction() {
        if (!file_exists('./config/credentials.yml')) {
            header('Location: /auth');
        } else {
            require_once './views/layout.html.php';
        }
    }

    public function getArticleById($id) {
        echo "articleId: " . $id;
    }
}