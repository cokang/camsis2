<?php echo form_open('contentcontroller/confirmmaintenancesv');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p"></div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="90%">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="3"><b>Confirm Maintenance Status</b></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Criticality : </td>
				<td valign="top"><input type="text" name="n_criticality" value="<?= $this->input->post('n_criticality') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Sparelist :</td>			
				<td><input type="text" name="n_sparelist" value="<?=$this->input->post('n_sparelist')?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest" valign="top">Safety Test :&nbsp;</td>
				<td valign="top"><input type="text" name="n_safety_test" value="<?= $this->input->post('n_safety_test') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Class</td></tr>
			<tr>
				<td class="td-assest" valign="top">Asset Class:</td>
				<td valign="top"><input type="text" name="n_asset_class" value="<?= $this->input->post('n_asset_class') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Status</td></tr>
			<tr>
				<td class="td-assest" valign="top">Asset Status :&nbsp;</td>
				<td valign="top"> <input type="text" name="n_asset_status" value="<?= $this->input->post('n_asset_status') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Condition</td></tr>
			<tr>
				<td class="td-assest" valign="top">Asset Condition:&nbsp;</td>
				<td><input type="text" name="n_asset_condition" value="<?= $this->input->post('n_asset_condition') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Asset Variation Information Locked</td></tr>
			<tr>
				<td class="td-assest" valign="top">Variation Status :&nbsp;	</td>
				<td><input type="text" name="n_variation_status" value="<?= $this->input->post('n_variation_status') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			
			<tr>
				<td class="td-assest">Location:&nbsp;</td>			
				<td><input type="text" name="location" value="<?= $this->input->post(substr($this->input->post('n_variation_status'),0 ,strpos($this->input->post('n_variation_status'),':')).'Location') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Date : &nbsp;</td>
				<td><input type="text" name="dater" value="<?= $this->input->post(substr($this->input->post('n_variation_status'),0 ,strpos($this->input->post('n_variation_status'),':')).'_date') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">VO Claim Period :&nbsp;</td>			
				<td><?= (date('n',strtotime($this->input->post('n_submission_date'))) > 6) ? "P2".date('y',strtotime($this->input->post('n_submission_date'))) : "P1".date('y',strtotime($this->input->post('n_submission_date')))  ;?></td>
			</tr>
			<tr>
				<td class="td-assest">VVF Report Number : &nbsp;</td>			
				<td><?= (date('n',strtotime($this->input->post('n_submission_date'))) > 6) ? "VVF".$this->session->userdata('usersess')."/".$this->session->userdata('hosp_code')."/"."P2".date('y',strtotime($this->input->post('n_submission_date')))."/".date('Y',strtotime($this->input->post('n_submission_date'))) : "VVF".$this->session->userdata('usersess')."/".$this->session->userdata('hosp_code')."/"."P1".date('y',strtotime($this->input->post('n_submission_date')))."/".date('Y',strtotime($this->input->post('n_submission_date'))) ?></td>
			</tr>
			<tr>
				<td class="td-assest">SNF / VNF Ref No :&nbsp;</td>			
				<td><input type="text" name="n_snfvnf" value="<?=$this->session->userdata('hosp_code')."/SNF/VVF/".strtoupper(date('M',strtotime($this->input->post('n_submission_date')))).date('Y',strtotime($this->input->post('n_submission_date')))?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Submission Date :&nbsp;</td>			
				<td><input type="text" name="dater" value="<?= $this->input->post('n_submission_date') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Asset Locking Status : &nbsp;</td>			
				<td>Locked</td>
			</tr>
			<tr>
				<td class="td-assest">PMSB Authorization : &nbsp;</td>			
				<td>Not yet processed by PMSB</td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">MOH Classification</td></tr>
			<tr>
				<td class="td-assest">Asset Type:&nbsp;</td>			
				<td><?=($asset_UMDNS[0]->Asset_Type) ? $asset_UMDNS[0]->Asset_Type : 'NA'?> </td>
			</tr>
			<tr>
				<td class="td-assest">Group:&nbsp;</td>			
				<td><?=($asset_det[0]->v_Location) ? $asset_det[0]->v_Location : 'N/A' ?> </td>
			</tr>
			<tr>
				<td class="td-assest">Description:&nbsp;</td>			
				<td><?=($asset_det[0]->d_LocDate) ? $asset_det[0]->d_LocDate : 'N/A' ?></td>
			</tr>
			<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Checklist</td></tr>
			<tr>
				<td class="td-assest">Checklist Code :&nbsp;</td>			
				<td><input type="text" name="n_chklistcd" value="<?= $this->input->post('n_chklistcd') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Checklist Description :&nbsp;</td>			
				<td><input type="text" name="n_chklistdesc" value="<?= $this->input->post('n_chklistdesc') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Frequency :&nbsp;</td>			
				<td><input type="text" name="n_chklistfreq" value="<?= $this->input->post('n_chklistfreq') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">KKM Ref Number :&nbsp;</td>			
				<td><input type="text" name="n_chklistkkm" value="<?= $this->input->post('n_chklistkkm') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Version :&nbsp;</td>			
				<td><input type="text" name="n_chklistver" value="<?= $this->input->post('n_chklistver') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Volume : &nbsp;</td>			
				<td><input type="text" name="n_chklistvol" value="<?= $this->input->post('n_chklistvol') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Checklist Filename :&nbsp;</td>			
				<td><input type="text" name="n_chklistfname" value="<?= $this->input->post('n_chklistfname') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Asset Type :&nbsp;</td>			
				<td><input type="text" name="n_chklistatype" value="<?= $this->input->post('n_chklistatype') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Asset Description :&nbsp;</td>			
				<td><input type="text" name="n_chklistadesc" value="<?= $this->input->post('n_chklistadesc') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Manufacturer :&nbsp;</td>			
				<td><input type="text" name="n_chklistmanu" value="<?= $this->input->post('n_chklistmanu') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr>
				<td class="td-assest">Model :&nbsp;</td>			
				<td><input type="text" name="n_chklistmodel" value="<?= $this->input->post('n_chklistmodel') ?>" class="form-control-button2 n_wi-date" readonly></td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="3">
					<!--<button type="button" class="btn-button btn-primary-button" style="width: 200px;">Change</button>-->
					<!--<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Update" style="width:200px;"/>-->
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;"/>
				</td>
			</tr>
		</table>
		</div>				
</div>
<?php echo form_hidden('n_asset_number',$this->input->post('n_asset_number'));?>
<?php echo form_close(); ?>