@extends('emails.components.page')
@section('title','Reset Passwords')
@section('main')
<h2>Rest Password</h2>
<p>
    your reset password token is {{$token}}
</p>
@endsection
