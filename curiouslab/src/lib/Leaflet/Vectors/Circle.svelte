<script lang="ts">
	import { onMount, onDestroy, getContext, setContext } from 'svelte';
	import Leaflet from 'leaflet';

	export let latLng: Leaflet.LatLngExpression;
	export let radius: number;

	let circle: Leaflet.Circle | undefined;
	let container: HTMLElement;

	// Get map from parent
	const { getMap }: { getMap: () => Leaflet.Map | undefined } = getContext('map');
	const map = getMap();

	setContext('layer', {
		getLayer: () => circle
	});

	onMount(() => {
		if (map) {
			circle = Leaflet.circle(latLng, { radius }).addTo(map);
		}
	});

	onDestroy(() => {
		circle?.remove();
		circle = undefined;
	});
</script>

<div bind:this={container}>
	{#if circle}
		<slot />
	{/if}
</div>
