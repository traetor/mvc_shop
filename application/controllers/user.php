<?php
class user extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('commando_model');
        $this->load->library('pagination');
        $this->load->library('javascript');
        $this->load->helper('url');
    }
    function index($l='store', $categories='kompy', $page=0){
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
        $data['transaction'] = $this->commando_model->get_transactions();
        $data['choose'] = $this->commando_model->choose();
        foreach ($data['choose'] as $c){
            $data['transaction_where'] = $this->commando_model->get_transactions_where($c['user_ID']);
        }
        $data['show_transactions_details'] = $this->commando_model->get_transactions_details($categories);
        $data['categoriesID'] = $categories;
        if($l=='store'){
            $data['content'] = 'commando/store_items';
        }elseif($l=='control'){
            $data['content'] = 'commando/control_panel';
        }elseif($l=='cart'){
            $data['content'] = 'commando/cart';
        }elseif($l=='billing'){
            $data['content'] = 'commando/billing';
        }elseif($l=='billing_success'){
            $data['content'] = 'commando/billing_success';
        }elseif($l=='transactions'){
            $data['content'] = 'commando/transactions';
        }elseif($l=='transactions_details'){
            $data['content'] = 'commando/transactions_details';
        }elseif($l=='change'){
            $data['content'] = 'commando/change';
        }elseif($l=='change_password'){
            $data['content'] = 'commando/change_password';
        }elseif($l=='billing_now'){
            $data['content'] = 'commando/billing_now';
        }
        $data['users'] = $this->commando_model->users();
        $data['rambo'] = 'commando/signature';
        $data['transporter'] = 'commando/your_basket';
        $data['terminator'] = 'commando/store_name';
        $this->load->view('user_view', $data);
    }
    function add(){
        if($this->session->userdata('zalogowany')) {
            $insert_data = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'qty' => $this->input->post('quantity')
            );
            $this->cart->insert($insert_data);
            redirect('user');
        }else{
            redirect('commando');
        }
    }
    function buy_now(){
        if($this->session->userdata('zalogowany')) {
            $insert_data = array(
                'id' => $this->input->post('id'),
                'name' => $this->input->post('name'),
                'price' => $this->input->post('price'),
                'qty' => $this->input->post('quantity')
            );
            $this->cart->insert($insert_data);
            redirect('user/index/billing_now');
        }else{
            redirect('commando');
        }
    }
    function remove($rowid){
        if ($rowid==="all"){
            $this->cart->destroy();
        }else{
            $data = array(
                'rowid' => $rowid,
                'qty' => 0
            );
            $this->cart->update($data);
        }
        if($rowid=="all"){
            redirect('user');
        }else{
            redirect('user/index/cart');
        }
    }
    function update_cart(){
        $cart_info = $_POST['cart'];
        foreach( $cart_info as $id => $cart){
            $rowid = $cart['rowid'];
            $price = $cart['price'];
            $amount = $price * $cart['qty'];
            $qty = $cart['qty'];
            $data = array(
                'rowid' => $rowid,
                'price' => $price,
                'amount' => $amount,
                'qty' => $qty
            );
            $this->cart->update($data);
        }
        redirect('user/index/cart');
    }
    public function save_order(){
        $customer = array(
            'id_user' => $this->input->post('id_user'),
            'name' => $this->input->post('name'),
            'adres' => $this->input->post('adres'),
            'email' => $this->input->post('email')          
        );
       // $cust_id = $this->commando_model->insert_customer($customer);
        $status = "w realizacji";
        $order = array(
            'transactions_date' => date('Y-m-d'),
            'user_id' => $customer['id_user'],
            'status' => $status
        );
        $ord_id = $this->commando_model->insert_order($order);
        if ($cart = $this->cart->contents()):
            foreach ($cart as $item):
                $order_detail = array(
                    'transactions_ID' => $ord_id,
                    'id' => $item['id'],
                    'quantity' => $item['qty'],
                    'item_price' => $item['price']
                );
                $cust_id = $this->commando_model->insert_order_detail($order_detail);
            endforeach;
        endif;
        redirect('user/index/billing_success');
    }
    public function update_customer(){
        $user_ID = $this->input->post('id_user');
        $customer = array(
            'name' => $this->input->post('name'),
            'surname' => $this->input->post('surname'),
            'code' => $this->input->post('code'),
            'email' => $this->input->post('email')
        ); 
        $this->commando_model->update_customer($user_ID, $customer);
        redirect('user/index/control');
    }
    function update_customer_password(){
        $user_ID = $this->input->post('id_user');
        $password = $this->session->userdata('password');
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        if($old_password==$password){
            $customer = array(
                'password' => $new_password
            );
            $this->commando_model->update_customer($user_ID, $customer);
            echo "<script>alert('Haslo zostalo zmienione !');
                var link = '/Jan_Krol_Shop/index.php/';
                window.location = link+'user/index/control';</script>";
        }else{
            echo "<script>alert('Musisz wpisac poprawne stare haslo !');
                var link = '/Jan_Krol_Shop/index.php/';
                window.location = link+'user/index/change_password';</script>";
        }
    }
    function show_transactions_details($Transactions_ID){
        $data['show_transactions_details'] = $this->commando_model->get_transactions_details($Transactions_ID);
        redirect('user/index/transactions_details/'.$Transactions_ID);
    }
}
