<!--setAppoinment.html-->

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
	<link href ="{{asset('frontend/css/bootstrap-social.css')}}" rel="stylesheet">
	<link rel="icon" type="image/x-icon" href="{{asset('frontend/images/favicon.icon')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/appointmentStyles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/indexStyles.css')}}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<link rel="stylesheet" type="text/css" href="{{asset('frontend/styles.css')}}">
	<title> Set Appointment </title>
</head>

<body>
	<div>
		<div id="booking" class="section">
			<div class="section-center">
				<div class="container">
					<div class="row">
						<div class="booking-form">

							<div class="booking-bg">
								<div class="form-header">
									<h2>Set Appointment</h2>
									<span class="fa fa-calendar calendarIcon"></span>
								</div>
							</div>

							<form method="POST" action="/saveAppointment">
								{{csrf_field()}}

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">My item to trade</span>
											<select class="form-control" name="buyer_item_id">
												@foreach($itemList as $i)
												<option value="{{$i->id}}">{{$i->item_title}}</option>
												@endforeach
											</select>
											<span class="select-arrow"></span>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Item To Trade</span>
											<input type="text" class="form-control" value="{{$item->item_title}}" readonly>
											<input type="text" name="itemID" style="visibility: hidden;" value="{{$item->id}}">
											<input type="text" name="ownerID" style="visibility: hidden;" value="{{$item->owner}}">
											<span class="select-arrow"></span>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Date</span>
											<input class="form-control" type="date" name="date" required>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Time</span>
											<input class="form-control" type="time" name="time" required>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<span class="form-label">Location</span>
											<input class="form-control" type="text" name="location" required>
										</div>
									</div>
								</div>


								<div class="form-btn">
									<button class="submit-btn" type="submit">Save</button>
								</div>

							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

</html>
