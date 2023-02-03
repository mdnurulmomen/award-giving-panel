
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
                                    <b>Disabled Years List</b> 
                                </h3>
                            </div>

                            <div class="col-xs-6 text-right">
                                <h3 class="box-title">
                                    <a type="button" href="{{route('admin.years.enabled.show')}}" class="btn btn-info btn-xs">
                                        Year Enabled
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
                                                <th>Year Name</th>
                                                <th class="actions">Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if($allYears->isEmpty())
                                                <tr class="danger">
                                                    <td class="text-danger" colspan='2'>No Data Found</td>
                                                </tr>
                                            @endif
                                            
                                            @foreach($allYears as $year)
                                                <tr role="row" class="odd">
                                                  <td class="sorting_1">{{$year->name}}</td>
                                                  <td>
                                                     <button class="btn btn-danger" data-toggle="modal" data-target="#undoModal{{$year->id}}" title="Edit">
                                                        <i class="fa fa-undo" style="transform: scale(1.5);"></i>
                                                    </button> 
                                                  </td>
                                                </tr>


                                                <!--Undo Modal -->
                                                <div class="modal modal-danger fade" id="undoModal{{$year->id}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">Seeking Confirmation</h4>
                                                            </div>
                                                                
                                                            <!-- form start -->
                                                            <form class="form-horizontal" method="post" action="{{route('admin.deleted.year.restore', $year->id)}}">

                                                                @csrf
                                                                @method('patch')

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

                                            @endforeach
                                        </tbody>
                                            
                                        <tfoot>

                                        </tfoot>
                                            
                                    </table>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">{{-- Showing 1 to 10 of 57 entries --}}</div>
                                </div>
                                <div class="col-sm-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                                        <div class="text-right">
                                            {{ $allYears->onEachSide(5)->links() }}
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

        <!-- DataTables -->
        {{-- <script src="{{asset('assets/admin/AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('assets/admin/AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
        <!-- SlimScroll -->
        <script src="{{asset('assets/admin/AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script> --}}

    @endpush
@stop