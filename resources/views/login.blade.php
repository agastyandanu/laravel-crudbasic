<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-6 m-auto border">
                <div class="row p-3 bg-primary">
                    <div class="col text-center text-white">
                        <h3>Login Form</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col p-4">
                    <form method="POST" action="{{route('login')}}">
                            @csrf
                            <div class="mb-3">
                              <label for="" class="form-label">Username</label></label>
                              <input type="text" class="form-control" name="username" aria-describedby="">
                            </div>
                    
                            <div class="mb-3">
                              <label for="" class="form-label">Password</label>
                              <input type="password" class="form-control" name="password">
                            </div>
                            
                            <button type="submit" class="btn btn-primary">Login</button>
                          </form>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    


</body>
</html>