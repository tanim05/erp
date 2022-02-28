@extends('layout.master')
@section('content')
    <!-- Breadcubs Area Start Here -->
    {{-- <div class="breadcrumbs-area">
        <h3>User Dashboard</h3>
        <ul>
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>
            <li>Admin</li>
        </ul>
    </div> --}}
    <div class="col-lg-12">
        <p>
            <a href="{{ route('home') }}" title="Home">Home</a> /
            <a href="{{ route('inbox.index') }}" title="Course">Inbox</a>
        </p>


        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Inbox
                    <!-- <a href=# class="btn btn-primary" data-toggle="modal" data-target="#standard-modal">
                        <i class="fa fa-plus-circle fw-fa"></i> New
                    </a> -->
                </h1>
                @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <strong>{{ $message }}</strong>
                                </div>
                @endif
                <!-- Modal -->
               
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <table id="example" class="table table-bordered table-hover" cellspacing="0" style="font-size:12px">

            <thead>
                <tr>
                     <th>Note No.</th> 
                    <th>Note Heading</th>
                    <th>File Name</th>
                    <th>Approval Flow</th>
                    <th>Attachment</th>
                    <th width="15%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($moduleList as $module)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td> 
                         <td>{{ $module->name }}</td> 
                        <td>{{ $module->batch->name }}</td>                    
                        <td bgcolor="#d9817e" >
                        <h6>@foreach ($module->subjects as $subject)
                                {{ $loop->index + 1 }} . {{ $subject->subject_id }} --->
                            @endforeach</h6>    
                            
                        </td> 
                        @if($module->file_name!='')
                        <td align='center'><a href="<?php echo asset("/images/".$module->file_name) ?>" download><i class='fa fa-download'> </i>  </a></td>
                        @else
                         <td></td>
                         @endif
                        <!-- <td><a href="<?php echo asset("storage/app/pubic/uploads/1645386058_invoice.pdf") ?>" download>download  </a></td> -->
                        <!-- <td><a href="{{ URL::asset('storage/app/pubic/uploads/1645386058_invoice.pdf') }}" download>download  </a></td> -->
                        <td> <a title="Edit" href="" class="btn btn-primary btn-xs" data-toggle="modal"
                                data-target="#edit-modal{{ $module->id }}">View</a>

                            <!-- Edit Modal -->
                            <div class="modal fade" id="edit-modal{{ $module->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Edit Note Information</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('inbox.update', $module->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label for="name">Note Heading</label>
                                                    <input type="text" id="name" class="form-control mb-3"
                                                        placeholder="Name" name="module_name"
                                                        value="{{ $module->name }}" readonly>
                                                </div>
                                                <!-- <div class="col-md-12">
                                                    <label for="name">File Name</label>
                                                    {{-- <input type="text" readonly id="name" class="form-control mb-3" placeholder="Name"
                                                        name="module_name"> --}}
                                                    <select name="batch" id="" class="form-control">
                                                        <option value="">Select One</option>
                                                        @foreach ($batchList as $batch)
                                                            <option value="{{ $batch->id }}">{{ $batch->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div> -->
                                              
                                                <div class="col-md-12">
                                                    <label for="month">Note Details</label>
                                                
                                                    <textarea class="ckeditor form-control" id="module_description" name="module_description"  readonly>  {{ $module->month }}                                        
                                                    </textarea>

                                                </div>

                                                <div class="col-md-12">
                                                    <label for="name">Reamrks</label>
                                                    <input type="text" id="remarks" class="form-control mb-3"
                                                        placeholder="Reamrks" name="remarks" 
                                                         >
                                                </div>



                                                <!-- <div class="col-lg-6 col-12 form-group mg-t-30">
                                                <label class="text-dark-medium">Attachment</label>
                                                <input type="file" name='file' id='chooseFile' class="form-control-file">
                                                </div> -->


                                                <!-- <div class="col-md-12">
                                                    <label for="name">Apporval Flow</label>
                                                    {{-- <input type="text" id="name" class="form-control mb-3" placeholder="Name"
                                                        name="module_name"> --}}
                                                    <select name="subject[]" id="" class="form-control select2"
                                                        multiple="multiple">
                                                        <option value="">Select One</option>
                                                        @foreach ($subjectList as $subject)
                                                            <option value="{{ $subject->id }}">{{ $subject->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div> -->
                                               
                                    


                                                <!-- <div class="col-md-12">
                                                    <label for="tranche">Tranche</label>
                                                    <input type="text" id="tranche" class="form-control mb-3"
                                                        placeholder="tranche" name="tranche"
                                                        value="{{ $module->tranche }}">
                                                </div> -->
                                                <!-- {{-- <div class="col-md-6">
                                                    <label for="subject_id">Subject</label>

                                                    <select name="subject_id" id="subject_id" class="form-control">
                                                        <option value="">Select Subject</option>
                                                        @foreach ($subjects as $subject)
                                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div> --}} -->


                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="footer-btn bg-linkedin"> Aprove</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- <a title="Delete" href="" class="btn btn-danger btn-xs" data-toggle="modal"
                                data-target="#delete-modal{{ $module->id }}">Delete</a> -->

                            <!-- delete Modal -->
                            <!-- <div class="modal fade" id="delete-modal{{ $module->id }}" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Are You Sure</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ route('module.delete', $module->id) }}" method="POST">
                                            @csrf
                                            <div class="modal-footer">
                                                <button type="submit" class="footer-btn btn btn-danger"> Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> -->
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>

    </div>
@endsection
@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $('.select2').select2();
    </script>
@endsection
