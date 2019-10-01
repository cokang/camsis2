<div class="ui-middle-screen">
	<div class="content-workorder">
		<div Class="main-cs">
			<div Class="form-cs-1">
			<span style="color:red;"><?php echo validation_errors(); ?>
			<form action="" method="POST">
				 <fieldset>
				  <legend>Form >> Customize Search</legend>
				  <table style="color:black; font-size:10px;">
					<tr>
						<td Width="90px">Service Code</td>
						<td> : 
							
							<?php 
								foreach ($servrec as $serv){
									if ($serv->v_servicecode == 'BES' OR $serv->v_servicecode == 'FES' OR $serv->v_servicecode == 'HKS'){
										$base_list[$serv->v_servicecode] = $serv->v_servicecode;
									}
								}
							?>
							<?php echo form_dropdown('n_base', $base_list, set_value('n_base') , 'style="width: 80px; " id="service_code"'); ?> 
						</td>
						<td>Period</td>
						<td> :
							<?php 
								$month_list = array(
								'01' => 'January',
								'02' => 'February',
								'03' => 'March',
								'04' => 'April',
								'05' => 'May',
								'06' => 'June',
								'07' => 'July',
								'08' => 'August',
								'09' => 'September',
								'10' => 'October',
								'11' => 'November',
								'12' => 'December'
							 );
							?>
							<?php echo form_dropdown('fromMonth', $month_list, set_value('fromMonth',$month),'style="width: 90px;" id="cs_month"'); ?>
							
							<?php 
								$yrow = 1;
								for ($dyear = '2015';$year >= $dyear;$year--){
									if ($yrow <= 5){
									$year_list[$year] = $year;
									}
									$yrow++;
								}
							?>
							<?php echo form_dropdown('fromYear', $year_list, set_value('fromYear',$year),'style="width: 65px;"'); ?>  
							
						</td>
						<td>Request Details</td>
						<td> :
							<input type="text" name="R_detail" value="<?php echo set_value('R_detail') ?>" size="18"/>
						</td>
						<td>Request No</td>
						<td> :
							<input type="text" name="No_Request" value="<?php echo set_value('No_Request') ?>" size="18"/>
						</td>
					</tr>
					<tr>
						<td>Dept</td>
						<td> :
							<input type="text" name="Dept" value="<?php echo set_value('No_Request') ?>" size="18"/>
						</td>
						<td>Deduction Status</td>
						<td> :
							<?php 
								$deduction = array(
								'1' => 'Agreed',
								'2' => 'Disputed',
								'3' => 'Valid & Closed',
								'4' => 'Not Valid & Closed',
								'5' => 'Validated but Disputed',);
							?>
							<?php echo form_dropdown('deduction', $deduction); ?>
						</td>
						<!--<td>Limit Result To</td>
						<td> :
							<input type="text" name="L_Result" value="" size="18"/>
							
						</td>-->
						<td style="text-align:center;"> 
							<input type="submit" class="btn-button btn-primary-button sub" style="width: 70px;" name="mysubmit" value="Show">
						</td>
					</tr>
				  </table>
				 </fieldset>
			</form>
			</div>

			
			<div id="nav" class="form-fp">
				<ul>
				<li>
				<?php echo anchor ('contentcontroller/acg_modulesf?tabIndex=1', 'Current' , ($this->input->get('tabIndex') == '1') ? 'class="heloo"' : ''); ?></li>
				<li>
				<?php echo anchor ('contentcontroller/acg_modulesf?tabIndex=2', 'Brought Fwd' , ($this->input->get('tabIndex') == '2') ? 'class="heloo"' : ''); ?></li>
				<li>
				<?php echo anchor ('contentcontroller/acg_modulesf?tabIndex=3', 'BFwd Completed' , ($this->input->get('tabIndex') == '3') ? 'class="heloo"' : ''); ?>
				</li>
				</ul>
			</div>
			<div class="form-fp">
				<div class="form-mcg-top">
				<div class="text-mcg">
				<form action="" method="POST" name="myform">
				<?php if($this->input->get('tabIndex') == '1'){ echo 'All Request For Current Month';}
					elseif($this->input->get('tabIndex') == '2'){ echo 'All Brought Forward Request Which Still Not Completed';}
					elseif($this->input->get('tabIndex') == '3'){ echo 'All Brought Forward Request Which Completed In Current Month';}
				?>
				</div>
				<style>
				.tbl-mcg tbody{width: 100.6%;}
					.tbl-mcg tbody, .tbl-mcg thead
					{
						display: block;
					}
					.tbl-mcg tbody 
					{
					   overflow-x: hidden;
					   height: 200px;
					}
					.tbl-mcg tr th:nth-child(1), .tbl-mcg tr td:nth-child(1){min-width: 25px;width:25px;}
					.tbl-mcg tr th:nth-child(14), .tbl-mcg tr td:nth-child(14){min-width: 130px;width:130px;}
					.tbl-mcg tr th:nth-child(7), .tbl-mcg tr td:nth-child(7){min-width: 90px;width:90px;}
					.tbl-mcg tr th:nth-child(2), .tbl-mcg tr td:nth-child(2),
					.tbl-mcg tr th:nth-child(3), .tbl-mcg tr td:nth-child(3)
					{
						min-width: 100px;
						width:100px;
					}
					.tbl-mcg tr th.rv_class
					{
						min-width:150px;
						width:150px;
					}
					.tbl-mcg tr th, .tbl-mcg tr td,.tbl-mcg tr th.di_class,.tbl-mcg tr td.di_class
					{
						min-width:80px;
						width:80px;
						border:1px solid black;
					}
					.dk_table{overflow: auto;height: 425px;}
					.dind_class{text-align:right;}
					/** page structure **/
					 .paginatediv{
					  text-align:center;
					  width: 100%;
					  display: block;}
					.paginate {
					  display: block;
					  width: 50%;
					  font-size: 12px;
					  margin: 0 auto;
					}
					/** clearfix **/
					.clearfix:after { content: "."; display: block; clear: both; visibility: hidden; line-height: 0; height: 0; }
					.clearfix { display: inline-block; }
					.paginate.pag2 { /* second page styles */ }
					 
					.paginate.pag2 li { font-weight: bold; list-style-type:none;  }
					 
					.paginate.pag2 li a {
					  font-size:12px;
					  display: block;
					  float: left;
					  color: #585858;
					  text-decoration: none;
					  padding: 6px 11px;
					  margin-right: 6px;
					  border-radius: 3px;
					  border: 1px solid #ddd;
					  background-color: #eee;
					  background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f7f7), to(#eee));
					  background-image: -webkit-linear-gradient(top, #f7f7f7, #eee);
					  background-image: -moz-linear-gradient(top, #f7f7f7, #eee);
					  background-image: -ms-linear-gradient(top, #f7f7f7, #eee);
					  background-image: -o-linear-gradient(top, #f7f7f7, #eee);
					  background-image: linear-gradient(top, #f7f7f7, #eee);
					  -webkit-box-shadow: 2px 2px 4px -1px rgba(0,0,0, .55);
					  -moz-box-shadow: 2px 2px 4px -1px rgba(0,0,0, .55);
					  box-shadow: 2px 2px 4px -1px rgba(0,0,0, .55);
					}
					.paginate.pag2 li a:hover {
					  color: #3280dc;
					}
					 
					.paginate.pag2 li.single, .paginate.pag2 li.current {
					  display: block;
					  float: left;
					  padding: 6px 11px;
					  padding-top: 8px;
					  margin-right: 6px;
					  border-radius: 3px;
					  color: #676767;
					}
				</style>
				<div class="dk_table">
						<table class="tbl-mcg">
						<thead>
							<tr>
								<th Colspan="27">DEDUCTION FORMULA MAPPING</th>
							</tr>
							<tr>
								<th Colspan="8">HOSPITAL</th>
								<th Colspan="6">IIUM</th>
								<th Colspan="13">DATE: FEBRUARY 2016</th>
							</tr>
							<tr>
								<th rowspan="2">No</th>
								<th rowspan="2">Request No</th>
								<th rowspan="2">Asset No</th>
								<th rowspan="2">Asset Status</th>
								<th rowspan="2">Asset Cost</th>
								<th rowspan="2">Total Repair Time (day)</th>
								<th rowspan="2">Complaint No</th>
								<th rowspan="2">Request Details</th>
								<th rowspan="2">Response Category (Emergency/ Normal)</th>
								<th rowspan="2">Total Response Time (Minute)</th>
								<th rowspan="2">Dept</th>
								<th rowspan="2">Request Date</th>
								<th rowspan="2">Complete Date</th>
								<th rowspan="2" style="min-width:130px;width:130px;">Deduction Status</th>
								<th colspan="12">Deduction Indicators</th>
								<th rowspan="2"  class="rv_class">Resolve/Validate</th>
							</tr>
							<tr>
								<?php for ($num = 1; $num <= $count; $num++) { ?>
								<th class="di_class"><?=$num?></th>
								<?php } ?>
								<th>Total Repair Time (day)</th>
							</tr>
							</thead>
							<tbody>
							<?php $no = 0;foreach ($record as $row): ?>
							<tr class="mark">
								<td align="center"><?=($start+1)?></td>
								<td align="center" style="color:blue;"><?=isset($row->V_Request_no) ? $row->V_Request_no : ''?><input type="hidden" name="req_no[]" value="<?=isset($row->V_Request_no) ? $row->V_Request_no : ''?>"></td>
								<td align="center" style="color:blue;"><?=isset($row->V_Asset_no) ? $row->V_Asset_no : ''?></td>
								<td align="center"><?=isset($row->v_AssetVStatus) ? $row->v_AssetVStatus : ''?></td>
								<td align="center"><?=isset($row->N_Cost) ? number_format($row->N_Cost,2) : ''?></td>
								<td align="center"><?=isset($row->datediff) ? $row->datediff : ''?></td>
								<td align="center"><?=isset($row->V_Request_no) ? $row->V_Request_no : ''?><input type="hidden" name="complaint_no[]" value="<?=isset($row->V_Request_no) ? $row->V_Request_no : ''?>"></td>
								<td align="center"><?=isset($row->V_summary) ? $row->V_summary : ''?></td>
								<td align="center"><?=isset($row->V_priority_code) ? $row->V_priority_code : ''?></td>
								<td align="center"><?=isset($row->resptime) ? $row->resptime : ''?></td>
								<td align="center"><?=isset($row->V_User_dept_code) ? $row->V_User_dept_code : ''?></td>
								<td align="center"><?=isset($row->D_date) ? date("d M Y",strtotime($row->D_date)) : ''?><input type="hidden" name="req_date[]" value="<?=isset($row->D_date) ? date("Y-m-d",strtotime($row->D_date)) : ''?>"></td>
								<td align="center"><?=isset($row->v_closeddate) ? date("d M Y",strtotime($row->v_closeddate)) : ''?></td>
								<td align="center">
								<!--<td align="center" style="color:red;">Please fill in indicator or CMIS will not be updated!!</br>-->
								<?php 
									$deduction = array(
									'1' => 'Agreed',
									'2' => 'Disputed',
									'3' => 'Valid & Closed',
									'4' => 'Not Valid & Closed',
									'5' => 'Validated but Disputed',);
								?>
								<?php echo form_dropdown('deduction[]', $deduction,set_value('deduction[]',isset($row->v_Status) ? $row->v_Status : ''),'class="deduction"'); ?>
								</td>

								<?php for ($num = 1; $num <= $count; $num++) { ?>
								<td align="right" style="min-width:80px;width:80px;"><span style="text-align:center; display:block-inline;"><?=$num?></span>
								
								<input type="checkbox" 
								id="cdm<?=$num?><?=isset($row->V_Request_no) ? $row->V_Request_no : ''?>" 
								name="cdm<?=$num?>" 
								onClick="toggle_cmd<?=$num?>('cdm<?=$num?><?=isset($row->V_Request_no) ? $row->V_Request_no : ''?>', '<?=isset($row->V_Request_no) ? $row->V_Request_no : ''?>cdm<?=$num?>_disableMe','<?=isset($row->V_Request_no) ? $row->V_Request_no : ''?>cdm<?=$num?>_disableMe2')"/>
								<?php $ind_no = 'v_IndicatorNo'.$num ?>
								<?php if ($acgparam) { ?>
								<?php foreach ($acgparam as $acg): ?>
								<?php if ($num == $acg->v_IndicatorNo){ ?>
								<input type="text" 
								id="<?=isset($row->V_Request_no) ? $row->V_Request_no : ''?>cdm<?=$num?>_disableMe" 
								name="indicator_no[<?=($no)?>][]"
								value="<?=isset($row->$ind_no) ? $row->$ind_no : ''?>"
								onkeyup="myFunction_cdm<?=$num?>('<?=isset($row->V_Request_no) ? $row->V_Request_no : ''?>','<?=isset($acg->v_Paramval) ? $acg->v_Paramval : ''?>','<?=isset($acg->n_Revenue) ? $acg->n_Revenue : ''?>')" 
								size="2" 
								style="display:block-inline;" readonly />
								
								<?php 
								$tind = 0;
								$indicno = isset($row->$ind_no) ? $row->$ind_no : 0;
								$parameter = isset($acg->v_Paramval) ? $acg->v_Paramval : 0;
								$revenue = isset($acg->n_Revenue) ? $acg->n_Revenue : 0;

								if ($parameter != 0) {				 
								$tind = $indicno * ($revenue / $parameter); } else {$tind=0;}
								?>

								<input type="text" id="<?=isset($row->V_Request_no) ? $row->V_Request_no : ''?>cdm<?=$num?>_disableMe2" name="cdm<?=$num?>_disableMe2" value="<?=number_format($tind,2)?>" class="responsem" size="9" readonly />
								</td>
								<?php } ?>
								<?php endforeach; ?>
								<?php } else { ?>
								<input type="text" 
								id="<?=isset($row->V_Request_no) ? $row->V_Request_no : ''?>cdm<?=$num?>_disableMe" 
								name="indicator_no[<?=($no)?>][]"
								value="<?=isset($row->$ind_no) ? $row->$ind_no : ''?>"
								onkeyup="myFunction_cdm<?=$num?>('<?=isset($row->V_Request_no) ? $row->V_Request_no : ''?>','<?=isset($acg->v_Paramval) ? $acg->v_Paramval : ''?>','<?=isset($acg->n_Revenue) ? $acg->n_Revenue : ''?>')" 
								size="2" 
								style="display:block-inline;" readonly />
								<input type="text" id="<?=isset($row->V_Request_no) ? $row->V_Request_no : ''?>cdm<?=$num?>_disableMe2" name="cdm<?=$num?>_disableMe2" value="" class="responsem" size="9" readonly />
								</td>
								<?php } ?>
								<?php } ?>
								
								<!--<?php for ($num = 1; $num <= $count; $num++) { ?>
								<td align="right" style="min-width:80px;width:80px;"><span style="text-align:center; display:block-inline;"><?=$num?></span>
								<input type="checkbox" name="chk_box" value="" class="responsetime"/>
								<?php $ind_no = 'v_IndicatorNo'.$num ?>
								<input type="text" name="indicator_no[<?=($no)?>][]" value="<?=isset($row->$ind_no) ? $row->$ind_no : ''?>" class="responsetime" size="2" style="display:block-inline;"/>
								<input type="text" name="indicator_val[]" value="" class="responsem" size="9"/>
								</td>
								<?php } ?>-->
								
								<td align="center" style="min-width:80px;width:80px;"><?=$row->datediff?> Day/s Open</td>
								<td align="center" style="min-width:150px;width:150px;"><textarea cols='10' rows='3' name="vcm_remarks[]"><?=isset($row->v_VCM_Remarks) ? $row->v_VCM_Remarks : ''?></textarea></td>
							</tr>
							<?php $start++?>
							<?php $no++?>
							<?php endforeach; ?>
							</tbody>
							<thead>
							<tr>
								<th rowspan="2"></th>
								<th rowspan="2"></th>
								<th rowspan="2"></th>
								<th rowspan="2"></th>
								<th rowspan="2"></th>
								<th rowspan="2"></th>
								<th rowspan="2"></th>
								<th rowspan="2"></th>
								<th rowspan="2"></th>
								<th rowspan="2"></th> 
								<th rowspan="2"></th>
								<th rowspan="2"></th>
								<th rowspan="2"><input type="submit" class="btn-button btn-primary-button sub" style="width: 70px;" name="mysubmit" value="Save" onclick="javascript: myform.action='<?php echo base_url();?>index.php/acg_modulesf_ctrl';"></th>
								<th>Total This Page </th>
								<?php for ($num = 1; $num <= $count; $num++) { ?>
								<th class="di_class dind_class" >
								<input type="text" name="t_ind_pg[]" value="<?=$totalindpg[$num]?>" class="responsetime" size="5"/>
								<input type="text" name="t_param_pg[]" value="<?=$totalparampg[$num]?>" class="responsem" size="7"/>
								</th>
								<?php } ?>
								<th></th>
								<th></th>
							</tr>
							<tr>
								<th style="min-width:130px;width:130px;">Total All Page </th>
								<?php for ($num = 1; $num <= $count; $num++) { ?>
								<th class="di_class dind_class" >
								<input type="text" name="t_ind[]" value="<?=$totalindt[$num]?>" class="responsetime" size="4"/>
								<input type="text" name="t_param[]" value="<?=$totalparamt[$num]?>" class="responsem" size="7"/>
								</th>
								<?php } ?>
								<th></th>
								<th style="min-width:150px;width:150px;"></th>
							</tr>
							</thead>
						</table>
						
					</div>
					<div class="paginatediv">
					  <ul class="paginate pag2 clearfix">
					  	<?php if ($rec[0]->jumlah > $limit){ ?>
					  	<li class="single">Page <?=($this->input->get('p') ? $this->input->get('p') : 1)?> of <?php echo $page?></li>
					  	<li><a href="?tabIndex=1&p=<?php echo $page-1?>&n_base=<?php echo $service?>&fromMonth=<?php echo $fmonth?>&fromYear=<?php echo $fyear?>&R_detail=<?php echo $rdetail?>&No_Request=<?php echo $noreq?>&Dept=<?php echo $dept_c?>">Prev</a></li>
		              	<?php for ($i=1;$i<=$page;$i++){ ?>
		              	<li><a href="?tabIndex=1&p=<?php echo $i?>&n_base=<?php echo $service?>&fromMonth=<?php echo $fmonth?>&fromYear=<?php echo $fyear?>&R_detail=<?php echo $rdetail?>&No_Request=<?php echo $noreq?>&Dept=<?php echo $dept_c?>"><?=$i?></a></li>
		              	<?php } ?>
		              	<li><a href="?tabIndex=1&p=<?php echo $page?>&n_base=<?php echo $service?>&fromMonth=<?php echo $fmonth?>&fromYear=<?php echo $fyear?>&R_detail=<?php echo $rdetail?>&No_Request=<?php echo $noreq?>&Dept=<?php echo $dept_c?>">Next</a></li>
		              	<?php } ?>
						<!--<li class="single">Page 2 of 5</li>
						<li><a href="index.html">prev</a></li>
						<li><a href="index.html">1</a></li>
						<li class="current">2</li>
						<li><a href="index-3.html">3</a></li>
						<li><a href="index-4.html">4</a></li>
						<li><a href="index-5.html">5</a></li>
						<li><a href="index-3.html">next</a></li>-->
					  </ul>
					</div>
				</div>
				<?php echo form_hidden('n_base',$service) ?>
				<?php echo form_hidden('fromMonth',$fmonth) ?>
				<?php echo form_hidden('fromYear',$fyear) ?>
				<?php echo form_hidden('R_detail',$rdetail) ?>
				<?php echo form_hidden('No_Request',$noreq) ?>
				<?php echo form_hidden('Dept',$dept_c) ?>
			</div>
	</div>	
	</div>
</div>
<script>
								function toggle_cmd1(checkboxID, toggleID ,toggleID2) {
									 var checkbox = document.getElementById(checkboxID);
									 var toggle = document.getElementById(toggleID);
									 var toggle2 = document.getElementById(toggleID2);
									 updateToggle = checkbox.checked ? toggle.readOnly =false : toggle.readOnly =true;
									 updateToggle = checkbox.checked ? toggle2.readOnly =false : toggle2.readOnly =true;
								}
								function myFunction_cdm1(id,param,revenue) {
									var x = document.getElementById(id+"cdm1_disableMe").value * (revenue / param);
									document.getElementById(id+"cdm1_disableMe2").value = x.toFixed(2);
								}
								function toggle_cmd2(checkboxID, toggleID ,toggleID2) {
									 var checkbox = document.getElementById(checkboxID);
									 var toggle = document.getElementById(toggleID);
									 var toggle2 = document.getElementById(toggleID2);
									 updateToggle = checkbox.checked ? toggle.readOnly=false : toggle.readOnly=true;
									 updateToggle = checkbox.checked ? toggle2.readOnly=false : toggle2.readOnly=true;
								}
								function myFunction_cdm2(id,param,revenue) {
									var x = document.getElementById(id+"cdm2_disableMe").value * (revenue / param);
									document.getElementById(id+"cdm2_disableMe2").value = x.toFixed(2);
								}
								function toggle_cmd3(checkboxID, toggleID ,toggleID2) {
									 var checkbox = document.getElementById(checkboxID);
									 var toggle = document.getElementById(toggleID);
									 var toggle2 = document.getElementById(toggleID2);
									 updateToggle = checkbox.checked ? toggle.readOnly=false : toggle.readOnly=true;
									 updateToggle = checkbox.checked ? toggle2.readOnly=false : toggle2.readOnly=true;
								}
								function myFunction_cdm3(id,param,revenue) {
									var x = document.getElementById(id+"cdm3_disableMe").value * (revenue / param);
									document.getElementById(id+"cdm3_disableMe2").value = x.toFixed(2);
								}
								function toggle_cmd4(checkboxID, toggleID ,toggleID2) {
									 var checkbox = document.getElementById(checkboxID);
									 var toggle = document.getElementById(toggleID);
									 var toggle2 = document.getElementById(toggleID2);
									 updateToggle = checkbox.checked ? toggle.readOnly=false : toggle.readOnly=true;
									 updateToggle = checkbox.checked ? toggle2.readOnly=false : toggle2.readOnly=true;
								}
								function myFunction_cdm4(id,param,revenue) {
									var x = document.getElementById(id+"cdm4_disableMe").value * (revenue / param);
									document.getElementById(id+"cdm4_disableMe2").value = x.toFixed(2);
								}
								function toggle_cmd5(checkboxID, toggleID ,toggleID2) {
									 var checkbox = document.getElementById(checkboxID);
									 var toggle = document.getElementById(toggleID);
									 var toggle2 = document.getElementById(toggleID2);
									 updateToggle = checkbox.checked ? toggle.readOnly=false : toggle.readOnly=true;
									 updateToggle = checkbox.checked ? toggle2.readOnly=false : toggle2.readOnly=true;
								}
								function myFunction_cdm5(id,param,revenue) {
									var x = document.getElementById(id+"cdm5_disableMe").value * (revenue / param);
									document.getElementById(id+"cdm5_disableMe2").value = x.toFixed(2);
								}
								function toggle_cmd6(checkboxID, toggleID ,toggleID2) {
									 var checkbox = document.getElementById(checkboxID);
									 var toggle = document.getElementById(toggleID);
									 var toggle2 = document.getElementById(toggleID2);
									 updateToggle = checkbox.checked ? toggle.readOnly=false : toggle.readOnly=true;
									 updateToggle = checkbox.checked ? toggle2.readOnly=false : toggle2.readOnly=true;
								}
								function myFunction_cdm6(id,param,revenue) {
									var x = document.getElementById(id+"cdm6_disableMe").value * (revenue / param);
									document.getElementById(id+"cdm6_disableMe2").value = x.toFixed(2);
								}
								function toggle_cmd7(checkboxID, toggleID ,toggleID2) {
									 var checkbox = document.getElementById(checkboxID);
									 var toggle = document.getElementById(toggleID);
									 var toggle2 = document.getElementById(toggleID2);
									 updateToggle = checkbox.checked ? toggle.readOnly=false : toggle.readOnly=true;
									 updateToggle = checkbox.checked ? toggle2.readOnly=false : toggle2.readOnly=true;
								}
								function myFunction_cdm7(id,param,revenue) {
									var x = document.getElementById(id+"cdm7_disableMe").value * (revenue / param);
									document.getElementById(id+"cdm7_disableMe2").value = x.toFixed(2);
								}
								function toggle_cmd8(checkboxID, toggleID ,toggleID2) {
									 var checkbox = document.getElementById(checkboxID);
									 var toggle = document.getElementById(toggleID);
									 var toggle2 = document.getElementById(toggleID2);
									 updateToggle = checkbox.checked ? toggle.readOnly=false : toggle.readOnly=true;
									 updateToggle = checkbox.checked ? toggle2.readOnly=false : toggle2.readOnly=true;
								}
								function myFunction_cdm8(id,param,revenue) {
									var x = document.getElementById(id+"cdm8_disableMe").value * (revenue / param);
									document.getElementById(id+"cdm8_disableMe2").value = x.toFixed(2);
								}
								function toggle_cmd9(checkboxID, toggleID ,toggleID2) {
									 var checkbox = document.getElementById(checkboxID);
									 var toggle = document.getElementById(toggleID);
									 var toggle2 = document.getElementById(toggleID2);
									 updateToggle = checkbox.checked ? toggle.readOnly=false : toggle.readOnly=true;
									 updateToggle = checkbox.checked ? toggle2.readOnly=false : toggle2.readOnly=true;
								}
								function myFunction_cdm9(id,param,revenue) {
									var x = document.getElementById(id+"cdm9_disableMe").value * (revenue / param);
									document.getElementById(id+"cdm9_disableMe2").value = x.toFixed(2);
								}
								function toggle_cmd10(checkboxID, toggleID ,toggleID2) {
									 var checkbox = document.getElementById(checkboxID);
									 var toggle = document.getElementById(toggleID);
									 var toggle2 = document.getElementById(toggleID2);
									 updateToggle = checkbox.checked ? toggle.readOnly=false : toggle.readOnly=true;
									 updateToggle = checkbox.checked ? toggle2.readOnly=false : toggle2.readOnly=true;
								}
								function myFunction_cdm10(id,param,revenue) {
									var x = document.getElementById(id+"cdm10_disableMe").value * (revenue / param);
									document.getElementById(id+"cdm10_disableMe2").value = x.toFixed(2);
								}
								function toggle_cmd11(checkboxID, toggleID ,toggleID2) {
									 var checkbox = document.getElementById(checkboxID);
									 var toggle = document.getElementById(toggleID);
									 var toggle2 = document.getElementById(toggleID2);
									 updateToggle = checkbox.checked ? toggle.readOnly=false : toggle.readOnly=true;
									 updateToggle = checkbox.checked ? toggle2.readOnly=false : toggle2.readOnly=true;
								}
								function myFunction_cdm11(id,param,revenue) {
									var x = document.getElementById(id+"cdm11_disableMe").value * (revenue / param);
									document.getElementById(id+"cdm11_disableMe2").value = x.toFixed(2);
								}
								</script>
</body>
</html>