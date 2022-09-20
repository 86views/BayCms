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
            <h3 class="card-title"> Edit  <small>User</small></h3>
          </div>
          <br> 
          <div class="col-sm-3">
                   <img height="200" src="{{ $user->photo ? $user->photo->file : "No image" }}" alt="" class="img-responsive img-rounded">
          </div>

          <div class="col-sm-9">
          <form action="/admin/users/{{ $user->id }}"  method="POST" enctype="multipart/form-data"> 
            @csrf
            @method('PATCH')
    
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" 
                id="exampleInputname" placeholder="Enter Name" value="{{ $user->name }}">
              </div>  
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" 
                id="exampleInputEmail1" placeholder="Enter email" value="{{ $user->email }}">
              </div> 



              
              <div class="form-group">
                <label>Role</label>
                @if ($roles->isNotEmpty())
                <select name="role_id" class="form-control">
                    <option value>Select a role</option>
                    @foreach($roles as $id => $name)
                        <option value="{{ $id }}"  @if ($id == $user->role_id) selected @endif>
                            {{ $name  }}
                        </option>
                    @endforeach
                </select>
                 @endif
              </div> 
              <div class="form-group">
                <label>Status</label>
                <select  name="is_active"  class="form-control">
                  
                  <option {{ old('is_active', $user->is_active) == '0' ? 'selected' : '' }} 
                    value="0"> Not Active</option>
                  <option {{ old('is_active', $user->is_active) == '1' ? 'selected' : '' }} 
                    value="1"> Active</option> 
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
              <button type="submit" class="btn btn-primary"> Update User</button>
            </div>
          </form>
        </div>
  
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