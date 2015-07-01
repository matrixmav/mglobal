<!-- BEGIN PRE-FOOTER -->
  <div class="pre-footer" id="contact">
    <div class="container">
      <div class="row bg-f1">
        <!-- BEGIN BOTTOM ABOUT BLOCK -->
        <!-- BEGIN BOTTOM ABOUT BLOCK -->
        <div class="col-md-2 col-sm-6 pre-footer-col">
          <p class="f-font">Legal</p>
          <p class="f-cnt"><a href="mailto:legal@xyz.com">legal@xyz.com</a><br/> 
          91-8500425185</p>
           
          <p class="f-font">Billing</p>
          <p class="f-cnt"><a href="mailto:billing@xyz.com">Billing@xyz.com</a><br/> 
          91-8500425185</p>
          
          <p class="f-font">Support</p>
          <p class="f-cnt"><a href="mailto:support@xyz.com">support@xyz.com</a><br/> 
          91-8500425185</p>
        </div>
        <!-- END BOTTOM ABOUT BLOCK -->
        <!-- END BOTTOM ABOUT BLOCK -->
        <!-- BEGIN TWITTER BLOCK --> 
        <div class="col-md-2 col-sm-6 pre-footer-col">
       
          <p class="f-font">Member Enquiry</p>
          <p class="f-cnt"><a href="mailto:memberenquiry@xyz.com">memberenquiry@xyz.com</a><br/> 
          91-8500425185 </p>
          
          <p class="f-font">Sales</p>
          <p class="f-cnt"><a href="mailto:sales@xyz.com">sales@xyz.com</a><br/> 
          91-8500425185</p>
          
          <p class="f-font">Info</p>
          <p class="f-cnt"><a href="mailto:info@xyz.com">Info@xyz.com</a><br/> 
         91-8500425185</p>   
        </div>
         <div class="col-md-5 col-sm-6 pre-footer-col">
            <p class="f-font">News Update</p>
           <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip  commodo consequat. </p>
          <p>Duis autem vel eum iriure dolor vulputate velit esse molestie at dolore.</p>
          <p class="f-font">News Letter</p>
          <form class="form-inline">
              <div class="form-group">
                  <input type="email" class="form-control mailTxt" id="email" placeholder="Email">
                  <div id="show_wornings" class="error"></div>
                  <div id="show_worningS" class="success"></div>
                   <button type="submit" class="btn  signBtn" onclick="return subscription();">Sign in</button>
              </div>
          </form>
         
          
        </div>
       
        <!-- END TWITTER BLOCK -->
        <div class="col-md-3 col-sm-6 pre-footer-col">
          <!-- BEGIN BOTTOM CONTACTS -->
         <p class="f-font">Our Contacts</p>
          <address class="margin-bottom-20">
              <strong> MaverickGlobal InfoSoft Services Pvt Ltd,</strong><br/>
                Solus, 3rd Floor, # 2,1st Cross, JC Road<br/>
                Opp.Jain University,<br/>
                Bangalore 560 027, India<br/>
            
            
            
          </address>
          <!-- END BOTTOM CONTACTS -->
          <div class="pre-footer-subscribe-box">
              <a href=""><img src="/images/mail-icon.png" width="" height="" /><span class="con-f"> :&nbsp; +91 1234567890</span></a><br/><br/>
                <a href=""><img src="/images/whatsapp-icon.png" width="" height="" /><span class="con-f"> :&nbsp; +91 1234567890</span></a><br/><br/>
                <a href=""><img src="/images/skype-icon.png" width="" height="" /><span class="con-f"> :&nbsp; +91 1234567890</span></a><br/><br/>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- END PRE-FOOTER -->
  <!-- BEGIN FOOTER -->
  <div class="footer">
    <div class="container">
      <div class="row bg-f2">
        <!-- BEGIN COPYRIGHT -->
        <div class="col-md-6 col-sm-6 ">
          <div class="copyright">@ COPYRIGHT 2015, ALL RIGHTS RESERVED, MGlobally</div>
        </div>
        <!-- END COPYRIGHT -->
        <!-- BEGIN SOCIAL ICONS -->
        <div class="col-md-6 col-sm-6 pull-right">
          <ul class="social-icons">
               <li><a class="rss" data-original-title="rss" href="javascript:void(0);"> <img src="/images/g-footer-icon.png"></a></li>  
                <li><a class="rss" data-original-title="rss" href="javascript:void(0);"> <img src="/images/ln-footer-icon.png"></a></li> 
                <li><a class="rss" data-original-title="rss" href="javascript:void(0);"> <img src="/images/tw-footer-icon.png"></a></li> 
                  <li><a class="rss" data-original-title="rss" href="javascript:void(0);"> <img src="/images/pinterest-footer-icon.png"></a></li>
              <li><a class="rss" data-original-title="rss" href="javascript:void(0);"> <img src="/images/fb-footer-icon.png"></a></li>
            
              
             
             
              
           
          </ul>
        </div>
        <!-- END SOCIAL ICONS -->
      </div>
    </div>
  </div>
  <script>
         function isEmail(aStr)
             {

            var reEmail=/^[0-9a-zA-Z_\.-]+\@[0-9a-zA-Z_\.-]+\.[0-9a-zA-Z_\.-]+$/;
            if(!reEmail.test(aStr))
            {
            return false;

            }
            return true;

            }/*End of isEmail function*/

            function subscription()
            {
            var email = document.getElementById('email').value;
            if(!isEmail(document.getElementById('email').value)){
            document.getElementById('show_wornings').style.display="block";
            document.getElementById("show_wornings").innerHTML = "Please enter valid email.";
            document.getElementById('email').focus();
            return false;
            }else{
            var dataString = 'email='+email;
            $.ajax({
            type: "GET",
            url: "site/subscription",
            data: dataString,
            cache: false,
            success: function(html){
                    if(html == 1){
                        document.getElementById('show_wornings').style.display="none";
                        document.getElementById('show_worningS').style.display="block";
                        document.getElementById("show_worningS").innerHTML = "Thanks! Your subscription has been confirmed with us.";
                        $("#email").val('');
                    }else{
                        document.getElementById('show_worningS').style.display = "none";
                        document.getElementById("show_wornings").innerHTML = "There might be something wrong.";
                    }
                    $("#show_worningS").fadeOut(10000);
                    $("#show_wornings").fadeOut(10000); 
              } 
            });
            }    
}
  
  </script>