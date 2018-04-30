
<?php echo form_open('barcode_ctrl');?>


<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p"></div>
		<?php 
$procument = $this->input->get('tab');
switch ($procument) {
    case "1":
        $tulis = "Payment Process";
        break;
    case "2":
        $tulis = "Completed PO";
        break;
    default:
        $tulis = "Pending PO";
} ?>
		<div class="ui-main-form">
		<table class="ui-content-middle-menu-workorder" style="width:100%" align="center"><?php include 'content_barcode_tab.php';?></table>
			<div class="ui-main-form-header">
				<table align="center" height="40px" border="0">
				
					<tr>
						<td><span style="margin-left:10px;"><?php if($this->input->get('bcwhat') == 'add'){?>ADD STOCK<?php }else{ ?>TAKE STOCK<?php } ?></span></td>
					</tr>
					
					
				</table>
			</div>
			<div class="n-req"></div>
			
			<div class="ui-main-form-5">
				<div class="middle_d">
					<table class="ui-content-form-reg">
					
						<tr style="color:white;" height="30px">
							<td colspan="2" class="ui-header-new"><b>Components & Attachments</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" style="color:black;" width="100%" border="0">
									<tr>
										<td style="padding:10px; width:15%;" valign="top">Components  :   </td>
										<td style="padding-left:10px;"><input type="text" name="n_barput" value=""  autofocus="autofocus" id="n_barput"  class="form-control-button n_wi-date2"  onkeypress="return searchKeyPress(event);" ></td>
									</tr>

									
									
																
								</table>
							</td>
						</tr>						
					</table>
				</div>
			</div>
			<div class="ui-main-form-5">
				<div class="middle_d">
					<table class="ui-content-form-reg">
						<tr style="color:white;" height="30px">
							<td colspan="2" class="ui-header-new"><b>Item Specification</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" style="color:black;" width="100%" border="0">
									<tr>
										<td style="padding:10px; width:8%;" valign="top">Item(s)  :   </td>
										<td style="padding:10px;">
											<table class="wnctable" border="1" id="myTable">
												<tr>
													<th>No</th>
													<th style="width:100px;">Item Code</th>
													<th style="width:300px;">Item Name</th>
													<?php if ($this->input->get('bcwhat') != 'add') { ?>
													<th>Qty Available</th>
													
													<?php } else {?>
													<th>Price</th>
													<?php } ?>
													<th>Doc Det.</th>
													<th>Qty</th>
													
													<th style="width:140px;">Remarks</th>
													<th></th>
												</tr>
												<?php if ($this->input->get('pro') == 'edit') { ?>
												<?php $numrow = 1; foreach ($recordis as $item): ?>
													<tr>
														<td><?=$numrow?><input type="hidden" name="rows" value="<?=$numrow?>"></td>
														<td><p id="itemcode<?=$numrow?>"><?=isset($item->ItemCode) ? $item->ItemCode : ''?></p><input type="hidden" id="itemcodei<?=$numrow?>" name="itemcode<?=$numrow?>" value="<?=isset($item->ItemCode) ? $item->ItemCode : ''?>"></td>
														<td><?=isset($item->ItemName) ? $item->ItemName : ''?></td>
														<td><input type="text" name="n_qty<?=$numrow?>" value="<?=isset($item->Qty) ? $item->Qty : ''?>" class="form-control-button2" style=width:100px;"></td>
														<td><select name="a_rem<?=$numrow?>" class="dropdown"><option value="" <?=isset($item->Reimbursable) && $item->Reimbursable == 0 ? 'selected="selected"' : 'selected="selected"'?>>None</option><option value="1" <?=isset($item->Reimbursable) && $item->Reimbursable == 1 ? 'selected="selected"' : ''?>>Mishandling</option><option value="2" <?=isset($item->Reimbursable) && $item->Reimbursable == 2 ? 'selected="selected"' : ''?>>Supplementary</option><option value="3" <?=isset($item->Reimbursable) && $item->Reimbursable == 3 ? 'selected="selected"' : ''?>>Upgrading</option><option value="4" <?=isset($item->Reimbursable) && $item->Reimbursable == 4 ? 'selected="selected"' : ''?>>Re-Installation</option><option value="5" <?=isset($item->Reimbursable) && $item->Reimbursable == 5 ? 'selected="selected"' : ''?>>Other</option></select></td>
														<td><INPUT TYPE="text" name="startDate<?=$numrow?>" value="<?=isset($item->LastRepDt) ? date("m/d/Y",strtotime($item->LastRepDt)) : ''?>" class="form-control-button2" style=width:100px;" onChange="validDate(this)"></td>
														<input type="hidden" name="id<?=$numrow?>" value="<?=isset($item->Id) ? $item->Id : ''?>">
													</tr>
												<?php $numrow++?>
												<?php endforeach; ?>
												<?php } ?>
											</table>
											<!--<a href="javascript:void(0)" onclick="fCallitem()" style="padding-top:10px; display:block; width:100px;"><span class="icon-plus" style="font-size:12px; color:green;" ></span> Add New </a>-->
										</td>
									</tr>						
								</table>
							</td>
						</tr>						
					</table>
				</div>
			</div>
			<table align="center" height="40px" border="0" style="width:100%;" class="ui-main-form-footer">
				<tr>
					<td align="center">
						<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
						<input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
					</td>
				</tr>
			</table>
			<?php echo form_hidden('tempno',isset($runningno) ? $runningno : '') ?>
			<?php echo form_hidden('ApprStatusID',isset($record[0]->ApprStatusID) ? $record[0]->ApprStatusID : '') ?>
			<?php echo form_hidden('DateApproval',isset($record[0]->DateApproval) ? $record[0]->DateApproval : '') ?>
			<?php echo form_hidden('ApprStatusIDx',isset($record[0]->ApprStatusIDx) ? $record[0]->ApprStatusIDx : NULL) ?>
			<?php echo form_hidden('DateApprovalx',isset($record[0]->DateApprovalx) ? $record[0]->DateApprovalx : '') ?>
			<?php echo form_hidden('ApprStatusIDxx',isset($record[0]->ApprStatusIDxx) ? $record[0]->ApprStatusIDxx : NULL) ?>
			<?php echo form_hidden('DateApprovalxx',isset($record[0]->DateApprovalxx) ? $record[0]->DateApprovalxx : '') ?>
			<?php echo form_hidden('class_id',isset($user[0]->class_id) ? $user[0]->class_id : '') ?>
			<?php 
			if($this->input->get('bcwhat') == 'add') {
			echo form_hidden('act','add'); } else {
			echo form_hidden('act','take');
			} ?>
		</div>
	</div>
</div>
<style>
	.icon{
	 font-size:14px;
	 margin-right:5px;
	 margin-left:5px;
	 display:iniline-block;
	}
	.icon2{
	 font-size:14px;
	 margin-left:5px;
	 color:green;
	}
</style>
<script></script>
</body>
<?php include 'content_jv_popup.php';?>
<?php echo form_close(); ?>
</html>
