@extends('admin.layouts.master')

@section('title', 'Yeni Kategori Ekle')

@section('content')
<h2>➕ Yeni Kategori Ekle</h2>

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
    </div>
@endif
<!--form bilgileri alanı -->
<form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Kategori Adı</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('title') }}">
    </div>
    <div class="mb-3">
        <label for="slug" class="form-label">SEO url</label>
        <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}">
    </div>
    <div class="mb-3">
        <label for="meta_title" class="form-label">Meta Title</label>
        <input type="text" name="meta_title" id="meta_title" class="form-control" value="{{ old('meta_title') }}">
    </div>
    <div class="mb-3">
        <label for="meta_description" class="form-label">Meta Description</label>
        <input type="text" name="meta_description" id="meta_description" class="form-control" value="{{ old('meta_description') }}">
    </div>
    <div class="mb-3">
        <label for="icon" class="form-label">İkon resmi yükleme</label>
        <input type="file" name="icon" id="icon" class="form-control">

    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Açıklama</label>
        <textarea name="description" id="description" class="form-control"> {!! old('description') !!}</textarea>
    </div>
    
    
    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>
@endsection
