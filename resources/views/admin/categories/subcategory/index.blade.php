@extends('layouts.admin')

@section('admin_contant')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sub Category  </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <button class="btn btn-success" data-toggle="modal" data-target="#categoryModal">Add New</button>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All Sub-Category List</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped table-sm ">
                      <thead>
                      <tr>
                        <th>SL</th>
                        <th>Category name</th>
                        <th>Sub-Category Name</th>
                        <th>Sub-Category Icon</th>                  
                        <th>Home Page Show</th>
                        <th>Action</th>                     
                      </tr>
                      </thead>
                      <tbody>
                          @foreach ( $data as $key=>$row ) 
                      <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$row->category_id }}</td>
                        <td>{{$row->subcategory_name}} </td>
                        <td><img src="{{ asset($row->subcategory_icon)}}" height="40" width="70"></td>

                        <td>
                          @if($row->home_page==1)
                          <span class="badge badge-success">Yes</span>
                          @else
                          <span class="badge badge-danger">No</span>
                        @endif  
                        </td>
                        <td> 
                            <a href="#" class="btn btn-info btn-sm edit" data-toggle="modal" data-target="#editModal{{ $row->id }}"><i class="fas fa-edit"></i></a>
                            <a href="{{ route('category.delete',$row->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash"></i></a>
                                                    
                            <div class="modal fade" id="editModal{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                   <form action="{{route('category.update',$row->id)}}" method="Post" enctype="multipart/form-data">
                                      @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                          <label for="category_name">Category Name</label>
                                          <input type="text" class="form-control" id="e_category_name" value="{{ $row->category_name }}" name="category_name" >
                                        </div> 
                                      <div class="row">
                                        <div class="col col-md-6">
                                          <div class="form-group">
                                            <label for="category_name">Category Icon</label>
                                            <input type="file" class="dropify" id="category_icon" name="category_icon" >
                                          </div>  
                                        </div>
                                        <div class="col col-md-6">
                                          <div class="form-group">
                                            <label for="category_name">old Icon</label>
                                             <img   src="{{ asset($row->category_icon)}}" height="60" width="100">
                                             <input type="hidden"  name="old_icon" value="{{$row->category_icon }}" >
                                          </div>  
                                        </div>
                                        
                                      </div>
                                     

                                        <div class="form-group">
                                          <label for="category_name">Show on Homepage</label>
                                         <select class="form-control" name="home_page">

                                           <option value="1" @if($row->home_page==1) selected @endif>Yes</option>
                                           <option value="0" @if($row->home_page==0) selected @endif>No</option>
                                         </select>
                                          <small id="" class="form-text text-muted">If yes it will be show on your home page</small>
                                        </div> 
                                     
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                      <button type="Submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                </div>
                              </div>
                            </div>
                          </td>

                      </tr>
                      @endforeach
                      </tbody>
                      {{-- <tfoot>
                      <tr>
                        <th>SL</th>
                        <th>Category Name</th>
                        <th>Category Slug</th>
                        <th>Action</th>
                      </tr>
                      </tfoot> --}}
                    </table>
                  </div>
            </div>
        </div>
    </div>
</div>
</section>
 </div>
</div>





<!--  Sub Category Insert Modal -->
<div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New Sub-Category Insert</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         <form action="{{route('category.store')}}" method="Post" enctype="multipart/form-data">
            @csrf
          <div class="modal-body">
            <div class="form-group">
              <label for="category_name">Category Name</label>
              <select class="form-control" name="" id="">
              </select>

            </div>
              <div class="form-group">
                <label for="category_name">Sub Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" required="">
                <small id="emailHelp" class="form-text text-muted">This is your main category</small>
              </div> 
              <div class="form-group">
                <label for="category_name">Sub Category Icon</label>
                <input type="file" class="dropify" id="icon" name="category_icon" required="">
              </div>  
              <div class="form-group">
                <label for="category_name">Show on Homepage</label>
               <select class="form-control" name="home_page">
                 <option value="1">Yes</option>
                 <option value="0">No</option>
               </select>
                <small id="emailHelp" class="form-text text-muted">If yes it will be show on your home page</small>
              </div>  
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary">Submit</button>
          </div>
          </form>
      </div>
    </div>
  </div>


<!-- Category Edit Modal -->




@endsection