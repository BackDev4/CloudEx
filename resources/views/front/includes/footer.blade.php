<footer class="footer">
    <div class="container">
        <div class="footer__top">
            <nav class="nav">
                <div class="logo">
                    <a class="logo-img" href="/">
                        <img src="{{asset('images/logo.svg')}}" alt="logo">
                    </a>
                </div>
                <div class="menu">
                    <ul class="menu-list list">
                        <li class="menu-item"><a class="menu-link" href="#">Home</a></li>
                        <li class="menu-item"><a class="menu-link" href="#">Statistics</a></li>
                        <li class="menu-item"><a class="menu-link cas" href="#">Affilate System</a></li>
                        <li class="menu-item nav-item dropdown"><a class="menu-link dropdown-toggle" href="#"
                                                                   id="navbarDarkDropdownMenuLink" role="button"
                                                                   data-bs-toggle="dropdown"
                                                                   aria-expanded="false">Help</a>
                            <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">FAQ</a></li>
                                <li><a class="dropdown-item" href="#">About Us</a></li>
                                <li><a class="dropdown-item" href="#">Terms</a></li>
                                <li><a class="dropdown-item" href="#">Plans</a></li>
                                <li><a class="dropdown-item" href="#">Contacts</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                @auth
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        <button type="submit" class="btn-custom btn-lite">Log Out</button>
                    </form>
                @else
                    <div class="header-btn menu">
                        <a href="#" class="btn-custom btn-lite" data-bs-toggle="modal" data-bs-target="#ModalLogin">Log
                            In</a>
                        <a href="#" class="btn-custom btn-bold" data-bs-toggle="modal" data-bs-target="#ModalRegister">Register</a>
                    </div>
                @endauth
            </nav>
        </div>
    </div>
</footer>


<!--Modal login-->
<div class="modal fade" id="ModalLogin" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-form">
                    <div class="modal-title">
                        <img src="{{asset('images/user.svg')}}" alt="user">
                        <h1 class="text-left">Log In</h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="modal-block-one">
                            <label for="exampleInputEmail1" class="modal-label">Email address</label>
                            <input type="email" class="form-input modal-input" placeholder="" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" name="email">
                        </div>
                        <div class="modal-block-two">
                            <label for="exampleInputPassword1" class="modal-label">Enter Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-hide-icon border-end-0 password modal-input"
                                       id="sign_in_password" name="password"><a href="javascript:;"
                                                                class="input-group-text bg-transparent"><i
                                        class="bx bx-show eye-icon"></i></a>
                            </div>
                        </div>
                        <div class="linkreset">
                            <a class="respass" href="#">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn btn-light modal-btn">Log In</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal register-->
<div class="modal fade" id="ModalRegister" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-form">
                    <div class="modal-title">
                        <img src="images/userplus.svg" alt="user">
                        <h1 class="text-left">Registration</h1>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <form action="{{route('register')}}" method="post">
                        @csrf
                        <div class="modal-block-one">
                            <label for="exampleInputEmail1" class="modal-label">Email Address</label>
                            <input type="email" class="form-input modal-input" placeholder="" id="exampleInputEmail1"
                                   aria-describedby="emailHelp" name="email">
                        </div>
                        <div class="modal-block-one">
                            <label class="modal-label">Referal Link (If have)</label>
                            <input type="text" class="form-input modal-input" name="referral_user">
                        </div>
                        <div class="modal-block-three">
                            <label for="exampleInputPassword1" class="modal-label">Enter Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-hide-icon border-end-0 password modal-input"
                                       id="sign_in_password" name="password"><a href="javascript:;"
                                                                                class="input-group-text bg-transparent"><i
                                        class="bx bx-show eye-icon"></i></a>
                            </div>
                        </div>
                        <div class="modal-block-three">
                            <label for="exampleInputPassword1" class="modal-label">Repeat Password</label>
                            <div class="input-group" id="show_hide_password">
                                <input type="password" class="form-hide-icon border-end-0 password modal-input"
                                       id="sign_in_password"><a href="javascript:;"
                                                                class="input-group-text bg-transparent"><i
                                        class="bx bx-show eye-icon"></i></a>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-light modal-btn">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@vite([
    "resources/views/front/js/calculator.js",
    "resources/views/front/js/hideinput.js",
    "resources/views/front/js/bootstrap.bundle.js",])
