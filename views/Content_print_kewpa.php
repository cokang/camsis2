<body>

	<div id="Instruction" class="pr-printer">
		<div class="header-pr"> KEW PA </div>

		<button onclick="javascript:myFunction('print_kewpa?wrk_ord=<?php echo $this->input->get('wrk_ord');?>&asstno=<?php echo $this->input->get('asstno');?>&none=closed&pr=<?php echo $print;?>');" class="btn-button btn-primary-button">PRINT</button>

		<button type="cancel" class="btn-button btn-primary-button" onclick="window.history.back()">CANCEL</button>
	</div>

<style>
table.tftabkew {
    font-size: 11px;
	font-weight: 400;
	 font-family: Arial, Helvetica, sans-serif;
    color: #333333;
    width: 90%;
    border-color: black;
    border-collapse: collapse;
   
	
}

.tbl-t {
    margin: auto;
    border-collapse: collapse;
    vertical-align: middle;
    width: 90%;
    font-size: 11px;
	font-weight: 400;
	 font-family: Arial, Helvetica, sans-serif;
}

.tftabkew-td-white {
    color: black;
    background: white;
    padding-left: 5px;
	height: 20px; 
	 font-size: 11px;
	  font-family: Arial, Helvetica, sans-serif;
	 font-weight: 400;
}


table.tfkewpa th {
height: 20px;
    font-size: 11px;
	 font-family: Arial, Helvetica, sans-serif;
    background-color: #b8b8b8;
    border-style: solid;
    border-color: black;
    text-align: center;
    color: black;
}
table.tfkewpa {
   border-color: black;
    border-collapse: collapse;
}

</style>

	<div class="form">
	
		<table class="tbl-wo" border="0" align="center" style="border: 0px; margin-top:50px;margin-bottom:20px;">
						
						<tr>
							<td align="center"><b style="text-transform: uppercase;font-size: 12px;">DAFTAR HARTA MODAL</b></td>
						</tr>
		</table>
		<table class="tbl-t" border="0" align="center"  >
			<tr>
				<td style="width:20%">Kementerian/Jabatan : </td>
				<td style=""></td>
				
			</tr>
			<tr>
				<td>Bahagian/Cawangan :</td>
				<td></td>				
			</tr>
		</table>

		<table class="tbl-wo" border="0" align="center" style="border: 0px; margin-top:10px;margin-bottom:10px;">
						
						<tr>
							<td align="center" style="text-transform: uppercase;font-size: 12px;">BAHAGIAN A</td>
						</tr>
		</table>

		<table  class="tftabkew" border="1" style="text-align:center; width:90%;" align="center">
			<tr>
				<td  class="tftabkew-td-white" align="left" width="20%">Kod Nasional</td>
				<td colspan="2" class="tftabkew-td-white" align="left"></td>
		
			</tr>
			<tr>
				<td  class="tftabkew-td-white" align="left" width="20%">Kategori</td>
				<td colspan="2" class="tftabkew-td-white" align="left"><?=$asset_UMDNS[0]->Type_Desc?></td>
			
			</tr>
			<tr>
				<td  class="tftabkew-td-white" align="left" width="20%">Sub Kategori</td>
				<td colspan="2" align="center"></td>
				
			</tr>
			<tr>
				<td  class="tftabkew-td-white" align="left" width="20%">Jenis/Jenama/Model</td>
				<td colspan="2" class="tftabkew-td-white" align="left"><?=$asset_det[0]->V_Brandname?></td>
	
			</tr>
			<tr>
				<td  class="tftabkew-td-white" align="left" width="20%">Buatan</td>
				<td class="tftabkew-td-white" align="left"><?=$asset_det[0]->V_Make?></td>
				<td rowspan="5" valign="top" style="width:50%;">	
				<table class="tftabkew"  style="text-align:center;width:100%;" >
			<tr>
				<td style="padding-left:5px;border-right:1px solid black;border-bottom:1px solid black;" align="left" width="10%">Harga Perolehan Asal</td>
				<td style="padding-left:5px;border-bottom:1px solid black;" width="20%"colspan="2" align="left"><?= ($asset_det[0]->N_Cost) ? 'RM'.$asset_det[0]->N_Cost : 'N/A'?></td>
	
			</tr>
			<tr>
				<td style="padding-left:5px;border-right:1px solid black;border-bottom:1px solid black;"  align="left" width="10%">Tarikh Dibeli/Tarikh Diterima</td>
				<td style="padding-left:5px;border-bottom:1px solid black;"colspan="2" align="left"><?= ($asset_det[0]->D_Register_date) ? ($asset_det[0]->D_Register_date != '0000-00-00 00:00:00' ? date("d-m-Y",strtotime($asset_det[0]->D_Register_date)) : '-' ) : 'N/A' ?></td>
			
			</tr>
			
			<tr>
				<td style="padding-left:5px;border-right:1px solid black;border-bottom:1px solid black;"  align="left" width="10%">No. Pesanan Rasmi Kerajaan/Kontrak</td>
				<td style="padding-left:5px;border-bottom:1px solid black;" align="left"><?=$asset_det[0]->V_File_Ref_no?></td>
				
			</tr>
			<tr>
				<td style="padding-left:5px;border-right:1px solid black;border-bottom:1px solid black;"  align="left" width="10%">Tempoh Jaminan</td>
				<?php if(strtotime($asset_det[0]->V_Wrn_end_code) > strtotime(date("Y-m-d H:i:s"))){?>
										<td style="padding-left:5px;border-bottom:1px solid black;" align="left"><?= isset($asset_det[0]->V_Wrn_end_code) ? (( $asset_det[0]->V_Wrn_end_code < time() ) ? '<span>Sah sehingga '.date_format(new DateTime($asset_det[0]->V_Wrn_end_code), 'd-m-Y').'</span>' : $asset_det[0]->V_Wrn_end_code) : 'N/A' ?></td>
										<?php } else {  ?>
										<td style="padding-left:5px;border-bottom:1px solid black;" align="left"><?= isset($asset_det[0]->V_Wrn_end_code) ? (( $asset_det[0]->V_Wrn_end_code < time() ) ? '<span>Telah tamat pada '.date_format(new DateTime($asset_det[0]->V_Wrn_end_code), 'd-m-Y').'</span>' : $asset_det[0]->V_Wrn_end_code) : 'N/A' ?></td>
										<?php }  ?>
										
			
				
			</tr>
			<tr style="height:0">
				<td colspan="2" style="padding-left:5px; padding-bottom:10px;border-bottom:1px solid black;"  align="top" width="0%">
				<table  class="tftabkew" border="0">
				<tr><td>
				Nama Pembekal Dan Alamat : 
				</td></tr>
				<tr><td align="center"><br><?=$asset_det[0]->v_vendorname?></td></tr>
				<tr><td align="center"><?=$asset_det[0]->v_address1?><br><?=$asset_det[0]->v_address2?><br><?=$asset_det[0]->v_address3?></td></tr>
				</table></td>
			
			</tr>
			<tr height="200" >
				<td colspan="2" align="left" width="20%"><table class="tftabkew"  border="0">
				<tr>
				<td style="padding-left:230px; padding-bottom:40px;"></td>
				</tr>
				<tr>
				<td style="padding-left:130px; padding-bottom:1px;">...............................</td>
				</tr>
				<tr>
				<td style="padding-left:100px; padding-bottom:1px;">*Tandatangan Ketua Jabatan</td>
				</tr>
				<tr>
				<td style="padding-left:5px;">Nama :</td>
				</tr>
				<tr>
				<td style="padding-left:5px;">Jawatan :</td>
				</tr>
				<tr>
				<td style="padding-left:5px;">Tarikh :</td>
				</tr>
				<tr>
				<td style="padding-left:5px;">Cap :</td>
				</tr>
				</table></td>
			
			</tr>
			</table></td>
			</tr>
			<tr>
				<td  class="tftabkew-td-white" align="left" >Jenis Dan No. Enjin</td>
				<td class="tftabkew-td-white" align="left"><?=$asset_det[0]->V_Brandname?>&nbsp;/&nbsp;<?=$asset_det[0]->V_Model_no?></td>
			</tr>
		    <tr>
				<td  class="tftabkew-td-white" align="left" >No. Casis/Siri Pembuat</td>
				<td class="tftabkew-td-white" align="left" ><?= isset($asset_det[0]->V_Serial_no) ? $asset_det[0]->V_Serial_no : 'N/A'?></td>	
			</tr>
			<tr>
				<td  class="tftabkew-td-white" align="left">No. Pendaftaran<br>(Bagi Kenderaan)</td>
				<td class="tftabkew-td-white" align="left"><?=$asset_det[0]->v_registrationno?></td>	
			</tr>
			<tr style="height:0px">
				<td  colspan="2"  class="tftabkew-td-white"  valign="top" width="20%">
				<table class="tftabkew" width="100%" border="0">	
									<tr>
										<td colspan="2">Spesifikasi/Catatan :</td>
										
									</tr>
									<tr>
										<td class="tftabkew-td-white">Make&nbsp;(Country&nbsp;of&nbsp;Origin)&nbsp;:&nbsp;</td>
										<td><?=$asset_det[0]->V_Make?></td>
									</tr>
									<tr>
										<td class="tftabkew-td-white">Manufacturer&nbsp;:&nbsp;</td>
										<td><?=$asset_det[0]->V_Manufacturer?></a></td>
									</tr>
									<tr>
										<td class="tftabkew-td-white">Brand&nbsp;:&nbsp;</td>
										<td><?=$asset_det[0]->V_Brandname?></a></td>
									</tr>
									<tr>
										<td class="tftabkew-td-white">Model&nbsp;:&nbsp;</td>
										<td><?=$asset_det[0]->V_Model_no?></a></td>
									</tr>
									<tr>
										<td class="tftabkew-td-white">Serial&nbsp;Number&nbsp;:&nbsp;</td>
										<td><?=$asset_det[0]->V_Serial_no?></a></td>
									</tr>
									<tr>
										<td class="tftabkew-td-white">Capacity&nbsp;:&nbsp;</td>
										<td><?=$asset_det[0]->v_Capacity?> <?=$asset_det[0]->V_capacityunit?></td>
									</tr>
									<tr>
										<td class="tftabkew-td-white">Depreciation&nbsp;:&nbsp;</td>
										<td><?=$asset_det[0]->V_Depreciation?> years</a></td>
									</tr>
									<tr>
										<td class="tftabkew-td-white">Life span&nbsp;:&nbsp;</td>
										<td><?=$asset_det[0]->V_Lifespan?> years</a></td>
									</tr>
									<tr>
										<td class="tftabkew-td-white">OP Hours Code&nbsp;:&nbsp;</td>
										<td><?=$asset_det[0]->V_Oper_Hr_code?></a></td>
									</tr>
									<tr>
										<td class="tftabkew-td-white">Manual / Drawing Ref No&nbsp;:&nbsp;</td>
										<td><?=$asset_det[0]->V_Mnl_Draw_no?></a></td>
									</tr>
									<tr>
										<td class="tftabkew-td-white">Procedure Code&nbsp;:&nbsp;</td>
										<td><?=$asset_det[0]->V_Procedure_code?></a></td>
									</tr>																															
								</table></td>								
			</tr>
			
		</table>
      
	
<table  class="tfkewpa" border="1" style="text-align:center; width:90%;margin-top:30px;margin-bottom:20px;" align="center">
		<th colspan="5">
		PENEMPATAN
		</th>
			<tr>
				<td  class="tftabkew-td-white" align="left" style="height:30px" width="5%">Lokasi</td>
				<td align="center"></td>
		        <td align="center"></td>
				<td  align="center"></td>
				<td align="center"></td>
			</tr>
			<tr>
				<td  class="tftabkew-td-white" align="left" >Tarikh</td>
				<td  align="center"></td>
				<td align="center"></td>
				<td  align="center"></td>
				<td  align="center"></td>
			
			</tr>
			<tr>
				<td  class="tftabkew-td-white" align="left" >Nama Pegawai</td>
				<td align="center"></td>
				<td align="center"></td>
				<td align="center"></td>
				<td align="center"></td>
				
			</tr>
			
		</table>
		<table  class="tfkewpa" border="1" style="text-align:center; width:90%;margin-top:30px;margin-bottom:20px;" align="center">
		<th colspan="5">
		PEMERIKSAAN
		</th>
			<tr>
				<td  class="tftabkew-td-white" align="left" width="5%">Tarikh</td>
				<td align="center"></td>
		        <td align="center"></td>
				<td  align="center"></td>
				<td align="center"></td>
			</tr>
			<tr>
				<td  class="tftabkew-td-white" align="left" >Status Aset</td>
				<td  align="center"></td>
				<td align="center"></td>
				<td  align="center"></td>
				<td  align="center"></td>
			
			</tr>
			<tr>
				<td  class="tftabkew-td-white" align="left" >Nama Pemeriksa</td>
				<td align="center"></td>
				<td align="center"></td>
				<td align="center"></td>
				<td align="center"></td>
				
			</tr>
			
		</table>
      <table  class="tfkewpa" border="1" style="text-align:center; width:90%;margin-top:30px;margin-bottom:20px;" align="center">
		<th colspan="4">
		PELUPUSAN/HAPUS KIRA/PINDAHAN
		</th>
			<tr>
				<td  class="tftabkew-td-white" align="center" width="20%">Rujukan Kelulusan</td>
				<td  class="tftabkew-td-white" align="center" width="15%">Tarikh</td>
		       <td  class="tftabkew-td-white" align="center">Kaedah</td>
				<td  class="tftabkew-td-white" align="center" width="20%">Tandatangan</td>
				
			</tr>
			
			<tr>
				<td class="tftabkew-td-white" align="center" style="height:25px;">&nbsp;&nbsp;</td>
				<td class="tftabkew-td-white" align="center" >&nbsp;&nbsp;</td>
				<td class="tftabkew-td-white" align="center" >&nbsp;&nbsp;</td>
				<td class="tftabkew-td-white" align="center" >&nbsp;&nbsp;</td>
				
				
			</tr>
			
		</table>
<table class="tbl-t" border="0" align="center" style="font-size: 10px;" >
			<tr>
				<td style="width:100%;padding-bottom:20px;">*Nota: Ketua Jabatan adalah termasuk Ketua Bahagian/ Seksyen/Unit. </td>
				<td style=""></td>
				
			</tr>
		
		</table>

</div>
	</body>
</html>

