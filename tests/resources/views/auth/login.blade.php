@extends('layouts.master')

@section('content')
    
    <form method="post" action="/login">

        {{ csrf_field() }}

        <p>
            <label>
                Email:<br />
                <input type="text" name="email" value="{{ old('email') }}">
            </label>
        </p>

        <p>
            <label>
                Password <br />
                <input type="password" name="password">
            </label>
        </p>

        <p>
            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember me
            </label>
        </p>

        <p>
            <input type="submit" value="Login" class="btn">
        </p>
    </form>

@endsection