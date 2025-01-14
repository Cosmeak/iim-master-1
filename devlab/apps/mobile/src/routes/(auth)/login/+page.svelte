<script lang="ts">
	import Button from '$lib/components/ui/button/button.svelte';
	import * as Card from '$lib/components/ui/card';
	import Input from '$lib/components/ui/input/input.svelte';
	import Label from '$lib/components/ui/label/label.svelte';
</script>

<main class="flex flex-col gap-8 p-4">
	<Card.Root>
		<Card.Header>
			<div class="flex flex-col items-center gap-2">
				<div class="h-20 w-20 rounded-full bg-black" />
				<h1 class="text-2xl">EchoPlann</h1>
			</div>
		</Card.Header>
		<Card.Content>
			<form>
				<div class="grid w-full items-center gap-4">
					<div class="flex flex-col space-y-1.5">
						<Label for="email">Email</Label>
						<Input id="email" type="email" placeholder="myemail@example.fr" />
					</div>
					<div class="flex flex-col space-y-1.5">
						<Label for="password">Mot de passe</Label>
						<Input id="password" type="password" placeholder="Votre mot de passe ici" />
					</div>
				</div>
			</form>
		</Card.Content>
		<Card.Footer>
			<Button type="submit" class="w-full">Se connecter</Button>
		</Card.Footer>
	</Card.Root>

	<hr />

	<Card.Root class="bg-cgreen text-white">
		<Card.Content class="mt-6 flex flex-col gap-4">
			<Button class="w-full bg-white text-black" disabled>🟠 Continuer avec Google</Button>
			<Button class="w-full bg-white text-black" disabled>🟠 Continuer avec Apple</Button>
			<Button class="w-full bg-white text-black" disabled>🟠 Continuer avec Microsoft</Button>
		</Card.Content>
	</Card.Root>
</main>
