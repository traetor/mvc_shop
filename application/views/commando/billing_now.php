<?php
    $grand_total = 0;
    if($cart = $this->cart->contents()):
        foreach ($cart as $item):
            $grand_total = $grand_total + $item['subtotal'];
        endforeach;
    endif;
?>
<div id="billing">
    <form name="billing" method="post" action="<?php echo base_url() . 'index.php/user/save_order' ?>">
        <?php
            foreach ($choose as $c){
                $id_user = $c['user_ID'];
                $name = $c['name'];
                $surname = $c['surname'];
                $adres = $c['address'];
                $code = $c['code'];
                $email = $c['email'];
                echo form_hidden('id_user', $id_user);
                echo form_hidden('name', $name);
                echo form_hidden('adres', $adres);
                echo form_hidden('email', $email);        
        ?>
        <input type="hidden" name="command" />
        <div align="center">
            <h1 align="center">Szczegóły zamówienia</h1>
            <table border="0" cellpadding="2px">
                <tr><td>Produkt:</td><td><?php echo $item['name']; ?></td></tr>
                <tr><td>Suma:</td><td><strong><?php echo number_format($grand_total, 2); ?> zł</strong></td></tr>
                <tr><td>Imię:</td><td><?php echo $name; ?></td></tr>
                <tr><td>Nazwisko:</td><td><?php echo $surname; ?></td></tr>
                <tr><td>Adres:</td><td><?php echo $adres; ?></td></tr>
                <tr><td>Kok pocztowy:</td><td><?php echo $code; ?></td></tr>
                <tr><td>Email:</td><td><?php echo $email; ?></td></tr>
                <tr><td><?php echo "<a class ='fg-button teal'  id='back' href=" . base_url() . "index.php/user/remove/all>Cofnij</a>"; ?>
                        <input type="hidden" name="user_id" value="<?php echo $id_user; ?>" />
                </td><td><input class ='fg-button teal' type="submit" value="Zamawiam" /></td></tr>
            </table>
        </div>
    </form>
    <?php }?>
</div>
            