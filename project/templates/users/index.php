<?php if (null != $data['users']) : ?>
    <table border="1">
        <caption>Таблица пользователей</caption>
        <tr>
            <th>id</th>
            <th>first name</th>
            <th>last name</th>
            <th>old year</th>
            <th>login</th>
            <th>password</th>
        </tr>
        <tr>
            <?php foreach ($data['users'] as $user) : ?>
                <td><?= $user->id ?></td>
                <td><?= $user->firstName ?></td>
                <td><?= $user->lastName ?></td>
                <td><?= $user->oldYear ?></td>
                <td><a href="/users/<?= $user->id ?>"><?= $user->login ?></a></td>
                <td><?= $user->password ?></td>
            <?php endforeach; ?>
        </tr>
    </table>
<?php endif ?>
