# BS5Press Classic

**BS5Press Classic** is a developer-friendly, Bootstrap 5 powered WordPress classic theme designed with hooks and a clean modular architecture to maximize flexibility and ease of customization.

---

## Features

- Fully Bootstrap 5 compatible for responsive and modern UI.
- Developer-friendly with extensive use of hooks for easy customization and extension.
- Custom Bootstrap-compatible navigation menu walker.
- Clean and semantic markup with Bootstrap styling classes.
- Supports WordPress menus with a primary menu location.
- Modular template parts for header, footer, navbar, and single post templates.
- Enqueues Bootstrap CSS and JS from CDN for fast loading and reliability.

---

## Installation

1. Upload the `bs5press-classic` theme folder to your WordPress `/wp-content/themes/` directory.
2. Activate the theme via WordPress Admin > Appearance > Themes.
3. Set up your menus under Appearance > Menus and assign a menu to the **Primary Menu** location.

---

## Usage

- Use the `bs5pc` action hooks to inject content or override parts without editing core theme files.
- The primary navigation uses a custom Bootstrap-compatible walker located in `/includes/menu-walker.php`.
- Template parts are located in `/template-parts/` for easy customization and overrides.

---

## Hooks Overview

| Hook Name                      | Description                               |
|-------------------------------|-------------------------------------------|
| `bs5pc/site_header`            | Fires inside the site header container.  |
| `bs5pc/site_header/navbar/content` | Fires inside the navbar for menu output. |
| `bs5pc/single`                | Fires to load the single post template part. |
| `bs5pc/site_footer`            | Fires inside the site footer container.  |

---

## Enqueued Assets

- Bootstrap 5 CSS and JS from CDN (version 5.3.7).
- Main theme stylesheet (`style.css`).

---

## Developer Notes

- Custom menu walker class located at `/includes/menu-walker.php` makes WordPress menus fully compatible with Bootstrap markup.
- All markup uses Bootstrap 5 classes for layout and styling.
- Recommended to hook into `bs5pc` actions to extend or customize output without modifying core theme files.
- Follow WordPress coding standards when adding new functionality or templates.

---

## License

This theme is licensed under the [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html).

---

## Support

For issues or feature requests, please open an issue on the theme’s GitHub repository or contact the theme author.

---

## Author

[WPizard](https://wpizard.com)
