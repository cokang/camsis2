				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
						
							<tr>
								<th>NO</th>
								<th>Manufacturer</th>
								<th>Asset Description</th>
								<th>Purchase cost</th>
							</tr>
						</thead>
						<tbody>
						<?php $nom = 1;  foreach($asset_cosmanu as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="Model :"><?=$row->V_Manufacturer?></td>
								<td data-title="Asset Description :"><?=strtoupper($row->V_Asset_name)?></td>
								<td data-title="Purchase Cost :"><?= (($row->Totalcost) <> '') ? "$".number_format($row->Totalcost, 2) : '0'?></td>
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