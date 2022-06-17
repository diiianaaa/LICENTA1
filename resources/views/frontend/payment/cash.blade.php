@extends('frontend.main_master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@section('title')
Cash On Delivery
@endsection




<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>Cash On Delivery</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->




<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">





				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
					<div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="unicase-checkout-title">Your Shopping Details </h4>
								</div>
								<div class="">
									<ul class="nav nav-checkout-progress list-unstyled">


										<hr>
										<li>




											<strong>Name : </strong> {{ Auth::user()->name }}
											<hr>

											<strong>Email : </strong> {{ Auth::user()->email }}
											<hr>

											<strong>Phone : </strong> {{ Auth::user()->email }}
											<hr>

											@foreach($order as $item)

											<strong>Post Code : </strong> {{ $item->post_code }}
											<hr>

											<strong>Division : </strong> {{ $item->division_id }}
											<hr>

											<strong>District : </strong> {{ $item->division_id }}
											<hr>



											<strong>State : </strong> {{ $item->state_name }}
											<hr>

											<strong>Date/Time : </strong> {{ $item->created_at}}
											<hr>


											@break
											@endforeach



											<strong>Grand Total : </strong> ${{ $cartTotal }}
											<hr>


										</li>



									</ul>
								</div>
							</div>
						</div>
					</div>
					<!-- checkout-progress-sidebar -->
				</div> <!--  // end col md 6 -->








				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
					<div class="checkout-progress-sidebar ">
						<div class="panel-group">
							<div class="panel panel-default">

								<div class="">
									<ul class="nav nav-checkout-progress list-unstyled">


										<hr>
										<li>

											<div class="table-responsive">
												<table class="table">
													<thead>
														<tr>
															<th colspan="4" class="heading-title">My Cart</th>
														</tr>
													</thead>

													<tbody id="cartPage1">


													</tbody>
												</table>
											</div>

										</li>


									</ul>
								</div>


							</div>

							<form action="{{route('send.mail')}}" id="payment-form">
								@csrf

						</div>
						<br>
						<button class="btn btn-primary">Confirm</button>

						</form>




						@foreach($order as $item)
						<form action="{{route('checkout.delete',$item->id)}}" id="payment-form">
							@csrf

							<button class="btn btn-primary">Cancel your order</button>
							@break
						</form>

						@endforeach



						<form action="{{ url('/create-pdf-file') }}" id="payment-form">
						

					</div>
					<br>
					<button class="btn btn-primary">Generate PDF Order</button>

					</form>


				</div>
			</div>
		</div>
		<!-- checkout-progress-sidebar -->
	</div><!--  // end col md 6 -->








	</form>
</div><!-- /.row -->
</div><!-- /.checkout-box -->
<!-- === ===== BRANDS CAROUSEL ==== ======== -->








<!-- ===== == BRANDS CAROUSEL : END === === -->
</div><!-- /.container -->
</div><!-- /.body-content -->








@endsection