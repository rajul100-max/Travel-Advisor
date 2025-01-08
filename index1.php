<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ Section - Travel Advisor</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f8ff;
        }
        header {
            background-color: #28a745; /* Green header */
            color: #fff;
            padding: 15px 20px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        header a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            margin-right: 15px;
        }
        .faq-container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .faq {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .faq h3 {
            margin: 0 0 10px;
        }
        .faq-form {
            margin-top: 20px;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
        }
        .faq-form label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }
        .faq-form input, .faq-form textarea {
            width: calc(100% - 22px); /* To account for padding and border */
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            display: block;
        }
        .faq-form textarea {
            resize: none;
        }
        .faq-form button {
            padding: 10px 15px;
            background-color: #5cb85c;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <a href="home.php">Home</a>
        <h1>Travel Advisor</h1>
    </header>

    <div class="faq-container">
        <h2>FAQs</h2>
        <div id="faq-list"></div>

        <div class="faq-form">
            <h3>Add a Question</h3>
            <label for="question">Question</label>
            <input type="text" id="question" placeholder="Enter your question" />
            <label for="answer">Answer</label>
            <textarea id="answer" rows="5" placeholder="Enter your answer"></textarea>
            <button onclick="addFAQ()">Submit</button>
        </div>
    </div>

    <script>
        // Fetch FAQs
        function fetchFAQs() {
            fetch('fetch_faqs.php')
                .then(response => response.json())
                .then(data => {
                    const faqList = document.getElementById('faq-list');
                    faqList.innerHTML = '';
                    data.forEach(faq => {
                        const faqDiv = document.createElement('div');
                        faqDiv.classList.add('faq');
                        faqDiv.innerHTML = `
                            <h3>${faq.question}</h3>
                            <p>${faq.answer}</p>
                        `;
                        faqList.appendChild(faqDiv);
                    });
                });
        }

        
        function addFAQ() {
            const question = document.getElementById('question').value;
            const answer = document.getElementById('answer').value;

            if (question && answer) {
                const formData = new FormData();
                formData.append('question', question);
                formData.append('answer', answer);

                fetch('add_faq.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        fetchFAQs(); 
                        document.getElementById('question').value = '';
                        document.getElementById('answer').value = '';
                    } else {
                        alert('Error adding FAQ');
                    }
                });
            } else {
                alert('Please fill in both fields!');
            }
        }

        
        fetchFAQs();
        setInterval(fetchFAQs, 5000); 
    </script>
</body>
</html>
