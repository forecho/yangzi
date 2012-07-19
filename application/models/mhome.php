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
				->where('password',$password)
				//->where('password',md5($password))
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
	function addproduct($image) {
		$title = $this->input->post('title');
		$addtime = $this->input->post('addtime');
		
		$data = array('title'=>$title,'addtime'=>$addtime,'image'=>$image);
		$query = $this->db->insert('yz_product',$data);
	}
	//读取产品
	function sel_product($limit,$offset) {
		//$this->db->limit($limit,$offset);
		$this->db->order_by("addtime", "desc");
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
	function count_product() {
		$query = $this->db->get('yz_product');
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
	//删除新闻
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
	
	
}
?>