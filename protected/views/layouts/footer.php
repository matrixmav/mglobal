<?php $newsObject = BaseClass::getNewsUpdates();?>
<!-- BEGIN PRE-FOOTER -->
  <div class="pre-footer" id="contact">
    <div class="container">
      <div class="row bg-f1">
        <!-- BEGIN BOTTOM ABOUT BLOCK -->
        <!-- BEGIN BOTTOM ABOUT BLOCK -->
        <div class="col-md-2 col-sm-6 pre-footer-col">
          <p class="f-font">Legal</p>
          <p class="f-cnt"><a href="mailto:billing@mglobally.com">billing@mglobally.com</a><br/> 
          <!--91-8500425185--></p>
           
          <p class="f-font">Billing</p>
          <p class="f-cnt"><a href="mailto:legal@mglobally.com">legal@mglobally.com</a><br/> 
          <!--91-8500425185--></p>
          
          <p class="f-font">Support</p>
          <p class="f-cnt"><a href="mailto:support@mglobally.com">support@mglobally.com</a><br/> 

        </div>
        <!-- END BOTTOM ABOUT BLOCK -->
        <!-- END BOTTOM ABOUT BLOCK -->
        <!-- BEGIN TWITTER BLOCK --> 
        <div class="col-md-2 col-sm-6 pre-footer-col">
       
          
          
          <p class="f-font">Sales</p>
          <p class="f-cnt"><a href="mailto:sales@mglobally.com">sales@mglobally.com</a><br/> 
          <!--91-8500425185--></p>
          
          <p class="f-font">Info</p>
          <p class="f-cnt"><a href="mailto:info@mglobally.com">info@mglobally.com</a><br/> 
         <!--91-8500425185--></p>  
          
          <p class="f-font">Member Enquiry</p>
          <p class="f-cnt"><a href="mailto:memberenquiry@mglobally.com">memberenquiry@mglobally.com</a><br/> 
          <!--91-8500425185--> </p>
        </div>
        
         <div class="col-md-5 col-sm-6 pre-footer-col">
             <?php if(!empty($newsObject)){?>
            <p class="f-font">News Update</p>
           <p><?php echo $newsObject;?></p>
        <?php }?>
          <p class="f-font">News Letter</p>
          <form class="form-inline">
              <div class="form-group">
                  <input type="email" class="form-control mailTxt" id="email1" placeholder="Email">
                  <input type="button" class="btn  signBtn" onclick="subscription();" value="Subscribe">
                  <div id="show_wornings" class="error1"></div>
                  <div id="show_worningS" class="success1"></div>
                   
              </div>
          </form>
         
          
        </div>
       
        <!-- END TWITTER BLOCK -->
        <div class="col-md-3 col-sm-6 pre-footer-col">
          <!-- BEGIN BOTTOM CONTACTS -->
         <p class="f-font">Our Contacts</p>
          <address class="margin-bottom-20">
           <strong> Mglobally solutions ltd,</strong><br/>
                21 Regent Street,<br>Belize City, Belize, <br/>
                Central America.<br/>
                 
            
            
            
          </address>
          <!-- END BOTTOM CONTACTS -->
          <div class="pre-footer-subscribe-box">
                <a href=""><img src="/images/whatsapp-icon.png" width="" height="" /><span class="con-f"> :&nbsp; +525527895477</span></a><br/><br/>
                <a href=""><img src="/images/skype-icon.png" width="" height="" /><span class="con-f"> :&nbsp; +525527895477</span></a><br/><br/>
          </div>
        </div>
      </div>
         <div class="policy-section">
		<ul>
		<li><a href="#">Policy 1</a></li>
		<li><a href="#">Policy 2</a></li>
		<li><a href="#">Policy 3</a></li>
		<li><a href="#">Policy 4</a></li>
		</ul>
		</div>
    </div>
  </div>
  <!-- END PRE-FOOTER -->
  <!-- BEGIN FOOTER -->
  <div class="footer">
    <div class="container">
		
      <div class="row bg-f2">
        
        <!-- BEGIN SOCIAL ICONS -->
        <div class="col-md-5 col-sm-6">
          <ul class="social-icons">
		 
               <li><a class="rss" data-original-title="rss" href="https://plus.google.com/b/114439069888125758419/114439069888125758419/about" target="_blank"> <img src="/images/g-footer-icon.png"></a></li>  
                <li><a class="rss" data-original-title="rss" href="javascript:void(0);" target="_blank"> <img src="/images/ln-footer-icon.png"></a></li> 
                <li><a class="rss" data-original-title="rss" href="https://twitter.com/MGlobally" target="_blank"> <img src="/images/tw-footer-icon.png"></a></li> 
                  <li><a class="rss" data-original-title="rss" href="https://www.pinterest.com/mglobally/" target="_blank"> <img src="/images/pinterest-footer-icon.png"></a></li>
              <li><a class="rss" data-original-title="rss" href="https://www.facebook.com/pages/MGlobally/516594005156691?ref=hl" target="_blank"> <img src="/images/fb-footer-icon.png"></a></li>
            

             
             
              
           
          </ul>
        </div>
        <!-- END SOCIAL ICONS -->
		
		<!-- BEGIN COPYRIGHT -->
        <div class="col-md-6 col-sm-6 ">
          <div class="copyright">@ COPYRIGHT 2015, ALL RIGHTS RESERVED, MGlobally</div>
        </div>
        <!-- END COPYRIGHT -->
		
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
            var email = document.getElementById('email1').value;
            if(document.getElementById('email1').value==''){
            document.getElementById('show_wornings').style.display="block";
            document.getElementById("show_wornings").innerHTML = "Please enter email.";
            document.getElementById('email1').focus();
            return false;
            }
            else if(!isEmail(document.getElementById('email1').value)){
            document.getElementById('show_wornings').style.display="block";
            document.getElementById("show_wornings").innerHTML = "Please enter valid email.";
            document.getElementById('email1').focus();
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
  <!--Start of Zopim Live Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?3BLH8Knm3PQkJynPQaaWpJwSzrIgBrSK";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zopim Live Chat Script-->
