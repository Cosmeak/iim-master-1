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
        <div class="flex items-center gap-2 p-2">
            <img src="./logo.png" class="h-12 w-12 rounded-lg" alt="" />
            <h1 class="text-light text-2xl">Chatbox</h1>
        </div>
        <div
            class="mx-4 mb-4 h-[85vh] min-h-96 overflow-y-auto rounded-lg p-2 shadow-inner"
        >
            <div class="flex h-full flex-col">
                {#each chatMessages as message}
                    <div
                        class="relative my-2 max-w-max {message.role == 'user'
                            ? 'ml-24 self-end bg-gray-200'
                            : 'mr-24 self-start bg-blue-500'} rounded-lg p-2"
                    >
                        <p class="text-sm">{message.content}</p>
                    </div>
                {/each}

                {#if answer}
                    <div
                        class="relative mx-2 mr-24 max-w-max self-start rounded-lg bg-blue-500 p-2"
                    >
                        <p class="text-sm">{answer}</p>
                    </div>
                {/if}
                <!-- end message recu -->
            </div>
            <!-- send message -->

            <!-- End send message -->
        </div>
        <form
            class="mx-5 mt-auto flex items-center justify-between"
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
    </div>
</main>
