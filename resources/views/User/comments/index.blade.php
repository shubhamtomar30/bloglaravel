@extends('layouts.backend.app')
@section('content')



<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-outline-warning me-md-2 btn-lg" data-toggle="modal" data-target="#exampleModal">ADD CATEGARY</button>
        </div>
        <br>
        <div class="row">

            <div class="col-md-12">
                @if ($errors->any())

                        @foreach ($errors->all() as $error)
                        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                            <span class="badge badge-pill badge-danger">Erorr</span> {{$error}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>

                    </div>
                        @endforeach

                        @endif
                <div class="card">

                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>post Id</th>

                                        <th>user Id</th>
                                        <th>Comment</th>
                                        <th>created at</th>
                                        <th>updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comments as $a )


                                    <tr>
                                        <td>{{ $a->id }}</td>
                                        <td>{{ $a->post_id }}</td>

                                        <td>{{ $a->user_id }}</td>
                                        <td>{{ $a->message }}</td>
                                        <td>{{ $a->created_at }}</td>
                                        <td>{{ $a->updated_at }}</td>


                                        <td>
                                            <button style="border-radius: 100%" class="btn btn-success mb-1" data-toggle="modal" data-target="#view_model-{{ $a->id }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button style="border-radius: 100%" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#edit_model-{{ $a->id }}">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button style="border-radius: 100%" class="btn btn-danger mb-1" data-toggle="modal" data-target="#delete_model-{{ $a->id }}">
                                                <i class="fa fa-trash-o"></i>
                                            </button>
                                        </td>
                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


@endsection
