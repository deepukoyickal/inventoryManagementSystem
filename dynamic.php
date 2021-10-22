<html>
<head>
	<script type="text/javascript" src="jquery-3.3.1.min.js">
		setInterval(function(){
			$('#content').load(' #content');
		},300);
	</script>
</head>
<body>
<div id="content">
	<?php echo rand(0,100); ?>
</div>
</body>
</html>