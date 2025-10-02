<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Success</title>

    <?php include 'php/css.php'; ?>

    <style>
        /* Container */
        .payment-success-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 70vh;
            padding: 30px;
        }

        /* Glass card */
        .payment-card {
            background: transparent;
            backdrop-filter: blur(3px);
            padding: 50px 40px;
            border-radius: 25px;
            max-width: 450px;
            width: 100%;
            text-align: center;
            box-shadow: 0 7px 16px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.25);
            position: relative;
            overflow: hidden;
        }

        /* Animated checkmark with ring */
        .checkmark-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
            margin: 0 auto 25px;
        }

        .checkmark-circle {
            width: 120px;
            height: 120px;
            border: 5px solid #28a745;
            border-radius: 50%;
            position: absolute;
            top: 0;
            left: 0;
            animation: scaleIn 0.5s ease forwards;
        }

        .checkmark {
            position: absolute;
            width: 60px;
            height: 30px;
            border-left: 5px solid #28a745;
            border-bottom: 5px solid #28a745;
            transform: rotate(-45deg) scale(0);
            top: 35px;
            left: 30px;
            animation: drawCheck 0.5s 0.5s ease forwards;
        }

        /* Confetti */
        .confetti span {
            position: absolute;
            width: 6px;
            height: 6px;
            background: #ffcc00;
            border-radius: 50%;
            animation: burst 1s forwards;
        }

        /* Text */
        .payment-card h2 {
            color: #28a745;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .payment-card p {
            color: #333;
            font-size: 16px;
            line-height: 1.5;
        }

        .redirect-text {
            font-size: 14px;
            color: #333;
            margin-top: 10px;
        }

        /* Animations */
        @keyframes scaleIn {
            0% {
                transform: scale(0);
                opacity: 0;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes drawCheck {
            0% {
                transform: rotate(-45deg) scale(0);
            }

            100% {
                transform: rotate(-45deg) scale(1);
            }
        }

        @keyframes burst {
            0% {
                transform: translate(0, 0) scale(0);
                opacity: 1;
            }

            50% {
                transform: translate(var(--x), var(--y)) scale(1.5);
                opacity: 1;
            }

            100% {
                transform: translate(var(--x), var(--y)) scale(0);
                opacity: 0;
            }
        }
    </style>
    <?php include 'php/analyticsHeader.php'; ?>

</head>

<body class="custom-cursor">

    <?php $pagename = 'payment-success' ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <?php include 'php/header.php'; ?>

        <section class="team-details" style="
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg');">
            <main class="payment-success-container">
                <div class="payment-card">

                    <!-- Animated checkmark -->
                    <div class="checkmark-wrapper">
                        <div class="checkmark-circle"></div>
                        <div class="checkmark"></div>

                        <!-- Confetti particles -->
                        <div class="confetti">
                            <span style="--x: -40px; --y: -30px;"></span>
                            <span style="--x: 35px; --y: -25px;"></span>
                            <span style="--x: -30px; --y: 35px;"></span>
                            <span style="--x: 25px; --y: 40px;"></span>
                        </div>
                    </div>

                    <!-- Text content -->
                    <h2>Payment Successful!</h2>
                    <p>Thank you for your payment. Your transaction has been completed successfully.</p>
                    <p class="redirect-text">You’ll be redirected to your profile shortly.</p>
                </div>
            </main>
        </section>

        <?php include 'php/footer.php'; ?>
    </div>

    <?php include 'php/mob-nav.php'; ?>
    <?php include 'php/scripts.php'; ?>

    <script>
        setTimeout(() => {
            window.location.href = 'my-account';
        }, 5000);
    </script>

</body>

</html>