
<body>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr"> SITE REVIEW REPORT - <?php echo $this->input->get('rpt_no') ?> </div>
		<button onclick='myFunction()' class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
	</div>
	<?php $StartNewPage1 = 'false';$StartNewPage2 = 'false';$rowno = 0; $lineno = $this->input->post('n_lineNo'); foreach($loadvvfsitereview as $row):?>
	<?php 
				if($rowno<$count_array-1){
				$currentVStatus[$rowno] = $loadvvfsitereview[$rowno+1]->vvfVStatus;
				$currentMonth[$rowno] = date('m',strtotime($loadvvfsitereview[$rowno+1]->vvfSubmissionDate));
				}
			 ?>
	<?php if ($rowno == 0 OR $rowno%$lineno==0 OR $StartNewPage1 == 'true' OR $StartNewPage2 == 'true') { ?>
		<table class="tbl-wo" border="0">
		
		<tr>	
			
			<td class="tbl-wo-vovf">Site Pre-Submission Review<br />
				<span  style="font-weight:normal; display:inline-block;">Use this report to review site submission prior to final submission of report to PMSB</span>
			</td>
			<td align="right">
				<table class="tbl-wo-vff">
					<?php 
					switch ($this->input->post('n_Period')) {
    					case "1":
        				$tulis = 'January '.substr($period,2,2);
        				break;
        				case "2":
        				$tulis = 'February '.substr($period,2,2);
        				break;
        				case "3":
        				$tulis = 'March '.substr($period,2,2);
        				break;
        				case "4":
        				$tulis = 'April '.substr($period,2,2);
        				break;
    					case "5":
        				$tulis = 'May '.substr($period,2,2);
        				break;
        				case "6":
        				$tulis = 'June '.substr($period,2,2);
        				break;
        				case "7":
        				$tulis = 'July '.substr($period,2,2);
        				break;
        				case "8":
        				$tulis = 'August '.substr($period,2,2);
        				break;
        				case "9":
        				$tulis = 'September '.substr($period,2,2);
        				break;
        				case "10":
        				$tulis = 'October '.substr($period,2,2);
        				break;
        				case "11":
        				$tulis = 'November '.substr($period,2,2);
        				break;
        				case "12":
        				$tulis = 'December '.substr($period,2,2);
        				break;
    					default:
        				$tulis = 'Entire '.substr($period,2,2);
        				}
     					?>
					
					<tr>
						<td><b>Period:</b></td>
						<td><span class="tblbox"><?php echo $tulis ?></span></td>
					</tr>
					<tr>
						<td><b>State:</b></td>
						<td><span class="tblbox"><?php echo $hospname[0]->v_statename ?></span></td>
					</tr>
					<tr>
						<td><b>Hospital/Institution:</b></td>
						<td><span class="tblbox"><?php echo $hospname[0]->v_HospitalName ?></span></td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
		<table class="tablevvf" border="1">
		<tr>
			<th>A<br>Department</td>
			<th>B<br>Equipment<br>Description<br>(using UMDNS Nomenclature)</td>
			<th>C<br>Equipment Code<br>(using UMDNS Code)</td>
			<th>D<br>Asset<br>Label<br>Number</td>
			<th>E<br>Manufacturer</td>
			<th>F<br>Model</td>
			<th>G<br>Purchase<br>Value<br>(RM)</td>
			<th>H<br>Status<br>@</td>
			<th>I<br>Date<br>Commissioned</td>
			<th>J<br>Date<br>Start<br>Service</td>
			<th>K<br>Warranty<br>Expiry<br>Date</td>
			<th>J<br>Date<br>Stop<br>Service</td>
			<th style="background-color:#DDDDFF;color:#0000FF;"><br>Submission<br>Date&<br>Status</td>
		</tr>
		<?php } ?>
		<tr>
			<?php

			if ($rowno <= $count_array-2){
				if ($this->input->post('pb1') == 'y'){
					if($currentVStatus[$rowno] != $row->vvfVStatus){
					$StartNewPage1 = 'true';
					//echo $StartNewPage1.'<br>';
					}
					elseif ($currentVStatus[$rowno] == $row->vvfVStatus){
					$StartNewPage1 = 'false';
					//echo $StartNewPage1.'<br>';
					}
				}
				if ($this->input->post('pb2') == 'y'){
					if($currentMonth[$rowno] != $row->month0){
					$StartNewPage2 = 'true';
					//echo $StartNewPage1.'<br>';
					}
					elseif ($currentMonth[$rowno] == $row->month0){
					$StartNewPage2 = 'false';
					//echo $StartNewPage1.'<br>';
					}
				}
			}

			$CommissionDate = $row->vvfDateComm;
			$StartDate = $row->vvfDateStart;
			$StopDate = $row->vvfDateStop;

			if ($row->vvfAssetLockedStatus == 1) {
				$AssetLockedStatus = 'Locked';
			}
			else{
				$AssetLockedStatus = "<span style=color:red;>".'NOT LOCKED'."</span>";
			}

			if (strlen($row->vvfHQRemarks) > 0){
				$AssetLockedStatus = $AssetLockedStatus.' PMSB: '.$row->vvfHQRemarks; 
			}

			$SiteSubmissionDate = $row->vvfSubmissionDate;
			if (strtotime($SiteSubmissionDate) == TRUE){
				$SiteSubmissionDate = date_format(new DateTime($SiteSubmissionDate), 'd-m-Y');
			}

			if ($row->vvfVStatus == 'V3'){
				$StopDate = '-';
			}

			if ($row->vvfVStatus == 'V4:' AND date('Y',strtotime($row->vvfDateComm)) < '1997'){
				$StartDate = '1997-01-01';
			}

			$StartDate = $row->D_commission;
			$CommissionDate = $row->D_comm;

			if ($row->vvfVStatus == 'V4:' OR $row->vvfVStatus == 'V2' OR $row->vvfVStatus == 'V5'){
				$StartDate = $row->D_comm;
				if (date('Y',strtotime($StartDate)) < '1997'){
				$StartDate = '1997-01-01';
			}
			}

			$tagger = $row->V_Tag_no;
			if (strlen($tagger) > 8){
				$AssetNo = $tagger;
			} 
			else{
				$AssetNo = $row->vvfAssetNo;
			}

			if (strtotime($CommissionDate) == TRUE){
				$CommissionDate = date_format(new DateTime($CommissionDate), 'd-m-Y');
			}
			if (strtotime($StartDate) == TRUE){
				$StartDate = date_format(new DateTime($StartDate), 'd-m-Y');
			}
			if (strtotime($StopDate) == TRUE){
				$StopDate = date_format(new DateTime($StopDate), 'd-m-Y');
			}
			$WarrantyEnd = $row->vvfDateWarrantyEnd;
			if (strtotime($WarrantyEnd) == TRUE){
				$WarrantyEnd = date_format(new DateTime($WarrantyEnd), 'd-m-Y');
			}

			?>
			<td>&nbsp;<?=isset($row->v_Mohdesc) ? $row->v_Mohdesc : '' ?>&nbsp;</td>
			<td>&nbsp;<?=isset($row->vvfAssetDesc) ? $row->vvfAssetDesc : '' ?>&nbsp;</td>
			<td>&nbsp;<?=isset($row->vvfAssetType) ? $row->vvfAssetType : '' ?>&nbsp;</td>
			<td>&nbsp;<?=$AssetNo?>&nbsp;</td>
			<td>&nbsp;<?=isset($row->vvfMfg) ? $row->vvfMfg : '' ?>&nbsp;</td>			
			<td>&nbsp;<?=isset($row->vvfModel) ? $row->vvfModel : '' ?>&nbsp;</td>
			<td>&nbsp;<?=isset($row->vvfPurchaseCost) ? number_format($row->vvfPurchaseCost,2) : '' ?>&nbsp;</td>
			<td>&nbsp;<?=isset($row->vvfVStatus) ? $row->vvfVStatus : '' ?>&nbsp;</td>
			<td nowrap>&nbsp;<?=$CommissionDate?>&nbsp;</td>
			<td nowrap>&nbsp;<?=$StartDate?>&nbsp;</td>
			<td nowrap>&nbsp;<?=$WarrantyEnd?>&nbsp;</td>
			<td nowrap>&nbsp;<?=$StopDate?>&nbsp;</td>
			<td style="background-color:#DDDDFF;color:#0000FF;" nowrap>&nbsp;<?=$SiteSubmissionDate.'<br>'.$AssetLockedStatus?>&nbsp;</td>
		</tr>
		<?php if (($rowno + 2) > $arr_count) { ?>
		<?php if ($arr_count > $lineno) { ?>
		<?php $extraline = $arr_count % $lineno?>
		<?php $emptyline = $lineno - $extraline;?>
		<?php } ?>
		<?php if ($arr_count < $lineno) { ?>
		<?php $emptyline = $lineno - $arr_count;?>
		<?php } ?>
		<?php while ($emptyline > 0) { ?>
		<?php $emptyline-- ?>
		<?php $rowno++ ?>
		<?php } ?>
		<?php } ?>
		<?php $rowno++ ?>
		
	<?php if (($rowno + 1)%$lineno==1 OR $StartNewPage1 == 'true' OR $StartNewPage2 == 'true') { ?>	
	</table>
	<div style="height:10px;"></div>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
	<?php } ?>
	<?php endforeach; ?>
	</body>
</html>
