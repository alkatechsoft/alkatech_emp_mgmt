@extends('emp/layout')
@section('page_title','emp | Dashboard')
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
                <h3 class="card-title"><b>MANAGE PROFESSIONAL INFORMATION</b></h3>
              </div>
              <!-- /.card-header -->
              <form id="submit_professional_info_form">
              @csrf
                <div class="card-body">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                          <label for="p_address">COMPANY NAME*</label>
                          <input type="text" name="company_name" class="form-control" id="company_name" oninput="field_validation('Address','p_address','error_p_address')" placeholder="Permanent address" />
                          <span id="error_company_name" class="text-danger" role="alert">
                            
                         </span>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="form-group">
                        <label for="p_address">FROM*</label>
                        <input type="date" name="from_date" class="form-control" id="from_date" oninput="field_validation('city','p_city','error_p_city')" placeholder="City">
                        <span id="error_from_date" class="text-danger" role="alert">
                                
                        </span>
                        </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="p_state">TO*</label>
                        <input type="date" name="to_date" class="form-control" id="to_date" oninput="field_validation('state','p_state','error_p_state')" placeholder="State">
                        <span id="error_to_date" class="text-danger" role="alert">
                            
                        </span>
                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="p_pincode">EXPERIENCE LETTER*</label>
                        <input type="file" name="experience_letter" class="pb-4 form-control" style="padding:0.2rem 0rem 0rem 0.2rem" id="experience_letter" style="" oninput="pincode_validation('pincode','p_pincode','error_p_pincode')"
                        onchange="document.getElementById('experience_letter_preview').src = window.URL.createObjectURL(this.files[0])"
                        placeholder="Pincode">
                        <span id="error_experience_letter" class="text-danger" role="alert">
                        </span>
                        <img  id="experience_letter_preview" src="" style="margin:auto; border: 0px solid #f3dcdc;padding: 3px;margin-top: 4px;" height="auto" width="200px" height="auto" />

                      </div>
                    </div>
                    <div class="col-xl-6">
                      <div class="form-group">
                        <label for="sallary_slip">SALLARY SLIP*</label>

                        <input type="file" name="sallary_slip" class="pb-4 form-control" style="padding:0.2rem 0rem 0rem 0.2rem" id="sallary_slip" oninput="pincode_validation('pincode','p_pincode','error_p_pincode')" 
                        onchange="document.getElementById('sallary_slip_preview').src = window.URL.createObjectURL(this.files[0])"
                        placeholder="upload sallary slip">
                        <span id="error_sallary_slip" class="text-danger" role="alert">
                        </span>
                        <img  id="sallary_slip_preview" src="" style="margin:auto; border: 0px solid #f3dcdc;padding: 3px;margin-top: 4px;" height="auto" width="200px" height="auto" />
                      </div>
                    </div>
                </div>
                    
                    
                    <div class="col-xl-4">
                        <div class="form-group">
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
