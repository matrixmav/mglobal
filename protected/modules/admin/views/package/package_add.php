<?php
$this->breadcrumbs = array(
    'Package' => array('package/list'),
    'Package Add',
);
?>
<div class="col-md-7 col-sm-7">
    <?php if ($error) { ?><div class="error" id="error_msg"><?php echo $error; ?></div><?php } ?>
    <?php if ($success) { ?><div class="success" id="error_msg"><?php echo $success; ?></div><?php } ?>
<div class="portlet box orange   ">
    <div class="portlet-title">
							<div class="caption">
								Add Package
							</div>
    </div>
        <div class="portlet-body form">
            <form action="/admin/package/add" method="post" class="form-horizontal" onsubmit="return validation();" enctype="multipart/form-data">

        <fieldset>
      
<div class="form-body">
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Package Name<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="text" id="name" class="form-control" name="Package[name]" >
                    <span style="color:red;" id="name_error"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Price<span class="require">*</span></label>
                <div class="col-lg-7">
                    <input type="text" id="amount" class="form-control" name="Package[amount]">
                    <span style="color:red;" id="amount_error"></span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Description<span class="require">*</span></label>
                <div class="col-lg-7">
                    <textarea id="editor1" class="form-control" name="Package[description]"></textarea>
                    <span style="color:red;" id="description_error"></span>
                </div>
            </div>


            <div class="form-group">
                <label for="country" class="col-lg-4 control-label">No of Pages </label>
                <div class="col-lg-7">
                    <input type="text" id="no_of_pages" class="form-control" name="Package[no_of_pages]" >
                    <span style="color:red;" id="pages_error"></span>
                </div>

            </div>


            <div class="form-group">
                <label for="country" class="col-lg-4 control-label">No of images </label>
                <div class="col-lg-7">
                    <input type="text" id="no_of_images" class="form-control" name="Package[no_of_images]">
                    <span style="color:red;" id="images_error"></span>
                </div>

            </div>


            <div class="form-group">
                <label for="country" class="col-lg-4 control-label">No of forms </label>
                <div class="col-lg-7">
                    <input type="text" id="no_of_forms" class="form-control" name="Package[no_of_forms]">
                    <span style="color:red;" id="forms_error"></span>
                </div>

            </div>
     <div class="form-group">
                <label for="country" class="col-lg-4 control-label">Package Type</label>
                <div class="col-lg-7">
                    <select name="Package[type]" id="type">
                        <option value="">Select Type</option>
                        <option value="1">Basic</option>  
                        <option value="2">Advance</option>
                        <option value="3">Advance PRO</option>
                    </select>
                    <span style="color:red;" id="type_error"></span>
                </div>

            </div>
     <div class="form-group">
                <label for="country" class="col-lg-4 control-label">Package Image</label>
                <div class="col-lg-7">
                    <input type="file" id="image" class="form-control" name="image">
                    <span style="color:red;" id="image_error"></span>
                </div>

            </div>
    <div class="form-group">
                <label for="country" class="col-lg-4 control-label">Reward Points</label>
                <div class="col-lg-7">
                    <input type="text" id="reward_points" class="form-control" name="Package[reward_points]">
                    <span style="color:red;" id="image_error"></span>
                </div>

            </div>
</div>
        </fieldset>
<div class="form-actions right">                     
                <input type="submit" name="submit" value="Submit" class="btn orange">
                 
            </div>
        
    </form>
</div>
</div>
</div>





<script type="text/javascript">
    function validation()
    {
        var regex = /^\d*(.\d{2})?$/;
        var amount = document.getElementById('amount');
        $("#name_error").html("");
        if ($("#name").val() == "") {
            $("#name_error").html("Enter Package Name");
            $("#name").focus();
            return false;
        }
        $("#amount_error").html("");
        if ($("#amount").val() == "") {
            $("#amount_error").html("Enter Package Price");
            $("#amount").focus();
            return false;
        } else {
            if (isNaN($("#amount").val())) {
                $("#amount_error").html("Enter valid price.");
                $("#amount").focus();
                return false;
            }
        }

        if (!regex.test(amount.value)) {

            $("#amount_error").html("Enter Valid Package Price");
            $("#amount").focus();
            return false;
        }

        $("#description_error").html("");
        if ($("#editor1").val() == "") {
            $("#description_error").html("Enter Package Description");
            $("#editor1").focus();
            return false;
        }

        if ($("#no_of_pages").val() != "") {
            if (isNaN($("#no_of_pages").val())) {
                $("#pages_error").html("Enter valid number.");
                $("#pages_error").focus();
                return false;
            } else {
                $("#pages_error").html("");
            }

        }

        if ($("#no_of_images").val() != "") {
            $("#images_error").html("");
            if (isNaN($("#no_of_images").val())) {
                $("#images_error").html("Enter valid number.");
                $("#images_error").focus();
                return false;
            }

        }

        if ($("#no_of_forms").val() != "") {
            $("#forms_error").html("");
            if (isNaN($("#no_of_forms").val())) {
                $("#forms_error").html("Enter valid number.");
                $("#forms_error").focus();
                return false;
            }
        }
        $("#type_error").html("");
        if ($("#type").val() == "") {
            $("#type_error").html("Enter select package type");
            $("#type").focus();
            return false;
        }
        $("#image_error").html("");
        if ($("#image").val() == "") {
            $("#image_error").html("Please upload package image");
            $("#image").focus();
            return false;
        }
        

    }
</script>
 <script type="text/javascript">
    CKEDITOR.replace( 'editor1' , {
    filebrowserBrowseUrl : '/ckfinder/ckfinder.html',
    filebrowserImageBrowseUrl : '/ckfinder/ckfinder.html?type=Images',
    filebrowserFlashBrowseUrl : '/ckfinder/ckfinder.html?type=Flash',
    filebrowserUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserImageUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
    filebrowserFlashUploadUrl : '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
CKFinder.setupCKEditor( editor, '../' );
</script>
     


