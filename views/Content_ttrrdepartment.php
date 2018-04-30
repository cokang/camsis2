				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>No of Request</th>
								<th>Department description</th>
							</tr>
						</thead>
						<tbody>
							
							<?php $nom = 1;  foreach($wo_bydept as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="Request :"><?=$row->nowo ?></td>
								<td data-title="Department Description :"><?=strtoupper($row->deptname)?></td>
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