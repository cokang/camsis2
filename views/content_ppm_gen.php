<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<div class="div-p">&nbsp;</div>
		<table class="ui-desk-style-table3" cellpadding="4" cellspacing="0" width="80%" border="0">	
			<tr class="ui-color-contents-style-1" height="40px">
				<td class="ui-header-new" colspan="10"><b>PPM Generator</b></td>
			</tr>
			<?php  $whey = explode("/", $_SERVER['REQUEST_URI']); 
			//echo 'http://' . $_SERVER['HTTP_HOST'] . '/' . $whey[1] . '/' . $whey[2]; 
			//for($i = 0; $i < count($whey); $i++){
	//echo "whey $i = $whey[$i] <br />";
//}
			
			
			?>
			<tr height="20px">
				<td colspan="10"> </td>
			</tr>
			
			<tr style="background:#B3130A; border-radius:5px;">
				<td colspan="" style="text-align:left;border:0px solid; border-top-left-radius:5px;"><a href="?y=<?php echo $year['byear']; ?>"><img src="<?php echo base_url(); ?>images/arrow-left2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a></td>
				<td colspan="8" style="text-align:center;border:0px solid;" width="500px"><b><?php echo $year['theyear']; ?></b></td>
				<td colspan="" style="text-align:right;border:0px solid; border-top-right-radius:5px;"><a href="?y=<?php echo $year['fyear']; ?>"><img src="<?php echo base_url(); ?>images/arrow-right2.png" alt="" class="ui-img-icon" style="padding-top:4px; padding-left:4px;"/></a></td>
			</tr>
			<?php //echo $year['theyear']; ?>
			<?php //print_r($year) ?>
			<tr align="center">
				<td style="width:60px;">WEEK</td>
				<td style="width:60px;">MON</td>
				<td style="width:60px;">TUE</td>
				<td style="width:60px;">WED</td>
				<td style="width:60px;">THU</td>
				<td style="width:60px;">FRI</td>
				<td style="width:60px;">SAT</td>
				<td style="width:60px;">SUN</td>
				<td style="width:150px;">GENERATED</td>
				<td style="width:150px;">DETAILS</td>
			</tr>
			
			<!--<tr id="trweek1" class="ppmgenTR" align="center" style="color:black;">
				<td ><b>1</b></td>				
				<td>30</td>
				<td>31</td>
				<td><b>1 JAN</b></td>
				<td>2</td>
				<td>3</td>
				<td>4</td>
				<td>5</td>
				<td id="three1"><a href="javascript:void(0);" onclick="javascript:fWeekToGeneratePPM(1,2014,1,1);"  class="btn-button btn-primary-button">GENERATED</a></td>
				<td id="two1"><a href="javascript:void(0);" onclick="javascript:fWeekToCheckPPM('1',2014,1,1);" class="btn-button btn-primary-button">CHECK</a></td>
			</tr>-->
			
			
	
	<?php foreach($kalender as $row):
	echo $row; 			 
  endforeach;?>	
		
			<tr class="ui-header-new" style="height:40px;">
				<td align="center" colspan="10" style="">
				</td>
			</tr>
		</table>				
	</div>
</div>
<script language="javascript" type="text/javascript">
	function fWeekToCheckPPM(wk, yy, dd, mm)
		{
		var pilih = 'images/calCellSelectSmall.gif';
		var cellclass = document.getElementById('trweek'+wk).style.background;
		var php_var = "<?php $whey = explode("/", $_SERVER['REQUEST_URI']); echo 'http://' . $_SERVER['HTTP_HOST'] . '/' . $whey[1] . '/' . $whey[2];  ?>";
		//var php_var = "<?php $whey = explode("/", $_SERVER['REQUEST_URI']); echo 'http://' . $_SERVER['HTTP_HOST'] . '/' . $whey[1];  ?>";
//alert('masuk a');
		document.getElementById('trweek'+wk).style.backgroundImage = "url('"+pilih+"')";
		document.getElementById('trweek'+wk).style.color = "black";
		document.getElementById('two'+wk).innerHTML = "CHECKING...";
		//window.location.href = 'http://localhost/fms/index.php/contentcontroller/ppm_generator';
		window.location.href = php_var + '/ppm_gen_ctrl?wk='+wk+'&y='+yy+'&d='+dd+'&m='+mm+'&act=';
		//location = "wo-ppmgen-week.asp?wk="+wk+"&y="+yy+"&d="+dd+"&m="+mm ;
		//window.location.href;
		}

	function fWeekToGeneratePPM(wk, yy, dd, mm)
		{
		var pilih = 'images/calCellSelectSmall.gif';
		var cellclass = document.getElementById('trweek'+wk).style.background;
		var php_var = "<?php $whey = explode("/", $_SERVER['REQUEST_URI']); echo 'http://' . $_SERVER['HTTP_HOST'] . '/' . $whey[1] . '/' . $whey[2];  ?>";
		//var php_var = "<?php $whey = explode("/", $_SERVER['REQUEST_URI']); echo 'http://' . $_SERVER['HTTP_HOST'] . '/' . $whey[1];  ?>";
		//var newLocation = "www.google.com.my";
//alert('masuk b');
		document.getElementById('trweek'+wk).style.backgroundImage = "url('"+pilih+"')";
		document.getElementById('trweek'+wk).style.color = "black";
		document.getElementById('three'+wk).innerHTML = "GENERATING...";
		//location = "wo-ppmgen-week.asp?wk="+wk+"&y="+yy+"&d="+dd+"&m="+mm+"&act=gen" ;
		//alert("Hello! I am an alert box!!" + php_var);
		//window.location.href = 'http://localhost/fms/index.php/contentcontroller/ppm_generator';
		//window.location.href = php_var + '/contentcontroller/ppm_generator';
		window.location.href = php_var + '/ppm_gen_ctrl?wk='+wk+'&y='+yy+'&d='+dd+'&m='+mm+'&act=gen';
		// window.location = "<?php echo anchor ('contentcontroller/desk/')?>";

		}	

</script>
