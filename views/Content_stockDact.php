<?php echo form_open('contentcontroller/workorderlist_update?wrk_ord='.$this->input->get('wrk_ord'));?>

<style>
		
				
					/** page structure **/
					 .paginatediv{
					  text-align:center;
					  width: 100%;
					  display: block;}
					.paginate {
					  display: block;
					  width: 50%;
					  font-size: 12px;
					  margin: 0 auto;
					}
					/** clearfix **/
					.clearfix:after { content: "."; display: block; clear: both; visibility: hidden; line-height: 0; height: 0; }
					.clearfix { display: inline-block; }
					.paginate.pag2 { /* second page styles */ }
					 
					.paginate.pag2 li { font-weight: bold; list-style-type:none;  }
					 
					.paginate.pag2 li a {
					  font-size:12px;
					  display: block;
					  float: left;
					  color: #585858;
					  text-decoration: none;
					  padding: 6px 11px;
					  margin-right: 6px;
					  border-radius: 3px;
					  border: 1px solid #ddd;
					  background-color: #eee;
					  background-image: -webkit-gradient(linear, left top, left bottom, from(#f7f7f7), to(#eee));
					  background-image: -webkit-linear-gradient(top, #f7f7f7, #eee);
					  background-image: -moz-linear-gradient(top, #f7f7f7, #eee);
					  background-image: -ms-linear-gradient(top, #f7f7f7, #eee);
					  background-image: -o-linear-gradient(top, #f7f7f7, #eee);
					  background-image: linear-gradient(top, #f7f7f7, #eee);
					  -webkit-box-shadow: 2px 2px 4px -1px rgba(0,0,0, .55);
					  -moz-box-shadow: 2px 2px 4px -1px rgba(0,0,0, .55);
					  box-shadow: 2px 2px 4px -1px rgba(0,0,0, .55);
					}
					.paginate.pag2 li a:hover {
					  color: #3280dc;
					}
					 
					.paginate.pag2 li.single, .paginate.pag2 li.current {
					  display: block;
					  float: left;
					  padding: 6px 11px;
					  padding-top: 8px;
					  margin-right: 6px;
					  border-radius: 3px;
					  color: #676767;
					}
				</style>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
			<table class="ui-content-middle-menu-workorder" border="0" height="" width="95%" align="center">
			<?php include 'content_stock_d.php';?>
			<tr class="ui-color-contents-style-1 ui-left_web">
				<td colspan="11" height="40px" style="padding-left:10px; color:black;">Stock Details</td>
			</tr>
			<tr class="ui-color-contents-style-1">
				<td colspan="11" valign="top" class="pd-bttm">
					<table width="98%" class="ui-content-middle-menu-workorder" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new" valign="top"><span style="float: left; margin-top:8px; font-weight: bold;">Stock Activity</span><span class="ui-left_web" style="float: left; margin-top:8px; margin-left:8px; font-weight: bold; width: 20%;"></span></td>
						</tr>						
						<tr >
							<td class="ui-desk-style-table">
			                 <table class="ui-content-middle-menu-workorder3 ui-left_web" width="100%" height="25px">
									<tr class="ui-menu-color-header" style="color:white; font-weight:bold;">
										<th colspan="8">Entire Transaction</th>
									</tr>
									<tr class="ui-menu-color-header" style="color:white; font-weight:bold;">
										<th>No</th>
										<th>Transaction Date</th>
										<th>Documentation</th>
										<th>User</th>
										<th>In</th>
										<th>Out</th>
										<th>Balance</th>
										<th>Remark</th>
									</tr>
									<?php foreach ($assetrec as $key): ?>
									<?php $numrow=1;foreach ($key as $rows): ?>
									<?php if ($rows->ItemCode == $this->input->get('id')) { ?>
									<?php
									is_numeric($rows->Qty_Before) ? $Qty_Before = $rows->Qty_Before : $Qty_Before = 0;
									is_numeric($rows->Qty_Taken) ? $Qty_Taken = $rows->Qty_Taken : $Qty_Taken = 0;
									is_numeric($rows->Qty_Add) ? $Qty_Add = $rows->Qty_Add : $Qty_Add = 0;
									$Qty_Bal = $Qty_Before + $Qty_Add - $Qty_Taken;
									?>
									
									<tr class="" style="color:black; font-size:12px; text-align:center;">
										<td><?= $numrow ?></td>
										<td><?= date_format(new DateTime($rows->Time_Stamp), 'd-m-Y H:i:s') ?></td>
										<td><?= $rows->Related_WO ?></td>
										<td><?= $rows->Last_User_Update ?></td>
										<td><?= $Qty_Add ?></td>
										<td><?= $Qty_Taken ?></td>
										<td><?= $Qty_Bal ?></td>
										<td><?= $rows->Remark ?></td>
									</tr>
									<?php } ?>
									
									<?php $numrow++ ?>
									<?php endforeach; ?>
									<?php endforeach; ?>
								</table>
				
				<div class="paginatediv">
					  <ul class="paginate pag2 clearfix">
					  	<?php if ($rec[0]->jumlah > $limit){ ?>
					  	<li class="single">Page <?=($this->input->get('p') ? $this->input->get('p') : 1)?> of <?php echo $page?></li>
					  	<li><a href="?tabIndex=1&p=<?php echo $page-1?>&id=<?php echo $this->input->get('id')?>">Prev</a></li>
		              	<?php for ($i=1;$i<=$page;$i++){ ?>
		              	<li><a href="?tabIndex=1&p=<?php echo $i?>&id=<?php echo $this->input->get('id')?>"><?=$i?></a></li>
		              	<?php } ?>
		              	<li><a href="?tabIndex=1&p=<?php echo $page?>&id=<?php echo $this->input->get('id')?>">Next</a></li>
		              	<?php } ?>
					
					  </ul>
					</div>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<?php  echo form_hidden('wrk_ord',$this->input->get('wrk_ord')); ?>
	</div>
</div>
<?php echo form_close(); ?>