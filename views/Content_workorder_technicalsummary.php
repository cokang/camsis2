

<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
			<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
			<?php include 'content_wrk_ord.php';
			$wo = $this->input->get('wrk_ord');
			$wo = explode("/",$wo);
			?>
			
				
			<tr class="ui-color-contents-style-1">
				<td class="pd-bttm" colspan="11" valign="top">
				<div id="Instruction" class="pr-printer">
		<!-- <button onclick="javascript:window.print();" class="btn-button btn-primary-button">PRINT</button> -->
		<?php echo anchor ('contentcontroller/print_rootcause?wrk_ord='.$this->input->get('wrk_ord'), '<button class="btn-button btn-primary-button" style="width:20%; height:33px;">Print Root Cause <i class="icon-printer"></i></button>'); ?>
		<?php echo form_open('contentcontroller/technicalsummary_update?wrk_ord='.$this->input->get('wrk_ord').'&mrin='.$mrin);?>
	</div> </tr>
					<table width="98%" class="ui-content-middle-menu-workorder" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Root Cause</span>&nbsp;<span style="float: right; padding-right:10px;"><input type="submit" class="btn-button btn-primary-button" style="width: 100px;" name="mysubmit" value="Update"></span></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="" width="100%" border="1">
									<tr>
										<td colspan='2' style="text-align: center;"><b>ROOT CAUSE OF BREAKDOWN</b>&nbsp;
										
									</tr>
									<tr>
									<td width='30%'><b>1. MRIN</b></td>
									<td style="padding-left:10px;" valign="top">
												<?php $num = 1; $num2 = 1?>
												<input disabled type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="0"<?=set_radio('n_Case','0')?><?=isset($record[0]->ReqCase) && $record[0]->ReqCase == 0 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> BD
												<input disabled type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="4"<?=set_radio('n_Case','4')?><?=isset($record[0]->ReqCase) && $record[0]->ReqCase == 4 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> RW
												<input disabled type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="1"<?=set_radio('n_Case','1')?><?=isset($record[0]->ReqCase) && $record[0]->ReqCase == 1 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> PPM
												<input disabled type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="2"<?=set_radio('n_Case','2')?><?=isset($record[0]->ReqCase) && $record[0]->ReqCase == 2 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Stock
												<input disabled type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="3"<?=set_radio('n_Case','3')?><?=isset($record[0]->ReqCase) && $record[0]->ReqCase == 3 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Vendor
												<input disabled type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="5"<?=set_radio('n_Case','5')?><?=isset($record[0]->ReqCase) && $record[0]->ReqCase == 5 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Others

											</td>
									</tr>
									</table>
									<table class="" width="100%" border="1">
									<tr>
									<td colspan='2' style="text-align: right;"><b>*Tick(&#10004;) where appropriate</b>&nbsp;
									</tr>
									<tr>
									<td colspan='2'><b>2. Tecnical Report / MRIN No:</b><?=isset($record[0]->DocReferenceNo) ? $record[0]->DocReferenceNo : ''?><br>
									<b>Date :</b><?=isset($record[0]->DateCreated) ? date("d M Y",strtotime($record[0]->DateCreated)) : ''?></td>
									</tr>
									<tr ><td colspan='2'><b>3. Work Order No / Date : <?= $this->input->get('wrk_ord') .'@'.(isset($record[0]->DateCreated) ? date("d M Y",strtotime($record[0]->DateCreated)) : '') ?></b></td></tr>
									<tr>
									<td width='60%'><b>4. Equipment Name: </b><?=isset($record[0]->V_Asset_name) ? $record[0]->V_Asset_name : ''?></td>
									<td width='40%'><b>Asset No. : </b><?=isset($record[0]->V_Asset_no) ? $record[0]->V_Asset_no : ''?></td>
									</tr>
									<tr>
									<td width='60%'><b>5. Brand : </b><?=isset($record[0]->V_Brandname) ? $record[0]->V_Brandname : ''?></td>
									<td width='40%'><b>Model: </b><?=isset($record[0]->V_Model_no) ? $record[0]->V_Model_no : ''?></td>
									</tr>
									<?php $causes = array('0' => 'Accidental' , 
														  '1' => 'Wear & Tear',
														  '2' => 'Obsolote model',
														  '3' => 'Mishandling',
														  '4' => 'Environmental',
														  '5' => 'Others',
								); ?>
									<tr><td colspan='2'><b>6. Complaint / Error / Problem statement: </b><label style="color: blue;"><?=isset($record[0]->rone) ? $record[0]->rone : ''?></label></td></tr>
									<tr><td colspan='2'><b>7. Root cause to part faulty: </b><label style="color: blue;"><?=isset($record[0]->rthree) ? $record[0]->rthree : ''?></label><label style="color: blue;"><br><?=isset($record[0]->CriticalFlag) ? $causes[$record[0]->CriticalFlag] : ''?></label><br>
									<!-- <table style='padding-left: 110px;'><?php $num = 1; $num2 = 1?>
											<tr>	<td><input disabled type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="0"<?=set_radio('n_Case','1')?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 0 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Wear & Tear</td>
												<td><input disabled type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="1"<?=set_radio('n_Case','0')?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 1 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Accidental</td>
												<td><input disabled type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="2"<?=set_radio('n_Case','2')?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 2 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Obsolote model</td></tr><tr>
												<td><input disabled type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="3"<?=set_radio('n_Case','3')?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 3 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Mishandling</td>
												<td><input disabled type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="4"<?=set_radio('n_Case','4')?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 4 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Environmental</td>
												<td><input disabled type="checkbox" id="radio-1-<?=$num++?>" name="n_Case"  value="5"<?=set_radio('n_Case','5')?><?=isset($record[0]->CriticalFlag) && $record[0]->CriticalFlag == 5 ? 'checked' : '' ?>/>
												<label for="radio-1-<?=$num2++?>"></label> Others</tr></table></td> -->
									</td></tr>
									<tr><td colspan='2'><b>8. Action taken:</b><br><br>
									<div style='padding-left: 110px;'>
									<b>i) How / Why?</b><br>
									<b>ii) Effect / Action Taken?</b><br>
									<b>iii) Solution</b><br></div>
									<div style='padding-left: 30px;color: blue;'><?=isset($record[0]->rtwo) ? $record[0]->rtwo : ''?></div>
									<div style="margin-left: 700px;"><b>Prepared by(Technical/SVR): <?php //isset($recordphoto[0]->user_id)?$recordphoto[0]->user_id:'' ?> </b></div><br>
									</td></tr>
									<!-- <tr><td colspan='2'><b>9. CMIS<br></b>
									<span style="display:inline-block;" id="spcommaCMIS"></span>
										<span id="spcmis">
										<?php
										if($recordcmis!=null){
											foreach($recordcmis as $row){
												$extension = explode(".",$row->com_id);

												if ($extension[1] == 'docx' || $extension[1] == 'xlsx' || $extension[1] == 'pdf') {
													echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->component_name. "</span><a href=".base_url()."uploadmrinfiles/".$row->com_id."><span class='icon-file-text2 icon'></a></span>";
													echo '<br>';
													}else{
												echo "<br><img src=".base_url()."uploadmrinfiles/".$row->com_id." style='max-width:90%; height:auto; padding-left:5px;' >";
												echo '<br>';
													}
												
											}
										}
										?>
										
										</span>
									</td></tr> -->
									<tr><td colspan='2'><b>10. Component <br></b>
									<span style="display:inline-block;" id="spcommaphoto"></span>
										<span id="spphoto">
										<?php
										
											foreach($recordphoto as $row){
												$extension = explode(".",$row->com_id);

												if ($extension[1] == 'docx' || $extension[1] == 'xlsx' || $extension[1] == 'pdf') {
													echo "<span class='icon-play icon' style='font-size:15px;'></span><span style='font-size:15px; font-weight:bold;'>" .$row->component_name. "</span><a href=".base_url()."uploadmrinfiles/".$row->com_id."><span class='icon-file-text2 icon'></a></span>";
													echo '<br>';
													}else{
												echo "<img src=".base_url()."uploadmrinfiles/".$row->com_id." style='max-width:35%; height:auto; padding-left:25px;' >";
												//echo '<br>';
													}
												
											}
										
										?>
										
										</span>
									</td></tr>
									<tr><td colspan='2'><b>11. Parts Required Last Replaced: </b><?=isset($record[0]->LastRepDt) ? $record[0]->LastRepDt : ''?></td></tr>
									<tr><td colspan='2'><b>12. Remark Procument:</b><?=isset($record[0]->ApprCommentsx) ? $record[0]->ApprCommentsx : ''?><br><br>
									<div style='padding-left: 110px;'>
									<table width='50%'>
									<!-- <tr> <td width='60%'>	Outdated technology/software</td> <td width='40%'> **Cost of repair </td></tr>
									<tr> <td width='60%'>Obsolete model </td> <td width='40%'> Others : </td></tr> -->
									</table>
									</div>
									<b>Remark by Specialist Team :</b><br><br>
									<div style='padding-left: 110px;'>
									<label style="color: blue;"><?php if($wo[1]=='AP19') ?><?= isset($record[0]->V_details) ? $record[0]->V_details : ''?></label>
									</div>
									<div style="margin-left: 700px;"><b>Checking by: </b><br></div>
									<div style="margin-left: 900px;"><b>(Sign & Chop)</b><br></div>
									<div style="margin-left: 700px;"><b>Date: </b><br></div>
									<div style="margin-left: 700px;"><b>Time: </b><br></div>
									<b>Note:** Cost of repair must be in category BEMS-TS-001: Advisory Service - ( 1- (Age/estimate life) x purchase cost )</b>
									</td>
									</tr>
									<tr><td colspan='2'><b>13. Remark Technical Report Team : <br>&emsp; (*Attachments Received)</b><br>
									<div style='padding-left: 110px;'>
									
									</div>
									</td><br></tr>
								
								
																																													
								</table>	<div style=' font-size: 13px;'>
									Remarks: <br>
									<div style='padding-left: 50px;'>
									1) Quo with part number(PN) - specific item <br><br>
									2) Brand and model need to take from machine not from APBESYS or CMIS <br><br>
									3) For MRIN please send defective parts to HQ as soon as possible ( Equipment Name, Brand, Model, Description of parts, Price & Vendor) <br><br>
									Please email photo to: <br><br>
									a) Procument/Technical Report Committee Site <br> <br>
									b) CC:Supervisor In Charge, Manager Operation</div></div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php  echo form_hidden('wrk_ord',$this->input->get('wrk_ord')); ?>
	</div>
</div>
<style> @media only print
{
    .ui-left_web,footer, header, .sidebar, .ui-color-contents-style-1{ display:none; }
	
}  </style>