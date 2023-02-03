
@extends('admin.layout.app')

@section('contents')

    <section class="content">
        
        <div class="row">
            <div class="col-xs-12 col-md-12">
              
                <div class="box">
                    <div class="box-header">
                        <div class="row">
                            <div class="col-xs-12 text-left">
                                <h3 class="box-title">
                                    <b>Please Choose Year</b> 
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap">
                            
                            <div class="row">
                                

                                @foreach($allYears as $key => $year)

                                <div class="col-lg-2 col-md-4 col-xs-6">
                                    <!-- small box -->
                                    @if($key%2==0)
                                    
                                    <div class="small-box bg-aqua">

                                    @else
                                    <div class="small-box bg-primary"> 

                                    @endif   

                                        <div class="inner">
                                          <h3>{{$year->name}}</h3>
                                        </div>

                                        <div class="icon">
                                          <i class="fa fa-files-o"></i>
                                        </div>

                                        <a href="{{route('admin.applications.archived.show', $year->id)}}" class="small-box-footer">
                                             More info <i class="fa fa-arrow-circle-right"></i>
                                        </a>

                                    </div>
                                </div>


                                @endforeach

                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->

                </div>


            </div>
        </div>

    </section>

@stop