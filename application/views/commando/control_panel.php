<?php $user = $this->session->userdata('login'); ?>
<?php foreach ($choose as $c){?>
<h2>Panel użytkownika : <?php echo $user ?></h2>
<form name="control" method="post" action="<?php echo base_url() . 'index.php/user/index/change' ?>">
    <div align="center">
        <table border="0" cellpadding="2px">
            <tr><td>Imie:</td><td><?php echo $c['name']; ?></td></tr>
            <tr><td>Nazwisko:</td><td><?php echo $c['surname']; ?></td></tr>
            <tr><td>Typ konta:</td><td><?php echo $c['account_type']; ?></td></tr>
            <tr><td>Kok pocztowy:</td><td><?php echo $c['code']; ?></td></tr>
            <tr><td>Email:</td><td><?php echo $c['email']; ?></td></tr>
        </table>
    <input class="fg-button teal" type="submit" value="Edytuj" /></div>
</form>
<?php }?>