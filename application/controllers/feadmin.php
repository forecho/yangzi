<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feadmin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper('url');
		$this->load->helper(array('form', 'url'));
		$this->load->model('mhome');
		$this->load->library('pagination');
		$this->load->library('session');
		$this->load->library('form_validation');
	}
	
	function index(){
		$this->load->view('admin/login');
	}
	
	//登陆
	function login(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		echo $this->input->post('username');
		echo $this->input->post('password');
		
		if ($this->form_validation->run()!= false) {
			$this->load->model('mhome');
			$res = $this->mhome->login_admin(
					$this->input->post('username'),
					$this->input->post('password')
			);
			echo $this->input->post('username');
			echo $this->input->post('password');
			if ($res!="") {
				$this->session->set_userdata('username',$this->input->post('username'));
				redirect('feadmin/main');
			}else{
				$data["error"] = "密码或用户名错误。";
			}
		}
		$this->load->view('admin/login',@$data);
	}
	
	//退出
	function logout() {
		$this->session->sess_destroy();
		$this->load->view('admin/login');
	}
	
	//修改密码

	function change_pwd_ok() { 
		$username = $this->session->userdata('username');
		
		$query = $this->mhome->change_pwd($username);
		//提示
		$data['succ'] = $query;
		$data['su1'] = "密码修改成功";
		$data['su0'] = "密码修改失败,请重新输入原密码";
		$this->load->view('admin/success', $data);
	}
	
	function main(){
		if (!$this->session->userdata('username')) {
			redirect('feadmin/login');
		}
		
		$data['sel_product'] = $this->list_product();
		$data['sel_news'] = $this->list_news();
		$data['selnews'] = $this->mhome->selnews($this->uri->segment(4));
		$data['selproduct'] = $this->mhome->selproduct($this->uri->segment(4));
	
		$data['selcompany'] = $this->mhome->selcompany();
		$data['sel_banner'] = $this->mhome->sel_banner();
		$data['selbanner'] = $this->mhome->selbanner($this->uri->segment(4));
		
		$data['sel_message'] = $this->list_message();
		$data['selmessage'] = $this->mhome->selmessage($this->uri->segment(4));
		$data['isreply'] = $this->mhome->isreply($this->uri->segment(4));
		$data['selreply'] = $this->mhome->selreply($this->uri->segment(4));
		//print_r($data['selcompany']);
		//print_r($data['sel_message']);
		switch($this->uri->segment(3))
			{
			case 'zzjg':
				$classify = '组织机构';
				break;
			case 'dszzx':
				$classify = '董事长致信';
				break;
			case 'rszp':
				$classify = '人事招聘';
				break;
			case 'gsjs':
				$classify = '公司简介';
				break;
			case 'qywh':
				$classify = '企业文化';
				break;
		}
		$data['selother'] = $this->mhome->selother(@$classify);
		//print_r($data['selnews']);
		$this->load->view('admin/admin',$data);
	}
	
	
	
	//添加新闻
	function news_ok() {
		$classify = '新闻中心';
		if ($this->input->post('submit')) {
			$query = $this->mhome->inster_news($classify);
			if ($query) {
				redirect('feadmin/main/newslist');
			}
		}
	}
	//新闻列表
	function list_news($offset='') {
	
		$keyword = "新闻中心";
		$data['nav_type'] = $keyword;
		
		$limit = 2;// 每页显示数量
		$offset = $this->uri->segment(4);
		$total = $this->mhome->count_news($keyword);// 统计数量
		$data['sel_news'] = $this->mhome->sel_news($limit,$offset,$keyword);
		
		$config['base_url'] = base_url().'/feadmin/main/newslist/';// 分页的基础 URL
		$config['total_rows'] = $total;//记录总数
		$config['uri_segment'] = 4;
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
	
	
	
	//修改新闻
	function change_news() {
		$id = $this->uri->segment(3);
		if ($this->input->post('submit')) {
			$query = $this->mhome->change_news($id);
			if ($query) {
				//提示 
				$data['succ'] = $query;  
				$data['su1'] = "修改新闻成功";  
				$data['su0'] = "修改新闻成功失败,请重新修改";  
				$this->load->view('admin/success', $data);  
			}
		}
	}
	//删除新闻
	function del_news() {
		$id = $this->uri->segment(3);
		$query = $this->mhome->del_news($id);
		if ($query) {
			//提示 
			$data['succ'] = $query;  
			$data['su1'] = "删除文章成功";  
			$data['su0'] = "删除文章失败,请再重新删除";  
			$this->load->view('admin/success', $data);  
		}

	}
	
	
	//上传产品
	function product_ok(){
        $config['upload_path'] = './uploads/img/';//绝对路径  
        $config['allowed_types'] = 'gif|jpg|png';//文件支持类型  
        $config['max_size'] = '0';  
        $config['encrypt_name'] = true;//重命名文件  
        $this->load->library('upload',$config);  
  
        if ($this->upload->do_upload('image')) {  
            $upload_data = $this->upload->data();  
            $query = 1;  
            //调用模型，写入数据库  
			if($this->uri->segment(3) == ""){
				$classify = 0;
			}else{
				$classify = 1;
			}
            $this->mhome->addproduct($upload_data['file_name'],$classify);  
        }  
        else {  
            $this->upload->display_errors();  
            $query = 0;  
        }  
        //提示  
        $data['succ'] = $query;  
        $data['su1'] = "提交成功";  
        $data['su0'] = "文件上传失败,请检查文件再重新上传";  
        $this->load->view('admin/success', $data);  
	} 
	
	//产品列表
	function list_product($offset='') {
	
		
		$limit = 2;// 每页显示数量
		$offset = $this->uri->segment(4);
		
		if($this->uri->segment(3) == "productlist"){
				$classify = 0;
			}else{
				$classify = 1;
		}
		$total = $this->mhome->count_product($classify);// 统计数量
		$data['sel_product'] = $this->mhome->sel_product($limit,$offset,$classify);
		
		$config['base_url'] = base_url().'/feadmin/main/'.$this->uri->segment(3);// 分页的基础 URL
		$config['total_rows'] = $total;//记录总数
		$config['uri_segment'] = 4;
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
	
	//修改产品
	function change_product() {
		$id = $this->uri->segment(3);
		if ($this->input->post('submit')) {

			$config['upload_path'] = './uploads/img/';//绝对路径  
			$config['allowed_types'] = 'gif|jpg|png';//文件支持类型  
			$config['max_size'] = '0';  
			$config['encrypt_name'] = true;//重命名文件  
			$this->load->library('upload',$config);  
	  
			if ($this->upload->do_upload('image')) {  
				$upload_data = $this->upload->data();  
				$query = 1;  
				//调用模型，写入数据库  
				$this->mhome->change_product($id,$upload_data['file_name']);  
			}  
			else {  
				$query = $this->mhome->change_product($id,$image = ""); 
			}

			if ($query) {
				//提示 
				$data['succ'] = $query;  
				$data['su1'] = "修改产品成功";  
				$data['su0'] = "修改产品成功失败,请重新修改";  
				$this->load->view('admin/success', $data);  
			}
		}
	}
	
	//删除文件
	function delproduct() {
		$file_path = 'uploads/img/'.$this->uri->segment(3);
		unlink($file_path);
		$query = $this->mhome->delproduct($this->uri->segment(3));
		//提示
		$data['succ'] = $query;
		$data['su1'] = "删除成功";
		$data['su0'] = "对不起，删除失败";
		$this->load->view('admin/success', $data);
	}
	
	//修改 其他信息
	function change_other() {
		$classify = rawurldecode($this->uri->segment(3));
		if ($this->input->post('submit')) {
			$query = $this->mhome->change_other($classify);
			if ($query) {
				//提示 
				$data['succ'] = $query;  
				$data['su1'] = "修改信息成功";  
				$data['su0'] = "修改信息成功失败,请重新修改";  
				$this->load->view('admin/success', $data);  
			}
		}
	}
	
	//修改 公司信息
	function change_company() {
		$id = $this->uri->segment(3);
		if ($this->input->post('submit')) {
			$query = $this->mhome->change_company($id);
			if ($query) {
				//提示 
				$data['succ'] = $query;  
				$data['su1'] = "修改公司信息成功";  
				$data['su0'] = "修改公司信息成功失败,请重新修改";  
				$this->load->view('admin/success', $data);  
			}
		}
	}
	
	
	
	//上传幻灯片
	function banner_ok(){
        $config['upload_path'] = './uploads/';//绝对路径  
        $config['allowed_types'] = 'gif|jpg|png';//文件支持类型  
        $config['max_size'] = '3000';  
        $config['encrypt_name'] = true;//重命名文件 
		
		
        $this->load->library('upload',$config); 
  
        if ($this->upload->do_upload('image')) {  
			//调整图片大小
            $upload_data = $this->upload->data();
				$imgname=$upload_data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['source_image'] = "uploads/".$imgname;
				//$config['new_image'] = "uploads/".$imgname;
				$this->load->library('image_lib'); 
				$config['image_library'] = 'GD2';
				$config['width'] = 1000;
				$config['height'] = 300;
				$this->image_lib->initialize($config);
				$this->image_lib->resize(); //生成缩略图
            $query = 1;  
            //调用模型，写入数据库  
            $this->mhome->addbanner($imgname);  
        }  
        else {  
			//$this->upload->display_errors();  
            $query = 0;  
        }  
        //提示  
        $data['succ'] = $query;  
        $data['su1'] = "提交成功";  
        $data['su0'] = "文件上传失败,请检查文件再重新上传";  
        //$this->load->view('admin/success', $data);  
	} 
	
	
		//修改幻灯片
	function change_banner() {
		$id = $this->uri->segment(3);
		if ($this->input->post('submit')) {

			$config['upload_path'] = './uploads/img/';//绝对路径  
			$config['allowed_types'] = 'gif|jpg|png';//文件支持类型  
			$config['max_size'] = '0';  
			$config['encrypt_name'] = true;//重命名文件  
			$this->load->library('upload',$config);  
	  
			if ($this->upload->do_upload('image')) {  
				$upload_data = $this->upload->data();
					$imgname=$upload_data['file_name'];
					$config['create_thumb'] = FALSE;
					$config['source_image'] = "uploads/".$imgname;
					//$config['new_image'] = "uploads/".$imgname;
					$this->load->library('image_lib'); 
					$config['image_library'] = 'GD2';
					$config['width'] = 1000;
					$config['height'] = 300;
					$this->image_lib->initialize($config);
					$this->image_lib->resize(); //生成缩略 
				$query = 1;  
				//调用模型，写入数据库  
				$this->mhome->change_banner($id,$upload_data['file_name']);  
			}  
			else {  
				$query = $this->mhome->change_banner($id,$image = ""); 
			}

			if ($query) {
				//提示 
				$data['succ'] = $query;  
				$data['su1'] = "修改幻灯片成功";  
				$data['su0'] = "修改幻灯片失败,请重新修改";  
				$this->load->view('admin/success', $data);  
			}
		}
	}
	
	//删除幻灯片
	function delbanner() {
		$file_path = 'uploads/'.$this->uri->segment(3);
		unlink($file_path);
		$query = $this->mhome->delbanner($this->uri->segment(3));
		//提示
		$data['succ'] = $query;
		$data['su1'] = "删除成功";
		$data['su0'] = "对不起，删除失败";
		$this->load->view('admin/success', $data);
	}
	
	
	//留言列表
	function list_message($offset='') {
	
		
		$limit = 2;// 每页显示数量
		$offset = $this->uri->segment(4);
		
		$pid = "0";
		$total = $this->mhome->count_message($pid);// 统计数量
		
		$data['sel_message'] = $this->mhome->sel_message($limit,$offset,$pid);
		
		$config['base_url'] = base_url().'/feadmin/main/messagelist/';// 分页的基础 URL
		$config['total_rows'] = $total;//记录总数
		$config['uri_segment'] = 4;
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
	
	//回复留言
	function reply() {
		$pid = $this->uri->segment(3);
		if ($this->input->post('submit')) {
			$query = $this->mhome->reply($pid);
			if ($query) {
				//提示 
				$data['succ'] = $query;  
				$data['su1'] = "回复留言成功";  
				$data['su0'] = "回复留言失败,请重新修改";  
				$this->load->view('admin/success', $data);  
			}
		}
	}
	
	//修改 回复留言
	function change_reply() {
		$pid = $this->uri->segment(3);
		if ($this->input->post('submit')) {
			$query = $this->mhome->change_reply($pid);
			if ($query) {
				//提示 
				$data['succ'] = $query;  
				$data['su1'] = "回复信息修改成功";  
				$data['su0'] = "回复信息修改失败,请重新修改";  
				$this->load->view('admin/success', $data);  
			}
		}
	}
	
	
	//删除留言回复
	function del_message() {
		$id = $this->uri->segment(3);
		$query = $this->mhome->del_message($id);
		if ($query) {
			//提示 
			$data['succ'] = $query;  
			$data['su1'] = "删除留言成功";  
			$data['su0'] = "删除留言失败,请再重新删除";  
			$this->load->view('admin/success', $data);  
		}

	}
	
	//删除回复
	function del_reply() {
		$id = $this->uri->segment(3);
		$query = $this->mhome->del_reply($id);
		if ($query) {
			//提示 
			$data['succ'] = $query;  
			$data['su1'] = "删除回复成功";  
			$data['su0'] = "删除回复失败,请再重新删除";  
			$this->load->view('admin/success', $data);  
		}

	}
	
	
}
