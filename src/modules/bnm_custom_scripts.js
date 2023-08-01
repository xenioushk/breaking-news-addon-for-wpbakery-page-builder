;(function ($) {
  "use strict"

  /*---  Introduced in version 1.0.6---*/

  if ($("div.bnm").length) {
    $("div.bnm").each(function () {
      var hide_ticker_status = false
      var $ticker_id = $(this).find("ul")
      var $animation = $ticker_id.data("animation"),
        $interval = $ticker_id.data("interval"),
        $height = $ticker_id.data("height"),
        $position = $ticker_id.data("position"),
        $btn_show = $ticker_id.data("btn_show"),
        $next_prev_btn_icon = $ticker_id.data("next_prev_btn_icon"),
        $show_hide_btn_icon = $ticker_id.data("show_hide_btn_icon"),
        $rtl = $ticker_id.data("rtl")

      //Page Wise Ticker Show/Hide Script
      //File: bnm-custom-styles.php
      if (typeof $position != "undefined" && $position == "header" && typeof bnm_cmb_header_ticker_status != "undefined" && bnm_cmb_header_ticker_status == 0) {
        hide_ticker_status = true
      } else if (typeof $position != "undefined" && $position == "footer" && typeof bnm_cmb_footer_ticker_status != "undefined" && bnm_cmb_footer_ticker_status == 0) {
        hide_ticker_status = true
      }

      $ticker_id.bwlJqueryNewsTicker({
        interval: $interval,
        animation: $animation,
        height: $height,
        position: $position,
        btn_show: $btn_show,
        bwl_prev_icon: "fa-" + $next_prev_btn_icon + "-left",
        bwl_next_icon: "fa-" + $next_prev_btn_icon + "-right",
        bwl_up_icon: "fa-" + $show_hide_btn_icon + "-up",
        bwl_down_icon: "fa-" + $show_hide_btn_icon + "-down",
        rtl: $rtl,
        hide_ticker: hide_ticker_status,
      })
    })

    /*---  Automatic Manage ticker navigation color match with post text color ---*/
    // Introduced in version 1.1.0

    $("div#inline").each(function () {
      var $bnm_inline_text_color = $(this).find("li:first-child>a").attr("style")

      $(this).find("span.bwl_prev_btn i, span.bwl_next_btn i").attr("style", $bnm_inline_text_color)
    })
  }
})(jQuery)
