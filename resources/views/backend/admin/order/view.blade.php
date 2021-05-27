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
                                View Orders


                                <a class=" btn btn-success float-right" href=""> <i class="fa fa-plus-circle"></i> Add Product</a>


                            </h4>




                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content p-0">
                                <!-- Morris chart - Sales -->



                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Customer Name</th>
                                            <th>Address</th>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total Price</th>
                                            <th>Status</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($allData as $key => $order)
                                        <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $order['customer_class'] ['name']}}</td>
                                        <td>{{ $order['shipping_class'] ['address']}}</td>
                                        <td>{{ $order['product_class'] ['name']}}</td>
                                        <td>{{ $order->product_seles_quantity}}</td>
                                        <td>{{ $order->product_price}}</td>
                                        <td>{{($order->product_seles_quantity)*($order->product_price)}}</td>
                                        <td>
                                            
                                        </td>
                                        <td>image</td>
                                        <td>action</td>
                                        
                                    
                                      

                                       
                                    


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