<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Section - Green & White Theme</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .faq-container {
            width: 100%;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
            padding: 50px 40px;
            position: relative;
            overflow: hidden;
        }

        .faq-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
            background: linear-gradient(90deg, #2e7d32, #4caf50, #81c784);
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            color: #1a1a1a;
            margin-bottom: 15px;
            position: relative;
            display: inline-block;
            width: 100%;
        }

        .section-title::after {
            content: '';
            position: absolute;
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #2e7d32, #4caf50);
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        .section-subtitle12 {
            text-align: center;
            color: #444;
            font-size: 1.1rem;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            line-height: 1.6;
        }

        .faq-list {
            max-width: 800px;
            margin: 0 auto;
        }

        .faq-item {
            margin-bottom: 20px;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid #e0f2e0;
            background: white;
        }

        .faq-item.active {
            box-shadow: 0 8px 25px rgba(46, 125, 50, 0.15);
            border-color: #4caf50;
        }

        .faq-question {
            padding: 20px 25px;
            background: #f1f8e9;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
        }

        .faq-item.active .faq-question {
            background: #e8f5e9;
            border-bottom: 1px solid #c8e6c9;
        }

        .faq-question h3 {
            font-size: 1.2rem;
            color: #1a1a1a;
            font-weight: 600;
            margin: 0;
            transition: all 0.3s ease;
        }

        .faq-item.active .faq-question h3 {
            color: #1a1a1a;
        }

        .faq-icon {
            color: #2e7d32;
            font-size: 1.2rem;
            transition: all 0.3s ease;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
            color: #1a1a1a;
        }

        .faq-answer {
            padding: 0 25px;
            max-height: 0;
            overflow: hidden;
            transition: all 0.4s ease;
            background: white;
        }

        .faq-item.active .faq-answer {
            padding: 25px;
            max-height: 500px;
        }

        .faq-answer p {
            color: #333;
            line-height: 1.7;
            margin: 0;
        }

        .faq-actions {
            display: flex;
            justify-content: center;
            margin-top: 40px;
            gap: 15px;
        }

        .contact-btn {
            background: linear-gradient(135deg, #2e7d32, #4caf50);
            color: white;
            border: none;
            padding: 14px 30px;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(46, 125, 50, 0.3);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .contact-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(46, 125, 50, 0.4);
            background: linear-gradient(135deg, #1b5e20, #2e7d32);
        }

        .search-box {
            position: relative;
            max-width: 500px;
            margin: 0 auto 40px;
        }

        .search-box input {
            width: 100%;
            padding: 16px 20px 16px 50px;
            border: 2px solid #e0f2e0;
            border-radius: 50px;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s ease;
            background: #f9fdf9;
            color: #333;
        }

        .search-box input:focus {
            border-color: #4caf50;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
            background: white;
        }

        .search-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #4caf50;
            font-size: 1.2rem;
        }

        .faq-stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 40px;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
            padding: 15px 25px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            border-left: 4px solid #4caf50;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: #2e7d32;
            margin-bottom: 5px;
        }

        .stat-text {
            font-size: 0.9rem;
            color: #444;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .faq-container {
                padding: 30px 20px;
            }

            .section-title {
                font-size: 2rem;
            }

            .faq-question {
                padding: 18px 20px;
            }

            .faq-question h3 {
                font-size: 1.1rem;
            }

            .faq-answer {
                padding: 0 20px;
            }

            .faq-item.active .faq-answer {
                padding: 20px;
            }

            .faq-stats {
                gap: 15px;
            }

            .stat-item {
                padding: 12px 18px;
            }

            .stat-number {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <div class="faq-container">
    <h2 class="section-title">{{ $fields['title'] ?? 'Frequently Asked Questions' }}</h2>

    <div class="faq-list">
        @php
            $data = isset($fields['data']) ? json_decode($fields['data'], true) : [];
        @endphp

        @if(!empty($data))
            @foreach($data as $index => $item)
                <div class="faq-item">
                    <div class="faq-question">
                        <h3>{{ $item['question']['value'] ?? 'Question not available' }}</h3>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-answer">
                        <p>{{ $item['answer']['value'] ?? 'Answer not available' }}</p>
                    </div>
                </div>
            @endforeach
        @else
            <p>No FAQs available at the moment.</p>
        @endif
    </div>

    <div class="faq-actions">
        <button class="contact-btn">
            <i class="fas fa-headset"></i> Contact Support
        </button>
    </div>
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // FAQ toggle functionality
            const faqItems = document.querySelectorAll('.faq-item');

            faqItems.forEach(item => {
                const question = item.querySelector('.faq-question');

                question.addEventListener('click', () => {
                    // Close all other items
                    faqItems.forEach(otherItem => {
                        if (otherItem !== item && otherItem.classList.contains('active')) {
                            otherItem.classList.remove('active');
                        }
                    });

                    // Toggle current item
                    item.classList.toggle('active');
                });
            });

            // Search functionality
            const searchInput = document.getElementById('faq-search');

            searchInput.addEventListener('input', function() {
                const searchTerm = this.value.toLowerCase();

                faqItems.forEach(item => {
                    const question = item.querySelector('.faq-question h3').textContent
                        .toLowerCase();
                    const answer = item.querySelector('.faq-answer p').textContent.toLowerCase();

                    if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                        item.style.display = 'block';

                        // Highlight matching text
                        if (searchTerm.length > 0) {
                            highlightText(item, searchTerm);
                        } else {
                            removeHighlight(item);
                        }
                    } else {
                        item.style.display = 'none';
                    }
                });
            });

            // Function to highlight matching text
            function highlightText(element, searchTerm) {
                const question = element.querySelector('.faq-question h3');
                const answer = element.querySelector('.faq-answer p');

                const questionText = question.textContent;
                const answerText = answer.textContent;

                const highlightedQuestion = questionText.replace(
                    new RegExp(searchTerm, 'gi'),
                    match =>
                    `<span style="background-color: #c8e6c9; padding: 2px 4px; border-radius: 4px;">${match}</span>`
                );

                const highlightedAnswer = answerText.replace(
                    new RegExp(searchTerm, 'gi'),
                    match =>
                    `<span style="background-color: #c8e6c9; padding: 2px 4px; border-radius: 4px;">${match}</span>`
                );

                question.innerHTML = highlightedQuestion;
                answer.innerHTML = highlightedAnswer;
            }

            // Function to remove highlighting
            function removeHighlight(element) {
                const question = element.querySelector('.faq-question h3');
                const answer = element.querySelector('.faq-answer p');

                question.innerHTML = question.textContent;
                answer.innerHTML = answer.textContent;
            }

            // Add animation on load
            setTimeout(() => {
                faqItems.forEach((item, index) => {
                    setTimeout(() => {
                        item.style.opacity = '0';
                        item.style.transform = 'translateY(20px)';

                        setTimeout(() => {
                            item.style.transition = 'all 0.5s ease';
                            item.style.opacity = '1';
                            item.style.transform = 'translateY(0)';
                        }, 100);
                    }, index * 150);
                });
            }, 500);
        });
    </script>
</body>

</html>
