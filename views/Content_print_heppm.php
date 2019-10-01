<body>
	<?php if ($this->input->get('none') != 'closed'){?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr"> PPM </div>
		<?php if ($records_head) { ?>
		<button onclick="javascript:myFunction('print_heppm?wrk_ord=<?php echo $this->input->get('wrk_ord');?>&asstno=<?php echo $this->input->get('asstno');?>&none=closed&pr=<?php echo $print;?>');" class="btn-button btn-primary-button">PRINT</button>
		<?php } ?>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
	</div>
	<?php }?>
	<?php if ($records_head) { ?>
	<div class="form">
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;margin-top:5px;margin-bottom:20px;">
			<tr>
				<td style="padding-left:0px; width:120px;" align="center"><img src="<?php echo base_url(); ?>images/penmedic2.png" style="width:100px; height:30px;"/></td>
				<td>
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="center"><b style="text-transform: uppercase;">FACILITY MANAGEMENT SERVICES</b></td>
						</tr>
						<tr>
							<td align="center"><b style="text-transform: uppercase;">IIUM MEDICAL CENTRE</b></td>
						</tr>
						<tr>
							<td align="center"><b style="text-transform: uppercase;">PLAN PREVENTIVE MAINTENANCE CHECKLIST</b></td>
						</tr>
					</table>
				</td>
				<!--<td style="padding-left:5px; width:90px;" align="center"> 
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="right"><b style="text-transform: uppercase; font-size:6;"><i>Task No. <?=$records_head[$print-1]->task_nod?></i></b></td>
						</tr>
						<tr>
							<td align="right"><b style="text-transform: uppercase; font-size:6;"><i>QBP-002 : BFF-005</i></b></td>
						</tr>
						<tr>
							<td align="right"><b style="font-size:6;"><i>Revision 1.0</i></b>  </td>
						</tr>
						<tr>
							<td align="right"><b style="font-size:6;"><i><?php echo date("j-M-y")?></i></b></td>
						</tr>
						<tr>
							<td align="right"><b style="font-size:6;"><i>Page :  1 of 2</i></b></td>
						</tr>
					</table>
				</td>-->
				<td style="padding-left:0px; width:120px;" align="center"><img src="<?php echo base_url(); ?>images/logo.png" style="width:100px; height:40px;"/></td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="font-weight:bold;">
			<tr>
				<td style="width:17%">Assets Category : </td>
				<td style=""><?=$records_head[$print-1]->asset_cat?></td>
				<td style="width:15%"> Workgroup : </td>
				<td style=""> <?=$records_head[$print-1]->wrkgrp?> </td>
			</tr>
			<tr>
				<td>Work Request No. :</td>
				<td><?php echo $this->input->get('wrk_ord');?></td>
				<td>Frequency :</td>
				<td><?=$records_head[$print-1]->freq?></td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="">
			<tr>
				<td style="height:10px; width:50%;" class="" colspan="" rowspan="" >
					<table class="tbl-wo" border="1" align="left" style="">
						<tr>
							<td valign="top" style="padding-left:5px;"><b>CAUTION : <br> Ensure the stipulated safety procedures are followed while carrying out the PM activities</b></td>
						</tr>
					</table>
				</td>
				<td style="height:10px; width:50%;" class="" colspan="" rowspan="" align="center">
					<table class="tbl-wo" border="0" align="right" style=" width:40%;">
						<tr>
							<td valign="top" align="right" style="width:80%;">Estimated <br />PM Hours :</td>
							<td valign="top" style="width:20%;"><div class="box3" style="margin-left:3px;"></td>
						</tr>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<?php 
		$e = "";
		$f = "";
		$g = "";
		$h = "";
		?>
		<?php for($char = 'A'; $char <= 'K'; $char++){ ?>
		<?php if ($char == 'E') { ?>
		<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;margin-top:5px;margin-bottom:20px;">
			<tr>
				<td style="padding-left:0px; width:120px;" align="center"><img src="<?php echo base_url(); ?>images/penmedic2.png" style="width:100px; height:30px;"/></td>
				<td>
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="center"><b style="text-transform: uppercase;">AP FACILITY MANAGEMENT SERVICES IIUM MEDICAL CENTRE</b></td>
						</tr>
						<tr>
							<td align="center"><b style="text-transform: uppercase;">Hospital Engineering Planned Preventive Maintenance</b></td>
						</tr>
						<tr>
							<td align="center"><b style="text-transform: uppercase;">(heppm)</b></td>
						</tr>
					</table>
				</td>
				<!--<td style="padding-left:5px; width:90px;" align="center"> 
					<table class="tbl-wo" border="0" align="center">
						<tr>
							<td align="right"><b style="text-transform: uppercase; font-size:6;"><i>Task No. <?=$records_head[$print-1]->task_nod?></i></b></td>
						</tr>
						<tr>
							<td align="right"><b style="text-transform: uppercase; font-size:6;"><i>QBP-002 : BFF-005</i></b></td>
						</tr>
						<tr>
							<td align="right"><b style="font-size:6;"><i>Revision 1.0</i></b>  </td>
						</tr>
						<tr>
							<td align="right"><b style="font-size:6;"><i><?php echo date("j-M-y")?></i></b></td>
						</tr>
						<tr>
							<td align="right"><b style="font-size:6;"><i>Page :  2 of 2</i></b></td>
						</tr>
					</table>
				</td>-->
				<td style="padding-left:0px; width:120px;" align="center"><img src="<?php echo base_url(); ?>images/logo.png" style="width:100px; height:40px;"/></td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="font-weight:bold;">
			<tr>
				<td style="width:13%">Assets Category : </td>
				<td style=""><?=$records_head[$print-1]->asset_cat?></td>
				<td style="width:10%"> Workgroup : </td>
				<td style=""> <?=$records_head[$print-1]->wrkgrp?> </td>
			</tr>
			<tr>
				<td>Work Request No. :</td>
				<td></td>
				<td>Frequency :</td>
				<td><?=$records_head[$print-1]->freq?></td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<?php } ?>
		<table class="tftabler" border="1" style="text-align:center; width:90%;" align="center">
			<?php if (!empty(${$char})){ ?>
			<?php  if (in_array($records_head[$print-1]->task_no,${'task'.$char})) {?>
			<tr>
				<th rowspan="2" class="tftable-th-black"><?=$char?></th>
				<th rowspan="2"><?php print_r(${$char}[0]->description);?></th>
				<th colspan="2" width="40px">Comply</th>
				<th rowspan="2">Remark</th>
			</tr>
			<tr>
				<td>YES</td>
				<td>NO</td>
			</tr>
			 
			<?php $numrow = 1; foreach(${$char} as $row):?> 
			<?php if ($row->task_no == $records_head[$print-1]->task_no) {?> 
			<tr>
				<td class="tftable-td-white" width="41px"><?= isset($row->nom) == TRUE ? $row->nom : '&nbsp;'?></td>
				<td class="tftable-td-white" align="left" width="70%"><?= isset($row->desc_value) == TRUE ? $row->desc_value : 'N/A'?></td>
				<td class="tftable-td-white"></td>
				<td class="tftable-td-white"></td>
				<td class="tftable-td-white"></td>
			</tr>
			<?php $numrow++; ?> 	
			<?php } ?>		 
			<?php endforeach;?>
			<?php
				if ($char == 'A'){
					$max = 6;
				}
				else if ($char == 'B'){
					$max = 12;
				}
				else if ($char == 'C'){
					$max = 12;
				}
				else if ($char == 'D'){
					$max = 17;
				}
			?>
			<?php if ($char == 'A' || $char == 'B' || $char == 'C' || $char == 'D') { ?>
			<?php  for ($x = $numrow; $x <= $max; $x++) { ?>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php } ?>
			<?php } ?>
			<?php } else { ?>
			<?php break; } ?>
			<?php } else { ?>
			<?php break; } ?>	  
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<?php } ?>
		<?php
			$e = $char++;
			$f = $char++;
			$g = $char++;
			$h = $char++;	
		?>
		<!--<table class="tftabler" border="1" style="text-align:center; width:90%;" align="center">
			<tr>
				<th rowspan="2" class="tftable-th-black">B</th>
				<th rowspan="2"><?=$B[0]->description;?></th>
				<th colspan="2" width="40px">Comply</th>
				<th rowspan="2">Remark</th>
			</tr>
			<tr>
				<td class="tftable-td-white">YES</td>
				<td class="tftable-td-white">NO</td>
			</tr>
				<?php  if (!empty($B)) {?> 
					<?php $numrow = 1; foreach($B as $row):?> 
					<?php if ($row->task_no == $records_head[$print-1]->task_no) {?> 
					<tr>
				<td class="tftable-td-white" width="41px"><?= isset($row->nom) == TRUE ? $row->nom : '&nbsp;'?></td>
				<td class="tftable-td-white" align="left" width="70%"><?= isset($row->desc_value) == TRUE ? $row->desc_value : 'N/A'?></td>
				<td class="tftable-td-white"></td>
				<td class="tftable-td-white"></td>
				<td class="tftable-td-white"></td>
					</tr>
    				
					<?php $numrow++; ?> 
					<?php } ?>			 
					<?php endforeach;?>  
						<?php } ?>
			<?php  for ($x = $numrow; $x <= 15; $x++) { ?>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php  } ?>		
			
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>-->
		<!--<table class="tftabler" border="1" style="text-align:center; width:90%;" align="center">
			<tr>
				<th rowspan="2" class="tftable-th-black">C</th>
				<th rowspan="2"><?=$C[0]->description;?></th>
				<th colspan="2" width="40px">Comply</th>
				<th rowspan="2">Remark</th>
			</tr>
			<tr>
				<td>YES</td>
				<td>NO</td>
			</tr>
			<?php  if (!empty($C)) {?> 
			<?php $numrow = 1; foreach($C as $row):?> 
			<?php if ($row->task_no == $records_head[$print-1]->task_no) {?> 
			<tr>
				<td class="tftable-td-white" width="41px"><?= isset($row->nom) == TRUE ? $row->nom : '&nbsp;'?></td>
				<td class="tftable-td-white" align="left" width="70%"><?= isset($row->desc_value) == TRUE ? $row->desc_value : 'N/A'?></td>
				<td class="tftable-td-white"></td>
				<td class="tftable-td-white"></td>
				<td class="tftable-td-white"></td>
			</tr>
			<?php $numrow++; ?> 
			<?php } ?>			 
			<?php endforeach;?>  
			<?php } ?>
			<?php  for ($x = $numrow; $x <= 21; $x++) { ?>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php  } ?>		
			
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>-->
		<!--<?php
		 /*$e = "E";
		 $f = "F";
		 $g = "G";
		 $h = "H";*/
		?>
		<?php  if (!empty($D)) {?> 
		<table class="tftabler" border="1" style="text-align:center; width:90%;" align="center">
			<tr>
				<th rowspan="2" class="tftable-th-black">D</th>
				<th rowspan="2" ><b><?=$D[0]->description;?></th>
				<th colspan="2" width="40px">Comply</th>
				<th rowspan="2">Remark</th>
			</tr>
			<tr>
				<td>YES</td>
				<td>NO</td>
			</tr>
					<?php $numrow = 1; foreach($D as $row):?> 
					<?php if ($row->task_no == $records_head[$print-1]->task_no) {?> 
					<tr>
			
				<td class="tftable-td-white" width="41px"><?= isset($row->nom) == TRUE ? $row->nom : 'N/A'?></td>
				<td class="tftable-td-white" width="70%" align="left"> <?= isset($row->desc_value) == TRUE ? $row->desc_value : 'N/A'?> </td>
				<td class="tftable-td-white" ></td>
				<td class="tftable-td-white" ></td>
				<td class="tftable-td-white"></td>
			</tr>
			<?php $numrow++; ?> 
			<?php } ?>			 
			<?php endforeach;?>  
			<?php  for ($x = $numrow; $x <= 7; $x++) { ?>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			<?php  } ?>		
		</table>
		<?php } else
		{$e = "D";
		 $f = "E";
		 $g = "F";
		 $h = "G";
		}
		?>	
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>-->
	</div>
		<div class="form">
		
		
		<table class="tftabler" border="1" style="text-align:center; width:90%;" align="center">
			<tr>
				<th rowspan="" class="tftable-th-black"><?=$e?></th>
				<th rowspan="" colspan="5"><b>SAFETY TEST </b></th>
			<tr>
				<td class="tftable-td-white" style="width:11%;" align="right">Parameter : </td>
				<td class="tftable-td-white" style="width:45%;"> Continuity </td>
				<td class="tftable-td-white" style="width:45%;"></td>
			</tr>
			<tr>
				<td class="tftable-td-white" align="right">Set Limits :</td>
				<td class="tftable-td-white"> - </td>
				<td class="tftable-td-white"></td>
			</tr>
			<tr>
				<td class="tftable-td-white" align="right">Data :</td>
				<td class="tftable-td-white"></td>
				<td class="tftable-td-white"></td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="">
			<tr>
				<td style="width:50%;" class="tftable-td-white" align="left"><b> <?=$f?>. Consumables used during maintenance :</b></td>
				<td style="width:50%;" class="tftable-td-white" align="left"><b> <?=$g?>. Part Replaced :</b> </td>
			</tr>
			<tr>
				<td>
					<table class="tbl-wo" border="0" align="left" style="border: 1px solid black;">
						<tr>
							<td align="center">&nbsp;</td>
						</tr>
						<tr>
							<td align="center">&nbsp;</td>
						</tr>
						<tr>
							<td align="center">&nbsp;</td>
						</tr>
					</table>
				</td>
				<td>
					<table class="tbl-wo" border="0" align="left" style="border: 1px solid; black">
						<tr>
							<td align="center">&nbsp;</td>
						</tr>
						<tr>
							<td align="center">&nbsp;</td>
						</tr>
						<tr>
							<td align="center">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
			<tr>
				<td  class="tftable-td-white" align="left"><b> <?=$h?>. Tools Equipment used :</b></td>
				<td class="tftable-td-white" align="left">&nbsp;</td>
			</tr>
			<tr>
				<td>
					<table class="tbl-wo" border="0" align="left" style="border: 1px solid black;">
						<tr>
							<td align="center">&nbsp;</td>
						</tr>
						<tr>
							<td align="center">&nbsp;</td>
						</tr>
						<tr>
							<td align="center">&nbsp;</td>
						</tr>
					</table>
				</td>
				<td>
					<table class="tbl-wo" border="0" align="left">
						<tr>
							<td align="center">&nbsp;</td>
						</tr>
						<tr>
							<td align="center">&nbsp;</td>
						</tr>
						<tr>
							<td align="center">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
			<tr>
				<td  class="tftable-td-white" align="left" colspan="2"><b> PPM has been performed in compliance to the checklist and the plat / equipment functions satisfactory to the intended purpose</b></td>
			</tr>
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
			<tr>
				<td  class="tftable-td-white" align="left" colspan="2" valign="top">
					<table class="tbl-wo" border="0" align="left" style="width:60%;">
						<tr>
							<td><b> Remarks :</b> </td>
							<td align="left" class="td-solid">&nbsp;</td>
						</tr>
						<tr>
							<td><b>&nbsp;</b> </td>
							<td align="left" class="td-solid">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td align="center">&nbsp;</td>
			</tr>
			<tr>
				<td  class="tftable-td-white" align="left" colspan="2" valign="top">
					<table class="tbl-wo" border="0" align="left" style="width:30%;">
						<tr>
							<td colspan="2"><b><u>Performed By :</u></b> </td>
						</tr>
						<tr>
							<td align="center" colspan="2">&nbsp;</td>
						</tr>
						<tr>
							<td align="right">Signature&nbsp;:</td>
							<td align="left" class="td-solid2">&nbsp;</td>
						</tr>
						<tr>
							<td align="right">Name&nbsp;:</td>
							<td align="left">&nbsp;</td>
						</tr>
						<tr>
							<td align="right">Designation&nbsp;:</td>
							<td align="left">&nbsp;</td>
						</tr>
						<tr>
							<td align="right">Company&nbsp;:</td>
							<td align="left">&nbsp;</td>
						</tr>
						<tr>
							<td align="right">Date&nbsp;:</td>
							<td align="left">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	<?php } else { ?>
		<div style="color:red; text-align:center; font-size:40; margin-top:20%;">NO CHECKLIST PPM FOR THIS ASSET.</div>
	<?php } ?>

	</body>
</html>

