<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Support_online extends MY_Controller
{
    protected $module_name = "Support_online";

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('support_online_model');
        $this->auth = new Auth();
        $this->auth->check();

        $this->Check_module($this->module_name);
    }

    public function index($id = null)
    {
        $this->load->helper('model_helper');
        $config['upload_path'] = './upload/img/user_post/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
        $config['max_size'] = '5000';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $this->load->library('upload', $config);

        if ($id != null) {
            $data['item']  = $this->support_online_model->getFirstRowWhere('support_online',array('id'=>$id));
//            print_r($data['item']);
        }
        if(isset($_POST['Update'])){
            if($_POST['Id_Edit']){
                //update
                $arr=array(
                    'name'=>$this->input->post('name'),
                    'phone'=>$this->input->post('phone'),
                    'skype'=>$this->input->post('skype'),
                    'email'=>$this->input->post('email'),
                    'yahoo'=>$this->input->post('yahoo'),
                    'active'=>$this->input->post('active'),
                    'vitri'=>$this->input->post('vitri'),
                );
                $this->support_online_model->Update_where('support_online',array('id'=>$id),$arr);
                $file_xoa = $data['item'] ->image;
                if(is_file($file_xoa)){
                    unlink($file_xoa);
                }

                if($_FILES['userfile']['size'] >0)
                {
                    $image =$_FILES['userfile']['name'];
                    copy($_FILES['userfile']['tmp_name'],"upload/img/support/" .$image);
                    $file_dk="upload/img/support/".$image;
//                    print_r($file_dk); die();
                    $this->support_online_model->Update_where('support_online', array('id'=>$id), array('image' => $file_dk));
                }

                /*redirect($_SERVER['HTTP_REFERER']);*/
            }else{
                $arr=array(
                    'name'=>$this->input->post('name'),
                    'phone'=>$this->input->post('phone'),
                    'skype'=>$this->input->post('skype'),
                    'email'=>$this->input->post('email'),
                    'yahoo'=>$this->input->post('yahoo'),
                    'active'=>$this->input->post('active'),
                    'vitri'=>$this->input->post('vitri'),
//                    'type'=>$this->input->post('type'),
                );
                $id = $this->support_online_model->Add('support_online',$arr);
                if($_FILES['userfile']['size'] >0)
                {
                    $image =$_FILES['userfile']['name'];
                    copy($_FILES['userfile']['tmp_name'],"upload/img/support/" .$image);
                    $file_dk="upload/img/support/".$image;
                    $this->support_online_model->Update_where('support_online', array('id'=>$id), array('image' => $file_dk,));
                }

                /*redirect($_SERVER['HTTP_REFERER']);*/
            }
            /*redirect($_SERVER['HTTP_REFERER']);*/
            redirect(base_url('vnadmin/support_online/listSuport'));
        }
        $data['list']  = $this->support_online_model->getList('support_online');
        $data['headerTitle'] = 'Support online';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/support_online', $data);
        $this->load->view('admin/footer');
    }

    public function listSuport()
    {
        $data['list']  = $this->support_online_model->getList('support_online');
        $data['headerTitle'] = 'Support online';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/support_online_list', $data);
        $this->load->view('admin/footer');
    }


    //Delete Menu
    public function Delete($id){
        $this->support_online_model->Delete('support_online',$id);
        redirect($_SERVER['HTTP_REFERER']);
    }

}