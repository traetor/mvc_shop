<div id="transporer">
    <?php
        $cart = $this->cart->contents();
        $grand_total = 0;
        foreach($cart as $item):
            echo form_hidden('cart[' . $item['id'] . '][id]', $item['id']);
            echo form_hidden('cart[' . $item['id'] . '][rowid]', $item['rowid']);
            echo form_hidden('cart[' . $item['id'] . '][name]', $item['name']);
            echo form_hidden('cart[' . $item['id'] . '][price]', $item['price']);
            echo form_hidden('cart[' . $item['id'] . '][qty]', $item['qty']);
            $grand_total = $grand_total + $item['subtotal'];
            if($grand_total!=0){?>
                <h3 class="transporter">Twój koszyk: <?php echo $grand_total; ?> zł</h3><?php
            }?>
    <?php  endforeach; ?>
            <?php if($grand_total==""){?>
            <h3 class="transporter">Twój koszyk: Jest pusty</h3>
    <?php } ?>
</div>