<!--myAppoinment.html-->

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{asset('/appointment/appointmentStyles.css')}}">
	<script src="{{asset('library/sweetalert2/dist/sweetalert2.min.js')}}"></script>
	<link rel="stylesheet" href="{{asset('library/sweetalert2/dist/sweetalert2.css')}}">
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
				@if($app['buyerID'] == Auth::user()->id)
					<button class="btn appoinmentBtn" onclick="openModal('{{$app['ownerItemID']}}','{{$app['ownerID']}}','{{$app['appID']}}','b')">
						View - You are buyer
					</button>
				@elseif($app['ownerID'] == Auth::user()->id)
					<button class="btn appoinmentBtn" onclick="openModal('{{$app['buyerItemID']}}','{{$app['buyerID']}}','{{$app['appID']}}','o')">
						View - You are owner
					</button>
				@endif
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
			<h1>Item For You</h1>
			<div class="container">
				<img class="imgItem" alt="MyItemImg" id="item_image_url" height="100px" width="100px">
			</div> 

			<div class="itemDetails">
				<div class="details">
					<p> Item Name: <span id="itemName"></span></p>
				</div>
				<div class="details">
					<p> Description: <span id="itemDesc"></span> </p>
				</div>
				<div class="details">
					<p> Category: <span id="itemCat"></span> </p>
				</div>
				<div class="details">
					<p> Owner:  <span id="ownerName"></span></p>
				</div>
				<div class="details">
					<p> Owner email: <span id="ownerEmail"></span> </p>
				</div>
				<div class="details">
					<p> Status: <span id="status"></span> </p>
				</div>

				<input type="hidden" id="appID">

				<button class="btn btn-danger chgStatusBtn" style="display:none" onclick="updStatus('A')">
					Approve
				</button>

				<button class="btn btn-danger chgStatusBtn"  style="display:none" onclick="updStatus('D')">
					Decline
				</button>

			</div>

		</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<script>
		var modal = document.getElementById('apptModal');
		var btn = document.getElementById("myBtn");
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


		$(document).ready(function(){
		})

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