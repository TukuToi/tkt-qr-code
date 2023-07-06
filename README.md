# TKT QR Code WordPress Plugin

TKT QR Code is a simple yet powerful WordPress plugin to generate QR codes holding the URL of your posts. It comes with a customizable shortcode to embed QR codes directly into your posts or pages. 

## Features
* Generates QR codes holding the URL to a post
* Size of the QR code can be customized via shortcode
* QR codes are saved in the plugin's folder for reuse
* Built with [phpqrcode library](https://github.com/Darkflib/php-qrcode)

## Requirements
* WordPress 4.8 or higher
* PHP 7.4 or higher
* GD2 PHP extension

## Installation
1. Download the zip file of this plugin from this GitHub repository.
2. In your WordPress admin dashboard, go to **Plugins > Add New > Upload Plugin**.
3. Upload the zip file and click **Install Now**.
4. After the installation is complete, click **Activate**.

## Usage
After activation, you can use the shortcode `[qr_code]` in your posts or pages to display the QR code. The shortcode accepts two optional parameters:
* `size`: Specifies the size of the QR code. Default is `150`.
* `post_id`: Specifies the ID of the post. Default is the ID of the current post.

Here is an example of using the shortcode with parameters:

```
[qr_code size="200" post_id="123"]
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
This plugin is licensed under [GPL3](https://www.gnu.org/licenses/gpl-3.0.html).
