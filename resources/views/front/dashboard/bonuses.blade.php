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
                    <button id="bonus-btn" class="bonuses__link" data-bs-toggle="modal" data-bs-target="#ModalBonus"
                            @if(session()->get('disable_button_until') && now()->lt(session()->get('disable_button_until'))) disabled @endif>
                        Get
                        Bonus
                        <div id="timer"></div>
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
                        <th scope="col">Time</th>
                        <th scope="col">Power</th>
                        <th scope="col">Comment</th>
                    </tr>
                    </thead>
                    @foreach($bonuses as $bonus)
                        <tbody>
                        <tr>
                            <td>{{$bonus->created_at}}</td>
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


<script>
    // Определение времени окончания
    let endDateTime;

    function getEndDateTime() {
        let savedEndDateTime = localStorage.getItem('endDateTime');

        if (savedEndDateTime) {
            return new Date(savedEndDateTime);
        } else {
            let newEndDateTime = new Date();
            newEndDateTime.setHours(newEndDateTime.getHours() + 6);
            return newEndDateTime;
        }
    }

    // Функция для форматирования чисел
    function formatNumber(number) {
        return number.toString().padStart(2, '0');
    }

    // Функция для обновления таймера
    function updateTimer() {
        let now = new Date(); // Текущая дата и время
        let difference = endDateTime - now; // Разница между окончанием и текущим временем в миллисекундах

        if (document.getElementById('bonus-btn').disabled) {
            document.getElementById('bonus-btn').classList.add("bonuses__btn");
            if (difference <= 0) {
                // Время истекло, отключаем кнопку
                document.getElementById('bonus-btn').disabled = true;
            } else {
                // Расчет оставшегося времени
                let hours = Math.floor(difference / (1000 * 60 * 60));
                let minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((difference % (1000 * 60)) / 1000);

                // Формирование строки времени
                let timeString = formatNumber(hours) + ':' + formatNumber(minutes) + ':' + formatNumber(seconds);

                // Вывод времени
                document.getElementById('timer').textContent = timeString;
            }
        }

        // Обновление таймера каждую секунду
        setTimeout(updateTimer, 1000);
    }

    // Запуск таймера при загрузке страницы
    endDateTime = getEndDateTime();
    localStorage.setItem('endDateTime', endDateTime);
    updateTimer();
</script>
</body>
</html>
