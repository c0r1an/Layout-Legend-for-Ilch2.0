# Legend Layout for Ilch 2.0

Legend is a flexible esports layout for Ilch 2.0 with a neon-inspired presentation, configurable homepage sections and extended footer options.

## Features

- configurable branding, colors and content width
- optional logo toggle in the header
- optional homepage slider with configurable images, text and links
- optional ticker below the header
- optional hero image, hero stats and match banner
- switchable 2-column or 3-column content layout
- footer with configurable width, quick links and selectable widget box
- dedicated full-width template via `index_full.php`

## Installation

1. Copy the `legend` folder into `application/layouts/`.
2. Install or activate the layout in the Ilch admin area.
3. Open the layout settings in the admin area and configure the available options.

The ZIP export created by `export-layout.ps1` is built so that the top-level folder is exactly `legend`.

## Menu Usage

- Menu 1 is used as the main navigation.
- Menu 2 is used as the first sidebar.
- Menu 3 is used as the second sidebar when the 3-column layout is enabled.

## Footer Widget

The third footer column can be configured in the layout settings:

- choose a title freely
- select an installed box from a dropdown
- or use custom fallback text

## Export

Run the PowerShell script below from inside the `legend` folder to build a distributable ZIP:

```powershell
powershell -ExecutionPolicy Bypass -File .\export-layout.ps1
```

The archive is written to `dist/legend-v<version>.zip`.

## License

This project is licensed under the MIT License. See `LICENSE`.
