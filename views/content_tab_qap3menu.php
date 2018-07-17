<tr class="ui-left_web">
			
		<?= ($this->input->get('siq') == '0') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style=" width:25%;">' ?>
		<?php echo anchor ('contentcontroller/qap3?y='.$year.'&m='.$month.'&siq=0', 'Summary'); ?></td>


		<?= ($this->input->get('siq') == '1') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:25%;">' ?>
		<?php echo anchor ('contentcontroller/qap3_PPM?y='.$year.'&m='.$month.'&siq=1', 'SIQ PPM'); ?></td>



		<?= ($this->input->get('siq') == '2') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:25%;">' ?>
		<?php echo anchor ('contentcontroller/qap3_SIQ?y='.$year.'&m='.$month.'&siq=2', 'SIQ Uptime'); ?></td>
</tr>
<tr>
	<td style="background:#398074;"  class="ui-left_mobile">
		<?php
		if (!is_null($this->input->get('siq'))){
			// if ($this->input->get('siq') == 0){ 
			// 	echo "<table class='ui-mobile-content-header' border='0' align='center' width='100%'>";
			// 	echo "<tr>";
			// 	echo "<td style='width:20px;'>";
			// 	//echo anchor ('contentcontroller/qap3','<span class="icon-arrow-left"></span>');
			// 	echo "</td>";
			// 	echo "<td align='center'>";
			// 	echo 'Summary';
			// 	echo"</td>";
			// 	echo "<td align='right' style='width:20px;'>";
			// 	echo anchor ('contentcontroller/qap3_PPM?y='.$year.'&m='.$month.'&tab=0&siq=1','<span class="icon-arrow-right"></span>');
			// 	echo "</td>"; 
			// 	echo "</tr>";
			// 	echo "</table>";
			// }
			// elseif($this->input->get('siq') == 1){
			// 	echo "<table class='ui-mobile-content-header' border='0' align='center' width='100%'>";
			// 	echo "<tr>";
			// 	echo "<td style='width:20px;'>";
			// 	echo anchor ('contentcontroller/qap3?y='.$year.'&m='.$month.'&tab=0&siq=0','<span class="icon-arrow-left"></span>');
			// 	echo "</td>";
			// 	echo "<td align='center'>";
			// 	echo 'SIQ PPM';
			// 	echo"</td>";
			// 	echo "<td align='right' style='width:20px;'>";
			// 	echo anchor ('contentcontroller/qap3_SIQ?y='.$year.'&m='.$month.'&tab=0&siq=2','<span class="icon-arrow-right"></span>');
			// 	echo "</td>"; 
			// 	echo "</tr>";
			// 	echo "</table>";
			// }
			// elseif($this->input->get('siq') == 2){
			// 	echo "<table class='ui-mobile-content-header' border='0' align='center' width='100%'>";
			// 	echo "<tr>";
			// 	echo "<td style='width:20px;'>";
			// 	echo anchor ('contentcontroller/qap3_PPM?y='.$year.'&m='.$month.'&tab=0&siq=1','<span class="icon-arrow-left"></span>');
			// 	echo "</td>";
			// 	echo "<td align='center'>";
			// 	echo 'SIQ Uptime';
			// 	echo"</td>";
			// 	echo "<td align='right' style='width:20px;'>";
			// 	//echo anchor ('contentcontroller/assetsC?assets=1','<span class="icon-arrow-right"></span>');
			// 	echo "</td>"; 
			// 	echo "</tr>";
			// 	echo "</table>";
			// }
			if( $this->input->get('siq') == 0 ){
				echo "<div class='divmenu'>";
				echo "<div class='divmenuleft'>";
				echo "</div>";
				echo "Summary";
				echo "<div class='divmenuright'>";
				echo anchor ('contentcontroller/qap3_PPM?y='.$year.'&m='.$month.'&tab=0&siq=1','<span class="icon-arrow-right"></span>');
				echo "</div>";
				echo "</div>";
			}elseif( $this->input->get('siq') == 1 ){
				echo "<div class='divmenu'>";
				echo "<div class='divmenuleft'>";
				echo anchor ('contentcontroller/qap3?y='.$year.'&m='.$month.'&tab=0&siq=0','<span class="icon-arrow-left"></span>');
				echo "</div>";
				echo "SIQ PPM";
				echo "<div class='divmenuright'>";
				echo anchor ('contentcontroller/qap3_SIQ?y='.$year.'&m='.$month.'&tab=0&siq=2','<span class="icon-arrow-right"></span>');
				echo "</div>";
				echo "</div>";
			}elseif( $this->input->get('siq') == 2 ){
				echo "<div class='divmenu'>";
				echo "<div class='divmenuleft'>";
				echo anchor ('contentcontroller/qap3_PPM?y='.$year.'&m='.$month.'&tab=0&siq=1','<span class="icon-arrow-left"></span>');
				echo "</div>";
				echo "SIQ Uptime";
				echo "<div class='divmenuright'>";
				echo "</div>";
				echo "</div>";
			}
		}
		?>
	</td>
</tr>