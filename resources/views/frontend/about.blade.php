<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Modern Design</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #0a0a0a;
            color: #ffffff;
            min-height: 100vh;
            padding: 0;
            overflow-x: hidden;
        }

        .about-container {
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, rgba(26, 26, 26, 0.9) 0%, rgba(10, 10, 10, 0.95) 100%),
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 800"><rect fill="%23111" width="1200" height="800"/><circle fill="%232e7d32" opacity="0.1" cx="200" cy="200" r="100"/><circle fill="%234caf50" opacity="0.1" cx="1000" cy="600" r="150"/><circle fill="%2381c784" opacity="0.1" cx="800" cy="200" r="120"/></svg>');
            background-size: cover;
            background-position: center;
            padding: 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            margin-bottom: 20px;
            background: linear-gradient(90deg, #4caf50, #81c784);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 700;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: #cccccc;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .cta-button {
            display: inline-block;
            background: linear-gradient(135deg, #2e7d32, #4caf50);
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(46, 125, 50, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(46, 125, 50, 0.4);
            background: linear-gradient(135deg, #1b5e20, #2e7d32);
        }

        /* Section Styling */
        .section {
            padding: 80px 0;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 15px;
            text-align: center;
            position: relative;
        }

        .section-title::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #4caf50, #81c784);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .section-subtitle {
            text-align: center;
            color: #aaaaaa;
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 50px;
            line-height: 1.6;
        }

        /* Our Story Section */
        .story-section {
            background: #111111;
        }

        .story-content {
            display: flex;
            align-items: center;
            gap: 50px;
            flex-wrap: wrap;
        }

        .story-text {
            flex: 1;
            min-width: 300px;
        }

        .story-text h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #4caf50;
        }

        .story-text p {
            color: #cccccc;
            line-height: 1.7;
            margin-bottom: 20px;
        }

        .story-image {
            flex: 1;
            min-width: 300px;
            height: 400px;
            background: linear-gradient(135deg, #2e7d32, #4caf50);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 5rem;
            color: white;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }

        /* Mission & Vision */
        .mission-vision {
            background: #0a0a0a;
        }

        .mv-cards {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .mv-card {
            flex: 1;
            min-width: 300px;
            background: #111111;
            padding: 40px 30px;
            border-radius: 15px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid #222222;
        }

        .mv-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(46, 125, 50, 0.1);
            border-color: #4caf50;
        }

        .mv-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #2e7d32, #4caf50);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin: 0 auto 25px;
        }

        .mv-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #ffffff;
        }

        .mv-card p {
            color: #aaaaaa;
            line-height: 1.6;
        }

        /* Team Section */
        .team-section {
            background: #111111;
        }

        .team-members {
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .team-member {
            flex: 1;
            min-width: 250px;
            max-width: 300px;
            background: #1a1a1a;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid #222222;
        }

        .team-member:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(46, 125, 50, 0.1);
            border-color: #4caf50;
        }

        .member-image {
            height: 250px;
            background: linear-gradient(135deg, #2e7d32, #4caf50);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: white;
        }

        .member-info {
            padding: 25px;
            text-align: center;
        }

        .member-info h3 {
            font-size: 1.3rem;
            margin-bottom: 5px;
            color: #ffffff;
        }

        .member-info p {
            color: #4caf50;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .member-info .bio {
            color: #aaaaaa;
            font-size: 0.9rem;
            line-height: 1.5;
        }

        /* Stats Section */
        .stats-section {
            background: linear-gradient(135deg, #111111 0%, #0a0a0a 100%);
            text-align: center;
        }

        .stats-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 30px;
        }

        .stat-item {
            padding: 30px;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            background: linear-gradient(90deg, #4caf50, #81c784);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 10px;
        }

        .stat-text {
            color: #cccccc;
            font-size: 1.1rem;
            font-weight: 500;
        }

        /* Values Section */
        .values-section {
            background: #111111;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }

        .value-card {
            background: #1a1a1a;
            padding: 30px;
            border-radius: 15px;
            transition: all 0.3s ease;
            border-left: 4px solid #4caf50;
        }

        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .value-card h3 {
            font-size: 1.3rem;
            margin-bottom: 15px;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .value-card h3 i {
            color: #4caf50;
        }

        .value-card p {
            color: #aaaaaa;
            line-height: 1.6;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }

            .section {
                padding: 60px 0;
            }

            .section-title {
                font-size: 2rem;
            }

            .story-content,
            .mv-cards,
            .team-members {
                flex-direction: column;
            }

            .story-image {
                height: 300px;
            }

            .stats-container {
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
</head>

<body>
    <!-- Hero Section -->
    {{-- <section class="hero-section">
        <div class="about-container">
            <div class="hero-content">
                <h1 class="hero-title">About Our Company</h1>
                <p class="hero-subtitle">We are a team of passionate professionals dedicated to delivering exceptional
                    solutions that drive success for our clients worldwide.</p>
                <a href="#our-story" class="cta-button">Explore Our Journey</a>
            </div>
        </div>
    </section> --}}

    <!-- Our Story Section -->
    {{-- <section id="our-story" class="section story-section">
        <div class="about-container">
            <h2 class="section-title">Our Story</h2>
            <p class="section-subtitle">From humble beginnings to industry leadership, our journey has been defined by
                innovation and commitment.</p>

            <div class="story-content">
                <div class="story-text">
                    <h3>Building The Future Together</h3>
                    <p>Founded in 2010, we started as a small team with a big vision: to transform the digital landscape
                        through innovative solutions and exceptional service. What began as a startup in a garage has
                        grown into a global company serving clients across 50+ countries.</p>
                    <p>Our growth has been fueled by our commitment to quality, our passion for technology, and our
                        unwavering focus on client success. We believe that great things happen when talented people
                        come together with a shared purpose.</p>
                    <p>Today, we continue to push boundaries, explore new technologies, and create solutions that make a
                        real difference in people's lives and businesses.</p>
                </div>
                <div class="story-image">
                    <i class="fas fa-rocket"></i>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Mission & Vision Section -->
    {{-- <section class="section mission-vision">
        <div class="about-container">
            <h2 class="section-title">Mission & Vision</h2>
            <p class="section-subtitle">Our guiding principles that drive everything we do</p>

            <div class="mv-cards">
                <div class="mv-card">
                    <div class="mv-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Our Mission</h3>
                    <p>To empower businesses with innovative digital solutions that drive growth, efficiency, and
                        competitive advantage in an ever-evolving technological landscape.</p>
                </div>

                <div class="mv-card">
                    <div class="mv-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>Our Vision</h3>
                    <p>To be the world's most trusted technology partner, recognized for our commitment to excellence,
                        innovation, and positive impact on society.</p>
                </div>

                <div class="mv-card">
                    <div class="mv-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Our Promise</h3>
                    <p>We deliver exceptional value through cutting-edge solutions, unparalleled support, and lasting
                        partnerships built on trust and mutual success.</p>
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Team Section -->
    {{-- <section class="section team-section">
        <div class="about-container">
            <h2 class="section-title">Meet Our Team</h2>
            <p class="section-subtitle">The brilliant minds behind our success story</p>

            <div class="team-members">
                <div class="team-member">
                    <div class="member-image">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="member-info">
                        <h3>Sarah Johnson</h3>
                        <p>CEO & Founder</p>
                        <p class="bio">Visionary leader with 15+ years of experience in technology and business
                            strategy.</p>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-image">
                        <i class="fas fa-user-cog"></i>
                    </div>
                    <div class="member-info">
                        <h3>Michael Chen</h3>
                        <p>CTO</p>
                        <p class="bio">Tech innovator specializing in AI, machine learning, and scalable
                            architecture.</p>
                    </div>
                </div>

                <div class="team-member">
                    <div class="member-image">
                        <i class="fas fa-user-graduate"></i>
                    </div>
                    <div class="member-info">
                        <h3>Emily Rodriguez</h3>
                        <p>Head of Design</p>
                        <p class="bio">Creative director with a passion for user-centered design and brand
                            storytelling.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}



    <!-- Values Section -->
    <section class="section values-section">
        <div class="about-container">
            <h2 class="section-title">About Our Company</h2>
            <p class="section-subtitle">We are a team of passionate professionals dedicated to delivering exceptional
                solutions that drive success for our clients worldwide.</p>

            <div class="values-grid">
                <div class="value-card">
                    <h3><i class="fas fa-lightbulb"></i> Innovation</h3>
                    <p>We constantly push boundaries and explore new possibilities to deliver cutting-edge solutions
                        that set industry standards.</p>
                </div>

                <div class="value-card">
                    <h3><i class="fas fa-users"></i> Collaboration</h3>
                    <p>We believe in the power of teamwork and partnerships, both within our organization and with our
                        clients.</p>
                </div>

                <div class="value-card">
                    <h3><i class="fas fa-shield-alt"></i> Integrity</h3>
                    <p>We conduct business with honesty, transparency, and ethical practices, building trust that lasts.
                    </p>
                </div>

                <div class="value-card">
                    <h3><i class="fas fa-trophy"></i> Excellence</h3>
                    <p>We strive for the highest quality in everything we do, from our solutions to our customer
                        service.</p>
                </div>

                <div class="value-card">
                    <h3><i class="fas fa-heart"></i> Passion</h3>
                    <p>We love what we do, and that passion fuels our creativity, dedication, and commitment to success.
                    </p>
                </div>

                <div class="value-card">
                    <h3><i class="fas fa-hand-holding-heart"></i> Responsibility</h3>
                    <p>We are committed to making a positive impact on our community and environment through sustainable
                        practices.</p>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Simple animation for stats counting
        document.addEventListener('DOMContentLoaded', function() {
            const statNumbers = document.querySelectorAll('.stat-number');

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const stat = entry.target;
                        const target = parseInt(stat.textContent);
                        let current = 0;
                        const increment = target / 50;

                        const timer = setInterval(() => {
                            current += increment;
                            if (current >= target) {
                                stat.textContent = target + (stat.textContent.includes(
                                    '%') ? '%' : '+');
                                clearInterval(timer);
                            } else {
                                stat.textContent = Math.floor(current) + (stat.textContent
                                    .includes('%') ? '%' : '+');
                            }
                        }, 30);

                        observer.unobserve(stat);
                    }
                });
            }, {
                threshold: 0.5
            });

            statNumbers.forEach(stat => {
                observer.observe(stat);
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>
</body>

</html>
