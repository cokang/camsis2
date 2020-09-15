<?php
echo form_open('rootcause_ctrl/comfirmation');
?>
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
								<td colspan="2" class="ui-header-new"><b>Root cause</b></td>
							</tr>
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
									
									<tr>
											<td style="padding-left:10px;" valign="top">Complaint / Error / Problem statement :   </td>
											<td style="padding-left:10px;" valign="top"> <textarea class="Input n_com2" name="rc_error" disabled><?= ($this->input->post('rc_error')=='Other')?set_value('rc_error-other'):set_value('rc_error')?></textarea></td>
											
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Root cause to part faulty :   </td>
											<td style="padding-left:10px;" valign="top"><textarea class="Input n_com2" name="rc_partfault" disabled><?=($this->input->post('rc_partfault')=='Other')?set_value('rc_partfault-other'):set_value('rc_partfault')?></textarea></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Problem Cause :   </td>
											<td style="padding-left:10px;" valign="top">
												<?php $num = 1; $num2 = 1?>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case" disabled value="0"<?=set_radio('n_Case','0',TRUE)?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 0 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Wear & Tear<br>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case" disabled value="1"<?=set_radio('n_Case','1')?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 1 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Accidental<br>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case" disabled value="2"<?=set_radio('n_Case','2')?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 2 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Obsolote model<br>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case" disabled value="3"<?=set_radio('n_Case','3')?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 3 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Mishandling<br>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case" disabled value="4"<?=set_radio('n_Case','4')?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 4 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Environmental<br>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case" disabled value="5"<?=set_radio('n_Case','5')?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 5 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Others<br>

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
							<td colspan="2" class="ui-header-new"><b>Action taken:</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<!-- <tr>
										<td style="padding-left:10px;" class="ui-w">i) How / Why? : </td>
										<td style="padding-left:10px;"><textarea class="Input n_com2" name="rc_why" disabled><?=set_value('rc_why')?></textarea></td>
									</tr> -->
									<tr>
										<td style="padding-left:10px;">i) How / Why? : <br> i) Effect / Action Taken <br>iii) Solution/Remark Technical Report Team</td>
										
									</tr>
									<tr><td style="padding-left:10px;"><textarea class="Input n_com2" name="rc_why" disabled><?=set_value('rc_why')?></textarea></td></tr>
									<!-- <tr>
										<td style="padding-left:10px;">iii) Solution/Remark Technical Report Team </td>
										<td style="padding-left:10px;"><textarea class="Input n_com2" name="rc_solution" disabled><?=set_value('rc_solution')?></textarea></td>
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
							<td colspan="2" class="ui-header-new"><b>CMIS</b> </td>
						</tr>
						<tr>
										<td  ><label>Image Reference: </label>  </td>
										
										
										
									</tr>

									<tr style="display:block' ?>;" id="trcommacomponent">
										<td style="padding-left:10px; display:block;">
										
										<span style="display:inline-block;" id="spcommaCMIS"></span>
										<span id="spcmis">
										<?php
											foreach($recordcmis as $row){
												$extension = explode(".",$row->com_id);

											
												echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->component_name. "</span> <br/><img src=".base_url()."uploadmrinfiles/".$row->com_id." style='max-width:90%; height:auto; padding-left:5px;' >";
												echo '<br>';
												
											}
										?>
										
										</span>
										</td>
									</tr>
						
					</table>
				</div> -->
				<div class="middle_d">
					<table class="ui-content-form-reg">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new"><b>Component </b></td>
						</tr>
						<tr>
										<td ><label>Image Reference: </label></td>
					
										
									</tr>
									<tr id="trcommaattachment">
										<td style="padding-left:10px; ">
										
										<span style="display:inline-block;" id="spcommaphoto"></span>
										<span id="spphoto">
										<?php
										$line=1;
											foreach($recordphoto as $row){
												$extension = explode(".",$row->com_id);

												//if($line!=1&&$line%2!=0)echo '<td>';
												echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->component_name. "</span> <br/><img src=".base_url()."uploadmrinfiles/".$row->com_id." style='max-width:20%; height:auto; padding-left:5px;' >";
												echo '<br>';
												//if($line!=1&&$line%2!=0)echo '</td>';
												++$line;
											}
										?>
										
										</span>
										</td>
									</tr>
					</table>
				</div>
			</div>
			<div class="ui-main-form-5">
				<div class="middle_d">
					<table class="ui-content-form-reg">
						<tr style="color:white;" height="30px">
							<td colspan="2" class="ui-header-new"><b>Remark Procument & Specialist Team</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" style="color:black;" width="70%" border="0">
						

									<!-- <tr>
										<td style="padding:10px;" valign="top">Remark Procument   :   </td>
									<td><td style="padding-left:10px;"><textarea class="Input n_com2" name="rc_remarkprocument" disabled><?=set_value('rc_remarkprocument')?></textarea></td></td>
									</tr> -->
									<tr>
										<td style="padding:10px;" valign="top">Remark by Specialist Team   :   </td>
									<td><td style="padding-left:10px;"><textarea class="Input n_com2" name="rc_remarkST" disabled><?=set_value('rc_remarkST')?></textarea></td></td>
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
										<td style="padding:10px;" valign="top">Remark Procument   :   </td>
									<td><td style="padding-left:10px;"><textarea class="Input n_com2" name="rc_technical" disabled><?=set_value('rc_technical')?></textarea></td></td>
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
					</td>
				</tr>
			</table>
			<?php echo form_hidden('workord',$this->input->get('wrk_ord')) ?>
			<?php echo form_hidden('rc_error',($this->input->post('rc_error')=='Other')?$this->input->post('rc_error-other'):$this->input->post('rc_error')) ?>
			<?php echo form_hidden('rc_partfault',($this->input->post('rc_partfault')=='Other')?$this->input->post('rc_partfault-other'):$this->input->post('rc_partfault')) ?>
			<?php echo form_hidden('n_Case',$this->input->post('n_Case')) ?>
			<?php echo form_hidden('rc_why',$this->input->post('rc_why')) ?>
			<?php echo form_hidden('rc_remarkprocument',$this->input->post('rc_remarkprocument')) ?>
			<?php echo form_hidden('rc_remarkST',$this->input->post('rc_remarkST')) ?>
			<!-- <?php echo form_hidden('ApprStatusIDxx',isset($record[0]->ApprStatusIDxx) ? $record[0]->ApprStatusIDxx : NULL) ?>
			<?php echo form_hidden('DateApprovalxx',isset($record[0]->DateApprovalxx) ? $record[0]->DateApprovalxx : '') ?>
			<?php echo form_hidden('class_id',isset($user[0]->class_id) ? $user[0]->class_id : '') ?> -->
			<?php echo form_hidden('hosp',$this->input->get('hosp')) ?>
		</div>
	</div>
</div>
		</table>				
	</div>
</div>
<?php echo form_close(); ?>