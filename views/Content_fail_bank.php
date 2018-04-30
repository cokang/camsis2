<div class="ui-middle-screen">
	<div class="content-workorder">
		<div class="div-p">&nbsp;</div>
		<div class="ui-main-form">
		<?php include 'content_asset_tab.php';?>			
			<div class="ui-main-form-5">
				<div class="middle_d2">
					<table width="100%" class="ui-content-form-reg" style="">
						<tr class="ui-color-contents-style-1" height="30px">
							<td colspan="2" class="ui-header-new">
							<b><span class="textmenu" style="float:left;">Fail Bank</span></b>
							<span class="textmenu1" style="float:right;padding-top:0px;">
							<span onclick="javascript:fbank('<?=$this->input->get('asstno')?>','<?=0?>')"><button type="button" class="btn-button btn-primary-button">Add</button></span>
							<!--<a href="#" onclick="fbank(this)" value=""><button type="button" class="btn-button btn-primary-button">Add</button><a/>-->
							</span>
							</td>
						</tr>
						<tr >
							<td class="ui-desk-style-table">
							<table class="ui-content-form" id="no-more-tables" width="100%" border="0">
								<tr>	
									<tr>	
										<th >Document Name</th>
										<th >Registration Date</th>
										<th >Registered By</th>
										<th></th>
										<th></th>
									</tr>
									<?php $numrow = 1; foreach ($record as $row):?>
									<tr align="center" <?= ($numrow%2==0) ?  'class="tr_color"' :  '' ?> >
									<td><a href="#" target="pdf-frame" onclick="javascript:fpdf('<?=isset($row->doc_id) ? $row->doc_id : ''?>')"><?=isset($row->Doc_name) ? $row->Doc_name : ''?></a></td>
									<td><?=isset($row->Date_time_stamp) ? date("d-m-Y",strtotime($row->Date_time_stamp)) : ''?></td>
									<td><?=isset($row->v_UserName) ? $row->v_UserName : ''?></td>
									<td><a href="#" onclick="javascript:fbank('<?=$this->input->get('asstno')?>','<?=$row->doc_id?>')" >Change</a></td>
									<td><?php echo anchor ('contentcontroller/del_filebank?assetno='.$this->input->get('asstno').'&docid='.$row->doc_id,'Delete') ?></td>
									<?php $numrow++ ?>
									</tr>
									<?php endforeach;?>
								</tr> 
								</table>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'content_jv_popup.php';?>
 <script>
 function fpdf(a){
			//var parent = a.getAttribute('value');
		winProp = 'width=1200,height=400,left=' + ((screen.width - 600) / 2) +',top=' + ((screen.height - 400) / 2) + ',menubar=no, directories=no, location=no, scrollbars=yes, statusbar=no, toolbar=no, resizable=no';
		Win = window.open('../../file_bank/'+a+'.pdf', '', winProp);
		Win.window.focus();
		}
</script>		
</body>
</html>
