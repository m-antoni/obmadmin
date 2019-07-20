
<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>One Beem</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/libs/css/style.css">
    <link rel="stylesheet" href="../assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
        background: #3CAEA3;
    }
    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center">
                <a href="#"><h1 class="align-text-bottom display-4"><i class="fa fa-cog fa-spin"></i></h1>
                </a><span class="splash-description text-secondary">#5105105105105100</span></div>
            <div class="card-body">
                <form method="POST" action="#">
                    @csrf
                    <ul>
                        <ol>deposite your payment here</ol>
                        <ol>submit your ref no.</ol>
                    </ul>
				
                    <div class="form-group">
                        <input id="code" type="text" class="form-control form-control-lg my-2 @error('code') is-invalid @enderror" name="code" required autocomplete="current-password" placeholder="Enter your reference no here.">

                        @error('code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning btn-lg btn-block"><i class="fa fa-credit-card"></i> Submit Now</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0 ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Request new code.</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="{{ route('login') }}" class="footer-link">Cancel.</a>
                    <input type="hidden" name="phone" value="{{ request()->phone }}">
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>