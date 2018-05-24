<div class="menu"><?php
error_reporting(E_ALL ^ E_NOTICE);
$admin = 'admin';
if($this->session->userdata('login')==$admin){?>
    <ol class="main_menu">
        <li><a href="<?php echo site_url('admin/index/store')?>">Strona Główna</a></li>
        <li><a href="<?php echo site_url('admin/index/control')?>">Panel administratora</a></li>
        <li><a href="<?php echo site_url('admin/index/all_users')?>">Użytkownicy</a></li>
        <li><a href="<?php echo site_url('admin/index/transactions')?>">Transakcje</a></li>
    </ol><?php
}elseif ($this->session->userdata('zalogowany')) {?>
    <ol class="main_menu">
        <li><a href="<?php echo site_url('user/index/store')?>">Strona Główna</a></li>
        <li><a href="<?php echo site_url('user/index/control')?>">Panel użytkownika</a></li>
        <li><a href="<?php echo site_url('user/index/cart')?>">Twój koszyk</a></li>
        <li><a href="<?php echo site_url('user/index/transactions')?>">Transakcje</a></li>
    </ol><?php
}else{?>
    <ol class="main_menu">
        <li><a href="<?php echo site_url('commando')?>">Strona Główna</a></li>
        <li><a onclick="error()">Panel użytkownika</a></li>
        <li><a onclick="error()">Twój koszyk</a></li>
        <li><a onclick="error()">Transakcje</a></li>
    </ol><?php
}
?></div>