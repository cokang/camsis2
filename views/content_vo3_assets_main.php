<div class="ui-middle-screen">
<?php include 'content_tab_vo.php';?>

<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="98%" >	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="10"><b>Asset Registration Extraction List</b></td>
			</tr>
			<tr style="background:#B3130A;">
				<td colspan="12" height="40px">
					<table width="100%" class="ui-content-middle-menu-desk">
						<tr>
							<td width="3%" height="30px">
							<a href="?y=<?= $year-1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month-1 == 0) ? $year-1 :$year?>&m=<?= ($month-1 == 0) ? 12 :$month-1?>"><img src="<?php echo base_url(); ?>images/arrow-left.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="88%" align="center">
							<?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?>
							</td>
							<td width="3%">
							<a href="?y=<?= ($month+1 == 13) ? $year+1 :$year?>&m=<?= ($month+1 == 13) ? 1 :$month+1?>"><img src="<?php echo base_url(); ?>images/arrow-right.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
							<td width="3%">
							<a href="?y=<?= $year+1?>&m=<?= $month?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<div class="ui-left_web">
						<table style="border-collapse:collapse; color:black; width:100%;">			
							<tr style="color:white;">
								<th>Asset No</th>
								<th>Tag Number</th>
								<th>Registration Date</th>
								<th>VO Submission Date</th>
							</tr>
							<?php  if (!empty($records)) {?>
							<?php $numrow = 1; foreach($records as $row):?>
					    		<?php echo ($numrow%2==0) ? '<tr class="ui-color-color-color" align="center">' : '<tr align="center">'; ?>
					    		<td><?php echo anchor ('contentcontroller/assetupdate?asstno='.$row->V_Asset_no, $row->V_Asset_no); ?></td>
								<td><?=$row->V_Tag_no?></td>
								<td><?= date_format(new DateTime($row->D_Register_date), 'd-m-Y')?></td>
								<td><?= date_format(new DateTime($row->vvfSubmissionDate), 'd-m-Y')?></td>
					        </tr>
					        <?php $numrow++; ?>
				    		<?php endforeach;?>
				    		<?php }else { ?>
								<tr align="center" style="height:200px;">
								<td colspan="10" class="default-NO">NO Asset Registration Extraction FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
							</tr>
							<?php } ?>
						</table>
					</div>
					<div class="ui-left_mobile">
					<table class="ui-mobile-table-desk" style="color:black; width:100%;">
						<?php  if (!empty($records)) {?>
							<?php $numrow = 1; foreach($records as $row):?>  			
		    			<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >No</td>
							<td class="td-desk">: <?=$numrow?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>	
							<td >Asset No</td>
							<td class="td-desk">: <?php echo anchor ('contentcontroller/assetupdate?asstno='.$row->V_Asset_no, $row->V_Asset_no); ?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Tag Number</td>
							<td class="td-desk">: <?=$row->V_Tag_no?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >Registration Date</td>
							<td class="td-desk">: <?=$row->D_Register_date?></td>
						</tr>
						<tr <?=($numrow % 2) == 1 ? 'class="ui-color-color-color"' : 'class="bg-grey2"'?>>
							<td >VO Submission Date</td>
							<td class="td-desk">: <?=$row->vvfSubmissionDate?></td>
						</tr>
		        		<?php $numrow++?> 			 
							<?php endforeach;?>
							<?php }else { ?>
								<tr align="center" style="height:400px;">
								<td colspan="2" class="ui-color-color-color default-NO">NO Asset Registration Extraction FOUND FOR <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?></td>
							</tr>
							<?php } ?>
					</table>
				</div>
				</td>
			</tr>
		</table>				
	</div>

</div>

