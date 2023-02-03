
@extends('admin.layout.app')

@section('contents')

    <section class="content">
        
        <section class="content">
          <div class="error-page">
            <h2 class="headline text-yellow"> 404</h2>

            <div class="error-content">
              <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

              <p>
                We could not find the page you were looking for.
              </p>

              <a type="button" href="route('admin.home')" class="btn btn-primary">Home</button>
            
            </div>
            <!-- /.error-content -->
          </div>
          <!-- /.error-page -->
        </section>

    </section>

@stop