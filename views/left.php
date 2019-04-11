<div class="ui-left_web">
	<body class="body-screen">
		<?php include 'content_menu.php';?>
		<div class="ui-left-screen">
			<?php echo anchor ('contentcontroller/content/'.$this->session->userdata('usersess'), '<div align="center" class ="header-page"><img src="'.base_url().'images/myapbesys3.png" style="width:150px; height:60px;"/><br /><span style="font-size:7px; color:black;">MYAPBESYS is a copyright product of Advance Pact Sdn Bhd. All rights reserved.</span></div>'); ?>
			<div class="color_style_1 menuprofile"><!-- Nanti Delete Nie -->
				<span style="font-size:18px;  text-transform: uppercase; display:inline-block; height: 100%; width:70%; padding:5px;"><?php echo $this->session->userdata('fullname');?></span> 
				<span id="loginButton"><img src="<?php echo base_url().'uploadfile/'?><?php echo $this->session->userdata('p_picture');?>" style="display:block; float:left; width:20%;"  /></span>
				
	
				<div id="loginBox">
					<div id="loginForm">
						<div id="body-class">
							<div class="head-info-profile">
								WELCOME <br /> <span style="font-size:14px;  text-transform: uppercase;"><?php echo $this->session->userdata('fullname');?></span>
							</div>
							<div class="picture-info"><img src="<?php echo base_url().'uploadfile/'?><?php echo $this->session->userdata('p_picture');?>"/></div>
							<div class="picture-info-detail">
								<span>Location : <?php echo $this->session->userdata('hosp_code');?></span><br/>
								<span>Staff No : <?php echo $this->session->userdata('Per_Code');?></span><br/>
								<span>Designation : <?php echo $this->session->userdata('designation');?></span><br/>
								<span>Service : <?php echo $this->session->userdata('Ser_Code');?></span><br/>
							</div>
						</div>
			  		</div>
				</div>
			</div>
			<style>
				.menuprofile{
					font-weight:bold;
					text-align:center;
					 height:54px;
					 display:table-cell;
				}
			</style>
			<div align="center" class="ui-header-left-color" style="font-weight:bold; margin-top:; padding-top:5px; padding-bottom:5px; color:white;">
				<!-- International Islamic<br />University Malaysia -->
				<?php if( $this->session->userdata("total_hosp")>1 ){?>
					<?php echo anchor ('contentcontroller/select?hc=pilih',$this->session->userdata("hosp_name"),'style="font-size:20px;"'); ?>
				<?php }else{?>
					<p style="font-size: 20px; color: black;"><?=$this->session->userdata("hosp_name");?></p>
				<?php } ?>
			</div>
			<div align="center" class="color_style_1" style="font-weight:bold; margin-top:; padding-top:5px; padding-bottom:5px; color:white;">
				<?php if ($this->input->get('parent') == "desk") { ?>
					<?php if( $this->session->userdata("total_service")>1 ){?>
				<?php echo anchor ('contentcontroller/workorder?utk=csr&parent='.$this->input->get('parent'),$this->session->userdata('usersessn'),'style="font-size:20px;"'); ?>
					<?php }else{ ?>
				<p style="font-size: 20px; color: black;"><?=$this->session->userdata('usersessn');?><p>
					<?php } ?>
				<?php } else {?>
					<?php if( $this->session->userdata("total_service")>1 ){?>
				<?php echo anchor ('contentcontroller/select?continue=',$this->session->userdata('usersessn'),'style="font-size:20px;"'); ?>
					<?php }else{ ?>
				<p style="font-size: 20px; color: black;"><?=$this->session->userdata('usersessn');?><p>
					<?php } ?>
				<?php }?>
			</div>
			<div style="margin-top:10px; margin-left:3px; margin-bottom:10px;" >
				<!--<p style=" color:black;" align="center">Kuantan<br  />Pahang <br  />Phone: 09-573 0844<br />Email: support@iiumth.com</p>-->
				<?php include 'content_print.php';?>
				<?php include 'content_menuacg.php';?>
				<?php include 'content_search.php';?>
				<?php include 'content_picture_assets.php';?>
			</div>
			<div align="center"> <?php echo anchor ('logincontroller/logout','<button type="submit" class="btn btn-primary" style="width: 30%;"><span style="color:white;">Logout</span></button>');?></div>
		</div>
		<div class="background3"></div>
	</body>
</div>
	<?php if ($this->uri->slash_segment(1) .$this->uri->slash_segment(2) != 'contentcontroller/assetlicenses_new/'){ ?>
	<div class="ui-left_mobile">
		<meta name="viewport" content="width=device-width, user-scalable=no" />
		<body class="body-screen">
			<div class="ui-left-screen">
				<div class="main-head bg-lime">
					<div class="main-head-m1 bg-fuchsia"><span><?php echo anchor ('contentcontroller/select?continue=',$this->session->userdata('usersess')); ?></span></div>
				<div class="main-head-m2 bg-lime">
					<span id="show"><?php echo anchor ('contentcontroller/content/'.$this->session->userdata('usersess'), 'Computerized Asset Management Service Information System'); ?> <br /> IIUM Teaching Hospital</span>
					<span id="welcomeDiv"  style="display:none; text-align:left; padding:0px 0px;">
						<?php include 'content_searchmobile.php';?><span class="icon-arrow-right2" onclick="showDiv2()"></span></span>
				</div>
				<div class="main-head-m3 bg-light-blue"><span class="icon-list" id = "buttonLogin" ></span></div>
					<?php include 'content_searchmobileseac.php';?>
				</div>
			</div>
			<?php include 'content_menu.php';?>
			<div class="menu-right" id="login_Box_Div">
				<?php echo anchor ('logincontroller/logout','<button type="submit" class="btn btn-primary logoutmobile"><span style="color:white;">Logout</span></button>');?>
			</div>
		</body>
	</div>
	<script>
		$('#buttonLogin').click(function(){
			$('#login_Box_Div').toggle(500);
		});
	</script>
	<?php } ?>
