<h2>Lista użytkowników:</h2>
<div id="members_list">
    <table class="users">
        <tr>
            <th>Login</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Typ konta</th>
            <th>Zobacz więcej</th>
        </tr>
        <?php foreach ($users as $u): ?>
        <tr>
            <td><?php echo $u['login']; ?></td>
            <td><?php echo $u['name']; ?></td>
            <td><?php echo $u['surname']; ?></td>
            <td><?php echo $u['account_type']; ?></td>
            <td class="show_more"><a href="<?php echo site_url('admin/index/show_more/'.$u['user_ID'])?>">zobacz więcej</a></td>
        </tr>
        <?php endforeach;?> 
    </table>
</div>