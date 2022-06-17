@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">

        <title></title>
<hr></hr>
    <style>
      hr {
        width: 70%;
        margin-left: auto;
        margin-right: auto;
	
      }

	  h1{
			text-align: center;  
	  }
    </style>
  </head>
  <body>
    <h1>Checkout</h1>
    <hr />


            <div class="col-md-2">
            </div>

            <div class="col-md-12">

                <div class="table-responsive">
                    <table class="table">
                        <tbody>

                            <tr style="background: #e2e2e2;">

                              <td class="col-md-3">
                                    <label for=""> N U M B E R</label>
                                </td>
                              


                                <td class="col-md-3">
                                    <label for=""> D A T E</label>
                                </td>



                                <td class="col-md-3">
                                    <label for=""> P A Y M E N T</label>
                                </td>


                                <td class="col-md-3">
                                    <label for=""> T O T A L</label>
                                </td>






                                <td class="col-md-1">
                                    <label for=""> YOU CAN: </label>
                                </td>

                            </tr>


                            @foreach($table2 as $order)
                            <tr>
                                

                            <td class="col-md-1">
                                    <label for=""> {{ $order->invoice_no }} </label>
                                </td>

                            


                                <td class="col-md-1">
                                    <label for=""> {{ $order->created_at }}</label>
                                </td>

                                <td class="col-md-3">
                                    <label for=""> {{ $order->payment_method }}</label>
                                </td>


                                <td class="col-md-3">
                                    <label for=""> ${{ $order->amount }}</label>
                                </td>



                                <td class="col-md-1">
                                    <a href="{{ url('user/order_details/'.$order->id ) }}" class="btn btn-sm btn-primary"><i class="fa fa-eye"></i> View</a>

                                    <a target="_blank" href="{{ url('user/invoice_download/'.$order->id ) }}" class="btn btn-sm btn-danger" style="margin-top: 5px;"><i class="fa fa-download" style="color: white;"></i> Invoice </a>

                                </td>

                            </tr> 
                         
                            @endforeach





                        </tbody>

                    </table>

                </div>





            </div> <!-- / end col md 8 -->





        </div> <!-- // end row -->

    </div>

</div>


@endsection