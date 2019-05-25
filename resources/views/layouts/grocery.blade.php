<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Grocery Store</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
	<body>
		<div class="container">
			<form id="myForm">
				<div class="form-group">
					<label for="name">Name:</label>
					<input type="text" class="form-control" id="name">
				</div>

				<div class="form-group">
					<label for="type">Type:</label>
					<input type="text" class="form-control" id="type">
				</div>

				<div class="form-group">
					<label for="price">Price:</label>
					<input type="text" name="" class="form-control" id="type">
				</div>

				<button class="btn btn-primary" id="ajaxSubmit">Submit</button>

			</form>
		</div>
		<script src="http://code.jquery.com/jquery-3.3.1.min.js"
		      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		      crossorigin="anonymous">
		</script>

		<script type="text/javascript">
			$(document).ready(function(e){
				$('#ajaxSubmit').click(function(e){
					e.preventDefault();
					// $.ajaxSetup({
					// 	headers: {
					// 	'X-CSRF-TOEKN' : $('meta[name="_token"]').attr('content')
					// }
					// })
					$.ajax({
						url:"{{ url('/grocery/post')}}",
						method: 'post',
						data: {
							name: $('#name').val();
							type: $('#type').val();
							price: $('#price').val();
						},
						success: function(result){
							console.log(result);	
						}
					});
				});
			});
		</script>
	</body>
</html>