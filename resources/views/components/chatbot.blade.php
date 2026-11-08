<!-- Floating Chatbot Button & Box -->
<div id="chatbot-container" style="position: fixed; bottom: 20px; right: 20px; z-index: 1000;">
    <!-- Chat Window -->
    <div id="chat-box" class="card shadow" style="display: none; width: 320px; height: 400px;">
        <div class="card-header bg-primary text-white d-flex justify-between align-items-center">
            <span>🤖 Clinic AI Assistant</span>
            <button class="btn-close btn-close-white" onclick="toggleChat()"></button>
        </div>
        <div class="card-body overflow-auto" id="chat-messages" style="height: 290px;">
            <div class="alert alert-secondary p-2 small">
                ආයුබෝවන්! Family Care Clinic AI සහයක වෙත සාදරයෙන් පිළිගනිමු. මගෙන් ඕනෑම ප්‍රශ්නයක් අහන්න.
            </div>
        </div>
        <div class="card-footer p-2">
            <div class="input-group">
                <input type="text" id="chat-input" class="form-control form-control-sm" placeholder="ප්‍රශ්නය ටයිප් කරන්න...">
                <button class="btn btn-primary btn-sm" onclick="sendMessage()">Send</button>
            </div>
        </div>
    </div>

    <!-- Toggle Button -->
    <button class="btn btn-primary rounded-circle shadow" style="width: 50px; height: 50px;" onclick="toggleChat()">
        💬
    </button>
    
</div>

<script>
function toggleChat() {
    const box = document.getElementById('chat-box');
    box.style.display = box.style.display === 'none' ? 'block' : 'none';
}

function sendMessage() {
    const input = document.getElementById('chat-input');
    const message = input.value.trim();
    if (!message) return;

    const messagesBox = document.getElementById('chat-messages');

    // Add User Message
    messagesBox.innerHTML += `<div class="text-end mb-2"><span class="badge bg-primary text-wrap text-start">${message}</span></div>`;
    input.value = '';
    messagesBox.scrollTop = messagesBox.scrollHeight;

    // Fetch API
    fetch('{{ route("chatbot.ask") }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ message: message })
    })
    .then(res => res.json())
    .then(data => {
        messagesBox.innerHTML += `<div class="text-start mb-2"><span class="badge bg-light text-dark border text-wrap text-start">${data.reply}</span></div>`;
        messagesBox.scrollTop = messagesBox.scrollHeight;
    })
    .catch(() => {
        messagesBox.innerHTML += `<div class="text-start mb-2"><span class="badge bg-danger">Error: පිළිතුරු ලබා ගැනීමට නොහැකි විය.</span></div>`;
    });
}
</script>