				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>No of Request</th>
								<th>Aging</th>
							</tr>
						</thead>
						<tbody>
							
							<?php $nom = 1;  foreach($wo_byage as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="No of Request :"><?=$row->nowo ?></td>
								<td data-title="Aging :"><?=strtoupper($row->monthe)?> months</td>
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