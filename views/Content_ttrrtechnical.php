				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>No of Request</th>
								<th>Technical staff id</th>
							</tr>
						</thead>
						<tbody>
							
							<?php $nom = 1;  foreach($wo_bypersonnel as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="No of Request :"><?=$row->bil ?></td>
								<td data-title="Technical staff id :"><?=strtoupper($row->v_PersonalName)?> </td>
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