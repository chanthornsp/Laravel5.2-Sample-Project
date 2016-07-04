
    <div class="list-group">
        <a href="#" class="list-group-item active">Last Update</a>
        @foreach ($lastUpdate as $article)
        	<a href="{{ route('article.show',$article->id) }}" class="list-group-item">{{ $article->title }}</a>  
        @endforeach
              
    </div>
