@extends('layouts.main')

@section('container')
    <!-- HERO SECTION -->
    <section id="hero" class="hero section bg-light py-5">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-6">
                    <h1>Discover Luxury <br> at AHP Hotel</h1>
                    <p class="lead">Book a room today and enjoy comfort, style, and hospitality like never before.</p>
                    <a href="#book-room" class="btn btn-primary mt-3">Book a Room</a>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('assets/image/hotel1.png') }}" class="img-fluid" alt="Hotel Image">
                </div>
            </div>
        </div>
    </section>

    <!-- ABOUT SECTION -->
    <section id="about" class="section py-5 bg-white">
        <div class="container">
            <div class="section-title text-center mb-4">
                <h2>About AHP Hotel</h2>
                <p class="text-muted">Where elegance meets comfort in the heart of Pokhara.</p>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <img src="{{ asset('assets/image/hotel2.jpg') }}" class="img-fluid rounded" alt="Hotel Lobby">
                </div>
                <div class="col-lg-6">
                    <p>
                        At AHP Hotel, we strive to provide top-notch accommodations with world-class service. Whether you're
                        here for business, leisure, or a celebration — you'll enjoy a luxurious experience in every corner.
                    </p>
                    <ul>
                        <li>🌟 Five-Star Amenities</li>
                        <li>🛌 Comfortable & Spacious Rooms</li>
                        <li>👨‍🍳 In-house Gourmet Dining</li>
                        <li>🌐 Free Wi-Fi & 24/7 Concierge</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- WHY US SECTION -->
    <section id="why-us" class="section bg-light py-5">
        <div class="container text-center">
            <div class="section-title mb-4">
                <h2>Why Choose Us</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <h4>Best Price Guarantee</h4>
                    <p>We ensure you receive the best rates with every booking.</p>
                </div>
                <div class="col-md-4">
                    <h4>Tailored Experiences</h4>
                    <p>Enjoy personalized stays suited for your every need.</p>
                </div>
                <div class="col-md-4">
                    <h4>Prime Location</h4>
                    <p>Right in the heart of Pokhara – minutes from key landmarks.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ROOMS SECTION -->
    <section id="rooms" class="section py-5 bg-white">
        <div class="container">
            <div class="section-title text-center mb-4">
                <h2>Explore Our Rooms</h2>
                <p class="text-muted">Choose from our range of rooms designed for comfort and luxury.</p>
            </div>

            <ul class="nav nav-tabs justify-content-center mb-3" id="roomTabs" role="tablist">
                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#standard">Standard</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#deluxe">Deluxe</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#family">Family</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#executive">Executive</a></li>
            </ul>

            <div class="tab-content">
                @foreach (['standardRooms' => 'standard', 'deluxeRooms' => 'deluxe', 'familyRooms' => 'family', 'executiveRooms' => 'executive'] as $var => $id)
                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="{{ $id }}">
                        <div class="row">
                            @forelse($$var as $room)
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100 position-relative">
                                        @if ($room->image_path)
                                            <img src="{{ asset('storage/' . $room->image_path) }}" class="card-img-top"
                                                alt="Room Image">
                                        @endif
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $room->title }}</h5>
                                            <p class="card-text">{{ $room->description }}</p>
                                            <p><strong>Capacity:</strong> {{ $room->capacity }}</p>
                                            <p><strong>Price:</strong> Rs. {{ $room->price }}</p>
                                            <span class="badge bg-{{ $room->is_available ? 'success' : 'danger' }}">
                                                {{ $room->is_available ? 'Available' : 'Unavailable' }}
                                            </span>
                                        </div>
                                        <a href="#book-room" class="stretched-link book-room-link"
                                            data-room-type="{{ $room->title }}" data-room-price="{{ $room->price }}">
                                        </a>
                                    </div>
                                </div>
                            @empty
                                <p class="text-muted">No {{ ucfirst($id) }} rooms available at the moment.</p>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


    <!-- EVENTS SECTION -->
    <section id="events" class="section py-5 bg-light">
        <div class="container">
            <div class="section-title text-center mb-4">
                <h2>Upcoming Events</h2>
                <p class="text-muted">We host a variety of unforgettable events!</p>
            </div>

            <div class="row">
                @foreach ($events as $event)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100">
                            @if ($event->image)
                                <img src="{{ asset('uploads/' . $event->image) }}" class="card-img-top" alt="Event">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $event->topic }}</h5>
                                <p class="card-text">{{ $event->content }}</p>
                                <p><strong>Price:</strong> Rs. {{ $event->price }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- BOOKING SECTION -->
    <section id="book-room" class="section py-5 bg-white">
        <div class="container">
            <div class="section-title text-center mb-4">
                <h2>Book Your Stay</h2>
                <p class="text-muted">Secure your room today – we look forward to welcoming you.</p>
            </div>
            <form method="POST" action="{{ route('room.book.esewa') }}">
                @csrf
                <div class="row g-3">
                    <!-- Room Type (readonly) -->
                    <div class="col-md-6">
                        <input type="text" id="roomTypeInput" name="room_type" class="form-control"
                            placeholder="Room Type" readonly required>
                    </div>

                    <!-- Room Price (readonly) -->
                    <div class="col-md-6">
                        <input type="number" id="priceInput" name="payment" class="form-control"
                            placeholder="Payment Amount" readonly required>
                    </div>

                    <!-- User Info -->
                    <div class="col-md-4">
                        <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-4">
                        <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" name="phone" class="form-control" placeholder="Your Phone" required>
                    </div>
                    <div class="col-md-4">
                        <input type="date" name="date" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <input type="time" name="time" class="form-control" required>
                    </div>
                    <div class="col-md-4">
                        <input type="number" name="people" class="form-control" placeholder="# of People" required>
                    </div>
                    <div class="col-md-12">
                        <textarea name="message" rows="4" class="form-control" placeholder="Any special requests?"></textarea>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button class="btn btn-success" type="submit">Submit Booking</button>
                </div>
            </form>


        </div>
    </section>

    <!-- CONTACT SECTION -->
    <section id="contact" class="section py-5 bg-light">
        <div class="container">
            <div class="section-title text-center mb-4">
                <h2>Contact Us</h2>
                <p class="text-muted">Need help? We're just a call or email away.</p>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>📍 Address:</strong> Lakeside Street 16, Pokhara</p>
                    <p><strong>📞 Phone:</strong> +977 9800000000</p>
                    <p><strong>📧 Email:</strong> hotelAHP@gmail.com</p>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('contact.submit') }}" method="POST">
                        @csrf
                        <input type="text" name="name" class="form-control mb-2" placeholder="Your Name" required>
                        <input type="email" name="email" class="form-control mb-2" placeholder="Your Email"
                            required>
                        <input type="text" name="subject" class="form-control mb-2" placeholder="Subject" required>
                        <textarea name="message" class="form-control mb-2" rows="4" placeholder="Your Message" required></textarea>
                        <button class="btn btn-primary" type="submit">Send Message</button>
                    </form>

                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const links = document.querySelectorAll('.book-room-link');
            const roomInput = document.getElementById('roomTypeInput');
            const priceInput = document.getElementById('priceInput');

            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    const type = this.getAttribute('data-room-type');
                    const price = this.getAttribute('data-room-price');

                    roomInput.value = type;
                    priceInput.value = price;
                });
            });
        });
    </script>
@endsection
