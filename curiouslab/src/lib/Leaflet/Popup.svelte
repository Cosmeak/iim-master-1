<script lang="ts">
	import { onMount, onDestroy, getContext } from 'svelte';
	import Leaflet from 'leaflet';

	let popup: Leaflet.Popup | undefined;
	let container: HTMLElement;
	let isOpen = false;

	const { getLayer }: { getLayer: () => Leaflet.Layer | undefined } = getContext('layer');
	const layer = getLayer();

	onMount(() => {
		// Initialize Leaflet Popup
		popup = Leaflet.popup().setContent(container);

		//Check Layer existance before create event observator
		if (layer) {
			layer.bindPopup(popup);
			layer.on('popupopen', () => (isOpen = true));
			layer.on('popupclose', () => (isOpen = false));
		}
	});

	onDestroy(() => {
		layer?.unbindPopup();
		popup?.remove();
		popup = undefined;
	});
</script>

<div bind:this={container}>
	{#if popup}
		<slot />
	{/if}
</div>
