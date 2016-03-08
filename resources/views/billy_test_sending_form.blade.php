<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Test Sending Form Data</title>
	<link rel="stylesheet" href="">
</head>
<body>
	


<form action="{{ url('testProcessFormData') }}" method="POST" class="form-horizontal">
    {!! csrf_field() !!}

    <div class="form-group">

        <div class="col-sm-12">
            Name : <input type="text" name="name" id="name" class="form-control">
            <br />
            Age : <input type="text" name="age" id="age" class="form-control">
        </div>
    </div>

    <!-- Add Task Button -->
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-6">
            <button type="submit" class="btn btn-default">
                <i class="fa fa-plus"></i> Add Task
            </button>
        </div>
    </div>
</form>




</body>
</html>