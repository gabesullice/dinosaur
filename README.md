Pumpjack
--------

### Description
Pumpjack is a Drupal basetheme, currently sub-theming Mothership, but not tightly coupled with it. Its purpose is to illustrate a convenient pattern for adding a maintaining JavaSript in the context of a Drupal site.

![pumpjack image](http://static.guim.co.uk/sys-images/Business/Pix/pictures/2012/8/6/1344279654109/Oil-pump-units-silhouette-008.jpg)

### Why
The philosophy is simple, where possible, abstract and generalize your work into jQuery *plugins*; this encourages reuse and modularity.
To apply those plugins or do other basic work, put that code into an *actions*. Every action is an [IIFE](http://en.wikipedia.org/wiki/Immediately-invoked_function_expression).
Actions should be small and focused, don't do more than one thing unless very closely related.

### Adding actions
To add actions, you can add your logic to `pumpjack_add_js()` or use the pumpjack_helper module, which defines a context reaction, so that you can place javascript very dynamically.

To add actions directly from your module or elsewhere, you may call `_pumpjack_add_js()` directly (note the prepended underscore). It takes the name of the actions and a boolean to add a sibling plugin.

### Naming
Actions can have any name if they have no dependency. If they depend on a plugin, they must share the same base name.

    E.g.:
    bxslider.js
    and
    jquery.bxslider.js

### Production
`_pumpjack_add_js()` relies on a debug variable to create the suffix for your action and plugin names. When debugging is turned OFF, the file suffix will be `.min.js`, otherwise, just `.js`.
