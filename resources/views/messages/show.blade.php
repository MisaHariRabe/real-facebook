<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Messagerie') }}
        </h2>
    </x-slot>

    <div class="flex h-[80vh]">
        <aside class="w-1/4 border-r dark:border-gray-500 overflow-y-auto dark:bg-gray-800 dark:text-white bg-white">
            <h3 class="p-4 text-lg font-semibold border-b dark:border-gray-500">Discussions</h3>
            <ul>
                @foreach ($users as $user)
                    <li>
                        <a href="{{ route('messages.show', $user->id) }}"
                            class="flex flex-row gap-2 px-4 py-3 hover:bg-blue-100 dark:hover:bg-gray-500 transition
                            {{ $userId == $user->id ? 'bg-blue-200 dark:bg-gray-600 font-semibold' : '' }}">
                            <x-avatar src="{{ $user->profile_photo }}" alt="{{ $user->username }}" />
                            {{ $user->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </aside>

        <div class="w-3/4 p-4 flex flex-col justify-between">
            <div id="messages-container" class="flex-1 overflow-y-auto space-y-2 mb-4">
                @foreach ($messages as $message)
                    <div class="flex {{ $message->sender_id === auth()->id() ? 'justify-end' : 'justify-start' }}">
                        <div
                            class="px-4 py-2 rounded-lg max-w-xs
                            {{ $message->sender_id === auth()->id() ? 'bg-blue-500 text-white' : 'bg-gray-200 text-black' }}">
                            <p class="text-sm">{{ $message->content }}</p>
                            <p class="text-xs text-right mt-1">{{ $message->created_at->format('H:i') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <form id="message-form" action="{{ route('messages.store') }}" method="POST"
                class="flex gap-2 items-center">
                @csrf
                <input type="hidden" name="receiver_id" value="{{ $userId }}">
                <textarea id="message-input" name="content" rows="2" placeholder="Écris un message..."
                    class="flex-1 border rounded px-3 py-2 resize-none" required></textarea>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Envoyer
                </button>
            </form>
        </div>
    </div>
</x-app-layout>

<script>
    const displayedMessages = new Set();
    const messagesContainer = document.getElementById('messages-container');
    const userId = {{ $userId }};
    const form = document.getElementById("message-form");
    const messageInput = document.getElementById("message-input");

    form.addEventListener("submit", async function(e) {
        e.preventDefault();

        const formData = new FormData(form);
        const messageContent = messageInput.value.trim();

        if (!messageContent) return;

        try {
            const response = await fetch(form.action, {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'),
                },
                body: formData
            });

            if (!response.ok) {
                throw new Error('Erreur lors de l’envoi du message');
            }

            const newMessage = await response.json();

            messageInput.value = '';

            // const wrapperClass = 'justify-end';
            // const bubbleClass = 'bg-blue-500 text-white';

            // const messageHTML = `
            //     <div class="flex ${wrapperClass}">
            //         <div class="px-4 py-2 rounded-lg max-w-xs ${bubbleClass}">
            //             <p class="text-sm">${messageContent}</p>
            //             <p class="text-xs text-right mt-1">${new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</p>
            //         </div>
            //     </div>
            // `;
            // messagesContainer.innerHTML += messageHTML;

            messagesContainer.scrollTop = messagesContainer.scrollHeight;
        } catch (error) {
            console.error('Erreur AJAX:', error);
        }
    })

    const isScrolledToBottom = () => {
        return messagesContainer.scrollHeight - messagesContainer.clientHeight <= messagesContainer.scrollTop + 5;
    };

    async function fetchMessages() {
        try {
            const response = await fetch(`/messages/fetch/${userId}`);
            const messages = await response.json();

            const shouldScroll = isScrolledToBottom();

            messages.forEach(message => {
                if (displayedMessages.has(message.id)) return;

                displayedMessages.add(message.id);

                const isCurrentUser = message.sender_id === {{ auth()->id() }};
                const wrapperClass = isCurrentUser ? 'justify-end' : 'justify-start';
                const bubbleClass = isCurrentUser ?
                    'bg-blue-500 text-white' :
                    'bg-gray-200 text-black';

                const messageHTML = `
                    <div class="flex ${wrapperClass}">
                        <div class="px-4 py-2 rounded-lg max-w-xs ${bubbleClass}">
                            <p class="text-sm">${message.content}</p>
                            <p class="text-xs text-right mt-1">${new Date(message.created_at).toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'})}</p>
                        </div>
                    </div>
                `;
                messagesContainer.innerHTML += messageHTML;
            });

            if (shouldScroll) {
                messagesContainer.scrollTop = messagesContainer.scrollHeight;
            }
        } catch (error) {
            console.error('Erreur lors du fetch des messages:', error);
        }
    }

    fetchMessages();
    setInterval(fetchMessages, 2000);
</script>
