<script>
	import '../app.css';
	import Header from '$lib/Components/IHeader.svelte';
	import Footer from '$lib/Components/IFooter.svelte';
</script>

<Header />

<main>
  <slot />
</main>

<Footer />
