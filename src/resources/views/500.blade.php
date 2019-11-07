<html lang=&quot;en&quot;>
<head>
    <meta charset=&quot;UTF-8&quot;>
    <link rel=&quot;shortcut icon&quot; type=&quot;image/x-icon&quot;
          href=&quot;https://static.codepen.io/assets/favicon/favicon-aec34940fbc1a6e787974dcd360f2c6b63348d4b1f4e06c77743096d55480f33.ico&quot;/>
    <link rel=&quot;mask-icon&quot; type=&quot;&quot;
          href=&quot;https://static.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg&quot;
          color=&quot;#111&quot;/>
    <title>Laravel Rbac 500</title>
    <link rel=&quot;stylesheet&quot;
          href=&quot;https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css&quot;>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
            font-family: 'Futura';
        }

        body h1 {
            position: absolute;
            bottom: 20px;
            z-index: 9;
            color: #000;
            font-weight: 100;
            font-size: 18px;
        }

        body .post {
            position: absolute;
            width: 10px;
            height: 100vw;
            top: calc(50% - 200px);
            left: calc(50% - 247.5px);
            z-index: 9;
            border-radius: 50px 50px 0 0;
            box-shadow: inset -0.5px 10px 0 #fff, 0 0 0 2px #000, 2px 0px 0 0 #000;
            background: linear-gradient(to bottom, transparent 50px, #000 50px, #000 350px, transparent 350px), linear-gradient(to right, #fff, #fff 5px, transparent 5px), repeating-linear-gradient(45deg, #000, #000 2px, #fff 2px, #fff 4px);
        }

        body .outer {
            position: absolute;
            width: 820px;
            height: 420px;
            -webkit-filter: contrast(200);
            filter: contrast(200);
            background: #fff;
            overflow: hidden;
            -webkit-animation: updown 1s ease-in-out infinite alternate;
            animation: updown 1s ease-in-out infinite alternate;
            -webkit-transform-origin: top left;
            transform-origin: top left;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
            margin-left: 160px;
        }

        @-webkit-keyframes updown {
            from {
                -webkit-transform: translateY(-10px);
                transform: translateY(-10px);
            }
            to {
                -webkit-transform: translateY(10px);
                transform: translateY(10px);
            }
        }

        @keyframes updown {
            from {
                -webkit-transform: translateY(-10px);
                transform: translateY(-10px);
            }
            to {
                -webkit-transform: translateY(10px);
                transform: translateY(10px);
            }
        }

        body .wrap {
            position: absolute;
            width: calc(100% - 20px);
            height: calc(100% - 20px);
            left: 10px;
            top: 10px;
            -webkit-transform-style: preserve-3d;
            transform-style: preserve-3d;
            -webkit-filter: blur(5px);
            filter: blur(5px);
        }

        body .wrap .error {
            position: absolute;
            height: 100%;
            width: 30px;
            will-change: transform;
            overflow: hidden;
            background: #222;
        }

        body .wrap .error:before {
            content: '500';
            position: absolute;
            font-size: 140px;
            top: 115px;
            margin-left: 30px;
            color: #fff;
        }

        body .wrap .error:nth-of-type(1) {
            left: 0px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.05s;
            animation-delay: -0.05s;
            -webkit-clip-path: polygon(0.75% 1%, 0.75% 99%, 100% 50%);
            clip-path: polygon(0.75% 1%, 0.75% 99%, 100% 50%);
        }

        body .wrap .error:nth-of-type(1):before {
            left: 0px;
        }

        @-webkit-keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(2) {
            left: 10px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.1s;
            animation-delay: -0.1s;
            -webkit-clip-path: polygon(1.5% 2%, 1.5% 98%, 100% 50%);
            clip-path: polygon(1.5% 2%, 1.5% 98%, 100% 50%);
        }

        body .wrap .error:nth-of-type(2):before {
            left: -10px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(3) {
            left: 20px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.15s;
            animation-delay: -0.15s;
            -webkit-clip-path: polygon(2.25% 3%, 2.25% 97%, 100% 50%);
            clip-path: polygon(2.25% 3%, 2.25% 97%, 100% 50%);
        }

        body .wrap .error:nth-of-type(3):before {
            left: -20px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(4) {
            left: 30px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.2s;
            animation-delay: -0.2s;
            -webkit-clip-path: polygon(3% 4%, 3% 96%, 100% 50%);
            clip-path: polygon(3% 4%, 3% 96%, 100% 50%);
        }

        body .wrap .error:nth-of-type(4):before {
            left: -30px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(5) {
            left: 40px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.25s;
            animation-delay: -0.25s;
            -webkit-clip-path: polygon(3.75% 5%, 3.75% 95%, 100% 50%);
            clip-path: polygon(3.75% 5%, 3.75% 95%, 100% 50%);
        }

        body .wrap .error:nth-of-type(5):before {
            left: -40px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(6) {
            left: 50px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.3s;
            animation-delay: -0.3s;
            -webkit-clip-path: polygon(4.5% 6%, 4.5% 94%, 100% 50%);
            clip-path: polygon(4.5% 6%, 4.5% 94%, 100% 50%);
        }

        body .wrap .error:nth-of-type(6):before {
            left: -50px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(7) {
            left: 60px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.35s;
            animation-delay: -0.35s;
            -webkit-clip-path: polygon(5.25% 7%, 5.25% 93%, 100% 50%);
            clip-path: polygon(5.25% 7%, 5.25% 93%, 100% 50%);
        }

        body .wrap .error:nth-of-type(7):before {
            left: -60px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(8) {
            left: 70px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.4s;
            animation-delay: -0.4s;
            -webkit-clip-path: polygon(6% 8%, 6% 92%, 100% 50%);
            clip-path: polygon(6% 8%, 6% 92%, 100% 50%);
        }

        body .wrap .error:nth-of-type(8):before {
            left: -70px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(9) {
            left: 80px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.45s;
            animation-delay: -0.45s;
            -webkit-clip-path: polygon(6.75% 9%, 6.75% 91%, 100% 50%);
            clip-path: polygon(6.75% 9%, 6.75% 91%, 100% 50%);
        }

        body .wrap .error:nth-of-type(9):before {
            left: -80px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(10) {
            left: 90px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.5s;
            animation-delay: -0.5s;
            -webkit-clip-path: polygon(7.5% 10%, 7.5% 90%, 100% 50%);
            clip-path: polygon(7.5% 10%, 7.5% 90%, 100% 50%);
        }

        body .wrap .error:nth-of-type(10):before {
            left: -90px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(11) {
            left: 100px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.55s;
            animation-delay: -0.55s;
            -webkit-clip-path: polygon(8.25% 11%, 8.25% 89%, 100% 50%);
            clip-path: polygon(8.25% 11%, 8.25% 89%, 100% 50%);
        }

        body .wrap .error:nth-of-type(11):before {
            left: -100px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(12) {
            left: 110px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.6s;
            animation-delay: -0.6s;
            -webkit-clip-path: polygon(9% 12%, 9% 88%, 100% 50%);
            clip-path: polygon(9% 12%, 9% 88%, 100% 50%);
        }

        body .wrap .error:nth-of-type(12):before {
            left: -110px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(13) {
            left: 120px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.65s;
            animation-delay: -0.65s;
            -webkit-clip-path: polygon(9.75% 13%, 9.75% 87%, 100% 50%);
            clip-path: polygon(9.75% 13%, 9.75% 87%, 100% 50%);
        }

        body .wrap .error:nth-of-type(13):before {
            left: -120px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(14) {
            left: 130px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.7s;
            animation-delay: -0.7s;
            -webkit-clip-path: polygon(10.5% 14%, 10.5% 86%, 100% 50%);
            clip-path: polygon(10.5% 14%, 10.5% 86%, 100% 50%);
        }

        body .wrap .error:nth-of-type(14):before {
            left: -130px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(15) {
            left: 140px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.75s;
            animation-delay: -0.75s;
            -webkit-clip-path: polygon(11.25% 15%, 11.25% 85%, 100% 50%);
            clip-path: polygon(11.25% 15%, 11.25% 85%, 100% 50%);
        }

        body .wrap .error:nth-of-type(15):before {
            left: -140px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(16) {
            left: 150px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.8s;
            animation-delay: -0.8s;
            -webkit-clip-path: polygon(12% 16%, 12% 84%, 100% 50%);
            clip-path: polygon(12% 16%, 12% 84%, 100% 50%);
        }

        body .wrap .error:nth-of-type(16):before {
            left: -150px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(17) {
            left: 160px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.85s;
            animation-delay: -0.85s;
            -webkit-clip-path: polygon(12.75% 17%, 12.75% 83%, 100% 50%);
            clip-path: polygon(12.75% 17%, 12.75% 83%, 100% 50%);
        }

        body .wrap .error:nth-of-type(17):before {
            left: -160px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(18) {
            left: 170px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.9s;
            animation-delay: -0.9s;
            -webkit-clip-path: polygon(13.5% 18%, 13.5% 82%, 100% 50%);
            clip-path: polygon(13.5% 18%, 13.5% 82%, 100% 50%);
        }

        body .wrap .error:nth-of-type(18):before {
            left: -170px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(19) {
            left: 180px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -0.95s;
            animation-delay: -0.95s;
            -webkit-clip-path: polygon(14.25% 19%, 14.25% 81%, 100% 50%);
            clip-path: polygon(14.25% 19%, 14.25% 81%, 100% 50%);
        }

        body .wrap .error:nth-of-type(19):before {
            left: -180px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(20) {
            left: 190px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1s;
            animation-delay: -1s;
            -webkit-clip-path: polygon(15% 20%, 15% 80%, 100% 50%);
            clip-path: polygon(15% 20%, 15% 80%, 100% 50%);
        }

        body .wrap .error:nth-of-type(20):before {
            left: -190px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(21) {
            left: 200px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.05s;
            animation-delay: -1.05s;
            -webkit-clip-path: polygon(15.75% 21%, 15.75% 79%, 100% 50%);
            clip-path: polygon(15.75% 21%, 15.75% 79%, 100% 50%);
        }

        body .wrap .error:nth-of-type(21):before {
            left: -200px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(22) {
            left: 210px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.1s;
            animation-delay: -1.1s;
            -webkit-clip-path: polygon(16.5% 22%, 16.5% 78%, 100% 50%);
            clip-path: polygon(16.5% 22%, 16.5% 78%, 100% 50%);
        }

        body .wrap .error:nth-of-type(22):before {
            left: -210px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(23) {
            left: 220px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.15s;
            animation-delay: -1.15s;
            -webkit-clip-path: polygon(17.25% 23%, 17.25% 77%, 100% 50%);
            clip-path: polygon(17.25% 23%, 17.25% 77%, 100% 50%);
        }

        body .wrap .error:nth-of-type(23):before {
            left: -220px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(24) {
            left: 230px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.2s;
            animation-delay: -1.2s;
            -webkit-clip-path: polygon(18% 24%, 18% 76%, 100% 50%);
            clip-path: polygon(18% 24%, 18% 76%, 100% 50%);
        }

        body .wrap .error:nth-of-type(24):before {
            left: -230px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(25) {
            left: 240px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.25s;
            animation-delay: -1.25s;
            -webkit-clip-path: polygon(18.75% 25%, 18.75% 75%, 100% 50%);
            clip-path: polygon(18.75% 25%, 18.75% 75%, 100% 50%);
        }

        body .wrap .error:nth-of-type(25):before {
            left: -240px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(26) {
            left: 250px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.3s;
            animation-delay: -1.3s;
            -webkit-clip-path: polygon(19.5% 26%, 19.5% 74%, 100% 50%);
            clip-path: polygon(19.5% 26%, 19.5% 74%, 100% 50%);
        }

        body .wrap .error:nth-of-type(26):before {
            left: -250px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(27) {
            left: 260px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.35s;
            animation-delay: -1.35s;
            -webkit-clip-path: polygon(20.25% 27%, 20.25% 73%, 100% 50%);
            clip-path: polygon(20.25% 27%, 20.25% 73%, 100% 50%);
        }

        body .wrap .error:nth-of-type(27):before {
            left: -260px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(28) {
            left: 270px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.4s;
            animation-delay: -1.4s;
            -webkit-clip-path: polygon(21% 28%, 21% 72%, 100% 50%);
            clip-path: polygon(21% 28%, 21% 72%, 100% 50%);
        }

        body .wrap .error:nth-of-type(28):before {
            left: -270px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(29) {
            left: 280px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.45s;
            animation-delay: -1.45s;
            -webkit-clip-path: polygon(21.75% 29%, 21.75% 71%, 100% 50%);
            clip-path: polygon(21.75% 29%, 21.75% 71%, 100% 50%);
        }

        body .wrap .error:nth-of-type(29):before {
            left: -280px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(30) {
            left: 290px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.5s;
            animation-delay: -1.5s;
            -webkit-clip-path: polygon(22.5% 30%, 22.5% 70%, 100% 50%);
            clip-path: polygon(22.5% 30%, 22.5% 70%, 100% 50%);
        }

        body .wrap .error:nth-of-type(30):before {
            left: -290px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(31) {
            left: 300px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.55s;
            animation-delay: -1.55s;
            -webkit-clip-path: polygon(23.25% 31%, 23.25% 69%, 100% 50%);
            clip-path: polygon(23.25% 31%, 23.25% 69%, 100% 50%);
        }

        body .wrap .error:nth-of-type(31):before {
            left: -300px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(32) {
            left: 310px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.6s;
            animation-delay: -1.6s;
            -webkit-clip-path: polygon(24% 32%, 24% 68%, 100% 50%);
            clip-path: polygon(24% 32%, 24% 68%, 100% 50%);
        }

        body .wrap .error:nth-of-type(32):before {
            left: -310px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(33) {
            left: 320px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.65s;
            animation-delay: -1.65s;
            -webkit-clip-path: polygon(24.75% 33%, 24.75% 67%, 100% 50%);
            clip-path: polygon(24.75% 33%, 24.75% 67%, 100% 50%);
        }

        body .wrap .error:nth-of-type(33):before {
            left: -320px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(34) {
            left: 330px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.7s;
            animation-delay: -1.7s;
            -webkit-clip-path: polygon(25.5% 34%, 25.5% 66%, 100% 50%);
            clip-path: polygon(25.5% 34%, 25.5% 66%, 100% 50%);
        }

        body .wrap .error:nth-of-type(34):before {
            left: -330px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(35) {
            left: 340px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.75s;
            animation-delay: -1.75s;
            -webkit-clip-path: polygon(26.25% 35%, 26.25% 65%, 100% 50%);
            clip-path: polygon(26.25% 35%, 26.25% 65%, 100% 50%);
        }

        body .wrap .error:nth-of-type(35):before {
            left: -340px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(36) {
            left: 350px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.8s;
            animation-delay: -1.8s;
            -webkit-clip-path: polygon(27% 36%, 27% 64%, 100% 50%);
            clip-path: polygon(27% 36%, 27% 64%, 100% 50%);
        }

        body .wrap .error:nth-of-type(36):before {
            left: -350px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(37) {
            left: 360px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.85s;
            animation-delay: -1.85s;
            -webkit-clip-path: polygon(27.75% 37%, 27.75% 63%, 100% 50%);
            clip-path: polygon(27.75% 37%, 27.75% 63%, 100% 50%);
        }

        body .wrap .error:nth-of-type(37):before {
            left: -360px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(38) {
            left: 370px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.9s;
            animation-delay: -1.9s;
            -webkit-clip-path: polygon(28.5% 38%, 28.5% 62%, 100% 50%);
            clip-path: polygon(28.5% 38%, 28.5% 62%, 100% 50%);
        }

        body .wrap .error:nth-of-type(38):before {
            left: -370px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(39) {
            left: 380px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -1.95s;
            animation-delay: -1.95s;
            -webkit-clip-path: polygon(29.25% 39%, 29.25% 61%, 100% 50%);
            clip-path: polygon(29.25% 39%, 29.25% 61%, 100% 50%);
        }

        body .wrap .error:nth-of-type(39):before {
            left: -380px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(40) {
            left: 390px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -2s;
            animation-delay: -2s;
            -webkit-clip-path: polygon(30% 40%, 30% 60%, 100% 50%);
            clip-path: polygon(30% 40%, 30% 60%, 100% 50%);
        }

        body .wrap .error:nth-of-type(40):before {
            left: -390px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(41) {
            left: 400px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -2.05s;
            animation-delay: -2.05s;
            -webkit-clip-path: polygon(30.75% 41%, 30.75% 59%, 100% 50%);
            clip-path: polygon(30.75% 41%, 30.75% 59%, 100% 50%);
        }

        body .wrap .error:nth-of-type(41):before {
            left: -400px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(42) {
            left: 410px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -2.1s;
            animation-delay: -2.1s;
            -webkit-clip-path: polygon(31.5% 42%, 31.5% 58%, 100% 50%);
            clip-path: polygon(31.5% 42%, 31.5% 58%, 100% 50%);
        }

        body .wrap .error:nth-of-type(42):before {
            left: -410px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(43) {
            left: 420px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -2.15s;
            animation-delay: -2.15s;
            -webkit-clip-path: polygon(32.25% 43%, 32.25% 57%, 100% 50%);
            clip-path: polygon(32.25% 43%, 32.25% 57%, 100% 50%);
        }

        body .wrap .error:nth-of-type(43):before {
            left: -420px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(44) {
            left: 430px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -2.2s;
            animation-delay: -2.2s;
            -webkit-clip-path: polygon(33% 44%, 33% 56%, 100% 50%);
            clip-path: polygon(33% 44%, 33% 56%, 100% 50%);
        }

        body .wrap .error:nth-of-type(44):before {
            left: -430px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(45) {
            left: 440px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -2.25s;
            animation-delay: -2.25s;
            -webkit-clip-path: polygon(33.75% 45%, 33.75% 55%, 100% 50%);
            clip-path: polygon(33.75% 45%, 33.75% 55%, 100% 50%);
        }

        body .wrap .error:nth-of-type(45):before {
            left: -440px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(46) {
            left: 450px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -2.3s;
            animation-delay: -2.3s;
            -webkit-clip-path: polygon(34.5% 46%, 34.5% 54%, 100% 50%);
            clip-path: polygon(34.5% 46%, 34.5% 54%, 100% 50%);
        }

        body .wrap .error:nth-of-type(46):before {
            left: -450px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(47) {
            left: 460px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -2.35s;
            animation-delay: -2.35s;
            -webkit-clip-path: polygon(35.25% 47%, 35.25% 53%, 100% 50%);
            clip-path: polygon(35.25% 47%, 35.25% 53%, 100% 50%);
        }

        body .wrap .error:nth-of-type(47):before {
            left: -460px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(48) {
            left: 470px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -2.4s;
            animation-delay: -2.4s;
            -webkit-clip-path: polygon(36% 48%, 36% 52%, 100% 50%);
            clip-path: polygon(36% 48%, 36% 52%, 100% 50%);
        }

        body .wrap .error:nth-of-type(48):before {
            left: -470px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(49) {
            left: 480px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -2.45s;
            animation-delay: -2.45s;
            -webkit-clip-path: polygon(36.75% 49%, 36.75% 51%, 100% 50%);
            clip-path: polygon(36.75% 49%, 36.75% 51%, 100% 50%);
        }

        body .wrap .error:nth-of-type(49):before {
            left: -480px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }

        body .wrap .error:nth-of-type(50) {
            left: 490px;
            -webkit-animation: wave 1s ease-in-out infinite alternate;
            animation: wave 1s ease-in-out infinite alternate;
            -webkit-animation-delay: -2.5s;
            animation-delay: -2.5s;
            -webkit-clip-path: polygon(37.5% 50%, 37.5% 50%, 100% 50%);
            clip-path: polygon(37.5% 50%, 37.5% 50%, 100% 50%);
        }

        body .wrap .error:nth-of-type(50):before {
            left: -490px;
        }

        @keyframes wave {
            from {
                -webkit-transform: skewY(-10deg) translateY(10px);
                transform: skewY(-10deg) translateY(10px);
            }
            to {
                -webkit-transform: skewY(10deg) translateY(-10px);
                transform: skewY(10deg) translateY(-10px);
            }
        }
    </style>

    <script>
      window.console = window.console || function (t) {
      };
    </script>


    <script>
      if (document.location.search.match(/type=embed/gi)) {
        window.parent.postMessage( & quot;
        resize & quot;
      , &
        quot;
      *&
        quot;
      )
        ;
      }
    </script>


</head>

<body translate=&quot;no&quot;>
<h1 style="right: 25%">Oh! You shouldn't come here, Please check your role! <a href="/admin"> <b>Click here to GO BACK !</b> </a></h1>
<div class='post'></div>
<div class='outer'>
    <div class='wrap'>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
        <div class='error'></div>
    </div>
</div>
</body>
</html>
