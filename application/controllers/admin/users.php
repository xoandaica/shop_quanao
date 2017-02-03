<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller
{
    public function __construct() {
        parent::__construct();
        $this->load->model('usersmodel');
        $this->load->library('pagination');
        $this->auth = new Auth();
        $this->auth->check();
    }

    public function userslist(){
        $this->check_acl();
        $config['base_url'] = base_url('vnadmin/users/userslist');
        $config['total_rows'] = $this->usersmodel->count_All('users'); // xác định tổng số record
        $config['per_page'] = 10; // xác định số record ở mỗi trang
        $config['uri_segment'] = 4; // xác định segment chứa page number
        $this->pagination->initialize($config);
        $data = array();
        $data['userslist'] = $this->usersmodel->UsersListAll($config['per_page'], $this->uri->segment(4));
 
        $data['headerTitle']="Thành viên";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/users_list',$data);
        $this->load->view('admin/footer');
    }
    //Delete News
    public function delete($id){
        $this->check_acl();
        $this->usersmodel->Delete('users',$id);
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function changeStatusUser(){
        $id = $this->input->post('id');
        $user = $this->usersmodel->getItemByID('users',$id);
        if($user){
            if($this->usersmodel->changeStatusUser($id,$user->block)){
                if($user->block == 1){
                    echo json_encode('Block');
                }elseif($user->block == 0){
                    echo json_encode('Unlock');
                }
            }else
                echo json_encode(0);
        }else
            echo json_encode(0);
    }


    //user Login
    public function login(){
        if($this->input->post('email')){
            $username = $this->input->post('email');
            $pass = $this->input->post('pass');
            $admin = $this->usersmodel->loginAdmin($username,$pass);
            if(isset($admin->id)){
                $this->auth->login($admin);
                $lastlogin=array('lastlogin'=>time());
                $this->usersmodel->update($admin->id,$lastlogin);
                redirect(base_url('vnadmin'));
            }
        }
        $this->load->view('admin/login');
    }
    // user logout
    public function logout(){
        $this->auth->logout();
        redirect(base_url('vnadmin'));
    }

    public function active_user(){
        //$this->auth->check();
        $u=$this->usersmodel->getFirstRowWhere('users',array('id'=>$_POST['id']));

        if($u->active==1){
            $this->usersmodel->Update_where('users', array('id' => $_POST['id']), array('active'=>0));

        }else if($u->active==0){
            $this->usersmodel->Update_where('users', array('id' => $_POST['id']), array('active'=>1));
        }
        echo 1;
    }
//    ===================================================
    public function emails(){
        $this->check_acl();
        $config['base_url'] = base_url('vnadmin/emails');
        $config['total_rows'] = $this->usersmodel->count_All('emails'); // xác định tổng số record
        $config['per_page'] = 10; // xác định số record ở mỗi trang
        $config['uri_segment'] = 3; // xác định segment chứa page number
        $this->pagination->initialize($config);
        $data = array();
        $data['list'] = $this->usersmodel->GetData('emails',null,array('id','desc','dk'=>0),$config['per_page'], $this->uri->segment(3));

//        print_r($data['list']); die();
        $data['headerTitle']="Emails";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/emails',$data);
        $this->load->view('admin/footer');
    }
    public function delete_mail($id){
        $this->check_acl();
        $this->usersmodel->Delete('emails',$id);
        redirect($_SERVER['HTTP_REFERER']);
    }
    public function mail_coupon(){
        $this->check_acl();
        $this->load->helper('ckeditor_helper');
        $data['ckeditor']        = array(
            //ID of the textarea that will be replaced
            'id'     => 'ckeditor',
            'path'   => 'assets/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width'   => "800px", //Setting a custom width
                'height'  => '300px', //Setting a custom height
            ));

        if ($this->input->post('email')) {

              $email=implode(',',$this->input->post('email'));

            $_SESSION['email']=$email;
        }


        if(isset($_POST['send'])){
            $this->load->library('email', @$config);

            $subject = $this->input->post('subject');
            $message = $this->input->post('content');

           $code =   md5($this->input->post('nguoinhanmail'));
           // $message = md5($this->input->post('content'));
            $to_cc_mail = $this->input->post('nguoinhanmail');
//            echo'<pre>';
//            print_r($to_cc_mail); die();
            // Get full html:
            $body ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                    <html xmlns="http://www.w3.org/1999/xhtml">
                    <head>
                        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                        <title>' . htmlspecialchars($subject, ENT_QUOTES, $this->email->charset) . '</title>
                            <style type="text/css">
                                body {
                                    font-family: Arial, Verdana, Helvetica, sans-serif;
                                    font-size: 16px;
                                }
                            </style>
                        </head>
                        <body>
                        ' . $message . $code.'
                        </body>
                        </html>';

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

            // More headers
            $headers .= 'From: <'.$this->site_email.'>' . "\r\n";

//            mail($_SESSION['email'], "$subject", $body,$headers);
            mail($to_cc_mail, "$subject", $body,$headers);

            if ($this->email->send()) {
                       unset($_SESSION['email']);
                       $_SESSION['mess']='Gửi mail thành công!';
                redirect(base_url('vnadmin/users/emails'));
            } else {
                $_SESSION['mess']='Gửi mail thất bại!';
                redirect(base_url('vnadmin/users/emails'));
            }
        }

        $data['headerTitle']="Emails";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/mail_coupon',$data);
        $this->load->view('admin/footer');
    }
}