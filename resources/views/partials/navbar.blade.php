<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                @auth

                <li class="nav-item ms-4">
                    <a class="nav-link {{ ($active === 'notes') ? 'active' : '' }}" href="/notes">Notes</a>
                </li>
                <li class="nav-item ms-5">
                    <a class="nav-link {{ ($active === 'create') ? 'active' : '' }}"" href=" /notes/create">Add Note</a>
                </li>
                <li class="nav-item ms-5">
                    <a class="nav-link {{ ($active === 'category') ? 'active' : '' }}"" href=" /category">Category</a>
                </li>
                <li class="nav-item ms-5">
                    <a class="nav-link {{ ($active === 'galery') ? 'active' : '' }}"" href=" /galery">Galery Image</a>
                </li>
                @endauth

            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/profile">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                </li>

                @else

                <li class="nav-item">
                    <a href="/login" class="nav-link ">Login</a>
                </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>