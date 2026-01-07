<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cooperative Society</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f4f4f4;
            color: #333;
        }

        /* Date-Time Bar */
        .datetime-bar {
            background-color: #002244;
            color: white;
            padding: 8px 15px;
            text-align: right;
            font-size: 14px;
        }

        /* Header and Navigation */
        header {
            background-color: #004080;
            color: white;
            padding: 15px;
            text-align: center;
        }

        nav ul {
            list-style: none;
            text-align: center;
            background: #003366;
            padding: 10px 0;
        }

        nav ul li {
            display: inline;
            margin: 0 15px;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            font-weight: bold;
        }

        nav ul li a:hover {
            color: #ffcc00;
        }

        /* Hero Section */
        .hero {
            background: url('society1.jpg') no-repeat center center/cover;
            height: 400px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: white;
            position: relative;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .hero h2 {
            font-size: 36px;
            z-index: 1;
            position: relative;
        }

        .hero p {
            font-size: 18px;
            margin-top: 10px;
            z-index: 1;
            position: relative;
        }

        .btn {
            margin-top: 15px;
            padding: 12px 20px;
            background: #ffcc00;
            color: #003366;
            font-size: 18px;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            z-index: 1;
            position: relative;
        }

        .btn:hover {
            background: #ff9900;
        }

        /* Sections */
        .section {
            padding: 40px;
            text-align: center;
        }

        .section h2 {
            margin-bottom: 15px;
            font-size: 28px;
            color: #003366;
        }

        .section p {
            font-size: 16px;
            color: #555;
        }

        /* Features Section */
        .features {
            background: #fff;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 40px;
        }

        .feature-box {
            width: 30%;
            min-width: 250px;
            padding: 20px;
            background: #004080;
            color: white;
            text-align: center;
            border-radius: 10px;
            margin: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }

        .feature-box:hover {
            transform: translateY(-5px);
        }

        .feature-box h3 {
            margin-bottom: 10px;
            font-size: 20px;
        }

        /* About Us Section */
        .about-content {
            max-width: 1000px;
            margin: 0 auto;
            text-align: left;
            padding: 20px;
        }
        
        .about-content h3 {
            color: #004080;
            margin: 20px 0 10px;
            font-size: 28px;
            border-bottom: 2px solid #ffcc00;
            padding-bottom: 5px;
        }
        
        .about-content ul {
            margin-left: 20px;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        
        .services-highlight {
            margin: 25px 0;
        }
        
        .service-item {
            background: #f8f9fa;
            padding: 20px;
            margin-bottom: 15px;
            border-left: 4px solid #004080;
            transition: all 0.3s ease;
            border-radius: 0 5px 5px 0;
        }
        
        .service-item:hover {
            background: #e9ecef;
            transform: translateX(5px);
        }
        
        .service-item h4 {
            color: #004080;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            font-size: 26px;
        }
        
        .service-item h4 i {
            margin-right: 10px;
            color: #ffcc00;
            font-size: 30px;
        }
        
        .service-item p {
            color: #555;
            line-height: 1.5;
        }
		
		/* Contact Section */
        .contact {
            background: #003366;
            color: white;
            padding: 40px;
            text-align: center;
        }

        .contact p {
            font-size: 18px;
            margin-bottom: 10px;
        }

        /* Footer */
        footer {
            background: #002244;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <!-- Date-Time Display -->
    <div class="datetime-bar" id="datetime">
        Loading date and time...
    </div>

    <!-- Header -->
    <header>
        <h1>Menasi Seemeya Group Gramagala Seva Sahakari Sangha Niyamita Vanalli</h1>
    </header>

    <!-- Navigation -->
    <?php include('nav.php'); ?>

    <!-- Hero Section -->
    <section class="hero">
        <h2>Welcome to Our Cooperative Society</h2>
        <p>Your trusted partner in financial security and savings.</p>
    </section>


    <!-- About Us Section -->
    <section class="section">
        <h2>About Us</h2>
        <div class="about-content">
            <p>We are a member-focused cooperative society dedicated to providing comprehensive financial solutions that empower our community. Our services are designed to offer convenience, security, and growth opportunities for all our members.</p>
            
            <h3>Our Financial Services</h3>
            <p>We specialize in delivering essential banking services with a personal touch:</p>
            
            <div class="services-highlight">
                <div class="service-item">
                    <h4><i class="fas fa-piggy-bank"></i> Savings & Deposits</h4>
                    <p>We offer secure savings accounts with competitive interest rates, helping your money grow while keeping it completely safe. Our flexible deposit schemes cater to both short-term and long-term financial goals.</p>
                </div>
                
                <div class="service-item">
                    <h4><i class="fas fa-money-bill-wave"></i> Easy Withdrawals</h4>
                    <p>Access your funds whenever you need them through our streamlined withdrawal process. We've eliminated unnecessary paperwork to give you quick access to your money during emergencies or planned expenses.</p>
                </div>
                
                <div class="service-item">
                    <h4><i class="fas fa-balance-scale"></i> Real-time Balance Inquiry</h4>
                    <p>Stay informed about your finances with our instant balance checking services. Whether through our office, mobile services, or online portal, you can check your account status anytime.</p>
                </div>
                
                <div class="service-item">
                    <h4><i class="fas fa-receipt"></i> Detailed Transaction Records</h4>
                    <p>We maintain transparent records of all your transactions. Request comprehensive extracts for personal accounting, tax purposes, or financial planning at any time.</p>
                </div>
                
                <div class="service-item">
                    <h4><i class="fas fa-star"></i> Exclusive Financial Products</h4>
                    <p>Our members enjoy access to specially designed financial products including tailored loan schemes, investment opportunities, and seasonal savings programs that address specific community needs.</p>
                </div>
            </div>
            
            <h3>Why Choose Our Cooperative?</h3>
            <ul>
                <li>Member-owned and democratically controlled</li>
                <li>Lower fees and better rates than commercial banks</li>
                <li>Personalized service from staff who know you</li>
                <li>Profits returned to members through better services and dividends</li>
                <li>Commitment to financial education and empowerment</li>
            </ul>
        </div>
    </section>
	
	<!-- Contact Section -->
    <section class="contact">
        <h2>Contact Us</h2>
        <p>Email: mss@mssvanalli.com</p>
        <p>Phone: 08283-298242</p>
        <p>Address: @Sirsi , Vanalli</p>
    </section>


    <!-- Footer -->
    <footer>
        <p>© 2025 MSS. All Rights Reserved. Powered by MSS</p>
    </footer>

    <script>
        // Function to update date and time
        function updateDateTime() {
            const now = new Date();
            const options = { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            };
            const dateTimeStr = now.toLocaleDateString('en-IN', options);
            document.getElementById('datetime').textContent = dateTimeStr;
        }

        // Update immediately
        updateDateTime();

        // Update every second
        setInterval(updateDateTime, 1000);
    </script>
</body>
</html>