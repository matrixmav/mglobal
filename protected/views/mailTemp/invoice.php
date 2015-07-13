<!doctype html>
<html>
    <head> 
        <meta charset="utf-8">
        <title>Untitled Document</title>
        
    </head>

    <body>
        <table align="center" width="600" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td height="20"  style=""></td>
                </tr>
                <tr>
                    <td height="10" bgcolor="#f15c2b" style=""></td>
                </tr>
                <tr>
                    <td valign="" bgcolor="#fafafa" height="80" style="line-height:0px; border-bottom:1px solid #dfdfdf">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="5%" valign="middle" style="line-height:0px"></td>
                                    <td width="40%" valign="middle" style="line-height:0px"><a target="_blank" href=""> <img width="" border="0" src="logo.png"> </a></td>
                                    <td width="55%" valign="middle" style="line-height:0px; color:#f15c2b; font-family:Nunito;">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td width="80%" valign="middle" align="right" height="20" style=" color:#f15c2b;"><img width="" border="0" src="livechat.png"> &nbsp;</td>
                                                </tr>
                                                <tr>
                                                    <td width="100%" valign="middle" align="right" height="20" style=" color:#828282;font-size:14px; line-height:19px; font-family:Nunito"><strong> Customer Support:</strong> 1800 909 302 &nbsp; </td>
                                                </tr>
                                            </tbody>
                                        </table></td>
                                </tr>
                            </tbody>
                        </table></td>
                </tr>';   
 $body .=  '<tr>
                    <td valign="" bgcolor="#efed6a" height="55" align="left" style="line-height:0px; font-size:16px">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> </td>
                                    <td width="90%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> Invoice</td>
                                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>

             
                <tr>
                    <td valign="" bgcolor="#fafafa" height="" align="left" style="line-height:0px; font-size:16px">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> </td>
                                    <td width="90%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td height="20" bgcolor="" style=""></td>
                                                </tr>


                                                <tr>
                                                    <td valign="" bgcolor="" height="55" align="left" style="line-height:0px; font-size:16px">
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>

                                                                    <td width="100%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr>

                                                                                    <td width="50%" valign="top" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td>T0 : '; 
                                                                                                    $body .= ucwords($invoiceArr['full_name']);
                                                                                                    $body .= '</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td>';
                                                                                                    $body .= ucwords($invoiceArr['address']);
                                                                                                    $body .= '</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>

                                                                                    <td width="50%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                            <tbody>
                                                                                                <tr>
                                                                                                    <td width="50%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">
                                                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                            <tbody>
                                                                                                                <tr>
                                                                                                                    <td width="2%" bgcolor="#e4f4e3" height="30"></td>
                                                                                                                    <td width="48%" bgcolor="#e4f4e3" valign="middle" height="30" align="right" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Customer ID :</td>
                                                                                                                    <td width="50%" bgcolor="#e4f4e3" valign="middle" height="30" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">';
                                                                                                                   $body .= $invoiceArr['name'];
                                                                                                                   $body .= '</td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td height="2" bgcolor="" style=""></td>
                                                                                                                </tr>
                                                                                                                <tr>
                                                                                                                    <td width="1%" bgcolor="#e0eec4" height="30"></td>
                                                                                                                    <td width="49%" bgcolor="#e0eec4" valign="middle" height="30" align="right" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Invoice No : &nbsp;</td>
                                                                                                                    <td width="50%" bgcolor="#e0eec4" valign="middle" height="30" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">#';
                                                                                                                    $body .= $invoiceArr['transaction_id'];
                                                                                                                    $body .= '</td>
                                                                                                                </tr>
                                                                                                                 <tr>
                                                                                                                    <td height="5" bgcolor="" style=""></td>
                                                                                                                </tr>

                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Date : ';
                                                                                                     $body .= $invoiceArr['created_at'];
                                                                                                    $body .= '</td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> Email : ';
                                                                                                    $body .= $invoiceArr['email'];
                                                                                                    $body .= '</td>
                                                                                                </tr>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </td>

                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                                                        <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> </td>

                                    </tr>
                            </tbody>
                        </table>
 

                                                <tr>
                                                    <td height="20" bgcolor="" style=""></td>
                                                </tr>
                                                <tr>
                                                    <td valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" height="30"  bgcolor="#f0f0f0" style="line-height:0px; border-top:1px dashed #dfdfdf; border-bottom:1px dashed #dfdfdf;"> 
                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr> 
                                                                                    <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"></td>
                                                                                    <td valign="middle" width="10%" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Sl no.</td>
                                                                                    <td valign="middle" width="19%" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Package</td>
                                                                                    <td valign="middle" width="30%" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Description</td>
                                                                                    <td valign="middle" width="15%" align="middle" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Duration</td>
                                                                                    <td valign="middle" width="22%" align="middle" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Price</td>
                                                                                    <td  width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10" bgcolor="" style=""></td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" height="" style="line-height:0px;"> 
                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr>     
                                                                                    <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito"></td>
                                                                                    <td valign="middle" align="left" width="10%" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito">1</td>
                                                                                    <td valign="middle" align="left" width="19%" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito">';
                                                                                    $body .= $invoiceArr['package_name'];
                                                                                    $body .= '</td>
                                                                                    <td valign="middle" align="left" width="30%" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito">';
                                                                                    $body .= $invoiceArr['Description'];
                                                                                    $body .= '</td>
                                                                                    <td valign="middle" align="middle" width="15%" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito">1 year</td>
                                                                                    <td valign="middle" align="center" width="22%" style="line-height:22px; color:#f15c2b;; font-size:14px; font-family:Nunito">';
                                                                                    $body .= $invoiceArr['package_price'];
                                                                                    $body .= '</td>
                                                                                    <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="10" bgcolor="" style=""></td>
                                                </tr>
                                                <tr>
                                                    <td valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                    <td align="center" height="50" style="line-height:0px; border-top:1px dashed #dfdfdf; border-bottom:1px dashed #dfdfdf;"> 
                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr>     
                                                                                    <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"></td>
                                                                                   <td valign="middle" align="left" width="10%" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">1</td>
                                                                                    <td valign="middle" align="left" width="19%" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Domain</td>
                                                                                    <td valign="middle"  width="30%"  align="left" style="line-height:22px; color: #477dc0; font-size:16px; font-family:Nunito">';
                                                                                            $body .= $invoiceArr['domain'];
                                                                                     $body .= '</td>
                                                                                     <td valign="middle" align="middle" width="15%" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">1 year</td>
                                                                                    <td valign="middle"  width="22%"  align="center" style="line-height:22px; color: #6dbb5b; font-size:16px; font-family:Nunito">';
                                                                                    $body .=  (!empty($invoiceArr['domain_price'])) ? $invoiceArr['domain_price'] : "Free";
                                                                                    $body .= '</td>
                                                                                    <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"></td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                     <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"></td>
                                                                    <td align="center" height="50" style="line-height:0px; border-top:1px dashed #dfdfdf; border-bottom:1px dashed #dfdfdf;"> 
                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                
                                                                                <tr>     
                                                                                  
                                                                                    <td valign="middle"  width="85%" height="30" align="right" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Coupon Discount : &nbsp;</td>
                                                                                    <td valign="middle"  width="15%" height="30" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">';
                                                                                    $body .= (!empty($invoiceArr['Couponbody'])) ? $invoiceArr['Couponbody'] : "N/A";
                                                                                    $body .= '</td>
                                                                                </tr>
                                                                                <tr>     
                                                                                  
                                                                                    <td valign="middle"  width="85%" height="30" align="right" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Used RP/cash : &nbsp;</td>
                                                                                    <td valign="middle"  width="15%" height="30" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">';
                                                                                    $body .= (!empty($invoiceArr['RPBody'])) ? $invoiceArr['RPBody'] : "N/A";
                                                                                    $body .= '</td>
                                                                                </tr>
                                                                                <tr>     
                                                                                  
                                                                                    <td valign="middle"  width="85%" height="30" align="right" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Total Amount Paid : &nbsp;</td>
                                                                                    <td valign="middle"  width="15%" height="30" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">';
                                                                                    $body .=  (!empty($invoiceArr['paid_amount'])) ? $invoiceArr['paid_amount'] : "Free";
                                                                                    $body .= '</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                     <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>



                                                <tr>
                                                    <td height="20" bgcolor="" style=""></td>
                                                </tr>
                                               <tr>
                                                    <td valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr>
                                                                     <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"></td>
                                                                    <td align="center" height="50" style="line-height:0px; "> 
                                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                            <tbody>
                                                                                <tr>     
                                                                                  
                                                                                    <td valign="middle"  width="100%" height="30" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">  Regards,</td>
                                                                                    
                                                                                </tr>
                                                                                <tr>     
                                                                                  
                                                                                    <td valign="middle"  width="85%" height="30" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito">Team Mglobally</td>
                                                                                   
                                                                                </tr>
                                                                                
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                     <td width="2%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"></td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                               
                                                
                                               
                                                
                                                <tr>
                                                    <td height="20" bgcolor="" style=""></td>
                                                </tr>
												</td>
                                                </tr>
                                            



               
                <tr>
                    <td valign="" bgcolor="#f5f5f5" height="70" align="center" style="line-height:0px; border-top:1px solid #dfdfdf;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> </td>
                                    <td width="45%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"> 
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>

                                                <tr>
                                                    <td width="100%" height="35" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito"><strong>Off:</strong> SOLUS, 3rd Floor,</td>


                                                </tr>
                                                <tr>
                                                    <td width="100%" height="35" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito"><strong>Call Us:</strong> +91 80 4664 7799</td>


                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                    <td width="50%" valign="middle" align="left" style="line-height:20px; color: #828282; font-size:14px; font-family:Nunito">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td width="100%" height="35" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:14px; font-family:Nunito"><strong>Mail us:</strong> info@mglobal.com</td>


                                                </tr>
                                                <tr>
                                                    <td width="100%" height="35" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:Nunito"><strong>Visit Us On:</strong> www.<p style="color:#f15c2b; display:inline">mglobally </p>.com</td>


                                                </tr>

                                            </tbody>
                                        </table>  
                                    </td>
                                </tr>
                            </tbody>
                        </table></td>
                </tr>
                
                <tr>
                    <td valign="" bgcolor="#fcfcfc" height="70" style="line-height:0px;  border-top:1px solid #dfdfdf;">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="5%"></td>
                                    <td width="8%"><a href=""> <img width="" border="0" src="/email-images/skype.png"></a></td>
                                    <td width="37%" valign="middle" align="left" style="line-height:0px;color: #19bcf1;font-size:16px; font-family:Nunito"><a style="line-height:0px;color: #19bcf1; text-decoration:none;" href="">91 80 4664 7799</a> </td>
                                    <td width="50%" valign="middle" style="line-height:0px;color: #828282;font-size:16px; font-family:Nunito">
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td width="15%" valign="middle" align="left"><a href=""><img width="" border="0" src="/email-images/facebook-icon.png"></a></td>
                                                    <td width="15%" valign="middle" align="left"><a href=""><img width="" border="0" src="/email-images/googleplus.png"></a></td>
                                                    <td width="15%" valign="middle" align="left"><a href=""><img width="" border="0" src="/email-images/pinterest-icon.png"></a></td>
                                                    <td width="15%" valign="middle" align="left"><a href=""><img width="" border="0" src="/email-images/twitter-icon.png"></a></td>
                                                    <td width="40%" valign="middle" align="left"></td>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table></td>
                </tr>
                
                <tr>
                  <td valign="" bgcolor="#f5f5f5" height="40" align="center" style="line-height:0px; border-top:1px solid #dfdfdf;"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                      <tbody>
                        <tr>
                          <td width="100%" valign="middle" align="center" style="line-height:0px; color: #828282; font-size:14px; font-family:Nunito"><strong>Off:</strong> SOLUS, 3rd Floor, #2, 1st Cross, J. C. Road, Bangalore - 560027, Karnataka, India </td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr>
                <tr>
                  <td valign="" bgcolor="#f5f5f5" height="40" style="line-height:0px;"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                      <tbody>
                        <tr>
                          <td width="50%" valign="middle" align="center" style="line-height:0px;color: #828282;font-size:16px; font-family:Nunito"><strong>Mail us:</strong> info@mglobal.com </td>
                          <td width="50%" valign="middle" style="line-height:0px;color: #828282;font-size:16px; font-family:Nunito"><strong>Call Us:</strong> +91 80 4664 7799</td>
                        </tr>
                      </tbody>
                    </table></td>
                </tr> 
                <tr>
                    <td valign="" bgcolor="#fafafa" height="30" style="line-height:0px; border-top:1px solid #dfdfdf;font-size: 14px;color: #cccccc"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="100%" valign="middle" align="center" style="line-height:0px; font-size:14px; font-family:Nunito"> Please do not reply to this email. Emails sent to this address will not be answered. </td>
                                </tr>
                            </tbody>
                        </table></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>