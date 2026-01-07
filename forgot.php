<!DOCTYPE html>
<html lang="en">
<head>
    <title>MSS VANALLI - Forgot Password</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;600&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Noto Sans JP', sans-serif;
            background: linear-gradient(to right, #f3f4f6, #e5e7eb);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 900px;
            background: #fff;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-wrap: wrap;
            border-radius: 10px;
            overflow: hidden;
        }

        .content-wthree {
            flex: 1 1 50%;
            padding: 40px 30px;
        }

        .content-wthree h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #1f2937;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"] {
            padding: 12px 15px;
            font-size: 16px;
            border: 1px solid #d1d5db;
            border-radius: 5px;
            margin-bottom: 20px;
            transition: border 0.3s ease;
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #6366f1;
            box-shadow: 0 0 5px rgba(99, 102, 241, 0.3);
        }

        button.btn {
            padding: 12px;
            font-size: 16px;
            background-color: #6366f1;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button.btn:hover {
            background-color: #4f46e5;
        }

        .w3l_form {
            flex: 1 1 50%;
            background: #f9fafb;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .w3l_form img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 32px;
            color: #111827;
            width: 100%;
        }

        .copyright {
            text-align: center;
            margin-top: 30px;
            font-size: 14px;
            color: #6b7280;
        }

        .copyright a {
            color: #6366f1;
            text-decoration: none;
        }

        .copyright a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .w3l_form, .content-wthree {
                flex: 1 1 100%;
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <section>
        <h1>MSS VANALLI</h1>
        <div class="container">
            <!-- Left Side - Form -->
            <div class="content-wthree">
                <h2>Forgot Password</h2>
                <form action="forgo_nextt.php" method="post">
                    <input type="text" name="email_id" placeholder="Email Id" required autofocus>
                    <button class="btn" type="submit">Log In</button>
                </form>
            </div>

            <!-- Right Side - Image -->
            
        </div>

        <!-- Footer -->
        <div class="copyright">
            <p>© 2025 MSS | Design by <a href="#">K.N.Keerti</a></p>
        </div>
    </section>

</body>
</html>
