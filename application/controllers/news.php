<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class News extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('f_newsmodel');
        $this->load->library('pagination');
        $this->load->helper('model_helper');
    }

    //News by category
    public function news_bycat($alias,$id){

        $config['base_url'] = base_url($alias.'-nc' . $id);
        $config['total_rows'] = $this->f_newsmodel->countNewsByCategory($id); // xác định tổng số record
        $config['per_page'] = 10; // xác định số record ở mỗi trang
        $config['uri_segment'] = 2; // xác định segment chứa page number
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
        $data = array();


        $data['right']=$this->widget('right');
        //data khong xoa
        $data['list']        = $this->f_newsmodel->getNewsByCategory($id,$config['per_page'], $this->uri->segment(2));
        $cate_curent         =$this->f_newsmodel->get_data('news_category',array('id'=>$id),array(),true);
        $data['cate_curent'] =  $cate_curent;
        $data['cate']        = $this->f_newsmodel->get_data('news_category');

        $seo=array('title'=>@$data['cate_curent']->title_seo==''?@$data['cate_curent']->name:@$data['cate_curent']->title_seo,
            'description'=>@$data['cate_curent']->description_seo,
            'keyword'=>@$data['cate_curent']->keyword_seo,
            'type'=>'news');
        $this->LoadHeader(@$seo);
        $this->load->view('news_bycat',@$data);
        $this->LoadFooter();
    }


    //News list
    public function news_content($cat_alias,$news_alias,$cid,$nid){

        //  print_r($data['tinlienquan']); die();
        //     end;

        // data khong xoa
        $data['news']           =$this->f_newsmodel->get_news_content($nid,$news_alias);
        $data['tinlienquan']    = $this->f_newsmodel->Tinlienquan($cid,6,0);
        $data['cate_current']   =$this->f_newsmodel->get_data('news_category',array('id'=>$cid),array(),true);
        $data['cate']           =$this->f_newsmodel->get_data('news_category');
        $data['link_share']     =base_url($cat_alias.'/'.$news_alias.'-c'.$cid.'n'.$nid.'.html');
        $seo=array('title'=>@$data['news']->title_seo==''?$data['news']->title:$data['news']->title_seo,
                   'description'=>@$data['news']->description_seo,
                   'keyword'=>@$data['news']->keyword_seo,
                   'image'=>@$data['news']->product_image,
                   'type'=>'article');

        $this->LoadHeader($seo);
        $this->load->view('news_content',$data);
        $this->LoadFooter();
    }
    //news full
    public function All_news(){

        $config['base_url'] = base_url('tin-tuc');
        $config['total_rows'] = $this->f_newsmodel->countNewsByCategory_full(); // xác định tổng số record
        $config['per_page'] = 18; // xác định số record ở mỗi trang
        $config['uri_segment'] = 2; // xác định segment chứa page number
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
        $data = array();

        $data['right']=$this->widget('right');
        //data khong xoa
        $data['list']        = $this->f_newsmodel->NewsFull($config['per_page'],$config['uri_segment']);
//      print_r($data['list']); die();
//      end;
        $seo=array('title'=>'Tin tức',
            'description'=>'Tin tức',
            'keyword'=>'Tin tức',
            'type'=>'news');
        $this->LoadHeader(@$seo);
        $this->load->view('all_news',@$data);
        $this->LoadFooter();
    }
    //News by category
    public function newssimilar(){

    }
    //News Content
    public function newscontent(){

    }

}