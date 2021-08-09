@extends('layout.template')
@section('title', 'Employee')
@section('content')
        <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
 <!-- Content Header (Page header) -->
 <section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Dashboard</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="#">Home</a></li>
           <li class="breadcrumb-item active">Invoice</li>
         </ol>
       </div>
     </div>
   </div><!-- /.container-fluid -->
 </section>

 <section class="content">
   <div class="container-fluid">
     <div class="row">
       <div class="col-12">
        


         <!-- Main content -->
         <div class="invoice p-3 mb-3">
           <!-- title row -->
           <div class="row">
             <div class="col-12">
              
             </div>
             <!-- /.col -->
           </div>
           <!-- info row -->
           
           <!-- /.row -->

           <!-- Table row -->
           <div class="row">
            <div class="col-12 table-responsive">
              <table class="table table-striped" id="table1">
                <thead>
                <tr>
                  <th>No</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Company</th>
                  <th>Email</th>
                  <th>Phone</th>
                </tr>
                </thead>
                <tbody>
                  <?php $no = 1; ?>
                  @foreach ($employees as $employee)    
                  <tr>
                    <td>{{$no++}}</td>
                    <td>{{$employee->first_name}}</td>
                    <td>{{$employee->last_name}}</td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.col -->
          </div>
           <!-- /.row -->

  
           <!-- /.row -->

           <!-- this row will not appear when printing -->
           
         </div>
         <!-- /.invoice -->
       </div><!-- /.col -->
     </div><!-- /.row -->
   </div><!-- /.container-fluid -->
 </section>
 <!-- /.content -->
</div>

@push('js')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
      <script src="//cdn.datatables.net/plug-ins/1.10.25/pagination/input.js"></script>

      <script type="text/javascript">
        $(document).ready(function() {
    
          var table =  $('#table1').DataTable({
            responsive : true,
            pagingType: "input",
          });
 
      });
      </script>
@endpush

@endsection
