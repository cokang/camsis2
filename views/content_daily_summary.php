<?php
$name = $this->input->get('en');
if ($this->input->get('ex') == 'excel'){
$filename = $name."-".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr"><?php if($this->input->get('en') == 'cls'){ ?>Daily Cleaning Activity Summary <?php }elseif($this->input->get('en') == 'clshosp'){?>Cleansing Summary Report for Hospital<?php }elseif($this->input->get('en') == 'clsdate'){?>Daily Cleaning Activity Detail for Hospital<?php } ?></div>
     <button onclick="javascript:myFunction('daily_summary?en=<?=$this->input->get('en')?>&month=<?=$fmonth?>&year=<?=$fyear?>&none=closed&dept=<?=$this->input->get('dept')?>&hosp=<?=$this->input->get('hosp')?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule?m=<?=$fmonth?>&y=<?=$fyear?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/daily_summary?&month=<?=$fmonth?>&year=<?=$fyear?>&ex=excel&none=close&en=<?=$this->input->get('en')?>&dept=<?=$this->input->get('dept')?>&hosp=<?=$this->input->get('hosp')?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<?php } ?>
</div>
<?php } ?>
<div class="menu" style="position:relative;">
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>

<?php if ($this->input->get('none') == '') { ?>
	<div  class="menu_sr">
		<table width="98%" class="ui-content-middle-htd">
			<tr >
				<td class="ui-desk-style-table">
				<form method="get" action=""><!--<form action="" method="POST" name="myform">-->
				 <table class="ui-float-asset-reg">
				  <tr>
					<th>Month</th>
					<th>Year</th>
					<th></th>
				  </tr>
				  <tr>
				    <td style=" padding-right:15px;">
					<?php 
						$month_list = array(
						'01' => 'January',
						'02' => 'February',
						'03' => 'March',
						'04' => 'April',
						'05' => 'May',
						'06' => 'June',
						'07' => 'July',
						'08' => 'August',
						'09' => 'September',
						'10' => 'October',
						'11' => 'November',
						'12' => 'December'
					 );
					?>
					<?php echo form_dropdown('fromMonth', $month_list, set_value('fromMonth',$fmonth) , 'style="width: 90px;" id="cs_month"'); ?>
					</td>
					 <td style=" padding-right:15px;">
					<?php 
						for ($dyear = '2016';$dyear <= date("Y");$dyear++){
							$year_list[$dyear] = $dyear;
						}
					?>
					<?php echo form_dropdown('fromYear', $year_list, set_value('fromYear',$fyear) , 'style="width: 65px;" id="cs_year"'); ?>  
					</td>
					<td style="width: 100px;"><input type="submit" class="btn-button btn-primary-button" style="width: 90px; margin-left:auto;margin-right:auto;" value="Show" onchange="this.form.submit()"></td>
				  </tr>
				 </table>
				 <input type="hidden" name="en" value="cls">
				</form>
				</td>
			</tr>
		</table>
	</div>
<?php } ?>
		<div class="div-p"></div>
		<?php if($this->input->get('en') == 'cls'){ ?>
		<table width="98%" class="ui-content-middle-htd">
			<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="2" class="ui-header-new"><span style="float: left; font-weight: bold;">Daily Cleaning Activity Summary <?=date('F', mktime(0, 0, 0, $fmonth, 10))?> <?=$fyear ?></td>
			</tr>
			<tr >
				<td class="ui-desk-style-table">
				 <table class="ui-float-asset-reg">
				  <tr>
				    <th rowspan="2">Hospital</th>
					<th rowspan="2">Month</th>
					<th colspan="2">Cleansing</th>
					<th colspan="2">Waste Collection</th>
					<!--<th rowspan="2">Insufficient Consumables</th>-->
				  </tr>
				  <tr>
				    <td>Not Done</td>
					<td>Not to Schedule</td>
					<td>Not Done</td>
					<td>Not to Schedule</td>
				  </tr>
				  <?php
				  $tc_yellow = 0;
				  $tc_red = 0;
				  $tw_yellow = 0;
				  $tw_red = 0;
				  ?>
				  <?php foreach ($record as $row): ?>
				  <tr>
				  <?php if  ($this->input->get('ex') != 'excel'){ ?>
				  <td><?php echo anchor ('contentcontroller/daily_summary?en=clshosp&hosp='.$row->hospital_code.'&month='.$fmonth.'&year='.$fyear,$row->hospital_code); ?></td>
				  <?php }else{ ?>
				  <td> <?=isset($row->hospital_code) ? $row->hospital_code : ''?></td>
				  <?php } ?>
				   <td><?=date('F', mktime(0, 0, 0, $fmonth, 10))?></td>
					<td><?=isset($row->Cleansing_red) ? $row->Cleansing_red : ''?></td>
					<td><?=isset($row->Cleansing_yellow) ? $row->Cleansing_yellow : ''?></td>
					<td><?=isset($row->Waste_red) ? $row->Waste_red : ''?></td>
					<td><?=isset($row->Waste_yellow) ? $row->Waste_yellow : ''?></td>
					<!--<td>2</td>-->
				  </tr>
				  <?php
				  	$tc_yellow += $row->Cleansing_yellow;
				  	$tc_red += $row->Cleansing_red;
				  	$tw_yellow += $row->Waste_yellow;
				  	$tw_red += $row->Waste_red
				  ?>
				  <?php endforeach; ?>
				  <tr>
				    <td align="right" style="font-weight:bold;">Grand Total</td>
					<td><?=date('F', mktime(0, 0, 0, $fmonth, 10))?></td>
					<td><?=$tc_red?></td>
					<td><?=$tc_yellow?></td>
					<td><?=$tw_red?></td>
					<td><?=$tw_yellow?></td>
					<!--<td>2</td>-->
				  </tr>
				 </table>
				</td>
			</tr>
		</table>
		<?php }elseif($this->input->get('en') == 'clshosp'){ ?>
		<table width="98%" class="ui-content-middle-htd">
			<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="2" class="ui-header-new"><span style="float: left; font-weight: bold;">Cleansing Summary Report for Hospital : <?=isset($hosp) ? $hosp : ''?> <?=date('F', mktime(0, 0, 0, $fmonth, 10))?> <?=$fyear ?></td>
			</tr>
			<tr >
				<td class="ui-desk-style-table">
				 <table class="ui-float-asset-reg">
				  <tr>
				    <th rowspan="2">User Area</th>
					<th rowspan="2">No of User Location</th>
					<th colspan="2">Cleansing</th>
					<th colspan="2">Waste Collection</th>
					<!--<th rowspan="2">Insufficient Consumables</th>-->
				  </tr>
				  <tr>
				    <td>Not Done</td>
					<td>Not to Schedule</td>
					<td>Not Done</td>
					<td>Not to Schedule</td>
				  </tr>
				  <?php
				  $tc_yellow = 0;
				  $tc_red = 0;
				  $tw_yellow = 0;
				  $tw_red = 0;
				  $totalloc = 0;
				  ?>
				  <?php foreach ($recordhosp as $list): ?>
				  <tr>
				  <?php if  ($this->input->get('ex') != 'excel'){ ?>
				  <td><?php echo anchor ('contentcontroller/daily_summary?en=clsdate&dept='.$list->Dept_Code.'&hosp='.$list->hospital_code.'&month='.$fmonth.'&year='.$fyear,$list->Dept_Code); ?></td>
				  <?php }else{ ?>
				  <td> <?=isset($list->Dept_Code) ? $list->Dept_Code : ''?></td>
				  <?php } ?>
				    
				    <?php foreach ($locdet as $loc) { ?>
				    <?php if ($loc->v_UserDeptCode == $list->Dept_Code){ ?>
					<td><?=isset($loc->totalloc) ? $loc->totalloc : ''?></td>
					<?php $totalloc += $loc->totalloc ?>
					<?php } ?>
					<?php } ?>
					<td><?=isset($list->Cleansing_red) ? $list->Cleansing_red : ''?></td>
					<td><?=isset($list->Cleansing_yellow) ? $list->Cleansing_yellow : ''?></td>
					<td><?=isset($list->Waste_red) ? $list->Waste_red : ''?></td>
					<td><?=isset($list->Waste_yellow) ? $list->Waste_yellow : ''?></td>
					<!--<td>2</td>-->
				  </tr>
				  <?php
				  	$tc_yellow += $list->Cleansing_yellow;
				  	$tc_red += $list->Cleansing_red;
				  	$tw_yellow += $list->Waste_yellow;
				  	$tw_red += $list->Waste_red
				  ?>
				<?php endforeach; ?>
				  <tr>
				    <td style="font-weight:bold;">Grand Total</td>
					<td><?=$totalloc?></td>
					<td><?=$tc_red?></td>
					<td><?=$tc_yellow?></td>
					<td><?=$tw_red?></td>
					<td><?=$tw_yellow?></td>
					<!--<td>2</td>-->
				  </tr>
				 </table>
				</td>
			</tr>
		</table>
		<?php }elseif($this->input->get('en') == 'clsdate'){ ?>
		<table width="98%" class="ui-content-middle-htd">
			<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="2" class="ui-header-new"><span style="float: left; font-weight: bold;">Daily Cleaning Activity Detail for Hospital : <?=isset($hosp) ? $hosp : ''?> >> <?=isset($dept) ? $dept : ''?> <?=date('F', mktime(0, 0, 0, $fmonth, 10))?> <?=$fyear ?></td>
			</tr>
			<tr >
				<td class="ui-desk-style-table">
				 <table class="ui-float-asset-reg">
				  <tr>
				    <th rowspan="2">Date</th>
					<th colspan="2">Cleansing</th>
					<th colspan="2">Waste Collection</th>
					<!--<th rowspan="2">Insufficient Consumables</th>-->
				  </tr>
				  <tr>
				    <td>Not Done</td>
					<td>Not to Schedule</td>
					<td>Not Done</td>
					<td>Not to Schedule</td>
				  </tr>
				  <?php
				  $tc_yellow = 0;
				  $tc_red = 0;
				  $tw_yellow = 0;
				  $tw_red = 0;
				  $totalloc = 0;
				  ?>
				  <?php foreach($recorddate as $rd): ?>
				  <tr>
				    <td><?=isset($rd->Job_Date) ? date("d-m-Y",strtotime($rd->Job_Date)) : ''?></td>
					<td><?=isset($rd->Cleansing_red) ? $rd->Cleansing_red : ''?></td>
					<td><?=isset($rd->Cleansing_yellow) ? $rd->Cleansing_yellow : ''?></td>
					<td><?=isset($rd->Waste_red) ? $rd->Waste_red : ''?></td>
					<td><?=isset($rd->Waste_yellow) ? $rd->Waste_yellow : ''?></td>
					<!--<td>2</td>-->
				  </tr>
				  <?php
				  	$tc_yellow += $rd->Cleansing_yellow;
				  	$tc_red += $rd->Cleansing_red;
				  	$tw_yellow += $rd->Waste_yellow;
				  	$tw_red += $rd->Waste_red
				  ?>
				  <?php endforeach; ?>
				  <tr>
				    <td style="font-weight:bold;">Grand Total</td>
					<td><?=$tc_red?></td>
					<td><?=$tc_yellow?></td>
					<td><?=$tw_red?></td>
					<td><?=$tw_yellow?></td>
					<!--<td>2</td>-->
				  </tr>
				 </table>
				</td>
			</tr>
		</table>
		<?php if ($this->input->get('path') == 'DCAD'){ ?>
			<ul class="pagination ">
			<?php if (count($rec) > $limit){ ?>
			  <?php for ($i=1;$i<=$page;$i++){ ?>
			  <li>&nbsp;<a href="?en=clsdate&path=DCAD&p=<?php echo $i?>"><?=$i?></a></li>
			  <?php } ?>
			  <li><a href="?en=clsdate&path=DCAD&p=<?php echo $page?>">Next</a></li>
			  <?php } ?>
			</ul>
		<style>
ul.pagination {
    display: inline-block;
    padding: 0px;
    margin: 5px 0;
	background:#ccc;
}
ul.pagination li {display: inline-block;}

ul.pagination li a {
    display: inline-block;
	padding: 8px 15px;
	text-decoration: none;
	font-weight: bold;
	color: #069;
	background-color: #ccc;
	border-right: 1px solid #ccc;
}
ul.pagination li a:hover {
	color: #c00;
	background-color: #f2f2f2; }
ul.pagination  li.active a {
  background: #f2f2f2;
}
		</style>
    	 <?php } ?>
		<?php }elseif($this->input->get('en') == 'clsmon'){ ?>
		<table width="98%" class="ui-content-middle-htd">
			<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="2" class="ui-header-new"><span style="float: left; font-weight: bold;">Cleansing Summary Report for Month : Jan</td>
			</tr>
			<tr >
				<td class="ui-desk-style-table">
				 <table class="ui-float-asset-reg">
				  <tr>
				    <th rowspan="2">Date</th>
					<th colspan="2">Cleansing</th>
					<th colspan="2">Waste Collection</th>
					<th rowspan="2">Insufficient Consumables</th>
				  </tr>
				  <tr>
				    <td>Not Done</td>
					<td>Not to Schedule</td>
					<td>Not Done</td>
					<td>Not to Schedule</td>
				  </tr>
				  <tr>
				    <td><?php echo anchor ('contentcontroller/daily_summary?en=clsmondate','22 jan 2015'); ?></td>
					<td>2</td>
					<td>2</td>
					<td>2</td>
					<td>2</td>
					<td>2</td>
				  </tr>
				  <tr>
				    <td align="right" style="font-weight:bold;">Grand Total</td>
					<td>2</td>
					<td>2</td>
					<td>2</td>
					<td>2</td>
					<td>2</td>
				  </tr>
				 </table>
				</td>
			</tr>
		</table>
		<?php }elseif($this->input->get('en') == 'clsmondate'){ ?>
		<table width="98%" class="ui-content-middle-htd">
			<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="2" class="ui-header-new"><span style="float: left; font-weight: bold;">Cleansing Summary Report for date : 22 jan 2015</td>
			</tr>
			<tr >
				<td class="ui-desk-style-table">
				 <table class="ui-float-asset-reg">
				  <tr>
				    <th rowspan="2">User Area</th>
					<th rowspan="2">User Location</th>
					<th colspan="2">Cleansing</th>
					<th colspan="2">Waste Collection</th>
					<th rowspan="2">Insufficient Consumables</th>
				  </tr>
				  <tr>
				    <td>Not Done</td>
					<td>Not to Schedule</td>
					<td>Not Done</td>
					<td>Not to Schedule</td>
				  </tr>
				  <tr>
				    <td>Ward 5B</td>
					<td>Jan</td>
					<td>2</td>
					<td>2</td>
					<td>2</td>
					<td>2</td>
					<td>2</td>
				  </tr>
				  <tr>
				    <td style="font-weight:bold;">Grand Total</td>
					<td>Jan</td>
					<td>2</td>
					<td>2</td>
					<td>2</td>
					<td>2</td>
					<td>2</td>
				  </tr>
				 </table>
				</td>
			</tr>
		</table>
		<?php } ?>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%"><?php if($this->input->get('en') == 'cls'){ ?>Daily Cleaning Activity Summary <?php }elseif($this->input->get('en') == 'clshosp'){?>Cleansing Summary Report for Hospital<?php }elseif($this->input->get('en') == 'clsdate'){?>Daily Cleaning Activity Detail for Hospital<?php } ?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
</div>

<?php } ?>
	<style>
	.ui-float-asset-reg{
	border:1px solid #79B6D8;
	color:black;
	border-collapse:collapse;
	width:98%;
	margin:10px auto;
	text-align:center;
	}
	.ui-float-asset-reg tr th{
	border:1px solid black;
	background:white;
	}
	.ui-float-asset-reg tr td{
	border:1px solid black;
	padding-left:15px;
	}
	.ui-float-asset-reg tr:nth-child(2n+1){
	background:white;
	}
	.ui-float-asset-reg tr td a{
	color:#79B6D8;
	}
	.menu_sr{
		display:block;
		width:30%;
		margin-left:auto;
		margin-right:auto;
	}
	</style>