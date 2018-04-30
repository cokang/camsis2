	<div id="Instruction" class="pr-printer">
		<div class="header-pr">PLANNED PREVENTIVE MAINTENANCE CHECKLIST</div>
		<?php if ($asst) { ?>
		<button onclick="javascript:myFunction('print_chklist1?asstno=<?=$this->input->get('asstno')?>&none=closed')" class="btn-button btn-primary-button" value="t">PRINT</button>
		<?php } ?>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
	</div>
	<?php if ($asst) { ?>
	<?php $header = '
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;margin-top:5px;margin-bottom:20px;">
			<tr>
				<td style="padding-left:0px; width:120px;" align="center"><img src="'.base_url().'images/penmedic2.png" style="width:100px; height:40px;"/></td>
				<td>
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="center"><b style="text-transform: uppercase;">Ap Facility Management Services</b></td>
						</tr>
						<tr>
							<td align="center"><b style="text-transform: uppercase;">IIUM MEDICAL CENTRE</b></td>
						</tr>
						<tr>
							<td align="center"><b style="text-transform: uppercase;">PLANNED PREVENTIVE MAINTENANCE CHECKLIST</b></td>
						</tr>
					</table>
				</td>
				<td style="padding-left:0px; width:120px;" align="center"><img src="'.base_url().'images/logo.png" style="width:145px; height:60px;"/></td>
			</tr>
		</table>
		'; echo $header;?>
		<style>
		
			.tbl-plan, .tbl-plan-2 ,.tbl-plan-3 ,.tbl-plan-4{
			border: 1px solid black;
			margin-bottom:20px;
			}
			.tbl-plan tr:nth-child(1),.tbl-plan-2 tr:nth-child(1),.tbl-plan-3 tr:nth-child(1),.tbl-plan-4 tr:nth-child(1){
				text-transform: uppercase;
				background-color:black; 
				color:white;
				padding-left:10px;
				font-size:13px;
			}
			.tbl-plan tr td:nth-child(4) {width:40%;}
			.tbl-plan tr td:nth-child(1),.tbl-plan tr td:nth-child(3){
				text-transform:uppercase;
				padding-left:10px;
				width:15%;
			}
			.tbl-plan tr td:nth-child(1) span,.tbl-plan-2 tr td:nth-child(1) span,.tbl-plan-3 tr td:nth-child(1) span,.tbl-plan-4 tr td:nth-child(1) span{
				padding-left:15px;
			}
			.tbl-plan tr:nth-child(2){
				font-weight:bold;
				height:40px;
			}
			.tbl-plan tr td span.sp_space{
				padding-left:10px;
				display:inline-block;
				text-transform: uppercase;
			}
			.tbl-plan tr.sp_ass td{
				padding-bottom:15px;
			}
			.tbl-plan-2 tr td:nth-child(1){
				padding-left:10px;
			}
			.tbl-plan-2 tr td ul{
				padding-left:15px;
				font-size:10px;
				margin-top:10px;
			}
			.tbl-plan-3 tr td:nth-child(1){
			  padding-left:10px;
			  width:50%;
			}
			.tbl-plan-3 tr td:nth-child(2),
			.tbl-plan-3 tr td:nth-child(3),
			.tbl-plan-3 tr td:nth-child(4){
			  width:10%;
			  text-align:center;
			}
			.tbl-plan-3 tr td:nth-child(5){
			  width:20%;
			  text-align:center;
			}
			.tbl-plan-3 tr td span.sp-text,.tbl-plan-4 tr td span.sp-text{
				padding-right:10px;
				display:inline-block;
			}
			.tbl-plan-3 tr td:nth-child(1) span.sp_small , .tbl-plan-4 tr td:nth-child(1) span.sp_small{
				font-size:6px;
				padding-left:18px;
			}
			.sp_tbl{
				margin:10px;
				border-collapse:collapse;
				font-size:12px;
				text-align:left;
				width:80%;
			}
			.sp_tbl tr td:nth-child(1){width:0.3%; font-weight:lighter;}
			.sp_tbl tr td:nth-child(2){text-align:left;}
			.sp_tbl tr td:nth-child(3){text-align:right; width:10%;}
			.tbl-plan-4 tr:nth-child(3){background:#eee;}
			.tbl-plan-4 tr td:nth-child(2),
			.tbl-plan-4 tr td:nth-child(3),
			.tbl-plan-4 tr td:nth-child(4),
			.tbl-plan-4 tr td:nth-child(6),
			.tbl-plan-4 tr td:nth-child(7),
			.tbl-plan-4 tr td:nth-child(8){width:7%; text-align:center;}
			.tbl-plan-4 tr td:nth-child(1){padding-left:10px;}
		</style>
		<table class="tbl-wo tbl-plan">
			<tr>
				<td colspan="4">Part 1 <span>Asset Details</span></td>
			</tr>
			
			<?php  if (!empty($_1)) {
						$nilai1 = "";
						$nilai1a = "";
						//echo print_r($asst);
						//echo print_r($typecd);
						?> 
					<?php $numrow = 1; foreach($_1 as $row):?> 
					
					<?php  if (($numrow % 2) == 0) {?>
					<tr>
							<td><?= isset($nilai1) == TRUE ? $nilai1 : 'N/A'?></td>
				  		<td>>> <span class="sp_space"><?= isset($nilai1a) == TRUE ? $nilai1a : 'N/A'?></span></td>
				  		<td><?= isset($row->description) == TRUE ? $row->description : 'N/A'?></td>
				  		<td>>> <span class="sp_space"><?= isset($row->d_value) == TRUE ? $row->d_value : 'N/A2'?></span></td>
					</tr>
					
					<?php  $nilai1 = ""; $nilai1a = "";} else {
								 $nilai1 = isset($row->description) == TRUE ? $row->description : 'N/A';
								 $nilai1a = isset($row->d_value) == TRUE ? $row->value : 'N/A1';
					} 
					
					?>
					
    				
					<?php $numrow++; ?> 			 
					<?php endforeach;?>  
						<?php } ?>
			
			
		</table>
		<table class="tbl-wo tbl-plan-2">
			<tr>
				<td>Part 2 <span>Safety / special precaution</span></td>
			</tr>
			<tr>
				<td>
					 <ul>
					 <?php  if (!empty($_2)) {?> 
					<?php $numrow = 1; foreach($_2 as $row):?> 
					<?= isset($row->description) == TRUE ? "<li>".$row->description."</li>" : 'N/A'?>
    				
					<?php $numrow++; ?> 			 
					<?php endforeach;?>  
						<?php } ?>
						<?php  for ($x = $numrow; $x <= 7; $x++) { ?>
				<li style="list-style-type: none;">&nbsp;</li>
					<?php  } ?>
					 </ul>
				</td>
			</tr>
		</table>
		<table class="tbl-wo tbl-plan-3" border="1px">
			<tr>
				<td>Part 3 <span>Qualitative Task</span> <span class="sp_small"> ( tick <img src="<?php echo base_url(); ?>images/tick3.png" class="img-tick2"/> where appropriate ) </span></td>
				<td>PASS</td>
				<td>Fail</td>
				<td>NA</td>
				<td>Remarks</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php  if (!empty($_3)) {?> 
			<?php $numrow = 1; foreach($_3 as $row):?> 
    		<tr>
				<td><span class="sp-text"><?=$numrow?></span><?= isset($row->description) == TRUE ? $row->description : 'N/A'?></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php $numrow++; ?> 			 
			<?php endforeach;?>  
				<?php } ?>
			
			<?php  for ($x = $numrow; $x <= 27; $x++) { ?>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		<?php  } ?>
		</table>
		<table class="tbl-wo tbl-plan-3" border="1px">
			<tr>
				<td>Part 4 <span>MAINTENANCE Task</span> <span class="sp_small"> ( tick <img src="<?php echo base_url(); ?>images/tick3.png" class="img-tick2"/> where appropriate ) </span></td>
				<td>PASS</td>
				<td>Fail</td>
				<td>NA</td>
				<td>Remarks</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php  if (!empty($_4)) {?> 
					<?php $numrow = 1; foreach($_4 as $row):?> 
    				<tr>
				<td><span class="sp-text"><?=$numrow?></span><?= isset($row->description) == TRUE ? $row->description : 'N/A'?></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php $numrow++; ?> 			 
			<?php endforeach;?>  
			<?php } ?>
			<?php  for ($x = $numrow; $x <= 14; $x++) { ?>
				<tr>
					<td>&nbsp;</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			<?php  } ?>
			
		</table>
		<table class="tbl-wo" border="0" align="center">
		<tr>
				<td style="" valign="top" align="center"><span style="font-size:7px; padding-left:30px;"><i>Copyright product of Advance Pact Sdn Bhd. All rights reserved.</i></span></td>
		</tr>
		</table>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	<div class="">
		<?php echo $header;?>
		<table class="tbl-wo tbl-plan-3" border="1">
			<tr>
				<td>Part 5 <span>Test Equipment/Tools</span> <span class="sp_small"> ( tick <img src="<?php echo base_url(); ?>images/tick3.png" class="img-tick2"/> where appropriate ) </span></td>
				<td></td>
			</tr>
			<tr>
				<td colspan="2">
					<table class="sp_tbl" border="0" align="left">
						<?php  if (!empty($_5)) {?> 
					<?php $numrow = 1; foreach($_5 as $row):?> 
						
						<tr style="background-color:white; color:black;">
							<td><div class="box2"></div></td>
							<td style=" padding-left:5px;"><?= isset($row->description) == TRUE ? $row->description : 'N/A'?></td>
							<td>S/N :</td>
							<td><hr class='dotted' style="margin:10px 10px 0px 5px;"/></td>
						</tr>
    				
					<?php $numrow++; ?> 			 
					<?php endforeach;?>  
						<?php } ?>
						
						<tr style="background-color:white; color:black;">
							<td><div class="box2"></div></td>
							<td><hr class='dotted' style="margin:10px 10px 0px 5px;"/></td>
							<td>S/N :</td>
							<td><hr class='dotted' style="margin:10px 10px 0px 5px;"/></td>
						</tr>
						<tr style="background-color:white; color:black;">
							<td><div class="box2"></div></td>
							<td><hr class='dotted' style="margin:10px 10px 0px 5px;"/></td>
							<td>S/N :</td>
							<td><hr class='dotted' style="margin:10px 10px 0px 5px;"/></td>
						</tr>
						<tr style="background-color:white; color:black;">
							<td><div class="box2"></div></td>
							<td><hr class='dotted' style="margin:10px 10px 0px 5px;"/></td>
							<td>S/N :</td>
							<td><hr class='dotted' style="margin:10px 10px 0px 5px;"/></td>
						</tr>
						<tr style="background-color:white; color:black;">
							<td><div class="box2"></div></td>
							<td><hr class='dotted' style="margin:10px 10px 0px 5px;"/></td>
							<td>S/N :</td>
							<td><hr class='dotted' style="margin:10px 10px 0px 5px;"/></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="tbl-wo tbl-plan-4" border="1px">
			<tr>
				<td colspan="8">Part 6 <span>QUANTITATIVE TASKS</span> <span class="sp_small"> ( tick <img src="<?php echo base_url(); ?>images/tick3.png" class="img-tick2"/> where appropriate ) </span></td>
			</tr>
			<tr>
				<td colspan="8">&nbsp;</td>
			</tr>
			<tr>
				<td>Test Description</td>
				<td>Unit of Measure</td>
				<td>Set Values</td>
				<td>Measured Values</td>
				<td style="text-align:center; width:15%;">Limit/ Tolerence</td>
				<td>PASS</td>
				<td>FAIL</td>
				<td>NA</td>
			</tr>
			
			<?php  if (!empty($_6)) {?> 
					<?php $numrow = 1; foreach($_6 as $row):?> 
			
			<tr>
				<td rowspan="2"><span class="sp-text"><?=$numrow?></span><?= isset($row->description) == TRUE ? $row->description : 'N/A'?></td>
				<td rowspan="2"><?= isset($row->uom) == TRUE ? $row->uom : 'N/A'?></td>
				<td><?= isset($row->set_val) == TRUE ? $row->set_val : 'N/A'?></td>
				<td></td>
				<td><?= isset($row->limit_tol) == TRUE ? $row->limit_tol : 'N/A'?></td>
				<td></td>
				<td></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
    				
					<?php $numrow++; ?> 			 
					<?php endforeach;?>  
						<?php } ?>
			
			<?php  for ($x = $numrow; $x <= 14; $x++) { ?>
    <tr>
				<td rowspan="2"></td>
				<td rowspan="2"></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		<?php  } ?>
			
			
		</table>
		<table class="tbl-wo tbl-plan">
			<tr>
				<td>Part 7 <span>Notes / Remarks</span></td>
			</tr>
			<tr>
				<td height="150px"></td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center">
			<tr>
				<td style="width:50%; padding:5px;" rowspan="0"> 
					<table class="tbl-wo-1" border="0" align="left">
						<tr>
							<td class="tbl-wo-data" colspan="2" style="padding-bottom:10px;">PPM has been performed in accordance to the checklist and equipment is functioning to the intended purpose</td>
						</tr>
						<tr>
							<td class="tbl-wo-data3" style="padding-bottom:10px;">Done By</td>
							<td>: <hr class='dotted' style="margin:3px 10px 10px 5px; width:10%;"/></td>
						</tr>
						<tr>
							<td class="tbl-wo-data3">Name</td>
							<td>: <span style="color:blue;"></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data3">Designation </td>
							<td><span style="color:blue;">: </span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data3">Date </td>
							<td><span style="color:blue;">: </span></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="" valign="top" align="center"><span style="font-size:7px; padding-left:30px;"><i>Copyright product of Advance Pact Sdn Bhd. All rights reserved.</i></span></td>
			</tr>
		</table>
	</div>
	
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	<?php } else { ?>
		<div style="color:red; text-align:center; font-size:40; margin-top:20%;">NO CHECKLIST PPM FOR THIS ASSET.</div>
	<?php } ?>
	</body>
</html>

