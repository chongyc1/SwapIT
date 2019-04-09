<!--myAppoinment.html-->

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
	<script src="{{asset('library/sweetalert2/dist/sweetalert2.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('library/sweetalert2/dist/sweetalert2.css')}}">
	<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
	<title> My Appointment </title>
</head>

<body>
	<header>
		<div class="topnav" id="myTopnav">
			<a href="/home">
				<img src="{{asset('frontend/images/SwapitLogo_horizontal.png')}}" alt="SWAPIT Logo" width="200">
			</a>
			<a href="/post-item" class="hoverColor">Post Item</a>
			<a href="/my-item" class="hoverColor">My Item</a>
			<a href="#about" class="hoverColor">My Appointment</a>
			<a class="loginNav" onclick="event.preventDefault();
			document.getElementById('logout-form').submit();">Hello, {{Auth::user()->name}}</a>
			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars"></i>
			</a>
		</div>

		<script>
			function myFunction() {
				var x = document.getElementById("myTopnav");
				if (x.className === "topnav") {
					x.className += " responsive";
				} else {
					x.className = "topnav";
				}
			}
		</script>
	</header>

	<div class="myItems">
		<h2 style="text-align: center"> MY APPOINTMENT </h2>
		<p class="popDesc"> All of the transaction history</p>
	</div>

	@foreach($app_list as $app)

	<div class="containerItem">
		<div class="row">
			<div class="col-sm-4 col-md-4">
				<div class="item1">
					<img src="{{asset('images')}}/{{$app['ownerItemURL']}}" class="postItem-image" alt="Bedside Table image">

					<div class="itemTextContainer">
						<h5 class="itemText">{{$app['ownerName']}}
							@if($app['ownerID'] == Auth::user()->id)
							**Your item
							@endif
						</h5>
					</div>
				</div>
			</div>

			<div class="col-sm-4 col-md-4">
				<span class="arrowBtwIcon">&#8644;</span>
			</div>

			<div class="col-sm-4 col-md-4">
				<div class="ApptItems">
					<img src="{{asset('images')}}/{{$app['buyerItemURL']}}" class="postItem-image" alt="Bedside Table image">
					<div class="itemTextContainer">
						<h5 class="itemText">{{$app['buyerName']}}
							@if($app['buyerID'] == Auth::user()->id)
							**Your item
							@endif
						</h5>
					</div>
				</div>
			</div>
		</div>

		{{--<button class="btn btn-success detailsBtn">--}}
			{{--View--}}
		{{--</button>--}}

		@if($app['buyerID'] == Auth::user()->id)
		<button class="btn detailsBtn" onclick="openModal('{{$app['ownerItemID']}}','{{$app['ownerID']}}','{{$app['appID']}}','b')">
			View
		</button>
		@elseif($app['ownerID'] == Auth::user()->id)
		<button class="btn detailsBtn" onclick="openModal('{{$app['buyerItemID']}}','{{$app['buyerID']}}','{{$app['appID']}}','o')">
			View
		</button>
		@endif
	</div>
	<hr>
	@endforeach

</div>

<!-- The Modal -->
<div id="apptModal" class="modal">

	<div class="modal-content">
		<span class="close">&times;</span>
			<h1 class="modalTitle">Item Details</h1>

			<div class="itemDetails">
		<div class="ModalImgcontainer">
			<img id="item_image_url" class="imgItem" alt="MyItemImg" width="100px" height="100px">
		</div>

		
			<div class="Modaldetails">
				<p> Item Name: <span id="itemName"></span></p>
			</div>
			<div class="Modaldetails">
				<p> Description: <span id="itemDesc"></span> </p>
			</div>
			<div class="Modaldetails">
				<p> Category: <span id="itemCat"></span> </p>
			</div>
			<div class="Modaldetails">
				<p> Owner:  <span id="ownerName"></span></p>
			</div>
			<div class="Modaldetails">
				<p> Owner email: <span id="ownerEmail"></span> </p>
			</div>
			<div class="Modaldetails">
				<p> Status: <span id="status"></span> </p>
			</div>

			<input type="hidden" id="appID">

			<div class="btnClass">
				<button class="btn btn-success chgStatusBtn" style="display:none" onclick="updStatus('A')">
					Approve
				</button>

				<button class="btn btn-danger chgStatusBtn"  style="display:none" onclick="updStatus('D')">
					Decline
				</button>
			</div>

		</div>

	</div>
</div>

<script>
	var modal = document.getElementById('apptModal');
				// var btn = document.getElementById("myBtn");
				var span = document.getElementsByClassName("close")[0];

				// btn.onclick = function() {
				// 	margin: modal.style.display = "block";
				// };

				span.onclick = function() {
					modal.style.display = "none";
				};

				window.onclick = function(event) {
					if (event.target == modal) {
						modal.style.display = "none";
					}
				}
				function openModal(itemID,userID,appID,type){
					margin: modal.style.display = "block";
					$.ajax({
						type : 'post',
						url : 'getAppDetail',
						data : {
							_token : '{{csrf_token()}}',
							itemID : itemID,
							userID : userID,
							appID : appID,
							type : type,
						},
						success:function(d){
							let url = "{{asset('images')}}/"+ d.item.image_url;
							$('#item_image_url').attr('src',url);
							$('#itemName').text(d.item.item_title);
							$('#itemDesc').text(d.item.item_desc);
							$('#itemCat').text(d.item.catName);
							$('#ownerName').text(d.users.name);
							$('#ownerEmail').text(d.users.email);
							$('#status').text(d.app.status);
							$('#appID').val(d.app.id);
                            // console.log(d);
                            if(d.type === 'b'){
                            	$('.chgStatusBtn').css('display','none');
                            }
                            else{
                            	if(d.app.status == 'APPROVED' || d.app.status == 'DECLINED'){
                            		console.log('wew');
                            	}
                            	else{
                            		$('.chgStatusBtn').css('display','initial');
                            	}
                            }
                            // console.log(d.type);
                        }
                    })
				}
				function updStatus(status){
					let appID = $('#appID').val();
					console.log(appID);
					$.ajax({
						type : 'post',
						url : 'updStatus',
						data : {
							_token : '{{csrf_token()}}',
							appID : appID,
							status : status,
						},
						success:function(d){
							swal({
								type: 'success',
								title: 'Status Updated!',
								showConfirmButton: false,
								timer: 1500
							})
							$('#status').text(d);
							$('.chgStatusBtn').css('display','none');
						}
					});
				}
			</script>

		</body>

		<footer>
			<div align="center">
				Copyright &copy; SWAPIT 2018
			</div><br />
			<div align="center">
				<a class="btn btn-social-icon btn-linkedin" href="https://www.linkedin.com/"> <span class="fa fa-linkedin"></span></a>
				<a class="btn btn-social-icon btn-facebook" href="https://www.facebook.com/"> <span class="fa fa-facebook"></span></a>
				<a class="btn btn-social-icon btn-instagram" href="https://www.instagram.com/"> <span class="fa fa-instagram"></span></a>
				<a class="btn btn-social-icon btn-twitter" href="https://twitter.com/"> <span class="fa fa-twitter"></span></a>
			</div>
			<br />
			<div align="center">
				<script type="text/javascript" language="JavaScript">
					document.write("Last Modified : " + document.lastModified);
				</script>
			</div>
		</footer>
		</html>