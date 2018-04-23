<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="/newblog/{{$post->id}}">
            {{$post->title}}
        </a>
    </h2>
    {{$post->user['name']}} on {{$post->created_at->toFormattedDateString()}}
    <p class="blog-post-meta"> {{$post->body}} </p>
</div><!-- /.blog-post -->