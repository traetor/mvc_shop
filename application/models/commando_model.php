<?php
class commando_model extends CI_Model {
    public $itemsPerPage=3;
    function __construct() {
        parent::__construct();
    }
    function create($data){
        extract($data);
        if($login=='' or $password=='' or $name=='' or $surname=='' or $code=='' or $mail=='' or $address=='' or $email==''){
            echo "<script>alert('Nie wszystkie pola zostaly wypelnione !');
                var link = '/Jan_Krol_Shop/index.php/';
                window.location = link+'commando/index/sign_up';</script>";
        }else{
            $this->db->query("insert into users (login, password, name, surname, code, mail, address, email, account_type) values "
                . "('$login', '$password', '$name', '$surname', '$code', '$mail', '$address', '$email', 'User')");
            echo "<script>alert('Konto zostalo utworzone !');
                var link = '/Jan_Krol_Shop/index.php/';
                window.location = link+'commando';</script>";
        }
    }
    function choose(){
        $login = $this->session->userdata('login');
        $query = $this->db->query("select * from users where login='$login'");
        return $query->result_array();
    }
    function ret(){
        $query = $this->db->get('store_items');
        return $query->result_array();
    }
    function try_login($login, $password){
        $query = $this->db->query("select * from users where login='$login' and password='$password'");
        if($query->num_rows()==1){
            if($query->num_rows()==1){
		return TRUE;
            }else {
		return FALSE;
            }
        }
    }
    function get_page($page){
        $offset=$page*$this->itemsPerPage;
        $query=$this->db->query("select * from store_items limit $offset, $this->itemsPerPage");
        return $query->result_array();
    }
    function totalRows(){
        return $this->db->count_all('store_items');
    }
    function total_users(){
        return $this->db->count_all('users');
    }
    function get_one_category($categories, $page){
        $offset=$page*$this->itemsPerPage;
        $query=$this->db->query("select * from store_items where category_name='$categories' limit $offset, $this->itemsPerPage");
        return $query->result_array();
    }
    function totalRowsInCategory($categories){
            $query=$this->db->query("Select count(*) as rows from store_items where category_name='$categories'");
            return $query->result_array()[0]['rows'];
        }
    function users(){
        $query = $this->db->query("select * from users");
        return $query->result_array();
    }
    function users_where($what){
        $query = $this->db->query("select * from users where user_ID='$what'");
        return $query->result_array();
    }
    function get_transactions(){
        $query = $this->db->get('transactions');
        return $query->result_array();
    }
    function get_transactions_where($user_ID){
        $query = $this->db->query("select * from transactions where user_ID='$user_ID'");
        return $query->result_array();
    }
            function get_all_categories(){
        $query=$this->db->query("select * from categories");
        foreach ($query->result_array() as $row){
            $data[]=$row;
        }
        return $data;
    }
    public function insert_customer($data){
        $this->db->insert('users', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }
    public function insert_order($data){
        $this->db->insert('transactions', $data);
        $id = $this->db->insert_id();
        return (isset($id)) ? $id : FALSE;
    }
    public function insert_order_detail($data){
        $this->db->insert('e_of_the_trans', $data);
    }
    public function update_customer($user_ID, $customer){
        $this->db->where('user_ID', $user_ID);
        $this->db->update('users', $customer);
    }
    function get_transactions_details($transactions_ID){
        $query = $this->db->query("SELECT store_items.item_name, store_items.item_price, e_of_the_trans.quantity from store_items, "
                . "e_of_the_trans where e_of_the_trans.id = store_items.id and e_of_the_trans.transactions_ID='$transactions_ID'");
        return $query->result_array();
        redirect('user/transactions_details');
    }
    function get_product_where($what){
        $query = $this->db->query("select * from store_items where id='$what'");
        return $query->result_array();
    }
    function update_product($what, $product){
        $this->db->where('id', $what);
        $this->db->update('store_items', $product);
    }
    function insert_item($what){
        $this->db->insert('store_items', $what);
    }
    function transactions_where($what){
        $query = $this->db->query("select * from transactions where transactions_ID='$what'");
        return $query->result_array();
    }
    function update_transactions($where, $what){
        $this->db->where('transactions_ID', $where);
        $this->db->update('transactions', $what);
    }
    function delete_item($what){
        $this->db->where('id', $what);
        $this->db->delete('store_items');
    }
}