<style type="text/css">
	ul {
    position: relative;
    top: 180px; /*for example purposes only*/
    list-style-type: none;
    margin: 0;
    left: 35%;


}
li {
    position: absolute;
}

a {
	font-size: 19px;
}
</style>
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
		<?php $urla = $this->input->get('continue') ? $this->input->get('continue') : 'contentcontroller/content'?>
		<?php $urla = str_replace("http://localhost/tutorial/FEMSHospital_v3/index.php/","",$urla)?>
		<?php //echo "nilai url : ".$urla." nilai continue : ".$this->input->get('continue') ?>
		<div class="ui-middle-choose-screen">
		<div class="hospital">
        <ul>
            <li></li>
		   <li><div style="width: 150%; text-align: center;">s</div>

		     </li>
		     <li><div style="width: 50%; text-align: center;"><img src="<?php echo base_url(); ?>images/iconH.png" style=" height: 50px; width: 50px; display:inline-block; margin-top:0px; "/></div>
		       <div style="background-color: #EE4000; width: 50%; text-align: center;">JOHOR BHARU</div>
					 <?php $injb = array("HSA", "HSI", "KTG", "KUL", "PER", "SGT", "KLN", "MER", "PON", "BPH", "MUR", "MKJ", "TGK");?>
					 <?php foreach($service_apa2 as $row):?>
						 <?php if (in_array($row->v_HospitalCode, $injb)) {?>
						 <div style="color: black;"><a href="<?php echo base_url();?>index.php/contentcontroller/select?hc=<?=$row->v_HospitalCode?>">
		 					<?=$row->v_HospitalName?>
		 				</a></div>
					<?php }?>
					 <?php endforeach;?>
		     </li>

		     <li>
		    <div style="width:100%; text-align: center;"></div>

		     </li>
		     <li>
		    <div style="width:100%; text-align: center;"><img src="<?php echo base_url(); ?>images/iconH.png" style=" height: 50px; width: 50px; display:inline-block; margin-top:0px;"/></div>
		    <div style="background-color: #EE4000; width: 100%; text-align: center;">MELAKA</div>
				<?php $injb = array("AGJ", "JAS", "MKA", "TMP");?>
				<?php foreach($service_apa2 as $row):?>
					<?php if (in_array($row->v_HospitalCode, $injb)) {?>
					<div style="color: black;"><a href="<?php echo base_url();?>index.php/contentcontroller/select?hc=<?=$row->v_HospitalCode?>">
					 <?=$row->v_HospitalName?>
				 </a></div>
			 <?php }?>
				<?php endforeach;?>
		     </li>
		    <li>
		    <div style="width:100%; text-align: center;"></div>
		    </li>
		     <li>
		    <div style="width: 150%; text-align: center;" ><img src="<?php echo base_url(); ?>images/iconH.png" style=" height: 50px; width: 50px; display:inline-block; margin-top:0px;"/></div>
		    <div style="background-color: #EE4000; width: 100%; text-align: center;">NEGERI SEMBILAN</div>
				<?php $injb = array("JLB", "JMP", "KPL", "PDX", "SBN");?>
				<?php foreach($service_apa2 as $row):?>
					<?php if (in_array($row->v_HospitalCode, $injb)) {?>
					<div style="color: black;"><a href="<?php echo base_url();?>index.php/contentcontroller/select?hc=<?=$row->v_HospitalCode?>">
					 <?=$row->v_HospitalName?>
				 </a></div>
			 <?php }?>
				<?php endforeach;?>
		    </li>
		</ul>
			<div class="try3"></div>
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

  var type = 1, //circle type - 1 whole, 0.5 half, 0.25 quarter
    radius = '15em', //distance from center
    start = -90, //shift start from 0
    $elements = $('li:not(:first-child)'),
    numberOfElements = (type === 1) ?  $elements.length : $elements.length - 1, //adj for even distro of elements when not full circle
    slice = 360 * type / numberOfElements;

	$elements.each(function(i) {
    var $self = $(this),
        rotate = slice * i + start,
        rotateReverse = rotate * -1;

    $self.css({
        'transform': 'rotate(' + rotate + 'deg) translate(' + radius + ') rotate(' + rotateReverse + 'deg)'
    });
});

</script>
</body>
</html>
