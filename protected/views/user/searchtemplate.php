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
                    <li><a href="?type=1">Basic Web Packages</a></li>
                    <li><a href="?type=2">Advance Web Packages</a></li>
                </ul>
                <div class="col-sm-4 col-md-4 pull-right nav-search">
                    <form action="" class="navbar-form" role="search" method="get">
                        <div class="form-group col-md-12">
                            <div class="input-group col-md-12">
                                <input type="text" class="form-control navbar-input" id="inputGroupSuccess3" aria-describedby="inputGroupSuccess3Status" name="key">
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
            <li><a href="#"><u>Home</u></a></li>
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
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false">
                                Categories
                                <i class="indicator  pull-right accordin-icon glyphicon glyphicon-plus"></i>  </a>
                        </h4>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
                        <div class="panel-body">
                            
                            <?php foreach($categoryObject as $categoryObjectList){ ?>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="optionsRadios" id="optionsRadios1" value="<?php echo $categoryObjectList->id ; ?>" >
                                    <?php echo $categoryObjectList->name ; ?>
                                </label>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
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
                </div>
            </div>
        </div>

        <div class="col-md-9 right-content">
            <div class="top-content-head ">
                <p class="mix-text">We found <span class="text-orange">724</span>result for &nbsp;"<span class="text-orange-2"> car</span>"</p>
            </div>
            <div class="row">
            <?php  
            
            if($buildTempObject){ 
                foreach($buildTempObject as $buildTempObjectList){
                    //echo "<pre>"; print_r($buildTempObjectList->header()->template_title); die;
            ?>
                <div class="col-md-4 col-sm-4">
                    <div class="left-img-1">
                        <img src="/user/template/<?php echo $buildTempObjectList->folderpath;?>/screenshot/<?php echo $buildTempObjectList->screenshot;?>" class="img-left" width="200" height="200">
                    </div>

                    <div class="img-footer">
                        <h4><?php echo $buildTempObjectList->header()->template_title ;?></h4>
                        <div class="box-relative">
                            <div class="arrow_box"><span>$ <?php echo $buildTempObjectList->package()->amount ;?></span></div>
                        </div>  
                        <ul class="list-unstyled list-inline rating">
                            <li><i class="glyphicon glyphicon-star star-full"></i></li>
                            <li><i class="glyphicon glyphicon-star star-full"></i></li>
                            <li><i class="glyphicon glyphicon-star star-full"></i></li>
                            <li><i class="glyphicon glyphicon-star-empty"></i></li>
                            <li><i class="glyphicon glyphicon-star-empty"></i></li>
                          </ul>
                  <div class="thumbnail-arrow"></div>
                    </div>
                    
                    
                    
                </div>                
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

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap.min.js"></script>
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