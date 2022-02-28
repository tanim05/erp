@extends('layout.master')
@section('content')
    <!-- Breadcubs Area Start Here -->
    {{-- <div class="breadcrumbs-area">
        <h3>Admin Dashboard</h3>
        <ul>
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li>Admin</li>
        </ul>
    </div> --}}
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                User Profile
            </h1>
        </section>

        <section class="content">
            <div class="box box-default">
                <div class="box-body">
                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <strong>{{ $message }}</strong>
                                </div>
                @endif
                    <form method="POST" action="{{ route('participant.store') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name*</label>
                                    <input class="form-control" type="text" placeholder="Employee Name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email*</label>
                                    <input class="form-control" type="text" placeholder="Employee email" name="email" required >
                                </div>
                            </div>
                        </div>

                        <!-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Father's Name</label>
                                    <input class="form-control" type="text" placeholder="Father's name" name="fname"
                                        >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mother's Name</label>
                                    <input class="form-control" type="text" placeholder="Father's name" name="mname"
                                        >
                                </div>
                            </div>
                        </div> -->

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone Number*</label>
                                    <input class="form-control" type="number" placeholder="Phone Number" name="phone_no"
                                        required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Photo</label>
                                    <input class="form-control" type="file" name="photo">
                                </div>
                            </div>
                           
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">    
                                <label for="pssword">Password:</label><br>
                                <input type="password" id="password" name="password" required>
                            </div>
                            <div class="col-md-6  form-group">
                            <label>User Type *</label>
                            <select name="type_id" id="type_id" class="type_id" required>
                                <option value="">Please Select Type *</option>
                                <option value="1">Normal User</option>
                                <option value="2">Director</option>
                                <option value="3">Admin</option>
                                
                                
                                
                            </select>
                            </div>

                        </div> 

                        <div class="row">
                            
                            <div class="col-md-6 form-group">
                                        <label for="intake_id">Department*</label>
                                        <select name="intake_id" id="intake_id" class="intake_id" required>
                                            <option value="">Select Department</option>
                                            @foreach ($intakes as $intake)
                                                <option value="{{ $intake->id }}">
                                                    {{ $intake->name }}
                                                </option>
                                            @endforeach
                                        </select>
                            </div>

                            <div class="col-md-6  form-group">
                            <label>Deignation *</label>
                            <select name="desig_id" id="desig_id" class="desig_id" >
                                <option value="">Please Select Deignation *</option>
                                <option value="1">Programmer</option>
                                <option value="2">Office</option>
                                <option value="3">Sr. Office</option>
                                <option value="4">HOD of IT</option>
                                <option value="5">HOD of Sales</option>
                                <option value="6">Director</option>
                                
                            </select>
                            </div>

                        </div>


                       
                        <!-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Present Address</label>
                                    <div class="box box-body">
                                        <div class="col-md-6">
                                            <label>Village/Road No.</label>
                                            <input class="form-control" type="text" placeholder="Village/Road No."
                                                name="pre_vill" >
                                        </div>
                                        <div class="col-md-6">
                                            <label>Post Office</label>
                                            <input class="form-control" type="text" placeholder="Post Office" name="pre_po"
                                                >
                                        </div>
                                        <div class="col-md-6">
                                            <label>Post Code</label>
                                            <input class="form-control" type="text" placeholder="Post Office"
                                                name="pre_po_number" >
                                        </div>
                                        <div class="col-md-6">
                                            <label>Thana</label>
                                            <input class="form-control" type="text" placeholder="Thana" name="pre_ps"
                                                >
                                        </div>
                                        <div class="col-md-6">
                                            <label>District</label>
                                            <input class="form-control" type="text" placeholder="District" name="pre_dist"
                                                >
                                        </div>
                                    </div>
                                    <!-- <input class="form-control" type="text" placeholder="Present Address" name="fname"> 
                                </div>
                            </div> -->
                            <!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label>Permanent Address</label>
                                    <div class="box box-body">
                                        <div class="col-md-6">
                                            <label>Village/Road No.</label>
                                            <input class="form-control" type="text" placeholder="Village/Road No."
                                                name="per_vill">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Post Office</label>
                                            <input class="form-control" type="text" placeholder="Post Office" name="per_po">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Post Code</label>
                                            <input class="form-control" type="text" placeholder="Post Office"
                                                name="per_po_code">
                                        </div>
                                        <div class="col-md-6">
                                            <label>Thana</label>
                                            <input class="form-control" type="text" placeholder="Thana" name="per_ps">
                                        </div>
                                        <div class="col-md-6">
                                            <label>District</label>
                                            <input class="form-control" type="text" placeholder="District" name="per_dist">
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        </div>-->

                        
                        <!-- {{-- <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Batch No</label>
                                    <input class="form-control" type="text" placeholder="Batch No" name="batch_no">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Course Description</label>
                                    <textarea name="course_desc" id="" cols="30" rows="1" class="form-control"
                                        placeholder="Course Description"></textarea>
                                </div>
                            </div>
                        </div> --}} -->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-12 form-group mg-t-8">
                                    <button type="submit"
                                        class="btn-fill-lg btn-gradient-yellow btn-hover-bluedark">Save</button>
                                    <button type="reset" class="btn-fill-lg bg-blue-dark btn-hover-yellow">Reset</button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </section>
    </div>










@endsection
