<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Banner Design</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .banner-container {
            width: 100%;
            background: white;
            overflow: hidden;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .banner-content {
            display: flex;
            align-items: center;
            min-height: 500px;
            position: relative;
            overflow: hidden;
        }

        .text-content {
            flex: 1;
            padding: 60px;
            z-index: 2;
            position: relative;
        }

        .visual-content {
            flex: 1;
            height: 500px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .banner-badge {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .banner-title {
            font-size: 3.2rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 20px;
            color: #2d3748;
            background: linear-gradient(135deg, #2d3748 0%, #4a5568 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .banner-subtitle {
            font-size: 1.2rem;
            color: #718096;
            margin-bottom: 30px;
            line-height: 1.6;
            max-width: 90%;
        }

        .banner-features {
            display: flex;
            gap: 20px;
            margin-bottom: 35px;
            flex-wrap: wrap;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #4a5568;
            font-weight: 500;
        }

        .feature i {
            color: #48bb78;
            font-size: 1.1rem;
        }

        .cta-buttons {
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 15px 35px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
            padding: 15px 35px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .btn-secondary:hover {
            background: rgba(102, 126, 234, 0.1);
            transform: translateY(-3px);
        }

        .floating-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .shape {
            position: absolute;
            border-radius: 50%;
            opacity: 0.1;
        }

        .shape-1 {
            width: 150px;
            height: 150px;
            background: #667eea;
            top: 10%;
            right: 15%;
            animation: float 8s ease-in-out infinite;
        }

        .shape-2 {
            width: 100px;
            height: 100px;
            background: #764ba2;
            bottom: 20%;
            right: 25%;
            animation: float 6s ease-in-out infinite 1s;
        }

        .shape-3 {
            width: 80px;
            height: 80px;
            background: #48bb78;
            top: 50%;
            right: 40%;
            animation: float 7s ease-in-out infinite 0.5s;
        }

        .main-visual {
            width: 400px;
            height: 400px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: morphing 10s ease-in-out infinite;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 5rem;
            box-shadow: 0 20px 40px rgba(102, 126, 234, 0.3);
            position: relative;
            z-index: 2;
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .floating-element {
            position: absolute;
            background: white;
            border-radius: 10px;
            padding: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 10px;
            animation: float-element 6s ease-in-out infinite;
        }

        .element-1 {
            top: 20%;
            left: 10%;
            animation-delay: 0s;
        }

        .element-2 {
            bottom: 30%;
            left: 5%;
            animation-delay: 2s;
        }

        .element-3 {
            top: 40%;
            right: 15%;
            animation-delay: 4s;
        }

        .floating-element i {
            color: #667eea;
            font-size: 1.5rem;
        }

        .floating-element span {
            font-weight: 600;
            color: #4a5568;
            white-space: nowrap;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0) rotate(0deg);
            }

            50% {
                transform: translateY(-20px) rotate(10deg);
            }
        }

        @keyframes float-element {

            0%,
            100% {
                transform: translateY(0) translateX(0);
            }

            50% {
                transform: translateY(-15px) translateX(5px);
            }
        }

        @keyframes morphing {
            0% {
                border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            }

            25% {
                border-radius: 58% 42% 75% 25% / 76% 46% 54% 24%;
            }

            50% {
                border-radius: 50% 50% 33% 67% / 55% 27% 73% 45%;
            }

            75% {
                border-radius: 33% 67% 58% 42% / 63% 68% 32% 37%;
            }

            100% {
                border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            }
        }

        .stats {
            display: flex;
            gap: 30px;
            margin-top: 40px;
            padding-top: 30px;
            border-top: 1px solid #e2e8f0;
        }

        .stat {
            text-align: center;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #667eea;
            margin-bottom: 5px;
        }

        .stat-label {
            font-size: 0.9rem;
            color: #718096;
            font-weight: 500;
        }

        @media (max-width: 1024px) {
            .banner-content {
                flex-direction: column;
                text-align: center;
            }

            .text-content {
                padding: 40px;
            }

            .visual-content {
                height: 400px;
                width: 100%;
            }

            .main-visual {
                width: 300px;
                height: 300px;
            }

            .banner-title {
                font-size: 2.5rem;
            }

            .banner-subtitle {
                max-width: 100%;
            }

            .banner-features {
                justify-content: center;
            }

            .cta-buttons {
                justify-content: center;
            }

            .floating-element {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .banner-title {
                font-size: 2rem;
            }

            .text-content {
                padding: 30px 25px;
            }

            .main-visual {
                width: 250px;
                height: 250px;
                font-size: 4rem;
            }

            .stats {
                flex-wrap: wrap;
                justify-content: center;
                gap: 20px;
            }

            .stat {
                flex: 1;
                min-width: 120px;
            }
        }
    </style>
</head>

<body>
    <div class="banner-container">
        <div class="banner-content">
            <div class="text-content">
                <div class="banner-badge">
                    <i class="fas fa-star"></i> Limited Time Offer
                </div>

                <h1 class="banner-title">
                    Transform Your Digital Experience Today
                </h1>

                <p class="banner-subtitle">
                    Discover our innovative solutions that help businesses grow faster, work smarter, and achieve
                    remarkable results. Join thousands of satisfied customers worldwide.
                </p>

                <div class="banner-features">
                    <div class="feature">
                        <i class="fas fa-check-circle"></i>
                        <span>No Credit Card Required</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-check-circle"></i>
                        <span>Free 30-Day Trial</span>
                    </div>
                    <div class="feature">
                        <i class="fas fa-check-circle"></i>
                        <span>24/7 Expert Support</span>
                    </div>
                </div>

                <div class="cta-buttons">
                    <button class="btn-primary">
                        <i class="fas fa-rocket"></i> Get Started Free
                    </button>
                    <button class="btn-secondary">
                        <i class="fas fa-play-circle"></i> Watch Demo
                    </button>
                </div>

                <div class="stats">
                    <div class="stat">
                        <div class="stat-number">10K+</div>
                        <div class="stat-label">Happy Customers</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number">4.9/5</div>
                        <div class="stat-label">Rating</div>
                    </div>
                    <div class="stat">
                        <div class="stat-number">24/7</div>
                        <div class="stat-label">Support</div>
                    </div>
                </div>
            </div>

            <div class="visual-content">
                <img src="{{ asset('images/banner.png') }}" alt="Banner Image" style="    width: 500px;height: 500px;">



            </div>
        </div>
    </div>

    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add some interactive animations
            const buttons = document.querySelectorAll('.btn-primary, .btn-secondary');

            buttons.forEach(button => {
                button.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-3px)';
                });

                button.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Animate stats on load
            const statNumbers = document.querySelectorAll('.stat-number');

            statNumbers.forEach(stat => {
                const originalText = stat.textContent;
                stat.textContent = '0';

                setTimeout(() => {
                    let current = 0;
                    const target = parseInt(originalText);
                    const increment = target / 30;

                    const timer = setInterval(() => {
                        current += increment;
                        if (current >= target) {
                            stat.textContent = originalText;
                            clearInterval(timer);
                        } else {
                            stat.textContent = Math.floor(current) + (originalText.includes(
                                '/') ? '/5' : '+');
                        }
                    }, 50);
                }, 1000);
            });
        });
    </script> --}}
</body>

</html>
