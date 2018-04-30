<?php echo form_open('vo3_general_update_ctrl/confirmation');?>
<div class="ui-middle-screen">
	<div class="div-p"></div>
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0" height="" width="98%" align="center">
			<tr class="ui-left_web">
				<td class="ui-highlight2" align="center" colspan="0" style="width:25%; height:30px;">General</td>
				<td class="ui-header-new" align="center" colspan="0" style="width:25%;">Signatories</td>
				<td class="ui-header-new" align="center" colspan="0" style="width:25%;">Assets</td>
				<td class="ui-header-new" align="center" colspan="0" style="width:25;">Rates and Fees</td>
			</tr>
			<tr class="ui-color-contents-style-1 nonetr">
				<td colspan="12" height="20px">&nbsp;</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td width="" colspan="12" valign="top" align="center" class="pd-bttm">
					<table class="ui-desk-style-table4" style=" color:black; background:white;" cellpadding="4" cellspacing="0" width="98%">	
						<tr class="ui-color-contents-style-1">
							<td class="ui-header-new" colspan="2" valign="" height="40px"><span style="float: left; margin-top:5px; font-weight: bold;">Confirm VVF Report <?=isset($records[0]->vvfReportNo) ? $records[0]->vvfReportNo : 'N/A'?></span></td>
						</tr>       			
	    				<tr>
							<td class="td-assest" align="right">VVF Reference Number :  </td>
							<td><?=isset($records[0]->vvfReportNo) ? $records[0]->vvfReportNo : 'N/A'?></td>
						</tr>
						<tr>
							<td class="td-assest" align="right">Report Date :</td>			
							<td><?= isset($records[0]->vvfDateStart) == TRUE ? date_format(new DateTime($records[0]->vvfDateStart), 'd-m-Y') : 'N/A'?></td>
						</tr>
						<tr>
							<td class="td-assest" align="right" valign="top">Registration Date Range :</td>
							<td>
								<select class="dropdown n_wi-date2" name="n_regDate_range" onchange='showRegRange(this.form)' disabled>
								<option value="vo3_vvf_update?&rpt_no=VVFBEM/HSA/<?=$Period?>/<?=$Date2year?>"><?= date_format(new DateTime($records[0]->vvfDateStart), 'd-m-Y'). ' to ' .date_format(new DateTime($records[0]->vvfDateEnd), 'd-m-Y')?> </option>
								<option value="vo3_vvf_update?&rpt_no=VVFBEM/HSA/<?=$Period?>/<?=$Date2year?>"><?= $Date2Start. ' to ' .$Date2End?> </option><!--for test-->
								
								</select>
							</td>
						</tr>
						<tr>
							<td class="td-assest" align="right" valign="top">Report Status :</td>
							<td valign="top">
								<input type="radio" id="radio-1-1" name="n_Report_Status" class="regular-radio" value = "BO"<?php echo set_radio('n_Report_Status', 'BO', TRUE); ?> disabled/>   
								<label for="radio-1-1"></label> In Progress<br>
								<input type="radio" id="radio-1-2" name="n_Report_Status" class="regular-radio" value = "C"<?php echo set_radio('n_Report_Status', 'C', TRUE); ?> disabled/>   
								<label for="radio-1-2"></label> Completed<br>
								<input type="radio" id="radio-1-3" name="n_Report_Status" class="regular-radio" value = "CO"<?php echo set_radio('n_Report_Status', 'CO', TRUE); ?> disabled />   
								<label for="radio-1-3"></label>  Closed. No submission required.
							</td>
						</tr>
						<tr>
							<td class="td-assest" align="right" valign="top">Submitted to MOH On :</td>
							<td><input type="date" name="n_Submitted" value="<?php echo set_value('n_Submitted'); ?>" class="form-control-button2" style="width:190px;" disabled></td>
						</tr>
						<tr class="ui-header-new" style="height:2px;">
							<td align="center" colspan="2" >
								<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
								<input type="button" class="btn-button btn-primary-button" name="Cancel" value="Cancel" onclick="window.history.back()" style="width:150px;"/>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php echo form_hidden('n_Report_Status',$this->input->post('n_Report_Status')); ?>
		<?php echo form_hidden('n_Submitted',$this->input->post('n_Submitted')); ?>
		<?php echo form_hidden('rpt_no',$this->input->post('rpt_no')); ?>
	</div>
	<script type="text/javascript" language="javascript">
		function showRegRange(form) {
		// Default (form) value is 0
		// Web/HTML page is set with OPTION SELECTED VALUE
		var formindex=form.n_regDate_range.selectedIndex;
		
		//alert(formindex);
		parent.self.location=form.n_regDate_range.options[formindex].value;
		// parent.self refers to the current browser window
		}	
		</script>
</div>
<?php echo form_close(); ?>