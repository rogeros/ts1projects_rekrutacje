<div>
    <h1>{{ $article->title }}</h1>
    <h3>{{ $article->publication_date }}</h3>
    <h4>{{ $article->user->name }}</h4>

    {{ $article->body }}
</div>
