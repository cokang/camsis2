<script>
function myFunction() {
    var table = document.getElementById("myTable");
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    cell1.innerHTML = "";
    cell2.innerHTML = "";
    cell3.innerHTML = '<textarea class="Input" name="n_to"  cols="40" rows="1">';
   	cell4.innerHTML='<a onclick="myFunction()"><span class="icon-plus-circle" style="font-size:16px;"></span></a> <a href="#" onClick="deleteRow(this);"><span class="icon-cross-circle" style="font-size:16px;"></span></a>'; 
}

function mytbl() {
    var table = document.getElementById("myTable");
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    cell1.innerHTML = "";
    cell2.innerHTML = '<textarea class="Input" name="n_to"  cols="40" rows="1">';
    cell3.innerHTML = "";
    cell4.innerHTML = "";
    cell5.innerHTML='<a onclick="mytbl()"><span class="icon-plus-circle" style="font-size:16px;"></span></a> <a href="#" onClick="deleteRow(this);"><span class="icon-cross-circle" style="font-size:16px;"></span></a>'; 
}
function mytbl2() {
    var table = document.getElementById("myTable2");
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    cell1.innerHTML = "";
    cell2.innerHTML = '<textarea class="Input" name="n_to"  cols="40" rows="1">';
    cell3.innerHTML = "";
    cell4.innerHTML='<a onclick="mytbl2()"><span class="icon-plus-circle" style="font-size:16px;"></span></a> <a href="#" onClick="deleteRow(this);"><span class="icon-cross-circle" style="font-size:16px;"></span></a>'; 
}
function mytbl3() {
    var table = document.getElementById("myTable3");
    var row = table.insertRow(-1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    cell1.innerHTML = "";
    cell2.innerHTML = "";
    cell3.innerHTML = "";
    cell4.innerHTML = "";
    cell5.innerHTML='<a onclick="mytbl2()"><span class="icon-plus-circle" style="font-size:16px;"></span></a> <a href="#" onClick="deleteRow(this);"><span class="icon-cross-circle" style="font-size:16px;"></span></a>'; 
}
 function deleteRow(obj) {
    $(obj).closest('tr').remove();
 }
</script>