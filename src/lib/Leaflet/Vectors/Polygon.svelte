<script lang="ts">
	import { onMount, onDestroy, getContext, setContext } from 'svelte';
	import Leaflet from 'leaflet';

	export let latLngList: Array<Leaflet.LatLngExpression>;
	export let stroke: boolean = true;
	export let color: string = 'blue';
	export let weight: number = 3;

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
			console.log(map);
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
