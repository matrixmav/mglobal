<!-- content -->
 <?php $this->renderPartial('/mailTemp/header'); ?>   
    <tr>
    	   <td valign="" bgcolor="#efed6a" height="55" align="left" style="line-height:0px; font-size:16px">
        	<table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
            	<td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
                <td width="90%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> Hello <?php echo $userObjectArr['to_name']; ?></td>
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
                We are sorry that your payment was not successful. The amount for the said transaction has not been charged by us. In case, the amount has been charged, the refund will be processed by next 7 Business days .
                  </td>
                  </tr>
                  
                  
                  <tr>
            	  <td height="20" bgcolor="" style=""></td>
            </tr>
            <tr>
            	 <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
              This could have happened due to a temporary error. You can retry this purchase by<a href="/order/list"> Clicking here </a>.
                  </td>
            </tr>
            
            
            <tr>
            	  <td height="20" bgcolor="" style=""></td>
            </tr>
            <tr>
            	  <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
             We assure you that we're analysing these failures and constantly improving our systems.	
                  </td>
                  <tr>
                  <tr>
            	  <td height="20" bgcolor="" style=""></td>
            </tr>
             <?php $this->renderPartial('/mailTemp/footer'); ?>