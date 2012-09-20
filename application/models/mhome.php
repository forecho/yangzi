<?php 
class Mhome extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	
	//登陆
	function login_admin($username,$password) {
		$query = $this
				->db
				->where('username',$username)
				//->where('password',$password)
				->where('password',md5($password))
				->limit(1)
				->get('yz_admin');
		if ($query->num_rows() > 0) {
			return $query->row();
		}
	}
	function sessionid($username) {
		$query = $this->db->get_where('yz_admin',array('username' => $username));
		return $query->row_array();
	}	
		
		
	//修改密码
	function change_pwd($username) {
		$pwd = $this->input->post('pwd');
		$pwd1 = $this->input->post('pwd1');
		$query = $this
				->db
				->where('username',$username)
				//->where('password',$pwd)
				->where('password',md5($pwd))
				->limit(1)
				->get('yz_admin');		
		if ($query->num_rows() > 0) {
			$this->db->where('username',$username);
			$this->db->update('yz_admin',array('password'=>md5($pwd1)));
			return 1;
		}
		return 0;
	}
	
	//添加新闻
	function inster_news($classify) {
		$title = $this->input->post('title');
		$addtime = $this->input->post('addtime');
		$content = $this->input->post('editorValue');
		
		$data = array('title'=>$title,'addtime'=>$addtime,'content'=>$content,'classify'=>$classify);
		$query = $this->db->insert('yz_news',$data);
		return $classify;
	}
	//读取新闻
	function sel_news($limit,$offset,$classify) {
		//$this->db->limit($limit,$offset);
		$this->db->order_by("addtime", "desc");
		$query = $this->db->get_where('yz_news',array('classify'=>$classify),$limit,$offset);
		//print_r($query->result_array()) ;
		return $query->result_array();
	}
	

	//总数
	function count_news($classify) {
		$query = $this->db->get_where('yz_news',array('classify'=>$classify));
		return $query->num_rows();
	}
	// 修改 读取新闻
	function selnews($id){
		$query = $this->db->get_where('yz_news',array('id'=>$id));
		return $query->row();
	}
	//更新新闻
	function change_news($id) {
		$title = $this->input->post('title');
		$addtime = $this->input->post('addtime');
		$content = $this->input->post('editorValue');
		
		$data = array('title' => $title,'content' => $content,'addtime' => $addtime);
		$this->db->where('id',$id);
		$query = $this->db->update('yz_news',$data);
		//print_r();
		if ($query) {
			return 1;//成功;
		}else {
			return 0;//成功;
		}
	}
	//删除新闻
	function del_news($id) {
		$query1 = $this->db->get_where('yz_news' ,array('id'=>$id))->row();
		//删除图片
		
		$get_image = preg_match_all ("/<(img|IMG)(.*)(src|SRC)=[\"|'|]{0,}([h|\/].*(jpg|JPG|gif|GIF|png|PNG))[\"|'|\s]{0,}/isU",$query1->content,$out);
		if ($get_image!="") {
				foreach ($out[4] as $row1){
				
				//echo $row1;
				$row1 = substr($row1,8);//转相对路径 8=/yangzi/
				//echo $row1;
				unlink($row1);
			}
		}
		
		$query = $this->db->delete('yz_news', array('id' => $id)); 
		if ($query) {
			return 1;
		}
	}
	
	
	//添加产品
	function addproduct($image,$classify) {
		$title = $this->input->post('title');
		$addtime = $this->input->post('addtime');
		
		$data = array('title'=>$title,'addtime'=>$addtime,'image'=>$image,'classify'=>$classify);
		$query = $this->db->insert('yz_product',$data);
	}
	//读取产品
	function sel_product($limit,$offset,$classify) {
		//$this->db->limit($limit,$offset);
		$this->db->order_by("addtime", "desc");
		$this->db->where('classify',$classify);
		$query = $this->db->get('yz_product',$limit,$offset);
		//print_r($query->result_array()) ;
		return $query->result_array();
	}
	
	//修改 读取产品
	function selproduct($id) {
		$query = $this->db->get_where('yz_product',array('id'=>$id));
		return $query->row();
	}
	//总数
	function count_product($classify) {
		$query = $this->db->get_where('yz_product',array('classify'=>$classify));
		return $query->num_rows();
	}
	//更新产品
	function change_product($id,$image) {
		$title = $this->input->post('title');
		$addtime = $this->input->post('addtime');
		if($image == ""){
			$data = array('title' => $title,'addtime' => $addtime);
		}else{
			$selproduct = $this->selproduct($id);
			//print_r($selproduct);
			unlink('uploads/img/'.$selproduct->image);
			$data = array('title' => $title,'image' => $image,'addtime' => $addtime);
		}
		$this->db->where('id',$id);
		$query = $this->db->update('yz_product',$data);
		//print_r();
		if ($query) {
			return 1;//成功;
		}else {
			return 0;//成功;
		}
	}
	//删除产品
	function delproduct($image) {
		$query = $this->db->delete('yz_product', array('image' => $image)); 
		if ($query) {
			return 1;
		}else{
			return 0;
		}
	}
	
	
	//查询 修改其他信息
	function selother($classify){
		$query = $this->db->get_where('yz_news',array('classify'=>$classify));
		return $query->row();
	}
	// 修改 其他信息
	function change_other($classify) {
		$content = $this->input->post('editorValue');
		
		$data = array('content' => $content);
		$this->db->where('classify',$classify);
		$query = $this->db->update('yz_news',$data);
		//print_r();
		if ($query) {
			return 1;//成功;
		}else {
			return 0;//成功;
		}
	}
	
	//读取公司信息
	function selcompany() {
		$query = $this->db->get('yz_company');
		return $query->row();
	}
	
	// 修改 公司信息
	function change_company($id) {
		$company = $this->input->post('company');
		$phone = $this->input->post('phone');
		$fax = $this->input->post('fax');
		$email = $this->input->post('email');
		
		$data = array('company' => $company,'phone' => $phone,'fax' => $fax,'email' => $email);
		$this->db->where('id',$id);
		$query = $this->db->update('yz_company',$data);
		//print_r();
		if ($query) {
			return 1;//成功;
		}else {
			return 0;//成功;
		}
	}
	
	
		//添加幻灯片
	function addbanner($image) {
		$title = $this->input->post('title');
		$link = $this->input->post('link');
		
		$data = array('title'=>$title,'link'=>$link,'image'=>$image);
		$query = $this->db->insert('yz_banner',$data);
	}
	//读取幻灯片
	function sel_banner() {
		$this->db->order_by("id", "desc");
		$query = $this->db->get('yz_banner');
		//print_r($query->result_array()) ;
		return $query->result_array();
	}
	
		//修改 读取幻灯片
	function selbanner($id) {
		$query = $this->db->get_where('yz_banner',array('id'=>$id));
		return $query->row();
	}
	
	//更新产品
	function change_banner($id,$image) {
		$title = $this->input->post('title');
		$link = $this->input->post('link');
		if($image == ""){
			$data = array('title' => $title,'link' => $link);
		}else{
			$selproduct = $this->selbanner($id);
			//print_r($selproduct);
			unlink('uploads/'.$selproduct->image);
			$data = array('title' => $title,'image' => $image,'link' => $link);
		}
		$this->db->where('id',$id);
		$query = $this->db->update('yz_banner',$data);
		//print_r();
		if ($query) {
			return 1;//成功;
		}else {
			return 0;//成功;
		}
	}
	//删除产品
	function delbanner($image) {
		$query = $this->db->delete('yz_banner', array('image' => $image)); 
		if ($query) {
			return 1;
		}else{
			return 0;
		}
	}
	
	
	
	//读取留言
	function sel_message($limit,$offset,$pid) {
		//$this->db->limit($limit,$offset);
		$this->db->order_by("id", "desc");
		$query = $this->db->get_where('yz_message',array('pid'=>$pid),$limit,$offset);
		//print_r($query->result_array()) ;
		return $query->result_array();
	}
	

	//总数 留言
	function count_message($pid) {
		$query = $this->db->get_where('yz_message',array('pid'=>$pid));
		return $query->num_rows();
	}
	// 修改 读取留言
	function selmessage($id){
		$query = $this->db->get_where('yz_message',array('id'=>$id));
		return $query->row();
	}
	
	//判断是否有回复
	function isreply($id){
		$query = $this->db->get_where('yz_message',array('pid'=>$id));
		return $query->num_rows();
	}
	//查询回复内容
	function selreply($id){
		$query = $this->db->get_where('yz_message',array('pid'=>$id));
		return $query->row();
	}
	//回复留言
	function reply($id) {
		$user = "管理员";
		$addtime = date("Y-m-d");
		$content = $this->input->post('content');
		
		$data = array('user'=>$user,'addtime'=>$addtime,'content'=>$content,'pid'=>$id);
		$query = $this->db->insert('yz_message',$data);
		return 1;
	}
	
	
	//更新留言
	function change_reply($id) {
		$addtime = date("Y-m-d");
		$content = $this->input->post('content');
		
		$data = array('content' => $content,'addtime' => $addtime);
		$this->db->where('pid',$id);
		$query = $this->db->update('yz_message',$data);
		//print_r();
		if ($query) {
			return 1;//成功;
		}else {
			return 0;//成功;
		}
	}
	
	//删除留言 回复
	function del_message($id) {
		$this->db->where('id', $id);
		$this->db->or_where('pid', $id); 
		$query = $this->db->delete('yz_message'); 
		if ($query) {
			return 1;
		}else{
			return 0;
		}
	}
	
	//删除回复
	function del_reply($id) {
		$this->db->where('pid', $id);
		$query = $this->db->delete('yz_message'); 
		if ($query) {
			return 1;
		}else{
			return 0;
		}
	}
	
	
	
	//首页 留言
	function add_message(){
		$user = $this->input->post('user');
		$addtime = date("Y-m-d");
		$content = $this->input->post('content');
		
		$data = array('user'=>$user,'addtime'=>$addtime,'content'=>$content,'pid'=>'0');
		$query = $this->db->insert('yz_message',$data);
		return 1;
	}
	
	
	
}
?>