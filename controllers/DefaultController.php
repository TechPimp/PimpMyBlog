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
        if (!file_exists('credentials.yml')) {
            header('Location: /auth');
        } else {
            echo 'Hello World !';
        }
    }

    public function getArticleById($id) {
        echo "articleId: " . $id;
    }
}