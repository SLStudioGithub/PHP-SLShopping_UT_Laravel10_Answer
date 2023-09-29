@extends('admin.layouts.base')
@section('title', '管理者編集')
@section('content')
<div class="pcoded-content">
  <!-- Page-header start -->
  <div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="page-header-title">
            <h2 class="mt-2">管理者編集</h2>
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
                  <h4>編集</h4>
                </div>
                <div class="card-block">
                  <form action="{{ route('admin.edit', ['id' => $admin->id]) }}" method="post">
                    @csrf
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">管理者ID</label>
                      <div class="col-sm-10">
                        <input type="text" id="userId" name="userId" value="{{ old('userId', $admin->email) }}"
                          class="form-control" placeholder="管理者ID" required>
                        @error('userId')
                        <div class="error-box">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">名前</label>
                      <div class="col-sm-10">
                        <input type="text" id="username" name="userName" value="{{ old('userName', $admin->name) }}"
                          class="form-control" placeholder="名前" required>
                        @error('userName')
                        <div class="error-box">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ロール</label>
                      <div class="col-sm-10">
                        @foreach ($roles as $role)
                        <input class="form-check-input" name="adminRoles[]" type="checkbox" id="{{ " role{$role->id}"
                        }}"
                        value="{{ $role->id }}"
                        @if ($errors->any())
                        {{ is_array(old('adminRoles')) && in_array($role->id,
                        old('adminRoles')) ? 'checked' : '' }}
                        @else
                        {{ $admin->roles->contains('id', $role->id) ? 'checked' : '' }}
                        @endif>
                        <label class="form-check-label" for="{{ " role{$role->id}" }}">{{
                          $role->name }}</label>
                        @endforeach
                      </div>
                      @error('adminRoles')
                      <div class="error-box">{{ $message }}</div>
                      @enderror
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-2 col-form-label">ロール</label>
                      <div class="col-sm-10">
                        @foreach ($permissions as $permission)
                        <input class="form-check-input" name="adminPermissions[]" type="checkbox" id="{{ "
                          permission{$permission->id}" }}"
                        value="{{ $permission->id }}"
                        @if ($errors->any())
                        {{ is_array(old('adminPermissions')) && in_array($permission->id,
                        old('adminPermissions')) ? 'checked' : '' }}
                        @else
                        {{ $admin->permissions->contains('id', $permission->id) ? 'checked'
                        : '' }}
                        @endif>
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
                        <button class="btn btn-primary waves-effect waves-light">編集</button>
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