<body>
<script type="text/javascript">
function changeColor(elem, cellapo, date, dept, user, monthyear, userpriv)
{
	if (userpriv == 'SET') {
	if (document.getElementById (cellapo).innerText == "HD") {
		var element = document.getElementById(cellapo);
	element.innerHTML = "SS";
	var task = element.innerHTML;
	//alert(color);
	//window.location.href = "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user;
	//console.log( "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear );
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('weeklyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user, true);
	       	xmlhttp.send();
					//alert(dept);
	}
	else if (document.getElementById (cellapo).innerText == "SS"){
		var element = document.getElementById(cellapo);
	element.innerHTML = "BF";
	var task = element.innerHTML;
	//alert(color);
	//window.location.href = "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user;
	//console.log( "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear );
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('weeklyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user, true);
	       	xmlhttp.send();
					//alert(dept);
	}
	else if (document.getElementById (cellapo).innerText == "BF"){
		var element = document.getElementById(cellapo);
	element.innerHTML = "VC";
	var task = element.innerHTML;
	//alert(color);
	//window.location.href = "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user;
	//console.log( "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear );
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('weeklyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user, true);
	       	xmlhttp.send();
					//alert(dept);
	}
	else if (document.getElementById (cellapo).innerText == "VC"){
		var element = document.getElementById(cellapo);
	element.innerHTML = "CS";
	var task = element.innerHTML;
	//alert(color);
	//window.location.href = "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user;
	//console.log( "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear );
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('weeklyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user, true);
	       	xmlhttp.send();
					//alert(dept);
	}
	else if (document.getElementById (cellapo).innerText == "CS"){
		var element = document.getElementById(cellapo);
	element.innerHTML = "GC";
	var task = element.innerHTML;
	//alert(color);
	//window.location.href = "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user;
	//console.log( "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear );
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('weeklyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user, true);
	       	xmlhttp.send();
					//alert(dept);
	}
	else if (document.getElementById (cellapo).innerText == "GC"){
		var element = document.getElementById(cellapo);
	element.innerHTML = "";
	var task = element.innerHTML;
	//alert(color);
	//window.location.href = "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user;
	//console.log( "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear );
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('weeklyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user, true);
	       	xmlhttp.send();
					//alert(dept);
	}
	else{
		var element = document.getElementById(cellapo);
	element.innerHTML = "HD";
	var task = element.innerHTML;
	//window.location.href = "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user;
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('weeklyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user, true);
	       	xmlhttp.send();
	}
	}
	else{
	if(document.getElementById (cellapo).innerText != ""){	
	if (elem.className == "icon-green") {
	var task = document.getElementById (cellapo).innerText;
	elem.className = "";
	var color = elem.className
	//alert(color);
	//window.location.href = "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user;
	//console.log( "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear );
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('weeklyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user + "&color=" + color, true);
	       	xmlhttp.send();
					//alert(dept);
	}
	else{
	var task = document.getElementById (cellapo).innerText;
	elem.className = "icon-green"; 
	var color = elem.className
	//window.location.href = "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user;
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('weeklyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user + "&color=" + color, true);
	       	xmlhttp.send();
	}
	}
	}
//cell.style.background = red;
//cell.style.color = black;
}
</script>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr"> Housekeeping Services </div>
		<button onclick='myFunctionprint()' class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.location.href='contentcontroller/locationlist?parent=asset'">CANCEL</button>
	</div>
	<div class="form">
		<?php $numrow=1; foreach ($dept as $rows): ?>
		<?php if ($numrow==1 OR $numrow%16==1){ ?>
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
							<td align="center"><b>WEEKLY / PERIODIC PLANNER</b></td>
						</tr>
					</table>
				</td>
				<td style="padding-left:5px; width:160px;"><img src="<?php echo base_url(); ?>images/logo.png" style="width:145px; height:60px;"/></td>
			</tr>
		</table>
	<div class="form">
		<table class="tbl-wo" border="0" align="center" style="font-weight:bold;">
			<tr height="50px">
				<td style="padding-left:10px;"><b>PROJECT : IIUM TEACHING HOSPITAL, KUANTAN</b></td>
				<td style="padding-left:10px;">Month : <?= date('F', mktime(0, 0, 0, $month, 10)) ?></td>
			</tr>
		</table>
	</div>
	<div id="Instruction">
			<table class="tbl-wo" border="0" align="center" style="font-weight:bold;">
				<tr style="background:#B3130A;">
							<td width="3%" height="30px">
							<a href="?y=<?= $year-1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="88%" align="center">
							<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= $year+1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
						</tr>
			</table>
		</div>
	<table class="tftable2" border="1" style="text-align:center;" align="center">
		 <tr class="greyii">
		    <th rowspan="2" class="td-r">No</th>
		    <th rowspan="2" class="td-r">Code</th>
		    <th rowspan="2" class="td-r">User department</th>
		    <th colspan="7" class="td-r" style="">Day</th>
		    <th rowspan="2" class="td-r" style="width:170px">Remarks</th>    
		  </tr>
		  <tr class="greyii">
		    <th class="td-r">Monday</th>
		    <th class="td-r">Tuesday</th>
		    <th class="td-r">Wednesday</th>
		    <th class="td-r">thursday</th>
		    <th class="td-r">friday</th>
		    <th class="td-r">saturday</th>
		    <th class="td-r">sunday</th>
		  </tr>
		  <?php } ?>	
			<tr>
				<td><?=$numrow?></td>
				<td><?=$rows->v_UserDeptCode?></td>
				<td><?=$rows->v_userdeptdesc?></td>
				<td <?= isset($color['Monday'.$rows->v_UserDeptCode]) ? $color['Monday'.$rows->v_UserDeptCode] : '' ?>id='Monday<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, 'Monday<?=$rows->v_UserDeptCode?>', 'Monday', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($day['Monday'.$rows->v_UserDeptCode]) ? $day['Monday'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['Tuesday'.$rows->v_UserDeptCode]) ? $color['Tuesday'.$rows->v_UserDeptCode] : '' ?>id='Tuesday<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, 'Tuesday<?=$rows->v_UserDeptCode?>', 'Tuesday', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($day['Tuesday'.$rows->v_UserDeptCode]) ? $day['Tuesday'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['Wednesday'.$rows->v_UserDeptCode]) ? $color['Wednesday'.$rows->v_UserDeptCode] : '' ?>id='Wednesday<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, 'Wednesday<?=$rows->v_UserDeptCode?>', 'Wednesday', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($day['Wednesday'.$rows->v_UserDeptCode]) ? $day['Wednesday'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['Thursday'.$rows->v_UserDeptCode]) ? $color['Thursday'.$rows->v_UserDeptCode] : '' ?>id='Thursday<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, 'Thursday<?=$rows->v_UserDeptCode?>', 'Thursday', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($day['Thursday'.$rows->v_UserDeptCode]) ? $day['Thursday'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['Friday'.$rows->v_UserDeptCode]) ? $color['Friday'.$rows->v_UserDeptCode] : '' ?>id='Friday<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, 'Friday<?=$rows->v_UserDeptCode?>', 'Friday', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($day['Friday'.$rows->v_UserDeptCode]) ? $day['Friday'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['Saturday'.$rows->v_UserDeptCode]) ? $color['Saturday'.$rows->v_UserDeptCode] : '' ?>id='Saturday<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, 'Saturday<?=$rows->v_UserDeptCode?>', 'Saturday', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($day['Saturday'.$rows->v_UserDeptCode]) ? $day['Saturday'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['Sunday'.$rows->v_UserDeptCode]) ? $color['Sunday'.$rows->v_UserDeptCode] : '' ?>id='Sunday<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, 'Sunday<?=$rows->v_UserDeptCode?>', 'Sunday', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($day['Sunday'.$rows->v_UserDeptCode]) ? $day['Sunday'.$rows->v_UserDeptCode] : '' ?></td>
				<td></td>
			</tr>
			<?php $numrow++?>
			
			<?php if (($numrow-1)==$count){ ?>
			<?php $lastno = $numrow ?>
			<?php for ($x = 0; $x <= (16 - ($lastno%16)); $x++) { ?>
			<?php $numrow++?>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php  } ?>
			<?php  } ?>
			
	<?php if (($numrow-1)%16==0) { ?>		
	</table>
	<table class="tbl-wo" border="0" align="center">
			<tr>
				<td style="padding-left:10px; padding: 8px;" colspan="2">
					Legend : GWC General Wate Bin Washing<span style="display: inline-block; width:50px;"></span> HDT Higt Dusting (ceiling)<br />
					<span style="display: inline-block; width:47px;"></span>
					SCR Buffing (Polishing Floors) <span style="display: inline-block; width:55px;"></span> WSC WASH & Scrub (PEri eter Drain)<br />
					<span style="display: inline-block; width:47px;"></span>
					WIP Wiping (Windows , Doors , Walls, Lighthing , Air-Cond vent ,Ceiling Fan & Defuser )

				</td>
			</tr>
			<tr height="50px">
				<td style="padding-left:10px;">Prepared : </td>
				<td style="padding-left:10px;">Verified by : </td>
			</tr>
			<tr height="50px">
				<td style="padding-left:10px;">Date: </td>
				<td style="padding-left:10px;">Date : </td>
			</tr>
		</table>
		<?php include 'content_footerprint.php';?>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	<?php } ?>
	<?php endforeach; ?>
	</body>
</html>

