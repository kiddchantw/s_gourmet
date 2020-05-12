<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Table</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" 
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" 
	integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" 
	crossorigin="anonymous">
	<!-- <link href="tagsinput.css" rel="stylesheet" type="text/css"> -->

	<!-- JavaScript -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
	integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
	crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" 
	integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" 
	crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
	integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" 
	crossorigin="anonymous"></script>
<!-- 	<script src="tagsinput.js"></script>
-->
<script src="bootstrap-tagsinput.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap-tagsinput.css" />

</head>
<body>
	<div class="container-fluid">
		<div style="background-color:#D7FFEE" > 
			<h1>好想塞呷桂</h1>
			
			<input type="text" data-role="tagsinput" value="甜的,鹹的,正餐,非正餐" >

		</div>



		<div style="background-color:#FAF4FF" >
			<table class="table">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">name</th>
						<th scope="col">address</th>
						<th scope="col">tag</th>
						<th scope="col">導航</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>甘單咖啡</td>
						<td>700台南市中西區民權路二段4巷13號</td>
						<td>
							
							<span class="badge badge-pill badge-warning">咖啡</span>
							<span class="badge badge-pill badge-success">啤酒</span>
						</td>
						<td><button type="button" class="btn btn-info  btn-sm" > GO </button></td>

					</tr>
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>