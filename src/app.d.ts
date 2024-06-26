// See https://kit.svelte.dev/docs/types#app
// for information about these interfaces
declare global {
	namespace App {
		// interface Error {}
		// interface PageData {}
		// interface PageState {}
		// interface Platform {}

		interface Locals {
			user: User;
		}

		interface User {
			slug: string;
			email: string;
			first_name: string;
			last_name: string;
			birthdate: string;
			avatar: string;
			color: string;
			created_at: string;
			updated_at: string;
		}
	}
}

export {};
