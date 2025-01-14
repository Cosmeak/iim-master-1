<script lang="ts">
	import { Menu, Clock, ListStart, CircleX, Plus } from 'lucide-svelte';
	import Badge from '$lib/components/ui/badge/badge.svelte';
	import * as Card from '$lib/components/ui/card';
	import { Input } from '$lib/components/ui/input';
	import * as Sheet from '$lib/components/ui/sheet';
	import { Button } from '$lib/components/ui/button';
	import * as RadioGroup from '$lib/components/ui/radio-group';
	import { Label } from '$lib/components/ui/label';
</script>

<div class="sticky top-0 flex items-center justify-between bg-card p-4 shadow-sm">
	<div class="flex items-center">
		<Sheet.Root>
			<Sheet.Trigger asChild let:builder>
				<Button builders={[builder]} variant="ghost" class="w-fit"><Menu size={28} /></Button>
			</Sheet.Trigger>
			<Sheet.Content side="left">
				<Sheet.Header class="mb-2">
					<Sheet.Close asChild let:builder>
						<Button builders={[builder]} variant="ghost" class="w-fit p-0">
							<CircleX size={32} strokeWidth={1} />
						</Button>
					</Sheet.Close>
				</Sheet.Header>

				<Card.Root class="bg-cgreen text-secondary">
					<Card.Header class="pb-2">Affichage</Card.Header>
					<Card.Content>
						<div class="w-100 flex gap-2">
							<Button class="h-auto w-full  flex-col items-center gap-1 p-1" variant="secondary">
								<Clock />
								<span>Chronologique</span>
							</Button>
							<Button class="h-auto w-full flex-col items-center gap-1 p-1" variant="secondary">
								<ListStart />
								<span>Priorité</span>
							</Button>
						</div>

						<RadioGroup.Root
							value="both"
							class="mt-2 rounded-lg bg-secondary p-2 text-secondary-foreground"
						>
							<div class="flex items-center space-x-2">
								<RadioGroup.Item value="no_date" id="r1" />
								<Label for="r1">Sans date</Label>
							</div>
							<div class="flex items-center space-x-2">
								<RadioGroup.Item value="both" id="r2" />
								<Label for="r2">Les deux</Label>
							</div>
							<div class="flex items-center space-x-2">
								<RadioGroup.Item value="date" id="r3" />
								<Label for="r3">Avec Date</Label>
							</div>
						</RadioGroup.Root>
					</Card.Content>
				</Card.Root>

				<Card.Root class="mt-4">
					<Card.Header class="pb-2">Filtres</Card.Header>
					<Card.Content></Card.Content>
				</Card.Root>

				<Card.Root class="mt-4">
					<Card.Header class="pb-2">Tags</Card.Header>
					<Card.Content>
						<Input id="searchTags" name="searchTags" placeholder="Rechercher des tags..." />
						<div class="mt-4 flex flex-wrap gap-2">
							<Badge>Tag</Badge>
							<Badge>Tag</Badge>
							<Badge>Tag</Badge>
							<Badge>Tag</Badge>
							<Badge>Tag</Badge>
							<Badge>Tag</Badge>
						</div>
					</Card.Content>
				</Card.Root>
			</Sheet.Content>
		</Sheet.Root>
		<h1 class="text-2xl">Todo list</h1>
	</div>
	<div class="h-12 w-12 rounded-full bg-black" />
</div>

<div class="m-4 mt-6">
	<Card.Root class="w-full bg-cgreen">
		<Card.Content class="flex w-full gap-4 p-4">
			<Input id="search" name="search" class="bg-white" placeholder="Rechercher..." />
			<Button variant="secondary"><Plus size={24} /></Button>
		</Card.Content>
	</Card.Root>
</div>

<div class="mx-4 mt-6">
	<div class="flex w-full flex-col items-center gap-4">
		<Card.Root class="w-full border-2 border-green-500">
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

		<Card.Root class=" w-full">
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

		<Card.Root class=" w-full">
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

		<Card.Root class=" w-full border-2 border-green-500">
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

		<Card.Root class=" w-full">
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

		<Card.Root class=" w-full">
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

		<Card.Root class=" w-full">
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

		<Card.Root class=" w-full">
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
