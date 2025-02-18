@extends('admin.layouts.master')

@section('title', 'Ayarlar')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Site Ayarları</h2>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<form action="{{ route('settings.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="site_title" class="form-label">Site Başlığı</label>
        <input type="text" name="site_title" id="site_title" 
               class="form-control"
               value="{{ old('site_title', $settingsArray['site_title'] ?? '') }}">
    </div>

    <div class="mb-3">
        <label for="site_description" class="form-label">Site Açıklaması</label>
        <textarea name="site_description" id="site_description" 
                  class="form-control">{{ old('site_description', $settingsArray['site_description'] ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="admin_email" class="form-label">Admin E-postası</label>
        <input type="email" name="admin_email" id="admin_email" 
               class="form-control"
               value="{{ old('admin_email', $settingsArray['admin_email'] ?? '') }}">
    </div>

   
    <button type="submit" class="btn btn-primary">Kaydet</button>
</form>
@endsection
