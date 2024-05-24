<header>
    <nav class="navbar navbar-expand-lg  h-100 ">
        <div class="container-fluid h-100 d-flex justify-content-between ">

          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('admin.home')}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{route('home')}}" target="_blank">Home Pubblica</a>
              </li>

            </ul>
          </div>
          <div>
               <form action="{{route('logout')}}" method="POST">
                  @csrf
                  <p class="text-capitalize d-inline me-3 ">{{Auth::user()->name}}</p>
                  <button type="submit" class="btn btn-danger me-3"><i class="fa-solid fa-right-from-bracket"></i></button>
              </form>
          </div>
        </div>
      </nav>
</header>
