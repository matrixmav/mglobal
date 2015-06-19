 <?php $this->renderPartial('//mailTemp/header'); ?>
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
                Your transaction was successfully . Below are the details:
                  </td>
                  </tr>
                  
                  
                  <tr>
            	  <td height="20" bgcolor="" style=""></td>
            </tr>
            <tr>
            	 <td height=""  valign="middle" align="left" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">
            <table width="100%" cellspacing="0" cellpadding="0" border="1">
          <tbody>
            <tr>
            	<th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">Transaction id :</th>
                <th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'"><?php echo $userObjectArr['transactionId']; ?></th>
            </tr>
            <tr>
            	<th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">Transfer Date :</th>
                <th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'"><?php echo $userObjectArr['date']; ?></th>
            </tr>
            <tr>
            	<th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">Transfer From(Username):</th>
                <th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'"><?php echo $userObjectArr['from_name']; ?></td>
            </th>
            </tr>
             <tr>
            	<th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">Transfer To(Username) : </th>
                <th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'"><?php echo $userObjectArr['to_name']; ?></th>
            </tr>
             <tr>
            	<th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">Transfer value: </th>
                <th width="50%" align="center" style="line-height:22px; color: #6b6b6b; font-size:16px; font-family:'Nunito'">$<?php echo $userObjectArr['fund']; ?></th>
            </tr>
            </tbody>
            </table>
                  </td>
            </tr>
            
            
            <tr>
            	  <td height="20" bgcolor="" style=""></td>
            </tr>
            
                 
              
   
  
    <?php $this->renderPartial('//mailTemp/footer'); ?>