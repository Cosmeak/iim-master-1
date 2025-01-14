<script lang="ts">
	import Button from '$lib/components/ui/button/button.svelte';
	import * as Card from '$lib/components/ui/card';
	import { MessagesSquare, House, CalendarDays, LayoutList, BookOpen } from 'lucide-svelte';
</script>

<slot />

<nav class="fixed bottom-0 left-0 right-0 m-2">
	<Card.Root class="bg-cgreen p-4">
		<Card.Content class="flex items-center justify-around p-0">
			<Button href="/" class="rounded-full bg-white p-4">
				<House size={24} color="#465A54" strokeWidth={1.5} />
			</Button>
			<Button href="/calendar" class="rounded-full bg-white p-4">
				<CalendarDays size={24} color="#465A54" strokeWidth={1.5} />
			</Button>
			<Button href="/dialog" class="rounded-2xl bg-red-400 p-5">
				<MessagesSquare size={24} color="#465A54" strokeWidth={2} />
			</Button>
			<Button href="/todo" class="rounded-full bg-white p-4">
				<LayoutList size={24} color="#465A54" strokeWidth={1.5} />
			</Button>
			<Button href="/" class="rounded-full bg-white p-4">
				<BookOpen size={24} color="#465A54" strokeWidth={1.5} />
			</Button>
		</Card.Content>
	</Card.Root>
</nav>
