<!DOCTYPE html>
<html>
<head>
    <title>New Customer</title>
</head>
<body>

<nav>
    <a href="/">Home</a> |
    <a href="/about">About</a> |
    <a href="/customers">Customer Accounts</a> |
    <a href="/users">User Accounts</a>
</nav>

<h1>New Customer</h1>

<?php if (session()->getFlashdata('errors')): ?>
    <ul>
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="/customers/create" method="post">

    <label>Full Name:</label><br>
    <input type="text" name="full_name" value="<?= old('full_name') ?>"><br><br>

    <label>Email:</label><br>
    <input type="text" name="email" value="<?= old('email') ?>"><br><br>

    <label>Phone:</label><br>
    <input type="text" name="phone" value="<?= old('phone') ?>"><br><br>

    <button type="submit">Save Customer</button>

</form>

</body>
</html>