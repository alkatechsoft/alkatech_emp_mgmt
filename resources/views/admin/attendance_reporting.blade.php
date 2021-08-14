@extends('admin/layout')
@section('page_title','Admin | Dashboard')
@section('attendance_selected','active')

@section('container')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Admin</a></li>
              <li class="breadcrumb-item active">Attendance Reporting</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><b>ATTENDANCE REPORTING</b></h3>
              </div>
              <!-- /.card-header -->
              <form id="upload_attendance_form">
                @csrf

              <div class="card-body">
                <DIV class="row">
                  <div class="col-4">
                    <div class="form-group">
                      <label>SELECT EMPLOYEE</label>
                      <select required name="emp_id" id="emp_search"  class="form-control select2" style="width: 100%;">slect
                        <option id="search_value" value="">Search employee</option>
                      </select>
                    </div>
                  </div>
              <div class="col-4">
                <div class="form-group">
                  <label>FROM</label>
                  <input type="date" name="from" class="form-control" required  placeholder="">
                </div>
              </div>
               <div class="col-4">
                <div class="form-group">
                  <label>TO</label>
                  <input type="date" name="to" onchange="attendance_filter_handler();" class="form-control" required  placeholder="">
                </div>
               </div>
              </div>

                {{-- <div class="card card-primary"> --}}
                  {{-- <div class="card-header">
                    <h3 class="card-title">DataTable with default features</h3>
                  </div> --}}
                  <!-- /.card-header -->
                  <div class="card-body" >
                    <table id="example1"  class="table table-bordered table-striped">
                      <thead style="visibility: hidden;">
                      <tr>
                       <th> 1 </th>
                       <th> 2 </th>
                       <th> 3 </th>
                       <th> 4 </th>
                       <th> 5 </th>
                       
                       <th> 6 </th>
                       <th> 7 </th>
                       <th> 7 </th>
                       <th> 8 </th>
                       <th> 9 </th>
                       <th> 10 </th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>
                          <span cl ass="badge badge-primary">1</span>
                          <span class="badge badge-primary">p</span>
                             
                        </td>
                        <td>
                          <span cl ass="badge badge-primary">2</span>
                          <span class="badge badge-primary">p</span>
                             
                        </td>
                        <td>
                          <span cl ass="badge badge-primary">3</span>
                          <span class="badge badge-primary">p</span>
                             
                        </td>
                        <td>
                          <span cl ass="badge badge-primary">3</span>
                          <span class="badge badge-primary">p</span>
                             
                        </td>
                        <td>
                          <span cl ass="badge badge-primary">4</span>
                          <span class="badge badge-primary">p</span>
                             
                        </td>
                        <td>
                          <span cl ass="badge badge-primary">5</span>
                          <span class="badge badge-primary">p</span>
                             
                        </td>
                        <td>
                          <span cl ass="badge badge-primary">6</span>
                          <span class="badge badge-primary">p</span>
                             
                        </td>
                        <td>
                          <span cl ass="badge badge-primary">7</span>
                          <span class="badge badge-primary">p</span>
                             
                        </td>
                        <td>
                          <span cl ass="badge badge-primary">8</span>
                          <span class="badge badge-danger">A</span>
                             
                        </td>
                        <td>
                          <span cl ass="badge badge-primary">9</span>
                          <span class="badge badge-primary">p</span>
                             
                        </td>
                        <td>
                          <span cl ass="badge badge-primary">10</span>
                          <span class="badge badge-primary">p</span>
                             
                        </td>
                         
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div class="card-body" style="display:none;">
                    <table id="example1"  class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                        <th>8</th>
                        <th>9</th>
                        <th>10</th>
                        <th>11</th>
                        <th>12</th>
                        <th>13</th>
                        <th>14</th>
                        <th>15</th>
                        <th>16</th>
                        <th>17</th>
                        <th>18</th>
                        <th>19</th>
                        <th>20</th>
                        <th>21</th>
                        <th>22</th>
                        <th>23</th>
                        <th>24</th>
                        <th>25</th>
                        <th>26</th>
                        <th>27</th>
                        <th>28</th>
                        <th>29</th>
                        <th>30</th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>   
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>   
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>   
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>   
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>   
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      <tr>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>   
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                        <td>p</td>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                {{-- </div> --}}
               
 

              </form>
              <!-- /.card-body -->
             
           
            </div>
              <!-- /.card-body -->
            </div>
            
            <!-- /.card -->
 
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
 
  
