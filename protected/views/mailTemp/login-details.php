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
       <img width="" border="0" src="<?php echo Yii::app()->getBaseUrl(true); ?>/email-images/chekmark.png">
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
                         <img width="" border="0" src="<?php echo Yii::app()->getBaseUrl(true); ?>/email-images/secure.png">
                        </td>
                        <td width="60%" valign="top" height="" bgcolor="#fafafa" style="line-height:0px;">
                        	<table width="100%" cellspacing="0" cellpadding="0" border="0">
                  <tbody>
                  	<tr height="30">
                    <td width="50%" valign="middle" align="left" height="" bgcolor="#fafafa" style="line-height:19px; color: #828282; font-size:18px; line-height:21px; font-family:'Nunito'">Username: </td>
                    <td width="50%" valign="middle" height="" bgcolor="#fafafa" style="line-height:19px; font-size:18px; color: #828282; line-height:21px; font-family:'Nunito'"><?php echo $userObjectArr['name'];?></td>
                    </tr>
                    <tr height="30">
                    <td width="50%" valign="middle"  align="left"  height="" bgcolor="#fafafa" style="line-height:19px; color: #828282; font-size:18px; line-height:21px; font-family:'Nunito'">Password:</td>
                    <td width="50%" valign="middle"  align=""  height="" bgcolor="#fafafa" style="line-height:19px; color: #828282; font-size:18px; line-height:21px; font-family:'Nunito'"><?php echo $userObjectArr['password'];?></td>
                    </tr>
                    <tr height="30">
                    <td width="50%" valign="middle"  align="left"  height="" bgcolor="#fafafa" style="line-height:19px; color: #828282; font-size:18px; line-height:21px; font-family:'Nunito'">Master Key: </td>
                    <td width="50%" valign="middle" height="" bgcolor="#fafafa" style="line-height:19px; color: #828282; font-size:18px; line-height:21px; font-family:'Nunito'"><?php echo $userObjectArr['masterPin'];?></td>
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
    
    
    
     
    
    <!-- address -->
    <tr>
      <td valign="" bgcolor="#f5f5f5" height="70" align="center" style="line-height:0px; border-top:1px solid #dfdfdf;">
      <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
            <td width="8%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
              <td width="42%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> 
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
            	<td width="100%" height="35" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"><strong>Visit Us On:</strong> www.<p style="color:#f15c2b; display:inline">mglobally </p>.com</td>
                

            </tr>
             
            </tbody>
            </table>  
                </td>
            </tr>
          </tbody>
        </table></td>
    </tr>
      <!-- call -->
      <tr>
      <td valign="" bgcolor="#fcfcfc" height="70" style="line-height:0px;  border-top:1px solid #dfdfdf;">
      <table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
            <td width="8%"></td>
             <td width="8%"><a href=""> <img width="" border="0" src="<?php echo Yii::app()->getBaseUrl(true); ?>/email-images/skype.png"></a></td>
              <td width="34%" valign="middle" align="left" style="line-height:0px;color: #19bcf1;font-size:16px; font-family:'Nunito'"><a style="line-height:0px;color: #19bcf1; text-decoration:none;" href="">91 80 4664 7799</a> </td>
              <td width="50%" valign="middle" style="line-height:0px;color: #828282;font-size:16px; font-family:'Nunito'">
              	<table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
            	 <tr>
            	<td width="15%" valign="middle" align="left"><a href=""><img width="" border="0" src="<?php echo Yii::app()->getBaseUrl(true); ?>/email-images/facebook-icon.png"></a></td>
                <td width="15%" valign="middle" align="left"><a href=""><img width="" border="0" src="<?php echo Yii::app()->getBaseUrl(true); ?>/email-images/googleplus.png"></a></td>
                <td width="15%" valign="middle" align="left"><a href=""><img width="" border="0" src="<?php echo Yii::app()->getBaseUrl(true); ?>/email-images/pinterest-icon.png"></a></td>
                <td width="15%" valign="middle" align="left"><a href=""><img width="" border="0" src="<?php echo Yii::app()->getBaseUrl(true); ?>/email-images/twitter-icon.png"></a></td>
                <td width="40%" valign="middle" align="left"></td>
                
            </tr>
                
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
