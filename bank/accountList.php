<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account List</title>
</head>
<body>
<div class="container">
        <div class="row justify-content-center">
            <form action="http://localhost/js-002/my-app/login/login.php" method="post">
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="psw" class="form-control" placeholder="password">
                                <button type="submit" class="btn btn-outline-info mt-4">Login</button>
                            </div>
                        </form>
        </div>
    </div>

    
</body>
</html>