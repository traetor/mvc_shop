

<h3>Zdjęcie produktu zostało zmienione pomyślnie!</h3>

<ul>
<?php error_reporting(E_ALL ^ E_NOTICE); foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('upload', '!'); ?></p>
<input type="button" value="Wróć" onclick="" />

