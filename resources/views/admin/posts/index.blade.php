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
            <li class="breadcrumb-item"><a href="#"> Admin</a></li>
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
                  <th> User </th>
                  <th> Category </th>
                  <th> Photo </th>
                  <th>Title</th>
                  <th>Body</th>
                  <th>Create Date</th>
                  <th>Update Date </th>
                  <th colspan="2"> Action   </th>
                </tr>
                </thead>
      
                 @if (count($posts) > 0)  
                      @foreach ($posts as $post)      
                          
                <tbody>
                  <tr>
                  <td>{{ $post->id }}</td>
                  <td>{{ $post->user_id }}</td> 
                  <td>{{ $post->category_id  }}</td>
                  <td>{{  $post->photo_id }}</td>
                  <td>{{  $post->title }}</td>
                  <td> {{  $post->body }}   </td>
                  <td>{{ $post->created_at->diffForHumans() }}</td>
                  <td>{{ $post->updated_at->diffForHumans() }}</td>
                  <td>  <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-success"> Edit </a>   </td>
                  <td>
                 <form action="/admin/posts/{{ $post->id }}" method="POST">
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
                  <th> User </th>
                  <th> Category </th>
                  <th> Photo </th>
                  <th>Title</th>
                  <th>Body</th>
                  <th>Create Date</th>
                  <th>Update Date </th>
                  <th colspan="2"> Action   </th>
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
    
@endsection