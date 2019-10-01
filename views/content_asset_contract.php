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
							<b><span class="textmenu" style="float:left;">Service Contract</span></b>
							<span class="textmenu1" style="float:right;padding-top:0px;">
							<?php echo anchor ('contentcontroller/Service_update?asstno='.$asstno, '<button type="button" class="btn-button btn-primary-button">Update</button>'); ?>
							</span>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
							<table class="ui-content-form" width="100%" border="0">
								<tr>	
									<tr>
										<td class="td-assest">Contract : </td>
										<td><?=isset($record[0]->contract) ? $record[0]->contract : 'N/A' ?></td>
									</tr>
									<tr>
										<td class="td-assest">Vendor : </td>
										<td><?=isset($record[0]->vendor) ? $record[0]->vendor : 'N/A' ?></td>
									</tr>
									<tr>
										<td class="td-assest">Period : </td>
										<td><?=isset($record[0]->period) ? date_format(new DateTime($record[0]->period), 'd-m-Y') : 'N/A' ?></td>
									</tr>
									<tr>
										<td class="td-assest">Frequency : </td>
										<td><?=isset($record[0]->frequency) ? $record[0]->frequency : 'N/A' ?></td>
									</tr>
									<tr>
										<td class="td-assest">Reference : </td>
										<td><?=isset($record[0]->reference) ? $record[0]->reference : 'N/A' ?></td>
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
