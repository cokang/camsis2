<!--<form action="" method="post" accept-charset="utf-8" id="myForm">-->
<?php
$attributes = array('id' => 'myForm');
echo form_open('mrinnew_ctrl/comfirmation', $attributes);
?>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p"></div>
		<div class="ui-main-form">
			<div class="ui-main-form-header">
				<table align="center" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;">New MRIN</span></td>
					</tr>
				</table>
			</div>
			<div class="n-req">MRIN number will be automatically generated by the system.</div>
			<div class="ui-main-form-1">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
								<td colspan="2" class="ui-header-new"><b>Details</b></td>
							</tr>
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr>
											<td style="padding:10px;" valign="top" class="ui-w">Hospital :</td>
											<td style="padding:10px;" valign="top"><?php
												$kecuali=array('HQ','COE');
										//echo form_dropdown('hospital', $arealist,$this->input->post('hospital'), 'class="form-control-button2" Disabled'); ?><?=(!in_array($this->session->userdata('hosp_code'),$kecuali)) ? 'Hospital '.$this->session->userdata('hosp_name') : $this->session->userdata('hosp_name');?>	</td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Date Issue :   </td>
											<td style="padding-left:10px;" valign="top"> <input type="text" name="n_date"  value="<?=set_value('n_date')?>" id="date0" class="form-control-button2 n_wi-date2"  disabled></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">Request Type  :   </td>
											<td style="padding-left:10px;" valign="top">
												<!-- <?php $num = 1; $num2 = 1?>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case" class="regular-radio" value="0"<?=set_radio('n_Case','0',TRUE)?> disabled/>
												<label for="radio-1-<?=$num2++?>"></label> BM<br>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case" class="regular-radio" value="1"<?=set_radio('n_Case','1')?> disabled/>
												<label for="radio-1-<?=$num2++?>"></label> PPM<br>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case" class="regular-radio" value="2"<?=set_radio('n_Case','2')?> disabled/>
												<label for="radio-1-<?=$num2++?>"></label> Stock<br>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case" class="regular-radio" value="3"<?=set_radio('n_Case','3')?> disabled/>
												<label for="radio-1-<?=$num2++?>"></label> Vendor<br>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case" class="regular-radio" value="4"<?=set_radio('n_Case','4')?> disabled/>
												<label for="radio-1-<?=$num2++?>"></label> RW<br>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Case" class="regular-radio" value="5"<?=set_radio('n_Case','5')?> disabled/>
												<label for="radio-1-<?=$num2++?>"></label> LS<br> -->
												<?php $req_type = array('0' => 'RCM (Request Corrective Maintenance)',
																	'1' => 'PPM (Planned Preventive Maintenance)', 
																	'2' => 'TPS (Third Party Service)',
																	'3' => 'RIW (Reimbursable Work)',
																	'4' => 'FMI (Fast Moving Item)',
																	'5' => 'JIT (Just in Time)'); ?>
											<?php echo form_dropdown('n_Case', $req_type, set_value('n_Case'), 'id="req_type" class="dropdown" '); ?>
											</td>
										</tr>
										<tr>
											<?php  ?>
											<td style="padding-left:10px;" valign="top">Contract : <input type="checkbox" id="contract" name="contract" value="yes" <?php if($this->input->post('contract')=='yes') echo 'checked'; ?>> Yes </td>
											<td <?php if($this->input->post('contract')=='') echo 'style="display:none;"' ?> style="padding-left:10px;" valign="top">
											<input type="radio" id="radio-1-<?=$num++?>" name="n_Contract" class="regular-radio" value="0"<?=set_radio('n_Contract','0',TRUE)?> disabled/>
												<label for="radio-1-<?=$num2++?>"></label> Comprehensive<br>
												<input type="radio" id="radio-1-<?=$num++?>" name="n_Contract" class="regular-radio" value="1"<?=set_radio('n_Contract','1')?> disabled/>
												<label for="radio-1-<?=$num2++?>"></label> Non-Comprehensive<br>
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
							<td colspan="2" class="ui-header-new"><b>Root Cause of Breakdown</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" class="ui-w">Possible Failure of Complaint / Error / Problem Statement : </td>
										<td style="padding-left:10px;"><textarea class="Input n_com2" name="n_complaint" disabled><?=set_value('n_complaint')?></textarea></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Finding: <br/>i)Process of Troubleshooting <br/>ii) Action Taken </td>
										<td style="padding-left:10px;"><textarea class="Input n_com2" name="n_troubleshooting" disabled><?=set_value('n_troubleshooting')?></textarea></td>
									</tr>
									<tr>
										<td style="padding-left:10px;">Possible Root Cause of Finding </td>
										<td style="padding-left:10px;"><textarea class="Input n_com2" name="n_finding" disabled><?=set_value('n_finding')?></textarea></td>
									</tr>
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
							<td colspan="2" class="ui-header-new"><b>Comments</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" style="color:black;" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" class="ui-w" valign="top">Comments :   </td>
										<td style="padding-left:10px;" ><textarea class="Input n_com2" name="n_comment" disabled><?=set_value('n_comment')?></textarea></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
				<div class="middle_d">
					<table class="ui-content-form-reg" >
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new"><b>Root Cause of Breakdown</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td style="padding-left:10px;" class="ui-w">Request Number : </td>
										<td style="padding-left:10px;"><input type="text" name="n_request" id="n_request" value="<?=set_value('n_request')?>" class="form-control-button n_wi-eq3" disabled> <span class="icon-windows" onclick="pop_requests(this)" value="Norequest" id="pop_requests"></span></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Requested Date : </td>
										<td style="padding-left:10px;"><input type="text" name="n_requested" id="n_requested" value="<?=set_value('n_requested')?>" class="form-control-button n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Summary  : </td>
										<td style="padding-left:10px;"><textarea class="Input n_com2" name="n_summary" id="n_summary" disabled><?=set_value('n_summary')?></textarea></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Brand / Manufacturer : </td>
										<td style="padding-left:10px;"><input type="text" name="n_brand" value="<?=set_value('n_brand')?>" id="n_brand" class="form-control-button n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Description  : </td>
										<td style="padding-left:10px;"><input type="text" name="n_description" value="<?=set_value('n_description')?>" id="n_description" class="form-control-button n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Model  : </td>
										<td style="padding-left:10px;"><input type="text" name="n_model" value="<?=set_value('n_model')?>" id="n_model" class="form-control-button n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Asset Tag Number : </td>
										<td style="padding-left:10px;"><input type="text" name="n_assettag" value="<?=set_value('n_assettag')?>" id="n_assettag" class="form-control-button n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Asset Number : </td>
										<td style="padding-left:10px;"><input type="text" name="n_assetnumber" value="<?=set_value('n_assetnumber')?>" id="n_assetnumber" class="form-control-button n_wi-eq3" disabled> <span class="icon-question-circle" onclick="fCallRequestA()" value="Norequest"></span></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Asset Serial Number : </td>
										<td style="padding-left:10px;"><input type="text" name="n_assetserial" value="<?=set_value('n_assetserial')?>" id="n_assetserial" class="form-control-button n_wi-date2" disabled> </td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Purchase Cost : </td>
										<td style="padding-left:10px;"><input type="text" name="n_purchasecost" value="<?=set_value('n_purchasecost')?>" id="n_purchasecost" class="form-control-button n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Purchase Date : </td>
										<td style="padding-left:10px;"><input type="text" name="n_purchasedate" value="<?=set_value('n_purchasedate')?>" id="n_purchasedate"  class="form-control-button n_wi-date2" disabled></td>
									</tr>
									<tr>
										<td style="padding-left:10px;" valign="top">Age   : </td>
										<td style="padding-left:10px;"><input type="text" name="n_age" value="<?=set_value('n_age')?>" id="n_age" class="form-control-button n_wi-date2" disabled></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<!--<div class="ui-main-form-5">
				<div class="middle_d">
					<table class="ui-content-form-reg">
						<tr style="color:white;" height="30px">
							<td colspan="2" class="ui-header-new"><b>Components & Attachments</b></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" style="color:black;" width="100%" border="0">
									<tr>
										<td style="padding:10px; width:15%;" valign="top">Components  :   </td>
										<td style="padding:10px;"><a href="javascript:void(0)" onclick="fCallLocationa('a')" value="z" ><span class="icon-plus" style="font-size:12px; color:green;" ></span> Add New </a></td>
									</tr>
									<tr style="display:none;" id="trcomma">
										<td style="padding-left:10px; display:block;"><span style="display:inline-block;" id="spcomma"></span></td>
									</tr>
									<tr>
										<td style="padding:10px;" valign="top">Attachments   :   </td>
										<td style="padding:10px;"><a href="" ><span class="icon-plus" style="font-size:12px; color:green;"></span> Add New</a></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>-->
			<table align="center" height="40px" border="0" style="width:100%;" class="ui-main-form-footer">
				<tr>
					<td align="center">
						<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:150px;"/>
						<!--<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" onclick="myFunction('save')" style="width:150px;"/>-->
						<input type="submit" class="btn-button btn-primary-button" name="Cancel" value="Cancel"  onclick="myFunction('Cancel')" style="width:150px;"/>
					</td>
				</tr>
			</table>
			<?php echo form_hidden('n_date',$this->input->post('n_date')) ?>
			<?php echo form_hidden('n_Case',$this->input->post('n_Case')) ?>
			<?php echo form_hidden('n_Contract',$this->input->post('n_Contract')) ?>
			<?php echo form_hidden('n_complaint',$this->input->post('n_complaint')) ?>
			<?php echo form_hidden('n_troubleshooting',$this->input->post('n_troubleshooting')) ?>
			<?php echo form_hidden('n_finding',$this->input->post('n_finding')) ?>
			<?php echo form_hidden('n_comment',$this->input->post('n_comment')) ?>
			<?php echo form_hidden('n_request',$this->input->post('n_request')) ?>
			<?php echo form_hidden('n_requested',$this->input->post('n_requested')) ?>
			<?php echo form_hidden('n_summary',$this->input->post('n_summary')) ?>
			<?php echo form_hidden('n_brand',$this->input->post('n_brand')) ?>
			<?php echo form_hidden('n_description',$this->input->post('n_description')) ?>
			<?php echo form_hidden('n_model',$this->input->post('n_model')) ?>
			<?php echo form_hidden('n_assettag',$this->input->post('n_assettag')) ?>
			<?php echo form_hidden('n_assetnumber',$this->input->post('n_assetnumber')) ?>
			<?php echo form_hidden('n_assetserial',$this->input->post('n_assetserial')) ?>
			<?php echo form_hidden('n_purchasecost',$this->input->post('n_purchasecost')) ?>
			<?php echo form_hidden('n_purchasedate',$this->input->post('n_purchasedate')) ?>
			<?php echo form_hidden('n_age',$this->input->post('n_age')) ?>
			<?php echo form_hidden('tempno',$this->input->post('tempno')) ?>
			<?php echo form_hidden('ApprStatusID',$this->input->post('ApprStatusID')) ?>
			<?php echo form_hidden('DateApproval',$this->input->post('DateApproval')) ?>
			<?php echo form_hidden('ApprStatusIDx',$this->input->post('ApprStatusIDx')) ?>
			<?php echo form_hidden('DateApprovalx',$this->input->post('DateApprovalx')) ?>
			<?php echo form_hidden('ApprStatusIDxx',$this->input->post('ApprStatusIDxx')) ?>
			<?php echo form_hidden('DateApprovalxx',$this->input->post('DateApprovalxx')) ?>
			<?php echo form_hidden('class_id',$this->input->post('class_id')) ?>
			<?php echo form_hidden('pro',$this->input->get('pro')) ?>
			<?php echo form_hidden('mrinno',$this->input->get('mrinno')) ?>
			<?php //echo form_hidden('hospital',$this->input->post('hospital')) ?>

			<?php
			$rowno = $this->input->post('rows');
			$emprow = 0;
			if ($rowno > 0){
				for($i = 1;$i <= $rowno;$i++){
					if ($this->input->post('itemcode'.$i) <> '') {
						echo form_hidden('itemcode'.($i - $emprow),$this->input->post('itemcode'.$i));
						echo form_hidden('n_qty'.($i - $emprow),$this->input->post('n_qty'.$i));
						echo form_hidden('a_rem'.($i - $emprow),$this->input->post('a_rem'.$i));
						echo form_hidden('startDate'.($i - $emprow),$this->input->post('startDate'.$i));
						echo form_hidden('n_price'.($i - $emprow),$this->input->post('n_price'.$i));
						echo form_hidden('vendor'.($i - $emprow),$this->input->post('vendor'.$i));
						echo form_hidden('id'.($i - $emprow),$this->input->post('id'.$i));
					}
					else{
						$emprow = $emprow + 1;
					}
				}
			}
			echo form_hidden('rowno',$rowno - $emprow);
			?>
		</div>
	</div>
</div>
<style>
	.icon{
	 font-size:14px;
	 margin-right:5px;
	 margin-left:5px;
	 display:iniline-block;
	}
	.icon2{
	 font-size:14px;
	 margin-left:5px;
	 color:green;
	}
</style>
<script>
function myFunction(a) {
		var act = a ;
		//alert(a);
		if (act == 'save'){
			 document.getElementById("myForm").action = "<?php echo base_url();?>index.php/mrinnew_ctrl/comfirmation";
			}else{
			 document.getElementById("myForm").action = "<?php echo base_url();?>index.php/mrinnew_ctrl?pro=new&act="+act;
			}
			document.getElementById("myForm").submit();

	}

</script>
</body>
<?php include 'content_jv_popup.php';?>
<?php echo form_close(); ?>
</html>
