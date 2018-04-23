@extends('newBlogLayouts.master')

@section('content')
    <div class="col-sm-8">
        <h1>Login</h1>

        <form method="POST" action="/login">
            {{csrf_field()}}

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" is="email" name="email" required>
            </div>


            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" is="password" name="password" required>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Log in</button>
            </div>

        </form>
        @include('newBlogLayouts.errors')
    </div>
@endsection