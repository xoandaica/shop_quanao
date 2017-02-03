<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Home extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->model('home_model');
            $this->load->library('pagination');
            $this->auth = new Auth();
            $this->auth->check();
            $this->datalang  = $this->home_model->get_data('language');
//            $this->check_acl();
        }
        protected $pagination_config= array(
            'full_tag_open'=>"<ul class='pagination'>",
            'full_tag_close'=>"</ul>",
            'num_tag_open'=>'<li>',
            'num_tag_close'=>'</li>',
            'cur_tag_open'=>"<li class='disabled'><li class='active'><a href='#'>",
            'cur_tag_close'=>"<span class='sr-only'></span></a></li>",
            'next_tag_open'=>"<li>",
            'next_tagl_close'=>"</li>",
            'prev_tag_open'=>"<li>",
            'prev_tagl_close'=>"</li>",
            'first_tag_open'=>"<li>",
            'first_tagl_close'=>"</li>",
            'last_tag_open'=>"<li>",
            'last_tagl_close'=>"</li>",
        );
        public function index()
        {
            $data['news']     = $this->home_model->count_All('news');
            $data['products'] = $this->home_model->count_All('product');
            $data['orders'] = $this->home_model->get_order_dashboard();

            $order_id=array();
            foreach($data['orders'] as $v){
                $order_id[]=$v->id;
            }

            if(empty($data['item_list'])){
                $data['detail_order']=array();
            }else{
                $data['detail_order'] = $this->home_model->order_detail($order_id);
            }

            $data['contacts'] = $this->home_model->contact_dashboard();
            $data['count_order'] = sizeof($data['orders']);

            $headerTitle = 'Admin Home';
            $this->LoadHeaderAdmin($headerTitle);
//            $this->load->view('admin/header');
            $this->load->view('admin/index', $data);
//            $this->load->view('admin/footer');
            $this->LoadFooterAdmin();
        }
    }