<tr class="ui-left_web">
	<?= ($this->input->get('tab') == '0') ? '<td class="ui-highlight" align="center" colspan="0" style=" height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style=" height:30px; width:25%;">'?>
	<?php echo anchor ('Procurement/e_pr?tab=0'.'&y='.$year.'&m='.$month, 'MRIN TO PO Approval'); ?></td>
	<!---<?= ($this->input->get('tab') == '1') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:25%;">'?>
	<?php echo anchor ('Procurement/e_pr?tab=1'.'&y='.$year.'&m='.$month, 'Purchase Request'); ?></td> -->
	<?= ($this->input->get('tab') == '2') ? '<td class="ui-highlight" align="center" colspan="0" style="width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:25%;">'?>
	<?php echo anchor ('Procurement/e_pr?tab=2'.'&y='.$year.'&m='.$month, 'Purchase Order'); ?></td>
</tr>
<tr class="ui-middle-color">
	<td class="ui-left_mobile">
<?php


if (!is_null($this->input->get('desk'))){
	/*if ($this->input->get('desk') == 0){ 
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		//echo anchor ('contentcontroller/qap3','<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo $tulis;
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		echo anchor ('contentcontroller/desk?deskno='.$this->input->get('deskno').'&desk=1'.'&y='.$year.'&m='.$month,'<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
	elseif($this->input->get('desk') == 1){
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		echo anchor ('contentcontroller/desk?deskno='.$this->input->get('deskno').'&desk=0'.'&y='.$year.'&m='.$month,'<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo $tulis;
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		echo anchor ('contentcontroller/desk?deskno='.$this->input->get('deskno').'&desk=2'.'&y='.$year.'&m='.$month,'<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
	elseif($this->input->get('desk') == 2){
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		echo anchor ('contentcontroller/desk?deskno='.$this->input->get('deskno').'&desk=1'.'&y='.$year.'&m='.$month,'<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo $tulis;
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		//echo anchor ('contentcontroller/desk?deskno='.$this->input->get('deskno').'&desk=3'.'&y='.$year.'&m='.$month,'<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}*/
	if( $this->input->get('tab') == 0 ){
		echo "<div class='divmenu'>";
		echo "<div class='divmenuleft'>";
		echo "</div>";
		echo $tulis;
		echo "<div class='divmenuright'>";
		echo anchor ('Procurement/e_pr?tab=1'.'&y='.$year.'&m='.$month, '<span class="icon-arrow-right"></span>');
		echo "</div>";
		echo "</div>";
	}elseif( $this->input->get('tab') == 1 ){
		echo "<div class='divmenu'>";
		echo "<div class='divmenuleft'>";
		echo anchor ('Procurement/e_pr?tab=0'.'&y='.$year.'&m='.$month, '<span class="icon-arrow-left"></span>');
		echo "</div>";
		echo $tulis;
		echo "<div class='divmenuright'>";
		echo anchor ('Procurement/e_pr?tab=2'.'&y='.$year.'&m='.$month, '<span class="icon-arrow-right"></span>');
		echo "</div>";
		echo "</div>";
	}elseif( $this->input->get('tab') == 2 ){
		echo "<div class='divmenu'>";
		echo "<div class='divmenuleft'>";
		echo anchor ('Procurement/e_pr?tab=1'.'&y='.$year.'&m='.$month, '<span class="icon-arrow-left"></span>');
		echo "</div>";
		echo $tulis;
		echo "<div class='divmenuright'>";
		echo "</div>";
		echo "</div>";
	}
}
?>
	</td>
</tr>


			