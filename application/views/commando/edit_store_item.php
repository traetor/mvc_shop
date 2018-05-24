<?php if($this->session->userdata('login')=='admin'){ ?>
<h2>Edytowanie produktu: </h2>
<form name="control" method="post" action="<?php echo base_url() . 'index.php/admin/update_product' ?>">
    <div align="center">
        <table border="0" cellpadding="2px" width="90%">
           <?php foreach ($riddick as $r){
                echo form_hidden('id', $r[id]);?>
            <tr><td>Nazwa produktu: </td><td><input type="text" name="name" value="<?php echo $r['item_name']; ?>" /></td></tr>
            <tr><td>Cena produktu: </td><td><input type="text" name="price" value="<?php echo $r['item_price']; ?>" /></td></tr>
            <tr><td>Categoria produktu:</td><td><input type="text" name="category" value="<?php echo $r['category_name']; ?>" /></td></tr>
            <tr height="100px"><td height="100px">Opis produktu:</td><td><input style="height: 100px; width: 400px;" type="text" name="description" value="<?php echo nl2br($r['item_descriptions']); ?>" /></td></tr>
           <?php } ?>
        </table>
    <input class="fg-button teal" type="button" value="Wróć" onclick="back()" />
    <input type="submit" class="fg-button teal" value="Aktualizuj" /></div>
</form>
<?php }?>