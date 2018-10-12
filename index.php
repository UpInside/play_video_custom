<!doctype html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="_cdn/css/style.css">
</head>
<body>

<div class="container">
    <section class="content media">

        <h1>Confira nosso último vídeo!</h1>

        <div class="video">
            <div class="player">
                <video width="100%" class="player_player">
                    <source src="dm.mp4" type="video/mp4">
                    <p>Seu navegador não possui suporte para o player do HTML5.</p>
                </video>

                <div class="player_controls">
                    <button type="button" class="player_play_pause"><i class="fa fa-play"></i></button>
                    <input type="range" class="player_progress_bar" value="0">
                    <button type="button" class="player_mute"><i class="fa fa-volume-up"></i></button>
                    <input type="range" class="player_volume" min="0" max="1" step="0.1" value="1">
                    <button type="button" class="player_full_screen"><i class="fa fa-expand-arrows-alt"></i></button>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    $(function () {

        var video = $(".player_player")[0];

        var playButton = $(".player_play_pause");
        var muteButton = $(".player_mute");
        var fullScreenButton = $(".player_full_screen");

        var progressBar = $(".player_progress_bar")[0];
        var volumeBar = $(".player_volume")[0];

        playButton.click(function () {

            if (video.paused == true) {
                video.play();
                playButton.find("i").removeClass("fa-play").addClass("fa-pause");
            } else {
                video.pause();
                playButton.find("i").removeClass("fa-pause").addClass("fa-play");
            }

        });

        muteButton.click(function () {

            if (video.muted == false) {
                video.muted = true;
                muteButton.find("i").removeClass("fa-volume-up").addClass("fa-volume-off");
            } else {
                video.muted = false;
                muteButton.find("i").removeClass("fa-volume-off").addClass("fa-volume-up");
            }

        });

        fullScreenButton.click(function () {

            if (video.requestFullscreen) {
                video.requestFullscreen();
            } else if (video.mozRequestFullScreen) {
                video.mozRequestFullScreen();
            } else if (video.webkitRequestFullScreen) {
                video.webkitRequestFullScreen();
            }

        });

        $(volumeBar).on("input change", function () {
            video.volume = volumeBar.value;
        });

        $(progressBar).on("input change", function () {
            var time = video.duration * (progressBar.value / 100);
            video.currentTime = time;
        });

        $(video).on("timeupdate", function () {
            var value = (100 / video.duration) * video.currentTime;
            progressBar.value = value;
        });
    });
</script>
</body>
</html>