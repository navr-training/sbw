<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta name="google-site-verification" content="YroH9ib81SsQACO_q70HRL4uNlwqKI51wvqtvIXwiwg" />
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-128955663-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-128955663-1');
        </script>
        <meta charset="UTF-8">
        <title>Shaadi Bandwagon</title>
        <meta name="description" content="Shaaadi Bandwagon - Your one stop shop for all your wedding related needs. Just sit back and organize your wedding from the comforts of your home. We have done all the work for you."/>
        <meta name="keywords" content="wedding planners, organize wedding, marriage halls in bangalore, wedding halls in bangalore, wedding planners in bangalore, wedding, bangalore"/>
        <meta name="subject" content="Wedding Planners">
        <meta name="copyright"content="Shaadi Bandwagon">
        <meta name="robots" content="index,follow" />
        <meta name="Classification" content="Wedding Planner">
        <meta name="url" content="http://www.shaadibandwagon.com">
        <meta name="revisit-after" content="2 days">
        <meta name="rating" content="General">

        <meta property="og:title" content="Shaadi Bandwagon"/>
        <meta property="og:type" content="website" />
        <meta property="fb:app_id" content="360186988066828"/>
        <meta property="og:url" content="<?= current_url(); ?>"/>
        <meta property="og:image" content="http://www.shaadibandwagon.com/assets/images/sbw.jpg"/>
        <meta property="og:image:url" content="http://www.shaadibandwagon.com/assets/images/sbw.jpg"/>
        <meta property="og:site_name" content="Shaadi Bandwagon"/>
        <meta property="og:description" content="Shaaadi Bandwagon - Your one stop shop for all your wedding related needs. Just sit back and organize your wedding from the comforts of your home. We have done all the work for you." />

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url('/assets/styles/style.css'); ?>" />

    </head>
    <body>
        <div class="logo-container">
            <div class="logo">
                <img class="logoimg" src="<?= base_url('/assets/images/sbw-logo.svg'); ?>" alt="Shaadi Bandwagon" />
            </div>
            <div class="coming">
                <div class="col-md-6 offset-md-3">
                    <span class="soon">We are coming soon!</span>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {

                function resize() {
                    let bwid = $(window).width();
                    let bhei = $(window).height();
                    $('body').width(bwid).height(bhei);
                }
                resize();
                $(window).on('resize', function () {
                    resize();
                });

                $.getJSON("http://jsonip.com/?callback=?", function (ipData) {
                    var ip = ipData.ip;
                    redirect(ip);
                 });
                 
                function redirect(ip){
                    var url = 'https://ipfind.co?ip=' + ip;
                    $.getJSON(url, function(data){
                        var city = data.city;
                        if (city === 'Bengaluru'){
                            city = 'Bangalore';
                        }
                        lCity = city.toLowerCase();
                        url = window.location.host;
                        uSplit = url.split('.');
                        uCityLength = uSplit.length;
                        uCity = uSplit[0];
                        console.log(uCity);
                        if (uCityLength !== 3) {
                            window.location.href = 'http://' + lCity + '.' + uSplit[0] + '.' + uSplit[1];
                        } else if (uCityLength === 3 && uCity === 'www') {
                            window.location.href = 'http://' + lCity + '.' + uSplit[1] + '.' + uSplit[2];
                        }
                    });
                }
            });
        </script>
    </body>
</html>