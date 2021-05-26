@extends('backend.layouts.master')
@section('content')

<div class="container-fluid">
            <!-- Small boxes (Stat box) -->






            <!-- /.row -->
            <!-- Main row -->
            <div class="row">
                <!-- Left col -->
                <section class="col-lg-12 connectedSortable">
                    <!-- Custom tabs (Charts with tabs)-->
                    <div class="card">
                        <div class="card-header">


                            <h4>
                                @if(isset($editData))
                                Edit Category
                                @else
                                Add Category
                                @endif
                                <a class=" btn btn-success float-right" href="{{ route('category.view')}}"> <i class="fa fa-plus-circle"></i> Category list</a>

                            </h4>

                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->
                                <form method="POST" action="{{(@$editData)?route('category.update',$editData->id):route('category.store')}} " id="myForm" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="image">Category Name</label>
                                            <input type="text" value="{{@$editData->name}}" name="name" class="form-control" id="name" required>
                                            <font style="color: red;"> {{ ($errors->has('name'))?$errors->first(('name')):''}}</font>
                                        </div>


                                        <div class="form-group col-md-6 " style="padding-top: 60px;">

                                            <button type="submit" value="Submit" class="btn btn-primary">
                                            {{(@$editData)?'Update':'Submit'}} </button>
                                        </div>


                                    </div>

                                </form>
















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
        </div><!-- /.container-fluid -->





@endsection