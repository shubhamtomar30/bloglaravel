@extends('layouts.frontend.app')
@section('content')

<!-- Start top-section Area -->
<section class="top-section-area section-gap">
    <div class="container">
        <div class="row justify-content-between align-items-center d-flex">
            <div class="col-lg-8 top-left">
                <h1 class="text-white mb-20">Post Details</h1>
                <ul>
                    <li>
                        <a href="index.html">Home</a><span class="lnr lnr-arrow-right"></span>
                    </li>
                    <li>
                        <a href="category.html">Category</a><span class="lnr lnr-arrow-right"></span>
                    </li>
                    <li><a href="single.html">Fashion</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- End top-section Area -->

<!-- Start post Area -->
<div class="post-wrapper pt-100">
    <!-- Start post Area -->
    <section class="post-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="single-page-post">
                        <img style="border-radius: 6px" class="img-fluid" src="{{ asset('upload/post/'.$posts->image) }}" alt="" />
                        <div class="top-wrapper">
                            <div class="row d-flex justify-content-between">
                                <h2 class="col-lg-8 col-md-12 text-uppercase">
                                    {{ $posts->title }}
                                </h2>
                                <div class="col-lg-4 col-md-12 right-side d-flex justify-content-end">
                                    <div class="desc">
                                        <h2>Mark wiens</h2>
                                        <h3>{{ $posts->created_at }}</h3>
                                    </div>
                                    <div class="user-img">
                                        <img src="img/user.jpg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tags">
                            <ul>
                                @foreach ($posts->tags as $tag)
                                <li><a href="#">{{ $tag->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="single-post-content">
                            <p style="text-align: justify ; white-space: pre-wrap;">
                                {!! $posts->body !!}
                            </p>

                        </div>
                        <div class="bottom-wrapper">
                            <div class="row">
                                <div class="col-lg-4 single-b-wrap col-md-12">
                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                    lily and 4 people like this
                                </div>
                                <div class="col-lg-4 single-b-wrap col-md-12">
                                    <i class="fa fa-comment-o" aria-hidden="true"></i> 06
                                    comments
                                </div>
                                <div class="col-lg-4 single-b-wrap col-md-12">
                                    <ul class="social-icons">
                                        <li>
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                                        </li>
                                        <li>
                                            <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Start nav Area -->
                        <section class="nav-area pt-50 pb-100">
                            <div class="container">
                                <div class="row justify-content-between">
                                    <div class="col-sm-6 nav-left justify-content-start d-flex">
                                        <div class="thumb">
                                            <img src="img/prev.jpg" alt="" />
                                        </div>
                                        <div class="details">

                                            <h4 class="text-uppercase">

                                            </h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 nav-right justify-content-end d-flex">
                                        <div class="details">

                                            <h4 class="text-uppercase">

                                            </h4>
                                        </div>
                                        <div class="thumb">
                                            <img src="img/next.jpg" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <!-- End nav Area -->

                        <!-- Start comment-sec Area -->





                        <!-- Start comment-sec Area -->
                        <section class="comment-sec-area pt-80 pb-80">
                            <div class="container">
                                <div class="row flex-column">
                                    <h5 class="text-uppercase pb-80">05 Comments</h5>
                                    <br />
                                    @foreach ($posts->comments as $c)
                                    <!-- Frist Comment -->
                                    <div class="comment">
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="{{ asset('upload/user/'.$c->user->image) }}" alt="" / width="50px">
                                                    </div>
                                                    <div class="desc">
                                                        <h5><a href="#">{{ $c->user->name }}</a></h5>
                                                        <p class="date">{{ $c->created_at->format('D, d M Y H:i') }}</p>
                                                        <p class="comment">
                                                            {{ $c->message }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <button class="btn-reply text-uppercase" id="reply-btn" onclick="showReplyForm('{{ $c->id }}','{{ $c->user->name }}')">Reply</button>
                                                </div>
                                            </div>
                                        </div>
                                        @if ($c->replies->count()>0)
                                            @foreach ($c->replies as $reply)
                                                <div class="comment-list left-padding">
                                                    <div class="single-comment justify-content-between d-flex">
                                                        <div class="user justify-content-between d-flex">
                                                            <div class="thumb">
                                                                <img src="{{ asset('upload/user/'.$reply->user->image) }}" alt="" / width="50px">
                                                            </div>
                                                            <div class="desc">
                                                                <h5><a href="#">{{ $reply->user->name }}</a></h5>
                                                                <p class="date">{{ $reply->created_at->format('D, d M Y H:i') }}</p>
                                                                <p class="comment">
                                                                    {{ $reply->message }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="">
                                                            <button class="btn-reply text-uppercase" id="reply-btn" onclick="showReplyForm('{{ $c->id }}','{{ $reply->user->name }}')">Reply</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else

                                        @endif
                                        @if (Auth::check())
                                        <div class="comment-list left-padding" id="reply-form-{{ $c->id }}" style="display: none">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="img/asset/c2.jpg" alt="" />
                                                    </div>
                                                    <div class="desc">
                                                        {{-- <h1 style="font-size: 100px">dfbdrb</h1> --}}
                                                        <h5><a href="#">{{ Auth::user()->name }}</a></h5>
                                                        <p class="date">December 4, 2017 at 3:12 pm</p>
                                                        <div class="row flex-row d-flex">
                                                            <form action="{{ url('comment_reply' , $c->id) }}" method="POST">
                                                                @csrf
                                                                <div class="col-lg-12">
                                                                    <textarea id="reply-form-{{ $c->id }}-text" cols="60" rows="2" class="form-control mb-10" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                                                                </div>
                                                                <button type="submit" class="btn-reply text-uppercase ml-3">Reply</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endif

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>

                        <!-- End comment-sec Area -->




                        <!-- Start commentform Area -->
                        <section class="commentform-area pb-120 pt-80 mb-100">
                            @guest
                            <div class="container">
                                <h4>Please Sign in to post comments - <a href="{{route('login')}}">Sign in</a> or <a href="{{route('register')}}">Register</a></h4>
                            </div>
                            @else
                            <div class="container">
                                <h5 class="text-uppercas pb-50">Leave a Reply</h5>
                                <div class="row flex-row d-flex">
                                    <div class="col-lg-12">
                                        <form action="{{ url('comment',$posts->id) }}" method="post">
                                            @csrf
                                            <textarea class="form-control mb-10" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>

                                            <button class="primary-btn mt-20" type="submit">Comment</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                            @endguest
                        </section>
                        <!-- End commentform Area -->
                    </div>
                </div>
                @include('layouts.frontend.partition.sidebar')
            </div>
        </div>
    </section>
    <!-- End post Area -->
</div>
<!-- End post Area -->


@endsection
