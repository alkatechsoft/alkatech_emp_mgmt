@extends('emp/layout')
@section('page_title','Emp | Update personal info')
@section('update_personal_info_selected','active')

@section('container')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        {{-- <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div> --}}
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><b>MANAGE PERSONAL INFORMATION.</b></h3>
              </div>
              <!-- /.card-header -->
              <form id="submit_update_personal_info_form">
              @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                          <label for="p_address">Permanent Address*</label>
                          <input type="text" name="p_address" class="form-control" name="p_address" id="p_address" value="{{$update_personal_info[0]->p_address}}" oninput="field_validation('Address','p_address','error_p_address')" placeholder="Permanent address" />
                          <span id="error_p_address" class="text-danger" role="alert">
                            
                         </span>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="form-group">
                        <label for="p_address">City*</label>
                        <input type="text" name="p_city" class="form-control" id="p_city" value="{{$update_personal_info[0]->p_city}}" oninput="field_validation('city','p_city','error_p_city')" placeholder="City">
                        <span id="error_p_city" class="text-danger" role="alert">
                                
                        </span>
                        </div>
                    </div>
                    <div class="col-xl-4">
                      <div class="form-group">
                        <label for="p_state">State*</label>
                        <input type="text" name="p_state" class="form-control" id="p_state" value="{{$update_personal_info[0]->p_state}}" oninput="field_validation('state','p_state','error_p_state')" placeholder="State">
                        <span id="error_p_state" class="text-danger" role="alert">
                            
                        </span>
                      </div>
                    </div>
                    <div class="col-xl-4">
                      <div class="form-group">
                        <label for="p_pincode">Pincode*</label>
                        <input type="text" name="p_pincode" class="form-control" id="p_pincode" value="{{$update_personal_info[0]->p_pincode}}" oninput="pincode_validation('pincode','p_pincode','error_p_pincode')" placeholder="Pincode">
                        <span id="error_p_pincode" class="text-danger" role="alert">
                        </span>
                      </div>
                    </div>
                    <div class="col-xl-4">
                      <div class="form-group">
                        <label for="personal_contact">Personal contact*</label>
                        <input type="tel" name="personal_contact" class="form-control" id="personal_contact" value="{{$update_personal_info[0]->contact}}" oninput="contact_validation('correct','personal_contact','error_personal_contact')" placeholder="Personal contact">
                        <span id="error_personal_contact" class="text-danger" role="alert">
                        </span>
                      </div>
                    </div>
                    <div class="col-xl-4">
                      <div class="form-group">
                        <label for="guardian_contact">Guardian contact*</label>
                        <input type="tel" name="guardian_contact" class="form-control" id="guardian_contact" value="{{$update_personal_info[0]->guardian_contact}}" oninput="contact_validation('correct','guardian_contact','error_guardian_contact')" placeholder="Guardian contact">
                        <span id="error_guardian_contact" class="text-danger" role="alert">
                        </span>
                      </div>
                    </div>
                    <div class="col-xl-12">
                      <div class="form-group">
                        <label for="p_pincode">Is it your curent address*</label></br>
                        <label>YES</label>&nbsp;&nbsp;<input type="radio" value="1" name="is_it_curent_address" class="form-group" checked id="is_it_curent_address">
                        <label>NO</label>&nbsp;&nbsp;<input type="radio" value="0" name="is_it_curent_address" class="form-group" id="no_curent_address">
                      </div>
                    </div>
                </div>
                    <div id="curent_address" style="display: none" class="control-group form-group">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="form-group">
                                  <label for="c_address">Current Address</label>
                                  <input type="textarea" name="c_address" class="form-control" id="c_address" value="{{$update_personal_info[0]->c_address}}" placeholder="Current address">
                                  <span id="error_c_address" class="text-danger" role="alert">
                                  </span>
                                  @error('c_address')
                                  <span class="text-danger" role="alert">
                                    This field required
                                  </span>
                                 @enderror
                                </div>
                            </div>
                            <div class="col-xl-4">
                            <div class="form-group">
                                <label for="c_city">City</label>
                                <input type="text"  name="c_city" class="form-control" id="c_city" value="{{$update_personal_info[0]->c_city}}" placeholder="City">
                                <span id="error_c_city" class="text-danger" role="alert">
                                </span>
                                @error('c_city')
                                <span class="text-danger" role="alert">
                                  This field required
                                </span>
                               @enderror
                              </div>
                            </div>
                            <div class="col-xl-4">
                              <div class="form-group">
                                <label for="c_state">State</label>
                                <input type="text" name="c_state" class="form-control" id="c_state" value="{{$update_personal_info[0]->c_state}}"  placeholder="State">
                                <span id="error_c_state" class="text-danger" role="alert">
                                </span>
                                @error('c_state')
                                <span class="text-danger" role="alert">
                                  This field required
                                </span>
                               @enderror
                              </div>
                            </div>
                            <div class="col-xl-4">
                              <div class="form-group">
                                <label for="c_pincode">Pincode</label>
                                <input type="text" name="c_pincode" class="form-control" id="c_pincode" value="{{$update_personal_info[0]->c_pincode}}" placeholder="Pincode">
                                <span id="error_c_pincode" class="text-danger" role="alert">
                                </span>
                                  @error('c_pincode')
                                <span class="text-danger" role="alert">
                                  This field required
                                </span>
                               @enderror
                              </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4">
                        <div class="form-group">
                          <input type="hidden" name="update_user_id" value="{{session('USER_ID')}}">
                            <button class="btn btn-primary" type="submit" >SAVE</button>
                       
                        </div>
              </div>
            </form>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection
