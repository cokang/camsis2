<!DOCTYPE html>
<html>
	<head>
		<title>ASIS DATA UPLOAD</title>
		<link rel="stylesheet" href="https://getbootstrap.com/docs/3.3/dist/css/bootstrap.min.css" />
		<script src="<?php echo base_url(); ?>js/jquery1.min.js"></script>
		<script type="text/javascript" src="https://getbootstrap.com/docs/3.3/dist/js/bootstrap.min.js"></script>
		<style type="text/css">
			.start_process{
				height: 300px;
				background: url("../images/pIkfp.gif") no-repeat fixed center;
			}
		</style>
	</head>

	<body>
		<div class="container">
			<br />
			<h3 align="center">ASIS DATA UPLOAD</h3>
			<p align="center">ASIS Upload here</p>
			<br>

			<div class="row">
				<form id="bems_service_request_form" method="post" enctype="multipart/form-data">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-6">
								<h1 style="float: left;">BEMS Service Request Upload</h1><br>
								<p style="float: left;">Choose the required CSV file and click Process File tu upload</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<p>
									<input type="file" name="bems_service_request" id="bems_service_request" required accept=".xls, .xlsx, .csv" />
								</p>
							</div>
							<div class="col-sm-2">
								<input type="submit" id="import_bems" name="import_bems" value="Process File" />
							</div>
						</div>
					</div>
					<br>
				</form>
			</div>

			<br><br><br>

			<div class="row">
				<form id="service_WO_form" method="post" enctype="multipart/form-data">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-9">
								<h1 style="float: left;">Service Work (Unscheduled_and_Others) Upload</h1><br>
								<p style="float: left;">Choose the required CSV file and click Process File tu upload</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<p>
									<input type="file" name="service_WO" id="service_WO" required accept=".xls, .xlsx, .csv" />
								</p>
							</div>
							<div class="col-sm-2">
								<button type="submit" id="import_service_WO" name="import_service_WO">Process File</button>
							</div>
						</div>
					</div>
					<br>
				</form>
			</div>

			<br><br><br>

			<div class="row">
				<form id="equipment_form" method="post" enctype="multipart/form-data">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-8">
								<h1 style="float: left;">Equipment_XX_XXX_XXXX Upload</h1>
								<p style="float: left;">Choose the required CSV file and click Process File tu upload</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-3">
								<p>
									<input type="file" name="equipment" id="equipment" required accept=".xls, .xlsx, .csv" />
								</p>
							</div>
							<div class="col-sm-2">
								<button type="submit" id="import_equipment" name="import_equipment">Process FIle</button>
							</div>
						</div>
					</div>
					<br>
				</form>
			</div>

			<br><br><br>


			<div class="table-responsive" id="customer_data"></div>
		</div>

		<div id="myModal" class="modal fade" role="dialog">
			<div class="modal-dialog">
				<div class="start_process"></div>
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
