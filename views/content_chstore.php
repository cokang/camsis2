<?php $i=6;$r=0;?>
<div class="ui-middle-screen">
	
	<div class="content-workorder">
		<table class="ui-content-middle-menu-workorder" border="0"  width="90%" align="center" >
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="11"><b>Please Choose Store</b></td>
			</tr>
			<tr class="ui-color-contents-style-1">
		
			<td colspan="3" class="assets-headear"><?php foreach($hospital as $apa){?>
					<div class="kotak2">

						<!-- bazli edit -->
			
						<?php echo anchor ($this->uri->segment(1).'/'.$this->uri->segment(2).'?id='.$apa->v_HospitalCode,'<center><img src="'. base_url() .'images/hospital.png" alt="" style="width: 50px; height: 50px; padding: 10px;"/><br><span class="caption">&nbsp;&nbsp;'.$apa->v_HospitalCode.'&nbsp;&nbsp;</span></center>'); ?>						
					</div>
			<?php } ?>
					</td>
			</tr>
			  			
	    <tr class="ui-color-contents-style-1" style="height:10px;">
				<td align="center" colspan="4">
				</td>
			</tr>
				
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="4">
				</td>
			</tr>					
		</table>
	</div>		
</div>
