<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Features - Modern Design</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
       

        .features-container {
            background-color: #0a0a0a;
            color: #ffffff;
            margin: 0 auto;
            padding: 80px 40px;
        }

        .header {
            text-align: center;
            margin-bottom: 100px;
            position: relative;
        }

        .section-title {
            font-size: 4rem;
            margin-bottom: 20px;
            background-color: #57b45a;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
            letter-spacing: -1px;
        }

        .section-subtitle {
            font-size: 1.3rem;
            color: #aaaaaa;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Feature Timeline */
        .feature-timeline {
            position: relative;
            max-width: 1000px;
            margin: 0 auto 120px;
        }

        .feature-timeline::before {
            content: '';
            position: absolute;
            left: 50%;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, #ff6b6b, #4ecdc4, #45b7d1);
            transform: translateX(-50%);
        }

        .timeline-item {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 80px;
            position: relative;
        }

        .timeline-item:nth-child(odd) {
            flex-direction: row;
        }

        .timeline-item:nth-child(even) {
            flex-direction: row-reverse;
        }

        .timeline-content {
            width: 45%;
            padding: 40px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
        }

        .timeline-content:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.08);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .timeline-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 30px;
            flex-shrink: 0;
            position: relative;
            z-index: 2;
        }

        .timeline-title {
            font-size: 1.8rem;
            margin-bottom: 15px;
            color: #ffffff;
        }

        .timeline-description {
            color: #cccccc;
            line-height: 1.7;
            font-size: 1.1rem;
        }

        /* Feature Showcase */
        .feature-showcase {
            display: flex;
            align-items: center;
            margin-bottom: 120px;
            gap: 60px;
        }

        .showcase-content {
            flex: 1;
        }

        .showcase-visual {
            flex: 1;
            height: 400px;
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4, #45b7d1);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 5rem;
            position: relative;
            overflow: hidden;
        }

        .showcase-visual::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grid" width="10" height="10" patternUnits="userSpaceOnUse"><path d="M 10 0 L 0 0 0 10" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="0.5"/></pattern></defs><rect width="100" height="100" fill="url(%23grid)"/></svg>');
        }

        .showcase-title {
            font-size: 2.5rem;
            margin-bottom: 20px;
            background: linear-gradient(90deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .showcase-description {
            color: #cccccc;
            font-size: 1.2rem;
            line-height: 1.7;
            margin-bottom: 30px;
        }

        .feature-list {
            list-style: none;
        }

        .feature-list li {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            font-size: 1.1rem;
        }

        .feature-list li i {
            color: #4ecdc4;
            margin-right: 15px;
            font-size: 1.2rem;
        }

        /* Stats Section */
        .stats-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin: 100px 0;
        }

        .stat-item {
            text-align: center;
            padding: 40px 20px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            transition: all 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.08);
        }

        .stat-number {
            font-size: 3.5rem;
            font-weight: 800;
            background: linear-gradient(90deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        .stat-label {
            color: #aaaaaa;
            font-size: 1.2rem;
        }

        /* CTA Section */
        .cta-section {
            text-align: center;
            padding: 80px 40px;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.1), rgba(78, 205, 196, 0.1));
            border-radius: 30px;
            margin-top: 80px;
            position: relative;
            overflow: hidden;
        }

        .cta-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="dots" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23dots)"/></svg>');
        }

        .cta-title {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #ffffff;
            position: relative;
        }

        .cta-description {
            color: #cccccc;
            font-size: 1.3rem;
            max-width: 700px;
            margin: 0 auto 40px;
            line-height: 1.6;
            position: relative;
        }

        .cta-button {
            background: linear-gradient(135deg, #ff6b6b, #4ecdc4);
            color: white;
            border: none;
            padding: 18px 45px;
            border-radius: 50px;
            font-size: 1.2rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 10px 25px rgba(255, 107, 107, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 12px;
            position: relative;
        }

        .cta-button:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(255, 107, 107, 0.4);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .feature-timeline::before {
                left: 40px;
            }

            .timeline-item {
                flex-direction: row !important;
                justify-content: flex-start;
            }

            .timeline-content {
                width: calc(100% - 140px);
                margin-left: 140px;
            }

            .timeline-icon {
                margin: 0;
                position: absolute;
                left: 0;
            }

            .feature-showcase {
                flex-direction: column;
            }
        }

        @media (max-width: 768px) {
            .section-title {
                font-size: 2.5rem;
            }

            .features-container {
                padding: 40px 20px;
            }

            .timeline-content {
                width: calc(100% - 100px);
                margin-left: 100px;
                padding: 25px;
            }

            .timeline-icon {
                width: 60px;
                height: 60px;
                font-size: 1.8rem;
            }

            .showcase-title {
                font-size: 2rem;
            }

            .cta-title {
                font-size: 2.2rem;
            }
        }
    </style>
</head>
<body>
    <div class="features-container">
        <div class="header">
            <h1 class="section-title">Revolutionary Features</h1>
            <p class="section-subtitle">Experience the future with our cutting-edge technology designed to transform how you work, create, and collaborate.</p>
        </div>

        <!-- Feature Timeline -->
        <div class="feature-timeline">
            <div class="timeline-item">
                <div class="timeline-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <div class="timeline-content">
                    <h3 class="timeline-title">Lightning Fast Performance</h3>
                    <p class="timeline-description">Our optimized architecture delivers unparalleled speed with sub-second response times and 99.9% uptime guarantee. Process complex tasks in record time.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <div class="timeline-content">
                    <h3 class="timeline-title">Military-Grade Security</h3>
                    <p class="timeline-description">Protect your data with end-to-end encryption, multi-factor authentication, and advanced threat detection systems that meet enterprise security standards.</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-icon">
                    <i class="fas fa-brain"></i>
                </div>
                <div class="timeline-content">
                    <h3 class="timeline-title">AI-Powered Automation</h3>
                    <p class="timeline-description">Leverage artificial intelligence to automate repetitive tasks, generate insights, and make data-driven decisions with our smart algorithms.</p>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Animate timeline items on scroll
            const timelineItems = document.querySelectorAll('.timeline-item');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.opacity = '1';
                        entry.target.style.transform = 'translateX(0)';
                    }
                });
            }, { threshold: 0.1 });
            
            timelineItems.forEach((item, index) => {
                item.style.opacity = '0';
                if (index % 2 === 0) {
                    item.style.transform = 'translateX(-50px)';
                } else {
                    item.style.transform = 'translateX(50px)';
                }
                item.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                observer.observe(item);
            });

            // Add hover effect to stats
            const statItems = document.querySelectorAll('.stat-item');
            statItems.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                });
                
                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Button animation
            const ctaButton = document.querySelector('.cta-button');
            ctaButton.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
            });
            
            ctaButton.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>