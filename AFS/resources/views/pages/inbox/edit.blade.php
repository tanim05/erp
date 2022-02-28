@extends('layout.master')
@section('content')
    <!-- Breadcubs Area Start Here -->
    
    <div class="col-lg-12">
       
                                        <form action="{{ route('inbox.update', $module->id) }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6 text-info">
                                                    <label for="name">File Name</label>
                                                    <input type="text" id="name" class="form-control mb-3"
                                                        placeholder="Name" name="module_name"
                                                        value="{{ $module->filename }}" readonly>
                                                </div>

                                                <div class="col-md-6 text-info">
                                                    <label for="name">Note Heading</label>
                                                    <input type="text" id="name" class="form-control mb-3"
                                                        placeholder="Name" name="module_name"
                                                        value="{{ $module->name }}" readonly>
                                                </div>
                                            </div>
                                                
                                              
                                                <div class="col-md-12 text-info ">
                                                    <label for="month">Note Details</label>
                                                
                                                    <textarea class=" ckeditor form-control "  id="module_description" name="module_description"  readonly>{{ $module->month }}                               
                                                    </textarea>

                                                </div>
                                              
                                                <table class="table table-bordered table-hover" cellspacing="0" style="font-size:12px">
                                                    
                                                    <thead>
                                                     <tr>
                                                         <th scope="col">#</th>
                                                            <th scope="col">Approval Name</th>
                                                            <th scope="col">Remarks</th>
                                          
                                                     </tr>
                                                     </thead>
                                                    <tbody> 
                                                    <tbody>
                                                         @foreach ($remarklsit as $remark)
                                                             <tr>
                                                                    <td>{{ $loop->index + 1 }}</td>
                                                                    <td> {{ $remark->name }} </td>
                                                                         <td> 
                                                                             {{ $remark->remarks }} 

                                                                         </td>
                                                            </tr> 
                                   
                                                         @endforeach
                                                    </tbody>
                                                 </table>   
                                                       
                                                <div class="col-md-12">
                                                    <label for="name">Your Remarks</label>
                                                    <input type="text" id="remarks" class="form-control mb-3 "
                                                        placeholder="Reamrks" name="remarks" 
                                                         >
                                                </div>



                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="footer-btn bg-linkedin"> Forward</button>
                                            </div>
                                        </form>
                    

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
