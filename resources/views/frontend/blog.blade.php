@extends('frontend.main_master')
@section('content')
@section('title')
About us
@endsection

<div class="about-section">
  <h1>Visit us, you won't regret!</h1>

  <p>We put lots of love in an array of delicious treats. We have been creating tasty cakes, desserts, breads and sandwiches for many years. </p>
  <p></p>
  <ul class="white uppercase">
  <h3 class="colored uppercase">WORKING HOURS</h3>
  			    <li>mon-fri: 10:00 am - 10:00 pm</li>
  			    <li>weekends: 10:00 am - 10:00 pm</li>
			  </ul>

        <ul class="white uppercase">
  <h3 class="colored uppercase">CONTACT US:</h3>
  			    <li>E-Mail: support@sunnycakes.com</li>
  			    <li>Tel: +40787884517</li>
			  </ul>
       
</div>


<div style="width: 2000px; height: 400px;">
	{!! Mapper::render() !!}
</div>




<style>


body {
  font-family: Arial, Helvetica, sans-serif;
  margin: 0;
}

html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}


.about-section {
  padding: 50px;
  text-align: center;
  background-color: #fff;
  color: black;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}


</style>


@endsection