<?php echo form_open('rootcause_ctrl?wrk_ord='.$this->input->get('wrk_ord').'&mrin='.$this->input->get('mrin'));?>
<?php if($this->input->get('mrin')!=null){
	$wrkOrdOrMrin = $this->input->get('mrin');
}else{ $wrkOrdOrMrin = $this->input->get('wrk_ord');
	}
	$wo = $this->input->get('wrk_ord');
			$wo = explode("/",$wo);?> 
			<!-- <?php echo $wo_details[0]->V_hospitalcode; ?> -->
<div class="ui-middle-screen">
	<div class="div-p"></div>
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-main-form-header" colspan="3"><b> Root Cause</b></td>
			</tr>
			<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p"></div>
		<div >
			<div >
				<table align="center" height="40px" border="0">
				
				</table>
			</div>
			<div class="ui-main-form-1">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
								<td colspan="2" class="ui-header-new"><b>Root cause <text style="color:red;">*</text></b></td>
								<text style="color:red;"> (*) This is mandatory fields<span style="color:red;"><?php echo validation_errors(); ?></span></text>
							</tr>
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0" style=" border-collapse: separate;border-spacing: 0 15px;">
									<?php $errors = array('0' => 'Equipment Problem', 
														// '1' => 'Equipment not functions', 
														'1' => 'PPM Due', 
														'2' => 'Calibration Due', 
														'3' => 'Error Message');
														$faulty = array('0' => 'Spare Part', 
														'1' => 'PCBs', 
														'2' => 'Software', 
														'3' => 'Accessories', 
														'4' => 'Maintenance Kit', 
														'5' => 'Calibration Expired', 
														'6' => 'Labour', 
														'7' => 'Need 3rd Party Services'
														);
														?>
									<tr>
											<td style="padding-left:10px;" valign="top">Complaint / Error / Problem statement :   </td>
											<!-- <td style="padding-left:10px;" valign="top"> <textarea class="Input n_com2" name="rc_error"><?=set_value('rc_error',isset($record[0]->rone) ? $record[0]->rone : '')?></textarea></td> -->
										<td style="padding-left:10px;" valign="top">
											<?php foreach($errors as $error ){
												?>
										    <input type="radio" name="rc_error" value="<?=$error?>" onchange="other_error('<?=$error?>')" <?=isset($record[0]->rone) && $record[0]->rone == $error ? 'checked' : isset($record[0]->rone) &&$record[0]->rone!='' &&$record[0]->rone != $errors[0] && $record[0]->rone != $errors[1]&& $record[0]->rone != $errors[2]?'checked':''?>><?=$error?> <br>
											<?php } ?>
											<textarea <?php if(isset($record[0]->rone) && $record[0]->rone!=$errors[0] && $record[0]->rone!=$errors[1] && $record[0]->rone!=$errors[2] ){?>style="display:block;" <?php }else{?>style="display:none;" <?php }?>class="Input n_com2" id="error-details" name="rc_error-other"><?=set_value('rc_error',isset($record[0]->rone) ? $record[0]->rone : '')?></textarea></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Root cause to part faulty :   </td>
											<!-- <td style="padding-left:10px;" valign="top"> <textarea class="Input n_com2" name="rc_partfault"><?=set_value('rc_partfault',isset($record[0]->rthree) ? $record[0]->rthree : '')?></textarea></td> -->
											<td style="padding-left:10px;" valign="top">
											<?php foreach($faulty as $fault ){?>
												<input type="radio" id="rc_partfault" name="rc_partfault" value="<?=$fault?>" onchange="other_faulty('<?=$fault?>')" <?=isset($record[0]->rthree) && $record[0]->rthree == $fault? 'checked' : '' ?>><?=$fault?><br>
											<?php } ?>
											<!-- <textarea <?php if(isset($record[0]->rthree) &&$record[0]->rthree!=$faulty[0] && $record[0]->rthree!=$faulty[1] && $record[0]->rthree!=$faulty[2]){?>style="display:block;" <?php }else{?>style="display:none;" <?php }?>class="Input n_com2" name="rc_partfault-other" id="partfault-details"><?=set_value('rc_partfault',isset($record[0]->rthree) ? $record[0]->rthree : '')?></textarea></td> -->
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Problem Cause :   </td>
											<td style="padding-left:10px;" valign="top">
												<?php $num = 1; $num2 = 1?>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case"  value="0"<?=set_radio('n_Case','0',TRUE)?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 0 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Wear & Tear<br>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case"  value="1"<?=set_radio('n_Case','1')?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 1 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Accidental<br>
												
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case"  value="3"<?=set_radio('n_Case','3')?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 3 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Mishandling<br>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case"  value="4"<?=set_radio('n_Case','4')?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 4 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Environmental<br>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case"  value="5"<?=set_radio('n_Case','5')?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 5 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Ageing<br>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case"  value="2"<?=set_radio('n_Case','2')?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 2 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Recertificate<br>

											</td>
										</tr>
									</table>
								</td>
							</tr>
					</table>
				</div>
				<div class="middle_d">
					<table class="ui-content-form-reg" style="">
						<tr style="color:white;" height="30px">
							<td colspan="2" class="ui-header-new"><b>Action taken: <text style="color:red;">*</text></b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" class="ui-w">i) How / Why? : <br>ii) Effect / Action Taken <br>iii) Solution/Remark Technical Report Team </td>
									</tr>
									<tr>
									<td style="padding-left:10px;"><textarea class="Input n_com2" name="rc_why"><?=set_value('rc_why',isset($record[0]->rtwo) ? $record[0]->rtwo : '')?></textarea></td>
									</tr>
									<!-- <tr>
										<td style="padding-left:10px;">ii) Effect / Action Taken </td>
										<td style="padding-left:10px;"><textarea class="Input n_com2" name="rc_action"><?=set_value('n_troubleshooting',isset($record[0]->rtwo) ? $record[0]->rtwo : '')?></textarea></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">iii) Solution/Remark Technical Report Team </td>
										<td style="padding-left:10px;"><textarea class="Input n_com2" name="rc_solution"><?=set_value('n_finding',isset($record[0]->rthree) ? $record[0]->rthree : '')?></textarea></td>
									</tr> -->
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="ui-main-form-2">
				<!-- <div class="middle_d">
					<table class="ui-content-form-reg">
						<tr style="color:white;" height="30px">
						<br>
							<td colspan="2" class="ui-header-new"><b>CMIS</b> </td>
						</tr>
						<tr>	<td><div class="form-group" id="sick_leave_img">
				  
									
									
                </div></td></tr>
				<tr>
										<td  ><label>Image Reference: </label>  
										
											<a href="javascript:void(0)" onclick="fCallCmisPhoto('<?=$wrkOrdOrMrin?>','CMIS')" value="z" ><span class="icon-plus" style="font-size:12px; color:green;" ></span> Add New </a></td>
										
										
										
									</tr>

									<tr style="display:block" id="trcommaCMIS">
										<td style="padding-left:10px; display:block;">
										
										<span style="display:inline-block;" id="spcommaCMIS"></span>
										<span id="spcmis">
										<?php
										
											foreach($recordcmis as $row){
												$extension = explode(".",$row->com_id);

												if ($extension[1] == 'docx' || $extension[1] == 'xlsx' || $extension[1] == 'pdf') {
													echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->component_name. "</span><a href=".base_url()."uploadmrinfiles/".$row->com_id."><span class='icon-file-text2 icon'></a></span><a href='javascript:fCallCmisPhotoDel(\"".$row->asset_no."\",\"".$row->Id."\",\"photo\");'><span class='icon-cross icon' style='color:red;'></span></a>";
													echo '<br>';
													}else{
												echo "<span name='cmis$row->Id' class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->component_name. "</span> <br/><img src=".base_url()."uploadmrinfiles/".$row->com_id." style='max-width:90%; height:auto; padding-left:5px;' ><a href='javascript:fCallCmisPhotoDel(\"".$row->asset_no."\",\"".$row->Id."\",\"CMIS\");'><span class='icon-cross icon' style='color:red;'></span></a>";
												echo '<br>';
													}
											}
										
										?>
										
										</span>
										</td>
									</tr>
						
					</table>
				</div> -->
				<div class="middle_d">
					<table class="ui-content-form-reg">
					<tr style="color:white;" height="30px">
							<td colspan="2" class="ui-header-new"><b>Component </b> <text style="color:red;">*</text></td>
						</tr>
					
						
						<tr>
										<td ><label>Image Reference: </label><a href="javascript:void(0)" onclick="fCallCmisPhoto('<?=$wrkOrdOrMrin?>','photo')" value="z" ><span class="icon-plus" style="font-size:12px; color:green;" ></span> Add New </a></td>
										<!--<td style="padding:10px;"><a href="" ><span class="icon-plus" style="font-size:12px; color:green;"></span> Add New</a></td>-->
									
										<td style="padding:10px;"></td>
										
									</tr>
									<tr id="trcommaphoto" >
										<td style="padding-left:10px; " >
										
										<span style="display:inline-block;" id="spcommaphoto"  ></span>
										<span id="spphoto" >
										<?php
										
											foreach($recordphoto as $row){
												$extension = explode(".",$row->com_id);

												if ($extension[1] == 'docx' || $extension[1] == 'xlsx' || $extension[1] == 'pdf') {
													echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->component_name. "</span><a href=".base_url()."uploadmrinfiles/".$row->com_id."><span class='icon-file-text2 icon'></a></span><a href='javascript:fCallCmisPhotoDel(\"".$row->asset_no."\",\"".$row->Id."\",\"photo\");'><span class='icon-cross icon' style='color:red;'></span></a>";
													echo '<br>';
													}else{
												//if($line!=1&&$line!=2&&$line%2!=0)echo '<td>';
												echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->component_name. "</span> <br/><img src=".base_url()."uploadmrinfiles/".$row->com_id." style='max-width:20%; height:auto; padding-left:5px;' ><a href='javascript:fCallCmisPhotoDel(\"".$row->asset_no."\",\"".$row->Id."\",\"photo\");'><span class='icon-cross icon' style='color:red;'></span></a>";
												echo '<br>';
													}
												
											}
										
										?>
										
										</span>
										</td>
									</tr><?php echo form_hidden('uploadphoto',isset($photopath)?$photopath:'');?>
					</table>
				</div>
				<div class="middle_d">
					<table class="ui-content-form-reg" >
					<tr style="color:white;" height="30px">
							<td colspan="2" class="ui-header-new"><b>Related Work Order AP19</b> </td>
						</tr>
					
						
						<tr>
										<td width="200px"><label>Related Work Order AP19: </label></td>
										<?php if($wo[1]=='AP19'){ ?><td ><?php echo anchor ('contentcontroller/workorderlist?&wrk_ord='.$wo_details[0]->V_phone_no,''. $wo_details[0]->V_phone_no .'' ) ?></td> <?php } ?>
										
									</tr>
								
					</table>
				</div>
				
			</div>
			<div class="ui-main-form-5">
				<div class="middle_d">
					<table class="ui-content-form-reg">
						<tr style="color:white;" height="30px">
										<td colspan="2" class="ui-header-new"><b>Remark By Specialist Team <?php if($wo[1]=='AP19'){?><text style="color:red;">*</text><?php } ?></b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" style="color:black;" width="70%" border="0">
						

									<!-- <tr>
										<td style="padding:10px;" valign="top">Remark Procument   :   </td>
									<td><td style="padding-left:10px;"><textarea class="Input n_com2" name="rc_remarkprocument"><?=set_value('n_finding',isset($record[0]->ApprCommentsx) ? $record[0]->ApprCommentsx : '')?></textarea></td></td>
									</tr> -->
									<tr>
										<td style="padding:10px;" valign="top">Remark by Specialist Team   :   </td>
									<td><td style="padding-left:10px;"><textarea class="Input n_com2" <?php if($wo[1]!='AP19')echo 'readonly';?> name="rc_remarkST"><?php if($wo[1]=='AP19')?><?=set_value('rc_remarkST',isset($record[0]->V_details) ? $record[0]->V_details : '')?></textarea></td></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="ui-main-form-5">
				<div class="middle_d">
					
					<style type="text/css">
						/*.p_itemspec{width: 100%; display: table;}*/
						.p_wnclabel{width: 10%; float: left; padding: 10px;}
						.p_wnctable{width: 80%; float: left; padding: 10px;}
						@media screen and (max-device-width:1200px){table.wnctable {border-collapse: collapse;color: black;width: 95%;}}
						/*@media only screen and (min-width: 375px) and (max-width: 425px){
							.p_itemspec{width: 100%; display: table;}
							.p_wnclabel{width: 10%; float: left; padding: 10px;}
							.p_wnctable{width: 51%; float: left; padding: 10px;}
						}
						@media only screen and (min-width: 0px) and (max-width: 320px){
							.p_itemspec{width: 100%; display: table;}
							.p_wnclabel{width: 10%; float: left; padding: 10px;}
							.p_wnctable{width: 39%; float: left; padding: 10px;}
						}*/
					</style>
					<div class="ui-content-form-reg">
						<div style="color:white; width: 100%;" height="30px">
							<div class="ui-header-new"><b>Remark Technical Report Team</b></div>
						</div>
						<div style="color: white;width: 100%;">
							<div class="ui-desk-style-table">
								<div class="ui-content-form" style="color: black; width: 100%;">
									<div class="p_itemspec" style="width: 100%; display: inline-block;">
										
										
											<div style="width: auto; overflow-x: auto;">
											
												
												<tr>
										<td style="padding:10px;" valign="top">(*Attachments Received)   :   </td>
									<td><td style="padding-left:10px;"><textarea class="Input n_com2" name="rc_technical"></textarea></td></td>
									</tr>
												
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<table align="center" height="40px" border="0" style="width:100%;" class="ui-main-form-footer">
				<tr>
					<td align="center">
						<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
						<input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
						<input type="button" <?php if($record==null)echo 'disabled'; ?> onclick="location.href='<?php echo base_url();?>index.php/Procurement?pro=new&wo=<?=$this->input->get('wrk_ord')?>'"class="btn-button btn-primary-button" name="generate" value="Generate MRIN" style="width:150px;" />

					</td>
				</tr>
			</table>
			
		</div>
	</div>
</div>
		</table>				
	</div>
</div>
<script>
function other_faulty(rc_partfault) {
	console.log(rc_partfault);
  if(rc_partfault=='Other'){
  document.getElementById('partfault-details').style.display='block';
  document.getElementById("partfault-details").value='';
  }else{
  document.getElementById('partfault-details').style.display='none';
  }
}

function other_error(error) {
  if(error=='Error Message'){
  document.getElementById('error-details').style.display='block';
  document.getElementById("error-details").value='';
  }else{
  document.getElementById('error-details').style.display='none';
  }
}

</script>
<?php include 'content_jv_popup.php';?>
<?php echo form_close(); ?>