<h2>Twój koszyk: </h2>
<?php if($this->session->userdata('zalogowany')){ ?>
<div id="text"><?php 
    $cart_check = $this->cart->contents();
    if(empty($cart_check)){?>
        <h3>Twój koszyk jest pusty. Wejdź na stronę główną i kliknij "Dodaj do koszyka" na produkcie, który chcesz kupić</h3><?php
    }
    ?></div>
<table width="100%" cellpadding="0" cellspacing="0">
    <?php if ($cart = $this->cart->contents()): ?>
    <thead>
        <tr id="main_heading">
            <td style="width: 50px;">ID</td>
            <td style="width: 600px">Nazwa</td>
            <td style="width: 150px">Cena</td>
            <td style="width: 80px">Ilość</td>
            <td width: 150px">Suma</td>
        </tr>
    </thead>
<?php 
    echo form_open('user/update_cart'); 
    ?>
    <tbody>
        <?php 
            $grand_total = 0;
            $i = 1; 
            foreach($cart as $item):
                // echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                // <input type="hidden" name="cart[1][id]" value="1" />
                echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
                echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
                echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
                echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
                echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
        ?>
        <tr <?php if($i&1){ echo 'class="alt"'; }?>>
            <td style="width: 50px;">
                <?php echo $i++; ?>
            </td>
            <td style="width: 500px">
                <?php echo $item['name']; ?>
            </td>
            <td style="width: 120px">
                <?php echo number_format($item['price'], 2); ?> zł
            </td>
            <td style="width: 80px">
                <?php echo form_input('cart[' . $item['id'] . '][qty]', $item['qty'], 'maxlength="3" size="1" style="text-align: right"'); ?>
            </td>
            <?php $grand_total = $grand_total + $item['subtotal']; ?>
            <td width: 150px">
                <?php echo number_format($item['subtotal'], 2) ?> zł
            </td>
            <td class="change_status"><a href="<?php echo site_url('user/remove/'.$item['rowid'])?>">Anuluj</a></td>
            <?php endforeach; ?>
        </tr>
        <tr> 
            <?php // "clear cart" button call javascript confirmation message ?>
            <td colspan="4" align="right"><input  class ='fg-button teal' type="button" value="Wyczyść" onclick="clear_cart()">
                <input class ='fg-button teal'  type="submit" value="Zaktualizuj">
                <?php echo form_close(); ?>
            <input class ='fg-button teal' type="button" value="Zamawiam" onclick="place_order()"></td>
            <td colspan="2"><b>Suma: <?php echo number_format($grand_total, 2); ?> zł</b></td> 
        </tr>
    </tbody>
    <?php endif;?>
</table>
<?php }else{
    ?><h2>Musisz się zalogować</h2><?php
}?>