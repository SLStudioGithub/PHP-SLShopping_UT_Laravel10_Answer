@extends('admin.layouts.base')
@section('title', '管理者一覧')
@section('content')
<div class="pcoded-content">
  <!-- Page-header start -->
  <div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="page-header-title">
            <h2 class="mt-2">管理者一覧</h2>
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
                  <form id="search-form" action="{{ route('admin.index') }}" method="get">
                    <div class="form-group search-form-box">
                      <label for="admin-id">管理者ID</label>
                      <input type="text" class="form-control" id="admin-id" name="adminId" placeholder="管理者ID"
                        value="{{ isset($_GET['adminId']) ? $_GET['adminId'] : '' }}">
                    </div>
                    <div class="form-group search-form-box">
                      <label for="admin-name">名前</label>
                      <input type="text" class="form-control" id="admin-name" name="adminName" placeholder="管理者名"
                        value="{{ isset($_GET['adminName']) ? $_GET['adminName'] : '' }}">
                    </div>
                    <div class="form-group search-form-box">
                      <label>役割</label>
                      <div class="form-check">
                        @foreach ($roles as $role)
                        <input class="form-check-input" name="adminRoles[]" type="checkbox" id="{{ " role{$role->id}"
                        }}"
                        value="{{ $role->id }}"
                        {{ isset($_GET['adminRoles']) && in_array($role->id, $_GET['adminRoles']) ? 'checked' : '' }}>
                        <label class="form-check-label" for="{{ " role{$role->id}" }}">{{ $role->name }}</label>
                        @endforeach
                      </div>
                    </div>
                    <div class="form-group search-form-box">
                      <label>権限</label>
                      <div class="form-check">
                        @foreach ($permissions as $permission)
                        <input class="form-check-input" name="adminPermissions[]" type="checkbox" id="{{ "
                          permission{$permission->id}" }}"
                        value="{{ $permission->id }}"
                        {{ isset($_GET['adminPermissions']) && in_array($permission->id, $_GET['adminPermissions']) ?
                        'checked' : '' }}>
                        <label class="form-check-label" for="{{ " permission{$permission->id}" }}">{{ $permission->name
                          }}</label>
                        @endforeach
                      </div>
                    </div>
                    <div class="form-group row">
                      <div class="m-2">
                        <button class="btn btn-primary waves-effect waves-light">検索</button>
                      </div>
                      <div class="m-2">
                        <a class="btn btn-secondary waves-effect waves-light" href="{{ route('admin.index') }}">リセット</a>
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
                          <th scope="col">管理者ID</th>
                          <th scope="col">名前</th>
                          <th scope="col">役割</th>
                          <th scope="col">権限</th>
                          <th scope="col" style="width: 5%"></th>
                          <th scope="col" style="width: 5%"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($admins as $admin)
                        <tr>
                          <td>{{ $admin->email }}</td>
                          <td>{{ $admin->name }}</td>
                          <td>
                            @foreach ($admin->roles as $role)
                            <p><span class="label label-success">{{ $role->name }}</span></p>
                            @endforeach
                          </td>
                          <td>
                            @foreach ($admin->permissions as $permission)
                            <p><span class="label label-success">{{ $permission->name }}</span></p>
                            @endforeach
                          </td>
                          <td>
                            <a class="btn btn-primary btn-sm m-1"
                              href="{{ route('admin.detail', ['id' => $admin->id]) }}">詳細</a>
                          </td>
                          <td>
                            <a class="btn btn-success btn-sm m-1"
                              href="{{ route('admin.editView', ['id' => $admin->id]) }}">編集</a>
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
              {{ $admins->appends(request()->input())->links() }}
          </div>
        </div>
      </div>
    </div>
    <!-- Main-body end -->
  </div>
</div>
@endsection