				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>Total of Request</th>
								<th>Staff id No</th>
							</tr>
						</thead>
						<tbody>
							
							<?php $nom = 1;  foreach($wo_bypersonnel as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="No of Request :"><?=$row->bil ?></td>
								<td data-title="Staff id No :"><?=strtoupper($row->v_Personal1)?> </td>
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