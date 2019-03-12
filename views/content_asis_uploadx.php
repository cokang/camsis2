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
			<!--<form id="bems_service_request_form" method="post" enctype="multipart/form-data">-->
			<form action="processupload?aa=1" method="post" enctype="multipart/form-data" name="form1" id="form1">
			<tr>
				<td><h1>BEMS Service Request Upload</h1></td>
			</tr>
			<tr>
		    	<td style="float: left;">Choose the required CSV file and click Process File tu upload</td>
		    </tr>
		    <table class="tblexcel">
		    <tr>
		    	<!--<td><input type="file" name="bems_service_request" id="bems_service_request" required accept=".xls, .xlsx, .csv"/></td>-->
					<td><input type="file" class="form-control" name="userfile" id="userfile"  align="center" required accept=".xls, .xlsx, .csv"/>
					</td>
		    	<!--<td><input type="submit" value="Process File" onclick="myFunction();" /></td>-->
					<td colspan="2" ><input type="submit" id="submit" name="submit" value="Import"></td>
		    </tr>
		    </table>
		    </form>
</table>
<table class="ui-color-contents-style">
			<!--<form id="bems_service_request_form" method="post" enctype="multipart/form-data">-->
			<form action="processupload?aa=2" method="post" enctype="multipart/form-data" name="form2" id="form2">
			<tr>
				<td><h1 style="float: left;">Service Work (Unscheduled_and_Others) Upload</h1></td>
			</tr>
			<tr>
		    	<td style="float: left;">Choose the required CSV file and click Process File tu upload</td>
		    </tr>
		    <table class="tblexcel">
		    <tr>
		    	<!--<td><input type="file" name="service_work" id="service_work" required accept=".xls, .xlsx, .csv"/></td>
		    	<td><input type="submit" value="Process File" onclick="myFunction2();"  /></td>-->
					<td><input type="file" class="form-control" name="userfile" id="userfile"  align="center" required accept=".xls, .xlsx, .csv"/>
					</td>
		    	<!--<td><input type="submit" value="Process File" onclick="myFunction();" /></td>-->
					<td colspan="2" ><input type="submit" id="submit" name="submit" value="Import"></td>
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
		    </table><div id="showResult">cvcvcv</div>
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

function myFunction2() {
    var fileInput = document.getElementById("service_work");

        var reader = new FileReader();
        reader.onload = function () {
	    var textk, texty, a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,aa,ab,ac = "";
	    var rowape = reader.result;
	    var dptrow = rowape.split('\n"');

alert("Tekan OK untuk meneruskan proses");
	var xhr = [];
	var data = [];
	var dataz = [];
        for (ii = 1; ii < dptrow.length; ii++){
            (function (ii){
							//alert("masuk loop");
		dptcol = dptrow[ii].split(',"');
		//a = dptcol[0].replace(/"/g, "");
		//b = dptcol[1].replace(/"/g, "");
		/*
		data['a'] = dptcol[0].replace(/"/g, "");
		data['b'] = dptcol[1].replace(/"/g, "");
		data['c'] = dptcol[2].replace(/"/g, "");
		data['d'] = dptcol[3].replace(/"/g, "");
		data['e'] = dptcol[4].replace(/"/g, "");
		data['e'] = data['e'].replace(/'/g, "");
		data['f'] = dptcol[5].replace(/"/g, "");
		data['f'] = data['f'].replace(/'/g, "");
		data['g'] = dptcol[6].replace(/"/g, "");
		data['h'] = dptcol[7].replace(/"/g, "");
		data['i'] = dptcol[8].replace(/"/g, "");
		data['j'] = dptcol[9].replace(/"/g, "");
		data['j'] = data['j'].replace(/'/g, "");
		data['k'] = dptcol[10].replace(/"/g, "");
		data['l'] = dptcol[11].replace(/"/g, "");
		data['m'] = dptcol[12].replace(/"/g, "");
		data['n'] = dptcol[13].replace(/"/g, "");
		data['o'] = dptcol[14].replace(/"/g, "");
		data['o'] = data['o'].replace(/'/g, "");
		data['p'] = dptcol[15].replace(/"/g, "");
		data['p'] = data['p'].replace(/'/g, "");
		data['q'] = dptcol[16].replace(/"/g, "");
		data['q'] = data['q'].replace(/'/g, "");
		data['r'] = dptcol[17].replace(/"/g, "");
		data['r'] = data['r'].replace(/'/g, "");
		data['s'] = dptcol[18].replace(/"/g, "");
		data['t'] = dptcol[19].replace(/"/g, "");
		data['u'] = dptcol[20].replace(/"/g, "");
		data['u'] = data['u'].replace(/'/g, "");
		data['v'] = dptcol[21].replace(/"/g, "");
		data['v'] = data['v'].replace(/'/g, "");
		data['w'] = dptcol[22].replace(/"/g, "");
		data['w'] = data['w'].replace(/'/g, "");
		data['x'] = dptcol[23].replace(/"/g, "");
		data['x'] = data['x'].replace(/'/g, "");
		data['y'] = dptcol[24].replace(/"/g, "");
		data['y'] = data['y'].replace(/'/g, "");
		data['z'] = dptcol[25].replace(/"/g, "");
		data['z'] = data['z'].replace(/'/g, "");
		data['aa'] = dptcol[26].replace(/"/g, "");
		data['aa'] = data['aa'].replace(/'/g, "");
		data['ab'] = dptcol[27].replace(/"/g, "");
		data['ab'] = data['ab'].replace(/'/g, "");
		data['ac'] = dptcol[28].replace(/"/g, "");
		data['ac'] = data['ac'].replace(/'/g, "");
		data['ad'] = dptcol[29].replace(/"/g, "");
		data['ad'] = data['ad'].replace(/'/g, "");
		*/

		data[0] = dptcol[0].replace(/"/g, "");
		data[1] = dptcol[1].replace(/"/g, "");
		data[2] = dptcol[2].replace(/"/g, "");
		data[3] = dptcol[3].replace(/"/g, "");
		data[4] = dptcol[4].replace(/"/g, "");
		data[4] = data[4].replace(/'/g, "");
		data[5] = dptcol[5].replace(/"/g, "");
		data[5] = data[5].replace(/'/g, "");
		data[6] = dptcol[6].replace(/"/g, "");
		data[7] = dptcol[7].replace(/"/g, "");
		data[8] = dptcol[8].replace(/"/g, "");
		data[9] = dptcol[9].replace(/"/g, "");
		data[9] = data[9].replace(/'/g, "");
		data[10] = dptcol[10].replace(/"/g, "");
		data[11] = dptcol[11].replace(/"/g, "");
		data[12] = dptcol[12].replace(/"/g, "");
		data[13] = dptcol[13].replace(/"/g, "");
		data[14] = dptcol[14].replace(/"/g, "");
		data[14] = data[14].replace(/'/g, "");
		data[15] = dptcol[15].replace(/"/g, "");
		data[15] = data[15].replace(/'/g, "");
		data[16] = dptcol[16].replace(/"/g, "");
		data[16] = data[16].replace(/'/g, "");
		data[17] = dptcol[17].replace(/"/g, "");
		data[17] = data[17].replace(/'/g, "");
		data[18] = dptcol[18].replace(/"/g, "");
		data[19] = dptcol[19].replace(/"/g, "");
		data[20] = dptcol[20].replace(/"/g, "");
		data[20] = data[20].replace(/'/g, "");
		data[21] = dptcol[21].replace(/"/g, "");
		data[21] = data[21].replace(/'/g, "");
		data[22] = dptcol[22].replace(/"/g, "");
		data[22] = data[22].replace(/'/g, "");
		data[23] = dptcol[23].replace(/"/g, "");
		data[23] = data[23].replace(/'/g, "");
		data[24] = dptcol[24].replace(/"/g, "");
		data[24] = data[24].replace(/'/g, "");
		data[25] = dptcol[25].replace(/"/g, "");
		data[25] = data[25].replace(/'/g, "");
		data[26] = dptcol[26].replace(/"/g, "");
		data[26] = data[26].replace(/'/g, "");
		data[27] = dptcol[27].replace(/"/g, "");
		data[27] = data[27].replace(/'/g, "");
		data[28] = dptcol[28].replace(/"/g, "");
		data[28] = data[28].replace(/'/g, "");
		data[29] = dptcol[29].replace(/"/g, "");
		data[29] = data[29].replace(/'/g, "");

		dataz.push([data[0],data[1],data[2],data[3],data[4],data[5],data[6],data[7],data[8],data[9],data[10],
								data[11],data[12],data[13],data[14],data[15],data[16],data[17],data[18],data[19],data[20],data[21],
								data[22],data[23],data[24],data[25],data[26],data[27],data[28],data[29]]);
		//dataz[ii] = data;
		//alert("lepas dah "+dptcol[0]);
		//alert(dataz.toString());


//alert("dier pusing");
//alert("baca abis");
		//textk += dptcol[0]+" : "+dptcol[1]+" : "+dptcol[2]+" : "+dptcol[3] + "<br>";
//alert("baca abis"+textk);
//                xhr[ii] = new XMLHttpRequest();
//                url = 'ajax_asiswo.asp?a='+ a + '&b='+ b + '&c=' + c + '&d=' + d + '&e=' + e + '&f=' + f + '&g=' + g + '&h=' + h + '&i=' + i + '&j=' + j + '&k=' + k + '&l=' + l + '&m=' + m + '&n=' + n + '&o=' + o + '&p=' + p + '&q=' + q + '&r=' + r + '&s=' + s + '&t=' + t + '&u=' + u + '&v=' + v + '&w=' + w + '&x=' + x + '&y=' + y + '&z=' + z + '&aa=' + aa + '&ab=' + ab + '&ac=' + ac + '&ad=' + ad;
//alert("masuktgh"+url);
//                xhr[ii].open("GET", url, true);
//                xhr[ii].onreadystatechange = function () {
//                    if (xhr[ii].readyState == 4 && xhr[ii].status == 200) {
//                        console.log('Response from request ' + ii + ' [ ' + xhr[ii].responseText + ']');
//			texty += 'Response from request ' + ii + ' [ ' + xhr[ii].responseText + ']<br>';
//                    }
//                };
//                xhr[ii].send();
            })(ii);
        }
				alert(dataz.toString());
				alert("lepas loop");
				var myarray=new Array(3);
         for (i=0; i <3; i++)
         myarray[i]=new Array(3)
         myarray[0][0]="One"
         myarray[0][1]="Two"
         myarray[0][2]="Three"
         myarray[1][0]="Four"
         myarray[1][1]="Five"
         myarray[1][2]="Six"
         myarray[2][0]="Seven"
         myarray[2][1]="Eight"
         myarray[2][2]="Nine"
				var data = {a:{'foo':'bar'},b:{'this':'that'}};
				$.ajax({
   				type: "POST",
   				//data: {info:dataz[0]},
   				//data: {info:info},
					data       : {'info':JSON.stringify(dataz)},
    			//dataType: "json",
    			//data: JSON.stringify({ paramName: dataz }),
   				url: "<?php echo site_url(); ?>/Ajaxasisa",
   				//success: function(msg){
					success: function(data){
					alert('camjaya');
					$('#data').append(status);

					 //ON THIS LINE I WOULD LIKE TO HAVE TEXT DISPLAYED ONLY NOT AS AN ALERT OR DIALOG BOX
						window.alert(data);
						$('#data').val('Sent');
     			//$('.showResult').html(msg);
					$("#showResult").text(data);
					console.log(data.msg);
						/*
						if(data.status==true){
							alert("nanananananana");
							alert(data.msg);
						}else{
							alert("import failed. " + data.msg);
						}
						*/
						if (data.Success) {
        			alert('success!');
    				} else {
        			alert('sekali error lapulop : ' + data.Error);
    				}

   				}
				});

				//alert("nilai array : "+ JSON.stringify(dataz, null, 4));
				//alert("lepas dah"+dataz[4]["e"]);
if (ii>1) {
alert("jumlah data yang diproses "+ii);} else
{alert("tiada data diproses");}
           document.getElementById('out').innerHTML = textk;
		document.getElementById('outy').innerHTML = texty;
        };
        // start reading the file. When it is done, calls the onload event defined above.
        reader.readAsBinaryString(fileInput.files[0]);
	var hasil = reader.result;
        var build = '<table border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse" width="100%">\n';
        var row = hasil.split("\n");

}


function myFunction() {
    var fileInput = document.getElementById("bems_service_request");

        var reader = new FileReader();
        reader.onload = function () {
	    var textk, texty, a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,aa,ab,ac = "";
	    var rowape = reader.result;
	    var dptrow = rowape.split('\n"');

alert("Tekan OK untuk meneruskan proses");
	var xhr = [];
	var data = [];
	var dataz = [];
        for (ii = 1; ii < dptrow.length; ii++){
            (function (ii){
							//alert("masuk loop");
		dptcol = dptrow[ii].split(',"');
		//a = dptcol[0].replace(/"/g, "");
		//b = dptcol[1].replace(/"/g, "");
		/*
		data['a'] = dptcol[0].replace(/"/g, "");
		data['b'] = dptcol[1].replace(/"/g, "");
		data['c'] = dptcol[2].replace(/"/g, "");
		data['d'] = dptcol[3].replace(/"/g, "");
		data['e'] = dptcol[4].replace(/"/g, "");
		data['e'] = data['e'].replace(/'/g, "");
		data['f'] = dptcol[5].replace(/"/g, "");
		data['f'] = data['f'].replace(/'/g, "");
		data['g'] = dptcol[6].replace(/"/g, "");
		data['h'] = dptcol[7].replace(/"/g, "");
		data['i'] = dptcol[8].replace(/"/g, "");
		data['j'] = dptcol[9].replace(/"/g, "");
		data['j'] = data['j'].replace(/'/g, "");
		data['k'] = dptcol[10].replace(/"/g, "");
		data['l'] = dptcol[11].replace(/"/g, "");
		data['m'] = dptcol[12].replace(/"/g, "");
		data['n'] = dptcol[13].replace(/"/g, "");
		data['o'] = dptcol[14].replace(/"/g, "");
		data['o'] = data['o'].replace(/'/g, "");
		data['p'] = dptcol[15].replace(/"/g, "");
		data['p'] = data['p'].replace(/'/g, "");
		data['q'] = dptcol[16].replace(/"/g, "");
		data['q'] = data['q'].replace(/'/g, "");
		data['r'] = dptcol[17].replace(/"/g, "");
		data['r'] = data['r'].replace(/'/g, "");
		data['s'] = dptcol[18].replace(/"/g, "");
		data['t'] = dptcol[19].replace(/"/g, "");
		data['u'] = dptcol[20].replace(/"/g, "");
		data['u'] = data['u'].replace(/'/g, "");
		data['v'] = dptcol[21].replace(/"/g, "");
		data['v'] = data['v'].replace(/'/g, "");
		data['w'] = dptcol[22].replace(/"/g, "");
		data['w'] = data['w'].replace(/'/g, "");
		data['x'] = dptcol[23].replace(/"/g, "");
		data['x'] = data['x'].replace(/'/g, "");
		data['y'] = dptcol[24].replace(/"/g, "");
		data['y'] = data['y'].replace(/'/g, "");
		data['z'] = dptcol[25].replace(/"/g, "");
		data['z'] = data['z'].replace(/'/g, "");
		data['aa'] = dptcol[26].replace(/"/g, "");
		data['aa'] = data['aa'].replace(/'/g, "");
		data['ab'] = dptcol[27].replace(/"/g, "");
		data['ab'] = data['ab'].replace(/'/g, "");
		data['ac'] = dptcol[28].replace(/"/g, "");
		data['ac'] = data['ac'].replace(/'/g, "");
		data['ad'] = dptcol[29].replace(/"/g, "");
		data['ad'] = data['ad'].replace(/'/g, "");
		*/

		data[0] = dptcol[0].replace(/"/g, "");
		data[1] = dptcol[1].replace(/"/g, "");
		data[2] = dptcol[2].replace(/"/g, "");
		data[3] = dptcol[3].replace(/"/g, "");
		data[4] = dptcol[4].replace(/"/g, "");
		data[4] = data[4].replace(/'/g, "");
		data[5] = dptcol[5].replace(/"/g, "");
		data[5] = data[5].replace(/'/g, "");
		data[6] = dptcol[7].replace(/"/g, "");
		data[7] = dptcol[8].replace(/"/g, "");
		data[8] = dptcol[9].replace(/"/g, "");
		data[9] = dptcol[10].replace(/"/g, "");
		data[9] = data[9].replace(/'/g, "");
		data[10] = dptcol[11].replace(/"/g, "");
		data[11] = dptcol[11].replace(/"/g, "");
		data[12] = dptcol[12].replace(/"/g, "");
		data[13] = dptcol[14].replace(/"/g, "");
		data[14] = dptcol[15].replace(/"/g, "");
		data[14] = data[14].replace(/'/g, "");
		data[15] = dptcol[16].replace(/"/g, "");
		data[15] = data[15].replace(/'/g, "");
		data[16] = dptcol[17].replace(/"/g, "");
		data[16] = data[16].replace(/'/g, "");
		data[17] = dptcol[18].replace(/"/g, "");
		data[17] = data[17].replace(/'/g, "");
		data[18] = dptcol[19].replace(/"/g, "");
		data[19] = dptcol[20].replace(/"/g, "");
		data[20] = dptcol[6].replace(/"/g, "");
		data[20] = data[20].replace(/'/g, "");
		data[21] = dptcol[21].replace(/"/g, "");
		data[21] = data[21].replace(/'/g, "");
		data[22] = dptcol[22].replace(/"/g, "");
		data[22] = data[22].replace(/'/g, "");
		data[23] = dptcol[28].replace(/"/g, "");
		data[23] = data[23].replace(/'/g, "");
		data[24] = dptcol[29].replace(/"/g, "");
		data[24] = data[24].replace(/'/g, "");
		data[25] = dptcol[30].replace(/"/g, "");
		data[25] = data[25].replace(/'/g, "");
		data[26] = dptcol[24].replace(/"/g, "");
		data[26] = data[26].replace(/'/g, "");
		data[27] = dptcol[27].replace(/"/g, "");
		data[27] = data[27].replace(/'/g, "");
		data[28] = dptcol[23].replace(/"/g, "");
		data[28] = data[28].replace(/'/g, "");
		data[29] = dptcol[26].replace(/"/g, "");
		data[29] = data[29].replace(/'/g, "");
		data[30] = dptcol[25].replace(/'/g, "");
		data[30] = data[30].replace(/"/g, "");
		data[31] = dptcol[31].replace(/'/g, "");
		data[32] = dptcol[32].replace(/'/g, "");
		data[33] = dptcol[33].replace(/'/g, "");
		data[34] = dptcol[34].replace(/'/g, "");
		data[35] = dptcol[35].replace(/'/g, "");
		data[36] = dptcol[36].replace(/'/g, "");
		data[37] = dptcol[37].replace(/'/g, "");
		data[38] = dptcol[38].replace(/'/g, "");


		dataz.push([data[0],data[1],data[2],data[3],data[4],data[5],data[6],data[7],data[8],data[9],data[10],
								data[11],data[12],data[13],data[14],data[15],data[16],data[17],data[18],data[19],data[20],data[21],
								data[22],data[23],data[24],data[25],data[26],data[27],data[28],data[29],data[30],data[31],data[32],
								data[33],data[34],data[35],data[36],data[37],data[38]]);
		//dataz[ii] = data;
		//alert("lepas dah "+dptcol[0]);
		//alert(dataz.toString());


//alert("dier pusing");
//alert("baca abis");
		//textk += dptcol[0]+" : "+dptcol[1]+" : "+dptcol[2]+" : "+dptcol[3] + "<br>";
//alert("baca abis"+textk);
//                xhr[ii] = new XMLHttpRequest();
//                url = 'ajax_asiswo.asp?a='+ a + '&b='+ b + '&c=' + c + '&d=' + d + '&e=' + e + '&f=' + f + '&g=' + g + '&h=' + h + '&i=' + i + '&j=' + j + '&k=' + k + '&l=' + l + '&m=' + m + '&n=' + n + '&o=' + o + '&p=' + p + '&q=' + q + '&r=' + r + '&s=' + s + '&t=' + t + '&u=' + u + '&v=' + v + '&w=' + w + '&x=' + x + '&y=' + y + '&z=' + z + '&aa=' + aa + '&ab=' + ab + '&ac=' + ac + '&ad=' + ad;
//alert("masuktgh"+url);
//                xhr[ii].open("GET", url, true);
//                xhr[ii].onreadystatechange = function () {
//                    if (xhr[ii].readyState == 4 && xhr[ii].status == 200) {
//                        console.log('Response from request ' + ii + ' [ ' + xhr[ii].responseText + ']');
//			texty += 'Response from request ' + ii + ' [ ' + xhr[ii].responseText + ']<br>';
//                    }
//                };
//                xhr[ii].send();
            })(ii);
        }
				alert(dataz.toString());
				alert("lepas loopaaaaa");

				$.ajax({
   				type: "POST",
   				//data: {info:dataz[0]},
   				//data: {info:info},
					data       : {'info':JSON.stringify(dataz)},
    			//dataType: "json",
    			//data: JSON.stringify({ paramName: dataz }),
   				url: "<?php echo site_url(); ?>/Ajaxasisa2",
   				//success: function(msg){
					success: function(data){
					alert('camjayaa');
					$('#data').append(status);

					 //ON THIS LINE I WOULD LIKE TO HAVE TEXT DISPLAYED ONLY NOT AS AN ALERT OR DIALOG BOX
						window.alert(data);
						$('#data').val('Sent');
     			//$('.showResult').html(msg);
					$("#showResult").text(data);
					console.log(data.msg);
						/*
						if(data.status==true){
							alert("nanananananana");
							alert(data.msg);
						}else{
							alert("import failed. " + data.msg);
						}
						*/
						if (data.Success) {
        			alert('success!');
    				} else {
        			alert('sekali error lapulop : ' + data.Error);
    				}

   				}
				});

				//alert("nilai array : "+ JSON.stringify(dataz, null, 4));
				//alert("lepas dah"+dataz[4]["e"]);
if (ii>1) {
alert("jumlah data yang diproses "+ii);} else
{alert("tiada data diproses");}
           document.getElementById('out').innerHTML = textk;
		document.getElementById('outy').innerHTML = texty;
        };
        // start reading the file. When it is done, calls the onload event defined above.
        reader.readAsBinaryString(fileInput.files[0]);
	var hasil = reader.result;
        var build = '<table border="1" cellpadding="2" cellspacing="0" style="border-collapse: collapse" width="100%">\n';
        var row = hasil.split("\n");

}

</script>
