<?php echo form_open('rootcause_ctrl?wrk_ord='.$this->input->get('wrk_ord'));?>
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
											<td style="padding-left:10px;" valign="top"> <textarea class="Input n_com2" name="rc_error"><?=set_value('n_finding',isset($record[0]->rone) ? $record[0]->rone : '')?></textarea></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Root cause to part faulty :   </td>
											<td style="padding-left:10px;" valign="top"> <textarea class="Input n_com2" name="rc_partfault"><?=set_value('n_finding',isset($record[0]->rthree) ? $record[0]->rthree : '')?></textarea></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Tick where appropriate :   </td>
											<td style="padding-left:10px;" valign="top">
												<?php $num = 1; $num2 = 1?>
												<input type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="0"<?=set_radio('n_Case','0',TRUE)?><?=isset($record[0]->ReqCase) && $record[0]->ReqCase == 0 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Wear & Tear<br>
												<input type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="1"<?=set_radio('n_Case','1')?><?=isset($record[0]->ReqCase) && $record[0]->ReqCase == 1 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Accidental<br>
												<input type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="2"<?=set_radio('n_Case','2')?><?=isset($record[0]->ReqCase) && $record[0]->ReqCase == 2 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Obsolote model<br>
												<input type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="3"<?=set_radio('n_Case','3')?><?=isset($record[0]->ReqCase) && $record[0]->ReqCase == 3 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Mishandling<br>
												<input type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="4"<?=set_radio('n_Case','4')?><?=isset($record[0]->ReqCase) && $record[0]->ReqCase == 4 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Environmental<br>
												<input type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="5"<?=set_radio('n_Case','5')?><?=isset($record[0]->ReqCase) && $record[0]->ReqCase == 5 ? 'checked' : '' ?>/>
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
									<tr>
										<td style="padding-left:10px;" class="ui-w">i) How / Why? : <br>ii) Effect / Action Taken <br>iii) Solution/Remark Technical Report Team </td>
									</tr>
									<tr>
									<td style="padding-left:10px;"><textarea class="Input n_com2" name="rc_why"><?=set_value('n_complaint',isset($record[0]->rtwo) ? $record[0]->rtwo : '')?></textarea></td>
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
				<div class="middle_d">
					<table class="ui-content-form-reg">
						<tr style="color:white;" height="30px">
							<td colspan="2" class="ui-header-new"><b>CMIS</b> </td>
						</tr>
						<tr>	<td><div class="form-group" id="sick_leave_img">
                  <label>Image Reference</label><br />
                  <img src="<?php echo base_url(); ?>uploadassetimages/No_image_available.jpg" width="90%" title="Choose Your Picture" onclick="getFile()" name="file_name" id="file_name" value="picture"/>
                </div></td></tr>
						
					</table>
				</div>
				<div class="middle_d">
					<table class="ui-content-form-reg" >
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new"><b>Photo</b></td>
						</tr>
						<tr><td><div class="form-group" id="sick_leave_img">
                  <label>Image Reference</label><br />
                  <img src="<?php echo base_url(); ?>uploadassetimages/No_image_available.jpg" width="90%" title="Choose Your Picture" onclick="getFile()" name="file_name" id="file_name" value="picture"/>
                </div></td></tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
								
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
							<td colspan="2" class="ui-header-new"><b>Remark Procument & Specialist Team</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" style="color:black;" width="70%" border="0">
						

									<tr>
										<td style="padding:10px;" valign="top">Remark Procument   :   </td>
									<td><td style="padding-left:10px;"><textarea class="Input n_com2" name="rc_remarkprocument"><?=set_value('n_finding',isset($record[0]->ApprCommentsx) ? $record[0]->ApprCommentsx : '')?></textarea></td></td>
									</tr>
									<tr>
										<td style="padding:10px;" valign="top">Remark Specialist Team   :   </td>
									<td><td style="padding-left:10px;"><textarea class="Input n_com2" name="rc_remarkST"><?=set_value('n_finding',isset($record[0]->rthree) ? $record[0]->rthree : '')?></textarea></td></td>
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
									<td><td style="padding-left:10px;"><textarea class="Input n_com2" name="rc_technical"><?=set_value('n_finding',isset($record[0]->rthree) ? $record[0]->rthree : '')?></textarea></td></td>
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
			
		</div>
	</div>
</div>
		</table>				
	</div>
</div>
<?php echo form_close(); ?>