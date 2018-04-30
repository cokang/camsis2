<tr class="ui-left_web">
			
		<?= ($this->input->get('asst') == '0') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:25%;">' ?>
		<?php echo anchor ('contentcontroller/qap3_asset?&tab=1&asst=0', 'Asset With SIQ'); ?></td>


		<?= ($this->input->get('asst') == '1') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:25%;">' ?>
		<?php echo anchor ('contentcontroller/qap3_asset_n_SIQ?&tab=1&asst=1', 'Asset With No SIQ'); ?></td>



		<?= ($this->input->get('asst') == '2') ? '<td class="ui-highlight" align="center" colspan="0" style="height:30px; width:25%;">' : '<td class="ui-content-menu-desk-color" align="center" colspan="0" style="width:25%;">' ?>
		<?php echo anchor ('contentcontroller/qap3_asset_E?&tab=1&asst=2', 'Excluded Asset'); ?></td>
</tr>
<tr class="ui-color-contents-style-1 nonetr">
	<td colspan="3" height="30px" valign="bottom" style="padding-left:10px; color:black;"></td>
</tr>
<tr class="ui-middle-color">
	<td class="ui-left_mobile">
<?php
if (!is_null($this->input->get('asst'))){
	if ($this->input->get('asst') == 0){ 
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		//echo anchor ('contentcontroller/qap3','<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo "Asset With SIQ";
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
 		echo anchor ('contentcontroller/qap3_asset_n_SIQ?&tab=1&asst=1','<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
	elseif($this->input->get('asst') == 1){
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		echo anchor ('contentcontroller/qap3_asset?&tab=1&asst=0','<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo "Asset With No SIQ";
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		echo anchor ('contentcontroller/qap3_asset_E?&tab=1&asst=2','<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
	elseif($this->input->get('asst') == 2){
		echo "<table class='ui-mobile-content-header' border='0' align='center'>";
		echo "<tr>";
		echo "<td style='width:20px;'>";
		echo anchor ('contentcontroller/qap3_asset_n_SIQ?&tab=1&asst=1','<span class="icon-arrow-left"></span>');
		echo "</td>";
		echo "<td align='center'>";
		echo "Excluded Asset";
		echo"</td>";
		echo "<td align='right' style='width:20px;'>";
		//echo anchor ('contentcontroller/visitthree?wrk_ord='.$this->input->get('wrk_ord'). '&vppm=3','<span class="icon-arrow-right"></span>');
		echo "</td>"; 
		echo "</tr>";
		echo "</table>";
	}
}
?>
</td>
</tr>