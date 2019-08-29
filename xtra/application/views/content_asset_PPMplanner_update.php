<?php echo form_open('contentcontroller/assetPPMplannerupdatesv');?>
<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%" border="0">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="10"><b>Update PPM Planner</b></td>
			</tr>
			<tr height="20px">
				<td colspan="10">
					<span style="float:right;"> 
						<table style="color:black;">
							<tr>
								<td align="right">Frequency :</td>
								<td align="right"><?=isset($records[0]->v_jobtype) ? $records[0]->v_jobtype : ''?></td>
							</tr>
							<tr>
								<td align="right">Planned Weeks :</td>
								<td align="right"><?=isset($records[0]->v_weeksch) ? $records[0]->v_weeksch : ''?></td>
							</tr>
						</table>
					</span>
				</td>
			</tr>
			
			<tr style="background:#B3130A;">
				<td colspan="" style="text-align:left;border:0px solid;"><a href="?y=<?php echo $year['byear']; ?>&assetno=<?=$this->input->get('assetno')?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a></td>
				<td colspan="8" style="text-align:center;border:0px solid;" width=""><b><?php echo $year['theyear']; ?></b></td>
				<td colspan="" style="text-align:right;border:0px solid;"><a href="?y=<?php echo $year['fyear']; ?>&assetno=<?=$this->input->get('assetno')?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a></td>
			</tr>
			<tr align="center">
				<td style="width:60px;">WEEK</td>
				<td style="width:60px;">MON</td>
				<td style="width:60px;">TUE</td>
				<td style="width:60px;">WED</td>
				<td style="width:60px;">THU</td>
				<td style="width:60px;">FRI</td>
				<td style="width:60px;">SAT</td>
				<td style="width:60px;">SUN</td>
				<td style="width:100px;">WORK ORDER</td>
				<td style="width:100px;">STATUS</td>
			</tr>
			
			<!--<tr align="center" style="color:black;">
				<td ><b>1</b></td>				
				<td>30</td>
				<td>31</td>
				<td><b>1 JAN</b></td>
				<td>2</td>
				<td>3</td>
				<td>4</td>
				<td>5</td>
				<td></td>
				<td></td>
			</tr>-->
			
			<?php foreach($kalender as $row):
	echo $row; 			 
  endforeach;?>	
			
			
		
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="10" style="">
					<input type="submit" class="btn-button btn-primary-button" name="mysubmit" value="Save" style="width:200px;"/>
				</td>
			</tr>
		</table>				
	</div>
</div>

<?php echo form_hidden('n_asset_no',$asset_no);?>
<?php echo form_hidden('n_year',$year['theyear']);?>
<?php echo form_hidden('assetjt',$this->input->get('assetjt'));?>
<?php echo form_close(); ?>
<!--<script language="javascript" type="text/javascript">
	function fWeekToCheckPPM(wk, yy, dd, mm)
		{
		var pilih = 'images/calCellSelectSmall.gif';
		var cellclass = document.getElementById('trweek'+wk).style.background;
		var php_var = "<?php $whey = explode("/", $_SERVER['REQUEST_URI']); echo 'http://' . $_SERVER['HTTP_HOST'] . '/' . $whey[1] . '/' . $whey[2];  ?>";
alert('masuk a');
		document.getElementById('trweek'+wk).style.backgroundImage = "url('"+pilih+"')";
		document.getElementById('trweek'+wk).style.color = "black";
		document.getElementById('two'+wk).innerHTML = "CHECKING...";
		//window.location.href = 'http://localhost/fms/index.php/contentcontroller/ppm_generator';
		window.location.href = php_var + '/ppm_gen_ctrl?wk='+wk+'&y='+yy+'&d='+dd+'&m='+mm;
		//location = "wo-ppmgen-week.asp?wk="+wk+"&y="+yy+"&d="+dd+"&m="+mm ;
		//window.location.href;
		}

	function fWeekToGeneratePPM(wk, yy, dd, mm)
		{
		var pilih = 'images/calCellSelectSmall.gif';
		var cellclass = document.getElementById('trweek'+wk).style.background;
		var php_var = "<?php $whey = explode("/", $_SERVER['REQUEST_URI']); echo 'http://' . $_SERVER['HTTP_HOST'] . '/' . $whey[1] . '/' . $whey[2];  ?>";
		//var newLocation = "www.google.com.my";
alert('masuk b');
		document.getElementById('trweek'+wk).style.backgroundImage = "url('"+pilih+"')";
		document.getElementById('trweek'+wk).style.color = "black";
		document.getElementById('three'+wk).innerHTML = "GENERATING...";
		//location = "wo-ppmgen-week.asp?wk="+wk+"&y="+yy+"&d="+dd+"&m="+mm+"&act=gen" ;
		//alert("Hello! I am an alert box!!" + php_var);
		//window.location.href = 'http://localhost/fms/index.php/contentcontroller/ppm_generator';
		//window.location.href = php_var + '/contentcontroller/ppm_generator';
		window.location.href = php_var + '/ppm_gen_ctrl';
		// window.location = "<?php echo anchor ('contentcontroller/desk/')?>";

		}	

</script>-->
