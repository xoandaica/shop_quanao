<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $options = '';

    function __construct() {
        parent::__construct();
        session_start();
        $this->load->helper('url');
        $this->load->helper('model_helper');
        $this->load->model('f_homemodel');
        $this->load->library('pagination');

        $count = 0;
        $total_price = 0;
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        } else {
            foreach ($_SESSION['cart'] as $v) {
                $count += $v['qty'];
                $total_price += $v['qty'] * $v['price_sale'];
                $qtyl = $v['qty'];
            }
        }


        if (!$this->session->userdata('liked')) {
            $this->session->set_userdata('liked', array());
        }
        $this->count_cart = $count;
        $this->total_price = $total_price;
        //language
        $this->load->helper('language');
        $weblang = array('vi' => 'vietnamese', 'en' => 'english', 'ch' => 'china', 'th' => 'thailand');
        if (isset($_SESSION['lang']) && $_SESSION['lang'] != null) {
            $_SESSION['lang'] = 'vi';
            $this->lang->load($_SESSION['lang'], $weblang[$_SESSION['lang']]);
        } else {
            $_SESSION['lang'] = 'vi';
            $this->lang->load($_SESSION['lang'], $weblang[$_SESSION['lang']]);
        }
        $la = $this->f_homemodel->get_data('language', array('alias' => $_SESSION['lang']), array(), true);
//            $this->language=$la->id;
        $this->language = 1;

        // mess language select
        if (isset($_SESSION['mess_lang']) && $_SESSION['mess_lang'] != null) {
            
        } else {
            @$_SESSION['mess_lang'] = @$_SESSION['mess_lang'];
        }
        // mess language select
        if (isset($_SESSION['mess_lang']) && $_SESSION['mess_lang'] != null) {
            
        } else {
            @$_SESSION['mess_lang'] = @$_SESSION['mess_lang'];
        }
        // $_SESSION check hàng xách
        if (isset($_SESSION['sesion_pro']) && $_SESSION['sesion_pro'] != null) {
            
        } else {
            $_SESSION['sesion_pro'] = 'yanonet';
        }
        $check = $this->f_homemodel->get_data('session_products', array('alias' => $_SESSION['sesion_pro']), array(), true);
        $this->row_producst = $check->id;
        // user_agent
        $this->load->library('user_agent');
        if ($this->agent->is_browser()) {
            $agent = $this->agent->browser() . ' ' . $this->agent->version();
        } elseif ($this->agent->is_robot()) {
            $agent = $this->agent->robot();
        } elseif ($this->agent->is_mobile()) {
            $agent = $this->agent->mobile();
        } else {
            $agent = 'Unidentified User Agent';
        }
        $this->option = $this->f_homemodel->getFirstRow('site_option');
        $this->site_name = $this->option->site_name;
        $this->site_logo = $this->option->site_logo;
        $this->site_logo2 = $this->option->site_logo2;
        $this->site_email = $this->option->site_email;
        $this->site_keyword = $this->option->site_keyword;
        $this->site_description = $this->option->site_description;
        $this->site_video = $this->option->site_video;
        $this->hotline1 = $this->option->hotline1;
        $this->hotline2 = $this->option->hotline2;
        $this->hotline3 = $this->option->hotline3;
        $this->site_facebook = $this->option->site_facebook;
        $this->option_1 = $this->option->option_1;
        $this->option_2 = $this->option->option_2;
        $this->option_3 = $this->option->option_3;
        $this->option_4 = $this->option->option_4;
        $this->option_5 = $this->option->option_5;
        $this->option_6 = $this->option->option_6;
        $this->option_7 = $this->option->option_7;
        $this->favicon = $this->option->favicon;
        $this->address = $this->option->address;
        $this->show_room = $this->option->show_room;
        $this->address_en = $this->option->address_en;
        $this->install_1 = $this->option->install_1;
        $this->install_2 = $this->option->install_2;
        $this->install_3 = $this->option->install_3;
        $this->install_4 = $this->option->install_4;
        $this->setup_1 = $this->option->setup_1;
        $this->setup_2 = $this->option->setup_2;
        $this->setup_3 = $this->option->setup_3;
        $this->setup_4 = $this->option->setup_4;
        $this->slogan_ship = $this->option->slogan_ship;

        if (!isset($_SESSION['review'])) {
            $_SESSION['review'] = array();
        }
        /* if(!isset($_SESSION['info_baokim'])){
          $_SESSION['info_baokim']='';
          } */
    }

    public function LoadHeader($seo = null, $url_cate = null, $id = null) {
        $data = array();
        if ($this->session->userdata('userid')) {
            @$u = $this->f_homemodel->getFirstRowWhere('users', array('id' => $this->session->userdata('userid')));
            $data['user_item'] = $u;
            $liked_id = (array) json_decode(@$u->liked);
            if (!empty($liked_id))
                $data['liked'] = $_SESSION['liked'];
        }
        $data['menus'] = $this->f_homemodel->GetMenu_Parent('top', 10, 0); //position , limit , ogg
        $data['menu_sub'] = $this->f_homemodel->GetMenu_Children('top', 50, 0);
        $data['pro_cat_home'] = $this->f_homemodel->Get_product_category('home', 50, 0);
        //end

        $data['province'] = $this->f_homemodel->get_data('province', array());

        //widget
        $data['slider_top'] = $this->widget('slider_top');
        $data['right'] = $this->widget('right');
//            $data['bottom_mb']     =$this->widget('bottom_mb');
//            $data['right_cat']     =$this->widget('right_cat');
        $data['dangnhap'] = $this->widget('dangnhap');
        $data['dangky'] = $this->widget('dangky');
//          $data['java_dangky']     =$this->widget('java_dangky');
        $data['cate_left'] = $this->widget('cate_left');

        if (@$this->language == 1) {
            $data['address'] = $this->address;
        } elseif (@$this->language == 2) {
            $data['address'] = $this->address_en;
        }
        if (@$this->language == 1) {
            $data['address2'] = $this->show_room;
        } elseif (@$this->language == 2) {
            $data['address2'] = $this->option_1;
        }

        $data['seo'] = $seo;
        $this->load->view('header', $data);
    }

    public function LoadFooter() {
        $data = array();
        $this->load->library('recaptcha');
//            $data['province']           =$this->f_homemodel->get_data('province',array());
        $data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
        $data['address'] = $this->address;
        $data['wiget_footer'] = $this->widget('wiget_footer');
        $data['script_footer'] = $this->widget('script_footer');
        $data['support'] = $this->widget('support');
        //echo "<pre>";var_dump($data['menu_footer']);die();
        $this->load->view('footer', $data);
    }

    public function widget($name = "") {
        $data = array();
        switch ($name) {

            case 'right':
                $data['menus_btt'] = $this->f_homemodel->GetMenu_Parent('bottom', 15, 0);
                $data['menu_sub_btt'] = $this->f_homemodel->GetMenu_Children('bottom', 50, 0);

                $data['pro_category'] = $this->f_homemodel->get_data('product_category', array('home' => 1, 'lang' => $this->language));

                $data['pro_focus'] = $this->f_homemodel->Get_product('focus', 4, 0);
                return $this->load->view('widgets/right', $data, true);
                break;




            case 'dangnhap':
                return $this->load->view('widgets/dangnhap', $data, true);
                break;

            case 'dangky':
                $data['province'] = $this->f_homemodel->get_data('province', array());
                return $this->load->view('widgets/dangky', $data, true);
                break;
            case 'java_dangky':
                return $this->load->view('widgets/java_dangky', $data, true);
                break;


            case 'slider_top':
                $data['slider'] = $this->f_homemodel->getBanner('banner_top');
                $data['slider_btt'] = $this->f_homemodel->getBanner('banner_btt');
                return $this->load->view('widgets/slider_top', $data, true);
                break;
        }
    }

    public function cate_idarray($id) {
        $arr = $this->f_homemodel->getArrayChildCate2($id);
        return $arr;
    }

    public function cate_idarray_project($id) {
        $arr = $this->f_homemodel->getArrayChildCate3($id);
        return $arr;
    }

    public function Check_module($module_name) {
        if ($this->session->userdata['adminid'] == 'af53b1505489') {
            return true;
        }

        $user_id = $this->session->userdata('adminid');

        if (isset($module_name) && isset($user_id)) {

            $user = $this->f_homemodel->getAdminAcc($user_id);

            if ($user->level == 0) {

                $module = $this->f_homemodel->getUserModules($user_id);

                $arr_module = explode(';', $module->module_name);

                if (in_array('Full', $arr_module)) {
                    return true;
                } elseif (in_array($module_name, $arr_module)) {
                    return true;
                } else {

                    die('Tai khoan cua ban khong duoc cap quyen truy cap chuc nang nay!');
//                redirect($_SERVER['HTTP_REFERER']);
                }
            }
        } else
            return false;
    }

    /*     * Zen ACL permission**************************************************** */

    public function check_acl() {

        $this->zend->load('Zend_Acl');

        $module = $this->router->fetch_module();

        $controller = $this->router->fetch_class();

        $action = $this->router->fetch_method();

        $level = $this->session->userdata('level');
        $user_id = $this->session->userdata('adminid');

        $this->setRoles();
        $this->setResources();
        $role = 'guest';
        //        $access=array('products'=>array('index', 'add','edit','list'),'news'=>array('index','add','edit','list'));
        $access_us = $this->f_homemodel->get_data('access', array('user_id' => $user_id), array(), true);

        @$access = json_decode(@$access_us->access);
        @$access = (array) $access;

        //level=1: admin; level=2: mod
        switch ($level) {
            case '1':
                $role = 'admin';
                break;
            case '2':
                $role = 'mod';
                break;
        }
//            echo $level ; die();
        $this->setAccess($role, $access);

        if (!$this->Zend_Acl->isAllowed($role, ':' . $controller, $action)) {
            $this->creat_mess('danger', 'Tài khoản của bạn chưa được cấp quyền chức năng này !');
            redirect(base_url('vnadmin'));
            die();
        }
    }

    public function setRoles() {
        $this->Zend_Acl->addRole(new Zend_Acl_Role('guest'))
                ->addRole(new Zend_Acl_Role('mod'))
                ->addRole(new Zend_Acl_Role('admin'));
    }

    public function setResources() {

        $this->Zend_Acl->add(new Zend_Acl_Resource(':admin'));
        $this->Zend_Acl->add(new Zend_Acl_Resource(':news'));
        $this->Zend_Acl->add(new Zend_Acl_Resource(':product'));
        $this->Zend_Acl->add(new Zend_Acl_Resource(':project'));
        $this->Zend_Acl->add(new Zend_Acl_Resource(':pages'));
        $this->Zend_Acl->add(new Zend_Acl_Resource(':menu'));
        $this->Zend_Acl->add(new Zend_Acl_Resource(':quotation'));
        $this->Zend_Acl->add(new Zend_Acl_Resource(':raovat'));
        $this->Zend_Acl->add(new Zend_Acl_Resource(':users'));
        $this->Zend_Acl->add(new Zend_Acl_Resource(':order'));
        $this->Zend_Acl->add(new Zend_Acl_Resource(':imageupload'));
        $this->Zend_Acl->add(new Zend_Acl_Resource(':contact'));
        $this->Zend_Acl->add(new Zend_Acl_Resource(':comment'));
        $this->Zend_Acl->add(new Zend_Acl_Resource(':trademark'));
        $this->Zend_Acl->add(new Zend_Acl_Resource(':personnel'));
        $this->Zend_Acl->add(new Zend_Acl_Resource(':customerIdea'));
    }

    public function setAccess($role = null, $access = null) {
        if ($role != null && is_array($access) && !empty($access)) {
            foreach ($access as $k => $v) {
                $this->Zend_Acl->allow($role, ':' . $k, $v);
            }
        }
        $this->Zend_Acl->allow('admin', null);
    }

    public function creat_mess($type = 'default', $mess = '') {
        $_SESSION['alert'] = array('type' => $type, 'mess' => '<i class="fa fa-exclamation-circle"></i>  ' . $mess);
    }

    public function LoadHeaderAdmin($headerTitle) {
        $data = array();
        if (@$this->language != '') {
            $data['get_lang'] = $this->f_homemodel->getFirstRowWhere('language', array('id' => @$this->language));
            $data['images_lang'] = '<li class="pull-right images_lang">
                 <img  src="' . base_url(@$data['get_lang']->image) . '" alt="Images Language"
                  style="max-width: 30px"/> </li>';
            $data['name_lang'] = '(<span class="name_lang"> ' . @$data['get_lang']->name . '</span>)';
            $data['id_lang'] = @$data['get_lang']->id;
            $data['display_lang'] = 'display_block';
        } else {
            $data['display_lang'] = 'display_none';
        }
        $data['lang'] = $this->f_homemodel->GetData('language');

        $data['headerTitle'] = $headerTitle;
        $this->load->view('admin/header', $data);
    }

    public function LoadFooterAdmin() {
        $data = array();
        $this->load->view('admin/footer', $data);
    }

}
