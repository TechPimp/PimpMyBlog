<?php
/**
 * Created by PhpStorm.
 * User: jeremy
 * Date: 12/06/2018
 * Time: 15:28
 */

namespace CMS\Controllers;

use Symfony\Component\Yaml\Yaml;

class AuthenticationController {
    public function setupAuthentication() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $yaml = Yaml::dump($_POST);
            file_put_contents('/config/credentials.yml', $yaml);
            header('Location: /');
        } else {
            require_once('views/init_config.html.php');
        }
    }
}