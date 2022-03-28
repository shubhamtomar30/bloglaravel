@extends('layouts.backend.app')
@section('content')
<div class="content">
    <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Post</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li>
                                <a href="#" class="active">Post Table</a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a type="button" href="{{ url('post/add_post') }}" class="btn btn-outline-warning me-md-2 btn-lg" >ADD POST</a>
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
                                        <th>Title</th>

                                        <th>Slug</th>
                                        <th>Views and Likes</th>
                                        <th>created at</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post as $a )


                                    <tr>
                                        <td>{{ $a->id }}</td>
                                        <td>{{ $a->title }}</td>

                                        <td>{{ $a->slug }}</td>
                                        <td><button class="btn btn-primary mb-1" >
                                            <i class="fa fa-user-circle fa-1x"></i>
                                        </button>
                                        <button class="btn btn-info mb-1" >
                                            <i class="fa fa-thumbs-up"></i>
                                        </button>
                                    </td>
                                        <td>{{ $a->created_at }}</td>



                                        <td>
                                            <a style="border-radius: 100%" href="{{ url('admin/post/post_view/'.$a->id) }}" class="btn btn-success mb-1" >
                                                <i class="fa fa-eye"></i>
                                            </a>
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

@foreach ($post as $data)




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
            <form method="post" action="{{ url('admin/post/update/'.$data->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Title</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="title" value="{{ $data->title }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="categary" id="">
                      @foreach ($cat as $c)
                      <option {{ $c->id ==  $data->category_id ? 'selected' : ''}} value="{{ $c->id }}">{{ $c->name }}</option>
                      @endforeach
                    </select>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Tags</label>
                    <div class="col-sm-10">

                      {{-- <input type="text" class="form-control" name="tag" placeholder="Tag (separated by ,)" value="
                      @foreach ($data->tags as $key=>$tag)
                            {{ $key+1 < count($data->tags) ? $tag->name. ',' : $tag->name }}
                      @endforeach"> --}}
                      <input type="text" id="tag" name="tags" placeholder="Tag (separated by ,)" class="form-control" value="@foreach($data->tags as $key=>$tag) {{$key+1 < count($data->tags) ? $tag->name. ',' : $tag->name}} @endforeach">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-10 ">
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="checkbox" value="published" id="flexCheckDefault" name="status"
                            {{ $data->status == '1' ? 'checked' : ''}}  >
                            <label class="form-check-label" for="flexCheckDefault">
                              Published
                            </label>
                          </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="image">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Body</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" name="body" id="" >{{ $data->body }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
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
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="title" value="{{ $data->title }}">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                <select class="form-control" name="categary" id="">
                  @foreach ($cat as $c)
                  <option value="{{ $c->id }}">{{ $c->name }}</option>
                  @endforeach
                </select>
                </div>
            </div>

            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Tags</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="tag">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Status</label>
                <div class="col-sm-10 ">
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" value="published" id="flexCheckDefault" name="status"
                        {{ $a->status == '1' ? 'checked' : ''}}  >
                        <label class="form-check-label" for="flexCheckDefault">
                          Published
                        </label>
                      </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                  <input type="file" class="form-control" name="image">
                </div>
            </div>
            <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label">Body</label>
                <div class="col-sm-10">
                  <textarea class="form-control" name="body" id="" >{{ $data->body }}</textarea>
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




@endsection
