				<div class="tbl-container">
					<table id="tbl-responsive">
						<thead>
							<tr>
								<th>No</th>
								<th>Total of Request</th>
								<th>Outstanding within time</th>
							</tr>
						</thead>
						<tbody>
							
							<?php $nom = 1;  foreach($ppmonoff as $row):?>
			       
						 <tr>
								<td data-title="No :"><?=$nom++?></td>
								<td data-title="Total of Requestt :"><?=$row->bil ?></td>
								<td data-title="Outstanding within time :"><?=strtoupper($row->DAYSS)?> Days </td>
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