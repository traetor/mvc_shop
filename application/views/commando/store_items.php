<div id="store_items">
    <h2>Produkty :</h2>
    <input type="button" class="fg-button teal" id="new_item" value="Nowy produkt" onclick="new_item()" />
<ul class="store_items">
    <?php foreach($store_items as $p){
        $id = $p['id'];
        $item_name = $p['item_name'];
        $item_price = $p['item_price'];
        $admin = "Admin";
        if($this->session->userdata('login')==$admin){
            $controler = "admin";
        }elseif ($this->session->userdata('zalogowany')) {
            $controler = "user";
        }else{
            $controler = "commando";
        }    
    $config['base_url'] = site_url($controler.'/index/store/'.$p['category_name'].'/');
    $config['total_rows'] = $total_rows/$items_per_page;
    $config['per_page'] = $items_per_page/$items_per_page; 
    $config['uri_segment'] = 5; 
    $this->pagination->initialize($config); 
    echo $this->pagination->create_links();
    ?>
    <li>
        <div id="item_name"><h2><?php echo $item_name; ?></h2></div> 
        <img class="img" src="<?php echo base_url(); ?>assets/img/store_items/<?php echo $p['small_pic']; ?>" alt="" />
        <h3 class="item_descriptions"><?php echo nl2br($p['item_descriptions']); ?></h3>
        <span class="price"><h1 id="price"><?php echo $item_price; ?> zł</h1></span>
        <?php 
            if($this->session->userdata('login')=='admin'){
                echo form_open('admin/index/edit_store_item/'.$id);
                echo form_hidden('name', $item_name);
                echo form_hidden('price', $item_price);
                echo form_hidden('category', $category_name);
                echo form_hidden('description', $item_description);?>
                <div id="add_button3"><?php
                     $btn = array(
                        'class' => 'fg-button teal',
                        'value' => 'Edytuj informacje',
                        'name' => 'action'
                    );
                     echo form_submit($btn); 
                     echo form_close(); ?>
                </div><?php
                echo form_open('admin/index/update_photo');
                echo form_hidden('small_pic', $id);
                echo form_hidden('small_pic', $small_pic);?> 
                <div id="add_button4">
                    <input class="fg-button teal" type="submit" value="Zmień zdjęcie" onclick="" />
                    <?php echo form_close(); ?>
                </div>
                    <?php echo form_open('admin/delete/'.$id); 
                    ?><div id="add_button5"><?php
            $btn = array(
                        'class' => 'fg-button teal',
                        'value' => 'Usuń',
                        'name' => 'action'
                    );
                     echo form_submit($btn); 
         echo form_close(); ?></div><?php
            }else{
        ?>
         <?php $data = array('onsubmit'=>"add_item()");?>
        <?php
            if($this->session->userdata('zalogowany')) {
                echo form_open('user/add');
            }else{
                echo form_open('', $data); 
            }
        ?>
        <span class="quantity">
            <h3>Ilość
                <?php echo form_input('quantity', '1', 'maxlength="2"'); ?>
                <?php echo form_hidden('id', $id); ?>
                <?php echo form_hidden('name', $item_name); ?>
                <?php echo form_hidden('price', $item_price); ?></h3></span>
                <div id="add_button"><?php
                     $btn = array(
                        'class' => 'fg-button teal',
                        'value' => 'Dodaj do koszyka',
                        'name' => 'action'
);
                     echo form_submit($btn); 
                     echo form_close(); ?>
                </div>
        <?php 
            echo form_open('user/buy_now');
            echo form_hidden('quantity', 1);
            echo form_hidden('id', $id); 
            echo form_hidden('name', $item_name); 
            echo form_hidden('price', $item_price); 
            if($this->session->userdata('zalogowany')){
                $buy_item = 'buy_now()';
            }else{
                $buy_item = 'buy_item()';
            }
        ?>
        <div id="add_button2">
            <input type="submit" class="fg-button teal" value="Kup teraz" onclick="<?php echo $buy_item; ?>" />
        </div>
    <?php echo form_close(); }}?>
    </li>    
</ul>
<?php
    echo $this->pagination->create_links();
?>
</div>