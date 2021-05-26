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
                        Edit Product
                        @else
                        Add Product
                        @endif
                        <a class=" btn btn-success float-right" href="{{ route('product.view')}}"> <i class="fa fa-plus-circle"></i> Product list</a>

                    </h4>

                </div><!-- /.card-header -->
                <div class="card-body">
                    <div class="tab-content p-0">
                        <!-- Morris chart - Sales -->
                        <form method="POST" action="{{(@$editData)?route('product.update',$editData->id):route('product.store')}} " id="myForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">

                                <div class="form-group col-md-4">
                                    <label for="">Category <font style="color: red;">*</font></label>
                                    <select required class="form-control  form-control-sm" name="category_id">
                                        <option value="">Select Category</option>
                                        @foreach($categories  as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach

                                    </select>
                                </div>



                                <div class="form-group col-md-4">
                                    <label for="image">Manufacture_id <font style="color: red;">*</font></label>
                                    <input type="text" value="{{@$editData->manufacture_id}}" name="manufacture_id" class="form-control  form-control-sm" id="manufacture_id" required>
                                    <font style="color: red;"> {{ ($errors->has('name'))?$errors->first(('name')):''}}</font>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image">Name <font style="color: red;">*</font></label>
                                    <input type="text" value="{{@$editData->name}}" name="name" class="form-control  form-control-sm" id="name" required>
                                    <font style="color: red;"> {{ ($errors->has('name'))?$errors->first(('name')):''}}</font>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="image">Size <font style="color: red;">*</font></label>
                                    <input type="text" value="{{@$editData->size}}" name="size" class="form-control  form-control-sm" id="size" required>
                                    <font style="color: red;"> {{ ($errors->has('name'))?$errors->first(('name')):''}}</font>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image">Colour <font style="color: red;">*</font></label>
                                    <input type="text" value="{{@$editData->colour}}" name="colour" class="form-control  form-control-sm" id="colour" required>
                                    <font style="color: red;"> {{ ($errors->has('name'))?$errors->first(('name')):''}}</font>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image">Status <font style="color: red;">*</font></label>
                                    <input type="text" value="{{@$editData->status}}" name="status" class="form-control  form-control-sm" id="status" required>
                                    <font style="color: red;"> {{ ($errors->has('name'))?$errors->first(('name')):''}}</font>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="image">Price <font style="color: red;">*</font></label>
                                    <input type="text" value="{{@$editData->price}}" name="price" class="form-control  form-control-sm" id="price" required>
                                    <font style="color: red;"> {{ ($errors->has('name'))?$errors->first(('name')):''}}</font>
                                </div>
                            </div>
                            <div class="form-row">

                                <div class="form-group col-md-8">
                                    <label for="image">Details <font style="color: red;">*</font></label <i class="fas fa-pencil-alt prefix"></i>
                                    <textarea name="details" class="form-control  form-control-sm" id="details" required rows="5">{{@$editData->price}}</textarea>

                                </div>
                                <div class="form-group col-md-2">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image">

                                </div>
                                <div class="form-group col-md-2">
                                    <img id="showImage" src="{{url('upload/no_image.jpg') }}" alt="" style=" border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px; " required>

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