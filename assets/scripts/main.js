/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */

(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        // JavaScript to be fired on all pages
      },
      finalize: function() {
        // JavaScript to be fired on all pages, after page specific JS is fired
        if ( window.location.hash ){
          maybeScrollTo( window.location.hash );
        }
      }
    },
    // Explore page
    'explore': {
      init: function() {
        // JavaScript to be fired on the explore page
        $('.image-slider').slick();
        $('.text-slider').slick();
        $('.acf-map').each(function(){ render_map( $(this) ); });
      },
      finalize: function() {
        // JavaScript to be fired on the explore page, after the init JS
      }
    },
    // Leasing Page
    'leasing': {
      init: function() {
        // JavaScript to be fired on the leasing page
        $('.image-slider').slick();
        $('.text-slider').slick();
      }
    }
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  /*
  *  render_map
  *
  *  This function will render a Google Map onto the selected jQuery element
  *
  *  @type  function
  *  @date  8/11/2013
  *  @since 4.3.0
  *
  *  @param $el (jQuery element)
  *  @return  n/a
  */

  function render_map( $el ) {

    var styles = [{"featureType":"landscape","stylers":[{"saturation":-100},{"lightness":65},{"visibility":"on"}]},{"featureType":"poi","stylers":[{"saturation":-100},{"lightness":51},{"visibility":"simplified"}]},{"featureType":"road.highway","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"road.arterial","stylers":[{"saturation":-100},{"lightness":30},{"visibility":"on"}]},{"featureType":"road.local","stylers":[{"saturation":-100},{"lightness":40},{"visibility":"on"}]},{"featureType":"transit","stylers":[{"saturation":-100},{"visibility":"simplified"}]},{"featureType":"administrative.province","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"labels","stylers":[{"visibility":"on"},{"lightness":-25},{"saturation":-100}]},{"featureType":"water","elementType":"geometry","stylers":[{"hue":"#ffff00"},{"lightness":-25},{"saturation":-97}]}];


    // var
    var $markers = $el.find('.marker');

    // vars
    var args = {
      scrollwheel : false,
      zoom    : 16,
      center    : new google.maps.LatLng(0, 0),
      mapTypeId : google.maps.MapTypeId.ROADMAP,
      styles: styles
    };

    // create map           
    var map = new google.maps.Map( $el[0], args);

    // add a markers reference
    map.markers = [];

    // add markers
    $markers.each(function(){

        add_marker( $(this), map );

    });

    // center map
    center_map( map );

  }

  /*
  *  add_marker
  *
  *  This function will add a marker to the selected Google Map
  *
  *  @type  function
  *  @date  8/11/2013
  *  @since 4.3.0
  *
  *  @param $marker (jQuery element)
  *  @param map (Google Map object)
  *  @return  n/a
  */

  function add_marker( $marker, map ) {

    // var
    var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );

    // create marker
    var marker = new google.maps.Marker({
      position  : latlng,
      map     : map
    });

    // add to array
    map.markers.push( marker );

    // if marker contains HTML, add it to an infoWindow
    if( $marker.html() )
    {
      // create info window
      var infowindow = new google.maps.InfoWindow({
        content   : $marker.html()
      });

      // show info window when marker is clicked
      google.maps.event.addListener(marker, 'click', function() {

        infowindow.open( map, marker );

      });
    }

  }

  /*
  *  center_map
  *
  *  This function will center the map, showing all markers attached to this map
  *
  *  @type  function
  *  @date  8/11/2013
  *  @since 4.3.0
  *
  *  @param map (Google Map object)
  *  @return  n/a
  */

  function center_map( map ) {

    // vars
    var bounds = new google.maps.LatLngBounds();

    // loop through all markers and create bounds
    $.each( map.markers, function( i, marker ){

      var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );

      bounds.extend( latlng );

    });

    // only 1 marker?
    if( map.markers.length === 1 )
    {
      // set center of map
        map.setCenter( bounds.getCenter() );
        map.setZoom( 16 );
    }
    else
    {
      // fit to bounds
      map.fitBounds( bounds );
    }

  }

  // Load Events
  $(document).ready(UTIL.loadEvents);


  $(window).load(function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });


  // TRIGGER ACTIVE STATE
  $('#mobnav-btn').click(

    function() {
      $('.navbar-nav').toggleClass("xactive");
    });

  // TRIGGER DROP DOWN SUBS
  $('.mobnav-subarrow').click(

    function() {
      $(this).parent().toggleClass("xpopdrop");
    });


  // Add wrapping class to drop down menus for custom styles
  $( "select" ).wrap( "<div class='custom-select'></div>" );

  // Match height of grid tiles
  if ( $('.grid-match').length ) {
      $('.grid-match').matchHeight();
  }

  // Set full URLs on sub menu items with '#' Urls
  $('.menu-item-type-custom a').each(
    function(){
      var $link = $(this);
      var oldUrl = $link.attr('href');
      var parentUrl;

      if (oldUrl.substring(0,1) !== '#' ) { 
        return; 
      }

      parentUrl = $link.closest( '.menu-item-has-children').children('a').attr('href');

      $(this).attr('href', parentUrl + oldUrl );
    }
  );

  // Smooth scroll to anchors
  $('.menu-item-type-custom a').click(function(event){
    console.log('click event called');

    var link = {};
    link.url = $.attr(this, 'href');
    link.page = extractPageUrl( link.url );
    link.currentPage = extractPageUrl( window.location.href );
    link.destination = extractHash( link.url );

    console.log(link);
    if (link.currentPage !== link.page ) {
      return true;
    }
    
    event.preventDefault();
    maybeScrollTo( link.destination );

    });

  function maybeScrollTo( selector ) {
    console.log(selector);
    if ($(selector).length ) {
      $('html, body').animate({
                      scrollTop: $( selector ).offset().top + -130
                  }, 500);
    }
  }

  function extractPageUrl(url){
    var page = url.split('//').pop();
    page = page.split('#').shift();
    return page;
  }

  function extractHash(url){
    var hash = '#' + url.split('#').pop();
    return hash;
  }

  // Initialise wow
  wow = new WOW({
    boxClass:     'wow',      // default
    animateClass: 'animated', // default
    offset:       0,          // default
    mobile:       false,       // default
    live:         true        // default
  });
  wow.init();

})(jQuery); // Fully reference jQuery after this point.
