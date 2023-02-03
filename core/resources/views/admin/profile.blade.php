@extends('admin.layout.app')

@push('head')

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/iCheck/all.css')}}">
  <!-- Bootstrap Color Picker -->
  {{-- 
  <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
  <!-- Bootstrap time Picker-->
  <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.css')}}">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('assets/admin/AdminLTE/bower_components/select2/dist/css/select2.min.css')}}"> --}}

@endpush

@section('contents')

        <!-- Content Header (Page header) -->
        <section class="content">

            <div class="box">

                <div class="box-header">
                    <h4>
                        <b>Admin Profile Setting</b>
                    </h4>
                </div>

                <div class="box-body">
                    
                    <legend class="text-center">
                        <img src="{{ asset('assets/admin/images/profile/'.$profile->picture) }}" class="img-thumbnail" alt="No Image">
                    </legend>

                    <form role="form" method="post" action= "{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                        
                        @csrf
                        @method('put')

                        <div class="box-body">

                            <div class="form-group">
                                <div class="row">   
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer01">First Name</label>
                                        <input type="text" name="firstname" class="form-control form-control-lg is-valid"  placeholder="First Name" value="{{ $profile->firstname }}">

                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer02">Last Name</label>
                                        <input type="text" name="lastname" class="form-control form-control-lg is-valid"  placeholder="Last Name" value="{{ $profile->lastname }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer01">Email</label>
                                        <input type="text" name="email" class="form-control form-control-lg is-valid"  placeholder="Email" value="{{ $profile->email }}">

                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer01">Phone</label>
                                        <input type="text" name="phone" class="form-control form-control-lg is-valid"  placeholder="Your Phone Number" value="{{ $profile->phone }}">
                                    </div>

                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    
                                    <div class="col-md-6 mb-4">
                                        <label for="validationServer02">Picture</label>
                                        <input type="file" name="picture" class="form-control form-control-lg" accept="image/*">
                                    </div>

                                    <div class="col-md-6 mb-4">

                                        <label for="validationServer02">Gender</label>
                                         
                                        <div class="form-group">
                                            
                                            <label class="mr-1">
                                                <input type="radio" class="flat-red" name="gender" value="male" @if($profile->gender=='male') checked="true" @endif>
                                            </label>
                                            Male
                                            &nbsp;&nbsp;

                                            <label>
                                                <input type="radio" class="flat-red" name="gender" value="female" @if($profile->gender=='female') checked="true" @endif>
                                            </label>
                                            Female

                                            &nbsp;&nbsp;
                                            <label>
                                                <input type="radio" class="flat-red" name="gender" value="other" @if($profile->gender=='other') checked="true" @endif>
                                            </label>
                                            Other

                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <label for="validationServer02">Address</label>
                                        <input type="text" name="address" class="form-control form-control-lg is-valid"  placeholder="Address" value="{{ $profile->address }}">

                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label for="validationServer03">City</label>
                                        <input type="text" name="city" value="{{ $profile->city }}" class="form-control form-control-lg is-valid" placeholder="City">

                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <label for="validationServer05">Country</label>
                                        <input type="text" name="country" value="{{ $profile->country }}" class="form-control form-control-lg is-valid" placeholder="Country Name">
                                    </div>
                                </div>
                            </div>
                            
                           <br>
                            
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-lg btn-block btn-primary">Update</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </section>

        
        @push('scripts')

            <!-- Select2 -->
            {{-- <script src="{{asset('assets/admin/AdminLTE/bower_components/select2/dist/js/select2.full.min.js')}}"></script>

            <!-- bootstrap color picker -->
            <script src="{{asset('assets/admin/AdminLTE/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>

            <!-- bootstrap time picker -->
            <script src="{{asset('assets/admin/AdminLTE/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script> --}}

            <!-- iCheck -->
            <script src="{{asset('assets/admin/AdminLTE/plugins/iCheck/icheck.min.js')}}"></script>


            <script>

                $(function () {
                    $('input').iCheck({
                      checkboxClass: 'icheckbox_square-blue',
                      radioClass: 'iradio_square-blue',
                      increaseArea: '20%' /* optional */
                    });
                });
            
                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                  checkboxClass: 'icheckbox_minimal-blue',
                  radioClass   : 'iradio_minimal-blue'
                })

                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                  checkboxClass: 'icheckbox_minimal-red',
                  radioClass   : 'iradio_minimal-red'
                })

                //Flat red color scheme for iCheck
                $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                  checkboxClass: 'icheckbox_flat-green',
                  radioClass   : 'iradio_flat-green'
                })
            
            </script>
        @endpush 
@stop