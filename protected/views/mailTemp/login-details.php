<?php $this->renderPartial('../mailTemp/header'); ?>
  <tr>
    	   <td valign="" bgcolor="#efed6a" height="55" align="left" style="line-height:0px; font-size:16px">
        	<table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
            	<td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
                <td width="90%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> Hello <?php echo ucfirsrt($userObjectArr->full_name);?></td>
                <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
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
                    <td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
                    <td width="90%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> 
                        <table width="100%" cellspacing="0" cellpadding="0" border="0">
                            <tbody>
                                <tr>
                                    <td height="20" bgcolor="" style=""></td>
                                </tr>


                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
                                        You have successfully activated your member account with mglobally.com. Below are the details of your account. Please check and if there are any queries please contact us.
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20" bgcolor="" style=""></td>
                                </tr>
                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
                                        Please login and update all other profile details.
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20" bgcolor="" style=""></td>
                                </tr>
                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
                                        <strong> Username :</strong> <?php echo $userObjectArr->name;?>
                                    </td>
                                </tr>
                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
                                        <strong> Password :</strong> <?php echo $userObjectArr->password;?>
                                    </td>
                                </tr>
                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
                                        <strong>Master key :</strong> <?php echo $userObjectArr->mastertPin;?>
                                    </td>
                                </tr>
                                <tr>
                                    <td height="20" bgcolor="" style=""></td>
                                </tr>
                                <tr>
                                    <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
                                        (Note : this a system Generate password please login to your account change your password/Master key This is to ensure that only you have access to your account.)
                                    </td>
                                <tr>
                                <tr>
                                    <td height="20" bgcolor="" style=""></td>
                                </tr>
                                <?php $this->renderPartial('../mailTemp/footer'); ?>