				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>Asset Description</th>
								<th>Asset Variation</th>
								<th>Asset count</th>
							</tr>
						</thead>
						<tbody>
							
							<?php $nom = 1;  foreach($asset_byvar as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="Asset Description :"><?=strtoupper($row->V_Asset_name)?></td>
								<td data-title="Asset Variation :"><?=$row->v_AssetVStatus ?></td>
								<td data-title="Asset count :"><?= $row->aTotal ?></td>
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