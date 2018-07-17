<?php if ($this->input->get('ex') == 'excel'){
	$filename ="Joint Inspection (".date('F', mktime(0, 0, 0, $month, 10)).")".$year.".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
}?>

<?php if ($this->input->get('ex') == ''){?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr">Joint Inspection Summary</div>
		<!-- <button onclick="javascript:myFunction('joint_ins?en=<?=$this->input->get('en')?>&hosp=IIUM&loc=<?=$this->input->get('loc')?>&month=<?=$fmonth?>&year=<?=$fyear?>&dept=<?=$this->input->get('dept')?>&none=closed&ex=ex');" class="btn-button btn-primary-button"> -->
		<button onclick="javascript:myFunction('joint_ins?en=<?=$this->input->get('en')?>&hosp=IIUM&loc=<?=$this->input->get('loc')?>&m=<?=$fmonth?>&y=<?=$fyear?>&dept=<?=$this->input->get('dept')?>&none=closed&ex=ex');" class="btn-button btn-primary-button">
			PRINT
		</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule?<?php echo '&m='.$this->input->get('m').'&y='.$this->input->get('y');?>';">
			CANCEL
		</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
		<a href="<?php echo base_url();?>index.php/contentcontroller/joint_ins?m=&loc=<?=$this->input->get('loc')?>&month=<?=$fmonth?>&year=<?=$fyear?>&ex=excel&none=close&en=<?=$this->input->get('en')?>&dept=<?=$this->input->get('dept')?>&hosp=IIUM" style="float:right; margin-right:40px;">
			<img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel">
		</a>
	<?php } ?>
	</div>
<?php } ?>


	<div class="menu" style="position:relative;">
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
		<?php include 'content_headprint.php';?>
<?php } ?>

<?php if ($this->input->get('ex') == ''){?>
		<div id="Instruction" >
			<center>
				<span style="display:block; ">View List : </span>
	<?php if($this->input->get('path') == 'JISSH') { ?>
				<span style="display: inline-block; margin-left: -110px;">Month:</span>
				<span style="display: inline-block; margin-left: 50px;">Year:</span>
				<span style="display: inline-block; margin-left: 50px;">Week:</span>
				<span style="display: inline-block; margin-left: 100px;">Dept Code:</span>
	<?php } ?>
				<form method="get" action="">
					<?php $month_list = array(
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
					);?>
					<?php echo form_dropdown('m', $month_list, set_value('m', isset($record[0]->Month) ? $record[0]->Month : $fmonth) , 'style="width: 90px;" id="cs_month"'); ?>
		
					<?php for ($dyear = '2015';$dyear <= date("Y");$dyear++){
						$year_list[$dyear] = $dyear;
					}?>
					<?php echo form_dropdown('y', $year_list, set_value('y', isset($record[0]->Year) ? $record[0]->Year : $year) , 'style="width: 65px;" id="cs_year"'); ?>

	<?php if($this->input->get('path') == 'JISSH') { ?>
					<?php $ji_week = array(
										'W1' => 'W1',
										'W3' => 'W3'
					);?>
					<?php echo form_dropdown('jiweek', $ji_week, set_value('jiweek',$jw) , 'style="width: 90px;" id="cs_month"'); ?>

					<input type="text" value="<?=isset($dcode) ? $dcode : ''?>" name="dept_code"/>
	<?php } ?>
					<input type="submit" value="Apply" onchange="javascript: submit()"/></center>
	<?php if($this->input->get('path') == 'JISSH') { ?>
					<input type="hidden" name="en" value="JISJNum">
					<input type="hidden" name="path" value="JISSH">
	<?php } else { ?>
					<input type="hidden" name="en" value="JIS">
	<?php } ?>
				</form>
			</center>
		</div>
<?php } ?>
		<div class="m-div">
	
<?php if($this->input->get('en') == 'JIS'){ ?>
	
			<table class="rport-header">
				<tr>
					<td colspan="5">Joint Inspection Summary <?= substr(date('M',mktime(0, 0, 0, $fmonth, 10)),0,3).' '.$year ?> - Housekeeping</td>
				</tr>
			</table>

			<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
				<tr style="text-align:center;font-weight:bold;">
					<th>Hospital</th>
					<th>User Locations</th>
					<th>Parameter</th>
					<th>Satisfactory</th>
					<th>Unsatisfactory</th>
					<th>Not Applicable</th>
					<th>Total</th>
				</tr>
				<?php if ($record) { ?>
					<?php foreach ($records as $row): ?>
				<tr>
					<td>
						<?php echo anchor ('contentcontroller/joint_ins?en=JISFH&hosp='.$row['hospital_code'].'&month='.$fmonth.'&year='.$fyear,isset($row['hospital_code']) ? $row['hospital_code'] : ''); ?>
					</td>
					<td><?=isset($row['totalloc']) ? $row['totalloc'] : ''?></td>
					<td><?=$row['Satisfactory'] + $row['Unstatisfactory'] - $row['Not_Applicable']?></td>
					<td><?=$row['Satisfactory']?></td>
					<td><?=$row['Unstatisfactory']?></td>
					<td><?=$row['Not_Applicable']?></td>
					<td><?=$row['Satisfactory'] + $row['Unstatisfactory']?></td>
				</tr>
					<?php endforeach; ?>
				<?php } ?>
			</table>

<?php }elseif($this->input->get('en') == 'JISFH'){ ?>

			<table class="rport-header">
				<tr>
					<td colspan="5">
						Joint Inspection Summary : <?=isset($hosp) ? $hosp : ''?> <?= substr(date('M',mktime(0, 0, 0, $fmonth, 10)),0,3).' '.$year ?> - Housekeeping
					</td>
				</tr>
			</table>

			<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
				<tr style="text-align:center;font-weight:bold;">
					<th>Department</th>
					<th>DCA Done</th>
					<th>User Locations</th>
					<th>Satisfactory</th>
					<th>Unsatisfactory</th>
					<th>Not Applicable</th>
					<th>Total</th>
				</tr>
				<?php $total = 0; ?>
				<?php foreach ($records as $list): ?>
				<tr>
					<td>
						<?php echo anchor ('contentcontroller/joint_ins?en=JISBMI&dept='.$list['Dept_Code'].'&hosp='.$list['hospital_code'].'&month='.$fmonth.'&year='.$fyear,isset($list['v_UserDeptDesc']) ? $list['v_UserDeptDesc'] : ''); ?>
					</td>
					<?php if ($deptlist) { ?>
						<?php if (in_array($list['Dept_Code'],$deptlist)) { ?>
							<?php foreach ($locdet as $dcaloc): ?>
								<?php if ($dcaloc->v_UserDeptCode == $list['Dept_Code']){ ?>
					<td><?=isset($dcaloc->totalloc) ? $dcaloc->totalloc : ''?></td>
								<?php } ?>
							<?php endforeach; ?>
						<?php } ?>
					<?php } else { ?>
					<td>0</td>
					<?php } ?>
					<td><?=isset($list['totalloc']) ? $list['totalloc'] : ''?></td>
					<td><?=isset($list['Satisfactory']) ? $list['Satisfactory'] : ''?></td>
					<td><?=isset($list['Unstatisfactory']) ? $list['Unstatisfactory'] : ''?></td>
					<td><?=isset($list['Not_Applicable']) ? $list['Not_Applicable'] : ''?></td>
					<?php $total = $list['Satisfactory'] + $list['Unstatisfactory']; ?>
					<td><?=$total?></td>
				</tr>
				<?php endforeach; ?>
			</table>

<?php }elseif($this->input->get('en') == 'JISBMI'){ ?>

			<table class="rport-header">
				<tr>
					<td colspan="5">
						Joint Inspection Summary Hospital : <?=isset($hosp) ? $hosp : ''?> >> <?=isset($dept) ? $dept : ''?> <?= substr(date('M',mktime(0, 0, 0, $fmonth, 10)),0,3).' '.$year ?> - Housekeeping
					</td>
				</tr>
			</table>

			<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
				<tr style="text-align:center;font-weight:bold;">
					<th>User Locations</th>
					<th>Inspection<br />Scheduled</th>
					<th>Satisfactory</th>
					<th>Unsatisfactory</th>
					<th>Not Applicable</th>
					<th>Total</th>
				</tr>
				<?php $total = 0; ?>
				<?php foreach ($records as $loc): ?>
				<tr>
					<td>
						<?php echo anchor ('contentcontroller/joint_ins?en=JISDoc&loc='.$loc['V_location_code'].'&dept='.$loc['v_UserDeptCode'].'&hosp='.$loc['V_Hospitalcode'].'&month='.$fmonth.'&year='.$fyear.'&locname='.$loc['v_Location_Name'],isset($loc['v_Location_Name']) ? $loc['v_Location_Name'] : ''); ?>
					</td>
					<td>Unit</td>
					<td><?=isset($loc['Satisfactory']) ? $loc['Satisfactory'] : ''?></td>
					<td><?=isset($loc['Unstatisfactory']) ? $loc['Unstatisfactory'] : ''?></td>
					<td><?=isset($loc['Not_Applicable']) ? $loc['Not_Applicable'] : ''?></td>
					<?php $total = $loc['Satisfactory'] + $loc['Unstatisfactory'] + $loc['Not_Applicable']; ?>
					<td><?=$total?></td>
				</tr>
				<?php endforeach; ?>
			</table>

<?php }elseif($this->input->get('en') == 'JISDoc'){ ?>

			<table class="rport-header">
				<tr>
					<td colspan="5">Joint Inspection Summary <?= substr(date('M',mktime(0, 0, 0, $fmonth, 10)),0,3).' '.$year ?> - Housekeeping</td>
				</tr>
			</table>

			<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
				<tr>
					<th rowspan="2">Date</th>
					<th rowspan="2">Document No</th>
					<th rowspan="2">Attendees</th>
					<th colspan="6">Satisfactory</th>
				</tr>
				<tr>
					<td>Floors</td>
					<td>Walls/<br /> Doors</td>
					<td>Ceiling</td>
					<td>Windows</td>
					<td>Fixtures</td>
					<td>Furniture & Fitting</td>
				</tr>
				<?php foreach ($record as $ld): ?>
				<tr>
					<td><?=isset ($ld['Job_Date']) ? date("d-m-Y",strtotime($ld['Job_Date'])) : ''?></td> 
					<!--<?php echo anchor ('contentcontroller/joint_ins?&en=JISJNum&date='.$ld->Job_Date.'&dept='.$ld->Dept_Code.'&hosp='.$ld->hospital_code.'&month='.$fmonth.'&year='.$fyear,isset ($ld->Job_Date) ? date("d-m-Y",strtotime($ld->Job_Date)) : ''); ?>-->
					<td>
						<?php echo anchor ('contentcontroller/joint_ins?&en=JISJNum&dept='.$ld['Dept_Code'].'&hosp='.$ld['hospital_code'].'&month='.$fmonth.'&year='.$fyear.'&jino='.$ld['ji_no'].'&date='.$ld['Job_Date'],isset($ld['ji_no']) ? $ld['ji_no'] : ''); ?>
					</td>
					<td>Unit</td>
					<td><?=isset ($ld['Floor']) ? $ld['Floor'] : ''?></td>
					<td><?=isset ($ld['WallDoor']) ? $ld['WallDoor'] : ''?></td>
					<td><?=isset ($ld['Ceiling']) ? $ld['Ceiling'] : ''?></td>
					<td><?=isset ($ld['Windows']) ? $ld['Windows'] : ''?></td>
					<td><?=isset ($ld['Fixtures']) ? $ld['Fixtures'] : ''?></td>
					<td><?=isset ($ld['FurnitureFitting']) ? $ld['FurnitureFitting'] : ''?></td>
				</tr>
				<?php endforeach; ?>
			</table>

<?php }elseif($this->input->get('en') == 'JISJNum'){ ?>

			<table class="rport-header">
				<tr>
					<td colspan="5">Joint Inspection Summary <?= substr(date('M',mktime(0, 0, 0, $fmonth, 10)),0,3).' '.$year ?> - Housekeeping</td>
				</tr>
			</table>
	
			<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
				<tr>
					<th>Item</th>
					<th>Detail</th>
				</tr>
				<tr>
					<td>Hospital</td>
					<td><?=isset($hosp) ? $hosp : ''?></td>
				</tr>
				<tr>
					<td>Joint Inspection No.</td>
					<td><?=isset($jino) ? $jino : ''?></td>
				</tr>
				<tr>
					<td>Date</td>
					<td><?=isset($jobdate) ? date("d-m-Y",strtotime($jobdate)) : ''?></td>
				</tr>
				<tr>
					<td>IIUM Representative</td>
					<td></td>
				</tr>
				<tr>
					<td>Designation</td>
					<td></td>
				</tr>
				<tr>
					<td>Contractor Representive</td>
					<td></td>
				</tr>
			</table>
			<!-- </td>
		</tr>
	</table> --> <!-- bazli comment dulu sebab xjumpe pembuka -->
		</div>
		<table class="tftable" border="1" style="text-align:center; width:70%;" align="center">
			<tr>
				<th rowspan="2">User Location</th>
				<th colspan="6">Satisfactory?</th>
			</tr>
			<tr>
				<td>Floors</td>
				<td>Walls/ door</td>
				<td>Ceiling</td>
				<td>Windows</td>
				<td>Fixtures</td>
				<td>Furniture & Fitting</td>
			</tr>
			<?php if ($record) { ?>
				<?php foreach ($record as $ji): ?>
			<tr>
				<td><?=isset($ji['v_Location_Name']) ? $ji['v_Location_Name'] : ''?></td>
				<td><?=isset($ji['Floor']) ? $ji['Floor'] : ''?></td>
				<td><?=isset($ji['WallDoor']) ? $ji['WallDoor'] : ''?></td>
				<td><?=isset($ji['Ceiling']) ? $ji['Ceiling'] : ''?></td>
				<td><?=isset($ji['Windows']) ? $ji['Windows'] : ''?></td>
				<td><?=isset($ji['Fixtures']) ? $ji['Fixtures'] : ''?></td>
				<td><?=isset($ji['FurnitureFitting']) ? $ji['FurnitureFitting'] : ''?></td>
			</tr>
				<?php endforeach; ?>
			<?php } ?>
		</table>

<?php } ?>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<table width="99%" border="0">
	<tr>
		<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
	</tr>
	<tr>
		<td width="50%">Joint Inspection Summary <?=date('F', mktime(0, 0, 0, $fmonth, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
		<td width="50%" align="right"></td>
	</tr>
</table>
<?php } ?>
<!-- </div> --><!-- bazli comment dulu sebab xjumpe pembuka -->
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
