<?php
if ($this->input->get('ex') == 'excel'){
	$filename ="Schedule Corrective Maintenance (SCM) Listing ".$year.".xls";
	header('Content-type: application/ms-excel');
	header('Content-Disposition: attachment; filename='.$filename);
}

if ($this->input->get('ex') == ''){
	include 'content_btp.php';?>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr">Clause Report</div>
		<button onclick="javascript:myFunction('report_clause_listing?y=<?=$year?>&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo$this->input->get('resch');?>&grp=<?=$this->input->get('grp');?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php echo $btp ;?>';">CANCEL</button>
	<?php if (($this->input->get('ex') == '') or ($this->input->get('none') == '')){?>
		<a href="<?php echo base_url();?>index.php/contentcontroller/report_a2?y=<?=$year?>&none=close&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo $this->input->get('resch');?>&ex=excel&xxx=export&grp=<?=$this->input->get('grp');?>&btp=<?=$this->input->get('btp');?>" style="float:right; margin-right:40px;"><img src="<?php echo base_url();?>images/excel.png" style="width:40px; height:38px; position:absolute;" title="export to excel"></a>
		<a href="<?php echo base_url();?>index.php/contentcontroller/report_a2?y=<?=$year?>&pdf=1&stat=<?php echo $this->input->get('stat');?>&resch=<?php echo $this->input->get('resch');?>&grp=<?=$this->input->get('grp');?>" style="float:right; margin-right:80px;"><img src="<?php echo base_url();?>images/pdf.png" style="width:40px; height:38px; position:absolute;" title="export to pdf"></a>
	<?php } ?>
	</div>
<?php } ?>


		

	<div class="menu" style="position:relative;">
	<?php if (($this->input->get('ex') == '') or (1==0)){?>
		<?php include 'content_headprint.php';?>
	<?php } ?>
	<?php if ($this->input->get('ex') == ''){?>
		<div id="Instruction" >
			<center>Clause Year : 
				<form method="get" action="">
		
					<?php 
						for ($dyear = '2015';$dyear <= date("Y");$dyear++){
							$year_list[$dyear] = $dyear;
						}
					?>
					<?php echo form_dropdown('y', $year_list, set_value('y', isset($record[0]->Year) ? $record[0]->Year : $year) , 'style="width: 65px;" id="cs_year"'); ?>
					<input type="hidden" value="<?php echo set_value('stat', ($this->input->get('stat')) ? $this->input->get('stat') : ''); ?>" name="stat">
					<input type="hidden" value="<?php echo set_value('resch', ($this->input->get('resch')) ? $this->input->get('resch') : ''); ?>" name="resch">
					<input type="hidden" value="<?php echo set_value('grp', ($this->input->get('grp')) ? $this->input->get('grp') : ''); ?>" name="grp">		
					<input type="submit" value="Generate" onchange="javascript: submit()"/></center>
				</form>
			</center>
		</div>
	<?php } ?>
		<div class="m-div">

			<table class="rport-header">
				<tr>
					<td colspan="5">
						Clause Summary All Hospital - <?=$year?> - <?php echo $this->session->userdata('usersessn');?> ( <?php if ($this->input->get('grp') == ''){echo 'ALL'; }else{ echo 'Group '.$this->input->get('grp');} ?> )
					</td>
				</tr>
			</table>


			<div style="overflow-x:auto;">
			
				<table class="tftable" border="1">
					<tbody>
						<tr>
							<td colspan="2">Clause Summary</td>
						</tr>
						<tr>
							<td>
								<table class="tftable" border="1">
									<thead>
										<tr>
											<th>No.</th>
											<th>Hospital</th>
											<th>OPEN</th>
											<th>CLOSED</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<?php	
										$totalopen = 0;
										$totalclose = 0;
										$totalsum = 0;
										$bilOpen = 0;
										$bilClose = 0;
										$bilTotal = 0;
										?>
										<?php if( !empty($clause_summary) ){?>
											<?php $i=1;foreach( $clause_summary as $row_sum ):?>
												<?php $totalopen= $totalopen + $row_sum->bilopen;?>
												<?php $totalclose= $totalclose + $row_sum->bilclosed;?>
												<?php $bilOpen = $row_sum->bilopen;?>
												<?php $bilClose = $row_sum->bilclosed;?>
												<?php $bilTotal = $bilOpen + $bilClose;?>
												<?php $totalsum= $totalopen + $totalclose;?>
										<tr>
											<td><?=$i;?></td>
											<td><?=$row_sum->v_HospitalCode;?></td>
											<td><?=$bilOpen;?></td>
											<td><?=$bilClose;?></td>
											<td><?=$bilTotal;?></td>
										</tr>
											<?php $i++;endforeach;?>
										<?php } ?>
										<tr>
											<td colspan="2">Total</td>
											<td><?=$totalopen;?></td>
											<td><?=$totalclose;?></td>
											<td><?=$totalsum;?></td>
										</tr>
									</tbody>
								</table>					
							</td>
							<td> 
								<ul>
									<li>Total Clause <?=$totalsum;?></li>
									<li>Total Open <?=$totalopen;?></li>
									<li>Total Closed <?=$totalclose;?></li>
								</ul>	
							</td>
						</tr>
					</tbody>
				</table>

				<table class="tftable" border="1">
					<tbody>
						<tr>
							<td colspan="2">Clause By Month</td>
						</tr>
						<tr>
							<td>
								<table class="tftable" border="1">
									<thead>
										<tr>
											<th>No.</th>
											<th>Hospital</th>
											<th>Jan</th>
											<th>Feb</th>
											<th>Mar</th>
											<th>Apr</th>
											<th>May</th>
											<th>Jun</th>
											<th>Jul</th>
											<th>Aug</th>
											<th>Sep</th>
											<th>Oct</th>
											<th>Nov</th>
											<th>Dis</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$m_tbul1=0;
										$m_tbul2=0;
										$m_tbul3=0;
										$m_tbul4=0;
										$m_tbul5=0;
										$m_tbul6=0;
										$m_tbul7=0;
										$m_tbul8=0;
										$m_tbul9=0;
										$m_tbul10=0;
										$m_tbul11=0;
										$m_tbul12=0;
										$m_total=0;
										$m_sumtotal=0;
										?>
										<?php if( !empty($clause_by_month) ){?>
											<?php $mi=1;foreach($clause_by_month as $row_month):?>
											<?php 
											$m_tbul1=$m_tbul1+$row_month->bul1;
											$m_tbul2=$m_tbul2+$row_month->bul2;
											$m_tbul3=$m_tbul3+$row_month->bul3;
											$m_tbul4=$m_tbul4+$row_month->bul4;
											$m_tbul5=$m_tbul5+$row_month->bul5;
											$m_tbul6=$m_tbul6+$row_month->bul6;
											$m_tbul7=$m_tbul7+$row_month->bul7;
											$m_tbul8=$m_tbul8+$row_month->bul8;
											$m_tbul9=$m_tbul9+$row_month->bul9;
											$m_tbul10=$m_tbul10+$row_month->bul10;
											$m_tbul11=$m_tbul11+$row_month->bul11;
											$m_tbul12=$m_tbul12+$row_month->bul12;
											$m_total=$row_month->bul1+$row_month->bul2+$row_month->bul3+$row_month->bul4+$row_month->bul5+$row_month->bul6+$row_month->bul7+$row_month->bul8+$row_month->bul9+$row_month->bul10+$row_month->bul11+$row_month->bul12;
											$m_sumtotal = $m_sumtotal + $m_total;
											?>
										<tr>
											<td><?=$mi;?></td>
											<td><?=($row_month->v_HospitalCode) ? $row_month->v_HospitalCode : "";?></td>
											<td><?=$row_month->bul1;?></td>
											<td><?=$row_month->bul2;?></td>
											<td><?=$row_month->bul3;?></td>
											<td><?=$row_month->bul4;?></td>
											<td><?=$row_month->bul5;?></td>
											<td><?=$row_month->bul6;?></td>
											<td><?=$row_month->bul7;?></td>
											<td><?=$row_month->bul8;?></td>
											<td><?=$row_month->bul9;?></td>
											<td><?=$row_month->bul10;?></td>
											<td><?=$row_month->bul11;?></td>
											<td><?=$row_month->bul12;?></td>
											<td><?=$m_total;?></td>
										</tr>
											<?php $mi++;endforeach;?>
										<?php } ?>
										<tr>
											<td colspan="2">Total</td>
											<td><?=$m_tbul1;?></td>
											<td><?=$m_tbul2;?></td>
											<td><?=$m_tbul3;?></td>
											<td><?=$m_tbul4;?></td>
											<td><?=$m_tbul5;?></td>
											<td><?=$m_tbul6;?></td>
											<td><?=$m_tbul7;?></td>
											<td><?=$m_tbul8;?></td>
											<td><?=$m_tbul9;?></td>
											<td><?=$m_tbul10;?></td>
											<td><?=$m_tbul11;?></td>
											<td><?=$m_tbul12;?></td>
											<td><?=$m_sumtotal;?></td>
										</tr>
									</tbody>
								</table>
							</td>
							<td>
								<ul>
									<li>Total Clause <?=$m_sumtotal;?></li>
								</ul>	
							</td>
						</tr>
					</tbody>
				</table>
				
				<table class="tftable" border="1">
					<tbody>
						<tr>
							<td colspan="2">Clause By Type</td>
						</tr>
						<tr>
							<td>
								<table class="tftable" border="1">
									<thead>
										<tr>
											<th>No.</th>
											<th>Hospital</th>
											<th>C12 (8.2)</th>
											<th>C44.1 (21.2)</th>
											<th>C44.2 (21.3)</th>
											<th>Total</th>
										</tr>
									</thead>
									<tbody>
										<?php 
										$t_totalbil82 = 0;
										$t_totalbil212 = 0;
										$t_totalbil213 = 0;
										$t_sumbiltotal = 0;
										?>
										<?php if( !empty($clause_by_type) ){?>
											<?php $nt=1;foreach($clause_by_type as $row_type):?>
											<?php
											$t_totalbil82 = $t_totalbil82 + $row_type->bil82;
											$t_totalbil212 = $t_totalbil212 + $row_type->bil212;
											$t_totalbil213 = $t_totalbil213 + $row_type->bil213;
											$t_sumbiltotal = $t_totalbil82 + $t_totalbil212 + $t_totalbil213;
											?>
										<tr>
											<td><?=$nt;?></td>
											<td><?=($row_type->v_HospitalCode) ? $row_type->v_HospitalCode : "";?></td>
											<td><?=$row_type->bil82;?></td>
											<td><?=$row_type->bil212;?></td>
											<td><?=$row_type->bil213;?></td>
											<td><?=$row_type->bil82 + $row_type->bil212 + $row_type->bil213; ?></td>
										</tr>
											<?php $nt++;endforeach;?>
										<?php } ?>
										<tr>
											<td colspan="2">Total</td>
											<td><?=$t_totalbil82;?></td>
											<td><?=$t_totalbil212;?></td>
											<td><?=$t_totalbil213;?></td>
											<td><?=$t_sumbiltotal;?></td>
										</tr>
									</tbody>
								</table>
								
							</td>
							<td>
								<ul>
									<li>Total 12 (8.2) Clause <?=$t_totalbil82;?></li>
									<li>Total 44.1 (21.2) Clause <?=$t_totalbil212;?></li>
									<li>Total 44.2 (21.3) Clause <?=$t_totalbil213;?></li>
									<li>Total Clause <?=$t_sumbiltotal;?></li>
								</ul>	
							</td>
						</tr>
					</tbody>
				</table>
				
				<table class="tftable" border="1">
					<tbody>
						<tr>
							<td colspan="2">Clause By Category/Team</td>
						</tr>
						<tr>
							<td>
								<table class="tftable" border="1">
									<tbody>
										<tr>
											<th>No.</th>
											<th>Hospital</th>
											<th>AIS</th>
											<th>ECC</th>
											<th>HDU</th>
											<th>IMG</th>
											<th>LAB</th>
											<th>SIS</th>
											<th>Total</th>
										</tr>
										<?php 
											$ct_tbul1 = 0;
											$ct_tbul2 = 0;
											$ct_tbul3 = 0;
											$ct_tbul4 = 0;
											$ct_tbul5 = 0;
											$ct_tbul6 = 0;
											$ct_tbul7 = 0;
											$ct_tbul8 = 0;
											$ct_tbul9 = 0;
											$ct_tbul10 = 0;
											$ct_tbul11 = 01;
											$ct_tbul12 = 0;

											$ct_biltotal = 0;
											$ct_bil82 = 0;
											$ct_bil212 = 0;
											$ct_bil213 = 0;
											// $ct_totalbil82 = 0;
											// $ct_totalbil212 = 0;
											// $ct_totalbil213 = 0;
											$ct_sumbiltotal = 0;
											?>
										<?php if($clause_by_category_or_team){?>
											<?php $nct=1;foreach($clause_by_category_or_team as $row_team):?>
												<?php
												$ct_tbul1 = $ct_tbul1 + $row_team->bul1;
												$ct_tbul2 = $ct_tbul2 + $row_team->bul2;
												$ct_tbul3 = $ct_tbul3 + $row_team->bul3;
												$ct_tbul4 = $ct_tbul4 + $row_team->bul4;
												$ct_tbul5 = $ct_tbul5 + $row_team->bul5;
												$ct_tbul6 = $ct_tbul6 + $row_team->bul6;
												$ct_tbul7 = $ct_tbul7 + $row_team->bul7;
												$ct_tbul8 = $ct_tbul8 + $row_team->bul8;
												$ct_tbul9 = $ct_tbul9 + $row_team->bul9;
												$ct_tbul10 = $ct_tbul10 + $row_team->bul10;
												$ct_tbul11 = $ct_tbul11 + $row_team->bul11;
												$ct_tbul12 = $ct_tbul12 + $row_team->bul12;
												$ct_biltotal = $row_team->bul1+$row_team->bul2+$row_team->bul3+$row_team->bul4+$row_team->bul5+$row_team->bul6+$row_team->bul7+$row_team->bul8+$row_team->bul9+$row_team->bul10+$row_team->bul11+$row_team->bul12;
												// $ct_totalbil82 = $ct_totalbil82 + $ct_bil82;
												// $ct_totalbil212 = $ct_totalbil212 + $ct_bil212;
												// $ct_totalbil213 = $ct_totalbil213 + $ct_bil213;
												$ct_sumbiltotal = $ct_sumbiltotal + $ct_biltotal;
												?>
										<tr>
											<td><?=$nct;?></td>
											<td><?=($row_team->v_HospitalCode) ? $row_team->v_HospitalCode : "";?></td>
											<td><?=$row_team->bul1;?></td>
											<td><?=$row_team->bul2;?></td>
											<td><?=$row_team->bul3;?></td>
											<td><?=$row_team->bul4;?></td>
											<td><?=$row_team->bul5;?></td>
											<td><?=$row_team->bul6;?></td>
											<td><?=$ct_biltotal;?></td>
										</tr>
											<?php $nct++;endforeach;?>
										<?php } ?>
										<tr>
											<td colspan="2">Total</td>
											<td><?=$ct_tbul1;?></td>
											<td><?=$ct_tbul2;?></td>
											<td><?=$ct_tbul3;?></td>
											<td><?=$ct_tbul4;?></td>
											<td><?=$ct_tbul5;?></td>
											<td><?=$ct_tbul6;?></td>
											<td><?=$ct_sumbiltotal;//$tbul1+$tbul2+$tbul3+$tbul4+$tbul5+$tbul6+$tbul7+$tbul8+$tbul9+$tbul10+$tbul11+$tbul12;?></td>
										</tr>
									</tbody>
								</table>
							</td>
							<td>
								<ul>
									<li>Total Clause <?=$ct_sumbiltotal;?></li>
								</ul>	
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
