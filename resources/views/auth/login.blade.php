<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <section class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">
                                    <div class="text-center">
                                        <img src="{{asset ('public/assets/css/image/Logo copy.png')}}" style="width: 185px;" alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">We are The AHP Team</h4>
                                    </div>

                                    <form method="POST" action="{{route('login')}}">
                                        @csrf
                                        <p>Please login to your account</p>

                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="email" id="form2Example11" class="form-control"
                                                placeholder="Phone number or email address" name="email" />
                                        </div>
                                        
                                        <div data-mdb-input-init class="form-outline mb-4">
                                            <input type="password" id="form2Example11" class="form-control" name="password"
                                                placeholder="Password" />
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit">Log in</button>
                                            <a class="text-muted" href="#!">Forgot password?</a>
                                        </div>

                                        <!-- Link to Registration Page -->
                                        <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
                                            <a href="register" class="btn btn-outline-danger">Create new</a> <!-- Link to Register Page -->
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">Welcome to our AHP Hotel Booking System!</h4>
                                    <p class="small mb-0">We are dedicated to making your travel experience seamless and enjoyable. With a wide selection of hotels to suit every preference and budget, we aim to connect you with the perfect stay for your journey. Our platform offers a user-friendly interface, exclusive deals, and personalized services to ensure a hassle-free booking process. Whether you're planning a quick getaway or an extended vacation, logging in allows you to access tailored recommendations, manage your bookings effortlessly, and enjoy exclusive member benefits. Let us help you turn your travel plans into unforgettable experiences!</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
