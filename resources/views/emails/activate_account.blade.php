@extends('emails.components.page')
@section('title','activate_account')
@section('main')
<h2>Activate Account</h2>
<h3>welcome {{$name}}</h3>
<p>
    this is your verification code {{$otp}}
</p>
@endsection
