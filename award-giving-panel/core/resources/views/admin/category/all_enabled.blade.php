
@extends('admin.layout.app')

@section('contents')

    <section class="content">
        
        <div class="row">
            <div class="col-xs-12 col-md-12">
              
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-xs-6 text-left">
                                <h3 class="box-title">
                                    <b>Enabled Categories List</b> 
                                </h3>
                            </div>

                            

                            <div class="col-xs-6 text-right">
                                <h3 class="box-title">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addModal">
                                        New Category
                                    </button>
                                </h3>

                                <h3 class="box-title">
                                    <a type="button" href="{{route('admin.categories.deleted.show')}}" class="btn btn-info btn-xs">
                                        Categories Deleted
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap">
                            
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example2" class="table table-bordered table-hover table-striped dataTable text-center" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row">
                                                <th>Category Name</th>
                                                <th class="actions">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if($allCategories->isEmpty())
                                                <tr class="danger">
                                                    <td class="text-danger" colspan='2'>No Data Found</td>
                                                </tr>
                                            @endif
                                            
                                            @foreach($allCategories as $category)
                                                <tr role="row" class="odd">
                                                  <td class="sorting_1">{{$category->name}}</td>
                                                  <td>
                                                     <button class="btn btn-success" data-toggle="modal" data-target="#editModal{{$category->id}}" title="Edit">
                                                        <i class="fa fa-edit" style="transform: scale(1.5);"></i>
                                                    </button>

                                                    <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$category->id}}" title="Delete">
                                                        <i class="fa fa-trash" style="transform: scale(1.5); padding: 2px;"></i>
                                                    </button> 
                                                  </td>
                                                </tr>


                                                <!--Delete Modal -->
                                                <div class="modal modal-danger fade" id="deleteModal{{$category->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">Seeking Confirmation</h4>
                                                            </div>
                                                                
                                                            <!-- form start -->
                                                            <form class="form-horizontal" method="post" action="{{route('admin.category.delete', $category->id)}}">

                                                                @csrf
                                                                @method('delete')

                                                                <div class="modal-body">
                                                                    <div class="box box-info">
                                                                        <div class="box-body">
                                                                            <label>Are You Sure ??</label>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                                                    <button type="submit" class="btn btn-primary">Yes</button>
                                                                </div>

                                                            </form>


                                                        </div>
                                                    <!-- /.modal-content -->
                                                    </div>
                                                  <!-- /.modal-dialog -->
                                                </div>


                                                <!--Edit Category-->
                                                <div class="modal modal-success fade" id="editModal{{$category->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">Category Edit Form</h4>
                                                            </div>
                                                                
                                                            <!-- form start -->
                                                            <form class="form-horizontal" method="post" action="{{route('admin.category.update', $category->id)}}">

                                                                @csrf
                                                                @method('put')

                                                                <div class="modal-body">
                                                                    <div class="box box-info">

                                                                        <div class="box-body">
                                                                            <div class="form-group">
                                                                                <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>

                                                                                <div class="col-sm-9">
                                                                                    <input type="text" name="name" class="form-control" id="inputEmail3" value="{{$category->name}}" required="true">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="submit" class="btn btn-primary btn-block">Update</button>
                                                                </div>

                                                            </form>


                                                        </div>
                                                    <!-- /.modal-content -->
                                                    </div>
                                                  <!-- /.modal-dialog -->
                                                </div>

                                            @endforeach
                                        </tbody>
                                            
                                        <tfoot>

                                        </tfoot>
                                            
                                    </table>


                                    <div class="modal modal-info fade" id="addModal">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title">Category Create Form</h4>
                                                </div>
                                                    
                                                <!-- form start -->
                                                <form class="form-horizontal" method="post" action="{{route('admin.new.category.store')}}">

                                                    @csrf
                                                    @method('post')

                                                    <div class="modal-body">
                                                        <div class="box box-info">

                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label for="inputEmail3" class="col-sm-3 control-label">Category Name</label>

                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Category Name" required="true">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary btn-block">Create</button>
                                                    </div>
                                                    
                                                </form>

                                            </div>
                                        <!-- /.modal-content -->
                                        </div>
                                      <!-- /.modal-dialog -->
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite"></div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        <div class="text-right">
                                            {{ $allCategories->onEachSide(5)->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                </div>


            </div>
        </div>

    </section>

@stop