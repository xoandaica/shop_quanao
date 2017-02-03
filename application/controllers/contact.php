<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('contact_model');
    }
    //index
    public function index(){
        if(isset($_POST['sendcontact'])){
            $arr=array('full_name' => $this->input->post('full_name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'country' => $this->input->post('country'),
                'comment' => $this->input->post('comment'),
                'time' => time(),
                'title' => $this->input->post('title'),
                'comment' => $this->input->post('comment'),
            );
            $id=$this->contact_model->Add('contact',$arr);
            if(isset($id)){
                $_SESSION['mss_success']="Bạn đã gửi thông tin thành công!!!";
            }

            redirect($_SERVER['HTTP_REFERER']);
        }
        $seo=array('title'=>lang('contact'),
            'description'=>lang('contact'),
            'keyword'=>lang('contact'),
            'type'=>lang('contact'));
        $data['menu_r']=$this->f_homemodel->getData('menu',array('position'=>'left'));

        $this->LoadHeader($seo);
        $this->load->view('contact',$data);
        $this->LoadFooter();
    }
    public function send_contact(){
        if(isset($_POST['sendcontact2'])){
            $arr=array('full_name' => $this->input->post('full_name'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'address' => $this->input->post('address'),
                'city' => $this->input->post('city'),
                'country' => $this->input->post('country'),
                'comment' => $this->input->post('comment'),
                'time' => time(),

                'cardnumber' => $this->input->post('cardnumber'),
                'comment' => $this->input->post('comment'),
                'dk' => $this->input->post('dk'),

                'check' => $this->input->post('check'),
                'note' => $this->input->post('note'),
                'bank' => $this->input->post('bank'),
                'expirationdate' => $this->input->post('expirationdate'),
                'cardholdersname' => $this->input->post('cardholdersname'),
                'ccvccv2' => $this->input->post('ccvccv2'),
            );
            $id=$this->contact_model->Add('contact',$arr);
            if($id){
                $_SESSION['mss_success']="Bạn đã gửi thông tin thành công!!!";
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function send_emails(){
    if(isset($_POST['send_emails2'])){
        $arr=array('email' => $this->input->post('email'),
            'time' => time(),
            'code' => md5($this->input->post('email')),
        );


        $id=$this->contact_model->Add('emails',$arr);

        if($id){
            $_SESSION['mss_success']="Bạn đã gửi thông tin thành công!!!";
        }
      /*  if (isset($id)) {
            $this->load->library('email','');
            $subject = $this->site_name.'Thông báo Đăng kí nhận Bản tin';
            $message = '<p style="font-weight: bold">Đăng kí nhận Bản tin thành công tại: '.base_url().'</p>';
            $message .='<p>Email:'.$this->input->post('email').',<p>';
           // $message .='<p>Mã giảm giá khi mua hàng :'.md5($this->input->post('code')).',<p>';
            $body =
                '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
                    ' . $message . '
                    </body>
                    </html>';
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From:'.$this->input->post('email').' ' . "\r\n";
            mail($this->input->post('email'), "$subject", $body,$headers);
            redirect($_SERVER['HTTP_REFERER']);
        } */
        redirect($_SERVER['HTTP_REFERER']);
    }
}
    public function send_code(){
        $data['code_sale']   = $this->f_homemodel->get_data('code_sale',array());
        if(isset($_POST['send_code'])){
            $arr=array('code' => $this->input->post('code'),
            );
            $code_sale=0;
            $thongbao = '';
            $thongbao_sale = 0;

            $check_code=0;
            foreach( $data['code_sale'] as $code) {
                if ($this->input->post('code') == $code->code) {
                    $check_code=1;
                    $code_sale = $code->code;
                    $thongbao_sale = $code->price;
                }
            }
            if ($check_code == 1) {
                $_SESSION['mss_success']="Mã giảm giá hợp lệ!!!";
              //  redirect(base_url('gui-code-view'));
                $thongbao = 'Vui lòng nhập mã khi thanh toán trực tuyến để được giảm giá </br> Mã giảm giá củaq uý khách là:'
                .'<span  style="color: #f00" class="code-giamgia">'.$code_sale.'</span> </br> Giảm giá:  <span  style="color: #f00" class="code-giamgia"> -'.$thongbao_sale.'%</span>';
            }
            else {
               $_SESSION['mss_success']="Mã giảm giá không tồn tại!!!";
                $thongbao = 'Mã giảm giá không tồn tài quý khách vui lòng đăng ký Email để được nhận mã giảm giá';

            }
           // echo $thongbao;
           $thongbao=array('thongbao'=>@$thongbao);

            $this->LoadHeader();
            $this->load->view('send_code',@$thongbao);
            $this->LoadFooter();
        }
    }
    public function send_code_view(){
            $data = array();
            $this->LoadHeader();
            $this->load->view('send_code',@$data);
            $this->LoadFooter();

    }
    public function send_code_view_err(){
        $data = array();
        $this->LoadHeader();
        $this->load->view('send_code_err',@$data);
        $this->LoadFooter();

    }
}