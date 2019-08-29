<div class="ui-middle-screen">
<?php include 'content_tab_desk.php';?>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" width="80%" align="center">
			<?php include 'content_desk_tab.php';?>
			<tr class="ui-color-desk" style="color:black;">
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
				<td colspan="3" height="40px" style="padding-left:10px;"><?= $tulis ?> Complaints <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
			</tr>
			<tr class="ui-middle-color">
				<td colspan="3" height="40px">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr class="ui-middle-color">
							<td width="3%" height="30px">
							<a href="?y=<?= $year-1?>&m=<?= $month?>&desk=<?= $desk?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>&desk=<?= $desk?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="88%" align="center">
							<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>&desk=<?= $desk?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= $year+1?>&m=<?= $month?>&desk=<?= $desk?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-middle-color">
				<td colspan="3" style="" valign="top" >
					<table class="ui-content-middle-menu-workorder2" width="100%">
						<tr class="ui-menu-color-header" style="color:white;">
							<th >&nbsp;</th>
							<th >Complaint Number</th>
							<th >Source</th>
							<th >Priority</th>
							<th >Status</th>
							<th >Complaint Date</th>
							<th >Closed Date</th>
							<th >Asset Number</th>
							<th >Department</th>
							<th >Location</th>
						</tr>
							<?php $numrow = 1; foreach($records_desk as $row):?>
							   			
		    				<tr align="center" <?= ($numrow%2==0) ?  'class="ui-color-color-color"' :  '' ?> >
		    					<td class="td-desk"><?=$numrow?></td>
		    					<td class="td-desk"><?= isset($row->v_ComplaintNo) ? anchor ('contentcontroller/desk_complaint',''.$row->v_ComplaintNo.'' ) : 'N/A' ?></td>
		    					<td class="td-desk"><?= isset($row->v_Source) ? $row->v_Source : 'N/A' ?></td>
		    					<td class="td-desk"><?= isset($row->v_Priority) ? $row->v_Priority : 'N/A' ?></td>
		    					<td class="td-desk"><?= isset($row->v_ComplaintStatus) ? $row->v_ComplaintStatus : 'N/A' ?></td>
		    					<td class="td-desk"><?= isset($row->d_ComplaintDt) ? $row->d_ComplaintDt : 'N/A' ?></td>
		    					<td class="td-desk"><?= isset($row->d_CompleteDt) ? $row->d_CompleteDt : 'N/A' ?></td>
			        			<td class="td-desk"><?= isset($row->V_AssetNo) ? $row->V_AssetNo : 'N/A' ?></td>
			        			<td class="td-desk"><?= isset($row->v_UserDeptCode) ? $row->v_UserDeptCode : 'N/A' ?></td>
			        			<td class="td-desk"><?= isset($row->v_Location) ? $row->v_Location : 'N/A' ?></td>
		        			</tr> 
		        			
		        			<?php $numrow++?> 			 
							<?php endforeach;?>		
			<!--<tr class="" style="color:red;">
				<td colspan="12" align="center">NO CLOSED COMPLAINTS FOUND FOR SEPTEMBER 2014.</td>
			</tr>-->
				</table>
			</td>	
		</tr>
		<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="3" style="border-bottom-left-radius:5px; border-bottom-right-radius:5px;">
				</td>
			</tr>
	</table>	
	</div>
</div>
</body>
</html>