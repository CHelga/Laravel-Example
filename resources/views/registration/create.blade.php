@extends('newBlogLayouts.master')

#@section('content')
    <div class="col-sm-8">
        <h1>Resgiter</h1>

        <form method="POST" action="/register">
            {{csrf_field()}}


            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" is="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" is="password" name="password" required>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Password Confirmation</label>
                <input type="password" class="form-control" is="password_confirmation" name="password_confirmation" required>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>

        </form>
        @include('newBlogLayouts.errors')
    </div>
@endsection