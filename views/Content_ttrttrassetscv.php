				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>Total of Request</th>
								<th>Asset status</th>
								<th>Asset condition </th>
								<th>Variation</th>
							</tr>
						</thead>
						<tbody>
							
							<?php $nom = 1;  foreach($wo_byscv as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="No of Request :"><?=$row->bil ?></td>
								<td data-title="Asset status :"><?=strtoupper($row->v_assetstatus)?></td>
								<td data-title="Asset condition :"><?=strtoupper($row->v_assetcondition)?></td>
								<td data-title="Variation :"><?=strtoupper($row->v_assetvstatus)?></td>
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