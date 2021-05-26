@extends('backend.layouts.master')
@section('content')
<div class="row">


        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->






            <!-- /.row -->
            <!-- Main row -->
        
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">


                            <h4>
                                View category


                                <a class=" btn btn-success float-right" href="{{ route('category.add')}}"> <i class="fa fa-plus-circle"></i> Add Category</a>


                            </h4>




                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->



                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($allData as $key => $category)
                                        <tr>
                                            <td>{{ $key+1 }}</td>


                                            
                                            <td>{{ $category->name}}</td>
                                           

                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('category.edit',$category->id)}}"> <i class="fa fa-edit"></i>Edit</a>
                                                <a class="btn btn-sm btn-danger" id="delete" href="{{ route('category.delete',$category->id)}}"> <i class="fa fa-trash"></i>Delete</a>
                                            </td>



                                        </tr>

                                        @endforeach


                                    </tbody>

                                </table>













                            </div>
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                </section>
                <!-- /.Left col -->
                <!-- right col (We are only adding the ID to make the widgets sortable)-->

                <!-- right col -->
            </div>
            <!-- /.row (main row) -->
</div>
        
    </section>





@endsection