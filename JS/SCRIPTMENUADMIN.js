// as a jQuery plugin
$('#main-nav').hcOffcanvasNav({
  // options here
});

// as a Vanilla JS plugin
var myNav = new hcOffcanvasNav('#main-nav', {
  // options here
});

// Specify the screen width at which to disable the plugin
$('#main-nav').hcOffcanvasNav({
  disableAt: 1024
});

// Customize the text for the close/back labels
$('#main-nav').hcOffcanvasNav({
  insertClose: true,
  insertBack: true,
  labelClose: 'Close',
  labelBack: 'Back',
  levelTitleAsBack: true
});

// Push the main content to the other side
$('#main-nav').hcOffcanvasNav({
  pushContent: true
});

// Set the direction of the HC MobileNav
$('#main-nav').hcOffcanvasNav({
  position: 'right'
});

// More customization options
$('#main-nav').hcOffcanvasNav({
  width: 280,
  height: 'auto',
  swipeGestures: true,
  expanded: false,
  levelOpen: 'overlap',
  levelSpacing: 40,
  levelTitles: false,
  closeOpenLevels: true,
  closeActiveLevel: false,
  navTitle: null,
  navClass: '',
  disableBody: true,
  closeOnClick: true,
  customToggle: null,
  bodyInsert: 'prepend',
  keepClasses: true,
  removeOriginalNav: false,
  rtl: false
});
