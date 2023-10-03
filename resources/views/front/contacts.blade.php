<!doctype html>
<html lang="en">
<head>
    @include('.front.includes.head_home')
    <title>CloudEx - Cloud mining platform</title>
</head>
<body style="min-height: 100vh;  display: flex; flex-direction: column;">
@include('.front.includes.header')
<div class="container">
    <section class="intro-pages">
        <div class="info-pages">
            <h2 class="title">Our Contacts</h2>
            <p class="text">We will help in any situation</p>
        </div>
        <div class="contacts">
            <div class="block block-contact">
                <img src="images/mail.svg" alt="mail">
                <div class="list-contact">
                    <h3 class="page-top contact-title">support@cryptostation.cc</h3>
                    <p class="page-bottom contact-text">Our Email contact</p>
                </div>
            </div>
            <div class="block block-contact">
                <img src="images/telegram.svg" alt="telegram">
                <div class="list-contact">
                    <h3 class="page-top contact-title">@cryptostation_support</h3>
                    <p class="page-bottom contact-text">Our Telegram contact</p>
                </div>
            </div>
        </div>
    </section>
</div>

@include('.front.includes.footer')

</body>
</html>
