<script lang="ts">
	import { onMount, onDestroy, getContext, setContext } from 'svelte';
	import Leaflet from 'leaflet';

	export let width: number;
	export let height: number;
	export let latLng: Leaflet.LatLngExpression;

	let marker: Leaflet.Marker | undefined;
	let container: HTMLElement;

	// Get map from parent
	const { getMap }: { getMap: () => Leaflet.Map | undefined } = getContext('map');
	const map = getMap();

	setContext('layer', {
		// Leaflet Marker is a child class from Leaflet Layer
		getLayer: () => marker
	});

	onMount(() => {
		if (map) {
			// const icon = Leaflet.divIcon({
			// 	html: container,
			// 	className: 'fa-solid fa-location-pin',
			// 	iconSize: Leaflet.point(width, height)
			// });
			// marker = Leaflet.marker(latLng, { icon }).addTo(map);
			marker = Leaflet.marker(latLng).addTo(map);
		}
	});

	onDestroy(() => {
		// Clear marker from client
		marker?.remove();
		marker = undefined;
	});
</script>

<div bind:this={container}>
	{#if marker}
		<slot />
	{/if}
</div>
