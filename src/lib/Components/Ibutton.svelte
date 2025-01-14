<script lang="ts">
export let color: string = "green";

const colors = {
	"black": "bg-black text-white hover:bg-black-dark",
	"white": "bg-white text-black hover:bg-white-dark",
	"lightgray": "bg-lightgray hover:bg-lightgray-dark",
	"blue": "bg-blue text-white hover:bg-blue-dark",
	"yellow": "bg-yellow hover:bg-yellow-dark",
	"green": "bg-green text-white hover:bg-green-dark",
	"red": "bg-red hover:bg-red-dark"
};
</script>

<button 
	type={$$props.type}
	class={$$props.class + ` shadow-sm px-4 py-1 rounded duration-200 ` + colors[color] }
>	
	<slot />
</button>
