@extends ('backend.layout.template')

@section ('body-content')
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Dashboard</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <a href="{{ route('attendance.manage') }}"  style="font-size: larger; color: midnightblue;"><i class="fas fa-angle-double-right">Back </i>
                                    </a>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>


            {{-- ????????????????????? --}}

            <script>
                function showUser(str) {
                  if (str=="") {
                    document.getElementById("txtHint").innerHTML="";
                    return;
                  }
                  var xmlhttp=new XMLHttpRequest();
                  xmlhttp.onreadystatechange=function() {
                    if (this.readyState==4 && this.status==200) {
                      document.getElementById("txtHint").innerHTML=this.responseText;
                    }
                  }
                  xmlhttp.open("GET","getuser.php?q="+str,true);
                  xmlhttp.send();
                }
                </script>

                    <div id="txtHint"><b>Total Attendence.</b></div>

            {{-- ??????????????????? --}}



<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>



            <!-- /// -->

            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Sales Cards  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        {{-- <div class="card" style="background: #5f9ea085;"> --}}
                            <div class="card-body">
                                <form action="{{ route('attendance.store') }}" method="POST">
                                @csrf
                                    <h5 class="card-title text-center">Take Attendance</h5><br>
                                    <div class="form-group">
                                        <label for="fname" class="col-sm-4 control-label col-form-label">Select Attendance Date <span class="text-danger">*</span></label>
                                        <div class="col-sm-4">
                                            <input type="date" name="date" class="form-control" id="fname" required="">
                                            @error('date')
                                                <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        {{-- <table id="" class="table table-striped table-bordered"> --}}
                                            <table id="" class="table table-hover">

                                            <thead>
                                                <tr>
                                                    <th  rowspan="2" class="text-center" style="vertical-align: middle;"><b>Student ID</b></th>
                                                    <th rowspan="2" class="text-center" style="vertical-align: middle;"><b>Student Name</b></th>
                                                    <th colspan="2" class="text-center" style="vertical-align: middle;"><b>Attendance Status</b></th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center btn present_all" style="    display: table-cell; background: violet;">Present</th>
                                                    <th class="text-center" style="display: table-cell; background: #cccccce8;">Absent</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                           
                                            @foreach ( $students as $key => $student)
                                                <tr id="div{{$student->student_id}}">
                                                    <input type="hidden" name="student_id[]" value="{{ $student->student_id }}">
                                                    <input type="hidden" name="courseId" value="{{ $student->course_id }}"  placeholder=" Course ID" class="form-control">
                                                    {{-- <td>{{ $student->student_id }}</td> --}}
                                                    <th scope="row">{{ $student->student_id }}</th>
                                                    <td>{{ $student->name }}</td>
                                                    <td colspan="2" class="text-center">
                                                        <div class="switch-toggle switch-2 switch-candy">
                                                            <div class="col-6" style="float: left;">
                                                                <input type="radio" name="attend_status{{$key}}" value="Present" id="present{{$key}}"  required=""  onchange="showUser(this.value)>
                                                                <label for="present{{$key}}">Present</label>
                                                            </div>
                                                            <div class="col-6" style="float: right;">
                                                                <input type="radio" name="attend_status{{$key}}" value="Absent" id="absent{{$key}}" checked>
                                                                <label for="absent{{$key}}">Absent</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {{-- <table class="table table-hover">
                                            <thead>
                                              <tr>
                                                <th scope="col" rowspan="2"><b>Student ID</b></th>
                                                <th scope="col" rowspan="2"><b>Student Name</b></th>
                                                <th scope="col" rowspan="2" ><b>Attendance Status</b></th>
                                                
                                              </tr>
                                              <tr>
                                                <th class="text-center btn present_all" style="    display: table-cell; background: violet;">Present</th>
                                                <th class="text-center" style="display: table-cell; background: #cccccce8;">Absent</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                              </tr>
                                              <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>Thornton</td>
                                                <td>@fat</td>
                                              </tr>
                                              <tr>
                                                <th scope="row">3</th>
                                                <td colspan="2">Larry the Bird</td>
                                                <td>@twitter</td>
                                              </tr>
                                            </tbody>
                                          </table> --}}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Publish Now</button>
                                    </div> 
                                </form>
                            </div>
                        </div>
                    </div> 
                </div>  
            </div>
    @foreach( $students as $student)
        {{ $student->courseId}}
    @endforeach
@endsection


