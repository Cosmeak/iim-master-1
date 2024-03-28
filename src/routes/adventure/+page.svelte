<script>
    import { SSE } from "sse.js";

    let query = "";
    let answer = "";
    let loading = false;
    let chatMessages = [];
    let scrollToDiv;

    const handleForm = async () => {
        loading = true;
        if (answer !== "") {
            chatMessages = [
                ...chatMessages,
                { role: "assistant", content: answer },
                { role: "user", content: query },
            ];
            answer = "";
        } else {
            chatMessages = [...chatMessages, { role: "user", content: query }];
        }
        query = "";

        const chatStreamResponse = new SSE("/api/chat", {
            headers: {
                "Content-Type": "application/json",
            },
            payload: JSON.stringify({ messages: chatMessages }),
        });

        chatStreamResponse.addEventListener("message", (event) => {
            loading = false;
            answer += event.source.chunk;
        });
    };
</script>

<main class="bg-primary-blue flex min-h-screen items-center">
    <!-- Chatbox -->
    <div class="bg-dark-blue min-h-screen w-1/3">
        <h1 class="text-light p-3 text-2xl">Chatbox</h1>
        <div class="m-5 h-[85vh] min-h-96 rounded-lg p-2 shadow-inner">
            <div class="flex h-full flex-col">
                {#each chatMessages as message}
                    <div
                        class="relative m-2 max-w-max {message.role == 'user'
                            ? 'self-end bg-gray-200'
                            : 'self-start bg-blue-500'} rounded-lg p-2"
                    >
                        <p class="text-sm">{message.content}</p>
                    </div>
                {/each}

                {#if answer}
                    <div
                        class="relative m-2 max-w-max self-start rounded-lg bg-blue-500 p-2"
                    >
                        <p class="text-sm">{answer}</p>
                    </div>
                {/if}
                <!-- end message recu -->
            </div>
            <!-- send message -->
            <form
                class="mt-auto flex items-center justify-between"
                on:submit|preventDefault={() => handleForm()}
            >
                <input
                    bind:value={query}
                    type="text"
                    class="w-5/6 rounded-lg border border-gray-300 bg-gray-100 p-2 focus:outline-none"
                    placeholder="Votre message..."
                />
                <button
                    type="submit"
                    class="w-1/6 rounded-lg bg-blue-500 py-2 px-4 text-white hover:cursor-pointer hover:bg-blue-600 focus:outline-none"
                    >Envoyer</button
                >
            </form>
            <!-- End send message -->
        </div>
    </div>
</main>
