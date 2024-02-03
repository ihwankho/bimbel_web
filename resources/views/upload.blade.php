<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload File</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <!-- Alert message (start) -->
                @if(Session::has('message'))
                <div class="alert {{ Session::get('alert-class') }}">
                    {{ Session::get('message') }}
                </div>
                @endif
                <!-- Alert message (end) -->

                <form action="/upload" enctype='multipart/form-data' method="post" >
                   @method('POST')
                   @csrf

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type='text' name='name' class="form-control">

                            @if ($errors->has('file'))
                                <span class="errormsg text-danger">{{ $errors->first('file') }}</span>
                            @endif
                        </div>
                    </div>
<br>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">File <span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type='file' name='image' class="form-control">

                            @if ($errors->has('file'))
                                <span class="errormsg text-danger">{{ $errors->first('file') }}</span>
                            @endif
                        </div>
                    </div>
<br>
                    <div class="form-group">
                        <div class="col-md-6">
                            <input type="submit" name="submit" value='Submit' class='btn btn-success'>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
