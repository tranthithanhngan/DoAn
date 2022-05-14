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
                <td>{{ $user->admin_phone }}</td>
                <td>{{ $user->admin_password }}</td>
                <td><input type="checkbox" name="author_role" {{$user->name_roles==('author') ? 'checked' : ''}}></td>
                <td><input type="checkbox" name="admin_role"  {{$user->name_roles==('admin') ? 'checked' : ''}}></td>
                <td><input type="checkbox" name="user_role"  {{$user->name_roles==('user') ? 'checked' : ''}}></td>
<td></td>
<td></td>
<td></td>
              <td>
                  
                    
                 <input type="submit" value="Assign roles" class="btn btn-sm btn-default">
                
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