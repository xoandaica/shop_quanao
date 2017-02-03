<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Quotation extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('quotationmodel','model');
        $this->load->library('pagination'); 
    }

    //News by category
    public function news_bycat($alias,$id){

        $config['base_url'] = base_url($alias.'-nc' . $id);
        $config['total_rows'] = $this->model->countNewsByCategory($id); // xác định tổng số record
        $config['per_page'] = 20; // xác định số record ở mỗi trang
        $config['uri_segment'] = 2; // xác định segment chứa page number
        $this->pagination->initialize($config);
        $data = array();

        $data['news_bycate'] = $this->model->getNewsByCategory($id,$config['per_page'], $this->uri->segment(2));

        $cate_curent=$this->model->get_data('news_category',array('id'=>$id),array(),true);

        $data['cate_curent'] =  $cate_curent;

        $data['banner_right'] = $this->model->get_data('images',array('type'=>'ads_right'));

        $data['cate'] = $this->model->get_data('news_category');

        $title=@$cate_curent->name;
        $keyword='';
        $description=@$cate_curent->description;


        $this->LoadHeader(@$title,@$keyword,@$description);
        $this->load->view('news_bycat',@$data);
        $this->LoadRight();
        $this->LoadFooter();
    }


    //News list
    public function quotation_content($alias){

        $data['item']=$this->model->get_data('quotation',array('alias'=>$alias),array(),true);

        $data['similaritem']=$this->model->get_data('quotation',array('alias !='=>$alias));

      

        $seo=array('title'=>@$data['item']->title_seo==''?$data['item']->name:$data['item']->title_seo,
                   'description'=>@$data['item']->description_seo,
                   'keyword'=>@$data['item']->keyword_seo,
                   'image'=>@$data['item']->product_image,
                   'type'=>'article');


        $this->LoadHeader($seo);
        $this->load->view('quotation_content',$data);
        $this->LoadRight();
        $this->LoadFooter();
    }


    //News by category
    public function newssimilar(){

    }
    //News Content
    public function newscontent(){

    }

}