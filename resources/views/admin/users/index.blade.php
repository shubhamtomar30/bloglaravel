

@extends('layouts.backend.app')
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">

        </div>
        <br>
        <div class="row">

            <div class="col-md-12">
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
                                        <th>Name</th>
                                        <th>Email</th>

                                        <th>created at</th>
                                        <th>updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $a )


                                    <tr>
                                        <td>{{ $a->id }}</td>
                                        <td>{{ $a->name }}</td>
                                        <td>{{ $a->email }}</td>
                                        <td>{{ $a->created_at }}</td>
                                        <td>{{ $a->updated_at }}</td>


                                        <td>
                                            <button style="border-radius: 20%" class="btn btn-success mb-1" data-toggle="modal" data-target="#view_model-{{ $a->id }}">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button style="border-radius: 20%" class="btn btn-secondary mb-1" data-toggle="modal" data-target="#edit_model-{{ $a->id }}">
                                                <i class="fa fa-pencil"></i>
                                            </button>
                                            <button style="border-radius: 20%" class="btn btn-danger mb-1" data-toggle="modal" data-target="#delete_model-{{ $a->id }}">
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

@foreach ($users as $data)



<!------------------------------------------View Model------------------------------------------------>
<!--View Modal -->
<div class="modal fade" id="view_model-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Name</label>
                      </div>
                      <div class="col-12 col-md-9">
                          <p class="form-control-static">{{$data->name}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">User Id</label></div>
                        <div class="col-12 col-md-9">
                          <p class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Role</label>
                        </div>
                        <div class="col-12 col-md-9">
                          <p class="form-control-static"></p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Email</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="form-control-static">{{$data->email}}</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Created At</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="form-control-static">{{$data->created_at}}</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Updated At</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="form-control-static">{{$data->updated_at}}</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">About</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="form-control-static"></p>
                        </div>
                    </div>
                </div>
            </div> <!-----model body end----->
        </div>
    </div>
</div>
<!---View Model end------>


<!------------------------------------------Edit Model------------------------------------------------>
<!--Edit Modal -->
<div class="modal fade" id="edit_model-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit View</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
            </div>
        <div class="modal-body">
            <form action="{{ url('admin/user/update',$data->id) }}" method="post" id="" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PUT')
                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Name</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input class="form-control" type="text" name="name" value="{{ $data->name }}" >
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Email</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input class="form-control" type="email" name="email" value="{{ $data->email }}" >
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info">Update</button>


            </form>
        </div><!-----model body---->

      </div>
    </div>
</div>
<!---Edit Model end------>

<!------------------------------------------Delete Model------------------------------------------------>
<!--Delete Modal -->
<div class="modal fade" id="delete_model-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span></button>
            </div>
        <div class="modal-body"><!--- model start--->
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">Name</label>
                  </div>
                  <div class="col-12 col-md-9">
                      <p class="form-control-static">{{$data->name}}</p>
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3"><label class=" form-control-label">User Id</label></div>
                    <div class="col-12 col-md-9">
                      <p class="form-control-static"></p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Role</label>
                    </div>
                    <div class="col-12 col-md-9">
                      <p class="form-control-static"></p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Email</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$data->email}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Created At</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$data->created_at}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Updated At</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$data->updated_at}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">About</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static"></p>
                    </div>
                </div>
                <br>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <p>The user will be deleted !!!</p>
                    </div>

                </div>

        </div><!-----model body end------->
        <div class="modal-footer"><!--- footer start--->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

            <form action="{{ url('admin/user/delete',$data->id) }}"method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Confirm</button>
            </form>

        </div><!--- footer end--->

      </div>
    </div>
</div>
<!---Delete Model end------>
@endforeach

@endsection
