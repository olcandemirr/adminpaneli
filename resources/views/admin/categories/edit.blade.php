@extends('admin.layouts.master')

@section('title', 'Kategori Düzenle')

@section('content')
<h2>✏️ Kategori Düzenle</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

     <div class="mb-3">
        <label for="name" class="form-label">Kategori Adı</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name',$category->name) }}">
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">SEO url</label>
        <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug',$category->slug) }}">
    </div>
    <div class="mb-3">
        <label for="meta_title" class="form-label">Meta Title</label>
        <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ old('meta_title',$category->meta_title) }}">
    </div>
    <div class="mb-3">
        <label for="meta_description" class="form-label">Meta Description</label>
        <input type="text" name="meta_description" id="meta_description" class="form-control" value="{{ old('meta_description',$category->description) }}">
    </div>
    <div class="mb-3">
        <label for="icon" class="form-label">İkon resmi yükleme</label>
        <input type="file" name="icon" id="icon" class="form-control">
        @if($category->icon)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $category->icon) }}" width="100" class="border rounded">
                </div>
            @endif

    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Açıklama</label>
        <textarea name="description" id="description" class="form-control"> {!! old('description',$category->description) !!}</textarea>
    </div>
    

    <button type="submit" class="btn btn-success">Güncelle</button>
</form>
@endsection
