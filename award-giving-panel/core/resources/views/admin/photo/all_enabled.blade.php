
@extends('admin.layout.app')

@push('head')

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

  <link rel="stylesheet" href="{{asset('assets/admin/css/jquery.fancybox.css')}}" type="text/css" media="screen" />

@endpush

@section('contents')

    <section class="content">
        
        <div class="row">
            <div class="col-xs-12 col-md-12">
              
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-xs-6 text-left">
                                <h3 class="box-title">
                                    <b>Enabled Photos List</b> 
                                </h3>
                            </div>

                            <div class="col-xs-6 text-right">
                                <h3 class="box-title">
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addModal">
                                        New Photo
                                    </button>
                                </h3>

                                <h3 class="box-title">
                                    <a type="button" href="{{route('admin.photos.deleted.show')}}" class="btn btn-info btn-xs">
                                        Photo Deleted
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
                                                <th>Title</th>
                                                <th>Preview</th>
                                            {{-- 
                                                <th>Category</th>
                                                <th>Type</th> 
                                                            --}}
                                                <th class="actions">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if($allPhotos->isEmpty())
                                                <tr class="danger">
                                                    <td class="text-danger" colspan='4'>No Data Found</td>
                                                </tr>
                                            @endif
                                            
                                            @foreach($allPhotos as $photo)
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1">{{$photo->title}}</td>

                                                    <td class="sorting_1">

                                                        @foreach($photo->photoFiles as $photoFile)

                                                            <a class="single_image" href="{{ asset('assets/user/media/'.$photoFile->photo_path) }}">
                                                                <img src="{{ asset('assets/user/media/'.$photoFile->photo_path) }}" class="img-thumbnail" alt="" style="width: 150px"/>
                                                            </a>

                                                        {{-- 
                                                            <img src="{{ asset('assets/user/media/'.$photoFile->photo_path) }}" class="img-thumbnail" alt="Cinque Terre" style="width: 150px">
                                                                                --}}

                                                        @endforeach

                                                    </td>
                                                {{-- 
                                                    <td class="sorting_1">{{$photo->category->name}}</td>
                                                    <td class="sorting_1">{{$photo->contentType->name}}</td> 
                                                                                                        
                                                                                                        --}}

                                                    <td>
                                                        <button class="btn btn-success" data-toggle="modal" data-target="#editModal{{$photo->id}}" title="Edit">
                                                            <i class="fa fa-edit" style="transform: scale(1.5);"></i>
                                                        </button>

                                                        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{$photo->id}}" title="Delete">
                                                            <i class="fa fa-trash" style="transform: scale(1.5); padding: 2px;"></i>
                                                        </button> 
                                                    </td>
                                                </tr>


                                                <!--Delete Modal -->
                                                <div class="modal modal-danger fade" id="deleteModal{{$photo->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">Seeking Confirmation</h4>
                                                            </div>
                                                                
                                                            <!-- form start -->
                                                            <form class="form-horizontal" method="post" action="{{route('admin.photo.delete', $photo->id)}}">

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


                                                <!--Edit Photo-->
                                                <div class="modal modal-info fade" id="editModal{{ $photo->id }}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">Photo Edit Form</h4>
                                                            </div>
                                                                
                                                            <!-- form start -->
                                                            <form class="form-horizontal" method="post" action="{{route('admin.photo.update', $photo->id)}}"  enctype="multipart/form-data">

                                                                @csrf
                                                                @method('put')

                                                                <div class="modal-body">
                                                                    <div class="box box-info">

                                                                        <div class="box-body">
                                                                            <div class="form-group">
                                                                                <label for="inputEmail3" class="col-sm-4 control-label">Photo Title</label>

                                                                                <div class="col-sm-8">
                                                                                    <input type="text" name="title" class="form-control" id="inputEmail3" value="{{ $photo->title }}" required="true">
                                                                                </div>
                                                                            </div>

                                                                            {{-- 
                                                                            <div class="form-group">
                                                                                <label for="inputEmail3" class="col-sm-4 control-label">Category</label>

                                                                                <div class="col-sm-8">

                                                                                    <select class="form-control" name="category_id" required>
                                                                                    
                                                                                    @foreach(App\Models\Category::all() as $category)    
                                                                                        <option value="{{ $category->id }}" @if($photo->category_id == $category->id) selected="true" @endif> {{ $category->name }} </option>

                                                                                    @endforeach

                                                                                    </select>

                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="inputEmail3" class="col-sm-4 control-label">Content Type</label>

                                                                                <div class="col-sm-8">
                                                                                    
                                                                                    <select class="form-control" name="content_type_id" required>
                                                                                    
                                                                                    @foreach(App\Models\ContentType::all() as $contentType)    
                                                                                        <option value="{{ $contentType->id }}"  @if($photo->content_type_id == $contentType->id) selected="true" @endif> {{ $contentType->name }} </option>

                                                                                    @endforeach

                                                                                    </select>

                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="inputEmail3" class="col-sm-4 control-label">Age Group </label>

                                                                                <div class="col-sm-8">
                                                                                    
                                                                                    <select class="form-control" name="age_id" required>
                                                                                    
                                                                                    @foreach(App\Models\Age::all() as $age)    
                                                                                        <option value="{{ $age->id }}"  @if($photo->age_id == $age->id) selected="true" @endif > {{ $age->name }} </option>

                                                                                    @endforeach

                                                                                    </select>

                                                                                </div>
                                                                            </div> 
                                                                            --}}

                                                                            <div class="form-group">
                                                                                <label for="inputEmail3" class="col-sm-4 control-label"> Current Photos </label>

                                                                                <div class="col-sm-8">
                                                                                    
                                                                                    @foreach($photo->photoFiles as $photoFile)

                                                                                        
                                                                                    <img src="{{ asset('assets/user/media/'.$photoFile->photo_path) }}" class="img-thumbnail" alt="Cinque Terre">

                                                                                    @endforeach

                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="inputEmail3" class="col-sm-4 control-label"> Upload New Photo </label>

                                                                                <div class="col-sm-8">
                                                                                    
                                                                                    <input type="file" name="photo_file[]" class="form-control" id="inputEmail3">

                                                                                </div>
                                                                            </div>



                                                                        {{-- 
                                                                            <div class="form-group">
                                                                                <label for="inputEmail3" class="col-sm-4 control-label">Description</label>

                                                                                <div class="col-sm-8">

                                                                                    <textarea class="form-control textarea" rows="3" name="description">{{ $photo->description }}</textarea>

                                                                                </div>
                                                                            </div> 
                                                                                    --}}


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
                                                    <h4 class="modal-title">Photo Create Form</h4>
                                                </div>
                                                    
                                                <!-- form start -->
                                                <form class="form-horizontal" method="post" action="{{route('admin.new.photo.store')}}"  enctype="multipart/form-data">

                                                    @csrf

                                                    <div class="modal-body">
                                                        <div class="box box-info">

                                                            <div class="box-body">
                                                                <div class="form-group">
                                                                    <label for="inputEmail3" class="col-sm-3 control-label">Photo Title</label>

                                                                    <div class="col-sm-9">
                                                                        <input type="text" name="title" class="form-control" id="inputEmail3" placeholder="Photo Title" required="true">
                                                                    </div>
                                                                </div>

                                                                {{-- 
                                                                <div class="form-group">
                                                                    <label for="inputEmail3" class="col-sm-3 control-label">Category</label>

                                                                    <div class="col-sm-9">

                                                                        <select class="form-control" name="category_id" required>
                                                                        
                                                                        @foreach(App\Models\Category::all() as $category)    
                                                                            <option value="{{ $category->id }}"> {{ $category->name }} </option>

                                                                        @endforeach

                                                                        </select>

                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="inputEmail3" class="col-sm-3 control-label">Content Type</label>

                                                                    <div class="col-sm-9">
                                                                        
                                                                        <select class="form-control" name="content_type_id" required>
                                                                        
                                                                        @foreach(App\Models\ContentType::all() as $contentType)    
                                                                            <option value="{{ $contentType->id }}"> {{ $contentType->name }} </option>

                                                                        @endforeach

                                                                        </select>

                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="inputEmail3" class="col-sm-3 control-label">Age Group </label>

                                                                    <div class="col-sm-9">
                                                                        
                                                                        <select class="form-control" name="age_id" required>
                                                                        
                                                                        @foreach(App\Models\Age::all() as $age)    
                                                                            <option value="{{ $age->id }}"> {{ $age->name }} </option>

                                                                        @endforeach

                                                                        </select>

                                                                    </div>
                                                                </div> 
                                                                --}}

                                                                <div class="form-group">
                                                                    <label for="inputEmail3" class="col-sm-3 control-label"> Photo Upload </label>

                                                                    <div class="col-sm-9">
                                                                        
                                                                        <input type="file" name="photo_file[]" class="form-control" id="inputEmail3"  required="true">

                                                                    </div>
                                                                </div>

                                                                {{-- <div class="form-group">
                                                                    <label for="inputEmail3" class="col-sm-3 control-label">Description</label>

                                                                    <div class="col-sm-9">

                                                                        <textarea class="form-control textarea" rows="3" name="description"></textarea>

                                                                    </div>
                                                                </div> --}}


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
                                            {{ $allPhotos->onEachSide(5)->links() }}
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



    @push('scripts')



        <script src="{{asset('assets/admin/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

        <script>
            $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                // CKEDITOR.replace('textarea')
                //bootstrap WYSIHTML5 - text editor
                $('.textarea').wysihtml5()
            });

            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            });
        </script>

        <script src="{{asset('assets/admin/js/jquery.fancybox.js')}}"></script>

        <script type="text/javascript">
            
            $(document).ready(function() {
                $("a.single_image").fancybox();
            });

        </script>

    @endpush 

@stop