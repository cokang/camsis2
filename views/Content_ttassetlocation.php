				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>NO</th>
								<th>Asset Description</th>
								<th>Location</th>
								<th>Asset count</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td data-title="No :">1</td>
								<td data-title="Asset Description :">Test</td>
								<td data-title="Location :">test</td>
								<td data-title="Asset count :">test</td>
							</tr>
							<?php $nom = 1;  foreach($asset_byloc as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="Asset Description :"><?=strtoupper($row->V_Asset_name)?></td>
								<td data-title="Location :"><?=$row->v_Location_Name ?></td>
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