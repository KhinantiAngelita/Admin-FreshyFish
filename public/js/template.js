(function($) {
  'use strict';
  $(function() {
    var body = $('body');
    var sidebar = $('.sidebar');
    var logo = $('.navbar-brand'); // Adjust the selector if necessary

    // Highlight the logo based on the current route
    function highlightLogo() {
      var currentRoute = window.location.pathname;

      // Reset the highlighted logo state
      logo.removeClass('highlighted-logo');

      // Highlight logo based on the route
      if (currentRoute.includes('dashboard')) {
        logo.addClass('highlighted-logo');
      } else if (currentRoute.includes('toko')) {
        logo.addClass('highlighted-logo');
      } else if (currentRoute.includes('produk')) {
        logo.addClass('highlighted-logo');
      } else if (currentRoute.includes('pesanan')) {
        logo.addClass('highlighted-logo');
      }
    }

    // Call the function to highlight the logo on page load
    highlightLogo();

    // Close other submenu in sidebar on opening any
    sidebar.on('show.bs.collapse', '.collapse', function() {
      sidebar.find('.collapse.show').collapse('hide');
    });

  });

  $('#navbar-search-icon').click(function() {
    $("#navbar-search-input").focus();
  });

})(jQuery);
