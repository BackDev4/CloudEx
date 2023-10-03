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
        <section class="calculate-main calculate-dashboard">
            <div class="dashboard-info">
                <h2 class="title">Calculate your profit and deposit</h2>
                <p class="text">Choose the plan that's right for you</p>
            </div>
            <ul class="crypto-list nav-pills" role="tablist">
                <li class="crypto-change" role="presentation">
                    <a class="nav-link active" data-bs-toggle="pill" href="#pills-btc" role="tab" aria-selected="true">
                        <div class="crypto-item">
                            <img src="images/btc.svg" class="crypto-img" alt="product img">
                            <div class="crypto-name">BTC</div>
                        </div>
                    </a>
                </li>
                <li class="crypto-change" role="presentation">
                    <a class="nav-link" data-bs-toggle="pill" href="#pills-eth" role="tab" aria-selected="false">
                        <div class="crypto-item">
                            <img src="images/eth.svg" class="crypto-img" alt="product img">
                            <div class="crypto-name">ETH</div>
                        </div>
                    </a>
                </li>
                <li class="crypto-change" role="presentation">
                    <a class="nav-link" data-bs-toggle="pill" href="#pills-bnb" role="tab" aria-selected="true">
                        <div class="crypto-item">
                            <img src="images/bnb.svg" class="crypto-img" alt="product img">
                            <div class="crypto-name">BNB</div>
                        </div>
                    </a>
                </li>
                <li class="crypto-change" role="presentation">
                    <a class="nav-link" data-bs-toggle="pill" href="#pills-ltc" role="tab" aria-selected="true">
                        <div class="crypto-item">
                            <img src="images/ltc.svg" class="crypto-img" alt="product img">
                            <div class="crypto-name">LTC</div>
                        </div>
                    </a>
                </li>
                <li class="crypto-change" role="presentation">
                    <a class="nav-link" data-bs-toggle="pill" href="#pills-trx" role="tab" aria-selected="true">
                        <div class="crypto-item">
                            <img src="images/trx.svg" class="crypto-img" alt="product img">
                            <div class="crypto-name">TRX</div>
                        </div>
                    </a>
                </li>
                <li class="crypto-change" role="presentation">
                    <a class="nav-link" data-bs-toggle="pill" href="#pills-doge" role="tab" aria-selected="true">
                        <div class="crypto-item">
                            <img src="images/doge.svg" class="crypto-img" alt="product img">
                            <div class="crypto-name">DOGE</div>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane fade active show" id="pills-btc" role="tabpanel">
                    <form class="form-profit">
                        <input type="hidden" id="btcRate" value="25908">
                        <div class="form-profit__inner">
                            <div class="profit-block-left">
                                <div class="profit-block">
                                    <div class="form-label">Enter BTC amount to invest:</div>
                                    <div class="form-inputs effect-hov">
                                        <input type="number" step="0.01" class="form-input" id="btcInput"
                                               placeholder="Enter sum">
                                        <div class="tedf d-flex align-items-center">
                                            <span style="opacity: 0.6">≈$</span>
                                            <div class="course" id="btcDollar">0.00</div>
                                        </div>
                                        <img src="images/btc.svg" alt="crypto">
                                    </div>
                                </div>
                            </div>
                            <div class="profit-block-right">
                                <div class="profit-block">
                                    <div class="profit-selector-block">
                                        <div>Profit per</div>
                                        <select class="select-dark" style="width: auto;"
                                                aria-label=".form-select-sm example" onchange="btcPeriod(this.value)">
                                            <option value="1">1 day</option>
                                            <option value="10">10 days</option>
                                            <option selected value="30">30 days</option>
                                            <option value="60">60 days</option>
                                            <option value="180">180 days</option>
                                        </select>
                                    </div>
                                    <div class="form-inputs form-inputs-active">
                                        <input type="text" class="form-input form-input-active" id="btcProfit"
                                               placeholder="0.0$" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="btcPlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="images/btc.svg" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="btcGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="images/lightning.svg" alt="crypto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-eth" role="tabpanel">
                    <form class="form-profit">
                        <input type="hidden" id="ethRate" value="1631.100000000">
                        <div class="form-profit__inner">
                            <div class="profit-block-left">
                                <div class="profit-block">
                                    <div class="form-label">Enter ETH amount to invest:</div>
                                    <div class="form-inputs effect-hov">
                                        <input type="number" step="0.01" class="form-input" id="ethInput"
                                               placeholder="Enter sum">
                                        <div class="tedf d-flex align-items-center">
                                            <span style="opacity: 0.6">≈$</span>
                                            <div class="course" id="ethDollar">0.00</div>
                                        </div>
                                        <img src="/images/eth.svg" alt="crypto">
                                    </div>
                                </div>
                            </div>
                            <div class="profit-block-right">
                                <div class="profit-block">
                                    <div class="profit-selector-block">
                                        <div>Profit per</div>
                                        <select class="select-dark" style="width: auto;"
                                                aria-label=".form-select-sm example" onchange="ethPeriod(this.value)">
                                            <option value="1">1 day</option>
                                            <option value="10">10 days</option>
                                            <option selected value="30">30 days</option>
                                            <option value="60">60 days</option>
                                            <option value="180">180 days</option>
                                        </select>
                                    </div>
                                    <div class="form-inputs form-inputs-active">
                                        <input type="text" class="form-input form-input-active" id="ethProfit"
                                               placeholder="0.0$" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="ethPlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="/images/eth.svg" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="ethGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="/images/lightning.svg" alt="crypto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-bnb" role="tabpanel">
                    <form class="form-profit">
                        <input type="hidden" id="bnbRate" value="215.6400000000000">
                        <div class="form-profit__inner">
                            <div class="profit-block-left">
                                <div class="profit-block">
                                    <div class="form-label">Enter BNB amount to invest:</div>
                                    <div class="form-inputs effect-hov">
                                        <input type="number" step="0.01" class="form-input" id="bnbInput"
                                               placeholder="Enter sum">
                                        <div class="tedf d-flex align-items-center">
                                            <span style="opacity: 0.6">≈$</span>
                                            <div class="course" id="bnbDollar">0.00</div>
                                        </div>
                                        <img src="images/bnb.svg" alt="crypto">
                                    </div>
                                </div>
                            </div>
                            <div class="profit-block-right">
                                <div class="profit-block">
                                    <div class="profit-selector-block">
                                        <div>Profit per</div>
                                        <select class="select-dark" style="width: auto;"
                                                aria-label=".form-select-sm example" onchange="bnbPeriod(this.value)">
                                            <option value="1">1 day</option>
                                            <option value="10">10 days</option>
                                            <option selected value="30">30 days</option>
                                            <option value="60">60 days</option>
                                            <option value="180">180 days</option>
                                        </select>
                                    </div>
                                    <div class="form-inputs form-inputs-active">
                                        <input type="text" class="form-input form-input-active" id="bnbProfit"
                                               placeholder="0.0$" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="bnbPlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="images/bnb.svg" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="bnbGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="images/lightning.svg" alt="crypto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-ltc" role="tabpanel">
                    <form class="form-profit">
                        <input type="hidden" id="ltcRate" value="63.6800000000000">
                        <div class="form-profit__inner">
                            <div class="profit-block-left">
                                <div class="profit-block">
                                    <div class="form-label">Enter LTC amount to invest:</div>
                                    <div class="form-inputs effect-hov">
                                        <input type="number" step="0.01" class="form-input" id="ltcInput"
                                               placeholder="Enter sum">
                                        <div class="tedf d-flex align-items-center">
                                            <span style="opacity: 0.6">≈$</span>
                                            <div class="course" id="ltcDollar">0.00</div>
                                        </div>
                                        <img src="images/ltc.svg" alt="crypto">
                                    </div>
                                </div>
                            </div>
                            <div class="profit-block-right">
                                <div class="profit-block">
                                    <div class="profit-selector-block">
                                        <div>Profit per</div>
                                        <select class="select-dark" style="width: auto;"
                                                aria-label=".form-select-sm example" onchange="ltcPeriod(this.value)">
                                            <option value="1">1 day</option>
                                            <option value="10">10 days</option>
                                            <option selected value="30">30 days</option>
                                            <option value="60">60 days</option>
                                            <option value="180">180 days</option>
                                        </select>
                                    </div>
                                    <div class="form-inputs form-inputs-active">
                                        <input type="text" class="form-input form-input-active" id="ltcProfit"
                                               placeholder="0.0$" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="ltcPlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="images/ltc.svg" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="ltcGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="images/lightning.svg" alt="crypto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-trx" role="tabpanel">
                    <form class="form-profit">
                        <input type="hidden" id="trxRate" value="0.0773240000000">
                        <div class="form-profit__inner">
                            <div class="profit-block-left">
                                <div class="profit-block">
                                    <div class="form-label">Enter TRX amount to invest:</div>
                                    <div class="form-inputs effect-hov">
                                        <input type="number" step="0.01" class="form-input" id="trxInput"
                                               placeholder="Enter sum">
                                        <div class="tedf d-flex align-items-center">
                                            <span style="opacity: 0.6">≈$</span>
                                            <div class="course" id="trxDollar">0.00</div>
                                        </div>
                                        <img src="images/trx.svg" alt="crypto">
                                    </div>
                                </div>
                            </div>
                            <div class="profit-block-right">
                                <div class="profit-block">
                                    <div class="profit-selector-block">
                                        <div>Profit per</div>
                                        <select class="select-dark" style="width: auto;"
                                                aria-label=".form-select-sm example" onchange="trxPeriod(this.value)">
                                            <option value="1">1 day</option>
                                            <option value="10">10 days</option>
                                            <option selected value="30">30 days</option>
                                            <option value="60">60 days</option>
                                            <option value="180">180 days</option>
                                        </select>
                                    </div>
                                    <div class="form-inputs form-inputs-active">
                                        <input type="text" class="form-input form-input-active" id="trxProfit"
                                               placeholder="0.0$" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="trxPlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="images/trx.svg" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="trxGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="images/lightning.svg" alt="crypto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="pills-doge" role="tabpanel">
                    <form class="form-profit">
                        <input type="hidden" id="dogeRate" value="0.0631380000000">
                        <div class="form-profit__inner">
                            <div class="profit-block-left">
                                <div class="profit-block">
                                    <div class="form-label">Enter DOGE amount to invest:</div>
                                    <div class="form-inputs effect-hov">
                                        <input type="number" step="0.01" class="form-input" id="dogeInput"
                                               placeholder="Enter sum">
                                        <div class="tedf d-flex align-items-center">
                                            <span style="opacity: 0.6">≈$</span>
                                            <div class="course" id="dogeDollar">0.00</div>
                                        </div>
                                        <img src="images/doge.svg" alt="crypto">
                                    </div>
                                </div>
                            </div>
                            <div class="profit-block-right">
                                <div class="profit-block">
                                    <div class="profit-selector-block">
                                        <div>Profit per</div>
                                        <select class="select-dark" style="width: auto;"
                                                aria-label=".form-select-sm example" onchange="dogePeriod(this.value)">
                                            <option value="1">1 day</option>
                                            <option value="10">10 days</option>
                                            <option selected value="30">30 days</option>
                                            <option value="60">60 days</option>
                                            <option value="180">180 days</option>
                                        </select>
                                    </div>
                                    <div class="form-inputs form-inputs-active">
                                        <input type="text" class="form-input form-input-active" id="dogeProfit"
                                               placeholder="0.0$" readonly="">
                                        <div class="tedf d-flex align-items-center" style="padding-right: 16px">
                                            <div class="course" style="padding-right: unset" id="dogePlan">0.0</div>
                                            <span style="opacity: 0.6;">%</span>
                                        </div>
                                        <img src="images/doge.svg" alt="crypto">
                                    </div>
                                </div>
                                <div class="profit-block">
                                    <div class="form-label">Farm Power</div>
                                    <div class="form-inputs form-inputs-active input-power">
                                        <input type="text" class="form-input form-input-active" id="dogeGHs"
                                               placeholder="0 GH/s" readonly="">
                                        <img src="images/lightning.svg" alt="crypto">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <a href="#" class="white-btn" data-bs-toggle="modal" data-bs-target="#ModalDeposit">Deposit</a>
        </section>
        <section class="withdrawals">
            <div class="dashboard-info">
                <h2 class="title">Deposit Payments</h2>
                <p class="text">History of all your deposit transactions</p>
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
{{--                        <th scope="col" style="padding-left: unset;">Explorer</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deposits as $dep)
                        <tr>
                            <td>{{$dep->currency}}</td>
                            <td>{{$dep->created_at}}</td>
                            <td>{{$dep->amount}}</td>
                            <td>{{$dep->hash}}</td>
                            <td>{{$dep->type}}</td>
{{--                            <td class="explorer"><a--}}
{{--                                    href="">Explorer</a>--}}
{{--                            </td>--}}
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>

    </div>
    <!--Modal Deposit-->
    <div class="modal fade" id="ModalDeposit" tabindex="-1" aria-labelledby="ModalDeposit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-form">
                        <div class="modal-title">
                            <img src="images/download.svg" alt="user">
                            <h1 class="text-left">Deposit</h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <form action="{{route('.dashboard.payment')}}" method="post">
                            @csrf
                            <div class="modal-block-one">
                                <label class="modal-label">The exact amount of the transfer</label>
                                <input name="amount" type="number" class="form-input modal-input active-modal-input">
                            </div>
                            <div class="modal-block-two" style="padding-bottom: 40px;">
                                <label class="modal-label">BTC Pick up address</label>
                                <div class="input-group" id="show_hide_password">
                                    <input type="hidden" name="type" value="deposit">
                                    <input name="hash" type="text"
                                           class="form-hide-icon active-modal-input border-end-0 modal-input">
                                    <button class="input-group-text bg-transparent btn-all-modal "><i
                                            class='bx bx-copy'></i></button>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-light modal-btn">I transferred money</button>
                        </form>
                        <div class="modal-info">Your balance will be replenished after the first confirmation in the
                            blockchain
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Modal wait-->
    <div class="modal fade" id="ModalWait" tabindex="-1" aria-labelledby="ModalFormLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="modal-form">
                        <div class="modal-title">
                            <img src="images/play.svg" alt="user">
                            <h1 class="text-left">Wait for replenishment</h1>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <form>
                            <div class="modal-info-alert"
                                 style="font-size: 24px; opacity: 0.6; padding: 32px 0 42px; max-width: 580px;">Your
                                balance will be replenished after the first confirmation in the blockchain
                            </div>
                            <button type="submit" class="btn btn-light modal-btn">It's clear</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@vite(["resources/views/front/js/bootstrap.bundle.js",
    "resources/views/front/js/dashboard.js",
    "resources/views/front/js/calculator.js",])

</body>
</html>
