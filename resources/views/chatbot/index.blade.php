@extends('layouts.app')

@section('content')
<!-- Bootstrap CSS CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">🤖 Family Care Clinic - AI Assistant</h5>
                </div>
                <div class="card-body overflow-auto" id="chat-messages" style="height: 420px; background-color: #f8f9fa;">
                    <div class="alert alert-secondary p-3 mb-3">
                        <strong>ආයුබෝවන්!</strong> Family Care Clinic AI සහයක වෙත සාදරයෙන් පිළිගනිමු. ඔබගේ සෞඛ්‍ය ගැටලු හෝ Clinic එක පිළිබඳ ඕනෑම ප්‍රශ්නයක් සිංහලෙන් අහන්න.
                    </div>
                </div>
                <div class="card-footer p-3 bg-white">
                    <div class="input-group">
                        <input type="text" id="chat-input" class="form-control" placeholder="ඔබගේ ප්‍රශ්නය මෙතන ටයිප් කරන්න..." onkeypress="if(event.key === 'Enter') sendMessage()">
                        <button class="btn btn-primary px-4" onclick="sendMessage()">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function sendMessage() {
    const input = document.getElementById('chat-input');
    const message = input.value.trim();
    if (!message) return;

    const messagesBox = document.getElementById('chat-messages');

    // User message එක පෙන්වීම
    messagesBox.innerHTML += `
        <div class="d-flex justify-content-end mb-3">
            <div class="p-3 bg-primary text-white rounded-3 shadow-sm" style="max-width: 80%;">
                ${message}
            </div>
        </div>`;
    input.value = '';
    messagesBox.scrollTop = messagesBox.scrollHeight;

    // AI API එකට Request එක යැවීම
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
        messagesBox.innerHTML += `
            <div class="d-flex justify-content-start mb-3">
                <div class="p-3 bg-white border shadow-sm rounded-3 text-dark" style="max-width: 80%;">
                    ${data.reply}
                </div>
            </div>`;
        messagesBox.scrollTop = messagesBox.scrollHeight;
    })
    .catch(() => {
        messagesBox.innerHTML += `
            <div class="d-flex justify-content-start mb-3">
                <div class="p-2 bg-danger text-white rounded-3">
                    Error: පිළිතුරු ලබා ගැනීමට නොහැකි විය.
                </div>
            </div>`;
    });
}
</script>
@endsection