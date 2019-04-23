<div class="ui-middle-screen">
<table class="table-middle-screen-1">
<tr>
<td>
	<?php if( $this->session->userdata("total_hosp")>1 ){?>
					<?php echo anchor ('contentcontroller/select?hc=pilih',$this->session->userdata("hosp_name"),'style="font-size:20px;color:white; {
						# code...
					}"'); ?>
				<?php }else{?>
					<p style="font-size: 20px; color: black;"><?=$this->session->userdata("hosp_name");?></p>
				<?php } ?>
				<a href='../contentcontroller/Content/bems' style="font-size: 20px;color: white;"> <span class='icon-play2' style="font-size: 20px;color: white;"></span> Work Order</a>
				
</td>
</tr>
</table>
<table class="table-middle-screen-2" border="0">
<tr><td style="width: 13%; border-style:none;";>
<?php include 'content_tab_desk.php';?>
</td>
<td  style="width: 2%; border-style: none;"></td>
	<td valign="top" style="width: 70%;"
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" align="center">
					<?php switch ($desk) {
    case "1":
        $tulis = "Open";
        break;
    case "2":
        $tulis = "Closed";
        break;
    default:
        $tulis = "All";
} ?>
			<?php include 'content_desk_tab.php';?>
			<tr class="ui-color-desk desk2">
				<td colspan="3" class="t-header" style="color:black; height:40px; padding-left:10px;"><?= $tulis ?> Complaints <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
			</tr>
			<tr class="ui-color-desk bg-red-blood"> 
				<td colspan="3">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr style="background:#B3130A;">
							<td width="3%" height="30px">
							<a href="?y=<?= $year-1?>&m=<?= $month?>&desk=<?= $desk?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>&desk=<?= $desk?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon"/></a>
							</td>
							<td width="88%" align="center">
							<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>&desk=<?= $desk?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= $year+1?>&m=<?= $month?>&desk=<?= $desk?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon"/></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="3" style="" valign="top" >
				<div class="ui-left_web">
					<table class="ui-content-middle-menu-workorder2" width="100%">
						<tr class="ui-menu-color-header" style="color:white;">
							<th >&nbsp;</th>
							<th >Complaint<br/>Number</th>
							<th >Source</th>
							<th >Priority</th>
							<th >Status</th>
							<th >Complaint Date</th>
							<th >Closed Date</th>
							<th >Asset Number</th>
							<th >Department</th>
							<th >Location</th>
						</tr>
						<style>
				.ui-content-middle-menu-workorder2 tr td {padding:8px;font-size:16px;}
				.ui-content-middle-menu-workorder2 tr td a{ font-weight:bold;}
				</style>
						<?php  if (!empty($records_desk)) {?>
							<?php $numrow = 1; foreach($records_desk as $row):?>
							   			
		    				<tr align="center" <?= ($numrow%2==0) ?  'class="ui-color-color-color"' :  '' ?> >
		    					<td class="td-desk"><?=$numrow?></td>
		    					<td class="td-desk"><?= isset($row->v_ComplaintNo) ? anchor ('contentcontroller/desk_complaint?cmplnt_no='.$row->v_ComplaintNo,''.$row->v_ComplaintNo.'' ) : 'N/A' ?></td>
		    					<td class="td-desk"><?= isset($row->v_Source) ? $row->v_Source : 'N/A' ?></td>
		    					<td class="td-desk"><?= isset($row->v_Priority) ? $row->v_Priority : 'N/A' ?></td>
		    					<td class="td-desk"><?= isset($row->v_ComplaintStatus) ? $row->v_ComplaintStatus : 'N/A' ?></td>
		    					<td class="td-desk"><?= isset($row->d_ComplaintDt) ? date("d-m-Y",strtotime($row->d_ComplaintDt)) : 'N/A' ?></td>
		    					<td class="td-desk"><?= isset($row->d_CompleteDt) ? date("d-m-Y",strtotime($row->d_CompleteDt)) : 'N/A' ?></td>
			        			<td class="td-desk"><?= isset($row->V_AssetNo) ? $row->V_AssetNo : 'N/A' ?></td>
			        			<td class="td-desk"><?= isset($row->v_UserDeptCode) ? $row->v_UserDeptCode : 'N/A' ?></td>
			        			<td class="td-desk"><?= isset($row->v_Location) ? $row->v_Location : 'N/A' ?></td>
		        			</tr> 
		        			
		        			<?php $numrow++?> 			 
							<?php endforeach;?>
							<?php }else { ?>
								<tr align="center" style="height:200px; background:white;">
								<td colspan="10" class="default-NO">NO <?php if($tulis == "All" ){ echo "";}else{ echo $tulis;}?> COMPLAINTS FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
							</tr>
							<?php } ?>
				</table>
				</div>
				<div class="ui-left_mobile">
					<table class="ui-mobile-table-desk" style="color:black; width:100%;">
						<?php  if (!empty($records_desk)) {?>
							<?php $numrow = 1; foreach($records_desk as $row):?>   			
		    			<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >No</td>
							<td class="td-desk">: <?=$numrow?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>	
							<td >Complaint Number</td>
							<td class="td-desk">: <?= isset($row->v_ComplaintNo) ? anchor ('contentcontroller/desk_complaint?cmplnt_no='.$row->v_ComplaintNo,''.$row->v_ComplaintNo.'' ) : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Source</td>
							<td class="td-desk">: <?= isset($row->v_Source) ? $row->v_Source : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Priority</td>
							<td class="td-desk">: <?= isset($row->v_Priority) ? $row->v_Priority : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Status</td>
							<td class="td-desk">: <?= isset($row->v_ComplaintStatus) ? $row->v_ComplaintStatus : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Complaint Date</td>
							<td class="td-desk">: <?= isset($row->d_ComplaintDt) ? $row->d_ComplaintDt : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Closed Date</td>
							<td class="td-desk">: <?= isset($row->d_CompleteDt) ? $row->d_CompleteDt : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Asset Number</td>
							<td class="td-desk">: <?= isset($row->V_AssetNo) ? $row->V_AssetNo : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Department</td>
							<td class="td-desk">: <?= isset($row->v_UserDeptCode) ? $row->v_UserDeptCode : 'N/A' ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Location</td>
							<td class="td-desk">: <?= isset($row->v_Location) ? $row->v_Location : 'N/A' ?></td>
						</tr>
		        		<?php $numrow++?> 			 
							<?php endforeach;?>
							<?php }else { ?>
								<tr align="center" style="height:400px;">
								<td colspan="2" class="ui-color-color-color default-NO">NO <?php if($tulis == "ALL" ){ echo "";}else{ echo $tulis;}?> COMPLAINTS FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
							</tr>
							<?php } ?>
					</table>
				</div>
			</td>	
		</tr>
		<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="3">
				</td>
			</tr>
	</table>	
	</div>
	</td>
	</tr>
	</table>
</div>
</body>
</html>