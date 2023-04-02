
<?php if (null != $data['user']) : ?>
<?php $user = $data['user']; ?>
    <ul>
            <li>
                <?= "ID: " . $user['id'] ?>
            </li>
        <li>
            <?= "Имя " . $user['firstName'] ?>
        </li>
        <li>
            <?= "Фамилия " . $user['lastName'] ?>
        </li>
    </ul>
<?php endif ?>

<a href="/">На главную</a>
