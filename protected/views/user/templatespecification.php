    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/slide/css/responsive.css" rel="stylesheet">
    <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/slide/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/slide/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/js/slide/owl-carousel/owl.theme.css">
    
 
     <script src="/js/owl.carousel.min.js"></script>
    <script>
      function toggleChevron(e) {
    $(e.target)
        .prev('.panel-heading')
        .find("i.indicator")
        .toggleClass('glyphicon glyphicon-minus glyphicon glyphicon-plus');
}
$('#accordion').on('hidden.bs.collapse', toggleChevron);
$('#accordion').on('shown.bs.collapse', toggleChevron);
    </script>
    <script>
        $(document).ready(function(){
            $("#owl-demo").owlCarousel({
 
      navigation : true, // Show next and prev buttons
      slideSpeed : 400,
      paginationSpeed : 1000,
      singleItem:true,
      navigation:false,
      autoPlay:true
 
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
 $("#owl-demo-2").owlCarousel({
 
      navigation : true, // Show next and prev buttons
      
      paginationSpeed : 1000,
      singleItem:true,
      navigation:false,
      autoPlay:true
      /*autoPlay:4000*/
  
  
      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
        });
    </script>

            
              <div class="col-md-8">
                        <div id="owl-demo" class=" owl-carousel owl-theme">
         <?php foreach($tempObject as $tempObject){}?>
                            <div class="item"><img src="<?php echo Yii::app()->homeUrl; ?>user/template/<?php echo $tempObject['folderpath'];?>/screenshot/<?php echo $tempObject['screenshot'];?>" alt="<?php echo $tempObject['template_title'];?>" style="width:738px!important;height:471px!important;"></div>
                       
                        
                    </div>
                  <a target="_blank" href="/user/template/<?php echo $tempObject['folderpath'];?>/index.html"><button class="btn btn-default col-md-offset-5 banner-button">LIVE DEMO</button></a>
   
              </div>
              <div class="col-md-4">
             <div class="top-content-head-accordin-2 slider-heading">
                 <p class="mix-text-banner"><i class="fa fa-circle orange-circle"></i><?php echo $tempObject['package_name'];?></p>
            </div>
            <div class="top-content-head-accordin slider-heading-2">
                 <p class="mix-text"> Service</p>
            </div>
                  
                  <div id="owl-demo-2" class="owl-carousel owl-theme">
             <?php $arra = explode(',', $tempObject['Description']);?>
                <div class="item slider-item"><p>Recommonded Service</p>
                          <ul class="list-unstyled banner-li">
                              <?php for($i=0;$i < 8;$i++){?>
                              <li><i class="fa fa-circle-thin banner-i"></i><?php echo $arra[$i];?></li>
                              <?php }?> 
                          </ul>
                           <div class="box-relative-2" >
                    <div class="arrow_box-2"><span>$ <?php echo $tempObject['amount'];?></span></div>
                  </div>
                      </div>
                <?php if(count($arra > 8)){?>
                       <div class="item slider-item">
                          <ul class="list-unstyled banner-li"><p>Recommonded Service</p>
                             <?php for($i=8;$i < sizeof($arra);$i++){?>
                              <li><i class="fa fa-circle-thin banner-i"></i><?php echo $arra[$i];?></li>
                              <?php }?> 
                              
                          </ul>
                           <div class="box-relative-2" >
                    <div class="arrow_box-2"><span>$ <?php echo $tempObject['amount'];?></span></div>
                  </div>
                      </div>
                <?php }?>
                       <!--<div class="item slider-item">
                          <ul class="list-unstyled banner-li"><p>Recommonded Service<p>
                              <li><i class="fa fa-circle-thin banner-i"></i>Domain for 1 Year</li>
                              <li><i class="fa fa-circle-thin banner-i"></i>100 MB Storage Space/Yes</li>
                              <li><i class="fa fa-circle-thin banner-i"></i>100 MB Bandwidth</li>
                              <li><i class="fa fa-circle-thin banner-i"></i>Adverstisements</li>
                              <li><i class="fa fa-circle-thin banner-i"></i>Free Hosting</li>
                              <li><i class="fa fa-circle-thin banner-i"></i>1 Email A/C</li>
                              <li><i class="fa fa-circle-thin banner-i"></i>5 Static Pages</li>
                              <li><i class="fa fa-circle-thin banner-i"></i>Drag & Drop Builder</li>
                          </ul>
                           <div class="box-relative-2" >
                    <div class="arrow_box-2"><span>$ 499</span></div>
                  </div>
                      </div>-->
                      
                        
                    </div> 
                    
                     <div class="top-content-head-accordin slider-heading-3 text-center">
                        <a href="/package/domainsearch?package_id=<?php  echo $tempObject['package_id']; ?>&templateId=<?php  echo $tempObject['template_id'];?>"> <button class="btn btn-defalut button-select">SELECT</button></a>
                       </div>


              </div>
             
       


       
     