<div class="header-page" style="background-color: white;position: fixed;top: 0;width: 100%;left: 0; z-index: 1; margin-bottom: 5%;">
<table style="width: 100%;">
	<tr><td width="5%">
		<div class="menu-right" id="login_Box_Div">
				<?php echo anchor ('logincontroller/logout','<button type="submit" class="btn btn-primary logoutmobile"><span style="color:white;">Logout</span></button>');?>
			</div>
	</td>
	<td style="color:black;" width="20%">
	WELCOME <span style="font-size:15px;  text-transform: uppercase; color: black;"><?php echo $this->session->userdata('fullname');?></span>
	</td>
	<td style="text-align:right;">
		<div style="margin-top:10px; margin-left:3px; margin-bottom:10px;" >
				<!--<p style=" color:black;" align="center">Kuantan<br  />Pahang <br  />Phone: 09-573 0844<br />Email: support@iiumth.com</p>-->
				<?php include 'content_print.php';?>
				<?php include 'content_menuacg.php';?>
				<?php include 'content_search.php';?>
				<?php include 'content_picture_assets.php';?>
			</div>
	</td>
	<td style="text-align: right; width: 15%;">
	<?php echo anchor ('contentcontroller/content/'.$this->session->userdata('usersess'), '<div><img src="'.base_url().'images/myapbesys3.png" style="width:120px; height:40px;"/></div>'); ?>	
	</td>			
	</tr>
</table>
</div>
<?php if( $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == "contentcontroller/select/"){ ?>
<div style="background-color:white; margin-top:7.5%; margin-left:15%; margin-right:15%;">
<table class="table-middle-screen-1">
<tr>
<td>SELECT YOUR SITE
</td>
</tr>
</table>
</div>
<?php } else { ?>
<div style="margin-top:8%; margin-left:5%; margin-right:5%;">
<table class="table-middle-screen-1">
<tr>
<td>
	<?php if( $this->session->userdata("total_hosp")>1 ){?>
					<?php echo anchor ('contentcontroller/select?hc=pilih',$this->session->userdata("hosp_name"),'style="font-size:20px;color:white; {
						# code...
					}"'); ?>
				<?php }else{?>
					<p style="font-size: 20px; color: black;"><?=$this->session->userdata("hosp_name");?></p>
				<?php } ?>
</td>
</tr>
</table>
</div>
<?php } ?>


			<div class="footer">
			<span style=" color: white; font-size: 13px;">ADVANCE PACT SDN BHD (412168-v)<br>
Copyright©-2019,  2-3A, Perdana The Place, 1, Jalan PJU 8/5g, Damansara Perdana, 47820 Petaling Jaya, Selangor Darul Ehsan, Malaysia.</span><br/>
			</div>
	