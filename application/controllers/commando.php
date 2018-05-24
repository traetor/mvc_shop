<?php
class commando extends CI_Controller {  
    function __construct() {
        parent::__construct();
        $this->load->model('commando_model');
        $this->load->library('pagination');
        $this->load->library('javascript');
        $this->load->helper('url');
    }
    function index($l='store', $categories='kompy', $page=0){
        error_reporting(E_ALL ^ E_NOTICE);
        $data['who_is_logged'] = $this->load->view('commando/who_is_logged', '', TRUE); 
        $data['categories'] = $this->commando_model->get_all_categories();
        $data['left_menu_view'] = 'commando/categories';
        $data['total_rows'] = $this->commando_model->totalRowsInCategory($categories);
        $data['total_rows_all'] = $this->commando_model->totalRows();
        $data['items_per_page'] = $this->commando_model->itemsPerPage;
        if($categories=='all'){
            $data['store_items'] = $this->commando_model->get_page($page);
        }else{
            $data['store_items'] = $this->commando_model->get_one_category($categories, $page);
        }
        $data['categoriesID'] = $categories;
        if($l=='store'){
            $data['content'] = 'commando/store_items';
        }elseif ($l=='control') {
            $data['content'] = 'commando/control_panel';
        }elseif ($l=='cart') {
            $data['content'] = 'commando/cart';
        }elseif ($l=='transactions') {
            $data['content'] = 'commando/transactions';
        }elseif ($l='sign_up') {    
            $data['content'] = 'commando/new_account';
        }
        $data['rambo'] = 'commando/signature';
        $data['transporter'] = 'commando/your_basket';
        $data['terminator'] = 'commando/store_name';
        $admin = 'admin';
        if($this->session->userdata('login')==$admin) {
            redirect('admin');
        }elseif ($this->session->userdata('zalogowany')) {
            redirect('user');
        }else {
            $this->load->view('index', $data);
        }
    }
     function login(){
        if($this->commando_model->try_login($_POST['login'], $_POST['password'])){
            $this->session->set_userdata('login', $_POST['login']);
            $this->session->set_userdata('password', $_POST['password']);
            $this->session->set_userdata('zalogowany', true);
            echo "<script>
                var link = '/Jan_Krol_Shop/index.php/';
                window.location = link+'commando';</script>";
        }else{
            echo "<script>alert('Niepoprawny login lub haslo !');
                var link = '/Jan_Krol_Shop/index.php/';
                window.location = link+'commando';</script>";
        }
    }
    function logout(){
        $this->session->unset_userdata('zalogowany');
        $this->session->unset_userdata('login');
        $this->session->unset_userdata('password');
        redirect('commando/remove');
    }
    function newAccount() {
        $this->load->view('commando/new_account_view');
    }
    function create(){
        $this->commando_model->create($_POST);
    }
    function remove(){
        $this->cart->destroy();
        redirect('commando');
    }
}
