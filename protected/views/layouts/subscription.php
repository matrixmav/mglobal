<?php 
include('db_temp.php');
if(isset($_REQUEST['email'])&& $_REQUEST['email']!='')
{
$date = DATE("Y-m-d");
$bool = mysql_query("INSERT INTO `occ_subscriber` (`email`,`add_date`,`status`) VALUES('{$_REQUEST['email']}','{$date}','1')");
if($bool)
{
$body = '<table id="backgroundTable" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
		<tr>
			<td style="border-collapse: collapse; "> 
				<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" style=" border:1px solid #000; border-radius:10px; margin-top:20px;">
					
                    <tr>
						<td width="600" valign="top" style="border-collapse: collapse;">
							<table cellpadding="0" cellspacing="0" border="0" align="center">
								<tr>
									<td valign="top" style="border-collapse: collapse;"><a href="#" target="_blank"><img src="http://www.urwebby.com/image/data/logo/logo.png" width="170" height="75" border="0" alt="Logo" title="Logo" style="display: block;outline: none;text-decoration: none;border: none;"></a></td>
								</tr>
                                
							</table>
						</td>
					</tr>
                    <tr>
						<td width="600" valign="top" style="border-collapse: collapse;">
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td width="600" height="10" style="width: 600px;height: 10px;font-size: 1px;line-height: 1px;border-collapse: collapse;">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
                    <tr>
						<td width="600" valign="top" style="border-collapse: collapse;">
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td width="15" style="width: 15px;font-size: 1px;line-height: 1px;border-collapse: collapse;">&nbsp;</td>
                                    <td width="370" style="width: 370px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;color: #333333;border-collapse: collapse;"><a href="#" target="_blank" style="color: #333333; text-decoration:none;"><span style="color: #333333;"><b>Email: </b>info@urwebby.com</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" target="_blank" style="color: #333333; text-decoration:none;"><span style="color: #333333;"><b>Mob: </b>080-46647799</span></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td width="15" style="width: 15px;font-size: 1px;line-height: 1px;border-collapse: collapse;">&nbsp;</td>
                                    <td align="right" style="border-collapse: collapse;"><a href="https://www.facebook.com/urwebby"><img width="26" height="26" target="_blank" title="facebook" src="http://www.urwebby.com/image/data/facebook.png"></a> 
<a href="https://twitter.com/urwebby"><img width="26" height="26" target="_blank" title="twitter" src="http://www.urwebby.com/image/data/twitter.png"></a>
<a rel="publisher" href="https://plus.google.com/u/0/100392027171600851574/"><img width="26" height="26" target="_blank" title="google plus" src="http://www.urwebby.com/image/data/google.png"></a>
<a href="http://www.pinterest.com/urwebby001/"><img width="26" height="26" target="_blank" title="pinterst" src="http://www.urwebby.com/image/data/pin.png"></a></td>
                                    <td width="15" style="width: 15px;font-size: 1px;line-height: 1px;border-collapse: collapse;">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
                    <tr>
						<td width="600" valign="top" style="border-collapse: collapse;">
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td width="600" height="10" style="width: 600px;height: 10px;font-size: 1px;line-height: 1px;border-bottom: 1px solid #bfbfbf;border-collapse: collapse;">&nbsp;</td>
								</tr>
                                <tr>
									<td width="600" height="20" style="width: 600px;height: 20px;font-size: 1px;line-height: 1px;border-collapse: collapse;">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
                    <tr>
						<td width="600" valign="top" style="border-collapse: collapse;">
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td width="600" valign="top" style="width: 600px;font-family: Arial, Helvetica, sans-serif;font-size: 12px; line-height: 16px; color: #333333;border-collapse: collapse;">
                                    
                                    	<table cellpadding="0" cellspacing="0" border="0">
                                        	<tr>
                                            	
                                              
                                                <td width="50" style="width:20px;font-size: 1px;line-height: 1px;border-collapse: collapse;">&nbsp;</td>
                                                <td width="550" valign="top" style="width: 550px;border-collapse: collapse;">
                                                	<table cellpadding="0" cellspacing="0" border="0">
                                                    	
                                                        <tr>
                                                        	<td width="385" height="15" style="width: 550px;height: 15px;font-size: 14px;line-height: 1px;border-collapse: collapse;">&nbsp;</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        	<td width="385" height="32" style="width: 550px;height: 32px;font-size: 14px;line-height: 1px;border-collapse: collapse;">Greetings from urwebby Team.</td>
                                                        </tr>
														 
														 <tr>
                                                        	<td width="385" height="32" style="width: 550px;height: 32px;font-size: 14px;line-height: 1px;border-collapse: collapse;">Thanks! Your subscription has been confirmed with Urwebby.com.</td>
                                                        </tr>
														<tr>
                                                        	<td width="385" height="32" style="width: 550px;height: 32px;font-size: 14px;line-height: 1px;border-collapse: collapse;">Feel free to contact us if you need any other assistance.</td>
                                                        </tr>
														<tr>
                                                        	<td width="385" height="32" style="width: 550px;height: 32px;font-size: 14px;line-height: 1px;border-collapse: collapse;">Regards,</td>
                                                        </tr>
														<tr>
                                                        	<td width="385" height="32" style="width: 550px;height: 32px;font-size: 14px;line-height: 1px;border-collapse: collapse;">Urwebby Team</td>
                                                        </tr>
														<tr>
                                                        	<td width="385" height="32" style="width: 550px;height: 32px;font-size: 14px;border-collapse: collapse;"><a href="www.urwebby.com">www.urwebby.com</a><br/><img alt="Urwebby.com" title="Urwebby.com" src="http://www.urwebby.com/image/data/logo/logo.png" width="100">
														</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        	<td width="385" height="15" style="width: 550px;height: 32px;font-size: 1px;line-height: 1px;border-collapse: collapse;">&nbsp;</td>
                                                        </tr>
                                                       
                                                        
                                        </table>
                                    
                                    </td>
								</tr>
							</table>
						</td>
					</tr>
                   
                   
                  
                   
                </table>
			</td>
		</tr>
	</table>';
	// Always set content-type when sending HTML email
$headers .= "From: Urwebby <info@urwebby.com>"."\r\n";
$headers .= "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
mail($_REQUEST['email'],"Subscription confirmed with Urwebby",$body,$headers);
$bodyAdmin = '<table id="backgroundTable" cellpadding="0" cellspacing="0" border="0" style="width:100%;">
		<tr>
			<td style="border-collapse: collapse; "> 
				<table width="600" cellpadding="0" cellspacing="0" border="0" align="center" style=" border:1px solid #000; border-radius:10px; margin-top:20px;">
					
                    <tr>
						<td width="600" valign="top" style="border-collapse: collapse;">
							<table cellpadding="0" cellspacing="0" border="0" align="center">
								<tr>
									<td valign="top" style="border-collapse: collapse;"><a href="#" target="_blank"><img src="http://www.urwebby.com/image/data/logo/logo.png" width="170" height="75" border="0" alt="Logo" title="Logo" style="display: block;outline: none;text-decoration: none;border: none;"></a></td>
								</tr>
                                
							</table>
						</td>
					</tr>
                    <tr>
						<td width="600" valign="top" style="border-collapse: collapse;">
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td width="600" height="10" style="width: 600px;height: 10px;font-size: 1px;line-height: 1px;border-collapse: collapse;">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
                    <tr>
						<td width="600" valign="top" style="border-collapse: collapse;">
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td width="15" style="width: 15px;font-size: 1px;line-height: 1px;border-collapse: collapse;">&nbsp;</td>
                                    <td width="370" style="width: 370px;font-family: Arial, Helvetica, sans-serif;font-size: 12px;color: #333333;border-collapse: collapse;"><a href="#" target="_blank" style="color: #333333; text-decoration:none;"><span style="color: #333333;"><b>Email: </b>info@urwebby.com</span></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" target="_blank" style="color: #333333; text-decoration:none;"><span style="color: #333333;"><b>Mob: </b>080-69900000</span></a>&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td width="15" style="width: 15px;font-size: 1px;line-height: 1px;border-collapse: collapse;">&nbsp;</td>
                                    <td align="right" style="border-collapse: collapse;"><a href="https://www.facebook.com/urwebby"><img width="26" height="26" target="_blank" title="facebook" src="http://www.urwebby.com/image/data/facebook.png"></a> 
<a href="https://twitter.com/urwebby"><img width="26" height="26" target="_blank" title="twitter" src="http://www.urwebby.com/image/data/twitter.png"></a>
<a rel="publisher" href="https://plus.google.com/u/0/100392027171600851574/"><img width="26" height="26" target="_blank" title="google plus" src="http://www.urwebby.com/image/data/google.png"></a>
<a href="http://www.pinterest.com/urwebby001/"><img width="26" height="26" target="_blank" title="pinterst" src="http://www.urwebby.com/image/data/pin.png"></a></td>
                                    <td width="15" style="width: 15px;font-size: 1px;line-height: 1px;border-collapse: collapse;">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
                    <tr>
						<td width="600" valign="top" style="border-collapse: collapse;">
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td width="600" height="10" style="width: 600px;height: 10px;font-size: 1px;line-height: 1px;border-bottom: 1px solid #bfbfbf;border-collapse: collapse;">&nbsp;</td>
								</tr>
                                <tr>
									<td width="600" height="20" style="width: 600px;height: 20px;font-size: 1px;line-height: 1px;border-collapse: collapse;">&nbsp;</td>
								</tr>
							</table>
						</td>
					</tr>
                    <tr>
						<td width="600" valign="top" style="border-collapse: collapse;">
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td width="600" valign="top" style="width: 600px;font-family: Arial, Helvetica, sans-serif;font-size: 12px; line-height: 16px; color: #333333;border-collapse: collapse;">
                                    
                                    	<table cellpadding="0" cellspacing="0" border="0">
                                        	<tr>
                                            	
                                              
                                                <td width="50" style="width:20px;font-size: 1px;line-height: 1px;border-collapse: collapse;">&nbsp;</td>
                                                <td width="550" valign="top" style="width: 550px;border-collapse: collapse;">
                                                	<table cellpadding="0" cellspacing="0" border="0">
                                                    	
                                                        <tr>
                                                        	<td width="385" height="15" style="width: 550px;height: 15px;font-size: 14px;line-height: 1px;border-collapse: collapse;">&nbsp;</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        	<td width="385" height="32" style="width: 550px;height: 32px;font-size: 14px;line-height: 1px;border-collapse: collapse;">Greetings from urwebby Team.</td>
                                                        </tr>
														
														 <tr>
                                                        	<td width="385" height="32" style="width: 550px;height: 32px;font-size: 14px;line-height: 1px;border-collapse: collapse;">A new user subscribed with Urwebby.com. User Details are :</td>
                                                        </tr>
														 <tr>
                                                        	<td width="385" height="32" style="width: 550px;height: 32px;font-size: 14px;line-height: 1px;border-collapse: collapse;">Email: '.$_REQUEST['email'].'</td>
                                                        </tr>
														<tr>
                                                        	<td width="385" height="32" style="width: 550px;height: 32px;font-size: 14px;line-height: 1px;border-collapse: collapse;">Feel free to contact us if you need any other assistance.</td>
                                                        </tr>
														<tr>
                                                        	<td width="385" height="32" style="width: 550px;height: 32px;font-size: 14px;line-height: 1px;border-collapse: collapse;">Regards,</td>
                                                        </tr>
														<tr>
                                                        	<td width="385" height="32" style="width: 550px;height: 32px;font-size: 14px;line-height: 1px;border-collapse: collapse;">Urwebby Team</td>
                                                        </tr>
														<tr>
                                                        	<td width="385" height="32" style="width: 550px;height: 32px;font-size: 14px;border-collapse: collapse;"><a href="www.urwebby.com">www.urwebby.com</a><br/><img alt="Urwebby.com" title="Urwebby.com" src="http://www.urwebby.com/image/data/logo/logo.png" width="100">
														</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                        	<td width="385" height="15" style="width: 550px;height: 32px;font-size: 1px;line-height: 1px;border-collapse: collapse;">&nbsp;</td>
                                                        </tr>
                                                       
                                                        
                                        </table>
                                    
                                    </td>
								</tr>
							</table>
						</td>
					</tr>
                   
                   
                  
                   
                </table>
			</td>
		</tr>
	</table>';
	$sent = mail("info@urwebby.com","Subscription confirmed with Urwebby",$bodyAdmin,$headers);
echo 1;
}else{
echo 0;
}
}
?>

