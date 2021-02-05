@extends('layouts.main')

@section('title', 'Crea nuovo post')

@section('content')
<div class="container">
    <h3 class="mt-4 mb-4">Crea nuovo post</h3>
    <form action="{{ route('posts.store') }}" method="post">
        @csrf
        @method('post')
        <div class="mb-3">
            <label class="form-label">Titolo</label>
            <input type="text" class="form-control form-control-sm" name="title">
        </div>
        <div class="mb-3">
            <label class="form-label">Autore</label>
            <input type="text" class="form-control form-control-sm" name="author">
        </div>
        <div class="mb-3">
            <label class="form-label">Categoria</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="category_id">
                <option selected>.....</option>
                @foreach ($categories as $category)
                <option value={{ $category->id }}>{{ $category->title }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Descrizione</label>
            <textarea class="form-control" type="text" name="description"></textarea>
        </div>
        <p class="form-label">Seleziona i #tag</p>
        @foreach ($tags as $tag)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}">
            <label class="form-check-label">{{ $tag->name }}</label>
        </div>
        @endforeach
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Crea</button>
        </div>
    </form>
</div>

@endsection
