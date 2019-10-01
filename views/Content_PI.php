<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
			<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
			<?php include 'content_tab_woppm.php';?>
			<tr class="ui-color-contents-style-1 nonetr">
				<td colspan="9" height="40px" style="padding-left:10px;">&nbsp;</td>
			</tr>
				
			<tr class="ui-color-contents-style-1">
				<td class="pd-bttm" colspan="9" valign="top">
					<table width="98%" class="ui-content-middle-menu-workorder" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:4px; font-weight: bold;">Personnel Involved</span></td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form ui-left_web" width="100%" border="0">	
									<tr style="height:20px; font-weight: bold;" >
										<td width="18%">Personnel</td>
										<td>
											<table style="color:black;" width="100%" border="0">
												<tr style="font-weight: bold;">
													<td width="5%"></td>
													<td width="35%"></td>
													<td width="15%">Hours</td>
													<td width="15%">Rate</td>
													<td width="25%">Total</td>
												</tr>
											</table>
										</td>
									</tr>

									<?php foreach ($rvisit1 as $row): ?>
									<?php 
									$data['P1visit'.$row->n_Visit] = explode('-',$row->v_Personal1);
									$data['P2visit'.$row->n_Visit] = explode('-',$row->v_Personal2);
									$data['P3visit'.$row->n_Visit] = explode('-',$row->v_Personal3);
									$data['P1timeV'.$row->n_Visit] = explode(':',$row->n_Hours1);
									$data['P2timeV'.$row->n_Visit] = explode(':',$row->n_Hours2);
									$data['P3timeV'.$row->n_Visit] = explode(':',$row->n_Hours3);
									$data['P1RateV'.$row->n_Visit] = number_format($row->n_Rate1,2);
									$data['P2RateV'.$row->n_Visit] = number_format($row->n_Rate2,2);
									$data['P3RateV'.$row->n_Visit] = number_format($row->n_Rate3,2);
									$data['P1TrateV'.$row->n_Visit] = number_format($row->n_Total1,2);
									$data['P2TrateV'.$row->n_Visit] = number_format($row->n_Total2,2);
									$data['P3TrateV'.$row->n_Visit] = number_format($row->n_Total3,2);
									?>
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Visit <?=$row->n_Visit?></td></tr>
									<tr style="height:20px;">
										<td>&nbsp;</td>
										<td>
											<table style="color:black;" width="100%">
												<tr>
													<td width="5%" align="center">#1</td>
													<td width="35%"><?= isset($data['P1visit'.$row->n_Visit][0]) ? $data['P1visit'.$row->n_Visit][0].' '.$data['P1visit'.$row->n_Visit][1] : 'N/A' ?></td>
													<td width="15%"><?= isset($data['P1timeV'.$row->n_Visit][0]) ? $data['P1timeV'.$row->n_Visit][0] : 'N/A' ?> hr <?= isset($data['P1timeV'.$row->n_Visit][1]) ? $data['P1timeV'.$row->n_Visit][1] : 'N/A' ?> min</td>
													<td width="15%">RM <?= isset($data['P1RateV'.$row->n_Visit]) == TRUE ? $data['P1RateV'.$row->n_Visit] : 'N/A'?></td>
													<td width="25%">RM <?= isset($data['P1TrateV'.$row->n_Visit]) == TRUE ? $data['P1TrateV'.$row->n_Visit] : 'N/A'?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style="height:20px;">
										<td>&nbsp;</td>
										<td>
											<table style="color:black;" width="100%">
												<tr>
													<td width="5%" align="center">#2</td>
													<td width="35%"><?= isset($data['P2visit'.$row->n_Visit][0]) ? $data['P2visit'.$row->n_Visit][0].' '.$data['P2visit'.$row->n_Visit][1] : 'N/A' ?></td>
													<td width="15%"><?= isset($data['P2timeV'.$row->n_Visit][0]) ? $data['P2timeV'.$row->n_Visit][0] : 'N/A' ?> hr <?= isset($data['P2timeV'.$row->n_Visit][1]) ? $data['P2timeV'.$row->n_Visit][1] : 'N/A' ?> min</td>
													<td width="15%">RM <?= isset($data['P2RateV'.$row->n_Visit]) == TRUE ? $data['P2RateV'.$row->n_Visit] : 'N/A'?></td>
													<td width="25%">RM <?= isset($data['P2TrateV'.$row->n_Visit]) == TRUE ? $data['P2TrateV'.$row->n_Visit] : 'N/A'?></td>
												</tr>
											</table>
										</td>
									</tr>
									<tr style="height:20px;">
										<td>&nbsp;</td>
										<td>
											<table style="color:black;" width="100%">
												<tr>
													<td width="5%" align="center">#3</td>
													<td width="35%"><?= isset($data['P3visit'.$row->n_Visit][0]) ? $data['P3visit'.$row->n_Visit][0].' '.$data['P3visit'.$row->n_Visit][1] : 'N/A' ?></td>
													<td width="15%"><?= isset($data['P3timeV'.$row->n_Visit][0]) ? $data['P3timeV'.$row->n_Visit][0] : 'N/A' ?> hr <?= isset($data['P3timeV'.$row->n_Visit][1]) ? $data['P3timeV'.$row->n_Visit][1] : 'N/A' ?> min</td>
													<td width="15%">RM <?= isset($data['P3RateV'.$row->n_Visit]) == TRUE ? $data['P3RateV'.$row->n_Visit] : 'N/A'?></td>
													<td width="25%">RM <?= isset($data['P3TrateV'.$row->n_Visit]) == TRUE ? $data['P3TrateV'.$row->n_Visit] : 'N/A'?></td>
												</tr>
											</table>
										</td>
									</tr>
									<?php endforeach; ?>
									<tr style="height:20px;">
										<td>&nbsp;</td>
										<td>
											<table style="color:black;" width="100%">
												<tr>
													<td width="5%" align="center"></td>
													<td width="35%"></td>
													<td width="15%"></td>
													<td width="15%">TOTAL :</td>
													<td width="25%"><span style="font-weight: bold;">RM <?= isset($TotalRate) == TRUE ? $TotalRate : 'N/A'?></span></td>
												</tr>
											</table>
										</td>
									</tr>																																									
								</table>
								<table class="ui-mobile-table-desk ui-left_mobile" style="color:black; width:100%; font-weight: normal; font-size:12px;" border="0">
									<?php foreach ($rvisit1 as $row): ?>
									<?php 
									$data['P1visit'.$row->n_Visit] = explode('-',$row->v_Personal1);
									$data['P2visit'.$row->n_Visit] = explode('-',$row->v_Personal2);
									$data['P3visit'.$row->n_Visit] = explode('-',$row->v_Personal3);
									$data['P1timeV'.$row->n_Visit] = explode(':',$row->n_Hours1);
									$data['P2timeV'.$row->n_Visit] = explode(':',$row->n_Hours2);
									$data['P3timeV'.$row->n_Visit] = explode(':',$row->n_Hours3);
									$data['P1RateV'.$row->n_Visit] = number_format($row->n_Rate1,2);
									$data['P2RateV'.$row->n_Visit] = number_format($row->n_Rate2,2);
									$data['P3RateV'.$row->n_Visit] = number_format($row->n_Rate3,2);
									$data['P1TrateV'.$row->n_Visit] = number_format($row->n_Total1,2);
									$data['P2TrateV'.$row->n_Visit] = number_format($row->n_Total2,2);
									$data['P3TrateV'.$row->n_Visit] = number_format($row->n_Total3,2);
									?>
									<tr>
										<td colspan="2" align="center" class="bg-navy">Visit <?=$row->n_Visit?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">#1</td>
										<td><?= isset($data['P1visit'.$row->n_Visit][0]) ? $data['P1visit'.$row->n_Visit][0].' '.$data['P1visit'.$row->n_Visit][1] : 'N/A' ?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Hours or RM</td>
										<td><?= isset($data['P1timeV'.$row->n_Visit][0]) ? $data['P1timeV'.$row->n_Visit][0] : 'N/A' ?> hr <?= isset($data['P1timeV'.$row->n_Visit][1]) ? $data['P1timeV'.$row->n_Visit][1] : 'N/A' ?> min</td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Rate</td>
										<td>RM <?= isset($data['P1RateV'.$row->n_Visit]) == TRUE ? $data['P1RateV'.$row->n_Visit] : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Total</td>
										<td>RM <?= isset($data['P1TrateV'.$row->n_Visit]) == TRUE ? $data['P1TrateV'.$row->n_Visit] : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">#2</td>
										<td><?= isset($data['P2visit'.$row->n_Visit][0]) ? $data['P2visit'.$row->n_Visit][0].' '.$data['P2visit'.$row->n_Visit][1] : 'N/A' ?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Hours or RM</td>
										<td><?= isset($data['P2timeV'.$row->n_Visit][0]) ? $data['P2timeV'.$row->n_Visit][0] : 'N/A' ?> hr <?= isset($data['P2timeV'.$row->n_Visit][1]) ? $data['P2timeV'.$row->n_Visit][1] : 'N/A' ?> min</td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Rate</td>
										<td>RM <?= isset($data['P2RateV'.$row->n_Visit]) == TRUE ? $data['P2RateV'.$row->n_Visit] : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Total</td>
										<td>RM <?= isset($data['P2TrateV'.$row->n_Visit]) == TRUE ? $data['P2TrateV'.$row->n_Visit] : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">#3</td>
										<td><?= isset($data['P3visit'.$row->n_Visit][0]) ? $data['P3visit'.$row->n_Visit][0].' '.$data['P3visit'.$row->n_Visit][1] : 'N/A' ?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Hours or RM</td>
										<td><?= isset($data['P3timeV'.$row->n_Visit][0]) ? $data['P3timeV'.$row->n_Visit][0] : 'N/A' ?> hr <?= isset($data['P3timeV'.$row->n_Visit][1]) ? $data['P3timeV'.$row->n_Visit][1] : 'N/A' ?> min</td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Rate</td>
										<td>RM <?= isset($data['P3RateV'.$row->n_Visit]) == TRUE ? $data['P3RateV'.$row->n_Visit] : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest" valign="top">Total</td>
										<td>RM <?= isset($data['P3TrateV'.$row->n_Visit]) == TRUE ? $data['P3TrateV'.$row->n_Visit] : 'N/A'?></td>
									</tr>
									<?php endforeach; ?>
									<tr>
										<td colspan="2" align="center" class="bg-teal">TOTAL : <span style="font-weight: bold;">RM <?= isset($TotalRate) == TRUE ? $TotalRate : 'N/A'?></span></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php  echo form_hidden('wrk_ord',$this->input->get('wrk_ord')); ?>
	</div>
</div>