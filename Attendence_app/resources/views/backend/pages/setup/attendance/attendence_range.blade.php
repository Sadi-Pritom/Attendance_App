



{{-- <a class="btn btn-primary" href="{{ route('mid.button', $id) }}">Mid term</a>
<a class="btn btn-primary" href="{{ route('final.button', $id) }}">Final term</a> --}}






@extends ('backend.layout.template')

@section ('body-content')
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Attendence Range</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /// -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-3.5 offset-md-3">
                        {{-- <div class="card" style="background: #5f9ea085;"> --}}
                            <div class="card" style="">

                            <div class="card-body">
                               <table align="right">
                                <th align="left"><a class="btn btn-primary" href="{{ route('mid.button', $id) }}">Mid term</a></th>
                                
                                <th align="right"><a class="btn btn-primary" href="{{ route('final.button', $id) }}">Final term</a>
                                </th>
                               </table>
                            </div>
                        </div>
                    </div> 
                </div>  
            </div>

    @endsection

 
    



    

