<?php echo form_open('contentcontroller/print_vo3_report?rpt_no='.$this->input->get('rpt_no').'&site='.$site);?>
<div class="ui-middle-screen">
	<?php include 'content_vo3_menu.php';?>
	<div class="content-workorder">
		<table class="ui-desk-style-table3" style="margin-left:auto; margin-right:auto;" cellpadding="4" cellspacing="0" width="98%">	
			<tr class="ui-color-contents-style-1" >
				<td class="ui-header-new" colspan="14" valign="" height="43px"><span style="float: left; margin-top:8px; font-weight: bold;">VO Report</span></td>
			</tr> 
			<?php if(!empty($records)) { ?>      			
			<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Select a Report</td></tr>
			<tr>
				<td valign="top" style="width:15%;" align="right">Report Type :</td>
				<td>
					<input type="radio" id="radio-1-1" name="n_report_type" class="regular-radio" value="1" <?php echo set_radio('n_report_type', '1'); ?>/> 
					<label for="radio-1-1"></label>  Site Review (All VO items) <br />
					<input type="radio" id="radio-1-2" name="n_report_type" class="regular-radio" value="2" <?php echo set_radio('n_report_type', '2', TRUE); ?>/>   
					<label for="radio-1-2"></label>  Site Submission Report (Locked VO items only)<br />
					<input type="radio" id="radio-1-3" name="n_report_type" class="regular-radio" value="3" <?php echo set_radio('n_report_type', '3'); ?>/> 
					<label for="radio-1-3"></label> VVF Report (Authorized VO items only)
				</td>
				<td style="width:40%;"></td>
			</tr>
			<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Select Date Range</td></tr>
			<tr>
				<td valign="top" align="right">Period :</td>
				<?php if (substr($rpt_no_array[2],1,1) == 1) {?>
				<td><FORM name ="form1" method ="get">
					<input type="radio" id="radio-1-4" name="n_Period" class="regular-radio" value="0" <?php echo set_radio('n_Period', '0'); ?> checked/> 
					<label for="radio-1-4"></label>  Entire <?= substr($rpt_no_array[2],0,4) ?> <br />
					<input type="radio" id="radio-1-5" name="n_Period" class="regular-radio" value="1" <?php echo set_radio('n_Period', '1'); ?>/>   
					<label for="radio-1-5"></label>  January <?= substr($rpt_no_array[3],2,2) ?><br />
					<input type="radio" id="radio-1-6" name="n_Period" class="regular-radio" value="2" <?php echo set_radio('n_Period', '2'); ?>/> 
					<label for="radio-1-6"></label> February <?= substr($rpt_no_array[3],2,2) ?><br />
					<input type="radio" id="radio-1-7" name="n_Period" class="regular-radio" value="3" <?php echo set_radio('n_Period', '3'); ?>/> 
					<label for="radio-1-7"></label>  March <?= substr($rpt_no_array[3],2,2) ?><br />
					<input type="radio" id="radio-1-8" name="n_Period" class="regular-radio" value="4" <?php echo set_radio('n_Period', '4'); ?>/>   
					<label for="radio-1-8"></label>  April <?= substr($rpt_no_array[3],2,2) ?><br />
					<input type="radio" id="radio-1-9" name="n_Period" class="regular-radio" value="5" <?php echo set_radio('n_Period', '5'); ?>/> 
					<label for="radio-1-9"></label> May <?= substr($rpt_no_array[3],2,2) ?><br />
					<input type="radio" id="radio-1-10" name="n_Period" class="regular-radio" value="6" <?php echo set_radio('n_Period', '6'); ?>/> 
					<label for="radio-1-10"></label> June <?= substr($rpt_no_array[3],2,2) ?><br />
				</td>
				<?php } ?>
				<?php if (substr($rpt_no_array[2],1,1) == 2) {?>
				<td>
					<input type="radio" id="radio-1-4" name="n_Period" class="regular-radio" value="0" <?php echo set_radio('n_Period', '0'); ?> checked/> 
					<label for="radio-1-4"></label>  Entire <?= substr($rpt_no_array[2],0,4) ?> <br />
					<input type="radio" id="radio-1-5" name="n_Period" class="regular-radio" value="7" <?php echo set_radio('n_Period', '7'); ?>/>   
					<label for="radio-1-5"></label>  July <?= substr($rpt_no_array[3],2,2) ?><br />
					<input type="radio" id="radio-1-6" name="n_Period" class="regular-radio" value="8" <?php echo set_radio('n_Period', '8'); ?>/> 
					<label for="radio-1-6"></label> August <?= substr($rpt_no_array[3],2,2) ?><br />
					<input type="radio" id="radio-1-7" name="n_Period" class="regular-radio" value="9" <?php echo set_radio('n_Period', '9'); ?>/> 
					<label for="radio-1-7"></label>  September <?= substr($rpt_no_array[3],2,2) ?><br />
					<input type="radio" id="radio-1-8" name="n_Period" class="regular-radio" value="10" <?php echo set_radio('n_Period', '10'); ?>/>   
					<label for="radio-1-8"></label>  October <?= substr($rpt_no_array[3],2,2) ?><br />
					<input type="radio" id="radio-1-9" name="n_Period" class="regular-radio" value="11" <?php echo set_radio('n_Period', '11'); ?>/> 
					<label for="radio-1-9"></label> November <?= substr($rpt_no_array[3],2,2) ?><br />
					<input type="radio" id="radio-1-10" name="n_Period" class="regular-radio" value="12" <?php echo set_radio('n_Period', '12'); ?>/> 
					<label for="radio-1-10"></label> December <?= substr($rpt_no_array[3],2,2) ?><br />
				</td>
				<?php } ?>
				</tr>
			<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Other Options</td></tr>
			<tr>
				<td valign="top" align="right">Page Break :</td>
				<td>
					<input type="checkbox" id="pb1" name="pb1" value="y"<?php echo set_radio('pb1', 'y', TRUE); ?> checked >Separate page for each variation status<br />
					<input type="checkbox" id="pb2" name="pb2" value="y"<?php echo set_radio('pb2', 'y', TRUE); ?> checked >Separate page for each submission month
				</td>
				<td></td>
			</tr>
			<tr>
				<td valign="top" align="right">Number of lines : </td>
				<td>
					<input type="text" id="n_lineNo" name="n_lineNo" value= "6" class="form-control-button2"> per page
				</td>
				<td></td>
			</tr>
			<tr class="ui-header-new">
				<td align="center" colspan="3"><input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Preview">
				</td>
			</tr>
			<?php } else { ?>
			<tr align="center" style="height:400px;">
				<td colspan="14" class="ui-color-color-color"><span style="color:red; text-transform: uppercase; font-size:14px;">NO ASSET HAS BEEN SUBMITTED FOR <?=$this->input->get('rpt_no')?></span></td>
			</tr>
			<?php } ?>
		</table>
		
	</div>
</div>