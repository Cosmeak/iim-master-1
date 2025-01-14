<script>
	import Button from './Ibutton.svelte';
</script>

<header class="w-full bg-white text-center p-4 flex justify-around items-center fixed top-0 z-[900] shadow-sm px-52">
	<img src={'./assets/image 1.png'} alt="ISSY" />
  <nav class="w-full flex justify-center gap-8 items-center">
		<a href="/">Accueil</a>
		<a href="/donnees">Données</a>
		<a href="/actualites">Actualités</a>
		<a href="/outils">Outils</a>
		<a href="/contact">Contact</a>
	</nav>
	<div class="flex gap-4">
		<Button color="white">Connexion</Button>
		<Button color="green">Inscription</Button>
	</div>
</header>

