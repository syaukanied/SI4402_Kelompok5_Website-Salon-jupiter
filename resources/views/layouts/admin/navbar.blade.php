<style>
    .nav-item .nav-link a {
        text-decoration: none;
        color: black;
        font-weight: bold;
    }

    .nav-link.active a {
        color: #F4926B;
    }

</style>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold">Barberskuy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            </ul>
            <a class="navbar-brand">{{Auth::guard('web_barber')->user()->name}}</a>
            <span class="navbar-text d-flex" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#profile">
                <img src="
                    @if (Auth::guard('web_barber')->user()->image != null)
                        {{ asset(Auth::guard('web_barber')->user()->image) }}
                    @else
                        {{ asset('/assets/images/member-1.png') }}
                    @endif
                " alt="" width="60px">
            </span>
        </div>
    </div>
</nav>

@include('components.modal.admin_profile')
