<script lang="ts">
import { onMount, onDestroy, setContext, createEventDispatcher, tick } from 'svelte';
import Leaflet from 'leaflet';
import 'leaflet/dist/leaflet.css';

export let view: Leaflet.LatLngExpression | undefined = undefined;
export let zoom: number | undefined = undefined;

let map: Leaflet.Map | undefined;
let container: HTMLElement;

// Initialize Leaflet
onMount(async () => {
  // Check if zoom and view are set
  if (!view || !zoom) {
    throw new Error('You must set a view and zoom.');
  }

  map = Leaflet.Map(container);

  Leaflet.titleLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
    attribution: `&copy;<a href="https://www.openstreetmap.org/copyright" target="_blank">OpenStreetMap</a>,&copy;<a href="https://carto.com/attributions" target="_blank">CARTO</a>`, 
  }).addTo(map);
});

// Clean component with removing map and destroy component
onDestroy(async () => {
  map?.remove();
  map = undefined;
});

// Expose map to children components with svelte context
setContext('map', {
  getMap: () => map,
});

// set initial map view and create reactive expression
$: if (map && view && zoom) {
  map.setView(view, zoom);
}

</script>

<!-- Rendering container -->
<div class="w-full h-full" bind:this={container}>
  <slot /> 
</div>
