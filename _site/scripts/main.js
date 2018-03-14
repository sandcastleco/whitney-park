(function() {
  console.log('hello scripts');
  var $nav;
  var $navToggle;

  function toggleNav() {
    $navToggle.toggleClass('open');
    $nav.slideToggle();
  }

  function init() {
    $nav = $('.nav');
    $navToggle = $('.nav-toggle');

    $nav.hide();
    $navToggle.show();

    $navToggle.click(toggleNav);
  }

  $(document).ready(init);
})();
