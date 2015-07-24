  <!-- Header END -->
  <div id='content-wrapper'>
<!--<div id='social-sidebar'>
<ul>
<li>
<a ><img src="images/whts1.png" />
<span class="whts">whats up</span>
</a>
</li>
<li>
<a ><img src="images/fb.png" width="20" height="20" />
<span class="fcb">Facebook</span>
</a>
</li>
<li>
<a><img src="images/skp1.png" width="20" height="20" />
<span class="skp">Skype</span>
</a>
</li>
<li>
<a><img src="images/tw.png" width="20" height="20" />
<span class="twt">Tweeter</span>
</a>
</li>
<li>
<a><img src="images/lnkd.png" width="20" height="20" />
<span class="lnkd">Linkd In</span>
</a>
</li>
<li>
<a><img src="images/yut.png" width="20" height="20" />
<span class="yut">You Tube</span>
</a>
</li>

</ul>
</div> -->

</div>
    
   <div id="inline114" style="display:none" class="readMoreBox content">
               <h2>Company<strong>Profile</strong></h2>
          <div id="show_successP" style="display:none;" class="successMsgmedia"></div>
          <div id="show_successPE" style="display:none;" class="errorMsgmedia"></div>
               
         <div class="col-sm-12">
             <form method="post">
                       <div class="form-group">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-user"></i></div>
                               <input type="text" class="form-control" id="nameP" placeholder="Name">
                              
                           </div>
                            <div id="show_wornings_nameP" class="errorMsgmedia"></div>
                        </div>
                       <div class="form-group">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                               <input type="text" class="form-control" id="emailP" placeholder="Email">
                               
                           </div>
                           <div id="show_wornings_emailP" class="errorMsgmedia"></div>
                        </div>
                       
                        
                       <div class="form-group">
                        
                           <button type="button" class="btn btn-success" onclick="return profileFormSubmit();">Submit</button>
    
  </div>
                   </form>
                   
               </div>
        
      
     
  </div>
  
    <div id="inline116" style="display:none" class="readMoreBox content">
               <h2>Business <strong>Plan</strong></h2>
          <div id="show_successBu" style="display:none;" class="successMsgmedia"></div>
          <div id="show_successBuE" style="display:none;" class="errorMsgmedia"></div>
               
         <div class="col-sm-12">
             <form method="post">
                       <div class="form-group">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-user"></i></div>
                               <input type="text" class="form-control" id="nameBu" placeholder="Name">
                              
                           </div>
                            <div id="show_wornings_nameBu" class="errorMsgmedia"></div>
                        </div>
                       <div class="form-group">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                               <input type="text" class="form-control" id="emailBu" placeholder="Email">
                               
                           </div>
                           <div id="show_wornings_emailBu" class="errorMsgmedia"></div>
                        </div>
                       
                        
                       <div class="form-group">
                        
                           <button type="button" class="btn btn-success" onclick="return BusinessFormSubmit();">Submit</button>
    
  </div>
                   </form>
                   
               </div>
        
      
     
  </div>
  
<div id="inline115" style="display:none" class="readMoreBox content">
               <h2>Company <strong> Brochure</strong></h2>
          <div id="show_successCo" style="display:none;" class="successMsgmedia"></div>
          <div id="show_worninCoE" style="display:none;" class="errorMsgmedia"></div>
               
         <div class="col-sm-12">
             <form method="post">
                       <div class="form-group">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-user"></i></div>
                               <input type="text" class="form-control" id="nameCo" placeholder="Name">
                              
                           </div>
                            <div id="show_wornings_nameCo" class="errorMsgmedia"></div>
                        </div>
                       <div class="form-group">
                           <div class="input-group">
                               <div class="input-group-addon"><i class="fa fa-envelope-o"></i></div>
                               <input type="text" class="form-control" id="emailCo" placeholder="Email">
                               
                           </div>
                           <div id="show_wornings_emailCo" class="errorMsgmedia"></div>
                        </div>
                       
                        
                       <div class="form-group">
                        
                           <button type="button" class="btn btn-success" onclick="return BrochureFormSubmit();">Submit</button>
    
  </div>
                   </form>
                   
               </div>
        
      
     
  </div>
  
  <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jcarousel.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.jcarousel-autoscroll.min.js"></script>
   <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jcarousel.responsive.js"></script>
  <!-- Promo block BEGIN -->
  <?php Yii::app()->session['username'] = "nidhi";?>
  <div class="promo-block" id="promo-block">
    <div class="tp-banner-container">
      <div class="tp-banner" >
        <ul>
          <li data-transition="fade" data-slotamount="5" data-masterspeed="700" data-delay="9400" class="slider-item-1">
            <img src="/images/slide1.jpg" alt="" data-bgfit="cover" style="opacity:0.4 !important;" data-bgposition="center center" data-bgrepeat="no-repeat">
            <div class="tp-caption large_text customin customout start"
              data-x="center"
              data-hoffset="0"
              data-y="center"
              data-voffset="60"
              data-customin="x:0;y:0;z:0;rotationX:90;rotationY:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
              data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
              data-speed="1000"
              data-start="500"
              data-easing="Back.easeInOut"
              data-endspeed="300">
              <div class="promo-like"><i class="fa fa-thumbs-up"></i></div>
              <div class="promo-like-text">
                <h2>Let's just do it</h2>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing<br> elit amet sed diam nonummy nibh <a href="javascript:void(0);">dolore</a></p>
              </div>
            </div>
            <div class="tp-caption large_bold_white fade"
              data-x="center"
              data-y="center"
              data-voffset="-110"
              data-speed="300"
              data-start="1700"
              data-easing="Power4.easeOut"
              data-endspeed="500"
              data-endeasing="Power1.easeIn"
              data-captionhidden="off"
              style="z-index: 6">Parallax <span>One Page</span> Has Arrived
            </div>
          </li>
          <li data-transition="fadefromright" data-slotamount="5" data-masterspeed="700" data-delay="9400" class="slider-item-2">
            <img src="/images/Slide2_bg.jpg" alt="slidebg2" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
            <div class="caption lft start"
              data-y="center"
              data-voffset="40"
              data-x="center"
              data-hoffset="-250"
              data-speed="600" 
              data-start="500" 
              data-easing="easeOutBack"><img src="/images/Slide2_iphone_left.png" alt="">
            </div>
            <div class="caption lft start"
              data-y="center"
              data-voffset="130"
              data-x="center"
              data-hoffset="170"
              data-speed="600" 
              data-start="1200" 
              data-easing="easeOutBack"><img src="/images/Slide2_iphone_right.png" alt="">
            </div>
            <div class="tp-caption large_bold_white fade"
              data-x="center"
              data-y="40"
              data-speed="300"
              data-start="1700"
              data-easing="Power4.easeOut"
              data-endspeed="500"
              data-endeasing="Power1.easeIn"
              data-captionhidden="off"
              style="z-index: 6">Extremely <span>Responsive</span> Design
            </div>
          </li>
          <li data-transition="fade" data-slotamount="5" data-masterspeed="700" data-delay="9400" class="slider-item-3">
            <img src="/images/video_woman_cover3.jpg"  alt="video_woman_cover3"  data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat">
            
            <div class="tp-caption tp-fade fadeout fullscreenvideo"
              data-x="0"
              data-y="0"
              data-speed="1000"
              data-start="1100"
              data-easing="Power4.easeOut"
              data-endspeed="1500"
              data-endeasing="Power4.easeIn"
              data-autoplay="true"
              data-autoplayonlyfirsttime="false"
              data-nextslideatend="true"
              data-forceCover="1"
              data-dottedoverlay="twoxtwo"
              data-aspectratio="16:9"
              data-forcerewind="on"
              style="z-index: 2">
              <video class="video-js vjs-default-skin" preload="none" width="100%" height="100%">
                  <source src='http://goodwebtheme.com/previewvideo/forest_edit.mp4' type='video/mp4'>
                <source src='http://goodwebtheme.com/previewvideo/forest_edit.webm' type='video/webm'>
                <source src='http://goodwebtheme.com/previewvideo/forest_edit.ogv' type='video/ogg'>
              
              </video>
            </div>
            <div class="tp-caption large_bold_white_25 customin customout tp-resizeme"
              data-x="center" data-hoffset="0"
              data-y="170"
              data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
              data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
              data-speed="600"
              data-start="1400"
              data-easing="Power4.easeOut"
              data-endspeed="600"
              data-endeasing="Power0.easeIn"
              style="z-index: 3">The clearest way into the Universe<br/>is through a forest wilderness.
            </div>
            <div class="tp-caption medium_text_shadow customin customout tp-resizeme"
              data-x="center" data-hoffset="0"
              data-y="bottom" data-voffset="-140"
              data-customin="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:5;scaleY:5;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
              data-customout="x:0;y:0;z:0;rotationX:0;rotationY:0;rotationZ:0;scaleX:0.75;scaleY:0.75;skewX:0;skewY:0;opacity:0;transformPerspective:600;transformOrigin:50% 50%;"
              data-speed="600"
              data-start="1700"
              data-easing="Power4.easeOut"
              data-endspeed="600"
              data-endeasing="Power0.easeIn"
              style="z-index: 4">John Muir
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- Promo block END -->

  
   <div class="about-block content content-center" id="about">
  
   <!-------------slider-------------->
      
      <div class=" bg-s">
  <br>
  
 <div class="container-fliud">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <!----<ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>----->

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
          <img src="/images/mediacenter/who_we_are.jpg" alt="what we do" width="100%">
      <div class="carousel-caption">
        
          <a href="#inline7" class="fancybox pinkSm"><h2>who<strong> we are </strong></h2></a>
          <p>Have you ever heard of an IT company that not just serves its customers, but also makes them the incredible part of its business network too?.... <a href="#inline7" class="fancybox pinkSm">  Read more</a></p>
          <div id="inline7" style="display:none" class="readMoreBox content">
               <h2>who<strong> we are </strong></h2>
               <p>Have you ever heard of an IT company that not just serves its customers, but also makes them the incredible part of its business network too? If not, then we surely have something new in store for you to discover. We are evolving as one such organization indulged in offering web development, designing, and digital marketing solutions. MGlobally was founded with the idea of creating a business model, wherein the customers are added to our network by bringing us the references. Abiding by the idea of creating an extended network of brand representatives, we aim to be the one of top most companies in direct selling IT network.</p>
               <p>MGlobally was brought to existence with a team having combined experience of more than 15 years as a web development company. The organization seeks to provide reliable web development solutions that further inspire the customers to be a part of our network of consumers. Each of the customers, who bring references earn the referral rewards, which can be redeemed later. We are driven by the urge to deliver the best so as to have a satisfied client base. For this, we ensure that each website developed by us complies with every detail provided by our clients and displays their business values too. Besides, as an add-on, we extend alluring benefits and rewards to those customers, who can further recommend our services and choose to be a part of our network of sellers. These customers are considered to be our brand representatives, who owing to the quality of our services wish to bring more prospective clients to the company.</p>
               <p>We, as a team work to ACHIEVE. MGlobally is supported by a team of enthusiastic developers, designers, digital marketers, tech graduates, and sales professionals, who help spread the aura of excellence. Our team of technology professionals is made of proactive techies, who not just keep up with the latest technologies but also believe in continuous innovation. In addition to these technology enthusiasts, our digital marketers make the best use of their extended knowledge of social media marketing, search engine optimization, and all the other elements of digital marketing. Besides, we are supported by a dedicated team of sales professionals, who help us bring in the prospective clients.</p>
               <p>MGlobally doesn’t just promise the best to its customers, but also to its teammates. We believe that a motivated team maintains a positive environment at work and works for the success of the organization. Thus, we maintain employee friendly policies and an atmosphere, which is favorable for them. </p>
      </div>
      </div>
      </div>

      <div class="item">
          <img src="/images/mediacenter/what_we_do.jpg" alt="what we do" width="100%">
      <div class="carousel-caption">
       
           <a href="#inline8" class="fancybox pinkSm"> <h2>what<strong> we do </strong></h2></a>
         <p>We believe that quality is a major factor that lets a customer build faith in a brand and its products & services. Thus, our teammates ensure that.... <a href="#inline8" class="fancybox pinkSm">  Read more</a></p>
          <div id="inline8" style="display:none" class="readMoreBox content">
               <h2>what<strong> we do </strong></h2>
               <p>We believe that quality is a major factor that lets a customer build faith in a brand and its products & services. Thus, our teammates ensure that every effort initiated by them drives the team to growth. To ensure the same, we employ the latest versions of web development technologies, proactive team players, and creative talent that are potent enough to serve as the USPs of MGlobally. Our Motto “Not just to be the best, but to deliver the best” reflects this belief.</p>
               <p>We operate to offer web development, web designing and digital marketing solutions. We are specialized in bringing businesses online and managing their presence across the web. With every year passing by, we have been adding new names to our clientele. The vast client base we have garnered all across the globe has further helped us expand our reach. </p>
      </div>
      </div>  
      </div>
    
      
  
    </div>

    <!-- Left and right controls --
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>---->
  </div>
</div>
      
 </div>     
      
  <!------slider end------------->
  
  
  </div>
  
  <!-- Services block BEGIN -->
  <div class="services-block content content-center" id="services">
    <div class="container">
      <h2>Our <strong>services</strong></h2>
      <h4>Bringing businesses online and promoting their presence across the web is what we are committed towards. To achieve the same, we got into the industry as a web development company. In our years of infancy, our expert web developers... <a href="#inline" class="fancybox pinkSm">  Read more</a></h4>
      <div id="inline" style="display:none" class="readMoreBox content">
          <h2>Our <strong>services</strong></h2>
          <p >Bringing businesses online and promoting their presence across the web is what we are committed towards. To achieve the same, we got into the industry as a web development company. In our years of infancy, our expert web developers worked as our strengths and since then they are serving as the cherished resources of the company. Later, to keep pace with the evolving digital space, we did all that was needed to earn us the tag of a digital marketing agency.</p>
      </div>
      


      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-12 item">
            <img src="images/design-icon.png" alt="Marcus Doe" class="img-responsive service_icon">
          <h3>Website Designing</h3>
          <p>A website’s design is as crucial as the quality of the services delivered by it. How a customer... <a href="#inline3" class="fancybox pinkSm">  Read more</a> </p>
          <div id="inline3" style="display:none" class="readMoreBox content">
               <h2>website<strong> designing </strong></h2>
          <p>A website’s design is as crucial as the quality of the services delivered by it. How a customer perceives an organization through its web design is a relevant question that has to be taken into consideration. Data says that the layout, color schemes, and visual value decide how influential is the website going to be for the viewers. Every element that may be crucial for a user’s point of view has to be included while designing a website. Our designers are known to every element that a reader’s eye locate quickly.  </p>
          <p>Besides, we understand the value of a responsive and a visually appealing web design, which we recommend to each of our clients. MGlobally welcomes companies from varied domains to get suitable web designs for their businesses to further create an impact on the online audiences .</p>
      </div>
        </div>
            <div class="col-md-3 col-sm-3 col-xs-12 item">
         <img src="images/it-services.png" alt="Marcus Doe" class="img-responsive service_icon">
          <h3>Web Development</h3>
          <p>The idea of developing websites that deliver the right message to the potential customers in the right... <a href="#inline4" class="fancybox pinkSm">  Read more</a> </p>
          <div id="inline4" style="display:none" class="readMoreBox content">
               <h2>web<strong> development </strong></h2>
          <p>The idea of developing websites that deliver the right message to the potential customers in the right manner is what we stand by. We are powered by technology and tech enthusiasts, who help us stick to the pledge that we have taken to deliver the best web services. We are supported by a team of web developers, who are specialized in varied technologies used for web development.  </p>
          <p><strong>Our web development services include:</strong></p>
          <ul>
              <li>Drag and Drop Based Web Builder</li>
              <li>Web Application Development</li>
              <li>Website Architecture and Strategy</li>
              <li>Content Management Systems</li>
              <li>Custom Web Applications</li>
              <li>Usability and User Interface Designs </li>
              <li>Independent QA & Testing</li>
              <li>Maintenance & Support</li>
          </ul>
      </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12 item">
          <img src="images/mobile-application.png" alt="Marcus Doe" class="img-responsive service_icon">
          <h3>Mobile Application</h3>
          <p>Beyond our web development and digital marketing services, we extend high end solutions... <a href="#inline5" class="fancybox pinkSm">  Read more</a></p>
          <div id="inline5" style="display:none" class="readMoreBox content">
               <h2>Mobile<strong> Application </strong></h2>
          <p >Beyond our web development and digital marketing services, we extend high end solutions for mobile application development. With the continuous support of our team of highly experienced technology professionals, we deliver mobile applications that comply with our clients’ specific requirements. We create applications for Android, Windows, iOS and other operating systems. Our development team employs latest technologies and also ensures to keep pace with the newest technologies and programming languages. We understand the significance of mobile application for a business. Thus, we ensure to deliver the best in terms of user experience with every mobile application we develop.</p>
         
      </div>
        </div>
        
        <div class="col-md-3 col-sm-3 col-xs-12 item">
         <img src="images/digital-marketing.png" alt="Marcus Doe" class="img-responsive service_icon">
          <h3>Digital Marketing</h3>
          <p>Digital marketing is known to be the process of promoting a website, a business, or a product... <a href="#inline2" class="fancybox pinkSm">  Read more</a></p>
           <div id="inline2" style="display:none" class="readMoreBox content">
               <h2>Digital<strong> Marketing </strong></h2>
          <p >Digital marketing is known to be the process of promoting a website, a business, or a product through the online mediums. The concept of digital marketing has become the buzz of the town in the recent years. It seems to have held the attention of every small or large business entity, which aims to reach out to the audiences that have moved online. </p>
          <p>Digital marketing, also known as online marketing has evolved as a major tool for most of the traffic recorded by the websites. It involves usage of channels that allow marketers to identify the brand’s real time performance and even the competitive analysis. This form of marketing has empowered the businesses to access its prospective client base and garner a new market place, which ensures better conversions for them.</p>
      </div>
        </div>
        
      </div>
    </div>
  </div>
  <!-- Services block END -->
   <!-- Team block BEGIN -->
  <div class="team-block content content-center margin-bottom-40" id="team">
    <div class="container">
     <h2>Media<strong>Center</strong></h2> 
    <!--   <h4>Lorem ipsum dolor sit amet, consectetuer adipiscing elit</h4>-->
      <div class="row">
        <div class="col-md-4 item col-xs-12 col-sm-4">
            <a  href= "#inline114" class="fancybox"> <img src="images/our_profile.png" alt="Marcus Doe" class="img-responsive">
         <!--  <h3 class="downloadTxt"><a href=""><span> <img src="images/download_icon.png"></span>Download</a></h3> -->
            <h3><em>Our Profile</em></h3></a>
         <!-- <p>Lorem ipsum dolor amet, tempor ut labore magna tempor dolore</p> 
          <div class="tb-socio">
              <div class="myBox">
                  <p><span><img src="images/ppt_icon.png"></span>PPT</p>
              </div>
          </div>-->
        </div>
        <div class="col-md-4 item col-xs-12 col-sm-4">
            <a href= "#inline116" class="fancybox"> <img src="images/business-plan.png" alt="business plan" class="img-responsive">
            <h3><em>business plan</em></h3></a>
         <!-- <h3 class="downloadTxt"><a href=""><span> <img src="images/download_icon.png"></span>Download</a></h3>
             <em></em>
          <p>Lorem ipsum dolor amet, tempor ut labore magna tempor dolore</p> 
          <div class="tb-socio">
              <div class="myBox">
                  <p><span><img src="images/ppt_icon.png"></span>PDF</p>
              </div>
          </div>-->
        </div>
        <div class="col-md-4 item col-xs-12 col-sm-4">
            <a  href= "#inline115" class="fancybox">  <img src="images/promo_brochure.png" alt="Cris Nilson" class="img-responsive">
            <h3><em>promo brochure</em></h3></a>
        <!--  <h3 class="downloadTxt"><a href=""><span> <img src="images/download_icon.png"></span>Download</a></h3>
             <em></em>
          <p></p>
          <div class="tb-socio">
              <div class="myBox">
                  <p><span><img src="images/pdf_icon.png"></span>e-Brochure</p>
              </div>
          </div>-->
        </div>
      </div>
    </div>
  </div>
  <!-- Team block END -->
 <!-- Prices block BEGIN -->
  <!-- pricing block new -->
  <div class="prices-block content content-center" id="prices">
  <div class="container ">
       <h2 class="margin-bottom-50"><strong>Pricing</strong> Tables</h2>
       <div class="priceTab">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"> Basic Packages</a></li>
      <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"> Advance Packages </a></li>
    <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">   Advance PRO Packages</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
        
        
  <!-- Indicators 
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>-->
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
      <div class="item active">
          <?php foreach ($basicPackageObject as $basicPackage) { ?>
            <div class="col-sm-4 col-xs-12">
                 <div class="pricing-item">
                      <img class="img-responsive" src="/upload/package_image/<?php echo $basicPackage['image']; ?>" alt="<?php echo $basicPackage['name']; ?>" class="img-responsive">
                      <div class="valign-center">
                  <?php if(Yii::app()->session['userid']!=''){ ?>
                      <a href="<?php echo Yii::app()->baseUrl; ?>package/domainsearch?package_id=<?php echo $basicPackage['id']; ?>">
                          <?php }else{?>
                          <a href="<?php echo Yii::app()->baseUrl; ?>user/loginregistration?package_id=<?php echo $basicPackage['id']; ?>">
                              <?php }?>
                      
                      <div class="packageInfo"> 
                          <div> <span class="packName">Basic Web Packages</span></div>
                          <div> <span class="packPrice"><p>$</p><?php echo $basicPackage->amount;?></span></div>
                        
                          <p>MGlobally releases its web packages for website design & development. Get details of the packages and choose the suitable ones.</p>
                      </div>
                          </a>
                      <div class="packageDescription"> 
                          <div class="row">
                              <div class="col-sm-7 col-xs-7">
                                  <ul>
                                  <?php 
                                    $descriptionArr = explode(',',$basicPackage->Description);
                                    if(!empty($descriptionArr) && count($descriptionArr) > 0)
                                    {
                                    foreach($descriptionArr as $description){?>
                                  <li><?php echo $description;?></li>
                                    <?php } } ?>  
                                  </ul>

                              </div>
                              <div class="col-sm-5 col-xs-5">
                                  
                                  <a href="<?php echo Yii::app()->baseUrl; ?>user/loginregistration?package_id=<?php echo $basicPackage['id']; ?>"><span class="packPick"> pick now </span></a><br>
                            <span class="knowmore"><a href="#more<?php echo $basicPackage->id;?>" class="fancybox pinkSm"> Know More</a></span>
                                  
                               </div>
                      </div>
                 </div>
        </div>
                 </div>
                
            </div>
          <div id="more<?php echo $basicPackage->id;?>" style="display:none" class="content">

    <div class="packageInfo1"> 
        <div> <span class="basic1"><?php echo $basicPackage->name; ?></span></div>
        <div> <span class="packPrice"><p>$</p><?php echo $basicPackage->amount;?></span></div>

        <p>MGlobally releases its web packages for website design &amp; development. Get details of the packages and choose the suitable ones.</p>
    </div>
    <div class="packageDescription1"> 
        <div class="row">

            <ul>
            <?php 
              $descriptionArr = explode(',',$basicPackage->Description);
              if(!empty($descriptionArr) && count($descriptionArr) > 0)
              {
              foreach($descriptionArr as $description){?>
            <li><?php echo $description;?></li>
              <?php } } ?>  
            </ul>
        </div>

    </div>


</div>
            <?php } ?>

        </div>
    </div>
</div>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
      <div class="item active">
          <?php foreach($advancePackageObject as $advancePackage){?>
              <div class="col-sm-4 col-xs-12">
                 <div class="pricing-item">
                      <img class="img-responsive" src="/upload/package_image/<?php echo $advancePackage['image']; ?>" alt="<?php echo $advancePackage['name']; ?>" class="img-responsive">
                      <div class="valign-center">
                  <?php if(Yii::app()->session['userid']!=''){ if(!empty($membership_type)&& $membership_type=='1') {?>
                          <a href="#" onclick="return showError();"> <?php }else{?> 
                          <a href="<?php echo Yii::app()->baseUrl; ?>package/domainsearch?package_id=<?php echo $advancePackage['id']; ?>">
                              <?php }}else{?><a href="<?php echo Yii::app()->baseUrl; ?>user/loginregistration?package_id=<?php echo $advancePackage['id']; ?>"><?php }?>
                     <div class="packageInfo"> 
                          <div> <span class="packName"><?php echo $advancePackage->name; ?></span></div>
                          <div> <span class="packPrice"><p>$</p><?php echo $advancePackage->amount; ?></span></div>
                        
                          <p>MGlobally releases its web packages for website design & development. Get details of the packages and choose the suitable ones.</p>
                      </div> </a> 
                                 
                      <div class="packageDescription"> 
                          <div class="row">
                              <div class="col-sm-7 col-xs-7">
                                  <ul>
                                    <?php 
                                    $descriptionArr = explode(',',$advancePackage->Description);
                                    foreach($descriptionArr as $description){?>
                                  <li><?php echo $description;?></li>
                                    <?php }?>   
                                  </ul>
                          
                              </div>
                              <div class="col-sm-5 col-xs-5">
                                   <a href="<?php echo Yii::app()->baseUrl; ?>user/loginregistration?package_id=<?php echo $advancePackage['id']; ?>"><span class="packPick"> pick now </span></a><br>
                            <span class="knowmore"><a href="#more<?php echo $advancePackage->id;?>" class="fancybox pinkSm"> Know More</a></span>
                               </div>
                      </div>
                 </div>
        </div>
                 </div>
                
            </div>
          <div id="more<?php echo $advancePackage->id;?>" style="display:none" class="content">

    <div class="packageInfo1"> 
        <div> <span class="basic1"><?php echo $advancePackage->name; ?></span></div>
        <div> <span class="packPrice"><p>$</p><?php echo $advancePackage->amount; ?></span></div>

        <p>MGlobally releases its web packages for website design &amp; development. Get details of the packages and choose the suitable ones.</p>
    </div>
    <div class="packageDescription1"> 
        <div class="row">

            <ul>
                <?php 
                $descriptionArr = explode(',',$advancePackage->Description);
                foreach($descriptionArr as $description){?>
              <li><?php echo $description;?></li>
                <?php }?>   
              </ul>
        </div>

    </div>


</div>
            <?php } ?>

        </div>
    </div>
</div>
    </div>
<div role="tabpanel" class="tab-pane" id="messages">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
          <?php foreach($proPackageObject as $proPackage){?>
             <div class="col-sm-4 col-xs-12">
                 <div class="pricing-item">
                      <img class="img-responsive" src="/upload/package_image/<?php echo $proPackage['image']; ?>" alt="<?php echo $proPackage['name']; ?>" class="img-responsive">
                      <div class="valign-center">
                  <?php if(Yii::app()->session['userid']!=''){ if(!empty($membership_type)&& $membership_type=='1' || $membership_type=='2') {?>
                          <a   href="#" onclick="return showError();"><?php }else{?> 
                          <a  href="<?php echo Yii::app()->baseUrl; ?>package/domainsearch?package_id=<?php echo $proPackage['id']; ?>">
                              <?php }}else{?>
                              <a href="<?php echo Yii::app()->baseUrl; ?>user/loginregistration?package_id=<?php echo $proPackage['id']; ?>"><?php }?>
                      <div class="packageInfo"> 
                          <div> <span class="packName"><?php echo $proPackage->name; ?></span></div>
                          <div> <span class="packPrice"><p>$</p><?php echo $proPackage->amount; ?></span></div>
                        
                          <p>MGlobally releases its web packages for website design & development. Get details of the packages and choose the suitable ones.</p>
                      </div></a>
                      <div class="packageDescription"> 
                          <div class="row">
                              <div class="col-sm-7 col-xs-7">
                                  <ul>
                                    <?php 
                                    $descriptionArr = explode(',',$proPackage->Description);
                                    foreach($descriptionArr as $description){?>
                                  <li><?php echo $description;?></li>
                                    <?php }?>
                                  </ul>
           
                              </div>
                              <div class="col-sm-5 col-xs-5">
                                   <a href="<?php echo Yii::app()->baseUrl; ?>user/loginregistration?package_id=<?php echo $proPackage['id']; ?>"><span class="packPick"> pick now </span></a><br>
                            <span class="knowmore"><a href="#more<?php echo $proPackage->id;?>" class="fancybox pinkSm"> Know More</a></span>
                                  
                               </div>
                      </div>
                 </div>
                </div>
                 </div>
                
            </div>
          <div id="more<?php echo $proPackage->id;?>" style="display:none" class="content">

    <div class="packageInfo1"> 
        <div> <span class="basic1"><?php echo $proPackage->name; ?></span></div>
        <div> <span class="packPrice"><p>$</p><?php echo $proPackage->amount;?></span></div>

        <p>MGlobally releases its web packages for website design &amp; development. Get details of the packages and choose the suitable ones.</p>
    </div>
    <div class="packageDescription1"> 
        <div class="row">
            <ul>
            <?php 
            $descriptionArr = explode(',',$proPackage->Description);
            foreach($descriptionArr as $description){?>
          <li><?php echo $description;?></li>
            <?php }?>
          </ul>
        </div>

    </div>


</div>
            <?php } ?>

        </div>
    </div>
</div>
   
    
  </div>

</div>
  
  
  
  </div>
  </div></div>
  <!-- -->
 
  
  <!-- Choose us block BEGIN -->
  <div class="choose-us-block content text-center margin-bottom-40" id="benefits">
    <div class="container">
      <h2>Why to <strong>Choose us</strong></h2>
      <h4>MGlobally is an IT company introduced with the concept of multi-level marketing. It’s a platform with extended benefits for all those associated with it. We bring ideal opportunities for those, who wish to get websites for their businesses and can... <a class="pinkSm fancybox" href="#inline16">  Read more</a></h4>
      <div id="inline16" style="display:none" class="readMoreBox content">
             <h2>Why to <strong>Choose us</strong></h2>
               <p>MGlobally is an IT company introduced with the concept of multi-level marketing. It’s a platform with extended benefits for all those associated with it. We bring ideal opportunities for those, who wish to get websites for their businesses and can further bring in references. For all the references brought to us, we provide reward points that can be redeemed later. </p>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 text-left">
          <img src="images/matrix.png" alt="Why to choose us" class="img-responsive">
        </div>
        <div class="col-md-4 col-sm-5 col-xs-12 text-left">

          <!-- benefit slider -->
            <div id="benefit-carousel" class="carousel slide benefitCarousel" data-ride="carousel">

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
        <h3>Benefits of Choosing Us</h3>
        <ul class="choseOpt">
            <li><a href="">Round the clock support</a></li>
            <li><a href="">Convenient Payment Gateway</a></li>
            <li><a href="">Search-engine friendly websites</a></li>
            <li><a href="">Customized web solutions</a></li>
            <li><a href="">Numerous templates to choose from</a></li>
            <li><a href="">Reliable hosting solutions</a></li>
        </ul>
      
    </div>
    <div class="item">
        <h3>Multi Level Marketing Benefits</h3>
       <ul class="choseOpt">
            <li><a href="">Consistent Income</a></li>
            <li><a href="">Low operating cost</a></li>
            <li><a href="">Freedom to operate remotely</a></li>
            <li><a href="">An extended distribution channel</a></li>
            <li><a href="">No minimum commitments desired</a></li>
            <li><a href="">Rewards at various stages</a></li>
        </ul>
     
    </div>
    
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#benefit-carousel" role="button" data-slide="prev">
    <span class="" aria-hidden="true">
    <img src="images/steps/arrow-left-active.png" alt="Why to choose us" class="img-responsive"></span>

    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#benefit-carousel" role="button" data-slide="next">
    <span class="" aria-hidden="true">
  <img src="images/steps/arrow-right-normal.png" alt="Why to choose us" class="img-responsive"></span>
  </a>
</div>
          <!-- end -->
        </div>
      </div>
    </div>
  </div>
  <!-- Choose us block END -->

  <!-- Checkout block END -->
  <!-- Facts block BEGIN -->
  <?php foreach($siteObject as $siteObject1){} ?>
  <div class="facts-block content content-center" id="facts-block">
    <h2>Some facts about us</h2>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="item">
            <strong><?php echo $siteObject1->total_registration;?></strong>
            Total Registration 
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="item">
            <strong><?php echo $siteObject1->package_bought;?></strong>
            total packages bought 
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="item">
            <strong><?php echo $siteObject1->commission_given;?></strong>
           to commission given 
          </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-6">
          <div class="item">
            <strong><?php echo $siteObject1->total_project;?></strong>
            total projects complete 
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Facts block END -->
  <!-- Portfolio block BEGIN -->
  <div class="portfolio-block content content-center" id="portfolio">
    <div class="container">
      <h2 class="margin-bottom-50"><strong> Templates </strong></h2>
      <div class="row tempSearch">
          <form class="form-inline" method="Get" action="/user/searchtemplate">
              <div class="searchWrap">
              <div class="form-group">
                 <select id="key" name="key" class="form-control select-style">
                 <option value="">All categories</option>
                 <?php foreach($categoryObject as $category){?>
                 <option value="<?php echo strtolower($category->name); ?>"><?php echo $category->name; ?></option>
                 <?php }?>
                 </select>
              </div>
              <div class="form-group">
                  <input type="search" name="searchstring" placeholder="search something" class="search-style">
              </div>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-go">Go</button>
              </div>
          </form>
      </div>
      <div class="row mobTemplete">
        
          <div class="item col-md-2 col-sm-4 col-xs-12">
                <ul class="templeteOpt">
            <li><a href="">Automobile</a></li>
            <li><a href="">Lawyers</a></li>
            <li><a href="">Architect</a></li>
            <li><a href="">Food</a></li>
            <li><a href="">Education</a></li>
            <li><a href="">Consultant</a></li>
            
             <li><a href="">Finance</a></li>
            <li><a href="">Healthcare</a></li>
             <li><a href="">Corporate</a></li>
            <li><a href="">Travel</a></li>
            <li><a href="">Jewellery</a></li>
            <li><a href="">Hotel & Resorts</a></li>
            <li><a href="">Real Estate</a></li>
            
             <li><a href="">Online-Store</a></li>
            <li><a href="">Chartered Accountants</a></li>
            <li><a href="">Fitness</a></li>
            <li><a href="">Textile</a></li>
            <li><a href="">Furniture</a></li>
           
        </ul>
          </div>
          </div>
    </div>
    <div class="row deskTemplete">
      <?php foreach($templateObject as $template){?>  
      <div class="item col-md-2 col-sm-4 col-xs-12">
          <div class="imageTag" style="width:384px!important;height:196px!important;">
          <img src="/user/template/<?php echo $template['folderpath'];?>/screenshot/<?php echo $template['screenshot'];?>" alt="<?php echo $template['catname'];?>" class="img-responsive">
          </div>
          <a href="/user/searchtemplate?key=<?php echo strtolower($template['catname']);?>" class="">
          <div class="valign-center-elem">
            <strong><?php echo $template['catname'];?></strong>
            <em></em>
            <b>View</b>
          </div>
        </a>
      </div>
        
      <?php }?>
      
    </div>
  </div>
  <!-- Portfolio block END -->
  
  
  <!-- Prices block END -->
  <!-- Testimonials block BEGIN -->
  <!-- Testimonials block BEGIN -->
  
  <div class="testimonials-block content content-center margin-bottom-65 testi-bg">
    <div class="container">
      <h2>Customer <strong>testimonials</strong></h2>
     <!--<h4><i class="fa fa-quote-left"></i></h4>-->
      <div class="carousel slide" data-ride="carousel" id="testimonials-block">
 
        <div class="carousel-inner">
          <!-- Carousel items -->
           <?php $i=1;if(!empty($profileObject)) { 
               foreach($profileObject as $testimonial){ ?>
 
          <!-- Carousel items -->
          <div class="item <?php if($i=='1'){ echo "active"; }else{ echo "";}?>">

            <div class="testimonialBoxMain">
            <div class="testimonialBox clearfix ">
                            <div class="customerImg pull-left">
                                <span class="customerImgWrap">
                                    <i class="fa fa-user"></i>
                                <!--    <img class="img-responsive" alt="Marcus Doe" src="images/design-icon.png"> -->
                                </span>
                            </div>
                            <div class="customerTxt ">
                                
                                <p><?php echo $testimonial->testimonials;?></p>
                                <span class="pull-right">- <?php echo $testimonial->user()->full_name;?></span>
                            </div>
                        </div>
            </div>
          </div>
           <?php $i++;} }?>
        </div>
      </div>
    </div>
  </div>
  
  
  
  
  
  
 
  <!-- Testimonials block END -->
  <!-- Testimonials block END -->
  <!-- Partners block BEGIN -->
  <div class="partners-block">
    <div class="container">
      <div class="row">
       <!--   <div id="myCarouselaa" class="carousel slide" data-ride="carousel">
   Indicators -->
    

    <!-- Wrapper for slides 
    <div class="carousel-inner" role="listbox">

      <div class="item">-->
    <marquee>
        
          <div class="row">
        <div class="marqBox">
          <img src="images/cisco.png" alt="cisco">
        </div>
        <div class="marqBox">
          <img src="images/walmart.png" alt="walmart">
        </div>
        <div class="marqBox">
          <img src="images/gamescast.png" alt="gamescast">
        </div>
        <div class="marqBox">
          <img src="images/spinwokrx.png" alt="spinwokrx">
        </div>
        <div class="marqBox">
          <img src="images/ngreen.png" alt="ngreen">
        </div>
        <div class="marqBox">
          <img src="images/gamescast.png" alt="gamescast">
        </div>
      </div>
    </marquee>
      </div>

      
    
      
      
  
    </div>

  </div>
      </div>
    </div>
  </div>
  <!-- Partners block END -->
 <script type="text/javascript">
     $(document).ready(function() {
		$('.fancybox').fancybox({
		 helpers: { 
        title: null
    }
		});
		});
                
    function showError()
    {
       alert('Sorry you are not allowed to pick this package. To pick this package register with different account');return false;
    }
          //$(".myfancyTxtBox").fancybox();

        
</script>
 <script type="text/javascript">

$('.carousel').carousel({
  interval: 200000
});
</script>

<div id="more1" style="display:none" class="content">

    <div class="packageInfo1"> 
        <div> <span class="basic1">Basic Web Packages</span></div>
        <div> <span class="packPrice"><p>$</p>49</span></div>

        <p>MGlobally releases its web packages for website design &amp; development. Get details of the packages and choose the suitable ones.</p>
    </div>
    <div class="packageDescription1"> 
        <div class="row">

            <ul>
                <li>Domain for 1 Year</li>
                <li>100 MB Storage Space/Yes</li>
                <li>100 MB Bandwidth</li>
                <li>Adverstisements</li>
                <li>Free Hosting</li>
                <li>1 Email A/C</li>
                <li>5 Static Pages</li>
                <li>Drag &amp; Drop Builder
                </li>

            </ul>
        </div>

    </div>


</div>

<div id="more2" style="display:none" class="content">

    <div class="packageInfo1"> 
        <div> <span class="basic1">Basic Web Packages</span></div>
        <div> <span class="packPrice"><p>$</p>99</span></div>

        <p>MGlobally releases its web packages for website design &amp; development. Get details of the packages and choose the suitable ones.</p>
    </div>
    <div class="packageDescription1"> 
        <div class="row">
            <ul>
                <li>Domain for 1 Year</li>
                <li>100 MB Storage Space/Yes</li>
                <li>100 MB Bandwidth</li>
                <li>Adverstisements</li>
                <li>Free Hosting</li>
                <li>1 Email A/C</li>
                <li>5 Static Pages</li>
                <li>Drag &amp; Drop Builder</li>

            </ul>
        </div>

    </div>


</div>


<div id="more3" style="display:none" class="content">

    <div class="packageInfo1"> 
        <div> <span class="basic1">Basic Web Packages</span></div>
        <div> <span class="packPrice"><p>$</p>499</span></div>

        <p>MGlobally releases its web packages for website design &amp; development. Get details of the packages and choose the suitable ones.</p>
    </div>
    <div class="packageDescription1"> 
        <div class="row">
            <ul>
                <li>Domain for 1 Year</li>
                <li>100 MB Storage Space/Yes</li>
                <li>100 MB Bandwidth</li>
                <li>Adverstisements</li>
                <li>Free Hosting</li>
                <li>1 Email A/C</li>
                <li>5 Static Pages</li>
                <li>Drag &amp; Drop Builder</li>

            </ul>
        </div>

    </div>


</div>


<div id="more4" style="display:none" class="content">

    <div class="packageInfo1"> 
        <div> <span class="basic1">Advance1</span></div>
        <div> <span class="packPrice"><p>$</p>999</span></div>

        <p>MGlobally releases its web packages for website design &amp; development. Get details of the packages and choose the suitable ones.</p>
    </div>
    <div class="packageDescription1"> 
        <div class="row">
            <ul>
                <li>Domain for 1 Year</li>
                <li>100 MB Storage Space/Yes</li>
                <li>100 MB Bandwidth</li>
                <li>Adverstisements</li>
                <li>Free Hosting</li>
                <li>1 Email A/C</li>
                <li>5 Static Pages</li>
                <li>Drag &amp; Drop Builder</li>

            </ul>
        </div>

    </div>


</div>


<div id="more5" style="display:none" class="content">

    <div class="packageInfo1"> 
        <div> <span class="basic1">Advance2</span></div>
        <div> <span class="packPrice"><p>$</p>2999</span></div>

        <p>MGlobally releases its web packages for website design &amp; development. Get details of the packages and choose the suitable ones.</p>
    </div>
    <div class="packageDescription1"> 
        <div class="row">
            <ul>
                <li>Domain for 1 Year</li>
                <li>100 MB Storage Space/Yes</li>
                <li>100 MB Bandwidth</li>
                <li>Adverstisements</li>
                <li>Free Hosting</li>
                <li>1 Email A/C</li>
                <li>5 Static Pages</li>
                <li>Drag &amp; Drop Builder</li>

            </ul>
        </div>

    </div>


</div>


<div id="more6" style="display:none" class="content">

    <div class="packageInfo1"> 
        <div> <span class="basic1">Advance3</span></div>
        <div> <span class="packPrice"><p>$</p>4999</span></div>

        <p>MGlobally releases its web packages for website design &amp; development. Get details of the packages and choose the suitable ones.</p>
    </div>
    <div class="packageDescription1"> 
        <div class="row">
            <ul>
                <li>Domain for 1 Year</li>
                <li>100 MB Storage Space/Yes</li>
                <li>100 MB Bandwidth</li>
                <li>Adverstisements</li>
                <li>Free Hosting</li>
                <li>1 Email A/C</li>
                <li>5 Static Pages</li>
                <li>Drag &amp; Drop Builder</li>

            </ul>
        </div>

    </div>


</div>


<div id="more7" style="display:none" class="content">

    <div class="packageInfo1"> 
        <div> <span class="basic1">Advance pro1</span></div>
        <div> <span class="packPrice"><p>$</p>9999</span></div>

        <p>MGlobally releases its web packages for website design &amp; development. Get details of the packages and choose the suitable ones.</p>
    </div>
    <div class="packageDescription1"> 
        <div class="row">
            <ul>
                <li>Domain for 1 Year</li>
                <li>100 MB Storage Space/Yes</li>
                <li>100 MB Bandwidth</li>
                <li>Adverstisements</li>
                <li>Free Hosting</li>
                <li>1 Email A/C</li>
                <li>5 Static Pages</li>
                <li>Drag &amp; Drop Builder</li>

            </ul>
        </div>

    </div>


</div>


<div id="more8" style="display:none" class="content">

    <div class="packageInfo1"> 
        <div> <span class="basic1">Advance pro2</span></div>
        <div> <span class="packPrice"><p>$</p>14999</span></div>

        <p>MGlobally releases its web packages for website design &amp; development. Get details of the packages and choose the suitable ones.</p>
    </div>
    <div class="packageDescription1"> 
        <div class="row">
            <ul>
                <li>Domain for 1 Year</li>
                <li>100 MB Storage Space/Yes</li>
                <li>100 MB Bandwidth</li>
                <li>Adverstisements</li>
                <li>Free Hosting</li>
                <li>1 Email A/C</li>
                <li>5 Static Pages</li>
                <li>Drag &amp; Drop Builder</li>

            </ul>
        </div>

    </div>


</div>


<div id="more9" style="display:none" class="content">

    <div class="packageInfo1"> 
        <div> <span class="basic1">Advance pro3</span></div>
        <div> <span class="packPrice"><p>$</p>24999</span></div>

        <p>MGlobally releases its web packages for website design &amp; development. Get details of the packages and choose the suitable ones.</p>
    </div>
    <div class="packageDescription1"> 
        <div class="row">
            <ul>
                <li>Domain for 1 Year</li>
                <li>100 MB Storage Space/Yes</li>
                <li>100 MB Bandwidth</li>
                <li>Adverstisements</li>
                <li>Free Hosting</li>
                <li>1 Email A/C</li>
                <li>5 Static Pages</li>
                <li>Drag &amp; Drop Builder</li>

            </ul>
        </div>

    </div>


</div>
