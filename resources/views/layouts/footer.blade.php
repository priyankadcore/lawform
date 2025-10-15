
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header Styles */
        header {
            background-color: #000;
            color: #fff;
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 28px;
            font-weight: 700;
            color: #fff;
            text-decoration: none;
        }
        
        .logo span {
            color: #ddd;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 25px;
        }
        
        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        nav ul li a:hover {
            color: #ddd;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1073&q=80');
            background-size: cover;
            background-position: center;
            color: #fff;
            padding: 100px 0;
            text-align: center;
        }
        
        .hero h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        
        .hero p {
            font-size: 20px;
            max-width: 700px;
            margin: 0 auto 30px;
        }
        
        .btn {
            display: inline-block;
            background: #000;
            color: #fff;
            padding: 12px 30px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s;
            text-decoration: none;
        }
        
        .btn:hover {
            background: #333;
        }
        
        /* Properties Section */
        .section-title {
            text-align: center;
            margin: 60px 0 40px;
            font-size: 36px;
            color: #000;
        }
        
        .properties {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }
        
        .property-card {
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        
        .property-card:hover {
            transform: translateY(-10px);
        }
        
        .property-img {
            height: 200px;
            background-color: #ddd;
            background-size: cover;
            background-position: center;
        }
        
        .property-info {
            padding: 20px;
        }
        
        .property-info h3 {
            margin-bottom: 10px;
            font-size: 20px;
        }
        
        .property-info p {
            color: #666;
            margin-bottom: 15px;
        }
        
        .property-price {
            font-size: 22px;
            font-weight: 700;
            color: #000;
            margin-bottom: 15px;
        }
        
        /* About Section */
        .about {
            background: #000;
            color: #fff;
            padding: 80px 0;
            margin: 60px 0;
        }
        
        .about-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }
        
        .about-text {
            flex: 1;
        }
        
        .about-text h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        
        .about-img {
            flex: 1;
            height: 400px;
            background-color: #333;
            border-radius: 8px;
            background-image: url('https://images.unsplash.com/photo-1560518883-ce09059eeffa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1073&q=80');
            background-size: cover;
            background-position: center;
        }
        
        /* Services Section */
        .services {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 60px;
        }
        
        .service-card {
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        
        .service-card:hover {
            transform: translateY(-5px);
        }
        
        .service-icon {
            font-size: 40px;
            margin-bottom: 20px;
            color: #000;
        }
        
        .service-card h3 {
            margin-bottom: 15px;
            font-size: 22px;
        }
        
        /* Footer Styles */
        footer {
            background-color: #000;
            color: #fff;
            padding: 60px 0 20px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .footer-column h3 {
            font-size: 20px;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 10px;
            color: #fff;
        }
        
        .footer-column h3:after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 50px;
            height: 2px;
            background: #fff;
        }
        
        .footer-column p {
            color: #ccc;
            margin-bottom: 20px;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links a:hover {
            color: #fff;
        }
        
        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: #333;
            border-radius: 50%;
            color: #fff;
            text-decoration: none;
            transition: background 0.3s;
        }
        
        .social-icons a:hover {
            background: #555;
        }
        
        .newsletter form {
            display: flex;
            margin-top: 15px;
        }
        
        .newsletter input {
            flex: 1;
            padding: 12px;
            border: none;
            background: #333;
            color: #fff;
            border-radius: 4px 0 0 4px;
        }
        
        .newsletter button {
            padding: 0 20px;
            background: #fff;
            color: #000;
            border: none;
            border-radius: 0 4px 4px 0;
            cursor: pointer;
            font-weight: 600;
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #333;
            color: #999;
            font-size: 14px;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }
            
            nav ul {
                margin-top: 20px;
                justify-content: center;
            }
            
            nav ul li {
                margin: 0 10px;
            }
            
            .hero h1 {
                font-size: 36px;
            }
            
            .about-content {
                flex-direction: column;
            }
            
            .about-img {
                width: 100%;
            }
        }
</style>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>About Us</h3>
                    <p>{{$footer->about_us}}</p>
                    <div class="social-icons">
                        <a href="{{$footer->facebook}}"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{$footer->twitter}}"><i class="fab fa-twitter"></i></a>
                        <a href="{{$footer->instagram}}"><i class="fab fa-instagram"></i></a>
                        <a href="{{$footer->linkedin}}"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="footer-column">
                    <h3>Quick Links</h3>
                    <ul class="footer-links">
                        @foreach ($footerlinkheader as $headerlinks)
                         <li><a href="{{$headerlinks->slug ?? '#'}}" >{{$headerlinks->title}}</a></li>   
                        @endforeach
                        
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Contact Us</h3>
                    <ul class="footer-links">
                        <li><i class="fas fa-map-marker-alt"></i> {{$footer->address}}</li>
                        <li><i class="fas fa-phone"></i> +91 {{$footer->phone}}</li>
                        <li><i class="fas fa-envelope"></i> {{$footer->email}}</li>
                        <li><i class="fas fa-clock"></i> {{$footer->timing}}</li>
                    </ul>
                </div>
                
                <div class="footer-column newsletter" style="margin-top: 0px!important;">
                    <h3>Newsletter</h3>
                    <p>Subscribe to our newsletter for the latest property updates and market insights.</p>
                    <form>
                        <input type="email" placeholder="Your email address" required>
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
            
            <div class="copyright">
                <p>&copy; 2023 Realtor. All rights reserved.</p>
            </div>
        </div>
    </footer>
