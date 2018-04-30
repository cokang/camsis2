
<body style="margin:0px;">
<table class="tftable" border="0" style="text-align:center;">
	<tr>
		<th colspan="6" height="50px" style="font-size:18px;">SCHDULER</th>
	</tr>
	
	<!--<tr align="center">
		<th class="widht-Shduler" height="40px">PERIODIC WORK ( MONTHLY PLANNER )</th>
		<td rowspan="4"><?= isset($PWMP) ? 'Scheduler Set' : 'N/A' ?><span class="flt"><a href="job_schedule?loct=<?=$this->input->get('loct')?>&p=PWMP"><button type="button" class="btn-button btn-primary-button">Update</button></a></span></td>
	</tr>-->
	<!--<tr align="center">
		<th class="widht-Shduler" height="40px">WEEKLY / PERIODIC PLANNER</th>
		<td rowspan="3"><?= isset($WPP) ? 'Scheduler Set' : 'N/A' ?><span class="flt"><a href="job_schedule?loct=<?=$this->input->get('loct')?>&p=WPP"><button type="button" class="btn-button btn-primary-button">Update</button></a></span></td>
	</tr>-->
	<tr align="center">
		<th class="widht-Shduler" height="40px">SCHEDULE OF WEEKLY ROUTINE JOINT INSPECTION</th>
		<td rowspan="2"><?= isset($SWRJI) ? 'Scheduler Set' : 'N/A' ?><span class="flt"><a href="job_schedule?loct=<?=$this->input->get('loct')?>&p=SWRJI"><button type="button" class="btn-button btn-primary-button">Update</button></a></span></td>
	</tr>
	<tr align="center">
		<th class="widht-Shduler" height="40px">GENERAL WASTE COLLECTION SCHEDULE</th>
	</tr>
	<tr align="center">
		<th class="widht-Shduler" height="40px">Schedule Periodic Work</th>
		<td><?= isset($SPW) ? 'Scheduler Set' : 'N/A' ?><span class="flt"><a href="job_schedule?loct=<?=$this->input->get('loct')?>&p=SPW"><button type="button" class="btn-button btn-primary-button">Update</button></a></span></td>
	</tr>
	<!--<tr align="center">
		<th class="widht-Shduler" height="40px">Daily Cleaning Activity</th>
		<td><?= isset($DCA) ? 'Scheduler Set' : 'N/A' ?><span class="flt"><a href="job_schedule?loct=<?=$this->input->get('loct')?>&p=DCA"><button type="button" class="btn-button btn-primary-button">Update</button></a></span></td>
	</tr>-->
	<!--<tr align="center">
		<th class="widht-Shduler" height="40px">Daily Cleansing Activities Planner</th>
		<td><?= isset($DCAP) ? 'Scheduler Set' : 'N/A' ?><span class="flt"><a href="job_schedule?loct=<?=$this->input->get('loct')?>&p=DCAP"><button type="button" class="btn-button btn-primary-button">Update</button></a></span></td>
	</tr>-->

</table>		
</body>