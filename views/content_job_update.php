<?php echo form_open('wo_jobclose_update_ctrl');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="2"><b>Update Job Close</b></td>
				<span style="color:red;"><?php echo validation_errors(); ?>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Visit one / Start Date : </td>
				<td ><?= isset($d_date) == TRUE ? date_format(new DateTime($d_date), 'd-m-Y H:i') : 'N/A'?></td>
			</tr>
			<tr>
				<td class="td-assest">Exact Date / Due Date :</td>			
				<td><?= isset($duedate) == TRUE ? date_format(new DateTime($duedate), 'd-m-Y') : 'N/A'?></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Job Close</td></tr>
			<tr>
				<td class="td-assest" valign="top">Job Close Date : </td>
				<td><input type="text" id="date0" name="n_job_Date" value="<?php echo set_value('n_job_Date', isset($recordppm[0]->d_DateDone) == TRUE ? date_format(new DateTime($recordppm[0]->d_DateDone), 'd-m-Y') : date_format(new DateTime($recordv1[0]->d_Date), 'Y-m-d'))?>" class="form-control-button2"></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Job Close Time :</td>
				<td>
					<?php 
										$hour_list = array(
										'0' => '0',
                  						'1' => '1',
                  				 		'2' => '2',
                  				 		'3' => '3',
                  						'4' => '4',
                  				 		'5' => '5',
                  				 		'6' => '6',
                  						'7' => '7',
                  				 		'8' => '8',
                  				 		'9' => '9',
                  						'10' => '10',
                  				 		'11' => '11',
                  				 		'12' => '12',
                  				 		'13' => '13',
                  				 		'14' => '14',
                  						'15' => '15',
                  				 		'16' => '16',
                  				 		'17' => '17',
                  						'18' => '18',
                  				 		'19' => '19',
                  				 		'20' => '20',
                  						'21' => '21',
                  				 		'22' => '22',
                  				 		'23' => '23',
                					 );
										 ?>
								        <?php echo form_dropdown('n_JChour', $hour_list, set_value('n_JChour',isset($jctime[0]) == TRUE ? $jctime[0] : $Stimev1[0]) , 'class="dropdown" style="width: 52px;"'); ?> 
										<?php 
										$min_list = array(
										'0' => '0',
                  						'1' => '1',
                  				 		'2' => '2',
                  				 		'3' => '3',
                  						'4' => '4',
                  				 		'5' => '5',
                  				 		'6' => '6',
                  						'7' => '7',
                  				 		'8' => '8',
                  				 		'9' => '9',
                  						'10' => '10',
                  				 		'11' => '11',
                  				 		'12' => '12',
                  				 		'13' => '13',
                  				 		'14' => '14',
                  						'15' => '15',
                  				 		'16' => '16',
                  				 		'17' => '17',
                  						'18' => '18',
                  				 		'19' => '19',
                  				 		'20' => '20',
                  						'21' => '21',
                  				 		'22' => '22',
                  				 		'23' => '23',
                  						'24' => '24',
                  				 		'25' => '25',
                  				 		'26' => '26',
                  						'27' => '27',
                  				 		'28' => '28',
                  				 		'29' => '29',
                  						'30' => '30',
                  				 		'31' => '31',
                  				 		'32' => '32',
                  						'33' => '33',
                  				 		'34' => '34',
                  				 		'35' => '35',
                  				 		'36' => '36',
                  				 		'37' => '37',
                  						'38' => '38',
                  				 		'39' => '39',
                  				 		'40' => '40',
                  						'41' => '41',
                  				 		'42' => '42',
                  				 		'43' => '43',
                  						'44' => '44',
                  				 		'45' => '45',
                  				 		'46' => '46',
                  				 		'47' => '47',
                  				 		'48' => '48',
                  						'49' => '49',
                  				 		'50' => '50',
                  				 		'51' => '51',
                  				 		'52' => '52',
                  				 		'53' => '53',
                  						'54' => '54',
                  				 		'55' => '55',
                  				 		'56' => '56',
                  						'57' => '57',
                  				 		'58' => '58',
                  				 		'59' => '59',
                					 );
										 ?>		
		              			<?php echo form_dropdown('n_JCmin', $min_list, set_value('n_JCmin',isset($jctime[1]) == TRUE ? $jctime[1] : $Stimev1[1]) , 'class="dropdown" style="width: 52px;"'); ?>
				</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Job Close Summary : </td>
				<td><textarea class="input n_com" name="n_jobclose_summary"><?php echo set_value('n_jobclose_summary', isset($recordppm[0]->v_summary) == TRUE ? $recordppm[0]->v_summary : 'N/A')?></textarea></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Related Tests</td></tr>
			<tr>
				<td class="td-assest" valign="top">Performance Test : </td>
				
				<td  valign="top">
					
					<input type="radio" id="radio-1-1" name="n_performance_test" class="regular-radio" value = "Done" <?php echo set_radio('n_performance_test', 'Done', TRUE); ?><?= isset($recordppm[0]->v_ptest) && $recordppm[0]->v_ptest == 'Done' ? 'checked' : 'checked'?>/>   
					<label for="radio-1-1"></label> Done</option><br />
					<input type="radio" id="radio-1-2" name="n_performance_test" class="regular-radio" DISABLED/>   
					<label for="radio-1-2"></label><font color="#cccccc"> Not Done</font><br />
					<input type="radio" id="radio-1-3" name="n_performance_test" class="regular-radio" value = "Not Applicable" <?php echo set_radio('n_performance_test', 'Not Applicable', TRUE); ?><?= isset($recordppm[0]->v_ptest) && $recordppm[0]->v_ptest == 'Not Applicable' ? 'checked' : ''?>/>   
					<label for="radio-1-3"></label> Not Applicable</option>
					
				</td>
				
			</tr>
			<tr>
				<td class="td-assest" valign="top">Safety Test Required :</td>			
				<td >
					
					<input type="radio" id="radio-1-4" onclick="javascript:fShowSTestResult('Y');" name="n_safety_test" class="regular-radio" id = 'n_safety_test' value="Done" <?php echo set_radio('n_safety_test', 'Done', TRUE); ?><?= isset($recordppm[0]->v_stest) && $recordppm[0]->v_stest == 'Done' ? 'checked' : 'checked'?>/>   
					<label for="radio-1-4"></label> Done<br />
					<input type="radio" id="radio-1-5" name="n_safety_test" class="regular-radio" disabled/>   
					<label for="radio-1-5"></label><font color="#cccccc"> Not Done</font><br />
					<input type="radio" id="radio-1-6" onclick="javascript:fShowSTestResult('N');" name="n_safety_test" class="regular-radio" value="Not Applicable" <?php echo set_radio('n_safety_test', 'Not Applicable', TRUE); ?><?= isset($recordppm[0]->v_stest) && $recordppm[0]->v_stest == 'Not Applicable' ? 'checked' : ''?>/>
					<label for="radio-1-6"></label> Not Applicable<br />
					
				</td>
			</tr>
			<tr>
				<td valign="top">Safety Test Result :</td>			
				<td>
					
					<?php if ((isset($recordppm[0]->v_stest) && $recordppm[0]->v_stest == 'Done') || $this->input->post('n_safety_test') == 'Done') { ?>
					<table border="0" width="150" id="divShowSTestResult" style="display:block; color:black; margin-left:-3px;">
					<?php } else if (isset($recordppm[0]->v_stest) && $recordppm[0]->v_stest == 'Not Applicable') { ?>
					<table border="0" width="150" id="divShowSTestResult" style="display:none; color:black; margin-left:-3px;">
					<?php } else { ?>
					<table border="0" width="150" id="divShowSTestResult" style="display:none; color:black; margin-left:-3px;">	
					<?php } ?>
						<tr>
							<td>
								<input type="radio" id="radio-1-29" name="n_safety_result" class="regular-radio" value="Y"<?php echo set_radio('n_safety_result', 'Y', TRUE); ?><?= isset($recordppm[0]->v_sstatus) && $recordppm[0]->v_sstatus == 'Y' ? 'checked' : 'checked'?>/>   
								<label for="radio-1-29"></label> Passed<br />
								<input type="radio" id="radio-1-30" name="n_safety_result" class="regular-radio" value="NA"<?php echo set_radio('n_safety_result', 'NA', TRUE); ?><?= isset($recordppm[0]->v_sstatus) && $recordppm[0]->v_sstatus == 'NA' ? 'checked' : ''?>/>   
								<label for="radio-1-30"></label> Failed
							</td>
						</tr>
					</table>
					
				</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Information</td></tr>
			<tr>
				<td class="td-assest" valign="top" colspan="2">The following asset information is pulled from Asset Catalog for your easy reference.</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Asset number : </td>
				<td><?= isset($ppmasset[0]->V_Asset_no) == TRUE ? $ppmasset[0]->V_Asset_no : 'N/A'?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Asset Tag Number : </td>
				<td><?= isset($ppmasset[0]->V_Tag_no) == TRUE ? $ppmasset[0]->V_Tag_no : 'N/A'?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Asset Serial Number : </td>
				<td><?= isset($ppmasset[0]->V_Serial_no) == TRUE ? $ppmasset[0]->V_Serial_no : 'N/A'?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Asset Name : </td>
				<td><?= isset($ppmasset[0]->V_Asset_name) == TRUE ? $ppmasset[0]->V_Asset_name : 'N/A'?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Safety Test Requirement : </td>
				<td><?= isset($ppmasset[0]->v_SafetyTest) == TRUE ? $ppmasset[0]->v_SafetyTest : 'N/A'?></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Related Codes</td></tr>
			<tr>
				<td class="td-assest" valign="top">Job Type Code : </td>
				<td>
						<?php 
							$jobtype_list = array(
							'' => '',
							'1W' => '1W Weekly',
                  			'2W' => '2W Two Weekly',
                  			'3W' => '3W Three Weekly',
                  			'1M' => '1M Monthly',
                  			'2M' => '2M Two Monthly',
                  			'3M' => '3M Quarterly',
                  			'4M' => '4M Four Monthly',
                  			'6M' => '6M Half Yearly',
                  			'12M' => '12M Annually',
                  	 		'15M' => '15M 15 Month', 
                  			);
						?>		
		              	<?php echo form_dropdown('n_job_type', $jobtype_list, set_value('n_job_type',isset($ppmrec[0]->v_jobtype) == TRUE ? $ppmrec[0]->v_jobtype : 'N/A') , 'class="dropdown n_wi-date2"'); ?>
				</td>
			</tr>
			

			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Stoppage</td></tr>
			<tr>
				<td class="td-assest" valign="top">Stoppage : </td>
				<td><input class="InputText" onmouseup="javascript:fShowStoppage();" name ="n_Stoppage"  type="checkbox" id="n_Stoppage" value="ON"<?php echo set_checkbox('n_Stoppage', 'ON'); ?><?= isset($recordppm[0]->v_stoppage) && $recordppm[0]->v_stoppage == 'ON' ? 'checked' : ''?>></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top" height="30px">Partially Functioning Start : </td>
				<td>
					<?php if ((isset($recordppm[0]->v_stoppage) AND $recordppm[0]->v_stoppage == 'ON') OR $this->input->post('n_Stoppage') == 'ON') { ?>
					<div id="divShowPF1" name="divShowPF1" style="display:block; color:black;">
					<?php } else { ?>
					<div id="divShowPF1" name="divShowPF1" style="display:none; color:black;">
					<?php } ?>
                    	<input type="date" class="form-control-button2" id= "n_PFStartDate" name="n_PFStartDate" value="<?php echo set_value('n_PFStartDate', isset($recordppm[0]->d_pfsdate) == TRUE ? date_format(new DateTime($recordppm[0]->d_pfsdate), 'Y-m-d') : 'N/A')?>" size="20" >
						<span class="space"></span>
						<input type="text" class="form-control-button2" id= "n_PFStartHH" name="n_PFStartHH" value="<?php echo set_value('n_PFStartHH', isset($pfstime[0]) == TRUE ? $pfstime[0] : '') ?>" size="2">
						<input type="text" class="form-control-button2" id= "n_PFStartNN" name="n_PFStartNN" value="<?php echo set_value('n_PFStartNN', isset($pfstime[1]) == TRUE ? $pfstime[1] : '') ?>" size="2">									
					</div>
					
				</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top" height="30px">Partially Functioning End : </td>
				<td>
					<?php if ((isset($recordppm[0]->v_stoppage) AND $recordppm[0]->v_stoppage == 'ON') OR $this->input->post('n_Stoppage') == 'ON') { ?>
					<div id="divShowPF2" name="divShowPF2" style="display:block; color:black;">
					<?php } else { ?>
					<div id="divShowPF2" name="divShowPF2" style="display:none; color:black;">
					<?php } ?>
						<input type="date" class="form-control-button2" id= "n_PFEndDate" name="n_PFEndDate" value="<?php echo set_value('n_PFEndDate', isset($recordppm[0]->d_pfedate) == TRUE ? date_format(new DateTime($recordppm[0]->d_pfedate), 'Y-m-d') : 'N/A')?>">
						<span class="space"></span>
						<input type="text" class="form-control-button2" id= "n_PFEndHH" name="n_PFEndHH" value="<?php echo set_value('n_PFEndHH', isset($pfetime[0]) == TRUE ? $pfetime[0] : '') ?>" size="2">
						<input type="text" class="form-control-button2" id= "n_PFEndNN" name="n_PFEndNN" value="<?php echo set_value('n_PFEndNN', isset($pfetime[1]) == TRUE ? $pfetime[1] : '' )?>" size="2">
					</div>
					
				</td>
			</tr>

			<!--<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Stoppage</td></tr>
			<tr>
				<td class="td-assest" valign="top">Stoppage : </td>
				<?php if (isset($recordppm[0]->v_Wrkordno)) { ?>
				<td><input class="InputText" onmouseup="javascript:fShowStoppage();" name = "n_Stoppage"  type="checkbox" id="n_Stoppage" value="ON"<?php echo set_radio('n_Stoppage', 'ON', TRUE); ?><?= $recordppm[0]->v_stoppage == 'ON' ? 'checked' : ''?>></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top" height="30px">Partially Functioning Start : </td>
				<td>
					<?php if ($recordppm[0]->v_stoppage == 'ON') { ?>
					<div id="divShowPF1" name="divShowPF1" style="display:block; color:black;">
                    	<input type="date" class="form-control-button2 n_wi-date2" id= "n_PFStartDate" name="n_PFStartDate" value="<?= isset($recordppm[0]->d_pfsdate) == TRUE ? date_format(new DateTime($recordppm[0]->d_pfsdate), 'Y-m-d') : 'N/A'?>" size="20" >
						<span class="space"></span>
						<input type="text" class="form-control-button2" id= "n_PFStartHH" name="n_PFStartHH" value="<?= isset($pfstime[0]) == TRUE ? $pfstime[0] : 'N/A' ?>" size="2">
						<input type="text" class="form-control-button2" id= "n_PFStartNN" name="n_PFStartNN" value="<?= isset($pfstime[1]) == TRUE ? $pfstime[1] : 'N/A' ?>" size="2">									
					</div>
					<?php } ?>
					<?php if ($recordppm[0]->v_stoppage == '') { ?>
					<div id="divShowPF1" name="divShowPF1" style="display:none; color:black;">
                    	<input type="date" class="form-control-button2 n_wi-date2" id= "n_PFStartDate" name="n_PFStartDate" value="" size="20" >
						<span class="space"></span>
						<input type="text" class="form-control-button2" id= "n_PFStartHH" name="n_PFStartHH" value="" size="2">
						<input type="text" class="form-control-button2" id= "n_PFStartNN" name="n_PFStartNN" value="" size="2">									
					</div>
					<?php } ?>
				</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top" height="30px">Partially Functioning End : </td>
				<td>
					<?php if ($recordppm[0]->v_stoppage == 'ON') { ?>
					<div id="divShowPF2" name="divShowPF2" style="display:block; color:black;">
						<input type="date" class="form-control-button2 n_wi-date2" id= "n_PFEndDate" name="n_PFEndDate" value="<?= isset($recordppm[0]->d_pfedate) == TRUE ? date_format(new DateTime($recordppm[0]->d_pfedate), 'Y-m-d') : 'N/A'?>" size="20" >
						<span class="space"></span>
						<input type="text" class="form-control-button2" id= "n_PFEndHH" name="n_PFEndHH" value="<?= isset($pfetime[0]) == TRUE ? $pfetime[0] : 'N/A' ?>" size="2">
						<input type="text" class="form-control-button2" id= "n_PFEndNN" name="n_PFEndNN" value="<?= isset($pfetime[1]) == TRUE ? $pfetime[1] : 'N/A' ?>" size="2">
					</div>
					<?php } ?>
					<?php if ($recordppm[0]->v_stoppage == '') { ?>
					<div id="divShowPF2" name="divShowPF2" style="display:none; color:black;">
						<input type="date" class="form-control-button2 n_wi-date2" id= "n_PFEndDate" name="n_PFEndDate" value="" size="20" >
						<span class="space"></span>
						<input type="text" class="form-control-button2" id= "n_PFEndHH" name="n_PFEndHH" value="" size="2">
						<input type="text" class="form-control-button2" id= "n_PFEndNN" name="n_PFEndNN" value="" size="2">
					</div>
					<?php } ?>
				</td>
			</tr>
				<?php } ?>
			<?php if (!isset($recordppm[0]->v_Wrkordno)) { ?>
				<td><input class="InputText" onmouseup="javascript:fShowStoppage();" name = "n_Stoppage"  type="checkbox" id="n_Stoppage" value="ON"></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top" height="30px">Partially Functioning Start : </td>
				<td>
					<div id="divShowPF1" name="divShowPF1" style="display:none; color:black;">
                    	<input type="date" class="form-control-button2 n_wi-date2" id= "n_PFStartDate" name="n_PFStartDate" value="" size="20" >
                    	<span class="space"></span>
						<input type="text" class="form-control-button2" id= "n_PFStartHH" name="n_PFStartHH" value="" size="2">
						<input type="text" class="form-control-button2" id= "n_PFStartNN" name="n_PFStartNN" value="" size="2">									
					</div>
				</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top" height="30px">Partially Functioning End : </td>
				<td>
					<div id="divShowPF2" name="divShowPF2" style="display:none; color:black;">
						<input type="date" class="form-control-button2 n_wi-date2" id= "n_PFEndDate" name="n_PFEndDate" value="" size="20" >
						<span class="space"></span>
						<input type="text" class="form-control-button2" id= "n_PFEndHH" name="n_PFEndHH" value="" size="2">
						<input type="text" class="form-control-button2" id= "n_PFEndNN" name="n_PFEndNN" value="" size="2">
					</div>
				</td>
			</tr>
				<?php } ?>-->


			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Summary of Time</td></tr>
			<tr>
				<td class="td-assest" valign="top">Down Time : </td>
				<td>System auto-calculate <?php echo $this->input->post('down_time'); ?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Service Time : </td>
				<td>System auto-calculate <?php echo $this->input->post('serv_time'); ?></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Completion Time : </td>
				<td>System auto-calculate </td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">QC</td></tr>
			<tr>
				<td class="td-assest" valign="top">QC PPM : </td>
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
                              <?php echo form_dropdown('QC_PPM', $QC_PPM, set_value('QC_PPM',isset($recordppm[0]->v_QCPPM) == TRUE ? $recordppm[0]->v_QCPPM : 'N/A') , 'class="dropdown n_wi-date2"');?>
				</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">QC Uptime : </td>
				<td>
					<?php 
							$QC_list = array(
							'' => '',
                  			'QC17' => 'QC17 Downtime due to PPM',
                  			);
						?>		
		              	<?php echo form_dropdown('n_QCUptime', $QC_list, set_value('n_QCUptime',isset($recordppm[0]->v_QCuptime) == TRUE ? $recordppm[0]->v_QCuptime : 'N/A') , 'class="dropdown n_wi-date2"'); ?>
				</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Acceptance</td></tr>
			<tr>
				<td class="td-assest" valign="top">Accepted By : </td>
				<td><input type="text" class="form-control-button2 n_wi-date2" name="n_Accepted_By" value="<?php echo set_value('n_Accepted_By', isset($recordppm[0]->v_AcceptedBy) == TRUE ? $recordppm[0]->v_AcceptedBy : 'N/A')?>"></td>
				<!--<input type="text" class="form-control-button2 n_wi-date2" name="n_Accepted_By" value="<?= isset($name) ? $this->input->post('name') : '' ?>" onclick='javascript:fg_popup_form("fg_formContainer","fg_form_InnerContainer","fg_backgroundpopup");' readonly>-->
			</tr>
			<tr>
				<td class="td-assest" valign="top">Designation : </td>
				<td>
					
					<input type="radio" id="radio-1-7" name="n_Designation" class="regular-radio" value = "Doctor" <?php echo set_radio('n_Designation', 'Doctor', TRUE); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'Doctor' ? 'checked' : 'checked'?>/>   
					<label for="radio-1-7"></label> Doctor<br>
					<input type="radio" id="radio-1-8" name="n_Designation" class="regular-radio" value = "Matron" <?php echo set_radio('n_Designation', 'Matron', TRUE); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'Matron' ? 'checked' : ''?>/>   
					<label for="radio-1-8"></label> Matron<br>
					<input type="radio" id="radio-1-9" name="n_Designation" class="regular-radio" value = "Medical Assistant" <?php echo set_radio('n_Designation', 'Medical Assistant', TRUE); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'Medical Assistant' ? 'checked' : ''?>/>   
					<label for="radio-1-9"></label> Medical Assistant<br>
					<input type="radio" id="radio-1-10" name="n_Designation" class="regular-radio" value = "IIUM Officer" <?php echo set_radio('n_Designation', 'IIUM Officer', TRUE); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'IIUM Officer' ? 'checked' : ''?>/>   
					<label for="radio-1-10"></label> IIUM Officer<br>
					<input type="radio" id="radio-1-11" name="n_Designation" class="regular-radio" value = "Sister In-Charge" <?php echo set_radio('n_Designation', 'Sister In-Charge', TRUE); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'Sister In-Charge' ? 'checked' : ''?>/>   
					<label for="radio-1-11"></label> Sister In-Charge<br>
					<input type="radio" id="radio-1-12" name="n_Designation" class="regular-radio" value = "Sister On Duty" <?php echo set_radio('n_Designation', 'Sister On Duty', TRUE); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'Sister On Duty' ? 'checked' : ''?>/>   
					<label for="radio-1-12"></label> Sister On Duty<br>
					<input type="radio" id="radio-1-13" name="n_Designation" class="regular-radio" value = "Specialist" <?php echo set_radio('n_Designation', 'Specialist', TRUE); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'Specialist' ? 'checked' : ''?>/>   
					<label for="radio-1-13"></label> Specialist<br>
					<input type="radio" id="radio-1-14" name="n_Designation" class="regular-radio" value = "Staff Nurse" <?php echo set_radio('n_Designation', 'Staff Nurse', TRUE); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'Staff Nurse' ? 'checked' : ''?>/>   
					<label for="radio-1-14"></label> Staff Nurse<br>
					<input type="radio" id="radio-1-15" name="n_Designation" class="regular-radio" value = "Supervisor" <?php echo set_radio('n_Designation', 'Supervisor', TRUE); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'Supervisor' ? 'checked' : ''?>/>   
					<label for="radio-1-15"></label> Supervisor<br>
					<input type="radio" id="radio-1-16" name="n_Designation" class="regular-radio" value = "APSB" <?php echo set_radio('n_Designation', 'APSB', TRUE); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'APSB' ? 'checked' : ''?>/>   
					<label for="radio-1-16"></label> APSB<br>
					<input type="radio" id="radio-1-17" name="n_Designation" class="regular-radio" value = "PMSB" <?php echo set_radio('n_Designation', 'PMSB', TRUE); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'PMSB' ? 'checked' : ''?>/>   
					<label for="radio-1-17"></label> PMSB<br>
					<input type="radio" id="radio-1-18" name="n_Designation" class="regular-radio" value = "APFMS" <?php echo set_radio('n_Designation', 'APFMS', TRUE); ?><?= isset($recordppm[0]->V_ACCEPTED_Designation) && $recordppm[0]->V_ACCEPTED_Designation == 'APFMS' ? 'checked' : ''?>/>   
					<label for="radio-1-18"></label> APFMS<br>
					
				</td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Acceptance Date : </td>
				<td><input type="text" id="date1" name="n_Acceptance_Date" value="<?php echo set_value('n_Acceptance_Date', isset($recordppm[0]->d_AcceptedDt) == TRUE ? date_format(new DateTime($recordppm[0]->d_AcceptedDt), 'd-m-Y') : 'N/A')?>" class="form-control-button2"></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Closed By :</td>
				<td><div class="p-vo-2"><span class="ui-left_mobile">Name : </span>
                   <input type="text" id="n_personnel_code1" name="C_requestor1" value="<?php echo set_value('C_requestor1', isset($PPPMpersonal[0]) == TRUE ? $PPPMpersonal[0] : 'N/A')?>" size="10" class="form-control-button2" readonly> <span class="icon-windows" onclick="fCallassetdetailname(this)" value="job"></span>
                   <span style="font-size:14px;"><input type="text" id="n_personnel_name1" name="V_requestor1" value="<?php echo set_value('V_requestor1', isset($PPPMpersonal[1]) == TRUE ? $PPPMpersonal[1] : '')?>" size="10" class="input-none" readonly></span></div></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="2">
					<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Save">
				</td>
			</tr>
		</table>
		<?php  echo form_hidden('wrk_ord',$this->input->post('wrk_ord')); ?>
		<?php  echo form_hidden('d_date',$this->input->post('d_date')); ?>
		<?php  echo form_hidden('duedate',$this->input->post('duedate')); ?>
		<?php  echo form_hidden('serv_time',$this->input->post('serv_time')); ?>
		<?php  echo form_hidden('down_time',$this->input->post('down_time')); ?>		
	</div>
</div>
<script language="javascript" type="text/javascript">
	function fShowSTestResult(sTest)
	{
		if (sTest == "Y")
			{
				document.getElementById('divShowSTestResult').style.display = "block"
			}
		
		else
			{
				document.getElementById('divShowSTestResult').style.display = "none"
			}
	}
		function fShowStoppage()
	{
		if (document.getElementById('n_Stoppage').checked == true) 
			{

			document.getElementById('divShowPF1').style.display = "none"
			document.getElementById('divShowPF2').style.display = "none"
			document.getElementById("n_PFStartDate").value = ""
			document.getElementById("n_PFStartHH").value = ""
			document.getElementById("n_PFStartNN").value = ""
			document.getElementById("n_PFEndDate").value = ""
			document.getElementById("n_PFEndHH").value = ""
			document.getElementById("n_PFEndNN").value = ""
			
			}
		else
			{
			document.getElementById('divShowPF1').style.display = "block"
			document.getElementById('divShowPF2').style.display = "block"
			}
		
	}

</script>
<?php include 'content_jv_popup.php';?>
<!--<?php require_once('contact-wojobuser.php');?>-->
<?php echo form_close(); ?>