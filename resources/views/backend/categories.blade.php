@extends('backend.master')

@section('content')
<div class="row">
	<div class="col-xl-8">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4 class="box-title">Categories Table </h4>
                    <button class="btn btn-sm text-white add_category_btn" style="background-color: #28b5b5" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i>Add</button>
                </div>

            </div>
            <div class="card-body--">
                <div class="table-stats order-table ov-h">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th class="serial">id</th>
                                <th class="avatar">Name</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($categories as $category)
                                <tr>
                                    <td class="serial">{{$category->id}}</td>

                                    <td> {{$category->name}} </td>
                                    <td>
                                        <span class="badge badge-complete" style="cursor: pointer"><i class="fa fa-edit"></i></span>
                                        <span class="badge  badge-danger" style="cursor: pointer"><i class="fa fa-trash"></i></span>
                                    </td>

                                </tr>
                           @endforeach


                        </tbody>
                    </table>
                </div> <!-- /.table-stats -->
            </div>
        </div> <!-- /.card -->
    </div>
   @include('backend.addcategory_form');
</div>


@endsection
