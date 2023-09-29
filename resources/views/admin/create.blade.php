@extends('admin.layouts.base')
@section('title', '管理者新規作成')
@section('content')
<div class="pcoded-content">
  <!-- Page-header start -->
  <div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="page-header-title">
            <h2 class="mt-2">管理者新規作成</h2>
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
                  <h4>新規作成</h4>
                </div>
                <div class="card-block">
                  <form action="{{ route('admin.create') }}" method="post">
                    @csrf
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label" for="user-id">管理者ID(メールアドレス)</label>
                      <div class="col-sm-10">
                        <input type="email" id="user-id" name="userId" value="{{ old('userId') }}" class="form-control"
                          placeholder="管理者ID" required>
                        @error('userId')
                        <div class="error-box">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label" for="user-name">名前</label>
                      <div class="col-sm-10">
                        <input type="text" id="user-name" name="userName" value="{{ old('userName') }}"
                          class="form-control" placeholder="名前" required>
                        @error('userName')
                        <div class="error-box">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">パスワード</label>
                      <div class="col-sm-10">
                        <input type="password" id="password" name="password" class="form-control" placeholder="パスワード"
                          required>
                        @error('password')
                        <div class="error-box">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">役割</label>
                      <div class="col-sm-10">
                        @foreach ($roles as $role)
                        <input class="m-2" name="adminRoles[]" type="checkbox" id="{{ " role{$role->id}" }}"
                        value="{{ $role->id }}"
                        {{ is_array(old("adminRoles")) && in_array($role->id, old('adminRoles'))
                        ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ " role{$role->id}" }}">{{
                          $role->name }}</label>
                        @endforeach
                      </div>
                      @error('adminRoles')
                      <div class="error-box">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">権限</label>
                      <div class="col-sm-10">
                        @foreach ($permissions as $permission)
                        <input class="m-2" name="adminPermissions[]" type="checkbox" id="{{ "
                          permission{$permission->id}" }}"
                        value="{{ $permission->id }}"
                        {{ is_array(old("adminPermissions")) && in_array($permission->id,
                        old('adminPermissions')) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ " permission{$permission->id}"
                          }}">{{ $permission->name }}</label>
                        @endforeach
                      </div>
                      @error('adminPermissions')
                      <div class="error-box">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="btn-toolbar">
                      <div class="ml-2">
                        <a class="btn btn-secondary waves-effect waves-light" href="{{ route('admin.index') }}">戻る</a>
                      </div>
                      <div class="ml-auto mr-2">
                        <button class="btn btn-primary waves-effect waves-light">登録</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <!-- Basic Form Inputs card end -->
            </div>
          </div>
        </div>
        <!-- Page body end -->
      </div>
    </div>
    <!-- Main-body end -->
  </div>
</div>
@endsection