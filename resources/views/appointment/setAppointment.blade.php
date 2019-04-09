<!--setAppoinment.html-->

<html>
<head>
	<meta charset="utf-8">
</head>

<body>
				<div id="booking" class="section">
					<div class="section-center">
						<div class="container">
							<div class="row">
								<div class="booking-form">
									<div class="booking-bg">
										<div class="form-header">
											<h2>Set Appoinment to Trade</h2>
										</div>
									</div>

									<form method="POST" action="/saveAppointment">
                                        {{csrf_field()}}
										<h1>Owner ID : {{$dataList['owner']}}</h1>
										<h1>Buyer ID : {{$dataList['buyer']}}</h1>
										<h1>Item ID : {{$dataList['itemID']}}</h1>
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
													<span class="form-label">Item that want to trade</span>
                                                    <input type="text" value="{{$item->item_title}}" readonly>
                                                    <input type="text" name="itemID" value="{{$item->id}}">
                                                    <input type="text" name="ownerID" value="{{$item->owner}}">
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
</body>
</html>
