				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>No of Request</th>
								<th>Asset description</th>
								<th>Model Number</th>
								<th>Manufacturer</th>
							</tr>
						</thead>
						<tbody>
							
							<?php $nom = 1;  foreach($wo_bymodelman as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="No of Request :"><?=$row->bil ?></td>
								<td data-title="Asset description :"><?=strtoupper($row->v_asset_name)?></td>
								<td data-title="Model Number :"><?=strtoupper($row->v_model_no)?></td>
								<td data-title="Manufacturer :"><?=strtoupper($row->v_manufacturer)?></td>
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