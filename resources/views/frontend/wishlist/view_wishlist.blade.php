@extends('frontend.main_master')
@section('content')

@section('title')
 Wish List Page 
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
		
				<li class='active'>Wishlist</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->



<div class="body-content">
	<div class="container">
		<div class="my-wishlist-page">
			<div class="row">
				<div class="col-md-12 my-wishlist">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
				@if(session()->get('language') == 'english') 
					<th colspan="4" class="heading-title">My Wishlist</th>
					@else
					<th colspan="4" class="heading-title">Meine Wunschliste</th>
					@endif
				</tr>
			</thead>
			<tbody id="wishlist">
				
				 
			</tbody>
		</table>
	</div>
</div>			</div><!-- /.row -->
		</div><!-- /.sigin-in-->



<br>

</div>






@endsection