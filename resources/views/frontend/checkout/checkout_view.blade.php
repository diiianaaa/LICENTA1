@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('title')
Checkout
@endsection




</head>

<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
						<div class="panel panel-default checkout-step-01">

							<!-- panel-heading -->
							<div class="panel-heading">
								<h4 class="unicase-checkout-title">
									<a data-toggle="collapse" class="" data-parent="#accordion">
										<span>1</span>Checkout Method
									</a>
								</h4>
							</div>
							<!-- panel-heading -->


							<!-- panel-body  -->
							<div class="panel-body">
								<div class="row">

									<!-- guest-login -->
									<div class="col-md-6 col-sm-6 already-registered-login">
										<h4 class="checkout-subtitle">Shipping Address</h4>

										<form class="register-form" role="form">


											<div class="form-group">
												<label class="info-title" for="exampleInputEmail1">Shipping Name <span>*</span></label>
												<input type="test" name="shipping-name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Email" value="{{ Auth::user()->name }}" required="">
											</div>


											<div class="form-group">
												<label class="info-title" for="exampleInputEmail1">Email <span>*</span></label>
												<input type="email" name="shipping-email" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->email }}" required="">
											</div>

											<div class="form-group">
												<label class="info-title" for="exampleInputEmail1">Phone <span>*</span></label>
												<input type="number" name="shipping-phone" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Phone" value="{{ Auth::user()->phone }}">
											</div>


											<div class="form-group">
												<label class="info-title" for="exampleInputEmail1">Post Code <span>*</span></label>
												<input type="text" name="shipping-name" class="form-control unicase-form-control text-input" id="exampleInputEmail1" placeholder="Post Code" value="1234321">
											</div>



											<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Login</button>
										</form>
									</div>




									<!-- guest-login -->

									<!-- already-registered-login -->
									<div class="col-md-6 col-sm-6 already-registered-login">

										<div class="form-group">
											<h5><b>Division Select </b> <span class="text-danger">*</span></h5>
											<div class="controls">
												<select name="division_id" class="form-control" required="">
													<option value="" selected="" disabled="">Select Division</option>
													@foreach($divisions as $item)
													<option value="{{ $item->id }}">{{ $item->division_name }}</option>
													@endforeach
												</select>
												@error('division_id')
												<span class="text-danger">{{ $message }}</span>
												@enderror
											</div>
										</div> <!-- // end form group -->



										<div class="form-group">
											<h5><b>District Select</b> <span class="text-danger">*</span></h5>
											<div class="controls">
												<select name="district_id" class="form-control" required="">
													<option value="" selected="" disabled="">Select District</option>

												</select>
												@error('district_id')
												<span class="text-danger">{{ $message }}</span>
												@enderror
											</div>
										</div> <!-- // end form group -->

										<div class="form-group">
											<h5><b>State Select</b> <span class="text-danger">*</span></h5>
											<div class="controls">
												<select name="state_id" class="form-control" required="">
													<option value="" selected="" disabled="">Select State</option>

												</select>
												@error('state_id')
												<span class="text-danger">{{ $message }}</span>
												@enderror
											</div>
										</div> <!-- // end form group -->



										<div class="form-group">
											<label class="info-title" for="exampleInputEmail1">Notes <span>*</span></label>
											<textarea class="form-control" cols="30" rows="5" placeholder="Notes" name="notes"></textarea>
										</div> <!-- // end form group  -->


									</div>
									<!-- already-registered-login -->


									<div class="col-md-4">
			<!-- checkout-progress-sidebar -->
			<div class="checkout-progress-sidebar ">
				<div class="panel-group">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="unicase-checkout-title">Select Payment Method</h4>
						</div>


						<div class="row">
							<div class="col-md-4">
								<label for="">Stripe</label>
								<input type="radio" name="payment_method" value="stripe">
								<img src="{{ asset('frontend/assets/images/payments/4.png') }}">
							</div> <!-- end col md 4 -->

							<div class="col-md-4">
								<label for="">Card</label>
								<input type="radio" name="payment_method" value="card">
								<img src="{{ asset('frontend/assets/images/payments/3.png') }}">
							</div> <!-- end col md 4 -->

							<div class="col-md-4">
								<label for="">Cash</label>
								<input type="radio" name="payment_method" value="cash">
								
							</div> <!-- end col md 4 -->


						</div> <!-- // end row  -->
						<hr>
						<button type="submit" class="btn-upper btn btn-primary checkout-page-button">Payment Step</button>


					</div>
				</div>
			</div>
			<!-- checkout-progress-sidebar -->
		</div>




								</div>
							</div>
							<!-- panel-body  -->

						</div><!-- row -->
					</div>
				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->







		<!-- ============================================== BRANDS CAROUSEL ============================================== -->

		<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->

		<!-- ===== == BRANDS CAROUSEL : END === === -->
	</div><!-- /.container -->
</div><!-- /.body-content -->



<script type="text/javascript">
	$(document).ready(function() {
		$('select[name="division_id"]').on('change', function() {
			var division_id = $(this).val();
			if (division_id) {
				$.ajax({
					url: "{{  url('/district-get/ajax') }}/" + division_id,
					type: "GET",
					dataType: "json",
					success: function(data) {
						$('select[name="state_id"]').empty();
						var d = $('select[name="district_id"]').empty();
						$.each(data, function(key, value) {
							$('select[name="district_id"]').append('<option value="' + value.id + '">' + value.district_name + '</option>');
						});
					},
				});
			} else {
				alert('danger');
			}
		});
		$('select[name="district_id"]').on('change', function() {
			var district_id = $(this).val();
			if (district_id) {
				$.ajax({
					url: "{{  url('/state-get/ajax') }}/" + district_id,
					type: "GET",
					dataType: "json",
					success: function(data) {
						var d = $('select[name="state_id"]').empty();
						$.each(data, function(key, value) {
							$('select[name="state_id"]').append('<option value="' + value.id + '">' + value.state_name + '</option>');
						});
					},
				});
			} else {
				alert('danger');
			}
		});

	});
</script>



@endsection