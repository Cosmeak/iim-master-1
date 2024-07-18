<script>
	import '../app.css';
	import { onMount } from 'svelte';
	import { SafeArea } from '@capacitor-community/safe-area';

	onMount(() => {
		SafeArea.enable({
			config: {
				customColorsForSystemBars: true,
				statusBarColor: '#ffffff',
				statusBarContent: 'light',
				navigationBarColor: '#000000',
				navigationBarContent: 'light'
			}
		});
	});
</script>

<slot></slot>

<style></style>
