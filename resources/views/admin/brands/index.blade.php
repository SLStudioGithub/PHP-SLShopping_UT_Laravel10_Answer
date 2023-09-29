@extends('admin.layouts.base')
@section('title', 'ブランド一覧')
@section('content')
<div class="pcoded-content">
  <!-- Page-header start -->
  <div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="page-header-title">
            <h2 class="mt-2">ブランド一覧</h2>
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
                  <form id="search-form" action="{{ route('admin.brands.index') }}" method="get">
                    <div class="form-group search-form-box">
                      <label for="id">ID</label>
                      <input type="number" class="form-control" id="id" name="id" placeholder="ブランドID"
                        value="{{ isset($_GET['id']) ? $_GET['id'] : '' }}">
                      <div id="id-error" class="error-box"></div>
                    </div>
                    <div class="form-group search-form-box">
                      <label for="admin-user-name">名前</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="ブランド名"
                        value="{{ isset($_GET['name']) ? $_GET['name'] : '' }}">
                    </div>
                    <div class="form-group row">
                      <div class="m-2">
                        <button class="btn btn-primary waves-effect waves-light">検索</button>
                      </div>
                      <div class="m-2">
                        <a class="btn btn-secondary waves-effect waves-light"
                          href="{{ route('admin.brands.index') }}">リセット</a>
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
                          <th scope="col">名前</th>
                          <th scope="col" style="width: 5%"></th>
                          <th scope="col" style="width: 5%"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($brands as $brand)
                        <tr>
                          <th scope="row">{{ $brand->id }}</th>
                          <td>{{ $brand->name }}</td>
                          <td>
                            <a class="btn btn-primary btn-sm m-1"
                              href="{{ route('admin.brands.detail', ['id' => $brand->id]) }}">詳細</a>
                          </td>
                          <td>
                            <a class="btn btn-success btn-sm m-1"
                              href="{{ route('admin.brands.editView', ['id' => $brand->id]) }}">編集</a>
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
              {{ $brands->appends(request()->input())->links() }}
          </div>
        </div>
      </div>
    </div>
    <!-- Main-body end -->
  </div>
</div>
@endsection