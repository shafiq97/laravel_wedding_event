<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Your Dream Wedding</title>
    <link rel="stylesheet" type="text/css" href="./icons/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Caveat|Quicksand&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            font-family: 'Quicksand', sans-serif;
            font-size: 16px;
            color: #222;
        }

        html,
        body {
            margin: 0;
            height: 100vh;
            text-align: center;
        }

        .header {
            background-image: url("https://www.wedresearch.net/wp-content/uploads/2020/05/Bayswater-5.jpeg");
            background-repeat: no-repeat;
            background-position: 50% 60%;
            background-attachment: scroll;
            background-size: cover;
            height: 40vh;
            margin: 0;
            padding-top: 60vh;
        }

        .heading {
            color: #ffffff;
            display: block;
            font-family: 'Caveat', cursive;
            font-size: 6em;
            font-weight: normal;
            text-shadow: 0 0 10px #000;
        }

        .heading-subtext {
            color: #fff;
            display: block;
            font-family: 'Caveat', cursive;
            font-size: .6em;
        }

        .fixed-button {
            background: rgba(20, 20, 20, .5);
            border-radius: 1em;
            bottom: 1em;
            color: white;
            font-weight: bold;
            padding: 1em;
            position: fixed;
            right: 1em;
            text-decoration: none;
            z-index: 9999;
        }

        .fixed-button::after {
            content: "\25BE";
            display: block;
            font-size: 28px;
            line-height: 0;
            margin-bottom: 6px;
            margin-top: 10px;
            text-align: center;
        }

        .fixed-button:active,
        .fixed-button:hover {
            background: rgba(20, 20, 20, .9);
        }

        .section {
            margin: 0 auto;
            max-width: 600px;
            padding: 1em 2.4em;
        }

        .sub-heading {
            font-family: 'Caveat', cursive;
            font-size: 3em;
            margin-top: 2em;
        }

        .details {
            margin: 0 auto 8em;
        }

        .details-heading {
            font-weight: bold;
            text-transform: uppercase;
        }

        .fas {
            font-size: 3em;
            opacity: .8;
        }

        .resort-image {
            width: 100%
        }

        @media only screen and (max-width: 600px) {
            .heading {
                font-size: 4em;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <h1 class="heading">
            Your Dream Wedding
            <span class="heading-subtext"> Book now!</span>
        </h1>
    </header>
    <a data-scroll class="fixed-button" href="{{ route('dashboard') }}" id="rsvpButton">Book</a>
    <section class="section">
        <h2 class="sub-heading">Overview</h2>
        <p>Church wedding debt celebrate macarena embarrassing glitter Will. Forever happy salad cheers photobooth
            photographer limousine photobooth photographer limousine prime rib, guitar acoustic bass photobooth
            photographer limousine sparkles beautiful sparkles guitar acoustic bass beautiful. Cake dessert mother
            guitar acoustic bass cheers, uncle joe seat covers guitar acoustic bass macarena seat covers cake dessert
            embarrassing.
        </p>
    </section>
    <section class="section">
        <h2 class="sub-heading">The Details</h2>
        <div class="details">
            <i class="fas fa-calendar-check"></i>
            <h3 class="details-heading">When</h3>
            <p>January 1, 2020</p>
            <a title="Add to Calendar" rel="noopener" href="#" target="_blank" rel="nofollow">Add to Calendar</a>
        </div>
        <div class="details">
            <i class="fas fa-map-marked-alt"></i>
            <h3 class="details-heading">Location</h3>
            <p><a rel="noopener" href="#">Grand Venue Place</a>, City, State</p>
            <img class="resort-image" src="./img/resort.jpeg" alt="Resort" />
        </div>
        <div class="details">
            <i class="fas fa-suitcase"></i>
            <h3 class="details-heading">Lodging</h3>
            <p>DJ Jazzy Nupitals guitar acoustic bass embarrassing first aisle guitar acoustic bass cheers glitter .
                Macarena fish aisle aisle wedding, forever happy salad drunk groomsman overpriced florist embarrassing
                coworkers tuxedo aisle guitar acoustic bass champagne bouquet. Ring wedding beautiful tuxedo fish toast,
                veil Bryna aisle centerpieces. Cheers embarrassing bouquet bouquet Bryna overpriced florist DJ Jazzy
                Nupitals Bryna macarena. DJ Jazzy Nupitals prime rib centerpieces centerpieces cake dessert, cake
                dessert tuxedo aisle seat covers aisle.</p>
            <p>Church Will chicken unity sparkles Bryna cake dessert, centerpieces aisle Will debt guitar acoustic bass
                glitter . Magic sparkles father bridesmaid champagne bouquet wedding mother. Magic first dancing fish
                chicken champagne debt mother guitar acoustic bass.</p>
        </div>
        <div class="details">
            <i class="fas fa-plane-departure"></i>
            <h3 class="details-heading">Flights</h3>
            <p>Ring wedding beautiful tuxedo fish toast, veil Bryna aisle centerpieces. Cheers embarrassing bouquet
                bouquet Bryna overpriced florist DJ Jazzy Nupitals Bryna macarena.</p>
            <p>Magic sparkles father bridesmaid champagne bouquet wedding mother. Magic first dancing fish chicken
                champagne debt mother guitar acoustic bass.</p>
        </div>
        <div class="details">
            <i class="fas fa-asterisk"></i>
            <h3 class="details-heading">Other Notes</h3>
            <p>Cake dessert mother guitar acoustic bass cheers, uncle joe seat covers guitar acoustic bass macarena seat
                covers cake dessert embarrassing.</p>
            <p>Also, your presence is the only present we desire. No gift required.</p>
        </div>
        <div class="details">
            <i class="fas fa-reply"></i>
            <h3 class="details-heading" id="rsvp">RSVP</h3>
            <p>[Embed your RSVP form here]</p>
            <!-- Include Embedded link of Google Form here in place of # -->
            <!-- <iframe title="RSVP" src="" style="width:100%;" height="960" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe> -->
        </div>
    </section>
    <script src="./js/smooth-scroll.polyfills.min.js"></script>
    <script defer>
        var scroll = new SmoothScroll('a[href*="#"]');
        var rsvpButton = document.getElementById('rsvpButton')
        rsvpButton.addEventListener('click', hideButton, false);

        function hideButton() {
            rsvpButton.style.display = 'none';
        }
    </script>
</body>

</html>
