@extends('frontend.main_master')
@section('content')
@section('title')
Coffee Shop Home
@endsection

<header class="masthead text-center text-white">
            <div class="masthead-content" >
        
                <div class="container px-5" >
                
                    <h1 class="masthead-heading mb-0">.</h1>
                    
                    <h2 class="masthead-subheading mb-0">.</h2>
                    <a class="btn btn-primary btn-xl rounded-pill mt-5" href="#scroll">About Us</a>
                </div>
            </div>
           
        </header>



        <div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 
  
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        

        </div>
       
        <!-- ===== ===== PRODUCT TAGS ==== ====== -->
   @include('frontend.common.product_tags')
        <!-- ==== ===== PRODUCT TAGS : END ======= ==== --> 


        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">we're available</h4>
                    </div>
                  </div>
                  <h6 class="text">You find us every day from 10 AM to 10 PM.</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">Shipping in your city is free</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Fresh</h4>
                    </div>
                  </div>
                  <h6 class="text">We use just fresh ingredients</h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
      



        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
          @if(session()->get('language') == 'english') 
            <h3 class="new-product-title pull-left">New Products</h3>
            @else
            <h3 class="new-product-title pull-left">Neue Produkte</h3>
            @endif
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
            @if(session()->get('language') == 'english') 
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">All</a></li>
              @else
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">Alle</a></li>
              @endif
              @foreach($categories as $category)
  <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">{{ $category->category_name_en }}</a></li>
              @endforeach
              <!-- <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>
              <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> -->
            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">



            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

                  @foreach($products as $product)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
       <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_small) }}" alt=""></a> </div>
                       
               
               </div>

                   
                        
        <div class="product-info text-left">
          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
@if(session()->get('language') == 'german') {{ $product->product_name_ger }} @else {{ $product->product_name_en }} @endif
            </a></h3>
         
          <div class="description"></div>

    <div class="product-price"> <span class="price"> Price: ${{ $product->selling_price }} </span>  </div>
        

          
        </div>
        <!-- /.product-info -->
        <div class="cart clearfix animate-effect">
          <div class="action">
            <ul class="list-unstyled">
              <li class="add-cart-button btn-group">


           <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
        
        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
      </li>

      

        <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>

              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
            </ul>
          </div>
          <!-- /.action --> 
        </div>
        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
                  @endforeach


                  
                  
                </div>
              
              </div>
        
            </div>
            <!-- /.tab-pane -->




            @foreach($categories as $category)
            <div class="tab-pane" id="category{{ $category->id }}">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">

@php
  $catwiseProduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get(); 
@endphp
                  

                  @forelse($catwiseProduct as $product)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_small) }}" alt=""></a> </div>
                          <!-- /.image -->

              
           </div>

                        
        <div class="product-info text-left">
          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
@if(session()->get('language') == 'german') {{ $product->product_name_ger }} @else {{ $product->product_name_en }} @endif
            </a></h3>

          <div class="description"></div>

   
    <div class="product-price"> <span class="price"> Price: ${{ $product->selling_price }} </span>  </div>
       

         
          <!-- /.product-price --> 
          
        </div>
        <!-- /.product-info -->
        <div class="cart clearfix animate-effect">
          <div class="action">
            <ul class="list-unstyled">
              <li class="add-cart-button btn-group">

        <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
        
        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
      </li>

      

        <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>


              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
            </ul>
          </div>
          <!-- /.action --> 
        </div>
        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->

                  @empty
                  @if(session()->get('language') == 'english') 
                  <h5 class="text-danger">No Product Found</h5>
                  @else
                  <h5 class="text-danger">Kein Produkt gefunden</h5>
                  @endif
                  @endforelse<!--  // end all optionproduct foreach  -->


                  
                  
                </div>
      
              </div>
  
            </div>
            <!-- /.tab-pane -->
            @endforeach <!-- end categor foreach -->


 
            
            
          </div>
          <!-- /.tab-content --> 
        </div>
      
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
               
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 




        <!-- == === FEATURED PRODUCTS == ==== -->

        <seuction class="section featured-product wow fadeInUp">
          <h3 class="section-title">Featured products</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


            @foreach($featured as $product)
            <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_small) }}" alt=""></a> </div>
                          <!-- /.image -->

                         </div>

                        <!-- /.product-image -->
                        
        <div class="product-info text-left">
          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
@if(session()->get('language') == 'german') {{ $product->product_name_ger }} @else {{ $product->product_name_en }} @endif
            </a></h3>
          
          <div class="description"></div>

    <div class="product-price"> <span class="price"> Price: ${{ $product->selling_price }} </span>  </div>
       

         
          <!-- /.product-price --> 
          
        </div>
        <!-- /.product-info -->
<div class="cart clearfix animate-effect">
  <div class="action">
    <ul class="list-unstyled">
      <li class="add-cart-button btn-group">
       
        <button class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
        
        <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
      </li>

      

        <button class="btn btn-primary icon" type="button" title="Wishlist" id="{{ $product->id }}" onclick="addToWishList(this.id)"> <i class="fa fa-heart"></i> </button>

      

      <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
    </ul>
  </div>
          <!-- /.action --> 
        </div>
        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
            <!-- /.item -->
            @endforeach
            
           
          </div>
 
        </section>
   
       
        
      </div>
    
    </div>

  
  </div>
  <!-- /.container --> 
</div>


@endsection