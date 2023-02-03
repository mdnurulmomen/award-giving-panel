
@extends('admin.layout.app')

@push('head')

    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}
    <link rel="stylesheet" href="{{asset('assets/admin/css/breaking-news-ticker.css')}}">

    <link rel="stylesheet" href="{{asset('assets/admin/css/jquery.fancybox.css')}}" type="text/css" media="screen" />


@endpush

@section('contents')

    <section class="content">
        
        <div class="row">
            <div class="col-xs-12 col-md-12">
              
                <div class="box">
                    <div class="box-header">
                        <div class="row">

                            <div class="col-xs-8 text-left">
                                <h3 class="box-title">
                                    <b>Applications - {{ $yearName }}</b> 
                                </h3>
                            </div>   

                            <div class="col-xs-6 text-right">
                                <h3 class="box-title">
                                    
                                </h3>

                                <h3 class="box-title">
                                    
                                </h3>
                            </div>
                        </div>

                    </div>

                    <div class="box-header text-left">
                        <div class="row text-center">
                                
                            <form id="filteringForm" method="post" action="{{route('admin.applications.filtering.show')}}">

                                @csrf

                                <div class="col-xs-4 col-md-3" style="margin-top: 5px;">
                                    <select class="form-control" name="year">
                                        
                                        <option disabled selected value> All Years</option>

                                        @foreach(App\Models\Year::all() as $year )

                                        <option value="{{ $year->id }}" @if($year->name == $yearName) selected="true" @endif>{{ $year->name }}</option>

                                        @endforeach

                                    </select>  
                                </div>

                                <div class="col-xs-4 col-md-3" style="margin-top: 5px;">
                                    <select class="form-control" name="category">

                                        <option disabled selected value> All Category</option>
                                        
                                        @foreach(App\Models\Category::all() as $category )
                                        
                                        <option value="{{ $category->id }}" @if($category->id == $categoryId) selected="true" @endif >{{ $category->name }}</option>

                                        @endforeach

                                    </select>  
                                </div>

                                <div class="col-xs-4 col-md-3" style="margin-top: 5px;">   

                                    <select class="form-control" name="content_type">

                                        <option disabled selected value>All Type</option>
                                        
                                        @foreach(App\Models\ContentType::all() as $contentType )
                                        
                                        <option value="{{ $contentType->id }}"  @if($contentType->id == $contentTypeId) selected="true" @endif>{{ $contentType->name }}</option>

                                        @endforeach

                                    </select>

                                </div>

                                <div class="col-xs-4 col-md-3" style="margin-top: 5px;">   

                                    <select class="form-control" name="age">

                                        <option disabled selected value>All Age</option>
                                        
                                        @foreach(App\Models\Age::all() as $ageVariant )
                                        
                                        <option value="{{ $ageVariant->id }}"  @if($ageVariant->id == $ageId) selected="true" @endif>{{ $ageVariant->name }}</option>

                                        @endforeach

                                    </select>

                                </div>

                            </form>
                            
                        </div>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body">

                        <div class="row">

                            <div class="col-xs-3 col-sm-3">
                                <div class="dataTables_paginate paging_simple_numbers" id="paginate">
                                    
                                    @if($allApplications instanceof \Illuminate\Pagination\LengthAwarePaginator )

                                        {{ $allApplications->onEachSide(2)->links() }}

                                    @endif

                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 text-center">
                                
                                <div class="breaking-news-ticker" id="example">

                                    <div class="bn-label">Applications No.</div>

                                    <div class="bn-news">

                                        <ul>

                                            @foreach(App\Models\Category::all() as $category)

                                            <li>
                                                <b>{{ $category->name }}</b> : {{ App\Models\Application::whereYear('created_at', $yearName)->where('category_id', $category->id)->count() }},  
                                            </li>

                                            @endforeach

                                        </ul>

                                    </div>

                                    <div class="bn-controls">

                                        <button><span class="bn-arrow bn-prev"></span></button>

                                        <button><span class="bn-action"></span></button>

                                        <button><span class="bn-arrow bn-next"></span></button>

                                    </div>

                                </div>
                               
                            </div>

                            <div class="col-xs-3 col-sm-3 text-right">
                                <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">

                                    @php
                                        Session::put('allApplications', $allApplications);
                                        Session::save();
                                    @endphp

                                    <a type="button" href="{{route('admin.applications.download')}}" class="btn btn-info btn-xs pagination">
                                        Export/Download
                                    </a>

                                </div>
                            </div>

                        </div>

                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap">
                                
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="filteringTable" class="table table-bordered table-striped" role="grid" aria-describedby="example2_info">
                                        <thead>
                                            <tr role="row" class="text-center">
                                                <th>#</th>
                                                <th>Applicant</th>
                                                <th>Applied on</th>
                                                <th>Application Type</th>
                                                <th>No. Submission</th>
                                                <th>Mobile</th>
                                                <th class="actions">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if($allApplications->isEmpty())
                                                <tr class="danger">
                                                    <td class="text-danger" colspan='6'>
                                                        No Data Found
                                                    </td>
                                                </tr>
                                            @endif
                                            
                                            @foreach($allApplications as $key => $application)
                                                <tr role="row" class="odd">
                                                    <td>{{$key+1}}</td>
                                                    <td class="sorting_1">{{$application->user->name}}</td>
                                                    <td class="sorting_1">{{$application->created_at->format('d.m.Y')}}</td>
                                                    <td class="sorting_1">{{$application->contentType->name}}</td>
                                                    <td class="sorting_1">
                                                        {{$application->relatedMedia->count()}}
                                                    </td>
                                                    <td class="sorting_1">{{$application->user->phone}}</td>
                                                    <td>
                                                        <button class="btn btn-primary" data-toggle="modal" data-target="#viewModal-{{$application->id}}" title="View">
                                                            <i class="fa fa-eye" style="transform: scale(1.25);"></i>
                                                        </button> 
                                                    </td>
                                                </tr>


                                                <!--View Application-->
                                                <div class="modal modal-primary fade" id="viewModal-{{$application->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">
                                                                    View Applicantion No. : {{$application->id}}
                                                                </h4>
                                                            </div>

                                                            <div class="modal-body">
                                                                <div class="box box-info">

                                                                    <div class="box-header">
                                                                        <label> Personal Details </label>
                                                                    </div>

                                                                    <div class="box-body" style="color:#000000;padding-top: 0;">

                                                                        <div class="form-group">
                                                                            <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                Applicant Name : 
                                                                            </p>

                                                                            <div class="col-sm-8">
                                                                                <p>
                                                                                    {{ $application->user->name }}
                                                                                </p>
                                                                            </div>
                                                                        </div>               

                                                                        <div class="form-group">
                                                                            <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                Date of Birth : 
                                                                            </p>

                                                                            <div class="col-sm-8">
                                                                                <p>
                                                                                    {{ date('d.m.Y', strtotime($application->user->birth_date)) }}

                                                                                </p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                Email : 
                                                                            </p>

                                                                            <div class="col-sm-8">
                                                                                <p>
                                                                                    {{ $application->user->email }}
                                                                                </p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                Contact No : 
                                                                            </p>

                                                                            <div class="col-sm-8">
                                                                                <p>
                                                                                    {{ $application->user->phone }}
                                                                                </p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                Contact No (alt): 
                                                                            </p>

                                                                            <div class="col-sm-8">
                                                                                <p>
                                                                                    {{ $application->user->phone_alt ?? 'None'}}
                                                                                </p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                Address : 
                                                                            </p>

                                                                            <div class="col-sm-8">
                                                                                <p>
                                                                                    {{ $application->user->address }}
                                                                                </p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                Age Group : 
                                                                            </p>

                                                                            <div class="col-sm-8">
                                                                                <p>
                                                                                    {{ $application->user->age->name }}
                                                                                </p>
                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                    <div class="box-header">
                                                                        <label> Apply Details </label>
                                                                    </div>
                                                                
                                                                    <div class="box-body" style="color:#000000;padding-top: 0;">              

                                                                        <div class="form-group">
                                                                            <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                Category : 
                                                                            </p>

                                                                            <div class="col-sm-8">
                                                                                <p>
                                                                                    {{ $application->category->name }}
                                                                                </p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                Content Type : 
                                                                            </p>

                                                                            <div class="col-sm-8">
                                                                                <p>
                                                                                    {{ $application->contentType->name }}
                                                                                </p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="form-group">
                                                                            <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                Apply Date : 
                                                                            </p>

                                                                            <div class="col-sm-8">
                                                                                <p>
                                                                                    {{ $application->created_at->format('d.m.Y') }}
                                                                                </p>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <!-- /.box-body -->
                                                                    
                                                                    <div class="box-header">
                                                                        <label> Media Details </label>
                                                                    </div>

                                                                    <div class="box-body" style="color:#000000;padding-top: 0;">

                                                                        <div class="form-group">
                                                                            <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                Number Submission :
                                                                            </p>

                                                                            <div class="col-sm-8">
                                                                                <p>
                                                                                    {{ $application->relatedMedia->count() }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    @foreach($application->relatedMedia as $key => $relatedMedia)

                                                                        <div class="box-header">
                                                                            <label> Submission {{$key+1}} </label>
                                                                        </div>

                                                                        <div class="box-body" style="color:#000000;padding-top: 0;">

                                                                            <div class="form-group">
                                                                                <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                    Submission Title:
                                                                                </p>

                                                                                <div class="col-sm-8">
                                                                                    <p>
                                                                                        {{ $relatedMedia->title }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                    Media Type : 
                                                                                </p>

                                                                                <div class="col-sm-8">
                                                                                    <p>
                                                                                        {{ $relatedMedia->mediaType->name }}
                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            @if($relatedMedia->name_videographer)

                                                                                <div class="form-group">
                                                                                    <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                        Videographer : 
                                                                                    </p>

                                                                                    <div class="col-sm-8">
                                                                                        <p>
                                                                                            {{ $relatedMedia->name_videographer ?? 'None'}}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
																			 
                                                                                <div class="form-group">
                                                                                    <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                        Videographer Phone: 
                                                                                    </p>

                                                                                    <div class="col-sm-8">
                                                                                        <p>
                                                                                            {{ $relatedMedia->videographer_phone ?? 'None'}}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>

																				<div class="form-group">
                                                                                    <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                        Videographer Email: 
                                                                                    </p>

                                                                                    <div class="col-sm-8">
                                                                                        <p>
                                                                                            {{ $relatedMedia->videographer_email ?? 'None'}}
                                                                                        </p>
                                                                                    </div>
                                                                                </div>

                                                                            @endif

                                                                            <div class="form-group">
                                                                                <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                    Date Publishement:
                                                                                </p>

                                                                                <div class="col-sm-8">
                                                                                    <p>
                                                                                        {{ date('d.m.Y', strtotime($relatedMedia->date_publishment)) ?? 'None' }}

                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                    Publiser Name:
                                                                                </p>

                                                                                <div class="col-sm-8">
                                                                                    <p>
                                                                                        {{ $relatedMedia->publisher->publisher_name ?? 'None'}}
                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                    Contact Persons Name:
                                                                                </p>

                                                                                <div class="col-sm-8">
                                                                                    <p>
                                                                                        {{ $relatedMedia->publisher->representative_name ?? 'None'}}
                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                    Designation:
                                                                                </p>

                                                                                <div class="col-sm-8">
                                                                                    <p>
                                                                                        {{ $relatedMedia->publisher->representative_designation ?? 'None'}}
                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                    Organization :
                                                                                </p>

                                                                                <div class="col-sm-8">
                                                                                    <p>
                                                                                        {{ $relatedMedia->publisher->representative_organization ?? 'None'}}
                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                    Phone :
                                                                                </p>

                                                                                <div class="col-sm-8">
                                                                                    <p>
                                                                                        {{ $relatedMedia->publisher->representative_phone ?? 'None'}}
                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <p for="inputEmail3" class="col-sm-4 control-label">
                                                                                    Email:
                                                                                </p>

                                                                                <div class="col-sm-8">
                                                                                    <p>
                                                                                        {{ $relatedMedia->publisher->representative_email ?? 'None'}}
                                                                                    </p>
                                                                                </div>
                                                                            </div>

                                                                            
                                                                            @if($relatedMedia->mediaFiles->count())

                                                                            <div class="form-group">

                                                                                <div class="col-sm-4 text-left">
                                                                                    <p>View Media:</p>
                                                                                </div>

                                                                                <div class="col-sm-8 text-right">

                                                                                    @foreach($relatedMedia->mediaFiles as $key => $mediaFile)

                                                                                        @php

                                                                                            $allowedMimeTypes = ['image/jpeg','image/gif','image/png','image/bmp','image/svg+xml'];

                                                                                            $contentType = mime_content_type(base_path('../assets/user/media/').$mediaFile->media_file);   

                                                                                        @endphp



                                                                                        @if( in_array($contentType, $allowedMimeTypes) )

                                                                                            
                                                                                            @if($relatedMedia->mediaFiles->count() > 1 && $key == 0)

                                                                                                <span>Scan Copy</span>

                                                                                            @elseif($relatedMedia->mediaFiles->count() > 1 && $key == 1)

                                                                                                <span>High Resulation Copy</span>

                                                                                            @endif


                                                                                        <a class="single_image" href="{{ asset('assets/user/media/'.$mediaFile->media_file) }}">
                                                                                            <img src="{{ asset('assets/user/media/'.$mediaFile->media_file) }}" class="img-thumbnail" alt="image">
                                                                                        </a>


                                                                                        {{-- <img src="{{ asset('assets/user/media/'.$mediaFile->media_file) }}" class="img-thumbnail" alt="image"> --}}
                                                                                            
                                                                                        @else

                                                                                        <div class="embed-responsive embed-responsive-16by9">
                                                                                            <iframe class="embed-responsive-item" src="{{ $mediaFile->media_file }}" allowfullscreen></iframe>
                                                                                        </div>

                                                                                        @endif

                                                                                    @endforeach
                                                                                    
                                                                                </div>
                                                                                    
                                                                            </div>
                                                                            @endif

                                                                            @if($relatedMedia->mediaLinks)
                                                                                <div class="form-group">

                                                                                    <div class="col-sm-4 text-left">
                                                                                        <p>Link Media:</p>
                                                                                    </div>

                                                                                    <div class="col-sm-8">
                                                                                        <div class="input-group">
                                                                                            <input type="text" value="{{$relatedMedia->mediaLinks->media_link}}" class="form-control" readonly="true">
                                                                                            
                                                                                            <span class="input-group-btn">
                                                                                                <a type="button" class="btn btn-info btn-flat"  href="{{$relatedMedia->mediaLinks->media_link}}" target="_blank"> 
                                                                                                    Preview! 
                                                                                                </a>
                                                                                            </span>
                                                                                      </div>
                                                                                    </div>
                                                                                </div>

                                                                            @endif

                                                                        </div>


                                                                    @endforeach

                                                                
                                                                </div>
                                                            </div>

                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            </div>

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

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-xs-5 col-sm-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">

                                        {{-- 
                                        @php
                                            Session::put('allApplications', $allApplications);
                                            Session::save();
                                        @endphp 
                                        --}}

                                        <a type="button" href="{{route('admin.applications.download')}}" class="btn btn-primary btn-xs pagination">
                                            Export/Download
                                        </a>

                                    </div>
                                </div>
                                
                                <div class="col-xs-7 col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="paginate">
                                        <div class="text-right">

                                            @if($allApplications instanceof \Illuminate\Pagination\LengthAwarePaginator )

                                                {{ $allApplications->onEachSide(5)->links() }}

                                            @endif

                                            
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

        {{-- <script src="{{asset('assets/admin/js/jquery.table2excel.js')}}"></script> --}}

        <script>

            jQuery("select[name='year'], select[name='category'], select[name='content_type'], select[name='age']").change(
                function(e) {
                    // e.preventDefault();
                    // $(this).css('backgroundColor','#1cabe2');
                    // $(this).css('color','#ffffff');
                    this.form.submit();
                }
            );

        </script>

        <script src="{{asset('assets/admin/js/breaking-news-ticker.min.js')}}"></script>

        <script type="text/javascript">
            $('#example').breakingNews();
        </script>

        <script src="{{asset('assets/admin/js/jquery.fancybox.js')}}"></script>

        <script type="text/javascript">
            
            $(document).ready(function() {
                $("a.single_image").fancybox();
            });

        </script>

    @endpush
@stop