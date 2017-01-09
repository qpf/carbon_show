<?php

!defined('IN_TIPASK') && exit('Access Denied');

class indexcontrol extends base {

    function indexcontrol(& $get, & $post) {
        $this->base($get, $post);
    }
	
	function onmain(){
		include template('carbon_main');
	}
	
	function onaccount1(){
		include template('carbon_account_1');
	}
	function onanalyse1(){
		include template('carbon_analyse_1');
	}
	function onanalyse2(){
		include template('carbon_analyse_2');
	}
	function oncap1(){
		$sql="select * from ask_carbon_8";
		$result=$this->db->fetch_all($sql);
		// var_dump($result);
		$num=count($result);
		// echo $num;
		include template('carbon_cap_1');
	}
	function oncap2(){
		
		include template('carbon_cap_2');
	}
	function onenergy1(){
		$sql="select * from ask_carbon_9";
		$result=$this->db->fetch_all($sql);
		// var_dump($result);
		include template('carbon_energy_1');
	}
	function onenergy2(){
		include template('carbon_energy_2');
	}
	function onyield1(){
		include template('carbon_yield_1');
	}
	function onyield2(){
		$sql="select * from ask_carbon_10";
		$result=$this->db->fetch_all($sql);
		include template('carbon_yield_2');
	}
	function onyield3(){
		include template('carbon_yield_3');
	}
	
    function ondefault() {
        // $linklist = $this->cache->load('link', 'id', 'displayorder');
        // if(isset($this->get[2]) && $this->get[2]='frompc'){
            // tcookie("frompc",1,3600);
            // header("Location:".SITE_URL);
        // }
        /* SEO */
        // $this->setting['seo_index_title'] && $seo_title = str_replace("{wzmc}", $this->setting['site_name'], $this->setting['seo_index_title']);
        // $this->setting['seo_index_description'] && $seo_description = str_replace("{wzmc}", $this->setting['site_name'], $this->setting['seo_index_description']);
        // $this->setting['seo_index_keywords'] && $seo_keywords = str_replace("{wzmc}", $this->setting['site_name'], $this->setting['seo_index_keywords']);
        // include template('index');
		include template('carbon_index');
    }
   

    function onhelp() {
        $this->load('usergroup');
        $usergrouplist = $_ENV['usergroup']->get_list(2);
        include template('help');
    }

    function ondoing() {
        include template("doing");
    }

    /* 查询图片是否需要点击放大 */

    function onajaxchkimg() {
        list($width, $height, $type, $attr) = getimagesize($this->post['imgsrc']);
        ($width > 300) && exit('1');
        exit('-1');
    }

    function ononline() {
        $navtitle = "当前在线";
        $this->load('user');
        @$page = max(1, intval($this->get[2]));
        $pagesize = 30;
        $startindex = ($page - 1) * $pagesize;
        $onlinelist = $_ENV['user']->list_online_user($startindex, $pagesize);
        $onlinetotal = $_ENV['user']->rownum_onlineuser();
        $departstr = page($onlinetotal, $pagesize, $page, "index/online");
        include template("online");
    }

}

