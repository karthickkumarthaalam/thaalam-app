<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verified Payslip - Thaalam Media</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Reset & Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            color: #1a202c;
            line-height: 1.6;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .page-wrapper {
            max-width: 800px;
            width: 100%;
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            position: relative;
        }

        /* Header Section */
        .header {
            background: linear-gradient(135deg, #1e40af 0%, #1e3a8a 100%);
            color: white;
            padding: 30px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .header-left img {
            height: 60px;
            width: auto;
        }

        .company-info h2 {
            font-size: 24px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .company-info p {
            font-size: 14px;
            opacity: 0.9;
        }

        .header-right {
            text-align: right;
        }

        .verification-label {
            font-size: 14px;
            opacity: 0.9;
            margin-bottom: 5px;
        }

        .month-label {
            font-size: 18px;
            font-weight: 600;
        }

        /* Content Section */
        .content {
            padding: 40px;
        }

        /* Title Section */
        .title-section {
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 28px;
            font-weight: 700;
            color: #059669;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .subtitle {
            font-size: 16px;
            color: #64748b;
        }

        /* Payslip Info */
        .payslip-info {
            background: #f8fafc;
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 30px;
            border: 1px solid #e2e8f0;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #e2e8f0;
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .label {
            font-weight: 500;
            color: #475569;
            font-size: 15px;
        }

        .value {
            font-weight: 600;
            color: #1e293b;
            font-size: 15px;
        }

        .value.amount {
            color: #1e40af;
        }

        /* Verification Section */
        .verification-section {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            background: #f0fdf4;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #dcfce7;
            margin-bottom: 25px;
        }

        .verified-icon {
            color: #059669;
            font-size: 24px;
        }

        .verified-text {
            font-weight: 600;
            color: #059669;
            font-size: 16px;
        }

        /* Error Message */
        .error {
            color: #dc2626;
            text-align: center;
            margin: 20px 0;
            font-weight: 500;
            padding: 12px;
            background: #fef2f2;
            border-radius: 8px;
            border: 1px solid #fecaca;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 25px;
            border-top: 1px solid #e2e8f0;
            font-size: 13px;
            color: #64748b;
            background: #f8fafc;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .header {
                padding: 25px 30px;
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .header-right {
                text-align: left;
            }

            .content {
                padding: 30px;
            }

            h1 {
                font-size: 24px;
            }
        }

        @media (max-width: 480px) {
            .header {
                padding: 20px;
            }

            .content {
                padding: 20px;
            }

            .header-left {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }

            .info-row {
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }

            h1 {
                font-size: 22px;
            }
        }

        /* Animation for loading */
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

        .fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
</head>

<body>
    <div class="page-wrapper fade-in">
        <!-- Header -->
        <div class="header">
            <div class="header-left">
                <img src="https://thaalam.ch/assets/img/logo/thalam-logo.png" alt="Thaalam Logo">
                <div class="company-info">
                    <h2>Thaalam Media GmbH</h2>
                    <p>Talacker 41, Zürich | www.thaalam.ch</p>
                </div>
            </div>
            <div class="header-right">
                <div class="verification-label">Payslip Verification</div>
                <div class="month-label" id="payslipMonth">-</div>
            </div>
        </div>

        <!-- Content -->
        <div class="content">
            <!-- Title Section -->
            <div class="title-section">
                <h1>
                    <span>✅</span> Verified Payslip
                </h1>
                <p class="subtitle">Official document for salary verification</p>
            </div>

            <!-- Payslip Information -->
            <div class="payslip-info">
                <div class="info-row">
                    <span class="label">Employee Name</span>
                    <span class="value" id="employeeName">-</span>
                </div>
                <div class="info-row">
                    <span class="label">Employee ID</span>
                    <span class="value" id="employeeID">-</span>
                </div>
                <div class="info-row">
                    <span class="label">Department</span>
                    <span class="value" id="employeeDept">-</span>
                </div>
                <div class="info-row">
                    <span class="label">Net Salary</span>
                    <span class="value amount" id="netSalary">-</span>
                </div>
                <div class="info-row">
                    <span class="label" id="converted-symbol">Net Salary From</span>
                    <span class="value amount" id="converted-salary">-</span>
                </div>
            </div>

            <!-- Verification Section -->
            <div class="verification-section">
                <span class="verified-icon">✅</span>
                <span class="verified-text">This payslip is verified by Thaalam Media GmbH</span>
            </div>

            <!-- Error Message -->
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; <span id="currentYear"></span> Thaalam Media GmbH | All rights reserved | www.thaalam.ch
        </div>

    </div>

    <script>
        // Helper to get query param
        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        document.getElementById('currentYear').textContent = new Date().getFullYear();

        const qrid = getQueryParam('qrid');
        const errorMsg = document.getElementById('errorMsg');

        const formatMonth = (m) => {
            if (!m) return "-";
            const [year, mo] = m.split("-");
            return new Date(year, mo - 1).toLocaleString("default", {
                month: "long",
                year: "numeric",
            });
        };

        if (!qrid) {
            errorMsg.textContent = "No payslip ID provided!";
        } else {

            fetch(`https://api.demoview.ch/api/payslip/verify-data?id=${1}`)
                .then(res => {
                    return res.json();
                })
                .then(data => {
                    const payslip = data.payslip;
                    document.getElementById('payslipMonth').textContent = formatMonth(payslip.month);
                    document.getElementById('employeeName').textContent = payslip.user.name || "-";
                    document.getElementById('employeeID').textContent = payslip.user.employee_id || "-";
                    document.getElementById('employeeDept').textContent = payslip.user.department.department_name || "-";
                    document.getElementById('netSalary').textContent = `${payslip.currency.symbol} ${payslip.net_salary}` || "-";
                    document.getElementById('converted-symbol').textContent = `Net Salary from ${payslip?.conversionCurrency.code}` || "-";
                    document.getElementById('converted-salary').textContent = `${payslip?.conversionCurrency.symbol} ${payslip?.converted_net_salary}` || "-"
                })
                .catch(err => {
                    console.error(err);
                    errorMsg.textContent = "Payslip not found or invalid ID!";
                });
        }
    </script>
</body>

</html>