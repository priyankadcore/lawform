<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Section</title>
    <style>
        .services-container {
            width: 100%;
            text-align: center;
        }

        .section-title {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            width: 70px;
            height: 4px;
            background: linear-gradient(90deg, #9ef3b6, #57b45a);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .section-subtitle {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 50px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        .services-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 30px;
        }

        .service-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            padding: 40px 30px;
            width: 100%;
            max-width: 350px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 0;
            background: linear-gradient(135deg, #c2edc3, #57b45a);
            transition: all 0.4s ease;
            z-index: -1;
        }

        .service-card:hover::before {
            height: 100%;
        }

        .service-card:hover {
            transform: translateY(-10px);
            color: white;
        }

        .service-card:hover .card-icon {
            background: rgba(255, 255, 255, 0.2);
            color: white;
        }

        .service-card:hover .card-title,
        .service-card:hover .card-description,
        .service-card:hover .card-link {
            color: white;
        }

        .card-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 25px;
            background: #f0f4ff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: #57b45a;
            transition: all 0.4s ease;
        }

        .card-title {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #333;
            transition: all 0.4s ease;
        }

        .card-description {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
            transition: all 0.4s ease;
        }

        .card-link {
            display: inline-flex;
            align-items: center;
            color: #57b45a;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .card-link:hover {
            transform: translateX(5px);
        }

        .card-link i {
            margin-left: 5px;
            transition: all 0.3s ease;
        }

        .card-link:hover i {
            transform: translateX(5px);
        }

        @media (max-width: 768px) {
            .services-cards {
                flex-direction: column;
                align-items: center;
            }

            .service-card {
                max-width: 100%;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="services-container">
        <h2 class="section-title">Our Services</h2>
        <p class="section-subtitle">We provide a wide range of professional services to help your business grow and
            succeed in the digital world.</p>

        <div class="services-cards">
            <!-- Card 1 -->
            <div class="service-card">
                <div class="card-icon">
                    <i class="fas fa-code"></i>
                </div>
                <h3 class="card-title">Web Development</h3>
                <p class="card-description">We create responsive, modern websites that work perfectly on all devices and
                    help you achieve your online goals.</p>
                <a href="#" class="card-link">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>

            <!-- Card 2 -->
            <div class="service-card">
                <div class="card-icon">
                    <i class="fas fa-paint-brush"></i>
                </div>
                <h3 class="card-title">UI/UX Design</h3>
                <p class="card-description">Our design team creates beautiful, intuitive interfaces that provide
                    exceptional user experiences.</p>
                <a href="#" class="card-link">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>

            <!-- Card 3 -->
            <div class="service-card">
                <div class="card-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="card-title">Digital Marketing</h3>
                <p class="card-description">We help you reach your target audience and grow your business with effective
                    digital marketing strategies.</p>
                <a href="#" class="card-link">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>

            <!-- Card 1 -->
            <div class="service-card">
                <div class="card-icon">
                    <i class="fas fa-code"></i>
                </div>
                <h3 class="card-title">Web Development</h3>
                <p class="card-description">We create responsive, modern websites that work perfectly on all devices and
                    help you achieve your online goals.</p>
                <a href="#" class="card-link">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>

            <!-- Card 2 -->
            <div class="service-card">
                <div class="card-icon">
                    <i class="fas fa-paint-brush"></i>
                </div>
                <h3 class="card-title">UI/UX Design</h3>
                <p class="card-description">Our design team creates beautiful, intuitive interfaces that provide
                    exceptional user experiences.</p>
                <a href="#" class="card-link">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>

            <!-- Card 3 -->
            <div class="service-card">
                <div class="card-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="card-title">Digital Marketing</h3>
                <p class="card-description">We help you reach your target audience and grow your business with effective
                    digital marketing strategies.</p>
                <a href="#" class="card-link">Learn More <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </div>

    <script>
        // Add some interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.service-card');

            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.boxShadow = '0 15px 40px rgba(0, 0, 0, 0.2)';
                });

                card.addEventListener('mouseleave', function() {
                    this.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.1)';
                });
            });

            // Add a subtle animation when the page loads
            setTimeout(() => {
                cards.forEach((card, index) => {
                    setTimeout(() => {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';

                        setTimeout(() => {
                            card.style.transition = 'all 0.5s ease';
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 100);
                    }, index * 200);
                });
            }, 500);
        });
    </script>
</body>

</html>
