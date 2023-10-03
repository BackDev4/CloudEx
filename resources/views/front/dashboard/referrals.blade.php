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
        <section class="referal">
            <div class="dashboard-info">
                <h2 class="title">Referral program</h2>
                <p class="text">Get rewarded for your referrals</p>
            </div>
            @if($referrals)
            @foreach($referrals as $ref)
            <div class="power">
                <div class="power__list referal__list">
                    <div class="power__item">
                        <div class="power__label">Level 1 referrals</div>
                        <div class="power__block">
                            <input type="text" class="power__input" value="{{count($referrals->where('level', 1))}} People" readonly>
                            <img src="images/userfill.svg" alt="">
                        </div>
                    </div>
                    <div class="power__item">
                        <div class="power__label">Level 2 referrals</div>
                        <div class="power__block">
                            <input type="text" class="power__input" value="{{count($referrals->where('level', 2))}} People" readonly>
                            <img src="images/userfill.svg" alt="">
                        </div>
                    </div>
                    <div class="power__item">
                        <div class="power__label">Level 3 referrals</div>
                        <div class="power__block">
                            <input type="text" class="power__input" value="{{count($referrals->where('level', 3))}} People" readonly>
                            <img src="images/userfill.svg" alt="">
                        </div>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="link-referral">
                <div class="link-referral__block">
                    <div class="link-referral__title">Your unique affiliate link</div>
                    <div class="lite-info">Use this link to invite new members and earn cryptocurrency.</div>
                </div>
                <div class="input-group" id="show_hide_password">
                    <input id="foo" type="text" value="{{$referralLink}}"
                           class="form-hide-icon border-end-0 modal-input" readonly>
                    <button data-clipboard-target="#foo" class="input-group-text bg-transparent btn-all-modal"><i
                            class='bx bx-copy'></i></button>
                </div>
            </div>

        </section>
        <section class="bonus">
            <div class="dashboard-info">
                <h2 class="title">Bonus system</h2>
                <p class="text">Get rewarded for the 3-tier system</p>
            </div>
            <div class="affilate-list">
                <div class="block about-block affilate-block">
                    <h2 class="page-top level">SECOND LEVEL</h2>
                    <h3 class="procent">5%</h3>
                    <p class="page-bottom">+2 GH/s for deposit</p>
                </div>
                <div class="block about-block affilate-block affilate-block-active" style="padding-top: ">
                    <h2 class="page-top level">FIRST LEVEL</h2>
                    <h3 class="procent">10%</h3>
                    <p class="page-bottom">+3 GH/s for each deposit & <br>+1 GH/s user registration</p>
                </div>
                <div class="block about-block affilate-block">
                    <h2 class="page-top level">THIRD LEVEL</h2>
                    <h3 class="procent">1%</h3>
                    <p class="page-bottom">+1 GH/s for deposit</p>
                </div>

            </div>

        </section>
        <section class="withdrawals">
            <div class="dashboard-info">
                <h2 class="title">Affiilate Deposits</h2>
                <p class="text">History of all your referrals deposit transactions</p>
            </div>
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                    <tr>
                        <th scope="col">System</th>
                        <th scope="col">Time</th>
                        <th scope="col">Deposit</th>
                        <th scope="col">Commission</th>
                        <th scope="col">Bonus</th>
                        <th scope="col">Comment</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>DOGE</td>
                        <td>23.08.21 19:56:63</td>
                        <td>13.000000000000</td>
                        <td>1231.228</td>
                        <td>0.228</td>
                        <td>Comment</td>
                    </tr>
                    <tr>
                        <td>DOGE</td>
                        <td>23.08.21 19:56:63</td>
                        <td>13.000000000000</td>
                        <td>1231.228</td>
                        <td>0.228</td>
                        <td>Comment</td>
                    </tr>
                    <tr>
                        <td>DOGE</td>
                        <td>23.08.21 19:56:63</td>
                        <td>13.000000000000</td>
                        <td>1231.228</td>
                        <td>0.228</td>
                        <td>Comment</td>
                    </tr>
                    <tr>
                        <td>DOGE</td>
                        <td>23.08.21 19:56:63</td>
                        <td>13.000000000000</td>
                        <td>1231.228</td>
                        <td>0.228</td>
                        <td>Comment</td>
                    </tr>
                    <tr>
                        <td>DOGE</td>
                        <td>23.08.21 19:56:63</td>
                        <td>13.000000000000</td>
                        <td>1231.228</td>
                        <td>0.228</td>
                        <td>Comment</td>
                    </tr>
                    <tr>
                        <td>DOGE</td>
                        <td>23.08.21 19:56:63</td>
                        <td>13.000000000000</td>
                        <td>1231.228</td>
                        <td>0.228</td>
                        <td>Comment</td>
                    </tr>
                    <tr>
                        <td>DOGE</td>
                        <td>23.08.21 19:56:63</td>
                        <td>13.000000000000</td>
                        <td>1231.228</td>
                        <td>0.228</td>
                        <td>Comment</td>
                    </tr>


                    </tbody>
                </table>
            </div>
        </section>
    </div>
</main>


<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.11/clipboard.min.js"></script>

@vite(["resources/views/front/js/bootstrap.bundle.js",
    "resources/views/front/js/dashboard.js",])

<script defer>
    var btns = document.querySelectorAll('button');
    var clipboard = new ClipboardJS(btns);

    clipboard.on('success', function (e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
    });

    clipboard.on('error', function (e) {
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
    });
</script>
</body>
</html>
