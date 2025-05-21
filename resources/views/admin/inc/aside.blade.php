<aside class="bg-light p-3" style="width: 250px;">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="navbar-brand" href="{{ route('admin.index') }}">Admin Panel</a>
        </li>

        <!-- Events Dropdown -->
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#eventsMenu" role="button"
                aria-expanded="false" aria-controls="eventsMenu">
                Events
            </a>
            <div class="collapse" id="eventsMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="{{ route('admin.events.index') }}" class="nav-link">All Events</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.events.create') }}" class="nav-link">Create Event</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Room Bookings -->
        <li class="nav-item">
            <a href="{{ route('admin.room.bookings') }}" class="nav-link">User Bookings</a>
        </li>

        <!-- Standard Room Dropdown -->
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#standardMenu" role="button"
                aria-expanded="false" aria-controls="standardMenu">
                Standard Rooms
            </a>
            <div class="collapse" id="standardMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="{{ route('admin.rooms.standard.index') }}" class="nav-link">All Standard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.rooms.standard.create') }}" class="nav-link">Create Standard</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Deluxe Room Dropdown -->
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#deluxeMenu" role="button"
                aria-expanded="false" aria-controls="deluxeMenu">
                Deluxe Rooms
            </a>
            <div class="collapse" id="deluxeMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="{{ route('admin.rooms.deluxe.index') }}" class="nav-link">All Deluxe</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.rooms.deluxe.create') }}" class="nav-link">Create Deluxe</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Family Room Dropdown -->
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#familyMenu" role="button"
                aria-expanded="false" aria-controls="familyMenu">
                Family Rooms
            </a>
            <div class="collapse" id="familyMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="{{ route('admin.rooms.family.index') }}" class="nav-link">All Family</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.rooms.family.create') }}" class="nav-link">Create Family</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Executive Room Dropdown -->
        <li class="nav-item">
            <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" href="#executiveMenu" role="button"
                aria-expanded="false" aria-controls="executiveMenu">
                Executive Rooms
            </a>
            <div class="collapse" id="executiveMenu">
                <ul class="nav flex-column ms-3">
                    <li class="nav-item">
                        <a href="{{ route('admin.rooms.executive.index') }}" class="nav-link">All Executive</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.rooms.executive.create') }}" class="nav-link">Create Executive</a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Contact Messages -->
        <li class="nav-item">
            <a href="{{ route('admin.contact.index') }}" class="nav-link">Contact Messages</a>
        </li>
    </ul>
</aside>
