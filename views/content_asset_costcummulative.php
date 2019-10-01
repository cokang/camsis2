<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form">
		<?php include 'content_asset_tab.php';?>			
			<div class="ui-main-form-5">
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">CostCummulative</span></b>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
								<table class="ui-content-form" width="100%" border="0">
									<tr>
										<td class="td-assest">Ageing  </td>
										<td class="td-assest">: <?=isset($agecost[0]->year) ? number_format($agecost[0]->year)  : '0'?> Years <?=isset($agecost[0]->month) ? number_format($agecost[0]->month)  : '0'?> Months</td>
									</tr>
									<tr>
										<td class="td-assest">Purchase Cost(RM)   </td>
										<td class="td-assest">: <?=isset($agecost[0]->N_Cost) ? 'RM '.number_format($agecost[0]->N_Cost)  : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Cummulative Labour Cost(RM)   </td>
										<td class="td-assest">: <?=isset($laborpart['totallabor']) ? 'RM '.number_format($laborpart['totallabor'])  : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Cummulative Parts Cost(RM)  </td>
										<td class="td-assest">: <?=isset($laborpart['totalpart']) ? 'RM '.number_format($laborpart['totalpart'])  : 'N/A'?></td>
									</tr>
									<tr>
										<td class="td-assest">Depreciated Value   </td>
										<td class="td-assest">: <?=isset($agecost[0]->depre) ? 'RM '.number_format($agecost[0]->depre)  : 'N/A'?></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
