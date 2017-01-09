<?php

!defined('IN_TIPASK') && exit('Access Denied');

class carboncontrol extends base {

    function carboncontrol(& $get, & $post) {
        $this->base($get, $post);
    }
	
	function oncompany(){
		$cat=$this->post['cat'];
		if($cat==1){
			$table="ask_carbon_1";
		}
		if($cat==2){
			$table="ask_carbon_2";
		}
		if($cat==3){
			$table="ask_carbon_3";
		}
		$sql="select distinct(cpy_name) as a from ".$table;
		$result=$this->db->fetch_all($sql);
		// echo $sql;
		echo json_encode($result);
	}
	
	function onyear(){
		$cat=$this->post['cat'];
		$cpy=$this->post['cpy'];
		if($cat==1){
			$table="ask_carbon_1";
		}
		if($cat==2){
			$table="ask_carbon_2";
		}
		if($cat==3){
			$table="ask_carbon_3";
		}
		// echo $cat;
		// echo "</br>";
		// echo $table;
		// echo "</br>";
		$sql="select distinct(years) as a from ".$table." where cpy_name='".$cpy."'";
		$result=$this->db->fetch_all($sql);
		// echo $sql;
		echo json_encode($result);
	}
	
	function onvalue(){
		$cat=$this->post['cat'];
		$cpy=$this->post['cpy'];
		$years=$this->post['years'];
		if($cat==1){
			$table="ask_carbon_1";
		}
		if($cat==2){
			$table="ask_carbon_2";
		}
		if($cat==3){
			$table="ask_carbon_3";
		}
		$sql="select * from ".$table." where cpy_name='".$cpy."' and years='".$years."'";
		$result=$this->db->fetch_all($sql);
		echo json_encode($result);
	}
	
	function ontrade(){
		$cat=$this->post['cat'];
		$years=$this->post['years'];
		if($years==2010){
			if($cat==1){
				$sql="select * from ask_carbon_4";
				$result=$this->db->fetch_all($sql);
			}
			if($cat==2){
				$sql="select * from ask_carbon_5";
				$result=$this->db->fetch_all($sql);
			}
			if($cat==3){
				$sql="select * from ask_carbon_6";
				$result1=$this->db->fetch_all($sql);
				// echo json_encode($result);
				$sql="select * from ask_carbon_7";
				$result2=$this->db->fetch_all($sql);
				$result=array_merge($result1,$result2);
			}
			echo json_encode($result);
		}
		
		
	}
	
}
