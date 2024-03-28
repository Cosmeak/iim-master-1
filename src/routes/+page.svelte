<script>
    import { SSE } from "sse.js";

    let query = "";
    let answer = "";
    let loading = false;
    let chatMessages = [];
    let scrollToDiv;

    const handleForm = async (request) => {
        console.log(request)
        if (request === 'one') {
            chatMessages = 'Dans cet univers, les joueurs incarnent des chasseurs de monstres professionnels, appartenant à une organisation dédiée à la protection des royaumes contre les créatures dangereuses qui rôdent. Les terres sont peuplées de bêtes monstrueuses de toutes sortes, certaines émergeant de portails interdimensionnels. Les villes fortifiées sont les refuges des survivants, et les chasseurs sont vénérés comme des héros. Les quêtes peuvent impliquer la traque de dragons, l\'éradication de meutes de loups-garous ou la protection des villages contre des raids de gobelins. L\'intrigue pourrait se concentrer sur la découverte de la source de cette invasion de créatures, peut-être liée à un culte ancien ou à un puissant artefact.'
        }
        if (request === 'two') {
            chatMessages = 'Autrefois prospères et magnifiques, les Royaumes Déchus ont été ravagés par une calamité mystérieuse. Les villes sont en ruines, les terres sont infestées de monstres et la magie est imprévisible. Les joueurs pourraient incarner des aventuriers cherchant à lever la malédiction qui pèse sur ces terres dévastées. Leur quête pourrait les mener à explorer d\'anciennes cités souterraines, à affronter des créatures corrompues par la magie chaotique, ou à négocier avec des factions rivales désireuses de prendre le contrôle des derniers vestiges de pouvoir.'
        }
        if (request === 'three') {
            chatMessages = 'Les dieux ont abandonné leurs fidèles, laissant les mortels se débrouiller seuls. Les démons et les ténèbres menacent de submerger le monde. Les joueurs pourraient jouer le rôle de héros improbables, choisis par une force mystérieuse pour restaurer la foi et l\'espoir parmi les peuples. Leur quête pourrait les emmener dans des donjons anciens, à la recherche d\'artefacts divins perdus, ou à affronter des cultistes déments qui tentent de réveiller des puissances démoniaques. L\'intrigue pourrait également impliquer des choix moraux difficiles, alors que les joueurs doivent décider s\'ils sont prêts à sacrifier leur humanité pour sauver le monde.'
        }
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
            payload: JSON.stringify({ messages: "Hello" }),
        });

        chatStreamResponse.addEventListener("message", (event) => {
            loading = false;
            answer += event.source.chunk;
        });

        window.location.href='http://localhost:5173/adventure'
    };
</script>

<main class="bg-primary-blue min-h-screen items-center">
    <h1 class="text-light p-3 text-2xl">Adventure Choices</h1>
    <div>

        <form
                class="mt-auto flex items-center justify-between"
                on:submit|preventDefault={() => handleForm('one')}
        >
            <button
                    type="submit"
                    class="w-1/6 rounded-lg bg-blue-500 py-2 px-4 text-white hover:cursor-pointer hover:bg-blue-600 focus:outline-none"
            >Aventure 1 : L'Âge des Chasseurs</button
            >
        </form>


        <form
                class="mt-auto flex items-center justify-between"
                on:submit|preventDefault={() => handleForm()}
        >
            <button
                    type="submit"
                    class="w-1/6 rounded-lg bg-blue-500 py-2 px-4 text-white hover:cursor-pointer hover:bg-blue-600 focus:outline-none"
            >Aventure 2 : Les Royaumes Déchus</button
            >
        </form>


        <form
                class="mt-auto flex items-center justify-between"
                on:submit|preventDefault={() => handleForm()}
        >
            <button
                    type="submit"
                    class="w-1/6 rounded-lg bg-blue-500 py-2 px-4 text-white hover:cursor-pointer hover:bg-blue-600 focus:outline-none"
            >Aventure 3 : Le Crépuscule des Dieux</button
            >
        </form>
    </div>
</main>
