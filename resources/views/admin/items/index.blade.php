@extends('admin.layouts.base')
@section('title', '登録商品一覧')
@section('content')
<div class="pcoded-content">
  <!-- Page-header start -->
  <div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="page-header-title">
            <h2 class="mt-2">商品一覧</h2>
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
        <!-- Page-body start -->
        <div class="page-body">
          @component('admin.components.flashMessage')@endcomponent
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>検索条件</h4>
                </div>
                <div class="card-block">
                  <form id="search-form" action="{{ route('admin.items.index') }}" method="get">
                    <div class="form-group search-form-box">
                      <label for="id">ID</label>
                      <input type="number" class="form-control" id="id" name="id"
                        value="{{ isset($_GET['id']) ? $_GET['id'] : '' }}" placeholder="商品ID">
                      <div id="id-error" class="error-box"></div>
                    </div>
                    <div class="form-group search-form-box">
                      <label for="name">商品名</label>
                      <input type="text" class="form-control" id="name" name="name"
                        value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}" placeholder="商品名">
                    </div>
                    <div class="form-group search-form-box">
                      <label for="low-price">下限金額</label>
                      <input type="number" class="form-control" id="low-price" name="lowPrice"
                        value="{{ isset($_GET['lowPrice']) ? $_GET['lowPrice'] : '' }}" placeholder="0">
                      <div id="low-price-error" class="error-box"></div>
                    </div>
                    <div class="form-group search-form-box">
                      <label for="high-price">上限金額</label>
                      <input type="number" class="form-control" id="high-price" name="highPrice"
                        value="{{ isset($_GET['highPrice']) ? $_GET['highPrice'] : '' }}" placeholder="0">
                      <div id="high-price-error" class="error-box"></div>
                    </div>
                    <div class="form-group search-form-box">
                      <label for="brand-id">ブランド</label>
                      <select class="form-control" id="brand-id" name="brandId">
                        <option value="">ブランド名</option>
                        @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}" {{ isset($_GET['brandId']) && (int) $_GET['brandId']===$brand->
                          id ? 'selected' : '' }}
                          >{{ $brand->name }}</option>
                        @endforeach
                      </select>
                      <div id="brand-id-error" class="error-box"></div>
                    </div>
                    <div class="form-group search-form-box">
                      <label for="brand-id">ブランド</label>
                      <select class="form-control" id="category-id" name="categoryId">
                        <option value="">カテゴリー名</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ isset($_GET['categoryId']) && (int)
                          $_GET['categoryId']===$category->id ? 'selected' : '' }}
                          >{{ $category->name }}</option>
                        @endforeach
                      </select>
                      <div id="category-id-error" class="error-box"></div>
                    </div>
                    <div class="form-group row">
                      <div class="m-2">
                        <button class="btn btn-primary waves-effect waves-light">検索</button>
                      </div>
                      <div class="m-2">
                        <a class="btn btn-secondary waves-effect waves-light"
                          href="{{ route('admin.items.index') }}">リセット</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- Hover table card start -->
              <div class="card">
                <div class="card-header">
                  <h5>検索結果一覧</h5>
                </div>
                <div class="card-block table-border-style">
                  <div class="table-responsive">
                    <table class="table table-hover table-sm">
                      <thead>
                        <tr>
                          <th scope="col" style="width: 5%">ID</th>
                          <th scope="col">商品名</th>
                          <th scope="col">金額（円）</th>
                          <th scope="col">ブランド名</th>
                          <th scope="col">カテゴリー名</th>
                          <th scope="col" style="width: 5%"></th>
                          <th scope="col" style="width: 5%"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($items as $item)
                        <tr>
                          <td>{{ $item->id }}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->price }}</td>
                          <td>{{ $item->brand->name }}</td>
                          <td>{{ $item->category->name }}</td>
                          <td>
                            <a class="btn btn-primary btn-sm m-1"
                              href="{{ route('admin.items.detail', ['id' => $item->id]) }}">詳細</a>
                          </td>
                          <td>
                            <a class="btn btn-success btn-sm m-1"
                              href="{{ route('admin.items.editView', ['id' => $item->id]) }}">編集</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!-- Hover table card end -->
            </div>
          </div>
        </div>
        <!-- Page-body end -->
        <div class="box-footer clearfix">
          <div class="pull-right">
            {{ $items->appends(request()->input())->links() }}
          </div>
        </div>
      </div>
    </div>
    <!-- Main-body end -->
  </div>
</div>
@endsection