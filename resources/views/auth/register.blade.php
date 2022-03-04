@extends('layouts.app')

@section('title', 'Register page')

@section('content')

<form method="POST" action="/register">
   @csrf
   
   <div class="form-group">
      <label for="name">Name:</label><br/>
      <input
         name="name" 
         id="name" 
         type="text" 
         placeholder="Enter your name" 
         value="{{ old('name') }}" 
         class="form-control @error('name') alert-danger @enderror" 
         required />
         <br />
      @error('name')
      <div class="alert alert-danger">
         {{$message}}
      </div>
      @enderror
   </div>

   <div class="form-group">
      <label for="email">Email:</label><br/>
      <input 
      name="email" 
      type="email" 
      id="email" 
      placeholder="Enter your email" 
      value="{{ old('email') }}" 
      class="form-control @error('email') alert-danger @enderror" 
      required/>
      <br />
      @error('email')
      <div class="alert alert-danger">
         {{$message}}
      </div>
       @enderror
   </div>

   <div class="form-group">
      <label for="password">Password:</label><br/>
      <input 
      name="password" 
      type="password" 
      placeholder="Enter your password" 
      value="{{ old('password') }}" 
      class="form-control @error('password') alert-danger @enderror" 
      required/>
      <br />
      @error('password')
      <div class="alert alert-danger">
         {{$message}}
      </div>
      @enderror
   </div>

   <div class="form-group">
      <label for="password_confirmation">Password confirmation:</label><br/>
      <input 
      name="password_confirmation" 
      type="password" 
      placeholder="Confirm your password" 
      value="{{ old('password_confirmation') }}" 
      class="form-control @error('password_confirmation') alert-danger @enderror" 
      required/>
      <br />
      @error('password_confirmation')
      <div class="alert alert-danger">
         {{$message}}
      </div>
      @enderror
   </div>

   <div class="form-check">
      <input type="checkbox" 
      class="form-check-input" 
      id="terms_of_sevice" 
      name="terms_of_sevice" 
      value="1">
      <label for="terms_of_sevice">I agree to terms and conditions</label>
      @error('terms_of_sevice')
        <div class="alert alert-danger">{{$message}}</div>
      @enderror
    </div>
   <br/>
      <button type="submit" class="btn btn-primary">Register</button>
</form>
@endsection 