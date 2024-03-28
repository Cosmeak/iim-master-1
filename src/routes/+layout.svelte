<script>
    import "../app.css";
</script>

<main class="bg-primary-blue flex min-h-screen items-center">
    <!-- Chatbox -->
    <div class="bg-dark-blue min-h-screen w-1/3">
        <h1 class="text-light p-3 text-2xl">Chatbox</h1>
        <div class="m-5 h-[85vh] min-h-96 rounded-lg p-2 shadow-inner">
            <div class="flex h-full flex-col">
                <!-- message envoyé -->
                <div class="m-2 max-w-max self-end rounded-lg bg-blue-500 p-2">
                    <p class="text-sm text-white">Bonjour, comment vas-tu ?</p>
                </div>
                <!-- end message envoyé -->
                <!-- message recu -->
                <div
                    class="relative m-2 max-w-max self-start rounded-lg bg-gray-200 p-2"
                >
                    <p class="text-sm">Je vais bien, merci !</p>
                </div>
                <!-- end message recu -->
            </div>
            <!-- send message -->
            <form class="mt-auto flex items-center justify-between">
                <input
                    type="text"
                    class="w-5/6 rounded-lg border border-gray-300 bg-gray-100 p-2 focus:outline-none"
                    placeholder="Votre message..."
                />
                <button
                    type="submit"
                    class="w-1/6 rounded-lg bg-blue-500 px-4 py-2 text-white hover:cursor-pointer hover:bg-blue-600 focus:outline-none"
                    >Envoyer</button
                >
            </form>
            <!-- End send message -->
        </div>
    </div>
</main>
