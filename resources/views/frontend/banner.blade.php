<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful & Innovative Websites</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        
        
        header {
            text-align: center;
            padding: 60px 0 30px;
            margin-bottom: 40px;
        }
        
        h1 {
            color: #2c3e50;
            font-size: 3rem;
            margin-bottom: 15px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.1);
            position: relative;
            display: inline-block;
        }
        
        h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 100px;
            height: 4px;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border-radius: 2px;
        }
        
        .subtitle {
            color: #7f8c8d;
            font-size: 1.2rem;
            max-width: 600px;
            margin: 20px auto 0;
        }
        
        .banner-section {
            display: flex;
            flex-direction: column;
            gap: 70px;
            margin-bottom: 80px;
        }
        
        .banner {
            overflow: hidden;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            position: relative;
            min-height: 600px;
            display: flex;
            align-items: center;
        }
        
        .banner:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }
        
        .banner-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            z-index: 2;
        }

        
        .banner-2 {
            background: 
                        url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1172&q=80') center/cover no-repeat;
            color: white;
            flex-direction: row-reverse;
        }
        
        .banner h2 {
            font-size: 3.8rem;
            margin-bottom: 25px;
            position: relative;
            display: inline-block;
            color: white;
            font-weight: 700;
        }
        
        
        .banner-2 h2::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 0;
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            border-radius: 2px;
        }
        
        .banner p {
           font-size: 2.2rem;
            margin-bottom: 35px;
            line-height: 1.8;
            color: white;
            font-weight: 500;
        }
        
        .btn {
            display: inline-block;
            padding: 14px 32px;
            background-color: white!important;
            color: #000000ff  !important;
            border: none;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.3s ease;
            align-self: flex-start;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        .banner-2 .btn::before {
            background: white;
        }
        
        .banner-2 .btn:hover {
            color: #3498db;
        }
        
        .banner-decoration {
            position: absolute;
            z-index: 1;
        }
        .banner-2 .banner-decoration {
            bottom: 20px;
            left: 30px;
            font-size: 100px;
            opacity: 0.15;
            color: #333;
            animation: float 6s ease-in-out infinite;
        }
         
        /* Animations */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }
            50% {
                transform: translateY(-15px);
            }
            100% {
                transform: translateY(0px);
            }
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate {
            animation: fadeInUp 0.8s ease forwards;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .banner-content {
                width: 70%;
            }
        }
        
        @media (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }
            
            .banner {
                min-height: auto;
            }
            
            .banner-content {
                padding: 40px 30px;
                width: 100%;
            }
            
            .banner h2 {
                font-size: 2.2rem;
            }
            
            .banner-decoration {
                display: none;
            }
            
        }
        
        @media (max-width: 576px) {
            h1 {
                font-size: 2rem;
            }
            
            .banner-content {
                padding: 30px 20px;
            }
            
            .banner h2 {
                font-size: 1.8rem;
            }
            
            .banner p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
       
        
        {{-- <section class="banner-section">
            <div class="banner banner-1">
                <div class="banner-content">
                    <h2>Modern Web Design</h2>
                    <p>We create visually stunning websites that combine aesthetics with functionality. Our designs are tailored to reflect your brand identity while providing an exceptional user experience.</p>
                    <a href="#" class="btn">View Portfolio</a>
                    <div class="banner-decoration">
                        <i class="fas fa-palette"></i>
                    </div>
                </div>
            </div>
        </section> --}}

        <section class="banner-section">
            <div class="banner banner-2">
                <div class="banner-content text-center">
                    <h2>Innovative Solutions</h2>
                    <p>Our team leverages cutting-edge technologies to build websites that are not only beautiful but also highly functional, responsive, and optimized for performance.</p>
                    <a href="#" class="btn ">Learn More</a>
                   
                </div>
            </div>
        </section>
        
        
    
  

    <script>
        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            const banners = document.querySelectorAll('.banner');
            
            banners.forEach(banner => {
                banner.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                });
                
                banner.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Add animation on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate');
                    }
                });
            }, observerOptions);
            
            // Observe banners and features
            document.querySelectorAll('.banner, .feature').forEach(el => {
                el.style.opacity = 0;
                observer.observe(el);
            });
            
            // Button hover effect
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(button => {
                button.addEventListener('mouseenter', function(e) {
                    const x = e.pageX - this.offsetLeft;
                    const y = e.pageY - this.offsetTop;
                    
                    this.style.setProperty('--x', x + 'px');
                    this.style.setProperty('--y', y + 'px');
                });
            });
        });
    </script>
</body>
</html>