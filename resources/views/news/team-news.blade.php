@extends('layouts.app')

@section('title', 'Nba News - ' . $team->name)

@section('content')
<h2>News about {{$team->name}}</h2>
@foreach ($news as $newsArticle)
<div>
   <a href="{{route('news.show',['id'=>$newsArticle->id])}}">{{$newsArticle->title}}, {{$newsArticle->user->name}}</a>
</div>
@endforeach
{{$news->links()}}
@endsection 