<?php if($this->session->userdata('login')=='admin'){ ?>
<h2>Edytowanie statusu: </h2>
<form name="status" method="post" action="<?php echo base_url() . 'index.php/admin/update_transactions' ?>">
    <div align="center">
        <table border="0" cellpadding="2px" width="90%">
           <?php foreach ($show_status as $s){
               $id = $s['transactions_ID'];?>
            <tr hidden=""><td hidden="">Nazwa produktu: </td><td><input type="text" name="user_id" value="<?php echo $s['user_ID']; ?>" /></td></tr>
            <tr hidden=""><td hidden="">Nazwa produktu: </td><td><input type="text" name="id" value="<?php echo $id ?>" /></td></tr>
            <tr><td>Nr transakcji:</td><td><?php echo $id; ?></td></tr>
            <tr><td>Data:</td><td><?php echo $s['transactions_date']; ?></td></tr>
            <tr><td>Status:</td><td><select name="status">
                        <option value="w realizacji">w realizacji</option>
                        <option value="wysłana">wysłana</option>
                        <option value="dostarczona">dostarczona</option>
            </select></td></tr>
           <?php } ?>
        </table>
    <input class="fg-button teal" type="button" value="Wróć" onclick="back_to_transactions2()" />
    <input type="submit" class="fg-button teal" value="Aktualizuj" /></div>
</form>
<?php }?>