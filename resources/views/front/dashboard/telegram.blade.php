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
        <section class="telegram">
            <div class="dashboard-info">
                <h2 class="title">Coming soon</h2>
                <p class="text">Here will be us Telegram Bot :)</p>
            </div>
        </section>

    </div>
</main>


@vite(["resources/views/front/js/bootstrap.bundle.js",
    "resources/views/front/js/dashboard.js",])

</body>
</html>
