				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>No of Request</th>
								<th>Priority</th>
								<th>Responded Late</th>
							</tr>
						</thead>
						<tbody>
							<?php $nom = 1;  foreach($c_lateresponse as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="Request No. :"><?=strtoupper($row->v_Complaintno)?></td>
								<td data-title="Priority :"><?=$row->v_Priority ?> </td>
								<td data-title="Responded Late :"><?=$row->mint ?> mins</td>
							</tr> 			
	    	
    				<?php endforeach;?>
						</tbody>
					</table>
				</div>
			</div>
		</section>
	</div>
</body>
</html>