<?php echo $error;?>

           
<?php echo form_open_multipart('admin/do_upload');?>
<h2>Zmiana zdjęcia: </h2><br />
<input name="picture" type="file" size="20" />

<br /><br />

<input class="fg-button teal" type="submit" value="upload" />
<input class="fg-button teal" type="button" value="Wróć" onclick="back()" />
<?php echo form_close(); ?>
