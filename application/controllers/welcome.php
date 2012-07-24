<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->helper(array('form', 'url'));
		$this->load->model('mhome');
		$this->load->library('pagination');
	}
	
	function index(){
		$data['selcompany'] = $this->mhome->selcompany();
		$data['gsjj'] = $this->mhome->selother('公司简介');
		$data['sel_news'] = $this->mhome->sel_news('14','0','新闻中心');
		$data['sel_product'] = $this->mhome->sel_product('4','0','0');
		$data['sel_banner'] = $this->mhome->sel_banner();
		
		$this->load->view('header',$data);
		$this->load->view('index',$data);
		$this->load->view('footer');
	}
	
	function company(){	
		$data['zzjg'] = $this->mhome->selother('组织机构');
		$data['dszzx'] = $this->mhome->selother('董事长致信');
		$data['gsjj'] = $this->mhome->selother('公司简介');
		$data['qywh'] = $this->mhome->selother('企业文化');
		$data['sel_banner'] = $this->mhome->sel_banner();
		
		$data['sel_product'] = $this->list_product();
		
		$this->load->view('header',$data);
		$this->load->view('company',$data);
		$this->load->view('footer');
	}
	
	function news(){
		$data['selcompany'] = $this->mhome->selcompany();
		$data['sel_news'] = $this->list_news();
		$data['sel_banner'] = $this->mhome->sel_banner();
		
		$this->load->view('header',$data);
		$this->load->view('news',$data);
		$this->load->view('footer');
	}
	
	function content(){
		$data['selcompany'] = $this->mhome->selcompany();
		$data['selnews'] = $this->mhome->selnews($this->uri->segment(3));
		$data['sel_banner'] = $this->mhome->sel_banner();
		
		$this->load->view('header',$data);
		$this->load->view('content',$data);
		$this->load->view('footer');
	}
	
	function product(){
		$data['selcompany'] = $this->mhome->selcompany();
		$data['sel_product'] = $this->list_product();
		$data['sel_banner'] = $this->mhome->sel_banner();
		
		$this->load->view('header',$data);
		$this->load->view('product',$data);
		$this->load->view('footer');
	}
	
	function person(){
		$data['selcompany'] = $this->mhome->selcompany();
		$data['sel_message'] = $this->list_message();
		$data['sel_banner'] = $this->mhome->sel_banner();
		
		$this->load->view('header',$data);
		$this->load->view('person',$data);
		$this->load->view('footer');
	}
	
	function promit(){
		$data['selcompany'] = $this->mhome->selcompany();
		$data['rszp'] = $this->mhome->selother('人事招聘');
		$data['sel_banner'] = $this->mhome->sel_banner();
		
		$this->load->view('header',$data);
		$this->load->view('promit',$data);
		$this->load->view('footer');
	}
	
	
	//产品列表
	function list_product($offset='') {
	
		
		$limit = 8;// 每页显示数量
		$offset = $this->uri->segment(3);
		
		if($this->uri->segment(2) == 'product'){
				$classify = 0;
			}else{
				$classify = 1;
		}
		$total = $this->mhome->count_product($classify);// 统计数量
		$data['sel_product'] = $this->mhome->sel_product($limit,$offset,$classify);
		
		$config['base_url'] = base_url().'/welcome/'.$this->uri->segment(2);// 分页的基础 URL
		$config['total_rows'] = $total;//记录总数
		$config['uri_segment'] = 3;
		$config['per_page'] = $limit; //每页条数
		
		//几行可选设置
		$config['full_tag_open'] = '<div class="pagination">'; // 分页开始样式
        $config['full_tag_close'] = '</div>'; // 分页结束样式
        $config['first_link'] = '首页'; // 第一页显示
        $config['last_link'] = '末页'; // 最后一页显示
        $config['next_link'] = '下一页 >'; // 下一页显示
        $config['prev_link'] = '< 上一页'; // 上一页显示
        $config['cur_tag_open'] = ' <a class="current">'; // 当前页开始样式
        $config['cur_tag_close'] = '</a>'; // 当前页结束样式
		$config['num_links'] = 2;// 当前连接前后显示页码个数
		
		$this->pagination->initialize($config); // 配置分页
		
		$data['pag_links'] =  $this->pagination->create_links();//显示分页
		
		
		return $data;
		//$this->load->view('feadmin/main/newslist',$data);
	}
	
	//新闻列表
	function list_news($offset='') {
	
		$keyword = "新闻中心";
		$data['nav_type'] = $keyword;
		
		$limit = 10;// 每页显示数量
		$offset = $this->uri->segment(3);
		$total = $this->mhome->count_news($keyword);// 统计数量
		$data['sel_news'] = $this->mhome->sel_news($limit,$offset,$keyword);
		
		$config['base_url'] = base_url().'/welcome/news/';// 分页的基础 URL
		$config['total_rows'] = $total;//记录总数
		$config['uri_segment'] = 3;
		$config['per_page'] = $limit; //每页条数
		
		//几行可选设置
		$config['full_tag_open'] = '<div class="pagination">'; // 分页开始样式
        $config['full_tag_close'] = '</div>'; // 分页结束样式
        $config['first_link'] = '首页'; // 第一页显示
        $config['last_link'] = '末页'; // 最后一页显示
        $config['next_link'] = '下一页 >'; // 下一页显示
        $config['prev_link'] = '< 上一页'; // 上一页显示
        $config['cur_tag_open'] = ' <a class="current">'; // 当前页开始样式
        $config['cur_tag_close'] = '</a>'; // 当前页结束样式
		$config['num_links'] = 2;// 当前连接前后显示页码个数
		
		$this->pagination->initialize($config); // 配置分页
		
		$data['pag_links'] =  $this->pagination->create_links();//显示分页
		foreach ($data['sel_news'] as $row)
		{
		   $row['content'];
		}
		
		preg_match_all ("/<(img|IMG)(.*)(src|SRC)=[\"|'|]{0,}([h|\/].*(jpg|JPG|gif|GIF|png|PNG))[\"|'|\s]{0,}/isU",@$row['content'],$out);
		$data['get_image'] =  $out[4];
		
		return $data;
		//$this->load->view('feadmin/main/newslist',$data);
	}
	
	
	//留言列表
	function list_message($offset='') {
	
		
		$limit = 3;// 每页显示数量
		$offset = $this->uri->segment(3);
		
		$pid = "0";
		$total = $this->mhome->count_message($pid);// 统计数量
		
		$data['sel_message'] = $this->mhome->sel_message($limit,$offset,$pid);
		
		$config['base_url'] = base_url().'/welcome/person/';// 分页的基础 URL
		$config['total_rows'] = $total;//记录总数
		$config['uri_segment'] = 3;
		$config['per_page'] = $limit; //每页条数
		
		//几行可选设置
		$config['full_tag_open'] = '<div class="pagination">'; // 分页开始样式
        $config['full_tag_close'] = '</div>'; // 分页结束样式
        $config['first_link'] = '首页'; // 第一页显示
        $config['last_link'] = '末页'; // 最后一页显示
        $config['next_link'] = '下一页 >'; // 下一页显示
        $config['prev_link'] = '< 上一页'; // 上一页显示
        $config['cur_tag_open'] = ' <a class="current">'; // 当前页开始样式
        $config['cur_tag_close'] = '</a>'; // 当前页结束样式
		$config['num_links'] = 2;// 当前连接前后显示页码个数
		
		$this->pagination->initialize($config); // 配置分页
		
		$data['pag_links'] =  $this->pagination->create_links();//显示分页
		
		
		return $data;
		//$this->load->view('feadmin/main/newslist',$data);
	}
	
	
	
	
	
	
	//添加留言
	function add_message() {
		if ($this->input->post('submit')) {
			$query = $this->mhome->add_message();
			if ($query) {
				redirect('welcome/person');
			}
		}
	}
	
	
	
	
}
