<body>
<script type="text/javascript">
function changeColor(elem, cellapo, job, dept, loc, user, monthyear, jobdate)
{
//alert('masuk la dulu');
//var cell = document.getElementById(id);
	/*if (elem.style.backgroundColor == "green") {
	elem.style.backgroundColor = "yellow";
	var color = elem.style.backgroundColor
	//window.location.href = "<?php echo site_url('Scheduler/test_schdule2');?>?id="+cellapo;
					var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job, true);
	        xmlhttp.send();
					//alert(user);
	}else if (elem.style.backgroundColor == "yellow") {
	elem.style.backgroundColor = "red";	
	var color = elem.style.backgroundColor
	//window.location.href = "<?php echo site_url('Scheduler/test_schdule2');?>?id="+cellapo;
					var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job, true);
	        xmlhttp.send();
					//alert(user);
	}
	else if (elem.style.backgroundColor == "red") {
	elem.style.backgroundColor = "green"; 
	var color = elem.style.backgroundColor
	//window.location.href = "<?php echo site_url('Scheduler/test_schdule2');?>?id="+cellapo;
					var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job, true);
	        xmlhttp.send();
					//alert(user);
	}*/
	if (elem.className == "icon-green") {
	elem.className = "";
	var color = elem.className
	//alert(color);
	//window.location.href = "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate;
	//console.log( "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear );
					var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate, true);
	        xmlhttp.send();
					//alert(dept);
	}
	else{
	elem.className = "icon-green"; 
	var color = elem.className
	//alert(color);
	//window.location.href = "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate;
					var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear + "&date=" + jobdate, true);
	        xmlhttp.send();
	}
//cell.style.background = red;
//cell.style.color = black;
}
</script>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr"> Housekeeping Services </div>
		<button onclick="myFunctionprint()" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.location.href='contentcontroller/locationlist?parent=asset'">CANCEL</button>
	</div>
	<div class="form">
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;">
			<tr>
				<td style="padding-left:0px; width:120px;" align="center"><img src="<?php echo base_url(); ?>images/penmedic2.png" style="width:100px; height:30px;"/></td>
				<td>
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="center"><b>AP HOUSEKEEPING SERVICES </b></td>
						</tr>
						<tr>
							<td align="center"><b>IIUM HOSPITAL</b> </td>
						</tr>
						<tr>
							<td align="center"><b>DAILY CLEANSING ACTIVITIES PLANNER</b></td>
						</tr>
					</table>
				</td>
				<!--<td style="padding-left:5px; width:190px;"> 
					<table class="tbl-wo" border="0" align="left">
						<tr>
							<td align="left"> Form No :</td>
						</tr>
						<tr>
							<td align="left"> Version : <div id="alert"></div></td>
						</tr>
						<form method="get" action=""><!--<form action="index.php" method="POST" id="myform">
						<tr>
							<td align="left"><span style="display:inline-block;"> Date : </span><input type="date" name="jobdate" id="myDate" value="<?php echo set_value("jobdate",$job_D)?>" style="width:80%; display:inline-block;" onchange="this.form.submit()"/></td>
						</tr>
						<input type="hidden" name="dept" value="<?=$dept?>">
  						<input type="hidden" name="loc" value="<?=$loc?>">
						</form>
					</table>
				</td>-->
				<td style="padding-left:0px; width:120px;" align="center"><img src="<?php echo base_url(); ?>images/logo.png" style="width:100px; height:40px;"/></td>
			</tr>
		</table>
	<div class="form">
		<table class="tbl-wo" border="0" align="center" style="font-weight:bold;">
			<tr height="50px">
				<td style="padding-left:10px;" Colspan="2"><b>PROJECT : IIUM TEACHING HOSPITAL, KUANTAN</b></td>
				<form method="get" action="">
				<td style="padding-left:10px; width:200px;" align="right"><span style="display:inline-block;"> Date : </span><input type="date" name="jobdate" id="myDate" value="<?php echo set_value("jobdate",$job_D)?>" style="width:80%; display:inline-block;" onchange="this.form.submit()"/>
				<input type="hidden" name="dept" value="<?=$dept?>">
  				<input type="hidden" name="loc" value="<?=$loc?>">
				</form>
				</td>
			</tr>
			<tr height="30px">
				<td style="padding-left:10px;"><b>User Department : <?= $loc ?></b></td>
				<td style="padding-left:10px;">Department Code: <?= $dept ?></td>
				<td style="padding-left:10px;">Month : <?= date('F', mktime(0, 0, 0, $month, 10)) ?> <?=$year?></td>
			</tr>
		</table>
	</div>
	<div id="Instruction">
			<table class="tbl-wo" border="0" align="center" style="font-weight:bold;">
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
	<table class="tftable2" border="1" style="text-align:center;" align="center">
		 <tr class="greyii">
		    <th rowspan="2" class="td-r">Job Items</th>
		    <th colspan="24" class="td-r" style="">Time</th>
		  </tr>
		  <tr class="greyii">
		    <th class="td-r">0-1</th>
		    <th class="td-r">1-2</th>
		    <th class="td-r">2-3</th>
		    <th class="td-r">3-4</th>
		    <th class="td-r">4-5</th>
		    <th class="td-r">5-6</th>
		    <th class="td-r">6-7</th>
		    <th class="td-r">7-8</th>
		    <th class="td-r">8-9</th>
		    <th class="td-r">9-10</th>
		    <th class="td-r">10-11</th>
		    <th class="td-r">11-12</th>
		    <th class="td-r">12-13</th>
		    <th class="td-r">13-14</th>
		    <th class="td-r">14-15</th>
		    <th class="td-r">15-16</th>
		    <th class="td-r">16-17</th>
		    <th class="td-r">17-18</th>
		    <th class="td-r">18-19</th>
		    <th class="td-r">19-20</th>
		    <th class="td-r">20-21</th>
		    <th class="td-r">21-22</th>
		    <th class="td-r">22-23</th>
		    <th class="td-r">23-24</th>
		  </tr>
			<tr>
				<td>Dust Mop</td>
				<td <?= isset($time['0-1Dust Mop']) ? $time['0-1Dust Mop'] : '' ?>id='0-1' onclick="changeColor(this, '0-1', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['1-2Dust Mop']) ? $time['1-2Dust Mop'] : '' ?>id='1-2' onclick="changeColor(this, '1-2', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['2-3Dust Mop']) ? $time['2-3Dust Mop'] : '' ?>id='2-3' onclick="changeColor(this, '2-3', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['3-4Dust Mop']) ? $time['3-4Dust Mop'] : '' ?>id='3-4' onclick="changeColor(this, '3-4', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['4-5Dust Mop']) ? $time['4-5Dust Mop'] : '' ?>id='4-5' onclick="changeColor(this, '4-5', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['5-6Dust Mop']) ? $time['5-6Dust Mop'] : '' ?>id='5-6' onclick="changeColor(this, '5-6', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['6-7Dust Mop']) ? $time['6-7Dust Mop'] : '' ?>id='6-7' onclick="changeColor(this, '6-7', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['7-8Dust Mop']) ? $time['7-8Dust Mop'] : '' ?>id='7-8' onclick="changeColor(this, '7-8', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['8-9Dust Mop']) ? $time['8-9Dust Mop'] : '' ?>id='8-9' onclick="changeColor(this, '8-9', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['9-10Dust Mop']) ? $time['9-10Dust Mop'] : '' ?>id='9-10' onclick="changeColor(this, '9-10', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['10-11Dust Mop']) ? $time['10-11Dust Mop'] : '' ?>id='10-11' onclick="changeColor(this, '10-11', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['11-12Dust Mop']) ? $time['11-12Dust Mop'] : '' ?>id='11-12' onclick="changeColor(this, '11-12', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['12-13Dust Mop']) ? $time['12-13Dust Mop'] : '' ?>id='12-13' onclick="changeColor(this, '12-13', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['13-14Dust Mop']) ? $time['13-14Dust Mop'] : '' ?>id='13-14' onclick="changeColor(this, '13-14', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['14-15Dust Mop']) ? $time['14-15Dust Mop'] : '' ?>id='14-15' onclick="changeColor(this, '14-15', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['15-16Dust Mop']) ? $time['15-16Dust Mop'] : '' ?>id='15-16' onclick="changeColor(this, '15-16', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['16-17Dust Mop']) ? $time['16-17Dust Mop'] : '' ?>id='16-17' onclick="changeColor(this, '16-17', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['17-18Dust Mop']) ? $time['17-18Dust Mop'] : '' ?>id='17-18' onclick="changeColor(this, '17-18', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['18-19Dust Mop']) ? $time['18-19Dust Mop'] : '' ?>id='18-19' onclick="changeColor(this, '18-19', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['19-20Dust Mop']) ? $time['19-20Dust Mop'] : '' ?>id='19-20' onclick="changeColor(this, '19-20', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['20-21Dust Mop']) ? $time['20-21Dust Mop'] : '' ?>id='20-21' onclick="changeColor(this, '20-21', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['21-22Dust Mop']) ? $time['21-22Dust Mop'] : '' ?>id='21-22' onclick="changeColor(this, '21-22', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['22-23Dust Mop']) ? $time['22-23Dust Mop'] : '' ?>id='22-23' onclick="changeColor(this, '22-23', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['23-24Dust Mop']) ? $time['23-24Dust Mop'] : '' ?>id='23-24' onclick="changeColor(this, '23-24', 'Dust Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
			</tr>
			<tr>
				<td>Damp Mop</td>
				<td <?= isset($time['0-1Damp Mop']) ? $time['0-1Damp Mop'] : '' ?>id='0-1' onclick="changeColor(this, '0-1', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['1-2Damp Mop']) ? $time['1-2Damp Mop'] : '' ?>id='1-2' onclick="changeColor(this, '1-2', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['2-3Damp Mop']) ? $time['2-3Damp Mop'] : '' ?>id='2-3' onclick="changeColor(this, '2-3', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['3-4Damp Mop']) ? $time['3-4Damp Mop'] : '' ?>id='3-4' onclick="changeColor(this, '3-4', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['4-5Damp Mop']) ? $time['4-5Damp Mop'] : '' ?>id='4-5' onclick="changeColor(this, '4-5', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['5-6Damp Mop']) ? $time['5-6Damp Mop'] : '' ?>id='5-6' onclick="changeColor(this, '5-6', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['6-7Damp Mop']) ? $time['6-7Damp Mop'] : '' ?>id='6-7' onclick="changeColor(this, '6-7', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['7-8Damp Mop']) ? $time['7-8Damp Mop'] : '' ?>id='7-8' onclick="changeColor(this, '7-8', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['8-9Damp Mop']) ? $time['8-9Damp Mop'] : '' ?>id='8-9' onclick="changeColor(this, '8-9', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['9-10Damp Mop']) ? $time['9-10Damp Mop'] : '' ?>id='9-10' onclick="changeColor(this, '9-10', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['10-11Damp Mop']) ? $time['10-11Damp Mop'] : '' ?>id='10-11' onclick="changeColor(this, '10-11', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['11-12Damp Mop']) ? $time['11-12Damp Mop'] : '' ?>id='11-12' onclick="changeColor(this, '11-12', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['12-13Damp Mop']) ? $time['12-13Damp Mop'] : '' ?>id='12-13' onclick="changeColor(this, '12-13', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['13-14Damp Mop']) ? $time['13-14Damp Mop'] : '' ?>id='13-14' onclick="changeColor(this, '13-14', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['14-15Damp Mop']) ? $time['14-15Damp Mop'] : '' ?>id='14-15' onclick="changeColor(this, '14-15', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['15-16Damp Mop']) ? $time['15-16Damp Mop'] : '' ?>id='15-16' onclick="changeColor(this, '15-16', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['16-17Damp Mop']) ? $time['16-17Damp Mop'] : '' ?>id='16-17' onclick="changeColor(this, '16-17', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['17-18Damp Mop']) ? $time['17-18Damp Mop'] : '' ?>id='17-18' onclick="changeColor(this, '17-18', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['18-19Damp Mop']) ? $time['18-19Damp Mop'] : '' ?>id='18-19' onclick="changeColor(this, '18-19', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['19-20Damp Mop']) ? $time['19-20Damp Mop'] : '' ?>id='19-20' onclick="changeColor(this, '19-20', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['20-21Damp Mop']) ? $time['20-21Damp Mop'] : '' ?>id='20-21' onclick="changeColor(this, '20-21', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['21-22Damp Mop']) ? $time['21-22Damp Mop'] : '' ?>id='21-22' onclick="changeColor(this, '21-22', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['22-23Damp Mop']) ? $time['22-23Damp Mop'] : '' ?>id='22-23' onclick="changeColor(this, '22-23', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['23-24Damp Mop']) ? $time['23-24Damp Mop'] : '' ?>id='23-24' onclick="changeColor(this, '23-24', 'Damp Mop', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
			</tr>
			<tr>
				<td>Vacuum <br />(RAW / PEM)</td>
				<td <?= isset($time['0-1Vacuum']) ? $time['0-1Vacuum'] : '' ?>id='0-1' onclick="changeColor(this, '0-1', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['1-2Vacuum']) ? $time['1-2Vacuum'] : '' ?>id='1-2' onclick="changeColor(this, '1-2', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['2-3Vacuum']) ? $time['2-3Vacuum'] : '' ?>id='2-3' onclick="changeColor(this, '2-3', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['3-4Vacuum']) ? $time['3-4Vacuum'] : '' ?>id='3-4' onclick="changeColor(this, '3-4', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['4-5Vacuum']) ? $time['4-5Vacuum'] : '' ?>id='4-5' onclick="changeColor(this, '4-5', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['5-6Vacuum']) ? $time['5-6Vacuum'] : '' ?>id='5-6' onclick="changeColor(this, '5-6', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['6-7Vacuum']) ? $time['6-7Vacuum'] : '' ?>id='6-7' onclick="changeColor(this, '6-7', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['7-8Vacuum']) ? $time['7-8Vacuum'] : '' ?>id='7-8' onclick="changeColor(this, '7-8', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['8-9Vacuum']) ? $time['8-9Vacuum'] : '' ?>id='8-9' onclick="changeColor(this, '8-9', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['9-10Vacuum']) ? $time['9-10Vacuum'] : '' ?>id='9-10' onclick="changeColor(this, '9-10', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['10-11Vacuum']) ? $time['10-11Vacuum'] : '' ?>id='10-11' onclick="changeColor(this, '10-11', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['11-12Vacuum']) ? $time['11-12Vacuum'] : '' ?>id='11-12' onclick="changeColor(this, '11-12', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['12-13Vacuum']) ? $time['12-13Vacuum'] : '' ?>id='12-13' onclick="changeColor(this, '12-13', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['13-14Vacuum']) ? $time['13-14Vacuum'] : '' ?>id='13-14' onclick="changeColor(this, '13-14', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['14-15Vacuum']) ? $time['14-15Vacuum'] : '' ?>id='14-15' onclick="changeColor(this, '14-15', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['15-16Vacuum']) ? $time['15-16Vacuum'] : '' ?>id='15-16' onclick="changeColor(this, '15-16', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['16-17Vacuum']) ? $time['16-17Vacuum'] : '' ?>id='16-17' onclick="changeColor(this, '16-17', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['17-18Vacuum']) ? $time['17-18Vacuum'] : '' ?>id='17-18' onclick="changeColor(this, '17-18', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['18-19Vacuum']) ? $time['18-19Vacuum'] : '' ?>id='18-19' onclick="changeColor(this, '18-19', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['19-20Vacuum']) ? $time['19-20Vacuum'] : '' ?>id='19-20' onclick="changeColor(this, '19-20', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['20-21Vacuum']) ? $time['20-21Vacuum'] : '' ?>id='20-21' onclick="changeColor(this, '20-21', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['21-22Vacuum']) ? $time['21-22Vacuum'] : '' ?>id='21-22' onclick="changeColor(this, '21-22', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['22-23Vacuum']) ? $time['22-23Vacuum'] : '' ?>id='22-23' onclick="changeColor(this, '22-23', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['23-24Vacuum']) ? $time['23-24Vacuum'] : '' ?>id='23-24' onclick="changeColor(this, '23-24', 'Vacuum', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
			</tr>
			<tr>
				<td>Washing</td>
				<td <?= isset($time['0-1Washing']) ? $time['0-1Washing'] : '' ?>id='0-1' onclick="changeColor(this, '0-1', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['1-2Washing']) ? $time['1-2Washing'] : '' ?>id='1-2' onclick="changeColor(this, '1-2', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['2-3Washing']) ? $time['2-3Washing'] : '' ?>id='2-3' onclick="changeColor(this, '2-3', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['3-4Washing']) ? $time['3-4Washing'] : '' ?>id='3-4' onclick="changeColor(this, '3-4', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['4-5Washing']) ? $time['4-5Washing'] : '' ?>id='4-5' onclick="changeColor(this, '4-5', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['5-6Washing']) ? $time['5-6Washing'] : '' ?>id='5-6' onclick="changeColor(this, '5-6', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['6-7Washing']) ? $time['6-7Washing'] : '' ?>id='6-7' onclick="changeColor(this, '6-7', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['7-8Washing']) ? $time['7-8Washing'] : '' ?>id='7-8' onclick="changeColor(this, '7-8', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['8-9Washing']) ? $time['8-9Washing'] : '' ?>id='8-9' onclick="changeColor(this, '8-9', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['9-10Washing']) ? $time['9-10Washing'] : '' ?>id='9-10' onclick="changeColor(this, '9-10', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['10-11Washing']) ? $time['10-11Washing'] : '' ?>id='10-11' onclick="changeColor(this, '10-11', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['11-12Washing']) ? $time['11-12Washing'] : '' ?>id='11-12' onclick="changeColor(this, '11-12', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['12-13Washing']) ? $time['12-13Washing'] : '' ?>id='12-13' onclick="changeColor(this, '12-13', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['13-14Washing']) ? $time['13-14Washing'] : '' ?>id='13-14' onclick="changeColor(this, '13-14', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['14-15Washing']) ? $time['14-15Washing'] : '' ?>id='14-15' onclick="changeColor(this, '14-15', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['15-16Washing']) ? $time['15-16Washing'] : '' ?>id='15-16' onclick="changeColor(this, '15-16', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['16-17Washing']) ? $time['16-17Washing'] : '' ?>id='16-17' onclick="changeColor(this, '16-17', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['17-18Washing']) ? $time['17-18Washing'] : '' ?>id='17-18' onclick="changeColor(this, '17-18', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['18-19Washing']) ? $time['18-19Washing'] : '' ?>id='18-19' onclick="changeColor(this, '18-19', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['19-20Washing']) ? $time['19-20Washing'] : '' ?>id='19-20' onclick="changeColor(this, '19-20', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['20-21Washing']) ? $time['20-21Washing'] : '' ?>id='20-21' onclick="changeColor(this, '20-21', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['21-22Washing']) ? $time['21-22Washing'] : '' ?>id='21-22' onclick="changeColor(this, '21-22', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['22-23Washing']) ? $time['22-23Washing'] : '' ?>id='22-23' onclick="changeColor(this, '22-23', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['23-24Washing']) ? $time['23-24Washing'] : '' ?>id='23-24' onclick="changeColor(this, '23-24', 'Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
			</tr>
			<tr>
				<td>Sweeping</td>
				<td <?= isset($time['0-1Sweeping']) ? $time['0-1Sweeping'] : '' ?>id='0-1' onclick="changeColor(this, '0-1', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['1-2Sweeping']) ? $time['1-2Sweeping'] : '' ?>id='1-2' onclick="changeColor(this, '1-2', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['2-3Sweeping']) ? $time['2-3Sweeping'] : '' ?>id='2-3' onclick="changeColor(this, '2-3', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['3-4Sweeping']) ? $time['3-4Sweeping'] : '' ?>id='3-4' onclick="changeColor(this, '3-4', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['4-5Sweeping']) ? $time['4-5Sweeping'] : '' ?>id='4-5' onclick="changeColor(this, '4-5', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['5-6Sweeping']) ? $time['5-6Sweeping'] : '' ?>id='5-6' onclick="changeColor(this, '5-6', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['6-7Sweeping']) ? $time['6-7Sweeping'] : '' ?>id='6-7' onclick="changeColor(this, '6-7', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['7-8Sweeping']) ? $time['7-8Sweeping'] : '' ?>id='7-8' onclick="changeColor(this, '7-8', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['8-9Sweeping']) ? $time['8-9Sweeping'] : '' ?>id='8-9' onclick="changeColor(this, '8-9', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['9-10Sweeping']) ? $time['9-10Sweeping'] : '' ?>id='9-10' onclick="changeColor(this, '9-10', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['10-11Sweeping']) ? $time['10-11Sweeping'] : '' ?>id='10-11' onclick="changeColor(this, '10-11', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['11-12Sweeping']) ? $time['11-12Sweeping'] : '' ?>id='11-12' onclick="changeColor(this, '11-12', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['12-13Sweeping']) ? $time['12-13Sweeping'] : '' ?>id='12-13' onclick="changeColor(this, '12-13', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['13-14Sweeping']) ? $time['13-14Sweeping'] : '' ?>id='13-14' onclick="changeColor(this, '13-14', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['14-15Sweeping']) ? $time['14-15Sweeping'] : '' ?>id='14-15' onclick="changeColor(this, '14-15', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['15-16Sweeping']) ? $time['15-16Sweeping'] : '' ?>id='15-16' onclick="changeColor(this, '15-16', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['16-17Sweeping']) ? $time['16-17Sweeping'] : '' ?>id='16-17' onclick="changeColor(this, '16-17', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['17-18Sweeping']) ? $time['17-18Sweeping'] : '' ?>id='17-18' onclick="changeColor(this, '17-18', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['18-19Sweeping']) ? $time['18-19Sweeping'] : '' ?>id='18-19' onclick="changeColor(this, '18-19', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['19-20Sweeping']) ? $time['19-20Sweeping'] : '' ?>id='19-20' onclick="changeColor(this, '19-20', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['20-21Sweeping']) ? $time['20-21Sweeping'] : '' ?>id='20-21' onclick="changeColor(this, '20-21', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['21-22Sweeping']) ? $time['21-22Sweeping'] : '' ?>id='21-22' onclick="changeColor(this, '21-22', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['22-23Sweeping']) ? $time['22-23Sweeping'] : '' ?>id='22-23' onclick="changeColor(this, '22-23', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['23-24Sweeping']) ? $time['23-24Sweeping'] : '' ?>id='23-24' onclick="changeColor(this, '23-24', 'Sweeping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
			</tr>
			<tr>
				<td>Wiping<br /> (Furniture <br />&<br /> Fitting)</td>
				<td <?= isset($time['0-1Wiping']) ? $time['0-1Wiping'] : '' ?>id='0-1' onclick="changeColor(this, '0-1', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['1-2Wiping']) ? $time['1-2Wiping'] : '' ?>id='1-2' onclick="changeColor(this, '1-2', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['2-3Wiping']) ? $time['2-3Wiping'] : '' ?>id='2-3' onclick="changeColor(this, '2-3', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['3-4Wiping']) ? $time['3-4Wiping'] : '' ?>id='3-4' onclick="changeColor(this, '3-4', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['4-5Wiping']) ? $time['4-5Wiping'] : '' ?>id='4-5' onclick="changeColor(this, '4-5', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['5-6Wiping']) ? $time['5-6Wiping'] : '' ?>id='5-6' onclick="changeColor(this, '5-6', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['6-7Wiping']) ? $time['6-7Wiping'] : '' ?>id='6-7' onclick="changeColor(this, '6-7', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['7-8Wiping']) ? $time['7-8Wiping'] : '' ?>id='7-8' onclick="changeColor(this, '7-8', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['8-9Wiping']) ? $time['8-9Wiping'] : '' ?>id='8-9' onclick="changeColor(this, '8-9', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['9-10Wiping']) ? $time['9-10Wiping'] : '' ?>id='9-10' onclick="changeColor(this, '9-10', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['10-11Wiping']) ? $time['10-11Wiping'] : '' ?>id='10-11' onclick="changeColor(this, '10-11', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['11-12Wiping']) ? $time['11-12Wiping'] : '' ?>id='11-12' onclick="changeColor(this, '11-12', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['12-13Wiping']) ? $time['12-13Wiping'] : '' ?>id='12-13' onclick="changeColor(this, '12-13', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['13-14Wiping']) ? $time['13-14Wiping'] : '' ?>id='13-14' onclick="changeColor(this, '13-14', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['14-15Wiping']) ? $time['14-15Wiping'] : '' ?>id='14-15' onclick="changeColor(this, '14-15', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['15-16Wiping']) ? $time['15-16Wiping'] : '' ?>id='15-16' onclick="changeColor(this, '15-16', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['16-17Wiping']) ? $time['16-17Wiping'] : '' ?>id='16-17' onclick="changeColor(this, '16-17', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['17-18Wiping']) ? $time['17-18Wiping'] : '' ?>id='17-18' onclick="changeColor(this, '17-18', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['18-19Wiping']) ? $time['18-19Wiping'] : '' ?>id='18-19' onclick="changeColor(this, '18-19', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['19-20Wiping']) ? $time['19-20Wiping'] : '' ?>id='19-20' onclick="changeColor(this, '19-20', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['20-21Wiping']) ? $time['20-21Wiping'] : '' ?>id='20-21' onclick="changeColor(this, '20-21', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['21-22Wiping']) ? $time['21-22Wiping'] : '' ?>id='21-22' onclick="changeColor(this, '21-22', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['22-23Wiping']) ? $time['22-23Wiping'] : '' ?>id='22-23' onclick="changeColor(this, '22-23', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['23-24Wiping']) ? $time['23-24Wiping'] : '' ?>id='23-24' onclick="changeColor(this, '23-24', 'Wiping', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
			</tr>
			<tr>
				<td>Toilet Washing</td>
				<td <?= isset($time['0-1Toilet Washing']) ? $time['0-1Toilet Washing'] : '' ?>id='0-1' onclick="changeColor(this, '0-1', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['1-2Toilet Washing']) ? $time['1-2Toilet Washing'] : '' ?>id='1-2' onclick="changeColor(this, '1-2', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['2-3Toilet Washing']) ? $time['2-3Toilet Washing'] : '' ?>id='2-3' onclick="changeColor(this, '2-3', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['3-4Toilet Washing']) ? $time['3-4Toilet Washing'] : '' ?>id='3-4' onclick="changeColor(this, '3-4', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['4-5Toilet Washing']) ? $time['4-5Toilet Washing'] : '' ?>id='4-5' onclick="changeColor(this, '4-5', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['5-6Toilet Washing']) ? $time['5-6Toilet Washing'] : '' ?>id='5-6' onclick="changeColor(this, '5-6', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['6-7Toilet Washing']) ? $time['6-7Toilet Washing'] : '' ?>id='6-7' onclick="changeColor(this, '6-7', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['7-8Toilet Washing']) ? $time['7-8Toilet Washing'] : '' ?>id='7-8' onclick="changeColor(this, '7-8', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['8-9Toilet Washing']) ? $time['8-9Toilet Washing'] : '' ?>id='8-9' onclick="changeColor(this, '8-9', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['9-10Toilet Washing']) ? $time['9-10Toilet Washing'] : '' ?>id='9-10' onclick="changeColor(this, '9-10', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['10-11Toilet Washing']) ? $time['10-11Toilet Washing'] : '' ?>id='10-11' onclick="changeColor(this, '10-11', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['11-12Toilet Washing']) ? $time['11-12Toilet Washing'] : '' ?>id='11-12' onclick="changeColor(this, '11-12', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['12-13Toilet Washing']) ? $time['12-13Toilet Washing'] : '' ?>id='12-13' onclick="changeColor(this, '12-13', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['13-14Toilet Washing']) ? $time['13-14Toilet Washing'] : '' ?>id='13-14' onclick="changeColor(this, '13-14', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['14-15Toilet Washing']) ? $time['14-15Toilet Washing'] : '' ?>id='14-15' onclick="changeColor(this, '14-15', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['15-16Toilet Washing']) ? $time['15-16Toilet Washing'] : '' ?>id='15-16' onclick="changeColor(this, '15-16', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['16-17Toilet Washing']) ? $time['16-17Toilet Washing'] : '' ?>id='16-17' onclick="changeColor(this, '16-17', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['17-18Toilet Washing']) ? $time['17-18Toilet Washing'] : '' ?>id='17-18' onclick="changeColor(this, '17-18', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['18-19Toilet Washing']) ? $time['18-19Toilet Washing'] : '' ?>id='18-19' onclick="changeColor(this, '18-19', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['19-20Toilet Washing']) ? $time['19-20Toilet Washing'] : '' ?>id='19-20' onclick="changeColor(this, '19-20', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['20-21Toilet Washing']) ? $time['20-21Toilet Washing'] : '' ?>id='20-21' onclick="changeColor(this, '20-21', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['21-22Toilet Washing']) ? $time['21-22Toilet Washing'] : '' ?>id='21-22' onclick="changeColor(this, '21-22', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['22-23Toilet Washing']) ? $time['22-23Toilet Washing'] : '' ?>id='22-23' onclick="changeColor(this, '22-23', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['23-24Toilet Washing']) ? $time['23-24Toilet Washing'] : '' ?>id='23-24' onclick="changeColor(this, '23-24', 'Toilet Washing', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
			</tr>
			<tr>
				<td>Hand Towel <br /> ( Replenish )</td>
				<td <?= isset($time['0-1Hand Towel']) ? $time['0-1Hand Towel'] : '' ?>id='0-1' onclick="changeColor(this, '0-1', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['1-2Hand Towel']) ? $time['1-2Hand Towel'] : '' ?>id='1-2' onclick="changeColor(this, '1-2', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['2-3Hand Towel']) ? $time['2-3Hand Towel'] : '' ?>id='2-3' onclick="changeColor(this, '2-3', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['3-4Hand Towel']) ? $time['3-4Hand Towel'] : '' ?>id='3-4' onclick="changeColor(this, '3-4', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['4-5Hand Towel']) ? $time['4-5Hand Towel'] : '' ?>id='4-5' onclick="changeColor(this, '4-5', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['5-6Hand Towel']) ? $time['5-6Hand Towel'] : '' ?>id='5-6' onclick="changeColor(this, '5-6', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['6-7Hand Towel']) ? $time['6-7Hand Towel'] : '' ?>id='6-7' onclick="changeColor(this, '6-7', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['7-8Hand Towel']) ? $time['7-8Hand Towel'] : '' ?>id='7-8' onclick="changeColor(this, '7-8', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['8-9Hand Towel']) ? $time['8-9Hand Towel'] : '' ?>id='8-9' onclick="changeColor(this, '8-9', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['9-10Hand Towel']) ? $time['9-10Hand Towel'] : '' ?>id='9-10' onclick="changeColor(this, '9-10', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['10-11Hand Towel']) ? $time['10-11Hand Towel'] : '' ?>id='10-11' onclick="changeColor(this, '10-11', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['11-12Hand Towel']) ? $time['11-12Hand Towel'] : '' ?>id='11-12' onclick="changeColor(this, '11-12', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['12-13Hand Towel']) ? $time['12-13Hand Towel'] : '' ?>id='12-13' onclick="changeColor(this, '12-13', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['13-14Hand Towel']) ? $time['13-14Hand Towel'] : '' ?>id='13-14' onclick="changeColor(this, '13-14', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['14-15Hand Towel']) ? $time['14-15Hand Towel'] : '' ?>id='14-15' onclick="changeColor(this, '14-15', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['15-16Hand Towel']) ? $time['15-16Hand Towel'] : '' ?>id='15-16' onclick="changeColor(this, '15-16', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['16-17Hand Towel']) ? $time['16-17Hand Towel'] : '' ?>id='16-17' onclick="changeColor(this, '16-17', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['17-18Hand Towel']) ? $time['17-18Hand Towel'] : '' ?>id='17-18' onclick="changeColor(this, '17-18', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['18-19Hand Towel']) ? $time['18-19Hand Towel'] : '' ?>id='18-19' onclick="changeColor(this, '18-19', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['19-20Hand Towel']) ? $time['19-20Hand Towel'] : '' ?>id='19-20' onclick="changeColor(this, '19-20', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['20-21Hand Towel']) ? $time['20-21Hand Towel'] : '' ?>id='20-21' onclick="changeColor(this, '20-21', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['21-22Hand Towel']) ? $time['21-22Hand Towel'] : '' ?>id='21-22' onclick="changeColor(this, '21-22', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['22-23Hand Towel']) ? $time['22-23Hand Towel'] : '' ?>id='22-23' onclick="changeColor(this, '22-23', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['23-24Hand Towel']) ? $time['23-24Hand Towel'] : '' ?>id='23-24' onclick="changeColor(this, '23-24', 'Hand Towel', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
			</tr>
			<tr>
				<td>Toilet Roll <br />( Replenish )</td>
				<td <?= isset($time['0-1Toilet Roll']) ? $time['0-1Toilet Roll'] : '' ?>id='0-1' onclick="changeColor(this, '0-1', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['1-2Toilet Roll']) ? $time['1-2Toilet Roll'] : '' ?>id='1-2' onclick="changeColor(this, '1-2', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['2-3Toilet Roll']) ? $time['2-3Toilet Roll'] : '' ?>id='2-3' onclick="changeColor(this, '2-3', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['3-4Toilet Roll']) ? $time['3-4Toilet Roll'] : '' ?>id='3-4' onclick="changeColor(this, '3-4', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['4-5Toilet Roll']) ? $time['4-5Toilet Roll'] : '' ?>id='4-5' onclick="changeColor(this, '4-5', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['5-6Toilet Roll']) ? $time['5-6Toilet Roll'] : '' ?>id='5-6' onclick="changeColor(this, '5-6', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['6-7Toilet Roll']) ? $time['6-7Toilet Roll'] : '' ?>id='6-7' onclick="changeColor(this, '6-7', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['7-8Toilet Roll']) ? $time['7-8Toilet Roll'] : '' ?>id='7-8' onclick="changeColor(this, '7-8', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['8-9Toilet Roll']) ? $time['8-9Toilet Roll'] : '' ?>id='8-9' onclick="changeColor(this, '8-9', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['9-10Toilet Roll']) ? $time['9-10Toilet Roll'] : '' ?>id='9-10' onclick="changeColor(this, '9-10', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['10-11Toilet Roll']) ? $time['10-11Toilet Roll'] : '' ?>id='10-11' onclick="changeColor(this, '10-11', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['11-12Toilet Roll']) ? $time['11-12Toilet Roll'] : '' ?>id='11-12' onclick="changeColor(this, '11-12', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['12-13Toilet Roll']) ? $time['12-13Toilet Roll'] : '' ?>id='12-13' onclick="changeColor(this, '12-13', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['13-14Toilet Roll']) ? $time['13-14Toilet Roll'] : '' ?>id='13-14' onclick="changeColor(this, '13-14', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['14-15Toilet Roll']) ? $time['14-15Toilet Roll'] : '' ?>id='14-15' onclick="changeColor(this, '14-15', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['15-16Toilet Roll']) ? $time['15-16Toilet Roll'] : '' ?>id='15-16' onclick="changeColor(this, '15-16', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['16-17Toilet Roll']) ? $time['16-17Toilet Roll'] : '' ?>id='16-17' onclick="changeColor(this, '16-17', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['17-18Toilet Roll']) ? $time['17-18Toilet Roll'] : '' ?>id='17-18' onclick="changeColor(this, '17-18', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['18-19Toilet Roll']) ? $time['18-19Toilet Roll'] : '' ?>id='18-19' onclick="changeColor(this, '18-19', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['19-20Toilet Roll']) ? $time['19-20Toilet Roll'] : '' ?>id='19-20' onclick="changeColor(this, '19-20', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['20-21Toilet Roll']) ? $time['20-21Toilet Roll'] : '' ?>id='20-21' onclick="changeColor(this, '20-21', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['21-22Toilet Roll']) ? $time['21-22Toilet Roll'] : '' ?>id='21-22' onclick="changeColor(this, '21-22', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['22-23Toilet Roll']) ? $time['22-23Toilet Roll'] : '' ?>id='22-23' onclick="changeColor(this, '22-23', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['23-24Toilet Roll']) ? $time['23-24Toilet Roll'] : '' ?>id='23-24' onclick="changeColor(this, '23-24', 'Toilet Roll', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
			</tr>
			<tr>
				<td>Hand Soap <br />( Wash <br />&<br /> Replenish )</td>
				<td <?= isset($time['0-1Hand Soap']) ? $time['0-1Hand Soap'] : '' ?>id='0-1' onclick="changeColor(this, '0-1', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['1-2Hand Soap']) ? $time['1-2Hand Soap'] : '' ?>id='1-2' onclick="changeColor(this, '1-2', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['2-3Hand Soap']) ? $time['2-3Hand Soap'] : '' ?>id='2-3' onclick="changeColor(this, '2-3', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['3-4Hand Soap']) ? $time['3-4Hand Soap'] : '' ?>id='3-4' onclick="changeColor(this, '3-4', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['4-5Hand Soap']) ? $time['4-5Hand Soap'] : '' ?>id='4-5' onclick="changeColor(this, '4-5', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['5-6Hand Soap']) ? $time['5-6Hand Soap'] : '' ?>id='5-6' onclick="changeColor(this, '5-6', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['6-7Hand Soap']) ? $time['6-7Hand Soap'] : '' ?>id='6-7' onclick="changeColor(this, '6-7', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['7-8Hand Soap']) ? $time['7-8Hand Soap'] : '' ?>id='7-8' onclick="changeColor(this, '7-8', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['8-9Hand Soap']) ? $time['8-9Hand Soap'] : '' ?>id='8-9' onclick="changeColor(this, '8-9', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['9-10Hand Soap']) ? $time['9-10Hand Soap'] : '' ?>id='9-10' onclick="changeColor(this, '9-10', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['10-11Hand Soap']) ? $time['10-11Hand Soap'] : '' ?>id='10-11' onclick="changeColor(this, '10-11', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['11-12Hand Soap']) ? $time['11-12Hand Soap'] : '' ?>id='11-12' onclick="changeColor(this, '11-12', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['12-13Hand Soap']) ? $time['12-13Hand Soap'] : '' ?>id='12-13' onclick="changeColor(this, '12-13', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['13-14Hand Soap']) ? $time['13-14Hand Soap'] : '' ?>id='13-14' onclick="changeColor(this, '13-14', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['14-15Hand Soap']) ? $time['14-15Hand Soap'] : '' ?>id='14-15' onclick="changeColor(this, '14-15', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['15-16Hand Soap']) ? $time['15-16Hand Soap'] : '' ?>id='15-16' onclick="changeColor(this, '15-16', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['16-17Hand Soap']) ? $time['16-17Hand Soap'] : '' ?>id='16-17' onclick="changeColor(this, '16-17', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['17-18Hand Soap']) ? $time['17-18Hand Soap'] : '' ?>id='17-18' onclick="changeColor(this, '17-18', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['18-19Hand Soap']) ? $time['18-19Hand Soap'] : '' ?>id='18-19' onclick="changeColor(this, '18-19', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['19-20Hand Soap']) ? $time['19-20Hand Soap'] : '' ?>id='19-20' onclick="changeColor(this, '19-20', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['20-21Hand Soap']) ? $time['20-21Hand Soap'] : '' ?>id='20-21' onclick="changeColor(this, '20-21', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['21-22Hand Soap']) ? $time['21-22Hand Soap'] : '' ?>id='21-22' onclick="changeColor(this, '21-22', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['22-23Hand Soap']) ? $time['22-23Hand Soap'] : '' ?>id='22-23' onclick="changeColor(this, '22-23', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['23-24Hand Soap']) ? $time['23-24Hand Soap'] : '' ?>id='23-24' onclick="changeColor(this, '23-24', 'Hand Soap', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
			</tr>
			<tr>
				<td>Deodorisers</td>
				<td <?= isset($time['0-1Deodorisers']) ? $time['0-1Deodorisers'] : '' ?>id='0-1' onclick="changeColor(this, '0-1', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['1-2Deodorisers']) ? $time['1-2Deodorisers'] : '' ?>id='1-2' onclick="changeColor(this, '1-2', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['2-3Deodorisers']) ? $time['2-3Deodorisers'] : '' ?>id='2-3' onclick="changeColor(this, '2-3', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['3-4Deodorisers']) ? $time['3-4Deodorisers'] : '' ?>id='3-4' onclick="changeColor(this, '3-4', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['4-5Deodorisers']) ? $time['4-5Deodorisers'] : '' ?>id='4-5' onclick="changeColor(this, '4-5', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['5-6Deodorisers']) ? $time['5-6Deodorisers'] : '' ?>id='5-6' onclick="changeColor(this, '5-6', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['6-7Deodorisers']) ? $time['6-7Deodorisers'] : '' ?>id='6-7' onclick="changeColor(this, '6-7', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['7-8Deodorisers']) ? $time['7-8Deodorisers'] : '' ?>id='7-8' onclick="changeColor(this, '7-8', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['8-9Deodorisers']) ? $time['8-9Deodorisers'] : '' ?>id='8-9' onclick="changeColor(this, '8-9', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['9-10Deodorisers']) ? $time['9-10Deodorisers'] : '' ?>id='9-10' onclick="changeColor(this, '9-10', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['10-11Deodorisers']) ? $time['10-11Deodorisers'] : '' ?>id='10-11' onclick="changeColor(this, '10-11', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['11-12Deodorisers']) ? $time['11-12Deodorisers'] : '' ?>id='11-12' onclick="changeColor(this, '11-12', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['12-13Deodorisers']) ? $time['12-13Deodorisers'] : '' ?>id='12-13' onclick="changeColor(this, '12-13', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['13-14Deodorisers']) ? $time['13-14Deodorisers'] : '' ?>id='13-14' onclick="changeColor(this, '13-14', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['14-15Deodorisers']) ? $time['14-15Deodorisers'] : '' ?>id='14-15' onclick="changeColor(this, '14-15', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['15-16Deodorisers']) ? $time['15-16Deodorisers'] : '' ?>id='15-16' onclick="changeColor(this, '15-16', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['16-17Deodorisers']) ? $time['16-17Deodorisers'] : '' ?>id='16-17' onclick="changeColor(this, '16-17', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['17-18Deodorisers']) ? $time['17-18Deodorisers'] : '' ?>id='17-18' onclick="changeColor(this, '17-18', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['18-19Deodorisers']) ? $time['18-19Deodorisers'] : '' ?>id='18-19' onclick="changeColor(this, '18-19', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['19-20Deodorisers']) ? $time['19-20Deodorisers'] : '' ?>id='19-20' onclick="changeColor(this, '19-20', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['20-21Deodorisers']) ? $time['20-21Deodorisers'] : '' ?>id='20-21' onclick="changeColor(this, '20-21', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['21-22Deodorisers']) ? $time['21-22Deodorisers'] : '' ?>id='21-22' onclick="changeColor(this, '21-22', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['22-23Deodorisers']) ? $time['22-23Deodorisers'] : '' ?>id='22-23' onclick="changeColor(this, '22-23', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['23-24Deodorisers']) ? $time['23-24Deodorisers'] : '' ?>id='23-24' onclick="changeColor(this, '23-24', 'Deodorisers', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
			</tr>
			<tr>
				<td>Waste Colletion<br /> by Porter</td>
				<td <?= isset($time['0-1Waste Collection']) ? $time['0-1Waste Collection'] : '' ?>id='0-1' onclick="changeColor(this, '0-1', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['1-2Waste Collection']) ? $time['1-2Waste Collection'] : '' ?>id='1-2' onclick="changeColor(this, '1-2', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['2-3Waste Collection']) ? $time['2-3Waste Collection'] : '' ?>id='2-3' onclick="changeColor(this, '2-3', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['3-4Waste Collection']) ? $time['3-4Waste Collection'] : '' ?>id='3-4' onclick="changeColor(this, '3-4', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['4-5Waste Collection']) ? $time['4-5Waste Collection'] : '' ?>id='4-5' onclick="changeColor(this, '4-5', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['5-6Waste Collection']) ? $time['5-6Waste Collection'] : '' ?>id='5-6' onclick="changeColor(this, '5-6', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['6-7Waste Collection']) ? $time['6-7Waste Collection'] : '' ?>id='6-7' onclick="changeColor(this, '6-7', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['7-8Waste Collection']) ? $time['7-8Waste Collection'] : '' ?>id='7-8' onclick="changeColor(this, '7-8', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['8-9Waste Collection']) ? $time['8-9Waste Collection'] : '' ?>id='8-9' onclick="changeColor(this, '8-9', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['9-10Waste Collection']) ? $time['9-10Waste Collection'] : '' ?>id='9-10' onclick="changeColor(this, '9-10', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['10-11Waste Collection']) ? $time['10-11Waste Collection'] : '' ?>id='10-11' onclick="changeColor(this, '10-11', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['11-12Waste Collection']) ? $time['11-12Waste Collection'] : '' ?>id='11-12' onclick="changeColor(this, '11-12', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['12-13Waste Collection']) ? $time['12-13Waste Collection'] : '' ?>id='12-13' onclick="changeColor(this, '12-13', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['13-14Waste Collection']) ? $time['13-14Waste Collection'] : '' ?>id='13-14' onclick="changeColor(this, '13-14', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['14-15Waste Collection']) ? $time['14-15Waste Collection'] : '' ?>id='14-15' onclick="changeColor(this, '14-15', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['15-16Waste Collection']) ? $time['15-16Waste Collection'] : '' ?>id='15-16' onclick="changeColor(this, '15-16', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['16-17Waste Collection']) ? $time['16-17Waste Collection'] : '' ?>id='16-17' onclick="changeColor(this, '16-17', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['17-18Waste Collection']) ? $time['17-18Waste Collection'] : '' ?>id='17-18' onclick="changeColor(this, '17-18', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['18-19Waste Collection']) ? $time['18-19Waste Collection'] : '' ?>id='18-19' onclick="changeColor(this, '18-19', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['19-20Waste Collection']) ? $time['19-20Waste Collection'] : '' ?>id='19-20' onclick="changeColor(this, '19-20', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['20-21Waste Collection']) ? $time['20-21Waste Collection'] : '' ?>id='20-21' onclick="changeColor(this, '20-21', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['21-22Waste Collection']) ? $time['21-22Waste Collection'] : '' ?>id='21-22' onclick="changeColor(this, '21-22', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['22-23Waste Collection']) ? $time['22-23Waste Collection'] : '' ?>id='22-23' onclick="changeColor(this, '22-23', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
				<td <?= isset($time['23-24Waste Collection']) ? $time['23-24Waste Collection'] : '' ?>id='23-24' onclick="changeColor(this, '23-24', 'Waste Collection', '<?=$this->input->get("dept")?>', '<?=$this->input->get("loc")?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>', '<?=$job_D?>')"></td>
			</tr>
	</table>
	<table class="tbl-wo" border="0" align="center">
			<tr height="50px">
				<td style="padding-left:10px;">Prepared : <?= $namos[0]->v_UserName?>, <?= $namos[0]->v_designation?></td>
				<td style="padding-left:10px;">Verified by : </td>
			</tr>
			<tr height="50px">
				<td style="padding-left:10px;">Date: </td>
				<td style="padding-left:10px;">Date : </td>
			</tr>
		</table>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	</body>
</html>

