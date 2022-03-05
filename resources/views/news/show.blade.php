@extends ('layouts.app')
@section ('title', 'NBA news - ' . $news->title)
@section ('content')
<h2>{{ $news->title }}</h2>
<h5>Author: <a href="/profiles/{id}">{{ $news->user->name }}</a></h5>
<hr>
<p>{{ $news->content }}</p>
<hr/>
<h3>Teams:</h3>
<ul>
   @foreach ($news->teams as $team)
   <li><a href="{{route('newsForTeam', ['teamName' => $team->name])}}">
   {{ $team->name }}
   </a></li>
   @endforeach
</ul>
@endsection