<?php $this->renderPartial('../mailTemp/header'); ?>
<tr>
    <td width="100%" valign="middle" align="left" style="line-height:0px;"> <img width="" border="0" src="<?php echo Yii::app()->getBaseUrl(true); ?>/email-images/banner.jpg"></td>
</tr>
<tr>
    <td width="100%" valign="middle" align="center" height="50" bgcolor="#efed6a"style=" color:#828282;font-size:16px; line-height:19px; font-family:'Nunito'"> 
        Dear Customer, Thanks for Registering with us!
    </td>
</tr>
<tr>
    <td>
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td width="30%" valign="middle" align="right" height="50" bgcolor="#7cc576"style=" color:#828282;font-size:16px; line-height:19px; font-family:'Nunito'"> 
                        <img width="" border="0" src="chekmark.png">
                    </td>
                    <td width="10%" valign="middle" align="left" height="50" bgcolor="#7cc576"style=" color:#828282;font-size:16px; line-height:19px; font-family:'Nunito'"> 

                    </td>
                    <td width="60%" valign="middle" align="left" height="50" bgcolor="#7cc576"style=" color:#ffffff;font-size:18px; line-height:21px; font-family:'Nunito'"> 
                        Congratulations
                    </td>
                </tr>
            </tbody>
        </table>
    </td>
</tr>
<!-- content -->
<tr>
    <td valign="top" height="" bgcolor="#fafafa" style="line-height:0px;"><table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tbody>
                <tr>
                    <td width="10%" valign="top">&nbsp;</td>
                    <td width="80%" valign="top"><table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td width="100%" height="20">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                            <tbody>
                                                <tr>
                                                    <td width="40%" valign="top" height="" bgcolor="#fafafa" style="line-height:0px;">
                                                        <img width="" border="0" src="secure.png">
                                                    </td>
                                                    <td width="60%" valign="top" height="" bgcolor="#fafafa" style="line-height:0px;">
                                                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                            <tbody>
                                                                <tr height="30">
                                                                    <td width="50%" valign="middle" align="left" height="" bgcolor="#fafafa" style="line-height:19px; color: #828282; font-size:18px; line-height:21px; font-family:'Nunito'">Username: </td>
                                                                    <td width="50%" valign="middle" height="" bgcolor="#fafafa" style="line-height:19px; font-size:18px; color: #828282; line-height:21px; font-family:'Nunito'"><?php echo $userObjectArr->name; ?></td>
                                                                </tr>
                                                                <tr height="30">
                                                                    <td width="50%" valign="middle"  align="left"  height="" bgcolor="#fafafa" style="line-height:19px; color: #828282; font-size:18px; line-height:21px; font-family:'Nunito'">Password:</td>
                                                                    <td width="50%" valign="middle"  align=""  height="" bgcolor="#fafafa" style="line-height:19px; color: #828282; font-size:18px; line-height:21px; font-family:'Nunito'"><?php echo $userObjectArr->password; ?></td>
                                                                </tr>
                                                                <tr height="30">
                                                                    <td width="50%" valign="middle"  align="left"  height="" bgcolor="#fafafa" style="line-height:19px; color: #828282; font-size:18px; line-height:21px; font-family:'Nunito'">Master Key: </td>
                                                                    <td width="50%" valign="middle" height="" bgcolor="#fafafa" style="line-height:19px; color: #828282; font-size:18px; line-height:21px; font-family:'Nunito'"><?php echo $userObjectArr->mastertPin; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td height="20"  style=""></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>


                            </tbody>
                        </table></td>
                    <td width="10%" valign="top">&nbsp;</td>
                </tr>
            </tbody>
        </table></td>
</tr>


<?php $this->renderPartial('../mailTemp/footer'); ?>