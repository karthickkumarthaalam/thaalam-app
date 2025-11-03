<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verified Experience Letter - Thaalam Media</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
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

        .doc-label {
            font-size: 18px;
            font-weight: 600;
        }

        .content {
            padding: 40px;
        }

        h1 {
            font-size: 28px;
            font-weight: 700;
            color: #059669;
            text-align: center;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            font-size: 16px;
            color: #64748b;
            margin-bottom: 30px;
        }

        .info-box {
            background: #f8fafc;
            border-radius: 12px;
            padding: 25px;
            border: 1px solid #e2e8f0;
            margin-bottom: 30px;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
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

        .footer {
            text-align: center;
            padding: 25px;
            border-top: 1px solid #e2e8f0;
            font-size: 13px;
            color: #64748b;
            background: #f8fafc;
        }

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
        <div class="header">
            <div class="header-left">
                <img src="https://thaalam.ch/assets/img/logo/thalam-logo.png" alt="Thaalam Logo">
                <div class="company-info">
                    <h2>Thaalam Media GmbH</h2>
                    <p>Talacker 41, Zürich | www.thaalam.ch</p>
                </div>
            </div>
            <div class="header-right">
                <div class="verification-label">Experience Verification</div>
                <div class="doc-label" id="employeeNameLabel">-</div>
            </div>
        </div>

        <div class="content">
            <h1>✅ Verified Experience Letter</h1>
            <p class="subtitle">Official document for employment verification</p>

            <div id="errorMsg" class="error" style="display:none;"></div>

            <div class="info-box">
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
                    <span class="value" id="department">-</span>
                </div>
                <div class="info-row">
                    <span class="label">Employment Type</span>
                    <span class="value" id="employmentType">-</span>
                </div>
                <div class="info-row">
                    <span class="label">Joining Date</span>
                    <span class="value" id="joiningDate">-</span>
                </div>
                <div class="info-row">
                    <span class="label">Relieving Date</span>
                    <span class="value" id="relievingDate">-</span>
                </div>
                <div class="info-row">
                    <span class="label">Performance Summary</span>
                    <span class="value" id="performance">-</span>
                </div>
            </div>

            <div class="verification-section">
                <span class="verified-icon">✅</span>
                <span class="verified-text">This experience is verified by Thaalam Media GmbH</span>
            </div>
        </div>

        <div class="footer">
            &copy; <span id="currentYear"></span> Thaalam Media GmbH | All rights reserved | www.thaalam.ch
        </div>
    </div>

    <script>
        // Get query param
        function getQueryParam(param) {
            const urlParams = new URLSearchParams(window.location.search);
            return urlParams.get(param);
        }

        document.getElementById("currentYear").textContent = new Date().getFullYear();

        const qrid = getQueryParam('qrid');
        const errorBox = document.getElementById("errorMsg");

        if (!qrid) {
            errorBox.textContent = "No experience ID provided!";
            errorBox.style.display = "block";
        } else {
            fetch(`https://api.demoview.ch/api/experience-letter/verify-data?id=${qrid}`)
                .then((res) => res.json())
                .then((data) => {
                    if (data.status !== "success") {
                        throw new Error("Experience not found!");
                    }
                    const exp = data.experience;

                    document.getElementById("employeeName").textContent = exp.user.name || "-";
                    document.getElementById("employeeNameLabel").textContent = exp.user.name || "-";
                    document.getElementById("employeeID").textContent = exp.user.employee_id || "-";
                    document.getElementById("department").textContent = exp.user.department?.department_name || "-";
                    document.getElementById("employmentType").textContent = exp.employment_type || "-";
                    document.getElementById("joiningDate").textContent = new Date(exp.joining_date).toLocaleDateString();
                    document.getElementById("relievingDate").textContent = new Date(exp.relieving_date).toLocaleDateString();
                    document.getElementById("performance").textContent = exp.performance_summary || "-";
                })
                .catch((err) => {
                    errorBox.textContent = "Experience not found or invalid ID!";
                    errorBox.style.display = "block";
                });
        }
    </script>
</body>

</html>