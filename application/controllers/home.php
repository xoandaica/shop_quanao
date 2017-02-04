<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('f_homemodel');
        $this->load->library('pagination');
        $this->load->model('contact_model');
    }
    //index
    public function index(){
        $this->home();
    }

   public function lang($lang){
        if($lang!=null){
            @$_SESSION['lang']=$lang;
            @$data['getlang']=$this->f_homemodel->getFirstRowWhere('language',array('alias'=>@$lang));
            @$_SESSION['mess_lang']= 'Bạn đã chuyển sang ngôn ngữ hiện tại sang '.$data['getlang']->name;
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    /*
       public function session_row($sesion_pro){
           if($sesion_pro!=null){
               $_SESSION['sesion_pro']=$sesion_pro;
               redirect(base_url());
           }
       }*/


    //Home
    public function capcha(){
        $this->load->library('recaptcha');
        //Store the captcha HTML for correct MVC pattern use.
        $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
//        die($data['recaptcha_html']);
            $this->load->view('capcha');
    }


    public function home(){
        $config['base_url'] = base_url('home');
        $config['total_rows'] = $this->f_homemodel->CountProView('home'); // xác ??nh t?ng s? record
        $config['per_page'] = 200; // xác ??nh s? record ? m?i trang
        $config['uri_segment'] = 2; // xác ??nh segment ch?a page number
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

        $data['pro_home']            = $this->f_homemodel->Get_product('home',$config['per_page'], $this->uri->segment(2));

        $data['pro_cat_focus']   = $this->f_homemodel->Get_product_category('focus',15,0);




       $data['function']=$this;

        $this->LoadHeader();
//        $this->load->view('home',$data);
        $this->LoadFooter();
    }
    public function tuyendung(){

    $data['news_cat_hot']   = $this->f_homemodel->getFirstRowWhere('news_category',array('hot'=> 1,'lang' => $this->language));
    $data['news_tuyendung']   = $this->f_homemodel->NewsFullTD(100,0);


    $data['right_tuyendung']     =$this->widget('right_tuyendung');
        $data['function']=$this;

        $this->LoadHeader();
        $this->load->view('tuyendung',$data);
        $this->LoadFooter();
    }
    public function test(){

        $data['function']=$this;
        $this->LoadHeader();
        $this->load->view('test',$data);
        $this->LoadFooter();
    }
    public function cookie(){

        $data['function']=$this;
        $this->LoadHeader();
        $this->load->view('cookie2',$data);
        $this->LoadFooter();
    }
    public function get_array_cate($id){
        $b=array();
        $a=$this->f_homemodel->array_cate($id);

        return $a;
    }
    public function chose_provi(){
        if($this->input->post('alias')){
            $a=$this->input->post('alias');
            $_SESSION['tinh_thanh']=$a;
            echo json_encode($a);
        }
    }
    public function add_email(){
        if($this->input->post('email')){
            $arr=array(
                       'email' => $this->input->post('email'),
                       'time' => time(),
            );
            $id=$this->f_homemodel->Add('emails',$arr);
            if($id){
                $_SESSION['mss_success']='Email của bạn đăng ký thành công!';
                redirect($_SERVER['HTTP_REFERER']);
            }
        }

    }


}