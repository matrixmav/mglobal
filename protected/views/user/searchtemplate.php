<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style_search.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/responsive.css" rel="stylesheet">
 

<?php //echo "<pre>"; print_r($packageObject);  die;  ?>
<div class="container-fluid fluid-top">
    <div class="container ">
        <nav class="navbar " role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav top-ul">
                    <li><a href="/user/searchtemplate?type=1<?php if(!empty($_GET['key'])) { ?>&key=<?php echo $_GET['key']; ?><?php }?>">Basic Web Packages</a></li>
                    <li><a href="/user/searchtemplate?type=2<?php if(!empty($_GET['key'])) { ?>&key=<?php echo $_GET['key']; ?><?php }?>">Advance Web Packages</a></li>
                </ul>
                <div class="col-sm-4 col-md-4 pull-right nav-search">
                    <form action="" class="navbar-form" role="search" method="get">
                        <div class="form-group col-md-12">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control navbar-input" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" name="key" value="<?php if(empty($_GET['key']) && !empty($_GET['searchstring'])) { echo ucwords($_GET['searchstring']);}else{ echo ucwords($_GET['key']);} ?>">
                                <span class="input-group-addon navbar-addon">
                                    <button type="submit" name="search"><i class="glyphicon glyphicon-search navbar-glyph"></i></button></span>
                            </div>
                        </div>
                    </form>
                </div>        
            </div>
        </nav>

    </div>
</div>
<div class="container ">

    <div class="bread_crum ">
        <ul class="list-unstyled list-inline">
            <li><a href="/"><u>Home</u></a></li>
            <li><a href="#"><i class="glyphicon glyphicon-menu-right"></i></a></li>
            <li><a href=""><u>All Templates</u></a></li>
            <li><a href="#"><i class="glyphicon glyphicon-menu-right"></i></a></li>
        </ul>
    </div>

    <div class="row">

        <div class="col-md-3 left-accordin">

            <div class="top-content-head-accordin ">

                <p class="mix-text">Result</p>

            </div>
            <div class="panel-group" id="accordion">
                <?php foreach($categoryObject as $categoryObjectList){ ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $categoryObjectList->name;?>" aria-expanded="false">
                                <?php echo $categoryObjectList->name ; ?>
                                <i class="indicator  pull-right accordin-icon glyphicon <?php if(!empty($_GET['key']) && strtolower($categoryObjectList->name) == $_GET['key']){?>glyphicon-minus <?php }else{?>glyphicon-plus<?php }?>"></i>  </a>
                        </h4>
                    </div>
                <div id="collapse<?php echo $categoryObjectList->name; ?>" class="panel-collapse collapse <?php if(!empty($_GET['key']) && strtolower($categoryObjectList->name) == $_GET['key']){ echo "in";?><?php }?>" aria-expanded="<?php if(!empty($_GET['key']) && strtolower($categoryObjectList->name) == $_GET['key']){ echo "true";}else{ echo "false";} ?>" <?php if(!empty($_GET['key']) && strtolower($categoryObjectList->name) != $_GET['key']){ ?>style="height: 0px;" <?php }?>>
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <?php
                                    if(!empty($_GET['key'])){
                                        $key = "key=".$_SERVER['PHP_SELF'];
                                    }
                                    ?>
                                <?php foreach($packageObject as $packageObjectList){ ?>
                                <li><a onclick="showFilterData('<?php echo $packageObjectList['id'] ; ?>','<?php echo $categoryObjectList->id ; ?>');">$ <?php echo $packageObjectList['amount'] ; ?></a></li>                                
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php /*<div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false">
                                Price
                                <i class="indicator  pull-right accordin-icon glyphicon glyphicon-plus"></i></a>
                        </h4>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <?php
                                    if(!empty($_GET['key'])){
                                        echo $key = "key=".$_SERVER['PHP_SELF'];
                                    }
                                    ?>
                                <?php foreach($packageObject as $packageObjectList){ ?>
                                <li><a href="<?php echo $packageObjectList->id ; ?>"><?php echo $packageObjectList->amount ; ?></a></li>                                
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div><?php */?>
            </div>
        </div>

        <div class="col-md-9 right-content" id='content'>
            <?php if(!empty($_GET['key']) || !empty($_GET['searchstring'])){?>
            <div class="top-content-head ">
                <p class="mix-text">We found <span class="text-orange"><?php echo count($buildTempObject); ?></span><?php if(!empty($_GET['key']) || !empty($_GET['searchstring'])){?>result for &nbsp;" <span class="text-orange-2"><?php if(empty($_GET['key']) && !empty($_GET['searchstring'])) { echo ucwords($_GET['searchstring']);}else{ echo ucwords($_GET['key']);} ?></span>"<?php }?></p>
            </div><?php }?>
            <div class="row">
            <?php  
             if($buildTempObject){ 
                foreach($buildTempObject as $buildTempObjectList){
                    //echo "<pre>"; print_r($buildTempObjectList->header()->template_title); die;
            ?><a class="fancybox" onclick="showSpecification(<?php echo $buildTempObjectList['id']; ?>);"> 
                <div class="col-md-4 col-sm-4">
                    <div class="left-img-1">
                        <img src="/user/template/<?php echo $buildTempObjectList['folderpath'];?>/screenshot/<?php echo $buildTempObjectList['screenshot'];?>" class="img-left" width="200" height="200">
                    </div>

                    <div class="img-footer">
                        <h4><?php echo $buildTempObjectList['template_title'] ;?></h4>
                        <div class="box-relative">
                            
                            <div class="arrow_box"><span>$ <?php echo $buildTempObjectList['amount'] ;?></span></div>
                        </div> 
                        <p>&nbsp;</p>
                        <ul class="list-unstyled list-inline rating">
                            <?php $stars = BaseClass::getTempStars($buildTempObjectList['rating']);
                                  $remaining = 5 - $buildTempObjectList['rating'];
                            ?>
                            <?php echo $stars;?>
                            <?php for($i=1; $i<=$remaining; $i++){?>
                            <li><i class="glyphicon glyphicon-star-empty"></i></li>
                            <?php }?>
                          </ul>
                  <div class="thumbnail-arrow"></div>
                   </div>
                    
                 
                      
                    
                </div> </a>               
            <?php 
                }
            } ?>  
             </div>
        </div>
    </div>

<!--    <div class="pagination pull-right">

        <nav>
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">«</span>
                    </a>
                </li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>

                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">»</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>-->

</div>

 
<script>
    function toggleChevron(e) {
        $(e.target)
        .prev('.panel-heading')
        .find("i.indicator")
        .toggleClass('glyphicon glyphicon-minus glyphicon glyphicon-plus');
    }
    $('#accordion').on('hidden.bs.collapse', toggleChevron);
    $('#accordion').on('shown.bs.collapse', toggleChevron);
    
  function showFilterData(price,category)
  {
      var dataString = 'price=' + price + '&category=' + category;
       
            $.ajax({
                type: "GET",
                url: "/user/filterData",
                data: dataString,
                cache: false,
                success: function (html) {
                    if (html != "") {
                        $('#content').html(html);
                        
                    } else {
                         $('#content').html('Oops something wrong here.');
                    }


                }
            });
  }
  function showSpecification(valz)
  {
      
                 $.fancybox({
                    width: 950, 
                    autoSize: true,
                    href: "/user/templateSpecification?id="+valz,
                    type: 'ajax'
                });
  }
</script><script type="text/javascript" src="/js/fancybox/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="/js/fancybox/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="/js/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
           <script type="text/javascript" src="/js/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>