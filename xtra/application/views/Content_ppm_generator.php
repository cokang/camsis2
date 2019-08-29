<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table2" style="border:2px solid #398074; color:black;" cellpadding="4" cellspacing="0" width="80%" border="0">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="6"><b>PPM Generator</b></td>
			</tr>
			<tr height="20px">
				<td colspan="6"> </td>
			</tr>
			<tr style="background:#B3130A; border-radius:5px;">
				<td colspan="" style="text-align:left;border:0px solid; border-top-left-radius:5px;"><a href="?y=2013"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a></td>
				<td colspan="4" style="text-align:center;border:0px solid;" width="500px"><span style="font-size:12px;"><b><?=$tajuk1?></b></span></td>
				<td colspan="" style="text-align:right;border:0px solid; border-top-right-radius:5px;"><a href="?y=2015"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a></td>
			</tr>
			<tr style="font-weight:bold;" class="color_style_1">
				<td colspan="" style="">Asset Number</td>
				<td colspan="" style="">Description</td>
				<td colspan="" style="">Frequency</td>
				<td colspan="" style="">User Department</td>
				<td colspan="" style="">Location</td>
				<td colspan="" style="">Generated Work Order</td>
			</tr>
			<?php  if (isset($ppm_list)) {?>
			<?php foreach($ppm_list as $row):?>        			
	    				<tr> 
								<?php foreach ($row as $key => $final_val)
		{
			print "<td>$final_val</td>";
		}
						?>		
						</tr>			 
    		<?php endforeach;}?>	
			
			<tr style="height:20px;">
				<td align="center" colspan="6" style="">
				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="6" style="">
				</td>
			</tr>
		</table>