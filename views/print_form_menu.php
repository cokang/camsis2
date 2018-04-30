<style>
			ul.pf_menu {
    list-style-type: none;
    margin: 0 auto;
    padding: 0;
    overflow: hidden;
    background-color: #398074;
	width:98%;
	
}

ul.pf_menu li {
    float: left;
	width:23.08%;
	text-align:center;
	 padding:10px;
}

ul.pf_menu a li{
    display: block;
    color: white;
    text-align: center;
    text-decoration: none;
}

ul.pf_menu a li:hover:not(.active) {
    background-color: #4CAF50;
}

ul.pf_menu li.active {
    background-color: #4CAF50;
}
			</style>
			<div class="ui-main-form-5">
				<div class="middle_d2">
				<ul class="pf_menu">
				<a href="<?php echo base_url()?>index.php/contentcontroller/assetwn?asstno=<?=$this->input->get('asstno');?>&tab=9&pf=1"><li <?php if($this->input->get('pf') == 1){ echo 'class="active"';} ?>>Warranty Notification</li></a>
				<a href="<?php echo base_url()?>index.php/contentcontroller/assetet?asstno=<?=$this->input->get('asstno');?>&tab=9&pf=2"><li <?php if($this->input->get('pf') == 2){ echo 'class="active"';} ?>>Equipment Transfer</li></a>
				<a href="<?php echo base_url()?>index.php/contentcontroller/assetwe?asstno=<?=$this->input->get('asstno');?>&tab=9&pf=3"><li <?php if($this->input->get('pf') == 3){ echo 'class="active"';} ?>>Warranty Expiry</li></a>
				<a href="<?php echo base_url()?>index.php/contentcontroller/assetwf?asstno=<?=$this->input->get('asstno');?>&tab=9&pf=4"><li <?php if($this->input->get('pf') == 4){ echo 'class="active"';} ?>>Warranty Form</li></a>
				</ul>
				</div>
			</div>