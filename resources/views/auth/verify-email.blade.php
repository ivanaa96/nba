@extends('layouts.app')

@section('title', 'Verify your email address')

@section('content')
<h3>Dear {{$recipientName}},
   We have sent you a verification link. </h3>
<p>Check your inbox</p>
@endsection