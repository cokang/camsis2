<?php echo form_open('wo_clause_update_ctrl') ?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Update Clause Summary</b></td>
			</tr>
			<tr>
				<td class="ui-desk-style-table" >
					<table class="ui-content-form-2" width="100%" border="0">	
						<tr>
							<td class="td-assest">Clause Date :  </td>
							<td> <input type="date" id="n_clause_date" name="n_clause_date" value="<?php echo set_value("n_clause_date",isset($record[0]->date_issued) ? date_format(new DateTime($record[0]->date_issued), 'Y-m-d') : 'N/A')?>" class="form-control-button2 n_wi-date2"></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">Clause No. / Indicator :</td>			
							<td><textarea name="n_clause_no" class="input n_com"><?php echo set_value("n_clause_no",isset($record[0]->clause_no) ? $record[0]->clause_no : 'N/A')?></textarea></td>
						</tr>
						<tr>
							<td class="td-assest">Closing Main Status :</td>
							<td>
								<?php 
									$Main_list = array(
										'Closed' => 'Closed',
                  						'Open' => 'Open',
                
                					 );
										 ?>
								        <?php echo form_dropdown('n_closestat', $Main_list, set_value('n_closestat',isset($record[0]->close_main_status) ? $record[0]->close_main_status : 'N/A') , 'class="dropdown n_wi-date2"'); ?> </td>
						</tr>
						<tr >
							<td class="td-assest">Notice Letter No. :</td>
							<td><input type="text" name="n_no_Letter" value="<?php echo set_value("n_no_Letter",isset($record[0]->ref_no_notice) ? $record[0]->ref_no_notice : 'N/A')?>" class="form-control-button2 n_wi-date2" style="" ></td>
						</tr>
						<tr>
							<td class="td-assest">Clause Cancel / Feedback No. :&nbsp;</td>
							<td><input type="text" name="n_Clause_Cancel" value="<?php echo set_value("n_Clause_Cancel",isset($record[0]->close_ref_no) ? $record[0]->close_ref_no : 'N/A')?>" class="form-control-button2 n_wi-date2"></td>
						</tr>
						<tr>
							<td class="td-assest">Clause Cancel / Feedback Date :</td>
							<td style="padding-left:3px;"> <input type="date" id="n_feedback_d" name="n_feedback_d" value="<?php echo set_value("n_feedback_d",isset($record[0]->close_date) ? date_format(new DateTime($record[0]->close_date), 'Y-m-d') : 'N/A')?>" class="form-control-button2 n_wi-date2"></td>
						</tr>
						<tr>
							<td> &nbsp; </td>
						</tr>
						<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">ADDITIONAL INFORMATION SECTION</td></tr>
						<tr>
							<td class="td-assest">Medivest Received Date :</td>
							<td style="padding-left:3px;"> <input type="date" id="n_medivest_dt" name="n_medivest_dt" value="<?php echo set_value("n_medivest_dt",isset($record[0]->date_medivest) ? date_format(new DateTime($record[0]->date_medivest), 'Y-m-d') : 'N/A')?>" class="form-control-button2 n_wi-date2"></td>
						</tr>
						<tr>
							<td class="td-assest">Third Party Service / Part Delivery Date :</td>
							<td style="padding-left:3px;"> <input type="date" id="n_part_delivery" name="n_part_delivery" value="<?php echo set_value("n_part_delivery",isset($record[0]->expect_deli_dt) ? date_format(new DateTime($record[0]->expect_deli_dt), 'Y-m-d') : 'N/A')?>" class="form-control-button2 n_wi-date2"></td>
						</tr>
						<tr>
							<td class="td-assest">MNE Debit Note Date :</td>
							<td style="padding-left:3px;"> <input type="date" id="n_debitnote_dt" name="n_debitnote_dt" value="<?php echo set_value("n_debitnote_dt",isset($record[0]->mon_debit_mne) ? date_format(new DateTime($record[0]->mon_debit_mne), 'Y-m-d') : 'N/A')?>" class="form-control-button2 n_wi-date2"></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">Remarks MO :</td>			
							<td><textarea name="n_rmks_mo" class="input n_com"><?php echo set_value("n_rmks_mo",isset($record[0]->remrk_sho_mo) ? $record[0]->remrk_sho_mo : 'N/A')?></textarea></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">Clause Choronology :</td>			
							<td><textarea name="n_clau_chrono"  class="input n_com"><?php echo set_value("n_clau_chrono",isset($record[0]->clause_chrono) ? $record[0]->clause_chrono : 'N/A')?></textarea></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">User / Pengarah / Engineer / LO's Name & Discussion Date  :</td>			
							<td><textarea name="n_staffnamedt"  class="input n_com"><?php echo set_value("n_staffnamedt",isset($record[0]->discussion) ? $record[0]->discussion : 'N/A')?></textarea></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">LPO No. & Part Description :</td>			
							<td><textarea name="n_lpono_desc"  class="input n_com"><?php echo set_value("n_lpono_desc",isset($record[0]->lpo_no_desc) ? $record[0]->lpo_no_desc : 'N/A')?></textarea></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">Clause Root Cause :</td>			
							<td><textarea name="n_clauroot_cause"  class="input n_com"><?php echo set_value("n_clauroot_cause",isset($record[0]->root_cause) ? $record[0]->root_cause : 'N/A')?></textarea></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">Clause Remark :</td>			
							<td><textarea name="n_clau_rmks" class="input n_com"><?php echo set_value("n_clau_rmks",isset($record[0]->clause_rmk) ? $record[0]->clause_rmk : 'N/A')?></textarea></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">Dispute Reason :</td>			
							<td><textarea name="n_disput_reason" class="input n_com"><?php echo set_value("n_disput_reason",isset($record[0]->reason_dispute) ? $record[0]->reason_dispute : 'N/A')?></textarea></td>
						</tr>
						<tr>
							<td class="td-assest">Amount (RM) : </td>
							<td><input type="text" name="n_amount" value="<?php echo set_value("n_amount",isset($record[0]->amount) ? $record[0]->amount : 'N/A')?>" class="form-control-button2 n_wi-date2" style="" ></td>
						</tr>
						<tr>
							<td valign="top" class="td-assest">Vendor :  </td>
							<td> <div style="margin-left:2px;"><input type="text" name="n_vendor" value="<?php echo set_value("n_vendor",isset($vendor[0]) ? $vendor[0] : 'N/A')?>" class="form-control-button2 n_wi-eq3" id="n_agent" > <span class="icon-windows" onclick="fCallpop_vendor2()"></span> </div><div style="margin-top:5px;"><input type="text" name="n_vendor_v" value="<?php echo set_value("n_vendor_v",isset($vendor[1]) ? $vendor[1] : 'N/A')?>" class="form-control-button2 n_wi-date2" style="" id="n_agent2"></div></td>
						</tr>
						<tr>
							<td class="td-assest">Dispute (Yes/No) :</td>
							<td>
								<?php 
										$Main_list = array(
										'Yes' => 'Yes',
                  						'No' => 'No',
                
                					 );
										 ?>
								        <?php echo form_dropdown('n_dispute', $Main_list, set_value('n_dispute',isset($record[0]->dispute) ? $record[0]->dispute : 'N/A') , 'class="dropdown n_wi-date2"'); ?> </td>
						</tr>
						<tr>
							<td class="td-assest">Clause Implemented (Yes/No) :</td>
							<td>
								<?php 
										$Main_list = array(
										'Yes' => 'Yes',
                  						'No' => 'No',
                
                					 );
										 ?>
								        <?php echo form_dropdown('n_clau_imp', $Main_list, set_value('n_clau_imp',isset($record[0]->clause_implemen) ? $record[0]->clause_implemen : 'N/A') , 'class="dropdown n_wi-date2"'); ?> </td>
						</tr>
						<tr>
							<td class="td-assest">John Name  : </td>
							<td><input type="text" name="n_johnname" value="<?php echo set_value("n_johnname",isset($record[0]->john_nm) ? $record[0]->john_nm : 'N/A')?>" class="form-control-button2 n_wi-date2" style="" ></td>
						</tr>
						<tr>
							<td class="td-assest">Director Name : </td>
							<td><input type="text" name="n_directorname" value="<?php echo set_value("n_directorname",isset($record[0]->director_nm) ? $record[0]->director_nm : 'N/A')?>" class="form-control-button2 n_wi-date2" style="" ></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Confirm">
					<!--<?php echo anchor ('contentcontroller/clause_confirm', '<button type="button" class="btn-button btn-primary-button" style="width:200px;">Save</button>'); ?>-->
				</td>
			</tr>
		</table>
		<?php echo form_hidden('wrk_ord',$this->input->post('wrk_ord')) ?>				
	</div>
</div>
<?php include 'content_jv_popup.php';?>