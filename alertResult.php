<html>
<head>
	<meta charset="utf-8" />
</head>
<body>
	<form id="form1" name="form1" action="" onload=showMessage(<?php echo $_GET['result']?>)>
		<button type="button" >ایجاد</button>
	</form>
</body>
</html>
<script>
	function showMessage(res)
	{
		//alert("hi showmessage");
		if(res == 1)
			alert("پردازش با موفقیت انجام شد");
		else if(res == 0)
			alert("پردازش مورد نظر انجام نشد");
		window.location.href = 'index.php';
	}
</script>