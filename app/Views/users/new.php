<!DOCTYPE html>
<html>
<head>
    <title>New User</title>
</head>
<body>

<nav>
    <a href="/">Home</a> |
    <a href="/about">About</a> |
    <a href="/customers">Customer Accounts</a> |
    <a href="/users">User Accounts</a>
</nav>

<h1>New User</h1>

<?php if (session()->getFlashdata('errors')): ?>
    <ul>
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="/users/create" method="post">

    <label>Username:</label><br>
    <input type="text" name="username" value="<?= old('username') ?>"><br><br>

    <label>Full Name:</label><br>
    <input type="text" name="full_name" value="<?= old('full_name') ?>"><br><br>

    <button type="submit">Save User</button>

</form>

</body>
</html>