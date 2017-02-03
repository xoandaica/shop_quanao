<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Order extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('ordermodel');
        $this->load->library('pagination');
        $this->auth = new Auth();
        $this->auth->check();
    }


    public function orders()
    {
        $this->check_acl();

        if($this->input->get()){


            $where = array(
                'code' => $this->input->get('code'),
                'cutommer' => $this->input->get('cutommer'),
                'email' => $this->input->get('email'),
                'phone' => $this->input->get('phone'),
                'status' => $this->input->get('status'),
            );

            //var_dump($where);die();
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('vnadmin/order/orders?code='
                                                       . $this->input->get('code')
                                                       . '&cutommer=' . $this->input->get('cutommer')
                                                       . '&phone=' . $this->input->get('phone')
                                                       . '&email=' . $this->input->get('email')
                                                       . '&status=' . $this->input->get('status'));
            $config['total_rows']           = $this->ordermodel->countsearch_result($where);
            $config['per_page']             = 20;
            $config['uri_segment'] = 4;


            $this->pagination->initialize($config);
            $data['item_list'] = $this->ordermodel->getsearch_result($where, $config['per_page'], $this->input->get('per_page'));


        }else{
            $config['base_url'] = base_url('vnadmin/order/orders');
            $config['total_rows'] = $this->ordermodel->count_All('order'); // xác định tổng số record
            $config['per_page'] = 20; // xác định số record ở mỗi trang
            $config['uri_segment'] = 4; // xác định segment chứa page number
            $this->pagination->initialize($config);
            $data['item_list'] = $this->ordermodel->Getlist_oder( $config['per_page'], $this->uri->segment(4));
        }
        $order_id=array();
        foreach($data['item_list'] as $v){
            $order_id[]=$v->id;
        }


        if(empty($data['item_list'])){
            $data['detail']=array();
        }else{
            $data['detail'] = $this->ordermodel->order_detail($order_id);
        }
        $data['province'] =  $this->ordermodel->GetData('province',null,null);
        $data['headerTitle'] = "Đặt hàng";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/oder_list', $data);
        $this->load->view('admin/footer');
    }
    public function delete($id)
    {
        $this->check_acl();
        if (is_numeric($id)) {
            $item=$this->ordermodel->getFirstRowWhere('order',array('id'=>$id));
            if(isset($item->image)&&file_exists($item->image)) {unlink($item->image);}
//            $this->productmodel->Delete('order', $id);
            $this->ordermodel->Delete_where('order',array('id'=>$id));
            redirect($_SERVER['HTTP_REFERER']);
        } else return false;
    }
    /**
     * update status order
     * @return bool
     */
    public function updateStatusOrder($id,$value)
    {
        //var_dump($value);die();
        $this->ordermodel->update('order',$id,array('status' => $value));

        redirect(base_url('vnadmin/danh-sach-dat-hang'));
    }
    public function Deleteorder($id){
        $this->check_acl();
        if (is_numeric($id)) {
            $this->ordermodel->Delete('order', $id);
            $this->ordermodel->Delete('order_item', $id);
            redirect($_SERVER['HTTP_REFERER']);
        } else return false;
    }

    public function UpdateSim($id = null)
    {
        $this->load->helper('ckeditor_helper');
        $this->load->helper('model_helper');
        $data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'ckeditor',
            'path' => 'js/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "800px", //Setting a custom width
                'height' => '300px', //Setting a custom height
            ));


        $item = $this->ordermodel->getItemByID('sim', $id);

        if (isset($_POST['Update'])) {

            if ($_POST['Id_Edit']) {
                //die('edit');
                $name = $this->input->post('name');
                $category = $this->input->post('category');
                $description = $this->input->post('description');
                $detail = $this->input->post('detail');
                $price = $this->input->post('price');
                $home = $this->input->post('home');
                $focus = $this->input->post('focus');
                $hot = $this->input->post('hot');
                $keyword = $this->input->post('keyword');
                $alias = make_alias($name);

                $pro = array('number' => $name,
                    'network' => $category,
                    'price' => $price,
                    'short_desc' => $description,
                    'description' => $detail,
                    'price' => $price,
                    'home' => $home,
                    'hot' => $hot,
                    'focus' => $focus,
                    'keyword' => $keyword,
                );

                $rs = $this->ordermodel->Update('sim', $id, $pro);

            } else {
                // die('add');
                $name = $this->input->post('name');
                $category = $this->input->post('category');
                $description = $this->input->post('description');
                $detail = $this->input->post('detail');
                $price = $this->input->post('price');
                $home = $this->input->post('home');
                $focus = $this->input->post('focus');
                $hot = $this->input->post('hot');
                $keyword = $this->input->post('keyword');
                $alias = make_alias($name);

                $pro = array('number' => $name,
                    'network' => $category,
                    'price' => $price,
                    'short_desc' => $description,
                    'description' => $detail,
                    'price' => $price,
                    'home' => $home,
                    'hot' => $hot,
                    'focus' => $focus,
                    'keyword' => $keyword,
                );

                $rs = $this->ordermodel->Add('sim', $pro);
            }
            redirect(base_url('vnadmin/danh-sach-sim'));
        }
//
//        $data['cate_root'] = $this->ordermodel->getListRoot('product_category');
//        $data['cate_chil'] = $this->ordermodel->getListChil('product_category');
        $data['item'] = $item;
        $data['headerTitle'] = "Sửa thông tin sim";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/sim_update', $data);
        $this->load->view('admin/footer');
    }



//    ======================================================================================================================
    public function productlist()
    {
        $config['base_url'] = base_url('vnadmin/danh-sach-san-pham');
        $config['total_rows'] = $this->ordermodel->count_All('product'); // xác định tổng số record
        $config['per_page'] = 20; // xác định số record ở mỗi trang
        $config['uri_segment'] = 3; // xác định segment chứa page number
        $this->pagination->initialize($config);
        $data = array();
        $data['cate_root'] = $this->ordermodel->getListRoot('product_category');
        $data['cate_chil'] = $this->ordermodel->getListChil('product_category');
        $data['prolist'] = $this->ordermodel->getListProduct('product', $config['per_page'], $this->uri->segment(3));
        $data['headerTitle'] = "Danh sách sản phẩm";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/product_list', $data);
        $this->load->view('admin/footer');
    }



    public function update_show(){
        if($this->input->post('order')!=0){
            $this->ordermodel->Update_where('order',array('id'=>$this->input->post('order')),array('show'=>1));
            echo 1;
        }
        if($this->input->post('id_order')!=0){
            $item= $this->ordermodel->GetFirstRowWhere('order',array('id'=>$this->input->post('id_order')));
            if($item->mark==0){
                $this->ordermodel->Update_where('order',array('id'=>$this->input->post('id_order')),array('mark'=>1));
                echo 1;
            }
            if($item->mark==1){
                $this->ordermodel->Update_where('order',array('id'=>$this->input->post('id_order')),array('mark'=>0));
                echo 0;
            }
        }
    }

    public function update_admin_note(){
        $id=$this->input->post('id');
        $_SESSION['messege']='';
        $rs['status']=false;

        $this->ordermodel->Update_where('order', array('id' => $id),array('admin_note'=>$this->input->post('note')));

        $_SESSION['messege']='Cập nhật ghi chú thành công!';
        $rs['status']=true;

        $rs['mess']=$_SESSION['messege'];
        echo  json_encode($rs);
    }

    public function update_order_status(){
        $this->check_acl();
        $id=$this->input->post('item');
        $rs=array();
        $rs['check']=false;
        $rs['status']='';

        $this->ordermodel->Update_where('order', array('id' => $id),array('status'=>$this->input->post('value')));

        $rs['check']=true;
        if($this->input->post('value')==1){
            $rs['status']='Hoàn thành';
            $rs['color']='success';
        }
        if($this->input->post('value')==2){
            $rs['status']='Đã hủy';
            $rs['color']='danger';
        }
        if($this->input->post('value')==0){
            $rs['status']='Chờ duyệt';
            $rs['color']='primary';
        }

        echo  json_encode($rs);
    }
}