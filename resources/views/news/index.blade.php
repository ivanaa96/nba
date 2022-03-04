@extends ('layouts.app')
@section ('title', 'News')
@section ('content')
<h2>News</h2>
<ul>
   @foreach ($allNews as $news)
   <li><a href="/news/{{$news->id}}">{{$news->title}}, {{$news->user->name}}</a>
    
   </li>
   @endforeach
</ul>
<div>
   {{$allNews->links()}}
</div>
@endsection