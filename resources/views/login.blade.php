<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <link href="{{ asset('bs/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-lg-4 col-md-4">
            <div class="card">
                <div class="card-body">
                    <form id="formAuthentication" class="mb-3" action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                placeholder="Username" autofocus />
                        </div>
                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control" name="password"
                                    placeholder="Password" />
                            </div>
                        </div>

                        <div class="mb-3">
                            <button class="btn btn-primary d-grid w-100">Log In</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
