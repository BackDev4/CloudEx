<img src="images/bgdash.png" class="bg-image" alt="background">
<style>
    .bg-image {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: top;
        z-index: -1;
    }
</style>

<header class="header">
    <div class="header__container pad">
        <div class="header__toggle" id="header-toggle">
            <i class='bx bx-menu'></i>
        </div>
        <form action="{{route('logout')}}" method="post">
            @csrf
            <button type="submit" class="btn-custom btn-lite">Log Out</button>
        </form>
    </div>
</header>
<div class="sidebar" id="sidebar">
    <nav class="sidebar__container">
        <div class="sidebar-one">
            <div class="sidebar__logo">
                <a href="{{route('home')}}"><img src="images/cloud.svg" alt="" class="sidebar__logo-img"></a>
                <a href="{{route('home')}}"><img src="images/logotext.svg" alt="" class="sidebar__logo-text"></a>
            </div>
            <div class="sidebar__content">
                <div class="sidebar__list">
                    <a href="{{route('dashboard')}}" class="sidebar__link active-link">
                        <img src="images/dashboard.svg" alt="dashboard">
                        <span class="sidebar__link-name">Dashboard</span>
                        <span class="sidebar__link-floating">Dashboard</span>
                    </a>
                    <a href="{{route('.dashboard.deposit')}}" class="sidebar__link">
                        <img src="images/depositg.svg" alt="deposit">
                        <span class="sidebar__link-name">Deposit</span>
                        <span class="sidebar__link-floating">Deposit</span>
                    </a>
                    <a href="{{route('.dashboard.referrals')}}" class="sidebar__link">
                        <img src="images/referals.svg" alt="referals">
                        <span class="sidebar__link-name">Referrals</span>
                        <span class="sidebar__link-floating">Referrals</span>
                    </a>
                    <a href="{{route('.dashboard.bonuses')}}" class="sidebar__link">
                        <img src="images/bonuses.svg" alt="bonuses">
                        <span class="sidebar__link-name">Bonuses</span>
                        <span class="sidebar__link-floating">Bonuses</span>
                    </a>
                    <a href="{{route('.dashboard.telegram')}}" class="sidebar__link">
                        <img src="images/telegrambot.svg" alt="telegrambot">
                        <span class="sidebar__link-name">Telegram Bot</span>
                        <span class="sidebar__link-floating">Telegram Bot</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="sidebar-two">
            <div class="sidebar__content">
                <div class="sidebar__list">
                    <a href="{{route('home')}}" class="sidebar__link">
                        <img src="images/back.svg" alt="telegrambot">
                        <span class="sidebar__link-name">Back to Site</span>
                        <span class="sidebar__link-floating">Back to Site</span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>
