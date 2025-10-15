@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .team-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 100px 0 80px;
            text-align: center;
            color: white;
            font-family: 'Montserrat', sans-serif;
        }

       .team-hero h1 {
        font-size: 4.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: white;
    }
    h3{
        margin-top: 0px!important; 
         margin-bottom: 0px!important;
    }

        .para {
            font-size: 1.3rem;
            max-width: 700px;
            margin: 0 auto 30px;
            opacity: 0.9;
            line-height: 1.6;
        }

        .stats-container {
            display: flex;
            justify-content: center;
            gap: 60px;
            margin-top: 50px;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* Team Grid Section */
        .team-grid-section {
            background: #f8fafc;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 2.8rem;
            color: #2d3748;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .section-title p {
            font-size: 1.2rem;
            color: #718096;
            max-width: 600px;
            margin: 0 auto;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 40px;
            margin-bottom: 80px;
        }

        .team-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.4s ease;
            position: relative;
        }

        .team-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            position: relative;
            height: 280px;
            overflow: hidden;
        }

        .card-header img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }

        .team-card:hover .card-header img {
            transform: scale(1.1);
        }

        .card-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(transparent, rgba(102, 126, 234, 0.9));
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding: 30px;
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .team-card:hover .card-overlay {
            opacity: 1;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-links a {
            width: 50px;
            height: 50px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #667eea;
            text-decoration: none;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            background: #4a5568;
            color: white;
            transform: translateY(-3px);
        }

        .card-content {
            padding: 30px;
        }

        .member-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2d3748;
            margin-bottom: 8px;
        }

        .member-role {
            color: #667eea;
            font-weight: 600;
            margin-bottom: 15px;
            font-size: 1.1rem;
        }

        .member-description {
            color: #718096;
            line-height: 1.7;
            font-size: 0.95rem;
        }

        .member-skills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 20px;
        }

        .skill-tag {
            background: #edf2f7;
            color: #4a5568;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .member-contact {
            border-top: 1px solid #e2e8f0;
            padding-top: 20px;
        }

        .contact-info1 {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
            color: #718096;
            font-size: 0.9rem;
        }

        .contact-info1 i {
            color: #667eea;
            width: 16px;
        }

       

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #764ba2 0%, #667eea 100%);
            padding: 80px 0;
            text-align: center;
            color: white;
        }

        .cta-content h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .cta-content p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-button {
            display: inline-block;
            background: white;
            color: #667eea;
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }

        .cta-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .team-hero h1 {
                font-size: 2.5rem;
            }
            
            .team-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-container {
                gap: 30px;
            }
            
            .stat-number {
                font-size: 2.5rem;
            }
        }
    </style>


    <!-- Team Grid Section -->
    <section class="team-grid-section">
        <div class="container">
            <div class="section-title">
                <h2>Our Core Team</h2>
                <p>Get to know the brilliant minds driving our vision forward</p>
            </div>

            <div class="team-grid">
                <!-- Team Member 1 -->
                <div class="team-card">
                    <div class="card-header">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Johnathan Carter">
                        <div class="card-overlay">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-github"></i></a>
                                <a href="#"><i class="fab fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="member-name">Johnathan Carter</h3>
                        <div class="member-role">CEO & Founder</div>
                        <p class="member-description">Visionary leader with 15+ years of experience in tech innovation. Johnathan founded the company with a mission to revolutionize digital experiences.</p>
                        
                        <div class="member-contact">
                            <div class="contact-info1">
                                <i class="fas fa-envelope"></i>
                                <span>johnathan@company.com</span>
                            </div>
                            <div class="contact-info1">
                                <i class="fas fa-phone"></i>
                                <span>+1 (555) 123-4567</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="team-card">
                    <div class="card-header">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Sarah Chen">
                        <div class="card-overlay">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="member-name">Sarah Chen</h3>
                        <div class="member-role">Creative Director</div>
                        <p class="member-description">Award-winning designer with a passion for creating memorable brand experiences. Sarah leads our creative vision across all digital platforms.</p>
                        
                        <div class="member-contact">
                            <div class="contact-info1">
                                <i class="fas fa-envelope"></i>
                                <span>sarah@company.com</span>
                            </div>
                            <div class="contact-info1">
                                <i class="fas fa-phone"></i>
                                <span>+1 (555) 123-4568</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="team-card">
                    <div class="card-header">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Michael Rodriguez">
                        <div class="card-overlay">
                            <div class="social-links">
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-github"></i></a>
                                <a href="#"><i class="fab fa-stack-overflow"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <h3 class="member-name">Michael Rodriguez</h3>
                        <div class="member-role">CTO & Lead Developer</div>
                        <p class="member-description">Full-stack developer with expertise in modern web technologies. Michael architects scalable solutions and leads our technical innovation.</p>
                        
                        <div class="member-contact">
                            <div class="contact-info1">
                                <i class="fas fa-envelope"></i>
                                <span>michael@company.com</span>
                            </div>
                            <div class="contact-info1">
                                <i class="fas fa-phone"></i>
                                <span>+1 (555) 123-4569</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        
        </div>
    </section>


@endsection