<script>
	import { onMount } from 'svelte';
	import { Menu, Clock, ListStart, CircleX } from 'lucide-svelte';
	import Badge from '$lib/components/ui/badge/badge.svelte';
	import * as Card from '$lib/components/ui/card';
	import { Input } from '$lib/components/ui/input';
	import * as Sheet from '$lib/components/ui/sheet';
	import { Button } from '$lib/components/ui/button';
	import * as RadioGroup from '$lib/components/ui/radio-group';
	import { Label } from '$lib/components/ui/label';

	onMount(() => {
		const d = new Date();
		document.querySelector('.dayview-now-marker').style.top =
			(document.querySelector('.dayview-gridcell-container').getBoundingClientRect().height / 24) *
				(d.getHours() + d.getMinutes() / 60) +
			'px';
	});
</script>

<div class="sticky top-0 z-50 flex items-center justify-between bg-card p-4 shadow-sm">
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
		<h1 class="text-2xl">Calendrier</h1>
	</div>
	<div class="h-12 w-12 rounded-full bg-black" />
</div>

<div class="dayview-container mt-4">
	<div class="dayview-timestrings-container">
		<div class="dayview-timestrings">
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">00:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">01:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">02:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">03:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">04:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">05:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">06:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">07:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">08:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">09:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">10:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">11:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">12:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">13:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">14:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">15:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">16:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">17:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">18:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">19:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">20:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">21:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">22:00</div>
			</div>
			<div class="dayview-timestring-container">
				<div class="dayview-timestring">23:00</div>
			</div>
		</div>
	</div>
	<div class="dayview-grid-container">
		<div class="dayview-grid">
			<div class="dayview-grid-tiles">
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
				<div class="dayview-grid-tile"></div>
			</div>
			<div class="dayview-now-marker"></div>
			<div class="dayview-grid-marker-start"></div>
			<div class="dayview-gridcell-container">
				<div class="dayview-gridcell">
					<div class="dayview-cell" style="grid-row: 40 / 45;">
						<div class="dayview-cell-title">Révision: SI</div>
						<div class="dayview-cell-time">09:45-11:00</div>
						<div class="dayview-cell-desc">Description</div>
					</div>
					<div class="dayview-cell" style="grid-row: 46 / 50;">
						<div class="dayview-cell-title">Révision: Anglais</div>
						<div class="dayview-cell-time">11:15-12:15</div>
						<div class="dayview-cell-desc">Description</div>
					</div>
				</div>
			</div>
			<div class="dayview-grid-marker-end"></div>
		</div>
	</div>
</div>

<style>
	.dayview-container {
		position: relative;
		display: flex;
		overflow: hidden;
		align-items: stretch;
		flex: 1 1 auto;
	}
	.dayview-timestrings-container {
		height: auto;
		overflow-y: hidden;
		flex: none;
		display: flex;
		align-items: flex-start;
		min-width: 40px;
	}
	.dayview-timestring-container {
		height: 40px;
		position: relative;
		padding-inline-end: 8px;
		text-align: right;
	}

	.dayview-timestring {
		display: block;
		color: #70757a;
		font-size: 10px;
		position: relative;
		top: -6px;
	}
	.dayview-timestrings {
		position: relative;
		background-color: #fff;
		box-sizing: border-box;
		margin-left: auto;
	}
	.dayview-grid-container {
		flex: 1 1 0;
		overflow-x: auto;
		overflow-y: scroll;
		display: flex;
		align-items: flex-start;
	}
	.dayview-grid {
		border-bottom: #dadce0 1px solid;
		position: relative;
		min-width: 100%;
		flex: none;
		display: inline-flex;
		vertical-align: top;
	}
	.dayview-grid-tiles {
		z-index: 0;
		border-top: #dadce0 1px solid;
	}
	.dayview-grid-tile {
		height: 40px;
	}
	.dayview-grid-tile:after {
		content: '';
		border-bottom: #dadce0 1px solid;
		position: absolute;
		width: 100%;
		margin-top: -1px;
		z-index: 3;
		pointer-events: none;
	}
	.dayview-grid-marker-start,
	.dayview-grid-marker-end {
		width: 8px;
		border-inline-end: #dadce0 1px solid;
	}
	.dayview-grid-marker-end {
		position: absolute;
		left: 0;
		top: 0;
		bottom: 0;
	}
	.dayview-gridcell-container {
		position: relative;
		padding: 0 12px;
		box-sizing: border-box;
		flex: 1 0 auto;
		width: 129px;
		min-width: 129px;
		border-right: white 1px solid;
		overflow: visible;
	}
	.dayview-gridcell {
		grid-column-gap: 3px;
		z-index: 2;
		position: relative;
		height: 100%;
		width: 100%;
		display: grid;
		grid-template-rows: repeat(96, 10px);
		/* grid-template-columns: fit-content(100%); */
	}
	.dayview-cell {
		z-index: 2;
		border-radius: 5px;
		/* border: 1px solid darkred; */
		background-color: #6670bf;
		padding: 0 3px;
	}
	.dayview-now-marker {
		position: absolute;
		z-index: 504;
		border-top: #ea4335 solid 2px;
		right: 8px;
		left: 0;
		pointer-events: none;
	}
	.dayview-now-marker:after {
		background: #ea4335;
		border-radius: 50%;
		content: '';
		position: absolute;
		height: 12px;
		margin-inline-start: -6.5px;
		margin-top: -5px;
		width: 12px;
	}
	.dayview-cell {
		padding: 3px;
		color: white;
		font-size: 12px;
		display: flex;
	}
	.dayview-cell:not(.dayview-cell-extended) .dayview-cell-title:after {
		content: ',';
		margin-inline-end: 4px;
	}
	.dayview-cell-extended {
		display: block;
	}
	.dayview-cell-desc {
		display: none;
	}
	.dayview-cell-title,
	.dayview-cell-desc {
		white-space: normal;
		overflow-wrap: break-word;
		word-wrap: break-word;
	}
</style>
