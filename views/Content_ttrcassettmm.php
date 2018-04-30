				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>Total of Request</th>
								<th>Asset type</th>
								<th>model </th>
								<th>manufacturer</th>
							</tr>
						</thead>
						<tbody>
							
							<?php $nom = 1;  foreach($ppmmm as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="Total of Requestt :"><?=$row->bil ?></td>
								<td data-title="Asset type :"><?=strtoupper($row->v_equip_code)?></td>
								<td data-title="Model :"><?=strtoupper($row->V_Model_no)?></td>
								<td data-title="Manufacturer :"><?=strtoupper($row->V_manufacturer)?></td>
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