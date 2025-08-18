<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Account - Thaalam Radio Station</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <?php include 'php/css.php'; ?>

    <style>
        :root {
            --primary: #d50000;
            --primary-light: #ffebee;
            --secondary: #333;
            --light-gray: #f5f5f5;
            --medium-gray: #e0e0e0;
            --dark-gray: #757575;
            --white: #ffffff;
            --shadow-sm: 0 1px 3px rgba(0, 0, 0, 0.12);
            --shadow-md: 0 4px 6px rgba(0, 0, 0, 0.1);
            --shadow-lg: 0 10px 25px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
        }

        /* User Dropdown */
        .user-dropdown {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .user-greeting {
            color: var(--white);
            border-radius: 24px;
            padding: 8px 16px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 15px;
            background: rgba(255, 255, 255, 0.15);
            transition: var(--transition);
        }

        .user-greeting:hover {
            background: rgba(255, 255, 255, 0.25);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: var(--white);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        .dropdown-arrow {
            font-size: 10px;
            transition: transform 0.3s;
        }

        .user-dropdown:hover .dropdown-arrow {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            position: absolute;
            padding: 8px 0;
            top: 100%;
            right: 0;
            background-color: var(--white);
            min-width: 200px;
            box-shadow: var(--shadow-lg);
            border-radius: 8px;
            z-index: 100;
            display: none;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s, transform 0.3s;
        }

        .user-dropdown:hover .dropdown-menu {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .dropdown-item {
            color: var(--secondary);
            padding: 12px 20px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
        }

        .dropdown-item i {
            width: 20px;
            text-align: center;
        }

        .dropdown-item:hover {
            background-color: var(--primary-light);
            color: var(--primary);
            padding-left: 22px;
        }

        /* Main Account Styles */
        .account-tabs {
            border: 1px solid var(--medium-gray);
            border-radius: 16px;
            overflow: hidden;
            background: var(--white);
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .account-tabs:hover {
            box-shadow: var(--shadow-md);
        }

        .tabs-header {
            display: flex;
            border-bottom: 1px solid var(--medium-gray);
            background: var(--light-gray);
        }

        .tab {
            padding: 16px 24px;
            cursor: pointer;
            font-weight: 500;
            color: var(--dark-gray);
            border-bottom: 3px solid transparent;
            transition: var(--transition);
            position: relative;
        }

        .tab:hover {
            color: var(--primary);
            background: rgba(213, 0, 0, 0.05);
        }

        .tab.active {
            border-color: var(--primary);
            color: var(--primary);
            background: var(--white);
        }

        .tab.active::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            right: 0;
            height: 1px;
            background: var(--white);
        }

        .tab.signout {
            margin-left: auto;
            color: var(--dark-gray);
            display: flex;
            align-items: center;
            gap: 8px;
            transition: var(--transition);
        }

        .tab.signout:hover {
            color: var(--primary);
        }

        .tabs-content {
            padding: 30px;
        }

        /* Tab Panels */
        .tab-panel {
            display: none;
            animation: fadeIn 0.5s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .tab-panel.active {
            display: block;
        }

        /* Orders Table */
        .orders-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 0.95rem;
            box-shadow: var(--shadow-sm);
        }

        .orders-table th {
            background: var(--light-gray);
            text-align: left;
            font-weight: 600;
            color: var(--secondary);
        }

        .orders-table th,
        .orders-table td {
            padding: 12px 16px;
            border-bottom: 1px solid var(--medium-gray);
        }

        .orders-table tr:last-child td {
            border-bottom: none;
        }

        .orders-table tr:hover td {
            background: var(--primary-light);
        }

        .orders-table .paid {
            color: #2e7d32;
            font-weight: 600;
        }

        /* Active Plan Box */
        .active-plan {
            background: linear-gradient(135deg, #f5f5f5 0%, #fafafa 100%);
            padding: 24px;
            border-radius: 12px;
            margin-bottom: 30px;
            position: relative;
            border: 1px solid var(--medium-gray);
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .active-plan:hover {
            box-shadow: var(--shadow-md);
        }

        .active-plan .plan-name {
            font-size: 1.4rem;
            color: var(--primary);
            margin: 8px 0;
            font-weight: 600;
        }

        .active-plan p {
            margin: 4px 0;
            color: var(--dark-gray);
        }

        .btn-upgrade {
            position: absolute;
            right: 24px;
            top: 24px;
            padding: 8px 20px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 24px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-upgrade:hover {
            background: #b71c1c;
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        /* Settings Grid */
        .settings-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
        }

        .form-section {
            background: var(--white);
            padding: 24px;
            border-radius: 12px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }

        .form-section:hover {
            box-shadow: var(--shadow-md);
        }

        .form-section h4 {
            margin-top: 0;
            margin-bottom: 20px;
            padding-bottom: 12px;
            border-bottom: 1px solid var(--medium-gray);
            color: var(--primary);
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .form-section h4 i {
            font-size: 1rem;
        }

        .form-group {
            margin-bottom: 10px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 3px;
            color: var(--dark-gray);
            font-size: 0.9rem;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 7px 16px 7px 44px;
            border: 1px solid var(--medium-gray);
            border-radius: 8px;
            background: var(--white);
            outline: none;
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px var(--primary-light);
        }

        .form-group i {
            position: absolute;
            left: 16px;
            top: 42px;
            color: var(--dark-gray);
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: var(--transition);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 10px;
        }

        .btn-primary:hover {
            background: #b71c1c;
            transform: translateY(-2px);
            box-shadow: var(--shadow-sm);
        }

        /* Coupon Box */
        .coupon-box {
            padding: 40px;
            text-align: center;
            border: 2px dashed var(--medium-gray);
            border-radius: 12px;
            background: var(--light-gray);
            transition: var(--transition);
        }

        .coupon-box:hover {
            border-color: var(--primary);
            background: var(--primary-light);
        }

        .coupon-box h4 {
            margin-top: 0;
            color: var(--primary);
        }

        .coupon-box p {
            color: var(--dark-gray);
        }

        /* User Info Bar */
        .user-info-bar {
            padding: 24px 30px;
            background: linear-gradient(135deg, var(--primary) 0%, #b71c1c 100%);
            color: var(--white);
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .user-avatar-large {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--white);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            box-shadow: var(--shadow-sm);
        }

        .user-meta {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .username {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--white);
        }

        .member-id {
            font-size: 0.9rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .my-acc-sec {
            padding: 30px;
        }



        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 0 1.5rem;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .tabs-header {
                flex-wrap: wrap;
            }

            .tab {
                flex: 1 0 auto;
                text-align: center;
                padding: 12px;
            }

            .tab.signout {
                margin-left: 0;
                flex-basis: 100%;
                justify-content: center;
                border-top: 1px solid var(--medium-gray);
                padding: 12px;
            }

            .settings-grid {
                grid-template-columns: 1fr;
            }

            .user-info-bar {
                flex-direction: column;
                text-align: center;
            }

            .form-grid {
                grid-template-columns: repeat(1, 1fr);
            }

            .btn-upgrade {
                position: relative;
                right: unset;
                top: unset;
            }
        }
    </style>
</head>

<body class="custom-cursor">
    <?php $pagename = 'my-account'; ?>

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
                            <div class="user-avatar-large">V</div>
                            <div class="user-meta">
                                <span class="username">vijay</span>
                                <span class="member-id">Member ID: 559338</span>
                            </div>
                        </div>
                        <div class="tabs-header">
                            <div class="tab active" data-tab="orders"><i class="fas fa-receipt"></i> Orders</div>
                            <div class="tab" data-tab="settings"><i class="fas fa-user-cog"></i> Settings</div>
                            <div class="tab" data-tab="coupons"><i class="fas fa-tag"></i> Coupons</div>
                            <div class="tab signout"> <a href="index.php"><i class="fas fa-sign-out-alt"></i> Sign
                                    out</a></div>

                        </div>

                        <div class="tabs-content">
                            <!-- Orders Tab -->
                            <div class="tab-panel active" id="orders">
                                <div class="active-plan">
                                    <p>Active plan</p>
                                    <h4 class="plan-name">Basic Plan</h4>
                                    <p class="price">CHF 10.00 / month</p>
                                    <p class="expire">Expires on: 04/07/2025</p>
                                    <button class="btn-upgrade"><i class="fas fa-arrow-up"></i> Upgrade Plan</button>
                                </div>

                                <h4><i class="fas fa-history"></i> Order History</h4>
                                <table class="orders-table table-responsive">
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
                                        <tr>
                                            <td>1</td>
                                            <td>pi_3RWKqsGGUYUmVb761HSeDR16</td>
                                            <td>Basic Plan</td>
                                            <td>6/4/2025, 10:41:48 PM</td>
                                            <td>CHF 10.00</td>
                                            <td class="paid">Paid</td>
                                            <td>-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- Settings Tab -->
                            <div class="tab-panel" id="settings">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="form-section prof-details">
                                            <h4><i class="fas fa-user-edit"></i> Profile Details</h4>
                                            <div class="form-grid">
                                                <div class="form-group">
                                                    <label>Full Name</label>
                                                    <i class="fas fa-user"></i>
                                                    <input type="text" value="vijay" placeholder="Name" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Gender</label>
                                                    <i class="fas fa-venus-mars"></i>
                                                    <select>
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                        <option>Other</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Address 1</label>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <input type="text" value="Zurich" placeholder="Address 1" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Address 2</label>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <input type="text" value="Zug" placeholder="Address 2" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <i class="fas fa-envelope"></i>
                                                    <input type="email" value="dedicoit@gmail.com"
                                                        placeholder="Email" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Mobile</label>
                                                    <i class="fas fa-phone"></i>
                                                    <input type="tel" value="799064537" placeholder="Mobile" />
                                                </div>
                                            </div>
                                            <button class="btn-primary"><i class="fas fa-check-circle"></i> Save
                                                Changes</button>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
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
                                            <button class="btn-primary"><i class="fas fa-sync-alt"></i> Update
                                                Password</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Coupons Tab -->
                            <div class="tab-panel" id="coupons">
                                <div class="coupon-box">
                                    <h4><i class="fas fa-tag"></i> Available Coupons</h4>
                                    <p>You don't have any active coupons right now</p>
                                    <button class="btn-primary" style="margin-top: 20px;"><i class="fas fa-plus"></i>
                                        Apply Coupon</button>
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

    <?php include 'php/scripts.php'; ?>

    <script>
        const tabs = document.querySelectorAll('.tab');
        const panels = document.querySelectorAll('.tab-panel');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const target = tab.dataset.tab;

                tabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');

                panels.forEach(panel => {
                    panel.classList.remove('active');
                    if (panel.id === target) {
                        panel.classList.add('active');
                    }
                });
            });
        });

        // Add smooth scrolling to all links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>
</body>

</html>