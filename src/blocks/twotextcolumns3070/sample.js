import $ from "jquery";

(function ($) {
  /**
   * initializeBlock
   *
   * Adds custom JavaScript to the block HTML.
   *
   * @date    15/4/19
   * @since   1.0.0
   *
   * @param   object $block The block jQuery element.
   * @param   object attributes The block attributes (only available when editing).
   * @return  void
   */
  var initializeBlock = function ($block) {
    // add code here (will be called in block editor and front end)
  };

  // Initialize each block on page load (front end).
  $(function () {
    $(".block-wrapper-target-class").each(function () {
      //replace with targetting class
      initializeBlock($(this));
    });
  });

  // Initialize dynamic block preview (editor).
  if (window.acf) {
    window.acf.addAction("render_block_preview/type=blockname", initializeBlock); //replace blockname
  }
})(jQuery);
