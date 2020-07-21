
<body class="body-screen">
		<div class="ui-middle-screen-ch">
			<table class="table-middle-screen-2" border="0">
			<tr>
			<td style="text-align: center;">
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
						<!-- <?php echo anchor ('contentcontroller/select?hc='.$apa->v_hospitalcode,'<img src="'. base_url() .'images/hosp2.png" alt="" class="ui-icon-screen2" /><span class="caption">&nbsp;&nbsp;'.$apa->v_hospitalcode.'&nbsp;&nbsp;</span>'); ?> -->

						<!-- bazli edit -->
						<?php echo "dfdfd :".$apa->d_run_type."</br>";?>
						<?php if($apa->d_run_type!='O')$hospIcon='hosp2';
						else $hospIcon='hosp-old';
						?>
						<?php echo anchor ('contentcontroller/select?hc='.$apa->v_hospitalcode,'<center><img src="'. base_url() .'images/'.$hospIcon.'.png" alt="" style="width: 50px; height: 50px; padding: 10px;"/><br><span class=>&nbsp;&nbsp;'.$apa->v_hospitalcode.'&nbsp;&nbsp;</span></center>'); ?>
					</div>

					<?php };?>
				<?php } ?>
				</div>
				<div align="center"> <?php echo anchor ('logincontroller/logout','<button type="submit" class="btn btn-primary" id="ui-log" style="width: 100%;"><span style="color:white; font-weight:bold; font-size:20px;">Logout</span></button>');?></div>
			</div>
			<div class="try3"></div>
			</td>
			</tr>
			</table>
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
	window.onload = function () {
		//alert('waklu');
		//toastr.info('It is for your kind information'+'waklu', 'Information', {timeOut: 5000})
		//var url = "index.php/Getinfotoast";
		var url = "<?php echo base_url ('index.php/Getinfotoast') ?>";

var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    var myObj = JSON.parse(this.responseText);
    for (i in myObj)
{
  //alert(myObj[i].data);
  //toastr.info('It is for your kind info : '+myObj[i].data, 'Warning', {timeOut: 15000})
	toastr.info('It is for your kind information '+myObj[i].data+' & idnye ialah :'+myObj[i].id, 'Information', {timeOut: 5000})
}
    //alert('name obj : '+myObj.Volvo);
    //toastr.warning('It is for your kind warning : '+myObj.Volvo, 'Warning', {timeOut: 5000})
  } else {

                        //alert("There was a problem while using XMLHTTP:\n" + xmlhttp.statusText);

                    }
};
xmlhttp.open("GET", url, true);
xmlhttp.send();
	}

</script>
</body>
</html>
