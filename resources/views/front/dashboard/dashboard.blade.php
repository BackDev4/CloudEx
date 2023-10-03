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
        <section class="mining-crypto">
            <div class="dashboard-info">
                <h2 class="title">Manage your mining processes</h2>
                <p class="text">Distribute power between cryptocurrencies, invest and withdraw money</p>
            </div>
            <div class="mining">
                @foreach($wallet as $wal)
                    <div class="mining-card">
                        <div class="mining-title">
                            <img src="images/{{strtolower($wal->currency)}}.svg" alt="btc">
                            <div class="mining-text">{{$wal->currency}}</div>
                        </div>
                        <div class="mining-buttons">
                            {{--                            <form class="d-flex">--}}
                            <i class='fa mining-icon'></i>
                            <input class="number-mining-btn" type="text" id="numberInput"
                                   value="{{$wal->invested_power}}" readonly>
                            <div class="d-flex align-items-center">
                                <div>
                                    <button name="up" class="mining-btn increment-btn" data-id-up="{{$wal->id}}"><i
                                            class='bx bx-chevron-up'></i></button>
                                </div>
                                <div>
                                    <button name="down" class="mining-btn decrement-btn" data-id-down="{{$wal->id}}"><i
                                            class='bx bx-chevron-down'></i></button>
                                </div>
                                <div>
                                    <button name="all" class="mining-btn all-btn" data-id-all="{{$wal->id}}">ALL
                                    </button>
                                </div>
                            </div>
                            {{--                            </form>--}}
                        </div>
                    </div>
                @endforeach
            </div>
            {{--            @if($power)--}}
            {{--                @foreach($power as $pow)--}}
            <div class="power">
                <div class="power__list">
                    <div class="power__item">
                        <div class="power__label">Total Power</div>
                        <div class="power__block">
                            <input type="text" class="power__input" value="{{$power->total_power}} GH/s" readonly>
                            <img src="images/lightning.svg" alt="">
                        </div>
                    </div>
                    <div class="power__item">
                        <div class="power__label">Unused Power</div>
                        <div class="power__block">
                            <input type="text" class="power__input" id="unused" value="{{$power->unused_power}} GH/s"
                                   readonly>
                            <img src="images/lightning.svg" alt="">
                        </div>
                    </div>
                    <div class="power__item">
                        <div class="power__label">Active Plan</div>
                        <div class="power__block">
                            <input type="text" class="power__input" value="{{$power->active_plan}}%" readonly>
                            <img src="images/plan.svg" alt="plan">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{--        @endforeach--}}
        {{--        @endif--}}
        <section class="balance">
            <div class="dashboard-info">
                <h2 class="title">Your balances</h2>
                <p class="text">Reinvest or withdraw funds</p>
            </div>
            @foreach($wallet as $wal)
                {{--                @if($wal->invested_power != 0)--}}
                <div class="balance__list">
                    <div class="balance__item">
                        <div class="balance__info-list">
                            <img class="balance__img" src="../images/{{strtolower($wal->currency)}}.svg" alt="btc">
                            <div class="balance__info">
                                <div
                                    class="balance__crypto" data-speed="{{$wal->id/100000000000}}"
                                    data-currency="{{$wal->currency}}">{{$wal->amount . ' ' . $wal->currency}} </div>
                                <div class="balance__ghs" data-id="{{$wal->id}}">{{$wal->invested_power}} GH/s</div>
                            </div>
                        </div>
                        <div class="balance__btn">
                            <a href="#" class="btn-custom btn-lite" data-bs-toggle="modal"
                               data-bs-target="#ModalWithdrawal{{$wal->id}}">Withdrawal</a>
                            <a href="#" class="btn-custom btn-bold" data-bs-toggle="modal"
                               data-bs-target="#ModalReinvest{{$wal->id}}">Reinvest</a>
                        </div>
                    </div>
                </div>
                {{--                @endif--}}
            @endforeach
        </section>
        <section class="withdrawals">
            <div class="dashboard-info">
                <h2 class="title">Your withdrawals</h2>
                <p class="text">History of all your transactions</p>
            </div>
            <div class="table-responsive">
                <table class="table table-striped custom-table">
                    <thead>
                    <tr>
                        <th scope="col">System</th>
                        <th scope="col">Time</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Hash</th>
                        <th scope="col">Type</th>
                        <th scope="col" style="padding-left: unset;">Explorer</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>BNB</td>
                        <td>23.08.21 19:51:18</td>
                        <td>13.000000000000</td>
                        <td>6c124154aec52f9dceb6d3d4...</td>
                        <td>Deposit</td>
                        <td class="explorer"><a href="#">Explorer</a></td>
                    </tr>
                    <tr>
                        <td>ETH</td>
                        <td>23.08.21 19:58:01</td>
                        <td>15.000000000000</td>
                        <td>6c124154aec52f9dceb6d3d4...</td>
                        <td>Deposit</td>
                        <td class="explorer"><a href="#">Explorer</a></td>
                    </tr>
                    <tr>
                        <td>DOGE</td>
                        <td>23.08.21 19:51:56</td>
                        <td>0.0200000000000</td>
                        <td>6c124154aec52f9dceb6d3d4...</td>
                        <td>Withdraw</td>
                        <td class="explorer"><a href="#">Explorer</a></td>
                    </tr>
                    <tr>
                        <td>BTC</td>
                        <td>23.08.21 19:56:86</td>
                        <td>0.02012333310000</td>
                        <td>6c124154aec52f9dceb6d3d4...</td>
                        <td>Deposit</td>
                        <td class="explorer"><a href="#">Explorer</a></td>
                    </tr>
                    <tr>
                        <td>LTC</td>
                        <td>23.08.21 19:54:12</td>
                        <td>13.000000000000</td>
                        <td>6c124154aec52f9dceb6d3d4...</td>
                        <td>Withdraw</td>
                        <td class="explorer"><a href="#">Explorer</a></td>
                    </tr>
                    <tr>
                        <td>TRX</td>
                        <td>23.08.21 19:51:11</td>
                        <td>0.0200000000000</td>
                        <td>6c124154aec52f9dceb6d3d4...</td>
                        <td>Withdraw</td>
                        <td class="explorer"><a href="#">Explorer</a></td>
                    </tr>
                    <tr>
                        <td>DOGE</td>
                        <td>23.08.21 19:56:63</td>
                        <td>115.000000000000</td>
                        <td>6c124154aec52f9dceb6d3d4...</td>
                        <td>Withdraw</td>
                        <td class="explorer"><a href="#">Explorer</a></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>

    <!--Modal Withdrawal-->
    @foreach($wallet as $wal)
        <div class="modal fade" id="ModalWithdrawal{{$wal->id}}" tabindex="-1" aria-labelledby="ModalFormLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-form">
                            <div class="modal-title">
                                <img src="images/upload.svg" alt="user">
                                <h1 class="text-left">Withdrawal</h1>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <form>
                                <div class="modal-block-one">
                                    <label class="modal-label">Available balance</label>
                                    <input type="number" class="form-input modal-input active-modal-input"
                                           value="{{$wal->amount}}" readonly>
                                </div>
                                <div class="modal-block-two" style="padding-bottom: 40px;">
                                    <label class="modal-label">Enter sum to reinvest</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="number" class="form-hide-icon border-end-0 modal-input">
                                        <button class="input-group-text bg-transparent btn-all-modal">ALL</button>
                                    </div>
                                </div>
                                <div class="modal-block-three">
                                    <label class="modal-label">Enter your {{$wal->currency}} Address</label>
                                    <input type="text" class="form-input modal-input">
                                </div>
                                <button type="submit" class="btn btn-light modal-btn">Withdrawal</button>
                            </form>
                            <div class="modal-info">When withdrawing from your remaining balance will be deducted0.0002
                                BTC
                                as a transaction processing fee.The minimum withdrawal amount is0.015 BTC.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal Reinvest-->
        <div class="modal fade" id="ModalReinvest{{$wal->id}}" tabindex="-1" aria-labelledby="ModalFormLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="modal-form">
                            <div class="modal-title">
                                <img src="images/play.svg" alt="user">
                                <h1 class="text-left">Reinvest</h1>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <form>
                                <div class="modal-block-one">
                                    <label class="modal-label">Available balance</label>
                                    <input type="number" class="form-input modal-input active-modal-input"
                                           value="{{$wal->amount}}" readonly>
                                </div>
                                <div class="modal-block-two" style="padding-bottom: 57px;">
                                    <label class="modal-label">Enter sum to reinvest</label>
                                    <div class="input-group" id="show_hide_password">
                                        <input type="number" class="form-hide-icon border-end-0 modal-input">
                                        <button class="input-group-text bg-transparent btn-all-modal">ALL</button>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-light modal-btn">Reinvest</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</main>

@vite(["resources/views/front/js/dashboard.js",
       "resources/views/front/js/bootstrap.bundle.js"])
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
