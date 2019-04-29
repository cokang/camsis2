<style type="text/css">
	.tblexcel, .tblexcel tr, .tblexcel tr th, .tblexcel tr td{
	 width: 56%;
	 text-align: left;
	 margin-left: 0px;
	 color: black;
	 padding-top: 0PX;
	}
	.tbltitle, .tbltitle tr {
     height: 10px;
     text-align: center;
     width: 50%;
     color: black;
     margin-left: 25%; 
     align-items: center;
     font-size: 25px;
     font-weight: 2px;
	}
	.ui-icon2 {
    width: 50px;
    height: 50px;
    vertical-align: middle;
 
	}
	.ui-color-contents-style{
		opacity: 0.9;
		filter: alpha(opacity=90);
		-moz-opacity: 0.9;
		-khtml-opacity: 0.9;
		position: relative;
		width: 100%;
		z-index: 1;
	}

	.ui-color-contents-style tr td h1 {
		font-weight: bold;
		text-align: center;
		color: black;
		height: 10px;
		float: left;
	}
	.ui-color-contents-style tr{
     text-align: center;
		color: black;
	}

</style>
<div class="ui-middle-screen">
	<div class="content-workorder">
	<table class="ui-content-middle-menu-workorder" border="0" width="80%" height="80%" align="center">
			<table class="tbltitle">
			<tr>
		    <td><h1 style="height: 20px;">ASIS DATA UPLOAD</a></h1></td>
			</tr>
			<tr>
			<td>ASIS Upload here</td>
			</tr>
			</table>
			<table class="ui-color-contents-style">
			<form id="bems_service_request_form" method="post" enctype="multipart/form-data">
			<tr>
				<td><h1>BEMS Service Request Upload</h1></td>
			</tr>
			<tr>
		    	<td style="float: left;">Choose the required CSV file and click Process File tu upload</td>
		    </tr>
		    <table class="tblexcel">
		    <tr>
		    	<td><input type="file" name="bems_service_request" id="bems_service_request" required accept=".xls, .xlsx, .csv"/></td>
		    	<td><input type="submit" id="import_bems" name="import_bems" value="Process File"  /></td>
		    </tr>
		    </table>	
		    </form>
</table>
<table class="ui-color-contents-style">
			<form id="bems_service_request_form" method="post" enctype="multipart/form-data">
			<tr>
				<td><h1 style="float: left;">Service Work (Unscheduled_and_Others) Upload</h1></td>
			</tr>
			<tr>
		    	<td style="float: left;">Choose the required CSV file and click Process File tu upload</td>
		    </tr>
		    <table class="tblexcel">
		    <tr>
		    	<td><input type="file" name="bems_service_request" id="bems_service_request" required accept=".xls, .xlsx, .csv"/></td>
		    	<td><input type="submit" id="import_bems" name="import_bems" value="Process File"  /></td>
		    </tr>
		    </table>	
		    </form>
</table>
<table class="ui-color-contents-style">
			<form id="bems_service_request_form" method="post" enctype="multipart/form-data">
			<tr>
				<td><h1 style="float: left;">Equipment_XX_XXX_XXXX Upload</h1></td>
			</tr>
			<tr>
		    	<td style="float: left;">Choose the required CSV file and click Process File tu upload</td>
		    </tr>
		    <table class="tblexcel">
		    <tr>
		    	<td><input type="file" name="bems_service_request" id="bems_service_request" required accept=".xls, .xlsx, .csv"/></td>
		    	<td><input type="submit" id="import_bems" name="import_bems" value="Process File"  /></td>
		    </tr>
		    </table>	
		    </form>
			</table>
		</table>
	</div>
</div>
	</body>
		</html>

<script>
$(document).ready(function(){

	$('#import_form').on('submit', function(event){
		event.preventDefault();
		var formData = new FormData($(this)[0]);
		
		$.ajax({
			url:"<?php echo site_url(); ?>/excel_import/import_jobresponse",
			type: 'POST',
			data: formData,
			async: false,
			cache: false,
			contentType: false,
			enctype: 'multipart/form-data',
			processData: false,
			success:function(data){
				$('#selectedfile').val('');
			}
		})
	});


	$('#bems_service_request_form').on('submit', function(event){
		event.preventDefault();
		start_process();
		var formData = new FormData($(this)[0]);
		
		$.ajax({
			url:"<?php echo site_url(); ?>/excel_import/import_bems_service",
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false,
			cache: false,
			dataType: "json",
			enctype: 'multipart/form-data',
			success:function(data){
				console.log(data.msg);
				if(data.status==true){
					$('#bems_service_request').val('');
					alert(data.msg);
				}else{
					alert("import failed. " + data.msg);
				}
				end_process();
			}
		})
	});

	$('#service_WO_form').on('submit', function(event){
		event.preventDefault();
		start_process();
		var formData = new FormData($(this)[0]);
		
		$.ajax({
			url:"<?php echo site_url(); ?>/excel_import/import_service_WO",
			type: 'POST',
			data: formData,
			processData: false,
			contentType: false,
			cache: false,
			dataType: "json",
			enctype: 'multipart/form-data',
			success:function(data){
				console.log(data);
				if(data.status==true){
					$('#service_WO').val('');
					alert("Import success. "+data.row+" row has inserted into database");
				}else{
					alert("import failed. " + data.msg);
				}
				end_process();
			}
		})
	});

	$('#equipment_form').on('submit', function(event){
		event.preventDefault();
		start_process()
		var formData = new FormData($(this)[0]);
		
		$.ajax({
			url:"<?php echo site_url(); ?>/excel_import/import_equipment",
			type: 'POST',
			data: formData,
			cache: false,
			contentType: false,
			dataType: "json",
			enctype: 'multipart/form-data',
			processData: false,
			success:function(data){
				end_process();
				console.log(data);
				if(data.status==true){
					$('#equipment').val('');
					alert("Import success. "+data.row+" row has import into database");
				}else{
					alert("import failed. "+ data.msg);
				}
				end_process();
			}
		});
	});

});


  function start_process(){
	$("#myModal").modal({
		backdrop: 'static',
		show: true,
	});
}

function end_process(){
	$("#myModal").modal("hide");
}
</script>
