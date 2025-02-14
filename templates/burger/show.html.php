<h2>The burger</h2>
<div class="border border-blue">
    <h2><?= $burger->getTitle()?></h2>
    <p><?= $burger->getContent() ?></p>

    <a href="/burger/update?id=<?= $burger->getId() ?>" class="btn btn-secondary">Edit</a>
    <a href="/burger/delete?id=<?= $burger->getId() ?>" class="btn btn-secondary">Delete</a>
</div>

<div class="border border-red">
    <?php foreach ($burger->getComments() as $comment) : ?>

        <p><strong><?= $comment->getContent() ?></strong></p>

    <?php endforeach; ?>
</div>

<div class="border border-green">

    <form class="form form-control" action="/comment/new" method="post">
        <input type="text" name="content" class="form-control:text">
        <input type="hidden" name="burgerId" value="<?=$burger->getId() ?>">
        <button type="submit" class="btn btn-success">Comment</button>

    </form>

</div>

<a href="/burgers" class="btn btn-secondary">Return</a>