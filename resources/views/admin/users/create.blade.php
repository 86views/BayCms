@extends('layouts.admin')



@section('content')
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <!-- left column -->
      <div class="col-md-12">
        <!-- jquery validation -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Create  <small>User</small></h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          {{-- @if (count($errors) > 0) 
          @foreach ($errors->all() as  $error)
               <div class="alert alert-danger">
                   {{  $error }}
               </div>       
          @endforeach   
             @endif --}}
            
          <form action="/admin/users"  method="POST" enctype="multipart/form-data"> 
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputname" placeholder="Enter Name">
              </div>  
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div> 

              <div class="form-group">
                <label>Role</label>
                @if ($roles->isNotEmpty())
                <select name="role_id" class="form-control">
                    <option value>Select a role</option>
                    @foreach($roles as $id => $name)
                        <option value="{{ $id }}"> 
                            {{ $name }}
                        </option>
                    @endforeach
                </select>
                 @endif
              </div> 
                  <div class="form-group">
                    <label>Status</label>
                    <select  name="is_active"  class="form-control">
                      <option value="0" selected> Not Active</option>
                      <option value="1">  Active</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="photo_id" type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>  
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" 
                    id="exampleInputPassword1" placeholder="Password">
                  </div>

                </div>
             
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary"> Create User</button>
            </div>
          </form>

  
        </div>
        <!-- /.card -->
        </div>
      <!--/.col (left) -->
      <!-- right column -->
      <div class="col-md-6">

      </div>
      <!--/.col (right) -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
    
@endsection