**vStandard**
--

Standard vanilla WordPess theme to be used with any new wordpress project

This theme currently has these options available -

* Custom Background
* Custom Header
* Custom Layout
* Custom Heading Colour
* Custom Link/Link Hover Colour
* Custom Border Settings
* Custom Home Page
* Footer Credits

You can access these options by navigating to Appearance->Customize making use of the Customize API introduced with WordPress 3.4, the end user can preview these changes before making them "Live" on their site.

**Using This Theme**
--

* Download the vStandard theme to your theme folder directory within WordPress.
* Activate the vStandard-child theme. 
* Only make changes to the Stylesheet in the **vStandard-child** folder.

**Create Child Theme**

Create a new folder in your themes directory. Name this folder vStandard-Child. In this folder create a file called style.css Add the following code to this file -

```css
/*
Theme Name: vStandard Child
Author:Rory Standley
Author URI:http://www.rstandley.co.uk
Description: Child theme for vStandard.
Template: vStandard
Version: 1.0.0
*/
@import url("../vStandard/style.css");
```

Any CSS changes that you need to make should be made in this file. If you need to change core files of the parent theme. Simply create the same named file in the vStandard-Child folder and edit thsi file. If the parent theme is updated then all your editing will not be lost!

**Custom Templates**
--

This theme currently has the following custom templates available -

* Blog Excerpt (Create the page you would like your blog roll to appear on and select this template for said page)

**Theme Widgets**

This theme currently has the following widgets areas -

* Primary Widget Area (Sidebar Widget)
* Secondary Widget Area (Sidebar Widget)
* Home Widget 1 (Home Page Widget footer 1)
* Home Widget 2 (Home Page Widget footer 2)
* Home Widget 3 (Home Page Widget footer 3)
* Footer Widget 1 (Global Widget footer 1)
* Footer Widget 2 (Global Widget footer 2)
* Footer Widget 3 (Global Widget footer 3)
