<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>

<nav>
    <a href="/">Home</a> |
    <a href="/about">About</a> |
    <a href="/customers">Customer Accounts</a> |
    <a href="/users">User Accounts</a>
</nav>

<h1>Edit User</h1>

<?php if (session()->getFlashdata('errors')): ?>
    <ul>
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="/users/update/<?= $user['id'] ?>" method="post" enctype="multipart/form-data">

    <label>Username:</label><br>
    <input
        type="text"
        name="username"
        value="<?= old('username', $user['username']) ?>"
    ><br><br>

    <label>Full Name:</label><br>
    <input
        type="text"
        name="full_name"
        value="<?= old('full_name', $user['full_name']) ?>"
    ><br><br>

    <label>Profile Picture:</label><br>
    <input type="file" name="avatar" accept=".jpg,.jpeg,.png"><br><br>

    <?php if (! empty($user['avatar'])): ?>
        <p>Current Avatar:</p>
        <img
            src="/uploads/<?= esc($user['avatar']) ?>"
            width="100"
            height="100"
            alt="User Avatar"
        >
        <br><br>
    <?php endif; ?>

    <button type="submit">Update User</button>

</form>

</body>
</html>