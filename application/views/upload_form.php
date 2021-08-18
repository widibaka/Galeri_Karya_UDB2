<html>
<head>
<title>Upload Form</title>
</head>
<body>

<?php echo $error;?>

<?php echo form_open_multipart('api/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

<!-- jQuery -->
<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
	$('form').submit(function (e) {
		e.preventDefault()
		$.ajax({
		  url: "do_upload",
		  type: "POST",
		  data: [1,2,3],
		  processData: false,
		  contentType: false,
		  success: function (res) {
		    document.getElementById("response").innerHTML = res; 
		  }
		});
	})
</script>
</body>
</html>