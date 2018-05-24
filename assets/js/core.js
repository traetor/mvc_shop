function clear_cart() {
    var result = confirm('Czy jesteś pewien, aby wszystko wyczyścić ?')
    var link = "/Jan_Krol_Shop/index.php/";
    if(result){
        window.location = link+"user/remove/all";
    }else{
        return false;
    }
}
function place_order(){
    var link = "/Jan_Krol_Shop/index.php/";
    window.location = link+"user/index/billing";
}
function add_item(){
    var link = "/Jan_Krol_Shop/index.php/";
    window.location = link+"user/add";
    alert('Musisz być zalogowany aby kupić ten produkt !');
}
function buy_item(){
    alert('Musisz być zalogowany, aby kupić ten produkt !');
}
function buy_now(){
    var link = "/Jan_Krol_Shop/index.php/";
    window.location = link+"user/buy_now";
}
function error(){
    alert('Brak dostępu. Musisz być zalogowany !');
}
function back_to_main(){
    var link = "/Jan_Krol_Shop/index.php/";
    window.location = link+"commando";
}
function back_to_control(){
    var link = "/Jan_Krol_Shop/index.php/";
    window.location = link+"user/index/control";
}
function change_password(){
    var link = "/Jan_Krol_Shop/index.php/";
    window.location = link+"user/index/change_password";
}
function back_to_change(){
    var link = "/Jan_Krol_Shop/index.php/";
    window.location = link+"user/index/change";
}
function back_to_transactions(){
    var link = "/Jan_Krol_Shop/index.php/";
    window.location = link+"user/index/transactions";
}
function back(){
    var link = "/Jan_Krol_Shop/index.php/";
    window.location = link+"admin";
}
function new_item(){
     var link = "/Jan_Krol_Shop/index.php/";
    window.location = link+"admin/index/new_item";
}
function back_to_members(){
    var link = "/Jan_Krol_Shop/index.php/";
    window.location = link+"admin/index/all_users";
}
function back_to_transactions2(){
    var link = "/Jan_Krol_Shop/index.php/";
    window.location = link+"admin/index/transactions";
}
function change_picture(){
    var link = "/Jan_Krol_Shop/index.php/";
    window.location = link+"admin/d";
}

