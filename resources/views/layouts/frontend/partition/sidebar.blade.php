<div class="col-lg-4 sidebar-area">
    <div class="single_widget search_widget">
      <div id="imaginary_container">
        <form action="{{route('search')}}" method="GET">
        <div class="input-group stylish-input-group">

                <div class="input-group stylish-input-group">
                    <input type="text" class="form-control" placeholder="Search" name="search" />
                    <span class="input-group-addon">
                        <button type="submit">
                            <span class="lnr lnr-magnifier"></span>
                        </button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    </div>


    <div class="single_widget cat_widget">
      <h4 class="text-uppercase pb-20">post categories</h4>
      <ul>
          @foreach ($cat as $c)
          <a href="{{ url('/category/'.$c->slug) }}">
          <li>
            <a href="{{ url('/category/'.$c->slug) }}">{{ $c->name }} <span>{{ $c->posts->count() }}</span></a>
          </li>
        </a>
          @endforeach

      </ul>
    </div>

    <div class="single_widget recent_widget">
      <h4 class="text-uppercase pb-20">Recent Posts</h4>
      <div class="active-recent-carusel">
          @foreach ($latest_post as $l)
          <div class="item">
            <a href="{{ url('post/'.$l->slug) }}">
            <img style="border-radius: 8px" src="{{ asset('upload/post/'.$l->image) }}" alt="" />
            <p class="mt-20 title text-uppercase">
             {{$l->title}}
            </p>
            </a>
            <p>
              {{ $l->created_at }}
              <span>
                <i class="fa fa-heart-o" aria-hidden="true"></i> 06
                <i class="fa fa-comment-o" aria-hidden="true"></i
                >02</span
              >
            </p>
          </div>
          @endforeach


      </div>
    </div>


    <div class="single_widget tag_widget">
      <h4 class="text-uppercase pb-20">Tag Clouds</h4>
      <ul>
          @foreach ($recent_tag->unique('name')->take(10) as $t)
          <li><a href="{{ url('tag' , $t->name) }}">{{ $t->name }}</a></li>
          @endforeach


      </ul>
    </div>
  </div>
