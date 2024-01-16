<script lang="ts">
import type { LatLngExpression } from "leaflet";
import Map from "$lib/Leaflet/Map.svelte";

const initialView: LatLngExpression = [48.890577, 2.241656];
const initialZoom: number = 13;
</script>

<div class="w-full h-screen">
  <Map view={initialView} zoom={initialZoom} />
</div>
