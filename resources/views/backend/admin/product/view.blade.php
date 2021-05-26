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
                                View Product


                                <a class=" btn btn-success float-right" href="{{ route('product.add')}}"> <i class="fa fa-plus-circle"></i> Add Product</a>


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
                                            <th>Manufacture_id</th>
                                            <th> Product Name</th>
                                            <th>Details</th>
                                            <th>Size</th>
                                            <th>Colour</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($allData as $key => $product)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $product['category_class'] ['name']}}</td>
                                            <td>{{ $product->manufacture_id}}</td>
                                            <td>{{ $product->name}}</td>
                                            <td>{{ $product->details}}</td>
                                            <td>{{ $product->size}}</td>
                                            <td>{{ $product->colour}}</td>
                                            <td>{{ $product->status}}</td>
                                            <td>{{ $product->price}}</td>
                                            <td><img src="{{(!empty($product->image))? url('upload/product_images/'.$product->image):url('upload/no_image.jpg') }}" style= padding: 5px;background: #EFEE03;float: left;margin-right: 10px; width="50" height="60" "></td>
                                           

                                            <td>
                                                <a class="btn btn-sm btn-primary" href="{{ route('product.edit',$product->id)}}"> <i class="fa fa-edit"></i>Edit</a>
                                                <a class="btn btn-sm btn-danger" id="delete" href="{{ route('product.delete',$product->id)}}"> <i class="fa fa-trash"></i>Delete</a>
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