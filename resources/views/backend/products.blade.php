@extends('backend.master')

@section('content')
<div class="row">
	<div class="col-xl-8">
        <div class="card">
            <div class="card-body">
               <div class="d-flex justify-content-between">
                <h4 class="box-title">Orders </h4>
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#addproductModal"><i class="fa fa-plus"></i>Add</button>
               </div>
            </div>
            <div class="card-body--">
                <div class="table-stats order-table ov-h">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th class="serial">Id</th>
                                <th class="avatar">Name</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Stock</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                          @foreach ($products as $item)
                          <tr>
                            <td class="serial">{{$item->id}}</td>

                            <td> {{$item->name}} </td>
                            <td> {{$item->price}} </td>
                            <td> <img src="{{url($item->image)}}" alt="image"> </td>
                            <td>
                                @if ($item->stock_out === '0')
                                <span class="badge badge-danhger">Stock out</span>
                                @endif
                                <span class="badge badge-info">Stock In</span>
                            </td>
                            <td>
                                <button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                          @endforeach


                        </tbody>
                    </table>
                </div> <!-- /.table-stats -->
                @include('backend.addproduct_modal')
            </div>
        </div> <!-- /.card -->
    </div>
</div>
@endsection
