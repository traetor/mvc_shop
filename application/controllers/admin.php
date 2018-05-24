<?php
class admin extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('commando_model');
        $this->load->library('pagination');
        $this->load->library('javascript');
        $this->load->library('email');
        $this->load->helper('url');
        $this->load->helper(array('form', 'url'));
    }
    function index($l='store', $categories='kompy', $page=0){
        //error_reporting(E_ALL ^ E_NOTICE);
        $data['who_is_logged'] = $this->load->view('commando/who_is_logged', '', TRUE); 
        $data['categories'] = $this->commando_model->get_all_categories();
        $data['left_menu_view'] = 'commando/categories';
        $data['total_rows'] = $this->commando_model->totalRowsInCategory($categories);
        $data['total_rows_all'] = $this->commando_model->totalRows();
        $data['items_per_page'] = $this->commando_model->itemsPerPage;
        $data['total_users'] = $this->commando_model->total_users();
        $data['users'] = $this->commando_model->users();
        $data['champion'] = $this->commando_model->users_where($categories);
        if($categories=='all'){
            $data['store_items'] = $this->commando_model->get_page($page);
        }else{
            $data['store_items'] = $this->commando_model->get_one_category($categories, $page);
        }
        if($categories=='all'){
            $data['store_items'] = $this->commando_model->get_page($page);
        }else{
        $data['store_items'] = $this->commando_model->get_one_category($categories, $page);
        }
        $data['transaction'] = $this->commando_model->get_transactions();
        $data['categoriesID'] = $categories;
        if($l=='store'){
            $data['content'] = 'commando/store_items';
        }elseif($l=='control'){
            $data['content'] = 'commando/control_panel';
        }elseif($l=='transactions'){
            $data['content'] = 'commando/transactions';
        }elseif ($l=='all_users') {
            $data['content'] = 'commando/members_list';
        }elseif($l=='edit_store_item'){
            $data['content'] = 'commando/edit_store_item';
        }elseif($l=='new_item'){
            $data['content'] = 'commando/new_item';
        }elseif ($l=='show_more') {
            $data['content'] = 'commando/show_more';
        }elseif($l=='change_status'){
            $data['content'] = 'commando/change_status';
        }elseif($l=='transactions_details'){
            $data['content'] = 'commando/transactions_details';
        }elseif($l=='update_photo'){
            $data['content'] = 'commando/change_picture';
        }elseif($l=='upload'){
            $config['upload_path'] = './assets/img/store_items';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '301';
		$config['max_height']  = '301';
                $config['min_width']  = '299';
		$config['min_height']  = '299';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$data = array('error' => $this->upload->display_errors());
			$data['content'] = 'commando/change_picture';
		}
		else
		{
			$data = array('commando/upload_data' => $this->upload->data());
			$data['content'] = 'commando/upload_success';
		}
        }
        $data['riddick'] = $this->commando_model->get_product_where($categories);
        $data['show_transactions_details'] = $this->commando_model->get_transactions_details($categories);
        $data['show_status'] = $this->commando_model->transactions_where($categories);
        $data['rambo'] = 'commando/signature';
        $data['transporter'] = 'commando/your_basket';
        $data['terminator'] = 'commando/store_name';
        $data['choose'] = $this->commando_model->choose();
        $this->load->view('admin_view', $data, array('error' => ' ' ));
    }
    function update_product(){
        $id = $this->input->post('id');
        $product = array(
            'item_name' => $this->input->post('name'),
            'item_price' => $this->input->post('price'),
            'category_name' => $this->input->post('category'),
            'item_descriptions' => $this->input->post('description')
        );
        $this->commando_model->update_product($id, $product);
        redirect('admin');
    }
    function do_upload(){
       /* $data['who_is_logged'] = $this->load->view('commando/who_is_logged', '', TRUE); 
        $data['categories'] = $this->commando_model->get_all_categories();
        $data['left_menu_view'] = 'commando/categories';
        $data['rambo'] = 'commando/signature';
        $data['transporter'] = 'commando/your_basket';
        $data['terminator'] = 'commando/store_name';*/
		$config['upload_path'] = './assets/img/store_items';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '100';
		$config['max_width']  = '301';
		$config['max_height']  = '301';
                $config['min_width']  = '299';
		$config['min_height']  = '299';
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('change_picture', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$this->load->view('upload_success', $data);   
		}
    }
    function update_transactions(){
        $id = $this->input->post('id');
        $user_ID = $this->input->post('user_ID');
        $transactions = array(
            'status' => $this->input->post('status')
        );
        $this->commando_model->update_transactions($id, $transactions);
        $this->email->from('jasiek.krol.pl@gmail.com', 'John');
$this->email->to('kroljasiek@gmail.com'); 

$this->email->subject('Email Test');
$this->email->message('Testing the email class.');	

$this->email->send();

echo $this->email->print_debugger();
        redirect('admin/index/transactions');
    }
    function create_item(){
        $item = array(
            'category_name' => $this->input->post('category'),
            'item_name' => $this->input->post('name'),
            'item_price' => $this->input->post('price'),
            'item_descriptions' => $this->input->post('description')
        );
        $this->commando_model->insert_item($item);
        redirect('admin');
    }
    function delete($id_s){
        $id = $id_s;
        $this->commando_model->delete_item($id);
        redirect('admin');
    }
}
