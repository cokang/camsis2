<?php
if ($this->input->get('ex') == 'excel'){
$filename ="Asset Listing Report - ".date('F', mktime(0, 0, 0, $month, 10)) .$year.".xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename);
}
?>
<style>
 .fra{mso-number-format:"\#\ ?\/?";/*force fractions*/}
</style>
<?php if ($this->input->get('ex') == ''){?>
<div id="Instruction" class="pr-printer">
    <div class="header-pr">Asset Listing Report</div>
    <button onclick="javascript:myFunction('report_alr?m=<?=$month?>&y=<?=$year?>&none=closed&grp=<?=$this->input->get('grp');?>');" class="btn-button btn-primary-button">PRINT</button>
    <button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>Schedule?<?php echo '&grp='.$this->input->get('grp');?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
	<a href="<?php echo base_url();?>index.php/contentcontroller/report_alr?m=<?=$this->input->get('m');?>&y=<?=$this->input->get('y');?>&stat=<?=$this->input->get('stat');?>&ex=excel&none=close&grp=<?=$this->input->get('grp');?>&dept=<?=$this->input->get('dept');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
	<?php } ?>
</div>
<?php } ?>
<div class="menu" style="position:relative;">
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_headprint.php';?>
<?php } ?>


<div class="m-div">
	<table class="rport-header">
		<tr>
			<td style="padding-left:10px; padding-bottom:10px;" colspan="5">Asset Listing Report - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )</td>
		</tr>
	</table>
<?php if ($this->input->get('ex') == ''){?>
	<div id="Instruction" class="tbl-none" style="background:white;">
	<form method="get" action="">
	<table class="tbl-wo-3">
		<tr>
			<td>Department</td>
			<td>
				<?php 
					$dept_list = array('' => 'All');
					foreach ($dept as $row){
						$dept_list[$row->v_UserDeptCode] = $row->v_UserDeptDesc.' ('.$row->v_UserDeptCode.')';
					}
				?>
				<?php echo form_dropdown('dept', $dept_list , set_value('dept',$deptdp) , 'style="width: 300px;" id="cs_month"'); ?>
			</td>
			
			<td><button type="submit"  onclick="javascript: submit()">Generate</button></td>
			
		</tr>
	</table>
	</form>
</div>
<?php } ?>
</div>
	<div id="constrainer">
    <div class="scrolltable">
        <table class="header-alr">
			<thead>
				<tr>
					<th>No.</th>
					<th>Asset Number</th>
					<th>UMDNS<br/>Code</th>
					<!--<th>E Code</th>-->
					<th>Equipment Name</th>
					<th>Registered<br/>Date</th>
					<th>Commission<br/>Date</th>
					<th>BER Date</th>
					<!--<th>Asset Condition</th>-->
					<th>Dept Name</th>
					<th>Dept Code</th>
					<th>Location</th>
					<th>Asset<br/>Status</th>
					<th>Variation Status</th>
					<th>Make</th>
					<th>Manufacturer</th>
					<th>Brand</th>
					<th>Model</th>
					<th>Serial<br/>Number</th>
					<th>Asset Age<br/>(Years)</th>
					<th>Warranty</th>
					<th>Vendor</th>
					<!--<th>PO No.</th>
					<th>PO Date</th>-->
					<th>Purchase<br/>Cost</th>
					<!--<th>File</th>-->
					<th>Depreciation<br/>(Years)</th>               
					<th>Lifespan<br/>(Years)</th>        
					<th>Operating<br/>Hours</th>           
					<!--<th>J T code</th>-->
					<th>Agent</th>
					<!--<th>C Code</th>-->
					<th>Asset Group</th>
				</tr>
			</thead>
		</table>
        <div class="bodytd asst">
            <table class="tbl-fixed-td">
               <?php  if (!empty($record)) {?>
				<?php $numrow = 1; foreach($record as $row):?>
		<tr>
			<td><?= $numrow ?></td>
			<td><?= ($row->V_Tag_no) ? anchor ('contentcontroller/AssetRegis?tab=Maintenance&assetno='.$row->V_Asset_no.'&state='.$this->input->get('state'),''.$row->V_Tag_no.'' ) : 'N/A' ?></td>
			<td><?= ($row->Asset_Type) ? $row->Asset_Type : 'N/A' ?></td>
			<!--<td><?= ($row->V_Equip_code) ? $row->V_Equip_code : 'N/A' ?></td>-->
			<td><?= ($row->v_Equip_Desc) ? $row->v_Equip_Desc : 'N/A' ?></td>
			<td><?= ($row->V_PO_date) ? ($row->V_PO_date != '0000-00-00 00:00:00' ? date("d/m/Y",strtotime($row->V_PO_date)) : '-' ) : 'N/A' ?></td>
			<td><?= ($row->CommissionDate) ? ($row->CommissionDate != '0000-00-00 00:00:00' ? date("d/m/Y",strtotime($row->CommissionDate)) : '-' ) : 'N/A' ?></td>
			<td><?= ($row->BER_DATE) ? ($row->BER_DATE != '0000-00-00 00:00:00' ? date("d/m/Y",strtotime($row->BER_DATE)) : '-' ) : 'N/A' ?></td>
			<!--<td><?= ($row->v_AssetCondition) ? $row->v_AssetCondition : 'N/A' ?></td>-->
			<td><?= ($row->v_UserDeptDesc) ? $row->v_UserDeptDesc : 'N/A' ?></td>
			<td><?= ($row->V_User_Dept_code) ? $row->V_User_Dept_code : 'N/A' ?></td>
			<td><?= ($row->V_Location_code) ? $row->V_Location_code : 'N/A' ?></td>
			<td><?= ($row->v_AssetStatus) ? $row->v_AssetStatus : 'N/A' ?></td>
			<td><?= ($row->v_AssetVStatus) ? $row->v_AssetVStatus : 'N/A' ?></td>
			<td><?= ($row->V_Make) ? $row->V_Make : 'N/A' ?></td>
			<td><?= ($row->V_Manufacturer) ? $row->V_Manufacturer : 'N/A' ?></td>
			<td><?= ($row->V_Brandname) ? $row->V_Brandname : 'N/A' ?></td>
			<td><?= ($row->V_Model_no) ? $row->V_Model_no : 'N/A' ?></td>
			<td class="fra"><?= ($row->V_Serial_no) ? $row->V_Serial_no : 'N/A' ?></td>
			<td><?= ($row->Age) ? $row->Age : 'N/A' ?></td>
			<td><?= ($row->WarrantyEndDate) ? ($row->WarrantyEndDate != '0000-00-00 00:00:00' ? date("d/m/Y",strtotime($row->WarrantyEndDate)) : '-' ) : 'N/A' ?></td>
			<td><?= ($row->v_vendorname) ? $row->v_vendorname : 'N/A' ?></td>
			<!--<td><?= ($row->V_PO_no) ? $row->V_PO_no : 'N/A' ?></td>
			<td><?= ($row->V_PO_date) ? ($row->V_PO_date != '0000-00-00 00:00:00' ? date("d/m/Y",strtotime($row->V_PO_date)) : '-' ) : 'N/A' ?></td>-->
			<td><?= ($row->N_Cost) ? printf("RM%01.1f", $row->N_Cost) : 'N/A' ?></td>
			<!--<td><?= ($row->V_File_Ref_no) ? $row->V_File_Ref_no : 'N/A' ?></td>-->
			<td><?= ($row->V_Depreciation) ? $row->V_Depreciation : 'N/A' ?></td>
			<td><?= ($row->V_Lifespan) ? $row->V_Lifespan : 'N/A' ?></td>
			<td><?= ($row->V_Oper_Hr_code) ? $row->V_Oper_Hr_code : 'N/A' ?></td>
			<!--<td><?= ($row->V_Job_Type_code) ? $row->V_Job_Type_code : 'N/A' ?></td>-->
			<td><?= ($row->V_Agent) ? $row->V_Agent : 'N/A' ?></td>
			<td><?= ($row->v_asset_grp) ? $row->v_asset_grp : 'N/A' ?></td>
			<!--<td><?= ($row->V_Check_list_code) ? $row->V_Check_list_code : 'N/A' ?></td>-->
		</tr>
		<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		 </tbody>
            </table>
			    		<?php }else { ?>
						<table class="tbl-fixed-td-bes" style="width: 1300px;">
						<tr align="center" style="background:white; height:310px;">
	    					<td colspan="20"><span style="color:red; display:block;">NO COMPLAINT RECORDS FOUND FOR THIS WORK ORDER.</span></td>
	    				</tr>
			                </tbody>
			            </table>
						<?php } ?>
               
        </div>
    </div>
</div>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
	<table width="99%" border="0">
		<tr>
			<td valign="top" colspan="2"><hr color="black" size="1Px"></td>
		</tr>
		<tr>
			<td width="50%">Asset Listing Report - <?=date('F', mktime(0, 0, 0, $month, 10))?> <?=$year?><br><i>Computer Generated - CAMSIS</i></td>
			<td width="50%" align="right"></td>
		</tr>
	</table>
</div>
<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == 'closed')){?>
<?php include 'content_footerprint.php';?>
<?php } ?>
<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>

<?php } ?>