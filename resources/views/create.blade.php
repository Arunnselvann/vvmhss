<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h2>Create Student</h2>
    @if(Session::get('success'))
        <div class="alert alert-success">
            {{Session::get('success')}}
        </div>
    @endif

    @if(Session::get('fail'))
        <div class="alert alert-danger">
            {{Session::get('fail')}}
        </div>
    @endif
    <div class="container">
    <form method="post" action="{{route('form')}}">
        @csrf
        Name:<br>
        <input type="text" name="name" value="{{ old('name')}}"><br>
        <span style="color:red">@error('name'){{$message}} @enderror </span> <br>
        Email:<br>
        <input type="email" name="email" value="{{ old('email')}}"><br>
        <span style="color:red">@error('email'){{$message}} @enderror </span><br> 
        <br>
    
        <input type="submit" name="submit">
    </form>
    </div>
    <table class="table table-hover">
            <tr>
                <td>s.no</td>
                <td>Name</td>
                <td>Email</td>
                <td>Action</td>
            </tr>
            @if(isset($lists))
            @foreach ($lists as $detail)
            <tr>
                <td>{{$loop->index+1}}</td>
                <td>{{$detail->student}}</td>
                <td>{{$detail->email}}</td>
                <td>
                    <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#edit-modal-{{$detail->id}}">Edit</button>
                    <a class="btn btn-danger" href="delete/{{$detail->id}}">Delete</a>
                </td>


                    <!-- Modal -->
                    <div class="modal fade" id="edit-modal-{{$detail->id}}" tabindex="-1"  aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Student Detail</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="post" action="{{route('update')}}">
                                @csrf
                                <input type="hidden" name='id'  value="{{$detail->id}}">  
                                Name:<br>
                                <input type="text" name="student" value="{{$detail->student}}"><br>
                                <span style="color:red">@error('name'){{$message}} @enderror </span> <br>
                                Email:<br>
                                <input type="email" name="email" value="{{$detail->email}}"><br>
                                <span style="color:red">@error('email'){{$message}} @enderror </span><br> 
                                <br>
                            
                                <div class="modal-footer">
                            <input type="submit" class="btn btn-success"  value="update">
                            <button type="button" class="btn btn-info" data-bs-dismiss="modal">Close</button>
                        </div>
                            </form>
                            
                        </div>

                        </div>
                    </div>
                    </div>
       
            </tr>   
            @endforeach      
            @endif  
        </table>
 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>