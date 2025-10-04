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

        .section-title-desgin {
            font-size: 3.5rem !important;
            margin-bottom: 15px !important;
            text-align: center;
            position: relative;
            color : #4caf50;
        }

        .section-title-desgin::after {
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
            color: #ffffffff !important;
            font-size: 19px !important;
            max-width: 700px;
            margin: 0 auto 30px !important;
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

            .section-title-desgin {
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
    <!-- Values Section -->
   <section class="section values-section">
    <div class="about-container">
        <h2 class="section-title-desgin">{{ $fields['title'] ?? '' }}</h2>
        <p class="section-subtitle">{{ $fields['short-description'] ?? '' }}</p>

        <div class="values-grid">
            @php
                $data = isset($fields['data']) ? json_decode($fields['data'], true) : [];
                $icons = ['fas fa-lightbulb', 'fas fa-users', 'fas fa-shield-alt', 'fas fa-trophy', 'fas fa-heart', 'fas fa-hand-holding-heart'];
            @endphp

            @if(!empty($data))
                @foreach($data as $index => $item)
                    <div class="value-card">
                        <h3>
                            <i class="{{ $icons[$index] ?? 'fas fa-star' }}"></i> 
                            {{ $item['title']['value'] ?? 'Default Title' }}
                        </h3>
                        <p>{{ $item['description']['value'] ?? 'Default description text.' }}</p>
                    </div>
                @endforeach
            @else
                <p style="text-align: center; color: #888;">No values data available.</p>
            @endif
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
