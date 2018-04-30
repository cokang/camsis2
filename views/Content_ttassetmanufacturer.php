				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>Manufacturer</th>
								<th>Asset Description</th>
								<th>Asset Count</th>
							</tr>
						</thead>
						<tbody>
						<?php $nom = 1;  foreach($asset_man as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="Type Code :"><?=$row->V_Manufacturer?></td>
								<td data-title="Asset Description :"><?=strtoupper($row->V_Asset_name)?></td>
								<td data-title="Asset Count :"><?=$row->aTotal?></td>
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