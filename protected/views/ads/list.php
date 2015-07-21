 <script type="text/javascript" src="/metronic/assets/plugins/jquery-slimscrolljquery.slimscroll.min.js"></script>
<?php
/* @var $this OrderController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Ad List',
);
 
$this->menu = array(
    array('label' => 'Create Add', 'url' => array('create')),
    array('label' => 'Manage Add', 'url' => array('admin')),
);
?>
<?php //echo "<pre>"; print_r($orderObject);           ?>
<div class="main">
    <div class="">

        <!-- BEGIN SIDEBAR & CONTENT -->
        <div class="row margin-bottom-40">
            <!-- BEGIN SIDEBAR -->
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="col-md-10 col-sm-9">

                <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="grid-view" id="city-grid">
                                <table class="table table-striped table-bordered table-hover table-full-width">
                                    <thead>
                                        <tr>
                                            <th id="city-grid_c0"><a href="/wallet/rpwallet?MoneyTransfer_sort=id" class="sort-link"><span style="white-space: nowrap;">Sl. No &nbsp; &nbsp; &nbsp;</span></a></th><th id="city-grid_c1"><a href="/wallet/rpwallet?MoneyTransfer_sort=id" class="sort-link"><span style="white-space: nowrap;">Transfer To &nbsp; &nbsp; &nbsp;</span></a></th><th id="city-grid_c2"><a href="/wallet/rpwallet?MoneyTransfer_sort=id" class="sort-link"><span style="white-space: nowrap;">Transfer From &nbsp; &nbsp; &nbsp;</span></a></th><th id="city-grid_c3"><a href="/wallet/rpwallet?MoneyTransfer_sort=updated_at" class="sort-link"><span style="white-space: nowrap;">Transfer Date &nbsp; &nbsp; &nbsp;</span></a></th><th id="city-grid_c4"><a href="/wallet/rpwallet?MoneyTransfer_sort=status" class="sort-link"><span style="white-space: nowrap;">Transfer Status &nbsp; &nbsp; &nbsp;</span></a></th><th id="city-grid_c5"><a href="/wallet/rpwallet?MoneyTransfer_sort=id" class="sort-link"><span style="white-space: nowrap;">Transferred Amount &nbsp; &nbsp; &nbsp;</span></a></th><th id="city-grid_c6"><a href="/wallet/rpwallet?MoneyTransfer_sort=comment" class="sort-link"><span style="white-space: nowrap;">Comment &nbsp; &nbsp; &nbsp;</span></a></th></tr>
                                    </thead>
                                    <tbody>
                                        <tr><td class="empty" colspan="7"><span class="empty">
                                                    No results found.
                                                     <div id="testDiv4">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat. Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    <p>Pellentesque rhoncus aliquet porta. Sed vel magna eu turpis pharetra consequat ut vitae lectus. In molestie sollicitudin mi sit amet convallis. Aliquam erat volutpat. Nullam feugiat placerat ipsum eget malesuada. Nulla facilisis nunc non dolor vehicula pretium. Sed dui magna, sodales id pharetra non, ullamcorper eu sapien. Mauris ac consectetur leo. Mauris consequat, lectus ut bibendum pulvinar, leo magna feugiat enim, eu commodo lacus sem vel ante. Sed tempus metus eget leo mollis vulputate. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed pulvinar rhoncus quam, vel semper tellus viverra id. Nulla rutrum porttitor odio, a rutrum purus gravida non. Etiam ac purus augue, eget vestibulum purus. Aenean venenatis ullamcorper augue, non consequat elit tempor sed. Donec velit sapien, volutpat sed ultricies egestas, semper a ante. Fusce dapibus, quam eget auctor suscipit, nibh leo posuere ante, at auctor nisi lacus in sem. Morbi interdum consectetur euismod. Cras accumsan est lacus. Nulla eleifend, eros vel consequat commodo, arcu nunc malesuada nunc, quis sagittis felis sem ac turpis.</p>
    <p>Nulla rhoncus elementum convallis. Mauris condimentum aliquet egestas. Ut iaculis nisi eget tellus accumsan venenatis. Maecenas imperdiet aliquam porta. Aenean ultrices dolor sed quam laoreet varius. Curabitur condimentum blandit erat, quis accumsan eros interdum vitae. Curabitur ligula arcu, sollicitudin vitae iaculis sed, blandit sit amet enim. Morbi ullamcorper, metus vel mollis tristique, arcu turpis malesuada nisi, at dignissim lorem odio a orci. Proin ultrices, ipsum ut vestibulum interdum, libero felis auctor mi, vitae convallis nisl justo ac tellus. Integer nec lacinia turpis. Etiam massa nisl, rhoncus quis rutrum in, pretium eu leo. Proin a velit ut nulla laoreet vestibulum. Curabitur eu elit vitae felis auctor tincidunt. Curabitur tincidunt, metus sed sollicitudin cursus, quam elit commodo erat, ut tempor erat sapien vitae velit. Morbi nec viverra erat.</p>
    <p>Nullam scelerisque facilisis pretium. Vivamus lectus leo, commodo ac sagittis ac, dictum a mi. Donec quis massa ut libero malesuada commodo in et risus. Fusce nunc dolor, aliquet vel rutrum in, molestie sit amet massa. Aliquam suscipit, justo a commodo condimentum, enim sapien fringilla ante, sed lobortis orci lectus in ante. Donec vel interdum est. Donec placerat cursus lacus, eu ultricies nisl tincidunt a. Fusce libero risus, sagittis eleifend iaculis aliquet, condimentum vitae diam. Suspendisse potenti. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin leo purus, sodales a venenatis luctus, faucibus ac enim. Sed id metus ac sem lobortis pretium. Mauris faucibus tempor scelerisque. Nunc vulputate interdum tortor, non tincidunt dui condimentum eget. Aenean in porttitor velit. Nam accumsan rhoncus risus id consectetur.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat. Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    <p>Pellentesque rhoncus aliquet porta. Sed vel magna eu turpis pharetra consequat ut vitae lectus. In molestie sollicitudin mi sit amet convallis. Aliquam erat volutpat. Nullam feugiat placerat ipsum eget malesuada. Nulla facilisis nunc non dolor vehicula pretium. Sed dui magna, sodales id pharetra non, ullamcorper eu sapien. Mauris ac consectetur leo. Mauris consequat, lectus ut bibendum pulvinar, leo magna feugiat enim, eu commodo lacus sem vel ante. Sed tempus metus eget leo mollis vulputate. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed pulvinar rhoncus quam, vel semper tellus viverra id. Nulla rutrum porttitor odio, a rutrum purus gravida non. Etiam ac purus augue, eget vestibulum purus. Aenean venenatis ullamcorper augue, non consequat elit tempor sed. Donec velit sapien, volutpat sed ultricies egestas, semper a ante. Fusce dapibus, quam eget auctor suscipit, nibh leo posuere ante, at auctor nisi lacus in sem. Morbi interdum consectetur euismod. Cras accumsan est lacus. Nulla eleifend, eros vel consequat commodo, arcu nunc malesuada nunc, quis sagittis felis sem ac turpis.</p>
    <p>Nulla rhoncus elementum convallis. Mauris condimentum aliquet egestas. Ut iaculis nisi eget tellus accumsan venenatis. Maecenas imperdiet aliquam porta. Aenean ultrices dolor sed quam laoreet varius. Curabitur condimentum blandit erat, quis accumsan eros interdum vitae. Curabitur ligula arcu, sollicitudin vitae iaculis sed, blandit sit amet enim. Morbi ullamcorper, metus vel mollis tristique, arcu turpis malesuada nisi, at dignissim lorem odio a orci. Proin ultrices, ipsum ut vestibulum interdum, libero felis auctor mi, vitae convallis nisl justo ac tellus. Integer nec lacinia turpis. Etiam massa nisl, rhoncus quis rutrum in, pretium eu leo. Proin a velit ut nulla laoreet vestibulum. Curabitur eu elit vitae felis auctor tincidunt. Curabitur tincidunt, metus sed sollicitudin cursus, quam elit commodo erat, ut tempor erat sapien vitae velit. Morbi nec viverra erat.</p>
    <p>Nullam scelerisque facilisis pretium. Vivamus lectus leo, commodo ac sagittis ac, dictum a mi. Donec quis massa ut libero malesuada commodo in et risus. Fusce nunc dolor, aliquet vel rutrum in, molestie sit amet massa. Aliquam suscipit, justo a commodo condimentum, enim sapien fringilla ante, sed lobortis orci lectus in ante. Donec vel interdum est. Donec placerat cursus lacus, eu ultricies nisl tincidunt a. Fusce libero risus, sagittis eleifend iaculis aliquet, condimentum vitae diam. Suspendisse potenti. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin leo purus, sodales a venenatis luctus, faucibus ac enim. Sed id metus ac sem lobortis pretium. Mauris faucibus tempor scelerisque. Nunc vulputate interdum tortor, non tincidunt dui condimentum eget. Aenean in porttitor velit. Nam accumsan rhoncus risus id consectetur.</p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam rhoncus, felis interdum condimentum consectetur, nisl libero elementum eros, vehicula congue lacus eros non diam. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Vivamus mauris lorem, lacinia id tempus non, imperdiet et leo. Cras sit amet erat sit amet lacus egestas placerat. Aenean ultricies ultrices mauris ac congue. In vel tortor vel velit tristique tempus ac id nisi. Proin quis lorem velit. Nunc dui dui, blandit a ullamcorper vitae, congue fringilla lectus. Aliquam ultricies malesuada feugiat. Vestibulum placerat turpis et eros lobortis vel semper sapien pulvinar.</p>
    <p>Pellentesque rhoncus aliquet porta. Sed vel magna eu turpis pharetra consequat ut vitae lectus. In molestie sollicitudin mi sit amet convallis. Aliquam erat volutpat. Nullam feugiat placerat ipsum eget malesuada. Nulla facilisis nunc non dolor vehicula pretium. Sed dui magna, sodales id pharetra non, ullamcorper eu sapien. Mauris ac consectetur leo. Mauris consequat, lectus ut bibendum pulvinar, leo magna feugiat enim, eu commodo lacus sem vel ante. Sed tempus metus eget leo mollis vulputate. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
    <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Sed pulvinar rhoncus quam, vel semper tellus viverra id. Nulla rutrum porttitor odio, a rutrum purus gravida non. Etiam ac purus augue, eget vestibulum purus. Aenean venenatis ullamcorper augue, non consequat elit tempor sed. Donec velit sapien, volutpat sed ultricies egestas, semper a ante. Fusce dapibus, quam eget auctor suscipit, nibh leo posuere ante, at auctor nisi lacus in sem. Morbi interdum consectetur euismod. Cras accumsan est lacus. Nulla eleifend, eros vel consequat commodo, arcu nunc malesuada nunc, quis sagittis felis sem ac turpis.</p>
    <p>Nulla rhoncus elementum convallis. Mauris condimentum aliquet egestas. Ut iaculis nisi eget tellus accumsan venenatis. Maecenas imperdiet aliquam porta. Aenean ultrices dolor sed quam laoreet varius. Curabitur condimentum blandit erat, quis accumsan eros interdum vitae. Curabitur ligula arcu, sollicitudin vitae iaculis sed, blandit sit amet enim. Morbi ullamcorper, metus vel mollis tristique, arcu turpis malesuada nisi, at dignissim lorem odio a orci. Proin ultrices, ipsum ut vestibulum interdum, libero felis auctor mi, vitae convallis nisl justo ac tellus. Integer nec lacinia turpis. Etiam massa nisl, rhoncus quis rutrum in, pretium eu leo. Proin a velit ut nulla laoreet vestibulum. Curabitur eu elit vitae felis auctor tincidunt. Curabitur tincidunt, metus sed sollicitudin cursus, quam elit commodo erat, ut tempor erat sapien vitae velit. Morbi nec viverra erat.</p>
    <p>Nullam scelerisque facilisis pretium. Vivamus lectus leo, commodo ac sagittis ac, dictum a mi. Donec quis massa ut libero malesuada commodo in et risus. Fusce nunc dolor, aliquet vel rutrum in, molestie sit amet massa. Aliquam suscipit, justo a commodo condimentum, enim sapien fringilla ante, sed lobortis orci lectus in ante. Donec vel interdum est. Donec placerat cursus lacus, eu ultricies nisl tincidunt a. Fusce libero risus, sagittis eleifend iaculis aliquet, condimentum vitae diam. Suspendisse potenti. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin leo purus, sodales a venenatis luctus, faucibus ac enim. Sed id metus ac sem lobortis pretium. Mauris faucibus tempor scelerisque. Nunc vulputate interdum tortor, non tincidunt dui condimentum eget. Aenean in porttitor velit. Nam accumsan rhoncus risus id consectetur.</p>
  </div>
                                                
                                                
                                                
                                                </span></td></tr>
                                    </tbody>
                                </table>  <div title="/wallet/rpwallet" style="display:none" class="keys"></div>
                            </div>        </div>
                    </div>
                    <script>
                        $(function () {
                            $('.datepicker').datepicker({
                                format: 'yyyy-mm-dd'
                            });
                        });
                    </script>   
                </div>
                <?php
//                $this->widget('zii.widgets.grid.CGridView', array(
//                    'id' => 'ads',
//                    'htmlOptions' => array('class' => 'table-responsive '),
//                    'dataProvider' => $dataProvider,
//                    'enableSorting' => 'true',
//                    'ajaxUpdate' => true,
//                    'summaryText' => 'Showing {start} to {end} of {count} entries',
//                    'template' => '{items} {summary} {pager}',
//                    'itemsCssClass' => 'table table-striped table-bordered table-hover table-full-width ',
//                    'rowCssClassExpression' => '($data->date == date("Y-m-d")) ? "odd" : "rowFade"',
//                    'pager' => array(
//                        'header' => false,
//                        'firstPageLabel' => "<<",
//                        'prevPageLabel' => "<",
//                        'nextPageLabel' => ">",
//                        'lastPageLabel' => ">>",
//                    ),
//                    
//                   'columns'=>array(
//                        //'idJob',
//
//                        array(
//                            'name' => 'id',
//                            'header' => '<span style="white-space: nowrap;">Sl. No &nbsp; &nbsp; &nbsp;</span>',
//                            'value' => '$row+1',
//                        ),
//                        array(
//                            'name' => 'date',
//                            'header' => '<span style="white-space: nowrap;">Date &nbsp; &nbsp; &nbsp;</span>',
//                            'value' => 'isset($data->date)?$data->date:""',
//                        ),
//                        array(
//                            'name' => 'ad_id',
//                            'header' => '<span style="white-space: nowrap;">Ad Name &nbsp; &nbsp; &nbsp;</span>',
//                            'value' => 'isset($data->ads->name)?$data->ads->name:""',
//                        ),
//                        array(
//                            'name' => 'Earn',
//                            'header' => '<span style="white-space: nowrap;">Earned &nbsp; &nbsp; &nbsp;</span>',
//                            'value' => '$data->status == 1 ?"Earn":"Not Earn"',
//                        ),
//                        array(
//                            'name' => 'created_at',
//                            'header' => '<span style="white-space: nowrap;">Share &nbsp; &nbsp; &nbsp;</span>',
//                            'htmlOptions' => array('width' => '20%'),
//                            'value' => array($this, 'getSocialButton')
//                        ),
//                        //                       
//                    ),
//                ));
//                foreach($dataProviderArray as $dataProvider){
//                    foreach ($dataProvider as $dataProviderList){
//                        echo $dataProviderList->id;
//                        echo "<br/>";
//                    // echo $dataProvider[0]->id;
//                    //echo "<pre>"; print_r($dataProvider);
//                    }   
//                }

                ?>
            </div>
        </div>

        <script type="text/javascript" 
                src="<?php echo Yii::app()->request->baseUrl; ?>/js/all.js">
        </script> 

        <script type="text/javascript" 
                src="<?php echo Yii::app()->request->baseUrl; ?>/js/fbhelper.js">
        </script>
 <script type="text/javascript">
    $( document ).ready(function() { 
        $('#testDiv4').slimScroll({
          color: '#f15c2b',
          position:'right',
           height: '200px'
      });
    });  
</script>
<style>
    .slimScrollBar{opacity:1 !important; border-radius: 7px !important;}
    
    </style>