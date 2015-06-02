$responce .= stripslashes($userpageObject->page_content);
        if ($userpageObject->page_form != '') {
            $responce .= '<div class="success" id="msg"></div>
                <form action="" method="post">
                        <div class="col-md-6 contact-left">
			<p class="your-para"> Name<sphttp://mglobal.dev/BuildTemp/managewebsite/55an>*</span></p>
			<input type="text" name="name" id="name" class="form-control">
                        <div id="name_error"></div>
			</div>
                        <div class="col-md-6 contact-left">
			<p class="your-para"> Email<span>*</span></p>
			<input type="text" name="email" id="email" class="form-control">
                        <div id="email_error"></div>
			</div>
                        
			<p class="message-para"> Message<span>*</span></p>
			<textarea cols="77" rows="6" name="message" id="message" class="form-control"></textarea>
                        <div id="message_error"></div>
			<div class="send"><input type="button" value="SEND" class="btn btn-success" onClick=" return validation();"></div><div class="clearfix"> </div>';
        }