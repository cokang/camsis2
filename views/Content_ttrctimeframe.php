				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>Total of Request</th>
								<th>Completed Status</th>
							</tr>
						</thead>
						<tbody>
							
							<?php $nom = 1;  foreach($ppmon as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="Total of Requestt :"><?=$row->bil ?></td>
								<td data-title="Completed Status :"><?=strtoupper($row->v_Wrkordstatus)?> </td>
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