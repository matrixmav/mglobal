<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/registration.js"></script> 
  <div class="color-panel">
    <div class="color-mode-icons icon-color"><i class="fa fa-share-alt"></i></div>
    <div class="color-mode-icons icon-color-close"><i class="fa fa-share-alt"></i></div>
    <div class="color-mode">
     

      <ul class="inline">
         
          <li><a class="fb-icon" href="https://www.facebook.com/pages/MGlobally/516594005156691?ref=hl" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
          <li><a class="tw-icon" href="https://twitter.com/MGlobally" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
          <li><a class="skype-icon" href="callto://MGlobally" target="_blank"><i class="fa fa-skype"></i></a></li>
          <li><a  class="link-icon " href="" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
          <li><a class="utube-icon" href="https://www.youtube.com/channel/UCQUJDa-Mvxee80MMrhK-_S" target="_blank"><i class="fa fa-youtube-square"></i></a></li>
          <li><a class="whatsap-icon" href=""><i class="fa fa-whatsapp"></i></a></li>
      </ul>
      
    </div>
  </div>

 <!-- SIDEBAR FORMS -->
 <div class="sideForm">
    <div class="color-mode-icons icon-list" ><i class="fa fa-list"></i></div>
    
    <div class="color-mode-list" style="display:none;">
     

      <ul class="inline">
         
          <li>
              <a href="#inline11" class="fancybox" data-toggle="tooltip" data-placement="top" title="Contact Us"><i class="fa fa-file-text"></i></a>
            
              <div id="inline11" style="display:none" class="readMoreBox content" style="width: 100%">
                <div class="">
               <h2>contact<strong>  us</strong></h2>
               <div id="show_worning" style="display:none;"> </div>
               <div id="show_worning" style="display:none;"> </div>
               <div class="col-sm-12">
                   <form method="post">
                       <div class="form-group">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-user"></i></div>
                               <input type="text" class="form-control" id="name" placeholder="Name" name="name">
                            </div>
                           <div id="show_wornings_name"></div>
                        </div>
                       <div class="form-group">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                               <input type="text" class="form-control" placeholder="Email" name="email" id="email">
                           </div>
                           <div id="show_wornings_email"></div>  
                        </div>
                       <div class="form-group">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                               <input class="form-control" id="subject" placeholder="Subject" name="subject">
                             </div>
                           <div id="show_wornings_subject"></div>   
                        </div>
                       <div class="form-group">
                       <textarea class="form-control" rows="3" placeholder="message" id="message"></textarea>
                       </div>
                       <div id="show_wornings_message"></div>
                       <div class="form-group">
   
                           <button type="button" class="btn btn-success" onclick="return submitForm();">Submit</button>
    
  </div>
                   </form>
                   
               </div>
            </div>
      </div>
        </li>
        <li> <a href="#inline12" class="fancybox"  data-toggle="tooltip" data-placement="top" title="Feedback Form"><i class="fa fa-envelope-o"></i></a>
            <div id="inline12" style="display:none" class="readMoreBox content">
               <h2>feedback<strong> form </strong></h2>
               <div id="show_worningF" style="display:none;"></div>
               <div id="show_worningf" style="display:none;"></div>
               
        <div class="col-sm-12">
            <form method="post">
                       <div class="form-group">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-user"></i></div>
                               <input type="text" class="form-control"  placeholder="Name" id="nameF">
                               <div id="show_wornings_nameF"></div>
                           </div>
                        </div>
                       <div class="form-group">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                               <input type="text" class="form-control"  placeholder="Email" id="emailF">
                            </div>
                           <div id="show_wornings_emailF"></div>
                        </div>
                       <div class="form-group">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-pencil"></i></div>
                               <select class="form-control" placeholder="Feedback category" id="feedback_category">
                                   <option value="">Select Category</option>
                                   <option value="Design">Design</option>
                                   <option value="Functionality">Functionality</option>
                               </select>
                            </div>
                        </div>
                       <div class="form-group">
                         <textarea class="form-control" rows="3" placeholder="comment" id="comment"></textarea>
                         </div>
                           <div id="show_wornings_messageF"></div>
                       
                       <div class="form-group">
   
                           <button type="button" class="btn btn-success" onclick="return submitFeddbackForm();">Submit</button>
    
  </div>
                   </form>
                   
               </div>
        </li>
        <li><a href="#inline13" class="fancybox"  data-toggle="tooltip" data-placement="top" title="Bug Form"><i class="fa fa-bug"></i></a>
            <div id="inline13" style="display:none" class="readMoreBox content">
               <h2>web<strong> bug </strong></h2>
          <div id="show_worningR" style="display:none;"></div>
               <div id="show_worningr" style="display:none;"></div>
               
         <div class="col-sm-12">
             <form method="post">
                       <div class="form-group">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-user"></i></div>
                               <input type="text" class="form-control" id="nameB" placeholder="Name">
                              
                           </div>
                            <div id="show_wornings_nameB"></div>
                        </div>
                       <div class="form-group">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                               <input type="text" class="form-control" id="emailB" placeholder="Email">
                               
                           </div>
                           <div id="show_wornings_emailB"></div>
                        </div>
                       <div class="form-group">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-phone"></i></div>
                               <input type="text" class="form-control" id="phone" placeholder="contact no">
                               
                           </div>
                        </div>
                       
                      
                       <div class="form-group">
                          
                       <textarea class="form-control" rows="3" placeholder="Description" id="description"></textarea>
                        </div>
                       
                 <div id="show_wornings_messageB"></div>
                        
                       <div class="form-group">
                        
                           <button type="button" class="btn btn-success" onclick="return bugFormSubmit();">Submit</button>
    
  </div>
                   </form>
                   
               </div>
        </li>
       
      </ul>
      
    </div>
  </div>
 <!--END  -->
  <!-- END BEGIN STYLE CUSTOMIZER -->
  <!-- Header BEGIN -->
  <div class="header header-mobi-ext">
    <div class="container">
        <!-----sub-header------>
        
        <div class="row pre-header ">
        <div class="container">
          <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info col-xs-12">
                    <ul class="list-unstyled list-inline">
                        <li><i class="fa fa-phone"></i><span>+1 456 6717</span></li>

                        <li style="border: none;"><i class="fa fa-envelope-o"></i><span>info@mglobally.com</span></li>
                        <li style="border: none;"><a href="callto://MGlobally"><button id="checkout" class="btn  topBtn">Call Us</button><a/></li>

                    </ul>
              </div>
            <div class="col-md-6 col-sm-6 additional-nav col-xs-12">
                    <ul class="list-unstyled list-inline pull-right">
                       <?php 
if(Yii::app()->session['adminID']!= '1'){ 
if(isset(Yii::app()->session) && Yii::app()->session['userid']!=''){ ?>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/profile/dashboard">My Account</a></li>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/site/logout">Logout</a></li>
                    <?php }else{?>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/user/login">Log In</a></li>
                    <li><a href="<?php echo Yii::app()->getBaseUrl(true); ?>/user/registration">Registration</a></li>
                    <?php }}?>
                    </ul>
                </div>
            </div>
        </div>        
    </div>
        
        
        
        
        <!-----sub header ends---->
        
        
        
        
      <div class="row header-index">
        <!-- Logo BEGIN -->
        <div class="col-md-2 col-sm-2">
          <a class="scroll site-logo" href="#promo-block"><img class="img-responsive "src="../../../images/logo/logo.png" width="140px" ></a>
        </div>
        <!-- Logo END -->
        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>
        <!-- Navigation BEGIN -->
        <div class="col-md-10 pull-right">
          <ul class="header-navigation">
            <li class="current"><a href="#promo-block">Home</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#team">Media Center</a></li>
            <li><a href="#prices">Pricing</a></li>
           
            <li><a href="#benefits">Benefits</a></li>
            <li><a href="#portfolio">Templates </a></li>
            <li><a href="/user/legal">Legal </a></li>
            <li><a href="#contact">Contact</a></li>
             <li>   <a href="/user/faq" class="fancybox">FAQ</a>
                  <div id="inline14" style="display:none" class="readMoreBox content">
               <h2><strong> faq</strong></h2>
               <div class="faqsection">
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            <span class="">Q1. </span> let me ask something
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
          <span class="numAns"><strong>Ans.</strong> </span> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip commodo consequat. 
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <span class="">Q1. </span> let me ask something
        </a>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
       <span class="numAns"><strong>Ans.</strong> </span> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip commodo consequat. 
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingThree">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
         <span class="">Q1. </span> let me ask something
        </a>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
      <div class="panel-body">
        
        <span class="numAns"><strong>Ans.</strong> </span>  Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip commodo consequat. 
      </div>
    </div>
  </div>
</div>
                  </div>
             </li>
            <!----<li><a href="user/login">Login</a></li>
            <li><a href="user/registration">Registration</a></li>----->
          </ul>
        </div>
        <!-- Navigation END -->
      </div>
    </div>
  </div>
  <script>
$(document).ready(function(){
    $(".sideForm").click(function(){
        $(".color-mode-list").toggle();
    });

 
		$('.fancybox').fancybox({
		 helpers: { 
        title: null
    }
		});
               
		});
</script>
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
   
</script>
