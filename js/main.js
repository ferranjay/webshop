var linkContainer = $('.link-container'),
    linkContainerOffset = linkContainer.offset().top,
    stickyClass = 'sticky-links'

  $(window).on('scroll', function(){
    var pageOffset = $('body').scrollTop()
    if (pageOffset > linkContainerOffset-50) {
      linkContainer.addClass(stickyClass)
    } else {
      linkContainer.removeClass(stickyClass)
    }
  })