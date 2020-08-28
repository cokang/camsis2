
<style>

#budget-width {
  width: 10%;    
}
.vl {
  border-left: 6px solid black;
  height: 20px;
}
</style>
<div class="" style='background-color:#ff7f00;margin-bottom: -5%;margin-top:6%; margin-left:5%; margin-right:5%;'>
<div style='text-align: center'>Budget Status As At <text style="color:blue;"><?php echo date('d M Y'); ?></text></div>
                <table class="table-middle-screen-1" >
                    <tr>
                    <th >APBES (OPU)</th>
                <td id='budget-width'>Budget Spent  </td>
                <td id='budget-width'><div style='background-color:white;' id="log0">RM<?=number_format((float)$OPU, 2, '.', ',')?>  </div></td>
                <td id='budget-width'>Budget Balance </td>
                <td id='budget-width'><div style='background-color:white;' id="log2">RM <?=number_format((float)$max_opu-$OPU, 2, '.', ',')?> </div></td>
                <th class="vl" >APMIS (CHO)</th>
                <td  id='budget-width'>Budget Spent </td>
                <td id='budget-width'><div style='background-color:white;' id="log1">RM <?=number_format((float)$CHO, 2, '.', ',') ?>  </div></td>
                <td id='budget-width'>Budget Balance </td>
                <td id='budget-width'><div style='background-color:white;' id="log3">RM <?=number_format((float)$max_cho-$CHO, 2, '.', ',')?> </div></td>
            <!-- </tr>
                <tr><td width='20%'>
                Budget Balance (OPU)</td><td width='20%'>
                <div style='background-color:white;' id="log2">RM  </div></td>
                <td width='20%'>
                Budget Balance (CHO)</td><td width='20%'>
                <div style='background-color:white;' id="log3">RM  </div></td>-->
            </tr> 
            </table>
	</div>