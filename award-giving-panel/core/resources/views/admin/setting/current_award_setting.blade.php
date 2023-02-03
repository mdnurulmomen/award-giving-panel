@extends('admin.layout.app')

@push('head')
    

  <!-- Date Picker -->
  <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.css')}}">

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

@endpush

@section('contents')


        <!-- Main content -->
        <section class="content">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                

                <div class="box">

                    <div class="box-header">
                        
                        <div class="row">
                            <div class="col-xs-8">
                                <h3>
                                    <b>Current Award Setting</b> 
                                </h3>
                            </div>

                            <div class="col-xs-4 text-right content-header">
                                <h1> 
                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addModal">
                                        New Year
                                    </button>
                                </h1>
                            </div>

                        </div>

                    </div>

                    <div class="box-body">

                        <form role="form" method="post" action= "{{ route('admin.award-settings.update') }}" enctype="multipart/form-data">
                            
                            @csrf
                            @method('put')

                            <div class="form-group">
                                <div class="row">   
                                    <div class="col-md-6">
                                        <label for="validationServer01">Current Year</label>
                                        
                                        <select name="current_year" class="form-control" required="true">

                                            @foreach(App\Models\Year::all() as $year)

                                                <option value="{{$year->id}}" @if($currentAwardSettings->current_year == $year->id) selected="true" @endif>{{$year->name}}</option>
                                                
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationServer02">Submission Deadline</label>

                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datepicker" name="submission_deadline" value="{{ $currentAwardSettings->submission_deadline ?? 'No Date' }}" required="true">
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                    
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="validationServer01">First Contact Email</label>
                                        
                                        <input type="email" class="form-control" name="first_email" value="{{ $currentAwardSettings->first_email }}" placeholder="Contact Email">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationServer01">Email Holders Name</label>
                                        
                                        <input type="text" class="form-control" name="first_email_holder_name" value="{{ $currentAwardSettings->first_email_holder_name }}" placeholder="Contact Email">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="row">
                                    
                                    <div class="col-md-6">
                                        <label for="validationServer01">Second Contact Email </label>
                                        
                                        <input type="email" class="form-control" name="second_email" value="{{ $currentAwardSettings->second_email }}" placeholder="Contact Email">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="validationServer01">Email Holders Name</label>
                                        
                                        <input type="text" class="form-control" name="second_email_holder_name" value="{{ $currentAwardSettings->second_email_holder_name }}" placeholder="Contact Email">
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <label for="validationServer01">Delay Submission Message</label>
                                        <textarea class="form-control textarea" rows="3" name="delay_submission_message">{{ $currentAwardSettings->delay_submission_message ?? 'No Message' }}</textarea>
                                    </div>

                                </div>
                            </div>
                            
                            <br>
                            
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-lg btn-block btn-primary">Update</button>
                                </div>
                            </div>
                            

                        </form>
                        
                    </div>

                </div>
            </section>

            <div class="modal modal-info fade" id="addModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Year Create Form</h4>
                        </div>
                            
                        <!-- form start -->
                        <form class="form-horizontal" method="post" action="{{route('admin.new.year.store')}}">

                            @csrf
                            @method('post')

                            <div class="modal-body">
                                <div class="box box-info">

                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="inputEmail3" class="col-sm-3 control-label">Year </label>

                                            <div class="col-sm-9">
                                                <input type="number" name="name" class="form-control" id="inputEmail3" placeholder="Year Name" required="true">
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


        </section>

        
    @push('scripts')

        <!-- Select2 -->
        {{-- <script src="{{asset('assets/admin/AdminLTE/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

        <!-- bootstrap color picker -->
        <script src="{{asset('assets/admin/AdminLTE/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>

        <!-- bootstrap time picker -->
        <script src="{{asset('assets/admin/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script> --}}

        {{-- <script src="{{asset('assets/admin/AdminLTE/bower_components/ckeditor/ckeditor.js')}}"></script> --}}

        <!-- daterangepicker -->
        <script src="{{asset('assets/admin/AdminLTE/bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

        <!-- datepicker -->
        <script src="{{asset('assets/admin/AdminLTE/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

        <script src="{{asset('assets/admin/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>

        <script>
            $(function () {
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                // CKEDITOR.replace('textarea')
                //bootstrap WYSIHTML5 - text editor
                $('.textarea').wysihtml5()
            })

            //Date picker
            $('#datepicker').datepicker({
                autoclose: true
            })
        </script>

    @endpush 
@stop