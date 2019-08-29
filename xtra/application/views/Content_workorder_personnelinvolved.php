<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
			<table class="ui-content-middle-menu-workorder" border="0" height="" width="100%" align="center">
			<?php include 'content_wrk_ord.php';?>
			<tr class="ui-color-contents-style-1 ui-left_web">
				<td colspan="6" height="20px" style="padding-left:10px;">&nbsp;</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td class="pd-bttm" colspan="6" valign="top">
					<table class="ui-content-middle-menu-workorder" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:4px; font-weight: bold;">Personnel Involved</span></td>
						</tr>
						<tr>
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
									<tr style="height:20px;">
										<td>Response</td>
										<td>
											<table style="color:black;" width="100%">
												<tr>
													<td width="5%" align="center">#1</td>
													<td width="35%"><?= isset($P1personnel[0]) == TRUE ? $P1personnel[0] : 'N/A'?> <?= isset($P1personnel[1]) == TRUE ? $P1personnel[1] : ''?></td>
													<td width="15%"><?= isset($P1ptime[0]) == TRUE ? $P1ptime[0] : 'N/A'?>  hr <?= isset($P1ptime[1]) == TRUE ? $P1ptime[1] : 'N/A'?> mins </td>
													<td width="15%">RM <?= isset($P1pRate) == TRUE ? $P1pRate : 'N/A'?></td>
													<td width="25%">RM <?= isset($P1pTrate) == TRUE ? $P1pTrate : 'N/A'?></td>
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
													<td width="35%"><?= isset($P2personnel[0]) == TRUE ? $P2personnel[0] : 'N/A'?> <?= isset($P2personnel[1]) == TRUE ? $P2personnel[1] : ''?></td>
													<td width="15%"><?= isset($P2ptime[0]) == TRUE ? $P2ptime[0] : 'N/A'?>  hr <?= isset($P2ptime[1]) == TRUE ? $P2ptime[1] : 'N/A'?> mins</td>
													<td width="15%">RM <?= isset($P2pRate) == TRUE ? $P2pRate : 'N/A'?></td>
													<td width="25%">RM <?= isset($P2pTrate) == TRUE ? $P2pTrate : 'N/A'?></td>
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
													<td width="35%"><?= isset($P3personnel[0]) == TRUE ? $P3personnel[0] : 'N/A'?> <?= isset($P3personnel[1]) == TRUE ? $P3personnel[1] : ''?></td>
													<td width="15%"><?= isset($P3ptime[0]) == TRUE ? $P3ptime[0] : 'N/A'?>  hr <?= isset($P3ptime[1]) == TRUE ? $P3ptime[1] : 'N/A'?> mins</td>
													<td width="15%">RM <?= isset($P3pRate) == TRUE ? $P3pRate : 'N/A'?></td>
													<td width="25%">RM <?= isset($P3pTrate) == TRUE ? $P3pTrate : 'N/A'?></td>
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
									<tr><td colspan="3" class="ui-bottom-border-color" style="font-weight: bold;">Visit <?= $row->n_Visit ?></td></tr>
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
								<table class="ui-mobile-table-desk ui-left_mobile" style="color:black; width:100%; font-weight: normal;" border="0">
									<tr>
										<td colspan="2" align="center" class="bg-navy">Personnel</td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">#1</td>
										<td><?= isset($P1personnel[0]) == TRUE ? $P1personnel[0] : 'N/A'?> <?= isset($P1personnel[1]) == TRUE ? $P1personnel[1] : ''?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Hours or RM</td>
										<td><?= isset($P1ptime[0]) == TRUE ? $P1ptime[0] : 'N/A'?>  hr <?= isset($P1ptime[1]) == TRUE ? $P1ptime[1] : 'N/A'?> mins </td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Rate</td>
										<td>RM <?= isset($P1pRate) == TRUE ? $P1pRate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Total</td>
										<td>RM <?= isset($P1pTrate) == TRUE ? $P1pTrate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">#2</td>
										<td><?= isset($P2personnel[0]) == TRUE ? $P2personnel[0] : 'N/A'?> <?= isset($P2personnel[1]) == TRUE ? $P2personnel[1] : ''?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Hours or RM</td>
										<td><?= isset($P2ptime[0]) == TRUE ? $P2ptime[0] : 'N/A'?>  hr <?= isset($P1ptime[1]) == TRUE ? $P2ptime[1] : 'N/A'?> mins </td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Rate</td>
										<td>RM <?= isset($P2pRate) == TRUE ? $P2pRate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Total</td>
										<td>RM <?= isset($P2pTrate) == TRUE ? $P2pTrate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">#3</td>
										<td><?= isset($P3personnel[0]) == TRUE ? $P3personnel[0] : 'N/A'?> <?= isset($P3personnel[1]) == TRUE ? $P3personnel[1] : ''?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Hours or RM</td>
										<td><?= isset($P3ptime[0]) == TRUE ? $P3ptime[0] : 'N/A'?>  hr <?= isset($P3ptime[1]) == TRUE ? $P3ptime[1] : 'N/A'?> mins </td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Rate</td>
										<td>RM <?= isset($P3pRate) == TRUE ? $P3pRate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Total</td>
										<td>RM <?= isset($P3pTrate) == TRUE ? $P3pTrate : 'N/A'?></td>
									</tr>
									<tr>
										<td colspan="2" align="center" class="bg-navy">Visit One</td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">#1</td>
										<td><?= isset($P1visit1[0]) == TRUE ? $P1visit1[0] : 'N/A'?> <?= isset($P1visit1[1]) == TRUE ? $P1visit1[1] : ''?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Hours or RM</td>
										<td><?= isset($P1v1time[0]) == TRUE ? $P1v1time[0] : 'N/A'?>  hr <?= isset($P1v1time[1]) == TRUE ? $P1v1time[1] : 'N/A'?> mins</td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Rate</td>
										<td>RM <?= isset($P1v1Rate) == TRUE ? $P1v1Rate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Total</td>
										<td>RM <?= isset($P1v1Trate) == TRUE ? $P1v1Trate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">#2</td>
										<td><?= isset($P2visit1[0]) == TRUE ? $P2visit1[0] : 'N/A'?> <?= isset($P2visit1[1]) == TRUE ? $P1visit1[1] : ''?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Hours or RM</td>
										<td><?= isset($P2v1time[0]) == TRUE ? $P2v1time[0] : 'N/A'?>  hr <?= isset($P2v1time[1]) == TRUE ? $P2v1time[1] : 'N/A'?> mins</td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Rate</td>
										<td>RM <?= isset($P2v1Rate) == TRUE ? $P2v1Rate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Total</td>
										<td>RM <?= isset($P2v1Trate) == TRUE ? $P2v1Trate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">#3</td>
										<td><?= isset($P3visit1[0]) == TRUE ? $P3visit1[0] : 'N/A'?> <?= isset($P3visit1[1]) == TRUE ? $P3visit1[1] : ''?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Hours or RM</td>
										<td><?= isset($P3v1time[0]) == TRUE ? $P3v1time[0] : 'N/A'?>  hr <?= isset($P3v1time[1]) == TRUE ? $P3v1time[1] : 'N/A'?> mins</td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Rate</td>
										<td>RM <?= isset($P3v1Rate) == TRUE ? $P3v1Rate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Total</td>
										<td>RM <?= isset($P3v1Trate) == TRUE ? $P3v1Trate : 'N/A'?></td>
									</tr>
									<tr>
										<td colspan="2" align="center" class="bg-navy">Visit Two</td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">#1</td>
										<td><?= isset($P1visit2[0]) == TRUE ? $P1visit2[0] : 'N/A'?> <?= isset($P1visit2[1]) == TRUE ? $P1visit2[1] : ''?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Hours or RM</td>
										<td><?= isset($P1v2time[0]) == TRUE ? $P1v2time[0] : 'N/A'?>  hr <?= isset($P1v2time[1]) == TRUE ? $P1v2time[1] : 'N/A'?> mins</td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Rate</td>
										<td>RM <?= isset($P1v2Rate) == TRUE ? $P1v2Rate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Total</td>
										<td>RM <?= isset($P1v2Trate) == TRUE ? $P1v2Trate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">#2</td>
										<td><?= isset($P2visit2[0]) == TRUE ? $P2visit2[0] : 'N/A'?> <?= isset($P2visit2[1]) == TRUE ? $P2visit2[1] : ''?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Hours or RM</td>
										<td><?= isset($P2v2time[0]) == TRUE ? $P2v2time[0] : 'N/A'?>  hr <?= isset($P2v2time[1]) == TRUE ? $P2v2time[1] : 'N/A'?> mins</td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Rate</td>
										<td>RM <?= isset($P2v2Rate) == TRUE ? $P2v2Rate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Total</td>
										<td>RM <?= isset($P2v2Trate) == TRUE ? $P2v2Trate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">#3</td>
										<td><?= isset($P3visit2[0]) == TRUE ? $P3visit2[0] : 'N/A'?> <?= isset($P3visit2[1]) == TRUE ? $P3visit2[1] : ''?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Hours or RM</td>
										<td><?= isset($P3v2time[0]) == TRUE ? $P3v2time[0] : 'N/A'?>  hr <?= isset($P3v2time[1]) == TRUE ? $P3v2time[1] : 'N/A'?> mins</td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Rate</td>
										<td>RM <?= isset($P3v2Rate) == TRUE ? $P3v2Rate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Total</td>
										<td>RM <?= isset($P3v2Trate) == TRUE ? $P3v2Trate : 'N/A'?></td>
									</tr>
									<tr>
										<td colspan="2" align="center" class="bg-navy">Visit Three</td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">#1</td>
										<td><?= isset($P1visit3[0]) == TRUE ? $P1visit3[0] : 'N/A'?> <?= isset($P1visit3[1]) == TRUE ? $P1visit3[1] : ''?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Hours or RM</td>
										<td><?= isset($P1v3time[0]) == TRUE ? $P1v3time[0] : 'N/A'?>  hr <?= isset($P1v3time[1]) == TRUE ? $P1v3time[1] : 'N/A'?> mins</td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Rate</td>
										<td>RM <?= isset($P1v3Rate) == TRUE ? $P1v3Rate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Total</td>
										<td>RM <?= isset($P1v3Trate) == TRUE ? $P1v3Trate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">#2</td>
										<td><?= isset($P2visit3[0]) == TRUE ? $P2visit3[0] : 'N/A'?> <?= isset($P2visit3[1]) == TRUE ? $P2visit3[1] : ''?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Hours or RM</td>
										<td><?= isset($P2v3time[0]) == TRUE ? $P2v3time[0] : 'N/A'?>  hr <?= isset($P2v3time[1]) == TRUE ? $P2v3time[1] : 'N/A'?> mins</td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Rate</td>
										<td>RM <?= isset($P2v3Rate) == TRUE ? $P2v3Rate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Total</td>
										<td>RM <?= isset($P2v3Trate) == TRUE ? $P2v3Trate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">#3</td>
										<td><?= isset($P3visit3[0]) == TRUE ? $P3visit3[0] : 'N/A'?> <?= isset($P3visit3[1]) == TRUE ? $P3visit3[1] : ''?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Hours or RM</td>
										<td><?= isset($P3v3time[0]) == TRUE ? $P3v3time[0] : 'N/A'?>  hr <?= isset($P3v3time[1]) == TRUE ? $P3v3time[1] : 'N/A'?> mins</td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Rate</td>
										<td>RM <?= isset($P3v3Rate) == TRUE ? $P3v3Rate : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-gg" valign="top">Total</td>
										<td>RM <?= isset($P3v3Trate) == TRUE ? $P3v3Trate : 'N/A'?></td>
									</tr>
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