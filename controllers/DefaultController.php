<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 12/06/2018
 * Time: 14:29
 */

namespace CMS\Controllers;

class DefaultController
{
    public function helloAction()
    {
        echo "Hello world";
    }

    public function getArticleById($id)
    {
        echo "id: " . $id;
    }
}