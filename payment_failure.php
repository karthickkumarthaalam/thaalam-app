<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed</title>

    <?php include 'php/css.php'; ?>

    <style>
        .payment-failure-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 70vh;
            padding: 30px;
        }

        /* Card */
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

        /* Heading */
        .payment-card h2 {
            color: #f44336;
            font-size: 28px;
            margin-bottom: 15px;
        }

        /* Paragraphs */
        .payment-card p {
            color: #333;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 8px;
        }

        .redirect-text {
            font-size: 14px;
            color: #555;
            margin-top: 10px;
        }

        /* Cross mark */
        .cross-wrapper {
            position: relative;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 4px solid #f44336;
            margin: 0 auto 20px;
        }

        .cross-wrapper::before,
        .cross-wrapper::after {
            content: '';
            position: absolute;
            width: 6px;
            height: 80%;
            background: #f44336;
            top: 50%;
            left: 50%;
            transform-origin: center;
        }

        /* Left-top to right-bottom */
        .cross-wrapper::before {
            transform: translate(-50%, -50%) rotate(45deg);
        }

        /* Left-bottom to right-top */
        .cross-wrapper::after {
            transform: translate(-50%, -50%) rotate(-45deg);
        }

        /* Button */
        .payment-card a {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 30px;
            background: #f44336;
            color: #fff;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            transition: background 0.3s ease, transform 0.2s ease;
        }

        .payment-card a:hover {
            background: #d32f2f;
            transform: translateY(-2px);
        }

        /* Responsive */
        @media (max-width: 500px) {
            .cross-wrapper {
                width: 80px;
                height: 80px;
            }

            .payment-card {
                padding: 30px 25px;
            }
        }
    </style>
    <?php include 'php/analyticsHeader.php'; ?>

</head>

<body class="custom-cursor">

    <?php $pagename = 'payment-failure' ?>

    <?php include 'php/analyticsBody.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <?php include 'php/header.php'; ?>

        <section class="team-details" style="
    background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                url('./assets/images/backgrounds/background_image.jpg'); 
    background-size: cover; background-position: center;">
            <main class="payment-failure-container">
                <div class="payment-card">
                    <!-- Cross mark -->
                    <div class="cross-wrapper"></div>

                    <!-- Text content -->
                    <h2>Payment Failed!</h2>
                    <p>Unfortunately, your transaction couldn’t be completed.</p>
                    <p class="redirect-text">Please try again or contact our support team for assistance.</p>

                    <a href="index">Back to Home</a>
                </div>
            </main>
        </section>
        <?php include 'php/footer.php'; ?>
    </div>

    <?php include 'php/mob-nav.php'; ?>
    <?php include 'php/scripts.php'; ?>

</body>

</html>