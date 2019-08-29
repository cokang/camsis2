<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form">
			<div class="ui-main-form-header">
				<table align="center" height="40px" border="0">
					<tr>
						<td><span style="margin-left:10px;">New Booking</span></td>
					</tr>
				</table>
			</div>
			<div class="ui-main-form-5">
				<div class="middle_d">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
								<td class="ui-header-new"><b>No</b></td>
								<td class="ui-header-new"><b>No Work Order</b></td>
								<td class="ui-header-new"><b>Status</b></td>
						</tr>
						
						
						<?php  if (!empty($recordbookdet)) {?>
				<?php $numrow = 1; foreach($recordbookdet as $row):?>
					     			
	    				<tr >
	    					<td class="ui-desk-style-table" style="color:black; padding-left:10px;"><?=$numrow?></td>
							<td class="ui-desk-style-table" style="color:black; padding-left:10px;"><?= ($row->booking_wo) ? ($row->booking_status == 'O' ? anchor ('contentcontroller/workorderlist_update?wrk_ord='.$row->booking_wo.'&whatid='.$row->booking_id.'&bookwo=O',''.$row->booking_wo.'' ) : $row->booking_wo) : 'N/A'?></td>
							<td class="ui-desk-style-table" style="color:black; padding-left:10px;"><?= ($row->booking_status) ? ($row->booking_status == 'O') ? 'Available' : 'Used' : 'N/A'?></td>
						  </tr>
	        			<?php $numrow++; ?>
			    		<?php endforeach;?>
			    		<?php }else { ?>
						<tr align="center" style="background:white; height:200px;">
	    					<td colspan="10"><span style="color:red; text-transform: uppercase;">NO BOOKING FOUND .</span>
							</td>
	    				</tr>
						<?php } ?>	
						
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
</body>
</html>
