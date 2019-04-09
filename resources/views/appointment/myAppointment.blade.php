<!--myAppoinment.html-->

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{asset('/appointment/appointmentStyles.css')}}">
</head>

<body>

	<h1> My Appointment </h1>

	<div class="container">
		@foreach($app_list as $app)
			<div class="containerItem">
				<div class="item1">
					<img src="{{asset('images')}}/{{$app['ownerItemURL']}}" class="postItem-image" alt="Bedside Table image" width="100px" height="100px">
					<h5>{{$app['ownerName']}}
					@if($app['ownerID'] == Auth::user()->id)
						**Your item
					@endif
					</h5>
				</div>
				<div class="arrowBtw">
					<span style='font-size:50px;'>&#8644;</span>
				</div>

				<div class="item1">
					<img src="{{asset('images')}}/{{$app['buyerItemURL']}}" class="postItem-image" alt="Bedside Table image"  width="100px" height="100px">
					<h5>{{$app['buyerName']}}
				@if($app['buyerID'] == Auth::user()->id)
					**Your item
				@endif
					</h5>
				</div>

				<button class="btn appoinmentBtn" id="myBtn">
					View
				</button>
			</div>
			<hr>
		@endforeach
		{{--<div class="containerItem">--}}
			{{--<div class="item1">--}}
				{{--<img src="#" class="imgItem" alt="MyItemImg">--}}
			{{--</div>--}}

			{{--<div class="arrowBtw">--}}
				{{--<span style='font-size:50px;'>&#8644;</span>--}}
			{{--</div>--}}

			{{--<div class="item1">--}}
				{{--<img src="#" class="imgItem" alt="SellerItemImg">--}}
			{{--</div>--}}

			{{--<button class="btn appoinmentBtn" id="myBtn">--}}
				{{--View--}}
			{{--</button>--}}
		{{--</div>--}}




	</div>

	<!-- The Modal -->
	<div id="apptModal" class="modal">

		<div class="modal-content">
			<span class="close">&times;</span>
			<h1>Item Details</h1>
			<div class="container">
				<img src="#" class="imgItem" alt="MyItemImg">
			</div> 

			<div class="itemDetails">
				<div class="details">
					<p> Item Name: </p>
				</div>
				<div class="details">
					<p> Description: </p>
				</div>
				<div class="details">
					<p> Category: </p>
				</div>
				<div class="details">
					<p> Owner: </p>
				</div>
				<div class="details">
					<p> Owner email: </p>
				</div>

			<button class="btn btn-success" id="myBtn">
				Approve
			</button>

			<button class="btn btn-danger" id="myBtn">
				Decline
			</button>
			</div>

		</div>
	</div>

	<script>
		var modal = document.getElementById('apptModal');
		var btn = document.getElementById("myBtn");
		var span = document.getElementsByClassName("close")[0];

		btn.onclick = function() {
			margin: modal.style.display = "block";
		};

		span.onclick = function() {
			modal.style.display = "none";
		};

		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
	</script>


	<style>
	.modal {
		display: none; 
		position: fixed; 
		z-index: 1; 
		padding-top: 100px; 
		left: 0;
		top: 0;
		width: 100%; 
		height: 100%; 
		overflow: auto; 
		background-color: rgb(0,0,0); 
		background-color: rgba(0,0,0,0.4);
	}

	/* Modal Content */
	.modal-content {
		background-color: #fefefe;
		margin: auto;
		padding: 20px;
		border: 1px solid #888;
		width: 80%;
	}

	/* The Close Button */
	.close {
		color: #aaaaaa;
		float: right;
		font-size: 28px;
		font-weight: bold;
	}

	.close:hover,
	.close:focus {
		color: #000;
		text-decoration: none;
		cursor: pointer;
	}
</style>

</body>

</html>