<body class="body-screen">
	<div id="parent">
		<div class="ui-left-choose-screen" align="center">
			<div class="try2">
				<div class="mains">
					<div class="s-left">
						<?php $hidden = array('name' => 'myForm');?>
						<?php echo form_open_multipart('contentcontroller/do_upload',$hidden);?>
							<?php  if (!empty($records_desk)) {?> 
								<?php foreach($records_desk as $row):?>
							<div id="yourBtn"><img src="<?php echo base_url().'uploadfile/'?><?= isset($row->file_name) == TRUE ? $row->file_name : 'N/A'?>" name="file_name" title="click to change profile picture" onclick="getFile()"/></div>
								<?php endforeach;?>
							<?php }else { ?>
							<div id="yourBtn"><img src="<?php echo base_url().'images/icon-user.png'?>" name="file_name" title="click to change profile picture" onclick="getFile()"/></div>
							<?php } ?>
							<div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile" type="file" value="upload" name="userfile" onchange="sub(this)"/></div>
						</form>
					</div>
					<div class="s-middle">
						<div class="smiddlef">
							<b><?php echo $this->session->userdata('v_UserName');?></b>
							<h5 class="" id="ui-pcys">Please Choose Your Services On The <span class="r-mobile">Right</span><span class="b-mobile">Below</span></h5>
							<div align="center"> <?php echo anchor ('logincontroller/logout','<button type="submit" class="btn btn-primary" id="ui-mobile-logout" style="width: 50%;"><span style="color:white;">Logout</span></button>');?></div>
						</div>
					</div>
				</div>
			</div>
			<div class="try"></div>
		</div>
		<div class="ui-middle-choose-screen">
			<div class="try4">
				<?php $urla = $this->input->get('continue') ? $this->input->get('continue') : 'contentcontroller/content'?>
				<?php $urla = str_replace("http://localhost/tutorial/FEMSHospital_v3/index.php/","",$urla)?>
				<?php //echo "nilai url : ".$urla." nilai continue : ".$this->input->get('continue') ?>

				<div class="ui-padding">			
					<?php if ($this->input->get('error') == 'true') { ?>

					<div class="alert alert-info">
							<a href="<?php echo base_url(); ?>index.php?/logincontroller/logout" class="btn btn-xs btn-primary1 pull-right">Back to login</a>
						<strong>Info:</strong> Sorry! No hospital assign for this user
					</div>

					<?php } ?>
					<?php if ($this->session->userdata('hosp_code') == 'pilih') {?>
						<?php foreach($service_apa2 as $apa){//echo $apa->v_hospitalcode;?>
					<div class="kotak2">

						<!-- original code -->
						<!-- <?php echo anchor ('contentcontroller/select?hc='.$apa->v_hospitalcode,'<img src="'. base_url() .'images/hospital.png" alt="" class="ui-icon-screen2" /><span class="caption">&nbsp;&nbsp;'.$apa->v_hospitalcode.'&nbsp;&nbsp;</span>'); ?> -->

						<!-- bazli edit -->
						<?php echo anchor ('contentcontroller/select?hc='.$apa->v_hospitalcode,'<center><img src="'. base_url() .'images/hospital.png" alt="" style="width: 50px; height: 50px; padding: 10px;"/><br><span class="caption">&nbsp;&nbsp;'.$apa->v_hospitalcode.'&nbsp;&nbsp;</span></center>'); ?>
					</div>

					<?php };?>
				<?php } else {?>
					<?php foreach($service_apa as $apa){
						if (($apa->v_servicecode=="BES") OR ($apa->v_servicecode=="BEMS")){?>
					<div class="kotak">
						<?php echo anchor ($urla."/".$apa->v_servicecode,'<img src="'. base_url() .'images/biomedical icon.png" alt="" class="ui-icon-screen"/><span class="ui-text-style">'.$apa->service_name.'</span>'); ?>
					</div><?php }  
						if ($apa->v_servicecode=="FES"){?>
					<div class="kotak">
						<?php echo anchor ($urla."/".$apa->v_servicecode, '<img src="'. base_url() .'images/facility icon.png" alt="" class="ui-icon-screen"/><span class="ui-text-style">'.$apa->service_name.'</span>'); ?>
					</div><?php } 
						if ($apa->v_servicecode=="HKS"){?>
					<div class="kotak">
						<?php echo anchor ($urla."/".$apa->v_servicecode, '<img src="'. base_url() .'images/housekeeping icon.png" alt="" class="ui-icon-screen"/><span class="ui-text-style">'.$apa->service_name.'</span>'); ?>
					</div><?php }
						if ($apa->v_servicecode=="LIN"){?>
					<div class="kotak">
						<?php echo anchor ($urla."/".$apa->v_servicecode, '<img src="'. base_url() .'images/linen icon.png" alt="" class="ui-icon-screen"/><span class="ui-text-style">'.$apa->service_name.'</span>'); ?>
					</div><br /><?php } 
						if ($apa->v_servicecode=="CWA"){?>
					<div class="kotak">	
						<?php echo anchor ($urla."/".$apa->v_servicecode, '<img src="'. base_url() .'images/clinical waste icon.png" alt="" class="ui-icon-screen"/><span class="ui-text-style">'.$apa->service_name.'</span>'); ?>
					</div><?php }
						if ($apa->v_servicecode=="SEC"){?>
					<div class="kotak">
						<?php echo anchor ($urla."/".$apa->v_servicecode, '<img src="'. base_url() .'images/security icon.png" alt="" class="ui-icon-screen"/><span class="ui-text-style">'.$apa->service_name.'</span>'); ?>
					</div><?php } 
					};?>	
				<?php } ?>
				</div>
				<div align="center"> <?php echo anchor ('logincontroller/logout','<button type="submit" class="btn btn-primary" id="ui-log" style="width: 100%;"><span style="color:white; font-weight:bold; font-size:20px;">Logout</span></button>');?></div>
			</div>
			<div class="try3"></div>
		</div>
	</div>
	
<script type="text/javascript">
 function getFile(){
 //alert('test');
   document.getElementById("upfile").click();
 }
 function sub(obj){
    var file = obj.value;
    var fileName = file.split("\\");
    document.getElementById("yourBtn").innerHTML = fileName[fileName.length-1];
    document.myForm.submit();
    event.preventDefault();
  }
	
</script>
</body>
</html>