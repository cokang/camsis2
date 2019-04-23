<div class="header-page" style="background-color: white;position: fixed;top: 0;width: 100%;left: 0; z-index: 1; margin-bottom: 5%;">
<table style="width: 100%;">
	<tr><td width="5%">
		<div class="menu-right" id="login_Box_Div">
				<?php echo anchor ('logincontroller/logout','<button type="submit" class="btn btn-primary logoutmobile"><span style="color:white;">Logout</span></button>');?>
			</div>
	</td>
	<td>
	WELCOME <span style="font-size:15px;  text-transform: uppercase;"><?php echo $this->session->userdata('fullname');?></span>
	</td>
	<td style="text-align: right;">
	<?php echo anchor ('contentcontroller/content/'.$this->session->userdata('usersess'), '<div><img src="'.base_url().'images/myapbesys3.png" style="width:120px; height:40px;"/></div>'); ?>	
	</td>			
	
	</tr>
</table>
</div>

<?php if( $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == "contentcontroller/contents/" || $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == "contentcontroller/qap4_/"|| $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == "contentcontroller/Central/" || $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == "contentcontroller/Business/"|| $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == "contentcontroller/Procurement/"){ ?>
<div class="ui-middle-screen5">
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

<?php if( $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == "contentcontroller/workorder/" || $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == "contentcontroller/assets/" || $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == "contentcontroller/Licenses/" || $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == "contentcontroller/Schedule/" || $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == "contentcontroller/acg_report/" || $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == "contentcontroller/uploaddesk/" ){ ?>
<div class="ui-middle-screen5">
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
				<a href='../contentcontroller/Content/bems?&tab=0' style="font-size: 20px;color: white;"> <span class='icon-play2' style="font-size: 20px;color: white;"></span> Work Order</a>
</td>
</td>
</tr>
</table>
</div>
<?php } ?>

<?php if( $this->uri->slash_segment(2) == "../workorder"){ ?>
<div class="ui-middle-screen5">
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

	<?php if( $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == "contentcontroller/qap3/" || $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == "contentcontroller/vo3/"){ ?>
<div class="ui-middle-screen5">
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
				<a href='../contentcontroller/Central/' style="font-size: 20px;color: white;"> <span class='icon-play2' style="font-size: 20px;color: white;"></span> Central</a>
</td>
</tr>
</table>
</div>
<?php } ?>


			<div class="footer">
			<span style=" color: white; font-size: 13px;">ADVANCE PACT SDN BHD (412168-v)<br>
Copyright©-2019,  2-3A, Perdana The Place, 1, Jalan PJU 8/5g, Damansara Perdana, 47820 Petaling Jaya, Selangor Darul Ehsan, Malaysia.</span><br/>
			</div>
	