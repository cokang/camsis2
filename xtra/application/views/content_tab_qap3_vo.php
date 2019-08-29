<tr class="ui-left_web">
			
		<?= ($this->input->get('vo') == '0') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:25%;">' ?>
		<?php echo anchor ('contentcontroller/qap3_wo?&tab=2&vo=0', 'Work Orders With SIQ'); ?></td>


		<?= ($this->input->get('vo') == '1') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:25%;">' ?>
		<?php echo anchor ('contentcontroller/qap3_wo_n_SIQ?&tab=2&vo=1', 'Work Orders With No SIQ'); ?></td>



		<?= ($this->input->get('vo') == '2') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:25%;">' ?>
		<?php echo anchor ('contentcontroller/qap3_wo_order?&tab=2&vo=2', 'Excluded Work Orders'); ?></td>
</tr>
<tr class="ui-color-contents-style-1 nonetr">
	<td colspan="3" height="30px" valign="bottom" style="padding-left:10px; color:black;"></td>
</tr>

<tr class="ui-middle-color">
	<td class="ui-left_mobile">
<?php
if (!is_null($this->input->get('vo'))){
	/*
		if ($this->input->get('vo') == 0){ 
			echo "<table class='ui-mobile-content-header' border='0' align='center'>";
			echo "<tr>";
			echo "<td style='width:20px;'>";
			//echo anchor ('contentcontroller/qap3','<span class="icon-arrow-left"></span>');
			echo "</td>";
			echo "<td align='center'>";
			echo "Work Orders With SIQ";
			echo"</td>";
			echo "<td align='right' style='width:20px;'>";
	 		echo anchor ('contentcontroller/qap3_wo_n_SIQ?&tab=2&vo=1','<span class="icon-arrow-right"></span>');
			echo "</td>"; 
			echo "</tr>";
			echo "</table>";
		}
		elseif($this->input->get('vo') == 1){
			echo "<table class='ui-mobile-content-header' border='0' align='center'>";
			echo "<tr>";
			echo "<td style='width:20px;'>";
			echo anchor ('contentcontroller/qap3_wo?&tab=2&vo=0','<span class="icon-arrow-left"></span>');
			echo "</td>";
			echo "<td align='center'>";
			echo "Work Orders With No SIQ";
			echo"</td>";
			echo "<td align='right' style='width:20px;'>";
			echo anchor ('contentcontroller/qap3_wo_order?&tab=2&vo=2','<span class="icon-arrow-right"></span>');
			echo "</td>"; 
			echo "</tr>";
			echo "</table>";
		}
		elseif($this->input->get('vo') == 2){
			echo "<table class='ui-mobile-content-header' border='0' align='center'>";
			echo "<tr>";
			echo "<td style='width:20px;'>";
			echo anchor ('contentcontroller/qap3_wo_n_SIQ?&tab=2&vo=1','<span class="icon-arrow-left"></span>');
			echo "</td>";
			echo "<td align='center'>";
			echo "Excluded Work Orders";
			echo"</td>";
			echo "<td align='right' style='width:20px;'>";
			//echo anchor ('contentcontroller/visitthree?wrk_ord='.$this->input->get('wrk_ord'). '&vppm=3','<span class="icon-arrow-right"></span>');
			echo "</td>"; 
			echo "</tr>";
			echo "</table>";
		}
	*/
	if( $this->input->get('vo') == 0 ){
		echo "<div class='divmenu'>";
		echo "<div class='divmenuleft'>";
		echo "</div>";
		echo "Work Orders With SIQ";
		echo "<div class='divmenuright'>";
		echo anchor ('contentcontroller/qap3_wo_n_SIQ?&tab=2&vo=1','<span class="icon-arrow-right"></span>');
		echo "</div>";
		echo "</div>";
	}elseif( $this->input->get('vo') == 1 ){
		echo "<div class='divmenu'>";
		echo "<div class='divmenuleft'>";
		echo anchor ('contentcontroller/qap3_wo?&tab=2&vo=0','<span class="icon-arrow-left"></span>');
		echo "</div>";
		echo "Work Orders With No SIQ";
		echo "<div class='divmenuright'>";
		echo anchor ('contentcontroller/qap3_wo_order?&tab=2&vo=2','<span class="icon-arrow-right"></span>');
		echo "</div>";
		echo "</div>";
	}elseif( $this->input->get('vo') == 2 ){
		echo "<div class='divmenu'>";
		echo "<div class='divmenuleft'>";
		echo anchor ('contentcontroller/qap3_wo_n_SIQ?&tab=2&vo=1','<span class="icon-arrow-left"></span>');
		echo "</div>";
		echo "Excluded Work Orders";
		echo "<div class='divmenuright'>";
		echo "</div>";
		echo "</div>";
	}
}
?>
</td>
</tr>