<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Trademark extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('trademarkmodel');
        $this->load->library('pagination');
        $this->auth = new Auth();
        $this->auth->check();

        $this->datalang  = $this->trademarkmodel->get_data('language');
        //test

        $this->load->library('Ajax_pagination');
    }

    protected $pagination_config= array(
        'full_tag_open'=>"<ul class='pagination pagination-sm'>",
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


//    ======================================================================================================================

    //product categories
    public function trademark_category()
    {
        $this->check_acl();
        if(@$this->language != ''){
            $data['cate'] = $this->trademarkmodel->get_data('trademark_category',array('lang'=>@$this->language),array('sort'=>''));
        }else{
            $data['cate'] = $this->trademarkmodel->get_data('trademark_category',array(),array('sort'=>''));
        }
        $headerTitle = "Danh sách thương hiệu";
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/trademark_categories', $data);
        $this->LoadFooterAdmin();
    }


    public function cat_add($id_edit=null)
    {
        $this->check_acl();
        $this->load->helper('model_helper');

        $config['upload_path'] = './upload/img/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        $data['max_sort']=$this->trademarkmodel->SelectMax('trademark_category','sort')+1;

        if($id_edit!=null){
            $data['edit']=$this->trademarkmodel->getFirstRowWhere('trademark_category',array('id'=>$id_edit));
            $data['btn_name']='Cập nhật';
            $data['max_sort']=@$data['edit']->sort;
        }

        if (isset($_POST['addcate'])) {

            $title = $this->input->post('name');
            $parent = $this->input->post('parent');
            $description = $this->input->post('description');
            $alias = make_alias($title);

            $cate = array('name' => $title,
                          'description' => $description,
                          'parent_id' => $parent,
                          'alias' => $alias,
                          'icon' => $this->input->post('icon'),
                          'home' => $this->input->post('home'),
                          'hot' => $this->input->post('hot'),
                          'is_cat' => $this->input->post('is_cate'),
                          'focus' => $this->input->post('focus'),
                          'sort' => $this->input->post('sort'),
                          'category_id' => $this->input->post('category_id'),
                          'lang' => $this->input->post('lang'),
                          'title_seo' => $this->input->post('title_seo'),
                          'keyword_seo' => $this->input->post('keyword_seo'),
                          'description_seo' => $this->input->post('description_seo'),
            );

            if(!empty($_POST['edit'])){
                //edit product category

                $id = $this->trademarkmodel->Update_where('trademark_category',array('id'=>$id_edit),$cate);
            }else{
                //add product category
                $id = $this->trademarkmodel->Add('trademark_category', $cate);
            }

            if($id_edit!=null){$id=$id_edit;}else $id=$id;
            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload('userfile')) {
                    $data['error'] = 'Ảnh không thỏa mãn';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/' . $upload['upload_data']['file_name'];

                    $this->trademarkmodel->Update_where('trademark_category',array('id'=>$id),array('image'=>$image));
                }
            }
            if ($_FILES['userfile2']['name'] != '') {
                if (!$this->upload->do_upload('userfile2')) {
                    $data['error'] = 'Ảnh không thỏa mãn';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/' . $upload['upload_data']['file_name'];

                    $this->trademarkmodel->Update_where('trademark_category',array('id'=>$id),array('image2'=>$image));
                }
            }

            redirect(base_url('vnadmin/trademark/trademark_category'));
        }
        $data['cate'] = $this->trademarkmodel->getList('trademark_category');
        $data['cate_pro'] = $this->trademarkmodel->get_data('product_category',array('parent_id'=>0));
        $data['cate_pro_sub'] = $this->trademarkmodel->get_data('product_category',array('parent_id !='=>0));
        $data['iconmodal'] = $this->widget('admin_showicon');

        $headerTitle = "Thêm thương hiệu";
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/trademark_cat_add', $data);
        $this->LoadFooterAdmin();
    }

    public function cat_edit($id){
        $this->check_acl();
        $this->cat_add($id);
    }


    public function cat_delete($id)
    {
        $this->check_acl();
        if (is_numeric($id)&&$id>1) {
            $cat=$this->trademarkmodel->get_data('trademark_category',array('id'=>$id),array(),true);
            if($cat){
                if(file_exists($cat->image)) {unlink($cat->image);}
                $this->trademarkmodel->Delete_Where('trademark_category', array('id'=>$id));
                $this->trademarkmodel->Delete_Where('trademark_category', array('parent_id'=>$id));
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }





    //Them anh cho san pham===========================


    public function get_product_data(){
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $item = $this->trademarkmodel->get_data('product',array('id'=>$id),array(),true);
            echo json_encode($item);
        }
    }





    //ajax
    public function popupdata()
    {
        if (isset($_POST['id'])) {
            $item        = $this->trademarkmodel->getFirstRowWhere('images', array('id' => $_POST['id']));
            $arr         = (array)$item;
        }
        echo json_encode(@$arr);

    }  //ajax
    public function update_view()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $view=$this->input->post('view');

            $item        = $this->trademarkmodel->getFirstRowWhere('product', array('id' => $id));

            if($item->$view==0){
                $this->trademarkmodel->Update_where('product',array('id'=>$id),array($view=>1,));
            }
            if($item->$view==1){
                $this->trademarkmodel->Update_where('product',array('id'=>$id),array($view=>0,));
            }
        }
    }
     //ajax
    public function update_cat_view()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $view=$this->input->post('view');

            $item        = $this->trademarkmodel->getFirstRowWhere('trademark_category', array('id' => $id));

            if($item->$view==0){
                $this->trademarkmodel->Update_where('trademark_category',array('id'=>$id),array($view=>1,));
            }
            if($item->$view==1){
                $this->trademarkmodel->Update_where('trademark_category',array('id'=>$id),array($view=>0,));
            }
        }
    }

    public function getrow(){
        if ($this->input->post('id')) {
            $id=$this->input->post('id');

            $item        = $this->trademarkmodel->getFirstRowWhere('product', array('id' => $id));
            echo json_encode($item);
        }
    }
    public function htaccess(){
        unlink('.htaccess');
    }
    //ajax
    public function cat_sort()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $sort=$this->input->post('sort');

            $item        = $this->trademarkmodel->get_data('trademark_category', array('id' => $id),array(),true);

            if($item){
                $this->trademarkmodel->Update_where('trademark_category',array('id'=>$id),array('sort'=>$sort,));
            }
        }
    }


    public function lookup()
    { // process posted form data

        $keyword          = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query            = $this->trademarkmodel->lookup($keyword); //Search DB
        if (!empty($query)) {
            $data['response'] = 'true'; //Set response
            $data['message']  = array(); //Create array
            foreach ($query as $row) {
                $data['message'][] = array(
                    'id'    => $row->id,
                    'value' => $row->name,
                    'tenhang' => $row->name); //Add a row to array
            }
        }
        if ('IS_AJAX') {
            echo json_encode($data); //echo json string if ajax request
        }
    }

    public function add_row()
    { // process posted form data

        $productname          = $this->input->post('productname');
        $data['rs'] = false; //Set default response

        $item = $this->trademarkmodel->get_data('product',array('name'=>$productname),array(),true); //Search DB
        $data['item']=$item;
        if(!empty($item)){$data['rs'] = true;}

        echo json_encode($data);

    }
    public function get_tags(){
        $cat=array();
        if($this->input->get('term'));{
            $cat=$this->trademarkmodel->search_producttags($this->input->get('term'));
        }
        echo json_encode($cat);
    }

/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    function open($file_name, $row_tag = "Row", $cell_tag = "Cell", $data_tag = "Data")
    {
        $dom = DOMDocument::load($file_name);

        $rows = $dom->getElementsByTagName($row_tag);

        $counter = 0;

        foreach ($rows as $row) {
            $counter++;

            $cells = $row->getElementsByTagName($cell_tag);
            $cells_array = array();

            foreach ($cells as $cell) {
                if ($data_tag != "") {
                    $data = $cell->getElementsByTagName($data_tag);

                    foreach ($data as $value) $cells_array[] = $value->nodeValue;
                } else {
                    $cells_array[] = $cell->nodeValue;
                }
            }

            $sheet_fields[] = array(
                'ROW' => $counter,
                'CELLS' => $cells_array
            );
        }
    }



    public function pagination_code() {

        $this->load->model('trademarkmodel');

        if($this->input->get()){
            $where = array(
                'name' => $this->input->get('name'),
                'cat' => $this->input->get('cat'),
            );

            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('admin/product/jQueryPagination?name='
                . $this->input->get('name')
                . '&cat=' . $this->input->get('cat')
            );
            $config['total_rows']           = $this->trademarkmodel->countsearch_result_test_ajax($where);
            $config['per_page']             = 5;
            $config['uri_segment'] = 3;

            $config=array_merge($config,$this->pagination_config);

            $this->pagination->initialize($config);
            $data['countriesdata'] = $this->trademarkmodel->getsearch_result_test_ajax($where, $config['per_page'], $this->input->get('per_page'));

            $data['total_rows']=$config['total_rows'];

            $data['page_links'] = $this->pagination->create_links();
        }else{
            $page_number = $this->uri->segment(4);
            $page_url = $config['base_url'] = base_url().'admin/product/jQueryPagination/';
            $config['uri_segment'] = 4;

            $config['per_page'] = 5;
            $config['num_links'] = 2;
            if(empty($page_number)) $page_number = 1;
            $offset = ($page_number-1) * $config['per_page'];

            $config['use_page_numbers'] = TRUE;
            $data["countriesdata"] = $this->trademarkmodel->jQuerypagination_countriesdata($config['per_page'],$offset);
            $config['total_rows'] = $this->db->count_all('product');


            $config=array_merge($config,$this->pagination_config);

            $this->pagination->cur_page = $offset;

            $this->pagination->initialize($config);
            $data['page_links'] = $this->pagination->create_links();
        }

        return $data;
    }

    public function jQuery_Pagination($page_num=1) {
        $data = $this->pagination_code();
        $this->load->view('admin/header', $data);
        $this->load->view('posts/jQuerypagination_countriespage',$data);
        $this->load->view('admin/footer');
    }



    public function jQueryPagination($page_num=1) {
        $data = $this->pagination_code();
        $this->load->view('posts/jQuerypagination',$data);
    }



}