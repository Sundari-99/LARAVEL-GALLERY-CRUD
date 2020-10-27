<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel Gallery Project</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="container">
<form action="{{ route('addimage') }}" method="POST" enctype="multipart/form-data">
{{ csrf_field()}}
<div class="form-group">
<label>Name</label>
<input type="text" class="form-control" name="name" placeholder="Enter Image name" required>

</div>
<div class="input-group">
   <div class="custom-file">
<input type="file" class="custom-file-input" name="image" required>
<label class="custom-file-label">Choose file</label>

</div>
</div>
<br/>
<br/>
<button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>

</div>

</body>
</html>