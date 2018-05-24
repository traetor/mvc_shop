<?php foreach ($champion as $c){ ?>
<h2>Panel użytkownika: <?php echo $c['name'];?> </h2>
<form name="control" method="post" action="<?php echo base_url() . 'index.php/admin/index/change_for_admin/'.$c['user_ID'] ?>">
    <div align="center">
        <table border="0" cellpadding="2px">
            <tr><td>Imie:</td><td><?php echo $c['name']; ?></td></tr>
            <tr><td>Nazwisko:</td><td><?php echo $c['surname']; ?></td></tr>
            <tr><td>Typ konta:</td><td><?php echo $c['account_type']; ?></td></tr>
            <tr><td>Kok pocztowy:</td><td><?php echo $c['code']; ?></td></tr>
            <tr><td>Email:</td><td><?php echo $c['email']; ?></td></tr>
            <?php } ?>
        </table>
    <input class="fg-button teal" type="button" value="Wróć" onclick="back_to_members()" />
</form>
