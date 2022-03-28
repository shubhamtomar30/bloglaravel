
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
                                        <th>Name</th>

                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>created at</th>
                                        <th>updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($category as $a )


                                    <tr>
                                        <td>{{ $a->id }}</td>
                                        <td>{{ $a->name }}</td>

                                        <td>{{ $a->description }}</td>
                                        <td><img src="{{ url('/upload/categary/'.$a->image) }}" style="height: 100px; width: 100px; border-radius: 100%;"></td>
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

@foreach ($category as $data)



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
                        <div class="col col-md-3"><label class=" form-control-label">Slug</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="form-control-static">{{$data->slug}}</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label class=" form-control-label">Description</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="form-control-static">{{$data->description}}</p>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <img src="{{ url('/upload/categary/'.$a->image) }}" style="height: 150px; width: 150px; border-radius: 100%;">
                            <label class=" form-control-label">Image</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <p class="form-control-static">{{$data->image}}</p>
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
            <form action="{{ url('admin/categary/update',$data->id) }}" method="post" id="" enctype="multipart/form-data" class="form-horizontal">
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
                                <div class="col col-md-3"><label class=" form-control-label">Slug</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input class="form-control" type="text" name="slug" value="{{ $data->slug }}" >
                                </div>
                            </div>

                            <div class="row form-group">
                                <div class="col col-md-3"><label class=" form-control-label">Description</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input class="form-control" type="text" name="description" value="{{ $data->description }}" >
                                </div>
                            </div>

                            <div class="row form-group">

                                <div class="col col-md-3"><label class=" form-control-label">Image</label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input class="form-control" type="file" name="image" value="{{ $data->image }}" >
                                </div>
                                <img src="{{ url('/upload/categary/'.$a->image) }}" style="height: 150px; width: 150px; border-radius: 100%;">
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
                    <div class="col col-md-3"><label class=" form-control-label">Slug</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$data->slug}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Description</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$data->description}}</p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label">Image</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static">{{$data->image}}</p>
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
                <br>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <p>The user will be deleted !!!</p>
                    </div>

                </div>

        </div><!-----model body end------->
        <div class="modal-footer"><!--- footer start--->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

            <form action="{{ url('admin/categary/delete',$data->id) }}"method="POST">
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





<!-- ADD Categary Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <form method="post" action="{{ url('admin/categary/register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label for="full-name">Name</label>
                                <input name="name" class="form-control" type="text">
                            </div>
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label for="email">Slug</label>
                                <input type="text" class="mat-input form-control" name="slug" value="">
                            </div>
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label>Description</label>
                                <input type="text" class="mat-input form-control" name="description" value="">
                            </div>
                            <div class="form-group pmd-textfield pmd-textfield-floating-label">
                                <label class="control-label">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
      </div>
    </div>
  </div>
@endsection
