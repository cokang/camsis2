<div class="ui-middle-screen">
<?php include 'content_tab_wo.php';?>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
			<?php include 'content_ppm_tab.php';?>
			<tr class="ui-color-contents-style-1" style="color:black;">
				<td colspan="3" class="assets-headear" valign="bottom"><b>PPM Catalog</b> <i><?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></i><span class="ui-left_mobile"><br/></span><span style="font-size:12px; padding-left:5px;"> <i>By Due Date and Week</i></span><span style="color:red ; padding-left:5px; font-size:12px;">*ActualDueDate/ExactDate MUST be updated according to agreed date by hospital user to close PPM work order</span></td>
			</tr>
			<tr class="ui-color-contents-style-1" >
				<td colspan="3" height="40px" style="">
					<table width="100%" class="ui-content-middle-menu-desk" border="0">
						<tr style="background:#B3130A;">
							<td width="3%" height="30px">
							<a href="?y=<?= $year-1?>&m=<?= $month?>&ppm=<?= $ppm?>&parent=<?=$this->input->get('parent')?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>&ppm=<?= $ppm?>&parent=<?=$this->input->get('parent')?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="88%" align="center" colspan="8">
							<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>&ppm=<?= $ppm?>&parent=<?=$this->input->get('parent')?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
							<td width="3%">
							<a href="?y=<?= $year+1?>&m=<?= $month?>&ppm=<?= $ppm?>&parent=<?=$this->input->get('parent')?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="3">
					<table class="ui-content-middle-menu-workorder2 ui-left_web" width="100%">
						<tr class="ui-menu-color-header" style="color:white;">
							<th>&nbsp;</th>
							<th>Work Order Number</th>
							<th>Week</th>
							<th>Status</th>
							<th>Asset Number</th>
							<th>QAP</th>
							<th>Tag Number</th>
							<th>ActualDueDate / ExactDate *</th>
							<th>Reschedule Date</th>
							<th>Department</th>
						</tr>
						<?php  if (!empty($records_desk)) {?>
						<?php $numrow = 1; foreach($records_desk as $row):?>   
						<?php echo ($numrow%2==0) ? '<tr class="ui-color-contents-style-1" style="color:black; font-size:12px;" align="center">' : '<tr class="ui-color-color-color" style="color:black; font-size:12px;" align="center">'; ?>     			
	    				
	    					<td class="td-desk"><?=$numrow++?></td>
	    					<td class="td-desk"><b><?php echo anchor ('contentcontroller/wo?wrk_ord='.$row->v_WrkOrdNo. '&vppm=0',''.$row->v_WrkOrdNo.'' ) ?></b></td>
	    					<td class="td-desk"><?=$row->n_StartWk?></td>
	    					<td class="td-desk"><?=$row->v_Wrkordstatus?></td>
	    					<td class="td-desk"><?=$row->v_Asset_no?></td>
	    					<td class="td-desk">Y</td>
	    					<td class="td-desk"><?=$row->V_Tag_no?></td>
		        			<td class="td-desk"><?=date("d-m-Y",strtotime($row->d_DueDt))?></td>
		        			<td class="td-desk">
							<?= ($row->d_Reschdt) ? ($row->d_Reschdt != '0000-00-00 00:00:00' ? date("d-m-Y",strtotime($row->d_Reschdt)) : '-' ) : '-' ?>
							</td>
		        			<td class="td-desk"><?=$row->V_User_Dept_code?></td>
	        			</tr>   
	        			
    				<?php endforeach;?>
    				<?php }else { ?>
								<tr align="center" style="height:200px; background:white;">
								<td colspan="10"><span style="color:red; text-transform: uppercase; font-size:16px;">NO PPM FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></span></td>
							</tr>
							<?php } ?>	
					</table>
					<table class="ui-mobile-table-desk ui-left_mobile" style="color:black;">
						<?php  if (!empty($records_desk)) {?>
							<?php $numrow = 1; foreach($records_desk as $row):?>   			
		    			<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >No</td>
							<td class="td-desk">: <?=$numrow?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>	
							<td >Work Order Number</td>
							<td class="td-desk">: <?php echo anchor ('contentcontroller/wo?wrk_ord='.$row->v_WrkOrdNo. '&vppm=0',''.$row->v_WrkOrdNo.'' ) ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Week</td>
							<td class="td-desk">: <?=$row->n_StartWk?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Status</td>
							<td class="td-desk">: <?=$row->v_Wrkordstatus?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Asset Number</td>
							<td class="td-desk">: <?=$row->v_Asset_no?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >QAP</td>
							<td class="td-desk">: Y</td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Tag Number</td>
							<td class="td-desk">: <?=$row->V_Tag_no?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >ActualDueDate / ExactDate *</td>
							<td class="td-desk">: <?=$row->d_DueDt?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Reschedule Date</td>
							<td class="td-desk">: <?=$row->d_Reschdt?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Department</td>
							<td class="td-desk">: <?=$row->V_User_Dept_code?></td>
						</tr>
		        		<?php $numrow++?> 			 
							<?php endforeach;?>
							<?php }else { ?>
								<tr align="center" style="height:400px;">
								<td colspan="2" class="ui-color-color-color default-NO">NO PPM FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
							</tr>
							<?php } ?>
					</table>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="12">
				</td>
			</tr>
		</table>	
	</div>
</div>
</body>
</html>