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
@endsection