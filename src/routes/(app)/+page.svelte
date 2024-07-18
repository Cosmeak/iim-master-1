<script lang="ts">
	import Badge from '$lib/components/ui/badge/badge.svelte';
	import * as Card from '$lib/components/ui/card';
</script>

<div class="m-4 flex items-center justify-between">
	<h1 class="text-2xl">Tâches du jour</h1>
	<div class="h-12 w-12 rounded-full bg-black" />
</div>

<Card.Root class="m-4 mt-6 bg-cgreen pt-4 text-white">
	<Card.Content class="text-center">
		<div class="rounded-full border-4 border-white p-2">
			<p class="text-4xl font-semibold">50%</p>
			<p>des tâches d’aujourd’hui terminées</p>
		</div>
	</Card.Content>
</Card.Root>

<div class="m-4 mt-6">
	<h2 class="text-2xl font-bold">Tâches en cours</h2>
	<div class="flex w-full flex-col items-center">
		<Card.Root class="mt-4 w-full">
			<Card.Header class="flex flex-row items-center justify-between pb-1">
				<p class="font-semibold">Lorem Ipsum</p>
				<p class="text-sm text-muted-foreground">De 10h à 11h (1h)</p>
			</Card.Header>
			<Card.Content>
				<p class="line-clamp-2">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
				</p>
				<div class="mt-2">
					<Badge>Tag</Badge>
					<Badge>Tag</Badge>
					<Badge>Tag</Badge>
				</div>
			</Card.Content>
		</Card.Root>

		<Card.Root class="mt-4 w-full">
			<Card.Header class="flex flex-row items-center justify-between pb-1">
				<p class="font-semibold">Lorem Ipsum</p>
				<p class="text-sm text-muted-foreground">De 10h à 11h (1h)</p>
			</Card.Header>
			<Card.Content>
				<p class="line-clamp-2">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
				</p>
				<div class="mt-2">
					<Badge>Tag</Badge>
					<Badge>Tag</Badge>
					<Badge>Tag</Badge>
				</div>
			</Card.Content>
		</Card.Root>

		<Card.Root class="mt-4 w-full">
			<Card.Header class="flex flex-row items-center justify-between pb-1">
				<p class="font-semibold">Lorem Ipsum</p>
				<p class="text-sm text-muted-foreground">De 10h à 11h (1h)</p>
			</Card.Header>
			<Card.Content>
				<p class="line-clamp-2">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
				</p>
				<div class="mt-2">
					<Badge>Tag</Badge>
					<Badge>Tag</Badge>
					<Badge>Tag</Badge>
				</div>
			</Card.Content>
		</Card.Root>

		<Card.Root class="mt-4 w-full">
			<Card.Header class="flex flex-row items-center justify-between pb-1">
				<p class="font-semibold">Lorem Ipsum</p>
				<p class="text-sm text-muted-foreground">De 10h à 11h (1h)</p>
			</Card.Header>
			<Card.Content>
				<p class="line-clamp-2">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
				</p>
				<div class="mt-2">
					<Badge>Tag</Badge>
					<Badge>Tag</Badge>
					<Badge>Tag</Badge>
				</div>
			</Card.Content>
		</Card.Root>

		<Card.Root class="mt-4 w-full">
			<Card.Header class="flex flex-row items-center justify-between pb-1">
				<p class="font-semibold">Lorem Ipsum</p>
				<p class="text-sm text-muted-foreground">De 10h à 11h (1h)</p>
			</Card.Header>
			<Card.Content>
				<p class="line-clamp-2">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
				</p>
				<div class="mt-2">
					<Badge>Tag</Badge>
					<Badge>Tag</Badge>
					<Badge>Tag</Badge>
				</div>
			</Card.Content>
		</Card.Root>
	</div>
</div>

<div class="m-4 mt-6">
	<h2 class="text-2xl font-bold">Tâches terminées</h2>
	<div class="flex w-full flex-col items-center">
		<Card.Root class="mt-4 w-full border-2 border-green-500">
			<Card.Header class="flex flex-row items-center justify-between pb-1">
				<p class="font-semibold">Lorem Ipsum</p>
				<p class="text-sm text-muted-foreground">De 10h à 11h (1h)</p>
			</Card.Header>
			<Card.Content>
				<p class="line-clamp-2">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
				</p>
				<div class="mt-2">
					<Badge>Tag</Badge>
					<Badge>Tag</Badge>
					<Badge>Tag</Badge>
				</div>
			</Card.Content>
		</Card.Root>

		<Card.Root class="mt-4 w-full border-2 border-green-500">
			<Card.Header class="flex flex-row items-center justify-between pb-1">
				<p class="font-semibold">Lorem Ipsum</p>
				<p class="text-sm text-muted-foreground">De 10h à 11h (1h)</p>
			</Card.Header>
			<Card.Content>
				<p class="line-clamp-2">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
				</p>
				<div class="mt-2">
					<Badge>Tag</Badge>
					<Badge>Tag</Badge>
					<Badge>Tag</Badge>
				</div>
			</Card.Content>
		</Card.Root>
	</div>
</div>
