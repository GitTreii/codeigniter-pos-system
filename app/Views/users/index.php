<!DOCTYPE html>
<html>
<head>
    <title>User Accounts</title>
</head>
<body>

<nav>
    <a href="/">Home</a> |
    <a href="/about">About</a> |
    <a href="/customers">Customer Accounts</a> |
    <a href="/users">User Accounts</a> |
    <a href="/logout">Logout</a>
</nav>

<h1>User Accounts</h1>

<p>
    <a href="/users/new">Add New User</a>
</p>

<table border="1" cellpadding="10">
    <tr>
        <th>Username</th>
        <th>Full Name</th>
        <th>Avatar</th>
        <th>Action</th>
    </tr>

    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= esc($user['username']) ?></td>
            <td><?= esc($user['full_name']) ?></td>

            <td>
                <?php if (! empty($user['avatar'])): ?>
                    <img
                        src="/uploads/<?= esc($user['avatar']) ?>"
                        width="80"
                        height="80"
                        alt="Avatar"
                    >
                <?php else: ?>
                    <img
                        src="/placeholder.png"
                        width="80"
                        height="80"
                        alt="Placeholder Avatar"
                    >
                <?php endif; ?>
            </td>

            <td>
                <a href="/users/edit/<?= $user['id'] ?>">Edit</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>