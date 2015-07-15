<?php $this->renderPartial('../mailTemp/header'); ?>
<tr>
    <td valign="" bgcolor="#efed6a" height="55" align="left" style="line-height:0px; font-size:16px">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
                    <td width="90%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> Hello <?php echo ucfirst($userObjectArr['full_name']); ?></td>
                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>

<!-- text description -->
<tr>
    <td valign="" bgcolor="#fafafa" height="" align="left" style="line-height:0px; font-size:16px">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
                    <td width="90%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> 
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td height="20" bgcolor="" style=""></td>
                                </tr>
                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #3fb90f; font-size:16px; font-family:'Nunito'">
                                        Thank you for signing up with us
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20" bgcolor="" style=""></td>
                                </tr>
                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
                                        Your email address <a href="" style="color:#f15c2b; display:inline"><?php //echo $model->email; ?></a>, has been set as the Registrant contact on <p style="color:#f15c2b; display:inline">mglobally </p>.com for UserName :<strong> <?php //echo $model->name; ?> </strong> . To verify your email address, please click on the following link.
                                    </td>
                                </tr>
                               
                                <tr>
                                    <td height="20" bgcolor="" style=""></td>
                                </tr>

                                <tr>
    <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
        Regards,
    </td>
</tr>
<tr>
    <td height="5" bgcolor="" style=""></td>
</tr>
<tr>
    <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
        Team Mglobally
    </td>
</tr>
<tr>
    <td height="20" bgcolor="" style=""></td>
</tr>
</tr>
</tbody>
</table>
</td>
<td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
</tr>
</tbody>
</table>
</td>
</tr>    
<tr>
    <td valign="" bgcolor="#f5f5f5" height="70" align="center" style="line-height:0px; border-top:1px solid #dfdfdf;">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
                    <td width="45%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> 
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>

                                <tr>
                                    <td width="100%" height="35" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:14px; font-family:'Nunito'"><strong>Off:</strong> SOLUS, 3rd Floor,</td>


                                </tr>
                                <tr>
                                    <td width="100%" height="35" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:14px; font-family:'Nunito'"><strong>Call Us:</strong> +91 80 4664 7799</td>


                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="50%" valign="middle" align="left" style="line-height:20px; color: #828282; font-size:14px; font-family:'Nunito'">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="100%" height="35" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:14px; font-family:'Nunito'"><strong>Mail us:</strong> info@mglobal.com</td>
                                </tr>
                                <tr>
                                    <td width="100%" height="35" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"><strong>Visit Us On:</strong> www.<p style="color:#f15c2b; display:inline">mglobally</p>.com</td>
                                </tr>
                            </tbody>
                        </table>  
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>

<!-- call -->
<tr>
    <td valign="" bgcolor="#fcfcfc" height="70" style="line-height:0px;  border-top:1px solid #dfdfdf;">
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td width="5%"></td>
                    <td width="8%"><a href=""> <img width="" border="0" src="<?php echo Yii::app()->getBaseUrl(true); ?>/email-images/skype.png"></a></td>
                    <td width="37%" valign="middle" align="left" style="line-height:0px;color: #19bcf1;font-size:16px; font-family:'Nunito'"><a style="line-height:0px;color: #19bcf1; text-decoration:none;" href="">91 80 4664 7799</a> </td>
                    <td width="50%" valign="middle" style="line-height:0px;color: #828282;font-size:16px; font-family:'Nunito'">
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="15%" valign="middle" align="left"><a href=""><img width="" border="0" src="<?php echo Yii::app()->getBaseUrl(true); ?>/email-images/facebook-icon.png"></a></td>
                                    <td width="15%" valign="middle" align="left"><a href=""><img width="" border="0" src="<?php echo Yii::app()->getBaseUrl(true); ?>/email-images/googleplus.png"></a></td>
                                    <td width="15%" valign="middle" align="left"><a href=""><img width="" border="0" src="<?php echo Yii::app()->getBaseUrl(true); ?>/email-images/pinterest-icon.png"></a></td>
                                    <td width="15%" valign="middle" align="left"><a href=""><img width="" border="0" src="<?php echo Yii::app()->getBaseUrl(true); ?>/email-images/twitter-icon.png"></a></td>
                                    <td width="40%" valign="middle" align="left"></td>

                                </tr>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </tbody>
        </table></td>
</tr>

<!-- content 
<tr>
  <td valign="" bgcolor="#f5f5f5" height="40" align="center" style="line-height:0px; border-top:1px solid #dfdfdf;"><table width="100%" cellspacing="0" cellpadding="0" border="0">
      <tbody>
        <tr>
          <td width="100%" valign="middle" align="center" style="line-height:0px; color: #828282; font-size:14px; font-family:'Nunito'"><strong>Off:</strong> SOLUS, 3rd Floor, #2, 1st Cross, J. C. Road, Bangalore - 560027, Karnataka, India </td>
        </tr>
      </tbody>
    </table></td>
</tr>
<tr>
  <td valign="" bgcolor="#f5f5f5" height="40" style="line-height:0px;"><table width="100%" cellspacing="0" cellpadding="0" border="0">
      <tbody>
        <tr>
          <td width="50%" valign="middle" align="center" style="line-height:0px;color: #828282;font-size:16px; font-family:'Nunito'"><strong>Mail us:</strong> info@mglobal.com </td>
          <td width="50%" valign="middle" style="line-height:0px;color: #828282;font-size:16px; font-family:'Nunito'"><strong>Call Us:</strong> +91 80 4664 7799</td>
        </tr>
      </tbody>
    </table></td>
</tr>-->
<tr>
    <td valign="" bgcolor="#fafafa" height="30" style="line-height:0px; border-top:1px solid #dfdfdf;font-size: 14px;color: #cccccc"><table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td width="100%" valign="middle" align="center" style="line-height:0px; font-size:14px; font-family:'Nunito'"> Please do not reply to this email. Emails sent to this address will not be answered. </td>
                </tr>
            </tbody>
        </table></td>
</tr>
</tbody>
</table>
</body>
</html>
