
@extends('admin.layout.app')

@section('contents')

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        
        <div class="col-lg-6 col-xs-12">
          <!-- Bar chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Applications Number (yearly) </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
        </div>

        <div class="col-lg-6 col-xs-12">
          <!-- Donut chart -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <i class="fa fa-bar-chart-o"></i>

              <h3 class="box-title">Current Year Applications</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
              <div id="donut-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body-->
          </div>
          <!-- /.box -->
        </div>
        
        <!-- ./col -->
      </div>
      

    </section>
    <!-- /.content -->

    @push('scripts')

      <!-- FLOT CHARTS -->
      <script src="{{asset('assets/admin/AdminLTE/bower_components/Flot/jquery.flot.js')}}"></script>
      <!-- FLOT PIE PLUGIN - also used to draw donut charts -->
      <script src="{{asset('assets/admin/AdminLTE/bower_components/Flot/jquery.flot.pie.js')}}"></script>
      <!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
      <script src="{{asset('assets/admin/AdminLTE/bower_components/Flot/jquery.flot.categories.js')}}"></script>


    <script>

        $(function () {
          
          /*
           * BAR CHART
           * ---------
           */

          var bar_data = {
            
            data : [
                
                @foreach(App\Models\Year::all() as $year)
                  [{{ $year->name }}, {{ $year->number_submission }}],
                @endforeach
                
            ],

            color: '#3c8dbc'
          }


          /*var bar_data = {
            
            data : [
            
                ['January', 10], ['February', 8], ['March', 4], ['April', 13], ['May', 17], ['June', 9]
            ],

            color: '#3c8dbc'
          }*/


          
          $.plot('#bar-chart', [bar_data], {
            grid  : {
              borderWidth: 1,
              borderColor: '#f3f3f3',
              tickColor  : '#f3f3f3'
            },
            series: {
              bars: {
                show    : true,
                barWidth: 0.5,
                align   : 'center'
              }
            },
            xaxis : {
              mode      : 'categories',
              tickLength: 0
            }
          })
          /* END BAR CHART */




          /*
           * DONUT CHART
           * -----------
           */

          var donutData = [

          @foreach(App\Models\Category::all() as $category)

            { label: '{{ $category->name }}', data: {{ App\Models\Application::where('category_id', $category->id)->whereYear('created_at', $currentYear )->count() }}, color: "{{ '#'.str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT) }}" },

          @endforeach         

/*
            
            { label: 'Series2', data: 30, color: '#3c8dbc' },
            { label: 'Series3', data: 20, color: '#0073b7' },
            { label: 'Series4', data: 50, color: '#00c0ef' }
            
*/
         
          ]
          
          $.plot('#donut-chart', donutData, {
            series: {
              pie: {
                show       : true,
                radius     : 1,
                innerRadius: 0.5,
                label      : {
                  show     : true,
                  radius   : 2 / 3,
                  formatter: labelFormatter,
                  threshold: 0.1
                }

              }
            },
            legend: {
              show: false
            }
          })
          /*
           * END DONUT CHART
           */

        })

      /*
      * Custom Label formatter
      * ----------------------
      */

      function labelFormatter(label, series) {
        return '<div style="font-size:13px; text-align:center; padding:2px; color: #fff; font-weight: 600;">'
          + label
          + '<br>'
          + Math.round(series.percent) + '%</div>'
      }
    </script>


    @endpush

  @stop