@extends('admin.layouts.base')
@section('title', 'ブランド詳細')
@section('content')
<div class="pcoded-content">
  <!-- Page-header start -->
  <div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="page-header-title">
            <h2 class="mt-2">ブランド詳細</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Page-header end -->
  <div class="pcoded-inner-content">
    <!-- Main-body start -->
    <div class="main-body">
      <div class="page-wrapper">
        <!-- Page body start -->
        <div class="page-body">
          <div class="row">
            <div class="col-sm-12">
              <!-- Basic Form Inputs card start -->
              <div class="card">
                <div class="card-header">
                  <h4>詳細</h4>
                </div>
                <div class="card-block">
                  <div class="form-group row">
                    <div class="col-sm-1">
                      <label for="id">ID</label>
                      <input type="text" class="form-control" value="{{ $brand->id }}" readonly>
                    </div>
                    <div class="col-sm-11">
                      <label for="name">ブランド名</label>
                      <input type="text" value="{{ $brand->name }}" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="btn-toolbar">
                    <div class="ml-2">
                      <a class="btn btn-secondary waves-effect waves-light"
                        href="{{ route('admin.brands.index') }}">戻る</a>
                    </div>
                    <div class="ml-auto mr-2">
                      <button class="btn btn-danger waves-effect waves-light" id="delete-button">削除</button>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Basic Form Inputs card end -->
            </div>
          </div>
        </div>
        <!-- Page body end -->
        @component('admin.components.successModal')@endcomponent
        @component('admin.components.deleteModal', [
        'title' => 'ブランド削除',
        'message' => "ブランド「{$brand->name}」を本当に削除しますか？",
        'route' => route('admin.brands.delete', ['id' => $brand->id])
        ])
        @endcomponent
        @component('admin.components.errorModal', [
        'message' => "{$brand->name}は削除できません。"
        ])
        @endcomponent
      </div>
    </div>
    <!-- Main-body end -->
  </div>
</div>
@endsection