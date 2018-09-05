<h1>Users</h1>
<div>
    <ul>
        <?php foreach ($users as $user): ?>
            <li>---<?= $user['name']; ?> </li>
        <?php endforeach;?>
    </ul>
</div>