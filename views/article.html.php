
<h1 class="title-page" contenteditable="true">Pimp my blog</h1>
<nav class="nav-page">
  <ul class="content-link-page">
    <li class="link-page active">Home</li>
    <li class="link-page">Page 1</li>
    <li class="link-page">Page 2</li>
    <li class="link-page">Page 3</li>
    <li class="link-page">Page 4</li>
    <li class="link-page">Page 5</li>
  </ul>
</nav>
<div class="container">
    <div class="article">
        <h2 class="article__title" contenteditable="true">
            <?= $data['title']; ?>
        </h2>
        <span class="article__date" contenteditable="true">
            <?= $data['date']; ?>
        </span>
        <hr class="article__divider">
        <p class="article__item" contenteditable="true">
            <?= $data['text']; ?>
        </p>
    </div>
</div>