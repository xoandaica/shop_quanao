<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');

        $this->load->model('productmodel');
        $this->load->library('pagination');
        $this->auth = new Auth();
        $this->auth->check();

        $this->datalang  = $this->productmodel->get_data('language');
        //test
        $this->date_session_products = $this->productmodel->GetData('session_products');
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

    public function products()
    {$this->check_acl();

        if($this->input->get()){

            $where = array(
                'code' => $this->input->get('code'),
                'name' => $this->input->get('name'),
                'cate' => $this->input->get('cate'),
                'view' => $this->input->get('view'),
                'lang' => $this->input->get('lang'),
            );
            $config['page_query_string']    = TRUE;
            $config['enable_query_strings'] = TRUE;
            $config['base_url']             = base_url('vnadmin/product/products?code='
                . $this->input->get('code')
                . '&name=' . $this->input->get('name')
                . '&cate=' . $this->input->get('cate')
                . '&view=' . $this->input->get('view')
                . '&lang=' . $this->input->get('lang')
            );
            $config['total_rows']           = $this->productmodel->countsearch_result($where,0,@$this->language);
            $config['per_page']             = 20;
            $config['uri_segment'] = 3;

            $config=array_merge($config,$this->pagination_config);

            $this->pagination->initialize($config);
            $data['prolist'] = $this->productmodel->getsearch_result($where, $config['per_page'], $this->input->get('per_page'),0,@$this->language);

            $data['total_rows']=$config['total_rows'];
            $data['cate'] = $this->productmodel->get_data('product_category');


        }else{

            $config['base_url'] = base_url('vnadmin/product/products');
            $config['total_rows'] = $this->productmodel->count_All('product'); // xác định tổng số record
            $config['per_page'] = 20; // xác định số record ở mỗi trang
            $config['uri_segment'] = 4; // xác định segment chứa page number
            $config=array_merge($config,$this->pagination_config);
            $this->pagination->initialize($config);
            $data['prolist'] = $this->productmodel->getListProduct('product', $config['per_page'], $this->uri->segment(4),0,@$this->language);

        }
        $data['datalang'] = $this->datalang;
        $data['cate'] = $this->productmodel->getList('product_category');
        $data['cate_root'] = $this->productmodel->getListRoot('product_category');
        $data['cate_chil'] = $this->productmodel->getListChil('product_category');
        $headerTitle = "Danh sách Sản phẩm";
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/product_list', $data);
        $this->LoadFooterAdmin();
    }

    public function add($id_edit=null)
    {
        $this->check_acl();
        $this->load->helper('ckeditor_helper');
        $this->load->helper('model_helper');

        $data['ckeditor1'] = array(
            //ID of the textarea that will be replaced
            'id' => 'ckeditor1',
            'path' => 'assets/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '150px', //Setting a custom height
            ));
        $data['ckeditor2'] = array(
            //ID of the textarea that will be replaced
            'id' => 'ckeditor2',
            'path' => 'assets/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '200', //Setting a custom height
            ));
        $data['ckeditor3'] = array(
            //ID of the textarea that will be replaced
            'id' => 'ckeditor3',
            'path' => 'assets/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' => "Full", //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '200', //Setting a custom height
            ));
        $data['ckeditor4'] = array(
            //ID of the textarea that will be replaced
            'id' => 'ckeditor4',
            'path' => 'assets/ckeditor',
            //Optionnal values
            'config' => array(
                'toolbar' =>  array(
                    array('Source'),
                    array('Table','Bold', 'Italic','Underline', 'Strike','Font', 'FontSize'),
                    array('JustifyLeft', 'JustifyCenter', 'JustifyRight'),
                    array('TextColor', 'BGColor','Image','Link'),
                ), //Using the Full toolbar
                'width' => "100%", //Setting a custom width
                'height' => '300px', //Setting a custom height
            ));

        $config['upload_path'] = './upload/img/products/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        $data['max_order']=$this->productmodel->SelectMax('product','sort')+1;
     //   $data['product_category']=$this->productmodel->get_data('product_category',array());

        if($id_edit!=null){
            $data['edit']=$this->productmodel->getFirstRowWhere('product',array('id'=>$id_edit));
            $data['cate_selected']=$this->productmodel->getField_array('product_to_category','id_category',array('id_product'=>$id_edit));
            $data['btn_name']='Cập nhật';
            $producttags=$this->productmodel->get_producttags($id_edit);
            $tags_str='';
            if(!empty($producttags)){
                $x=0;
                foreach($producttags as $v){
                    $x++;
                    if($x==1){
                        $tags_str.=$v->tagname;
                    }else{
                        $tags_str.=','.$v->tagname;
                    }
                }
            }
            $data['tags']=$tags_str;
        }
        if (isset($_POST['addnews'])) {
            $color= $this->input->post('color');
            if(is_array($color)){
                foreach($color as $k=>$v){
                    if($v==null){ unset($color[$k]);  }
                }
            }else{
                $color=array();
            }
            $size = $this->input->post('size');
            if(is_array($size)){
                foreach ($size as $k1 => $v1) {
                    if ($v1 == null) {
                        unset($size[$k1]);
                    }
                }
            }else{
                $size=array();
            }
            $price       = str_replace(array(';','.',',',' '),'',$this->input->post('price'));
            $price_sale      = str_replace(array(';','.',',',' '),'',$this->input->post('price_sale'));
            $price2      = str_replace(array(';','.',',',' '),'',$this->input->post('desc'));

            if($this->input->post('alias') !=''){
                $alias = make_alias($this->input->post('alias'));
            }
            else{
                $alias = make_alias($this->input->post('name'));
            }


            $pro = array(

                'name'            => $this->input->post('name'),
                'alias'           => $alias,
//                'alias_full'      => get_alias($id_edit,$data['product_category']),
                'desc'            => $price2,
                'code'            => $this->input->post('code'),
                'price'           => $price,
                'price_sale'      => $price_sale,
                'counter'         => $this->input->post('counter'),
                'view'            => $this->input->post('view'),
                'bought'          => $this->input->post('bought'), // đã mua
                'address_order'   => $this->input->post('address_order'), // khu vuc giao hang
                'location'        => $this->input->post('location'),
                'position'        => $this->input->post('position'),
                'color'           => $this->input->post('color'),
                'origin'           => $this->input->post('origin'),
                'size'            => implode(',', @$size),
                'size1'     => $this->input->post('size1'),
                'size2'     => $this->input->post('size2'),
                'size3'     => $this->input->post('size3'),
                'size4'     => $this->input->post('size4'),
                    
                'description'     => $this->input->post('description'),
                'content'         => $this->input->post('content'),
                'note'            => $this->input->post('note'),
                'caption_1'            => $this->input->post('caption_1'),
                'caption_2'            => $this->input->post('caption_2'),

                'title_seo'       => $this->input->post('title_seo'),
                'keyword_seo'     => $this->input->post('keyword_seo'),
                'description_seo' => $this->input->post('description_seo'),
                'home'            => $this->input->post('home'),
                'hot'             => $this->input->post('hot'),
                'focus'           => $this->input->post('focus'),
                'coupon'          => $this->input->post('coupon'),
                'vip'             => $this->input->post('vip'),
                'date'             => $this->input->post('date'),
                'trademark_id'    => $this->input->post('trademark_id'),
                'sort'            => $this->input->post('sort'),
                'session'         => $this->input->post('session'),
                'lang'            => $this->input->post('lang'),
                'time'            => time(),
            );
            if($_POST['edit']){
                $this->productmodel->Update('product',$id_edit,$pro);
                $trangthai=2;
            }else{
                $id = $this->productmodel->Add('product', $pro);
                $trangthai=1;
                $transaction=array(
                    'product_id'=>$id,
                    'time'=>time(),
                    'counter'=>$this->input->post('counter'),
                    'type'=>1, //type=1: nhap hang type=2: ban hang
                );
                $this->productmodel->Add('product_transaction', $transaction);

            }
            if($id_edit!=null){$id=$id_edit;}else $id=$id;
            if (isset($_POST['category']) && sizeof($_POST['category']) > 0) {
                $post_cat = $_POST['category'];
                $this->productmodel->Delete_where('product_to_category', array('id_product' => $id));
                for ($i = 0; $i < sizeof($post_cat); $i++) {
                    $ca = array('id_product' => $id, 'id_category' => $post_cat[$i]);
                    $this->productmodel->Add('product_to_category', $ca);
                }
                $this->productmodel->Update_where('product', array('id'=>$id), array('category_id' => end($post_cat)));
            }

            //update news tags
            $trademark=   ($this->input->post('trademark'));
            $tags=   explode(',',$this->input->post('tags'));
            if(!empty($tags)){
                $this->productmodel->Delete_where('product_to_tags', array('productid' => $id));
                foreach($tags as $tag){
                    $t=$this->productmodel->get_data('product_tags',array('tagname'=>$tag),array(),true);

                    if(empty($t)){
                        $idtag= $this->productmodel->Add('product_tags',array('tagname'=>$tag,'tagalias'=>make_alias($tag)));
                    }else{
                        $idtag=$t->id;
                    }
                    $this->productmodel->Add('product_to_tags',array('productid'=>$id,'tagid'=>$idtag));
                }
            }
            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload('userfile')) {
                    $data['error'] = 'Ảnh không hợp lệ';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/products/' . $upload['upload_data']['file_name'];
                    $this->productmodel->Update('product', $id, array('image' => $image,));
                    if(isset($data['edit'])&&file_exists($data['edit']->image)){
                        unlink($data['edit']->image);
                    }
                }
            }
            if ($_FILES['userfile2']['name'] != '') {
                if (!$this->upload->do_upload('userfile2')) {
                    $data['error'] = 'Ảnh không hợp lệ';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/products/' . $upload['upload_data']['file_name'];
                    $this->productmodel->Update('product', $id, array('image2' => $image,));
                    if(isset($data['edit'])&&file_exists($data['edit']->image2)){
                        unlink($data['edit']->image2);
                    }
                }
            }
            if ($_FILES['userfile3']['name'] != '') {
                if (!$this->upload->do_upload('userfile3')) {
                    $data['error'] = 'Ảnh không hợp lệ';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/products/' . $upload['upload_data']['file_name'];
                    $this->productmodel->Update('product', $id, array('image3' => $image,));
                    if(isset($data['edit'])&&file_exists($data['edit']->image3)){
                        unlink($data['edit']->image3);
                    }
                }
            }
            if ($_FILES['userfile4']['name'] != '') {
                if (!$this->upload->do_upload('userfile4')) {
                    $data['error'] = 'Ảnh không hợp lệ';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/products/' . $upload['upload_data']['file_name'];
                    $this->productmodel->Update('product', $id, array('image4' => $image,));
                    if(isset($data['edit'])&&file_exists($data['edit']->image4)){
                        unlink($data['edit']->image4);
                    }
                }
            }
            if ($_FILES['userfile5']['name'] != '') {
                if (!$this->upload->do_upload('userfile5')) {
                    $data['error'] = 'Ảnh không hợp lệ';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/products/' . $upload['upload_data']['file_name'];
                    $this->productmodel->Update('product', $id, array('image5' => $image,));
                    if(isset($data['edit'])&&file_exists($data['edit']->image5)){
                        unlink($data['edit']->image5);
                    }
                }
            }
            if($trangthai == 2){
                $_SESSION['mss_success']= 'Cập nhật sản phẩm thành công !';
            }elseif($trangthai == 1){
                $_SESSION['mss_success']= 'Thêm sản phẩm thành công !';
            }
            redirect(base_url('vnadmin/product/products'));
        }
        $data['datalang'] = $this->datalang;

        $data['session_products'] = $this->date_session_products;
        $data['province'] = $this->productmodel->get_data('province');
        $data['cate'] = $this->productmodel->get_data('product_category',array('lang'=>$this->language),array('sort'=>''));
        $data['brand'] = $this->productmodel->get_data('trademark_category',array('parent_id !='=>0),array('sort'=>''));
        if($id_edit != ''){
            $headerTitle = "Cập nhật Sản phẩm";
        }elseif($id_edit  == ''){
            $headerTitle = "Thêm Sản phẩm";
        }
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/product_add', $data);
        $this->LoadFooterAdmin();
    }

    public function edit($id){
        $this->check_acl();
        $this->add($id);
    }
    //Xóa
    public function delete($id)
    {
        $this->check_acl();
        if (is_numeric($id)) {
            $item=$this->productmodel->getFirstRowWhere('product',array('id'=>$id));
            if(isset($item->image)&&file_exists($item->image)) {unlink($item->image);}
            $this->productmodel->Delete('product', $id);
            $this->productmodel->Delete_where('product_to_category',array('id_product'=>$id));
            redirect($_SERVER['HTTP_REFERER']);
        } else return false;
    }
    //Xóa ảnh thư viện sản phẩm
    public function delete_img($id)
    {
        $this->check_acl();
        $img = $this->productmodel->getItemByID('product_images', $id);

        if(file_exists($img->link)){
            unlink(($img->link));
        }

        $this->productmodel->Delete('product_images', $id);

        redirect($_SERVER['HTTP_REFERER']);
    }


    //product categories
    public function categories()
    {
        $this->check_acl();
        if(@$this->language != ''){
            $data['cate'] = $this->productmodel->get_data('product_category',array('lang'=>@$this->language),array('sort'=>''));
        }else{
            $data['cate'] = $this->productmodel->get_data('product_category',array(),array('lang'=>@$this->language,'sort'=>''));
        }

        $headerTitle = "Danh mục Sản phẩm";
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/product_categories', $data);
        $this->LoadFooterAdmin();
    }


    public function cat_add($id_edit=null)
    {
        $this->check_acl();

        $this->load->helper('ckeditor_helper');
        $this->load->helper('model_helper');
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
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        $data['max_sort']=$this->productmodel->SelectMax('product_category','sort')+1;

        if($id_edit!=null){
            $data['edit']=$this->productmodel->getFirstRowWhere('product_category',array('id'=>$id_edit));
            $data['btn_name']='Cập nhật';
            $data['max_sort']=@$data['edit']->sort;
        }

        if($this->input->post('alias') !=''){
            $alias = make_alias($this->input->post('alias'));
        }
        else{
            $alias = make_alias($this->input->post('name'));
        }

        if (isset($_POST['addcate'])) {

            $title = $this->input->post('name');
            $parent = $this->input->post('parent');
            $description = $this->input->post('description');
          //  $alias = make_alias($title);
            $color= $this->input->post('color');

            $cate = array('name' => $title,
               // 'name_alias'      => $this->input->post('name_alias'),
                'alias'           => $alias,
                'description' => $description,
                'parent_id' => $parent,
                'alias' => $alias,
                'color' => $color,
                'icon' => $this->input->post('icon'),
                'home' => $this->input->post('home'),
                'hot' => $this->input->post('hot'),
                'is_cat' => $this->input->post('is_cate'),
                'focus' => $this->input->post('focus'),
                'sort' => $this->input->post('sort'),
                'lang' => $this->input->post('lang'),
                'title_seo' => $this->input->post('title_seo'),
                'keyword_seo' => $this->input->post('keyword_seo'),
                'description_seo' => $this->input->post('description_seo'),
            );

            if(!empty($_POST['edit'])){
                //edit product category

                $id = $this->productmodel->Update_where('product_category',array('id'=>$id_edit),$cate);
            }else{
                //add product category
                $id = $this->productmodel->Add('product_category', $cate);
            }

            if($id_edit!=null){$id=$id_edit;}else $id=$id;
            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload('userfile')) {
                    $data['error'] = 'Ảnh không thỏa mãn';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/' . $upload['upload_data']['file_name'];

                    $this->productmodel->Update_where('product_category',array('id'=>$id),array('image'=>$image));
                }
            }
            if ($_FILES['userfile2']['name'] != '') {
                if (!$this->upload->do_upload('userfile2')) {
                    $data['error'] = 'Ảnh không thỏa mãn';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/' . $upload['upload_data']['file_name'];

                    $this->productmodel->Update_where('product_category',array('id'=>$id),array('image2'=>$image));
                }
            }
            if ($_FILES['userfile3']['name'] != '') {
                if (!$this->upload->do_upload('userfile3')) {
                    $data['error'] = 'Ảnh không thỏa mãn';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/' . $upload['upload_data']['file_name'];

                    $this->productmodel->Update_where('product_category',array('id'=>$id),array('image3'=>$image));
                }
            }

            redirect(base_url('vnadmin/product/categories?is_cat='.$this->input->get('is_cat')));
        }
      //  $data['cate'] = $this->productmodel->get_data('product_category');
//        $data['cate'] = $this->productmodel->get_data('product_category',array(),array('lang'=>@$this->language,'sort'=>''));
        $data['cate']    =$this->f_homemodel->get_data('product_category',array('lang' => $this->language));

        $data['iconmodal'] = $this->widget('admin_showicon');

        $headerTitle = "Thêm Danh mục Sản phẩm";
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/product_cat_add', $data);
        $this->LoadFooterAdmin();
    }

    public function cat_edit($id){
        $this->check_acl();
        $this->cat_add($id);
    }



    public function addprohangsx($id_edit=null)
    {
        $this->load->helper('model_helper');

        $config['upload_path'] = './upload/img/';
        $config['allowed_types'] = 'gif|jpg|png|JPG|PNG|GIF';
        $config['max_size'] = '4000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);

        $data['btn_name']='Thêm';
        $data['max_sort']=$this->productmodel->SelectMax('product_hangsx','sort')+1;

        if($id_edit!=null){
            $data['edit']=$this->productmodel->getFirstRowWhere('product_hangsx',array('id'=>$id_edit));
            $data['btn_name']='Cập nhật';
//            $data['max_sort']=$data['edit']->sort;
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
                'home' => $this->input->post('home'),
                'hot' => $this->input->post('hot'),
                'focus' => $this->input->post('focus'),
                'sort' => $this->input->post('sort'),
            );

            if(!empty($_POST['edit'])){
                //edit product category

                $id = $this->productmodel->Update_where('product_hangsx',array('id'=>$id_edit),$cate);
            }else{
                //add product category
                $id = $this->productmodel->Add('product_hangsx', $cate);
            }

            if($id_edit!=null){$id=$id_edit;}else $id=$id;
            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload()) {
                    $data['error'] = 'Ảnh không thỏa mãn';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/img/' . $upload['upload_data']['file_name'];

                    $this->productmodel->Update_where('product_hangsx',array('id'=>$id),array('image'=>$image));
                }
            }

            redirect(base_url('vnadmin/danh-muc-hangsx'));
        }
        $data['cate'] = $this->productmodel->getList('product_hangsx');

        $data['headerTitle'] = "Thêm danh hãng sản xuất";
        $this->load->view('admin/header', $data);
        $this->load->view('admin/product_hangsx_add', $data);
        $this->load->view('admin/footer');
    }


    public function cat_delete($id)
    {
        $this->check_acl();
        if (is_numeric($id)&&$id>1) {
            $cat=$this->productmodel->get_data('product_category',array('id'=>$id),array(),true);
            if($cat){
                if(file_exists($cat->image)) {unlink($cat->image);}
                $this->productmodel->Delete_Where('product_category', array('id'=>$id));
                $this->productmodel->Delete_Where('product_category', array('parent_id'=>$id));
            }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function deletehangsx($id)
    {
        if (is_numeric($id)) {
            $this->productmodel->Delete('product_hangsx', $id);
            $this->productmodel->Delete_Where('product_hangsx', array('parent_id'=>$id));
            redirect($_SERVER['HTTP_REFERER']);
        } else return false;
    }




    public function listShipping()
    {
        $data = array();
        $config['base_url'] = base_url('vnadmin/list-shipping');
        $config['total_rows'] = $this->productmodel->count_All('shipping'); // xác định tổng số record
        $config['per_page'] = 10; // xác định số record ở mỗi trang
        $config['uri_segment'] = 3; // xác định segment chứa page number
        $this->pagination->initialize($config);
        $data['shipping'] = $this->productmodel->listAll('shipping',$config['per_page'], $this->uri->segment(3));
        $data['headerTitle']="Danh sách trang tĩnh";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/shipping_list',$data);
        $this->load->view('admin/footer');
    }
    public function addShipping($id_edit = null)
    {
        $data['headerTitle']="shipping info";

        if($id_edit!=null){
            $data['edit']=$this->productmodel->getFirstRowWhere('shipping',array('id'=>$id_edit));
            $data['btn_name']='Cập nhật';
            $data['max_sort'] =$data['edit']->sort;
            //            $data['max_sort']=$data['edit']->sort;
        }
        else{
            $data['max_sort']=$this->productmodel->SelectMax('shipping','sort')+1;
        }

        if (isset($_POST['addshipping'])) {

            $name = $this->input->post('name');
            $price = $this->input->post('price');
            $sort = $this->input->post('sort');
            $cate = array(
                'name' => $name,
                'price' => $price,
                'sort'  => $sort
            );

            if(!empty($_POST['edit'])){
                //edit product category

                $id = $this->productmodel->Update_where('shipping',array('id'=>$id_edit),$cate);
            }else{
                //add product category
                $id = $this->productmodel->Add('shipping', $cate);
            }
            redirect(base_url('vnadmin/list-shipping'));
        }
        $this->load->view('admin/header',$data);
        $this->load->view('admin/shipping_add',$data);
        $this->load->view('admin/footer');
    }
    public function deleteShipping($id)
    {
        $this->productmodel->Delete('shipping',$id);
        redirect($_SERVER['HTTP_REFERER']);
    }
    /**
     * Code sale
     */
    public function listCodeSale()
    {
        $data = array();
        $config['base_url'] = base_url('vnadmin/list-code-sale');
        $config['total_rows'] = $this->productmodel->count_All('code_sale'); // xác định tổng số record
        $config['per_page'] = 10; // xác định số record ở mỗi trang
        $config['uri_segment'] = 3; // xác định segment chứa page number
        $this->pagination->initialize($config);
        $data['code'] = $this->productmodel->listAll('code_sale',$config['per_page'], $this->uri->segment(3));
        $data['headerTitle']="Danh sách mã giảm giá";
        $this->load->view('admin/header',$data);
        $this->load->view('admin/code_sale_list',$data);
        $this->load->view('admin/footer');
    }
    public function addCodeSale($id_edit = null)
    {
        $data = array();
        if($id_edit!=null){
            $data['edit']=$this->productmodel->getFirstRowWhere('code_sale',array('id'=>$id_edit));
            $data['btn_name']='Cập nhật';
            //$data['max_sort'] =$data['edit']->sort;
            //            $data['max_sort']=$data['edit']->sort;
        }

        if (isset($_POST['addshipping'])) {

            $name = $this->input->post('name');
            $code = $this->input->post('code');
            $price = $this->input->post('price');
            $cate = array(
                'name' => $name,
                'price' => $price,
                'code' => $code,
            );

            if(!empty($_POST['edit'])){
                //edit product category

                $id = $this->productmodel->Update_where('code_sale',array('id'=>$id_edit),$cate);
            }else{
                //add product category
                $id = $this->productmodel->Add('code_sale', $cate);
            }
            redirect(base_url('vnadmin/list-code-sale'));
        }
        $this->load->view('admin/header',$data);
        $this->load->view('admin/code_sale_add',$data);
        $this->load->view('admin/footer');
    }
    public function deleteCodeSale($id = null)
    {
        $this->productmodel->Delete('code_sale',$id);
        redirect($_SERVER['HTTP_REFERER']);
    }


    //Them anh cho san pham===========================
    public function images($id)
    {
        $this->check_acl();
        $config['upload_path'] = './upload/img/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '5000';
        $config['max_width'] = '3000';
        $config['max_height'] = '3000';
        $this->load->library('upload', $config);
        $pro=$this->productmodel->getFirstRowWhere('product',array('id'=>$id));
        $data['product_name'] = $pro->name;
        if(isset($_POST['Upload'])){
            $db_data = array(
                'link' => '',
                'name' => $this->input->post('title'),
                'product_id' => $id
            );
            if(isset($_POST['edit'])&&$_POST['edit']!=null){
                $this->productmodel->Update_where('product_images',array('id'=>$_POST['edit']),array('name' => $this->input->post('title')));
                $id_img=$_POST['edit'];
            }else{
//                print_r($db_data); die();
                $id_img=$this->productmodel->Add('product_images',$db_data);
            }
            if(!empty($_FILES['userfile'])){
                $name_array = array();
                $count = count(@$_FILES['userfile']['size']);
                foreach ($_FILES as $key => $value) {

                    for ($s = 0; $s <= $count - 1; $s++) {
                        $_FILES['userfile']['name'] = $value['name'][$s];
                        $_FILES['userfile']['type'] = $value['type'][$s];
                        $_FILES['userfile']['tmp_name'] = $value['tmp_name'][$s];
                        $_FILES['userfile']['error'] = $value['error'][$s];
                        $_FILES['userfile']['size'] = $value['size'][$s];

                        $this->upload->do_upload();

                        $data = $this->upload->data();
                        $name_array[] = $data['file_name'];
                        if ($data['file_name'] != null) {
                            //$name=make_alias($data['file_name']);
                            $link = 'upload/img/' . $data['file_name'];
                            $id_i = $this->productmodel->Update_where('product_images',array('id'=>$id_img), array('link' => $link,));
                        }
                    }
                }
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        $data['pro_image'] = $this->productmodel->getProImage($id);
        $data['id'] = $id;

        $headerTitle = "Thêm hình ảnh Sản phẩm";
        $this->LoadHeaderAdmin($headerTitle);
        $this->load->view('admin/product_images', $data);
        $this->LoadFooterAdmin();
    }

    public function saler(){

    }

    public function get_product_data(){
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $item = $this->productmodel->get_data('product',array('id'=>$id),array(),true);
            echo json_encode($item);
        }
    }

    public function update_counter(){
        if ($this->input->post('counter')) {
            $id=$this->input->post('id');

            $item = $this->productmodel->get_data('product',array('id'=>$id),array(),true);
            $counter=(int)$item->counter+(int)$this->input->post('counter');
            $first_quantity=(int)$item->first_quantity+(int)$this->input->post('counter');
            $rs= $this->productmodel->Update_where('product',array('id'=>$id),array('counter'=>$counter,'first_quantity'=>$first_quantity));

            $transaction=array(
                'product_id'=>$id,
                'time'=>time(),
                'counter'=>$this->input->post('counter'),
                'type'=>1, //type=1: nhap hang type=2: ban hang
            );
            $this->productmodel->Add('product_transaction', $transaction);
        }
        redirect($_SERVER['HTTP_REFERER']);
    }



    //ajax
    public function popupdata()
    {
        if (isset($_POST['id'])) {
            $item        = $this->productmodel->getFirstRowWhere('product_images', array('id' => $_POST['id']));
            $arr         = (array)$item;
        }
        echo json_encode(@$arr);

    }  //ajax
    public function update_view()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $view=$this->input->post('view');

            $item        = $this->productmodel->getFirstRowWhere('product', array('id' => $id));

            if($item->$view==0){
                $this->productmodel->Update_where('product',array('id'=>$id),array($view=>1,));
            }
            if($item->$view==1){
                $this->productmodel->Update_where('product',array('id'=>$id),array($view=>0,));
            }
        }
    }
    //ajax
    public function update_cat_view()
    {
        if ($this->input->post('id')) {
            $id=$this->input->post('id');
            $view=$this->input->post('view');

            $item        = $this->productmodel->getFirstRowWhere('product_category', array('id' => $id));

            if($item->$view==0){
                $this->productmodel->Update_where('product_category',array('id'=>$id),array($view=>1,));
            }
            if($item->$view==1){
                $this->productmodel->Update_where('product_category',array('id'=>$id),array($view=>0,));
            }
        }
    }

    public function getrow(){
        if ($this->input->post('id')) {
            $id=$this->input->post('id');

            $item        = $this->productmodel->getFirstRowWhere('product', array('id' => $id));
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

            $item        = $this->productmodel->get_data('product_category', array('id' => $id),array(),true);

            if($item){
                $this->productmodel->Update_where('product_category',array('id'=>$id),array('sort'=>$sort,));
            }
        }
    }

    public function product_saler(){
        $data=array();

        if($this->input->post()){

            $id_products=$this->input->post('id');

            $quality=$this->input->post('counter');
            //           print_r($quality);die();
            $product_count=sizeof($id_products);

            $order=array(
                'fullname'=>$this->input->post('fullname'),
                'phone'=>$this->input->post('phone'),
                'email'=>$this->input->post('email'),
                'address'=>$this->input->post('address'),
                'time'=>time(),
                'status'=>1,
                'view'=>1,
            );
            $id = $this->productmodel->Add('order', $order);
            $code = 'DH'.date('md').$id;

            $this->productmodel->Update_where('order', array('id'=>$id),array('code'=>$code));


            if(isset($id)&&$product_count>0){
                for($i=0;$i<$product_count;$i++){

                    $item=$this->productmodel->get_data('product',array('id'=>$id_products[$i]),array(),true);
                    $order_item=array(
                        'order_id'=>$id,
                        'item_id'=>$id_products[$i],
                        'count'=>$quality[$i],
                        'price'=>$item->price_sale,

                    );

                    $this->productmodel->Add('order_item', $order_item);

                    $transaction=array(
                        'order_id'=>$id,
                        'product_id'=>$id_products[$i],
                        'time'=>time(),
                        'counter'=>$quality[$i],
                        'type'=>2, //type=1: nhap hang type=2: ban hang
                    );
                    $this->productmodel->Add('product_transaction', $transaction);
                }
            }

        }

        $this->load->view('admin/header', $data);
        $this->load->view('admin/product_saler', $data);
        $this->load->view('admin/footer');
    }

    public function lookup()
    { // process posted form data

        $keyword          = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query            = $this->productmodel->lookup($keyword); //Search DB
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

        $item = $this->productmodel->get_data('product',array('name'=>$productname),array(),true); //Search DB
        $data['item']=$item;
        if(!empty($item)){$data['rs'] = true;}

        echo json_encode($data);

    }
    public function get_tags(){
        $cat=array();
        if($this->input->get('term'));{
            $cat=$this->productmodel->search_producttags($this->input->get('term'));
        }
        echo json_encode($cat);
    }

    public function get_trademark(){
        $cat_trademark=array();
        if($this->input->get('name_trademark'));{
            $cat_trademark=$this->productmodel->search_trademark($this->input->get('name_trademark'));
        }
        echo json_encode($cat_trademark);
    }

    /*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

    public function UploadFileEx()
    {

        $config['upload_path'] = './upload/file/';
        $config['allowed_types'] = 'xlsx|xls';
        $config['max_size'] = '5000';
        //        $config['max_width']  = '1500';
        //        $config['max_height']  = '768';
        $this->load->library('upload', $config);
        $err = '';
        if (isset($_POST['Upload'])) {
            if ($_FILES['userfile']['name'] != '') {
                if (!$this->upload->do_upload()) {
                    $data['error'] = 'Ảnh không thỏa mãn';
                } else {
                    $upload = array('upload_data' => $this->upload->data());
                    $image = 'upload/file/' . $upload['upload_data']['file_name'];
                    if (file_exists($image)) {
                        $this->InsertExcel($image);
                    } else return $err = 'Import thất bại!';


                    //redirect(base_url('vnadmin/danh-sach-tin-tuc'));
                }
            } else {
                return false;
            }
        }
        $data['err'] = $err;
        $this->load->view('admin/header');
        $this->load->view('admin/UploadNumber', $data);
        $this->load->view('admin/footer');
    }

    public function InsertExcel($file)
    {
        // $file = 'upload/file/test.xlsx';
        //$file = $this->UploadFileEx();

        //load the excel library
        $this->load->library('Excel');

        //read file from path
        $objPHPExcel = PHPExcel_IOFactory::load($file);

        //get only the Cell Collection
        $cell_collection = $objPHPExcel->getActiveSheet()->getCellCollection();
        //extract to a PHP readable array format
        foreach ($cell_collection as $cell) {
            $column = $objPHPExcel->getActiveSheet()->getCell($cell)->getColumn();
            $row = $objPHPExcel->getActiveSheet()->getCell($cell)->getRow();
            $data_value = $objPHPExcel->getActiveSheet()->getCell($cell)->getValue();

            //header will/should be in row 1 only. of course this can be modified to suit your need.
            if ($row == 1) {
                $header[$row][$column] = $data_value;
            } else {
                $arr_data[$row][$column] = $data_value;
            }
        }
        //send the data in an array format
        $data['header'] = $header;
        // print_r($data['header']);
        $data['values'] = $arr_data;

        foreach ($arr_data as $val) {

            if (@$val['B'] != null) {
                $this->db->set('number', @$val['B']);
                $this->db->set('network', @$val['C']);
                $this->db->set('price', @$val['D']);
                $this->db->set('type', @$val['E']);
                $this->db->set('alias', make_alias($val['B']));
                $this->db->set('head_num', substr($val['B'],0,5));
                $this->db->insert('sim');
            }

        }
    }

    public function ExportExcel(){
        // $file = 'upload/file/test.xlsx';
        //$file = $this->UploadFileEx();

        //load the excel library
        $this->load->library('Excel');

        $this->excel->setActiveSheetIndex(0);
        //name the worksheet
        $this->excel->getActiveSheet()->setTitle('test worksheet');
        //set cell A1 content with some text


        $ar=$this->productmodel->getList('sim');

        $i=3;
        foreach($ar as $v){
            $j=$i++;
            $this->excel->getActiveSheet()->setCellValue('A'.$j, $i++);
            $this->excel->getActiveSheet()->setCellValue('B'.$j, $v->number);
            $this->excel->getActiveSheet()->setCellValue('C'.$j, $v->price);
            $this->excel->getActiveSheet()->setCellValue('D'.$j, $v->network);
        }

        $this->excel->getActiveSheet()->setCellValue('A1', 'anh Nhất');



        //change the font size
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(20);
        //make the font become bold
        $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
        //merge cell A1 until D1
        $this->excel->getActiveSheet()->mergeCells('A1:D1');
        //set aligment to center for that merged cell (A1 to D1)
        $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



        $filename='just_some_random_name.xls'; //save our workbook as this file name
        header('Content-Type: application/vnd.ms-excel'); //mime type
        header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
        header('Cache-Control: max-age=0'); //no cache

        //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
        //if you want to save it as .XLSX Excel 2007 format
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //force user to download the Excel file without writing it to server's HD
        $objWriter->save('php://output');

        redirect(base_url('vnadmin'));


    }

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

        $this->load->model('productmodel');

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
            $config['total_rows']           = $this->productmodel->countsearch_result_test_ajax($where);
            $config['per_page']             = 5;
            $config['uri_segment'] = 3;

            $config=array_merge($config,$this->pagination_config);

            $this->pagination->initialize($config);
            $data['countriesdata'] = $this->productmodel->getsearch_result_test_ajax($where, $config['per_page'], $this->input->get('per_page'));

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
            $data["countriesdata"] = $this->productmodel->jQuerypagination_countriesdata($config['per_page'],$offset);
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