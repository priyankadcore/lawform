<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Banner Design</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }


        /* Background image with overlay */
        body::before {
            
        }

        .banner-container {
            width: 100%;
            background: rgba(255, 255, 255, 0.95);
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.25);
          
            position: relative;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            
        }

        .banner-content {
            display: flex;
            align-items: center;
            min-height: 600px;
            position: relative;
            overflow: hidden;
        }

        .text-content {
            flex: 1;
            padding: 70px 60px;
            z-index: 2;
            position: relative;
        }

        .visual-content {
            flex: 1;
            height: 600px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.08) 0%, rgba(118, 75, 162, 0.08) 100%);
            border-left: 1px solid rgba(0, 0, 0, 0.05);
        }

        .banner-badge {
            display: inline-block;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 10px 25px;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 25px;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            letter-spacing: 0.5px;
            position: relative;
            overflow: hidden;
        }

        .banner-badge::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .banner-badge:hover::before {
            left: 100%;
        }

    
        .banner-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 25px;
            color: #020202;
            background: linear-gradient(135deg, #000000 0%, #005eff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
        }

        .banner-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 80px;
            height: 5px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 5px;
        }

        .banner-subtitle {
            font-size: 20px;
            color: #000000;
            margin-bottom: 35px;
            line-height: 1.6;
            max-width: 100%;
            font-weight: 400;
        }

        .banner-features {
            display: flex;
            gap: 25px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 12px;
            color: #000000;
            font-weight: 500;
            background: rgb(0 0 0 / 8%);
            padding: 12px 22px;
            border-radius: 50px;
            transition: all 0.3s ease;
            border: 1px solid rgb(0 0 0 / 10%);
        }
        .feature:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(5, 29, 136, 0.15);
            background: rgba(7, 40, 185, 0.12);
        }

        .feature i {
            color: #48bb78;
            font-size: 1.2rem;
        }

        .cta-buttons {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            padding: 18px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.3);
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
            overflow: hidden;
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(102, 126, 234, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: #667eea;
            border: 2px solid #667eea;
            padding: 18px 40px;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 12px;
            position: relative;
            overflow: hidden;
        }

        .btn-secondary::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 100%;
            background: rgba(102, 126, 234, 0.1);
            transition: width 0.3s ease;
            z-index: -1;
        }

        .btn-secondary:hover::before {
            width: 100%;
        }

        .btn-secondary:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.2);
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
            width: 420px;
            height: 420px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation: morphing 10s ease-in-out infinite;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 5rem;
            box-shadow: 0 25px 50px rgba(102, 126, 234, 0.3);
            position: relative;
            z-index: 2;
            transition: all 0.5s ease;
        }

        .main-visual:hover {
            transform: scale(1.05);
            box-shadow: 0 30px 60px rgba(102, 126, 234, 0.4);
        }

        .floating-elements {
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .floating-element {
            position: absolute;
            background: white;
            border-radius: 15px;
            padding: 18px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 12px;
            animation: float-element 6s ease-in-out infinite;
            z-index: 3;
            transition: all 0.3s ease;
        }

        .floating-element:hover {
            transform: scale(1.05);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
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
            font-size: 1.6rem;
        }

        .floating-element span {
            font-weight: 600;
            color: #4a5568;
            white-space: nowrap;
            font-size: 0.95rem;
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
            gap: 40px;
            margin-top: 50px;
            padding-top: 35px;
            border-top: 1px solid #e2e8f0;
        }

        .stat {
            text-align: center;
            position: relative;
        }

        .stat::after {
            content: '';
            position: absolute;
            top: 0;
            right: -20px;
            height: 100%;
            width: 1px;
            background: #e2e8f0;
        }

        .stat:last-child::after {
            display: none;
        }

        .stat-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: #667eea;
            margin-bottom: 8px;
        }

        .stat-label {
            font-size: 0.95rem;
            color: #718096;
            font-weight: 500;
        }

        @media (max-width: 1024px) {
            .banner-content {
                flex-direction: column;
                text-align: center;
            }

            .text-content {
                padding: 50px 40px;
            }

            .visual-content {
                height: 400px;
                width: 100%;
                border-left: none;
                border-top: 1px solid rgba(0, 0, 0, 0.03);
            }

            .main-visual {
                width: 320px;
                height: 320px;
            }

            .banner-title {
                font-size: 2.8rem;
            }

            .banner-title::after {
                left: 50%;
                transform: translateX(-50%);
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
                font-size: 2.3rem;
            }

            .text-content {
                padding: 40px 30px;
            }

            .main-visual {
                width: 280px;
                height: 280px;
                font-size: 4rem;
            }

            .stats {
                flex-wrap: wrap;
                justify-content: center;
                gap: 25px;
            }

            .stat {
                flex: 1;
                min-width: 120px;
            }

            .stat::after {
                display: none;
            }

            .banner-features {
                gap: 15px;
            }

            .feature {
                padding: 8px 15px;
            }
        }
    </style>
</head>

<body>
    <div class="banner-container">
    <div class="banner-content">
        <div class="text-content">

            <h1 class="banner-title">
                {{ $fields['title'] ?? 'Transform Your Digital Experience Today' }}
            </h1>

            <p class="banner-subtitle">
                {{ $fields['description'] ?? 'Discover our innovative solutions that help businesses grow faster, work smarter, and achieve remarkable results. Join thousands of satisfied customers worldwide.' }}
            </p>

            <div class="cta-buttons">
                @if(isset($fields['buttontext-1']))
                    <button class="btn-primary">
                        <i class="fas fa-rocket"></i> {{ $fields['buttontext-1'] }}
                    </button>
                @endif
                
                @if(isset($fields['buttontext-2']))
                    <button class="btn-secondary">
                        <i class="fas fa-play-circle"></i> {{ $fields['buttontext-2'] }}
                    </button>
                @endif
            </div>

        </div>

        <div class="visual-content">
            @if(isset($fields['image']))
                <img src="{{ asset('storage/' . $fields['image']) }}" alt="Main Visual" class="main-visual">
            @else
                <div class="main-visual">
                    <i class="fas fa-image"></i>
                </div>
            @endif
        </div>
    </div>
</div>

</body>
</html>