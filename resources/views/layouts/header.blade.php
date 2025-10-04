
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
      
        
        header {
            background-color: #1a1a1a;
            padding: 0 30px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 80px;
        }
        
        .logo-section {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-left: 26px;
        }
        
        .cms-icon {
            background: linear-gradient(135deg, #57b45a 0%, #2575fc 100%);
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            box-shadow: 0 4px 10px rgba(106, 17, 203, 0.3);
        }
        
        .logo-text {
            color: white;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        .logo-text span {
            color: #57b45a;
        }
        
        nav ul {
            display: flex;
            list-style: none;
            gap: 30px;
        }
        
        nav ul li a {
            color: #e0e0e0;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            transition: all 0.3s ease;
            padding: 8px 0;
            position: relative;
        }
        
        nav ul li a:hover {
            color: white;
        }
        
        nav ul li a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: #57b45a;
            transition: width 0.3s ease;
        }
        
        nav ul li a:hover::after {
            width: 100%;
        }
        
        .nav-actions {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .search-icons {
            color: #e0e0e0;
            font-size: 20px;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .search-icons:hover {
            color: white;
        }
        
        .sign-in-btn {
        margin-right: 15px;
        color: #fff4f4;
        border: none;
        padding: 12px 15px;
        border-radius: 28px;
        cursor: pointer;
        transition: all 0.3s ease;
        background-color: #57b45a;
       } 

        
        
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }
        
        @media (max-width: 992px) {
            nav ul {
                gap: 20px;
            }
        }
        
        @media (max-width: 768px) {
            header {
                padding: 0 20px;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            nav {
                position: absolute;
                top: 80px;
                left: 0;
                width: 100%;
                background-color: #1a1a1a;
                padding: 20px;
                display: none;
                border-bottom-left-radius: 12px;
                border-bottom-right-radius: 12px;
                box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            }
            
            nav.active {
                display: block;
            }
            
            nav ul {
                flex-direction: column;
                gap: 15px;
            }
            
            nav ul li a {
                display: block;
                padding: 12px 0;
                border-bottom: 1px solid #2a2a2a;
            }
            
            nav ul li:last-child a {
                border-bottom: none;
            }
        }
        
        .demo-note {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="header-container">
        <header>
            <div class="logo-section">
                
                <div class="logo-text">Content<span>Manager</span></div>
            </div>
            
            
            
            <nav id="main-nav">
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Properties</a></li>
                    <li><a href="#">Our Team</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact us</a></li>
                </ul>
            </nav>
            
            <div class="nav-actions">
                <div class="search-icons">
                    <i class="fas fa-search"></i>
                </div>
                <button class="sign-in-btn">Sign In</button>
            </div>
        </header>
     
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
            const mainNav = document.getElementById('main-nav');
            
            mobileMenuBtn.addEventListener('click', function() {
                mainNav.classList.toggle('active');
                
                // Change icon based on menu state
                const icon = this.querySelector('i');
                if (mainNav.classList.contains('active')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
            
            // Close menu when clicking on a link (for mobile)
            const navLinks = document.querySelectorAll('nav a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 768) {
                        mainNav.classList.remove('active');
                        mobileMenuBtn.querySelector('i').classList.remove('fa-times');
                        mobileMenuBtn.querySelector('i').classList.add('fa-bars');
                    }
                });
            });
        });
    </script>
