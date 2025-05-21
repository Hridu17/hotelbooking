<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
</head>

<body>
    <section class="vh-100 bg-image" style="background-image: url('{{ asset('Images/Background1.jpg') }}');">
        <div class="mask d-flex align-items-center h-100">
            <div class="container h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Create an Account</h2>

                                <!-- Display Validation Errors -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-outline mb-4">
                                        <input type="text" id="name" class="form-control form-control-lg"
                                            placeholder="Your Name" name="name" value="{{ old('name') }}"
                                            required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" id="email" class="form-control form-control-lg"
                                            placeholder="Your Email" name="email" value="{{ old('email') }}"
                                            required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="password" class="form-control form-control-lg"
                                            placeholder="Password" name="password" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" id="password_confirmation"
                                            class="form-control form-control-lg" placeholder="Repeat Your Password"
                                            name="password_confirmation" required />
                                    </div>

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="terms" required />
                                        <label class="form-check-label" for="terms">
                                            I agree to all statements in <a href="#!" class="text-body"><u>Terms of
                                                    Service</u></a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-lg btn-block">Register</button>
                                    </div>

                                    <p class="text-center text-muted mt-5 mb-0">
                                        Already have an account? <a href="{{ route('login') }}"
                                            class="fw-bold text-body"><u>Login here</u></a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>