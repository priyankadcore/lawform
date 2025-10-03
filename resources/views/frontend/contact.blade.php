<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Modern Design</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .contact-container {
            background: #111111;
            overflow: hidden;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.5);
            display: flex;
            flex-wrap: wrap;
        }

        .contact-form-section {
            flex: 1;
            min-width: 500px;
            padding: 50px;
            background: #111111;
        }

        .contact-details-section {
            flex: 1;
            min-width: 500px;
            padding: 50px;
            background: linear-gradient(135deg, #1a1a1a 0%, #111111 100%);
            position: relative;
            overflow: hidden;
        }

        .contact-details-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, rgba(46, 125, 50, 0.1) 0%, rgba(76, 175, 80, 0.05) 100%);
            z-index: 0;
        }

        .section-title {
            font-size: 2.5rem;
            margin-bottom: 10px;
            background: linear-gradient(90deg, #4caf50, #81c784);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #4caf50, #81c784);
            bottom: -10px;
            left: 0;
            border-radius: 2px;
        }

        .section-subtitle {
            color: #aaaaaa;
            font-size: 1.1rem;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            color: #cccccc;
            font-weight: 500;
        }

        .form-control {
            width: 100%;
            padding: 15px 20px;
            background: #1a1a1a;
            border: 2px solid #333333;
            border-radius: 10px;
            color: #ffffff;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: #4caf50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
        }

        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }

        .submit-btn {
            background: linear-gradient(135deg, #2e7d32, #4caf50);
            color: white;
            border: none;
            padding: 16px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(46, 125, 50, 0.3);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(46, 125, 50, 0.4);
            background: linear-gradient(135deg, #1b5e20, #2e7d32);
        }

        .contact-info {
            position: relative;
            z-index: 1;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 30px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        .contact-item:hover {
            background: rgba(255, 255, 255, 0.08);
            transform: translateX(5px);
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            background: linear-gradient(135deg, #2e7d32, #4caf50);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            margin-right: 20px;
            flex-shrink: 0;
        }

        .contact-text h3 {
            font-size: 1.3rem;
            margin-bottom: 5px;
            color: #ffffff;
        }

        .contact-text p {
            color: #aaaaaa;
            line-height: 1.6;
        }

        .social-links {
            display: flex;
            gap: 15px;
            margin-top: 40px;
        }

        .social-link {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: #cccccc;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-link:hover {
            background: linear-gradient(135deg, #2e7d32, #4caf50);
            color: white;
            transform: translateY(-5px);
        }

        .map-placeholder {
            margin-top: 40px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 12px;
            overflow: hidden;
            height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            gap: 15px;
        }

        .map-placeholder i {
            font-size: 2.5rem;
            color: #4caf50;
        }

        .map-placeholder p {
            color: #aaaaaa;
        }

        @media (max-width: 1024px) {

            .contact-form-section,
            .contact-details-section {
                min-width: 100%;
            }

            .contact-container {
                flex-direction: column;
            }
        }

        @media (max-width: 768px) {

            .contact-form-section,
            .contact-details-section {
                padding: 30px;
            }

            .section-title {
                font-size: 2rem;
            }

            .contact-item {
                flex-direction: column;
                text-align: center;
            }

            .contact-icon {
                margin-right: 0;
                margin-bottom: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="contact-container">
        <!-- Contact Form Section -->
        <div class="contact-form-section">
            <h2 class="section-title">Get In Touch</h2>
            <p class="section-subtitle">Have questions? Fill out the form below and our team will get back to you within
                24 hours.</p>

            <form id="contact-form">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" class="form-control" placeholder="Enter your full name"
                        required>
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" class="form-control" placeholder="Enter your email address"
                        required>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="tel" id="phone" class="form-control" placeholder="Enter your phone number">
                </div>

                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" class="form-control" placeholder="Enter the subject" required>
                </div>

                <div class="form-group">
                    <label for="message">Your Message</label>
                    <textarea id="message" class="form-control" placeholder="Type your message here..." required></textarea>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> Send Message
                </button>
            </form>
        </div>

        <!-- Contact Details Section -->
        <div class="contact-details-section">
            <div class="contact-info">
                <h2 class="section-title">Contact Information</h2>
                <p class="section-subtitle">Feel free to reach out to us through any of the following channels.</p>

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Our Location</h3>
                        <p>123 Business Avenue, Suite 100<br>New York, NY 10001, USA</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Phone Number</h3>
                        <p>+1 (555) 123-4567<br>+1 (555) 765-4321</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Email Address</h3>
                        <p>info@example.com<br>support@example.com</p>
                    </div>
                </div>

                <div class="contact-item">
                    <div class="contact-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="contact-text">
                        <h3>Working Hours</h3>
                        <p>Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 10:00 AM - 4:00 PM</p>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const contactForm = document.getElementById('contact-form');

            contactForm.addEventListener('submit', function(e) {
                e.preventDefault();

                // Get form values
                const name = document.getElementById('name').value;
                const email = document.getElementById('email').value;
                const subject = document.getElementById('subject').value;

                // In a real application, you would send this data to a server
                // For this example, we'll just show an alert
                alert(
                    `Thank you ${name}! Your message about "${subject}" has been sent successfully. We'll respond to ${email} within 24 hours.`
                );

                // Reset the form
                contactForm.reset();
            });

            // Add animation to form elements on focus
            const formControls = document.querySelectorAll('.form-control');

            formControls.forEach(control => {
                control.addEventListener('focus', function() {
                    this.parentElement.style.transform = 'translateX(5px)';
                });

                control.addEventListener('blur', function() {
                    this.parentElement.style.transform = 'translateX(0)';
                });
            });
        });
    </script>
</body>

</html>
