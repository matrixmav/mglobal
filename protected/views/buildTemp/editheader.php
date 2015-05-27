<form action="/buildtemp/editheader">
<textarea name="Header[header_content]" id="editor1"><?php echo $builderObject->header->header_content; ?></textarea> 
<input type="submit" name="submit" value="Submit">
</form>  
<script type="text/javascript">
    CKEDITOR.replace( 'editor1' );
</script>