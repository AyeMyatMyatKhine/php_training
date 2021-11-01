<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment2</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
 
   
 @if(session('status'))
   <div class="alert alert-success">
       {{ session('status') }}
   </div>
 @endif

 <div class="card">

   <div class="card-header font-weight-bold">
     <h2 class="float-left">Import and Export Employee data</h2>
     <h2 class="float-right"><a href="{{ route('exportExcel',$ext)}}" class="btn btn-success mr-1">Export Excel</a></h2>
   </div>

   <div class="card-body">

       <form id="excel-import-form" method="POST"  action="{{ route('importExcel') }}" accept-charset="utf-8" enctype="multipart/form-data">

         @csrf
                  
           <div class="row">

               <div class="col-md-12">
                   <div class="form-group">
                       <input type="file" name="file" placeholder="Choose file">
                   </div>
                   @error('file')
                       <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                   @enderror
               </div>              
 
               <div class="col-md-12">
                   <button type="submit" class="btn btn-primary" id="submit">Submit</button>
               </div>
           </div>     
       </form>

   </div>

 </div>

</div>  
</body>
</html>