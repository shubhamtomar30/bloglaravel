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
<div class="content mt-3 ">
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
            <strong class="card-title">ADD POSTS</strong>
        </div>
        <div class="card-body">
            <div class="content mt-3">
                <div class="row">
                    <div class="col-md-6">
                        <form method="post" action="{{ url('admin/post/store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                  <input type="text" class="form-control" name="title">
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
                                  <input type="text" class="form-control" name="tags">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10 ">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" value="published" id="flexCheckDefault" name="status">
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
                                  <textarea class="form-control" name="body" id="" ></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
