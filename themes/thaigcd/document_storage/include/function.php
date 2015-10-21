<?
function send_member_profile($email,$password)
{
$headers = "MIME-Version: 1.0" . "\r\n";
$headers.= "Content-Type: text/html; charset=tis-620"."\r\n"; 
$headers .= "From: info@logisticsdb.com \r\n";


$subject = "Account created successfully!";



$message="Thanks for your interest in Warehouse Resources in Thailand by logisticsdb.com.<br>
<br>
Your username: ".$email."<br>
Your password: ".$password."<br>
<br>
<br>
Best Regards,<br>
<br>
Warehouse Resources in Thailand by logisticsdb.com.<br>
<br>
<a href='http://www.logisticsdb.com/warehouse/'>www.logisticsdb.com/warehouse</a><br>
<br>
";
												
			
								
			mail($email,$subject,$message,$headers);
}
?>

<?
function c2thai_date($tdate)
{
$adate = explode("-",$tdate);
$expdate = $adate[2];
/////cyear2thai
$expyear = $adate[0]+543;
//$expyear = substr($expyear,2,2);
//////cmonth2thai
switch($adate[1])
{
case "1":
	$expdate = $expdate."-มกราคม-".$expyear;
	break;
case "2":
	$expdate = $expdate."-กุมภาพันธ์-".$expyear;
	break;
case "3":
	$expdate = $expdate."-มีนาคม-".$expyear;
	break;
	case "4":
	$expdate = $expdate."-เมษายน-".$expyear;
	break;
	case "5":
	$expdate = $expdate."-พฤษภาคม-".$expyear;
	break;
	case "6":
	$expdate = $expdate."-มิถุนายน-".$expyear;
	break;
	case "7":
	$expdate = $expdate."-กรกฏาคม-".$expyear;
	break;
	case "8":
	$expdate = $expdate."-สิงหาคม-".$expyear;
	break;
	case "9":
	$expdate = $expdate."-กันยายน-".$expyear;
	break;
	case "10":
	$expdate = $expdate."-ตุลาคม-".$expyear;
	break;
	case "11":
	$expdate = $expdate."-พฤศจิกายน-".$expyear;
	break;	
	case "12":
	$expdate = $expdate."-ธันวาคม-".$expyear;
	break;	
}

return $expdate;

}
?>
<?
function show_view1($post_no)
{
						$sql = " select * from post_tbl inner join  member on post_tbl.member_id = member.member_id where post_item=".$post_no;
						$sresult=mysql_query($sql);
						$srow = mysql_fetch_array($sresult);			
?>
<table width="100%" border="0" cellpadding="3" cellspacing="1">
                <tr>
                  <td height="20"><span class="HG">View Post</span></td>
                </tr>
                <tr>
                  <td height="20"><span class="s12bv"><br>
                    หัวข้อประกาศ 
                        <?=$srow['subject'];?>
</span></td>
                </tr>
                <tr>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="6">
                    <tr>
                      <td width="23%" height="16" align="left"><strong>Select Category </strong></td>
                      <td width="77%" height="16" align="left" valign="top">
                                          <?
										   if($srow['cat_id']==1)echo "Warehouse for rent";
                                           if($row['cat_id']==3)echo "Material handling equipment for rent";
                                           if($row['cat_id']==5)echo "Land for rent";
                                           if($row['cat_id']==2)echo "Warehouse for sale";
                                           if($row['cat_id']==4)echo "Material handling equipment for sale";
                                           if($row['cat_id']==6)echo "Land for sale";
                                            if($row['cat_id']==7)echo "Warehouse construction service";
                                            if($row['cat_id']==8)echo "Software";
                                            if($row['cat_id']==9)echo "Other";
											?>					  </td>
                    </tr>
                    <tr>
                      <td height="16" align="left" valign="top"><strong>Details</strong></td>
                      <td height="16" align="left" valign="top"><?=$srow['detail'];?></td>
                    </tr>
                  </table>                  </tr>
                <tr>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                      <td bgcolor="#F4F4F4"><img src="image/page/null.gif" width="1" height="2"></td>
                    </tr>
                  </table>                  </tr>
                <tr>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="6">
                                            <tr>
                                              <td width="23%" align="left" valign="top"><strong>Photo</strong></td>
                                              <td colspan="2" rowspan="2" align="left" valign="top"><strong>Contact</strong></td>
                                            </tr>
                                            <tr>
                                              <td rowspan="3" align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                                                <tr>
                                                  <td align="center"><? if($srow['post_photo']!='')
								  {
								  ?>
                                                    <img src="post_photo/<?=$srow['post_photo'];?>" width="140" height="105" border="0">
                                                    <?
								  }
								  ?></td>
                                                </tr>
                                                <tr>
                                                  <td align="center"><? if($srow['post_photo_2']!='')
								  {
								  ?>
                                                    <img src="post_photo/<?=$srow['post_photo_2'];?>" width="140" height="105" border="0">
                                                    <?
								  }
								  ?></td>
                                                </tr>
                                                <tr>
                                                  <td align="center"><? if($srow['post_photo_3']!='')
								  {
								  ?>
                                                    <img src="post_photo/<?=$srow['post_photo_3'];?>" width="140" height="105" border="0">
                                                    <?
								  }
								  ?></td>
                                                </tr>
                                                <tr>
                                                  <td align="center"><? if($srow['post_photo_4']!='')
								  {
								  ?>
                                                    <img src="post_photo/<?=$srow['post_photo_4'];?>" width="140" height="105" border="0">
                                                    <?
								  }
								  ?></td>
                                                </tr>
                                                <tr>
                                                  <td align="center"><? if($srow['post_photo_5']!='')
								  {
								  ?>
                                                    <img src="post_photo/<?=$srow['post_photo_5'];?>" width="140" height="105" border="0">
                                                    <?
								  }
								  ?></td>
                                                </tr>
                                              </table></td>
                                            </tr>
                                            <tr>
                                              <td height="99" colspan="2" align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                                                <tr>
                                                  <td height="16"><?=$srow['f_name'];?></td>
                                                </tr>
                                                <tr>
                                                  <td height="16"><?=$srow['c_name'];?></td>
                                                </tr>
                                                <tr>
                                                  <td height="16"><?=$srow['phone'];?></td>
                                                </tr>
                                                <tr>
                                                  <td height="16"><?=$srow['email'];?></td>
                                                </tr>
                                                <tr>
                                                  <td height="16"><?=$srow['address'];?></td>
                                                </tr>
                                              </table></td>
                                            </tr>
                                            <tr>
                                              <td width="34%" align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                                                <tr valign="top">
                                                  <td height="25" align="left" valign="middle"><strong>Price Range</strong></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="16" align="left"><?=$srow['price'];?>                          
                                                  baht/sqm 
&nbsp;                                                  <?if($srow['negotiable']!='')echo "negotiable";?></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="25" align="left" valign="middle"><strong>Area </strong></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="16" align="left"><?
													 	$iresult = mysql_query("select * from post_location where post_no=".$srow['post_item']);
														 while($irow=mysql_fetch_array($iresult))
														 {
																	$sql ="select * from province_tbl where province_id=".$irow['province_id'];
																	$ssresult  = mysql_query($sql);
																	$province = mysql_fetch_array($ssresult);
																	
																	$sql = "select * from district_tbl where dist_id=".$irow['district_id'];
																	$ssresult  = mysql_query($sql);
																	$district = mysql_fetch_array($ssresult);
																	
																	echo  $district['dist_name_en'].",   ". $province['province_name_en']."";
														 }
												  ?></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="16" align="left"></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="25" align="left" valign="middle"><strong>Floor Space</strong></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="16" align="left"><?=$srow['floor_space'];?> sqm</td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="25" align="left" valign="middle"><strong>Ceiling Height </strong></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="16" align="left"><?=$srow['ceilling_height'];?> metre </td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="25" align="left" valign="middle"><strong>Loading capacity per sqm </strong></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="16" align="left"><?=$srow['capacity'];?>
                                                  &nbsp;ton</td>
                                                </tr>
                                              </table></td>
                                              <td width="43%" align="left" valign="top"><table width="92%" border="0" align="left" cellpadding="0" cellspacing="2">
                                                      <tr>
                                                        <td height="22" colspan="2" align="left"><strong>Special Facilities Offered </strong></td>
                                                      </tr>
                                                      <?
$sql = "select * from post_option where post_no=".$srow['post_item'];
$iresult = mysql_query($sql);
$irow = mysql_fetch_array($iresult);
?>
                                                      <tr>
                                                        <td width="7%" align="center"><input name="spf1" type="checkbox" id="spf1" value="1" <? if($irow['rail_access']!='')echo "checked";?>></td>
                                                        <td width="93%" align="left">Rail Access</td>
                                                      </tr>
                                                      <tr>
                                                        <td align="center"><input name="spf2" type="checkbox" id="spf2" value="1"  <? if($irow['trail_parking']!='')echo "checked";?>></td>
                                                        <td align="left">Trailer Parking</td>
                                                      </tr>
                                                      <tr>
                                                        <td align="center"><input name="spf3" type="checkbox" id="spf3" value="1"  <? if($irow['drive_docks']!='')echo "checked";?>></td>
                                                        <td align="left">Drive-in Docks</td>
                                                      </tr>
                                                      <tr>
                                                        <td align="center"><input name="spf4" type="checkbox" id="spf4" value="1"  <? if($irow['refrigerated']!='')echo "checked";?>></td>
                                                        <td align="left">Refrigerated / Frozen</td>
                                                      </tr>
                                                      <tr>
                                                        <td align="center"><input name="spf5" type="checkbox" id="spf5" value="1"  <? if($irow['break_bulk']!='')echo "checked";?>></td>
                                                        <td align="left">Break-Bulk</td>
                                                      </tr>
                                                      <tr>
                                                        <td width="7%" align="center"><input name="spf6" type="checkbox" id="spf6" value="1"  <? if($irow['cross_dock']!='')echo "checked";?>></td>
                                                        <td align="left">Cross-Dock</td>
                                                      </tr>
                                                      <tr>
                                                        <td align="center"><input name="spf7" type="checkbox" id="spf7" value="1"  <? if($irow['transload']!='')echo "checked";?>></td>
                                                        <td align="left">Transload</td>
                                                      </tr>
                                                      <tr>
                                                        <td align="center"><input name="spf8" type="checkbox" id="spf8" value="1"  <? if($irow['handle_hazard']!='')echo "checked";?>></td>
                                                        <td align="left">Conformity to handle Hazard Material</td>
                                                      </tr>
                                                      <tr>
                                                        <td width="7%" align="center"><input name="spf9" type="checkbox" id="spf9" value="1"  <? if($irow['racked']!='')echo "checked";?>></td>
                                                        <td align="left">Racked</td>
                                                      </tr>
                                                      <tr>
                                                        <td align="center"><input name="spf10" type="checkbox" id="spf10" value="1"  <? if($irow['bulk_space']!='')echo "checked";?>></td>
                                                        <td align="left">Bulk Space</td>
                                                      </tr>
                                                      <tr>
                                                        <td width="7%" align="center"><input name="spf12" type="checkbox" id="spf12" value="1"  <? if($irow['bonded']!='')echo "checked";?>></td>
                                                        <td align="left">Bonded</td>
                                                      </tr>
                                                    <input name="spf11" type="hidden" id="spf11">
                                                  </table></td>
                                            </tr>
                    
                    
                  </table>                  </tr>
                <tr>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                      <td bgcolor="#F4F4F4"><img src="image/page/null.gif" width="1" height="2"></td>
                    </tr>
                  </table>                                    </tr>
              </table>
<?
}
?>

<?
function show_view2($post_no)
{
						$sql = " select * from post_tbl inner join  member on post_tbl.member_id = member.member_id where post_item=".$post_no;
						$sresult=mysql_query($sql);
						$srow = mysql_fetch_array($sresult);			
?>
<table width="100%" border="0" cellpadding="3" cellspacing="1">
                <tr>
                  <td height="20"><span class="HG">View Post</span></td>
                </tr>
                <tr>
                  <td height="20"><span class="s12bv"><br>
                    หัวข้อประกาศ 
                        <?=$srow['subject'];?>
</span></td>
                </tr>
                <tr>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="6">
                    <tr>
                      <td width="23%" height="16" align="left"><strong>Select Category </strong></td>
                      <td width="77%" height="16" align="left" valign="top">
                                          <?
										   if($srow['cat_id']==1)echo "Warehouse for rent";
                                           if($row['cat_id']==3)echo "Material handling equipment for rent";
                                           if($row['cat_id']==5)echo "Land for rent";
                                           if($row['cat_id']==2)echo "Warehouse for sale";
                                           if($row['cat_id']==4)echo "Material handling equipment for sale";
                                           if($row['cat_id']==6)echo "Land for sale";
                                            if($row['cat_id']==7)echo "Warehouse construction service";
                                            if($row['cat_id']==8)echo "Software";
                                            if($row['cat_id']==9)echo "Other";
											?>					  </td>
                    </tr>
                    <tr>
                      <td height="16" align="left" valign="top"><strong>Details</strong></td>
                      <td height="16" align="left" valign="top"><?=$srow['detail'];?></td>
                    </tr>
                  </table>                  </tr>
                <tr>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                      <td bgcolor="#F4F4F4"><img src="image/page/null.gif" width="1" height="2"></td>
                    </tr>
                  </table>                  </tr>
                <tr>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="6">
                                            <tr>
                                              <td width="23%" align="left" valign="top"><strong>Photo</strong></td>
                                              <td colspan="2" rowspan="2" align="left" valign="top"><strong>Contact</strong></td>
                                            </tr>
                                            <tr>
                                              <td rowspan="3" align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                                                <tr>
                                                  <td align="center"><? if($srow['post_photo']!='')
								  {
								  ?>
                                                    <img src="post_photo/<?=$srow['post_photo'];?>" width="140" height="105" border="0">
                                                    <?
								  }
								  ?></td>
                                                </tr>
                                                <tr>
                                                  <td align="center"><? if($srow['post_photo_2']!='')
								  {
								  ?>
                                                    <img src="post_photo/<?=$srow['post_photo_2'];?>" width="140" height="105" border="0">
                                                    <?
								  }
								  ?></td>
                                                </tr>
                                                <tr>
                                                  <td align="center"><? if($srow['post_photo_3']!='')
								  {
								  ?>
                                                    <img src="post_photo/<?=$srow['post_photo_3'];?>" width="140" height="105" border="0">
                                                    <?
								  }
								  ?></td>
                                                </tr>
                                                <tr>
                                                  <td align="center"><? if($srow['post_photo_4']!='')
								  {
								  ?>
                                                    <img src="post_photo/<?=$srow['post_photo_4'];?>" width="140" height="105" border="0">
                                                    <?
								  }
								  ?></td>
                                                </tr>
                                                <tr>
                                                  <td align="center"><? if($srow['post_photo_5']!='')
								  {
								  ?>
                                                    <img src="post_photo/<?=$srow['post_photo_5'];?>" width="140" height="105" border="0">
                                                    <?
								  }
								  ?></td>
                                                </tr>
                                              </table></td>
                                            </tr>
                                            <tr>
                                              <td height="99" colspan="2" align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                                                <tr>
                                                  <td height="16"><?=$srow['f_name'];?></td>
                                                </tr>
                                                <tr>
                                                  <td height="16"><?=$srow['c_name'];?></td>
                                                </tr>
                                                <tr>
                                                  <td height="16"><?=$srow['phone'];?></td>
                                                </tr>
                                                <tr>
                                                  <td height="16"><?=$srow['email'];?></td>
                                                </tr>
                                                <tr>
                                                  <td height="16"><?=$srow['address'];?></td>
                                                </tr>
                                              </table></td>
                                            </tr>
                                            <tr>
                                              <td width="34%" align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                                                <tr valign="top">
                                                  <td height="25" align="left" valign="middle"><strong>Price Range</strong></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="16" align="left"><?=number_format($srow['price'],2);?>                          
                                                  baht/sqm 
&nbsp;                                                  <?if($srow['negotiable']!='')echo "negotiable";?></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="25" align="left" valign="middle"><strong>Area </strong></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="16" align="left"><?
													 	$iresult = mysql_query("select * from post_location where post_no=".$srow['post_item']);
														 while($irow=mysql_fetch_array($iresult))
														 {
																	$sql ="select * from province_tbl where province_id=".$irow['province_id'];
																	$ssresult  = mysql_query($sql);
																	$province = mysql_fetch_array($ssresult);
																	
																	$sql = "select * from district_tbl where dist_id=".$irow['district_id'];
																	$ssresult  = mysql_query($sql);
																	$district = mysql_fetch_array($ssresult);
																	
																	echo  $district['dist_name_en'].",   ". $province['province_name_en']."";
														 }
												  ?></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="16" align="left"></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="25" align="left" valign="middle"><strong>Floor Space</strong></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="16" align="left"><?=$srow['space_rai'];?> 
                                                  Rai  <?=$srow['space_sqw'];?> sqw  <?=$srow['space_sqm'];?> sqm</td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="25" align="left" valign="middle"><strong>Ceiling Height </strong></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="16" align="left"><?=$srow['ceilling_height'];?> metre </td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="25" align="left" valign="middle"><strong>Loading capacity per sqm </strong></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="16" align="left"><?=$srow['capacity'];?>
                                                  &nbsp;ton</td>
                                                </tr>
                                              </table></td>
                                              <td width="43%" align="left" valign="top"><table width="92%" border="0" align="left" cellpadding="0" cellspacing="2">
                                                      <tr>
                                                        <td height="22" colspan="2" align="left"><strong>Special Facilities Offered </strong></td>
                                                      </tr>
                                                      <?
$sql = "select * from post_option where post_no=".$srow['post_item'];
$iresult = mysql_query($sql);
$irow = mysql_fetch_array($iresult);
?>
                                                      <tr>
                                                        <td width="7%" align="center"><input name="spf1" type="checkbox" id="spf1" value="1" <? if($irow['rail_access']!='')echo "checked";?>></td>
                                                        <td width="93%" align="left">Rail Access</td>
                                                      </tr>
                                                      <tr>
                                                        <td align="center"><input name="spf2" type="checkbox" id="spf2" value="1"  <? if($irow['trail_parking']!='')echo "checked";?>></td>
                                                        <td align="left">Trailer Parking</td>
                                                      </tr>
                                                      <tr>
                                                        <td align="center"><input name="spf3" type="checkbox" id="spf3" value="1"  <? if($irow['drive_docks']!='')echo "checked";?>></td>
                                                        <td align="left">Drive-in Docks</td>
                                                      </tr>
                                                      <tr>
                                                        <td align="center"><input name="spf4" type="checkbox" id="spf4" value="1"  <? if($irow['refrigerated']!='')echo "checked";?>></td>
                                                        <td align="left">Refrigerated / Frozen</td>
                                                      </tr>
                                                      <tr>
                                                        <td align="center"><input name="spf5" type="checkbox" id="spf5" value="1"  <? if($irow['break_bulk']!='')echo "checked";?>></td>
                                                        <td align="left">Break-Bulk</td>
                                                      </tr>
                                                      <tr>
                                                        <td width="7%" align="center"><input name="spf6" type="checkbox" id="spf6" value="1"  <? if($irow['cross_dock']!='')echo "checked";?>></td>
                                                        <td align="left">Cross-Dock</td>
                                                      </tr>
                                                      <tr>
                                                        <td align="center"><input name="spf7" type="checkbox" id="spf7" value="1"  <? if($irow['transload']!='')echo "checked";?>></td>
                                                        <td align="left">Transload</td>
                                                      </tr>
                                                      <tr>
                                                        <td align="center"><input name="spf8" type="checkbox" id="spf8" value="1"  <? if($irow['handle_hazard']!='')echo "checked";?>></td>
                                                        <td align="left">Conformity to handle Hazard Material</td>
                                                      </tr>
                                                      <tr>
                                                        <td width="7%" align="center"><input name="spf9" type="checkbox" id="spf9" value="1"  <? if($irow['racked']!='')echo "checked";?>></td>
                                                        <td align="left">Racked</td>
                                                      </tr>
                                                      <tr>
                                                        <td align="center"><input name="spf10" type="checkbox" id="spf10" value="1"  <? if($irow['bulk_space']!='')echo "checked";?>></td>
                                                        <td align="left">Bulk Space</td>
                                                      </tr>
                                                      <tr>
                                                        <td width="7%" align="center"><input name="spf12" type="checkbox" id="spf12" value="1"  <? if($irow['bonded']!='')echo "checked";?>></td>
                                                        <td align="left">Bonded</td>
                                                      </tr>
                                                    <input name="spf11" type="hidden" id="spf11">
                                                  </table></td>
                                            </tr>
                    
                    
                  </table>                  </tr>
                <tr>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                      <td bgcolor="#F4F4F4"><img src="image/page/null.gif" width="1" height="2"></td>
                    </tr>
                  </table>                                    </tr>
</table>
<?
}
?>
<?
function show_view3($post_no)
{
						$sql = " select * from post_tbl inner join  member on post_tbl.member_id = member.member_id where post_item=".$post_no;
						$sresult=mysql_query($sql);
						$srow = mysql_fetch_array($sresult);			
?>
<table width="100%" border="0" cellpadding="3" cellspacing="1">
                <tr>
                  <td height="20"><span class="HG">View Post</span></td>
                </tr>
                <tr>
                  <td height="20"><span class="s12bv"><br>
                    หัวข้อประกาศ 
                        <?=$srow['subject'];?>
</span></td>
                </tr>
                <tr>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="6">
                    <tr>
                      <td width="23%" height="16" align="left"><strong>Select Category </strong></td>
                      <td width="77%" height="16" align="left" valign="top">
                                          <?
										   if($srow['cat_id']==1)echo "Warehouse for rent";
                                           if($srow['cat_id']==3)echo "Material handling equipment for rent";
                                           if($srow['cat_id']==5)echo "Land for rent";
                                           if($srow['cat_id']==2)echo "Warehouse for sale";
                                           if($srow['cat_id']==4)echo "Material handling equipment for sale";
                                           if($srow['cat_id']==6)echo "Land for sale";
                                            if($srow['cat_id']==7)echo "Warehouse construction service";
                                            if($srow['cat_id']==8)echo "Software";
                                            if($srow['cat_id']==9)echo "Other";
											?>					  </td>
                    </tr>
                    <tr>
                      <td height="16" align="left" valign="top"><strong>Details</strong></td>
                      <td height="16" align="left" valign="top"><?=$srow['detail'];?></td>
                    </tr>
                  </table>                  </tr>
                <tr>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                      <td bgcolor="#F4F4F4"><img src="image/page/null.gif" width="1" height="2"></td>
                    </tr>
                  </table>                  </tr>
                <tr>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="6">
                                            <tr>
                                              <td width="23%" align="left" valign="top"><strong>Photo</strong></td>
                                              <td rowspan="2" align="left" valign="top"><strong>Contact</strong></td>
                                            </tr>
                                            <tr>
                                              <td rowspan="3" align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
                                                <tr>
                                                  <td align="center"><? if($srow['post_photo']!='')
								  {
								  ?>
                                                    <img src="post_photo/<?=$srow['post_photo'];?>" width="140" height="105" border="0">
                                                    <?
								  }
								  ?></td>
                                                </tr>
                                                <tr>
                                                  <td align="center"><? if($srow['post_photo_2']!='')
								  {
								  ?>
                                                    <img src="post_photo/<?=$srow['post_photo_2'];?>" width="140" height="105" border="0">
                                                    <?
								  }
								  ?></td>
                                                </tr>
                                                <tr>
                                                  <td align="center"><? if($srow['post_photo_3']!='')
								  {
								  ?>
                                                    <img src="post_photo/<?=$srow['post_photo_3'];?>" width="140" height="105" border="0">
                                                    <?
								  }
								  ?></td>
                                                </tr>
                                                <tr>
                                                  <td align="center"><? if($srow['post_photo_4']!='')
								  {
								  ?>
                                                    <img src="post_photo/<?=$srow['post_photo_4'];?>" width="140" height="105" border="0">
                                                    <?
								  }
								  ?></td>
                                                </tr>
                                                <tr>
                                                  <td align="center"><? if($srow['post_photo_5']!='')
								  {
								  ?>
                                                    <img src="post_photo/<?=$srow['post_photo_5'];?>" width="140" height="105" border="0">
                                                    <?
								  }
								  ?></td>
                                                </tr>
                                              </table></td>
                                            </tr>
                                            <tr>
                                              <td height="99" align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                                                <tr>
                                                  <td height="16"><?=$srow['f_name'];?></td>
                                                </tr>
                                                <tr>
                                                  <td height="16"><?=$srow['c_name'];?></td>
                                                </tr>
                                                <tr>
                                                  <td height="16"><?=$srow['phone'];?></td>
                                                </tr>
                                                <tr>
                                                  <td height="16"><?=$srow['email'];?></td>
                                                </tr>
                                                <tr>
                                                  <td height="16"><?=$srow['address'];?></td>
                                                </tr>
                                              </table></td>
                                            </tr>
                                            <tr>
                                              <td align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
                                                <tr valign="top">
                                                  <td height="25" align="left" valign="middle"><strong>Price Range</strong></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="16" align="left"><?=number_format($srow['price'],2);?>                          
                                                  baht 
&nbsp;                                                  <?if($srow['negotiable']!='')echo "negotiable";?></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="25" align="left" valign="middle"><strong>Area </strong></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="16" align="left"><?
													 	$iresult = mysql_query("select * from post_location where post_no=".$srow['post_item']);
														 while($irow=mysql_fetch_array($iresult))
														 {
																	$sql ="select * from province_tbl where province_id=".$irow['province_id'];
																	$ssresult  = mysql_query($sql);
																	$province = mysql_fetch_array($ssresult);
																	
																	$sql = "select * from district_tbl where dist_id=".$irow['district_id'];
																	$ssresult  = mysql_query($sql);
																	$district = mysql_fetch_array($ssresult);
																	
																	echo  $district['dist_name_en'].",   ". $province['province_name_en']." <br>";
														 }
												  ?></td>
                                                </tr>
                                                <tr valign="top">
                                                  <td height="16" align="left"></td>
                                                </tr>
                                              </table></td>
                                            </tr>
                    
                    
                  </table>                  </tr>
                <tr>
                  <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
                    <tr>
                      <td bgcolor="#F4F4F4"><img src="image/page/null.gif" width="1" height="2"></td>
                    </tr>
                  </table>                                    </tr>
</table>
<?
}
?>

<?
function show_view4($post_no)
{
						$sql = " select * from post_tbl inner join  member on post_tbl.member_id = member.member_id where post_item=".$post_no;
						$sresult=mysql_query($sql);
						$srow = mysql_fetch_array($sresult);			
?>
<table width="100%" border="0" cellpadding="3" cellspacing="1">
  <tr>
    <td height="20"><span class="HG">View Post</span></td>
  </tr>
  <tr>
    <td height="20"><span class="s12bv"><br>
      หัวข้อประกาศ
      <?=$srow['subject'];?>
    </span></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="23%" height="16" align="left"><strong>Select Category </strong></td>
        <td width="77%" height="16" align="left" valign="top"><?
										   if($srow['cat_id']==1)echo "Warehouse for rent";
                                           if($srow['cat_id']==3)echo "Material handling equipment for rent";
                                           if($srow['cat_id']==5)echo "Land for rent";
                                           if($srow['cat_id']==2)echo "Warehouse for sale";
                                           if($srow['cat_id']==4)echo "Material handling equipment for sale";
                                           if($srow['cat_id']==6)echo "Land for sale";
                                            if($srow['cat_id']==7)echo "Warehouse construction service";
                                            if($srow['cat_id']==8)echo "Software";
                                            if($srow['cat_id']==9)echo "Other";
											?>
        </td>
      </tr>
      <tr>
        <td height="16" align="left" valign="top"><strong>Details</strong></td>
        <td height="16" align="left" valign="top"><?=$srow['detail'];?></td>
      </tr>
    </table>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td bgcolor="#F4F4F4"><img src="image/page/null.gif" width="1" height="2"></td>
      </tr>
    </table>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="23%" align="left" valign="top"><strong>Photo</strong></td>
        <td rowspan="2" align="left" valign="top"><strong>Contact</strong></td>
      </tr>
      <tr>
        <td rowspan="3" align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td align="center"><? if($srow['post_photo']!='')
								  {
								  ?>
                    <img src="post_photo/<?=$srow['post_photo'];?>" width="140" height="105" border="0">
                    <?
								  }
								  ?></td>
          </tr>
          <tr>
            <td align="center"><? if($srow['post_photo_2']!='')
								  {
								  ?>
                    <img src="post_photo/<?=$srow['post_photo_2'];?>" width="140" height="105" border="0">
                    <?
								  }
								  ?></td>
          </tr>
          <tr>
            <td align="center"><? if($srow['post_photo_3']!='')
								  {
								  ?>
                    <img src="post_photo/<?=$srow['post_photo_3'];?>" width="140" height="105" border="0">
                    <?
								  }
								  ?></td>
          </tr>
          <tr>
            <td align="center"><? if($srow['post_photo_4']!='')
								  {
								  ?>
                    <img src="post_photo/<?=$srow['post_photo_4'];?>" width="140" height="105" border="0">
                    <?
								  }
								  ?></td>
          </tr>
          <tr>
            <td align="center"><? if($srow['post_photo_5']!='')
								  {
								  ?>
                    <img src="post_photo/<?=$srow['post_photo_5'];?>" width="140" height="105" border="0">
                    <?
								  }
								  ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="99" align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td height="16"><?=$srow['f_name'];?></td>
          </tr>
          <tr>
            <td height="16"><?=$srow['c_name'];?></td>
          </tr>
          <tr>
            <td height="16"><?=$srow['phone'];?></td>
          </tr>
          <tr>
            <td height="16"><?=$srow['email'];?></td>
          </tr>
          <tr>
            <td height="16"><?=$srow['address'];?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr valign="top">
            <td height="25" align="left" valign="middle"><strong>Price Range</strong></td>
          </tr>
          <tr valign="top">
            <td height="16" align="left"><?=number_format($srow['price'],2);?>
              baht 
              &nbsp;
              <?if($srow['negotiable']!='')echo "negotiable";?></td>
          </tr>
          <tr valign="top">
            <td height="25" align="left" valign="middle"><strong>Area </strong></td>
          </tr>
          <tr valign="top">
            <td height="16" align="left"><?
													 	$iresult = mysql_query("select * from post_location where post_no=".$srow['post_item']);
														 while($irow=mysql_fetch_array($iresult))
														 {
																	$sql ="select * from province_tbl where province_id=".$irow['province_id'];
																	$ssresult  = mysql_query($sql);
																	$province = mysql_fetch_array($ssresult);
																	
																	$sql = "select * from district_tbl where dist_id=".$irow['district_id'];
																	$ssresult  = mysql_query($sql);
																	$district = mysql_fetch_array($ssresult);
																	
																	echo  $district['dist_name_en'].",   ". $province['province_name_en']." <br>";
														 }
												  ?></td>
          </tr>
          <tr valign="top">
            <td height="16" align="left"></td>
          </tr>
          <tr valign="top">
            <td height="25" align="left" valign="middle"><strong>Floor Space</strong></td>
          </tr>
          <tr valign="top">
            <td height="16" align="left"><?=$srow['space_rai'];?>
              Rai
              <?=$srow['space_sqw'];?>
              sqw
              <?=$srow['space_sqm'];?>
              sqm</td>
          </tr>
        </table></td>
        </tr>
    </table>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td bgcolor="#F4F4F4"><img src="image/page/null.gif" width="1" height="2"></td>
      </tr>
    </table>
  </tr>
</table>
<?
}
?>
<?
function show_view5($post_no)
{
						$sql = " select * from post_tbl inner join  member on post_tbl.member_id = member.member_id where post_item=".$post_no;
						$sresult=mysql_query($sql);
						$srow = mysql_fetch_array($sresult);			
?>
<table width="100%" border="0" cellpadding="3" cellspacing="1">
  <tr>
    <td height="20"><span class="HG">View Post</span></td>
  </tr>
  <tr>
    <td height="20"><span class="s12bv"><br>
      หัวข้อประกาศ
      <?=$srow['subject'];?>
    </span></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="23%" height="16" align="left"><strong>Select Category </strong></td>
        <td width="77%" height="16" align="left" valign="top"><?
										   if($srow['cat_id']==1)echo "Warehouse for rent";
                                           if($srow['cat_id']==3)echo "Material handling equipment for rent";
                                           if($srow['cat_id']==5)echo "Land for rent";
                                           if($srow['cat_id']==2)echo "Warehouse for sale";
                                           if($srow['cat_id']==4)echo "Material handling equipment for sale";
                                           if($srow['cat_id']==6)echo "Land for sale";
                                            if($srow['cat_id']==7)echo "Warehouse construction service";
                                            if($srow['cat_id']==8)echo "Software";
                                            if($srow['cat_id']==9)echo "Other";
											?>
        </td>
      </tr>
      <tr>
        <td height="16" align="left" valign="top"><strong>Details</strong></td>
        <td height="16" align="left" valign="top"><?=$srow['detail'];?></td>
      </tr>
    </table>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td bgcolor="#F4F4F4"><img src="image/page/null.gif" width="1" height="2"></td>
      </tr>
    </table>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="23%" align="left" valign="top"><strong>Photo</strong></td>
        <td rowspan="2" align="left" valign="top"><strong>Contact</strong></td>
      </tr>
      <tr>
        <td rowspan="3" align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td align="center"><? if($srow['post_photo']!='')
								  {
								  ?>
                    <img src="post_photo/<?=$srow['post_photo'];?>" width="140" height="105" border="0">
                    <?
								  }
								  ?></td>
          </tr>
          <tr>
            <td align="center"><? if($srow['post_photo_2']!='')
								  {
								  ?>
                    <img src="post_photo/<?=$srow['post_photo_2'];?>" width="140" height="105" border="0">
                    <?
								  }
								  ?></td>
          </tr>
          <tr>
            <td align="center"><? if($srow['post_photo_3']!='')
								  {
								  ?>
                    <img src="post_photo/<?=$srow['post_photo_3'];?>" width="140" height="105" border="0">
                    <?
								  }
								  ?></td>
          </tr>
          <tr>
            <td align="center"><? if($srow['post_photo_4']!='')
								  {
								  ?>
                    <img src="post_photo/<?=$srow['post_photo_4'];?>" width="140" height="105" border="0">
                    <?
								  }
								  ?></td>
          </tr>
          <tr>
            <td align="center"><? if($srow['post_photo_5']!='')
								  {
								  ?>
                    <img src="post_photo/<?=$srow['post_photo_5'];?>" width="140" height="105" border="0">
                    <?
								  }
								  ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="99" align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td height="16"><?=$srow['f_name'];?></td>
          </tr>
          <tr>
            <td height="16"><?=$srow['c_name'];?></td>
          </tr>
          <tr>
            <td height="16"><?=$srow['phone'];?></td>
          </tr>
          <tr>
            <td height="16"><?=$srow['email'];?></td>
          </tr>
          <tr>
            <td height="16"><?=$srow['address'];?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr valign="top">
            <td height="25" align="left" valign="middle"><strong>Area </strong></td>
          </tr>
          <tr valign="top">
            <td height="16" align="left"><?
													 	$iresult = mysql_query("select * from post_location where post_no=".$srow['post_item']);
														 while($irow=mysql_fetch_array($iresult))
														 {
																	$sql ="select * from province_tbl where province_id=".$irow['province_id'];
																	$ssresult  = mysql_query($sql);
																	$province = mysql_fetch_array($ssresult);
																	
																	$sql = "select * from district_tbl where dist_id=".$irow['district_id'];
																	$ssresult  = mysql_query($sql);
																	$district = mysql_fetch_array($ssresult);
																	
																	echo  $district['dist_name_en'].",   ". $province['province_name_en']." <br>";
														 }
												  ?></td>
          </tr>
        </table></td>
        </tr>
    </table>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td bgcolor="#F4F4F4"><img src="image/page/null.gif" width="1" height="2"></td>
      </tr>
    </table>
  </tr>
</table>
<?
}
?>

<?
function show_view6($post_no)
{
						$sql = " select * from post_tbl inner join  member on post_tbl.member_id = member.member_id where post_item=".$post_no;
						$sresult=mysql_query($sql);
						$srow = mysql_fetch_array($sresult);			
?>
<table width="100%" border="0" cellpadding="3" cellspacing="1">
  <tr>
    <td height="20"><span class="HG">View Post</span></td>
  </tr>
  <tr>
    <td height="20"><span class="s12bv"><br>
      หัวข้อประกาศ
      <?=$srow['subject'];?>
    </span></td>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="23%" height="16" align="left"><strong>Select Category </strong></td>
        <td width="77%" height="16" align="left" valign="top"><?
										   if($srow['cat_id']==1)echo "Warehouse for rent";
                                           if($srow['cat_id']==3)echo "Material handling equipment for rent";
                                           if($srow['cat_id']==5)echo "Land for rent";
                                           if($srow['cat_id']==2)echo "Warehouse for sale";
                                           if($srow['cat_id']==4)echo "Material handling equipment for sale";
                                           if($srow['cat_id']==6)echo "Land for sale";
                                            if($srow['cat_id']==7)echo "Warehouse construction service";
                                            if($srow['cat_id']==8)echo "Software";
                                            if($srow['cat_id']==9)echo "Other";
											?>
        </td>
      </tr>
      <tr>
        <td height="16" align="left" valign="top"><strong>Details</strong></td>
        <td height="16" align="left" valign="top"><?=$srow['detail'];?></td>
      </tr>
    </table>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td bgcolor="#F4F4F4"><img src="image/page/null.gif" width="1" height="2"></td>
      </tr>
    </table>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="6">
      <tr>
        <td width="23%" align="left" valign="top"><strong>Photo</strong></td>
        <td rowspan="2" align="left" valign="top"><strong>Contact</strong></td>
      </tr>
      <tr>
        <td rowspan="3" align="left" valign="top"><table width="100%" border="0" cellspacing="5" cellpadding="0">
          <tr>
            <td align="center"><? if($srow['post_photo']!='')
								  {
								  ?>
                    <img src="post_photo/<?=$srow['post_photo'];?>" width="140" height="105" border="0">
                    <?
								  }
								  ?></td>
          </tr>
          <tr>
            <td align="center"><? if($srow['post_photo_2']!='')
								  {
								  ?>
                    <img src="post_photo/<?=$srow['post_photo_2'];?>" width="140" height="105" border="0">
                    <?
								  }
								  ?></td>
          </tr>
          <tr>
            <td align="center"><? if($srow['post_photo_3']!='')
								  {
								  ?>
                    <img src="post_photo/<?=$srow['post_photo_3'];?>" width="140" height="105" border="0">
                    <?
								  }
								  ?></td>
          </tr>
          <tr>
            <td align="center"><? if($srow['post_photo_4']!='')
								  {
								  ?>
                    <img src="post_photo/<?=$srow['post_photo_4'];?>" width="140" height="105" border="0">
                    <?
								  }
								  ?></td>
          </tr>
          <tr>
            <td align="center"><? if($srow['post_photo_5']!='')
								  {
								  ?>
                    <img src="post_photo/<?=$srow['post_photo_5'];?>" width="140" height="105" border="0">
                    <?
								  }
								  ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td height="99" align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr>
            <td height="16"><?=$srow['f_name'];?></td>
          </tr>
          <tr>
            <td height="16"><?=$srow['c_name'];?></td>
          </tr>
          <tr>
            <td height="16"><?=$srow['phone'];?></td>
          </tr>
          <tr>
            <td height="16"><?=$srow['email'];?></td>
          </tr>
          <tr>
            <td height="16"><?=$srow['address'];?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="2" cellpadding="0">
          <tr valign="top">
            <td height="25" align="left" valign="middle"><strong>Price Range</strong></td>
          </tr>
          <tr valign="top">
            <td height="16" align="left"><?=number_format($srow['price'],2);?>
              baht/Month 
              &nbsp;
              <?if($srow['negotiable']!='')echo "negotiable";?></td>
          </tr>
          <tr valign="top">
            <td height="25" align="left" valign="middle"><strong>Area </strong></td>
          </tr>
          <tr valign="top">
            <td height="16" align="left"><?
													 	$iresult = mysql_query("select * from post_location where post_no=".$srow['post_item']);
														 while($irow=mysql_fetch_array($iresult))
														 {
																	$sql ="select * from province_tbl where province_id=".$irow['province_id'];
																	$ssresult  = mysql_query($sql);
																	$province = mysql_fetch_array($ssresult);
																	
																	$sql = "select * from district_tbl where dist_id=".$irow['district_id'];
																	$ssresult  = mysql_query($sql);
																	$district = mysql_fetch_array($ssresult);
																	
																	echo  $district['dist_name_en'].",   ". $province['province_name_en']." <br>";
														 }
												  ?></td>
          </tr>
          <tr valign="top">
            <td height="16" align="left"></td>
          </tr>
          <tr valign="top">
            <td height="25" align="left" valign="middle"><strong>Floor Space</strong></td>
          </tr>
          <tr valign="top">
            <td height="16" align="left"><?=$srow['space_rai'];?>
              Rai
              <?=$srow['space_sqw'];?>
              sqw
              <?=$srow['space_sqm'];?>
              sqm</td>
          </tr>
        </table></td>
        </tr>
    </table>
  </tr>
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td bgcolor="#F4F4F4"><img src="image/page/null.gif" width="1" height="2"></td>
      </tr>
    </table>
  </tr>
</table>
<?
}
?>