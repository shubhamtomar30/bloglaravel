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
<div id="right-panel" class="right-panel">


    <div class="content mt-3">
        <div class="animated fadeIn">
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

                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                           <a href="{{url('admin/post/edit', $post->id)}}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                           <button type="button" class="btn btn-danger float-right" data-toggle="modal"
                            data-target="#deleteModal-{{$post->id}}">
                            <i class="fa fa-trash-o"></i>
                        </button>
                        </div>
                        <div class="card-body">
                            <div class="col-md-12  p-0">
                                <img src="{{asset('upload/post/'.$post->image)}}" alt="$post->image" class="image" max-width="400px" height="400px">
                            </div>
                            <h1>{{$post->title}}</h1>
                            <h5>{{$post->category->name}}</h5>
                            <p>Created At : {{$post->created_at}}</p>
                            <h5>Tags</h5>
                            <div class="my-2">
                                @if ($post->tags)
                                @foreach ($post->tags as $tag)
                                    <a href="#" class="btn btn-outline-primary btn-flat btn-sm">{{$tag->name}}</a>
                                @endforeach

                                @endif
                            </div>
                            <hr>
                            <div>{!!$post->body!!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- .animated -->
        <div class="animated">

        <div class="modal fade" id="deleteModal-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel"
            data-backdrop="static" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Delete Post</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>
                            The Post will be deleted !!
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger" onclick="event.preventDefault();
                        document.getElementById('deletepost-{{$post->id}}').submit();">Confirm</button>
                <form action="" style="display: none" id="deletepost-{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                </form>
                    </div>
                </div>
            </div>
        </div>


            <!-- .content -->
        </div>


@endsection
