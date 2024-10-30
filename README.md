=== Mad Cow Customizer for WooCommerce ===
Contributors: jrobie23
Tags: Customize WooCommerce Checkout Page, Customize WooCommerce Shop Page, Customize WooCommerce Emails, Customize WooCommerce Product Page, Customize WooCommerce
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Requires at least: 5.2
Tested up to: 6.5
Stable tag: 1.9.3
Requires PHP: 7.2


A simple interface for customizing your WooCommerce shop, product, cart, and checkout pages as well as emails and some general WordPress areas.

== Description ==

Mad Cow Customizer is a plugin that catalogs all the hooks in WooCommerce and offers a WYSIWYG so you can easily manage the content in your online store.

## What are hooks?
Hooks are a way for one piece of code to interact with or modify another piece of code at specific, pre-defined points.
WooCommerce hooks work the same way, but they specifically help you customize your WooCommerce store.

## How does this plugin make my life easier?
It’s a 1:1 relationship, which means one hook interacts with one set of code.
Hooks offer more flexibility, but at some point, you have more hooks than you know what to do with!
**That’s why we created the Mad Cow Customizer to herd all your hooks together.**
Now you can make one change and you’ll see it populated in many places across your entire online store.

## ★ Key Highlights ★
Anywhere there’s a hook, you can update the content! That means you can easily manage content across your WooCommerce shop.

**PLUS:**

With the WYSIWYG, you don’t have to write PHP. It’s great for shop owners and non-developers alike!

A stylesheet is included for the basic layout of the plugin, but it will not impact the styling on the front-facing side of your site.

Mad Cow provides regular updates when a new WooCommerce hook is added.

##Here is a quick overview.
[youtube https://www.youtube.com/watch?v=3hJPQnPrm5k]

##How it works:
-Pick the tab that (should) get you to the customization options you are interested in.
-In many cases, you can use the image to find the location of the hook in which you would like to enter some text.
-Others are simply yes/no options.
-Enter your text or HTML in the text editor section.
-Click the “Save Changes” button at the bottom.
-Check your work on the public facing side of the site.

##What about styles & class?
-A stylesheet is included for the basic layout of the plugin, but will not impact the styling on the front-facing side of your site.
-All areas of customization have been given their own class so you can update the CSS however you need to. Simply use your browser’s inspector to locate the classes for the specific div or container where your custom text/content has been added and add your own styling to the stylesheet in your child theme.
-The “after cart” and “before product tabs” divs are both set to clear:all; for basic layout reasons. Those, and all others, can be overridden in your own theme’s stylesheet.

##What’s included:
-“Shop/Archive”
-“Single Product”
-“Cart”
-“Checkout”
-“Email”
-“General WooCommerce Options”
-“Custom Product Tabs”
-And even a couple general WordPress features!


##Section details:
- The Shop, Single Product, Cart, and Checkout tabs provide some of the most common hooks provided by WooCommerce. In general, you are adding your content to these sections of WooCommerce and it will display where specified by the hook. Screenshots are provided for reference.

- The Email options section allows you to add a custom message to the header area and footer area of the Processing Order email. That’s the email that gets sent to your customers when the order is first placed.

You can add your content (text/html — more on that later) and style it right from the plugin. You can also specify if you want each respective message to display based on the products OR product categories in the cart. So, only show the message if product “1234” is in the cart or if product category “324” is present.

- The Custom Tabs section allows you to add three additional tabs to the product pages. Within this section you can add a tab title, tab content, custom tab styes and a tab priority. The priority indicates which order (left to right) the tab will show up.

- The General WooCommerce section has a load of various functions including:

- Remove Breadcrumbs from Single Product Page
    - The breadcrumbs show up at the top of the product page.
- Remove Short Description
    - This eliminates the short description from showing below the product title.
- Display the long description on single product page where the short description was.
    - If you remove the short description, you can display the long description in this section instead.
- Hide any or all of the native WooCommerce tabs:
    - Description Tab
    - Reviews Tab
    - Additional Information Tab
- Automatically mark virtual orders as “Complete”
    - For orders that ONLY contain virtual products (non-shippable) this automatically marks them as complete since there is no need to confirm the order has shipped (in some cases).
- Replace Related Products and UpSells text
    - This allows you to specify your own text where the related products are displayed (single product page and cart page.
- Remove specific categories from showing in the Related Products area
    - This allows you to remove some categories from showing in the Related Products area.
- Replace Cross Sells text
    - This allows you to specify your own text where the Cross Sell products are displayed (checkout page.
- Replace Add To Cart text on all products
    - Change the “Add to Cart” text on all products.
- Replace Add To Cart text on specific products
    - Specify on which products you want to change the “Add to Cart” text.
- Replace Add To Cart text on products with specific categories
    - Specify on which product categories you want to change the “Add to Cart” text.

-  The General WordPress section allows you to adjust some standard WordPress options.

This section allows you to change the ellipsis text from the standard “[…]” to anything you want. You can also make this ellipsis a link which is not the default for the Standard WordPress themes.

You can also adjust the length of the excerpt by simply adding the number of words you want to display on the blog page or any other archive page.


Here is a video with a detailed explanation of all the functionality.
[youtube https://www.youtube.com/watch?v=JmB8DcdLTCU]

<a href="https://madcowweb.com/contact-us/" target="_blank">Contact Us</a>
== Installation ==

Activate the plugin through the 'Plugins' menu in WordPress.
Settings page is found under "WooCommerce - MCW Settings" or right from the plugins page.

== Frequently Asked Questions ==

= Can I add html elements, styled text, and images to the content areas? =

We utilize the wp_kses_post function to sanitize what is entered in those areas.
For example:

`<p class="my-cool-class">My Awesome Paragraph Styled however I want</p>`
`<img src="/wp-content/uploads/2013/06/cd_3_flat.jpg">`
`<div class="my-cool-div">My Awesome Stuff inside my div</div>`

== Changelog ==

= 1.9.3 =
Replace deprecated input filter. Update deprecated dynamic property function.

= 1.9.2 =
Added update readme/instructions

= 1.9.1 =
Added cool new banner images

= 1.8 =
Add training video to ReadMe

= 1.7 =
move some fields to more appropriate tabs for better organization. from shop page to single product page.
fix ellipsis conditional logic to allow for link without changing text
add conditional function to not show above shop loop on product page (woo uses same hook)
adjust if statements for getting radio buttons to fix php warning when new field has not been saved yet and returns (null).

= 1.6 =
add conditionals on shop page sections for related products and cross sells

= 1.5 =
fix html echo for output on divs and tds to use wp_kses_post

= 1.4 =
fix radio buttons for woocommerce options

= 1.3 =
updated readme for more clear instructions
add removal of related products by category

= 1.2 =
update version number so updates are pushed

= 1.1 =
fix radio buttons and add new general WordPress features
