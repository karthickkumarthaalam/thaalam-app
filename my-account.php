<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Account - Thaalam Radio Station</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <?php include 'php/css.php'; ?>
    <link rel="stylesheet" href="assets/css/module-css/my-account.css">

    <?php include 'php/analyticsHeader.php'; ?>
</head>

<body class="custom-cursor">
    <?php $pagename = 'my-account'; ?>

    <?php include 'php/analyticsBody.php'; ?>
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
                            <div class="tab signout"> <a href="index"><i class="fas fa-sign-out-alt"></i> Sign out</a></div>
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

    <script src="assets/js/module/my-account.js" defer></script>

</body>

</html>