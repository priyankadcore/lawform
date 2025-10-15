<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Company Name</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
       
        .container1 {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            margin-bottom: 57px;
        }
        .para {
            color: #706f6fff !important;
            font-size: 15px;
            margin-bottom: 50px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
                }

        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }

        .section-title h2 {
            font-size: 3.5rem;
            color: #1a2a6c;
            margin-bottom: 15px;
            display: inline-block;
        }

        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: linear-gradient(to right, #1a2a6c, #fdbb2d);
            border-radius: 2px;
        }

        .section-title p {
            color: #666;
            max-width: 700px;
            margin: 0 auto;
            font-size: 12px;
        }

        /* Our Story Section */
        .story-content {
            display: flex;
            align-items: center;
            gap: 50px;
            /* margin-bottom: 80px; */
        }

        .story-text {
            flex: 1;
        }

        .story-text h3 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #1a2a6c;
        }

        .story-text p {
            margin-bottom: 20px;
            color: #555;
            font-size: smaller;
        }

        .story-image {
            flex: 1;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .story-image img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.5s;
        }

        .story-image:hover img {
            transform: scale(1.05);
        }

        /* Mission & Vision */
        .mission-vision {
            background-color: #f0f2f5;
            padding: 60px 0;
            border-radius: 15px;
            margin-bottom: 80px;
        }

        .mv-container {
            display: flex;
            gap: 40px;
        }

        .mv-card {
            flex: 1;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: transform 0.3s;
        }

        .mv-card:hover {
            transform: translateY(-10px);
        }

        .mv-icon {
            font-size: 3rem;
            margin-bottom: 20px;
            color: #1a2a6c;
        }

        .mv-card h3 {
            font-size: 1.5rem;
            margin-bottom: 15px;
            color: #1a2a6c;
        }

        /* Values Section */
        .values-section {
            margin-bottom: 80px;
        }

        .values-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .value-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            text-align: center;
            transition: all 0.3s;
        }

        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        .value-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #1a2a6c, #fdbb2d);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 1.8rem;
        }

        .value-card h3 {
            margin-bottom: 15px;
            color: #1a2a6c;
        }

        /* Team Section */
        .team-section {
            background-color: #f0f2f5;
            padding: 60px 0;
            border-radius: 15px;
            margin-bottom: 80px;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .team-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }

        .team-card:hover {
            transform: translateY(-10px);
        }

        .team-img {
            height: 250px;
            overflow: hidden;
        }

        .team-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }

        .team-card:hover .team-img img {
            transform: scale(1.1);
        }

        .team-info {
            padding: 20px;
            text-align: center;
        }

        .team-info h3 {
            margin-bottom: 5px;
            color: #1a2a6c;
        }

        .team-info p {
            color: #666;
            margin-bottom: 15px;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .social-links a {
            color: #1a2a6c;
            font-size: 1.2rem;
            transition: color 0.3s;
        }

        .social-links a:hover {
            color: #fdbb2d;
        }

        /* Achievements Section */
        .achievements-section {
            margin-bottom: 80px;
        }

        .achievements-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            text-align: center;
        }

        .achievement-card {
            padding: 30px 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .achievement-number {
            font-size: 3rem;
            font-weight: 700;
            color: #1a2a6c;
            margin-bottom: 10px;
        }

        .achievement-text {
            color: #666;
            font-weight: 500;
        }

        /* Timeline Section */
        .timeline-section {
            background-color: #f0f2f5;
            padding: 60px 0;
            border-radius: 15px;
        }

        .timeline {
            position: relative;
            max-width: 800px;
            margin: 0 auto;
        }

        .timeline::after {
            content: '';
            position: absolute;
            width: 6px;
            background-color: #1a2a6c;
            top: 0;
            bottom: 0;
            left: 50%;
            margin-left: -3px;
        }

        .timeline-item {
            padding: 10px 40px;
            position: relative;
            width: 50%;
            box-sizing: border-box;
        }

        .timeline-item:nth-child(odd) {
            left: 0;
        }

        .timeline-item:nth-child(even) {
            left: 50%;
        }

        .timeline-content {
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .timeline-content h3 {
            color: #1a2a6c;
            margin-bottom: 10px;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            background-color: #fdbb2d;
            border: 4px solid #1a2a6c;
            border-radius: 50%;
            top: 15px;
            z-index: 1;
        }

        .timeline-item:nth-child(odd)::after {
            right: -10px;
        }

        .timeline-item:nth-child(even)::after {
            left: -10px;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .story-content, .mv-container {
                flex-direction: column;
            }

            .timeline::after {
                left: 31px;
            }

            .timeline-item {
                width: 100%;
                padding-left: 70px;
                padding-right: 25px;
            }

            .timeline-item:nth-child(even) {
                left: 0;
            }

            .timeline-item::after {
                left: 21px;
            }

            .timeline-item:nth-child(odd)::after,
            .timeline-item:nth-child(even)::after {
                left: 21px;
            }
        }
    </style>
</head>
<body>
    <!-- About Us Section -->
    <section class="about-section" >
        <div class="container1">
            <div class="section-title">
                <h2>{{ $fields['headline'] }}</h2>
                <div class="para">{{ $fields['sub-heading'] }}</div>
            </div>

            <!-- Our Story Section -->
            <div class="story-content">
                <div class="story-text">
                    <h3>{{ $fields['title'] }}</h3>
                    <p>{{ $fields['description'] }}</p>
                </div>
                <div class="story-image">
                    <img src="{{ asset('storage/' . $fields['image']) }}" alt="Our Team Working">
                </div>
            </div>

            <!-- Values Section -->
            {{-- <div class="values-section">
                <div class="section-title">
                    <h2>Our Values</h2>
                    <p>The principles that guide everything we do</p>
                </div>
                <div class="values-grid">
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3>Collaboration</h3>
                        <p>We believe in the power of teamwork and open communication to achieve extraordinary results. Our collaborative culture fosters innovation and ensures we deliver the best solutions for our clients.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3>Innovation</h3>
                        <p>We constantly explore new ideas and approaches to deliver cutting-edge solutions. Our commitment to innovation drives us to challenge conventions and create breakthrough technologies.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-handshake"></i>
                        </div>
                        <h3>Integrity</h3>
                        <p>We conduct our business with honesty, transparency, and ethical practices. Our clients trust us because we always do what's right, even when no one is watching.</p>
                    </div>
                    <div class="value-card">
                        <div class="value-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h3>Excellence</h3>
                        <p>We strive for the highest quality in everything we do, from small details to major projects. Our pursuit of excellence ensures we deliver exceptional value to our clients.</p>
                    </div>
                </div>
            </div> --}}

        </div>
    </section>
</body>
</html>