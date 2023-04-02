
<h1>Title: <?= $title ?></h1>

<?php if (null != $users) : ?>
<ul>
    <?php foreach ($users as $user) : ?>
        <li>
            <?= $user ?>
        </li>
    <?php endforeach; ?>
</ul>
<?php endif ?>
