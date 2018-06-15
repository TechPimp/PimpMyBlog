<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pimp my blog - <?= $data['response']['title'] ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<?php if (!empty($_SESSION['admin']) && $_SESSION['admin']): ?>
  <?php require_once('views/admin-bar.html.php') ?>
<?php endif; ?>

<h1 class="title-page">Pimp my blog</h1>
<nav class="nav-page">
  <ul class="content-link-page">
    <?php foreach ($data['menu'] as $e): ?>
      <li class="link-page<?= $e['id'] === $data['response']['id'] ? ' active' : null ?>">
        <a href="/articles/<?= $e['id'] ?>"><?= $e['title'] ?></a>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>
