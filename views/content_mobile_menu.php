<?php
$array = [
	//desk Menu//
	['contentcontroller/content/', 'WORK MODULES' , '',base_url().'index.php/contentcontroller/Central/'.$this->session->userdata('usersess')],
	['contentcontroller/Central/', 'CENTRAL FUNCTIONS' ,base_url().'index.php/contentcontroller/content/'.$this->session->userdata('usersess'),base_url().'index.php/contentcontroller/Business/'.$this->session->userdata('usersess')],
	['Help Desk', 'PROCUREMENT MODULES' , 'bems_desk//',base_url().'index.php/contentcontroller/content/'.$this->session->userdata('usersess')],
	['contentcontroller/Business/', 'BUSINESS INTELIGENT REPORTS' , base_url().'index.php/contentcontroller/Central/'.$this->session->userdata('usersess'),'']
	]
?>
<?php foreach ($array as $list) {?>
<?php if ($list[0] == $this->uri->slash_segment(1) .$this->uri->slash_segment(2)) {?>
<div class="divmenu"> 
	<div class="divmenuleft">
	<?php if ($list[2] == '') {?>
	 &nbsp;
	<?php }else{ ?>
	<a href="<?php echo $list[2]; ?>"><span class="icon-arrow-left"></span></a>
	<?php } ?>
	</div>
	<?php echo $list[1]; ?>
	<div class="divmenuright">
	<?php if ($list[3] == '') {?>
	 &nbsp;
	<?php }else{ ?>
	<a href="<?php echo $list[3]; ?>"><span class="icon-arrow-right"></span></a>
	<?php } ?>
	</div>
</div>
<?php } } ?>
