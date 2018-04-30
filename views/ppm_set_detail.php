<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
			<tr style="font-weight: bold;background:#398074" class="">
				<td colspan="15" height="20px" style="padding:8px;">PPM Job Register <?=$this->input->get('jobyear')?></td>
			</tr>
			<tr class="ui-color-contents-style-1 nonetr">
				<td colspan="15" height="20px">&nbsp;</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="15" valign="top" align="center" class="pd-bttm">
					<table width="98%" class="ui-content-middle-menu-workorder" style="">	
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new" style="height:37px;" valign="middle"><span style="float: right; padding-right:10px;"><?php echo anchor ('contentcontroller/assetPPMjob_update?asstno='.$this->input->get('assetno')."&jobyear=".$this->input->get('jobyear')."&id=".$this->input->get('id'), '<button type="button" class="btn-button btn-primary-button" style="width:60px;">Edit</button>'); ?></span></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table" height="200px" valign="top">
								<table class="ui-content-form" width="100%" border="0">
								<?php foreach($records as $row):?>
									<tr>
										<td class="td-assest" align="right">Year  : </td>
										<td><?=$this->input->get('jobyear')?></td>
									</tr>
									<tr>
										<td class="td-assest" align="right">Job Type : </td>
										<td><?= isset($row->v_jobtype) == TRUE ? $row->v_jobtype : 'N/A'?> <?= isset($row->n_frequency) == TRUE ? $row->n_frequency : 'N/A'?>Day</td>
									</tr>
									<tr>
										<td class="td-assest" align="right">Start Date : </td>
										<td><?= date("d M Y", strtotime(isset($row->d_startdate) == TRUE ? $row->d_startdate : 'N/A'))?></td>
									</tr>
									<tr>
										<td class="td-assest" align="right">To Date : </td>
										<td><?= date("d M Y", strtotime(isset($row->d_todate) == TRUE ? $row->d_todate : 'N/A'))?></td>
									</tr>
									<tr>
										<td class="td-assest" align="right">Checklist Code : </td>
										<td><?= isset($row->v_checklistcode) == TRUE ? $row->v_checklistcode : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" align="right">Procedure  : </td>
										<td><?= isset($row->v_procedurecode) == TRUE ? $row->v_procedurecode : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" align="right">Spare List : </td>
										<td><?= isset($row->v_sparelist) == TRUE ? $row->v_sparelist : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" align="right">Details  : </td>
										<td><?= isset($row->v_details) == TRUE ? $row->v_details : 'N/A'?></td>
									</tr>
									<?php endforeach;?>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
</div>
<?php echo form_hidden('assetno',$this->input->get('assetno'));?>