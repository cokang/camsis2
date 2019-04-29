<style type="text/css">
	ul {
    position: relative;
    top: 180px; /*for example purposes only*/
    list-style-type: none;
    margin: 0;
    left: 30%;

}
li {
    position: absolute;
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
		<div class="ui-middle-choose-screen">
		<div class="hospital">
        <ul>
            <li></li>
		   <li><div style="width: 150%; text-align: center;">s</div>

		     </li>
		     <li><div style="width: 50%; text-align: center;"><img src="<?php echo base_url(); ?>images/iconH.png" style=" height: 50px; width: 50px; display:inline-block; margin-top:0px; "/></div>
		       <div style="background-color: #EE4000; width: 50%; text-align: center;">JOHOR BHARU</div>
		    <div style="color: black;">Sultanah Aminah</div>
		     <div style="color: black;">Sultan Ismail</div>
		     <div style="color: black;">Nora Ismail</div>
		     <div style="color: black;">Pakar Sultanah Fatimah</div>
		     <div style="color: black;">Enche Besar Hajjah Khalsom</div>
		     <div style="color: black;">Segamat</div>
		     <div style="color: black;">Permai</div>
		     <div style="color: black;">Makmal Kesihatan Awam</div>
		     <div style="color: black;">Temenggung Seri Maharaja Tun Ibrahim</div>
		     <div style="color: black;">Mersing</div>
		     <div style="color: black;">Pontian</div>
		     <div style="color: black;">Kota Tinggi</div>
		     <div style="color: black;">Tangkak<div>
		     </li>
		   
		     <li>
		    <div style="width:100%; text-align: center;"></div>
		   
		     </li>
		     <li>
		    <div style="width:100%; text-align: center;"><img src="<?php echo base_url(); ?>images/iconH.png" style=" height: 50px; width: 50px; display:inline-block; margin-top:0px;"/></div>
		    <div style="background-color: #EE4000; width: 100%; text-align: center;">MELAKA</div>
		    <div style="color: black;">Melaka</div>
		     <div style="color: black;">Jasin</div>
		     <div style="color: black;">Tampin</div>
		     <div style="color: black;">Alor Gajah</div>
		     </li>
		    <li>
		    <div style="width:100%; text-align: center;"></div>
		    </li>
		     <li>
		    <div style="width: 150%; text-align: center;" ><img src="<?php echo base_url(); ?>images/iconH.png" style=" height: 50px; width: 50px; display:inline-block; margin-top:0px;"/></div>
		    <div style="background-color: #EE4000; width: 150%; text-align: center;">NEGERI SEMBILAN</div>
            <div style="color: black;">Tuanku Jaafar</div>
		     <div style="color: black;">Tuanku Najihah</div>
		     <div style="color: black;">Port Dickson</div>
		     <div style="color: black;">Jempol</div>
		     <div style="color: black;">Jelebu</div>
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