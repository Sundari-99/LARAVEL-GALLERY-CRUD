<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imageresult</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style>
.w-5{
    display:none;
}
#add{
    width: 300px;
    margin-left: 35%;
}
#tool{
    margin-left: 35%;
}
.image{
    position: relative;
    width: 300px;
}
#down{
    margin-left: 16%;
}
.imgoverlay{
    position: absolute;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background: rgba(0,0,0,0.6);
    color:white;
    font-family: "Arial, Helvetica, sans-serif";
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
     opacity: 0;
     transition: opacity 0.25s;
}
.imgoverlay:hover{
    opacity: 1;
}

</style>
<script src='https://kit.fontawesome.com/a076d05399.js'></script>

</head>
<body>
<div>
<a href="/image" class="btn btn-primary" id="add"><i style="font-size:18px" class="fa">&#xf03e;&nbsp;ADD Image</i>
</a>
<br/>

<br/>
    @foreach ($images as $image)

    <br/>
    <div class="links">
    <div class="container">
    <div class="row">
    
    <div class="col-md-4">
    <div class="image">
    <div class="card">
    
    <img src="{{ asset('uploads/image/' . $image->image) }}"  class="img-responsive" width="300px" height="180px" alt="Image">
    <div class="imgoverlay">
    <div class="imgtitle">
    <h1>{{ $image->name}}</h1>
    
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <br/>
    <div class="tool">
    <a href="/editimage/{{ $image->id }}" class="btn btn-warning" id="edit"><i style='font-size:15px' class='far'>&#xf044; Edit</i>
</a>
    <a href="/deleteimage/{{ $image->id }}" class="btn btn-danger" id="del"><i style='font-size:15px' class='far'>&#xf2ed; Delete</i>

</a>
<a href="/download/{{ $image->image }}" class="btn btn-primary" id="download"><i style="font-size:15px" class="fa">&#xf019;&nbsp;Download</i>
</a>
</div>
    </div>
    
    
    @endforeach
    </div>
    </div>
    <br/>
    <br/>
    <a href="/zip/{{ $image->image }}" id="down" class="btn btn-dark"><i style="font-size:18px" class="fa">&#xf1c6; &nbsp;Download ZIP</i>

</a>

    <br/>
    <br/>
    <div>
    {{$images->links()}}
    </div>
    <script src="https://code.jquery.com/jquery-2.1.4.js"></script>

<!-- Bootstrap Js CDN -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>