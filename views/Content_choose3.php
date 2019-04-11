<style type="text/css">
 div .tbl{
	width: 100%;
	height: 100%;
	margin-left: 10%;
	/*padding: 50px;*/
}

 div .tbl tr td, div .tbl tr {
	padding-top: 0px;
	padding-left: 50px;
	margin:0px;
	/*border: 1px solid black;*/
	padding-bottom: 50px;
}
div .tbl tr td .con{
	background-color: #EE4000;
	width:200px; 
	text-align: center; 
	font-size:19px
}
div .tbl tr td .con2{
	width: 200px; 
	text-align: center;
}
img {
	height: 110px;
    width: 100px; 
    display:inline-block; 
    margin-top:0px;
}
a {
	font-size: 19px;
}
</style>
<body class="body-screen">
	<div id="parent">
		<div class="ui-left-choose-screen" align="center">
			<div class="try2">
			<div><img style="width: 300px;height: 100px;" src="<?php echo base_url(); ?>images/Myapbesys3.png"/></div>
				<div class="mains">
					<div class="s-left">
						<?php $hidden = array('name' => 'myForm');?>
						<?php echo form_open_multipart('contentcontroller/do_upload',$hidden);?>
							<?php  if (!empty($records_desk)) {?>
								<?php foreach($records_desk as $row):?>
							<div id="yourBtn"><img src="<?php echo base_url().'uploadfile/'?><?= isset($row->file_name) == TRUE ? $row->file_name : 'N/A'?>" name="file_name" title="click to change profile picture" onclick="getFile()"/></div>
								<?php endforeach;?>
							<?php }else { ?>
							<div id="yourBtn"><img src="<?php echo base_url().'images/iconuser.png'?>" name="file_name" title="click to change profile picture" onclick="getFile()"/></div>
							<?php } ?>
							<div style='height: 0px;width: 0px; overflow:hidden;'><input id="upfile" type="file" value="upload" name="userfile" onchange="sub(this)"/></div>
						</form>
					</div>
					<div class="s-middle">
						<div class="smiddlef">
							<b style="color: black; margin-bottom: 30%;"><?php echo $this->session->userdata('v_UserName');?></b>
							<!-- <h5 class="" id="ui-pcys">Please Choose Your Services On The <span class="r-mobile">Right</span><span class="b-mobile">Below</span></h5> -->
							<div align="center"> <?php echo anchor ('logincontroller/logout','<button type="submit" class="btn btn-primary" id="ui-mobile-logout" style="width: 30%; color: red important!;"><span style="color:white;">Logout</span></button>');?></div>
						</div>
					</div>
				</div>
			</div>
			<!-- <div class="try"></div> -->
		</div>
		<?php $urla = $this->input->get('continue') ? $this->input->get('continue') : 'contentcontroller/content'?>
		<?php $urla = str_replace("http://localhost/tutorial/FEMSHospital_v3/index.php/","",$urla)?>
		<?php //echo "nilai url : ".$urla." nilai continue : ".$this->input->get('continue') ?>
		<div class="ui-middle-choose-screen">
		<div class="bg1">
         <table class="tbl">
		     <tr>
		     <td><div class="con2"><img src="<?php echo base_url(); ?>images/icon.png"/></div>
		      <div class="con">NEGERI SEMBILAN</div>
				<?php $injb = array("JLB", "JMP", "KPL", "PDX", "SBN");?>
				<?php foreach($service_apa2 as $row):?>
					<?php if (in_array($row->v_HospitalCode, $injb)) {?>
					<div style="color: black;"><a href="<?php echo base_url();?>index.php/contentcontroller/select?hc=<?=$row->v_HospitalCode?>">
					 <?=$row->v_HospitalName?>
				 </a></div>
			 <?php }?>
				<?php endforeach;?>
		     </td>
		    
		     <td rowspan="2" valign="bottom">
		     <div class="con2"><img src="<?php echo base_url(); ?>images/icon.png"/></div>
		    <div class="con" ">JOHOR</div>
					 <?php $injb = array("HSA", "HSI", "KTG", "KUL", "PER", "SGT", "KLN", "MER", "PON", "BPH", "MUR", "MKJ", "TGK");?>
					 <?php foreach($service_apa2 as $row):?>
						 <?php if (in_array($row->v_HospitalCode, $injb)) {?>
						 <div style="color: black;"><a href="<?php echo base_url();?>index.php/contentcontroller/select?hc=<?=$row->v_HospitalCode?>">
		 					<?=$row->v_HospitalName?>
		 				</a></div>
					<?php }?>
					 <?php endforeach;?>
		     </td>
		     </tr>
		    <tr>
		    <td>
		    <div class="con2" ><img src="<?php echo base_url(); ?>images/icon.png"/></div>
		    <div class="con" ">MELAKA</div>
				<?php $injb = array("AGJ", "JAS", "MKA", "TMP");?>
				<?php foreach($service_apa2 as $row):?>
					<?php if (in_array($row->v_HospitalCode, $injb)) {?>
					<div style="color: black;"><a href="<?php echo base_url();?>index.php/contentcontroller/select?hc=<?=$row->v_HospitalCode?>">
					 <?=$row->v_HospitalName?>
				 </a></div>
			 <?php }?>
				<?php endforeach;?>
		    </td>
		    </tr>
		</table>
			<!-- <div class="try3"></div> -->
		</div>
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
