@extends('admin.danhmuc')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      LIỆT KÊ USERS
    </div>
    <div class="table-responsive">
        <?php
              $message = Session::get('message');
              if($message){
                  echo '<span class="text-alert">'.$message.'</span>';
                  Session::put('message',null);
              }
              ?>
<table class="table table-striped b-t b-light" id="myTable">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
          
            <th>Tên user</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Password</th>
            <th>Author</th>
            <th>Admin</th>
            <th>User</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($admin as $key => $user)
            <form action="{{url('/assign-roles')}}" method="POST">
              @csrf
              <tr>
               
                <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
                <td>{{ $user->admin_name }}</td>
                <td>{{ $user->admin_email }} 
                  <input type="hidden" name="admin_email" value="{{ $user->admin_email }}"></td>
                  <input type="hidden" name="admin_id" value="{{ $user->admin_id }}"></td>
                <td>{{ $user->admin_phone }} </td>
                <td>{{ $user->admin_password }}</td>
                {{-- <td><input type="radio" class="radio" name="author_role" {{$user->hasRole('author') ? 'checked' : ''}}></td> --}}
                <td><input type="radio" class="radio"name="admin_role"  {{$user->hasRole('admin') ? 'checked' : ''}}></td>
                <td><input type="radio" class="radio" name="user_role"  {{$user->hasRole('user') ? 'checked' : ''}}></td>
<td></td>
<td></td>
<td></td>
              <td>
                  
                    
                <p> <input type="submit" value="Trao quyền" class="btn btn-sm btn-default"></p>
              <p><a class="btn btn-sma btn-danger"href="{{url('/xoa_roles/'.$user->admin_id)}}">Xóa user</a></p>
              <p><a class="btn btn-sma btn-success"href="{{url('/chuyen_roles/'.$user->admin_id)}}">Đổi user</a></p>
              </td> 

              </tr>
            </form>
          @endforeach
        </tbody>
      </table>
    </div>
    
  </div>
</div>
@endsection