<script>
function fToggle(elementId) {
  $('.loc'+elementId).load("<?php echo base_url ('index.php/ajaxloc') ?>?dpt="+elementId.trim());
 var e = document.getElementById(elementId);
  //alert(e);
  var id = (elementId);
  //console.log(id);
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
	<?php include 'content_tab_assets.php';?>
	<div class="content-workorder">
	<div class="wrap">
		<table class="ui-content-middle-menu-workorder" border="0"  width="90%" align="center" >
			<?php include 'content_tab_location_menu.php';
			$sum = 0;
			$sumx = 0;
			foreach ($dept as $item) {
    	$sum += $item->Totalloc;
			$sumx += 1;
			}
			?>
			<tr class="ui-color-contents-style-1">
				<td colspan="3" class="assets-headear">Location Catalog By Department Name (Total of <?=$sum?> location/s from <?=$sumx?> department/s)</td>
			</tr>			
			<?php $numrow=1; foreach($dept as $row):?>        			
	    	<tr  class="asset-ajax item">
				<td colspan="3">
				<div class="asset1"> 
					<span class='icon icon-plus' id="l-<?=$row->v_UserDeptCode?>"></span>
				</div>
				<div class="asset2">
					<a href="javascript:void(0);" onclick="javascript:fToggle('<?=$row->v_UserDeptCode?>');"><b><?=strtoupper($row->v_userdeptdesc)?></b></a>&nbsp;&nbsp;&nbsp;<?=$row->v_UserDeptCode?>&nbsp;&nbsp;&nbsp;<span class="FieldLabel">(<?=$row->Totalloc?>)</span>
				</div>
				<div id="<?=$row->v_UserDeptCode?>" class="loc<?=$row->v_UserDeptCode?>" style="display: none; margin-left:20px; width:98%;"></div>
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
</div>
<?php include 'content_jv_popup.php';?>
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
