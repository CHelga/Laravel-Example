@extends('newBlogLayouts.master')

@section('content')
    <div class="col-md-8 blog-main">
        <h1>Publish a form</h1>

        <form method="POST" action="/newblog">

            {{--generate a hidden ouput--}}

            {{csrf_field()}}

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title">
            </div>

            <div class="form-group">
                <label for="body">Body</label>
                <textarea id="body" name="body" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Publish</button>
            </div>
        </form>

       @include('newBlogLayouts.errors')
    </div>
@endsection