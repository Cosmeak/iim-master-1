# Echo App

Everything you need to build a Svelte project, powered by [`create-svelte`](https://github.com/sveltejs/kit/tree/main/packages/create-svelte).

And mobile things are powered by [**Capacitor**](https://capacitorjs.com/docs/)

## Developing

Once you've cloned the project and installed dependencies with `npm install` (or `pnpm install` or `yarn`), start a development server:

```bash
npm run dev

# or start the server and open the app in a new browser tab
npm run dev -- --open
```

## Building

To create a production version of your app:

```bash
# Build web
npm run build
# Sync mobile build with new web build
npx cap sync
```

You can preview the production build with `npm run preview` in your browser.
Or in Android or IOS with :

```bash
npx cap open android
npx cap open ios
```

> [!TIP]
> Make your developpement with web hot relead environnement and when it's done, sync it with mobile apps. Then don't forget to test everything on apps!!
