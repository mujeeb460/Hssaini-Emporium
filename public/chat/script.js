// DOM Elements
const chatIcon = document.getElementById('chatIcon');
const chatContainer = document.getElementById('chatContainer');
const minimizeBtn = document.getElementById('minimizeBtn');
const chatMessages = document.getElementById('chatMessages');
const userInput = document.getElementById('userInput');
const sendBtn = document.getElementById('sendBtn');
const suggestions = document.getElementById('suggestions');

// API endpoints
const API_BASE_URL = '//bot.hussainiemporium.com/api';
const WELCOME_ENDPOINT = `${API_BASE_URL}/welcome/`;
const CHAT_ENDPOINT = `${API_BASE_URL}/chat/`;
const RESPONSE_ENDPOINT = `${API_BASE_URL}/response/`;

// Chat state
let isChatOpen = false;

// Event Listeners
chatIcon.addEventListener('click', toggleChat);
minimizeBtn.addEventListener('click', toggleChat);
sendBtn.addEventListener('click', sendMessage);
userInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        sendMessage();
    }
});

// Toggle chat window
function toggleChat() {
    isChatOpen = !isChatOpen;
    chatContainer.classList.toggle('active');
    
    if (isChatOpen && chatMessages.children.length === 0) {
        getWelcomeMessage();
    }
}

// Get welcome message
async function getWelcomeMessage() {
    try {
        const response = await fetch(WELCOME_ENDPOINT);
        const data = await response.json();
        addMessage(data.welcome_message, 'bot');
        // if (data.suggestions) {
        //     showSuggestions(data.suggestions);
        // }
        if (data.questions && data.questions.length > 0) {
            showSuggestions(data.questions.map(q => q.short_text));
        }
    } catch (error) {
        console.error('Error fetching welcome message:', error);
        addMessage('Hello! How can I help you today?', 'bot');
    }
}

// Send message to backend
async function sendMessage() {
    const message = userInput.value.trim();
    if (!message) return;

    // Add user message to chat
    addMessage(message, 'user');
    userInput.value = '';

    try {
        const response = await fetch(CHAT_ENDPOINT, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ message: message }),
        });
        const data = await response.json();
        addMessage(data.response, 'bot');
        if (data.suggestions) {
            showSuggestions(data.suggestions);
        }
    } catch (error) {
        console.error('Error sending message:', error);
        addMessage('Sorry, there was an error processing your message.', 'bot');
    }
}

// Add message to chat window
function addMessage(text, sender) {
    const messageDiv = document.createElement('div');
    messageDiv.classList.add('message', `${sender}-message`);
    messageDiv.textContent = text;
    chatMessages.appendChild(messageDiv);
    chatMessages.scrollTop = chatMessages.scrollHeight;
}

// Show suggestion chips
function showSuggestions(suggestionList) {
    suggestions.innerHTML = '';
    if (suggestionList && suggestionList.length > 0) {
        suggestionList.forEach(suggestion => {
            const chip = document.createElement('div');
            chip.classList.add('suggestion-chip');
            chip.textContent = suggestion;
            chip.addEventListener('click', () => {
                userInput.value = suggestion;
                sendMessage();
            });
            suggestions.appendChild(chip);
        });
    }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    // If you want the chat to be open by default, uncomment the next line
    // toggleChat();
});
