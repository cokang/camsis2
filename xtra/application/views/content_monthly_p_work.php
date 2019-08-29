<body>
<script type="text/javascript">
function changeColor(elem, cellapo, date, dept, user, monthyear, userpriv)
{
	if (userpriv == 'SET') {
	if (document.getElementById (cellapo).innerText == "HD") {
		var element = document.getElementById(cellapo);
	element.innerHTML = "SC";
	var task = element.innerHTML;
	//alert(color);
	//window.location.href = "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user;
	//console.log( "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear );
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user, true);
	       	xmlhttp.send();
					//alert(dept);
	}
	else if (document.getElementById (cellapo).innerText == "SC"){
		var element = document.getElementById(cellapo);
	element.innerHTML = "BF";
	var task = element.innerHTML;
	//alert(color);
	//window.location.href = "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user;
	//console.log( "<?php echo site_url('dcap_planner_sch_ctrl');?>?c=" + color + "&cell=" + cellapo + "&dept=" + dept + "&loc=" + loc + "&job=" + job + "&my=" + monthyear );
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user, true);
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
	        xmlhttp.open("GET", "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user, true);
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
	        xmlhttp.open("GET", "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user, true);
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
	        xmlhttp.open("GET", "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user, true);
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
	        xmlhttp.open("GET", "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user, true);
	       	xmlhttp.send();
					//alert(dept);
	}
	else{
		var element = document.getElementById(cellapo);
	element.innerHTML = "HD";
	var task = element.innerHTML;
	//window.location.href = "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user;
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user, true);
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
	        xmlhttp.open("GET", "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user + "&color=" + color, true);
	       	xmlhttp.send();
					//alert(dept);
	}
	else{
	var task = document.getElementById (cellapo).innerText;
	elem.className = "icon-green"; 
	var color = elem.className
	//window.location.href = "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user;
			var xmlhttp = new XMLHttpRequest();
	        xmlhttp.open("GET", "<?php echo site_url('monthlyplanner_sch_ctrl');?>?task=" + task + "&cell=" + cellapo + "&dept=" + dept + "&date=" + date + "&my=" + monthyear + "&user=" + user + "&color=" + color, true);
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
		<?php $numrow=1; foreach($dept as $rows):?>
		<?php if ($numrow==1 OR $numrow%12==1){ ?>
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
							<td align="center"><b>PERIODIC WORK ( MONTHLY PLANNER )</b></td>
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
				<td style="padding-left:10px;">Month: <?= date('F', mktime(0, 0, 0, $month, 10)) ?></td>
				<td style="padding-left:10px;">Year : <?=$year?></td>
			</tr>
		</table>
	</div>
	<div id="Instruction">
			<table width="100%" class="tbl-wo">
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
		    <th rowspan="2" class="td-r">User Department</th>
		    <th colspan="31" class="td-r" style="">Date</th>
		  </tr>
		  <tr class="greyii">
		    <th class="td-r">1</th>
		    <th class="td-r">2</th>
		    <th class="td-r">3</th>
		    <th class="td-r">4</th>
		    <th class="td-r">5</th>
		    <th class="td-r">6</th>
		    <th class="td-r">7</th>
		    <th class="td-r">8</th>
		    <th class="td-r">9</th>
		    <th class="td-r">10</th>
		    <th class="td-r">11</th>
		    <th class="td-r">12</th>
		    <th class="td-r">13</th>
		    <th class="td-r">14</th>
		    <th class="td-r">15</th>
		    <th class="td-r">16</th>
		    <th class="td-r">17</th>
		    <th class="td-r">18</th>
		    <th class="td-r">19</th>
		    <th class="td-r">20</th>
		    <th class="td-r">21</th>
		    <th class="td-r">22</th>
		    <th class="td-r">23</th>
		    <th class="td-r">24</th>
		    <th class="td-r">25</th>
		    <th class="td-r">26</th>
		    <th class="td-r">27</th>
		    <th class="td-r">28</th>
		    <th class="td-r">29</th>
		    <th class="td-r">30</th>
		    <th class="td-r">31</th>
		  </tr>
		  <?php } ?>	  
				    
			<tr>
				<td><?=$rows->v_userdeptdesc?></td>
				<td <?= isset($color['1'.$rows->v_UserDeptCode]) ? $color['1'.$rows->v_UserDeptCode] : '' ?>id='1<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '1<?=$rows->v_UserDeptCode?>', '1', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['1'.$rows->v_UserDeptCode]) ? $date['1'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['2'.$rows->v_UserDeptCode]) ? $color['2'.$rows->v_UserDeptCode] : '' ?>id='2<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '2<?=$rows->v_UserDeptCode?>', '2', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['2'.$rows->v_UserDeptCode]) ? $date['2'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['3'.$rows->v_UserDeptCode]) ? $color['3'.$rows->v_UserDeptCode] : '' ?>id='3<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '3<?=$rows->v_UserDeptCode?>', '3', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['3'.$rows->v_UserDeptCode]) ? $date['3'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['4'.$rows->v_UserDeptCode]) ? $color['4'.$rows->v_UserDeptCode] : '' ?>id='4<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '4<?=$rows->v_UserDeptCode?>', '4', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['4'.$rows->v_UserDeptCode]) ? $date['4'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['5'.$rows->v_UserDeptCode]) ? $color['5'.$rows->v_UserDeptCode] : '' ?>id='5<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '5<?=$rows->v_UserDeptCode?>', '5', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['5'.$rows->v_UserDeptCode]) ? $date['5'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['6'.$rows->v_UserDeptCode]) ? $color['6'.$rows->v_UserDeptCode] : '' ?>id='6<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '6<?=$rows->v_UserDeptCode?>', '6', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['6'.$rows->v_UserDeptCode]) ? $date['6'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['7'.$rows->v_UserDeptCode]) ? $color['7'.$rows->v_UserDeptCode] : '' ?>id='7<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '7<?=$rows->v_UserDeptCode?>', '7', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['7'.$rows->v_UserDeptCode]) ? $date['7'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['8'.$rows->v_UserDeptCode]) ? $color['8'.$rows->v_UserDeptCode] : '' ?>id='8<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '8<?=$rows->v_UserDeptCode?>', '8', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['8'.$rows->v_UserDeptCode]) ? $date['8'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['9'.$rows->v_UserDeptCode]) ? $color['9'.$rows->v_UserDeptCode] : '' ?>id='9<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '9<?=$rows->v_UserDeptCode?>', '9', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['9'.$rows->v_UserDeptCode]) ? $date['9'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['10'.$rows->v_UserDeptCode]) ? $color['10'.$rows->v_UserDeptCode] : '' ?>id='10<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '10<?=$rows->v_UserDeptCode?>', '10', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['10'.$rows->v_UserDeptCode]) ? $date['10'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['11'.$rows->v_UserDeptCode]) ? $color['11'.$rows->v_UserDeptCode] : '' ?>id='11<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '11<?=$rows->v_UserDeptCode?>', '11', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['11'.$rows->v_UserDeptCode]) ? $date['11'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['12'.$rows->v_UserDeptCode]) ? $color['12'.$rows->v_UserDeptCode] : '' ?>id='12<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '12<?=$rows->v_UserDeptCode?>', '12', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['12'.$rows->v_UserDeptCode]) ? $date['12'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['13'.$rows->v_UserDeptCode]) ? $color['13'.$rows->v_UserDeptCode] : '' ?>id='13<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '13<?=$rows->v_UserDeptCode?>', '13', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['13'.$rows->v_UserDeptCode]) ? $date['13'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['14'.$rows->v_UserDeptCode]) ? $color['14'.$rows->v_UserDeptCode] : '' ?>id='14<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '14<?=$rows->v_UserDeptCode?>', '14', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['14'.$rows->v_UserDeptCode]) ? $date['14'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['15'.$rows->v_UserDeptCode]) ? $color['15'.$rows->v_UserDeptCode] : '' ?>id='15<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '15<?=$rows->v_UserDeptCode?>', '15', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['15'.$rows->v_UserDeptCode]) ? $date['15'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['16'.$rows->v_UserDeptCode]) ? $color['16'.$rows->v_UserDeptCode] : '' ?>id='16<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '16<?=$rows->v_UserDeptCode?>', '16', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['16'.$rows->v_UserDeptCode]) ? $date['16'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['17'.$rows->v_UserDeptCode]) ? $color['17'.$rows->v_UserDeptCode] : '' ?>id='17<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '17<?=$rows->v_UserDeptCode?>', '17', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['17'.$rows->v_UserDeptCode]) ? $date['17'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['18'.$rows->v_UserDeptCode]) ? $color['18'.$rows->v_UserDeptCode] : '' ?>id='18<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '18<?=$rows->v_UserDeptCode?>', '18', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['18'.$rows->v_UserDeptCode]) ? $date['18'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['19'.$rows->v_UserDeptCode]) ? $color['19'.$rows->v_UserDeptCode] : '' ?>id='19<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '19<?=$rows->v_UserDeptCode?>', '19', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['19'.$rows->v_UserDeptCode]) ? $date['19'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['20'.$rows->v_UserDeptCode]) ? $color['20'.$rows->v_UserDeptCode] : '' ?>id='20<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '20<?=$rows->v_UserDeptCode?>', '20', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['20'.$rows->v_UserDeptCode]) ? $date['20'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['21'.$rows->v_UserDeptCode]) ? $color['21'.$rows->v_UserDeptCode] : '' ?>id='21<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '21<?=$rows->v_UserDeptCode?>', '21', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['21'.$rows->v_UserDeptCode]) ? $date['21'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['22'.$rows->v_UserDeptCode]) ? $color['22'.$rows->v_UserDeptCode] : '' ?>id='22<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '22<?=$rows->v_UserDeptCode?>', '22', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['22'.$rows->v_UserDeptCode]) ? $date['22'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['23'.$rows->v_UserDeptCode]) ? $color['23'.$rows->v_UserDeptCode] : '' ?>id='23<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '23<?=$rows->v_UserDeptCode?>', '23', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['23'.$rows->v_UserDeptCode]) ? $date['23'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['24'.$rows->v_UserDeptCode]) ? $color['24'.$rows->v_UserDeptCode] : '' ?>id='24<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '24<?=$rows->v_UserDeptCode?>', '24', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['24'.$rows->v_UserDeptCode]) ? $date['24'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['25'.$rows->v_UserDeptCode]) ? $color['25'.$rows->v_UserDeptCode] : '' ?>id='25<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '25<?=$rows->v_UserDeptCode?>', '25', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['25'.$rows->v_UserDeptCode]) ? $date['25'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['26'.$rows->v_UserDeptCode]) ? $color['26'.$rows->v_UserDeptCode] : '' ?>id='26<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '26<?=$rows->v_UserDeptCode?>', '26', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['26'.$rows->v_UserDeptCode]) ? $date['26'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['27'.$rows->v_UserDeptCode]) ? $color['27'.$rows->v_UserDeptCode] : '' ?>id='27<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '27<?=$rows->v_UserDeptCode?>', '27', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['27'.$rows->v_UserDeptCode]) ? $date['27'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['28'.$rows->v_UserDeptCode]) ? $color['28'.$rows->v_UserDeptCode] : '' ?>id='28<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '28<?=$rows->v_UserDeptCode?>', '28', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['28'.$rows->v_UserDeptCode]) ? $date['28'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['29'.$rows->v_UserDeptCode]) ? $color['29'.$rows->v_UserDeptCode] : '' ?>id='29<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '29<?=$rows->v_UserDeptCode?>', '29', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['29'.$rows->v_UserDeptCode]) ? $date['29'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['30'.$rows->v_UserDeptCode]) ? $color['30'.$rows->v_UserDeptCode] : '' ?>id='30<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '30<?=$rows->v_UserDeptCode?>', '30', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['30'.$rows->v_UserDeptCode]) ? $date['30'.$rows->v_UserDeptCode] : '' ?></td>
				<td <?= isset($color['31'.$rows->v_UserDeptCode]) ? $color['31'.$rows->v_UserDeptCode] : '' ?>id='31<?=$rows->v_UserDeptCode?>' onclick="changeColor(this, '31<?=$rows->v_UserDeptCode?>', '31', '<?=$rows->v_UserDeptCode?>', '<?=$this->session->userdata("v_UserName")?>', '<?=$month.$year?>','<?=$privilege[0]->user_priv?>')"><?= isset($date['31'.$rows->v_UserDeptCode]) ? $date['31'.$rows->v_UserDeptCode] : '' ?></td>
			</tr>
			<?php $numrow++?>
			<?php if (($numrow-1)==$count){ ?>
			<?php $lastno = $numrow ?>
			<?php for ($x = 0; $x <= (12 - ($lastno%12)); $x++) { ?>
			<?php $numrow++?>
			<tr>
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
				<td>&nbsp;</td>
				<td>&nbsp;</td>
			</tr>
			<?php  } ?>
			<?php  } ?>
			<?php if (($numrow-1)%12==0) { ?>
			</table>
	<table class="tbl-wo" border="0" align="center">
		<tr>
			<td style="padding-left:10px; padding: 8px;" colspan="2">
				<!--POL <span style="display: inline-block; width:10px;"></span> STRIP & POLISH ( POLISHABLE FLOORS )<span style="display: inline-block; width:10px;"></span> SHP
				<span style="display: inline-block; width:10px;"></span>
				SCR Buffing (Polishing Floors) <span style="display: inline-block; width:10px;"></span>CARPET SHAMPOO
				<span style="display: inline-block; width:10px;"></span>
				PWS
				<span style="display: inline-block; width:10px;"></span>
				PRESSURE WASHING ( PERIMETER DRAIN )-->
				<b>BF</b> - BUFFING <span style="display: inline-block; width:10px;"></span><b>SC</b> - SCRUBBING <span style="display: inline-block; width:10px;"></span><b>CS</b> - CARPET SHAMPOO <span style="display: inline-block; width:10px;"></span><b>HD</b> - HIGH DUSTING <span style="display: inline-block; width:10px;"></span><b>GC</b> - GEMS CLEANING
			</td>
		</tr>
		<tr>
			<td style="padding-left:10px; width:70px;">
				Remarks : 
			</td>
			<td style="border-bottom:1px solid black;">
			</td>
		</tr>
		<tr  height="20px">
			<td style="padding-left:10px; width:70px;">
			</td>
			<td style="border-bottom:1px solid black;">
			</td>
		</tr>
		<tr  height="20px">
			<td style="padding-left:10px; width:70px;">
			</td>
			<td style="border-bottom:1px solid black;">
			</td>
		</tr>
	</table>
	<table class="tbl-wo" border="0" align="center">
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

