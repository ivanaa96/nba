@extends ('layouts.app')
@section ('title', $team->name)
@section ('content')
   <h2>{{ $team->name }}</h2>
   <div class="container">
      The email of the team is: {{ $team->email }}.<br/>
      The address and city of the team is: {{$team->address}}, {{ $team->city}}. <br/>
   </div>
   <hr>
   <h4>Players of the {{ $team->name }}:</h4>
   <ul>
      @forelse ($team->players as $player)
      <li><a href="{{route('player', ['player' => $player])}}">{{ $player->first_name }} {{ $player->last_name }}</a></li>
      @empty
      <span>No players</span>
      @endforelse
   </ul>

   <hr />

   <h5>Comments</h5>
   <ul>
     @forelse($team->comments as $comment)
       <li>{{$comment->content}}</li>
     @empty
       <span>No comments</span>
     @endforelse
   </ul>
   <form action="/teams/{{$team->id}}/comments" method="POST">
     @csrf
     <div class="form-group">
       <label for="content">Add comment:</label>
       <textarea
         class="form-control @error('content') is-invalid @enderror"
         id="content"
         rows="2"
         name="content"
       ></textarea>
       @include('partials.error-message', [ 'field' => 'content' ])
     </div>
     <br/>
     <button type="submit" class="btn btn-primary">Submit</button>
   </form>
@endsection