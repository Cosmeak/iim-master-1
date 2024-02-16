<script>
	import '../app.css';
	import Header from '$lib/Components/IHeader.svelte';
	import Footer from '$lib/Components/IFooter.svelte';
</script>

<main class="max-w-screen-2xl mx-auto">
	<Header />
	<slot />
	<Footer />
</main>
