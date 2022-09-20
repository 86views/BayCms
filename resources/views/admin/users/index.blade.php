@extends('layouts.admin')



@section('content')
   
   <!-- Content Header (Page header) -->
   <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dasboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Admin</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

          
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th> Photo </th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role  </th>
                  <th> Status </th>
                  <th>Create Date</th>
                  <th>Update Date </th>
                  <th colspan="2"> Action   </th>
                </tr>
                </thead>
             @if (count($users) > 0)
                  @foreach ($users as $user)
                             
                <tbody>
                  <tr>
                  <td>{{ $user->id }}</td> 
                  <td><img height="50" src="{{ $user->photo ? $user->photo->file: 'no user photo' }}" alt=""> </td>
                  <td>{{ $user->name  }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->role->name }}</td>
                  <td>{{ $user->is_active == 1 ? 'Active' : 'Not Active' }}   </td>
                  <td>{{ $user->created_at->diffForHumans() }}</td>
                  <td>{{ $user->updated_at->diffForHumans() }}</td>
                  <td>  <a href="/admin/users/{{ $user->id }}/edit" class="btn btn-success"> Edit </a>   </td>
                  <td>
    <form action="/admin/users/{{ $user->id }}" method="POST">
        @csrf
        @method('delete')
     <input type="submit" class="btn btn-danger" value="Delete">        
  </form>

                  </td>
                </tr>
                @endforeach  
                @endif
                
                </tbody>
                <tfoot>
                <tr>
                  <th>Id</th>
                  <th> Photo </th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Role  </th>
                  <th> Status </th>
                  <th>Create Date</th>
                  <th>Update Date </th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->

    
@endsection