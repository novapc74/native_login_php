<?php if (null != $data['user']) : ?>
    <?php $user = $data['user']; ?>
    <ul>
        <li>
            <?= "ID: " . $user->id ?>
        </li>
        <li>
            <?= "Имя " . $user->firstName ?>
        </li>
        <li>
            <?= "Фамилия " . $user->lastName ?>
        </li>
        <li>
            <?= "Возраст " . $user->oldYear ?>
        </li>
        <li>
            <?= "Логин " . $user->login ?>
        </li>
    </ul>
<?php endif ?>

<a href="/">На главную</a>
