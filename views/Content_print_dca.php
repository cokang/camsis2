<body>
<script type="text/javascript">
function changeColor(elem, cellapo, job, dept, loc, user, monthyear, jobdate)
{
//alert('masuk la dulu');
//var cell = document.getElementById(id);
/*if (user == 'nora'){
	if (elem.className == "icon-green") {
	elem.className = "";
	var color = elem.className
	//window.location.href = "<?php echo site_url('dca_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear;
	//console.log( "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear );
					var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('dca_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear, true);
	        xmlhttp.send();
					//alert(user);
	}
	else{
	elem.className = "icon-green"; 
	var color = elem.className
	//window.location.href = "<?php echo site_url('dca_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear;
					var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('dca_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear, true);
	        xmlhttp.send();
	        		//alert(user);
	}
}*/	
//else{
	if (elem.className == "icon-green") {
	elem.className = "icon-yellow";
	var color = elem.className
	//window.location.href = "<?php echo site_url('dca_planner_sch_ctrl/update_hks');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate;
					var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('dca_planner_sch_ctrl/update_hks');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate, true);
	       	xmlhttp.send();
					//alert('masuk la');
	}else if (elem.className == "icon-yellow") {
	elem.className = "icon-red";
	var color = elem.className
	//window.location.href = "<?php echo site_url('dca_planner_sch_ctrl/update_hks');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate;
					var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('dca_planner_sch_ctrl/update_hks');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate, true);
	        xmlhttp.send();
					//alert('masuk la');
	}
	else if (elem.className == "icon-red") {
	elem.className = "icon-green"; 
	var color = elem.className
	//window.location.href = "<?php echo site_url('dca_planner_sch_ctrl/update_hks');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate;
					var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('dca_planner_sch_ctrl/update_hks');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate, true);
	        xmlhttp.send();
					//alert('masuk la');
	}
//}
//cell.style.background = red;
//cell.style.color = black;
}
function changeNum(elem, cellapo, job, dept, loc, user, monthyear, jobdate, week)
{

	if (document.getElementById (cellapo).innerText == "1") {
	var element = document.getElementById(cellapo);
	element.innerHTML = "2";
	var nocode = element.innerHTML;
	//window.location.href = "<?php echo site_url('dca_planner_sch_ctrl/set_jic');?>??numcode=" + nocode + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate + "&week=" + week;
					var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('dca_planner_sch_ctrl/set_jic');?>?numcode=" + nocode + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate + "&week=" + week, true);
	       	xmlhttp.send();
					//alert('masuk la');
	}else if (document.getElementById (cellapo).innerText == "2") {
	var element = document.getElementById(cellapo);
	element.innerHTML = "3";
	var nocode = element.innerHTML;
	//window.location.href = "<?php echo site_url('dca_planner_sch_ctrl/set_jic');?>?numcode=" + nocode + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate + "&week=" + week;
					var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('dca_planner_sch_ctrl/set_jic');?>?numcode=" + nocode + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate + "&week=" + week, true);
	       	xmlhttp.send();
					//alert('masuk la');
	}
	else if (document.getElementById (cellapo).innerText == "3") {
	var element = document.getElementById(cellapo);
	element.innerHTML = "4";
	var nocode = element.innerHTML;
	//window.location.href = "<?php echo site_url('dca_planner_sch_ctrl/set_jic');?>?numcode=" + nocode + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate + "&week=" + week;
					var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('dca_planner_sch_ctrl/set_jic');?>?numcode=" + nocode + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate + "&week=" + week, true);
	        xmlhttp.send();
					//alert('masuk la');
	}
	else if (document.getElementById (cellapo).innerText == "4") {
	var element = document.getElementById(cellapo);
	element.innerHTML = "5";
	var nocode = element.innerHTML;
	//window.location.href = "<?php echo site_url('dca_planner_sch_ctrl/set_jic');?>?numcode=" + nocode + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate + "&week=" + week;
	        		var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('dca_planner_sch_ctrl/set_jic');?>?numcode=" + nocode + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate + "&week=" + week, true);
	        xmlhttp.send();
					//alert('masuk la');
	}
	else if (document.getElementById (cellapo).innerText == "5") {
	var element = document.getElementById(cellapo);
	element.innerHTML = "";
	var nocode = element.innerHTML;
	//window.location.href = "<?php echo site_url('dca_planner_sch_ctrl/set_jic');?>?numcode=" + nocode + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate + "&week=" + week;
					var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('dca_planner_sch_ctrl/set_jic');?>?numcode=" + nocode + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate + "&week=" + week, true);
	        xmlhttp.send();
					//alert('masuk la');
	}
	else{
	var element = document.getElementById(cellapo);
	element.innerHTML = "1";
	var nocode = element.innerHTML;
	//window.location.href = "<?php echo site_url('dca_planner_sch_ctrl/set_jic');?>?numcode=" + nocode + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate + "&week=" + week;
				var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('dca_planner_sch_ctrl/set_jic');?>?numcode=" + nocode + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate + "&week=" + week, true);
	        xmlhttp.send();
					//alert('masuk la');
	}
//}
//cell.style.background = red;
//cell.style.color = black;
}
</script>

<?php include('language.php'); ?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr"> DAILY CLEANING ACTIVITY </div>
		<!--<button onclick="javascript:myFunction('hks_sch_planner?dept=<?=$this->input->get('dept')?>&loc=<?=$this->input->get('loc')?>&none=closed&pr=1;)" class="btn-button btn-primary-button">PRINT</button>-->
		<button onclick="javascript:myFunctionprint();" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.location.href='contentcontroller/locationlist?parent=asset'">CANCEL</button>
	</div>
	<div class="form">
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;">
			<tr>
				<td style="padding-left:50px; width:160px;"><img src="<?php echo base_url(); ?>images/penmedic2.png" style="width:100px; height:40px;"/></td>
				<td>
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="center"><b>AP HOUSEKEEPING SERVICES </b></td>
						</tr>
						<tr>
							<td align="center"><b>IIUM HOSPITAL</b> </td>
						</tr>
						<tr>
							<td align="center"><b>DAILY CLEANING ACTIVITY </b></td>
						</tr>
					</table>
				</td>
				<!--<td style="padding-left:5px; width:160px;"> 
					<table class="tbl-wo" border="0" align="left">
						<tr>
							<td align="left"> Form No :</td>
						</tr>
						<tr>
							<td align="left"> Version :</td>
						</tr>
						<tr>
							<td align="left"> Date :</td>
						</tr>
					</table>
				</td>-->
				<td style="padding-left:5px; width:160px;"><img src="<?php echo base_url(); ?>images/logo.png" style="width:145px; height:60px;"/></td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="color:black;">
			<tr>
				<td style="width:40%;"><b>PROJEK<span style="font-size:<?=$fonts?>px;">(PROJECT)</span> : </b> IIUM MEDICAL CENTRE, KUANTAN</td>
				<td style="width:30%;"><b>a) No Lokasi<span style="font-size:<?=$fonts?>px;">(Location No)</span : <?= $loc ?></b> </td>
				<td style="width:30%;"><b>c) No Dokumen<span style="font-size:<?=$fonts?>px;">(Document No)</span> : </b></td>
			</tr>
			<tr>
				<td ><b>Jabatan<span style="font-size:<?=$fonts?>px;">(Department)</span> : <?= $dept ?></b></td>
				<td ><b>b) No Dispensi<span style="font-size:<?=$fonts?>px;">(Dispenser No)</span> :  </b> </td>
				<td ><b>d) No Bin<span style="font-size:<?=$fonts?>px;">(Bin No)</span> : </b></td>
			</tr>
			<form method="get" action="">
			<tr>
				<td ><b>Tarikh<span style="font-size:<?=$fonts?>px;">(Date)</span> :  <input type="text" id="date0" name="jobdate" value="<?php echo set_value("jobdate",date("d/m/Y",strtotime($job_D)))?>" style="width:21%;" onchange="this.form.submit()" class="inputdate"/> </b></td>
				<td ><b>No Borang<span style="font-size:<?=$fonts?>px;">(Form No)</span> : </b></td>
				<td ><b>Versi<span style="font-size:<?=$fonts?>px;">(Version)</span> : </b></td>
			</tr>
			<input type="hidden" name="dept" value="<?=$dept?>">
			<input type="hidden" name="loc" value="<?=$loc?>">
		</form>
		</table>
		<div id="Instruction">
			<table width="90%" class="ui-content-middle-menu-desk" style="margin-left:auto; margin-right:auto; border-collapse: collapse;">
						<tr style="background:#B3130A;">
							<td width="3%" height="30px">
							<a href="?dept=<?=$dept?>&loc=<?=$loc?>&y=<?= $year-1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?dept=<?=$dept?>&loc=<?=$loc?>&y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="88%" align="center">
							<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
							<a href="?dept=<?=$dept?>&loc=<?=$loc?>&y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?dept=<?=$dept?>&loc=<?=$loc?>&y=<?= $year+1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
						</tr>
					</table>
		</div>
		<table class="tftabler" border="1" style="text-align:center; width:90%;" align="center">
			<tr>
				<td colspan="4" align="left" width="40%" style="padding-left:5px;">Nama Pekerja <span style="font-size:<?=$fonts?>px;">(Staff Name)</span> : <input type="text" class="inputtext" value="<?php echo set_value('n_equipment_code2'); ?>" name="name_pk"></td>
				<td colspan="3" align="left">&nbsp;</td>
				<td colspan="3" align="left">&nbsp;</td>
				<td colspan="3" align="left">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="4" align="left" style="padding-left:5px;">Waktu Mula Kerja <span style="font-size:<?=$fonts?>px;">(Start Time)</span> : <input type="time" class="inputtext"></td>
				<td colspan="3" align="left">&nbsp;</td>
				<td colspan="3" align="left">&nbsp;</td>
				<td colspan="3" align="left">&nbsp;</td>
			</tr>
			<tr>
				<td colspan="4" align="left" style="padding-left:5px;">Tamat Mula Kerja <span style="font-size:<?=$fonts?>px;">(End Time)</span> : <input type="time" class="inputtext"></td>
				<td colspan="3" align="left">&nbsp;</td>
				<td colspan="3" align="left">&nbsp;</td>
				<td colspan="3" align="left">&nbsp;</td>
			</tr>
			<tr>
				<th colspan="4">SKOP PEMBERSIHAN <span style="font-size:<?=$fonts?>px;">(CLEANSING SCOPE)</span> :</th>
				<th rowspan="2" colspan="3">SYIF 1 <span style="font-size:<?=$fonts?>px;">(SHIFT 1)</span></th>
				<th rowspan="2" colspan="3">SYIF 2 <span style="font-size:<?=$fonts?>px;">(SHIFT 2)</span></th>
				<th rowspan="2" colspan="3">SYIF 3 <span style="font-size:<?=$fonts?>px;">(SHIFT 3)</span></th>
			</tr>
			<tr>
				<th>1</th>
				<th>LANTAI <span style="font-size:<?=$fonts?>px;">(FLOOR)</span></th>
				<th>Aktiviti <span style="font-size:<?=$fonts?>px;">(Activity)</span></th>
				<th>Frekueansi <span style="font-size:<?=$fonts?>px;">(Frequency)</span></th>
			</tr>
			<tr>
				<td>1.1</td>
				<td><img src="<?php echo base_url(); ?>images/dustmop.png" style="width:30px; height:30px;"/></td>
				<td>MOP Habuk <span style="font-size:<?=$fonts?>px;">(Dust Mop)</span></td>
				<td>&nbsp;</td>
				<td style="width:50px;" <?= isset($shift['S1ADust Mop']) ? $shift['S1ADust Mop'] : '' ?>id='S1A' onclick="changeColor(this, 'S1A', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td style="width:50px;" <?= isset($shift['S1BDust Mop']) ? $shift['S1BDust Mop'] : '' ?>id='S1B' onclick="changeColor(this, 'S1B', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td style="width:50px;" <?= isset($shift['S1CDust Mop']) ? $shift['S1CDust Mop'] : '' ?>id='S1C' onclick="changeColor(this, 'S1C', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td style="width:50px;" <?= isset($shift['S2ADust Mop']) ? $shift['S2ADust Mop'] : '' ?>id='S2A' onclick="changeColor(this, 'S2A', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td style="width:50px;" <?= isset($shift['S2BDust Mop']) ? $shift['S2BDust Mop'] : '' ?>id='S2B' onclick="changeColor(this, 'S2B', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td style="width:50px;" <?= isset($shift['S2CDust Mop']) ? $shift['S2CDust Mop'] : '' ?>id='S2C' onclick="changeColor(this, 'S2C', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td style="width:50px;" <?= isset($shift['S3ADust Mop']) ? $shift['S3ADust Mop'] : '' ?>id='S3A' onclick="changeColor(this, 'S3A', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td style="width:50px;" <?= isset($shift['S3BDust Mop']) ? $shift['S3BDust Mop'] : '' ?>id='S3B' onclick="changeColor(this, 'S3B', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td style="width:50px;" <?= isset($shift['S3CDust Mop']) ? $shift['S3CDust Mop'] : '' ?>id='S3C' onclick="changeColor(this, 'S3C', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
			</tr>
			<tr>
				<td>1.2</td>
				<td><img src="<?php echo base_url(); ?>images/dampmop.png" style="width:30px; height:30px;"/></td>
				<td>MOP Lembab <span style="font-size:<?=$fonts?>px;">(Damp Mop)</span></td>
				<td>&nbsp;</td>
				<td <?= isset($shift['S1ADamp Mop']) ? $shift['S1ADamp Mop'] : '' ?>id='S1A' onclick="changeColor(this, 'S1A', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1BDamp Mop']) ? $shift['S1BDamp Mop'] : '' ?>id='S1B' onclick="changeColor(this, 'S1B', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1CDamp Mop']) ? $shift['S1CDamp Mop'] : '' ?>id='S1C' onclick="changeColor(this, 'S1C', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2ADamp Mop']) ? $shift['S2ADamp Mop'] : '' ?>id='S2A' onclick="changeColor(this, 'S2A', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2BDamp Mop']) ? $shift['S2BDamp Mop'] : '' ?>id='S2B' onclick="changeColor(this, 'S2B', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2CDamp Mop']) ? $shift['S2CDamp Mop'] : '' ?>id='S2C' onclick="changeColor(this, 'S2C', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3ADamp Mop']) ? $shift['S3ADamp Mop'] : '' ?>id='S3A' onclick="changeColor(this, 'S3A', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3BDamp Mop']) ? $shift['S3BDamp Mop'] : '' ?>id='S3B' onclick="changeColor(this, 'S3B', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3CDamp Mop']) ? $shift['S3CDamp Mop'] : '' ?>id='S3C' onclick="changeColor(this, 'S3C', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
			</tr>
			<tr>
				<td>1.3</td>
				<td><img src="<?php echo base_url(); ?>images/vakum.png" style="width:30px; height:30px;"/></td>
				<td>Vakum <span style="font-size:<?=$fonts?>px;">(Vacuum)</span></td>
				<td>&nbsp;</td>
				<td <?= isset($shift['S1AVacuum']) ? $shift['S1AVacuum'] : '' ?>id='S1A' onclick="changeColor(this, 'S1A', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1BVacuum']) ? $shift['S1BVacuum'] : '' ?>id='S1B' onclick="changeColor(this, 'S1B', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1CVacuum']) ? $shift['S1CVacuum'] : '' ?>id='S1C' onclick="changeColor(this, 'S1C', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2AVacuum']) ? $shift['S2AVacuum'] : '' ?>id='S2A' onclick="changeColor(this, 'S2A', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2BVacuum']) ? $shift['S2BVacuum'] : '' ?>id='S2B' onclick="changeColor(this, 'S2B', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2CVacuum']) ? $shift['S2CVacuum'] : '' ?>id='S2C' onclick="changeColor(this, 'S2C', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3AVacuum']) ? $shift['S3AVacuum'] : '' ?>id='S3A' onclick="changeColor(this, 'S3A', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3BVacuum']) ? $shift['S3BVacuum'] : '' ?>id='S3B' onclick="changeColor(this, 'S3B', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3CVacuum']) ? $shift['S3CVacuum'] : '' ?>id='S3C' onclick="changeColor(this, 'S3C', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
			</tr>
			<tr>
				<td>1.4</td>
				<td><img src="<?php echo base_url(); ?>images/washing.png" style="width:30px; height:30px;"/></td>
				<td>Mencuci <span style="font-size:<?=$fonts?>px;">(Washing)</span></td>
				<td>&nbsp;</td>
				<td <?= isset($shift['S1AWashing']) ? $shift['S1AWashing'] : '' ?>id='S1A' onclick="changeColor(this, 'S1A', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1BWashing']) ? $shift['S1BWashing'] : '' ?>id='S1B' onclick="changeColor(this, 'S1B', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1CWashing']) ? $shift['S1CWashing'] : '' ?>id='S1C' onclick="changeColor(this, 'S1C', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2AWashing']) ? $shift['S2AWashing'] : '' ?>id='S2A' onclick="changeColor(this, 'S2A', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2BWashing']) ? $shift['S2BWashing'] : '' ?>id='S2B' onclick="changeColor(this, 'S2B', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2CWashing']) ? $shift['S2CWashing'] : '' ?>id='S2C' onclick="changeColor(this, 'S2C', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3AWashing']) ? $shift['S3AWashing'] : '' ?>id='S3A' onclick="changeColor(this, 'S3A', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3BWashing']) ? $shift['S3BWashing'] : '' ?>id='S3B' onclick="changeColor(this, 'S3B', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3CWashing']) ? $shift['S3CWashing'] : '' ?>id='S3C' onclick="changeColor(this, 'S3C', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
			</tr>
			<tr>
				<td>1.5</td>
				<td><img src="<?php echo base_url(); ?>images/sweeping.png" style="width:30px; height:30px;"/></td>
				<td>Menyapu lokasi yang dibenarkan<br /><span style="font-size:<?=$fonts?>px;">(Sweeping authorized location)</span> </td>
				<td>&nbsp;</td>
				<td <?= isset($shift['S1ASweeping']) ? $shift['S1ASweeping'] : '' ?>id='S1A' onclick="changeColor(this, 'S1A', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1BSweeping']) ? $shift['S1BSweeping'] : '' ?>id='S1B' onclick="changeColor(this, 'S1B', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1CSweeping']) ? $shift['S1CSweeping'] : '' ?>id='S1C' onclick="changeColor(this, 'S1C', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2ASweeping']) ? $shift['S2ASweeping'] : '' ?>id='S2A' onclick="changeColor(this, 'S2A', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2BSweeping']) ? $shift['S2BSweeping'] : '' ?>id='S2B' onclick="changeColor(this, 'S2B', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2CSweeping']) ? $shift['S2CSweeping'] : '' ?>id='S2C' onclick="changeColor(this, 'S2C', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3ASweeping']) ? $shift['S3ASweeping'] : '' ?>id='S3A' onclick="changeColor(this, 'S3A', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3BSweeping']) ? $shift['S3BSweeping'] : '' ?>id='S3B' onclick="changeColor(this, 'S3B', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3CSweeping']) ? $shift['S3CSweeping'] : '' ?>id='S3C' onclick="changeColor(this, 'S3C', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
			</tr>
			<tr>
				<th colspan="3">2 PERABOT, PERKAKAS, PERALATAN <br /><span style="font-size:<?=$fonts?>px;">(FURNITURE, FITTING & EQUIPMENT)</span></th>
				<th>Frekueansi <span style="font-size:<?=$fonts?>px;">(Frequency)</span></th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
			<tr>
				<td>2.1</td>
				<td><img src="<?php echo base_url(); ?>images/wiping.png" style="width:30px; height:30px;"/></td>
				<td>Mengelap <span style="font-size:<?=$fonts?>px;">(Wiping)</span> </td>
				<td>&nbsp;</td>
				<td <?= isset($shift['S1AWiping']) ? $shift['S1AWiping'] : '' ?>id='S1A' onclick="changeColor(this, 'S1A', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1BWiping']) ? $shift['S1BWiping'] : '' ?>id='S1B' onclick="changeColor(this, 'S1B', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1CWiping']) ? $shift['S1CWiping'] : '' ?>id='S1C' onclick="changeColor(this, 'S1C', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2AWiping']) ? $shift['S2AWiping'] : '' ?>id='S2A' onclick="changeColor(this, 'S2A', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2BWiping']) ? $shift['S2BWiping'] : '' ?>id='S2B' onclick="changeColor(this, 'S2B', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2CWiping']) ? $shift['S2CWiping'] : '' ?>id='S2C' onclick="changeColor(this, 'S2C', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3AWiping']) ? $shift['S3AWiping'] : '' ?>id='S3A' onclick="changeColor(this, 'S3A', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3BWiping']) ? $shift['S3BWiping'] : '' ?>id='S3B' onclick="changeColor(this, 'S3B', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3CWiping']) ? $shift['S3CWiping'] : '' ?>id='S3C' onclick="changeColor(this, 'S3C', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
			</tr>
			<tr>
				<th colspan="3">3 TANDAS <span style="font-size:<?=$fonts?>px;">(TOILET)</span></th>
				<th>Frekueansi <span style="font-size:<?=$fonts?>px;">(Frequency)</span></th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
			<tr>
				<td>3.1</td>
				<td><img src="<?php echo base_url(); ?>images/washing.png" style="width:30px; height:30px;"/></td>
				<td>Mencuci <span style="font-size:<?=$fonts?>px;">(Washing)</span> </td>
				<td>&nbsp;</td>
				<td <?= isset($shift['S1AToilet Washing']) ? $shift['S1AToilet Washing'] : '' ?>id='S1A' onclick="changeColor(this, 'S1A', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1BToilet Washing']) ? $shift['S1BToilet Washing'] : '' ?>id='S1B' onclick="changeColor(this, 'S1B', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1CToilet Washing']) ? $shift['S1CToilet Washing'] : '' ?>id='S1C' onclick="changeColor(this, 'S1C', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2AToilet Washing']) ? $shift['S2AToilet Washing'] : '' ?>id='S2A' onclick="changeColor(this, 'S2A', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2BToilet Washing']) ? $shift['S2BToilet Washing'] : '' ?>id='S2B' onclick="changeColor(this, 'S2B', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2CToilet Washing']) ? $shift['S2CToilet Washing'] : '' ?>id='S2C' onclick="changeColor(this, 'S2C', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3AToilet Washing']) ? $shift['S3AToilet Washing'] : '' ?>id='S3A' onclick="changeColor(this, 'S3A', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3BToilet Washing']) ? $shift['S3BToilet Washing'] : '' ?>id='S3B' onclick="changeColor(this, 'S3B', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3CToilet Washing']) ? $shift['S3CToilet Washing'] : '' ?>id='S3C' onclick="changeColor(this, 'S3C', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
			</tr>
			<tr>
				<th colspan="3">4 BAHAN PAKAI BUANG <span style="font-size:<?=$fonts?>px;">(CONSUMABLES)</span></th>
				<th>Frekueansi <span style="font-size:<?=$fonts?>px;">(Frequency)</span></th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
			<tr>
				<td>4.1</td>
				<td><img src="<?php echo base_url(); ?>images/pht.png" style="width:30px; height:30px;"/></td>
				<td>Pastikan Tuala Kertas mencukupi<br /> <span style="font-size:<?=$fonts?>px;">(Ensure adequate paper hand towels)</span> </td>
				<td>&nbsp;</td>
				<td <?= isset($shift['S1AHand Towel']) ? $shift['S1AHand Towel'] : '' ?>id='S1A' onclick="changeColor(this, 'S1A', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1BHand Towel']) ? $shift['S1BHand Towel'] : '' ?>id='S1B' onclick="changeColor(this, 'S1B', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1CHand Towel']) ? $shift['S1CHand Towel'] : '' ?>id='S1C' onclick="changeColor(this, 'S1C', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2AHand Towel']) ? $shift['S2AHand Towel'] : '' ?>id='S2A' onclick="changeColor(this, 'S2A', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2BHand Towel']) ? $shift['S2BHand Towel'] : '' ?>id='S2B' onclick="changeColor(this, 'S2B', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2CHand Towel']) ? $shift['S2CHand Towel'] : '' ?>id='S2C' onclick="changeColor(this, 'S2C', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3AHand Towel']) ? $shift['S3AHand Towel'] : '' ?>id='S3A' onclick="changeColor(this, 'S3A', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3BHand Towel']) ? $shift['S3BHand Towel'] : '' ?>id='S3B' onclick="changeColor(this, 'S3B', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3CHand Towel']) ? $shift['S3CHand Towel'] : '' ?>id='S3C' onclick="changeColor(this, 'S3C', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
			</tr>
			<tr>
				<td>4.2</td>
				<td><img src="<?php echo base_url(); ?>images/tjr.png" style="width:30px; height:30px;"/></td>
				<td>Pastikan tisu tandas mencukupi <br /> <span style="font-size:<?=$fonts?>px;">(Ensure adequate toilet jumbo roll)</span> </td>
				<td>&nbsp;</td>
				<td <?= isset($shift['S1AToilet Roll']) ? $shift['S1AToilet Roll'] : '' ?>id='S1A' onclick="changeColor(this, 'S1A', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1BToilet Roll']) ? $shift['S1BToilet Roll'] : '' ?>id='S1B' onclick="changeColor(this, 'S1B', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1CToilet Roll']) ? $shift['S1CToilet Roll'] : '' ?>id='S1C' onclick="changeColor(this, 'S1C', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2AToilet Roll']) ? $shift['S2AToilet Roll'] : '' ?>id='S2A' onclick="changeColor(this, 'S2A', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2BToilet Roll']) ? $shift['S2BToilet Roll'] : '' ?>id='S2B' onclick="changeColor(this, 'S2B', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2CToilet Roll']) ? $shift['S2CToilet Roll'] : '' ?>id='S2C' onclick="changeColor(this, 'S2C', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3AToilet Roll']) ? $shift['S3AToilet Roll'] : '' ?>id='S3A' onclick="changeColor(this, 'S3A', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3BToilet Roll']) ? $shift['S3BToilet Roll'] : '' ?>id='S3B' onclick="changeColor(this, 'S3B', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3CToilet Roll']) ? $shift['S3CToilet Roll'] : '' ?>id='S3C' onclick="changeColor(this, 'S3C', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
			</tr>
			<tr>
				<td>4.3</td>
				<td><img src="<?php echo base_url(); ?>images/handsoap.png" style="width:30px; height:30px;"/></td>
				<td>Pastikan sabun tandas pencuci tangan mencukupi<br /><span style="font-size:<?=$fonts?>px;">(Ensure adequate hand soap)</span> </td>
				<td>&nbsp;</td>
				<td <?= isset($shift['S1AHand Soap']) ? $shift['S1AHand Soap'] : '' ?>id='S1A' onclick="changeColor(this, 'S1A', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1BHand Soap']) ? $shift['S1BHand Soap'] : '' ?>id='S1B' onclick="changeColor(this, 'S1B', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1CHand Soap']) ? $shift['S1CHand Soap'] : '' ?>id='S1C' onclick="changeColor(this, 'S1C', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2AHand Soap']) ? $shift['S2AHand Soap'] : '' ?>id='S2A' onclick="changeColor(this, 'S2A', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2BHand Soap']) ? $shift['S2BHand Soap'] : '' ?>id='S2B' onclick="changeColor(this, 'S2B', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2CHand Soap']) ? $shift['S2CHand Soap'] : '' ?>id='S2C' onclick="changeColor(this, 'S2C', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3AHand Soap']) ? $shift['S3AHand Soap'] : '' ?>id='S3A' onclick="changeColor(this, 'S3A', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3BHand Soap']) ? $shift['S3BHand Soap'] : '' ?>id='S3B' onclick="changeColor(this, 'S3B', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3CHand Soap']) ? $shift['S3CHand Soap'] : '' ?>id='S3C' onclick="changeColor(this, 'S3C', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
			</tr>
			<tr>
				<td>4.4</td>
				<td><img src="<?php echo base_url(); ?>images/deodorisesrs.png" style="width:30px; height:30px;"/></td>
				<td>Pastikan pewangi mencukupi<br /><span style="font-size:<?=$fonts?>px;">(Ensure sufficient deodorisers)</span> </td>
				<td>&nbsp;</td>
				<td <?= isset($shift['S1ADeodorisers']) ? $shift['S1ADeodorisers'] : '' ?>id='S1A' onclick="changeColor(this, 'S1A', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1BDeodorisers']) ? $shift['S1BDeodorisers'] : '' ?>id='S1B' onclick="changeColor(this, 'S1B', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1CDeodorisers']) ? $shift['S1CDeodorisers'] : '' ?>id='S1C' onclick="changeColor(this, 'S1C', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2ADeodorisers']) ? $shift['S2ADeodorisers'] : '' ?>id='S2A' onclick="changeColor(this, 'S2A', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2BDeodorisers']) ? $shift['S2BDeodorisers'] : '' ?>id='S2B' onclick="changeColor(this, 'S2B', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2CDeodorisers']) ? $shift['S2CDeodorisers'] : '' ?>id='S2C' onclick="changeColor(this, 'S2C', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3ADeodorisers']) ? $shift['S3ADeodorisers'] : '' ?>id='S3A' onclick="changeColor(this, 'S3A', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3BDeodorisers']) ? $shift['S3BDeodorisers'] : '' ?>id='S3B' onclick="changeColor(this, 'S3B', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3CDeodorisers']) ? $shift['S3CDeodorisers'] : '' ?>id='S3C' onclick="changeColor(this, 'S3C', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
			</tr>
			<tr>
				<th colspan="3">5 TONG SAMPAH DOMESTIK <span style="font-size:<?=$fonts?>px;">(DOMESTIC BIN)</span></th>
				<th>Frekueansi <span style="font-size:<?=$fonts?>px;">(Frequency)</span></th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
			<tr>
				<td>5.1</td>
				<td><img src="<?php echo base_url(); ?>images/waste.png" style="width:30px; height:30px;"/></td>
				<td>Memungut Sampah <span style="font-size:<?=$fonts?>px;">(Waste Collection)</span> </td>
				<td>&nbsp;</td>
				<td <?= isset($shift['S1AWaste Collection']) ? $shift['S1AWaste Collection'] : '' ?>id='S1A' onclick="changeColor(this, 'S1A', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1BWaste Collection']) ? $shift['S1BWaste Collection'] : '' ?>id='S1B' onclick="changeColor(this, 'S1B', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S1CWaste Collection']) ? $shift['S1CWaste Collection'] : '' ?>id='S1C' onclick="changeColor(this, 'S1C', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2AWaste Collection']) ? $shift['S2AWaste Collection'] : '' ?>id='S2A' onclick="changeColor(this, 'S2A', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2BWaste Collection']) ? $shift['S2BWaste Collection'] : '' ?>id='S2B' onclick="changeColor(this, 'S2B', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S2CWaste Collection']) ? $shift['S2CWaste Collection'] : '' ?>id='S2C' onclick="changeColor(this, 'S2C', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3AWaste Collection']) ? $shift['S3AWaste Collection'] : '' ?>id='S3A' onclick="changeColor(this, 'S3A', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3BWaste Collection']) ? $shift['S3BWaste Collection'] : '' ?>id='S3B' onclick="changeColor(this, 'S3B', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
				<td <?= isset($shift['S3CWaste Collection']) ? $shift['S3CWaste Collection'] : '' ?>id='S3C' onclick="changeColor(this, 'S3C', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')">&nbsp;</td>
			</tr>
			<tr>
				<th colspan="4">6 RUMUSAN <span style="font-size:<?=$fonts?>px;">(SUMMARY)</span></th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
				<th>&nbsp;</th>
			</tr>
			<tr>
				<td colspan="3" align="left" style="padding-left:5px;">Bilangan Pembersihan yang Tidak Dijalankan<br /> <span style="font-size:<?=$fonts?>px;">(No of Cleaning Not Carried Out)</span></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3" align="left" style="padding-left:5px;">Bilangan Pembersihan yang Tidak Mengikut Jadual<br /><span style="font-size:<?=$fonts?>px;">(No of Cleaning Not to Schedule)</span></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td colspan="3" align="left" style="padding-left:5px;">Bilangan Dispensi Kosong<br /><span style="font-size:<?=$fonts?>px;">(No of Empty Dispensers)</span></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<th>7</th>
				<th colspan="3"></th>
				<th colspan="2">&nbsp;</th>
				<th width="7%">QAP CAUSE CODE</th>
				<th colspan="2">&nbsp;</th>
				<th width="7%">QAP CAUSE CODE</th>
				<th colspan="2">&nbsp;</th>
				<th width="7%">QAP CAUSE CODE</th>
			</tr>
			<tr>
				<td colspan="3" align="left" style="padding-left:5px;">Bilangan Pemungutan Sampah yang Tidak Dijalankan<br /><span style="font-size:<?=$fonts?>px;">(No of waste Collection Not Carried Out)</span></td>
				<td></td>
				<td colspan="2"></td>
				<td ></td>
				<td colspan="2"></td>
				<td ></td>
				<td colspan="2"></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="3" align="left" style="padding-left:5px;">Bilangan Pemungutan Sampah yang Tidak Mengikut Jadual<br /><span style="font-size:<?=$fonts?>px;">(No of waste Collection Not to Schedule)</span></td>
				<td></td>
				<td colspan="2"></td>
				<td ></td>
				<td colspan="2"></td>
				<td ></td>
				<td colspan="2"></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="4" align="left" style="padding-left:5px;" height="40px">Disemak oleh Advance Pact Sdn Bhd :<br/> <span style="font-size:<?=$fonts?>px;">(Verified by Advance Pact Sdn Bhd)</span> <br />Nama , Tandatangan & Tarikh<span style="font-size:<?=$fonts?>px;">(Name , Signature , Date)</span></td>
				<td colspan="3" align="left" style="padding-left:5px;" valign="top"> NAMA PENYELIA <span style="font-size:<?=$fonts?>px;">(SUPERVISOR NAME)</span> </td>
				<td colspan="3" align="left" style="padding-left:5px;" valign="top"> NAMA PENYELIA <span style="font-size:<?=$fonts?>px;">(SUPERVISOR NAME)</span> </td>
				<td colspan="3" align="left" style="padding-left:5px;" valign="top"> NAMA PENYELIA <span style="font-size:<?=$fonts?>px;">(SUPERVISOR NAME)</span> </td>
			</tr>
			<tr>
				<td colspan="4" align="left" style="padding-left:5px;" height="40px">Disahkah Oleh Staf Hospital : <span style="font-size:<?=$fonts?>px;">(Verified by Hospital Staff)</span><br />Name , Tandatangan & Tarikh<span style="font-size:<?=$fonts?>px;">(Name , Signature , Date)</span></td>
				<td colspan="3" align="left" style="padding-left:5px;" valign="top"> NAMA STAF HOSPITAL <span style="font-size:<?=$fonts?>px;">(HOSPITAL STAFF NAME)</span> </td>
				<td colspan="3" align="left" style="padding-left:5px;" valign="top"> NAMA STAF HOSPITAL <span style="font-size:<?=$fonts?>px;">(HOSPITAL STAFF NAME)</span> </td>
				<td colspan="3" align="left" style="padding-left:5px;" valign="top"> NAMA STAF HOSPITAL <span style="font-size:<?=$fonts?>px;">(HOSPITAL STAFF NAME)</span> </td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center">
			<tr>
				<td align="left" valign="top" class="ui-td-size">
					<table class="tbl-wo" border="1" align="left" style="width:100%; border: 1px solid black;">
						<tr>
							<td rowspan="3" style="padding-left:5px;">Disemak Oleh<br /><span style="font-size:<?=$fonts?>px;">(Verified By)</span></td>
							<td style="padding:5px;">Tandatangan :<br /><span style="font-size:<?=$fonts?>px;">(Signature)</span></td>
						</tr>
						<tr>
							<td style="padding:5px;">Nama :<br /><span style="font-size:<?=$fonts?>px;">(Name)</span></td>
						</tr>
						<tr>
							<td style="padding:5px;">Tarikh :<br /><span style="font-size:<?=$fonts?>px;">(Date)</span></td>
						</tr>
					</table>
				</td>
				<td align="left" valign="top" style="padding:5px;" class="ui-td-tulis">
					Catatan (References) : <br />
					1) Pada Ruang Syif, tandakan (/) - Kerja yang selesai, (X) - Kerja yang tidak selesai, (TA) - Tiada skop kerja / Tiada dalam jadual<br />(On Shift Column, mark (/) - Work done, (X) - Work not done, (TA) - Not within scope of work / Not Scheduled)<br />
					2) Rumusan - Rekodkan bilangan non-conformance yang paling tinggi daripada ketiga-tiga syif<br />(Summary - Please record the highest non-conformance from the three shift)<br />
					3) Doc No dijanakan oleh sistem jika berlaku 'exception' dan ditulis oleh syarikat konsesi dalam borang berkenaan<br />(Doc No will be generated by the system if 'exception' happen and written by concession on the pertaining form)<br />
					4) Nyata couse code bagi 'Non-comformance' waste collection not done or not schedule<br />(Please indicate couse code for 'Non-conformance' waste collection not done or not schedule)<br />
					5) Nyatakan Waktu Tamat Pungutan di ruang waktu pungutan<br />(Please record waste collection time ended in the collection column)<br />
					6) Rujukan Cause Code : QH7(User), QH8(Manpower), QH9(Equipments/Tools), QH10(Uncontrolled Environment)<br />(Cause Code Reference : QH7(User), QH8(Manpower), QH9(Equipments/Tools), QH10(Uncontrolled Environment))<br />
					7) Borang asal untuk Kontraktor dan salinan untuk hospital<br />(Original form for contractor and copy for hospital)
				</td>
			</tr>
			
		</table>
		<table class="tbl-wo" border="0" align="">
		<td style="" valign="top" align="right"><span style="font-size:7px; padding-left:30px;"><i>Copyright product of Advance Pact Sdn Bhd. All rights reserved.</i></span></td>
		</table>
	</div>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	