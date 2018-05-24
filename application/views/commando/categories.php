<?php
    $admin = 'admin';
    if($this->session->userdata('login')==$admin){
        $controler = "admin";
    }elseif ($this->session->userdata('zalogowany')) {
        $controler = "user";
    }else{
        $controler = "commando";
    }
?>
<ol class="categories">
    <!--<li><a href="<?php echo site_url($controler.'/index/store')?>">Wszystko</a></li>-->
    <?php foreach ($categories as $p): ?>
    <li>
        <a href='<?php echo site_url($controler."/index/store/{$p['category_name']}") ?>'>
            <?php echo $p['category_name'] ?>
        </a>
    </li>
<?php endforeach; ?>
</ol> 
