<h2>Zmiana hasła :</h2>
<?php foreach ($choose as $c){?>
<form name="control" method="post" action="<?php echo base_url() . 'index.php/user/update_customer_password' ?>">
    <div align="center">
        <table border="0" cellpadding="2px">
           <?php $id_user = $c['user_ID'];
                echo form_hidden('id_user', $id_user);?>
            <tr><td>Stare hasło:</td><td><input type="password" name="old_password" value="" /></td></tr>
            <tr><td>Nowe hasło:</td><td><input type="password" name="new_password" value="" /></td></tr>
        </table>
    <input class="fg-button teal" type="button" value="Wróć" onclick="back_to_change()" />
    <input type="submit" class="fg-button teal" value="Aktualizuj" />
</form>
<?php } ?>

