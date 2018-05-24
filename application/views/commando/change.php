<?php $user = $this->session->userdata('login'); ?>
<?php foreach ($choose as $c){?>
<h2>Edytowanie użytkownika : <?php echo $user ?></h2>
<form name="control" method="post" action="<?php echo base_url() . 'index.php/user/update_customer' ?>">
    <div align="center">
        <table border="0" cellpadding="2px">
           <?php $id_user = $c['user_ID'];
                echo form_hidden('id_user', $id_user);?>
            <tr><td>Imie:</td><td><input type="text" name="name" value="<?php echo $c['name']; ?>" /></td></tr>
            <tr><td>Nazwisko:</td><td><input type="text" name="surname" value="<?php echo $c['surname']; ?>" /></td></tr>
            <tr><td>Kok pocztowy:</td><td><input type="text" name="code" value="<?php echo $c['code']; ?>" /></td></tr>
            <tr><td>Email:</td><td><input type="text" name="email" value="<?php echo $c['email']; ?>" /></td></tr>
        </table>
    <input class="fg-button teal" type="button" value="Wróć" onclick="back_to_control()" />
    <input class="fg-button teal" type="button" value="Zmień moje hasło" onclick="change_password()" />
    <input type="submit" class="fg-button teal" value="Aktualizuj" /></div>
</form>

<?php }?>