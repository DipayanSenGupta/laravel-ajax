<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
   <meta name="viewport" content="width=device-width, initial-scale=1"/> 
	<meta name="_token" content="{{csrf_token()}}" />
	
	<title>Grocery Store</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
</head>
	<body>
		<div class="container">
			<div class="alert alert-success" style="display: none">
			</div>
			<h1>AJAX DATA STORE THROUGH LARAVEL</h1>
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
					<input type="text" class="form-control" id="price">
				</div>

				<button class="btn btn-primary" id="ajaxsubmit">Submit</button>

			</form>
		</div>
		<script src="http://code.jquery.com/jquery-3.3.1.min.js"
		      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
		      crossorigin="anonymous">
		</script>

		<script type="text/javascript">
			jQuery(document).ready(function(e){
				jQuery('#ajaxsubmit').click(function(e){
					e.preventDefault();
					jQuery.ajaxSetup({
						headers: {
						'X-CSRF-TOEKN' : jQuery('meta[name="_token"]').attr('content')
					}
					});

					jQuery.ajax({
						url:"{{ url('groceries') }}",
						method: 'post',
						data: {
							name: jQuery('#name').val(),
							type: jQuery('#type').val(),
							price: jQuery('#price').val()
						},
						success: function(result){
							jQuery('.alert').show();
							jQuery('.alert').html(result.success);	
						}
					});
				});
			});
		</script>
	</body>
</html>