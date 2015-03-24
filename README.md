Dinosaur
--------

### Description
Dinosaur is a Drupal theme, currently sub-theming Mothership, but not tightly coupled with it. Its purpose is to illustrate a convenient pattern for adding and maintaining JavaSript in the context of a Drupal site.

![dinosaur image](http://static.guim.co.uk/sys-images/Business/Pix/pictures/2012/8/6/1344279654109/Oil-pump-units-silhouette-008.jpg)

### Why
The philosophy is simple, where possible, abstract and generalize your work into jQuery *plugins*; this encourages reuse and modularity.
To apply those plugins or do other basic work, put that code into *actions*. Every action is an [IIFE](http://en.wikipedia.org/wiki/Immediately-invoked_function_expression).
Actions should be small and focused, don't do more than one thing unless very closely related.

### Adding actions
To add actions, you can add your logic to `dinosaur_add_js()` or use the dinosaur_helper module, which defines a context reaction so that you can place javascript dynamically.

To add actions directly from your module or elsewhere, you may call `_dinosaur_add_js()` directly (note the prepended underscore). It takes the name of the action and a boolean to define whether or not to add a dependent plugin.

### Naming
Actions can have any name if they have no dependency. If they depend on a plugin, they must share the same base name. E.g.:

    bxslider.js
    jquery.bxslider.js

### Production
`_dinosaur_add_js()` relies on a debug variable to create the suffix for your action and plugin names. When debugging is turned OFF, the file suffix will be `.min.js`, otherwise, just `.js`.
