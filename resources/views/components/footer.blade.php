<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo text-center">
                        <a href="./index.html"><img src="{{ asset('frontend/img/logo.png') }}" alt=""
                                width="70%"></a>
                    </div>
                    <ul>
                        <li>Address: Road Shaheed-e-Millat Rd, Phase 2 Defence View Housing Society, Karachi, Karachi City, Sindh 75500</li>
                        <li>Phone: +92 334 219 1443</li>
                        <li>Email: info@hussainiemporium.pk</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Useful Links</h6>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ Route('shop') }}">Shop</a></li>
                        <li><a href="{{ Route('contactus') }}">Contact us</a></li>
                        <li><a href="{{ Route('myorder') }}">My Orders</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Join Our Newsletter Now</h6>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="{{ route('subscribe_newsletter') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="text" placeholder="Enter your mail" name="email">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;
                            2024 All rights reserved | Developed by Iqra University Students
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>

    .chat-icon {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 50px;
        height: 50px;
        background-color: #454545;
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        z-index: 1000;
    }
    .chat-icon
    {
        font-size: 25px;
    }

    .chat-popup {
        position: fixed;
        bottom: 80px;
        right: 20px;
        width: 300px;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        display: none;
        z-index: 1000;
    }

    .chat-popup-header {
        background-color: #454545;
        color: #fff;
        padding: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        text-align: center;
    }

    .chat-popup-body {
        padding: 10px;
        overflow-y: auto;
    }

    .chat-popup-footer {
        padding: 10px;
        border-top: 1px solid #ccc;
    }
</style>
<link rel="stylesheet" href="{{ asset('chat/styles.css') }}">
<div class="chat-icon" id="chatIcon">
    <i class="fa fa-comments"></i>
</div>

<!-- Chat Popup -->
<div class="chat-container" id="chatContainer">
    <div class="chat-header">
        <h5 class="text-white">Support Chat</h5>
        <button class="minimize-btn" id="minimizeBtn">
            <i class="fa fa-minus"></i>
        </button>
    </div>
    <div class="chat-messages" id="chatMessages">
        <!-- Messages will be added here dynamically -->
    </div>
    <div class="suggestions" id="suggestions">
        <!-- Suggestions will be added here dynamically -->
    </div>
    <div class="chat-input">
        <input type="text" id="userInput" placeholder="Type your message...">
        <button id="sendBtn">
            <i class="fa fa-paper-plane"></i>
        </button>
    </div>
</div>

<script src="{{ asset('chat/script.js') }}"></script>

<script>
    const chatIcon = document.getElementById('chatIcon');
    const chatPopup = document.getElementById('chatPopup');

    chatIcon.addEventListener('click', () => {
        chatPopup.style.display = chatPopup.style.display === 'block' ? 'none' : 'block';
    });

</script>
