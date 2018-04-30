<?php if ($this->input->get('pro') == 'pending'){ ?>
<?php echo form_open('amapproval_ctrl?mrinno='.$this->input->get('mrinno').'&pro=pending');?>
<?php } else if ($this->input->get('pr') == 'pending' || $this->input->get('pr') == 'approved'){ ?>
<?php echo form_open('prapproval_ctrl?mrinno='.$this->input->get('mrinno').'&pr='.$this->input->get('pr') );?>
<?php } else { ?>
<?php echo form_open('Procurement?pro=mrin');?>
<?php } ?>
<?php $numberdate = 0; ?>
<?php isset($user[0]->class_id) ? $classid = $user[0]->class_id : $classid = 0; ?>
<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form" style="background:#fff;">
			<div class="ui-main-form-header" style="background:#79B6D8;">
				<table align="left" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;">MRIN Approval View</span></td><!--<?php if ($this->input->get('pr') == 'pending') { echo 'PR';}else{ echo 'MIRN' ;} ?>-->
					</tr>
				</table>
			</div>
			<div class="ui-main-form-1">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
									<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Details</td></tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">MRIN Reference No.:</td>
											<td><?=isset($record[0]->DocReferenceNo) ? $record[0]->DocReferenceNo : ''?></td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">MRIN Date:</td>
											<td valign="top"><?=isset($record[0]->DateCreated) ? date("d M Y",strtotime($record[0]->DateCreated)) : ''?></td>
										</tr>
										<!--<?php if (($this->input->get('pro') == 'approved') or $this->input->get('pro') == 'pending') { ?>-->
										<tr>
										<td style="padding-left:10px; padding-top:5px;" valign="top">MRIN Procurement Received Date :</td>
										<td valign="top"></td>
										</tr>
										<!--<?php } ?>-->
										<tr>
											<td style="padding-left:10px;" valign="top">MRIN Requestor :  </td>
											<td><?=isset($record[0]->Name) ? $record[0]->Name : ''?></td>
										</tr>
										<tr>
											<td style="padding-left:10px;" valign="top">MRIN Related Asset : </td>
											<td><?=isset($record[0]->V_Asset_no) ? $record[0]->V_Asset_no : ''?><span class="icon-windows" <?=isset($record[0]->V_Asset_no) ? 'onclick="fkmrin(this)"' : ''?> value="<?=isset($record[0]->V_Asset_no) ? $record[0]->V_Asset_no : ''?>"></span></td>
										</tr>
										<?php if ($this->input->get('pr') == 'approved') { ?>
										<tr>
										<td style="padding-left:10px; padding-top:5px;" valign="top">MRIN Related Work Order  :</td>
										<td valign="top">W.O <span class="icon-windows" onclick="fLabour(this)" value="Labour" ></span></td>
										</tr>
										<?php } ?>										
									</table>
								</td>
							</tr>
					</table>
				</div>
			</div>
			<div class="ui-main-form-2">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Comments </td></tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">Comments :</td>
											<td><textarea class="input n_com2" name="" readonly><?=isset($record[0]->Comments) ? $record[0]->Comments : ''?></textarea></td>
										</tr>											
									</table>
								</td>
							</tr>
					</table>
				</div>
			</div>
			<div class="ui-main-form-5">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Item Specification <?php if ($this->input->get('pro') == 'pending' && $classid == 3) { ?><a href="<?php echo base_url();?>index.php/Procurement?mrinno=<?=$this->input->get('mrinno')?>&pro=edit" class="btn-button btn-primary-button" style="width: 50px; display:inline-block; margin-bottom:5px; font-weight:bold; text-align:center;" name="mysubmit" value="Edit">Edit</a><?php } ?></td></tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px; width:70px;" valign="top">Item(s) :</td>
											<td>
											<?php if ($itemrec) { ?>
												<table class="wnctable" border="1" style="text-align:center;" align="center">
													<tr>
														<th>No</th>
														<th>Item Code</th>
														<th>Item Name</th>
														<?php if($this->input->get('pro') == 'pending' && $classid == 1){?>
														<th>Vendor & Price</th>
														<?php } ?>
														<th>Qty Required</th>
														<?php if (($classid == 3) || ($this->input->get('pro') == 'approved' && $classid == 1) || ($this->input->get('pr') == 'pending') || ($this->input->get('pr') == 'approved')) { ?>
														<th>AM Approved Qty</th>
														<?php } ?>
														<?php if ($this->input->get('pro') == 'pending' && $classid == 3) { ?>
														<th>Store</th>
														<?php } ?>
														<?php if($this->input->get('pro') == 'pending' && ($classid == 1 || $classid == 3)){?>
														<th>Qty Approved</th><!--<?php  if (($this->input->get('pr') == 'approved') or ($this->input->get('pr') == 'pending')){ echo 'AM'; }?>-->
														<?php } ?>
														<?php if ($this->input->get('pro') == 'pending' && $classid == 3) { ?>
														<th>Price</th>
														<th>Parts Exchange</th>
														<?php } ?>
														<?php if ($this->input->get('pr') == 'pending' || $this->input->get('pr') == 'approved') { ?>
														<th>Procurement Approved Qty</th>
														<?php if ($this->input->get('pr') == 'approved'){ ?>
														<th>Logistic Approved Qty</th>
														<?php } ?>
														<th>Price Per Unit</th>
														<?php } ?>
														<!--<?php if (($this->input->get('pr') == 'approved') or ($this->input->get('pr') == 'pending')) { ?>
														<th>Procurement <br/> Approved Qty</th>
														<th>Logistic Approved Qty</th>
														<th>Price Per Unit</th>														
														<?php } ?>-->
													</tr>
													<?php $numrow=1; foreach($itemrec as $row): ?>
													<tr>
														<td><?=$numrow++?></td>
														<td><b><?=isset($row->ItemCode) ? $row->ItemCode : ''?></b></td>
														<td><b><?=isset($row->ItemName) ? $row->ItemName : ''?></b></td>
														<?php if($this->input->get('pro') == 'pending' && $classid == 1){?>
														<td><b><?=isset($row->Unit_Cost) ? number_format($row->Unit_Cost,2) : ''?></b></td>
														<?php } ?>
														<td><b><?=isset($row->Qty) ? $row->Qty : ''?></b></td>
														<?php if (($classid == 3) || ($this->input->get('pro') == 'approved' && $classid == 1) || ($this->input->get('pr') == 'pending') || ($this->input->get('pr') == 'approved')) { ?>
														<td><b><?=isset($row->QtyReq) ? $row->QtyReq : ''?></b></td>
														<?php } ?>
														<?php if ($this->input->get('pro') == 'pending' && $classid == 3) { ?>
														<td></td>
														<?php } ?>
														<?php if($this->input->get('pro') == 'pending' && ($classid == 1 || $classid == 3)){?>
														<td><input type="text" name="n_qtyapp[qty<?=$row->Id?>]" value="<?=$classid == 1 ? (isset($row->Qty) ? $row->Qty : '') : (isset($row->QtyReq) ? $row->QtyReq : '')?>" class="form-control-button2 n_wi-date2"></td>
														<?php } ?>
														<?php if ($this->input->get('pro') == 'pending' && $classid == 3) { ?>
														<td><input type="text" name="n_price[price<?=$row->Id?>]" id="n_price<?=$row->Id?>"  value="<?=isset($row->Unit_Cost) ? $row->Unit_Cost : 0?>" class="form-control-button2 n_wi-date2"><span class="icon-windows" style="display:inline-block; padding-left:5px;" onclick="fCallpricexx('n_price<?=$row->Id?>','<?=$row->ItemCode?>')" value=""></span><input type="hidden" name="n_vendor[vendor<?=$row->Id?>]" id="n_vendor<?=$row->Id?>"  value="<?=isset($row->ApprvRmk) ? $row->ApprvRmk : ''?>"></td>
														<td><input type="checkbox" name="partchk[partc<?=$row->Id?>]" value="1" id ="checkbox"></td>
														<?php } ?>
														<?php if ($this->input->get('pr') == 'pending' || $this->input->get('pr') == 'approved') { ?>
														<td><b><?=isset($row->QtyReqfx) ? $row->QtyReqfx : ''?></b></td>
														<?php if ($this->input->get('pr') == 'approved'){ ?>
														<td><b><?=isset($row->QtyReqfx) ? $row->QtyReqfx : ''?></b></td>
														<?php } ?>
														<td><b><?=isset($row->Unit_Costx) ? number_format($row->Unit_Costx,2) : ''?></b></td>
														<?php } ?>
														<!--<?php if (($this->input->get('pr') == 'approved') or ($this->input->get('pr') == 'pending')) { ?>
														<td></td>
														<td>1</td>
														<td>330</td>														
														<?php } ?>-->
													</tr>
													<?php endforeach; ?>
												</table>
												<?php } else { ?>
												<div style="display:block; width:100%; height:50px; color:red; text-align:center; padding-top:50px;">NO RECORD FOUND.</div>
												<?php } ?>
											</td>
										</tr>											
									</table>
								</td>
							</tr>
					</table>
				</div>
			</div>
			<div class="ui-main-form-1">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Root Cause of Breakdown</td></tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">Complaint / Error / Problem Statement :</td>
											<td><textarea class="input n_com" name="" readonly><?=isset($record[0]->rone) ? $record[0]->rone : ''?></textarea></td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Root Cause to Faulty Part :</td>
											<td><textarea class="input n_com" name="" readonly><?=isset($record[0]->rthree) ? $record[0]->rthree : ''?></textarea></td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Action Taken : <br />i) How? / Why?<br />ii) Effect / Action Taken<br />iii) Solution </td>
											<td><textarea class="input n_com" name="" readonly><?=isset($record[0]->rtwo) ? $record[0]->rtwo : ''?></textarea></td>
										</tr>										
									</table>
								</td>
							</tr>
					</table>
				</div>
			</div>
			<?php if(($this->input->get('pr') == 'pending') or ($this->input->get('pr') == 'approved')){?>
			<div class="ui-main-form-2">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">AM Approval Remark</td></tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">Remark :</td>
											<td><textarea class="input n_com" name="" readonly><?=isset($record[0]->ApprComments) ? $record[0]->ApprComments : ''?></textarea></td>
										</tr>									
									</table>
								</td>
							</tr>
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Procurement Approval Remark</td></tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">Remark :</td>
											<td><textarea class="input n_com" name="" readonly><?=isset($record[0]->ApprCommentsx) ? $record[0]->ApprCommentsx : ''?></textarea></td>
										</tr>									
									</table>
								</td>
							</tr>
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Logistic Approval Remark</td></tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">Remark :</td>
											<td><textarea class="input n_com" name="" readonly><?=isset($record[0]->ApprCommentsxx) ? $record[0]->ApprCommentsxx : ''?></textarea></td>
										</tr>									
									</table>
								</td>
							</tr>
					</table>
				</div>				
			</div>
			<div class="ui-main-form-5">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="" class="ui-bottom-border-color" style="font-weight: bold;">Purchase Request ( Item Specification ) </td></tr>
										<tr>
											<td>
												<table class="wnctable" border="1" style="text-align:center; border:1px solid black;" align="center">
													<tr>
														<th>Re./MIRN No</th>
														<th>Description of goods / services</th>
														<th>Vendor</th>
														<th>Price Per Unit</th>
														<th>Qty Required</th>
														<th>Amount</th>
													</tr>
													<tr>
														<td><b><?=isset($record[0]->DocReferenceNo) ? $record[0]->DocReferenceNo : ''?></b></td>
														<td align="left"><b><?=isset($record[0]->V_Asset_name) ? $record[0]->V_Asset_name : ''?><br />
																MODEL : <?=isset($record[0]->V_Model_no) ? $record[0]->V_Model_no : ''?><br />
																BRAND : <?=isset($record[0]->V_Brandname) ? $record[0]->V_Brandname : ''?><br /></b></td>
														<td><b></b></td>
														<td><b></b></td>
														<td><b></td>
														<td><b></b></td>														
													</tr>
													<?php $num = 1; $total = 0; foreach($itemrec as $row): ?>
													<tr>
														<td><b></b></td>
														<td align="left"><b><?=isset($row->ItemName) ? $row->ItemName : ''?></b></td>
														<td><b><?=isset($row->VENDOR_NAME) ? $row->VENDOR_NAME : ''?></b></td>
														<td ><b><?=isset($row->Unit_Costx) ? number_format($row->Unit_Costx,2) : '0.00'?></b></td>
														<td><b><?=isset($row->Qty) ? $row->Qty : ''?></b></td>
														<td><b><?=isset($row->Unit_Costx) ? number_format(($row->Unit_Costx * $row->Qty),2) : '0.00'?></b></td>	
														<?php
															$total += $row->Unit_Costx * $row->Qty;
														?>	
													</tr>
													<?php endforeach; ?>
													<tr>
														<td><b></b></td>
														<td align="left"><b></b></td>
														<td><b></b></td>
														<td ><b>Total</b></td>
														<td><b></b></td>
														<td><b><?=number_format($total,2)?></b></td>		
													</tr>
												</table>
												<?php if($this->input->get('pr') != 'pending'){?>
												<a href="<?php echo base_url()?>index.php/Procurement/e_pr_print?mrinno=<?=$record[0]->DocReferenceNo?>" class="btn-button btn-primary-button" style="display:block; margin-top:10px;margin-left:25px; text-align:center;">PRINT</a>
												<?php }?>
											</td>
										</tr>											
									</table>
								</td>
							</tr>
					</table>
				</div>
			</div>
			<?php }else{ ?>
			
			<?php } ?>
			<div class="ui-main-form-1">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Components & Attachments</td></tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">Components :</td>
											<td></td>
										</tr>
										<style>
											.icon{
											 font-size:14px;
											 margin-right:5px;
											 margin-left:5px;
											 color:red;
											 display:iniline-block;
											}
											.icon2{
											 font-size:14px;
											 margin-left:5px;
											 color:green;
											}
										</style>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" colspan="2"> 
												<ul style="list-style-type: none;">
													<?php if($this->input->get('pro') != '' || $this->input->get('pr') != ''){?>
													<?php foreach ($comrec as $com): ?>
													<li><span class="icon-play icon"></span><?=isset($com->component_name) ? $com->component_name : ''?><a href='<?php echo base_url()?>uploadmrinfiles/<?=$com->com_id?>'><span class="icon-new icon2"></a></li>
													<?php endforeach; ?> 
													<?php }else{ ?>
													<li><span class="icon-play icon"></span>Root Cause, Cmis, Gambar, Wo  <span class="icon-new icon2"></li>
													<li><span class="icon-play icon"></span>Quotation <span class="icon-new icon2"></li>
													<?php } ?>
												</ul>
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Attachments   :</td>
											<td></td>
										</tr>
										<style>
											.icon{
											 font-size:14px;
											 margin-right:5px;
											 margin-left:5px;
											 color:red;
											 display:iniline-block;
											}
											.icon2{
											 font-size:14px;
											 margin-left:5px;
											 color:green;
											}
										</style>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" colspan="2"> 
												<ul style="list-style-type: none;">
													<?php if($this->input->get('pro') != '' || $this->input->get('pr') != ''){?>
													<?php foreach ($attrec as $att): ?>
													<li><span class="icon-play icon"></span><?=isset($att->Doc_name) ? $att->Doc_name : ''?><a href='<?php echo base_url()?>uploadmrinfiles/<?=$att->doc_id?>'><span class="icon-new icon2"></a></li>
													<?php endforeach; ?> 
													<?php }else{ ?>
													<li><span class="icon-play icon"></span>Root Cause, Cmis, Gambar, Wo  <span class="icon-new icon2"></li>
													<li><span class="icon-play icon"></span>Quotation <span class="icon-new icon2"></li>
													<?php } ?>
												</ul>
											</td>
										</tr>										
									</table>
								</td>
							</tr>
					</table>
				</div>
				<?php if($this->input->get('pr') == 'approved'){?>
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Approval Signature</td></tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px; width:180px;" valign="top">Scan Sign Document :  </td>
											<td style=" text-align:left;"><a href="javascript:void(0)" onclick="fCallLocationa('a')" value="z" ><span class="icon-plus" style="font-size:12px; color:green;" ></span> Add New </a></td>
										</tr>
										<tr style="display:none;" id="display">
											<td style="padding-left:10px;" colspan="2">
												<ul style="list-style-type: none; font-size:16px;">
													<li> <span class="icon-play icon"></span><span id="n_agent"></span><span class="icon-new icon2" id="n_agent2"></span></li>
												</ul>
											</td>
										</tr>										
									</table>
								</td>
							</tr>
					</table>
				</div>
				<?php } ?>
			</div>
			<?php if(($classid == 3 && (isset($record[0]->ApprStatusIDx) && $record[0]->ApprStatusIDx != 107)) || ($this->input->get('pro') == 'approved' && $classid == 1 && (isset($record[0]->ApprStatusID) && $record[0]->ApprStatusID != 107))) {?>
			<div class="ui-main-form-2">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">AM Approval Remark</td></tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">Remark :</td>
											<td><textarea class="input n_com" name="" readonly><?=isset($record[0]->ApprComments) ? $record[0]->ApprComments : ''?></textarea></td>
										</tr>									
									</table>
								</td>
							</tr>
					</table>
				</div>				
			</div>
			<?php } ?>
			<?php if ((isset($record[0]->ApprStatusID) && $record[0]->ApprStatusID == 107) && $classid == 2) { ?>
			<div class="ui-main-form-2">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Return Remark</td></tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">Remark :</td>
											<td><textarea class="input n_com" name="" readonly><?=isset($record[0]->ApprComments) ? $record[0]->ApprComments : ''?></textarea></td>
										</tr>									
									</table>
								</td>
							</tr>
					</table>
				</div>				
			</div>
			<?php } ?>
			<?php if($this->input->get('pro') == 'approved' && $classid == 3 && (isset($record[0]->ApprStatusIDx) && $record[0]->ApprStatusIDx != 107)){?>
			<div class="ui-main-form-2">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Procurement Approval Remark</td></tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top" class="ui-w">Remark :</td>
											<td><textarea class="input n_com" name="" readonly><?=isset($record[0]->ApprCommentsx) ? $record[0]->ApprCommentsx : ''?></textarea></td>
										</tr>									
									</table>
								</td>
							</tr>
					</table>
				</div>				
			</div>
			<?php } ?>
			<?php $xx=0; $x=0;?>
			<?php if($this->input->get('pro') == 'pending' && $classid == 3){?>
			<div class="ui-main-form-2">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Payment</td></tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Options  :</td>
											<td>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_Payment" class="regular-radio" value="COD"  checked="checked"/>   
												<label for="radio-1-<?=$x++?>"></label> COD (Cash On Delivery) <span style="display:inline-block; width:15px;"></span>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_Payment" class="regular-radio" value="TERM" />   
												<label for="radio-1-<?=$x++?>"></label> TERM <span style="display:inline-block; width:15px;"></span></br></br>
												<input type="checkbox" name="chkbox" value="1" id ="checkbox">Returned Required
											</td>
										</tr>									
									</table>
								</td>
							</tr>
					</table>
				</div>				
			</div>
			<?php } ?>
			<?php if($this->input->get('pro') == 'pending' && ($classid == 1 || $classid == 3)){?>
			<div class="ui-main-form-5">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;"><!--<?php if($this->input->get('pr') == 'pending'){ echo 'AM Approval Remark';} elseif ($this->input->get('pr') == 'approved'){ echo 'Procurement ';} else { echo 'AM ';}?>-->Result </td></tr>
										<!--<?php //if($this->input->get('pro') == 'pending'){?>-->
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Options  :</td>
											<td>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_options" class="regular-radio" value="4"<?=set_radio('n_options','4',TRUE)?>  checked="checked"/>   
												<label for="radio-1-<?=$x++?>"></label> Approved <span style="display:inline-block; width:15px;"></span>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_options" class="regular-radio" value="5"<?=set_radio('n_options','5')?> />   
												<label for="radio-1-<?=$x++?>"></label> Reject <span style="display:inline-block; width:15px;"></span>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_options" class="regular-radio" value="107"<?=set_radio('n_options','107')?> />   
												<label for="radio-1-<?=$x++?>"></label> Returned
											</td>
										</tr>
										<!--<?php //} ?>-->
										<!--<?php //if($this->input->get('pr') == 'pending'){?>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Options  :</td>
											<td>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_options" class="regular-radio" value="Approved"  checked="checked"/>   
												<label for="radio-1-<?=$x++?>"></label> Approved <span style="display:inline-block; width:15px;"></span>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_options" class="regular-radio" value="Reject" />   
												<label for="radio-1-<?=$x++?>"></label> Reject <span style="display:inline-block; width:15px;"></span>
											</td>
										</tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Vendor Reference  :</td>
											<td><input type="text" name="" value="" class="form-control-button2" style="width:83%;"></td>
										</tr>
										<?php //} ?>-->
										<!--<?php //if($this->input->get('pr') == 'approved'){?>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Options  :</td>
											<td>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_options" class="regular-radio" value="Approved"  checked="checked"/>   
												<label for="radio-1-<?=$x++?>"></label> Approved <span style="display:inline-block; width:15px;"></span>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_options" class="regular-radio" value="Reject" />   
												<label for="radio-1-<?=$x++?>"></label> Reject <span style="display:inline-block; width:15px;"></span>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_options" class="regular-radio" value="KIV" />   
												<label for="radio-1-<?=$x++?>"></label> KIV
											</td>
										</tr>
										<?php //} ?>-->
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Remark    :</td>
											<td><textarea class="input n_com" name="n_remark"><?=set_value('n_remark')?></textarea></td>
										</tr>										
									</table>
								</td>
							</tr>
					</table>
				</div>
			</div>
			<?php } ?>
			<?php if($this->input->get('pr') == 'pending' || $this->input->get('pr') == 'approved'){?>
			<div class="ui-main-form-2">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
							<tr >
								<td class="ui-desk-style-table">
									<table class="ui-content-form" width="100%" border="0">
										<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;"><?php if ($this->input->get('pr') == 'pending') { ?> Procurement : <?php } else if ($this->input->get('pr') == 'approved') { ?> SM / HPS : <?php } ?> </td></tr>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Options  :</td>
											<td>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_options" class="regular-radio" value="4"<?=set_radio('n_options','4',TRUE)?>  checked="checked"/>   
												<label for="radio-1-<?=$x++?>"></label> Approved <span style="display:inline-block; width:15px;"></span>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_options" class="regular-radio" value="5"<?=set_radio('n_options','5')?> />   
												<label for="radio-1-<?=$x++?>"></label> Reject <span style="display:inline-block; width:15px;"></span>
												<input type="radio" id="radio-1-<?=$xx++?>" name="n_options" class="regular-radio" value="107"<?=set_radio('n_options','107')?> />   
												<label for="radio-1-<?=$x++?>"></label> KIV
											</td>
										</tr>
										<?php if ($this->input->get('pr') == 'approved') { ?>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Vendor Reference    :</td>
											<td><textarea class="input n_com" name="ven_ref"><?=set_value('ven_ref')?></textarea></td>
										</tr>
										<?php } ?>
										<tr>
											<td style="padding-left:10px; padding-top:5px;" valign="top">Remark    :</td>
											<td><textarea class="input n_com" name="n_remark"><?=set_value('n_remark')?></textarea></td>
										</tr>	
									</table>
								</td>
							</tr>
					</table>
				</div>
			</div>
			<?php } ?>
			<table align="center" height="40px" border="0" style="width:100%;" class="ui-main-form-footer">
				<tr>
					<td align="center">
					<?php if(($this->input->get('pro') == 'pending' && ($classid == 1 || $classid == 3)) || ($this->input->get('pr') == 'pending') || ($this->input->get('pr') == 'approved')){?>
					<input type="button" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Clear all">
					<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Save"> 
					<input type="button" class="btn-button btn-primary-button" style="width: 200px;" onclick="window.history.back()" name="Cancel" value="Cancel">
					<?php }else{ ?>
					<input type="button" class="btn-button btn-primary-button" style="width: 200px;" onclick="window.history.back()" name="Cancel" value="Back">
					<?php if (((isset($record[0]->ApprStatusID) && $record[0]->ApprStatusID == 107) || (isset($record[0]->ApprStatusIDx) && $record[0]->ApprStatusIDx == 107)) && $classid == 2) { ?>
					<a href="<?php echo base_url();?>index.php/Procurement?mrinno=<?=$this->input->get('mrinno')?>&pro=edit" class="btn-button btn-primary-button" style="width: 200px; display:inline-block; margin-bottom:5px; font-weight:bold; text-align:center;" name="mysubmit" value="Edit">Edit</a>
					<?php } ?>
					<?php } ?>
					<!--<?php //}elseif (($this->input->get('pr') == 'approved') or ($this->input->get('pr') == 'pending')){ ?>
					<input type="submit" class="btn-button btn-primary-button" style="width: 200px;" name="mysubmit" value="Save"> 
					<input type="button" class="btn-button btn-primary-button" style="width: 200px;" onclick="window.history.back()" name="Cancel" value="Cancel">-->
					</td>
				</tr>
			</table>
		</div>
		<?php echo form_hidden('mrinno',$this->input->get('mrinno')) ?>
		<?php echo form_hidden('prno',isset($record[0]->PR_No) ? $record[0]->PR_No : '') ?>
		<?php echo form_hidden('classid',$classid) ?>
	</div>
</div>
<?php include 'content_jv_popup.php';?>
</body>
<?php echo form_close(); ?>
</html>
