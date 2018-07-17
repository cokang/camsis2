<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form">
		<?php include 'content_asset_tab.php';?>
			<div class="ui-main-form-5">
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">PPM Job Register</span></b>
							<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/assetPPMjob_update?asstno='.$this->input->get('asstno'), '<button type="button" class="btn-button btn-primary-button">Add</button>'); ?>
							</span>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
							<table class="ui-content-form" id="no-more-tables" data-table="assetPPMjob" width="100%" border="0">
								<tr>	
									<th>Year</th>
									<th>Job Type</th>
									<th width="50px">Frequency (days)</th>
									<th>Start Date</th>
									<th>To Date</th>
									<th>Checklist</th>
									<th>Procedure</th>
									<th>Sparelist</th>
									<th>Details</th>
									<th>Weeks</th>
								</tr>
								<?php  if (!empty($records)) {?> 
									<?php $numrow = 1; foreach($records as $row):?>
									<tr align="center" <?= ($numrow%2==0) ?  'class="tr_color"' :  '' ?> >
										<!--<td><?= isset($row->v_year) == TRUE ? $row->v_year : 'N/A'?></td>-->
										<td data-title="Year :"><?= isset($row->v_year) == TRUE ? anchor ('contentcontroller/ppm_set_detail?assetno='.$this->input->get('asstno').'&jobyear='.$row->v_year.'&id='.$row->id, $row->v_year) : anchor ('contentcontroller/ppm_set_detail?assetno='.$this->input->get('asstno').'&jobyear='.$row->v_year, 'N/A')?></td>
										<td data-title="Job Type :"><?= isset($row->v_jobtype) == TRUE ? $row->v_jobtype : 'N/A'?></td>
										<td data-title="Frequency (days) :"><?= isset($row->n_frequency) == TRUE ? $row->n_frequency : 'N/A'?></td>
										<td data-title="Start Date :"><?= date("d/m/Y", strtotime(isset($row->d_startdate) == TRUE ? $row->d_startdate : 'N/A'))?></td>
										<td data-title="To Date :"><?= date("d/m/Y", strtotime(isset($row->d_todate) == TRUE ? $row->d_todate : 'N/A'))?></td>
										<td data-title="Checklist :"><?= isset($row->v_checklistcode) == TRUE ? $row->v_checklistcode : 'N/A'?></td>
										<td data-title="Procedure :"><?= isset($row->v_procedurecode) == TRUE ? $row->v_procedurecode : 'N/A'?></td>
										<td data-title="Sparelist :"><?= isset($row->v_sparelist) == TRUE ? $row->v_sparelist : 'N/A'?></td>
										<td data-title="Details :"><?= isset($row->v_details) == TRUE ? $row->v_details : 'N/A'?></td>
										<td data-title="Weeks :"><?= isset($row->v_weeksch) == TRUE ? anchor ('ppm_set?assetno='.$this->input->get('asstno').'&jobyear='.$row->v_year, $row->v_weeksch) : anchor ('ppm_set?assetno='.$this->input->get('asstno').'&jobyear='.$row->v_year, 'N/A')?></td>
									</tr> 
									<?php $numrow++; ?> 			 
									<?php endforeach;?>  
										<?php }else { ?>
										<tr align="center" style="background:white; height:200px;">
										<td colspan="10" class="default-NO"><span style="color:red;">NO PPM FOUND FOR THIS ASSET.</span></td>
									</tr>
									<?php } ?>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
