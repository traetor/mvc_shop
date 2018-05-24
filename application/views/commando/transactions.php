<h2>Transakcje:</h2>
<?php if($this->session->userdata('zalogowany')){ ?>
        <div id="transactions">
            <table class="transactions">
                <?php if($this->session->userdata('login')=='admin'){?>
                <tr>
                    <th id="id" hidden="">Numer transakcji</th>
                    <th id="id">User ID</th>
                    <th>Data transakcji</th>
                    <th>Szczegóły</th>
                    <th>status</th>
                </tr>
                <?php foreach ($transaction as $t): ?>
                <tr>
                    <td id="id" hidden=""><?php echo $t['transactions_ID']; ?></td>
                    <td id="id"><?php echo $t['user_ID']; ?></td>
                    <td><?php echo $t['transactions_date']; ?></td>
                    <td class="show_more"><a href="<?php echo site_url('admin/index/transactions_details/'.$t['transactions_ID'])?>">Szczegóły</a></td>
                    <td><?php echo $t['status']; ?></td>
                    <td class="change_status"><a href="<?php echo site_url('admin/index/change_status/'.$t['transactions_ID'])?>">Zmień status</a></td>
                </tr>
                <?php endforeach; 
                }else{?>
                <tr>
                    <th id="id" hidden="">Numer transakcji</th>
                    <th id="id" hidden="">User ID</th>
                    <th>Data transakcji</th>
                    <th>status</th>
                    <th>Szczegóły</th>
                </tr> 
                <?php error_reporting(E_ALL ^ E_NOTICE); foreach ($transaction_where as $t):?>
                <tr>
                    <td id="id" hidden=""><?php echo $t['transactions_ID']; ?></td>
                    <td id="id" hidden=""><?php echo $t['user_ID']; ?></td>
                    <td><?php echo $t['transactions_date']; ?></td>
                    <td><?php echo $t['status']; ?></td>
                    <td class="show_more"><a href="<?php echo site_url('user/index/transactions_details/'.$t['transactions_ID'])?>">Szczegóły</a></td>
                </tr><?php
                    endforeach;
                }?>  
            </table>
        </div>
<?php }else{
    ?><h2>Niedostępne. Musisz się zalogować</h2><?php
}?>
