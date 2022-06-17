
<head>
    <meta charset="utf-8">

    <title>Laravel Send Email to Multiple Users - ItSolutionStuff.com</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Vendors Style-->
    <link rel="stylesheet" href="{{asset('backend/css/vendors_css.css')}}">

    <!-- Style-->
    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('backend/css/skin_color.css')}}">

</head>

<body class="hold-transition dark-skin sidebar-mini theme-primary fixed">

    <div class="wrapper">

        @include('admin.body.header');

        <!-- Left side column. contains the logo and sidebar -->

        @include('admin.body.sidebar');

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

<div class="container-full">

    <!-- //Content Header (Page Header) -->


    <!-- Main Content -->
    <section class="content">
        <div class="row">

            <div class="col-12">

                <div class="box">

                    <div class="box-header with-border">

                        <h3 class="box-title">Checkout List</h3>

                    </div>




                    <div class="box-body">
                        <div class="table-responsive">

                            <table id="example1" class="table table-bordered table-striped">


                                <thead>

                                    <tr>
                                        <th>Select</th>

                                        <th>Order Id</th>
                                        <th>User Name</th>
                                        <th>User Email</th>
                                        <th>User Phone</th>
                                        <th>Division</th>
                                        <th>District</th>
                                        <th>State Name</th>
                                        <th>Another Details</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>




                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($table as $item)

                                    <tr>




                                    <td><input type="checkbox" class="user-checkbox" ></td>
                                        <td>{{ $item->id }}

                                        <td>{{ $loop = $item->name }}
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->telephone }}</td>
                                        <td>{{ $item->division_id }}</td>
                                        <td>{{ $item->district_id }}</td>
                                        <td>{{ $item->state_name }}</td>
                                        <td>{{ $item->notes }}</td>

                                        @if( $item->id == $item->id) @break;




                                    </tr>
                                    @endif
                                    @endforeach


                                    @foreach($table as $item)




                                    <td>{{ $item->product_name_en }}</td>
                                    <td>{{ $item->quantity }}</td>





                                    @endforeach
                                </tbody>

                            </table>

                        </div>

                    </div>


                </div>


            </div>


    </section>

</div>


</body>

</html>


