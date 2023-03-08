<!doctype html>
<html lang="{{ app()->getLocale() }}">
   <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Laravel S3</title>
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
       <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
       <style>
           body, .card{
               background: #ededed;
           }
       </style>
   </head>
   <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Laravel S3</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="/">Upload Video to S3<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/test">#2</a>
            </li>
          </ul>
        </div>
      </nav>
      
       <div class="container">
           <div class="row pt-5">
               <div class="col-sm-12">
                   @if ($errors->any())
                       <div class="alert alert-danger">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                           <ul>
                               @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                               @endforeach
                           </ul>
                       </div>
                   @endif
                   @if (Session::has('success'))
                       <div class="alert alert-info">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                           <p>{{ Session::get('success') }}</p>
                       </div>
                   @endif
               </div>               
               <div class="col-sm-4">
                   <div class="card border-0 text-center">
                       <form action="{{ url('/videos') }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
                           {{ csrf_field() }}
                           <div class="form-group">
                               <input type="file" name="video" id="video">
                           </div>
                           <div class="form-group">
                               <button type="submit" class="btn btn-primary">Upload</button>
                           </div>
                       </form>
                   </div>
               </div>
           </div>
       </div>
       <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
       <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
   </body>
</html>