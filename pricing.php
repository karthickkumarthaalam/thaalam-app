<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pricing - Thaalam Radio Station </title>

    <?php include 'php/css.php'; ?>
</head>

<body class="custom-cursor">
    <?php $pagename = 'pricing'; ?>

    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <div>
                <?php include 'php/header.php'; ?>

                <!-- Pricing Accordion Section -->
                <section class="pricing-accordion" style="background-image: 
        linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65)), 
        url('assets/img/home/pattern/banner-2.png');background-size: contain;">
                    <div class="container">
                        <h2 class="section-title">Choose Your Plan</h2>
                        <p class="section-subtitle">Select the package that fits your needs</p>

                        <div class="accordion">
                            <!-- Basic Plan -->
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <div class="plan-icon">
                                        <i class="fas fa-guitar"></i>
                                    </div>
                                    <div class="plan-info">
                                        <h3>Basic Pass</h3>
                                        <p>Single day access</p>
                                    </div>
                                    <div class="plan-price">
                                        <span>$49</span>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="accordion-content">
                                    <ul class="plan-features">
                                        <li><i class="fas fa-check"></i> Access to main stage</li>
                                        <li><i class="fas fa-check"></i> General admission</li>
                                        <li><i class="fas fa-check"></i> Food truck discounts</li>
                                        <li><i class="fas fa-times"></i> No VIP areas</li>
                                        <li><i class="fas fa-times"></i> No backstage access</li>
                                    </ul>
                                    <a href="#" class="btn-purchase">Get Tickets</a>
                                </div>
                            </div>

                            <!-- Premium Plan -->
                            <div class="accordion-item active">
                                <div class="accordion-header">
                                    <div class="plan-icon">
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <div class="plan-info">
                                        <h3>Premium Experience</h3>
                                        <p>Full weekend access</p>
                                    </div>
                                    <div class="plan-price">
                                        <span>$149</span>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="accordion-content" style="display: block;">
                                    <ul class="plan-features">
                                        <li><i class="fas fa-check"></i> 3-day festival pass</li>
                                        <li><i class="fas fa-check"></i> Priority stage access</li>
                                        <li><i class="fas fa-check"></i> VIP lounge entry</li>
                                        <li><i class="fas fa-check"></i> Free merchandise pack</li>
                                        <li><i class="fas fa-times"></i> No meet & greet</li>
                                    </ul>
                                    <a href="#" class="btn-purchase">Get Tickets</a>
                                </div>
                            </div>

                            <!-- VIP Plan -->
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <div class="plan-icon">
                                        <i class="fas fa-crown"></i>
                                    </div>
                                    <div class="plan-info">
                                        <h3>VIP Package</h3>
                                        <p>Ultimate festival experience</p>
                                    </div>
                                    <div class="plan-price">
                                        <span>$299</span>
                                        <i class="fas fa-chevron-down"></i>
                                    </div>
                                </div>
                                <div class="accordion-content">
                                    <ul class="plan-features">
                                        <li><i class="fas fa-check"></i> All premium benefits</li>
                                        <li><i class="fas fa-check"></i> Backstage access</li>
                                        <li><i class="fas fa-check"></i> Artist meet & greet</li>
                                        <li><i class="fas fa-check"></i> Luxury rest areas</li>
                                        <li><i class="fas fa-check"></i> Personal concierge</li>
                                    </ul>
                                    <a href="#" class="btn-purchase">Get Tickets</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <style>
                    /* Accordion Styles */
                    .pricing-accordion {
                        padding: 60px 0;
                        background-color: #f9f9f9;
                    }

                    .container {
                        max-width: 900px;
                        margin: 0 auto;
                        padding: 0 20px;
                    }

                    .section-title {
                        text-align: center;
                        color: #F00000;
                        margin-bottom: 20px;
                        position: relative;
                    }

                    .section-title::after {
                        content: '';
                        position: absolute;
                        width: 80px;
                        height: 3px;
                        background-color: #F00000;
                        bottom: -10px;
                        left: 50%;
                        transform: translateX(-50%);
                    }

                    .section-subtitle {
                        text-align: center;
                        color: #666;
                        font-size: 1.1rem;
                        margin-bottom: 40px;
                    }

                    .accordion {
                        width: 100%;
                        border-radius: 8px;
                        overflow: hidden;
                        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
                    }

                    .accordion-item {
                        margin-bottom: 15px;
                        background: white;
                        border-radius: 8px;
                        overflow: hidden;
                        transition: all 0.3s ease;
                    }

                    .accordion-item:last-child {
                        margin-bottom: 0;
                    }

                    .accordion-header {
                        display: flex;
                        align-items: center;
                        padding: 20px;
                        cursor: pointer;
                        transition: all 0.3s ease;
                        border-left: 4px solid transparent;
                    }

                    .accordion-item.active .accordion-header {
                        border-left: 4px solid #F00000;
                        background-color: rgba(240, 0, 0, 0.05);
                    }

                    .accordion-header:hover {
                        background-color: rgba(240, 0, 0, 0.05);
                    }

                    .plan-icon {
                        width: 50px;
                        height: 50px;
                        background-color: rgba(240, 0, 0, 0.1);
                        border-radius: 50%;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        margin-right: 20px;
                        color: #F00000;
                        font-size: 1.2rem;
                        transition: all 0.3s ease;
                    }

                    .accordion-header:hover .plan-icon {
                        background-color: #F00000;
                        color: white;
                    }

                    .plan-info {
                        flex: 1;
                    }

                    .plan-info h3 {
                        font-size: 1.3rem;
                        color: #333;
                        margin-bottom: 5px;
                    }

                    .plan-info p {
                        color: #666;
                        font-size: 0.9rem;
                    }

                    .plan-price {
                        display: flex;
                        align-items: center;
                    }

                    .plan-price span {
                        font-size: 1.5rem;
                        font-weight: bold;
                        color: #F00000;
                        margin-right: 15px;
                    }

                    .plan-price i {
                        color: #F00000;
                        transition: all 0.3s ease;
                    }

                    .accordion-item.active .plan-price i {
                        transform: rotate(180deg);
                    }

                    .accordion-content {
                        padding: 0 20px;
                        max-height: 0;
                        overflow: hidden;
                        transition: all 0.3s ease;
                    }

                    .accordion-item.active .accordion-content {
                        padding: 20px;
                        max-height: 500px;
                    }

                    .plan-features {
                        list-style: none;
                        margin-bottom: 20px;
                    }

                    .plan-features li {
                        padding: 8px 0;
                        display: flex;
                        align-items: center;
                    }

                    .plan-features i {
                        margin-right: 10px;
                        width: 20px;
                        text-align: center;
                    }

                    .plan-features .fa-check {
                        color: #28a745;
                    }

                    .plan-features .fa-times {
                        color: #dc3545;
                    }

                    .btn-purchase {
                        display: inline-block;
                        padding: 12px 30px;
                        background-color: #F00000;
                        color: white;
                        text-decoration: none;
                        border-radius: 5px;
                        font-weight: bold;
                        transition: all 0.3s ease;
                        border: 2px solid #F00000;
                    }

                    .btn-purchase:hover {
                        background-color: white;
                        color: #F00000;
                        transform: translateY(-3px);
                        box-shadow: 0 5px 15px rgba(240, 0, 0, 0.2);
                    }
                </style>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const accordionItems = document.querySelectorAll('.accordion-item');

                        accordionItems.forEach(item => {
                            const header = item.querySelector('.accordion-header');

                            header.addEventListener('click', () => {
                                // Close all items first
                                accordionItems.forEach(otherItem => {
                                    if (otherItem !== item) {
                                        otherItem.classList.remove('active');
                                        otherItem.querySelector('.accordion-content').style.maxHeight = null;
                                    }
                                });

                                // Toggle current item
                                item.classList.toggle('active');
                                const content = item.querySelector('.accordion-content');

                                // if (item.classList.contains('active')) {
                                //     content.style.maxHeight = content.scrollHeight + 'px';
                                // } else {
                                //     content.style.maxHeight = null;
                                // }
                            });
                        });
                    });
                </script>

                <?php include 'php/footer.php'; ?>

            </div>
        </div>

    </div><!-- /.page-wrapper -->

    <?php include 'php/mob-nav.php'; ?>

    <?php include 'php/scripts.php'; ?>



</body>

</html>