
<h1>Title: <?= $data['title'] ?></h1>

<?php if (null != $data['users']) : ?>
<ul>
    <?php foreach ($data['users'] as $user) : ?>
        <li>
            <?= $user ?>
        </li>
    <?php endforeach; ?>
</ul>
<?php endif ?>
