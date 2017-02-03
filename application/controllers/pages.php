<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    class Pages extends MY_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('f_pagesmodel');
            $this->load->library('pagination');
        }

        public function page_content($alias,$id){

            $data['page']=$this->f_pagesmodel->get_data('staticpage',array('alias'=>$alias,'id'=>$id),array(),true);
            $data['pages_kind']=$this->f_pagesmodel->get_data('staticpage',array('focus'=>1),array('id'=>'desc'));

            $data['page_home']           = $this->f_homemodel->Get_pages('home',20,0);
            $data['link_share'] = base_url($data['page']->alias.'-pages'.$data['page']->id);
            if(isset($_POST['sendcontact'])){
                $arr=array('full_name' => $this->input->post('full_name'),
                    'name_project' => $this->input->post('name_project'),
                    'link_project' => $this->input->post('link_project'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'address' => $this->input->post('address'),
                    'city' => $this->input->post('city'),
                    'country' => $this->input->post('country'),
                    'comment' => $this->input->post('comment'),

                    'time' => time(),
                );
                $this->f_pagesmodel->Add('contact',$arr);
                $_SESSION['mss_success'] = 'Gửi thông tin báo giá thành công !';
            }
            $seo=array('title'=>@$data['page']->title_seo==''?@$data['page']->name:@$data['page']->title_seo,
                'description'=>@$data['page']->description_seo,
                'keyword'=>@$data['page']->keyword_seo,
                'type'=>'staticpage');

            $this->LoadHeader($seo);
            $this->load->view('pagecontent',$data);
            $this->LoadFooter();
        }

        public function page_bycat(){

            $config['base_url'] = base_url('pages-all');
           $config['total_rows'] = $this->f_pagesmodel->CountPageHome('home'); // xác định tổng số record
            $config['per_page'] = 5; // xác định số record ở mỗi trang
            $config['uri_segment'] = 2; // xác định segment chứa page number
            $config['full_tag_open'] = "<ul class='pagination'>";
            $config['full_tag_close'] ="</ul>";
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
            $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
            $config['next_tag_open'] = "<li>";
            $config['next_tagl_close'] = "</li>";
            $config['prev_tag_open'] = "<li>";
            $config['prev_tagl_close'] = "</li>";
            $config['first_tag_open'] = "<li>";
            $config['first_tagl_close'] = "</li>";
            $config['last_tag_open'] = "<li>";
            $config['last_tagl_close'] = "</li>";
            $this->pagination->initialize($config);
            $data = array();
            $data['list']            = $this->f_pagesmodel->PageView('home',$config['per_page'], $this->uri->segment(2));


        //   $data['pages']=$this->f_pagesmodel->get_data('staticpage',array('home'=>1,'lang'=>$this->language),array('id'=>'desc'));
            $seo=array('title'=>'Page',
                'description'=>'Page',
                'keyword'=>'Page',
                'type'=>'pages');

            $this->LoadHeader($seo);
            $this->load->view('pagecontent_bycat',$data);
            $this->LoadFooter();
        }
    }