@extends ('layouts.app')
@section ('title', 'Teams')
@section ('content')
<h1>Teams</h1>
<ul>
   @foreach ($teams as $team)
      <li><a href="{{route('team', ['team' => $team->id])}}">{{$team->name}}</a></li>
   @endforeach
</ul>
@endsection