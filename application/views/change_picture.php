<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shop</title>
        <link href="<?php echo base_url(); ?>assets/css/core.css" media="screen" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/core.js"></script>
    </head>
    <body>
        <div id="menu">
            <?php 
                echo $who_is_logged; 
                $this->view($transporter);
                echo $this->view($terminator);
                include 'commando/menu.php'; ?>
            <br /><br />
            <hr />
            <div id="category">
            <h2>Kategorie:</h2>
            <?php $this->view($left_menu_view); ?>
            </div>
            <div id="main">
            <?php echo $error;?>

           
<?php echo form_open_multipart('admin/do_upload');?>
<h2>Zmiana zdjęcia: </h2><br />
<input name="picture" type="file" size="20" />

<br /><br />

<input class="fg-button teal" type="submit" value="upload" />
<input class="fg-button teal" type="button" value="Wróć" onclick="back()" />
<?php echo form_close(); ?>
            </div>
            <br /><br />
            <?php $this->view($rambo); ?>
        </div>
    </body>
</html>