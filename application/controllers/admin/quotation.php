<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Quotation extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('quotationmodel');
        $this->load->library('pagination');
        $this->auth = new Auth();
        $this->auth->check();
    }

   public function index()
    {
        $this->check_acl();
        $config['base_url'] = base_url('vnadmin/ds-bao-gia');
        $config['total_rows'] = $this->quotationmodel->count_All('quotation'); // xác định tổng số record
        $config['per_page'] = 20; // xác định số record ở mỗi trang
        $config['uri_segment'] = 3; // xác định segment chứa page number
        $this->pagination->initialize($config);
        $data['list'] = $this->quotationmodel->GetData('quotation',null,null, $config['per_page'], $this->uri->segment(3));


        $data['headerTitle'] = "Báo giá";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/quotation_list', $data);
        $this->load->view('admin/footer');
    }

    public function add($id_edit=null)
    {
        $this->check_acl();
        $this->load->helper('ckeditor_helper');

        $data['ckeditor'] = array(
            //ID of the textarea that will be replaced
            'id' => 'ckeditor',
            'path' => 'assets/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '300px', //Setting a custom height
            ));

        $config['upload_path'] = './upload/img/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        if($id_edit!=null){
            $data['edit']=$this->quotationmodel->getFirstRowWhere('quotation',array('id'=>$id_edit));
            $data['btn_name']='Cập nhật';

        }

        $pro = array('name' => $this->input->post('name'),
                     'alias' => make_alias($this->input->post('name')),
                     'item' => $this->input->post('item'),
                     'detail' => $this->input->post('detail'),
                     'price' => str_replace(array(',','.',';'),'',$this->input->post('price')),
                     'home' => $this->input->post('home'),
                     'hot' => $this->input->post('hot'),
                     'title_seo' => $this->input->post('title_seo'),
                     'desc_seo' => $this->input->post('desc_seo'),
                     'keyword_seo' => $this->input->post('keyword_seo'),
        );
        if (isset($_POST['addnews'])) {
            if($_POST['edit']){
                $this->quotationmodel->Update('quotation',$id_edit,$pro);
            }else{
                $id = $this->quotationmodel->Add('quotation', $pro);

            }

            if($id_edit!=null){$id=$id_edit;}else $id=$id;


            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload()) {
                    $data['error'] = 'Ảnh không hợp lệ!';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/' . $upload['upload_data']['file_name'];
                    $this->quotationmodel->Update('quotation', $id, array('image' => $image,));
                    if(isset($data['edit'])&&file_exists($data['edit']->image)){
                        unlink($data['edit']->image);
                    }
                }
            }
            redirect(base_url('vnadmin/ds-bao-gia'));

        }

        $data['headerTitle'] = "Báo giá";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/quotation_add', $data);
        $this->load->view('admin/footer');
    }



    //Xóa
    public function delete($id)
    {
        $this->check_acl();
        if (is_numeric($id)) {
            $item=$this->quotationmodel->getFirstRowWhere('quotation',array('id'=>$id));
            if(isset($item->image)&&file_exists($item->image)) {unlink($item->image);}
            $this->quotationmodel->Delete('quotation', $id);
            redirect($_SERVER['HTTP_REFERER']);
        } else return false;
    }


    ///category
    public function categoryList()
    {
        $this->check_acl();
        $data['cate'] = $this->quotationmodel->GetData('product_category',null,array('sort','esc'));

        $data['headerTitle'] = 'Danh mục sản phẩm';
        $this->load->view('admin/header', $data);
        $this->load->view('admin/product_cate_list', $data);
        $this->load->view('admin/footer');
    }




    //ajax
    public function popupdata()
    {
        if (isset($_POST['id'])) {
            $item        = $this->quotationmodel->getFirstRowWhere('images', array('id' => $_POST['id']));
            $arr         = (array)$item;
        }
        echo json_encode(@$arr);

    }

    //ajax
    public function getdistric()
    {
        if (isset($_POST['id'])) {
            $list        = $this->quotationmodel->Get_where('district', array('provinceid' => $_POST['id']));
            echo json_encode($list);
        }
    }

}