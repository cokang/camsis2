				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>No of Request</th>
								<th>Priority</th>
								<th>Completed within time</th>
							</tr>
						</thead>
						<tbody>
							
							<?php $nom = 1;  foreach($wo_responseontime as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="Request No. :"><?=strtoupper($row->V_Request_no)?></td>
								<td data-title="Priority :"><?=$row->V_priority_code ?> </td>
								<td data-title="Responded Late :"><?=$row->mintaken ?> mins</td>
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