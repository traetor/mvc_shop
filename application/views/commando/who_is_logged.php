<div id="who_is_logged">
<?php
    if($this->session->userdata('zalogowany')){
        $user = $this->session->userdata('login');?>
        <h4 class="logged">Jesteś zalogowany jako: <?php echo $user ?></h4>
        <ol id="logout">
            <li><a href="<?php echo site_url('commando/logout')?>">Wyloguj</a></li>
        </ol><?php
    }else {?>
        <form method="POST" action="<?php echo site_url('commando/login')?>">
	Login: <input type="text" name="login">
	Hasło: <input type="password" name="password">
	<input type="submit" value="Okey">
        <ol class="sign_up">
            <li><a href="<?php echo site_url('commando/index/sign_up')?>">Zajerestruj się</a></li>
        </ol>
        </form><?php                   
    }?>
</div>