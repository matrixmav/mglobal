 <?php $this->renderPartial('../mailTemp/header'); ?>
<tr>
    	   <td valign="" bgcolor="#efed6a" height="55" align="left" style="line-height:0px; font-size:16px">
        	<table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
            	<td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
                <td width="90%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> Hello <?php echo ucfirst($userObjectArr->full_name);?></td>
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
            	  <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
                 This is a confirmation that the master key for your account with Mglobally has been changed. The username for the account is:
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
              <strong>New M Pin :</strong> <?php echo $userObjectArr->new_master_pin;?>
                  </td>
            </tr>
            <tr>
            	 <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
               <strong>IP address of the requester :</strong> <?php echo $userObjectArr->ip;?>

                  </td>
            </tr>
            <tr>
            	  <td height="20" bgcolor="" style=""></td>
            </tr>
            <tr>
            	  <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
              If you didn't change your master key change, try signing in and reset your master key if necessary
                  </td>
                  <tr>
                  <tr>
            	  <td height="20" bgcolor="" style=""></td>
            </tr>
             <?php $this->renderPartial('../mailTemp/footer'); ?>
