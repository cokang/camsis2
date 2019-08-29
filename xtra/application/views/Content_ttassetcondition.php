				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>Asset Description</th>
								<th>Asset Condition</th>
								<th>Asset count</th>
							</tr>
						</thead>
						<tbody>
							
							<?php $nom = 1;  foreach($asset_bycond as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="Asset Description :"><?=strtoupper($row->V_Asset_name)?></td>
								<td data-title="Asset Condition :"><?=$row->v_AssetCondition ?></td>
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