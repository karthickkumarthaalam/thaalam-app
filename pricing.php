<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  $page_title = "Pricing - Thaalam Radio Station";
  $page_description = "Choose the best Thaalam Radio Station subscription plan. Explore monthly and yearly packages tailored for music lovers and podcast enthusiasts.";
  $page_url = "https://demoview.ch/summerfest/thaalam-main/pricing";
  $page_image = "https://demoview.ch/summerfest/thaalam-main/assets/img/logo/thalam-logo.png";
  include 'php/meta.php';
  ?>

  <?php include 'php/css.php'; ?>
  <link rel="stylesheet" href="assets/css/module-css/pricing.css">
</head>

<body class="custom-cursor">
  <?php $pagename = 'pricing'; ?>

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

  <script>
    let items = [];
    let selectedDuration = "yearly";

    document.addEventListener('DOMContentLoaded', function() {
      getPackage();
    });

    function initAccordion() {
      const accordionItems = document.querySelectorAll('.accordion-item');

      accordionItems.forEach(item => {
        const header = item.querySelector('.accordion-header');
        const content = item.querySelector('.accordion-content');

        header.addEventListener('click', () => {
          // Close all others
          accordionItems.forEach(otherItem => {
            if (otherItem !== item) {
              otherItem.classList.remove('active');
            }
          });

          // Toggle current
          item.classList.toggle('active');
        });
      });
    }

    function setBillingDuration(duration) {
      selectedDuration = duration;

      document.getElementById("yearlyBtn").classList.remove("active");
      document.getElementById("monthlyBtn").classList.remove("active");

      if (duration === "yearly") {
        document.getElementById("yearlyBtn").classList.add("active");
      } else {
        document.getElementById("monthlyBtn").classList.add("active");
      }
      getPackage();
    }

    function getPackage() {
      const token = localStorage.getItem("token") || "";
      const queryParams = new URLSearchParams({
        page: 1,
        limit: 50,
        status: "active"
      });

      fetch(`${window.API_BASE_URL}/package?${queryParams.toString()}`)
        .then(res => res.json())
        .then(response => {
          items = response.data || [];
          renderPackages();
        })
        .catch(err => console.error("Error loading packages", err));
    }

    function renderPackages() {
      const accordion = document.querySelector(".accordion");
      accordion.innerHTML = "";

      if (!items || items.length === 0) {
        const pricingToggle = document.querySelector(".pricing-toggle");
        if (pricingToggle) {
          pricingToggle.style.display = "none";
        }
        accordion.innerHTML = `
      <div class="no-packages">
        <div class="empty-icon"><i class="fas fa-box-open"></i></div>
        <h3>No Membership Plans Available</h3>
        <p>Please check back later or contact support for more information.</p>
      </div>
    `;
        return;
      }


      items.forEach((pkg, index) => {
        let features = pkg.features.map(f => `<li><i class="fas fa-check"></i> ${f}</li>`).join("");

        let priceLabel = (selectedDuration === "yearly" && pkg.yearly_price) ?
          `<div class="yearly-price">
                        <span class="old-price">${pkg.symbol || "CHF"} ${pkg.price.toFixed(2)} / month</span>
                        <span>${pkg.symbol || "CHF"} ${pkg.yearly_price.toFixed(2)} / month</span>
                    </div>` :
          `<span>${pkg.symbol || "CHF"} ${pkg.price.toFixed(2)} / ${pkg.duration}</span>`;

        accordion.innerHTML += `
                <div class="accordion-item ${index === 0 ? "active" : ""}">
                    <div class="accordion-header">
                        <div class="plan-icon desktop-menu"><i class="fas fa-music"></i></div>
                        <div class="plan-info">
                            <h3>${pkg.package_name}</h3>
                            <p>${pkg.description || "Thaalam Membership Plan"}</p>
                        </div>
                        <div class="plan-price">
                            ${priceLabel}
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>
                    <div class="accordion-content">
                        <ul class="plan-features">${features}</ul>
                        <a href="javascript:void(0)" class="btn-purchase" onclick="buyPackage(${index})">Buy Now</a>
                    </div>
                </div>
            `;
      });

      initAccordion();
    }

    async function buyPackage(packageId) {
      const packageDetails = items[packageId];
      const memberId = localStorage.getItem("memberId");
      const token = localStorage.getItem("token");

      const isYearly = selectedDuration === "yearly";
      const unitPrice = isYearly ? packageDetails.yearly_price.toFixed(2) : packageDetails.price.toFixed(2);
      const totalPrice = isYearly ? (packageDetails.yearly_price * 12).toFixed(2) : packageDetails.price;
      const durationLabel = isYearly ? "per Year" : `per ${packageDetails.duration}`;
      const totalLabel = isYearly ?
        `<p style="color:#e53935; font-size:18px; margin-top:10px;">
                    <strong>Total:</strong> CHF ${totalPrice} / year
               </p>` :
        "";

      const result = await Swal.fire({
        title: '',
        html: `
    <div style="
      font-family: 'Inter', sans-serif;
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      text-align: center;
    ">
      <!-- Header -->
      <h2 style="margin:0; font-size: 22px; font-weight: 700; color:#222;">
        Subscription Summary
      </h2>
      <p style="margin:6px 0 20px; font-size: 14px; color:#666;">
        Review your plan before proceeding
      </p>

      <!-- Plan Card -->
      <div style="
        border: 1px solid #eee;
        border-radius: 10px;
        padding: 16px;
        background: #fafafa;
        margin-bottom: 18px;
        text-align:left;
      ">
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
          <span style="font-size:15px; color:#555;">Plan</span>
          <span style="font-size:15px; font-weight:600; color:#d32f2f;">
            ${packageDetails.package_name}
          </span>
        </div>
        <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:8px;">
            ${durationLabel !== "free" ? `<span style="font-size:15px; color:#555;">Billing Cycle</span>
          <span style="font-size:15px; font-weight:500; color:#000;">
            ${durationLabel}
          </span>` : ""}
        </div>
        <div style="display:flex; justify-content:space-between; align-items:center;">
          <span style="font-size:15px; color:#555;">Price</span>
          <span style="font-size:16px; font-weight:700; color:#000;">
            CHF ${unitPrice}
          </span>
        </div>
      </div>

      <!-- Total -->
      <div style="
        font-size: 17px;
        font-weight: 700;
        color:#222;
        margin-bottom: 12px;
      ">
        ${totalLabel}
      </div>

      <!-- Trust Badge -->
      <div style="
        font-size: 12px;
        color:#888;
        background:#f5f5f5;
        padding:8px 12px;
        border-radius:6px;
      ">
        🔒 Your payment is 100% secure
      </div>
    </div>
  `,
        showCancelButton: true,
        confirmButtonText: "Continue Payment",
        cancelButtonText: "Cancel Payment",
        customClass: {
          confirmButton: 'swal2-confirm-custom',
          cancelButton: 'swal2-cancel-custom'
        },
        buttonsStyling: false,
        width: 480,
        padding: "1.5rem"
      });

      const duration = selectedDuration === "yearly" ? "year" : "month";

      if (result.isConfirmed) {
        try {
          const paymentIntentRes = await fetch(`${window.API_BASE_URL}/payments/initiate`, {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
              'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify({
              member_id: memberId,
              package_id: packageDetails.id,
              currency: "chf",
              duration: duration
            })
          });

          const data = await paymentIntentRes.json();

          if (data.success) {
            window.location.href = data.session_url;
          } else {
            Swal.fire({
              html: `
    <div style="
      text-align:center; 
      padding: 15px 10px;
    ">
      <div style="
        width: 60px; 
        height: 60px; 
        margin: 0 auto 15px; 
        border-radius: 50%; 
        background: rgba(211,47,47,0.1); 
        display: flex; 
        align-items: center; 
        justify-content: center;
      ">
        <i class="fas fa-times" style="font-size:26px; color:#d32f2f;"></i>
      </div>
      <h2 style="font-size:20px; font-weight:600; color:#d32f2f; margin-bottom:10px;">
        Payment Failed
      </h2>
      <p style="font-size:15px; color:#444; margin:0;">
        ${data.message || "Unable to initiate payment. Please verify your details and try again."}
      </p>
    </div>
  `,
              showConfirmButton: true,
              confirmButtonText: "Close",
              customClass: {
                popup: "swal2-popup-custom",
                confirmButton: "swal2-confirm-custom"
              },
              buttonsStyling: false
            });

          }
        } catch (error) {
          console.error(error);
          Swal.fire({
            html: `
    <div style="
      text-align:center; 
      padding: 15px 10px;
    ">
      <div style="
        width: 60px; 
        height: 60px; 
        margin: 0 auto 15px; 
        border-radius: 50%; 
        background: rgba(211,47,47,0.1); 
        display: flex; 
        align-items: center; 
        justify-content: center;
      ">
        <i class="fas fa-exclamation-triangle" style="font-size:26px; color:#d32f2f;"></i>
      </div>
      <h2 style="font-size:20px; font-weight:600; color:#d32f2f; margin-bottom:10px;">
        Something Went Wrong
      </h2>
      <p style="font-size:15px; color:#444; margin:0;">
        An error occurred while initiating payment. Please try again later.
      </p>
    </div>
  `,
            showConfirmButton: true,
            confirmButtonText: "Close",
            customClass: {
              popup: "swal2-popup-custom",
              confirmButton: "swal2-confirm-custom"
            },
            buttonsStyling: false
          });

        }
      }
    }
  </script>
</body>

</html>