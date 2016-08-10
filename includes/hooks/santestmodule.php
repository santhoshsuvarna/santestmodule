<?php
if (!defined("WHMCS")) {
    die("This file cannot be accessed directly");
}

add_hook(
    'ClientAreaPrimaryNavbar',
    1,
    function($primaryNavbar)
    {
        /** @var \WHMCS\View\Menu\Item $primaryNavbar */
        $newMenu = $primaryNavbar->addChild(
            'uniqueMenuItemName',
            array(
                'name' => 'Home',
                'label' => Lang::trans('Glowtouch'),
                'uri' => 'http://glowtouch.com',
                'order' => 99,
                'icon' => 'fa-calendar-o',
            )
        );
        $newMenu->addChild(
            'uniqueSubMenuItemName',
            array(
                'name' => 'Item Name 1',
                'label' => Lang::trans('Contact US'),
                'uri' => 'https://www.glowtouch.com/contact/',
                'order' => 10,
                'icon' => 'fa-cart-plus',
            )
        );
    }
);

add_hook(
    'ClientAreaPrimarySidebar',
    1,
    function($primarySidebar)
    {
        /** @var \WHMCS\View\Menu\Item $primarySidebar */
        $newMenu = $primarySidebar->addChild(
            'uniqueMenuItemName',
            array(
                'name' => 'Home',
                'label' => Lang::trans('Glowtouch'),
                'uri' => 'clientarea.php',
                'order' => 99,
                'icon' => 'fa-calendar-o',
            )
        );
        $newMenu->addChild(
            'uniqueSubMenuItemName',
            array(
                'name' => 'Item Name 1',
                'label' => Lang::trans('About US'),
                'uri' => 'https://www.glowtouch.com/about-us/who-we-are/',
                'order' => 10,
                'icon' => 'fa-cart-plus',
            )
        );
    }
);


use WHMCS\View\Menu\Item as MenuItem;
 
// Add social media links to the end of all secondary sidebars.
add_hook('ClientAreaSecondarySidebar', 1, function (MenuItem $secondarySidebar)
{
    // Add a panel to the end of the secondary sidebar for social media links.
    // Declare it with the name "social-media" so we can easily retrieve it
    // later.
    $secondarySidebar->addChild('social-media', array(
        'label' => 'Social Media',
        'uri' => '#',
        'icon' => 'fa-thumbs-up',
    ));
 
    // Retrieve the panel we just created.
    $socialMediaPanel = $secondarySidebar->getChild('social-media');
 
    // Move the panel to the end of the sorting order so it's always displayed
    // as the last panel in the sidebar.
    $socialMediaPanel->moveToBack();
 
    // Add a Facebook link to the panel.
    $socialMediaPanel->addChild('facebook-link', array(
        'uri' => 'https://facebook.com/our-great-company',
        'label' => 'Like us on Facebook!',
        'order' => 1,
        'icon' => 'fa-facebook',
    ));
 
    // Add a Twitter link to the panel after the Facebook link.
    $socialMediaPanel->addChild('twitter-link', array(
        'uri' => 'https://twitter.com/ourgreatcompany',
        'label' => 'Follow us on Twitter!',
        'order' => 2,
        'icon' => 'fa-twitter',
    ));
 
    // Add a Google+ link to the panel after the Twitter link.
    $socialMediaPanel->addChild('google-plus-link', array(
        'uri' => 'https://plus.google.com/1234567890123456',
        'label' => 'Add us to your circles!',
        'order' => 3,
        'icon' => 'fa-google-plus',
    ));
});


/*
add_hook('ClientAreaProductDetailsOutput', 1, function($service) {
	if (!is_null($service)) {
		$orderID = $service['service']->orderId;
	}
	return 'OrderID: ' . $orderID;
});
*/

