# Front-end

## Local workflow

### First time

Install PNPM (better analogue of Yarn / NPM) unless you have it:

```bash
npm install -g pnpm
```

[Other options](https://pnpm.io/installation#using-npm)

Install packages:

```bash
nvm use 18
pnpm install
```

### Build for development

Once:

```bash
pnpm build-for-development
```

Continuously:

```bash
pnpm build-for-development
```

Run dev server with hot reload (This requires running your WP theme locally on PHP etc):

```bash
pnpm dev-server
```

Now open <http://localhost:8080>

### Build for production

```bash
pnpm build-for-production
```


## About this theme

TailPress is a minimal boilerplate theme for WordPress using [Tailwind CSS](https://tailwindcss.com/).

### General

TailPress uses the [Tailwind CLI](https://tailwindcss.com/docs/installation#using-tailwind-cli), [PostCSS](https://postcss.org) and [esbuild](https://esbuild.github.io).

You will find the editable CSS and Javascript files within the `/resources` folder.

Before you use your theme in production, make sure you run `npm run production`.

## Block editor support

TailPress comes with support for the [block editor](https://wordpress.org/support/article/wordpress-editor/).

A basic setup for `theme.json` is included. This also means that you need to at least use WordPress 5.8. If you wan't to support earlier WordPress versions, you can use an [older version](https://github.com/jeffreyvr/tailpress/tree/0.1.1) of TailPress instead.

CSS-classes for alignment (full, wide etc.) are generated automatically. You can opt-out on this by removing the plugin from the `tailwind.config.js` file.

To make the editing experience within the block editor more in line with the front end styling, a `editor-style.css` is generated.

### Define theme colors and font sizes

Several colors and font sizes are defined from the beginning. You can modify them in `theme.json`.

### Links

* [TailPress website](https://tailpress.io)
* [Screencasts](https://www.youtube.com/playlist?list=PL6GBdOp044SHIOSCZejodwr1HcYsC43wG)
* [Tailwind CSS Documentation](https://tailwindcss.com/docs)
* [Esbuild Documentation](https://esbuild.github.io)
