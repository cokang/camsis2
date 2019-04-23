<?php $i=6;$r=0;?>
<?php if( $this->uri->slash_segment(1) .$this->uri->slash_segment(2) == "contentcontroller/Store/"){ ?>
<div class="ui-middle-screen6">
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
				<a href='../contentcontroller/content/bems?&tab=0' style="font-size: 20px;color: white;"> <span class='icon-play2' style="font-size: 20px;color: white;"></span> Work Order</a>
<?php } else { ?>
<div class="ui-middle-screen6">
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
				<a href='../contentcontroller/Procurement/' style="font-size: 20px;color: white;"> <span class='icon-play2' style="font-size: 20px;color: white;"></span> Procurement</a>
<?php } ?>
			
</td>
</tr>
</table>
</table>
<table class="table-middle-screen-2" border="0">
<tr><td>
<table class="table-middle-screen-2" border="0">
<tr>
    <td valign="top" style="width: 13%; border-style:none;";>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0"  width="90%" align="center" >
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="11"><b>Please Choose Store</b></td>
			</tr>
			<tr class="ui-color-contents-style-1">
		
			<td colspan="3" class="assets-headear"><?php foreach($hospital as $apa){?>
					<div class="kotak2">

						<!-- bazli edit -->
			
						<?php echo anchor ($this->uri->segment(1).'/'.$this->uri->segment(2).'?id='.$apa->v_HospitalCode,'<center><img src="'. base_url() .'images/hospital.png" alt="" style="width: 50px; height: 50px; padding: 10px;"/><br><span class="caption">&nbsp;&nbsp;'.$apa->v_HospitalCode.'&nbsp;&nbsp;</span></center>'); ?>						
					</div>
			<?php } ?>
					</td>
			</tr>
			  			
	    <tr class="ui-color-contents-style-1" style="height:10px;">
				<td align="center" colspan="4">
				</td>
			</tr>
				
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="4">
				</td>
			</tr>					
		</table>
	</div>	
	</td>
	</tr>
	</table>	
	</td>
	</tr>
	</table>
</div>
