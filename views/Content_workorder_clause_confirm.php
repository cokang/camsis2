<?php echo form_open('wo_clause_update_ctrl/confirmation') ?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Confirm Clause Summary</b></td>
			</tr>
			<tr>
				<td class="ui-desk-style-table" >
					<table class="ui-content-form-2" width="100%" border="0">	
						<tr>
							<td class="td-assest">Clause Date :  </td>
							<td> <input type="date" id="n_clause_date" name="n_clause_date" value="<?php echo set_value("n_clause_date")?>" class="form-control-button2 n_wi-date2" readonly></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">Clause No. / Indicator :</td>			
							<td><textarea name="n_clause_no" class="input n_com" readonly><?php echo set_value("n_clause_no")?></textarea></td>
						</tr>
						<tr>
							<td class="td-assest">Closing Main Status :</td>
							<td> <input type="text" id="n_closestat" name="n_closestat" value="<?php echo set_value("n_closestat")?>" class="form-control-button2 n_wi-date2" readonly></td>
						</tr>
						<tr >
							<td class="td-assest">Notice Letter No. :</td>
							<td><input type="text" name="n_no_Letter" value="<?php echo set_value("n_no_Letter")?>" class="form-control-button2 n_wi-date2" style="" readonly></td>
						</tr>
						<tr>
							<td class="td-assest">Clause Cancel / Feedback No. :&nbsp;</td>
							<td><input type="text" name="n_Clause_Cancel" value="<?php echo set_value("n_Clause_Cancel")?>" class="form-control-button2 n_wi-date2" readonly></td>
						</tr>
						<tr>
							<td class="td-assest">Clause Cancel / Feedback Date :</td>
							<td style="padding-left:3px;"> <input type="date" id="n_feedback_d" name="n_feedback_d" value="<?php echo set_value("n_feedback_d")?>" class="form-control-button2 n_wi-date2" readonly></td>
						</tr>
						<tr>
							<td> &nbsp; </td>
						</tr>
						<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">ADDITIONAL INFORMATION SECTION</td></tr>
						<tr>
							<td class="td-assest">Medivest Received Date :</td>
							<td style="padding-left:3px;"> <input type="date" id="n_medivest_dt" name="n_medivest_dt" value="<?php echo set_value("n_medivest_dt")?>" class="form-control-button2 n_wi-date2" readonly></td>
						</tr>
						<tr>
							<td class="td-assest">Third Party service / part Delivery Date :</td>
							<td style="padding-left:3px;"> <input type="date" id="n_part_delivery" name="n_part_delivery" value="<?php echo set_value("n_part_delivery")?>" class="form-control-button2 n_wi-date2" readonly></td>
						</tr>
						<tr>
							<td class="td-assest">MNE Debit Note Date :</td>
							<td style="padding-left:3px;"> <input type="date" id="n_debitnote_dt" name="n_debitnote_dt" value="<?php echo set_value("n_debitnote_dt")?>" class="form-control-button2 n_wi-date2" readonly></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">Remarks MO :</td>			
							<td><textarea name="n_rmks_mo" class="input n_com" readonly><?php echo set_value("n_rmks_mo")?></textarea></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">Clause Choronology :</td>			
							<td><textarea name="n_clau_chrono"  class="input n_com" readonly><?php echo set_value("n_clau_chrono")?></textarea></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">User / Pengarah / Engineer / LO's Name & Discussion Date  :</td>			
							<td><textarea name="n_staffnamedt"  class="input n_com" readonly><?php echo set_value("n_staffnamedt")?></textarea></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">LPO No. & Part Description :</td>			
							<td><textarea name="n_lpono_desc"  class="input n_com" readonly><?php echo set_value("n_lpono_desc")?></textarea></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">Clause Root Cause :</td>			
							<td><textarea name="n_clauroot_cause"  class="input n_com" readonly><?php echo set_value("n_clauroot_cause")?></textarea></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">Clause Remark :</td>			
							<td><textarea name="n_clau_rmks" class="input n_com" readonly><?php echo set_value("n_clau_rmks")?></textarea></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">Dispute Reason :</td>			
							<td><textarea name="n_disput_reason" class="input n_com" readonly><?php echo set_value("n_disput_reason")?></textarea></td>
						</tr>
						<tr>
							<td class="td-assest">Amount (RM) : </td>
							<td><input type="text" name="n_amount" value="<?php echo set_value("n_amount")?>" class="form-control-button2 n_wi-date2" style="" readonly></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">Vendor :  </td>
							<td><input type="text" name="n_vendor" value="<?php echo set_value("n_vendor")?>" class="form-control-button2 n_wi-date2" id="n_agent" readonly><div style="margin-top:5px;"><input type="text" name="n_vendor_v" value="<?php echo set_value("n_vendor_v")?>" class="form-control-button2 n_wi-date2" style="" id="n_agent2" readonly></div></td>
						</tr>
						<tr>
							<td class="td-assest">Dispute (Yes/No) :</td>
							<td><input type="text" name="n_dispute" value="<?php echo set_value("n_dispute")?>" class="form-control-button2 n_wi-date2" style="" readonly></td>
						</tr>
						<tr>
							<td class="td-assest">Clause Implemented (Yes/No) :</td>
							<td><input type="text" name="n_clau_imp" value="<?php echo set_value("n_clau_imp")?>" class="form-control-button2 n_wi-date2" style="" readonly></td>
						</tr>
						<tr>
							<td class="td-assest">John Name  : </td>
							<td><input type="text" name="n_johnname" value="<?php echo set_value("n_johnname")?>" class="form-control-button2 n_wi-date2" style="" readonly></td>
						</tr>
						<tr>
							<td class="td-assest">Director Name : </td>
							<td><input type="text" name="n_directorname" value="<?php echo set_value("n_directorname")?>" class="form-control-button2 n_wi-date2" style="" readonly></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<!--<button type="button" class="btn-button btn-primary-button" style="width: 200px;">Save</button>-->
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
					<input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
				</td>
			</tr>
		</table>
		<?php echo form_hidden('wrk_ord',$this->input->post('wrk_ord')) ?>
		<?php echo form_hidden('n_clause_date',$this->input->post('n_clause_date')) ?>
		<?php echo form_hidden('n_clause_no',$this->input->post('n_clause_no')) ?>
		<?php echo form_hidden('n_closestat',$this->input->post('n_closestat')) ?>
		<?php echo form_hidden('n_no_Letter',$this->input->post('n_no_Letter')) ?>
		<?php echo form_hidden('n_Clause_Cancel',$this->input->post('n_Clause_Cancel')) ?>
		<?php echo form_hidden('n_feedback_d',$this->input->post('n_feedback_d')) ?>
		<?php echo form_hidden('n_medivest_dt',$this->input->post('n_medivest_dt')) ?>
		<?php echo form_hidden('n_part_delivery',$this->input->post('n_part_delivery')) ?>
		<?php echo form_hidden('n_debitnote_dt',$this->input->post('n_debitnote_dt')) ?>
		<?php echo form_hidden('n_rmks_mo',$this->input->post('n_rmks_mo')) ?>
		<?php echo form_hidden('n_clau_chrono',$this->input->post('n_clau_chrono')) ?>
		<?php echo form_hidden('n_staffnamedt',$this->input->post('n_staffnamedt')) ?>	
		<?php echo form_hidden('n_lpono_desc',$this->input->post('n_lpono_desc')) ?>
		<?php echo form_hidden('n_clauroot_cause',$this->input->post('n_clauroot_cause')) ?>
		<?php echo form_hidden('n_clau_rmks',$this->input->post('n_clau_rmks')) ?>
		<?php echo form_hidden('n_disput_reason',$this->input->post('n_disput_reason')) ?>
		<?php echo form_hidden('n_amount',$this->input->post('n_amount')) ?>
		<?php echo form_hidden('n_vendor',$this->input->post('n_vendor')) ?>
		<?php echo form_hidden('n_vendor_v',$this->input->post('n_vendor_v')) ?>
		<?php echo form_hidden('n_dispute',$this->input->post('n_dispute')) ?>
		<?php echo form_hidden('n_clau_imp',$this->input->post('n_clau_imp')) ?>
		<?php echo form_hidden('n_johnname',$this->input->post('n_johnname')) ?>
		<?php echo form_hidden('n_directorname',$this->input->post('n_directorname')) ?>			
	</div>
</div>
<?php include 'content_jv_popup.php';?>