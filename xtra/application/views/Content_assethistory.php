<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table width="98%" class="ui-content-middle-htd">
			<tr class="ui-color-contents-style-1" height="40px">
				<td colspan="2" class="ui-header-new"><span style="float: left; font-weight: bold;">Asset History for Asset No : <?=isset($assetno) ? $assetno : ''?></td>
			</tr>
			<tr >
				<td class="ui-desk-style-table">
				 <table class="ui-float-asset-reg">
				  <tr>
				    <th rowspan="2">Work Order</th>
					<th rowspan="2">W.O. Date</th>
					<th rowspan="2" width="20px">W.O. Type</th>
					<th rowspan="2">Date Completed</th>
					<th colspan="3">Cost (RM)</th>
					<th rowspan="2" width="30px">Down time (Hrs)</th>
					<th rowspan="2">Status</th>
					<th rowspan="2">W.O. Desc</th>
					<th rowspan="2">Action taken</th>
				  </tr>
				  <tr>
				    <th>Parts</th>
					<th>Labour</th>
					<th>Total</th>
				   </tr>
				   <?php 
				   	$tpart = 0;
				   	$tlabour = 0;
				   	$totalfull = 0;
				   	$tdowntime = 0;
				   ?>
				   <?php foreach ($wolist as $row): ?>
				   <tr>
				    <td><?php echo anchor ('contentcontroller/AssetRegis?wrk_ord='.$row->V_Request_no.'&assetno='.$assetno.'&m='.$this->input->get('m').'&y='.$this->input->get('y').'&stat='.$this->input->get('stat').'&resch='.$this->input->get('resch').'&state='.$this->input->get('state'),$row->V_Request_no); ?></td>
					<td><?=isset($row->D_date) ? date("d-m-Y",strtotime($row->D_date)) : ''?></td>
					<td><?=isset($row->V_request_type) ? $row->V_request_type : ''?> </td>
					<td><?=isset($row->v_closeddate) ? date("d-m-Y",strtotime($row->v_closeddate)) : ''?></td>
					<td align="right"><?=isset($row->parttotal) ? number_format($row->parttotal,2) : '0.00' ?></td>
					<td align="right"><?=isset($row->labourtotal) ? number_format($row->labourtotal,2) : '0.00' ?></td>
					<?php 
					isset($row->parttotal) ? $part = number_format($row->parttotal,2) : $part = 0.00;
					isset($row->labourtotal) ? $labour = number_format($row->labourtotal,2) : $labour = 0.00;

					$total = $part + $labour;

					if (isset($row->downtime) AND $row->downtime != 0){
						$timediff = explode(':',$row->downtime);
						$downtimehr = $timediff[0];
					}
					else{
						$downtimehr = 0;
					}
					?>
					<td align="right"><?=number_format($total,2)?></td>
					<td align="right"><?=$downtimehr?></td>
					<td><?=isset($row->V_request_status) ? $row->V_request_status : ''?></td>
					<td><?=isset($row->V_summary) ? $row->V_summary : ''?></td>
					<td ><?=isset($row->v_ActionTaken) ? $row->v_ActionTaken : '' ?></td>
				  </tr>
				  <?php 
				  	$tpart = $row->parttotal + $tpart;
				  	$tlabour = $row->labourtotal + $tlabour;
				  	$totalfull = $tpart + $tlabour;

				  	$tdowntime = $downtimehr + $tdowntime;

				  ?>
				  <?php endforeach; ?>
				  <tr style="background:#ccc; font-weight:bold; text-align:right;">
				    <td><?=isset($countwrk) ? $countwrk : ''?></td>
					<td></td>
					<td></td>
					<td></td>
					<td><?=number_format($tpart,2)?></td>
					<td><?=number_format($tlabour,2)?></td>
					<td><?=number_format($totalfull,2)?></td>
					<td><?=$tdowntime?></td>
					<td></td>
					<td></td>
					<td></td>
				  </tr>
				 </table>
				</td>
			</tr>
		</table>
	</div>
	</div>
	<style>
	.ui-float-asset-reg{
	border:1px solid #79B6D8;
	color:black;
	border-collapse:collapse;
	width:98%;
	margin:10px auto;
	}
	.ui-float-asset-reg tr th{
	border:1px solid #79B6D8;
	background:#ccc;
	font-size:14px;
	}
	.ui-float-asset-reg tr td{
	border:1px solid #79B6D8;
	padding-left:5px;
	}
	.ui-float-asset-reg tr td a{
	color:#79B6D8;
	}
	</style>