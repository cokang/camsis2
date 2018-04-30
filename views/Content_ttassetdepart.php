				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>Asset Description</th>
								<th>Department</th>
								<th>Asset count</th>
							</tr>
						</thead>
						<tbody>
							
							<?php $nom = 1;  foreach($asset_bydebt as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="Asset Description :"><?=strtoupper($row->V_Asset_name)?></td>
								<td data-title="Department :"><?=$row->v_UserDeptDesc ?></td>
								<td data-title="Total :"><?= $row->aTotal ?></td>
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