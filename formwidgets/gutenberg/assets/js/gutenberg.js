/*
 * Rich text editor with blocks form field control (WYSIWYG)
 *
 * Data attributes:
 * - data-control="gutenberg" - enables the rich editor plugin
 *
 * JavaScript API:
 * $('input').gutenberg()
 *
 */
+function ($) {
    "use strict";
    var Base = $.oc.foundation.base,
        BaseProto = Base.prototype

    // GUTENBERG CLASS DEFINITION
    // ============================

    var Gutenberg = function (element, options) {
        this.options = options
        this.$el = $(element)
        this.$form = this.$el.closest('form')

        $.oc.foundation.controlUtils.markDisposable(element)

        Base.call(this)

        this.init()
    }

    Gutenberg.prototype = Object.create(BaseProto)
    Gutenberg.prototype.constructor = Gutenberg

    Gutenberg.prototype.init = function () {
        // this.$masterTabs = $('#pages-master-tabs')

        /*
         * Input must have an identifier
         */
        if (!this.$el.attr('id')) {
            this.$el.attr('id', 'element-' + Math.random().toString(36).substring(7))
        }

        if (this.options.minheight === 0) {
            var mHeight = '100%';
        } else {
            var mHeight = this.options.minheight + 'px';
        }


        /**
         * First we need to remove old instance and create new one,
         * gutenberg.js can't initialize multiple instances of editor on one page.
         */
        // if (!window.Laraberg.editor){

        // }

        Laraberg.init(this.$el.attr('id'), {minHeight: mHeight, laravelFilemanager: true})

        this.initProxy()
    }

    Gutenberg.prototype.initProxy = function () {
        this.$form.on('oc.beforeRequest', this.proxy(this.onFormBeforeRequest))
        // this.$masterTabs.on('shown.bs.tab', this.proxy(this.onTabShown))
    }

    /*
     * Instantly synchronizes HTML content.
     */
    Gutenberg.prototype.onFormBeforeRequest = function (ev) {
        this.$el.val(Laraberg.getContent())
    }

    /*
     * Triggered when a tab is displayed.
     */
    // Gutenberg.prototype.onTabShown = function(e) {
    //     Laraberg.remove(this.$el.attr('id'), { minHeight: '300px', laravelFilemanager: true })
    // }

    // GUTENBERG PLUGIN DEFINITION
    // ============================

    var old = $.fn.gutenberg

    $.fn.gutenberg = function (option) {
        var args = Array.prototype.slice.call(arguments, 1), result
        this.each(function () {
            var $this = $(this)
            var data = $this.data('oc.gutenberg')
            var options = $.extend({}, Gutenberg.DEFAULTS, $this.data(), typeof option == 'object' && option)
            if (!data) $this.data('oc.gutenberg', (data = new Gutenberg(this, options)))
            if (typeof option == 'string') result = data[option].apply(data, args)
            if (typeof result != 'undefined') return false
        })

        return result ? result : this
    }

    $.fn.gutenberg.Constructor = Gutenberg

    // GUTENBERG NO CONFLICT
    // =================

    $.fn.gutenberg.noConflict = function () {
        $.fn.gutenberg = old
        return this
    }

    // GUTENBERG DATA-API
    // ===============

    $(document).render(function () {
        $('[data-control="gutenberg"]').gutenberg();
    })

}(window.jQuery);