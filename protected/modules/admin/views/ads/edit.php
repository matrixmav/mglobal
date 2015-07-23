<style>
    .portlet.box.orange{ max-width:1200px;padding-bottom:20px !important;}
    .portlet.box > .portlet-title{margin-bottom: 20px;}
    .form-group{padding-right:10px;}
    
    </style>
        <?php
$this->breadcrumbs = array(
    'Ads' => array('Add'),
    'Edit',
);

?>
<div class="col-md-7 col-sm-7">
    <div class="error" id="error_msg" style="display: none;"></div>    
    <form action="" method="post" class="form-horizontal" onsubmit="return validation();" enctype = "multipart/form-data">
          <div class="portlet box orange">
         <div class="portlet-title">
							<div class="caption">
								Edit Ads
							</div>
    </div>
        <?php if(!empty($success)){ echo $success ; }  ?>
        <fieldset>
            

            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Name</label>
                <div class="col-lg-6">
                    <input type="text" id="ads_name" class="form-control" name="ads_name" value="<?php echo $adsObject->name ? $adsObject->name : '' ; ?>" >                
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Description</label>
                <div class="col-lg-6">
                    <input type="text" id="ads_desc" class="form-control" name="ads_desc"  value="<?php echo $adsObject->description ? $adsObject->description : '' ; ?>">                
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="firstname">Upload Banner </label>
                <div class="col-lg-8 fileupload fileupload-new">
                     <div data-provides="fileupload" class="fileupload fileupload-new">
                         <span class=""><span class="fileupload-new"><input type="file" id="ads_banner" class="form-control11" name="ads_banner"></span></div>
                    <span class="example1">(Upload jpg ,jpeg ,png files only)</span> 
                    <?php 
                    if(!empty($adsObject) && $adsObject->banner!=''){?>
                    <span class="example">
                        <a href="/upload/banner/<?php echo $adsObject->banner;?>" target="_blank"><img src="/upload/banner/<?php echo $adsObject->banner;?>" width="50" height="50"></a></span>
                    <?php }?>
                </div>
            </div>
            
        </fieldset>

    <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                <input type="submit" name="submit" value="Update" class="btn orange">
                <input type="hidden" name="banner_id" value="<?php echo $adsObject->id ; ?>" >
            </div>
        </div>
     </div>
    </form>
</div>

<script>
     function validation(){        
        if(document.getElementById("ads_name").value==''){
            document.getElementById("error_msg").style.display="block";
            document.getElementById("error_msg").innerHTML = "Please Enter Ads Name.";
            document.getElementById("ads_name").focus();
            return false;
        }
        
        if(document.getElementById("ads_desc").value==''){
            document.getElementById("error_msg").style.display="block";
            document.getElementById("error_msg").innerHTML = "Please Enter Ads Desciption.";
            document.getElementById("ads_desc").focus();
            return false;
        }
        
    }
</script>
