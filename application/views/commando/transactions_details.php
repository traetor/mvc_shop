<h2>Szczegóły transakcji :</h2>

<div align="center">
        <table border="0" cellpadding="2px">
            <tr>
                <th>Produkt</th>
                <th>Cena</th>
                <th>Ilość</th>
                <th>suma</th>
            </tr>
            <?php $grand_total=0; $i = 1; foreach ($show_transactions_details as $s){ ?>
            <tr>
                <td><?php echo $s['item_name']; ?></td>
                <td><?php echo $s['item_price']; ?> zł</td>
                <td><?php echo $s['quantity']; ?></td>
                <?php $suma = $s['quantity']*$s['item_price'];
                $grand_total = $grand_total + $suma; ?>
                <td><?php echo $suma; ?> zł</td>
            </tr>
            <?php } ?>
            <tr>
                <td colspan="5">Wszystko razem: <?php echo $grand_total; ?> zł</td>
            </tr>
            
        </table></div>
<input class="fg-button teal" type="button" value="Wróć" onclick="back_to_transactions()" />
