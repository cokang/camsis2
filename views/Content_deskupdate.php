<div class="ui-middle-screen">
	<div class="content-workorder" align="center">
		<table width="80%" class="ui-content-middle-menu-workorder" border="0" style=" border-radius:2px solid #398074;" >
			<tr class="ui-color-contents-style-1" height="30px">
				<td colspan="2" class="ui-header-new" style=""><b>UpdateComplaint</b></td>
			</tr>
			<tr class="ui-content-form-2" style="width: 10%;">
				<td class="ui-desk-style-table" width="50%">
					<table class="" width="100%" border="0"  height="100%" style="color:black;">
						<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Details</td></tr>	
						<tr>
							<td style="padding-left:10px;" width="50%">Complaint Number : </td>
							<td style="padding-left:10px;" width="50%"><input type="text" name="V_requestor" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Requested By :  </td>
							<td style="padding-left:10px;"><input type="text" name="V_requestor" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;" valign="top">Designation : </td>
							<td style="padding-left:10px;" valign="top">	
								<input type="radio" name="V_MohDesg" value="Doctor">Doctor<br>
								<input type="radio" name="V_MohDesg" value="Matron">Matron<br>
								<input type="radio" name="V_MohDesg" value="MedicalAssistant">Medical Assistant<br>
								<input type="radio" name="V_MohDesg" value="Officer">Officer<br>
								<input type="radio" name="V_MohDesg" value="PMSB">PMSB<br>
								<input type="radio" name="V_MohDesg" value="Sister In-Charge">Sister In-Charge<br>
								<input type="radio" name="V_MohDesg" value="Sister On Duty">Sister On Duty<br>
								<input type="radio" name="V_MohDesg" value="Specialist">Specialist<br>
								<input type="radio" name="V_MohDesg" value="Staff Nurse">Staff Nurse<br>
								<input type="radio" name="V_MohDesg" value="Supervisor">Supervisor<br>
							</td>
						</tr>
						<tr>
							<td style="padding-left:10px;" valign="top">Complaint Date : </td>
							<td style="padding-left:10px;"><input type="time" name="D_date" value="current"></td>
						</tr>
						<tr>
							<td style="padding-left:10px;" valign="top">Complaint Date : </td>
							<td style="padding-left:10px;">
								<select class="InputText" name="fHour">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15" selected>15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
								</select>
								<select class="InputText" name="fMinute">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19" selected>19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
									<option value="51">51</option>
									<option value="52">52</option>
									<option value="53">53</option>
									<option value="54">54</option>
									<option value="55">55</option>
									<option value="56">56</option>
									<option value="57">57</option>
									<option value="58">58</option>
									<option value="59">59</option>
								</select>
							</td>
						</tr>
						<tr>
							<td style="padding-left:10px;" valign="top">Priority :  </td>
							<td style="padding-left:10px;" valign="top">	
								<input type="radio" name="V_priority_code" value="Normal" checked="checked" >Normal<br>
								<input type="radio" name="V_priority_code" value="Emergency" ><span style="color:red;">Emergency</span><br>
							</td>
						</tr>
						<tr>
							<td style="padding-left:10px;" valign="top">Source :  </td>
							<td style="padding-left:10px;" valign="top">	
								<input type="radio" name="V_request_type" value="MOH" checked="checked" <?php echo set_radio('V_request_type', 'MOH'); ?>>MOH<br>
								<input type="radio" name="V_request_type" value="SIHAT" <?php echo set_radio('V_request_type', 'SIHAT'); ?>>SIHAT<br>
							</td>
						</tr>
						<tr>
							<td style="padding-left:10px;" valign="top">NCR No : </td>
						</tr>
						<tr>
							<td style="padding-left:10px;" valign="top">VCM Month :  </td>
						</tr>
						<tr>
							<td style="padding-left:10px;" valign="top">VCM Year :   </td>
						</tr>	
						<tr>
							<td style="padding-left:10px;" valign="top">Summary : </td>
							<td style="padding-left:10px;"><textarea class="InputText" name="V_summary" cols="25" rows="5"></textarea></td>
						</tr>	
						<tr>
							<td style="padding-left:10px;" valign="top">Description : </td>
							<td style="padding-left:10px;"><textarea class="InputText" name="V_details" cols="25" rows="5"></textarea></td>
						</tr>
					</table>
				</td>
				<td class="ui-desk-style-table" valign="top">
					<table style="color:black;" width="100%" border="0">
						<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Details of Related Request</td></tr>	
						<tr>
							<td style="padding-left:10px;" width="50%">Request Number : </td>
							<td style="padding-left:10px;" width="50%"><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Request Status :  </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Requested By : </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Designation : </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Requested On : </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value="" size="8"><input type="text" name="FirstName" value="" size="7"></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Priority : </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;" valign="top">Summary : </td>
							<td style="padding-left:10px;"><textarea class="InputText" name="" cols="22" rows="5"></textarea></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Asset Number :  </td>
							<td style="padding-left:10px;"><input type="text" name="asset_no" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Asset Tag Number : </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Asset Serial Number : </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Asset Name : </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Phone Number : </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">User Department : </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>	
						<tr>
							<td style="padding-left:10px;">Location :  </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>	
						<tr>
							<td style="padding-left:10px;">Request Closed On : </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value="" size="8"><input type="text" name="FirstName" value="" size="7"></td>
						</tr>
						<tr>
							<td colspan="2" height="178px">&nbsp;</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-content-form-2">
				<td class="ui-desk-style-table" colspan="2">
					<table  width="100%" border="0" style="color:black;">
						<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Location</td></tr>		
						<tr>
							<td style="padding-left:10px;" width="25%">Phone Number :  </td>
							<td style="padding-left:10px;" width=""><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">User Department :   </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">&nbsp; </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Location : </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">&nbsp; </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-content-form-2">
				<td class="ui-desk-style-table" colspan="2">
					<table  width="100%" border="0" style="color:black;">
						<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Related Asset</td></tr>		
						<tr>
							<td style="padding-left:10px;" width="25%">Asset Number :  </td>
							<td style="padding-left:10px;"><input type="text" name="asset_no" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Asset Tag Number : </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Asset Name : </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Asset Serial Number : </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Warranty Expiry Date :  </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-content-form-2">
				<td class="ui-desk-style-table" colspan="2">
					<table  width="100%" border="0" style="color:black;">
						<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Follow Up Information</td></tr>		
						<tr>
							<td style="padding-left:10px;" width="25%">Personnel Code :   </td>
							<td style="padding-left:10px;" ><input type="text" name="V_User_dept_code" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Personnel Name :   </td>
							<td style="padding-left:10px;"><input type="text" name="V_respon" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Designation :  </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Start Date : </td>
							<td style="padding-left:10px;"><input type="date" name="startdate" value=""></td>
						</tr>
						<tr>
							<td style="padding-left:10px;">Start  Time :   </td>
							<td style="padding-left:10px;">
								<select class="InputText" name="fHour">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15" selected>15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
								</select>
								<select class="InputText" name="fMinute">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19" selected>19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
									<option value="51">51</option>
									<option value="52">52</option>
									<option value="53">53</option>
									<option value="54">54</option>
									<option value="55">55</option>
									<option value="56">56</option>
									<option value="57">57</option>
									<option value="58">58</option>
									<option value="59">59</option>
								</select>
							</td>
						</tr>
						<tr>
							<td style="padding-left:10px;">End Date :   </td>
							<td style="padding-left:10px;"><input type="date" name="enddate" value=""></td>
						</tr>	
						<tr>
							<td style="padding-left:10px;">End Time :   </td>
							<td style="padding-left:10px;">
								<select class="InputText" name="fHour">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15" selected>15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
								</select>
								<select class="InputText" name="fMinute">
									<option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8</option>
									<option value="9">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19" selected>19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
									<option value="51">51</option>
									<option value="52">52</option>
									<option value="53">53</option>
									<option value="54">54</option>
									<option value="55">55</option>
									<option value="56">56</option>
									<option value="57">57</option>
									<option value="58">58</option>
									<option value="59">59</option>
								</select>
							</td>
						</tr>
						<tr>
							<td style="padding-left:10px;" valign="top">Action Taken :  </td>
							<td style="padding-left:10px;"><textarea class="InputText" name="" cols="25" rows="5"></textarea></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-content-form-2">
				<td class="ui-desk-style-table" colspan="2">
					<table  width="100%" border="0" style="color:black;">
						<tr><td colspan="2" class="ui-bottom-border-color" style="font-weight: bold;">Closing</td></tr>		
						<tr>
							<td style="padding-left:10px;" width="25%">Close Date :    </td>
							<td style="padding-left:10px;"><input type="text" name="FirstName" value=""></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr class="ui-header-new" style="height:40px;" style="">
				<td align="center" colspan="2" style="border-bottom-left-radius:10px; border-bottom-right-radius:10px;">
					<button type="button">Save</button><button type="button">Clear</button>
				</td>
			</tr>
		</table>
	</div>	
</div>