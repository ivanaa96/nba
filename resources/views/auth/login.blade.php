@extends ('layouts.app')

@section('title', 'Login page')

@section('content')

<form method="POST" action="/login">
   @csrf

   <div class="form-group">
      <label for="email">Email:</label>
      <input 
      type="email" 
      name="email" 
      id="email"
      placeholder="Enter your email" 
      value="{{old('email')}}" 
      class="form-control @error('email') is-invalid @enderror" 
      required />
      @error('email')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
   </div>

   <div class="form-group">
      <label for="password">Password:</label>
      <input 
      type="password" 
      name="password" 
      id="password"
      placeholder="Enter your password" 
      value="{{old('password')}}" 
      class="form-control @error('password') is-invalid @enderror" 
      required />
      @error('password')
      <div class="alert alert-danger">{{$message}}</div>
      @enderror
   </div>

   @if (isset($invalidCredentials) && $invalidCredentials==true)
   <div class="alert alert-danger">
         Invalid credentials
   </div>
   @endif
   <button type="submit" class="btn btn-primary">Login</button>
</form>

@endsection 