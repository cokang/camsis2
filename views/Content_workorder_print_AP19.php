
<meta content="utf-8" http-equiv="encoding">
<body>
	<style type="text/css">
		.tbl-wo{
			font-size: 10px;

		}

		.tbl-wo-2{
			font-size: 14px;
			margin-left: 5%;

		}
		.tbl-wo-2 tr td{
			font-size: 14px;
			height: 30;
			/*border: 1px solid black;*/

		}
		.tbl-wo-1{
			font-size: 10px;
		}
		.tbl-wd{
			margin-left: 5%;
			border-collapse: collapse;
			font-size: 14px;
			width: 90%;
			border: 1px solid black;

		}

		.tbl-wd .test1 td{
			border-top: 1px solid black;

		}
		.tbl-wd tr td{

			height: 30;
			margin-left: 5%;
			border-collapse: collapse;
			/*border: 1px solid black;*/

		}

		.square {
		  height: 25px;
		  width: 25px;
		  border: 1px solid black;
		}

		.tbl-we{
			margin-left: 5%;
			border-collapse: collapse;
			font-size: 14px;
			width: 90%;
		}
		.tbl-we tr td{
			font-size: 14px;
		}


	</style>
	<div id="Instruction" class="pr-printer">
		<div class="header-pr">SERVICE REQUEST AND WORK ORDER</div>
		<button onclick="javascript:myFunction('print_workorder?wrk_ord=<?=$this->input->get('wrk_ord')?>&none=closed');" class="btn-button btn-primary-button">PRINT</button>
		<button type="cancel" class="btn-button btn-primary-button" onclick="location.href = '<?php base_url();?>workorderlist?&wrk_ord=<?=$this->input->get('wrk_ord')?>';">CANCEL</button>
	</div>

	<!-- <div style="border: 1px solid black; width: 95%; height: 95%; margin: 2%;"> -->
	<div class="">
	<table class="tbl-wo-2" style="margin-top: 2%; width: 90%;">
		<tr>
		<td style="color:black; width: 25%;"><h2>SERVICE REPORT</h2></td>
		<td style="width: 1%;"></td>
		<td style="width: 13%;"></td>
		<td style="width: 13%;"></td>
		<td style="width: 13%;"></td>
		<td style="width: 7%;"></td>
		<td style="width: 1%;"></td>
		<td rowspan=2 style="padding-left:5px; width:100px;" align="center">
				<img src="<?php echo base_url(); ?>images/logo.png" style="width:145px; height:60px;"/></td>
		</tr>

		<tr>
		<td style="padding:1px; width:100px; font-size: 15px; color: blue;" colspan="6"><?= ($wrk_ord) ? $wrk_ord : 'NA' ?> </td>
		</tr>

		<tr>
			<td>Nature of Visit:</td>
			<td></td>

		    <!-- <?php if($woAP19[0]->V_priority_code == 'Normal'){?>
			<img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/>
			<?php }else{ ?>
			<?php } ?> -->

			<td></td>
			<!-- <?php if($woAP19[0]->V_priority_code == 'Emergency'){?>
			<img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/>
			<?php }else{ ?>
			<?php } ?> -->

			<td></td>
			<!-- <?php if($woAP19[0]->V_priority_code == 'Emergency'){?>
			<img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/>
			<?php }else{ ?>
			<?php } ?> -->

		<td></td>
		<td></td>

		</tr>
		<tr>
		<td>Breakdown</td>
		<td></td>
			<td><div class="box2">
			<?php if($woAP19[0]->V_priority_code == 'RQ'){?>
			<img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/>
			<?php }else{ ?>
			<?php } ?>
			</div></td>
			<td></td>
			<td></td>
			<td>PIC	</td>
			<td>:</td>
			<td style="border-bottom: 1px solid black;"><?=$woAP19[0]->V_requestor;?></td>
		</tr>

		<td>PPM</td>
		<td></td>
			<td><div class="box2">
				<?php if($woAP19[0]->V_priority_code == 'PPM'){?>
			<img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/>
			<?php }else{ ?>
			<?php } ?>
			</div></td>
			<td></td>
			<td></td>
			<td>Team	</td>
			<td>:</td>
			<td style="border-bottom: 1px solid black;"><?=$woAP19[0]->V_User_dept_code;?></td>
		</tr>

		<td>Others</td>
		<td></td>
			<td><div class="box2">
				<?php if($woAP19[0]->V_priority_code == 'Others'){?>
			<img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/>
			<?php }else{ ?>
			<?php } ?>
			</div></td>
			<td></td>
			<td></td>
			<td>Letter</td>
			<td>:</td>
			<td style="border-bottom: 1px solid black;"><?=$woAP19[0]->V_Location_code;?></td>
		</tr>
		<tr>
			<td>Work Order No	</td>
			<td>:</td>
			<td><?=$woAP19[0]->V_phone_no;?></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Equipment	</td>
			<td>:</td>
			<td><?=$woAP19[0]->V_Asset_name;?></td>
			<td></td>
			<td></td>
			<td>Asset No	</td>
			<td>:</td>
			<td><?=$woAP19[0]->V_Asset_no;?></td>
		</tr>
		<tr>
			<td>Manufacturer	</td>
			<td>:</td>
			<td><?=$woAP19[0]->V_Manufacturer;?></td>
			<td></td>
			<td></td>
			<td>Serial No	</td>
			<td>:</td>
			<td><?=$woAP19[0]->V_Serial_no;?></td>
		</tr>

		<tr>
			<td>Brand/Model	 </td>
			<td>:</td>
			<td><?=$woAP19[0]->V_Model_no;?></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td>Failure Report   </td>
			<td>:</td>
		</tr>
		</table>
        <div style="width: 90%; border: 1px solid black; height:10%; margin-left: 5%;font-size: 14px;padding-left:5px;">
		<?=$woAP19[0]->V_summary;?>
		</div>
        <table class="tbl-wo-2">
           <tr>
           	<td>Troubleshoot/Corrective Action</td>
           </tr>
        </table>
        <div style="width: 90%; border: 1px solid black; height:10%; margin-left: 5%;font-size: 14px;padding-left:5px;"><?=$woinfo[0]->V_details;?></div>
        <div style="height: 2%;"></div>
        <table class="tbl-we">

        <tr>
        	<td style="width:20%;">Job Completed</td>
        	<td style="width:30%;"><div class="square">
			</div></td>
			<td style="width:20%;">To be continued</td>
			<td style="width:30%;"><div class="square">
			</div></td>
        </tr>

        </table>
        <div style="height: 2%;"></div>
        	<table class="tbl-wd">
        		<tr>
        			<td style="border: 1px solid black;">Parts Replaced/Recommended Parts To Change</td>
        			<td style="border: 1px solid black;">Part Price (RM)</td>
        			<td style="border: 1px solid black;">Vendor Price (RM)</td>
        		</tr>
        		<tr>
        			<td style="border: 1px solid black;"><?=$woAP19[0]->V_MohDesg;?></td>
        			<td style="border: 1px solid black;"><?=$woAP19[0]->v_ref_status;?></td>
        			<td style="border: 1px solid black;"><?=$woAP19[0]->takenby;?></td>
        		</tr>
        		<tr>
        			<td style="border: 1px solid black;"></td>
        			<td style="border: 1px solid black;"></td>
        			<td style="border: 1px solid black;"></td>
        		</tr>
        		<tr>
        			<td style="border: 1px solid black;"></td>
        			<td style="border: 1px solid black;"></td>
        			<td style="border: 1px solid black;"></td>
        		</tr>
        		<tr>
        			<td style="border: 1px solid black;"></td>
        			<td style="border: 1px solid black;"></td>
        			<td style="border: 1px solid black;"></td>
        		</tr>
        	</table>
        	<div style="height: 1%;"></div -->
        	<table class="tbl-wd" style="height: 15%;">
        	<tr>
        			<td></td>
        			<td style="text-align: right; width: 10%;"></td>
        			<td></td>
        			<td></td>
        			<td></td>
        			<td></td>
        			<td style="text-align: right; width: 10%;"></td>
        			<td  width: 30%;"></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td></td>
        			<td style="text-align: right; width: 10%;"></td>
        			<td></td>
        			<td></td>
        			<td></td>
        			<td></td>
        			<td style="text-align: right; width: 10%;"></td>
        			<td  width: 30%;"></td>
        			<td></td>
        			<td></td>
        		</tr>
        	<tr>
        			<td></td>
        			<td style="text-align: right; width: 10%;"></td>
        			<td></td>
        			<td></td>
        			<td></td>
        			<td></td>
        			<td style="text-align: right; width: 10%;"></td>
        			<td style="width: 30%;"></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td></td>
        			<td style="text-align: right; width: 10%;"></td>
        			<td style="border-bottom: 1px solid black; width: 30%;"></td>
        			<td></td>
        			<td></td>
        			<td></td>
        			<td style="text-align: right; width: 10%;"></td>
        			<td style="border-bottom: 1px solid black; width: 30%;"></td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        		<td></td>
        			<td>Done by:</td>
        			<td style="text-align: center;">(Sign & Cop)</td>
        			<td></td>
        			<td></td>
        			<td></td>
        			<td>Customer:</td>
        			<td style="text-align: center;">(Sign & Cop)</td>
        			<td></td>
        			<td></td>
        		</tr>
        		<tr>
        			<td></td>
        			<td>Date:</td>
        			<td></td>
        			<td></td>
        			<td></td>
        			<td></td>
        			<td>Date:</td>
        			<td></td>
        			<td></td>
        			<td></td>
        		</tr>
        	</table>
        	<table class="tbl-wo">
        	<tr>
        	<td>
        	<div style="margin-left: 5%; margin-right: 5%; text-align: center;">
        		<b>ADVANCE PACT SDN BHD</b>(412169-V)<br>
				2-3A Perdana The Place, Jalan PJU 8/5G, Bandar Damansara Perdana 47820 Petaling Jaya, Selangor, Malaysia.<br>
				Tel : +6(03)-7726 8632/7727 9859/7728 4752 Fax:+6(03)7728 3075         Website : www.advancepact.com<br>
				<b>HOTLINE</b>:+6(017)272 7226
				</div>
				<div style="text-align: right; height: 2%;">Customer Copy</div>
			</td>
        	</tr>
        	</table>
	</table>
	</div>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>

	<div class="">
		<table class="tbl-wo" align="center" style="margin-top:15px;">
			<tr>
				<td style="padding-left:0px; width:120px;" align="center"><img src="<?php echo base_url(); ?>images/msblogo.png" style="width:100px; height:40px;"/></td>
				<td style="text-align: center; font-size: 16px;font-weight: bold;">
					MSB <?= ($hosp[0]->v_HospitalName) ? $hosp[0]->v_HospitalName : 'NA' ?>
				</td>
				<td style="padding-left:5px; width:150px;font-size: 13px;" align="center">Date : <?= date("d/m/Y")?> </td>
				<!-- <img src="<?php echo base_url(); ?>images/logo.png" style="width:145px; height:60px;"/></td> -->
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="font-weight:bold;">
			<tr>
				<td style="padding:1px; width:15%; font-size: 12px;">SERVICE REQUEST : </td>
				<td width="55%;"></td>
				<td style="padding:1px; width:100px; font-size: 12px;" colspan="6">WORK ORDER NO : <?= ($wrk_ord) ? $wrk_ord : 'NA' ?> </td>
				<!-- <?php if(($this->session->userdata('usersess') == 'SEC')){?>
				<td style="padding:1px; width:80px; font-size: 13px;">
					<div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> SEC
				</td>
				<td style="padding:1px; width:80px; font-size: 12px;">
					<div class="box2"></div> HKS
				</td>
				<?php }elseif(($this->session->userdata('usersess') == 'HKS')){ ?>
				<td style="padding:1px; width:80px; font-size: 12px;">
					<div class="box2"></div> SEC
				</td>
				<td style="padding:1px; width:80px; font-size: 12px;">
					<div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> HKS
				</td>
				<?php }elseif(($this->session->userdata('usersess') == 'BES')){ ?>
				<td style="padding:1px; width:80px; font-size: 12px;">
					<div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> BES
				</td> -->
				<!-- <td style="padding:1px; width:80px; font-size: 12px;">
					<div class="box2"></div> FES
				</td>
				<?php }elseif(($this->session->userdata('usersess') == 'FES')){ ?>
				<td style="padding:1px; width:80px; font-size: 12px;">
					<div class="box2"></div> BES
				</td> -->
				<!-- <td style="padding:1px; width:80px; font-size: 12px;">
					<div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> FES
				</td> -->
				<?php } ?>
				<!-- <td style="padding-left:45%; width:400px; font-size: 12px;"> Date : <?= date("d/m/Y")?> </td> -->
			</tr>
		</table>
		<!--<table class="tbl-wo" border="0" align="center">
			<tr>
				<td width="33.5%"><span style="font-weight:bold;">SERVICE REQUEST</span></td>
				<td colspan="" width="50%"><span style="float:right; font-weight:bold;">Service & Work Order Request No :</span></td>
				<td width="1%" style="font-weight:bold;"><span style="color:blue;"></span></td>
			</tr>
		</table>-->
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;">
			<tr>
			<td style="width:50%; padding:1px;"><table class="tbl-wo-1" border="0" align="left">
			            <tr>
							<td class="tbl-wo-data">Service Type</td>
							<!-- <td><span style="color:blue;">: <?= ($woinfo[0]->V_User_dept_code) ? $woinfo[0]->V_User_dept_code : 'NA' ?></span></td> -->
						</tr>
						<tr>
							<td class="tbl-wo-data" valign="top">Requestor</td>
							<td style="width:35%;">: <span style="color:blue;"><?= ($woinfo[0]->V_requestor) ? $woinfo[0]->V_requestor : 'NA' ?></span></td>
							<!-- <td style="width:;">Designation</td>
							<td style="width:30%;">: <span style="color:blue;"><?= ($woinfo[0]->V_MohDesg) ? $woinfo[0]->V_MohDesg : 'NA' ?></span></td> -->
						</tr>
						<tr>
							<td class="tbl-wo-data">Location</td>
							<td><span style="color:blue;">: <?= ($woinfo[0]->V_User_dept_code) ? $woinfo[0]->V_User_dept_code : 'NA' ?></span></td>
							<td style="width:;" valign="top">Ext. No</td>
							<td style="width:;" valign="top">: <span style="color:blue;"><?= ($woinfo[0]->V_phone_no) ? $woinfo[0]->V_phone_no : 'NA' ?></span></td>
						</tr>
						<!-- <tr>
							<td class="tbl-wo-data" valign="top">Department</td>
							<td valign="top">: <span style="color:blue;"><?= ($woinfo[0]->v_UserDeptDesc) ? $woinfo[0]->v_UserDeptDesc : 'NA' ?></span></td>
							<td style="width:;" valign="top">Ext. No</td>
							<td style="width:;" valign="top">: <span style="color:blue;"><?= ($woinfo[0]->V_phone_no) ? $woinfo[0]->V_phone_no : 'NA' ?></span></td>
						</tr> -->
						<tr>
							<td class="tbl-wo-data">Dept. Code </td>
							<td><span style="color:blue;">: <?= ($woinfo[0]->V_User_dept_code) ? $woinfo[0]->V_User_dept_code : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Room Code </td>
							<td  style="white-space: nowrap"><span style="color:blue; ">: <?= ($woinfo[0]->V_location_code) ? $woinfo[0]->V_location_code : 'NA' ?> (<?= ($woinfo[0]->v_Location_Name) ? $woinfo[0]->v_Location_Name : 'NA' ?>)</span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Equipment </td>
							<td><span style="color:blue;">: <?= ($woinfo[0]->V_Asset_name) ? $woinfo[0]->V_Asset_name : 'NA' ?> </span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Asset No </td>
							<td style="width:;">: <span style="color:blue;"><?= ($woinfo[0]->V_Tag_no) ? $woinfo[0]->V_Tag_no : 'NA' ?></span></td>

						</tr>
						<tr>
							<td class="tbl-wo-data">Model </td>
							<td><span style="color:blue;">: <?= ($woinfo[0]->V_Model_no) ? $woinfo[0]->V_Model_no : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Serial No </td>
							<td><span style="color:blue;">: <?= ($woinfo[0]->V_Serial_no) ? $woinfo[0]->V_Serial_no : 'NA' ?></span>
							</td>
						</tr>
					</table></td>
			<td style="width:50%; padding:1px;" valign="top" colspan="0">
					<table class="tbl-wo-1" border="0" align="left">
							<tr>
							<td> Request Description :</td>
						</tr>
						<?php if($woinfo[0]->V_summary == 'N/A'){?>
						<tr>
							<td> <hr class='dotted' style="margin:10px 5px 5px 5px;" /></td>
						</tr>
						<tr>
							<td> <hr class='dotted' style="margin:10px 5px 5px 5px;" /></td>
						</tr>
						<?php }else{ ?>
						<tr>
							<td style="padding:3px 3px 3px 0px;"><span style="color:blue;"><?= ($woinfo[0]->V_summary) ? $woinfo[0]->V_summary : 'NA' ?></span></td>
						</tr>
						<?php } ?>
						<tr>
							<td height="70"></td>
						</tr>
						<td>Warranty Status </td>
						<td>
							<table class="tbl-wo" border="0" align="left">
								<tr height=3></tr>
									<td style="width:33.33%;"> : <div class="box2">
									<?php if((strtotime($woinfo2[0]->V_Wrn_end_code) > strtotime(date("d/m/Y")))) {?>
									<img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/>
									<?php }else{ ?>

									<?php } ?>
									</div> Under Warranty</td>
									<td style="width:33.33%;"><div class="box2">
									<?php  if(strtotime($woinfo2[0]->V_Wrn_end_code) < strtotime(date("d/m/Y"))) {?>
									<img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/>
									<?php }else{ ?>

									<?php } ?>
									</div> Post Warranty</td>
								</tr>
							</table>
						</td>
						</tr>
					</table>
				</td>
				</tr>
				<tr>
				<td style="padding:1px;">
					<table class="tbl-wo-1" border="0" align="bottom" width="50">
						<tr>
							<td class="tbl-wo-data">Taken By </td>
							<td>: <span style="color:blue;"><?= ($woinfo[0]->takenby) ? $woinfo[0]->takenby : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Request Type</td>
							<td>: <span style="color:blue;"><?= ($woinfo[0]->V_request_type) ? $woinfo[0]->V_request_type : 'NA' ?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Priority</td>
							<td>: <span style="color:blue;"><?= date("d/m/Y", strtotime(isset($woinfo[0]->D_date) == TRUE ? $woinfo[0]->D_date : 'N/A'))?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Date</td>
							<td>: <span style="color:blue;"><?= date("d/m/Y", strtotime(isset($woinfo[0]->D_date) == TRUE ? $woinfo[0]->D_date : 'N/A'))?></span></td>
						</tr>
						<tr>
							<td class="tbl-wo-data">Time </td>
							<td>: <span style="color:blue;"><?= date("H:i ", strtotime(isset($woinfo[0]->D_date) == TRUE ? $woinfo[0]->D_date : 'N/A'))?></span></td>
						</tr>
						<!-- <tr>
							<td> Request Description :</td>
						</tr>
						<?php if($woinfo[0]->V_summary == 'N/A'){?>
						<tr>
							<td> <hr class='dotted' style="margin:10px 5px 5px 5px;" /></td>
						</tr>
						<tr>
							<td> <hr class='dotted' style="margin:10px 5px 5px 5px;" /></td>
						</tr>
						<?php }else{ ?>
						<tr>
							<td style="padding:3px 3px 3px 0px;"><span style="color:blue;"><?= ($woinfo[0]->V_summary) ? $woinfo[0]->V_summary : 'NA' ?></span></td>
						</tr>
						<?php } ?>
						 -->

					</table>
				</td>

				<td style="padding:1px;">
				<table class="tbl-wo-1" border="0" align="bottom" width="50">
						<tr>
							<td  style="border-bottom: 1px solid black;" class="tbl-wo-data">Assessment </td>
							<td  style="border-bottom: 1px solid black;">: <span style="color:blue;"><?= ($woinfo[0]->takenby) ? $woinfo[0]->takenby : 'NA' ?></span></td>
							<td style="border-bottom: 1px solid black;" class="tbl-wo-data">Status</td>
							<td style="border-bottom: 1px solid black;">: <span style="color:blue;"><?= ($woinfo[0]->takenby) ? $woinfo[0]->takenby : 'NA' ?></span></td>
						</tr>
						<tr>
							<td rowspan=2 style="border-width: :1px 0px 0px 1px;" class="tbl-wo-data">Nature of task</td>
							<td style="border:1px solid black; width:33%;" valign="top"><div class="box2"></div> Listed Activity</td>
							<td style="" valign="top"><div class="box2"></div> Proceed</td>
						</tr>
						<tr>
							<td style=" border:1px solid black; width:33%;" valign="top"><div class="box2"></div> Unlisted Activity </td>
							<td style=" width:33%;" valign="top"><div class="box2"></div> Other </td>
						</tr>
						<tr>
							<td rowspan=2 style="border-top: 1px solid black;" class="tbl-wo-data">Nature of arrangement</td>
							<td style=" border:1px solid black; width:33%;" valign="top"><div class="box2"></div> Scheduled</td>
						</tr>
						<tr>
							<td style=" border-right: 1px solid black; width:33%;" valign="top"><div class="box2"></div>Non-scheduled</td>
						</tr>

		</table>
		</td>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center" height="5px"></td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="background-color:black; color:white;">
			<tr>
				<td align="center"><span style="font-weight:bold; text-transform: uppercase;">Request Findings</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="border: 1px solid black;">
			<tr>
				<td style="width:50%; padding:1px;" rowspan="2" valign="top">
					<table class="tbl-wo-1" border="0" align="left">
						<tr>
							<td> Assigned To : <?=($personallist[0][0]) ? $personallist[0][0] : ''?><br /> <i>( Name )</i></td>
						</tr>
						<tr>
							<td> Response findings :</td>
						</tr>
						<tr>
							<td><?=isset($resprec[0]->v_ActionTaken) ? $resprec[0]->v_ActionTaken : ''?> <hr class='dotted' style="margin:10px 5px 5px 5px;" /></td>
						</tr>
						<tr>
							<td> <hr class='dotted' style="margin:10px 5px 5px 5px;" /></td>
						</tr>
						<?php if(($this->session->userdata('usersess') == 'SEC') or ($this->session->userdata('usersess') == 'HKS')){?>

						<?php }else{ ?>
						<tr>
							<td> <hr class='dotted' style="margin:10px 5px 5px 5px;" /></td>
						</tr>
						<?php } ?>
					</table>
				</td>
				<td style="width:50%; padding:1px;" valign="top" style="" colspan="">
					<table class="tbl-wo-1" border="0" align="left">
						<tr>
							<td colspan="3" height="30px" valign="top"> Requestor Verification : <br /> <i>(Name,Sign & Stamp)</i></td>
						</tr>
						<?php if(($this->session->userdata('usersess') == 'SEC') or ($this->session->userdata('usersess') == 'HKS')){?>
						<tr>
							<td colspan="3" height="40px">&nbsp; </td>
						</tr>
						<?php }else{ ?>

						<?php } ?>
						<tr>
							<td style="width:27.33%">&nbsp; </td>
							<td> Date : </td>
							<td>Time :</td>
						</tr>
					</table>
				</td>
			</tr>
			<?php if(($this->session->userdata('usersess') == 'SEC') or ($this->session->userdata('usersess') == 'HKS')){?>

			<?php }else{ ?>
			<tr>
				<td style="width:50%; padding:1px;" valign="top" style="" colspan="">
					<table class="tbl-wo-1" border="0" align="left">
						<tr>
							<td style="width:30%;" valign="top"> Equipment :</td>
							<td style="width:33%;" valign="top"><div class="box2"></div> Remained on-side </td>
							<td style="width:36%;"><div class="box2"></div> Released to Contractor <br/>
							<i style="padding-left:12px;">ETF Ref No : </i> </td>
						</tr>
						<tr>
							<td> Physical Condition :</td>
							<td><div class="box2"></div> Good </td>
							<td><div class="box2"></div> Not Good </td>
						</tr>
					</table>
				</td>
			</tr>
		<?php } ?>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center" height="5px"></td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="background-color:black; color:white;">
			<tr>
				<td align="center"><span style="font-weight:bold; text-transform: uppercase;">Work Order Request (Unscheduled Work Order)</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="" style="border: 1px solid black; ">
			<tr>
				<td rowspan="2" align="center">Assign to: <br />(Name / Staff No)</td>
				<td colspan="2" align="center">Start</td>
				<td colspan="2" align="center">End</td>
				<td rowspan="2" align="center">Part / Item Code</td>
				<td rowspan="2" align="center">Part / Item Descriptions</td>
				<td rowspan="2" align="center">Qty</td>
				<td rowspan="2" align="center">Rate</td>
			</tr>
			<tr>
				<td align="center">Date</td>
				<td align="center">Time</td>
				<td align="center">Date</td>
				<td align="center">Time</td>
			</tr>
			<tr>
				<td align="center">&nbsp;<?=($personallist[0][0]) ? $personallist[0][0] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[0][1]) ? $personallist[0][1] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[0][2]) ? $personallist[0][2] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[0][1]) ? $personallist[0][1] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[0][3]) ? $personallist[0][3] : ''?></td>
				<td align="center" style="width:15%;">&nbsp;</td>
				<td align="center">&nbsp;<?=($partlist[0][0]) ? $partlist[0][0] : ''?></td>
				<td align="center">&nbsp;<?=($partlist[0][1]) ? $partlist[0][1] : ''?></td>
				<td align="center">&nbsp;<?=($partlist[0][2]) ? $partlist[0][2] : ''?></td>
			</tr>
			<tr>
				<td align="center">&nbsp;<?=($personallist[1][0]) ? $personallist[1][0] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[1][1]) ? $personallist[1][1] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[1][2]) ? $personallist[1][2] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[1][1]) ? $personallist[1][1] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[1][3]) ? $personallist[1][3] : ''?></td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;<?=($partlist[1][0]) ? $partlist[1][0] : ''?></td>
				<td align="center">&nbsp;<?=($partlist[1][1]) ? $partlist[1][1] : ''?></td>
				<td align="center">&nbsp;<?=($partlist[1][2]) ? $partlist[1][2] : ''?></td>
			</tr>
			<tr>
				<td align="center">&nbsp;<?=($personallist[2][0]) ? $personallist[2][0] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[2][1]) ? $personallist[2][1] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[2][2]) ? $personallist[2][2] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[2][1]) ? $personallist[2][1] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[2][3]) ? $personallist[2][3] : ''?></td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;<?=($partlist[2][0]) ? $partlist[2][0] : ''?></td>
				<td align="center">&nbsp;<?=($partlist[2][1]) ? $partlist[2][1] : ''?></td>
				<td align="center">&nbsp;<?=($partlist[2][2]) ? $partlist[2][2] : ''?></td>
			</tr>
			<tr>
				<td align="center">&nbsp;<?=($personallist[3][0]) ? $personallist[3][0] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[3][1]) ? $personallist[3][1] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[3][2]) ? $personallist[3][2] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[3][1]) ? $personallist[3][1] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[3][3]) ? $personallist[3][3] : ''?></td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;<?=($partlist[3][0]) ? $partlist[3][0] : ''?></td>
				<td align="center">&nbsp;<?=($partlist[3][1]) ? $partlist[3][1] : ''?></td>
				<td align="center">&nbsp;<?=($partlist[3][2]) ? $partlist[3][2] : ''?></td>
			</tr>
			<tr>
				<td align="center">&nbsp;<?=($personallist[4][0]) ? $personallist[4][0] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[4][1]) ? $personallist[4][1] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[4][2]) ? $personallist[4][2] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[4][1]) ? $personallist[4][1] : ''?></td>
				<td align="center">&nbsp;<?=($personallist[4][3]) ? $personallist[4][3] : ''?></td>
				<td align="center">&nbsp;</td>
				<td align="center">&nbsp;<?=($partlist[4][0]) ? $partlist[4][0] : ''?></td>
				<td align="center">&nbsp;<?=($partlist[4][1]) ? $partlist[4][1] : ''?></td>
				<td align="center">&nbsp;<?=($partlist[4][2]) ? $partlist[4][2] : ''?></td>
			</tr>
			<tr>
				<td valign="top" height="60px" colspan="9" >
					<table class="tbl-wo-1" border="0" align="left">
						<tr>
							<td style="padding:1px;">Actual Work Done / Recommendation :</td>
						</tr>

						<tr>
							<td><?=($actiontaken[1][0]) ? $actiontaken[1][0] : ''?><hr class='dotted' style="margin:10px 5px 5px 5px;"/></td>
						</tr>
						<tr>
							<td><?=($actiontaken[2][0]) ? $actiontaken[2][0] : ''?><hr class='dotted' style="margin:10px 5px 5px 5px;"/></td>
						</tr>
						<tr>
							<td><?=($actiontaken[3][0]) ? $actiontaken[3][0] : ''?><hr class='dotted' style="margin:10px 5px 5px 5px;"/></td>
						</tr>
						<tr>
							<td><hr class='dotted' style="margin:10px 5px 5px 5px;"/></td>
						</tr>
					</table>
				</td>
			</tr>
			<?php if(($this->session->userdata('usersess') == 'SEC') or ($this->session->userdata('usersess') == 'HKS')){?>
			<tr>
			    <td valign="top" height="60px" colspan="9" >
					<table class="tbl-wo-1" border="0" align="left">
						<tr>
							<td style="padding:5px 5px 5px 25px; width:55px;">Remarks :</td>
							<td style="padding:3px;"><hr class='dotted' style="margin:10px 5px 5px 5px;"/></td>
						</tr>
						<tr>
							<td></td>
							<td style="padding:1px;"><hr class='dotted' style="margin:10px 5px 5px 5px;"/></td>
						</tr>
					</table>
			    </td>
			</tr>
			<?php }else{ ?>

			<?php } ?>

			<tr>
			<?php if(($this->session->userdata('usersess') == 'SEC') or ($this->session->userdata('usersess') == 'HKS')){?>
				<td style=" height:0px;border-bottom:1px solid white;border-right:1px solid black;border-left:1px solid black;margin:0px;padding:0px;" colspan="5" rowspan=""></td>
			<?php }else{ ?>
				<td style="width:50%; padding:0px 0px 0px 3px;" colspan="5" valign="top" heigth="10px" rowspan="">
					<table class="tbl-wo" border="0" align="left">
						<tr>
							<td style="width:33.33%;">Alternative Service :</td>
							<td style="width:33.33%;"><div class="box2"></div> Not Required</td>
							<td style="width:33.33%;"><div class="box2"></div> Required</td>
						</tr>
						<!-- <tr>
							<td></td>
							<td><div class="box2"></div> Contract Service</td>
						</tr -->
					</table>
				</td>
			<?php } ?>
			    <td style="width:50%; padding:1px;" colspan="5" valign="top"  rowspan="4">
					<table class="tbl-wo-1" border="0" align="left">
					<?php if(($this->session->userdata('usersess') == 'SEC') or ($this->session->userdata('usersess') == 'HKS')){?>
						<tr>
							<td colspan="3" height="30px">&nbsp;</td>
						</tr>
					<?php }else{ ?>
						<tr>
							<td style="width:33.33%;"> Performance Test :</td>
							<?php if (($recordjob) AND $recordjob[0]->v_ptest == 'Done') { ?>
							<td style="width:33.33%;"><div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> Pass</td>
							<td style="width:33.33%;"><div class="box2"></div> Fail</td>
							<?php } ?>
							<?php if (($recordjob) AND $recordjob[0]->v_ptest <> 'Done') { ?>
							<td style="width:33.33%;"><div class="box2"></div> Pass</td>
							<td style="width:33.33%;"><div class="box2"></div> Fail</td>
							<?php } ?>
							<?php if (!($recordjob)) { ?>
							<td style="width:33.33%;"><div class="box2"></div> Pass</td>
							<td style="width:33.33%;"><div class="box2"></div> Fail</td>
							<?php } ?>
						</tr>
						<tr>
							<td></td>
							<?php if (($recordjob) AND $recordjob[0]->v_ptest == 'Not Applicable') { ?>
							<td><div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> Not Applicable</td>
							<td><div class="box2"></div> Not Required </td>
							<?php } ?>
							<?php if (($recordjob) AND $recordjob[0]->v_ptest <> 'Not Applicable') { ?>
							<td><div class="box2"></div> Not Applicable</td>
							<td><div class="box2"></div> Not Required </td>
							<?php } ?>
							<?php if (!($recordjob)) { ?>
							<td><div class="box2"></div> Not Applicable</td>
							<td><div class="box2"></div> Not Required </td>
							<?php } ?>
						</tr>
						<tr>
							<td> Safety Test :</td>
							<?php if (($recordjob) AND $recordjob[0]->v_stest == 'Done') { ?>
							<?php if (($recordjob) AND $recordjob[0]->v_sstatus == 'Y') { ?>
							<td><div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> Pass</td>
							<td><div class="box2"></div> Fail</td>
							<?php } else { ?>
							<td><div class="box2"></div> Pass</td>
							<td><div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> Fail</td>
							<?php } ?>
							<?php } else { ?>
							<td><div class="box2"></div> Pass</td>
							<td><div class="box2"></div> Fail</td>
							<?php } ?>
						</tr>
						<tr>
							<td></td>
							<?php if (($recordjob) AND $recordjob[0]->v_stest == 'Not Applicable') { ?>
							<td><div class="box2"><img src="<?php echo base_url(); ?>images/tick2.png" class="img-tick"/></div> Not Applicable</td>
							<td><div class="box2"></div> Not Required </td>
							<?php } ?>
							<?php if (($recordjob) AND $recordjob[0]->v_stest <> 'Not Applicable') { ?>
							<td><div class="box2"></div> Not Applicable</td>
							<td><div class="box2"></div> Not Required </td>
							<?php } ?>
							<?php if (!($recordjob)) { ?>
							<td><div class="box2"></div> Not Applicable</td>
							<td><div class="box2"></div> Not Required </td>
							<?php } ?>
						</tr>
						<tr>
							<td height="20px;" valign="bottom">Specify : </td>
							<td colspan="2" valign="bottom"><!-- <hr style="margin:5px 5px 5px 0px;"/></td> -->
						</tr>
					<?php } ?>
						<tr>
							<td>Completed By : </td>
							<td><?=($recordjob) && isset($recordjob[0]->userr) && $recordjob[0]->userr <> 'N/A' ? $recordjob[0]->userr : ''?></td>
							<td>Date : <?=($recordjob) && isset($recordjob[0]->d_DateDone) ? date("d-m-Y",strtotime($recordjob[0]->d_DateDone)) : ''?></td>
						</tr>
						<tr>
							<td><i>(Name)</i> </td>
							<td></td>
							<td>Time : <?=($recordjob) && isset($recordjob[0]->v_time) ? $recordjob[0]->v_time : ''?></td>
						</tr>
					</table>
				</td>
			</tr>
			<?php if(($this->session->userdata('usersess') == 'SEC') or ($this->session->userdata('usersess') == 'HKS')){?>

			<?php }else{ ?>
			<tr>
			    <td style="width:50%; padding:0px 0px 0px 3px;" colspan="5">
			    	<table class="tbl-wo" border="0" align="left">
						<tr>
							<td style="width:25%;">Claim Status :</td>
							<td style="width:25%;"><div class="box2"></div> Not Reimbursable</td>
							<td style="width:25%;"><div class="box2"></div> Reimbursable</td>
							<td style="width:25%;"><div></div></td>
						</tr>
						<tr>
							<td>Reference No :</td>
							<td><hr class='dotted' style="margin:margin:10px 10px 10px 0px;height:10px;"/></td>
						</tr>

						<!-- tr style="border-top: 1px solid bl"> -->
							<td style="width:25%;"> Out-sourcing:</td>
							<td style="width:25%;"><div class="box2"></div> Not Required</td>
							<td style="width:25%;"><div class="box2"></div> 3rd Party</td>
							<td style="width:25%;"><div class="box2"></div> Contract Service</td>
						</tr>
					</table>
			    </td>
			</tr>
			<?php } ?>
			<tr>
			    <td style="width:50%; padding:0px 0px 0px 3px;" colspan="5" valign="top" heigth="10px" rowspan="2">
			    	<table class="tbl-wo" border="0" align="left">
						<tr>
							<td style="" colspan="3" valign="top" height="25px"> Recommendation / Report :</td>
						</tr>
						<tr>
							<td style="width:33.33%;"><div class="box2"></div> Advisory Service</td>
							<td style="width:33.33%;"><div class="box2"></div> BER</td>
							<td style="width:33.33%;"><div class="box2"></div> Condition Appraisal</td>
						</tr>
						<tr>
							<td><div class="box2"></div> Exemption</td>
							<td align="right"> <i>Reference No :</i></td>
							<td> <hr class='dotted' style="margin:margin:10px 10px 10px 0px;height:10px;"/></td>
						</tr>
					</table>
			    </td>
			</tr>
		</table>
		<table class="tbl-wo-1" border="0" align="center">
			<tr>
				<td align="center" height="5px"></td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="center" style="background-color:black; color:white;">
			<tr>
				<td align="center"><span style="font-weight:bold;">WORK ORDER COMPLETION VALIDATION</span></td>
			</tr>
		</table>
		<table class="tbl-wo" border="1" align="center" style="border: 1px solid black;">
			<tr>
				<td style="width:50%;" align="center"> Acceptance by Customer</td>
				<td style="width:50%;" valign="top" colspan="2" align="center"> For Office use only</td>
			</tr>
			<tr>
				<td style="padding:10px 0px 0px 3px;" class="tb-class" colspan="" rowspan="2" valign="top">
					<table class="tbl-wo" border="0" align="left" style="width:100%; height:100%;">
						<tr>
							<td valign="top">Signature :</td>
						</tr>
						<tr>
							<td valign="top">Name :</td>
						</tr>
						<tr>
							<td valign="top">Designation :</td>
						</tr>
						<tr>
							<td valign="top">Date :</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="padding:10px 0px 0px 3px;" class="tb-class" colspan="2">
					<table class="tbl-wo" border="0" align="left" style="width:100%;">
						<tr>
							<td valign="top">Signature :</td>
						</tr>
						<tr>
							<td valign="top">Name :</td>
						</tr>
						<tr>
							<td valign="top">Designation :</td>
						</tr>
						<tr>
							<td valign="top">Date :</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td style="padding-left:3px;" class="tb-class" colspan="2" valign="top">
					<table class="tbl-wo-1" border="0" align="left" style="width:100%; height:100%;">
						<tr>
							<td style="width:20%" valign="top">Quality Cause Code : QC</td>
							<td style="" valign="top"><hr class='dotted' style="margin:10px 5px 5px 0px; width:5%;"/></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table class="tbl-wo" border="0" align="">
			<tr>
				<td style="" valign="top" colspan="2"><span style="font-size:7px; padding-left:30px;"><i>Note: Tick (<span align="center" class="icon-check" style="font-size:7px;"></span>) where applicable.</i></span></td>
			</tr>
			<?php $usersess = $this->session->userdata('usersess');?>
			<?php if( in_array($usersess, array("HKS","SEC","FES","BES") ) ){?>
			<tr>
				<td style="" valign="top"><span style="font-size:7px; padding-left:30px;"><i>*Date and Time declared by APSB shall be deemed valid if NOT provided by the customer.</i></span></td>
				<td style="" valign="top" align="right"><span style="font-size:7px; padding-left:30px;"><i></i></span></td>
			</tr>
			<tr>
				<td style="" valign="top"><span style="font-size:7px; padding-left:30px;"><i></i></span></td>
				<td style="" valign="top" align="right"><span style="font-size:7px; padding-left:30px;"><i>Copyright product of Advance Pact Sdn Bhd. All rights reserved.</i></span></td>
			</tr>
			<tr>
				<td style="" valign="top"><span style="font-size:7px; padding-left:0px;">APSB-FORM</span></td>
				<?php if( $this->session->userdata('usersess') == 'SEC' || $this->session->userdata('usersess') == 'HKS' ){?>
				<td style="" valign="top" align="right"><span style="font-size:7px; padding-left:30px;">QP-001 : HF-012 : Revision 2.0 : 09 May 2018</span></td>
				<?php }elseif( $this->session->userdata('usersess') == 'BES' || $this->session->userdata('usersess') == 'FES' ){?>
				<td style="" valign="top" align="right"><span style="font-size:7px; padding-left:30px;">QP-001 : BFF-001 : Revision 2.0 : 09 May 2018</span></td>
				<?php } ?>
			</tr>
			<?php }else{ ?>
			<tr>
				<td style="" valign="top"><span style="font-size:7px; padding-left:30px;"><i>*Date and Time declared by APSB shall be deemed valid if NOT provided by the customer.</i></span></td>
				<td style="" valign="top" align="right"><span style="font-size:7px; padding-left:30px;"><i>Copyright product of Advance Pact Sdn Bhd. All rights reserved.</i></span></td>
			</tr>
			<?php } ?>
		</table>
	</div>
	<div class="StartNewPage" id="breakpage"><span id="pagebreak">Page Break</span></div>
		<div style="margin-top:px;">
			<table class="tbl-wo-2" style="width:70%; margin-left: 15%;">
				<tr>
					<td valign="" rowspan="" style="width:5%;"><img src="<?php echo base_url(); ?>images/logomsb.png" style="width:100px; height:80px;"/></td>
					<td valign=""><span style="font-weight:bold;">Advance Pact Sdn Bhd (412168-V) </span><br /><span style="font-weight:bold; color:blue;"><?= ($hosp[0]->v_HospitalName) ? $hosp[0]->v_HospitalName : 'NA' ?></span></td>
				</tr>
				<tr>
					<td valign="top" colspan="2" align="center"><span style="font-weight:bold; font-size:20px;"><u>RECEIPT OF REQUEST</u></span></td>
				</tr>
				<tr>
					<td valign="top" colspan="2" align="center"><span style="font-weight:bold; font-size:20px;">Advancepact - <span style="color:blue;"><?= ($hosp[0]->v_HospitalName) ? $hosp[0]->v_HospitalName : 'NA' ?></span></span></td>
				</tr>
				<tr>
					<td valign="top" colspan="2" align="center" style="height:40px;"></td>
				</tr>
				<tr>
					<td valign="top" colspan="2" align="right">Date : <?= date("j F Y") ?></td>
				</tr>
				<tr>
					<td valign="top" colspan="2">
						<table class="tbl-wo-2">
							<tr>
								<td width="9.5%">To Mr/Mrs</td>
								<td width="2.5%"> : </td>
								<td><span style="color:blue;"><?= ($woinfo[0]->V_requestor) ? $woinfo[0]->V_requestor : 'NA' ?></span></td>
							</tr>
							<tr>
								<td>Department</td>
								<td> : </td>
								<td><span style="color:blue;"><?= ($woinfo[0]->v_UserDeptDesc) ? $woinfo[0]->v_UserDeptDesc : 'NA' ?></span></td>
							</tr>
							<tr>
								<td>Extension</td>
								<td> : </td>
								<td><span style="color:blue;"><?= ($woinfo[0]->V_phone_no) ? $woinfo[0]->V_phone_no : 'NA' ?></span></td>
							</tr>
							<tr>
								<td colspan="3" style="height:30px;"></td>
							</tr>
							<tr>
								<td colspan="3">Dear Sir/Madam,</td>
							</tr>
							<tr>
								<td colspan="3">We hereby acknowledge receipt of your request for the following</td>
							</tr>
							<tr>
								<td colspan="3" style="height:20px;"></td>
							</tr>
							<tr>
								<td colspan="3" style="padding-left:60px;">
									<table class="tbl-w">
										<tr>
											<td width="35.5%">Request No</td>
											<td width="2.5%"> : </td>
											<td><span style="color:blue;"><?= ($wrk_ord) ? $wrk_ord : 'NA' ?></span></td>
										</tr>
										<tr>
											<td width="">Dated</td>
											<td width=""> : </td>
											<td><span style="color:blue;"><?= ($woinfo[0]->D_date) ? date('d F Y',strtotime($woinfo[0]->D_date)) : 'NA' ?></span></td>
										</tr>
										<tr>
											<td width="">Equipment</td>
											<td width=""> : </td>
											<td><span style="color:blue;"><?= ($woinfo[0]->V_Asset_no) ? $woinfo[0]->V_Asset_no : 'NA' ?></span></td>
										</tr>
										<tr>
											<td width="">Tag No</td>
											<td width=""> : </td>
											<td><span style="color:blue;"><?= ($woinfo[0]->V_Tag_no) ? $woinfo[0]->V_Tag_no : 'NA' ?></span></td>
										</tr>
										<tr>
											<td width="">At Location</td>
											<td width=""> : </td>
											<td><span style="color:blue;"><?= ($woinfo[0]->v_Location_Name) ? $woinfo[0]->v_Location_Name : 'NA' ?></span></td>
										</tr>
										<tr>
											<td width="" height="20px"></td>
										</tr>
										<tr>
											<td width="">Request Summary</td>
											<td width=""> : </td>
											<td><span style="color:blue;"><?= ($woinfo[0]->V_summary) ? $woinfo[0]->V_summary : 'NA' ?></span></td>
										</tr>
										<tr>
											<td width="" height="20px"></td>
										</tr>
										<tr>
											<td width="">Request Details</td>
											<td width=""> : </td>
											<td><span style="color:blue;"><?= ($woinfo[0]->V_details) ? $woinfo[0]->V_details : 'NA' ?></span></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="3" style="height:20px;"></td>
							</tr>
							<tr>
								<td colspan="3">Please be assured that action will be taken as soon as possible.</td>
							</tr>
							<tr>
								<td colspan="3" style="height:40px;"></td>
							</tr>
							<tr>
								<td colspan="3">Thank You.</td>
							</tr>
							<tr>
								<td colspan="" style="height:100px;" valign="bottom">
									<table class="tbl-wo-1" border="0" align="" style="border-top:1px solid black;">
										<tr>
											<td style="" valign="top"></td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="3" style="" valign="top">Engineer</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>
