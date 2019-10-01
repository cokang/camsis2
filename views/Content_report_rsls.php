<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Statutory & License Summary ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){ ?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Statutory & License Summary </div>
    <button onclick="javascript:myFunction('report_rsls?m=<?=$month?>&y=<?=$year?>&none=closed&stat=<?php echo $this->input->get('stat');?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_rsls?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&ex=excel&none=close&stat=<?=$this->input->get('stat');?>&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_rsls?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&pdf=1&stat=<?=$this->input->get('stat');?>&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:40px; height:38px; position:absolute;" title="export to pdf"></a>
	<?php } ?>
	</div>
<?php } ?>
<div class="menu" style="position:relative;">
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>

<div class="m-div">
	<table class="rport-header">
		<tr>
			<td>Statutory & License Summary <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
		</tr>
	</table>
	<table class="tftable" border="1" style="text-align:center;">
		<tr>
			<th>No</th>
			<th>Certificate No</th>
			<th>Agency Code</th>
			<th>License Category Code</th>
			<th>Asset No</th>	
			<th>Location</th>			
			<th>Identification</th>
			<th>Start Date</th>
			<th>Expiry Date</th>
			<th>Grade ID</th>
			<th>Remarks</th>
			<th>Image</th>
		</tr>
		<tr style="text-align:center;">								
			
		</tr>
		<?php $numrow = 1; ?>
		<?php  if (!empty($record2) || !empty($record)) {?>
				<?php  foreach($record2 as $row):?>
					      			
	    				<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
	    					
    		<td><span style="color:#0000FF;"><?= $numrow ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_cert_no) ? $row->v_cert_no : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_authority) ? $row->v_authority : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_authority) ? $row->v_authority : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->V_Tag_no) ? $row->V_Tag_no : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->V_Location_code) ? $row->v_Location_Name.' <br>('.$row->V_Location_code.')' : 'N/A'?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_authority) ? $row->v_authority : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->D_start) ? date("d-m-Y",strtotime($row->D_start)): 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->D_end) ? date("d-m-Y",strtotime($row->D_end)) : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_GradeID) ? $row->v_GradeID : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_Remarks) ? $row->v_Remarks : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><img src="<?php echo base_url(); ?>uploadlicenseimages/No_image_available.jpg" style="width:15px; height:15px;" onclick="javascript:image('<?php echo base_url(); ?>uploadlicenseimages/No_image_available.jpg');"/></span></td>
  
	        			</tr>	
	        			<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php } ?>
			<?php  if (!empty($record) || !empty($record2)) {?>
				<?php  foreach($record as $row):?>
					      			
	    				<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color">' : '<tr>'; ?>
	    					
    		<td><span style="color:#0000FF;"><?= $numrow ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_CertificateNo) ? $row->v_CertificateNo : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_AgencyCode) ? $row->v_AgencyCode : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_LicenseCategoryCode) ? $row->v_LicenseCategoryCode : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_registrationno) ? $row->v_registrationno : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->V_Location_code) ? $row->v_Location_Name.' <br>('.$row->V_Location_code.')' : 'N/A'?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_Identification) ? $row->v_Identification : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_StartDate) ? date("d-m-Y",strtotime($row->v_StartDate)): 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_ExpiryDate) ? date("d-m-Y",strtotime($row->v_ExpiryDate)) : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_GradeID) ? $row->v_GradeID : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><?= ($row->v_Remarks) ? $row->v_Remarks : 'N/A' ?></span></td>
			<td><span style="color:#0000FF;"><img src="<?php echo base_url(); ?>uploadlicenseimages/<?=isset($row->file_name) ? $row->file_name : 'No_image_available.jpg'?>" style="width:15px; height:15px;" onclick="javascript:image('<?php echo base_url(); ?>uploadlicenseimages/<?=isset($row->file_name) ? $row->file_name : 'No_image_available.jpg'?>');"/></span></td>
	        			</tr>	
	        			<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="14"><span style="color:red;">NO COMPLAINT RECORDS FOUND FOR THIS WORK ORDER.</span></td>
	    				</tr>
						<?php } ?>
			

	</table>
	<!-- The Modal -->
	
<?php if( $this->input->get('ex') == ''){?>
	<div id="myModal" class="modal">
	  <span class="close">&times;</span>
	  <img class="modal-content" id="img01">
	  <div id="caption"></div>
	</div>
</div>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Statutory & License Summary <br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>

	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		
	</table>
<?php } ?>
</div>
<style>
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
<script>
var modal = document.getElementById('myModal');
function image(e){
	var modalImg = document.getElementById("img01");
		modal.style.display = "block";
		modalImg.src = e;
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>