<?php
$this->breadcrumbs = array(
    'Package' => array('package/packageadd'),
    'Package Add',
);
?>
<div class="col-md-7 col-sm-7">
    <div class="error" id="error_msg" style="display: none;"></div>
   
    <form action="/admin/package/packageadd" method="post" class="form-horizontal" onsubmit="return validation();">
     
        <fieldset>
            <legend>Add Package</legend>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Package Name<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="name" class="form-control" name="Package[name]" >
                    <span id="name_error"></span>
                </div>
            </div>
            
           <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Price<span class="require">*</span></label>
                <div class="col-lg-8">
                    <input type="text" id="amount" class="form-control" name="Package[amount]">
                    <span id="amount_error"></span>
                </div>
            </div>
            
            <div class="form-group">
                <label class="col-lg-4 control-label" for="lastname">Description<span class="require">*</span></label>
                <div class="col-lg-8">
                    <textarea id="description" class="form-control" name="Package[description]"></textarea>
                    <span id="description_error"></span>
                </div>
            </div>
            
            
            <div class="form-group">
                    <label for="country" class="col-lg-4 control-label">No of Pages </label>
                    <div class="col-lg-8">
                        <select name="UserProfile[no_of_pages]" id="no_of_pages" class="form-control">
                            <option value="">Select Pages</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                     
                </div>
            
           
            <div class="form-group">
                    <label for="country" class="col-lg-4 control-label">No of images </label>
                    <div class="col-lg-8">
                         <select name="UserProfile[no_of_images]" id="no_of_images" class="form-control">
                            <option value="">Select Pages</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                     
                </div>
            
            
            <div class="form-group">
                    <label for="country" class="col-lg-4 control-label">No of forms </label>
                    <div class="col-lg-8">
                         <select name="UserProfile[no_of_forms]" id="no_of_forms" class="form-control">
                            <option value="">Select Pages</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                             
                        </select>
                    </div>
                     
                </div>
             
        </fieldset>

    <div class="row">
            <div class="col-lg-8 col-md-offset-4 padding-left-0 padding-top-20">                        
                <input type="submit" name="submit" value="Submit" class="btn red">
                 
            </div>
        </div>
    </form>
</div>





<script type="text/javascript">
    function validation()
    {
       
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
    }
    $("#description_error").html("");
     if ($("#description").val() == "") {
      $("#description_error").html("Enter Package Description");
      $("#description").focus();            
      return false;
    }
        
    }
    </script>
     
     
