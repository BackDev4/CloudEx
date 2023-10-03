<!DOCTYPE html>
<html lang="en">
<head>
    @include('.front.includes.head_dashboard')
    <title>CloudEx - Cloud mining platform</title>
</head>
<body>

@include('.front.includes.sidebar')

<main class="main page-wrapper" id="main">
    <div class="container-dashboard">
        <section class="bonuses">
            <div class="dashboard-info">
                <h2 class="title">Get bonuses</h2>
                <p class="text">Increase your power with a couple of clicks</p>
            </div>
            <div class="bonuses__list">
                <div class="bonuses__block">
                    <div class="bonuses__info">
                        <div class="bonuses__title">Get a random bonus from 1 to 5 GH/s</div>
                        <div class="bonuses__text">Get a random bonus from 1 to 5 GH/s</div>
                    </div>
                    <button id="bonus-btn" class="bonuses__btn" data-bs-toggle="modal" data-bs-target="#ModalBonus"
                            @if(session()->get('disable_button_until') && now()->lt(session()->get('disable_button_until'))) disabled @endif>
                        Get
                        Bonus
                    </button>
                </div>
                <div class="bonuses__block">
                    <div class="bonuses__info">
                        <div class="bonuses__title">YouTube review campaign</div>
                        <div class="bonuses__text">Earn from 20 GH/s to 8000 GH/s for each YouTube review of
                            CryptoStation
                        </div>
                    </div>
                    <a href="#">
                        <div class="bonuses__link">
                            <img src="images/send.svg" alt="send">
                            <div>@cryptostation_agent</div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <section class="withdrawals">
            <div class="dashboard-info">
                <h2 class="title">All Bonuses</h2>
                <p class="text">History of all your received bonuses</p>
            </div>
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                    <tr>
                        <th scope="col">System</th>
                        <th scope="col">Time</th>
                        <th scope="col">Power</th>
                        <th scope="col">Comment</th>
                    </tr>
                    </thead>
                    @foreach($bonuses as $bonus)
                        <tbody>
                        <tr>
                            <td>{{$bonus->updated_at}}</td>
                            <td>Random bonus</td>
                            <td>{{$bonus->bonus}} GH/s</td>
                            <td>Random bonus</td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </section>
    </div>


    <!--Modal bonus-->
    <div class="modal fade" id="ModalBonus" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-form">
                        <div class="modal-title">
                            <img src="images/play.svg" alt="user">
                            <h1 class="text-left">You received {{random_int(1,5)}} GH/s</h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <form action="{{route('.dashboard.getbonus')}}">
                            <div class="modal-info-alert"
                                 style="font-size: 24px; opacity: 0.6; padding: 32px 0 42px; max-width: 580px;">Your
                                bonus has already been credited to the power balance. Come back in 6 hours
                            </div>
                            <button id="bonus-btn-modal" type="submit" class="btn btn-light modal-btn">Thank you
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>


@vite(['resources/views/front/js/bootstrap.bundle.js',
'resources/views/front/js/dashboard.js'])

</body>
</html>
