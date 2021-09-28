<?php  
$basename = basename($_SERVER['PHP_SELF']);
$domain = str_replace("$basename", "", $_SERVER['PHP_SELF']);

?>

<!DOCTYPE html>
<html>
 
<head>

<base href="<?php echo $domain ; ?>">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>404 error page</title>
</head>

<body> 
	<link rel="stylesheet" type="text/css" href="css/404error.css">
	<div class="error-page">
		<div class="content">
			<h1>404</h1>
			<h4>Opps! Page Not Found</h4>
			<p>Sorry, the page you're looking for doesn't exist.</p>

			<script>
				function goBack() {
					window.history.back()
				}
			</script>

			<body>
				<div class="btns">
					<button onclick="goBack()">Go Back</button>
				</div>
			</body>

		</div>
	</div>
</body>

</html>