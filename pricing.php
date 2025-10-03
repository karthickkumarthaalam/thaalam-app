<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $page_title = "Pricing - Thaalam Radio Station";
  $page_description = "Choose the best Thaalam Radio Station subscription plan. Explore monthly and yearly packages tailored for music lovers and podcast enthusiasts.";
  $page_url = "https://thaalam.ch/pricing";
  $page_image = "https://thaalam.ch/assets/img/logo/thalam-logo.png";
  include 'php/meta.php';
  ?>

  <?php include 'php/css.php'; ?>
  <link rel="stylesheet" href="assets/css/module-css/pricing.css">

  <?php include 'php/analyticsHeader.php'; ?>
</head>

<body class="custom-cursor">
  <?php $pagename = 'pricing'; ?>

  <?php include 'php/analyticsBody.php'; ?>

  <?php include 'php/toast.php'; ?>

  <?php include 'php/preloader.php'; ?>

  <div class="page-wrapper">
    <?php include 'php/header.php'; ?>

    <div class="row">
      <div>

        <!-- Pricing Accordion Section -->
        <section class="pricing-accordion" style=" 
            background: linear-gradient(rgba(255,255,255,0.2), rgba(255,255,255,0.2)), 
                        url('./assets/images/backgrounds/background_image.jpg'); min-height:75vh;">
          <div class="pricing-container">
            <h2 class="section-title">Choose Your Plan</h2>
            <p class="section-subtitle">Select the package that fits your needs</p>
            <div class="pricing-toggle">
              <button id="yearlyBtn" class="toggle-btn active" onclick="setBillingDuration(`yearly`)">
                Yearly
              </button>
              <button id="monthlyBtn" class="toggle-btn" onclick="setBillingDuration(`monthly`)">
                Monthly
              </button>
            </div>
            <div class="accordion">

            </div>
          </div>
        </section>


        <?php include 'php/footer.php'; ?>

      </div>
    </div>

  </div><!-- /.page-wrapper -->

  <?php include 'php/mob-nav.php'; ?>

  <?php include 'php/config-js.php'; ?>

  <?php include 'php/scripts.php'; ?>

  <script src="/assets/js/module/pricing.js" defer></script>

</body>

</html>