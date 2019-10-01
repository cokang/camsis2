<?php echo form_open('wo_ppm_update_ctrl');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
            <div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Update PPM</b></td>
			</tr>
			<tr>
				<td class="td-assest">QC PPM: </td>
				<td>
				<?php 
                              $QC_PPM = array(
                              '' => '',
                              'QC01' => 'QC01 Equipment not made available',
                              'QC02' => 'QC02 Technical Personnel',
                              'QC03' => 'QC03 Delay closing of Work Order',
                              'QC04' => 'QC04 User Request',
                              'QC05' => 'QC05 Mishandling/vandalism/overload',
                              'QC06' => 'QC06 Vendor Delay',
                              'QC07' => 'QC07 Equipment Down',
                              'QC08' => 'QC08 Breakdown of related support system',
                              'QC11' => 'QC11 Improper procedure',
                              'QC13' => 'QC13 PPM kit/test equipment not available/spares',
                              'QC15' => 'QC15 Force Majeure',
                              'QC16' => 'QC16 Safety, Health and Evironmental Factor',
                              'QC17' => 'QC17 Downtime due to PPM',
                              'QC18' => 'QC18 Downtime due to SCM',
                              'QC19' => 'QC19 Equipment not functional and waiting for BER approved',
                              );
                              ?>
                              <?php echo form_dropdown('QC_PPM', $QC_PPM, set_value('QC_PPM',isset($record[0]->v_QCPPM) == TRUE ? $record[0]->v_QCPPM : 'N/A') , 'class="dropdown n_wi-date2" ');?>
                </td>
			</tr>
			<tr>
				<td class="td-assest">QC Uptime:</td>			
				<td>
				<?php 
                              $QC_Uptime = array(
                              '' => '',
                              'QC17' => 'QC17 Downtime due to PPM',
                              );
                              ?>
                              <?php echo form_dropdown('QC_Uptime', $QC_Uptime, set_value('QC_Uptime',isset($record[0]->v_QCuptime) == TRUE ? $record[0]->v_QCuptime : 'N/A') , 'class="dropdown n_wi-date2" ');?>
                </td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Save">
				</td>
			</tr>
		</table>
		<?php echo form_hidden('wrk_ord',$this->input->post('wrk_ord')); ?>				
	</div>
</div>
<?php echo form_close(); ?>