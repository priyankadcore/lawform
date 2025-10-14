
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

        /* ========== NAVIGATION ========== */
        nav ul {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 30px;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            position: relative;
        }

        nav ul li a {
            color: #e0e0e0;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s ease;
        }

        nav ul li a:hover {
            color: #57b45a;
        }

        /* ========== SUBMENU ========== */
        nav ul li .submenu {
            display: none;
            position: absolute;
            left: 0;
            background: #fff;
            min-width: 40px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            border-radius: 8px;
            padding: 10px 0;
            z-index: 1000;
            flex-direction: column;
        }

        nav ul li.has-submenu:hover > .submenu {
            display: flex;
        }

        nav ul li .submenu li {
            list-style: none;
            padding: 0;
        }

        nav ul li .submenu li a {
            color: #333;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
            font-size: 15px;
            font-weight: 500;
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        nav ul li .submenu li a:hover {
            background-color: #f4f4f4;
            color: #57b45a;
        }

        /* ========== DROPDOWN ARROW (ONLY FOR SUBMENUS) ========== */
        nav ul li.has-submenu > a::after {
            content: '';
            display: inline-block;
            margin-left: 6px;
            border: solid #e0e0e0;
            border-width: 0 2px 2px 0;
            padding: 3px;
            transform: rotate(45deg);
            transition: border-color 0.3s ease;
        }

        nav ul li.has-submenu:hover > a::after {
            border-color: #57b45a;
        }

        /* ========== SEARCH + BUTTON ========== */
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
            color: #fff;
            border: none;
            padding: 12px 15px;
            border-radius: 28px;
            cursor: pointer;
            transition: all 0.3s ease;
            background-color: #57b45a;
        }

        /* ========== MOBILE MENU ========== */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }

        @media (max-width: 768px) {
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

            nav ul li .submenu {
                position: static;
                box-shadow: none;
                background: transparent;
                padding: 0;
            }

            nav ul li .submenu li a {
                padding-left: 30px;
                color: #ccc;
            }

            nav ul li .submenu li a:hover {
                background: none;
                color: #57b45a;
            }
        }
    </style>
</head>
<body>
    <div class="header-container">
        <header>
            <div class="logo-section">
                <div class="logo-text">Content<span>Manager</span></div>
            </div>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn"><i class="fas fa-bars"></i></button>

            <!-- Navigation -->
           <nav id="main-nav">
                <ul>
                    @foreach($header->where('parent_id', null) as $main)
                        @php
                            $subMenus = $header->where('parent_id', $main->id);
                        @endphp

                        <li class="{{ $subMenus->isNotEmpty() ? 'has-submenu' : '' }}">
                            <a href="{{ url($main->slug == 'home' ? '/' : $main->slug) }}">
                                {{ $main->title }}
                            </a>

                            @if($subMenus->isNotEmpty())
                                <ul class="submenu">
                                    @foreach($subMenus as $sub)
                                        <li>
                                            <a href="{{ url($sub->slug) }}">{{ $sub->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach
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
                const icon = this.querySelector('i');
                icon.classList.toggle('fa-bars');
                icon.classList.toggle('fa-times');
            });

            // Close menu on link click (for mobile)
            const navLinks = document.querySelectorAll('nav a');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth <= 768) {
                        mainNav.classList.remove('active');
                        const icon = mobileMenuBtn.querySelector('i');
                        icon.classList.remove('fa-times');
                        icon.classList.add('fa-bars');
                    }
                });
            });
        });
    </script>

