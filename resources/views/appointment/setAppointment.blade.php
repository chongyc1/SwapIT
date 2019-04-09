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
							<form>
								<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">My Item</span>
										<select class="form-control">
												<option>Item 1</option>
												<option>Item 2</option>
												<option>Item 3</option>
											</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Items that you want</span>
										<select class="form-control">
												<option>Item 1</option>
												<option>Item 2</option>
												<option>Item 3</option>
											</select>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Date</span>
										<input class="form-control" type="date" required>
										<span class="select-arrow"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<span class="form-label">Time</span>
										<input class="form-control" type="time" required>
										<span class="select-arrow"></span>
									</div>
								</div>
							</div>

								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<span class="form-label">Location</span>
											<input class="form-control" type="text" required>
										</div>
									</div>
								</div>

								<div class="form-btn">
									<button class="submit-btn">Save</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>

	</html>
</form>
</div>

</body>