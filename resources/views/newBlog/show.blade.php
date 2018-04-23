@extends('newBlogLayouts.master')

@section('content')
    <div class="col-sm-8 blog-main">
        <h1>{{$post->title}}</h1>
        <p>
            {{$post->body}}
        </p>

        <hr>

        <div class="comments">
            <ul class="list-group">
                @foreach($post->comments as $comment)
                    <li class="list-group-item">
                        <strong>
                            {{$comment->updated_at}}
                        </strong>
                        <article>
                            {{$comment->body}}
                        </article>
                    </li>
                @endforeach
            </ul>
        </div>
        <br>
        <div class="card">
            <div class="card-block">
                 <form method="POST" action="/newblog/{{$post->id}}/comments">

                    {{--generate a hidden ouput--}}

                    {{csrf_field()}}

                    <div class="form-group">
                        <textarea name="body" placeholder="Your comment here." class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </div>
                </form>
                @include('newBlogLayouts.errors')
            </div>
        </div>

    </div>
@endsection
