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
            margin-bottom: 40px;
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

        .section-subtitle1 {
            color: #0a0a0aff!important;
            font-size: 15px;
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
        <h2 class="section-title"> {{ $fields['headline'] ?? 'Our Services' }} </h2>
        <h6 class="section-subtitle1" style="color:gray!important;">We provide a wide range of professional services to help your business grow and
            succeed in the digital world.</h6>

        <div class="services-cards">

        @php
            $data = isset($fields['data']) ? json_decode($fields['data'], true) : [];
        @endphp
            

        @if(!empty($data))
        @foreach($data as $index => $item)
            <div class="service-card">
                <div class="card-icon">
                    <i class="{{ $item['icon']['value']}}"></i>
                </div>
                <h3 class="card-title">{{ $item['title']['value']}}</h3>
                <p class="card-description">{{ $item['description']['value'] }}</p>
                <a href="#" class="card-link">{{ $item['button-1']['value'] }}<i class="fas fa-arrow-right"></i></a>
            </div>
         @endforeach
        @else
            <p>No Services available at the moment.</p>
        @endif

         

           
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
