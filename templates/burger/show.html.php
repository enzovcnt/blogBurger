<h2>The burger</h2>
<div class="border border-blue">
    <h2><?= $burger->getTitle()?></h2>
    <p><?= $burger->getContent() ?></p>

    <a href="/burger/update?id=<?= $burger->getId() ?>" class="btn btn-secondary">Edit</a>

</div>

<a href="/burgers" class="btn btn-secondary">Return</a>