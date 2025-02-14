<h1>The burgers</h1>

<?php foreach ($burgers as $burger): ?>

<h2><?= $burger->getTitle()?></h2>
<p><?= $burger->getContent()?></p>

<a href="/burger/show?id=<?=$burger->getId() ?>" class="btn btn-primary">Read</a>

<?php endforeach; ?>