 <?php $this->renderPartial('/mailTemp/header'); ?>
<tr>
    	   <td valign="" bgcolor="#efed6a" height="55" align="left" style="line-height:0px; font-size:16px">
        	<table width="100%" cellspacing="0" cellpadding="0" border="0">
          <tbody>
            <tr>
            	<td width="5%" valign="middle" align="center" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> </td>
                <td width="90%" valign="middle" align="left" style="line-height:22px; color: #828282; font-size:16px; font-family:'Nunito'"> Hello <?php echo $userObjectArr['email'];?></td>
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
                 Have you tried your hands on the newest web designing platform yet. MGlobally is here to help you book domain, hosting space and website designing & development. 
                      
                       has sent invitation to register with mGlobally and get available offers. Click below mentioned link to register.<br/>
                
                  </td>
                  </tr>
                    <tr>
            	  <td height="20" bgcolor="" style=""></td>
            </tr>
              <tr>
            	  <td height="20" bgcolor="" style=""> Sign up with my referral code <?php echo ucwords($userObjectArr['name']); ?> and enjoy the ultimate IT solutions by MGlobally.</td>
            </tr>
                <tr>
            	  <td height="20" bgcolor="" style=""></td>
            </tr>
               <tr>
            	  <td height="20" bgcolor="" style=""> <?php echo $userObjectArr['link'];?></td>
            </tr>


                  
                  
                  <tr>
            	  <td height="20" bgcolor="" style=""></td>
            </tr>
             <tr>
            
                  <tr>
                  <tr>
            	  <td height="20" bgcolor="" style=""></td>
            </tr>
             <?php $this->renderPartial('/mailTemp/footer'); ?>
