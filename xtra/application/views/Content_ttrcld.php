				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>Total of Request</th>
								<th>location</th>
								<th>department</th>
							</tr>
						</thead>
						<tbody>
							
							<?php $nom = 1;  foreach($ppmld as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="Total of Requestt :"><?=$row->bil ?></td>
								<td data-title="location :"><?=strtoupper($row->v_location_name)?></td>
								<td data-title="department :"><?=strtoupper($row->v_userdeptdesc)?></td>
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