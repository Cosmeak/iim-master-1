<script lang="ts">
	import { onMount, onDestroy, getContext, setContext } from 'svelte';
	import Leaflet from 'leaflet';

	export let latLngList: Array<Leaflet.LatLngExpression>;

	let polygon: Leaflet.Polygon | undefined;
	let container: HTMLElement;

	// Get map from parent
	const { getMap }: { getMap: () => Leaflet.Map | undefined } = getContext('map');
	const map = getMap();

	setContext('layer', {
		getLayer: () => polygon
	});

	onMount(() => {
		if (map) {
			polygon = Leaflet.polygon(latLngList).addTo(map);
		}
	});

	onDestroy(() => {
		polygon?.remove();
		polygon = undefined;
	});
</script>

<div bind:this={container}>
	{#if polygon}
		<slot />
	{/if}
</div>
