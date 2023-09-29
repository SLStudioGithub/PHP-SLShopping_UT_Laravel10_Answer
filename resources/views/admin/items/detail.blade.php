@extends('admin.layouts.base')
@section('title', '商品詳細')
@section('content')
<div class="pcoded-content">
  <!-- Page-header start -->
  <div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="page-header-title">
            <h2 class="mt-2">商品詳細</h2>
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
                    <div class="col-sm-3">
                      <label for="id">ID</label>
                      <input type="text" class="form-control" value="{{ $item->id }}" readonly>
                    </div>
                    <div class="col-sm-9">
                      <label for="name">商品名</label>
                      <input type="text" value="{{ $item->name }}" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="description">商品説明</label>
                      <textarea type="text" id="description" class="form-control" readonly
                        rows="5">{{ $item->description }}</textarea>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-12">
                      <label for="price">金額（円）</label>
                      <input type="text" id="price" value="{{ $item->price }}" class="form-control" readonly>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-6">
                      <label for="brand_name">ブランド名</label>
                      <input type="text" id="brand_name" value="{{ $item->brand->name }}" class="form-control" readonly>
                    </div>
                    <div class="col-sm-6">
                      <label for="category">カテゴリー名</label>
                      <input type="text" id="category_name" value="{{ $item->category->name }}" class="form-control"
                        readonly>
                    </div>
                  </div>
                  <div class="btn-toolbar">
                    <div class="ml-2">
                      <a class="btn btn-secondary waves-effect waves-light"
                        href="{{ route('admin.items.index') }}">戻る</a>
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
        'title' => '商品削除',
        'message' => "商品「{$item->name}」を本当に削除しますか？",
        'route' => route('admin.items.delete', ['id' => $item->id])
        ])
        @endcomponent
        @component('admin.components.errorModal', [
        'message' => "{$item->name}は削除できません。"
        ])
        @endcomponent
      </div>
    </div>
    <!-- Main-body end -->
  </div>
</div>
@endsection