<nav class="navbar navbar-expand-lg shadow-lg">
    <div class="container-fluid p-4">
        <a class="navbar-brand d-flex align-items-center ms-5" href="#">
            <img src="{{ Storage::url('img/logo.png') }}" alt="detikcom" width="250px"
                class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <form class="d-flex ms-3 p-3 w-25">
            <input class="rounded-pill form-control me-2 bg-dark-subtle" type="search" placeholder="Cari Training"
                aria-label="Search">
        </form>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-5 gap-3">
                <li class="nav-item">
                    <a class="nav-link active fs-5 fw-semibold text-primary" aria-current="page" href="#">All
                        Training</a>
                </li>
                <li class="nav-item fs-5 fw-semibold">
                    <a class="nav-link" href="#">My Training</a>
                </li>
                <li class="nav-item fs-5 fw-semibold">
                    <a class="nav-link" href="#">Dashboard</a>
                </li>
            </ul>
            <div class="dropdown me-5">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle me-5" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownMenuUser1">
                    <li><a class="dropdown-item text-primary fw-semibold" href="#">{{ Auth::user()->name }}</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')" class="dropdown-item"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </form>
                    {{-- <li><a class="dropdown-item" href="#">Logout out</a></li> --}}
                </ul>
            </div>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"></script>
