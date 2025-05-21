<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
</head>

<body>
    <section class="vh-100 d-flex align-items-center justify-content-center" style="background-color: #f5f5f5;">
        <div class="card shadow" style="width: 450px; border-radius: 15px;">
            <div class="card-body p-5">
                <h3 class="text-center mb-4">We are The AHP Team</h3>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <p class="text-center mb-4">Please login to your account</p>

                    <div class="form-outline mb-4">
                        <input type="email" name="email" class="form-control w-100"
                            placeholder="Phone number or email address" required />
                    </div>

                    <div class="form-outline mb-4">
                        <input type="password" name="password" class="form-control w-100" placeholder="Password"
                            required />
                    </div>
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary gradient-custom-2 w-0.5 py-3">
                            LogIn
                        </button>
                    </div>



                    <div class="text-center mb-3">
                        <a href="#" class="text-muted">Forgot password?</a>
                    </div>

                    <div class="text-center">
                        <p class="mb-0">Don't have an account?
                            <a href="{{ route('register') }}" class="btn btn-outline-danger ms-2">Create new</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
