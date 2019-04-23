<script>
	Number.prototype.format = function(n, x) {
	//alert(Number.prototype.format);
    var re = '(\\d)(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
    return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$1,');
};
function fToggle(elementId) {
//alert(elementId);
 $('.asst'+elementId).load("<?php echo base_url ('index.php/ajaxasset') ?>?ast="+elementId.trim());
 var e = document.getElementById(elementId);
  var id = (elementId);
  if (false == $(e).is(':visible')) {
    $(e).slideToggle('slow');
    $('span.icon[id="l-'+id+'"]').toggleClass("icon-plus icon-minus");
  }
  else {
    $(e).slideToggle('slow');
    $('span.icon[id="l-'+id+'"]').toggleClass("icon-plus icon-minus");
  }
};           
</script>
<div class="ui-middle-screen">
<table class="table-middle-screen-2" border="0">
<tr>
    <td valign="top" style="width: 13%; border-style:none;";>
	<?php include 'content_tab_assets.php';?>
	</td>
	<td  style="width: 2%; border-style: none;"></td>
	<td valign="top" style="width: 70%;">
	<div class="content-workorder">
		<div class="wrap">
		<table class="ui-content-middle-menu-workorder" border="0"  width="90%" align="center" >
			<?php include 'content_tab_asset_menu.php';
			$sum = 0;
			$sumx = 0;
			foreach ($asset_cat as $item) {
			$sum += $item->aTotal;
			$sumx += 1;
			}
			?>
			<tr class="ui-color-contents-style-1">
				<td colspan="3" class="assets-headear">Asset Catalog By Equipment Name <div class="sk_ttol">( Total of <?=$sum?> asset/s from <?=$sumx?> type/s of equipment )</div></td>
			</tr>			
			<?php $numrow=1; foreach($asset_cat as $row):?>
			        			
	    	<tr class="asset-ajax item">
				<td colspan="3">
				<div class="asset1"> 
					<span class='icon icon-plus' id="l-<?=$row->V_Equip_code?>"></span>
				</div>
				<div class="asset2">
				<a href="javascript:void(0);" onclick="javascript:fToggle('<?=$row->V_Equip_code?>');"><b><?=strtoupper($row->V_Asset_name)?></b></a>&nbsp;&nbsp;&nbsp;<?=$row->V_Equip_code?>&nbsp;&nbsp;&nbsp;<span class="FieldLabel">(<?=$row->aTotal?>)</span>
				</div>
				</td>				
			</tr>
			<tr class="asset-ajax item">
				<td colspan="3">
					<div id="<?=$row->V_Equip_code?>" class="asst<?=$row->V_Equip_code?>" style="display: none; margin-left:20px; width:98%;"></div>
				</td>
			</tr>	
			<?php $numrow++ ?>			
    		<?php endforeach;?>
			
			<tr class="ui-header-new" style="height:5px;">
				<td align="center" colspan="4">
				<?php if (isset($next)): ?>
					<div class="nav">
						<a href='?p=<?php echo $next?>&numrow=<?php echo $numrow?>'>Next</a>
					</div>
			<?php endif?>
				</td>
			</tr>					
		</table>
		</div>
	</div>	
	</td>
	</tr>
	</table>	
</div>

<script language="javascript" type="text/javascript">
	function fToggle2(elementId) {
		var e = document.getElementById(elementId);
		if ( !e.style.display || e.style.display != "none" ) {
			e.style.display = "none";
			 
		} else {
			e.style.display = "block";
			
		}
	}
</script>
<script type="text/javascript">
    $(document).ready(function() {
	//alert('test');
    	// Infinite Ajax Scroll configuration
        jQuery.ias({
            container : '.wrap', // main container where data goes to append
            item: '.item', // single items
            pagination: '.nav', // page navigation
            next: '.nav a', // next page selector
            loader: '<img src="<?php echo base_url(); ?>images/ajax-loader.gif"/>', // loading gif
            triggerPageThreshold: <?php echo ($result / $limit) ?>  // show load more if scroll more than this
        });
    });
</script>