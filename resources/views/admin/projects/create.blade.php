@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="fw-bold py-3 text-uppercase">Inserisci i dati del tuo progetto</h1>

        <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
            @csrf()

            <div class="mb-3">
                <label class="form-label">Titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                    value="{{ old('title') }}">
                @error('title')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Descrizione</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Carica Immagine</label>
                <input type="file" class="form-control @error('thumb') is-invalid @enderror" name="image" accept="image/*">
                @error('image')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Linguaggi usati</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="languages_used"
                    value="{{ old('languages_used') }}">
                @error('languages_used')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Link GitHub del progetto</label>
                <input type="text" class="form-control @error('price') is-invalid @enderror" name="github_url"
                    value="{{ old('github_url') }}">
                @error('github_url')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Tipologia progetto</label>
                <select class="form-select" name="type_id">
                    @foreach ( $types as $type )
                    <option value="{{ $type->id }}">{{$type->name}}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection