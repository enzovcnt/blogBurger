<h3>The editing of the burger</h3>

<form action="/burger/update?id=<?= $burger->getId() ?>" method="post" class="form form-control:post">
    <input type="text" name="title" value="<?= $burger->getTitle() ?>">
    <input type="text" name="content" value="<?= $burger->getContent() ?>">

    <button class="btn btn-success" type="submit">Edit burger</button>
</form>
<a href="/burgers" class="btn btn-primary">Return</a>