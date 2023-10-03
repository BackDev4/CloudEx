<!doctype html>
<html lang="en">
<head>
    @include('.front.includes.head_home')
    <title>CloudEx - Cloud mining platform</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>


@include('.front.includes.header')
<div class="container">
    <section class="intro-pages">
        <div class="info-pages">
            <h2 class="title">Frequently asked questions</h2>
            <p class="text">Answer to your all questions
            </p>
        </div>


        <div class="accordion-main">
            <div class="accordion-block">
                <div class="accordion-title" data-tab="item1">
                    <h3>How to register?<i class="fa fa-chevron-down"></i></h3>
                </div>
                <div class="accordion-content" id="item1">
                    <p>
                        You need to log in to your account, then go to the "Dashboard" page and activate the mining
                        by moving the power pointer as you wish. Then click the activate button to make the changes
                        take effect. You have 100% power that you can use either to mine a specific cryptocurrency
                        or to distribute it among several cryptocurrencies.
                    </p>
                </div>
            </div>
            <div class="accordion-block">
                <div class="accordion-title" data-tab="item2">
                    <h3>How to activate mining to make it profitable?<i class="fa fa-chevron-down"></i></h3>
                </div>
                <div class="accordion-content" id="item2">
                    <p>
                        You need to log in to your account, then go to the "Dashboard" page and activate the mining
                        by moving the power pointer as you wish. Then click the activate button to make the changes
                        take effect. You have 100% power that you can use either to mine a specific cryptocurrency
                        or to distribute it among several cryptocurrencies.
                    </p>
                </div>
            </div>
            <div class="accordion-block">
                <div class="accordion-title" data-tab="item3">
                    <h3>What if I forgot my password?<i class="fa fa-chevron-down"></i></h3>
                </div>
                <div class="accordion-content" id="item3">
                    <p>
                        You need to log in to your account, then go to the "Dashboard" page and activate the mining
                        by moving the power pointer as you wish. Then click the activate button to make the changes
                        take effect. You have 100% power that you can use either to mine a specific cryptocurrency
                        or to distribute it among several cryptocurrencies.
                    </p>
                </div>
            </div>
            <div class="accordion-block">
                <div class="accordion-title" data-tab="item4">
                    <h3>What crypto do you accept?<i class="fa fa-chevron-down"></i></h3>
                </div>
                <div class="accordion-content" id="item4">
                    <p>
                        You need to log in to your account, then go to the "Dashboard" page and activate the mining
                        by moving the power pointer as you wish. Then click the activate button to make the changes
                        take effect. You have 100% power that you can use either to mine a specific cryptocurrency
                        or to distribute it among several cryptocurrencies.
                    </p>
                </div>
            </div>
            <div class="accordion-block">
                <div class="accordion-title" data-tab="item5">
                    <h3>How to choose a coin?<i class="fa fa-chevron-down"></i></h3>
                </div>
                <div class="accordion-content" id="item5">
                    <p>
                        You need to log in to your account, then go to the "Dashboard" page and activate the mining
                        by moving the power pointer as you wish. Then click the activate button to make the changes
                        take effect. You have 100% power that you can use either to mine a specific cryptocurrency
                        or to distribute it among several cryptocurrencies.
                    </p>
                </div>
            </div>
            <div class="accordion-block">
                <div class="accordion-title" data-tab="item6">
                    <h3>Can I make multiple accounts?<i class="fa fa-chevron-down"></i></h3>
                </div>
                <div class="accordion-content" id="item6">
                    <p>
                        You need to log in to your account, then go to the "Dashboard" page and activate the mining
                        by moving the power pointer as you wish. Then click the activate button to make the changes
                        take effect. You have 100% power that you can use either to mine a specific cryptocurrency
                        or to distribute it among several cryptocurrencies.
                    </p>
                </div>
            </div>
            <div class="accordion-block">
                <div class="accordion-title" data-tab="item7">
                    <h3>In which cases can my account be blocked?<i class="fa fa-chevron-down"></i></h3>
                </div>
                <div class="accordion-content" id="item7">
                    <p>
                        You need to log in to your account, then go to the "Dashboard" page and activate the mining
                        by moving the power pointer as you wish. Then click the activate button to make the changes
                        take effect. You have 100% power that you can use either to mine a specific cryptocurrency
                        or to distribute it among several cryptocurrencies.
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>
@include('.front.includes.footer')


<script type="text/javascript">
    $(document).ready(function () {
        $(".accordion-title").click(function (e) {
            var accordionitem = $(this).attr("data-tab");
            $("#" + accordionitem)
                .slideToggle()
                .parent()
                .siblings()
                .find(".accordion-content")
                .slideUp();

            $(this).toggleClass("active-title");
            $("#" + accordionitem)
                .parent()
                .siblings()
                .find(".accordion-title")
                .removeClass("active-title");

            $("i.fa-chevron-down", this).toggleClass("chevron-top");
            $("#" + accordionitem)
                .parent()
                .siblings()
                .find(".accordion-title i.fa-chevron-down")
                .removeClass("chevron-top");
        });
    });

</script>

</body>
</html>
