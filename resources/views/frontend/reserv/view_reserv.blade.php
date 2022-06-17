<!DOCTYPE html>
<html>

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


            <div class="container">
                <h1> Send Email to  Users </h1>
                <p>
                 Select the user you want to confirm or to reject the table booking.
                </p>

                <button class="btn btn-success send-email">Confirm</button>
                <button class="btn btn-success send-email2">Reject</button>

                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>#</th>

                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>People</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservation as $user)
                        <tr>
                            <td><input type="checkbox" class="user-checkbox" name="users[]" value="{{ $user->id }}"></td>
                            <td> {{ $user->name }} </td>

                            <td> {{ $user->email }} </td>
                            <td> {{ $user->phone }} </td>
                            <td> {{ $user->date }} </td>
                            <td> {{ $user->time }} </td>
                            <td> {{ $user->people }} </td>
                            <td> {{ $user->message }} </td>

                            <td><a href="{{ route('reserv.delete',$user->id) }}" class="btn btn-danger" title="Delete " id="delete">
                                    <i class="fa fa-trash"></i></a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

        </div>
        <!-- /.content-wrapper -->



        <!-- ./wrapper -->


        <!-- Vendor JS -->
        <script src="{{asset('backend/js/vendors.min.js')}}"></script>
        <script src="{{asset('../assets/icons/feather-icons/feather.min.js')}}"></script>



        <!--Tags Input -->

        <script src="{{asset('../assets/vendor_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.js')}}"></script>


        <script src="{{asset('../assets/vendor_components/ckeditor/ckeditor.js')}}"></script>
        <script src="{{asset('../assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js')}}"></script>
        <script src="{{asset('backend/js/pages/editor.js')}}"></script>


        <!-- Admin App -->
        <script src="{{asset('backend/js/template.js')}}"></script>
        <script src="{{asset('backend/js/pages/dashboard.js')}}"></script>






        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".send-email").click(function() {
                var selectRowsCount = $("input[class='user-checkbox']:checked").length;

                if (selectRowsCount > 0) {

                    var ids = $.map($("input[class='user-checkbox']:checked"), function(c) {
                        return c.value;
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('ajax.send.email') }}",
                        data: {
                            ids: ids
                        },
                        success: function(data) {
                            alert(data.success);
                        }
                    });

                } else {
                    alert("Please select at least one user from list.");
                }
                console.log(selectRowsCount);
            });


            $(".send-email2").click(function() {
                var selectRowsCount = $("input[class='user-checkbox']:checked").length;

                if (selectRowsCount > 0) {

                    var ids = $.map($("input[class='user-checkbox']:checked"), function(c) {
                        return c.value;
                    });

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('ajax.send.email1') }}",
                        data: {
                            ids: ids
                        },
                        success: function(data) {
                            alert(data.success);
                        }
                    });

                } else {
                    alert("Please select at least one user from list.");
                }
                console.log(selectRowsCount);
            });


        </script>

</body>

</html>