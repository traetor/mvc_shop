<h2>Nowy product :</h2>
<form name="control" method="post" action="<?php echo base_url() . 'index.php/admin/create_item' ?>">
    <div align="center">
        <table border="0" cellpadding="2px" width="90%">
            <tr><td>Nazwa produktu: </td><td><input type="text" name="name" value="" /></td></tr>
            <tr><td>Cena produktu: </td><td><input type="text" name="price" value="" /> zł</td></tr>
            <tr><td>Categoria produktu:</td><td><select name="category">
                        <option value="kompy">kompy</option>
                        <option value="monitory">monitory</option>
            </select></td></tr>
            <tr height="100px"><td height="100px">Opis produktu:</td><td><input style="height: 100px; width: 400px;" type="text" name="description" value="" /></td></tr>
            <tr><td>Zdjęcie: </td><td><input type="file" name="picture" value="Prześlij" /><h5>Wymiary: 300x300</h5></td></tr>
        </table>
    <input class="fg-button teal" type="button" value="Wróć" onclick="back()" />
    <input type="submit" class="fg-button teal" value="Utwórz" /></div>
</form>
