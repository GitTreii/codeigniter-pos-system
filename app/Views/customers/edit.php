<!DOCTYPE html>
<html>
<head>
    <title>Edit Customer</title>
</head>
<body>

<nav>
    <a href="/">Home</a> |
    <a href="/about">About</a> |
    <a href="/customers">Customer Accounts</a> |
    <a href="/users">User Accounts</a>
</nav>

<h1>Edit Customer</h1>

<?php if (session()->getFlashdata('errors')): ?>
    <ul>
        <?php foreach (session()->getFlashdata('errors') as $error): ?>
            <li><?= esc($error) ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<form action="/customers/update/<?= $customer['id'] ?>" method="post">

    <label>Full Name:</label><br>
    <input
        type="text"
        name="full_name"
        value="<?= old('full_name', $customer['full_name']) ?>"
    ><br><br>

    <label>Email:</label><br>
    <input
        type="text"
        name="email"
        value="<?= old('email', $customer['email']) ?>"
    ><br><br>

    <label>Phone:</label><br>
    <input
        type="text"
        name="phone"
        value="<?= old('phone', $customer['phone']) ?>"
    ><br><br>

    <button type="submit">Update Customer</button>

</form>

</body>
</html>