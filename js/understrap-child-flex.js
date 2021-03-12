var $j = jQuery.noConflict();
$j(function() {
  console.log("Understrap Child Flex JS Loading");

  // When the user scrolls the page, execute myFunction
  window.onscroll = function() {
    stickyNav();
  };

  // Get the header
  var header = document.getElementById("wrapper-navbar");

  // Get the offset position of the navbar
  var sticky = header.offsetTop;

  // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
  function stickyNav() {
    if (window.pageYOffset > sticky) {
      header.classList.add("sticky");
    } else {
      header.classList.remove("sticky");
    }
  }

  /*var owlmain = $j("#owl-main-slider");
  owlmain.owlCarousel({
    items: 1,
    loop: true,
    margin: 0,
    autoplay: true,
    autoplayTimeout: 6000,
    autoplayHoverPause: true,
    nav: true,
    dots: true
  });*/
});


/* Responsive iFrame videos */
/*
const iframes = document.querySelectorAll('iframe')
if ( iframes ) {
  //console.log(iframes);
  iframes.forEach(eachIframe => {
    if ( eachIframe.hasAttribute("allowfullscreen") ) {
      const iframeParent = eachIframe.parentElement;
      const iframeWrapper = document.createElement('div');
      iframeWrapper.classList.add('videoWrapper');
      eachIframe.remove();
      iframeWrapper.appendChild(eachIframe);
      iframeParent.appendChild(iframeWrapper);
    }
  });
}
*/




/* Defering Fontawesome CSS with Javascript */
var giftofspeed1 = document.createElement("link");
giftofspeed1.rel = "stylesheet";
giftofspeed1.href = "https://use.fontawesome.com/releases/v5.6.0/css/all.css";
giftofspeed1.integrity =
  "sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h";
giftofspeed1.crossOrigin = "anonymous";

var godefer1 = document.getElementsByTagName("link")[0];
godefer1.parentNode.insertBefore(giftofspeed1, godefer1);
