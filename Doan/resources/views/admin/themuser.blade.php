@extends('admin.danhmuc')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm user
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/luuuser')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên user</label>
                                    <input type="text"  name="admin_name" class="form-control" id="exampleInputEmail1" placeholder="Tên user" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="text"  name="admin_email" class="form-control" id="exampleInputEmail" placeholder="email" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Phone</label>
                                    <input type="text"  name="admin_phone" class="form-control" id="exampleInputEmail" placeholder="Phone" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text"  name="admin_password" class="form-control" id="exampleInputEmail" placeholder="Password" >
                                </div>
                                <button type="submit" name="themuser" class="btn btn-info">Thêm user</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection