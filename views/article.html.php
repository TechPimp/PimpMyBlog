<div class="container">
    <div class="article">
        <h2 class="article__title editable" data-contentlabel='title' contenteditable="true">
            <?= $data['response']['title']; ?>
        </h2>
        <span class="article__date">
            Le <?= date('d/m/Y', strtotime($data['response']['date'])) ?>
        </span>
        <hr class="article__divider">
        <p class="article__item editable" data-contentlabel='content' contenteditable="true">
            <?= $data['response']['content']; ?>
        </p>
    </div>
</div>
