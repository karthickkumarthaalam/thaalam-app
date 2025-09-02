<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Account - Thaalam Radio Station</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <?php include 'php/css.php'; ?>
    <link rel="stylesheet" href="assets/css/module-css/my-account.css">
</head>

<body class="custom-cursor">
    <?php $pagename = 'my-account'; ?>

    <?php include 'php/toast.php'; ?>
    <?php include 'php/preloader.php'; ?>

    <div class="page-wrapper">
        <div class="row">
            <div>
                <?php include 'php/header.php'; ?>

                <section class="my-acc-sec" style="background-image: 
          linear-gradient(rgba(255, 255, 255, 0.65), rgba(255, 255, 255, 0.65)), 
          url('assets/img/home/pattern/banner-2.png');background-size: contain;">
                    <div class="account-tabs">
                        <div class="user-info-bar">
                            <div class="user-avatar-large" id="avatar-initial"></div>
                            <div class="user-meta">
                                <span class="username" id="username"></span>
                                <span class="member-id" id="memberid"></span>
                            </div>
                        </div>
                        <div class="tabs-header">
                            <div class="tab active" data-tab="orders"><i class="fas fa-receipt"></i> Orders</div>
                            <div class="tab" data-tab="settings"><i class="fas fa-user-cog"></i> Settings</div>
                            <div class="tab" data-tab="coupons"><i class="fas fa-tag"></i> Coupons</div>
                            <div class="tab signout"> <a href="index.php"><i class="fas fa-sign-out-alt"></i> Sign out</a></div>
                        </div>

                        <div class="tabs-content">
                            <!-- Orders Tab -->
                            <div class="tab-panel active" id="orders">
                                <div class="active-plan" id="plan-box">
                                </div>

                                <div class="orders-section">
                                    <h4><i class="fas fa-history"></i> Order History</h4>
                                    <table class="orders-table">
                                        <thead>
                                            <tr>
                                                <th>Package ID</th>
                                                <th>Transaction ID</th>
                                                <th>Package Name</th>
                                                <th>Purchase Date</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Refund</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Settings Tab -->
                            <div class="tab-panel" id="settings">
                                <div class="settings-grid">
                                    <div class="form-section prof-details">
                                        <h4><i class="fas fa-user-edit"></i> Profile Details</h4>
                                        <div class="form-grid">
                                            <div class="form-group">
                                                <label>Full Name</label>
                                                <i class="fas fa-user"></i>
                                                <input type="text" id="profile-name" placeholder="Name" />
                                            </div>
                                            <div class="form-group">
                                                <label>Gender</label>
                                                <i class="fas fa-venus-mars"></i>
                                                <select id="profile-gender">
                                                    <option>Male</option>
                                                    <option>Female</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Address 1</label>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <input type="text" id="profile-address1" placeholder="Address 1" />
                                            </div>
                                            <div class="form-group">
                                                <label>Address 2</label>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <input type="text" id="profile-address2" placeholder="Address 2" />
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <i class="fas fa-envelope"></i>
                                                <input type="email" id="profile-email" placeholder="Email" />
                                            </div>
                                            <div class="form-group">
                                                <label>Mobile</label>
                                                <i class="fas fa-phone"></i>
                                                <input type="tel" id="profile-mobile" placeholder="Mobile" />
                                            </div>
                                            <div class="otp-content">
                                                <div class="form-group" id="otp-section">
                                                    <label>Enter OTP</label>
                                                    <i class="fas fa-key"></i>
                                                    <input type="tel" id="otp-field" placeholder="123456" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="otp-content">
                                            <p class="text-success">We’ve sent a 6-digit OTP to your registered
                                                email. Enter it below to confirm your changes.</p>
                                        </div>
                                        <button class="btn-primary" id="profile-btn"><i class="fas fa-check-circle"></i> Verify & continue</button>
                                    </div>

                                    <div class="form-section">
                                        <h4><i class="fas fa-lock"></i> Change Password</h4>
                                        <div class="form-group">
                                            <label>Current Password</label>
                                            <i class="fas fa-key"></i>
                                            <input type="password" placeholder="Old password" />
                                        </div>
                                        <div class="form-group">
                                            <label>New Password</label>
                                            <i class="fas fa-key"></i>
                                            <input type="password" placeholder="New password" />
                                        </div>
                                        <div class="form-group">
                                            <label>Confirm New Password</label>
                                            <i class="fas fa-key"></i>
                                            <input type="password" placeholder="Confirm new password" />
                                        </div>
                                        <button class="btn-primary"><i class="fas fa-sync-alt"></i> Update Password</button>
                                    </div>
                                </div>
                            </div>

                            <!-- Coupons Tab -->
                            <div class="tab-panel" id="coupons">
                                <div class="coupon-box">
                                    <h4><i class="fas fa-tag"></i> Available Coupons</h4>
                                    <p>You don't have any active coupons right now</p>
                                    <button class="btn-primary"><i class="fas fa-plus"></i> Apply Coupon</button>
                                </div>
                            </div>
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

    <script src="assets/js/module/my-account.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const token = localStorage.getItem("token");
            const memberId = localStorage.getItem("memberId");

            // Elements
            const usernameEl = document.getElementById("username");
            const memberIdEl = document.getElementById("memberid");
            const ordersTableBody = document.querySelector(".orders-table tbody");
            const planBox = document.getElementById("plan-box");
            const couponBox = document.querySelector("#coupons .coupon-box");

            // ========== Fetch Member & Package Details ==========
            fetch(`${window.API_BASE_URL}/memberPackage/details`, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify({
                        memberid: memberId
                    }),
                })
                .then(res => res.json())
                .then(response => {
                    if (response.status === "error") {
                        showToast(response.message, "error");
                        return;
                    }

                    const item = response.items[0];
                    usernameEl.textContent = item.name;
                    memberIdEl.textContent = `Member ID: ${memberId}`;

                    document.getElementById("avatar-initial").textContent =
                        item.name ? item.name.charAt(0).toUpperCase() : "-";

                    // Profile fields
                    document.getElementById("profile-name").value = item.name || "";
                    document.getElementById("profile-gender").value = item.gender || "Male";
                    document.getElementById("profile-address1").value = item.address1 || "";
                    document.getElementById("profile-address2").value = item.address2 || "";
                    document.getElementById("profile-email").value = item.email || "";
                    document.getElementById("profile-mobile").value = item.mobile || "";

                    if (!item.package_name) {
                        planBox.innerHTML = `
              <p>No active plan</p>
              <button class="btn-upgrade" onclick="window.location.href='/pricing.php'">Buy Plan</button>`;
                    } else {
                        planBox.innerHTML = `
              <p>Active Plan</p>
              <h4 class="plan-name">${item.package_name}</h4>
              <p class="price">${item.symbol}${item.price.toFixed(2)} / ${item.duration || "month"}</p>
              <p class="expire">Expires on: ${new Date(item.valid_till).toLocaleDateString("en-GB")}</p>
              <button class="btn-upgrade" onclick="window.location.href='/pricing.php'">${item.package_status === "grace_period" ? "Renew Plan" : "Upgrade Plan"}</button>`;
                    }
                })
                .catch(err => console.error(err));

            // ========== Fetch Order History ==========
            fetch(`${window.API_BASE_URL}/transactions/buy-package-report`, {
                    method: "GET",
                    headers: {
                        Authorization: "Bearer " + token
                    },
                })
                .then(res => res.json())
                .then(response => {
                    if (response.status === "error") {
                        showToast(response.message, "error");
                        return;
                    }

                    ordersTableBody.innerHTML = "";
                    response.items.forEach(item => {
                        let purchaseDate = new Date(item.start_date).toLocaleString();
                        let refundBtn = "-";
                        let hoursDiff = (new Date() - new Date(item.start_date)) / (1000 * 60 * 60);

                        if (item.refund_status === "pending") {
                            refundBtn = `<span class="pending">Pending</span>`;
                        } else if (hoursDiff <= 48) {
                            refundBtn = `<button class="btn-refund" onclick="openRefundModal('${item.transaction_id}')">Request Refund</button>`;
                        }

                        ordersTableBody.innerHTML += `
              <tr>
                <td>${item.package_id}</td>
                <td>${item.transaction_id}</td>
                <td>${item.package_name}</td>
                <td>${purchaseDate}</td>
                <td>${item.symbol} ${parseFloat(item.price).toFixed(2)}</td>
                <td class="${item.payment_status === "0" ? "pending" : "paid"}">
                  ${item.payment_status === "0" ? "Pending" : "Paid"}
                </td>
                <td>${refundBtn}</td>
              </tr>`;
                    });
                })
                .catch(err => console.error(err));

            // ========= SAVE PROFILE =========
            let otpGenerated = false
            const saveProfileBtn = document.querySelector(".prof-details .btn-primary");
            saveProfileBtn.addEventListener("click", function() {

                if (!otpGenerated) {
                    fetch(`${window.API_BASE_URL}/members/${memberId}/request-update-otp`, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "Authorization": "Bearer " + token
                            }
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === "success") {
                                document.querySelectorAll(".otp-content").forEach(el => {
                                    el.style.display = "block";
                                });
                                document.getElementById("profile-btn").innerHTML = `<i class="fa fa-user-check"></i> Confirm & Update`;
                                otpGenerated = true;
                            }
                        })
                        .catch(error => {
                            showToast(error, "error")
                        })
                } else {
                    const otp = document.getElementById("otp-field").value;

                    if (!otp) {
                        showToast("OTP is required", "error");
                        return;
                    }

                    const fullName = document.getElementById("profile-name").value;
                    const gender = document.getElementById("profile-gender").value;
                    const address1 = document.getElementById("profile-address1").value;
                    const address2 = document.getElementById("profile-address2").value;
                    const email = document.getElementById("profile-email").value;
                    const phone = document.getElementById("profile-mobile").value;

                    fetch(`${window.API_BASE_URL}/members/${memberId}`, {
                            method: "PUT",
                            headers: {
                                "Content-Type": "application/json",
                                Authorization: "Bearer " + token
                            },
                            body: JSON.stringify({
                                name: fullName,
                                gender,
                                address1,
                                address2,
                                email,
                                phone,
                                otp
                            })
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === "success") {
                                showToast("Profile updated successfully", "success");
                                document.querySelectorAll(".otp-content").forEach(el => {
                                    el.style.display = "none";
                                });
                                document.getElementById("profile-btn").innerHTML = `<i class="fa fa-check"></i> Verify & Continue`;
                                otpGenerated = false
                            } else {
                                showToast(data.message, "error");
                            }
                        })
                        .catch(err => showToast("Failed to update profile", "error"));
                }
            });

            // ========= PASSWORD FORM =========
            const updatePassBtn = document.querySelector("#settings .form-section:nth-child(2) .btn-primary");
            updatePassBtn.addEventListener("click", function() {
                const oldPass = document.querySelector('input[placeholder="Old password"]').value;
                const newPass = document.querySelector('input[placeholder="New password"]').value;
                const confirmPass = document.querySelector('input[placeholder="Confirm new password"]').value;

                if (newPass !== confirmPass) {
                    showToast("Passwords do not match", "error");
                    return;
                }

                fetch(`${window.API_BASE_URL}/members/change-password`, {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            Authorization: "Bearer " + token
                        },
                        body: JSON.stringify({
                            currentPassword: oldPass,
                            newPassword: newPass,
                            confirmPassword: confirmPass
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.status === "success") {
                            showToast("Password updated successfully", "success");
                        } else {
                            showToast(data.message, "error");
                        }
                    })
                    .catch(err => console.error(err));
            });

            // ========== Fetch Coupons ==========
            fetch(`${window.API_BASE_URL}/coupons/coupon-report`, {
                    method: "GET",
                    headers: {
                        Authorization: "Bearer " + token
                    },
                })
                .then(res => res.json())
                .then(response => {
                    if (response.status === "success" && response.items.length > 0) {
                        couponBox.innerHTML = `<h4><i class="fas fa-tag"></i> Available Coupons</h4>`;
                        response.items.forEach(coupon => {
                            couponBox.innerHTML += `
                <div class="coupon-card">
                  <h5>${coupon.coupon_name}</h5>
                  <p>${coupon.description}</p>
                  <div class="coupon-code" onclick="copyCouponCode(this)">
                    ${coupon.coupon_code}
                  </div>
                  <a href="${coupon.redirect_url}" target="_blank">Use Coupon</a>
                </div>`;
                        });
                    } else {
                        couponBox.innerHTML = `<p>No active coupons</p>`;
                    }
                })
                .catch(err => console.error(err));

            // ========== Tabs Switch ==========
            const tabs = document.querySelectorAll(".tab");
            const panels = document.querySelectorAll(".tab-panel");

            tabs.forEach(tab => {
                tab.addEventListener("click", function() {
                    tabs.forEach(t => t.classList.remove("active"));
                    panels.forEach(p => p.classList.remove("active"));

                    this.classList.add("active");
                    const target = this.dataset.tab;
                    if (target) {
                        document.getElementById(target).classList.add("active");
                    }
                });
            });
        });

        // ========== Refund Modal ==========
        function openRefundModal(transactionId) {
            Swal.fire({
                title: "Refund Request",
                html: `
          <p style="font-size:18px; color:#222; margin-bottom:10px;">
            Please provide a reason for Transaction <b style="color:#c62828;"> #${transactionId}</b>
          </p>
        `,
                input: "textarea",
                inputPlaceholder: "Type your refund reason...",
                inputAttributes: {
                    rows: 5,
                    style: `
              resize:none;
              width:90%;
              padding:10px;
              font-size:14px;
              border-radius:6px;
              border:1px solid #ccc;
              background:#fff;
              color:#333;
              line-height:1.4;
            `
                },
                showCancelButton: true,
                confirmButtonText: "Submit",
                cancelButtonText: "Cancel",
                confirmButtonColor: "#c62828", // red accent
                cancelButtonColor: "#000000ff", // flat gray
                background: "#ffffff", // white card background
                color: "#111", // black text
                backdrop: "rgba(0,0,0,0.55)", // subtle dim
                customClass: {
                    popup: "refund-modal-popup"
                },
                inputValidator: (value) => {
                    if (!value.trim()) {
                        return "Please enter a refund reason!";
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`${window.API_BASE_URL}/transactions/request-refund`, {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json"
                            },
                            body: JSON.stringify({
                                transaction_id: transactionId,
                                refund_reason: result.value
                            }),
                        })
                        .then(res => res.json())
                        .then(data => {
                            if (data.status === "success") {
                                Swal.fire({
                                    icon: "success",
                                    title: "Refund Requested",
                                    text: "Your refund request has been submitted successfully.",
                                    background: "#fff",
                                    color: "#111",
                                    confirmButtonColor: "#c62828"
                                }).then(() => location.reload());
                            } else {
                                Swal.fire({
                                    icon: "error",
                                    title: "Error",
                                    text: data.message || "Something went wrong.",
                                    background: "#fff",
                                    color: "#111",
                                    confirmButtonColor: "#c62828"
                                });
                            }
                        })
                        .catch(() => {
                            Swal.fire({
                                icon: "error",
                                title: "Error",
                                text: "Unable to process your request. Please try again.",
                                background: "#fff",
                                color: "#111",
                                confirmButtonColor: "#c62828"
                            });
                        });
                }
            });
        }


        // ========== Copy Coupon ==========
        function copyCouponCode(el) {
            const code = el.textContent.trim();
            navigator.clipboard.writeText(code)
                .then(() => showToast("Copied: " + code, "success"))
                .catch(() => alert("Failed to copy, please copy manually: " + code));
        }
    </script>

</body>

</html>