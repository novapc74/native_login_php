<h1>Create User</h1>

<?php /**@var \App\Entity\User $user */
$user = $data['user'] ?>

<form name="user" , action="/users/update" method="POST">
    <input type="text"
           name="data['id']"
           value="<?php echo $user->getId() ?>"
           placeholder="Enter id">
    <br>
    <input type="text"
           name="data['firstName']"
           value="<?php echo $user->getFirstName() ?>"
           placeholder="Enter first name">
    <br>
    <input type="text"
           name="data['lastName']"
           value="<?php echo $user->getLastName() ?>"
           placeholder="Enter last name">
    <br>
    <input type="text"
           name="data['login']"
           value="<?php echo $user->getLogin() ?>"
           placeholder="Enter login">
    <br>
    <input type="password"
           name="data['password']"
           value="<?php echo $user->getPassword() ?>"
           placeholder="Enter password">
    <br>
    <input type="text"
           name="data['oldYear']"
           value="<?php echo $user->getOldYear() ?>"
           placeholder="Enter old year">
    <br>
    <button type="submit">Create User</button>
    <br>
    <a href="/">На главную</a>

</form>