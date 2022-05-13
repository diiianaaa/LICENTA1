@extends('admin.admin_master')
@section('admin')


<!-- Contect Wrapper -->

<div class="container-full">

    <!-- //Content Header (Page Header) -->


    <!-- Main Content -->
    <section class="content">
        <div class="row">

            <div class="col-8">

                <div class="box">

                    <div class="box-header with-border">

                        <h3 class="box-title">Category List</h3>

                    </div>


                    <div class="box-body">
                        <div class="table-responsive">

                            <table id="example1" class="table table-bordered table-striped">


                                <thead>

                                    <tr>

                                        <th>Category English</th>
                                        <th>Category German</th>
                                   
                                        <th>Action</th>



                                    </tr>
                                </thead>
                                
                                <tbody>

                                    @foreach($category as $item)

                                    <tr>

                                        <td>{{ $item->category_name_en }}
                                            <td>{{ $item->category_name_ger }}</td>
                                           
                                        
                                      
                                        <td> <a href="{{ route('category.edit', $item->id) }}" class=" btn btn-info" title="Edit Data">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <a href="{{ route('category.delete', $item->id) }}" class=" btn btn-info" title="Delete Data" id="delete">
                                                <i class="fa fa-trash"></i>
                                            </a></td>

                                        

                                    </tr>
                                    @endforeach

                                </tbody>

                            </table>

                        </div>
                    </div>


                </div>


            </div>


            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Category </h3>
                    </div>
                    <div class="box-body">

                    <div class="table-responsive">

                    </div>
                </div>
            </div>

            <form method="post" action="{{ route('category.store') }}" >
           

            @csrf


            <div class="form-group">
                <h5>Category  English  <span class="text-danger">*</span>  </h5>
                <div class="controls">
                    <input type="text" name="category_name_en" class="form-control">
                    @error('category_name_en')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>



            <div class="form-group">
                <h5>Category  German <span class="text-danger">*</span>  </h5>
                <div class="controls">
                    <input type="text" name="category_name_ger" class="form-control">
                    @error('category_name_ger')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>



            <div class="form-group">
             
            </div>

            <div class="text-xs-right">
                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">

            </div>

            </form>
    </section>






@endsection