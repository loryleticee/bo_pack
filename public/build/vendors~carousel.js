(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["vendors~carousel"],{

/***/ "./node_modules/owl.carousel/dist/owl.carousel.js":
/*!********************************************************!*\
  !*** ./node_modules/owl.carousel/dist/owl.carousel.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/* WEBPACK VAR INJECTION */(function(__webpack_provided_window_dot_jQuery, jQuery) {/**
 * Owl Carousel v2.3.4
 * Copyright 2013-2018 David Deutsch
 * Licensed under: SEE LICENSE IN https://github.com/OwlCarousel2/OwlCarousel2/blob/master/LICENSE
 */
/**
 * Owl carousel
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 * @todo Lazy Load Icon
 * @todo prevent animationend bubling
 * @todo itemsScaleUp
 * @todo Test Zepto
 * @todo stagePadding calculate wrong active classes
 */
;(function($, window, document, undefined) {

	/**
	 * Creates a carousel.
	 * @class The Owl Carousel.
	 * @public
	 * @param {HTMLElement|jQuery} element - The element to create the carousel for.
	 * @param {Object} [options] - The options
	 */
	function Owl(element, options) {

		/**
		 * Current settings for the carousel.
		 * @public
		 */
		this.settings = null;

		/**
		 * Current options set by the caller including defaults.
		 * @public
		 */
		this.options = $.extend({}, Owl.Defaults, options);

		/**
		 * Plugin element.
		 * @public
		 */
		this.$element = $(element);

		/**
		 * Proxied event handlers.
		 * @protected
		 */
		this._handlers = {};

		/**
		 * References to the running plugins of this carousel.
		 * @protected
		 */
		this._plugins = {};

		/**
		 * Currently suppressed events to prevent them from being retriggered.
		 * @protected
		 */
		this._supress = {};

		/**
		 * Absolute current position.
		 * @protected
		 */
		this._current = null;

		/**
		 * Animation speed in milliseconds.
		 * @protected
		 */
		this._speed = null;

		/**
		 * Coordinates of all items in pixel.
		 * @todo The name of this member is missleading.
		 * @protected
		 */
		this._coordinates = [];

		/**
		 * Current breakpoint.
		 * @todo Real media queries would be nice.
		 * @protected
		 */
		this._breakpoint = null;

		/**
		 * Current width of the plugin element.
		 */
		this._width = null;

		/**
		 * All real items.
		 * @protected
		 */
		this._items = [];

		/**
		 * All cloned items.
		 * @protected
		 */
		this._clones = [];

		/**
		 * Merge values of all items.
		 * @todo Maybe this could be part of a plugin.
		 * @protected
		 */
		this._mergers = [];

		/**
		 * Widths of all items.
		 */
		this._widths = [];

		/**
		 * Invalidated parts within the update process.
		 * @protected
		 */
		this._invalidated = {};

		/**
		 * Ordered list of workers for the update process.
		 * @protected
		 */
		this._pipe = [];

		/**
		 * Current state information for the drag operation.
		 * @todo #261
		 * @protected
		 */
		this._drag = {
			time: null,
			target: null,
			pointer: null,
			stage: {
				start: null,
				current: null
			},
			direction: null
		};

		/**
		 * Current state information and their tags.
		 * @type {Object}
		 * @protected
		 */
		this._states = {
			current: {},
			tags: {
				'initializing': [ 'busy' ],
				'animating': [ 'busy' ],
				'dragging': [ 'interacting' ]
			}
		};

		$.each([ 'onResize', 'onThrottledResize' ], $.proxy(function(i, handler) {
			this._handlers[handler] = $.proxy(this[handler], this);
		}, this));

		$.each(Owl.Plugins, $.proxy(function(key, plugin) {
			this._plugins[key.charAt(0).toLowerCase() + key.slice(1)]
				= new plugin(this);
		}, this));

		$.each(Owl.Workers, $.proxy(function(priority, worker) {
			this._pipe.push({
				'filter': worker.filter,
				'run': $.proxy(worker.run, this)
			});
		}, this));

		this.setup();
		this.initialize();
	}

	/**
	 * Default options for the carousel.
	 * @public
	 */
	Owl.Defaults = {
		items: 3,
		loop: false,
		center: false,
		rewind: false,
		checkVisibility: true,

		mouseDrag: true,
		touchDrag: true,
		pullDrag: true,
		freeDrag: false,

		margin: 0,
		stagePadding: 0,

		merge: false,
		mergeFit: true,
		autoWidth: false,

		startPosition: 0,
		rtl: false,

		smartSpeed: 250,
		fluidSpeed: false,
		dragEndSpeed: false,

		responsive: {},
		responsiveRefreshRate: 200,
		responsiveBaseElement: window,

		fallbackEasing: 'swing',
		slideTransition: '',

		info: false,

		nestedItemSelector: false,
		itemElement: 'div',
		stageElement: 'div',

		refreshClass: 'owl-refresh',
		loadedClass: 'owl-loaded',
		loadingClass: 'owl-loading',
		rtlClass: 'owl-rtl',
		responsiveClass: 'owl-responsive',
		dragClass: 'owl-drag',
		itemClass: 'owl-item',
		stageClass: 'owl-stage',
		stageOuterClass: 'owl-stage-outer',
		grabClass: 'owl-grab'
	};

	/**
	 * Enumeration for width.
	 * @public
	 * @readonly
	 * @enum {String}
	 */
	Owl.Width = {
		Default: 'default',
		Inner: 'inner',
		Outer: 'outer'
	};

	/**
	 * Enumeration for types.
	 * @public
	 * @readonly
	 * @enum {String}
	 */
	Owl.Type = {
		Event: 'event',
		State: 'state'
	};

	/**
	 * Contains all registered plugins.
	 * @public
	 */
	Owl.Plugins = {};

	/**
	 * List of workers involved in the update process.
	 */
	Owl.Workers = [ {
		filter: [ 'width', 'settings' ],
		run: function() {
			this._width = this.$element.width();
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			cache.current = this._items && this._items[this.relative(this._current)];
		}
	}, {
		filter: [ 'items', 'settings' ],
		run: function() {
			this.$stage.children('.cloned').remove();
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			var margin = this.settings.margin || '',
				grid = !this.settings.autoWidth,
				rtl = this.settings.rtl,
				css = {
					'width': 'auto',
					'margin-left': rtl ? margin : '',
					'margin-right': rtl ? '' : margin
				};

			!grid && this.$stage.children().css(css);

			cache.css = css;
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			var width = (this.width() / this.settings.items).toFixed(3) - this.settings.margin,
				merge = null,
				iterator = this._items.length,
				grid = !this.settings.autoWidth,
				widths = [];

			cache.items = {
				merge: false,
				width: width
			};

			while (iterator--) {
				merge = this._mergers[iterator];
				merge = this.settings.mergeFit && Math.min(merge, this.settings.items) || merge;

				cache.items.merge = merge > 1 || cache.items.merge;

				widths[iterator] = !grid ? this._items[iterator].width() : width * merge;
			}

			this._widths = widths;
		}
	}, {
		filter: [ 'items', 'settings' ],
		run: function() {
			var clones = [],
				items = this._items,
				settings = this.settings,
				// TODO: Should be computed from number of min width items in stage
				view = Math.max(settings.items * 2, 4),
				size = Math.ceil(items.length / 2) * 2,
				repeat = settings.loop && items.length ? settings.rewind ? view : Math.max(view, size) : 0,
				append = '',
				prepend = '';

			repeat /= 2;

			while (repeat > 0) {
				// Switch to only using appended clones
				clones.push(this.normalize(clones.length / 2, true));
				append = append + items[clones[clones.length - 1]][0].outerHTML;
				clones.push(this.normalize(items.length - 1 - (clones.length - 1) / 2, true));
				prepend = items[clones[clones.length - 1]][0].outerHTML + prepend;
				repeat -= 1;
			}

			this._clones = clones;

			$(append).addClass('cloned').appendTo(this.$stage);
			$(prepend).addClass('cloned').prependTo(this.$stage);
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function() {
			var rtl = this.settings.rtl ? 1 : -1,
				size = this._clones.length + this._items.length,
				iterator = -1,
				previous = 0,
				current = 0,
				coordinates = [];

			while (++iterator < size) {
				previous = coordinates[iterator - 1] || 0;
				current = this._widths[this.relative(iterator)] + this.settings.margin;
				coordinates.push(previous + current * rtl);
			}

			this._coordinates = coordinates;
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function() {
			var padding = this.settings.stagePadding,
				coordinates = this._coordinates,
				css = {
					'width': Math.ceil(Math.abs(coordinates[coordinates.length - 1])) + padding * 2,
					'padding-left': padding || '',
					'padding-right': padding || ''
				};

			this.$stage.css(css);
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			var iterator = this._coordinates.length,
				grid = !this.settings.autoWidth,
				items = this.$stage.children();

			if (grid && cache.items.merge) {
				while (iterator--) {
					cache.css.width = this._widths[this.relative(iterator)];
					items.eq(iterator).css(cache.css);
				}
			} else if (grid) {
				cache.css.width = cache.items.width;
				items.css(cache.css);
			}
		}
	}, {
		filter: [ 'items' ],
		run: function() {
			this._coordinates.length < 1 && this.$stage.removeAttr('style');
		}
	}, {
		filter: [ 'width', 'items', 'settings' ],
		run: function(cache) {
			cache.current = cache.current ? this.$stage.children().index(cache.current) : 0;
			cache.current = Math.max(this.minimum(), Math.min(this.maximum(), cache.current));
			this.reset(cache.current);
		}
	}, {
		filter: [ 'position' ],
		run: function() {
			this.animate(this.coordinates(this._current));
		}
	}, {
		filter: [ 'width', 'position', 'items', 'settings' ],
		run: function() {
			var rtl = this.settings.rtl ? 1 : -1,
				padding = this.settings.stagePadding * 2,
				begin = this.coordinates(this.current()) + padding,
				end = begin + this.width() * rtl,
				inner, outer, matches = [], i, n;

			for (i = 0, n = this._coordinates.length; i < n; i++) {
				inner = this._coordinates[i - 1] || 0;
				outer = Math.abs(this._coordinates[i]) + padding * rtl;

				if ((this.op(inner, '<=', begin) && (this.op(inner, '>', end)))
					|| (this.op(outer, '<', begin) && this.op(outer, '>', end))) {
					matches.push(i);
				}
			}

			this.$stage.children('.active').removeClass('active');
			this.$stage.children(':eq(' + matches.join('), :eq(') + ')').addClass('active');

			this.$stage.children('.center').removeClass('center');
			if (this.settings.center) {
				this.$stage.children().eq(this.current()).addClass('center');
			}
		}
	} ];

	/**
	 * Create the stage DOM element
	 */
	Owl.prototype.initializeStage = function() {
		this.$stage = this.$element.find('.' + this.settings.stageClass);

		// if the stage is already in the DOM, grab it and skip stage initialization
		if (this.$stage.length) {
			return;
		}

		this.$element.addClass(this.options.loadingClass);

		// create stage
		this.$stage = $('<' + this.settings.stageElement + '>', {
			"class": this.settings.stageClass
		}).wrap( $( '<div/>', {
			"class": this.settings.stageOuterClass
		}));

		// append stage
		this.$element.append(this.$stage.parent());
	};

	/**
	 * Create item DOM elements
	 */
	Owl.prototype.initializeItems = function() {
		var $items = this.$element.find('.owl-item');

		// if the items are already in the DOM, grab them and skip item initialization
		if ($items.length) {
			this._items = $items.get().map(function(item) {
				return $(item);
			});

			this._mergers = this._items.map(function() {
				return 1;
			});

			this.refresh();

			return;
		}

		// append content
		this.replace(this.$element.children().not(this.$stage.parent()));

		// check visibility
		if (this.isVisible()) {
			// update view
			this.refresh();
		} else {
			// invalidate width
			this.invalidate('width');
		}

		this.$element
			.removeClass(this.options.loadingClass)
			.addClass(this.options.loadedClass);
	};

	/**
	 * Initializes the carousel.
	 * @protected
	 */
	Owl.prototype.initialize = function() {
		this.enter('initializing');
		this.trigger('initialize');

		this.$element.toggleClass(this.settings.rtlClass, this.settings.rtl);

		if (this.settings.autoWidth && !this.is('pre-loading')) {
			var imgs, nestedSelector, width;
			imgs = this.$element.find('img');
			nestedSelector = this.settings.nestedItemSelector ? '.' + this.settings.nestedItemSelector : undefined;
			width = this.$element.children(nestedSelector).width();

			if (imgs.length && width <= 0) {
				this.preloadAutoWidthImages(imgs);
			}
		}

		this.initializeStage();
		this.initializeItems();

		// register event handlers
		this.registerEventHandlers();

		this.leave('initializing');
		this.trigger('initialized');
	};

	/**
	 * @returns {Boolean} visibility of $element
	 *                    if you know the carousel will always be visible you can set `checkVisibility` to `false` to
	 *                    prevent the expensive browser layout forced reflow the $element.is(':visible') does
	 */
	Owl.prototype.isVisible = function() {
		return this.settings.checkVisibility
			? this.$element.is(':visible')
			: true;
	};

	/**
	 * Setups the current settings.
	 * @todo Remove responsive classes. Why should adaptive designs be brought into IE8?
	 * @todo Support for media queries by using `matchMedia` would be nice.
	 * @public
	 */
	Owl.prototype.setup = function() {
		var viewport = this.viewport(),
			overwrites = this.options.responsive,
			match = -1,
			settings = null;

		if (!overwrites) {
			settings = $.extend({}, this.options);
		} else {
			$.each(overwrites, function(breakpoint) {
				if (breakpoint <= viewport && breakpoint > match) {
					match = Number(breakpoint);
				}
			});

			settings = $.extend({}, this.options, overwrites[match]);
			if (typeof settings.stagePadding === 'function') {
				settings.stagePadding = settings.stagePadding();
			}
			delete settings.responsive;

			// responsive class
			if (settings.responsiveClass) {
				this.$element.attr('class',
					this.$element.attr('class').replace(new RegExp('(' + this.options.responsiveClass + '-)\\S+\\s', 'g'), '$1' + match)
				);
			}
		}

		this.trigger('change', { property: { name: 'settings', value: settings } });
		this._breakpoint = match;
		this.settings = settings;
		this.invalidate('settings');
		this.trigger('changed', { property: { name: 'settings', value: this.settings } });
	};

	/**
	 * Updates option logic if necessery.
	 * @protected
	 */
	Owl.prototype.optionsLogic = function() {
		if (this.settings.autoWidth) {
			this.settings.stagePadding = false;
			this.settings.merge = false;
		}
	};

	/**
	 * Prepares an item before add.
	 * @todo Rename event parameter `content` to `item`.
	 * @protected
	 * @returns {jQuery|HTMLElement} - The item container.
	 */
	Owl.prototype.prepare = function(item) {
		var event = this.trigger('prepare', { content: item });

		if (!event.data) {
			event.data = $('<' + this.settings.itemElement + '/>')
				.addClass(this.options.itemClass).append(item)
		}

		this.trigger('prepared', { content: event.data });

		return event.data;
	};

	/**
	 * Updates the view.
	 * @public
	 */
	Owl.prototype.update = function() {
		var i = 0,
			n = this._pipe.length,
			filter = $.proxy(function(p) { return this[p] }, this._invalidated),
			cache = {};

		while (i < n) {
			if (this._invalidated.all || $.grep(this._pipe[i].filter, filter).length > 0) {
				this._pipe[i].run(cache);
			}
			i++;
		}

		this._invalidated = {};

		!this.is('valid') && this.enter('valid');
	};

	/**
	 * Gets the width of the view.
	 * @public
	 * @param {Owl.Width} [dimension=Owl.Width.Default] - The dimension to return.
	 * @returns {Number} - The width of the view in pixel.
	 */
	Owl.prototype.width = function(dimension) {
		dimension = dimension || Owl.Width.Default;
		switch (dimension) {
			case Owl.Width.Inner:
			case Owl.Width.Outer:
				return this._width;
			default:
				return this._width - this.settings.stagePadding * 2 + this.settings.margin;
		}
	};

	/**
	 * Refreshes the carousel primarily for adaptive purposes.
	 * @public
	 */
	Owl.prototype.refresh = function() {
		this.enter('refreshing');
		this.trigger('refresh');

		this.setup();

		this.optionsLogic();

		this.$element.addClass(this.options.refreshClass);

		this.update();

		this.$element.removeClass(this.options.refreshClass);

		this.leave('refreshing');
		this.trigger('refreshed');
	};

	/**
	 * Checks window `resize` event.
	 * @protected
	 */
	Owl.prototype.onThrottledResize = function() {
		window.clearTimeout(this.resizeTimer);
		this.resizeTimer = window.setTimeout(this._handlers.onResize, this.settings.responsiveRefreshRate);
	};

	/**
	 * Checks window `resize` event.
	 * @protected
	 */
	Owl.prototype.onResize = function() {
		if (!this._items.length) {
			return false;
		}

		if (this._width === this.$element.width()) {
			return false;
		}

		if (!this.isVisible()) {
			return false;
		}

		this.enter('resizing');

		if (this.trigger('resize').isDefaultPrevented()) {
			this.leave('resizing');
			return false;
		}

		this.invalidate('width');

		this.refresh();

		this.leave('resizing');
		this.trigger('resized');
	};

	/**
	 * Registers event handlers.
	 * @todo Check `msPointerEnabled`
	 * @todo #261
	 * @protected
	 */
	Owl.prototype.registerEventHandlers = function() {
		if ($.support.transition) {
			this.$stage.on($.support.transition.end + '.owl.core', $.proxy(this.onTransitionEnd, this));
		}

		if (this.settings.responsive !== false) {
			this.on(window, 'resize', this._handlers.onThrottledResize);
		}

		if (this.settings.mouseDrag) {
			this.$element.addClass(this.options.dragClass);
			this.$stage.on('mousedown.owl.core', $.proxy(this.onDragStart, this));
			this.$stage.on('dragstart.owl.core selectstart.owl.core', function() { return false });
		}

		if (this.settings.touchDrag){
			this.$stage.on('touchstart.owl.core', $.proxy(this.onDragStart, this));
			this.$stage.on('touchcancel.owl.core', $.proxy(this.onDragEnd, this));
		}
	};

	/**
	 * Handles `touchstart` and `mousedown` events.
	 * @todo Horizontal swipe threshold as option
	 * @todo #261
	 * @protected
	 * @param {Event} event - The event arguments.
	 */
	Owl.prototype.onDragStart = function(event) {
		var stage = null;

		if (event.which === 3) {
			return;
		}

		if ($.support.transform) {
			stage = this.$stage.css('transform').replace(/.*\(|\)| /g, '').split(',');
			stage = {
				x: stage[stage.length === 16 ? 12 : 4],
				y: stage[stage.length === 16 ? 13 : 5]
			};
		} else {
			stage = this.$stage.position();
			stage = {
				x: this.settings.rtl ?
					stage.left + this.$stage.width() - this.width() + this.settings.margin :
					stage.left,
				y: stage.top
			};
		}

		if (this.is('animating')) {
			$.support.transform ? this.animate(stage.x) : this.$stage.stop()
			this.invalidate('position');
		}

		this.$element.toggleClass(this.options.grabClass, event.type === 'mousedown');

		this.speed(0);

		this._drag.time = new Date().getTime();
		this._drag.target = $(event.target);
		this._drag.stage.start = stage;
		this._drag.stage.current = stage;
		this._drag.pointer = this.pointer(event);

		$(document).on('mouseup.owl.core touchend.owl.core', $.proxy(this.onDragEnd, this));

		$(document).one('mousemove.owl.core touchmove.owl.core', $.proxy(function(event) {
			var delta = this.difference(this._drag.pointer, this.pointer(event));

			$(document).on('mousemove.owl.core touchmove.owl.core', $.proxy(this.onDragMove, this));

			if (Math.abs(delta.x) < Math.abs(delta.y) && this.is('valid')) {
				return;
			}

			event.preventDefault();

			this.enter('dragging');
			this.trigger('drag');
		}, this));
	};

	/**
	 * Handles the `touchmove` and `mousemove` events.
	 * @todo #261
	 * @protected
	 * @param {Event} event - The event arguments.
	 */
	Owl.prototype.onDragMove = function(event) {
		var minimum = null,
			maximum = null,
			pull = null,
			delta = this.difference(this._drag.pointer, this.pointer(event)),
			stage = this.difference(this._drag.stage.start, delta);

		if (!this.is('dragging')) {
			return;
		}

		event.preventDefault();

		if (this.settings.loop) {
			minimum = this.coordinates(this.minimum());
			maximum = this.coordinates(this.maximum() + 1) - minimum;
			stage.x = (((stage.x - minimum) % maximum + maximum) % maximum) + minimum;
		} else {
			minimum = this.settings.rtl ? this.coordinates(this.maximum()) : this.coordinates(this.minimum());
			maximum = this.settings.rtl ? this.coordinates(this.minimum()) : this.coordinates(this.maximum());
			pull = this.settings.pullDrag ? -1 * delta.x / 5 : 0;
			stage.x = Math.max(Math.min(stage.x, minimum + pull), maximum + pull);
		}

		this._drag.stage.current = stage;

		this.animate(stage.x);
	};

	/**
	 * Handles the `touchend` and `mouseup` events.
	 * @todo #261
	 * @todo Threshold for click event
	 * @protected
	 * @param {Event} event - The event arguments.
	 */
	Owl.prototype.onDragEnd = function(event) {
		var delta = this.difference(this._drag.pointer, this.pointer(event)),
			stage = this._drag.stage.current,
			direction = delta.x > 0 ^ this.settings.rtl ? 'left' : 'right';

		$(document).off('.owl.core');

		this.$element.removeClass(this.options.grabClass);

		if (delta.x !== 0 && this.is('dragging') || !this.is('valid')) {
			this.speed(this.settings.dragEndSpeed || this.settings.smartSpeed);
			this.current(this.closest(stage.x, delta.x !== 0 ? direction : this._drag.direction));
			this.invalidate('position');
			this.update();

			this._drag.direction = direction;

			if (Math.abs(delta.x) > 3 || new Date().getTime() - this._drag.time > 300) {
				this._drag.target.one('click.owl.core', function() { return false; });
			}
		}

		if (!this.is('dragging')) {
			return;
		}

		this.leave('dragging');
		this.trigger('dragged');
	};

	/**
	 * Gets absolute position of the closest item for a coordinate.
	 * @todo Setting `freeDrag` makes `closest` not reusable. See #165.
	 * @protected
	 * @param {Number} coordinate - The coordinate in pixel.
	 * @param {String} direction - The direction to check for the closest item. Ether `left` or `right`.
	 * @return {Number} - The absolute position of the closest item.
	 */
	Owl.prototype.closest = function(coordinate, direction) {
		var position = -1,
			pull = 30,
			width = this.width(),
			coordinates = this.coordinates();

		if (!this.settings.freeDrag) {
			// check closest item
			$.each(coordinates, $.proxy(function(index, value) {
				// on a left pull, check on current index
				if (direction === 'left' && coordinate > value - pull && coordinate < value + pull) {
					position = index;
				// on a right pull, check on previous index
				// to do so, subtract width from value and set position = index + 1
				} else if (direction === 'right' && coordinate > value - width - pull && coordinate < value - width + pull) {
					position = index + 1;
				} else if (this.op(coordinate, '<', value)
					&& this.op(coordinate, '>', coordinates[index + 1] !== undefined ? coordinates[index + 1] : value - width)) {
					position = direction === 'left' ? index + 1 : index;
				}
				return position === -1;
			}, this));
		}

		if (!this.settings.loop) {
			// non loop boundries
			if (this.op(coordinate, '>', coordinates[this.minimum()])) {
				position = coordinate = this.minimum();
			} else if (this.op(coordinate, '<', coordinates[this.maximum()])) {
				position = coordinate = this.maximum();
			}
		}

		return position;
	};

	/**
	 * Animates the stage.
	 * @todo #270
	 * @public
	 * @param {Number} coordinate - The coordinate in pixels.
	 */
	Owl.prototype.animate = function(coordinate) {
		var animate = this.speed() > 0;

		this.is('animating') && this.onTransitionEnd();

		if (animate) {
			this.enter('animating');
			this.trigger('translate');
		}

		if ($.support.transform3d && $.support.transition) {
			this.$stage.css({
				transform: 'translate3d(' + coordinate + 'px,0px,0px)',
				transition: (this.speed() / 1000) + 's' + (
					this.settings.slideTransition ? ' ' + this.settings.slideTransition : ''
				)
			});
		} else if (animate) {
			this.$stage.animate({
				left: coordinate + 'px'
			}, this.speed(), this.settings.fallbackEasing, $.proxy(this.onTransitionEnd, this));
		} else {
			this.$stage.css({
				left: coordinate + 'px'
			});
		}
	};

	/**
	 * Checks whether the carousel is in a specific state or not.
	 * @param {String} state - The state to check.
	 * @returns {Boolean} - The flag which indicates if the carousel is busy.
	 */
	Owl.prototype.is = function(state) {
		return this._states.current[state] && this._states.current[state] > 0;
	};

	/**
	 * Sets the absolute position of the current item.
	 * @public
	 * @param {Number} [position] - The new absolute position or nothing to leave it unchanged.
	 * @returns {Number} - The absolute position of the current item.
	 */
	Owl.prototype.current = function(position) {
		if (position === undefined) {
			return this._current;
		}

		if (this._items.length === 0) {
			return undefined;
		}

		position = this.normalize(position);

		if (this._current !== position) {
			var event = this.trigger('change', { property: { name: 'position', value: position } });

			if (event.data !== undefined) {
				position = this.normalize(event.data);
			}

			this._current = position;

			this.invalidate('position');

			this.trigger('changed', { property: { name: 'position', value: this._current } });
		}

		return this._current;
	};

	/**
	 * Invalidates the given part of the update routine.
	 * @param {String} [part] - The part to invalidate.
	 * @returns {Array.<String>} - The invalidated parts.
	 */
	Owl.prototype.invalidate = function(part) {
		if ($.type(part) === 'string') {
			this._invalidated[part] = true;
			this.is('valid') && this.leave('valid');
		}
		return $.map(this._invalidated, function(v, i) { return i });
	};

	/**
	 * Resets the absolute position of the current item.
	 * @public
	 * @param {Number} position - The absolute position of the new item.
	 */
	Owl.prototype.reset = function(position) {
		position = this.normalize(position);

		if (position === undefined) {
			return;
		}

		this._speed = 0;
		this._current = position;

		this.suppress([ 'translate', 'translated' ]);

		this.animate(this.coordinates(position));

		this.release([ 'translate', 'translated' ]);
	};

	/**
	 * Normalizes an absolute or a relative position of an item.
	 * @public
	 * @param {Number} position - The absolute or relative position to normalize.
	 * @param {Boolean} [relative=false] - Whether the given position is relative or not.
	 * @returns {Number} - The normalized position.
	 */
	Owl.prototype.normalize = function(position, relative) {
		var n = this._items.length,
			m = relative ? 0 : this._clones.length;

		if (!this.isNumeric(position) || n < 1) {
			position = undefined;
		} else if (position < 0 || position >= n + m) {
			position = ((position - m / 2) % n + n) % n + m / 2;
		}

		return position;
	};

	/**
	 * Converts an absolute position of an item into a relative one.
	 * @public
	 * @param {Number} position - The absolute position to convert.
	 * @returns {Number} - The converted position.
	 */
	Owl.prototype.relative = function(position) {
		position -= this._clones.length / 2;
		return this.normalize(position, true);
	};

	/**
	 * Gets the maximum position for the current item.
	 * @public
	 * @param {Boolean} [relative=false] - Whether to return an absolute position or a relative position.
	 * @returns {Number}
	 */
	Owl.prototype.maximum = function(relative) {
		var settings = this.settings,
			maximum = this._coordinates.length,
			iterator,
			reciprocalItemsWidth,
			elementWidth;

		if (settings.loop) {
			maximum = this._clones.length / 2 + this._items.length - 1;
		} else if (settings.autoWidth || settings.merge) {
			iterator = this._items.length;
			if (iterator) {
				reciprocalItemsWidth = this._items[--iterator].width();
				elementWidth = this.$element.width();
				while (iterator--) {
					reciprocalItemsWidth += this._items[iterator].width() + this.settings.margin;
					if (reciprocalItemsWidth > elementWidth) {
						break;
					}
				}
			}
			maximum = iterator + 1;
		} else if (settings.center) {
			maximum = this._items.length - 1;
		} else {
			maximum = this._items.length - settings.items;
		}

		if (relative) {
			maximum -= this._clones.length / 2;
		}

		return Math.max(maximum, 0);
	};

	/**
	 * Gets the minimum position for the current item.
	 * @public
	 * @param {Boolean} [relative=false] - Whether to return an absolute position or a relative position.
	 * @returns {Number}
	 */
	Owl.prototype.minimum = function(relative) {
		return relative ? 0 : this._clones.length / 2;
	};

	/**
	 * Gets an item at the specified relative position.
	 * @public
	 * @param {Number} [position] - The relative position of the item.
	 * @return {jQuery|Array.<jQuery>} - The item at the given position or all items if no position was given.
	 */
	Owl.prototype.items = function(position) {
		if (position === undefined) {
			return this._items.slice();
		}

		position = this.normalize(position, true);
		return this._items[position];
	};

	/**
	 * Gets an item at the specified relative position.
	 * @public
	 * @param {Number} [position] - The relative position of the item.
	 * @return {jQuery|Array.<jQuery>} - The item at the given position or all items if no position was given.
	 */
	Owl.prototype.mergers = function(position) {
		if (position === undefined) {
			return this._mergers.slice();
		}

		position = this.normalize(position, true);
		return this._mergers[position];
	};

	/**
	 * Gets the absolute positions of clones for an item.
	 * @public
	 * @param {Number} [position] - The relative position of the item.
	 * @returns {Array.<Number>} - The absolute positions of clones for the item or all if no position was given.
	 */
	Owl.prototype.clones = function(position) {
		var odd = this._clones.length / 2,
			even = odd + this._items.length,
			map = function(index) { return index % 2 === 0 ? even + index / 2 : odd - (index + 1) / 2 };

		if (position === undefined) {
			return $.map(this._clones, function(v, i) { return map(i) });
		}

		return $.map(this._clones, function(v, i) { return v === position ? map(i) : null });
	};

	/**
	 * Sets the current animation speed.
	 * @public
	 * @param {Number} [speed] - The animation speed in milliseconds or nothing to leave it unchanged.
	 * @returns {Number} - The current animation speed in milliseconds.
	 */
	Owl.prototype.speed = function(speed) {
		if (speed !== undefined) {
			this._speed = speed;
		}

		return this._speed;
	};

	/**
	 * Gets the coordinate of an item.
	 * @todo The name of this method is missleanding.
	 * @public
	 * @param {Number} position - The absolute position of the item within `minimum()` and `maximum()`.
	 * @returns {Number|Array.<Number>} - The coordinate of the item in pixel or all coordinates.
	 */
	Owl.prototype.coordinates = function(position) {
		var multiplier = 1,
			newPosition = position - 1,
			coordinate;

		if (position === undefined) {
			return $.map(this._coordinates, $.proxy(function(coordinate, index) {
				return this.coordinates(index);
			}, this));
		}

		if (this.settings.center) {
			if (this.settings.rtl) {
				multiplier = -1;
				newPosition = position + 1;
			}

			coordinate = this._coordinates[position];
			coordinate += (this.width() - coordinate + (this._coordinates[newPosition] || 0)) / 2 * multiplier;
		} else {
			coordinate = this._coordinates[newPosition] || 0;
		}

		coordinate = Math.ceil(coordinate);

		return coordinate;
	};

	/**
	 * Calculates the speed for a translation.
	 * @protected
	 * @param {Number} from - The absolute position of the start item.
	 * @param {Number} to - The absolute position of the target item.
	 * @param {Number} [factor=undefined] - The time factor in milliseconds.
	 * @returns {Number} - The time in milliseconds for the translation.
	 */
	Owl.prototype.duration = function(from, to, factor) {
		if (factor === 0) {
			return 0;
		}

		return Math.min(Math.max(Math.abs(to - from), 1), 6) * Math.abs((factor || this.settings.smartSpeed));
	};

	/**
	 * Slides to the specified item.
	 * @public
	 * @param {Number} position - The position of the item.
	 * @param {Number} [speed] - The time in milliseconds for the transition.
	 */
	Owl.prototype.to = function(position, speed) {
		var current = this.current(),
			revert = null,
			distance = position - this.relative(current),
			direction = (distance > 0) - (distance < 0),
			items = this._items.length,
			minimum = this.minimum(),
			maximum = this.maximum();

		if (this.settings.loop) {
			if (!this.settings.rewind && Math.abs(distance) > items / 2) {
				distance += direction * -1 * items;
			}

			position = current + distance;
			revert = ((position - minimum) % items + items) % items + minimum;

			if (revert !== position && revert - distance <= maximum && revert - distance > 0) {
				current = revert - distance;
				position = revert;
				this.reset(current);
			}
		} else if (this.settings.rewind) {
			maximum += 1;
			position = (position % maximum + maximum) % maximum;
		} else {
			position = Math.max(minimum, Math.min(maximum, position));
		}

		this.speed(this.duration(current, position, speed));
		this.current(position);

		if (this.isVisible()) {
			this.update();
		}
	};

	/**
	 * Slides to the next item.
	 * @public
	 * @param {Number} [speed] - The time in milliseconds for the transition.
	 */
	Owl.prototype.next = function(speed) {
		speed = speed || false;
		this.to(this.relative(this.current()) + 1, speed);
	};

	/**
	 * Slides to the previous item.
	 * @public
	 * @param {Number} [speed] - The time in milliseconds for the transition.
	 */
	Owl.prototype.prev = function(speed) {
		speed = speed || false;
		this.to(this.relative(this.current()) - 1, speed);
	};

	/**
	 * Handles the end of an animation.
	 * @protected
	 * @param {Event} event - The event arguments.
	 */
	Owl.prototype.onTransitionEnd = function(event) {

		// if css2 animation then event object is undefined
		if (event !== undefined) {
			event.stopPropagation();

			// Catch only owl-stage transitionEnd event
			if ((event.target || event.srcElement || event.originalTarget) !== this.$stage.get(0)) {
				return false;
			}
		}

		this.leave('animating');
		this.trigger('translated');
	};

	/**
	 * Gets viewport width.
	 * @protected
	 * @return {Number} - The width in pixel.
	 */
	Owl.prototype.viewport = function() {
		var width;
		if (this.options.responsiveBaseElement !== window) {
			width = $(this.options.responsiveBaseElement).width();
		} else if (window.innerWidth) {
			width = window.innerWidth;
		} else if (document.documentElement && document.documentElement.clientWidth) {
			width = document.documentElement.clientWidth;
		} else {
			console.warn('Can not detect viewport width.');
		}
		return width;
	};

	/**
	 * Replaces the current content.
	 * @public
	 * @param {HTMLElement|jQuery|String} content - The new content.
	 */
	Owl.prototype.replace = function(content) {
		this.$stage.empty();
		this._items = [];

		if (content) {
			content = (content instanceof jQuery) ? content : $(content);
		}

		if (this.settings.nestedItemSelector) {
			content = content.find('.' + this.settings.nestedItemSelector);
		}

		content.filter(function() {
			return this.nodeType === 1;
		}).each($.proxy(function(index, item) {
			item = this.prepare(item);
			this.$stage.append(item);
			this._items.push(item);
			this._mergers.push(item.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
		}, this));

		this.reset(this.isNumeric(this.settings.startPosition) ? this.settings.startPosition : 0);

		this.invalidate('items');
	};

	/**
	 * Adds an item.
	 * @todo Use `item` instead of `content` for the event arguments.
	 * @public
	 * @param {HTMLElement|jQuery|String} content - The item content to add.
	 * @param {Number} [position] - The relative position at which to insert the item otherwise the item will be added to the end.
	 */
	Owl.prototype.add = function(content, position) {
		var current = this.relative(this._current);

		position = position === undefined ? this._items.length : this.normalize(position, true);
		content = content instanceof jQuery ? content : $(content);

		this.trigger('add', { content: content, position: position });

		content = this.prepare(content);

		if (this._items.length === 0 || position === this._items.length) {
			this._items.length === 0 && this.$stage.append(content);
			this._items.length !== 0 && this._items[position - 1].after(content);
			this._items.push(content);
			this._mergers.push(content.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
		} else {
			this._items[position].before(content);
			this._items.splice(position, 0, content);
			this._mergers.splice(position, 0, content.find('[data-merge]').addBack('[data-merge]').attr('data-merge') * 1 || 1);
		}

		this._items[current] && this.reset(this._items[current].index());

		this.invalidate('items');

		this.trigger('added', { content: content, position: position });
	};

	/**
	 * Removes an item by its position.
	 * @todo Use `item` instead of `content` for the event arguments.
	 * @public
	 * @param {Number} position - The relative position of the item to remove.
	 */
	Owl.prototype.remove = function(position) {
		position = this.normalize(position, true);

		if (position === undefined) {
			return;
		}

		this.trigger('remove', { content: this._items[position], position: position });

		this._items[position].remove();
		this._items.splice(position, 1);
		this._mergers.splice(position, 1);

		this.invalidate('items');

		this.trigger('removed', { content: null, position: position });
	};

	/**
	 * Preloads images with auto width.
	 * @todo Replace by a more generic approach
	 * @protected
	 */
	Owl.prototype.preloadAutoWidthImages = function(images) {
		images.each($.proxy(function(i, element) {
			this.enter('pre-loading');
			element = $(element);
			$(new Image()).one('load', $.proxy(function(e) {
				element.attr('src', e.target.src);
				element.css('opacity', 1);
				this.leave('pre-loading');
				!this.is('pre-loading') && !this.is('initializing') && this.refresh();
			}, this)).attr('src', element.attr('src') || element.attr('data-src') || element.attr('data-src-retina'));
		}, this));
	};

	/**
	 * Destroys the carousel.
	 * @public
	 */
	Owl.prototype.destroy = function() {

		this.$element.off('.owl.core');
		this.$stage.off('.owl.core');
		$(document).off('.owl.core');

		if (this.settings.responsive !== false) {
			window.clearTimeout(this.resizeTimer);
			this.off(window, 'resize', this._handlers.onThrottledResize);
		}

		for (var i in this._plugins) {
			this._plugins[i].destroy();
		}

		this.$stage.children('.cloned').remove();

		this.$stage.unwrap();
		this.$stage.children().contents().unwrap();
		this.$stage.children().unwrap();
		this.$stage.remove();
		this.$element
			.removeClass(this.options.refreshClass)
			.removeClass(this.options.loadingClass)
			.removeClass(this.options.loadedClass)
			.removeClass(this.options.rtlClass)
			.removeClass(this.options.dragClass)
			.removeClass(this.options.grabClass)
			.attr('class', this.$element.attr('class').replace(new RegExp(this.options.responsiveClass + '-\\S+\\s', 'g'), ''))
			.removeData('owl.carousel');
	};

	/**
	 * Operators to calculate right-to-left and left-to-right.
	 * @protected
	 * @param {Number} [a] - The left side operand.
	 * @param {String} [o] - The operator.
	 * @param {Number} [b] - The right side operand.
	 */
	Owl.prototype.op = function(a, o, b) {
		var rtl = this.settings.rtl;
		switch (o) {
			case '<':
				return rtl ? a > b : a < b;
			case '>':
				return rtl ? a < b : a > b;
			case '>=':
				return rtl ? a <= b : a >= b;
			case '<=':
				return rtl ? a >= b : a <= b;
			default:
				break;
		}
	};

	/**
	 * Attaches to an internal event.
	 * @protected
	 * @param {HTMLElement} element - The event source.
	 * @param {String} event - The event name.
	 * @param {Function} listener - The event handler to attach.
	 * @param {Boolean} capture - Wether the event should be handled at the capturing phase or not.
	 */
	Owl.prototype.on = function(element, event, listener, capture) {
		if (element.addEventListener) {
			element.addEventListener(event, listener, capture);
		} else if (element.attachEvent) {
			element.attachEvent('on' + event, listener);
		}
	};

	/**
	 * Detaches from an internal event.
	 * @protected
	 * @param {HTMLElement} element - The event source.
	 * @param {String} event - The event name.
	 * @param {Function} listener - The attached event handler to detach.
	 * @param {Boolean} capture - Wether the attached event handler was registered as a capturing listener or not.
	 */
	Owl.prototype.off = function(element, event, listener, capture) {
		if (element.removeEventListener) {
			element.removeEventListener(event, listener, capture);
		} else if (element.detachEvent) {
			element.detachEvent('on' + event, listener);
		}
	};

	/**
	 * Triggers a public event.
	 * @todo Remove `status`, `relatedTarget` should be used instead.
	 * @protected
	 * @param {String} name - The event name.
	 * @param {*} [data=null] - The event data.
	 * @param {String} [namespace=carousel] - The event namespace.
	 * @param {String} [state] - The state which is associated with the event.
	 * @param {Boolean} [enter=false] - Indicates if the call enters the specified state or not.
	 * @returns {Event} - The event arguments.
	 */
	Owl.prototype.trigger = function(name, data, namespace, state, enter) {
		var status = {
			item: { count: this._items.length, index: this.current() }
		}, handler = $.camelCase(
			$.grep([ 'on', name, namespace ], function(v) { return v })
				.join('-').toLowerCase()
		), event = $.Event(
			[ name, 'owl', namespace || 'carousel' ].join('.').toLowerCase(),
			$.extend({ relatedTarget: this }, status, data)
		);

		if (!this._supress[name]) {
			$.each(this._plugins, function(name, plugin) {
				if (plugin.onTrigger) {
					plugin.onTrigger(event);
				}
			});

			this.register({ type: Owl.Type.Event, name: name });
			this.$element.trigger(event);

			if (this.settings && typeof this.settings[handler] === 'function') {
				this.settings[handler].call(this, event);
			}
		}

		return event;
	};

	/**
	 * Enters a state.
	 * @param name - The state name.
	 */
	Owl.prototype.enter = function(name) {
		$.each([ name ].concat(this._states.tags[name] || []), $.proxy(function(i, name) {
			if (this._states.current[name] === undefined) {
				this._states.current[name] = 0;
			}

			this._states.current[name]++;
		}, this));
	};

	/**
	 * Leaves a state.
	 * @param name - The state name.
	 */
	Owl.prototype.leave = function(name) {
		$.each([ name ].concat(this._states.tags[name] || []), $.proxy(function(i, name) {
			this._states.current[name]--;
		}, this));
	};

	/**
	 * Registers an event or state.
	 * @public
	 * @param {Object} object - The event or state to register.
	 */
	Owl.prototype.register = function(object) {
		if (object.type === Owl.Type.Event) {
			if (!$.event.special[object.name]) {
				$.event.special[object.name] = {};
			}

			if (!$.event.special[object.name].owl) {
				var _default = $.event.special[object.name]._default;
				$.event.special[object.name]._default = function(e) {
					if (_default && _default.apply && (!e.namespace || e.namespace.indexOf('owl') === -1)) {
						return _default.apply(this, arguments);
					}
					return e.namespace && e.namespace.indexOf('owl') > -1;
				};
				$.event.special[object.name].owl = true;
			}
		} else if (object.type === Owl.Type.State) {
			if (!this._states.tags[object.name]) {
				this._states.tags[object.name] = object.tags;
			} else {
				this._states.tags[object.name] = this._states.tags[object.name].concat(object.tags);
			}

			this._states.tags[object.name] = $.grep(this._states.tags[object.name], $.proxy(function(tag, i) {
				return $.inArray(tag, this._states.tags[object.name]) === i;
			}, this));
		}
	};

	/**
	 * Suppresses events.
	 * @protected
	 * @param {Array.<String>} events - The events to suppress.
	 */
	Owl.prototype.suppress = function(events) {
		$.each(events, $.proxy(function(index, event) {
			this._supress[event] = true;
		}, this));
	};

	/**
	 * Releases suppressed events.
	 * @protected
	 * @param {Array.<String>} events - The events to release.
	 */
	Owl.prototype.release = function(events) {
		$.each(events, $.proxy(function(index, event) {
			delete this._supress[event];
		}, this));
	};

	/**
	 * Gets unified pointer coordinates from event.
	 * @todo #261
	 * @protected
	 * @param {Event} - The `mousedown` or `touchstart` event.
	 * @returns {Object} - Contains `x` and `y` coordinates of current pointer position.
	 */
	Owl.prototype.pointer = function(event) {
		var result = { x: null, y: null };

		event = event.originalEvent || event || window.event;

		event = event.touches && event.touches.length ?
			event.touches[0] : event.changedTouches && event.changedTouches.length ?
				event.changedTouches[0] : event;

		if (event.pageX) {
			result.x = event.pageX;
			result.y = event.pageY;
		} else {
			result.x = event.clientX;
			result.y = event.clientY;
		}

		return result;
	};

	/**
	 * Determines if the input is a Number or something that can be coerced to a Number
	 * @protected
	 * @param {Number|String|Object|Array|Boolean|RegExp|Function|Symbol} - The input to be tested
	 * @returns {Boolean} - An indication if the input is a Number or can be coerced to a Number
	 */
	Owl.prototype.isNumeric = function(number) {
		return !isNaN(parseFloat(number));
	};

	/**
	 * Gets the difference of two vectors.
	 * @todo #261
	 * @protected
	 * @param {Object} - The first vector.
	 * @param {Object} - The second vector.
	 * @returns {Object} - The difference.
	 */
	Owl.prototype.difference = function(first, second) {
		return {
			x: first.x - second.x,
			y: first.y - second.y
		};
	};

	/**
	 * The jQuery Plugin for the Owl Carousel
	 * @todo Navigation plugin `next` and `prev`
	 * @public
	 */
	$.fn.owlCarousel = function(option) {
		var args = Array.prototype.slice.call(arguments, 1);

		return this.each(function() {
			var $this = $(this),
				data = $this.data('owl.carousel');

			if (!data) {
				data = new Owl(this, typeof option == 'object' && option);
				$this.data('owl.carousel', data);

				$.each([
					'next', 'prev', 'to', 'destroy', 'refresh', 'replace', 'add', 'remove'
				], function(i, event) {
					data.register({ type: Owl.Type.Event, name: event });
					data.$element.on(event + '.owl.carousel.core', $.proxy(function(e) {
						if (e.namespace && e.relatedTarget !== this) {
							this.suppress([ event ]);
							data[event].apply(this, [].slice.call(arguments, 1));
							this.release([ event ]);
						}
					}, data));
				});
			}

			if (typeof option == 'string' && option.charAt(0) !== '_') {
				data[option].apply(data, args);
			}
		});
	};

	/**
	 * The constructor for the jQuery Plugin
	 * @public
	 */
	$.fn.owlCarousel.Constructor = Owl;

})(window.Zepto || __webpack_provided_window_dot_jQuery, window, document);

/**
 * AutoRefresh Plugin
 * @version 2.3.4
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the auto refresh plugin.
	 * @class The Auto Refresh Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var AutoRefresh = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Refresh interval.
		 * @protected
		 * @type {number}
		 */
		this._interval = null;

		/**
		 * Whether the element is currently visible or not.
		 * @protected
		 * @type {Boolean}
		 */
		this._visible = null;

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.autoRefresh) {
					this.watch();
				}
			}, this)
		};

		// set default options
		this._core.options = $.extend({}, AutoRefresh.Defaults, this._core.options);

		// register event handlers
		this._core.$element.on(this._handlers);
	};

	/**
	 * Default options.
	 * @public
	 */
	AutoRefresh.Defaults = {
		autoRefresh: true,
		autoRefreshInterval: 500
	};

	/**
	 * Watches the element.
	 */
	AutoRefresh.prototype.watch = function() {
		if (this._interval) {
			return;
		}

		this._visible = this._core.isVisible();
		this._interval = window.setInterval($.proxy(this.refresh, this), this._core.settings.autoRefreshInterval);
	};

	/**
	 * Refreshes the element.
	 */
	AutoRefresh.prototype.refresh = function() {
		if (this._core.isVisible() === this._visible) {
			return;
		}

		this._visible = !this._visible;

		this._core.$element.toggleClass('owl-hidden', !this._visible);

		this._visible && (this._core.invalidate('width') && this._core.refresh());
	};

	/**
	 * Destroys the plugin.
	 */
	AutoRefresh.prototype.destroy = function() {
		var handler, property;

		window.clearInterval(this._interval);

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.AutoRefresh = AutoRefresh;

})(window.Zepto || __webpack_provided_window_dot_jQuery, window, document);

/**
 * Lazy Plugin
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the lazy plugin.
	 * @class The Lazy Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var Lazy = function(carousel) {

		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Already loaded items.
		 * @protected
		 * @type {Array.<jQuery>}
		 */
		this._loaded = [];

		/**
		 * Event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel change.owl.carousel resized.owl.carousel': $.proxy(function(e) {
				if (!e.namespace) {
					return;
				}

				if (!this._core.settings || !this._core.settings.lazyLoad) {
					return;
				}

				if ((e.property && e.property.name == 'position') || e.type == 'initialized') {
					var settings = this._core.settings,
						n = (settings.center && Math.ceil(settings.items / 2) || settings.items),
						i = ((settings.center && n * -1) || 0),
						position = (e.property && e.property.value !== undefined ? e.property.value : this._core.current()) + i,
						clones = this._core.clones().length,
						load = $.proxy(function(i, v) { this.load(v) }, this);
					//TODO: Need documentation for this new option
					if (settings.lazyLoadEager > 0) {
						n += settings.lazyLoadEager;
						// If the carousel is looping also preload images that are to the "left"
						if (settings.loop) {
              position -= settings.lazyLoadEager;
              n++;
            }
					}

					while (i++ < n) {
						this.load(clones / 2 + this._core.relative(position));
						clones && $.each(this._core.clones(this._core.relative(position)), load);
						position++;
					}
				}
			}, this)
		};

		// set the default options
		this._core.options = $.extend({}, Lazy.Defaults, this._core.options);

		// register event handler
		this._core.$element.on(this._handlers);
	};

	/**
	 * Default options.
	 * @public
	 */
	Lazy.Defaults = {
		lazyLoad: false,
		lazyLoadEager: 0
	};

	/**
	 * Loads all resources of an item at the specified position.
	 * @param {Number} position - The absolute position of the item.
	 * @protected
	 */
	Lazy.prototype.load = function(position) {
		var $item = this._core.$stage.children().eq(position),
			$elements = $item && $item.find('.owl-lazy');

		if (!$elements || $.inArray($item.get(0), this._loaded) > -1) {
			return;
		}

		$elements.each($.proxy(function(index, element) {
			var $element = $(element), image,
                url = (window.devicePixelRatio > 1 && $element.attr('data-src-retina')) || $element.attr('data-src') || $element.attr('data-srcset');

			this._core.trigger('load', { element: $element, url: url }, 'lazy');

			if ($element.is('img')) {
				$element.one('load.owl.lazy', $.proxy(function() {
					$element.css('opacity', 1);
					this._core.trigger('loaded', { element: $element, url: url }, 'lazy');
				}, this)).attr('src', url);
            } else if ($element.is('source')) {
                $element.one('load.owl.lazy', $.proxy(function() {
                    this._core.trigger('loaded', { element: $element, url: url }, 'lazy');
                }, this)).attr('srcset', url);
			} else {
				image = new Image();
				image.onload = $.proxy(function() {
					$element.css({
						'background-image': 'url("' + url + '")',
						'opacity': '1'
					});
					this._core.trigger('loaded', { element: $element, url: url }, 'lazy');
				}, this);
				image.src = url;
			}
		}, this));

		this._loaded.push($item.get(0));
	};

	/**
	 * Destroys the plugin.
	 * @public
	 */
	Lazy.prototype.destroy = function() {
		var handler, property;

		for (handler in this.handlers) {
			this._core.$element.off(handler, this.handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Lazy = Lazy;

})(window.Zepto || __webpack_provided_window_dot_jQuery, window, document);

/**
 * AutoHeight Plugin
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the auto height plugin.
	 * @class The Auto Height Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var AutoHeight = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		this._previousHeight = null;

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel refreshed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.autoHeight) {
					this.update();
				}
			}, this),
			'changed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.autoHeight && e.property.name === 'position'){
					this.update();
				}
			}, this),
			'loaded.owl.lazy': $.proxy(function(e) {
				if (e.namespace && this._core.settings.autoHeight
					&& e.element.closest('.' + this._core.settings.itemClass).index() === this._core.current()) {
					this.update();
				}
			}, this)
		};

		// set default options
		this._core.options = $.extend({}, AutoHeight.Defaults, this._core.options);

		// register event handlers
		this._core.$element.on(this._handlers);
		this._intervalId = null;
		var refThis = this;

		// These changes have been taken from a PR by gavrochelegnou proposed in #1575
		// and have been made compatible with the latest jQuery version
		$(window).on('load', function() {
			if (refThis._core.settings.autoHeight) {
				refThis.update();
			}
		});

		// Autoresize the height of the carousel when window is resized
		// When carousel has images, the height is dependent on the width
		// and should also change on resize
		$(window).resize(function() {
			if (refThis._core.settings.autoHeight) {
				if (refThis._intervalId != null) {
					clearTimeout(refThis._intervalId);
				}

				refThis._intervalId = setTimeout(function() {
					refThis.update();
				}, 250);
			}
		});

	};

	/**
	 * Default options.
	 * @public
	 */
	AutoHeight.Defaults = {
		autoHeight: false,
		autoHeightClass: 'owl-height'
	};

	/**
	 * Updates the view.
	 */
	AutoHeight.prototype.update = function() {
		var start = this._core._current,
			end = start + this._core.settings.items,
			lazyLoadEnabled = this._core.settings.lazyLoad,
			visible = this._core.$stage.children().toArray().slice(start, end),
			heights = [],
			maxheight = 0;

		$.each(visible, function(index, item) {
			heights.push($(item).height());
		});

		maxheight = Math.max.apply(null, heights);

		if (maxheight <= 1 && lazyLoadEnabled && this._previousHeight) {
			maxheight = this._previousHeight;
		}

		this._previousHeight = maxheight;

		this._core.$stage.parent()
			.height(maxheight)
			.addClass(this._core.settings.autoHeightClass);
	};

	AutoHeight.prototype.destroy = function() {
		var handler, property;

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] !== 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.AutoHeight = AutoHeight;

})(window.Zepto || __webpack_provided_window_dot_jQuery, window, document);

/**
 * Video Plugin
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the video plugin.
	 * @class The Video Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var Video = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Cache all video URLs.
		 * @protected
		 * @type {Object}
		 */
		this._videos = {};

		/**
		 * Current playing item.
		 * @protected
		 * @type {jQuery}
		 */
		this._playing = null;

		/**
		 * All event handlers.
		 * @todo The cloned content removale is too late
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel': $.proxy(function(e) {
				if (e.namespace) {
					this._core.register({ type: 'state', name: 'playing', tags: [ 'interacting' ] });
				}
			}, this),
			'resize.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.video && this.isInFullScreen()) {
					e.preventDefault();
				}
			}, this),
			'refreshed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.is('resizing')) {
					this._core.$stage.find('.cloned .owl-video-frame').remove();
				}
			}, this),
			'changed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && e.property.name === 'position' && this._playing) {
					this.stop();
				}
			}, this),
			'prepared.owl.carousel': $.proxy(function(e) {
				if (!e.namespace) {
					return;
				}

				var $element = $(e.content).find('.owl-video');

				if ($element.length) {
					$element.css('display', 'none');
					this.fetch($element, $(e.content));
				}
			}, this)
		};

		// set default options
		this._core.options = $.extend({}, Video.Defaults, this._core.options);

		// register event handlers
		this._core.$element.on(this._handlers);

		this._core.$element.on('click.owl.video', '.owl-video-play-icon', $.proxy(function(e) {
			this.play(e);
		}, this));
	};

	/**
	 * Default options.
	 * @public
	 */
	Video.Defaults = {
		video: false,
		videoHeight: false,
		videoWidth: false
	};

	/**
	 * Gets the video ID and the type (YouTube/Vimeo/vzaar only).
	 * @protected
	 * @param {jQuery} target - The target containing the video data.
	 * @param {jQuery} item - The item containing the video.
	 */
	Video.prototype.fetch = function(target, item) {
			var type = (function() {
					if (target.attr('data-vimeo-id')) {
						return 'vimeo';
					} else if (target.attr('data-vzaar-id')) {
						return 'vzaar'
					} else {
						return 'youtube';
					}
				})(),
				id = target.attr('data-vimeo-id') || target.attr('data-youtube-id') || target.attr('data-vzaar-id'),
				width = target.attr('data-width') || this._core.settings.videoWidth,
				height = target.attr('data-height') || this._core.settings.videoHeight,
				url = target.attr('href');

		if (url) {

			/*
					Parses the id's out of the following urls (and probably more):
					https://www.youtube.com/watch?v=:id
					https://youtu.be/:id
					https://vimeo.com/:id
					https://vimeo.com/channels/:channel/:id
					https://vimeo.com/groups/:group/videos/:id
					https://app.vzaar.com/videos/:id

					Visual example: https://regexper.com/#(http%3A%7Chttps%3A%7C)%5C%2F%5C%2F(player.%7Cwww.%7Capp.)%3F(vimeo%5C.com%7Cyoutu(be%5C.com%7C%5C.be%7Cbe%5C.googleapis%5C.com)%7Cvzaar%5C.com)%5C%2F(video%5C%2F%7Cvideos%5C%2F%7Cembed%5C%2F%7Cchannels%5C%2F.%2B%5C%2F%7Cgroups%5C%2F.%2B%5C%2F%7Cwatch%5C%3Fv%3D%7Cv%5C%2F)%3F(%5BA-Za-z0-9._%25-%5D*)(%5C%26%5CS%2B)%3F
			*/

			id = url.match(/(http:|https:|)\/\/(player.|www.|app.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com|be\-nocookie\.com)|vzaar\.com)\/(video\/|videos\/|embed\/|channels\/.+\/|groups\/.+\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/);

			if (id[3].indexOf('youtu') > -1) {
				type = 'youtube';
			} else if (id[3].indexOf('vimeo') > -1) {
				type = 'vimeo';
			} else if (id[3].indexOf('vzaar') > -1) {
				type = 'vzaar';
			} else {
				throw new Error('Video URL not supported.');
			}
			id = id[6];
		} else {
			throw new Error('Missing video URL.');
		}

		this._videos[url] = {
			type: type,
			id: id,
			width: width,
			height: height
		};

		item.attr('data-video', url);

		this.thumbnail(target, this._videos[url]);
	};

	/**
	 * Creates video thumbnail.
	 * @protected
	 * @param {jQuery} target - The target containing the video data.
	 * @param {Object} info - The video info object.
	 * @see `fetch`
	 */
	Video.prototype.thumbnail = function(target, video) {
		var tnLink,
			icon,
			path,
			dimensions = video.width && video.height ? 'width:' + video.width + 'px;height:' + video.height + 'px;' : '',
			customTn = target.find('img'),
			srcType = 'src',
			lazyClass = '',
			settings = this._core.settings,
			create = function(path) {
				icon = '<div class="owl-video-play-icon"></div>';

				if (settings.lazyLoad) {
					tnLink = $('<div/>',{
						"class": 'owl-video-tn ' + lazyClass,
						"srcType": path
					});
				} else {
					tnLink = $( '<div/>', {
						"class": "owl-video-tn",
						"style": 'opacity:1;background-image:url(' + path + ')'
					});
				}
				target.after(tnLink);
				target.after(icon);
			};

		// wrap video content into owl-video-wrapper div
		target.wrap( $( '<div/>', {
			"class": "owl-video-wrapper",
			"style": dimensions
		}));

		if (this._core.settings.lazyLoad) {
			srcType = 'data-src';
			lazyClass = 'owl-lazy';
		}

		// custom thumbnail
		if (customTn.length) {
			create(customTn.attr(srcType));
			customTn.remove();
			return false;
		}

		if (video.type === 'youtube') {
			path = "//img.youtube.com/vi/" + video.id + "/hqdefault.jpg";
			create(path);
		} else if (video.type === 'vimeo') {
			$.ajax({
				type: 'GET',
				url: '//vimeo.com/api/v2/video/' + video.id + '.json',
				jsonp: 'callback',
				dataType: 'jsonp',
				success: function(data) {
					path = data[0].thumbnail_large;
					create(path);
				}
			});
		} else if (video.type === 'vzaar') {
			$.ajax({
				type: 'GET',
				url: '//vzaar.com/api/videos/' + video.id + '.json',
				jsonp: 'callback',
				dataType: 'jsonp',
				success: function(data) {
					path = data.framegrab_url;
					create(path);
				}
			});
		}
	};

	/**
	 * Stops the current video.
	 * @public
	 */
	Video.prototype.stop = function() {
		this._core.trigger('stop', null, 'video');
		this._playing.find('.owl-video-frame').remove();
		this._playing.removeClass('owl-video-playing');
		this._playing = null;
		this._core.leave('playing');
		this._core.trigger('stopped', null, 'video');
	};

	/**
	 * Starts the current video.
	 * @public
	 * @param {Event} event - The event arguments.
	 */
	Video.prototype.play = function(event) {
		var target = $(event.target),
			item = target.closest('.' + this._core.settings.itemClass),
			video = this._videos[item.attr('data-video')],
			width = video.width || '100%',
			height = video.height || this._core.$stage.height(),
			html,
			iframe;

		if (this._playing) {
			return;
		}

		this._core.enter('playing');
		this._core.trigger('play', null, 'video');

		item = this._core.items(this._core.relative(item.index()));

		this._core.reset(item.index());

		html = $( '<iframe frameborder="0" allowfullscreen mozallowfullscreen webkitAllowFullScreen ></iframe>' );
		html.attr( 'height', height );
		html.attr( 'width', width );
		if (video.type === 'youtube') {
			html.attr( 'src', '//www.youtube.com/embed/' + video.id + '?autoplay=1&rel=0&v=' + video.id );
		} else if (video.type === 'vimeo') {
			html.attr( 'src', '//player.vimeo.com/video/' + video.id + '?autoplay=1' );
		} else if (video.type === 'vzaar') {
			html.attr( 'src', '//view.vzaar.com/' + video.id + '/player?autoplay=true' );
		}

		iframe = $(html).wrap( '<div class="owl-video-frame" />' ).insertAfter(item.find('.owl-video'));

		this._playing = item.addClass('owl-video-playing');
	};

	/**
	 * Checks whether an video is currently in full screen mode or not.
	 * @todo Bad style because looks like a readonly method but changes members.
	 * @protected
	 * @returns {Boolean}
	 */
	Video.prototype.isInFullScreen = function() {
		var element = document.fullscreenElement || document.mozFullScreenElement ||
				document.webkitFullscreenElement;

		return element && $(element).parent().hasClass('owl-video-frame');
	};

	/**
	 * Destroys the plugin.
	 */
	Video.prototype.destroy = function() {
		var handler, property;

		this._core.$element.off('click.owl.video');

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Video = Video;

})(window.Zepto || __webpack_provided_window_dot_jQuery, window, document);

/**
 * Animate Plugin
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the animate plugin.
	 * @class The Navigation Plugin
	 * @param {Owl} scope - The Owl Carousel
	 */
	var Animate = function(scope) {
		this.core = scope;
		this.core.options = $.extend({}, Animate.Defaults, this.core.options);
		this.swapping = true;
		this.previous = undefined;
		this.next = undefined;

		this.handlers = {
			'change.owl.carousel': $.proxy(function(e) {
				if (e.namespace && e.property.name == 'position') {
					this.previous = this.core.current();
					this.next = e.property.value;
				}
			}, this),
			'drag.owl.carousel dragged.owl.carousel translated.owl.carousel': $.proxy(function(e) {
				if (e.namespace) {
					this.swapping = e.type == 'translated';
				}
			}, this),
			'translate.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this.swapping && (this.core.options.animateOut || this.core.options.animateIn)) {
					this.swap();
				}
			}, this)
		};

		this.core.$element.on(this.handlers);
	};

	/**
	 * Default options.
	 * @public
	 */
	Animate.Defaults = {
		animateOut: false,
		animateIn: false
	};

	/**
	 * Toggles the animation classes whenever an translations starts.
	 * @protected
	 * @returns {Boolean|undefined}
	 */
	Animate.prototype.swap = function() {

		if (this.core.settings.items !== 1) {
			return;
		}

		if (!$.support.animation || !$.support.transition) {
			return;
		}

		this.core.speed(0);

		var left,
			clear = $.proxy(this.clear, this),
			previous = this.core.$stage.children().eq(this.previous),
			next = this.core.$stage.children().eq(this.next),
			incoming = this.core.settings.animateIn,
			outgoing = this.core.settings.animateOut;

		if (this.core.current() === this.previous) {
			return;
		}

		if (outgoing) {
			left = this.core.coordinates(this.previous) - this.core.coordinates(this.next);
			previous.one($.support.animation.end, clear)
				.css( { 'left': left + 'px' } )
				.addClass('animated owl-animated-out')
				.addClass(outgoing);
		}

		if (incoming) {
			next.one($.support.animation.end, clear)
				.addClass('animated owl-animated-in')
				.addClass(incoming);
		}
	};

	Animate.prototype.clear = function(e) {
		$(e.target).css( { 'left': '' } )
			.removeClass('animated owl-animated-out owl-animated-in')
			.removeClass(this.core.settings.animateIn)
			.removeClass(this.core.settings.animateOut);
		this.core.onTransitionEnd();
	};

	/**
	 * Destroys the plugin.
	 * @public
	 */
	Animate.prototype.destroy = function() {
		var handler, property;

		for (handler in this.handlers) {
			this.core.$element.off(handler, this.handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Animate = Animate;

})(window.Zepto || __webpack_provided_window_dot_jQuery, window, document);

/**
 * Autoplay Plugin
 * @version 2.3.4
 * @author Bartosz Wojciechowski
 * @author Artus Kolanowski
 * @author David Deutsch
 * @author Tom De Caluwé
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	/**
	 * Creates the autoplay plugin.
	 * @class The Autoplay Plugin
	 * @param {Owl} scope - The Owl Carousel
	 */
	var Autoplay = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * The autoplay timeout id.
		 * @type {Number}
		 */
		this._call = null;

		/**
		 * Depending on the state of the plugin, this variable contains either
		 * the start time of the timer or the current timer value if it's
		 * paused. Since we start in a paused state we initialize the timer
		 * value.
		 * @type {Number}
		 */
		this._time = 0;

		/**
		 * Stores the timeout currently used.
		 * @type {Number}
		 */
		this._timeout = 0;

		/**
		 * Indicates whenever the autoplay is paused.
		 * @type {Boolean}
		 */
		this._paused = true;

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'changed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && e.property.name === 'settings') {
					if (this._core.settings.autoplay) {
						this.play();
					} else {
						this.stop();
					}
				} else if (e.namespace && e.property.name === 'position' && this._paused) {
					// Reset the timer. This code is triggered when the position
					// of the carousel was changed through user interaction.
					this._time = 0;
				}
			}, this),
			'initialized.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.autoplay) {
					this.play();
				}
			}, this),
			'play.owl.autoplay': $.proxy(function(e, t, s) {
				if (e.namespace) {
					this.play(t, s);
				}
			}, this),
			'stop.owl.autoplay': $.proxy(function(e) {
				if (e.namespace) {
					this.stop();
				}
			}, this),
			'mouseover.owl.autoplay': $.proxy(function() {
				if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
					this.pause();
				}
			}, this),
			'mouseleave.owl.autoplay': $.proxy(function() {
				if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
					this.play();
				}
			}, this),
			'touchstart.owl.core': $.proxy(function() {
				if (this._core.settings.autoplayHoverPause && this._core.is('rotating')) {
					this.pause();
				}
			}, this),
			'touchend.owl.core': $.proxy(function() {
				if (this._core.settings.autoplayHoverPause) {
					this.play();
				}
			}, this)
		};

		// register event handlers
		this._core.$element.on(this._handlers);

		// set default options
		this._core.options = $.extend({}, Autoplay.Defaults, this._core.options);
	};

	/**
	 * Default options.
	 * @public
	 */
	Autoplay.Defaults = {
		autoplay: false,
		autoplayTimeout: 5000,
		autoplayHoverPause: false,
		autoplaySpeed: false
	};

	/**
	 * Transition to the next slide and set a timeout for the next transition.
	 * @private
	 * @param {Number} [speed] - The animation speed for the animations.
	 */
	Autoplay.prototype._next = function(speed) {
		this._call = window.setTimeout(
			$.proxy(this._next, this, speed),
			this._timeout * (Math.round(this.read() / this._timeout) + 1) - this.read()
		);

		if (this._core.is('interacting') || document.hidden) {
			return;
		}
		this._core.next(speed || this._core.settings.autoplaySpeed);
	}

	/**
	 * Reads the current timer value when the timer is playing.
	 * @public
	 */
	Autoplay.prototype.read = function() {
		return new Date().getTime() - this._time;
	};

	/**
	 * Starts the autoplay.
	 * @public
	 * @param {Number} [timeout] - The interval before the next animation starts.
	 * @param {Number} [speed] - The animation speed for the animations.
	 */
	Autoplay.prototype.play = function(timeout, speed) {
		var elapsed;

		if (!this._core.is('rotating')) {
			this._core.enter('rotating');
		}

		timeout = timeout || this._core.settings.autoplayTimeout;

		// Calculate the elapsed time since the last transition. If the carousel
		// wasn't playing this calculation will yield zero.
		elapsed = Math.min(this._time % (this._timeout || timeout), timeout);

		if (this._paused) {
			// Start the clock.
			this._time = this.read();
			this._paused = false;
		} else {
			// Clear the active timeout to allow replacement.
			window.clearTimeout(this._call);
		}

		// Adjust the origin of the timer to match the new timeout value.
		this._time += this.read() % timeout - elapsed;

		this._timeout = timeout;
		this._call = window.setTimeout($.proxy(this._next, this, speed), timeout - elapsed);
	};

	/**
	 * Stops the autoplay.
	 * @public
	 */
	Autoplay.prototype.stop = function() {
		if (this._core.is('rotating')) {
			// Reset the clock.
			this._time = 0;
			this._paused = true;

			window.clearTimeout(this._call);
			this._core.leave('rotating');
		}
	};

	/**
	 * Pauses the autoplay.
	 * @public
	 */
	Autoplay.prototype.pause = function() {
		if (this._core.is('rotating') && !this._paused) {
			// Pause the clock.
			this._time = this.read();
			this._paused = true;

			window.clearTimeout(this._call);
		}
	};

	/**
	 * Destroys the plugin.
	 */
	Autoplay.prototype.destroy = function() {
		var handler, property;

		this.stop();

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.autoplay = Autoplay;

})(window.Zepto || __webpack_provided_window_dot_jQuery, window, document);

/**
 * Navigation Plugin
 * @version 2.3.4
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {
	'use strict';

	/**
	 * Creates the navigation plugin.
	 * @class The Navigation Plugin
	 * @param {Owl} carousel - The Owl Carousel.
	 */
	var Navigation = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Indicates whether the plugin is initialized or not.
		 * @protected
		 * @type {Boolean}
		 */
		this._initialized = false;

		/**
		 * The current paging indexes.
		 * @protected
		 * @type {Array}
		 */
		this._pages = [];

		/**
		 * All DOM elements of the user interface.
		 * @protected
		 * @type {Object}
		 */
		this._controls = {};

		/**
		 * Markup for an indicator.
		 * @protected
		 * @type {Array.<String>}
		 */
		this._templates = [];

		/**
		 * The carousel element.
		 * @type {jQuery}
		 */
		this.$element = this._core.$element;

		/**
		 * Overridden methods of the carousel.
		 * @protected
		 * @type {Object}
		 */
		this._overrides = {
			next: this._core.next,
			prev: this._core.prev,
			to: this._core.to
		};

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'prepared.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.dotsData) {
					this._templates.push('<div class="' + this._core.settings.dotClass + '">' +
						$(e.content).find('[data-dot]').addBack('[data-dot]').attr('data-dot') + '</div>');
				}
			}, this),
			'added.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.dotsData) {
					this._templates.splice(e.position, 0, this._templates.pop());
				}
			}, this),
			'remove.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.dotsData) {
					this._templates.splice(e.position, 1);
				}
			}, this),
			'changed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && e.property.name == 'position') {
					this.draw();
				}
			}, this),
			'initialized.owl.carousel': $.proxy(function(e) {
				if (e.namespace && !this._initialized) {
					this._core.trigger('initialize', null, 'navigation');
					this.initialize();
					this.update();
					this.draw();
					this._initialized = true;
					this._core.trigger('initialized', null, 'navigation');
				}
			}, this),
			'refreshed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._initialized) {
					this._core.trigger('refresh', null, 'navigation');
					this.update();
					this.draw();
					this._core.trigger('refreshed', null, 'navigation');
				}
			}, this)
		};

		// set default options
		this._core.options = $.extend({}, Navigation.Defaults, this._core.options);

		// register event handlers
		this.$element.on(this._handlers);
	};

	/**
	 * Default options.
	 * @public
	 * @todo Rename `slideBy` to `navBy`
	 */
	Navigation.Defaults = {
		nav: false,
		navText: [
			'<span aria-label="' + 'Previous' + '">&#x2039;</span>',
			'<span aria-label="' + 'Next' + '">&#x203a;</span>'
		],
		navSpeed: false,
		navElement: 'button type="button" role="presentation"',
		navContainer: false,
		navContainerClass: 'owl-nav',
		navClass: [
			'owl-prev',
			'owl-next'
		],
		slideBy: 1,
		dotClass: 'owl-dot',
		dotsClass: 'owl-dots',
		dots: true,
		dotsEach: false,
		dotsData: false,
		dotsSpeed: false,
		dotsContainer: false
	};

	/**
	 * Initializes the layout of the plugin and extends the carousel.
	 * @protected
	 */
	Navigation.prototype.initialize = function() {
		var override,
			settings = this._core.settings;

		// create DOM structure for relative navigation
		this._controls.$relative = (settings.navContainer ? $(settings.navContainer)
			: $('<div>').addClass(settings.navContainerClass).appendTo(this.$element)).addClass('disabled');

		this._controls.$previous = $('<' + settings.navElement + '>')
			.addClass(settings.navClass[0])
			.html(settings.navText[0])
			.prependTo(this._controls.$relative)
			.on('click', $.proxy(function(e) {
				this.prev(settings.navSpeed);
			}, this));
		this._controls.$next = $('<' + settings.navElement + '>')
			.addClass(settings.navClass[1])
			.html(settings.navText[1])
			.appendTo(this._controls.$relative)
			.on('click', $.proxy(function(e) {
				this.next(settings.navSpeed);
			}, this));

		// create DOM structure for absolute navigation
		if (!settings.dotsData) {
			this._templates = [ $('<button role="button">')
				.addClass(settings.dotClass)
				.append($('<span>'))
				.prop('outerHTML') ];
		}

		this._controls.$absolute = (settings.dotsContainer ? $(settings.dotsContainer)
			: $('<div>').addClass(settings.dotsClass).appendTo(this.$element)).addClass('disabled');

		this._controls.$absolute.on('click', 'button', $.proxy(function(e) {
			var index = $(e.target).parent().is(this._controls.$absolute)
				? $(e.target).index() : $(e.target).parent().index();

			e.preventDefault();

			this.to(index, settings.dotsSpeed);
		}, this));

		/*$el.on('focusin', function() {
			$(document).off(".carousel");

			$(document).on('keydown.carousel', function(e) {
				if(e.keyCode == 37) {
					$el.trigger('prev.owl')
				}
				if(e.keyCode == 39) {
					$el.trigger('next.owl')
				}
			});
		});*/

		// override public methods of the carousel
		for (override in this._overrides) {
			this._core[override] = $.proxy(this[override], this);
		}
	};

	/**
	 * Destroys the plugin.
	 * @protected
	 */
	Navigation.prototype.destroy = function() {
		var handler, control, property, override, settings;
		settings = this._core.settings;

		for (handler in this._handlers) {
			this.$element.off(handler, this._handlers[handler]);
		}
		for (control in this._controls) {
			if (control === '$relative' && settings.navContainer) {
				this._controls[control].html('');
			} else {
				this._controls[control].remove();
			}
		}
		for (override in this.overides) {
			this._core[override] = this._overrides[override];
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	/**
	 * Updates the internal state.
	 * @protected
	 */
	Navigation.prototype.update = function() {
		var i, j, k,
			lower = this._core.clones().length / 2,
			upper = lower + this._core.items().length,
			maximum = this._core.maximum(true),
			settings = this._core.settings,
			size = settings.center || settings.autoWidth || settings.dotsData
				? 1 : settings.dotsEach || settings.items;

		if (settings.slideBy !== 'page') {
			settings.slideBy = Math.min(settings.slideBy, settings.items);
		}

		if (settings.dots || settings.slideBy == 'page') {
			this._pages = [];

			for (i = lower, j = 0, k = 0; i < upper; i++) {
				if (j >= size || j === 0) {
					this._pages.push({
						start: Math.min(maximum, i - lower),
						end: i - lower + size - 1
					});
					if (Math.min(maximum, i - lower) === maximum) {
						break;
					}
					j = 0, ++k;
				}
				j += this._core.mergers(this._core.relative(i));
			}
		}
	};

	/**
	 * Draws the user interface.
	 * @todo The option `dotsData` wont work.
	 * @protected
	 */
	Navigation.prototype.draw = function() {
		var difference,
			settings = this._core.settings,
			disabled = this._core.items().length <= settings.items,
			index = this._core.relative(this._core.current()),
			loop = settings.loop || settings.rewind;

		this._controls.$relative.toggleClass('disabled', !settings.nav || disabled);

		if (settings.nav) {
			this._controls.$previous.toggleClass('disabled', !loop && index <= this._core.minimum(true));
			this._controls.$next.toggleClass('disabled', !loop && index >= this._core.maximum(true));
		}

		this._controls.$absolute.toggleClass('disabled', !settings.dots || disabled);

		if (settings.dots) {
			difference = this._pages.length - this._controls.$absolute.children().length;

			if (settings.dotsData && difference !== 0) {
				this._controls.$absolute.html(this._templates.join(''));
			} else if (difference > 0) {
				this._controls.$absolute.append(new Array(difference + 1).join(this._templates[0]));
			} else if (difference < 0) {
				this._controls.$absolute.children().slice(difference).remove();
			}

			this._controls.$absolute.find('.active').removeClass('active');
			this._controls.$absolute.children().eq($.inArray(this.current(), this._pages)).addClass('active');
		}
	};

	/**
	 * Extends event data.
	 * @protected
	 * @param {Event} event - The event object which gets thrown.
	 */
	Navigation.prototype.onTrigger = function(event) {
		var settings = this._core.settings;

		event.page = {
			index: $.inArray(this.current(), this._pages),
			count: this._pages.length,
			size: settings && (settings.center || settings.autoWidth || settings.dotsData
				? 1 : settings.dotsEach || settings.items)
		};
	};

	/**
	 * Gets the current page position of the carousel.
	 * @protected
	 * @returns {Number}
	 */
	Navigation.prototype.current = function() {
		var current = this._core.relative(this._core.current());
		return $.grep(this._pages, $.proxy(function(page, index) {
			return page.start <= current && page.end >= current;
		}, this)).pop();
	};

	/**
	 * Gets the current succesor/predecessor position.
	 * @protected
	 * @returns {Number}
	 */
	Navigation.prototype.getPosition = function(successor) {
		var position, length,
			settings = this._core.settings;

		if (settings.slideBy == 'page') {
			position = $.inArray(this.current(), this._pages);
			length = this._pages.length;
			successor ? ++position : --position;
			position = this._pages[((position % length) + length) % length].start;
		} else {
			position = this._core.relative(this._core.current());
			length = this._core.items().length;
			successor ? position += settings.slideBy : position -= settings.slideBy;
		}

		return position;
	};

	/**
	 * Slides to the next item or page.
	 * @public
	 * @param {Number} [speed=false] - The time in milliseconds for the transition.
	 */
	Navigation.prototype.next = function(speed) {
		$.proxy(this._overrides.to, this._core)(this.getPosition(true), speed);
	};

	/**
	 * Slides to the previous item or page.
	 * @public
	 * @param {Number} [speed=false] - The time in milliseconds for the transition.
	 */
	Navigation.prototype.prev = function(speed) {
		$.proxy(this._overrides.to, this._core)(this.getPosition(false), speed);
	};

	/**
	 * Slides to the specified item or page.
	 * @public
	 * @param {Number} position - The position of the item or page.
	 * @param {Number} [speed] - The time in milliseconds for the transition.
	 * @param {Boolean} [standard=false] - Whether to use the standard behaviour or not.
	 */
	Navigation.prototype.to = function(position, speed, standard) {
		var length;

		if (!standard && this._pages.length) {
			length = this._pages.length;
			$.proxy(this._overrides.to, this._core)(this._pages[((position % length) + length) % length].start, speed);
		} else {
			$.proxy(this._overrides.to, this._core)(position, speed);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Navigation = Navigation;

})(window.Zepto || __webpack_provided_window_dot_jQuery, window, document);

/**
 * Hash Plugin
 * @version 2.3.4
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {
	'use strict';

	/**
	 * Creates the hash plugin.
	 * @class The Hash Plugin
	 * @param {Owl} carousel - The Owl Carousel
	 */
	var Hash = function(carousel) {
		/**
		 * Reference to the core.
		 * @protected
		 * @type {Owl}
		 */
		this._core = carousel;

		/**
		 * Hash index for the items.
		 * @protected
		 * @type {Object}
		 */
		this._hashes = {};

		/**
		 * The carousel element.
		 * @type {jQuery}
		 */
		this.$element = this._core.$element;

		/**
		 * All event handlers.
		 * @protected
		 * @type {Object}
		 */
		this._handlers = {
			'initialized.owl.carousel': $.proxy(function(e) {
				if (e.namespace && this._core.settings.startPosition === 'URLHash') {
					$(window).trigger('hashchange.owl.navigation');
				}
			}, this),
			'prepared.owl.carousel': $.proxy(function(e) {
				if (e.namespace) {
					var hash = $(e.content).find('[data-hash]').addBack('[data-hash]').attr('data-hash');

					if (!hash) {
						return;
					}

					this._hashes[hash] = e.content;
				}
			}, this),
			'changed.owl.carousel': $.proxy(function(e) {
				if (e.namespace && e.property.name === 'position') {
					var current = this._core.items(this._core.relative(this._core.current())),
						hash = $.map(this._hashes, function(item, hash) {
							return item === current ? hash : null;
						}).join();

					if (!hash || window.location.hash.slice(1) === hash) {
						return;
					}

					window.location.hash = hash;
				}
			}, this)
		};

		// set default options
		this._core.options = $.extend({}, Hash.Defaults, this._core.options);

		// register the event handlers
		this.$element.on(this._handlers);

		// register event listener for hash navigation
		$(window).on('hashchange.owl.navigation', $.proxy(function(e) {
			var hash = window.location.hash.substring(1),
				items = this._core.$stage.children(),
				position = this._hashes[hash] && items.index(this._hashes[hash]);

			if (position === undefined || position === this._core.current()) {
				return;
			}

			this._core.to(this._core.relative(position), false, true);
		}, this));
	};

	/**
	 * Default options.
	 * @public
	 */
	Hash.Defaults = {
		URLhashListener: false
	};

	/**
	 * Destroys the plugin.
	 * @public
	 */
	Hash.prototype.destroy = function() {
		var handler, property;

		$(window).off('hashchange.owl.navigation');

		for (handler in this._handlers) {
			this._core.$element.off(handler, this._handlers[handler]);
		}
		for (property in Object.getOwnPropertyNames(this)) {
			typeof this[property] != 'function' && (this[property] = null);
		}
	};

	$.fn.owlCarousel.Constructor.Plugins.Hash = Hash;

})(window.Zepto || __webpack_provided_window_dot_jQuery, window, document);

/**
 * Support Plugin
 *
 * @version 2.3.4
 * @author Vivid Planet Software GmbH
 * @author Artus Kolanowski
 * @author David Deutsch
 * @license The MIT License (MIT)
 */
;(function($, window, document, undefined) {

	var style = $('<support>').get(0).style,
		prefixes = 'Webkit Moz O ms'.split(' '),
		events = {
			transition: {
				end: {
					WebkitTransition: 'webkitTransitionEnd',
					MozTransition: 'transitionend',
					OTransition: 'oTransitionEnd',
					transition: 'transitionend'
				}
			},
			animation: {
				end: {
					WebkitAnimation: 'webkitAnimationEnd',
					MozAnimation: 'animationend',
					OAnimation: 'oAnimationEnd',
					animation: 'animationend'
				}
			}
		},
		tests = {
			csstransforms: function() {
				return !!test('transform');
			},
			csstransforms3d: function() {
				return !!test('perspective');
			},
			csstransitions: function() {
				return !!test('transition');
			},
			cssanimations: function() {
				return !!test('animation');
			}
		};

	function test(property, prefixed) {
		var result = false,
			upper = property.charAt(0).toUpperCase() + property.slice(1);

		$.each((property + ' ' + prefixes.join(upper + ' ') + upper).split(' '), function(i, property) {
			if (style[property] !== undefined) {
				result = prefixed ? property : true;
				return false;
			}
		});

		return result;
	}

	function prefixed(property) {
		return test(property, true);
	}

	if (tests.csstransitions()) {
		/* jshint -W053 */
		$.support.transition = new String(prefixed('transition'))
		$.support.transition.end = events.transition.end[ $.support.transition ];
	}

	if (tests.cssanimations()) {
		/* jshint -W053 */
		$.support.animation = new String(prefixed('animation'))
		$.support.animation.end = events.animation.end[ $.support.animation ];
	}

	if (tests.csstransforms()) {
		/* jshint -W053 */
		$.support.transform = new String(prefixed('transform'));
		$.support.transform3d = tests.csstransforms3d();
	}

})(window.Zepto || __webpack_provided_window_dot_jQuery, window, document);

/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js"), __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")))

/***/ })

}]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9ub2RlX21vZHVsZXMvb3dsLmNhcm91c2VsL2Rpc3Qvb3dsLmNhcm91c2VsLmpzIl0sIm5hbWVzIjpbXSwibWFwcGluZ3MiOiI7Ozs7Ozs7OztBQUFBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDOztBQUVEO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsWUFBWSxtQkFBbUI7QUFDL0IsWUFBWSxPQUFPO0FBQ25CO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLDRCQUE0Qjs7QUFFNUI7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsWUFBWTtBQUNaO0FBQ0E7QUFDQTtBQUNBLGNBQWM7QUFDZDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQTtBQUNBO0FBQ0EsR0FBRzs7QUFFSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLElBQUk7QUFDSixHQUFHOztBQUVIO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQSxnQkFBZ0I7QUFDaEI7QUFDQTs7QUFFQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsV0FBVztBQUNYO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFdBQVc7QUFDWDtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEVBQUU7QUFDRjtBQUNBO0FBQ0E7QUFDQTtBQUNBLEVBQUU7QUFDRjtBQUNBO0FBQ0E7QUFDQTtBQUNBLEVBQUU7QUFDRjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0EsRUFBRTtBQUNGO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxFQUFFO0FBQ0Y7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEVBQUU7QUFDRjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEVBQUU7QUFDRjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEVBQUU7QUFDRjtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7QUFDQTtBQUNBO0FBQ0E7QUFDQSxFQUFFO0FBQ0Y7QUFDQTtBQUNBO0FBQ0E7QUFDQSxFQUFFO0FBQ0Y7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsRUFBRTtBQUNGO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsRUFBRTtBQUNGO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLDRDQUE0QyxPQUFPO0FBQ25EO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxFQUFFOztBQUVGO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0EsR0FBRzs7QUFFSDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLElBQUk7O0FBRUo7QUFDQTtBQUNBLElBQUk7O0FBRUo7O0FBRUE7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxjQUFjLFFBQVE7QUFDdEI7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0EseUJBQXlCO0FBQ3pCLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLElBQUk7O0FBRUoseUJBQXlCO0FBQ3pCO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBLDBCQUEwQixZQUFZLG9DQUFvQyxFQUFFO0FBQzVFO0FBQ0E7QUFDQTtBQUNBLDJCQUEyQixZQUFZLHlDQUF5QyxFQUFFO0FBQ2xGOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsY0FBYyxtQkFBbUI7QUFDakM7QUFDQTtBQUNBLHVDQUF1QyxnQkFBZ0I7O0FBRXZEO0FBQ0E7QUFDQTtBQUNBOztBQUVBLDRCQUE0QixzQkFBc0I7O0FBRWxEO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxpQ0FBaUMsaUJBQWlCO0FBQ2xEOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFlBQVksVUFBVTtBQUN0QixjQUFjLE9BQU87QUFDckI7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTs7QUFFQTs7QUFFQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSx5RUFBeUUsZUFBZTtBQUN4Rjs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxZQUFZLE1BQU07QUFDbEI7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxZQUFZLE1BQU07QUFDbEI7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsWUFBWSxNQUFNO0FBQ2xCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBLHdEQUF3RCxjQUFjLEVBQUU7QUFDeEU7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsWUFBWSxPQUFPO0FBQ25CLFlBQVksT0FBTztBQUNuQixhQUFhLE9BQU87QUFDcEI7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxLQUFLO0FBQ0w7QUFDQSxLQUFLO0FBQ0w7QUFDQTtBQUNBO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxZQUFZLE9BQU87QUFDbkI7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLElBQUk7QUFDSixHQUFHO0FBQ0g7QUFDQTtBQUNBLElBQUk7QUFDSixHQUFHO0FBQ0g7QUFDQTtBQUNBLElBQUk7QUFDSjtBQUNBOztBQUVBO0FBQ0E7QUFDQSxZQUFZLE9BQU87QUFDbkIsY0FBYyxRQUFRO0FBQ3RCO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFlBQVksT0FBTztBQUNuQixjQUFjLE9BQU87QUFDckI7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQSx1Q0FBdUMsWUFBWSxvQ0FBb0MsRUFBRTs7QUFFekY7QUFDQTtBQUNBOztBQUVBOztBQUVBOztBQUVBLDRCQUE0QixZQUFZLHlDQUF5QyxFQUFFO0FBQ25GOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLFlBQVksT0FBTztBQUNuQixjQUFjLGVBQWU7QUFDN0I7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0Esa0RBQWtELFdBQVc7QUFDN0Q7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWSxPQUFPO0FBQ25CO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTs7QUFFQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFlBQVksT0FBTztBQUNuQixZQUFZLFFBQVE7QUFDcEIsY0FBYyxPQUFPO0FBQ3JCO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFlBQVksT0FBTztBQUNuQixjQUFjLE9BQU87QUFDckI7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxZQUFZLFFBQVE7QUFDcEIsY0FBYztBQUNkO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0EsR0FBRztBQUNIO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWSxRQUFRO0FBQ3BCLGNBQWM7QUFDZDtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxZQUFZLE9BQU87QUFDbkIsYUFBYSxzQkFBc0I7QUFDbkM7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWSxPQUFPO0FBQ25CLGFBQWEsc0JBQXNCO0FBQ25DO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFlBQVksT0FBTztBQUNuQixjQUFjLGVBQWU7QUFDN0I7QUFDQTtBQUNBO0FBQ0E7QUFDQSwwQkFBMEI7O0FBRTFCO0FBQ0EsOENBQThDLGdCQUFnQjtBQUM5RDs7QUFFQSw2Q0FBNkMsd0NBQXdDO0FBQ3JGOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFlBQVksT0FBTztBQUNuQixjQUFjLE9BQU87QUFDckI7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsWUFBWSxPQUFPO0FBQ25CLGNBQWMsc0JBQXNCO0FBQ3BDO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsSUFBSTtBQUNKOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWSxPQUFPO0FBQ25CLFlBQVksT0FBTztBQUNuQixZQUFZLE9BQU87QUFDbkIsY0FBYyxPQUFPO0FBQ3JCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxZQUFZLE9BQU87QUFDbkIsWUFBWSxPQUFPO0FBQ25CO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWSxPQUFPO0FBQ25CO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWSxPQUFPO0FBQ25CO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWSxNQUFNO0FBQ2xCO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLGFBQWEsT0FBTztBQUNwQjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0EsR0FBRztBQUNIO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFlBQVksMEJBQTBCO0FBQ3RDO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFlBQVksMEJBQTBCO0FBQ3RDLFlBQVksT0FBTztBQUNuQjtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQSx1QkFBdUIsdUNBQXVDOztBQUU5RDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBOztBQUVBLHlCQUF5Qix1Q0FBdUM7QUFDaEU7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxZQUFZLE9BQU87QUFDbkI7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQSwwQkFBMEIscURBQXFEOztBQUUvRTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUEsMkJBQTJCLG9DQUFvQztBQUMvRDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsSUFBSTtBQUNKLEdBQUc7QUFDSDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxZQUFZLE9BQU87QUFDbkIsWUFBWSxPQUFPO0FBQ25CLFlBQVksT0FBTztBQUNuQjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxZQUFZLFlBQVk7QUFDeEIsWUFBWSxPQUFPO0FBQ25CLFlBQVksU0FBUztBQUNyQixZQUFZLFFBQVE7QUFDcEI7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFlBQVksWUFBWTtBQUN4QixZQUFZLE9BQU87QUFDbkIsWUFBWSxTQUFTO0FBQ3JCLFlBQVksUUFBUTtBQUNwQjtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxZQUFZLE9BQU87QUFDbkIsWUFBWSxFQUFFO0FBQ2QsWUFBWSxPQUFPO0FBQ25CLFlBQVksT0FBTztBQUNuQixZQUFZLFFBQVE7QUFDcEIsY0FBYyxNQUFNO0FBQ3BCO0FBQ0E7QUFDQTtBQUNBLFVBQVU7QUFDVixHQUFHO0FBQ0gsa0RBQWtELFdBQVc7QUFDN0Q7QUFDQTtBQUNBO0FBQ0EsYUFBYSxzQkFBc0I7QUFDbkM7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLElBQUk7O0FBRUosa0JBQWtCLG1DQUFtQztBQUNyRDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBLEdBQUc7QUFDSDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxZQUFZLE9BQU87QUFDbkI7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsSUFBSTtBQUNKO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWSxlQUFlO0FBQzNCO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFlBQVksZUFBZTtBQUMzQjtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLFlBQVksTUFBTTtBQUNsQixjQUFjLE9BQU87QUFDckI7QUFDQTtBQUNBLGdCQUFnQjs7QUFFaEI7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7QUFDSDtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxZQUFZLDBEQUEwRDtBQUN0RSxjQUFjLFFBQVE7QUFDdEI7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQSxZQUFZLE9BQU87QUFDbkIsWUFBWSxPQUFPO0FBQ25CLGNBQWMsT0FBTztBQUNyQjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLG9CQUFvQixvQ0FBb0M7QUFDeEQ7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsTUFBTTtBQUNOLEtBQUs7QUFDTDs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQSxDQUFDLGtCQUFrQixvQ0FBYTs7QUFFaEM7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDOztBQUVEO0FBQ0E7QUFDQTtBQUNBLFlBQVksSUFBSTtBQUNoQjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsWUFBWTtBQUNaO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWTtBQUNaO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWTtBQUNaO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWTtBQUNaO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLElBQUk7QUFDSjs7QUFFQTtBQUNBLGtDQUFrQzs7QUFFbEM7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQSxDQUFDLGtCQUFrQixvQ0FBYTs7QUFFaEM7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDOztBQUVEO0FBQ0E7QUFDQTtBQUNBLFlBQVksSUFBSTtBQUNoQjtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFlBQVk7QUFDWjtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFlBQVk7QUFDWjtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFlBQVk7QUFDWjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLHFDQUFxQyxlQUFlO0FBQ3BEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7O0FBRUE7QUFDQSxrQ0FBa0M7O0FBRWxDO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxZQUFZLE9BQU87QUFDbkI7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBLCtCQUErQiw4QkFBOEI7O0FBRTdEO0FBQ0E7QUFDQTtBQUNBLG1DQUFtQyw4QkFBOEI7QUFDakUsS0FBSztBQUNMLGFBQWE7QUFDYjtBQUNBLGtEQUFrRCw4QkFBOEI7QUFDaEYsaUJBQWlCO0FBQ2pCLElBQUk7QUFDSjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsTUFBTTtBQUNOLG1DQUFtQyw4QkFBOEI7QUFDakUsS0FBSztBQUNMO0FBQ0E7QUFDQSxHQUFHOztBQUVIO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBLENBQUMsa0JBQWtCLG9DQUFhOztBQUVoQztBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUM7O0FBRUQ7QUFDQTtBQUNBO0FBQ0EsWUFBWSxJQUFJO0FBQ2hCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxZQUFZO0FBQ1o7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxZQUFZO0FBQ1o7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsSUFBSTtBQUNKO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsSUFBSTtBQUNKO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7O0FBRUE7QUFDQSxrQ0FBa0M7O0FBRWxDO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsS0FBSztBQUNMO0FBQ0EsR0FBRzs7QUFFSDs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxHQUFHOztBQUVIOztBQUVBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBLENBQUMsa0JBQWtCLG9DQUFhOztBQUVoQztBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLENBQUM7O0FBRUQ7QUFDQTtBQUNBO0FBQ0EsWUFBWSxJQUFJO0FBQ2hCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxZ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QUNaO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWTtBQUNaO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWTtBQUNaO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWTtBQUNaO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWTtBQUNaO0FBQ0E7O0FBRUE7QUFDQTtBQUNBLFlBQVk7QUFDWjtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFlBQVk7QUFDWjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWTtBQUNaO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsSUFBSTtBQUNKO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsSUFBSTtBQUNKO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsSUFBSTtBQUNKO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsSUFBSTtBQUNKO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLElBQUk7QUFDSjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLElBQUk7QUFDSjs7QUFFQTtBQUNBLGtDQUFrQzs7QUFFbEM7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxrREFBa0Q7QUFDbEQsOENBQThDO0FBQzlDO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsSUFBSTtBQUNKO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLElBQUk7O0FBRUo7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7O0FBRUE7QUFDQSxHQUFHOztBQUVIO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxJQUFJO0FBQ0osR0FBRyxFQUFFOztBQUVMO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsSUFBSTtBQUNKO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTs7QUFFQSxnQ0FBZ0MsV0FBVztBQUMzQztBQUNBO0FBQ0E7QUFDQTtBQUNBLE1BQU07QUFDTjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7QUFDQSxJQUFJO0FBQ0o7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxZQUFZLE1BQU07QUFDbEI7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLGNBQWM7QUFDZDtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIOztBQUVBO0FBQ0E7QUFDQTtBQUNBLGNBQWM7QUFDZDtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWSxPQUFPO0FBQ25CO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBLFlBQVksT0FBTztBQUNuQjtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxZQUFZLE9BQU87QUFDbkIsWUFBWSxPQUFPO0FBQ25CLFlBQVksUUFBUTtBQUNwQjtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsR0FBRztBQUNIO0FBQ0E7QUFDQTs7QUFFQTs7QUFFQSxDQUFDLGtCQUFrQixvQ0FBYTs7QUFFaEM7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDO0FBQ0Q7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWSxJQUFJO0FBQ2hCO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxZQUFZO0FBQ1o7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQSxZQUFZO0FBQ1o7QUFDQTs7QUFFQTtBQUNBO0FBQ0EsWUFBWTtBQUNaO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0EsWUFBWTtBQUNaO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLElBQUk7QUFDSjtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLE9BQU87O0FBRVA7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7O0FBRUE7QUFDQSxrQ0FBa0M7O0FBRWxDO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQSxHQUFHO0FBQ0g7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBOztBQUVBLENBQUMsa0JBQWtCLG9DQUFhOztBQUVoQztBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxDQUFDOztBQUVEO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0EsSUFBSTtBQUNKO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSxHQUFHO0FBQ0g7QUFDQTtBQUNBO0FBQ0EsSUFBSTtBQUNKO0FBQ0E7QUFDQSxJQUFJO0FBQ0o7QUFDQTtBQUNBLElBQUk7QUFDSjtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBLEdBQUc7O0FBRUg7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7O0FBRUE7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFFQTtBQUNBO0FBQ0E7QUFDQTtBQUNBOztBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FBRUEsQ0FBQyxrQkFBa0Isb0NBQWEiLCJmaWxlIjoidmVuZG9yc35jYXJvdXNlbC5qcyIsInNvdXJjZXNDb250ZW50IjpbIi8qKlxuICogT3dsIENhcm91c2VsIHYyLjMuNFxuICogQ29weXJpZ2h0IDIwMTMtMjAxOCBEYXZpZCBEZXV0c2NoXG4gKiBMaWNlbnNlZCB1bmRlcjogU0VFIExJQ0VOU0UgSU4gaHR0cHM6Ly9naXRodWIuY29tL093bENhcm91c2VsMi9Pd2xDYXJvdXNlbDIvYmxvYi9tYXN0ZXIvTElDRU5TRVxuICovXG4vKipcbiAqIE93bCBjYXJvdXNlbFxuICogQHZlcnNpb24gMi4zLjRcbiAqIEBhdXRob3IgQmFydG9zeiBXb2pjaWVjaG93c2tpXG4gKiBAYXV0aG9yIERhdmlkIERldXRzY2hcbiAqIEBsaWNlbnNlIFRoZSBNSVQgTGljZW5zZSAoTUlUKVxuICogQHRvZG8gTGF6eSBMb2FkIEljb25cbiAqIEB0b2RvIHByZXZlbnQgYW5pbWF0aW9uZW5kIGJ1YmxpbmdcbiAqIEB0b2RvIGl0ZW1zU2NhbGVVcFxuICogQHRvZG8gVGVzdCBaZXB0b1xuICogQHRvZG8gc3RhZ2VQYWRkaW5nIGNhbGN1bGF0ZSB3cm9uZyBhY3RpdmUgY2xhc3Nlc1xuICovXG47KGZ1bmN0aW9uKCQsIHdpbmRvdywgZG9jdW1lbnQsIHVuZGVmaW5lZCkge1xuXG5cdC8qKlxuXHQgKiBDcmVhdGVzIGEgY2Fyb3VzZWwuXG5cdCAqIEBjbGFzcyBUaGUgT3dsIENhcm91c2VsLlxuXHQgKiBAcHVibGljXG5cdCAqIEBwYXJhbSB7SFRNTEVsZW1lbnR8alF1ZXJ5fSBlbGVtZW50IC0gVGhlIGVsZW1lbnQgdG8gY3JlYXRlIHRoZSBjYXJvdXNlbCBmb3IuXG5cdCAqIEBwYXJhbSB7T2JqZWN0fSBbb3B0aW9uc10gLSBUaGUgb3B0aW9uc1xuXHQgKi9cblx0ZnVuY3Rpb24gT3dsKGVsZW1lbnQsIG9wdGlvbnMpIHtcblxuXHRcdC8qKlxuXHRcdCAqIEN1cnJlbnQgc2V0dGluZ3MgZm9yIHRoZSBjYXJvdXNlbC5cblx0XHQgKiBAcHVibGljXG5cdFx0ICovXG5cdFx0dGhpcy5zZXR0aW5ncyA9IG51bGw7XG5cblx0XHQvKipcblx0XHQgKiBDdXJyZW50IG9wdGlvbnMgc2V0IGJ5IHRoZSBjYWxsZXIgaW5jbHVkaW5nIGRlZmF1bHRzLlxuXHRcdCAqIEBwdWJsaWNcblx0XHQgKi9cblx0XHR0aGlzLm9wdGlvbnMgPSAkLmV4dGVuZCh7fSwgT3dsLkRlZmF1bHRzLCBvcHRpb25zKTtcblxuXHRcdC8qKlxuXHRcdCAqIFBsdWdpbiBlbGVtZW50LlxuXHRcdCAqIEBwdWJsaWNcblx0XHQgKi9cblx0XHR0aGlzLiRlbGVtZW50ID0gJChlbGVtZW50KTtcblxuXHRcdC8qKlxuXHRcdCAqIFByb3hpZWQgZXZlbnQgaGFuZGxlcnMuXG5cdFx0ICogQHByb3RlY3RlZFxuXHRcdCAqL1xuXHRcdHRoaXMuX2hhbmRsZXJzID0ge307XG5cblx0XHQvKipcblx0XHQgKiBSZWZlcmVuY2VzIHRvIHRoZSBydW5uaW5nIHBsdWdpbnMgb2YgdGhpcyBjYXJvdXNlbC5cblx0XHQgKiBAcHJvdGVjdGVkXG5cdFx0ICovXG5cdFx0dGhpcy5fcGx1Z2lucyA9IHt9O1xuXG5cdFx0LyoqXG5cdFx0ICogQ3VycmVudGx5IHN1cHByZXNzZWQgZXZlbnRzIHRvIHByZXZlbnQgdGhlbSBmcm9tIGJlaW5nIHJldHJpZ2dlcmVkLlxuXHRcdCAqIEBwcm90ZWN0ZWRcblx0XHQgKi9cblx0XHR0aGlzLl9zdXByZXNzID0ge307XG5cblx0XHQvKipcblx0XHQgKiBBYnNvbHV0ZSBjdXJyZW50IHBvc2l0aW9uLlxuXHRcdCAqIEBwcm90ZWN0ZWRcblx0XHQgKi9cblx0XHR0aGlzLl9jdXJyZW50ID0gbnVsbDtcblxuXHRcdC8qKlxuXHRcdCAqIEFuaW1hdGlvbiBzcGVlZCBpbiBtaWxsaXNlY29uZHMuXG5cdFx0ICogQHByb3RlY3RlZFxuXHRcdCAqL1xuXHRcdHRoaXMuX3NwZWVkID0gbnVsbDtcblxuXHRcdC8qKlxuXHRcdCAqIENvb3JkaW5hdGVzIG9mIGFsbCBpdGVtcyBpbiBwaXhlbC5cblx0XHQgKiBAdG9kbyBUaGUgbmFtZSBvZiB0aGlzIG1lbWJlciBpcyBtaXNzbGVhZGluZy5cblx0XHQgKiBAcHJvdGVjdGVkXG5cdFx0ICovXG5cdFx0dGhpcy5fY29vcmRpbmF0ZXMgPSBbXTtcblxuXHRcdC8qKlxuXHRcdCAqIEN1cnJlbnQgYnJlYWtwb2ludC5cblx0XHQgKiBAdG9kbyBSZWFsIG1lZGlhIHF1ZXJpZXMgd291bGQgYmUgbmljZS5cblx0XHQgKiBAcHJvdGVjdGVkXG5cdFx0ICovXG5cdFx0dGhpcy5fYnJlYWtwb2ludCA9IG51bGw7XG5cblx0XHQvKipcblx0XHQgKiBDdXJyZW50IHdpZHRoIG9mIHRoZSBwbHVnaW4gZWxlbWVudC5cblx0XHQgKi9cblx0XHR0aGlzLl93aWR0aCA9IG51bGw7XG5cblx0XHQvKipcblx0XHQgKiBBbGwgcmVhbCBpdGVtcy5cblx0XHQgKiBAcHJvdGVjdGVkXG5cdFx0ICovXG5cdFx0dGhpcy5faXRlbXMgPSBbXTtcblxuXHRcdC8qKlxuXHRcdCAqIEFsbCBjbG9uZWQgaXRlbXMuXG5cdFx0ICogQHByb3RlY3RlZFxuXHRcdCAqL1xuXHRcdHRoaXMuX2Nsb25lcyA9IFtdO1xuXG5cdFx0LyoqXG5cdFx0ICogTWVyZ2UgdmFsdWVzIG9mIGFsbCBpdGVtcy5cblx0XHQgKiBAdG9kbyBNYXliZSB0aGlzIGNvdWxkIGJlIHBhcnQgb2YgYSBwbHVnaW4uXG5cdFx0ICogQHByb3RlY3RlZFxuXHRcdCAqL1xuXHRcdHRoaXMuX21lcmdlcnMgPSBbXTtcblxuXHRcdC8qKlxuXHRcdCAqIFdpZHRocyBvZiBhbGwgaXRlbXMuXG5cdFx0ICovXG5cdFx0dGhpcy5fd2lkdGhzID0gW107XG5cblx0XHQvKipcblx0XHQgKiBJbnZhbGlkYXRlZCBwYXJ0cyB3aXRoaW4gdGhlIHVwZGF0ZSBwcm9jZXNzLlxuXHRcdCAqIEBwcm90ZWN0ZWRcblx0XHQgKi9cblx0XHR0aGlzLl9pbnZhbGlkYXRlZCA9IHt9O1xuXG5cdFx0LyoqXG5cdFx0ICogT3JkZXJlZCBsaXN0IG9mIHdvcmtlcnMgZm9yIHRoZSB1cGRhdGUgcHJvY2Vzcy5cblx0XHQgKiBAcHJvdGVjdGVkXG5cdFx0ICovXG5cdFx0dGhpcy5fcGlwZSA9IFtdO1xuXG5cdFx0LyoqXG5cdFx0ICogQ3VycmVudCBzdGF0ZSBpbmZvcm1hdGlvbiBmb3IgdGhlIGRyYWcgb3BlcmF0aW9uLlxuXHRcdCAqIEB0b2RvICMyNjFcblx0XHQgKiBAcHJvdGVjdGVkXG5cdFx0ICovXG5cdFx0dGhpcy5fZHJhZyA9IHtcblx0XHRcdHRpbWU6IG51bGwsXG5cdFx0XHR0YXJnZXQ6IG51bGwsXG5cdFx0XHRwb2ludGVyOiBudWxsLFxuXHRcdFx0c3RhZ2U6IHtcblx0XHRcdFx0c3RhcnQ6IG51bGwsXG5cdFx0XHRcdGN1cnJlbnQ6IG51bGxcblx0XHRcdH0sXG5cdFx0XHRkaXJlY3Rpb246IG51bGxcblx0XHR9O1xuXG5cdFx0LyoqXG5cdFx0ICogQ3VycmVudCBzdGF0ZSBpbmZvcm1hdGlvbiBhbmQgdGhlaXIgdGFncy5cblx0XHQgKiBAdHlwZSB7T2JqZWN0fVxuXHRcdCAqIEBwcm90ZWN0ZWRcblx0XHQgKi9cblx0XHR0aGlzLl9zdGF0ZXMgPSB7XG5cdFx0XHRjdXJyZW50OiB7fSxcblx0XHRcdHRhZ3M6IHtcblx0XHRcdFx0J2luaXRpYWxpemluZyc6IFsgJ2J1c3knIF0sXG5cdFx0XHRcdCdhbmltYXRpbmcnOiBbICdidXN5JyBdLFxuXHRcdFx0XHQnZHJhZ2dpbmcnOiBbICdpbnRlcmFjdGluZycgXVxuXHRcdFx0fVxuXHRcdH07XG5cblx0XHQkLmVhY2goWyAnb25SZXNpemUnLCAnb25UaHJvdHRsZWRSZXNpemUnIF0sICQucHJveHkoZnVuY3Rpb24oaSwgaGFuZGxlcikge1xuXHRcdFx0dGhpcy5faGFuZGxlcnNbaGFuZGxlcl0gPSAkLnByb3h5KHRoaXNbaGFuZGxlcl0sIHRoaXMpO1xuXHRcdH0sIHRoaXMpKTtcblxuXHRcdCQuZWFjaChPd2wuUGx1Z2lucywgJC5wcm94eShmdW5jdGlvbihrZXksIHBsdWdpbikge1xuXHRcdFx0dGhpcy5fcGx1Z2luc1trZXkuY2hhckF0KDApLnRvTG93ZXJDYXNlKCkgKyBrZXkuc2xpY2UoMSldXG5cdFx0XHRcdD0gbmV3IHBsdWdpbih0aGlzKTtcblx0XHR9LCB0aGlzKSk7XG5cblx0XHQkLmVhY2goT3dsLldvcmtlcnMsICQucHJveHkoZnVuY3Rpb24ocHJpb3JpdHksIHdvcmtlcikge1xuXHRcdFx0dGhpcy5fcGlwZS5wdXNoKHtcblx0XHRcdFx0J2ZpbHRlcic6IHdvcmtlci5maWx0ZXIsXG5cdFx0XHRcdCdydW4nOiAkLnByb3h5KHdvcmtlci5ydW4sIHRoaXMpXG5cdFx0XHR9KTtcblx0XHR9LCB0aGlzKSk7XG5cblx0XHR0aGlzLnNldHVwKCk7XG5cdFx0dGhpcy5pbml0aWFsaXplKCk7XG5cdH1cblxuXHQvKipcblx0ICogRGVmYXVsdCBvcHRpb25zIGZvciB0aGUgY2Fyb3VzZWwuXG5cdCAqIEBwdWJsaWNcblx0ICovXG5cdE93bC5EZWZhdWx0cyA9IHtcblx0XHRpdGVtczogMyxcblx0XHRsb29wOiBmYWxzZSxcblx0XHRjZW50ZXI6IGZhbHNlLFxuXHRcdHJld2luZDogZmFsc2UsXG5cdFx0Y2hlY2tWaXNpYmlsaXR5OiB0cnVlLFxuXG5cdFx0bW91c2VEcmFnOiB0cnVlLFxuXHRcdHRvdWNoRHJhZzogdHJ1ZSxcblx0XHRwdWxsRHJhZzogdHJ1ZSxcblx0XHRmcmVlRHJhZzogZmFsc2UsXG5cblx0XHRtYXJnaW46IDAsXG5cdFx0c3RhZ2VQYWRkaW5nOiAwLFxuXG5cdFx0bWVyZ2U6IGZhbHNlLFxuXHRcdG1lcmdlRml0OiB0cnVlLFxuXHRcdGF1dG9XaWR0aDogZmFsc2UsXG5cblx0XHRzdGFydFBvc2l0aW9uOiAwLFxuXHRcdHJ0bDogZmFsc2UsXG5cblx0XHRzbWFydFNwZWVkOiAyNTAsXG5cdFx0Zmx1aWRTcGVlZDogZmFsc2UsXG5cdFx0ZHJhZ0VuZFNwZWVkOiBmYWxzZSxcblxuXHRcdHJlc3BvbnNpdmU6IHt9LFxuXHRcdHJlc3BvbnNpdmVSZWZyZXNoUmF0ZTogMjAwLFxuXHRcdHJlc3BvbnNpdmVCYXNlRWxlbWVudDogd2luZG93LFxuXG5cdFx0ZmFsbGJhY2tFYXNpbmc6ICdzd2luZycsXG5cdFx0c2xpZGVUcmFuc2l0aW9uOiAnJyxcblxuXHRcdGluZm86IGZhbHNlLFxuXG5cdFx0bmVzdGVkSXRlbVNlbGVjdG9yOiBmYWxzZSxcblx0XHRpdGVtRWxlbWVudDogJ2RpdicsXG5cdFx0c3RhZ2VFbGVtZW50OiAnZGl2JyxcblxuXHRcdHJlZnJlc2hDbGFzczogJ293bC1yZWZyZXNoJyxcblx0XHRsb2FkZWRDbGFzczogJ293bC1sb2FkZWQnLFxuXHRcdGxvYWRpbmdDbGFzczogJ293bC1sb2FkaW5nJyxcblx0XHRydGxDbGFzczogJ293bC1ydGwnLFxuXHRcdHJlc3BvbnNpdmVDbGFzczogJ293bC1yZXNwb25zaXZlJyxcblx0XHRkcmFnQ2xhc3M6ICdvd2wtZHJhZycsXG5cdFx0aXRlbUNsYXNzOiAnb3dsLWl0ZW0nLFxuXHRcdHN0YWdlQ2xhc3M6ICdvd2wtc3RhZ2UnLFxuXHRcdHN0YWdlT3V0ZXJDbGFzczogJ293bC1zdGFnZS1vdXRlcicsXG5cdFx0Z3JhYkNsYXNzOiAnb3dsLWdyYWInXG5cdH07XG5cblx0LyoqXG5cdCAqIEVudW1lcmF0aW9uIGZvciB3aWR0aC5cblx0ICogQHB1YmxpY1xuXHQgKiBAcmVhZG9ubHlcblx0ICogQGVudW0ge1N0cmluZ31cblx0ICovXG5cdE93bC5XaWR0aCA9IHtcblx0XHREZWZhdWx0OiAnZGVmYXVsdCcsXG5cdFx0SW5uZXI6ICdpbm5lcicsXG5cdFx0T3V0ZXI6ICdvdXRlcidcblx0fTtcblxuXHQvKipcblx0ICogRW51bWVyYXRpb24gZm9yIHR5cGVzLlxuXHQgKiBAcHVibGljXG5cdCAqIEByZWFkb25seVxuXHQgKiBAZW51bSB7U3RyaW5nfVxuXHQgKi9cblx0T3dsLlR5cGUgPSB7XG5cdFx0RXZlbnQ6ICdldmVudCcsXG5cdFx0U3RhdGU6ICdzdGF0ZSdcblx0fTtcblxuXHQvKipcblx0ICogQ29udGFpbnMgYWxsIHJlZ2lzdGVyZWQgcGx1Z2lucy5cblx0ICogQHB1YmxpY1xuXHQgKi9cblx0T3dsLlBsdWdpbnMgPSB7fTtcblxuXHQvKipcblx0ICogTGlzdCBvZiB3b3JrZXJzIGludm9sdmVkIGluIHRoZSB1cGRhdGUgcHJvY2Vzcy5cblx0ICovXG5cdE93bC5Xb3JrZXJzID0gWyB7XG5cdFx0ZmlsdGVyOiBbICd3aWR0aCcsICdzZXR0aW5ncycgXSxcblx0XHRydW46IGZ1bmN0aW9uKCkge1xuXHRcdFx0dGhpcy5fd2lkdGggPSB0aGlzLiRlbGVtZW50LndpZHRoKCk7XG5cdFx0fVxuXHR9LCB7XG5cdFx0ZmlsdGVyOiBbICd3aWR0aCcsICdpdGVtcycsICdzZXR0aW5ncycgXSxcblx0XHRydW46IGZ1bmN0aW9uKGNhY2hlKSB7XG5cdFx0XHRjYWNoZS5jdXJyZW50ID0gdGhpcy5faXRlbXMgJiYgdGhpcy5faXRlbXNbdGhpcy5yZWxhdGl2ZSh0aGlzLl9jdXJyZW50KV07XG5cdFx0fVxuXHR9LCB7XG5cdFx0ZmlsdGVyOiBbICdpdGVtcycsICdzZXR0aW5ncycgXSxcblx0XHRydW46IGZ1bmN0aW9uKCkge1xuXHRcdFx0dGhpcy4kc3RhZ2UuY2hpbGRyZW4oJy5jbG9uZWQnKS5yZW1vdmUoKTtcblx0XHR9XG5cdH0sIHtcblx0XHRmaWx0ZXI6IFsgJ3dpZHRoJywgJ2l0ZW1zJywgJ3NldHRpbmdzJyBdLFxuXHRcdHJ1bjogZnVuY3Rpb24oY2FjaGUpIHtcblx0XHRcdHZhciBtYXJnaW4gPSB0aGlzLnNldHRpbmdzLm1hcmdpbiB8fCAnJyxcblx0XHRcdFx0Z3JpZCA9ICF0aGlzLnNldHRpbmdzLmF1dG9XaWR0aCxcblx0XHRcdFx0cnRsID0gdGhpcy5zZXR0aW5ncy5ydGwsXG5cdFx0XHRcdGNzcyA9IHtcblx0XHRcdFx0XHQnd2lkdGgnOiAnYXV0bycsXG5cdFx0XHRcdFx0J21hcmdpbi1sZWZ0JzogcnRsID8gbWFyZ2luIDogJycsXG5cdFx0XHRcdFx0J21hcmdpbi1yaWdodCc6IHJ0bCA/ICcnIDogbWFyZ2luXG5cdFx0XHRcdH07XG5cblx0XHRcdCFncmlkICYmIHRoaXMuJHN0YWdlLmNoaWxkcmVuKCkuY3NzKGNzcyk7XG5cblx0XHRcdGNhY2hlLmNzcyA9IGNzcztcblx0XHR9XG5cdH0sIHtcblx0XHRmaWx0ZXI6IFsgJ3dpZHRoJywgJ2l0ZW1zJywgJ3NldHRpbmdzJyBdLFxuXHRcdHJ1bjogZnVuY3Rpb24oY2FjaGUpIHtcblx0XHRcdHZhciB3aWR0aCA9ICh0aGlzLndpZHRoKCkgLyB0aGlzLnNldHRpbmdzLml0ZW1zKS50b0ZpeGVkKDMpIC0gdGhpcy5zZXR0aW5ncy5tYXJnaW4sXG5cdFx0XHRcdG1lcmdlID0gbnVsbCxcblx0XHRcdFx0aXRlcmF0b3IgPSB0aGlzLl9pdGVtcy5sZW5ndGgsXG5cdFx0XHRcdGdyaWQgPSAhdGhpcy5zZXR0aW5ncy5hdXRvV2lkdGgsXG5cdFx0XHRcdHdpZHRocyA9IFtdO1xuXG5cdFx0XHRjYWNoZS5pdGVtcyA9IHtcblx0XHRcdFx0bWVyZ2U6IGZhbHNlLFxuXHRcdFx0XHR3aWR0aDogd2lkdGhcblx0XHRcdH07XG5cblx0XHRcdHdoaWxlIChpdGVyYXRvci0tKSB7XG5cdFx0XHRcdG1lcmdlID0gdGhpcy5fbWVyZ2Vyc1tpdGVyYXRvcl07XG5cdFx0XHRcdG1lcmdlID0gdGhpcy5zZXR0aW5ncy5tZXJnZUZpdCAmJiBNYXRoLm1pbihtZXJnZSwgdGhpcy5zZXR0aW5ncy5pdGVtcykgfHwgbWVyZ2U7XG5cblx0XHRcdFx0Y2FjaGUuaXRlbXMubWVyZ2UgPSBtZXJnZSA+IDEgfHwgY2FjaGUuaXRlbXMubWVyZ2U7XG5cblx0XHRcdFx0d2lkdGhzW2l0ZXJhdG9yXSA9ICFncmlkID8gdGhpcy5faXRlbXNbaXRlcmF0b3JdLndpZHRoKCkgOiB3aWR0aCAqIG1lcmdlO1xuXHRcdFx0fVxuXG5cdFx0XHR0aGlzLl93aWR0aHMgPSB3aWR0aHM7XG5cdFx0fVxuXHR9LCB7XG5cdFx0ZmlsdGVyOiBbICdpdGVtcycsICdzZXR0aW5ncycgXSxcblx0XHRydW46IGZ1bmN0aW9uKCkge1xuXHRcdFx0dmFyIGNsb25lcyA9IFtdLFxuXHRcdFx0XHRpdGVtcyA9IHRoaXMuX2l0ZW1zLFxuXHRcdFx0XHRzZXR0aW5ncyA9IHRoaXMuc2V0dGluZ3MsXG5cdFx0XHRcdC8vIFRPRE86IFNob3VsZCBiZSBjb21wdXRlZCBmcm9tIG51bWJlciBvZiBtaW4gd2lkdGggaXRlbXMgaW4gc3RhZ2Vcblx0XHRcdFx0dmlldyA9IE1hdGgubWF4KHNldHRpbmdzLml0ZW1zICogMiwgNCksXG5cdFx0XHRcdHNpemUgPSBNYXRoLmNlaWwoaXRlbXMubGVuZ3RoIC8gMikgKiAyLFxuXHRcdFx0XHRyZXBlYXQgPSBzZXR0aW5ncy5sb29wICYmIGl0ZW1zLmxlbmd0aCA/IHNldHRpbmdzLnJld2luZCA/IHZpZXcgOiBNYXRoLm1heCh2aWV3LCBzaXplKSA6IDAsXG5cdFx0XHRcdGFwcGVuZCA9ICcnLFxuXHRcdFx0XHRwcmVwZW5kID0gJyc7XG5cblx0XHRcdHJlcGVhdCAvPSAyO1xuXG5cdFx0XHR3aGlsZSAocmVwZWF0ID4gMCkge1xuXHRcdFx0XHQvLyBTd2l0Y2ggdG8gb25seSB1c2luZyBhcHBlbmRlZCBjbG9uZXNcblx0XHRcdFx0Y2xvbmVzLnB1c2godGhpcy5ub3JtYWxpemUoY2xvbmVzLmxlbmd0aCAvIDIsIHRydWUpKTtcblx0XHRcdFx0YXBwZW5kID0gYXBwZW5kICsgaXRlbXNbY2xvbmVzW2Nsb25lcy5sZW5ndGggLSAxXV1bMF0ub3V0ZXJIVE1MO1xuXHRcdFx0XHRjbG9uZXMucHVzaCh0aGlzLm5vcm1hbGl6ZShpdGVtcy5sZW5ndGggLSAxIC0gKGNsb25lcy5sZW5ndGggLSAxKSAvIDIsIHRydWUpKTtcblx0XHRcdFx0cHJlcGVuZCA9IGl0ZW1zW2Nsb25lc1tjbG9uZXMubGVuZ3RoIC0gMV1dWzBdLm91dGVySFRNTCArIHByZXBlbmQ7XG5cdFx0XHRcdHJlcGVhdCAtPSAxO1xuXHRcdFx0fVxuXG5cdFx0XHR0aGlzLl9jbG9uZXMgPSBjbG9uZXM7XG5cblx0XHRcdCQoYXBwZW5kKS5hZGRDbGFzcygnY2xvbmVkJykuYXBwZW5kVG8odGhpcy4kc3RhZ2UpO1xuXHRcdFx0JChwcmVwZW5kKS5hZGRDbGFzcygnY2xvbmVkJykucHJlcGVuZFRvKHRoaXMuJHN0YWdlKTtcblx0XHR9XG5cdH0sIHtcblx0XHRmaWx0ZXI6IFsgJ3dpZHRoJywgJ2l0ZW1zJywgJ3NldHRpbmdzJyBdLFxuXHRcdHJ1bjogZnVuY3Rpb24oKSB7XG5cdFx0XHR2YXIgcnRsID0gdGhpcy5zZXR0aW5ncy5ydGwgPyAxIDogLTEsXG5cdFx0XHRcdHNpemUgPSB0aGlzLl9jbG9uZXMubGVuZ3RoICsgdGhpcy5faXRlbXMubGVuZ3RoLFxuXHRcdFx0XHRpdGVyYXRvciA9IC0xLFxuXHRcdFx0XHRwcmV2aW91cyA9IDAsXG5cdFx0XHRcdGN1cnJlbnQgPSAwLFxuXHRcdFx0XHRjb29yZGluYXRlcyA9IFtdO1xuXG5cdFx0XHR3aGlsZSAoKytpdGVyYXRvciA8IHNpemUpIHtcblx0XHRcdFx0cHJldmlvdXMgPSBjb29yZGluYXRlc1tpdGVyYXRvciAtIDFdIHx8IDA7XG5cdFx0XHRcdGN1cnJlbnQgPSB0aGlzLl93aWR0aHNbdGhpcy5yZWxhdGl2ZShpdGVyYXRvcildICsgdGhpcy5zZXR0aW5ncy5tYXJnaW47XG5cdFx0XHRcdGNvb3JkaW5hdGVzLnB1c2gocHJldmlvdXMgKyBjdXJyZW50ICogcnRsKTtcblx0XHRcdH1cblxuXHRcdFx0dGhpcy5fY29vcmRpbmF0ZXMgPSBjb29yZGluYXRlcztcblx0XHR9XG5cdH0sIHtcblx0XHRmaWx0ZXI6IFsgJ3dpZHRoJywgJ2l0ZW1zJywgJ3NldHRpbmdzJyBdLFxuXHRcdHJ1bjogZnVuY3Rpb24oKSB7XG5cdFx0XHR2YXIgcGFkZGluZyA9IHRoaXMuc2V0dGluZ3Muc3RhZ2VQYWRkaW5nLFxuXHRcdFx0XHRjb29yZGluYXRlcyA9IHRoaXMuX2Nvb3JkaW5hdGVzLFxuXHRcdFx0XHRjc3MgPSB7XG5cdFx0XHRcdFx0J3dpZHRoJzogTWF0aC5jZWlsKE1hdGguYWJzKGNvb3JkaW5hdGVzW2Nvb3JkaW5hdGVzLmxlbmd0aCAtIDFdKSkgKyBwYWRkaW5nICogMixcblx0XHRcdFx0XHQncGFkZGluZy1sZWZ0JzogcGFkZGluZyB8fCAnJyxcblx0XHRcdFx0XHQncGFkZGluZy1yaWdodCc6IHBhZGRpbmcgfHwgJydcblx0XHRcdFx0fTtcblxuXHRcdFx0dGhpcy4kc3RhZ2UuY3NzKGNzcyk7XG5cdFx0fVxuXHR9LCB7XG5cdFx0ZmlsdGVyOiBbICd3aWR0aCcsICdpdGVtcycsICdzZXR0aW5ncycgXSxcblx0XHRydW46IGZ1bmN0aW9uKGNhY2hlKSB7XG5cdFx0XHR2YXIgaXRlcmF0b3IgPSB0aGlzLl9jb29yZGluYXRlcy5sZW5ndGgsXG5cdFx0XHRcdGdyaWQgPSAhdGhpcy5zZXR0aW5ncy5hdXRvV2lkdGgsXG5cdFx0XHRcdGl0ZW1zID0gdGhpcy4kc3RhZ2UuY2hpbGRyZW4oKTtcblxuXHRcdFx0aWYgKGdyaWQgJiYgY2FjaGUuaXRlbXMubWVyZ2UpIHtcblx0XHRcdFx0d2hpbGUgKGl0ZXJhdG9yLS0pIHtcblx0XHRcdFx0XHRjYWNoZS5jc3Mud2lkdGggPSB0aGlzLl93aWR0aHNbdGhpcy5yZWxhdGl2ZShpdGVyYXRvcildO1xuXHRcdFx0XHRcdGl0ZW1zLmVxKGl0ZXJhdG9yKS5jc3MoY2FjaGUuY3NzKTtcblx0XHRcdFx0fVxuXHRcdFx0fSBlbHNlIGlmIChncmlkKSB7XG5cdFx0XHRcdGNhY2hlLmNzcy53aWR0aCA9IGNhY2hlLml0ZW1zLndpZHRoO1xuXHRcdFx0XHRpdGVtcy5jc3MoY2FjaGUuY3NzKTtcblx0XHRcdH1cblx0XHR9XG5cdH0sIHtcblx0XHRmaWx0ZXI6IFsgJ2l0ZW1zJyBdLFxuXHRcdHJ1bjogZnVuY3Rpb24oKSB7XG5cdFx0XHR0aGlzLl9jb29yZGluYXRlcy5sZW5ndGggPCAxICYmIHRoaXMuJHN0YWdlLnJlbW92ZUF0dHIoJ3N0eWxlJyk7XG5cdFx0fVxuXHR9LCB7XG5cdFx0ZmlsdGVyOiBbICd3aWR0aCcsICdpdGVtcycsICdzZXR0aW5ncycgXSxcblx0XHRydW46IGZ1bmN0aW9uKGNhY2hlKSB7XG5cdFx0XHRjYWNoZS5jdXJyZW50ID0gY2FjaGUuY3VycmVudCA/IHRoaXMuJHN0YWdlLmNoaWxkcmVuKCkuaW5kZXgoY2FjaGUuY3VycmVudCkgOiAwO1xuXHRcdFx0Y2FjaGUuY3VycmVudCA9IE1hdGgubWF4KHRoaXMubWluaW11bSgpLCBNYXRoLm1pbih0aGlzLm1heGltdW0oKSwgY2FjaGUuY3VycmVudCkpO1xuXHRcdFx0dGhpcy5yZXNldChjYWNoZS5jdXJyZW50KTtcblx0XHR9XG5cdH0sIHtcblx0XHRmaWx0ZXI6IFsgJ3Bvc2l0aW9uJyBdLFxuXHRcdHJ1bjogZnVuY3Rpb24oKSB7XG5cdFx0XHR0aGlzLmFuaW1hdGUodGhpcy5jb29yZGluYXRlcyh0aGlzLl9jdXJyZW50KSk7XG5cdFx0fVxuXHR9LCB7XG5cdFx0ZmlsdGVyOiBbICd3aWR0aCcsICdwb3NpdGlvbicsICdpdGVtcycsICdzZXR0aW5ncycgXSxcblx0XHRydW46IGZ1bmN0aW9uKCkge1xuXHRcdFx0dmFyIHJ0bCA9IHRoaXMuc2V0dGluZ3MucnRsID8gMSA6IC0xLFxuXHRcdFx0XHRwYWRkaW5nID0gdGhpcy5zZXR0aW5ncy5zdGFnZVBhZGRpbmcgKiAyLFxuXHRcdFx0XHRiZWdpbiA9IHRoaXMuY29vcmRpbmF0ZXModGhpcy5jdXJyZW50KCkpICsgcGFkZGluZyxcblx0XHRcdFx0ZW5kID0gYmVnaW4gKyB0aGlzLndpZHRoKCkgKiBydGwsXG5cdFx0XHRcdGlubmVyLCBvdXRlciwgbWF0Y2hlcyA9IFtdLCBpLCBuO1xuXG5cdFx0XHRmb3IgKGkgPSAwLCBuID0gdGhpcy5fY29vcmRpbmF0ZXMubGVuZ3RoOyBpIDwgbjsgaSsrKSB7XG5cdFx0XHRcdGlubmVyID0gdGhpcy5fY29vcmRpbmF0ZXNbaSAtIDFdIHx8IDA7XG5cdFx0XHRcdG91dGVyID0gTWF0aC5hYnModGhpcy5fY29vcmRpbmF0ZXNbaV0pICsgcGFkZGluZyAqIHJ0bDtcblxuXHRcdFx0XHRpZiAoKHRoaXMub3AoaW5uZXIsICc8PScsIGJlZ2luKSAmJiAodGhpcy5vcChpbm5lciwgJz4nLCBlbmQpKSlcblx0XHRcdFx0XHR8fCAodGhpcy5vcChvdXRlciwgJzwnLCBiZWdpbikgJiYgdGhpcy5vcChvdXRlciwgJz4nLCBlbmQpKSkge1xuXHRcdFx0XHRcdG1hdGNoZXMucHVzaChpKTtcblx0XHRcdFx0fVxuXHRcdFx0fVxuXG5cdFx0XHR0aGlzLiRzdGFnZS5jaGlsZHJlbignLmFjdGl2ZScpLnJlbW92ZUNsYXNzKCdhY3RpdmUnKTtcblx0XHRcdHRoaXMuJHN0YWdlLmNoaWxkcmVuKCc6ZXEoJyArIG1hdGNoZXMuam9pbignKSwgOmVxKCcpICsgJyknKS5hZGRDbGFzcygnYWN0aXZlJyk7XG5cblx0XHRcdHRoaXMuJHN0YWdlLmNoaWxkcmVuKCcuY2VudGVyJykucmVtb3ZlQ2xhc3MoJ2NlbnRlcicpO1xuXHRcdFx0aWYgKHRoaXMuc2V0dGluZ3MuY2VudGVyKSB7XG5cdFx0XHRcdHRoaXMuJHN0YWdlLmNoaWxkcmVuKCkuZXEodGhpcy5jdXJyZW50KCkpLmFkZENsYXNzKCdjZW50ZXInKTtcblx0XHRcdH1cblx0XHR9XG5cdH0gXTtcblxuXHQvKipcblx0ICogQ3JlYXRlIHRoZSBzdGFnZSBET00gZWxlbWVudFxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5pbml0aWFsaXplU3RhZ2UgPSBmdW5jdGlvbigpIHtcblx0XHR0aGlzLiRzdGFnZSA9IHRoaXMuJGVsZW1lbnQuZmluZCgnLicgKyB0aGlzLnNldHRpbmdzLnN0YWdlQ2xhc3MpO1xuXG5cdFx0Ly8gaWYgdGhlIHN0YWdlIGlzIGFscmVhZHkgaW4gdGhlIERPTSwgZ3JhYiBpdCBhbmQgc2tpcCBzdGFnZSBpbml0aWFsaXphdGlvblxuXHRcdGlmICh0aGlzLiRzdGFnZS5sZW5ndGgpIHtcblx0XHRcdHJldHVybjtcblx0XHR9XG5cblx0XHR0aGlzLiRlbGVtZW50LmFkZENsYXNzKHRoaXMub3B0aW9ucy5sb2FkaW5nQ2xhc3MpO1xuXG5cdFx0Ly8gY3JlYXRlIHN0YWdlXG5cdFx0dGhpcy4kc3RhZ2UgPSAkKCc8JyArIHRoaXMuc2V0dGluZ3Muc3RhZ2VFbGVtZW50ICsgJz4nLCB7XG5cdFx0XHRcImNsYXNzXCI6IHRoaXMuc2V0dGluZ3Muc3RhZ2VDbGFzc1xuXHRcdH0pLndyYXAoICQoICc8ZGl2Lz4nLCB7XG5cdFx0XHRcImNsYXNzXCI6IHRoaXMuc2V0dGluZ3Muc3RhZ2VPdXRlckNsYXNzXG5cdFx0fSkpO1xuXG5cdFx0Ly8gYXBwZW5kIHN0YWdlXG5cdFx0dGhpcy4kZWxlbWVudC5hcHBlbmQodGhpcy4kc3RhZ2UucGFyZW50KCkpO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBDcmVhdGUgaXRlbSBET00gZWxlbWVudHNcblx0ICovXG5cdE93bC5wcm90b3R5cGUuaW5pdGlhbGl6ZUl0ZW1zID0gZnVuY3Rpb24oKSB7XG5cdFx0dmFyICRpdGVtcyA9IHRoaXMuJGVsZW1lbnQuZmluZCgnLm93bC1pdGVtJyk7XG5cblx0XHQvLyBpZiB0aGUgaXRlbXMgYXJlIGFscmVhZHkgaW4gdGhlIERPTSwgZ3JhYiB0aGVtIGFuZCBza2lwIGl0ZW0gaW5pdGlhbGl6YXRpb25cblx0XHRpZiAoJGl0ZW1zLmxlbmd0aCkge1xuXHRcdFx0dGhpcy5faXRlbXMgPSAkaXRlbXMuZ2V0KCkubWFwKGZ1bmN0aW9uKGl0ZW0pIHtcblx0XHRcdFx0cmV0dXJuICQoaXRlbSk7XG5cdFx0XHR9KTtcblxuXHRcdFx0dGhpcy5fbWVyZ2VycyA9IHRoaXMuX2l0ZW1zLm1hcChmdW5jdGlvbigpIHtcblx0XHRcdFx0cmV0dXJuIDE7XG5cdFx0XHR9KTtcblxuXHRcdFx0dGhpcy5yZWZyZXNoKCk7XG5cblx0XHRcdHJldHVybjtcblx0XHR9XG5cblx0XHQvLyBhcHBlbmQgY29udGVudFxuXHRcdHRoaXMucmVwbGFjZSh0aGlzLiRlbGVtZW50LmNoaWxkcmVuKCkubm90KHRoaXMuJHN0YWdlLnBhcmVudCgpKSk7XG5cblx0XHQvLyBjaGVjayB2aXNpYmlsaXR5XG5cdFx0aWYgKHRoaXMuaXNWaXNpYmxlKCkpIHtcblx0XHRcdC8vIHVwZGF0ZSB2aWV3XG5cdFx0XHR0aGlzLnJlZnJlc2goKTtcblx0XHR9IGVsc2Uge1xuXHRcdFx0Ly8gaW52YWxpZGF0ZSB3aWR0aFxuXHRcdFx0dGhpcy5pbnZhbGlkYXRlKCd3aWR0aCcpO1xuXHRcdH1cblxuXHRcdHRoaXMuJGVsZW1lbnRcblx0XHRcdC5yZW1vdmVDbGFzcyh0aGlzLm9wdGlvbnMubG9hZGluZ0NsYXNzKVxuXHRcdFx0LmFkZENsYXNzKHRoaXMub3B0aW9ucy5sb2FkZWRDbGFzcyk7XG5cdH07XG5cblx0LyoqXG5cdCAqIEluaXRpYWxpemVzIHRoZSBjYXJvdXNlbC5cblx0ICogQHByb3RlY3RlZFxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5pbml0aWFsaXplID0gZnVuY3Rpb24oKSB7XG5cdFx0dGhpcy5lbnRlcignaW5pdGlhbGl6aW5nJyk7XG5cdFx0dGhpcy50cmlnZ2VyKCdpbml0aWFsaXplJyk7XG5cblx0XHR0aGlzLiRlbGVtZW50LnRvZ2dsZUNsYXNzKHRoaXMuc2V0dGluZ3MucnRsQ2xhc3MsIHRoaXMuc2V0dGluZ3MucnRsKTtcblxuXHRcdGlmICh0aGlzLnNldHRpbmdzLmF1dG9XaWR0aCAmJiAhdGhpcy5pcygncHJlLWxvYWRpbmcnKSkge1xuXHRcdFx0dmFyIGltZ3MsIG5lc3RlZFNlbGVjdG9yLCB3aWR0aDtcblx0XHRcdGltZ3MgPSB0aGlzLiRlbGVtZW50LmZpbmQoJ2ltZycpO1xuXHRcdFx0bmVzdGVkU2VsZWN0b3IgPSB0aGlzLnNldHRpbmdzLm5lc3RlZEl0ZW1TZWxlY3RvciA/ICcuJyArIHRoaXMuc2V0dGluZ3MubmVzdGVkSXRlbVNlbGVjdG9yIDogdW5kZWZpbmVkO1xuXHRcdFx0d2lkdGggPSB0aGlzLiRlbGVtZW50LmNoaWxkcmVuKG5lc3RlZFNlbGVjdG9yKS53aWR0aCgpO1xuXG5cdFx0XHRpZiAoaW1ncy5sZW5ndGggJiYgd2lkdGggPD0gMCkge1xuXHRcdFx0XHR0aGlzLnByZWxvYWRBdXRvV2lkdGhJbWFnZXMoaW1ncyk7XG5cdFx0XHR9XG5cdFx0fVxuXG5cdFx0dGhpcy5pbml0aWFsaXplU3RhZ2UoKTtcblx0XHR0aGlzLmluaXRpYWxpemVJdGVtcygpO1xuXG5cdFx0Ly8gcmVnaXN0ZXIgZXZlbnQgaGFuZGxlcnNcblx0XHR0aGlzLnJlZ2lzdGVyRXZlbnRIYW5kbGVycygpO1xuXG5cdFx0dGhpcy5sZWF2ZSgnaW5pdGlhbGl6aW5nJyk7XG5cdFx0dGhpcy50cmlnZ2VyKCdpbml0aWFsaXplZCcpO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBAcmV0dXJucyB7Qm9vbGVhbn0gdmlzaWJpbGl0eSBvZiAkZWxlbWVudFxuXHQgKiAgICAgICAgICAgICAgICAgICAgaWYgeW91IGtub3cgdGhlIGNhcm91c2VsIHdpbGwgYWx3YXlzIGJlIHZpc2libGUgeW91IGNhbiBzZXQgYGNoZWNrVmlzaWJpbGl0eWAgdG8gYGZhbHNlYCB0b1xuXHQgKiAgICAgICAgICAgICAgICAgICAgcHJldmVudCB0aGUgZXhwZW5zaXZlIGJyb3dzZXIgbGF5b3V0IGZvcmNlZCByZWZsb3cgdGhlICRlbGVtZW50LmlzKCc6dmlzaWJsZScpIGRvZXNcblx0ICovXG5cdE93bC5wcm90b3R5cGUuaXNWaXNpYmxlID0gZnVuY3Rpb24oKSB7XG5cdFx0cmV0dXJuIHRoaXMuc2V0dGluZ3MuY2hlY2tWaXNpYmlsaXR5XG5cdFx0XHQ/IHRoaXMuJGVsZW1lbnQuaXMoJzp2aXNpYmxlJylcblx0XHRcdDogdHJ1ZTtcblx0fTtcblxuXHQvKipcblx0ICogU2V0dXBzIHRoZSBjdXJyZW50IHNldHRpbmdzLlxuXHQgKiBAdG9kbyBSZW1vdmUgcmVzcG9uc2l2ZSBjbGFzc2VzLiBXaHkgc2hvdWxkIGFkYXB0aXZlIGRlc2lnbnMgYmUgYnJvdWdodCBpbnRvIElFOD9cblx0ICogQHRvZG8gU3VwcG9ydCBmb3IgbWVkaWEgcXVlcmllcyBieSB1c2luZyBgbWF0Y2hNZWRpYWAgd291bGQgYmUgbmljZS5cblx0ICogQHB1YmxpY1xuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5zZXR1cCA9IGZ1bmN0aW9uKCkge1xuXHRcdHZhciB2aWV3cG9ydCA9IHRoaXMudmlld3BvcnQoKSxcblx0XHRcdG92ZXJ3cml0ZXMgPSB0aGlzLm9wdGlvbnMucmVzcG9uc2l2ZSxcblx0XHRcdG1hdGNoID0gLTEsXG5cdFx0XHRzZXR0aW5ncyA9IG51bGw7XG5cblx0XHRpZiAoIW92ZXJ3cml0ZXMpIHtcblx0XHRcdHNldHRpbmdzID0gJC5leHRlbmQoe30sIHRoaXMub3B0aW9ucyk7XG5cdFx0fSBlbHNlIHtcblx0XHRcdCQuZWFjaChvdmVyd3JpdGVzLCBmdW5jdGlvbihicmVha3BvaW50KSB7XG5cdFx0XHRcdGlmIChicmVha3BvaW50IDw9IHZpZXdwb3J0ICYmIGJyZWFrcG9pbnQgPiBtYXRjaCkge1xuXHRcdFx0XHRcdG1hdGNoID0gTnVtYmVyKGJyZWFrcG9pbnQpO1xuXHRcdFx0XHR9XG5cdFx0XHR9KTtcblxuXHRcdFx0c2V0dGluZ3MgPSAkLmV4dGVuZCh7fSwgdGhpcy5vcHRpb25zLCBvdmVyd3JpdGVzW21hdGNoXSk7XG5cdFx0XHRpZiAodHlwZW9mIHNldHRpbmdzLnN0YWdlUGFkZGluZyA9PT0gJ2Z1bmN0aW9uJykge1xuXHRcdFx0XHRzZXR0aW5ncy5zdGFnZVBhZGRpbmcgPSBzZXR0aW5ncy5zdGFnZVBhZGRpbmcoKTtcblx0XHRcdH1cblx0XHRcdGRlbGV0ZSBzZXR0aW5ncy5yZXNwb25zaXZlO1xuXG5cdFx0XHQvLyByZXNwb25zaXZlIGNsYXNzXG5cdFx0XHRpZiAoc2V0dGluZ3MucmVzcG9uc2l2ZUNsYXNzKSB7XG5cdFx0XHRcdHRoaXMuJGVsZW1lbnQuYXR0cignY2xhc3MnLFxuXHRcdFx0XHRcdHRoaXMuJGVsZW1lbnQuYXR0cignY2xhc3MnKS5yZXBsYWNlKG5ldyBSZWdFeHAoJygnICsgdGhpcy5vcHRpb25zLnJlc3BvbnNpdmVDbGFzcyArICctKVxcXFxTK1xcXFxzJywgJ2cnKSwgJyQxJyArIG1hdGNoKVxuXHRcdFx0XHQpO1xuXHRcdFx0fVxuXHRcdH1cblxuXHRcdHRoaXMudHJpZ2dlcignY2hhbmdlJywgeyBwcm9wZXJ0eTogeyBuYW1lOiAnc2V0dGluZ3MnLCB2YWx1ZTogc2V0dGluZ3MgfSB9KTtcblx0XHR0aGlzLl9icmVha3BvaW50ID0gbWF0Y2g7XG5cdFx0dGhpcy5zZXR0aW5ncyA9IHNldHRpbmdzO1xuXHRcdHRoaXMuaW52YWxpZGF0ZSgnc2V0dGluZ3MnKTtcblx0XHR0aGlzLnRyaWdnZXIoJ2NoYW5nZWQnLCB7IHByb3BlcnR5OiB7IG5hbWU6ICdzZXR0aW5ncycsIHZhbHVlOiB0aGlzLnNldHRpbmdzIH0gfSk7XG5cdH07XG5cblx0LyoqXG5cdCAqIFVwZGF0ZXMgb3B0aW9uIGxvZ2ljIGlmIG5lY2Vzc2VyeS5cblx0ICogQHByb3RlY3RlZFxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5vcHRpb25zTG9naWMgPSBmdW5jdGlvbigpIHtcblx0XHRpZiAodGhpcy5zZXR0aW5ncy5hdXRvV2lkdGgpIHtcblx0XHRcdHRoaXMuc2V0dGluZ3Muc3RhZ2VQYWRkaW5nID0gZmFsc2U7XG5cdFx0XHR0aGlzLnNldHRpbmdzLm1lcmdlID0gZmFsc2U7XG5cdFx0fVxuXHR9O1xuXG5cdC8qKlxuXHQgKiBQcmVwYXJlcyBhbiBpdGVtIGJlZm9yZSBhZGQuXG5cdCAqIEB0b2RvIFJlbmFtZSBldmVudCBwYXJhbWV0ZXIgYGNvbnRlbnRgIHRvIGBpdGVtYC5cblx0ICogQHByb3RlY3RlZFxuXHQgKiBAcmV0dXJucyB7alF1ZXJ5fEhUTUxFbGVtZW50fSAtIFRoZSBpdGVtIGNvbnRhaW5lci5cblx0ICovXG5cdE93bC5wcm90b3R5cGUucHJlcGFyZSA9IGZ1bmN0aW9uKGl0ZW0pIHtcblx0XHR2YXIgZXZlbnQgPSB0aGlzLnRyaWdnZXIoJ3ByZXBhcmUnLCB7IGNvbnRlbnQ6IGl0ZW0gfSk7XG5cblx0XHRpZiAoIWV2ZW50LmRhdGEpIHtcblx0XHRcdGV2ZW50LmRhdGEgPSAkKCc8JyArIHRoaXMuc2V0dGluZ3MuaXRlbUVsZW1lbnQgKyAnLz4nKVxuXHRcdFx0XHQuYWRkQ2xhc3ModGhpcy5vcHRpb25zLml0ZW1DbGFzcykuYXBwZW5kKGl0ZW0pXG5cdFx0fVxuXG5cdFx0dGhpcy50cmlnZ2VyKCdwcmVwYXJlZCcsIHsgY29udGVudDogZXZlbnQuZGF0YSB9KTtcblxuXHRcdHJldHVybiBldmVudC5kYXRhO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBVcGRhdGVzIHRoZSB2aWV3LlxuXHQgKiBAcHVibGljXG5cdCAqL1xuXHRPd2wucHJvdG90eXBlLnVwZGF0ZSA9IGZ1bmN0aW9uKCkge1xuXHRcdHZhciBpID0gMCxcblx0XHRcdG4gPSB0aGlzLl9waXBlLmxlbmd0aCxcblx0XHRcdGZpbHRlciA9ICQucHJveHkoZnVuY3Rpb24ocCkgeyByZXR1cm4gdGhpc1twXSB9LCB0aGlzLl9pbnZhbGlkYXRlZCksXG5cdFx0XHRjYWNoZSA9IHt9O1xuXG5cdFx0d2hpbGUgKGkgPCBuKSB7XG5cdFx0XHRpZiAodGhpcy5faW52YWxpZGF0ZWQuYWxsIHx8ICQuZ3JlcCh0aGlzLl9waXBlW2ldLmZpbHRlciwgZmlsdGVyKS5sZW5ndGggPiAwKSB7XG5cdFx0XHRcdHRoaXMuX3BpcGVbaV0ucnVuKGNhY2hlKTtcblx0XHRcdH1cblx0XHRcdGkrKztcblx0XHR9XG5cblx0XHR0aGlzLl9pbnZhbGlkYXRlZCA9IHt9O1xuXG5cdFx0IXRoaXMuaXMoJ3ZhbGlkJykgJiYgdGhpcy5lbnRlcigndmFsaWQnKTtcblx0fTtcblxuXHQvKipcblx0ICogR2V0cyB0aGUgd2lkdGggb2YgdGhlIHZpZXcuXG5cdCAqIEBwdWJsaWNcblx0ICogQHBhcmFtIHtPd2wuV2lkdGh9IFtkaW1lbnNpb249T3dsLldpZHRoLkRlZmF1bHRdIC0gVGhlIGRpbWVuc2lvbiB0byByZXR1cm4uXG5cdCAqIEByZXR1cm5zIHtOdW1iZXJ9IC0gVGhlIHdpZHRoIG9mIHRoZSB2aWV3IGluIHBpeGVsLlxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS53aWR0aCA9IGZ1bmN0aW9uKGRpbWVuc2lvbikge1xuXHRcdGRpbWVuc2lvbiA9IGRpbWVuc2lvbiB8fCBPd2wuV2lkdGguRGVmYXVsdDtcblx0XHRzd2l0Y2ggKGRpbWVuc2lvbikge1xuXHRcdFx0Y2FzZSBPd2wuV2lkdGguSW5uZXI6XG5cdFx0XHRjYXNlIE93bC5XaWR0aC5PdXRlcjpcblx0XHRcdFx0cmV0dXJuIHRoaXMuX3dpZHRoO1xuXHRcdFx0ZGVmYXVsdDpcblx0XHRcdFx0cmV0dXJuIHRoaXMuX3dpZHRoIC0gdGhpcy5zZXR0aW5ncy5zdGFnZVBhZGRpbmcgKiAyICsgdGhpcy5zZXR0aW5ncy5tYXJnaW47XG5cdFx0fVxuXHR9O1xuXG5cdC8qKlxuXHQgKiBSZWZyZXNoZXMgdGhlIGNhcm91c2VsIHByaW1hcmlseSBmb3IgYWRhcHRpdmUgcHVycG9zZXMuXG5cdCAqIEBwdWJsaWNcblx0ICovXG5cdE93bC5wcm90b3R5cGUucmVmcmVzaCA9IGZ1bmN0aW9uKCkge1xuXHRcdHRoaXMuZW50ZXIoJ3JlZnJlc2hpbmcnKTtcblx0XHR0aGlzLnRyaWdnZXIoJ3JlZnJlc2gnKTtcblxuXHRcdHRoaXMuc2V0dXAoKTtcblxuXHRcdHRoaXMub3B0aW9uc0xvZ2ljKCk7XG5cblx0XHR0aGlzLiRlbGVtZW50LmFkZENsYXNzKHRoaXMub3B0aW9ucy5yZWZyZXNoQ2xhc3MpO1xuXG5cdFx0dGhpcy51cGRhdGUoKTtcblxuXHRcdHRoaXMuJGVsZW1lbnQucmVtb3ZlQ2xhc3ModGhpcy5vcHRpb25zLnJlZnJlc2hDbGFzcyk7XG5cblx0XHR0aGlzLmxlYXZlKCdyZWZyZXNoaW5nJyk7XG5cdFx0dGhpcy50cmlnZ2VyKCdyZWZyZXNoZWQnKTtcblx0fTtcblxuXHQvKipcblx0ICogQ2hlY2tzIHdpbmRvdyBgcmVzaXplYCBldmVudC5cblx0ICogQHByb3RlY3RlZFxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5vblRocm90dGxlZFJlc2l6ZSA9IGZ1bmN0aW9uKCkge1xuXHRcdHdpbmRvdy5jbGVhclRpbWVvdXQodGhpcy5yZXNpemVUaW1lcik7XG5cdFx0dGhpcy5yZXNpemVUaW1lciA9IHdpbmRvdy5zZXRUaW1lb3V0KHRoaXMuX2hhbmRsZXJzLm9uUmVzaXplLCB0aGlzLnNldHRpbmdzLnJlc3BvbnNpdmVSZWZyZXNoUmF0ZSk7XG5cdH07XG5cblx0LyoqXG5cdCAqIENoZWNrcyB3aW5kb3cgYHJlc2l6ZWAgZXZlbnQuXG5cdCAqIEBwcm90ZWN0ZWRcblx0ICovXG5cdE93bC5wcm90b3R5cGUub25SZXNpemUgPSBmdW5jdGlvbigpIHtcblx0XHRpZiAoIXRoaXMuX2l0ZW1zLmxlbmd0aCkge1xuXHRcdFx0cmV0dXJuIGZhbHNlO1xuXHRcdH1cblxuXHRcdGlmICh0aGlzLl93aWR0aCA9PT0gdGhpcy4kZWxlbWVudC53aWR0aCgpKSB7XG5cdFx0XHRyZXR1cm4gZmFsc2U7XG5cdFx0fVxuXG5cdFx0aWYgKCF0aGlzLmlzVmlzaWJsZSgpKSB7XG5cdFx0XHRyZXR1cm4gZmFsc2U7XG5cdFx0fVxuXG5cdFx0dGhpcy5lbnRlcigncmVzaXppbmcnKTtcblxuXHRcdGlmICh0aGlzLnRyaWdnZXIoJ3Jlc2l6ZScpLmlzRGVmYXVsdFByZXZlbnRlZCgpKSB7XG5cdFx0XHR0aGlzLmxlYXZlKCdyZXNpemluZycpO1xuXHRcdFx0cmV0dXJuIGZhbHNlO1xuXHRcdH1cblxuXHRcdHRoaXMuaW52YWxpZGF0ZSgnd2lkdGgnKTtcblxuXHRcdHRoaXMucmVmcmVzaCgpO1xuXG5cdFx0dGhpcy5sZWF2ZSgncmVzaXppbmcnKTtcblx0XHR0aGlzLnRyaWdnZXIoJ3Jlc2l6ZWQnKTtcblx0fTtcblxuXHQvKipcblx0ICogUmVnaXN0ZXJzIGV2ZW50IGhhbmRsZXJzLlxuXHQgKiBAdG9kbyBDaGVjayBgbXNQb2ludGVyRW5hYmxlZGBcblx0ICogQHRvZG8gIzI2MVxuXHQgKiBAcHJvdGVjdGVkXG5cdCAqL1xuXHRPd2wucHJvdG90eXBlLnJlZ2lzdGVyRXZlbnRIYW5kbGVycyA9IGZ1bmN0aW9uKCkge1xuXHRcdGlmICgkLnN1cHBvcnQudHJhbnNpdGlvbikge1xuXHRcdFx0dGhpcy4kc3RhZ2Uub24oJC5zdXBwb3J0LnRyYW5zaXRpb24uZW5kICsgJy5vd2wuY29yZScsICQucHJveHkodGhpcy5vblRyYW5zaXRpb25FbmQsIHRoaXMpKTtcblx0XHR9XG5cblx0XHRpZiAodGhpcy5zZXR0aW5ncy5yZXNwb25zaXZlICE9PSBmYWxzZSkge1xuXHRcdFx0dGhpcy5vbih3aW5kb3csICdyZXNpemUnLCB0aGlzLl9oYW5kbGVycy5vblRocm90dGxlZFJlc2l6ZSk7XG5cdFx0fVxuXG5cdFx0aWYgKHRoaXMuc2V0dGluZ3MubW91c2VEcmFnKSB7XG5cdFx0XHR0aGlzLiRlbGVtZW50LmFkZENsYXNzKHRoaXMub3B0aW9ucy5kcmFnQ2xhc3MpO1xuXHRcdFx0dGhpcy4kc3RhZ2Uub24oJ21vdXNlZG93bi5vd2wuY29yZScsICQucHJveHkodGhpcy5vbkRyYWdTdGFydCwgdGhpcykpO1xuXHRcdFx0dGhpcy4kc3RhZ2Uub24oJ2RyYWdzdGFydC5vd2wuY29yZSBzZWxlY3RzdGFydC5vd2wuY29yZScsIGZ1bmN0aW9uKCkgeyByZXR1cm4gZmFsc2UgfSk7XG5cdFx0fVxuXG5cdFx0aWYgKHRoaXMuc2V0dGluZ3MudG91Y2hEcmFnKXtcblx0XHRcdHRoaXMuJHN0YWdlLm9uKCd0b3VjaHN0YXJ0Lm93bC5jb3JlJywgJC5wcm94eSh0aGlzLm9uRHJhZ1N0YXJ0LCB0aGlzKSk7XG5cdFx0XHR0aGlzLiRzdGFnZS5vbigndG91Y2hjYW5jZWwub3dsLmNvcmUnLCAkLnByb3h5KHRoaXMub25EcmFnRW5kLCB0aGlzKSk7XG5cdFx0fVxuXHR9O1xuXG5cdC8qKlxuXHQgKiBIYW5kbGVzIGB0b3VjaHN0YXJ0YCBhbmQgYG1vdXNlZG93bmAgZXZlbnRzLlxuXHQgKiBAdG9kbyBIb3Jpem9udGFsIHN3aXBlIHRocmVzaG9sZCBhcyBvcHRpb25cblx0ICogQHRvZG8gIzI2MVxuXHQgKiBAcHJvdGVjdGVkXG5cdCAqIEBwYXJhbSB7RXZlbnR9IGV2ZW50IC0gVGhlIGV2ZW50IGFyZ3VtZW50cy5cblx0ICovXG5cdE93bC5wcm90b3R5cGUub25EcmFnU3RhcnQgPSBmdW5jdGlvbihldmVudCkge1xuXHRcdHZhciBzdGFnZSA9IG51bGw7XG5cblx0XHRpZiAoZXZlbnQud2hpY2ggPT09IDMpIHtcblx0XHRcdHJldHVybjtcblx0XHR9XG5cblx0XHRpZiAoJC5zdXBwb3J0LnRyYW5zZm9ybSkge1xuXHRcdFx0c3RhZ2UgPSB0aGlzLiRzdGFnZS5jc3MoJ3RyYW5zZm9ybScpLnJlcGxhY2UoLy4qXFwofFxcKXwgL2csICcnKS5zcGxpdCgnLCcpO1xuXHRcdFx0c3RhZ2UgPSB7XG5cdFx0XHRcdHg6IHN0YWdlW3N0YWdlLmxlbmd0aCA9PT0gMTYgPyAxMiA6IDRdLFxuXHRcdFx0XHR5OiBzdGFnZVtzdGFnZS5sZW5ndGggPT09IDE2ID8gMTMgOiA1XVxuXHRcdFx0fTtcblx0XHR9IGVsc2Uge1xuXHRcdFx0c3RhZ2UgPSB0aGlzLiRzdGFnZS5wb3NpdGlvbigpO1xuXHRcdFx0c3RhZ2UgPSB7XG5cdFx0XHRcdHg6IHRoaXMuc2V0dGluZ3MucnRsID9cblx0XHRcdFx0XHRzdGFnZS5sZWZ0ICsgdGhpcy4kc3RhZ2Uud2lkdGgoKSAtIHRoaXMud2lkdGgoKSArIHRoaXMuc2V0dGluZ3MubWFyZ2luIDpcblx0XHRcdFx0XHRzdGFnZS5sZWZ0LFxuXHRcdFx0XHR5OiBzdGFnZS50b3Bcblx0XHRcdH07XG5cdFx0fVxuXG5cdFx0aWYgKHRoaXMuaXMoJ2FuaW1hdGluZycpKSB7XG5cdFx0XHQkLnN1cHBvcnQudHJhbnNmb3JtID8gdGhpcy5hbmltYXRlKHN0YWdlLngpIDogdGhpcy4kc3RhZ2Uuc3RvcCgpXG5cdFx0XHR0aGlzLmludmFsaWRhdGUoJ3Bvc2l0aW9uJyk7XG5cdFx0fVxuXG5cdFx0dGhpcy4kZWxlbWVudC50b2dnbGVDbGFzcyh0aGlzLm9wdGlvbnMuZ3JhYkNsYXNzLCBldmVudC50eXBlID09PSAnbW91c2Vkb3duJyk7XG5cblx0XHR0aGlzLnNwZWVkKDApO1xuXG5cdFx0dGhpcy5fZHJhZy50aW1lID0gbmV3IERhdGUoKS5nZXRUaW1lKCk7XG5cdFx0dGhpcy5fZHJhZy50YXJnZXQgPSAkKGV2ZW50LnRhcmdldCk7XG5cdFx0dGhpcy5fZHJhZy5zdGFnZS5zdGFydCA9IHN0YWdlO1xuXHRcdHRoaXMuX2RyYWcuc3RhZ2UuY3VycmVudCA9IHN0YWdlO1xuXHRcdHRoaXMuX2RyYWcucG9pbnRlciA9IHRoaXMucG9pbnRlcihldmVudCk7XG5cblx0XHQkKGRvY3VtZW50KS5vbignbW91c2V1cC5vd2wuY29yZSB0b3VjaGVuZC5vd2wuY29yZScsICQucHJveHkodGhpcy5vbkRyYWdFbmQsIHRoaXMpKTtcblxuXHRcdCQoZG9jdW1lbnQpLm9uZSgnbW91c2Vtb3ZlLm93bC5jb3JlIHRvdWNobW92ZS5vd2wuY29yZScsICQucHJveHkoZnVuY3Rpb24oZXZlbnQpIHtcblx0XHRcdHZhciBkZWx0YSA9IHRoaXMuZGlmZmVyZW5jZSh0aGlzLl9kcmFnLnBvaW50ZXIsIHRoaXMucG9pbnRlcihldmVudCkpO1xuXG5cdFx0XHQkKGRvY3VtZW50KS5vbignbW91c2Vtb3ZlLm93bC5jb3JlIHRvdWNobW92ZS5vd2wuY29yZScsICQucHJveHkodGhpcy5vbkRyYWdNb3ZlLCB0aGlzKSk7XG5cblx0XHRcdGlmIChNYXRoLmFicyhkZWx0YS54KSA8IE1hdGguYWJzKGRlbHRhLnkpICYmIHRoaXMuaXMoJ3ZhbGlkJykpIHtcblx0XHRcdFx0cmV0dXJuO1xuXHRcdFx0fVxuXG5cdFx0XHRldmVudC5wcmV2ZW50RGVmYXVsdCgpO1xuXG5cdFx0XHR0aGlzLmVudGVyKCdkcmFnZ2luZycpO1xuXHRcdFx0dGhpcy50cmlnZ2VyKCdkcmFnJyk7XG5cdFx0fSwgdGhpcykpO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBIYW5kbGVzIHRoZSBgdG91Y2htb3ZlYCBhbmQgYG1vdXNlbW92ZWAgZXZlbnRzLlxuXHQgKiBAdG9kbyAjMjYxXG5cdCAqIEBwcm90ZWN0ZWRcblx0ICogQHBhcmFtIHtFdmVudH0gZXZlbnQgLSBUaGUgZXZlbnQgYXJndW1lbnRzLlxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5vbkRyYWdNb3ZlID0gZnVuY3Rpb24oZXZlbnQpIHtcblx0XHR2YXIgbWluaW11bSA9IG51bGwsXG5cdFx0XHRtYXhpbXVtID0gbnVsbCxcblx0XHRcdHB1bGwgPSBudWxsLFxuXHRcdFx0ZGVsdGEgPSB0aGlzLmRpZmZlcmVuY2UodGhpcy5fZHJhZy5wb2ludGVyLCB0aGlzLnBvaW50ZXIoZXZlbnQpKSxcblx0XHRcdHN0YWdlID0gdGhpcy5kaWZmZXJlbmNlKHRoaXMuX2RyYWcuc3RhZ2Uuc3RhcnQsIGRlbHRhKTtcblxuXHRcdGlmICghdGhpcy5pcygnZHJhZ2dpbmcnKSkge1xuXHRcdFx0cmV0dXJuO1xuXHRcdH1cblxuXHRcdGV2ZW50LnByZXZlbnREZWZhdWx0KCk7XG5cblx0XHRpZiAodGhpcy5zZXR0aW5ncy5sb29wKSB7XG5cdFx0XHRtaW5pbXVtID0gdGhpcy5jb29yZGluYXRlcyh0aGlzLm1pbmltdW0oKSk7XG5cdFx0XHRtYXhpbXVtID0gdGhpcy5jb29yZGluYXRlcyh0aGlzLm1heGltdW0oKSArIDEpIC0gbWluaW11bTtcblx0XHRcdHN0YWdlLnggPSAoKChzdGFnZS54IC0gbWluaW11bSkgJSBtYXhpbXVtICsgbWF4aW11bSkgJSBtYXhpbXVtKSArIG1pbmltdW07XG5cdFx0fSBlbHNlIHtcblx0XHRcdG1pbmltdW0gPSB0aGlzLnNldHRpbmdzLnJ0bCA/IHRoaXMuY29vcmRpbmF0ZXModGhpcy5tYXhpbXVtKCkpIDogdGhpcy5jb29yZGluYXRlcyh0aGlzLm1pbmltdW0oKSk7XG5cdFx0XHRtYXhpbXVtID0gdGhpcy5zZXR0aW5ncy5ydGwgPyB0aGlzLmNvb3JkaW5hdGVzKHRoaXMubWluaW11bSgpKSA6IHRoaXMuY29vcmRpbmF0ZXModGhpcy5tYXhpbXVtKCkpO1xuXHRcdFx0cHVsbCA9IHRoaXMuc2V0dGluZ3MucHVsbERyYWcgPyAtMSAqIGRlbHRhLnggLyA1IDogMDtcblx0XHRcdHN0YWdlLnggPSBNYXRoLm1heChNYXRoLm1pbihzdGFnZS54LCBtaW5pbXVtICsgcHVsbCksIG1heGltdW0gKyBwdWxsKTtcblx0XHR9XG5cblx0XHR0aGlzLl9kcmFnLnN0YWdlLmN1cnJlbnQgPSBzdGFnZTtcblxuXHRcdHRoaXMuYW5pbWF0ZShzdGFnZS54KTtcblx0fTtcblxuXHQvKipcblx0ICogSGFuZGxlcyB0aGUgYHRvdWNoZW5kYCBhbmQgYG1vdXNldXBgIGV2ZW50cy5cblx0ICogQHRvZG8gIzI2MVxuXHQgKiBAdG9kbyBUaHJlc2hvbGQgZm9yIGNsaWNrIGV2ZW50XG5cdCAqIEBwcm90ZWN0ZWRcblx0ICogQHBhcmFtIHtFdmVudH0gZXZlbnQgLSBUaGUgZXZlbnQgYXJndW1lbnRzLlxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5vbkRyYWdFbmQgPSBmdW5jdGlvbihldmVudCkge1xuXHRcdHZhciBkZWx0YSA9IHRoaXMuZGlmZmVyZW5jZSh0aGlzLl9kcmFnLnBvaW50ZXIsIHRoaXMucG9pbnRlcihldmVudCkpLFxuXHRcdFx0c3RhZ2UgPSB0aGlzLl9kcmFnLnN0YWdlLmN1cnJlbnQsXG5cdFx0XHRkaXJlY3Rpb24gPSBkZWx0YS54ID4gMCBeIHRoaXMuc2V0dGluZ3MucnRsID8gJ2xlZnQnIDogJ3JpZ2h0JztcblxuXHRcdCQoZG9jdW1lbnQpLm9mZignLm93bC5jb3JlJyk7XG5cblx0XHR0aGlzLiRlbGVtZW50LnJlbW92ZUNsYXNzKHRoaXMub3B0aW9ucy5ncmFiQ2xhc3MpO1xuXG5cdFx0aWYgKGRlbHRhLnggIT09IDAgJiYgdGhpcy5pcygnZHJhZ2dpbmcnKSB8fCAhdGhpcy5pcygndmFsaWQnKSkge1xuXHRcdFx0dGhpcy5zcGVlZCh0aGlzLnNldHRpbmdzLmRyYWdFbmRTcGVlZCB8fCB0aGlzLnNldHRpbmdzLnNtYXJ0U3BlZWQpO1xuXHRcdFx0dGhpcy5jdXJyZW50KHRoaXMuY2xvc2VzdChzdGFnZS54LCBkZWx0YS54ICE9PSAwID8gZGlyZWN0aW9uIDogdGhpcy5fZHJhZy5kaXJlY3Rpb24pKTtcblx0XHRcdHRoaXMuaW52YWxpZGF0ZSgncG9zaXRpb24nKTtcblx0XHRcdHRoaXMudXBkYXRlKCk7XG5cblx0XHRcdHRoaXMuX2RyYWcuZGlyZWN0aW9uID0gZGlyZWN0aW9uO1xuXG5cdFx0XHRpZiAoTWF0aC5hYnMoZGVsdGEueCkgPiAzIHx8IG5ldyBEYXRlKCkuZ2V0VGltZSgpIC0gdGhpcy5fZHJhZy50aW1lID4gMzAwKSB7XG5cdFx0XHRcdHRoaXMuX2RyYWcudGFyZ2V0Lm9uZSgnY2xpY2sub3dsLmNvcmUnLCBmdW5jdGlvbigpIHsgcmV0dXJuIGZhbHNlOyB9KTtcblx0XHRcdH1cblx0XHR9XG5cblx0XHRpZiAoIXRoaXMuaXMoJ2RyYWdnaW5nJykpIHtcblx0XHRcdHJldHVybjtcblx0XHR9XG5cblx0XHR0aGlzLmxlYXZlKCdkcmFnZ2luZycpO1xuXHRcdHRoaXMudHJpZ2dlcignZHJhZ2dlZCcpO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBHZXRzIGFic29sdXRlIHBvc2l0aW9uIG9mIHRoZSBjbG9zZXN0IGl0ZW0gZm9yIGEgY29vcmRpbmF0ZS5cblx0ICogQHRvZG8gU2V0dGluZyBgZnJlZURyYWdgIG1ha2VzIGBjbG9zZXN0YCBub3QgcmV1c2FibGUuIFNlZSAjMTY1LlxuXHQgKiBAcHJvdGVjdGVkXG5cdCAqIEBwYXJhbSB7TnVtYmVyfSBjb29yZGluYXRlIC0gVGhlIGNvb3JkaW5hdGUgaW4gcGl4ZWwuXG5cdCAqIEBwYXJhbSB7U3RyaW5nfSBkaXJlY3Rpb24gLSBUaGUgZGlyZWN0aW9uIHRvIGNoZWNrIGZvciB0aGUgY2xvc2VzdCBpdGVtLiBFdGhlciBgbGVmdGAgb3IgYHJpZ2h0YC5cblx0ICogQHJldHVybiB7TnVtYmVyfSAtIFRoZSBhYnNvbHV0ZSBwb3NpdGlvbiBvZiB0aGUgY2xvc2VzdCBpdGVtLlxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5jbG9zZXN0ID0gZnVuY3Rpb24oY29vcmRpbmF0ZSwgZGlyZWN0aW9uKSB7XG5cdFx0dmFyIHBvc2l0aW9uID0gLTEsXG5cdFx0XHRwdWxsID0gMzAsXG5cdFx0XHR3aWR0aCA9IHRoaXMud2lkdGgoKSxcblx0XHRcdGNvb3JkaW5hdGVzID0gdGhpcy5jb29yZGluYXRlcygpO1xuXG5cdFx0aWYgKCF0aGlzLnNldHRpbmdzLmZyZWVEcmFnKSB7XG5cdFx0XHQvLyBjaGVjayBjbG9zZXN0IGl0ZW1cblx0XHRcdCQuZWFjaChjb29yZGluYXRlcywgJC5wcm94eShmdW5jdGlvbihpbmRleCwgdmFsdWUpIHtcblx0XHRcdFx0Ly8gb24gYSBsZWZ0IHB1bGwsIGNoZWNrIG9uIGN1cnJlbnQgaW5kZXhcblx0XHRcdFx0aWYgKGRpcmVjdGlvbiA9PT0gJ2xlZnQnICYmIGNvb3JkaW5hdGUgPiB2YWx1ZSAtIHB1bGwgJiYgY29vcmRpbmF0ZSA8IHZhbHVlICsgcHVsbCkge1xuXHRcdFx0XHRcdHBvc2l0aW9uID0gaW5kZXg7XG5cdFx0XHRcdC8vIG9uIGEgcmlnaHQgcHVsbCwgY2hlY2sgb24gcHJldmlvdXMgaW5kZXhcblx0XHRcdFx0Ly8gdG8gZG8gc28sIHN1YnRyYWN0IHdpZHRoIGZyb20gdmFsdWUgYW5kIHNldCBwb3NpdGlvbiA9IGluZGV4ICsgMVxuXHRcdFx0XHR9IGVsc2UgaWYgKGRpcmVjdGlvbiA9PT0gJ3JpZ2h0JyAmJiBjb29yZGluYXRlID4gdmFsdWUgLSB3aWR0aCAtIHB1bGwgJiYgY29vcmRpbmF0ZSA8IHZhbHVlIC0gd2lkdGggKyBwdWxsKSB7XG5cdFx0XHRcdFx0cG9zaXRpb24gPSBpbmRleCArIDE7XG5cdFx0XHRcdH0gZWxzZSBpZiAodGhpcy5vcChjb29yZGluYXRlLCAnPCcsIHZhbHVlKVxuXHRcdFx0XHRcdCYmIHRoaXMub3AoY29vcmRpbmF0ZSwgJz4nLCBjb29yZGluYXRlc1tpbmRleCArIDFdICE9PSB1bmRlZmluZWQgPyBjb29yZGluYXRlc1tpbmRleCArIDFdIDogdmFsdWUgLSB3aWR0aCkpIHtcblx0XHRcdFx0XHRwb3NpdGlvbiA9IGRpcmVjdGlvbiA9PT0gJ2xlZnQnID8gaW5kZXggKyAxIDogaW5kZXg7XG5cdFx0XHRcdH1cblx0XHRcdFx0cmV0dXJuIHBvc2l0aW9uID09PSAtMTtcblx0XHRcdH0sIHRoaXMpKTtcblx0XHR9XG5cblx0XHRpZiAoIXRoaXMuc2V0dGluZ3MubG9vcCkge1xuXHRcdFx0Ly8gbm9uIGxvb3AgYm91bmRyaWVzXG5cdFx0XHRpZiAodGhpcy5vcChjb29yZGluYXRlLCAnPicsIGNvb3JkaW5hdGVzW3RoaXMubWluaW11bSgpXSkpIHtcblx0XHRcdFx0cG9zaXRpb24gPSBjb29yZGluYXRlID0gdGhpcy5taW5pbXVtKCk7XG5cdFx0XHR9IGVsc2UgaWYgKHRoaXMub3AoY29vcmRpbmF0ZSwgJzwnLCBjb29yZGluYXRlc1t0aGlzLm1heGltdW0oKV0pKSB7XG5cdFx0XHRcdHBvc2l0aW9uID0gY29vcmRpbmF0ZSA9IHRoaXMubWF4aW11bSgpO1xuXHRcdFx0fVxuXHRcdH1cblxuXHRcdHJldHVybiBwb3NpdGlvbjtcblx0fTtcblxuXHQvKipcblx0ICogQW5pbWF0ZXMgdGhlIHN0YWdlLlxuXHQgKiBAdG9kbyAjMjcwXG5cdCAqIEBwdWJsaWNcblx0ICogQHBhcmFtIHtOdW1iZXJ9IGNvb3JkaW5hdGUgLSBUaGUgY29vcmRpbmF0ZSBpbiBwaXhlbHMuXG5cdCAqL1xuXHRPd2wucHJvdG90eXBlLmFuaW1hdGUgPSBmdW5jdGlvbihjb29yZGluYXRlKSB7XG5cdFx0dmFyIGFuaW1hdGUgPSB0aGlzLnNwZWVkKCkgPiAwO1xuXG5cdFx0dGhpcy5pcygnYW5pbWF0aW5nJykgJiYgdGhpcy5vblRyYW5zaXRpb25FbmQoKTtcblxuXHRcdGlmIChhbmltYXRlKSB7XG5cdFx0XHR0aGlzLmVudGVyKCdhbmltYXRpbmcnKTtcblx0XHRcdHRoaXMudHJpZ2dlcigndHJhbnNsYXRlJyk7XG5cdFx0fVxuXG5cdFx0aWYgKCQuc3VwcG9ydC50cmFuc2Zvcm0zZCAmJiAkLnN1cHBvcnQudHJhbnNpdGlvbikge1xuXHRcdFx0dGhpcy4kc3RhZ2UuY3NzKHtcblx0XHRcdFx0dHJhbnNmb3JtOiAndHJhbnNsYXRlM2QoJyArIGNvb3JkaW5hdGUgKyAncHgsMHB4LDBweCknLFxuXHRcdFx0XHR0cmFuc2l0aW9uOiAodGhpcy5zcGVlZCgpIC8gMTAwMCkgKyAncycgKyAoXG5cdFx0XHRcdFx0dGhpcy5zZXR0aW5ncy5zbGlkZVRyYW5zaXRpb24gPyAnICcgKyB0aGlzLnNldHRpbmdzLnNsaWRlVHJhbnNpdGlvbiA6ICcnXG5cdFx0XHRcdClcblx0XHRcdH0pO1xuXHRcdH0gZWxzZSBpZiAoYW5pbWF0ZSkge1xuXHRcdFx0dGhpcy4kc3RhZ2UuYW5pbWF0ZSh7XG5cdFx0XHRcdGxlZnQ6IGNvb3JkaW5hdGUgKyAncHgnXG5cdFx0XHR9LCB0aGlzLnNwZWVkKCksIHRoaXMuc2V0dGluZ3MuZmFsbGJhY2tFYXNpbmcsICQucHJveHkodGhpcy5vblRyYW5zaXRpb25FbmQsIHRoaXMpKTtcblx0XHR9IGVsc2Uge1xuXHRcdFx0dGhpcy4kc3RhZ2UuY3NzKHtcblx0XHRcdFx0bGVmdDogY29vcmRpbmF0ZSArICdweCdcblx0XHRcdH0pO1xuXHRcdH1cblx0fTtcblxuXHQvKipcblx0ICogQ2hlY2tzIHdoZXRoZXIgdGhlIGNhcm91c2VsIGlzIGluIGEgc3BlY2lmaWMgc3RhdGUgb3Igbm90LlxuXHQgKiBAcGFyYW0ge1N0cmluZ30gc3RhdGUgLSBUaGUgc3RhdGUgdG8gY2hlY2suXG5cdCAqIEByZXR1cm5zIHtCb29sZWFufSAtIFRoZSBmbGFnIHdoaWNoIGluZGljYXRlcyBpZiB0aGUgY2Fyb3VzZWwgaXMgYnVzeS5cblx0ICovXG5cdE93bC5wcm90b3R5cGUuaXMgPSBmdW5jdGlvbihzdGF0ZSkge1xuXHRcdHJldHVybiB0aGlzLl9zdGF0ZXMuY3VycmVudFtzdGF0ZV0gJiYgdGhpcy5fc3RhdGVzLmN1cnJlbnRbc3RhdGVdID4gMDtcblx0fTtcblxuXHQvKipcblx0ICogU2V0cyB0aGUgYWJzb2x1dGUgcG9zaXRpb24gb2YgdGhlIGN1cnJlbnQgaXRlbS5cblx0ICogQHB1YmxpY1xuXHQgKiBAcGFyYW0ge051bWJlcn0gW3Bvc2l0aW9uXSAtIFRoZSBuZXcgYWJzb2x1dGUgcG9zaXRpb24gb3Igbm90aGluZyB0byBsZWF2ZSBpdCB1bmNoYW5nZWQuXG5cdCAqIEByZXR1cm5zIHtOdW1iZXJ9IC0gVGhlIGFic29sdXRlIHBvc2l0aW9uIG9mIHRoZSBjdXJyZW50IGl0ZW0uXG5cdCAqL1xuXHRPd2wucHJvdG90eXBlLmN1cnJlbnQgPSBmdW5jdGlvbihwb3NpdGlvbikge1xuXHRcdGlmIChwb3NpdGlvbiA9PT0gdW5kZWZpbmVkKSB7XG5cdFx0XHRyZXR1cm4gdGhpcy5fY3VycmVudDtcblx0XHR9XG5cblx0XHRpZiAodGhpcy5faXRlbXMubGVuZ3RoID09PSAwKSB7XG5cdFx0XHRyZXR1cm4gdW5kZWZpbmVkO1xuXHRcdH1cblxuXHRcdHBvc2l0aW9uID0gdGhpcy5ub3JtYWxpemUocG9zaXRpb24pO1xuXG5cdFx0aWYgKHRoaXMuX2N1cnJlbnQgIT09IHBvc2l0aW9uKSB7XG5cdFx0XHR2YXIgZXZlbnQgPSB0aGlzLnRyaWdnZXIoJ2NoYW5nZScsIHsgcHJvcGVydHk6IHsgbmFtZTogJ3Bvc2l0aW9uJywgdmFsdWU6IHBvc2l0aW9uIH0gfSk7XG5cblx0XHRcdGlmIChldmVudC5kYXRhICE9PSB1bmRlZmluZWQpIHtcblx0XHRcdFx0cG9zaXRpb24gPSB0aGlzLm5vcm1hbGl6ZShldmVudC5kYXRhKTtcblx0XHRcdH1cblxuXHRcdFx0dGhpcy5fY3VycmVudCA9IHBvc2l0aW9uO1xuXG5cdFx0XHR0aGlzLmludmFsaWRhdGUoJ3Bvc2l0aW9uJyk7XG5cblx0XHRcdHRoaXMudHJpZ2dlcignY2hhbmdlZCcsIHsgcHJvcGVydHk6IHsgbmFtZTogJ3Bvc2l0aW9uJywgdmFsdWU6IHRoaXMuX2N1cnJlbnQgfSB9KTtcblx0XHR9XG5cblx0XHRyZXR1cm4gdGhpcy5fY3VycmVudDtcblx0fTtcblxuXHQvKipcblx0ICogSW52YWxpZGF0ZXMgdGhlIGdpdmVuIHBhcnQgb2YgdGhlIHVwZGF0ZSByb3V0aW5lLlxuXHQgKiBAcGFyYW0ge1N0cmluZ30gW3BhcnRdIC0gVGhlIHBhcnQgdG8gaW52YWxpZGF0ZS5cblx0ICogQHJldHVybnMge0FycmF5LjxTdHJpbmc+fSAtIFRoZSBpbnZhbGlkYXRlZCBwYXJ0cy5cblx0ICovXG5cdE93bC5wcm90b3R5cGUuaW52YWxpZGF0ZSA9IGZ1bmN0aW9uKHBhcnQpIHtcblx0XHRpZiAoJC50eXBlKHBhcnQpID09PSAnc3RyaW5nJykge1xuXHRcdFx0dGhpcy5faW52YWxpZGF0ZWRbcGFydF0gPSB0cnVlO1xuXHRcdFx0dGhpcy5pcygndmFsaWQnKSAmJiB0aGlzLmxlYXZlKCd2YWxpZCcpO1xuXHRcdH1cblx0XHRyZXR1cm4gJC5tYXAodGhpcy5faW52YWxpZGF0ZWQsIGZ1bmN0aW9uKHYsIGkpIHsgcmV0dXJuIGkgfSk7XG5cdH07XG5cblx0LyoqXG5cdCAqIFJlc2V0cyB0aGUgYWJzb2x1dGUgcG9zaXRpb24gb2YgdGhlIGN1cnJlbnQgaXRlbS5cblx0ICogQHB1YmxpY1xuXHQgKiBAcGFyYW0ge051bWJlcn0gcG9zaXRpb24gLSBUaGUgYWJzb2x1dGUgcG9zaXRpb24gb2YgdGhlIG5ldyBpdGVtLlxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5yZXNldCA9IGZ1bmN0aW9uKHBvc2l0aW9uKSB7XG5cdFx0cG9zaXRpb24gPSB0aGlzLm5vcm1hbGl6ZShwb3NpdGlvbik7XG5cblx0XHRpZiAocG9zaXRpb24gPT09IHVuZGVmaW5lZCkge1xuXHRcdFx0cmV0dXJuO1xuXHRcdH1cblxuXHRcdHRoaXMuX3NwZWVkID0gMDtcblx0XHR0aGlzLl9jdXJyZW50ID0gcG9zaXRpb247XG5cblx0XHR0aGlzLnN1cHByZXNzKFsgJ3RyYW5zbGF0ZScsICd0cmFuc2xhdGVkJyBdKTtcblxuXHRcdHRoaXMuYW5pbWF0ZSh0aGlzLmNvb3JkaW5hdGVzKHBvc2l0aW9uKSk7XG5cblx0XHR0aGlzLnJlbGVhc2UoWyAndHJhbnNsYXRlJywgJ3RyYW5zbGF0ZWQnIF0pO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBOb3JtYWxpemVzIGFuIGFic29sdXRlIG9yIGEgcmVsYXRpdmUgcG9zaXRpb24gb2YgYW4gaXRlbS5cblx0ICogQHB1YmxpY1xuXHQgKiBAcGFyYW0ge051bWJlcn0gcG9zaXRpb24gLSBUaGUgYWJzb2x1dGUgb3IgcmVsYXRpdmUgcG9zaXRpb24gdG8gbm9ybWFsaXplLlxuXHQgKiBAcGFyYW0ge0Jvb2xlYW59IFtyZWxhdGl2ZT1mYWxzZV0gLSBXaGV0aGVyIHRoZSBnaXZlbiBwb3NpdGlvbiBpcyByZWxhdGl2ZSBvciBub3QuXG5cdCAqIEByZXR1cm5zIHtOdW1iZXJ9IC0gVGhlIG5vcm1hbGl6ZWQgcG9zaXRpb24uXG5cdCAqL1xuXHRPd2wucHJvdG90eXBlLm5vcm1hbGl6ZSA9IGZ1bmN0aW9uKHBvc2l0aW9uLCByZWxhdGl2ZSkge1xuXHRcdHZhciBuID0gdGhpcy5faXRlbXMubGVuZ3RoLFxuXHRcdFx0bSA9IHJlbGF0aXZlID8gMCA6IHRoaXMuX2Nsb25lcy5sZW5ndGg7XG5cblx0XHRpZiAoIXRoaXMuaXNOdW1lcmljKHBvc2l0aW9uKSB8fCBuIDwgMSkge1xuXHRcdFx0cG9zaXRpb24gPSB1bmRlZmluZWQ7XG5cdFx0fSBlbHNlIGlmIChwb3NpdGlvbiA8IDAgfHwgcG9zaXRpb24gPj0gbiArIG0pIHtcblx0XHRcdHBvc2l0aW9uID0gKChwb3NpdGlvbiAtIG0gLyAyKSAlIG4gKyBuKSAlIG4gKyBtIC8gMjtcblx0XHR9XG5cblx0XHRyZXR1cm4gcG9zaXRpb247XG5cdH07XG5cblx0LyoqXG5cdCAqIENvbnZlcnRzIGFuIGFic29sdXRlIHBvc2l0aW9uIG9mIGFuIGl0ZW0gaW50byBhIHJlbGF0aXZlIG9uZS5cblx0ICogQHB1YmxpY1xuXHQgKiBAcGFyYW0ge051bWJlcn0gcG9zaXRpb24gLSBUaGUgYWJzb2x1dGUgcG9zaXRpb24gdG8gY29udmVydC5cblx0ICogQHJldHVybnMge051bWJlcn0gLSBUaGUgY29udmVydGVkIHBvc2l0aW9uLlxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5yZWxhdGl2ZSA9IGZ1bmN0aW9uKHBvc2l0aW9uKSB7XG5cdFx0cG9zaXRpb24gLT0gdGhpcy5fY2xvbmVzLmxlbmd0aCAvIDI7XG5cdFx0cmV0dXJuIHRoaXMubm9ybWFsaXplKHBvc2l0aW9uLCB0cnVlKTtcblx0fTtcblxuXHQvKipcblx0ICogR2V0cyB0aGUgbWF4aW11bSBwb3NpdGlvbiBmb3IgdGhlIGN1cnJlbnQgaXRlbS5cblx0ICogQHB1YmxpY1xuXHQgKiBAcGFyYW0ge0Jvb2xlYW59IFtyZWxhdGl2ZT1mYWxzZV0gLSBXaGV0aGVyIHRvIHJldHVybiBhbiBhYnNvbHV0ZSBwb3NpdGlvbiBvciBhIHJlbGF0aXZlIHBvc2l0aW9uLlxuXHQgKiBAcmV0dXJucyB7TnVtYmVyfVxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5tYXhpbXVtID0gZnVuY3Rpb24ocmVsYXRpdmUpIHtcblx0XHR2YXIgc2V0dGluZ3MgPSB0aGlzLnNldHRpbmdzLFxuXHRcdFx0bWF4aW11bSA9IHRoaXMuX2Nvb3JkaW5hdGVzLmxlbmd0aCxcblx0XHRcdGl0ZXJhdG9yLFxuXHRcdFx0cmVjaXByb2NhbEl0ZW1zV2lkdGgsXG5cdFx0XHRlbGVtZW50V2lkdGg7XG5cblx0XHRpZiAoc2V0dGluZ3MubG9vcCkge1xuXHRcdFx0bWF4aW11bSA9IHRoaXMuX2Nsb25lcy5sZW5ndGggLyAyICsgdGhpcy5faXRlbXMubGVuZ3RoIC0gMTtcblx0XHR9IGVsc2UgaWYgKHNldHRpbmdzLmF1dG9XaWR0aCB8fCBzZXR0aW5ncy5tZXJnZSkge1xuXHRcdFx0aXRlcmF0b3IgPSB0aGlzLl9pdGVtcy5sZW5ndGg7XG5cdFx0XHRpZiAoaXRlcmF0b3IpIHtcblx0XHRcdFx0cmVjaXByb2NhbEl0ZW1zV2lkdGggPSB0aGlzLl9pdGVtc1stLWl0ZXJhdG9yXS53aWR0aCgpO1xuXHRcdFx0XHRlbGVtZW50V2lkdGggPSB0aGlzLiRlbGVtZW50LndpZHRoKCk7XG5cdFx0XHRcdHdoaWxlIChpdGVyYXRvci0tKSB7XG5cdFx0XHRcdFx0cmVjaXByb2NhbEl0ZW1zV2lkdGggKz0gdGhpcy5faXRlbXNbaXRlcmF0b3JdLndpZHRoKCkgKyB0aGlzLnNldHRpbmdzLm1hcmdpbjtcblx0XHRcdFx0XHRpZiAocmVjaXByb2NhbEl0ZW1zV2lkdGggPiBlbGVtZW50V2lkdGgpIHtcblx0XHRcdFx0XHRcdGJyZWFrO1xuXHRcdFx0XHRcdH1cblx0XHRcdFx0fVxuXHRcdFx0fVxuXHRcdFx0bWF4aW11bSA9IGl0ZXJhdG9yICsgMTtcblx0XHR9IGVsc2UgaWYgKHNldHRpbmdzLmNlbnRlcikge1xuXHRcdFx0bWF4aW11bSA9IHRoaXMuX2l0ZW1zLmxlbmd0aCAtIDE7XG5cdFx0fSBlbHNlIHtcblx0XHRcdG1heGltdW0gPSB0aGlzLl9pdGVtcy5sZW5ndGggLSBzZXR0aW5ncy5pdGVtcztcblx0XHR9XG5cblx0XHRpZiAocmVsYXRpdmUpIHtcblx0XHRcdG1heGltdW0gLT0gdGhpcy5fY2xvbmVzLmxlbmd0aCAvIDI7XG5cdFx0fVxuXG5cdFx0cmV0dXJuIE1hdGgubWF4KG1heGltdW0sIDApO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBHZXRzIHRoZSBtaW5pbXVtIHBvc2l0aW9uIGZvciB0aGUgY3VycmVudCBpdGVtLlxuXHQgKiBAcHVibGljXG5cdCAqIEBwYXJhbSB7Qm9vbGVhbn0gW3JlbGF0aXZlPWZhbHNlXSAtIFdoZXRoZXIgdG8gcmV0dXJuIGFuIGFic29sdXRlIHBvc2l0aW9uIG9yIGEgcmVsYXRpdmUgcG9zaXRpb24uXG5cdCAqIEByZXR1cm5zIHtOdW1iZXJ9XG5cdCAqL1xuXHRPd2wucHJvdG90eXBlLm1pbmltdW0gPSBmdW5jdGlvbihyZWxhdGl2ZSkge1xuXHRcdHJldHVybiByZWxhdGl2ZSA/IDAgOiB0aGlzLl9jbG9uZXMubGVuZ3RoIC8gMjtcblx0fTtcblxuXHQvKipcblx0ICogR2V0cyBhbiBpdGVtIGF0IHRoZSBzcGVjaWZpZWQgcmVsYXRpdmUgcG9zaXRpb24uXG5cdCAqIEBwdWJsaWNcblx0ICogQHBhcmFtIHtOdW1iZXJ9IFtwb3NpdGlvbl0gLSBUaGUgcmVsYXRpdmUgcG9zaXRpb24gb2YgdGhlIGl0ZW0uXG5cdCAqIEByZXR1cm4ge2pRdWVyeXxBcnJheS48alF1ZXJ5Pn0gLSBUaGUgaXRlbSBhdCB0aGUgZ2l2ZW4gcG9zaXRpb24gb3IgYWxsIGl0ZW1zIGlmIG5vIHBvc2l0aW9uIHdhcyBnaXZlbi5cblx0ICovXG5cdE93bC5wcm90b3R5cGUuaXRlbXMgPSBmdW5jdGlvbihwb3NpdGlvbikge1xuXHRcdGlmIChwb3NpdGlvbiA9PT0gdW5kZWZpbmVkKSB7XG5cdFx0XHRyZXR1cm4gdGhpcy5faXRlbXMuc2xpY2UoKTtcblx0XHR9XG5cblx0XHRwb3NpdGlvbiA9IHRoaXMubm9ybWFsaXplKHBvc2l0aW9uLCB0cnVlKTtcblx0XHRyZXR1cm4gdGhpcy5faXRlbXNbcG9zaXRpb25dO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBHZXRzIGFuIGl0ZW0gYXQgdGhlIHNwZWNpZmllZCByZWxhdGl2ZSBwb3NpdGlvbi5cblx0ICogQHB1YmxpY1xuXHQgKiBAcGFyYW0ge051bWJlcn0gW3Bvc2l0aW9uXSAtIFRoZSByZWxhdGl2ZSBwb3NpdGlvbiBvZiB0aGUgaXRlbS5cblx0ICogQHJldHVybiB7alF1ZXJ5fEFycmF5LjxqUXVlcnk+fSAtIFRoZSBpdGVtIGF0IHRoZSBnaXZlbiBwb3NpdGlvbiBvciBhbGwgaXRlbXMgaWYgbm8gcG9zaXRpb24gd2FzIGdpdmVuLlxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5tZXJnZXJzID0gZnVuY3Rpb24ocG9zaXRpb24pIHtcblx0XHRpZiAocG9zaXRpb24gPT09IHVuZGVmaW5lZCkge1xuXHRcdFx0cmV0dXJuIHRoaXMuX21lcmdlcnMuc2xpY2UoKTtcblx0XHR9XG5cblx0XHRwb3NpdGlvbiA9IHRoaXMubm9ybWFsaXplKHBvc2l0aW9uLCB0cnVlKTtcblx0XHRyZXR1cm4gdGhpcy5fbWVyZ2Vyc1twb3NpdGlvbl07XG5cdH07XG5cblx0LyoqXG5cdCAqIEdldHMgdGhlIGFic29sdXRlIHBvc2l0aW9ucyBvZiBjbG9uZXMgZm9yIGFuIGl0ZW0uXG5cdCAqIEBwdWJsaWNcblx0ICogQHBhcmFtIHtOdW1iZXJ9IFtwb3NpdGlvbl0gLSBUaGUgcmVsYXRpdmUgcG9zaXRpb24gb2YgdGhlIGl0ZW0uXG5cdCAqIEByZXR1cm5zIHtBcnJheS48TnVtYmVyPn0gLSBUaGUgYWJzb2x1dGUgcG9zaXRpb25zIG9mIGNsb25lcyBmb3IgdGhlIGl0ZW0gb3IgYWxsIGlmIG5vIHBvc2l0aW9uIHdhcyBnaXZlbi5cblx0ICovXG5cdE93bC5wcm90b3R5cGUuY2xvbmVzID0gZnVuY3Rpb24ocG9zaXRpb24pIHtcblx0XHR2YXIgb2RkID0gdGhpcy5fY2xvbmVzLmxlbmd0aCAvIDIsXG5cdFx0XHRldmVuID0gb2RkICsgdGhpcy5faXRlbXMubGVuZ3RoLFxuXHRcdFx0bWFwID0gZnVuY3Rpb24oaW5kZXgpIHsgcmV0dXJuIGluZGV4ICUgMiA9PT0gMCA/IGV2ZW4gKyBpbmRleCAvIDIgOiBvZGQgLSAoaW5kZXggKyAxKSAvIDIgfTtcblxuXHRcdGlmIChwb3NpdGlvbiA9PT0gdW5kZWZpbmVkKSB7XG5cdFx0XHRyZXR1cm4gJC5tYXAodGhpcy5fY2xvbmVzLCBmdW5jdGlvbih2LCBpKSB7IHJldHVybiBtYXAoaSkgfSk7XG5cdFx0fVxuXG5cdFx0cmV0dXJuICQubWFwKHRoaXMuX2Nsb25lcywgZnVuY3Rpb24odiwgaSkgeyByZXR1cm4gdiA9PT0gcG9zaXRpb24gPyBtYXAoaSkgOiBudWxsIH0pO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBTZXRzIHRoZSBjdXJyZW50IGFuaW1hdGlvbiBzcGVlZC5cblx0ICogQHB1YmxpY1xuXHQgKiBAcGFyYW0ge051bWJlcn0gW3NwZWVkXSAtIFRoZSBhbmltYXRpb24gc3BlZWQgaW4gbWlsbGlzZWNvbmRzIG9yIG5vdGhpbmcgdG8gbGVhdmUgaXQgdW5jaGFuZ2VkLlxuXHQgKiBAcmV0dXJucyB7TnVtYmVyfSAtIFRoZSBjdXJyZW50IGFuaW1hdGlvbiBzcGVlZCBpbiBtaWxsaXNlY29uZHMuXG5cdCAqL1xuXHRPd2wucHJvdG90eXBlLnNwZWVkID0gZnVuY3Rpb24oc3BlZWQpIHtcblx0XHRpZiAoc3BlZWQgIT09IHVuZGVmaW5lZCkge1xuXHRcdFx0dGhpcy5fc3BlZWQgPSBzcGVlZDtcblx0XHR9XG5cblx0XHRyZXR1cm4gdGhpcy5fc3BlZWQ7XG5cdH07XG5cblx0LyoqXG5cdCAqIEdldHMgdGhlIGNvb3JkaW5hdGUgb2YgYW4gaXRlbS5cblx0ICogQHRvZG8gVGhlIG5hbWUgb2YgdGhpcyBtZXRob2QgaXMgbWlzc2xlYW5kaW5nLlxuXHQgKiBAcHVibGljXG5cdCAqIEBwYXJhbSB7TnVtYmVyfSBwb3NpdGlvbiAtIFRoZSBhYnNvbHV0ZSBwb3NpdGlvbiBvZiB0aGUgaXRlbSB3aXRoaW4gYG1pbmltdW0oKWAgYW5kIGBtYXhpbXVtKClgLlxuXHQgKiBAcmV0dXJucyB7TnVtYmVyfEFycmF5LjxOdW1iZXI+fSAtIFRoZSBjb29yZGluYXRlIG9mIHRoZSBpdGVtIGluIHBpeGVsIG9yIGFsbCBjb29yZGluYXRlcy5cblx0ICovXG5cdE93bC5wcm90b3R5cGUuY29vcmRpbmF0ZXMgPSBmdW5jdGlvbihwb3NpdGlvbikge1xuXHRcdHZhciBtdWx0aXBsaWVyID0gMSxcblx0XHRcdG5ld1Bvc2l0aW9uID0gcG9zaXRpb24gLSAxLFxuXHRcdFx0Y29vcmRpbmF0ZTtcblxuXHRcdGlmIChwb3NpdGlvbiA9PT0gdW5kZWZpbmVkKSB7XG5cdFx0XHRyZXR1cm4gJC5tYXAodGhpcy5fY29vcmRpbmF0ZXMsICQucHJveHkoZnVuY3Rpb24oY29vcmRpbmF0ZSwgaW5kZXgpIHtcblx0XHRcdFx0cmV0dXJuIHRoaXMuY29vcmRpbmF0ZXMoaW5kZXgpO1xuXHRcdFx0fSwgdGhpcykpO1xuXHRcdH1cblxuXHRcdGlmICh0aGlzLnNldHRpbmdzLmNlbnRlcikge1xuXHRcdFx0aWYgKHRoaXMuc2V0dGluZ3MucnRsKSB7XG5cdFx0XHRcdG11bHRpcGxpZXIgPSAtMTtcblx0XHRcdFx0bmV3UG9zaXRpb24gPSBwb3NpdGlvbiArIDE7XG5cdFx0XHR9XG5cblx0XHRcdGNvb3JkaW5hdGUgPSB0aGlzLl9jb29yZGluYXRlc1twb3NpdGlvbl07XG5cdFx0XHRjb29yZGluYXRlICs9ICh0aGlzLndpZHRoKCkgLSBjb29yZGluYXRlICsgKHRoaXMuX2Nvb3JkaW5hdGVzW25ld1Bvc2l0aW9uXSB8fCAwKSkgLyAyICogbXVsdGlwbGllcjtcblx0XHR9IGVsc2Uge1xuXHRcdFx0Y29vcmRpbmF0ZSA9IHRoaXMuX2Nvb3JkaW5hdGVzW25ld1Bvc2l0aW9uXSB8fCAwO1xuXHRcdH1cblxuXHRcdGNvb3JkaW5hdGUgPSBNYXRoLmNlaWwoY29vcmRpbmF0ZSk7XG5cblx0XHRyZXR1cm4gY29vcmRpbmF0ZTtcblx0fTtcblxuXHQvKipcblx0ICogQ2FsY3VsYXRlcyB0aGUgc3BlZWQgZm9yIGEgdHJhbnNsYXRpb24uXG5cdCAqIEBwcm90ZWN0ZWRcblx0ICogQHBhcmFtIHtOdW1iZXJ9IGZyb20gLSBUaGUgYWJzb2x1dGUgcG9zaXRpb24gb2YgdGhlIHN0YXJ0IGl0ZW0uXG5cdCAqIEBwYXJhbSB7TnVtYmVyfSB0byAtIFRoZSBhYnNvbHV0ZSBwb3NpdGlvbiBvZiB0aGUgdGFyZ2V0IGl0ZW0uXG5cdCAqIEBwYXJhbSB7TnVtYmVyfSBbZmFjdG9yPXVuZGVmaW5lZF0gLSBUaGUgdGltZSBmYWN0b3IgaW4gbWlsbGlzZWNvbmRzLlxuXHQgKiBAcmV0dXJucyB7TnVtYmVyfSAtIFRoZSB0aW1lIGluIG1pbGxpc2Vjb25kcyBmb3IgdGhlIHRyYW5zbGF0aW9uLlxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5kdXJhdGlvbiA9IGZ1bmN0aW9uKGZyb20sIHRvLCBmYWN0b3IpIHtcblx0XHRpZiAoZmFjdG9yID09PSAwKSB7XG5cdFx0XHRyZXR1cm4gMDtcblx0XHR9XG5cblx0XHRyZXR1cm4gTWF0aC5taW4oTWF0aC5tYXgoTWF0aC5hYnModG8gLSBmcm9tKSwgMSksIDYpICogTWF0aC5hYnMoKGZhY3RvciB8fCB0aGlzLnNldHRpbmdzLnNtYXJ0U3BlZWQpKTtcblx0fTtcblxuXHQvKipcblx0ICogU2xpZGVzIHRvIHRoZSBzcGVjaWZpZWQgaXRlbS5cblx0ICogQHB1YmxpY1xuXHQgKiBAcGFyYW0ge051bWJlcn0gcG9zaXRpb24gLSBUaGUgcG9zaXRpb24gb2YgdGhlIGl0ZW0uXG5cdCAqIEBwYXJhbSB7TnVtYmVyfSBbc3BlZWRdIC0gVGhlIHRpbWUgaW4gbWlsbGlzZWNvbmRzIGZvciB0aGUgdHJhbnNpdGlvbi5cblx0ICovXG5cdE93bC5wcm90b3R5cGUudG8gPSBmdW5jdGlvbihwb3NpdGlvbiwgc3BlZWQpIHtcblx0XHR2YXIgY3VycmVudCA9IHRoaXMuY3VycmVudCgpLFxuXHRcdFx0cmV2ZXJ0ID0gbnVsbCxcblx0XHRcdGRpc3RhbmNlID0gcG9zaXRpb24gLSB0aGlzLnJlbGF0aXZlKGN1cnJlbnQpLFxuXHRcdFx0ZGlyZWN0aW9uID0gKGRpc3RhbmNlID4gMCkgLSAoZGlzdGFuY2UgPCAwKSxcblx0XHRcdGl0ZW1zID0gdGhpcy5faXRlbXMubGVuZ3RoLFxuXHRcdFx0bWluaW11bSA9IHRoaXMubWluaW11bSgpLFxuXHRcdFx0bWF4aW11bSA9IHRoaXMubWF4aW11bSgpO1xuXG5cdFx0aWYgKHRoaXMuc2V0dGluZ3MubG9vcCkge1xuXHRcdFx0aWYgKCF0aGlzLnNldHRpbmdzLnJld2luZCAmJiBNYXRoLmFicyhkaXN0YW5jZSkgPiBpdGVtcyAvIDIpIHtcblx0XHRcdFx0ZGlzdGFuY2UgKz0gZGlyZWN0aW9uICogLTEgKiBpdGVtcztcblx0XHRcdH1cblxuXHRcdFx0cG9zaXRpb24gPSBjdXJyZW50ICsgZGlzdGFuY2U7XG5cdFx0XHRyZXZlcnQgPSAoKHBvc2l0aW9uIC0gbWluaW11bSkgJSBpdGVtcyArIGl0ZW1zKSAlIGl0ZW1zICsgbWluaW11bTtcblxuXHRcdFx0aWYgKHJldmVydCAhPT0gcG9zaXRpb24gJiYgcmV2ZXJ0IC0gZGlzdGFuY2UgPD0gbWF4aW11bSAmJiByZXZlcnQgLSBkaXN0YW5jZSA+IDApIHtcblx0XHRcdFx0Y3VycmVudCA9IHJldmVydCAtIGRpc3RhbmNlO1xuXHRcdFx0XHRwb3NpdGlvbiA9IHJldmVydDtcblx0XHRcdFx0dGhpcy5yZXNldChjdXJyZW50KTtcblx0XHRcdH1cblx0XHR9IGVsc2UgaWYgKHRoaXMuc2V0dGluZ3MucmV3aW5kKSB7XG5cdFx0XHRtYXhpbXVtICs9IDE7XG5cdFx0XHRwb3NpdGlvbiA9IChwb3NpdGlvbiAlIG1heGltdW0gKyBtYXhpbXVtKSAlIG1heGltdW07XG5cdFx0fSBlbHNlIHtcblx0XHRcdHBvc2l0aW9uID0gTWF0aC5tYXgobWluaW11bSwgTWF0aC5taW4obWF4aW11bSwgcG9zaXRpb24pKTtcblx0XHR9XG5cblx0XHR0aGlzLnNwZWVkKHRoaXMuZHVyYXRpb24oY3VycmVudCwgcG9zaXRpb24sIHNwZWVkKSk7XG5cdFx0dGhpcy5jdXJyZW50KHBvc2l0aW9uKTtcblxuXHRcdGlmICh0aGlzLmlzVmlzaWJsZSgpKSB7XG5cdFx0XHR0aGlzLnVwZGF0ZSgpO1xuXHRcdH1cblx0fTtcblxuXHQvKipcblx0ICogU2xpZGVzIHRvIHRoZSBuZXh0IGl0ZW0uXG5cdCAqIEBwdWJsaWNcblx0ICogQHBhcmFtIHtOdW1iZXJ9IFtzcGVlZF0gLSBUaGUgdGltZSBpbiBtaWxsaXNlY29uZHMgZm9yIHRoZSB0cmFuc2l0aW9uLlxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5uZXh0ID0gZnVuY3Rpb24oc3BlZWQpIHtcblx0XHRzcGVlZCA9IHNwZWVkIHx8IGZhbHNlO1xuXHRcdHRoaXMudG8odGhpcy5yZWxhdGl2ZSh0aGlzLmN1cnJlbnQoKSkgKyAxLCBzcGVlZCk7XG5cdH07XG5cblx0LyoqXG5cdCAqIFNsaWRlcyB0byB0aGUgcHJldmlvdXMgaXRlbS5cblx0ICogQHB1YmxpY1xuXHQgKiBAcGFyYW0ge051bWJlcn0gW3NwZWVkXSAtIFRoZSB0aW1lIGluIG1pbGxpc2Vjb25kcyBmb3IgdGhlIHRyYW5zaXRpb24uXG5cdCAqL1xuXHRPd2wucHJvdG90eXBlLnByZXYgPSBmdW5jdGlvbihzcGVlZCkge1xuXHRcdHNwZWVkID0gc3BlZWQgfHwgZmFsc2U7XG5cdFx0dGhpcy50byh0aGlzLnJlbGF0aXZlKHRoaXMuY3VycmVudCgpKSAtIDEsIHNwZWVkKTtcblx0fTtcblxuXHQvKipcblx0ICogSGFuZGxlcyB0aGUgZW5kIG9mIGFuIGFuaW1hdGlvbi5cblx0ICogQHByb3RlY3RlZFxuXHQgKiBAcGFyYW0ge0V2ZW50fSBldmVudCAtIFRoZSBldmVudCBhcmd1bWVudHMuXG5cdCAqL1xuXHRPd2wucHJvdG90eXBlLm9uVHJhbnNpdGlvbkVuZCA9IGZ1bmN0aW9uKGV2ZW50KSB7XG5cblx0XHQvLyBpZiBjc3MyIGFuaW1hdGlvbiB0aGVuIGV2ZW50IG9iamVjdCBpcyB1bmRlZmluZWRcblx0XHRpZiAoZXZlbnQgIT09IHVuZGVmaW5lZCkge1xuXHRcdFx0ZXZlbnQuc3RvcFByb3BhZ2F0aW9uKCk7XG5cblx0XHRcdC8vIENhdGNoIG9ubHkgb3dsLXN0YWdlIHRyYW5zaXRpb25FbmQgZXZlbnRcblx0XHRcdGlmICgoZXZlbnQudGFyZ2V0IHx8IGV2ZW50LnNyY0VsZW1lbnQgfHwgZXZlbnQub3JpZ2luYWxUYXJnZXQpICE9PSB0aGlzLiRzdGFnZS5nZXQoMCkpIHtcblx0XHRcdFx0cmV0dXJuIGZhbHNlO1xuXHRcdFx0fVxuXHRcdH1cblxuXHRcdHRoaXMubGVhdmUoJ2FuaW1hdGluZycpO1xuXHRcdHRoaXMudHJpZ2dlcigndHJhbnNsYXRlZCcpO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBHZXRzIHZpZXdwb3J0IHdpZHRoLlxuXHQgKiBAcHJvdGVjdGVkXG5cdCAqIEByZXR1cm4ge051bWJlcn0gLSBUaGUgd2lkdGggaW4gcGl4ZWwuXG5cdCAqL1xuXHRPd2wucHJvdG90eXBlLnZpZXdwb3J0ID0gZnVuY3Rpb24oKSB7XG5cdFx0dmFyIHdpZHRoO1xuXHRcdGlmICh0aGlzLm9wdGlvbnMucmVzcG9uc2l2ZUJhc2VFbGVtZW50ICE9PSB3aW5kb3cpIHtcblx0XHRcdHdpZHRoID0gJCh0aGlzLm9wdGlvbnMucmVzcG9uc2l2ZUJhc2VFbGVtZW50KS53aWR0aCgpO1xuXHRcdH0gZWxzZSBpZiAod2luZG93LmlubmVyV2lkdGgpIHtcblx0XHRcdHdpZHRoID0gd2luZG93LmlubmVyV2lkdGg7XG5cdFx0fSBlbHNlIGlmIChkb2N1bWVudC5kb2N1bWVudEVsZW1lbnQgJiYgZG9jdW1lbnQuZG9jdW1lbnRFbGVtZW50LmNsaWVudFdpZHRoKSB7XG5cdFx0XHR3aWR0aCA9IGRvY3VtZW50LmRvY3VtZW50RWxlbWVudC5jbGllbnRXaWR0aDtcblx0XHR9IGVsc2Uge1xuXHRcdFx0Y29uc29sZS53YXJuKCdDYW4gbm90IGRldGVjdCB2aWV3cG9ydCB3aWR0aC4nKTtcblx0XHR9XG5cdFx0cmV0dXJuIHdpZHRoO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBSZXBsYWNlcyB0aGUgY3VycmVudCBjb250ZW50LlxuXHQgKiBAcHVibGljXG5cdCAqIEBwYXJhbSB7SFRNTEVsZW1lbnR8alF1ZXJ5fFN0cmluZ30gY29udGVudCAtIFRoZSBuZXcgY29udGVudC5cblx0ICovXG5cdE93bC5wcm90b3R5cGUucmVwbGFjZSA9IGZ1bmN0aW9uKGNvbnRlbnQpIHtcblx0XHR0aGlzLiRzdGFnZS5lbXB0eSgpO1xuXHRcdHRoaXMuX2l0ZW1zID0gW107XG5cblx0XHRpZiAoY29udGVudCkge1xuXHRcdFx0Y29udGVudCA9IChjb250ZW50IGluc3RhbmNlb2YgalF1ZXJ5KSA/IGNvbnRlbnQgOiAkKGNvbnRlbnQpO1xuXHRcdH1cblxuXHRcdGlmICh0aGlzLnNldHRpbmdzLm5lc3RlZEl0ZW1TZWxlY3Rvcikge1xuXHRcdFx0Y29udGVudCA9IGNvbnRlbnQuZmluZCgnLicgKyB0aGlzLnNldHRpbmdzLm5lc3RlZEl0ZW1TZWxlY3Rvcik7XG5cdFx0fVxuXG5cdFx0Y29udGVudC5maWx0ZXIoZnVuY3Rpb24oKSB7XG5cdFx0XHRyZXR1cm4gdGhpcy5ub2RlVHlwZSA9PT0gMTtcblx0XHR9KS5lYWNoKCQucHJveHkoZnVuY3Rpb24oaW5kZXgsIGl0ZW0pIHtcblx0XHRcdGl0ZW0gPSB0aGlzLnByZXBhcmUoaXRlbSk7XG5cdFx0XHR0aGlzLiRzdGFnZS5hcHBlbmQoaXRlbSk7XG5cdFx0XHR0aGlzLl9pdGVtcy5wdXNoKGl0ZW0pO1xuXHRcdFx0dGhpcy5fbWVyZ2Vycy5wdXNoKGl0ZW0uZmluZCgnW2RhdGEtbWVyZ2VdJykuYWRkQmFjaygnW2RhdGEtbWVyZ2VdJykuYXR0cignZGF0YS1tZXJnZScpICogMSB8fCAxKTtcblx0XHR9LCB0aGlzKSk7XG5cblx0XHR0aGlzLnJlc2V0KHRoaXMuaXNOdW1lcmljKHRoaXMuc2V0dGluZ3Muc3RhcnRQb3NpdGlvbikgPyB0aGlzLnNldHRpbmdzLnN0YXJ0UG9zaXRpb24gOiAwKTtcblxuXHRcdHRoaXMuaW52YWxpZGF0ZSgnaXRlbXMnKTtcblx0fTtcblxuXHQvKipcblx0ICogQWRkcyBhbiBpdGVtLlxuXHQgKiBAdG9kbyBVc2UgYGl0ZW1gIGluc3RlYWQgb2YgYGNvbnRlbnRgIGZvciB0aGUgZXZlbnQgYXJndW1lbnRzLlxuXHQgKiBAcHVibGljXG5cdCAqIEBwYXJhbSB7SFRNTEVsZW1lbnR8alF1ZXJ5fFN0cmluZ30gY29udGVudCAtIFRoZSBpdGVtIGNvbnRlbnQgdG8gYWRkLlxuXHQgKiBAcGFyYW0ge051bWJlcn0gW3Bvc2l0aW9uXSAtIFRoZSByZWxhdGl2ZSBwb3NpdGlvbiBhdCB3aGljaCB0byBpbnNlcnQgdGhlIGl0ZW0gb3RoZXJ3aXNlIHRoZSBpdGVtIHdpbGwgYmUgYWRkZWQgdG8gdGhlIGVuZC5cblx0ICovXG5cdE93bC5wcm90b3R5cGUuYWRkID0gZnVuY3Rpb24oY29udGVudCwgcG9zaXRpb24pIHtcblx0XHR2YXIgY3VycmVudCA9IHRoaXMucmVsYXRpdmUodGhpcy5fY3VycmVudCk7XG5cblx0XHRwb3NpdGlvbiA9IHBvc2l0aW9uID09PSB1bmRlZmluZWQgPyB0aGlzLl9pdGVtcy5sZW5ndGggOiB0aGlzLm5vcm1hbGl6ZShwb3NpdGlvbiwgdHJ1ZSk7XG5cdFx0Y29udGVudCA9IGNvbnRlbnQgaW5zdGFuY2VvZiBqUXVlcnkgPyBjb250ZW50IDogJChjb250ZW50KTtcblxuXHRcdHRoaXMudHJpZ2dlcignYWRkJywgeyBjb250ZW50OiBjb250ZW50LCBwb3NpdGlvbjogcG9zaXRpb24gfSk7XG5cblx0XHRjb250ZW50ID0gdGhpcy5wcmVwYXJlKGNvbnRlbnQpO1xuXG5cdFx0aWYgKHRoaXMuX2l0ZW1zLmxlbmd0aCA9PT0gMCB8fCBwb3NpdGlvbiA9PT0gdGhpcy5faXRlbXMubGVuZ3RoKSB7XG5cdFx0XHR0aGlzLl9pdGVtcy5sZW5ndGggPT09IDAgJiYgdGhpcy4kc3RhZ2UuYXBwZW5kKGNvbnRlbnQpO1xuXHRcdFx0dGhpcy5faXRlbXMubGVuZ3RoICE9PSAwICYmIHRoaXMuX2l0ZW1zW3Bvc2l0aW9uIC0gMV0uYWZ0ZXIoY29udGVudCk7XG5cdFx0XHR0aGlzLl9pdGVtcy5wdXNoKGNvbnRlbnQpO1xuXHRcdFx0dGhpcy5fbWVyZ2Vycy5wdXNoKGNvbnRlbnQuZmluZCgnW2RhdGEtbWVyZ2VdJykuYWRkQmFjaygnW2RhdGEtbWVyZ2VdJykuYXR0cignZGF0YS1tZXJnZScpICogMSB8fCAxKTtcblx0XHR9IGVsc2Uge1xuXHRcdFx0dGhpcy5faXRlbXNbcG9zaXRpb25dLmJlZm9yZShjb250ZW50KTtcblx0XHRcdHRoaXMuX2l0ZW1zLnNwbGljZShwb3NpdGlvbiwgMCwgY29udGVudCk7XG5cdFx0XHR0aGlzLl9tZXJnZXJzLnNwbGljZShwb3NpdGlvbiwgMCwgY29udGVudC5maW5kKCdbZGF0YS1tZXJnZV0nKS5hZGRCYWNrKCdbZGF0YS1tZXJnZV0nKS5hdHRyKCdkYXRhLW1lcmdlJykgKiAxIHx8IDEpO1xuXHRcdH1cblxuXHRcdHRoaXMuX2l0ZW1zW2N1cnJlbnRdICYmIHRoaXMucmVzZXQodGhpcy5faXRlbXNbY3VycmVudF0uaW5kZXgoKSk7XG5cblx0XHR0aGlzLmludmFsaWRhdGUoJ2l0ZW1zJyk7XG5cblx0XHR0aGlzLnRyaWdnZXIoJ2FkZGVkJywgeyBjb250ZW50OiBjb250ZW50LCBwb3NpdGlvbjogcG9zaXRpb24gfSk7XG5cdH07XG5cblx0LyoqXG5cdCAqIFJlbW92ZXMgYW4gaXRlbSBieSBpdHMgcG9zaXRpb24uXG5cdCAqIEB0b2RvIFVzZSBgaXRlbWAgaW5zdGVhZCBvZiBgY29udGVudGAgZm9yIHRoZSBldmVudCBhcmd1bWVudHMuXG5cdCAqIEBwdWJsaWNcblx0ICogQHBhcmFtIHtOdW1iZXJ9IHBvc2l0aW9uIC0gVGhlIHJlbGF0aXZlIHBvc2l0aW9uIG9mIHRoZSBpdGVtIHRvIHJlbW92ZS5cblx0ICovXG5cdE93bC5wcm90b3R5cGUucmVtb3ZlID0gZnVuY3Rpb24ocG9zaXRpb24pIHtcblx0XHRwb3NpdGlvbiA9IHRoaXMubm9ybWFsaXplKHBvc2l0aW9uLCB0cnVlKTtcblxuXHRcdGlmIChwb3NpdGlvbiA9PT0gdW5kZWZpbmVkKSB7XG5cdFx0XHRyZXR1cm47XG5cdFx0fVxuXG5cdFx0dGhpcy50cmlnZ2VyKCdyZW1vdmUnLCB7IGNvbnRlbnQ6IHRoaXMuX2l0ZW1zW3Bvc2l0aW9uXSwgcG9zaXRpb246IHBvc2l0aW9uIH0pO1xuXG5cdFx0dGhpcy5faXRlbXNbcG9zaXRpb25dLnJlbW92ZSgpO1xuXHRcdHRoaXMuX2l0ZW1zLnNwbGljZShwb3NpdGlvbiwgMSk7XG5cdFx0dGhpcy5fbWVyZ2Vycy5zcGxpY2UocG9zaXRpb24sIDEpO1xuXG5cdFx0dGhpcy5pbnZhbGlkYXRlKCdpdGVtcycpO1xuXG5cdFx0dGhpcy50cmlnZ2VyKCdyZW1vdmVkJywgeyBjb250ZW50OiBudWxsLCBwb3NpdGlvbjogcG9zaXRpb24gfSk7XG5cdH07XG5cblx0LyoqXG5cdCAqIFByZWxvYWRzIGltYWdlcyB3aXRoIGF1dG8gd2lkdGguXG5cdCAqIEB0b2RvIFJlcGxhY2UgYnkgYSBtb3JlIGdlbmVyaWMgYXBwcm9hY2hcblx0ICogQHByb3RlY3RlZFxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5wcmVsb2FkQXV0b1dpZHRoSW1hZ2VzID0gZnVuY3Rpb24oaW1hZ2VzKSB7XG5cdFx0aW1hZ2VzLmVhY2goJC5wcm94eShmdW5jdGlvbihpLCBlbGVtZW50KSB7XG5cdFx0XHR0aGlzLmVudGVyKCdwcmUtbG9hZGluZycpO1xuXHRcdFx0ZWxlbWVudCA9ICQoZWxlbWVudCk7XG5cdFx0XHQkKG5ldyBJbWFnZSgpKS5vbmUoJ2xvYWQnLCAkLnByb3h5KGZ1bmN0aW9uKGUpIHtcblx0XHRcdFx0ZWxlbWVudC5hdHRyKCdzcmMnLCBlLnRhcmdldC5zcmMpO1xuXHRcdFx0XHRlbGVtZW50LmNzcygnb3BhY2l0eScsIDEpO1xuXHRcdFx0XHR0aGlzLmxlYXZlKCdwcmUtbG9hZGluZycpO1xuXHRcdFx0XHQhdGhpcy5pcygncHJlLWxvYWRpbmcnKSAmJiAhdGhpcy5pcygnaW5pdGlhbGl6aW5nJykgJiYgdGhpcy5yZWZyZXNoKCk7XG5cdFx0XHR9LCB0aGlzKSkuYXR0cignc3JjJywgZWxlbWVudC5hdHRyKCdzcmMnKSB8fCBlbGVtZW50LmF0dHIoJ2RhdGEtc3JjJykgfHwgZWxlbWVudC5hdHRyKCdkYXRhLXNyYy1yZXRpbmEnKSk7XG5cdFx0fSwgdGhpcykpO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBEZXN0cm95cyB0aGUgY2Fyb3VzZWwuXG5cdCAqIEBwdWJsaWNcblx0ICovXG5cdE93bC5wcm90b3R5cGUuZGVzdHJveSA9IGZ1bmN0aW9uKCkge1xuXG5cdFx0dGhpcy4kZWxlbWVudC5vZmYoJy5vd2wuY29yZScpO1xuXHRcdHRoaXMuJHN0YWdlLm9mZignLm93bC5jb3JlJyk7XG5cdFx0JChkb2N1bWVudCkub2ZmKCcub3dsLmNvcmUnKTtcblxuXHRcdGlmICh0aGlzLnNldHRpbmdzLnJlc3BvbnNpdmUgIT09IGZhbHNlKSB7XG5cdFx0XHR3aW5kb3cuY2xlYXJUaW1lb3V0KHRoaXMucmVzaXplVGltZXIpO1xuXHRcdFx0dGhpcy5vZmYod2luZG93LCAncmVzaXplJywgdGhpcy5faGFuZGxlcnMub25UaHJvdHRsZWRSZXNpemUpO1xuXHRcdH1cblxuXHRcdGZvciAodmFyIGkgaW4gdGhpcy5fcGx1Z2lucykge1xuXHRcdFx0dGhpcy5fcGx1Z2luc1tpXS5kZXN0cm95KCk7XG5cdFx0fVxuXG5cdFx0dGhpcy4kc3RhZ2UuY2hpbGRyZW4oJy5jbG9uZWQnKS5yZW1vdmUoKTtcblxuXHRcdHRoaXMuJHN0YWdlLnVud3JhcCgpO1xuXHRcdHRoaXMuJHN0YWdlLmNoaWxkcmVuKCkuY29udGVudHMoKS51bndyYXAoKTtcblx0XHR0aGlzLiRzdGFnZS5jaGlsZHJlbigpLnVud3JhcCgpO1xuXHRcdHRoaXMuJHN0YWdlLnJlbW92ZSgpO1xuXHRcdHRoaXMuJGVsZW1lbnRcblx0XHRcdC5yZW1vdmVDbGFzcyh0aGlzLm9wdGlvbnMucmVmcmVzaENsYXNzKVxuXHRcdFx0LnJlbW92ZUNsYXNzKHRoaXMub3B0aW9ucy5sb2FkaW5nQ2xhc3MpXG5cdFx0XHQucmVtb3ZlQ2xhc3ModGhpcy5vcHRpb25zLmxvYWRlZENsYXNzKVxuXHRcdFx0LnJlbW92ZUNsYXNzKHRoaXMub3B0aW9ucy5ydGxDbGFzcylcblx0XHRcdC5yZW1vdmVDbGFzcyh0aGlzLm9wdGlvbnMuZHJhZ0NsYXNzKVxuXHRcdFx0LnJlbW92ZUNsYXNzKHRoaXMub3B0aW9ucy5ncmFiQ2xhc3MpXG5cdFx0XHQuYXR0cignY2xhc3MnLCB0aGlzLiRlbGVtZW50LmF0dHIoJ2NsYXNzJykucmVwbGFjZShuZXcgUmVnRXhwKHRoaXMub3B0aW9ucy5yZXNwb25zaXZlQ2xhc3MgKyAnLVxcXFxTK1xcXFxzJywgJ2cnKSwgJycpKVxuXHRcdFx0LnJlbW92ZURhdGEoJ293bC5jYXJvdXNlbCcpO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBPcGVyYXRvcnMgdG8gY2FsY3VsYXRlIHJpZ2h0LXRvLWxlZnQgYW5kIGxlZnQtdG8tcmlnaHQuXG5cdCAqIEBwcm90ZWN0ZWRcblx0ICogQHBhcmFtIHtOdW1iZXJ9IFthXSAtIFRoZSBsZWZ0IHNpZGUgb3BlcmFuZC5cblx0ICogQHBhcmFtIHtTdHJpbmd9IFtvXSAtIFRoZSBvcGVyYXRvci5cblx0ICogQHBhcmFtIHtOdW1iZXJ9IFtiXSAtIFRoZSByaWdodCBzaWRlIG9wZXJhbmQuXG5cdCAqL1xuXHRPd2wucHJvdG90eXBlLm9wID0gZnVuY3Rpb24oYSwgbywgYikge1xuXHRcdHZhciBydGwgPSB0aGlzLnNldHRpbmdzLnJ0bDtcblx0XHRzd2l0Y2ggKG8pIHtcblx0XHRcdGNhc2UgJzwnOlxuXHRcdFx0XHRyZXR1cm4gcnRsID8gYSA+IGIgOiBhIDwgYjtcblx0XHRcdGNhc2UgJz4nOlxuXHRcdFx0XHRyZXR1cm4gcnRsID8gYSA8IGIgOiBhID4gYjtcblx0XHRcdGNhc2UgJz49Jzpcblx0XHRcdFx0cmV0dXJuIHJ0bCA/IGEgPD0gYiA6IGEgPj0gYjtcblx0XHRcdGNhc2UgJzw9Jzpcblx0XHRcdFx0cmV0dXJuIHJ0bCA/IGEgPj0gYiA6IGEgPD0gYjtcblx0XHRcdGRlZmF1bHQ6XG5cdFx0XHRcdGJyZWFrO1xuXHRcdH1cblx0fTtcblxuXHQvKipcblx0ICogQXR0YWNoZXMgdG8gYW4gaW50ZXJuYWwgZXZlbnQuXG5cdCAqIEBwcm90ZWN0ZWRcblx0ICogQHBhcmFtIHtIVE1MRWxlbWVudH0gZWxlbWVudCAtIFRoZSBldmVudCBzb3VyY2UuXG5cdCAqIEBwYXJhbSB7U3RyaW5nfSBldmVudCAtIFRoZSBldmVudCBuYW1lLlxuXHQgKiBAcGFyYW0ge0Z1bmN0aW9ufSBsaXN0ZW5lciAtIFRoZSBldmVudCBoYW5kbGVyIHRvIGF0dGFjaC5cblx0ICogQHBhcmFtIHtCb29sZWFufSBjYXB0dXJlIC0gV2V0aGVyIHRoZSBldmVudCBzaG91bGQgYmUgaGFuZGxlZCBhdCB0aGUgY2FwdHVyaW5nIHBoYXNlIG9yIG5vdC5cblx0ICovXG5cdE93bC5wcm90b3R5cGUub24gPSBmdW5jdGlvbihlbGVtZW50LCBldmVudCwgbGlzdGVuZXIsIGNhcHR1cmUpIHtcblx0XHRpZiAoZWxlbWVudC5hZGRFdmVudExpc3RlbmVyKSB7XG5cdFx0XHRlbGVtZW50LmFkZEV2ZW50TGlzdGVuZXIoZXZlbnQsIGxpc3RlbmVyLCBjYXB0dXJlKTtcblx0XHR9IGVsc2UgaWYgKGVsZW1lbnQuYXR0YWNoRXZlbnQpIHtcblx0XHRcdGVsZW1lbnQuYXR0YWNoRXZlbnQoJ29uJyArIGV2ZW50LCBsaXN0ZW5lcik7XG5cdFx0fVxuXHR9O1xuXG5cdC8qKlxuXHQgKiBEZXRhY2hlcyBmcm9tIGFuIGludGVybmFsIGV2ZW50LlxuXHQgKiBAcHJvdGVjdGVkXG5cdCAqIEBwYXJhbSB7SFRNTEVsZW1lbnR9IGVsZW1lbnQgLSBUaGUgZXZlbnQgc291cmNlLlxuXHQgKiBAcGFyYW0ge1N0cmluZ30gZXZlbnQgLSBUaGUgZXZlbnQgbmFtZS5cblx0ICogQHBhcmFtIHtGdW5jdGlvbn0gbGlzdGVuZXIgLSBUaGUgYXR0YWNoZWQgZXZlbnQgaGFuZGxlciB0byBkZXRhY2guXG5cdCAqIEBwYXJhbSB7Qm9vbGVhbn0gY2FwdHVyZSAtIFdldGhlciB0aGUgYXR0YWNoZWQgZXZlbnQgaGFuZGxlciB3YXMgcmVnaXN0ZXJlZCBhcyBhIGNhcHR1cmluZyBsaXN0ZW5lciBvciBub3QuXG5cdCAqL1xuXHRPd2wucHJvdG90eXBlLm9mZiA9IGZ1bmN0aW9uKGVsZW1lbnQsIGV2ZW50LCBsaXN0ZW5lciwgY2FwdHVyZSkge1xuXHRcdGlmIChlbGVtZW50LnJlbW92ZUV2ZW50TGlzdGVuZXIpIHtcblx0XHRcdGVsZW1lbnQucmVtb3ZlRXZlbnRMaXN0ZW5lcihldmVudCwgbGlzdGVuZXIsIGNhcHR1cmUpO1xuXHRcdH0gZWxzZSBpZiAoZWxlbWVudC5kZXRhY2hFdmVudCkge1xuXHRcdFx0ZWxlbWVudC5kZXRhY2hFdmVudCgnb24nICsgZXZlbnQsIGxpc3RlbmVyKTtcblx0XHR9XG5cdH07XG5cblx0LyoqXG5cdCAqIFRyaWdnZXJzIGEgcHVibGljIGV2ZW50LlxuXHQgKiBAdG9kbyBSZW1vdmUgYHN0YXR1c2AsIGByZWxhdGVkVGFyZ2V0YCBzaG91bGQgYmUgdXNlZCBpbnN0ZWFkLlxuXHQgKiBAcHJvdGVjdGVkXG5cdCAqIEBwYXJhbSB7U3RyaW5nfSBuYW1lIC0gVGhlIGV2ZW50IG5hbWUuXG5cdCAqIEBwYXJhbSB7Kn0gW2RhdGE9bnVsbF0gLSBUaGUgZXZlbnQgZGF0YS5cblx0ICogQHBhcmFtIHtTdHJpbmd9IFtuYW1lc3BhY2U9Y2Fyb3VzZWxdIC0gVGhlIGV2ZW50IG5hbWVzcGFjZS5cblx0ICogQHBhcmFtIHtTdHJpbmd9IFtzdGF0ZV0gLSBUaGUgc3RhdGUgd2hpY2ggaXMgYXNzb2NpYXRlZCB3aXRoIHRoZSBldmVudC5cblx0ICogQHBhcmFtIHtCb29sZWFufSBbZW50ZXI9ZmFsc2VdIC0gSW5kaWNhdGVzIGlmIHRoZSBjYWxsIGVudGVycyB0aGUgc3BlY2lmaWVkIHN0YXRlIG9yIG5vdC5cblx0ICogQHJldHVybnMge0V2ZW50fSAtIFRoZSBldmVudCBhcmd1bWVudHMuXG5cdCAqL1xuXHRPd2wucHJvdG90eXBlLnRyaWdnZXIgPSBmdW5jdGlvbihuYW1lLCBkYXRhLCBuYW1lc3BhY2UsIHN0YXRlLCBlbnRlcikge1xuXHRcdHZhciBzdGF0dXMgPSB7XG5cdFx0XHRpdGVtOiB7IGNvdW50OiB0aGlzLl9pdGVtcy5sZW5ndGgsIGluZGV4OiB0aGlzLmN1cnJlbnQoKSB9XG5cdFx0fSwgaGFuZGxlciA9ICQuY2FtZWxDYXNlKFxuXHRcdFx0JC5ncmVwKFsgJ29uJywgbmFtZSwgbmFtZXNwYWNlIF0sIGZ1bmN0aW9uKHYpIHsgcmV0dXJuIHYgfSlcblx0XHRcdFx0LmpvaW4oJy0nKS50b0xvd2VyQ2FzZSgpXG5cdFx0KSwgZXZlbnQgPSAkLkV2ZW50KFxuXHRcdFx0WyBuYW1lLCAnb3dsJywgbmFtZXNwYWNlIHx8ICdjYXJvdXNlbCcgXS5qb2luKCcuJykudG9Mb3dlckNhc2UoKSxcblx0XHRcdCQuZXh0ZW5kKHsgcmVsYXRlZFRhcmdldDogdGhpcyB9LCBzdGF0dXMsIGRhdGEpXG5cdFx0KTtcblxuXHRcdGlmICghdGhpcy5fc3VwcmVzc1tuYW1lXSkge1xuXHRcdFx0JC5lYWNoKHRoaXMuX3BsdWdpbnMsIGZ1bmN0aW9uKG5hbWUsIHBsdWdpbikge1xuXHRcdFx0XHRpZiAocGx1Z2luLm9uVHJpZ2dlcikge1xuXHRcdFx0XHRcdHBsdWdpbi5vblRyaWdnZXIoZXZlbnQpO1xuXHRcdFx0XHR9XG5cdFx0XHR9KTtcblxuXHRcdFx0dGhpcy5yZWdpc3Rlcih7IHR5cGU6IE93bC5UeXBlLkV2ZW50LCBuYW1lOiBuYW1lIH0pO1xuXHRcdFx0dGhpcy4kZWxlbWVudC50cmlnZ2VyKGV2ZW50KTtcblxuXHRcdFx0aWYgKHRoaXMuc2V0dGluZ3MgJiYgdHlwZW9mIHRoaXMuc2V0dGluZ3NbaGFuZGxlcl0gPT09ICdmdW5jdGlvbicpIHtcblx0XHRcdFx0dGhpcy5zZXR0aW5nc1toYW5kbGVyXS5jYWxsKHRoaXMsIGV2ZW50KTtcblx0XHRcdH1cblx0XHR9XG5cblx0XHRyZXR1cm4gZXZlbnQ7XG5cdH07XG5cblx0LyoqXG5cdCAqIEVudGVycyBhIHN0YXRlLlxuXHQgKiBAcGFyYW0gbmFtZSAtIFRoZSBzdGF0ZSBuYW1lLlxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5lbnRlciA9IGZ1bmN0aW9uKG5hbWUpIHtcblx0XHQkLmVhY2goWyBuYW1lIF0uY29uY2F0KHRoaXMuX3N0YXRlcy50YWdzW25hbWVdIHx8IFtdKSwgJC5wcm94eShmdW5jdGlvbihpLCBuYW1lKSB7XG5cdFx0XHRpZiAodGhpcy5fc3RhdGVzLmN1cnJlbnRbbmFtZV0gPT09IHVuZGVmaW5lZCkge1xuXHRcdFx0XHR0aGlzLl9zdGF0ZXMuY3VycmVudFtuYW1lXSA9IDA7XG5cdFx0XHR9XG5cblx0XHRcdHRoaXMuX3N0YXRlcy5jdXJyZW50W25hbWVdKys7XG5cdFx0fSwgdGhpcykpO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBMZWF2ZXMgYSBzdGF0ZS5cblx0ICogQHBhcmFtIG5hbWUgLSBUaGUgc3RhdGUgbmFtZS5cblx0ICovXG5cdE93bC5wcm90b3R5cGUubGVhdmUgPSBmdW5jdGlvbihuYW1lKSB7XG5cdFx0JC5lYWNoKFsgbmFtZSBdLmNvbmNhdCh0aGlzLl9zdGF0ZXMudGFnc1tuYW1lXSB8fCBbXSksICQucHJveHkoZnVuY3Rpb24oaSwgbmFtZSkge1xuXHRcdFx0dGhpcy5fc3RhdGVzLmN1cnJlbnRbbmFtZV0tLTtcblx0XHR9LCB0aGlzKSk7XG5cdH07XG5cblx0LyoqXG5cdCAqIFJlZ2lzdGVycyBhbiBldmVudCBvciBzdGF0ZS5cblx0ICogQHB1YmxpY1xuXHQgKiBAcGFyYW0ge09iamVjdH0gb2JqZWN0IC0gVGhlIGV2ZW50IG9yIHN0YXRlIHRvIHJlZ2lzdGVyLlxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5yZWdpc3RlciA9IGZ1bmN0aW9uKG9iamVjdCkge1xuXHRcdGlmIChvYmplY3QudHlwZSA9PT0gT3dsLlR5cGUuRXZlbnQpIHtcblx0XHRcdGlmICghJC5ldmVudC5zcGVjaWFsW29iamVjdC5uYW1lXSkge1xuXHRcdFx0XHQkLmV2ZW50LnNwZWNpYWxbb2JqZWN0Lm5hbWVdID0ge307XG5cdFx0XHR9XG5cblx0XHRcdGlmICghJC5ldmVudC5zcGVjaWFsW29iamVjdC5uYW1lXS5vd2wpIHtcblx0XHRcdFx0dmFyIF9kZWZhdWx0ID0gJC5ldmVudC5zcGVjaWFsW29iamVjdC5uYW1lXS5fZGVmYXVsdDtcblx0XHRcdFx0JC5ldmVudC5zcGVjaWFsW29iamVjdC5uYW1lXS5fZGVmYXVsdCA9IGZ1bmN0aW9uKGUpIHtcblx0XHRcdFx0XHRpZiAoX2RlZmF1bHQgJiYgX2RlZmF1bHQuYXBwbHkgJiYgKCFlLm5hbWVzcGFjZSB8fCBlLm5hbWVzcGFjZS5pbmRleE9mKCdvd2wnKSA9PT0gLTEpKSB7XG5cdFx0XHRcdFx0XHRyZXR1cm4gX2RlZmF1bHQuYXBwbHkodGhpcywgYXJndW1lbnRzKTtcblx0XHRcdFx0XHR9XG5cdFx0XHRcdFx0cmV0dXJuIGUubmFtZXNwYWNlICYmIGUubmFtZXNwYWNlLmluZGV4T2YoJ293bCcpID4gLTE7XG5cdFx0XHRcdH07XG5cdFx0XHRcdCQuZXZlbnQuc3BlY2lhbFtvYmplY3QubmFtZV0ub3dsID0gdHJ1ZTtcblx0XHRcdH1cblx0XHR9IGVsc2UgaWYgKG9iamVjdC50eXBlID09PSBPd2wuVHlwZS5TdGF0ZSkge1xuXHRcdFx0aWYgKCF0aGlzLl9zdGF0ZXMudGFnc1tvYmplY3QubmFtZV0pIHtcblx0XHRcdFx0dGhpcy5fc3RhdGVzLnRhZ3Nbb2JqZWN0Lm5hbWVdID0gb2JqZWN0LnRhZ3M7XG5cdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHR0aGlzLl9zdGF0ZXMudGFnc1tvYmplY3QubmFtZV0gPSB0aGlzLl9zdGF0ZXMudGFnc1tvYmplY3QubmFtZV0uY29uY2F0KG9iamVjdC50YWdzKTtcblx0XHRcdH1cblxuXHRcdFx0dGhpcy5fc3RhdGVzLnRhZ3Nbb2JqZWN0Lm5hbWVdID0gJC5ncmVwKHRoaXMuX3N0YXRlcy50YWdzW29iamVjdC5uYW1lXSwgJC5wcm94eShmdW5jdGlvbih0YWcsIGkpIHtcblx0XHRcdFx0cmV0dXJuICQuaW5BcnJheSh0YWcsIHRoaXMuX3N0YXRlcy50YWdzW29iamVjdC5uYW1lXSkgPT09IGk7XG5cdFx0XHR9LCB0aGlzKSk7XG5cdFx0fVxuXHR9O1xuXG5cdC8qKlxuXHQgKiBTdXBwcmVzc2VzIGV2ZW50cy5cblx0ICogQHByb3RlY3RlZFxuXHQgKiBAcGFyYW0ge0FycmF5LjxTdHJpbmc+fSBldmVudHMgLSBUaGUgZXZlbnRzIHRvIHN1cHByZXNzLlxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5zdXBwcmVzcyA9IGZ1bmN0aW9uKGV2ZW50cykge1xuXHRcdCQuZWFjaChldmVudHMsICQucHJveHkoZnVuY3Rpb24oaW5kZXgsIGV2ZW50KSB7XG5cdFx0XHR0aGlzLl9zdXByZXNzW2V2ZW50XSA9IHRydWU7XG5cdFx0fSwgdGhpcykpO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBSZWxlYXNlcyBzdXBwcmVzc2VkIGV2ZW50cy5cblx0ICogQHByb3RlY3RlZFxuXHQgKiBAcGFyYW0ge0FycmF5LjxTdHJpbmc+fSBldmVudHMgLSBUaGUgZXZlbnRzIHRvIHJlbGVhc2UuXG5cdCAqL1xuXHRPd2wucHJvdG90eXBlLnJlbGVhc2UgPSBmdW5jdGlvbihldmVudHMpIHtcblx0XHQkLmVhY2goZXZlbnRzLCAkLnByb3h5KGZ1bmN0aW9uKGluZGV4LCBldmVudCkge1xuXHRcdFx0ZGVsZXRlIHRoaXMuX3N1cHJlc3NbZXZlbnRdO1xuXHRcdH0sIHRoaXMpKTtcblx0fTtcblxuXHQvKipcblx0ICogR2V0cyB1bmlmaWVkIHBvaW50ZXIgY29vcmRpbmF0ZXMgZnJvbSBldmVudC5cblx0ICogQHRvZG8gIzI2MVxuXHQgKiBAcHJvdGVjdGVkXG5cdCAqIEBwYXJhbSB7RXZlbnR9IC0gVGhlIGBtb3VzZWRvd25gIG9yIGB0b3VjaHN0YXJ0YCBldmVudC5cblx0ICogQHJldHVybnMge09iamVjdH0gLSBDb250YWlucyBgeGAgYW5kIGB5YCBjb29yZGluYXRlcyBvZiBjdXJyZW50IHBvaW50ZXIgcG9zaXRpb24uXG5cdCAqL1xuXHRPd2wucHJvdG90eXBlLnBvaW50ZXIgPSBmdW5jdGlvbihldmVudCkge1xuXHRcdHZhciByZXN1bHQgPSB7IHg6IG51bGwsIHk6IG51bGwgfTtcblxuXHRcdGV2ZW50ID0gZXZlbnQub3JpZ2luYWxFdmVudCB8fCBldmVudCB8fCB3aW5kb3cuZXZlbnQ7XG5cblx0XHRldmVudCA9IGV2ZW50LnRvdWNoZXMgJiYgZXZlbnQudG91Y2hlcy5sZW5ndGggP1xuXHRcdFx0ZXZlbnQudG91Y2hlc1swXSA6IGV2ZW50LmNoYW5nZWRUb3VjaGVzICYmIGV2ZW50LmNoYW5nZWRUb3VjaGVzLmxlbmd0aCA/XG5cdFx0XHRcdGV2ZW50LmNoYW5nZWRUb3VjaGVzWzBdIDogZXZlbnQ7XG5cblx0XHRpZiAoZXZlbnQucGFnZVgpIHtcblx0XHRcdHJlc3VsdC54ID0gZXZlbnQucGFnZVg7XG5cdFx0XHRyZXN1bHQueSA9IGV2ZW50LnBhZ2VZO1xuXHRcdH0gZWxzZSB7XG5cdFx0XHRyZXN1bHQueCA9IGV2ZW50LmNsaWVudFg7XG5cdFx0XHRyZXN1bHQueSA9IGV2ZW50LmNsaWVudFk7XG5cdFx0fVxuXG5cdFx0cmV0dXJuIHJlc3VsdDtcblx0fTtcblxuXHQvKipcblx0ICogRGV0ZXJtaW5lcyBpZiB0aGUgaW5wdXQgaXMgYSBOdW1iZXIgb3Igc29tZXRoaW5nIHRoYXQgY2FuIGJlIGNvZXJjZWQgdG8gYSBOdW1iZXJcblx0ICogQHByb3RlY3RlZFxuXHQgKiBAcGFyYW0ge051bWJlcnxTdHJpbmd8T2JqZWN0fEFycmF5fEJvb2xlYW58UmVnRXhwfEZ1bmN0aW9ufFN5bWJvbH0gLSBUaGUgaW5wdXQgdG8gYmUgdGVzdGVkXG5cdCAqIEByZXR1cm5zIHtCb29sZWFufSAtIEFuIGluZGljYXRpb24gaWYgdGhlIGlucHV0IGlzIGEgTnVtYmVyIG9yIGNhbiBiZSBjb2VyY2VkIHRvIGEgTnVtYmVyXG5cdCAqL1xuXHRPd2wucHJvdG90eXBlLmlzTnVtZXJpYyA9IGZ1bmN0aW9uKG51bWJlcikge1xuXHRcdHJldHVybiAhaXNOYU4ocGFyc2VGbG9hdChudW1iZXIpKTtcblx0fTtcblxuXHQvKipcblx0ICogR2V0cyB0aGUgZGlmZmVyZW5jZSBvZiB0d28gdmVjdG9ycy5cblx0ICogQHRvZG8gIzI2MVxuXHQgKiBAcHJvdGVjdGVkXG5cdCAqIEBwYXJhbSB7T2JqZWN0fSAtIFRoZSBmaXJzdCB2ZWN0b3IuXG5cdCAqIEBwYXJhbSB7T2JqZWN0fSAtIFRoZSBzZWNvbmQgdmVjdG9yLlxuXHQgKiBAcmV0dXJucyB7T2JqZWN0fSAtIFRoZSBkaWZmZXJlbmNlLlxuXHQgKi9cblx0T3dsLnByb3RvdHlwZS5kaWZmZXJlbmNlID0gZnVuY3Rpb24oZmlyc3QsIHNlY29uZCkge1xuXHRcdHJldHVybiB7XG5cdFx0XHR4OiBmaXJzdC54IC0gc2Vjb25kLngsXG5cdFx0XHR5OiBmaXJzdC55IC0gc2Vjb25kLnlcblx0XHR9O1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBUaGUgalF1ZXJ5IFBsdWdpbiBmb3IgdGhlIE93bCBDYXJvdXNlbFxuXHQgKiBAdG9kbyBOYXZpZ2F0aW9uIHBsdWdpbiBgbmV4dGAgYW5kIGBwcmV2YFxuXHQgKiBAcHVibGljXG5cdCAqL1xuXHQkLmZuLm93bENhcm91c2VsID0gZnVuY3Rpb24ob3B0aW9uKSB7XG5cdFx0dmFyIGFyZ3MgPSBBcnJheS5wcm90b3R5cGUuc2xpY2UuY2FsbChhcmd1bWVudHMsIDEpO1xuXG5cdFx0cmV0dXJuIHRoaXMuZWFjaChmdW5jdGlvbigpIHtcblx0XHRcdHZhciAkdGhpcyA9ICQodGhpcyksXG5cdFx0XHRcdGRhdGEgPSAkdGhpcy5kYXRhKCdvd2wuY2Fyb3VzZWwnKTtcblxuXHRcdFx0aWYgKCFkYXRhKSB7XG5cdFx0XHRcdGRhdGEgPSBuZXcgT3dsKHRoaXMsIHR5cGVvZiBvcHRpb24gPT0gJ29iamVjdCcgJiYgb3B0aW9uKTtcblx0XHRcdFx0JHRoaXMuZGF0YSgnb3dsLmNhcm91c2VsJywgZGF0YSk7XG5cblx0XHRcdFx0JC5lYWNoKFtcblx0XHRcdFx0XHQnbmV4dCcsICdwcmV2JywgJ3RvJywgJ2Rlc3Ryb3knLCAncmVmcmVzaCcsICdyZXBsYWNlJywgJ2FkZCcsICdyZW1vdmUnXG5cdFx0XHRcdF0sIGZ1bmN0aW9uKGksIGV2ZW50KSB7XG5cdFx0XHRcdFx0ZGF0YS5yZWdpc3Rlcih7IHR5cGU6IE93bC5UeXBlLkV2ZW50LCBuYW1lOiBldmVudCB9KTtcblx0XHRcdFx0XHRkYXRhLiRlbGVtZW50Lm9uKGV2ZW50ICsgJy5vd2wuY2Fyb3VzZWwuY29yZScsICQucHJveHkoZnVuY3Rpb24oZSkge1xuXHRcdFx0XHRcdFx0aWYgKGUubmFtZXNwYWNlICYmIGUucmVsYXRlZFRhcmdldCAhPT0gdGhpcykge1xuXHRcdFx0XHRcdFx0XHR0aGlzLnN1cHByZXNzKFsgZXZlbnQgXSk7XG5cdFx0XHRcdFx0XHRcdGRhdGFbZXZlbnRdLmFwcGx5KHRoaXMsIFtdLnNsaWNlLmNhbGwoYXJndW1lbnRzLCAxKSk7XG5cdFx0XHRcdFx0XHRcdHRoaXMucmVsZWFzZShbIGV2ZW50IF0pO1xuXHRcdFx0XHRcdFx0fVxuXHRcdFx0XHRcdH0sIGRhdGEpKTtcblx0XHRcdFx0fSk7XG5cdFx0XHR9XG5cblx0XHRcdGlmICh0eXBlb2Ygb3B0aW9uID09ICdzdHJpbmcnICYmIG9wdGlvbi5jaGFyQXQoMCkgIT09ICdfJykge1xuXHRcdFx0XHRkYXRhW29wdGlvbl0uYXBwbHkoZGF0YSwgYXJncyk7XG5cdFx0XHR9XG5cdFx0fSk7XG5cdH07XG5cblx0LyoqXG5cdCAqIFRoZSBjb25zdHJ1Y3RvciBmb3IgdGhlIGpRdWVyeSBQbHVnaW5cblx0ICogQHB1YmxpY1xuXHQgKi9cblx0JC5mbi5vd2xDYXJvdXNlbC5Db25zdHJ1Y3RvciA9IE93bDtcblxufSkod2luZG93LlplcHRvIHx8IHdpbmRvdy5qUXVlcnksIHdpbmRvdywgZG9jdW1lbnQpO1xuXG4vKipcbiAqIEF1dG9SZWZyZXNoIFBsdWdpblxuICogQHZlcnNpb24gMi4zLjRcbiAqIEBhdXRob3IgQXJ0dXMgS29sYW5vd3NraVxuICogQGF1dGhvciBEYXZpZCBEZXV0c2NoXG4gKiBAbGljZW5zZSBUaGUgTUlUIExpY2Vuc2UgKE1JVClcbiAqL1xuOyhmdW5jdGlvbigkLCB3aW5kb3csIGRvY3VtZW50LCB1bmRlZmluZWQpIHtcblxuXHQvKipcblx0ICogQ3JlYXRlcyB0aGUgYXV0byByZWZyZXNoIHBsdWdpbi5cblx0ICogQGNsYXNzIFRoZSBBdXRvIFJlZnJlc2ggUGx1Z2luXG5cdCAqIEBwYXJhbSB7T3dsfSBjYXJvdXNlbCAtIFRoZSBPd2wgQ2Fyb3VzZWxcblx0ICovXG5cdHZhciBBdXRvUmVmcmVzaCA9IGZ1bmN0aW9uKGNhcm91c2VsKSB7XG5cdFx0LyoqXG5cdFx0ICogUmVmZXJlbmNlIHRvIHRoZSBjb3JlLlxuXHRcdCAqIEBwcm90ZWN0ZWRcblx0XHQgKiBAdHlwZSB7T3dsfVxuXHRcdCAqL1xuXHRcdHRoaXMuX2NvcmUgPSBjYXJvdXNlbDtcblxuXHRcdC8qKlxuXHRcdCAqIFJlZnJlc2ggaW50ZXJ2YWwuXG5cdFx0ICogQHByb3RlY3RlZFxuXHRcdCAqIEB0eXBlIHtudW1iZXJ9XG5cdFx0ICovXG5cdFx0dGhpcy5faW50ZXJ2YWwgPSBudWxsO1xuXG5cdFx0LyoqXG5cdFx0ICogV2hldGhlciB0aGUgZWxlbWVudCBpcyBjdXJyZW50bHkgdmlzaWJsZSBvciBub3QuXG5cdFx0ICogQHByb3RlY3RlZFxuXHRcdCAqIEB0eXBlIHtCb29sZWFufVxuXHRcdCAqL1xuXHRcdHRoaXMuX3Zpc2libGUgPSBudWxsO1xuXG5cdFx0LyoqXG5cdFx0ICogQWxsIGV2ZW50IGhhbmRsZXJzLlxuXHRcdCAqIEBwcm90ZWN0ZWRcblx0XHQgKiBAdHlwZSB7T2JqZWN0fVxuXHRcdCAqL1xuXHRcdHRoaXMuX2hhbmRsZXJzID0ge1xuXHRcdFx0J2luaXRpYWxpemVkLm93bC5jYXJvdXNlbCc6ICQucHJveHkoZnVuY3Rpb24oZSkge1xuXHRcdFx0XHRpZiAoZS5uYW1lc3BhY2UgJiYgdGhpcy5fY29yZS5zZXR0aW5ncy5hdXRvUmVmcmVzaCkge1xuXHRcdFx0XHRcdHRoaXMud2F0Y2goKTtcblx0XHRcdFx0fVxuXHRcdFx0fSwgdGhpcylcblx0XHR9O1xuXG5cdFx0Ly8gc2V0IGRlZmF1bHQgb3B0aW9uc1xuXHRcdHRoaXMuX2NvcmUub3B0aW9ucyA9ICQuZXh0ZW5kKHt9LCBBdXRvUmVmcmVzaC5EZWZhdWx0cywgdGhpcy5fY29yZS5vcHRpb25zKTtcblxuXHRcdC8vIHJlZ2lzdGVyIGV2ZW50IGhhbmRsZXJzXG5cdFx0dGhpcy5fY29yZS4kZWxlbWVudC5vbih0aGlzLl9oYW5kbGVycyk7XG5cdH07XG5cblx0LyoqXG5cdCAqIERlZmF1bHQgb3B0aW9ucy5cblx0ICogQHB1YmxpY1xuXHQgKi9cblx0QXV0b1JlZnJlc2guRGVmYXVsdHMgPSB7XG5cdFx0YXV0b1JlZnJlc2g6IHRydWUsXG5cdFx0YXV0b1JlZnJlc2hJbnRlcnZhbDogNTAwXG5cdH07XG5cblx0LyoqXG5cdCAqIFdhdGNoZXMgdGhlIGVsZW1lbnQuXG5cdCAqL1xuXHRBdXRvUmVmcmVzaC5wcm90b3R5cGUud2F0Y2ggPSBmdW5jdGlvbigpIHtcblx0XHRpZiAodGhpcy5faW50ZXJ2YWwpIHtcblx0XHRcdHJldHVybjtcblx0XHR9XG5cblx0XHR0aGlzLl92aXNpYmxlID0gdGhpcy5fY29yZS5pc1Zpc2libGUoKTtcblx0XHR0aGlzLl9pbnRlcnZhbCA9IHdpbmRvdy5zZXRJbnRlcnZhbCgkLnByb3h5KHRoaXMucmVmcmVzaCwgdGhpcyksIHRoaXMuX2NvcmUuc2V0dGluZ3MuYXV0b1JlZnJlc2hJbnRlcnZhbCk7XG5cdH07XG5cblx0LyoqXG5cdCAqIFJlZnJlc2hlcyB0aGUgZWxlbWVudC5cblx0ICovXG5cdEF1dG9SZWZyZXNoLnByb3RvdHlwZS5yZWZyZXNoID0gZnVuY3Rpb24oKSB7XG5cdFx0aWYgKHRoaXMuX2NvcmUuaXNWaXNpYmxlKCkgPT09IHRoaXMuX3Zpc2libGUpIHtcblx0XHRcdHJldHVybjtcblx0XHR9XG5cblx0XHR0aGlzLl92aXNpYmxlID0gIXRoaXMuX3Zpc2libGU7XG5cblx0XHR0aGlzLl9jb3JlLiRlbGVtZW50LnRvZ2dsZUNsYXNzKCdvd2wtaGlkZGVuJywgIXRoaXMuX3Zpc2libGUpO1xuXG5cdFx0dGhpcy5fdmlzaWJsZSAmJiAodGhpcy5fY29yZS5pbnZhbGlkYXRlKCd3aWR0aCcpICYmIHRoaXMuX2NvcmUucmVmcmVzaCgpKTtcblx0fTtcblxuXHQvKipcblx0ICogRGVzdHJveXMgdGhlIHBsdWdpbi5cblx0ICovXG5cdEF1dG9SZWZyZXNoLnByb3RvdHlwZS5kZXN0cm95ID0gZnVuY3Rpb24oKSB7XG5cdFx0dmFyIGhhbmRsZXIsIHByb3BlcnR5O1xuXG5cdFx0d2luZG93LmNsZWFySW50ZXJ2YWwodGhpcy5faW50ZXJ2YWwpO1xuXG5cdFx0Zm9yIChoYW5kbGVyIGluIHRoaXMuX2hhbmRsZXJzKSB7XG5cdFx0XHR0aGlzLl9jb3JlLiRlbGVtZW50Lm9mZihoYW5kbGVyLCB0aGlzLl9oYW5kbGVyc1toYW5kbGVyXSk7XG5cdFx0fVxuXHRcdGZvciAocHJvcGVydHkgaW4gT2JqZWN0LmdldE93blByb3BlcnR5TmFtZXModGhpcykpIHtcblx0XHRcdHR5cGVvZiB0aGlzW3Byb3BlcnR5XSAhPSAnZnVuY3Rpb24nICYmICh0aGlzW3Byb3BlcnR5XSA9IG51bGwpO1xuXHRcdH1cblx0fTtcblxuXHQkLmZuLm93bENhcm91c2VsLkNvbnN0cnVjdG9yLlBsdWdpbnMuQXV0b1JlZnJlc2ggPSBBdXRvUmVmcmVzaDtcblxufSkod2luZG93LlplcHRvIHx8IHdpbmRvdy5qUXVlcnksIHdpbmRvdywgZG9jdW1lbnQpO1xuXG4vKipcbiAqIExhenkgUGx1Z2luXG4gKiBAdmVyc2lvbiAyLjMuNFxuICogQGF1dGhvciBCYXJ0b3N6IFdvamNpZWNob3dza2lcbiAqIEBhdXRob3IgRGF2aWQgRGV1dHNjaFxuICogQGxpY2Vuc2UgVGhlIE1JVCBMaWNlbnNlIChNSVQpXG4gKi9cbjsoZnVuY3Rpb24oJCwgd2luZG93LCBkb2N1bWVudCwgdW5kZWZpbmVkKSB7XG5cblx0LyoqXG5cdCAqIENyZWF0ZXMgdGhlIGxhenkgcGx1Z2luLlxuXHQgKiBAY2xhc3MgVGhlIExhenkgUGx1Z2luXG5cdCAqIEBwYXJhbSB7T3dsfSBjYXJvdXNlbCAtIFRoZSBPd2wgQ2Fyb3VzZWxcblx0ICovXG5cdHZhciBMYXp5ID0gZnVuY3Rpb24oY2Fyb3VzZWwpIHtcblxuXHRcdC8qKlxuXHRcdCAqIFJlZmVyZW5jZSB0byB0aGUgY29yZS5cblx0XHQgKiBAcHJvdGVjdGVkXG5cdFx0ICogQHR5cGUge093bH1cblx0XHQgKi9cblx0XHR0aGlzLl9jb3JlID0gY2Fyb3VzZWw7XG5cblx0XHQvKipcblx0XHQgKiBBbHJlYWR5IGxvYWRlZCBpdGVtcy5cblx0XHQgKiBAcHJvdGVjdGVkXG5cdFx0ICogQHR5cGUge0FycmF5LjxqUXVlcnk+fVxuXHRcdCAqL1xuXHRcdHRoaXMuX2xvYWRlZCA9IFtdO1xuXG5cdFx0LyoqXG5cdFx0ICogRXZlbnQgaGFuZGxlcnMuXG5cdFx0ICogQHByb3RlY3RlZFxuXHRcdCAqIEB0eXBlIHtPYmplY3R9XG5cdFx0ICovXG5cdFx0dGhpcy5faGFuZGxlcnMgPSB7XG5cdFx0XHQnaW5pdGlhbGl6ZWQub3dsLmNhcm91c2VsIGNoYW5nZS5vd2wuY2Fyb3VzZWwgcmVzaXplZC5vd2wuY2Fyb3VzZWwnOiAkLnByb3h5KGZ1bmN0aW9uKGUpIHtcblx0XHRcdFx0aWYgKCFlLm5hbWVzcGFjZSkge1xuXHRcdFx0XHRcdHJldHVybjtcblx0XHRcdFx0fVxuXG5cdFx0XHRcdGlmICghdGhpcy5fY29yZS5zZXR0aW5ncyB8fCAhdGhpcy5fY29yZS5zZXR0aW5ncy5sYXp5TG9hZCkge1xuXHRcdFx0XHRcdHJldHVybjtcblx0XHRcdFx0fVxuXG5cdFx0XHRcdGlmICgoZS5wcm9wZXJ0eSAmJiBlLnByb3BlcnR5Lm5hbWUgPT0gJ3Bvc2l0aW9uJykgfHwgZS50eXBlID09ICdpbml0aWFsaXplZCcpIHtcblx0XHRcdFx0XHR2YXIgc2V0dGluZ3MgPSB0aGlzLl9jb3JlLnNldHRpbmdzLFxuXHRcdFx0XHRcdFx0biA9IChzZXR0aW5ncy5jZW50ZXIgJiYgTWF0aC5jZWlsKHNldHRpbmdzLml0ZW1zIC8gMikgfHwgc2V0dGluZ3MuaXRlbXMpLFxuXHRcdFx0XHRcdFx0aSA9ICgoc2V0dGluZ3MuY2VudGVyICYmIG4gKiAtMSkgfHwgMCksXG5cdFx0XHRcdFx0XHRwb3NpdGlvbiA9IChlLnByb3BlcnR5ICYmIGUucHJvcGVydHkudmFsdWUgIT09IHVuZGVmaW5lZCA/IGUucHJvcGVydHkudmFsdWUgOiB0aGlzLl9jb3JlLmN1cnJlbnQoKSkgKyBpLFxuXHRcdFx0XHRcdFx0Y2xvbmVzID0gdGhpcy5fY29yZS5jbG9uZXMoKS5sZW5ndGgsXG5cdFx0XHRcdFx0XHRsb2FkID0gJC5wcm94eShmdW5jdGlvbihpLCB2KSB7IHRoaXMubG9hZCh2KSB9LCB0aGlzKTtcblx0XHRcdFx0XHQvL1RPRE86IE5lZWQgZG9jdW1lbnRhdGlvbiBmb3IgdGhpcyBuZXcgb3B0aW9uXG5cdFx0XHRcdFx0aWYgKHNldHRpbmdzLmxhenlMb2FkRWFnZXIgPiAwKSB7XG5cdFx0XHRcdFx0XHRuICs9IHNldHRpbmdzLmxhenlMb2FkRWFnZXI7XG5cdFx0XHRcdFx0XHQvLyBJZiB0aGUgY2Fyb3VzZWwgaXMgbG9vcGluZyBhbHNvIHByZWxvYWQgaW1hZ2VzIHRoYXQgYXJlIHRvIHRoZSBcImxlZnRcIlxuXHRcdFx0XHRcdFx0aWYgKHNldHRpbmdzLmxvb3ApIHtcbiAgICAgICAgICAgICAgcG9zaXRpb24gLT0gc2V0dGluZ3MubGF6eUxvYWRFYWdlcjtcbiAgICAgICAgICAgICAgbisrO1xuICAgICAgICAgICAgfVxuXHRcdFx0XHRcdH1cblxuXHRcdFx0XHRcdHdoaWxlIChpKysgPCBuKSB7XG5cdFx0XHRcdFx0XHR0aGlzLmxvYWQoY2xvbmVzIC8gMiArIHRoaXMuX2NvcmUucmVsYXRpdmUocG9zaXRpb24pKTtcblx0XHRcdFx0XHRcdGNsb25lcyAmJiAkLmVhY2godGhpcy5fY29yZS5jbG9uZXModGhpcy5fY29yZS5yZWxhdGl2ZShwb3NpdGlvbikpLCBsb2FkKTtcblx0XHRcdFx0XHRcdHBvc2l0aW9uKys7XG5cdFx0XHRcdFx0fVxuXHRcdFx0XHR9XG5cdFx0XHR9LCB0aGlzKVxuXHRcdH07XG5cblx0XHQvLyBzZXQgdGhlIGRlZmF1bHQgb3B0aW9uc1xuXHRcdHRoaXMuX2NvcmUub3B0aW9ucyA9ICQuZXh0ZW5kKHt9LCBMYXp5LkRlZmF1bHRzLCB0aGlzLl9jb3JlLm9wdGlvbnMpO1xuXG5cdFx0Ly8gcmVnaXN0ZXIgZXZlbnQgaGFuZGxlclxuXHRcdHRoaXMuX2NvcmUuJGVsZW1lbnQub24odGhpcy5faGFuZGxlcnMpO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBEZWZhdWx0IG9wdGlvbnMuXG5cdCAqIEBwdWJsaWNcblx0ICovXG5cdExhenkuRGVmYXVsdHMgPSB7XG5cdFx0bGF6eUxvYWQ6IGZhbHNlLFxuXHRcdGxhenlMb2FkRWFnZXI6IDBcblx0fTtcblxuXHQvKipcblx0ICogTG9hZHMgYWxsIHJlc291cmNlcyBvZiBhbiBpdGVtIGF0IHRoZSBzcGVjaWZpZWQgcG9zaXRpb24uXG5cdCAqIEBwYXJhbSB7TnVtYmVyfSBwb3NpdGlvbiAtIFRoZSBhYnNvbHV0ZSBwb3NpdGlvbiBvZiB0aGUgaXRlbS5cblx0ICogQHByb3RlY3RlZFxuXHQgKi9cblx0TGF6eS5wcm90b3R5cGUubG9hZCA9IGZ1bmN0aW9uKHBvc2l0aW9uKSB7XG5cdFx0dmFyICRpdGVtID0gdGhpcy5fY29yZS4kc3RhZ2UuY2hpbGRyZW4oKS5lcShwb3NpdGlvbiksXG5cdFx0XHQkZWxlbWVudHMgPSAkaXRlbSAmJiAkaXRlbS5maW5kKCcub3dsLWxhenknKTtcblxuXHRcdGlmICghJGVsZW1lbnRzIHx8ICQuaW5BcnJheSgkaXRlbS5nZXQoMCksIHRoaXMuX2xvYWRlZCkgPiAtMSkge1xuXHRcdFx0cmV0dXJuO1xuXHRcdH1cblxuXHRcdCRlbGVtZW50cy5lYWNoKCQucHJveHkoZnVuY3Rpb24oaW5kZXgsIGVsZW1lbnQpIHtcblx0XHRcdHZhciAkZWxlbWVudCA9ICQoZWxlbWVudCksIGltYWdlLFxuICAgICAgICAgICAgICAgIHVybCA9ICh3aW5kb3cuZGV2aWNlUGl4ZWxSYXRpbyA+IDEgJiYgJGVsZW1lbnQuYXR0cignZGF0YS1zcmMtcmV0aW5hJykpIHx8ICRlbGVtZW50LmF0dHIoJ2RhdGEtc3JjJykgfHwgJGVsZW1lbnQuYXR0cignZGF0YS1zcmNzZXQnKTtcblxuXHRcdFx0dGhpcy5fY29yZS50cmlnZ2VyKCdsb2FkJywgeyBlbGVtZW50OiAkZWxlbWVudCwgdXJsOiB1cmwgfSwgJ2xhenknKTtcblxuXHRcdFx0aWYgKCRlbGVtZW50LmlzKCdpbWcnKSkge1xuXHRcdFx0XHQkZWxlbWVudC5vbmUoJ2xvYWQub3dsLmxhenknLCAkLnByb3h5KGZ1bmN0aW9uKCkge1xuXHRcdFx0XHRcdCRlbGVtZW50LmNzcygnb3BhY2l0eScsIDEpO1xuXHRcdFx0XHRcdHRoaXMuX2NvcmUudHJpZ2dlcignbG9hZGVkJywgeyBlbGVtZW50OiAkZWxlbWVudCwgdXJsOiB1cmwgfSwgJ2xhenknKTtcblx0XHRcdFx0fSwgdGhpcykpLmF0dHIoJ3NyYycsIHVybCk7XG4gICAgICAgICAgICB9IGVsc2UgaWYgKCRlbGVtZW50LmlzKCdzb3VyY2UnKSkge1xuICAgICAgICAgICAgICAgICRlbGVtZW50Lm9uZSgnbG9hZC5vd2wubGF6eScsICQucHJveHkoZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAgICAgICAgIHRoaXMuX2NvcmUudHJpZ2dlcignbG9hZGVkJywgeyBlbGVtZW50OiAkZWxlbWVudCwgdXJsOiB1cmwgfSwgJ2xhenknKTtcbiAgICAgICAgICAgICAgICB9LCB0aGlzKSkuYXR0cignc3Jjc2V0JywgdXJsKTtcblx0XHRcdH0gZWxzZSB7XG5cdFx0XHRcdGltYWdlID0gbmV3IEltYWdlKCk7XG5cdFx0XHRcdGltYWdlLm9ubG9hZCA9ICQucHJveHkoZnVuY3Rpb24oKSB7XG5cdFx0XHRcdFx0JGVsZW1lbnQuY3NzKHtcblx0XHRcdFx0XHRcdCdiYWNrZ3JvdW5kLWltYWdlJzogJ3VybChcIicgKyB1cmwgKyAnXCIpJyxcblx0XHRcdFx0XHRcdCdvcGFjaXR5JzogJzEnXG5cdFx0XHRcdFx0fSk7XG5cdFx0XHRcdFx0dGhpcy5fY29yZS50cmlnZ2VyKCdsb2FkZWQnLCB7IGVsZW1lbnQ6ICRlbGVtZW50LCB1cmw6IHVybCB9LCAnbGF6eScpO1xuXHRcdFx0XHR9LCB0aGlzKTtcblx0XHRcdFx0aW1hZ2Uuc3JjID0gdXJsO1xuXHRcdFx0fVxuXHRcdH0sIHRoaXMpKTtcblxuXHRcdHRoaXMuX2xvYWRlZC5wdXNoKCRpdGVtLmdldCgwKSk7XG5cdH07XG5cblx0LyoqXG5cdCAqIERlc3Ryb3lzIHRoZSBwbHVnaW4uXG5cdCAqIEBwdWJsaWNcblx0ICovXG5cdExhenkucHJvdG90eXBlLmRlc3Ryb3kgPSBmdW5jdGlvbigpIHtcblx0XHR2YXIgaGFuZGxlciwgcHJvcGVydHk7XG5cblx0XHRmb3IgKGhhbmRsZXIgaW4gdGhpcy5oYW5kbGVycykge1xuXHRcdFx0dGhpcy5fY29yZS4kZWxlbWVudC5vZmYoaGFuZGxlciwgdGhpcy5oYW5kbGVyc1toYW5kbGVyXSk7XG5cdFx0fVxuXHRcdGZvciAocHJvcGVydHkgaW4gT2JqZWN0LmdldE93blByb3BlcnR5TmFtZXModGhpcykpIHtcblx0XHRcdHR5cGVvZiB0aGlzW3Byb3BlcnR5XSAhPSAnZnVuY3Rpb24nICYmICh0aGlzW3Byb3BlcnR5XSA9IG51bGwpO1xuXHRcdH1cblx0fTtcblxuXHQkLmZuLm93bENhcm91c2VsLkNvbnN0cnVjdG9yLlBsdWdpbnMuTGF6eSA9IExhenk7XG5cbn0pKHdpbmRvdy5aZXB0byB8fCB3aW5kb3cualF1ZXJ5LCB3aW5kb3csIGRvY3VtZW50KTtcblxuLyoqXG4gKiBBdXRvSGVpZ2h0IFBsdWdpblxuICogQHZlcnNpb24gMi4zLjRcbiAqIEBhdXRob3IgQmFydG9zeiBXb2pjaWVjaG93c2tpXG4gKiBAYXV0aG9yIERhdmlkIERldXRzY2hcbiAqIEBsaWNlbnNlIFRoZSBNSVQgTGljZW5zZSAoTUlUKVxuICovXG47KGZ1bmN0aW9uKCQsIHdpbmRvdywgZG9jdW1lbnQsIHVuZGVmaW5lZCkge1xuXG5cdC8qKlxuXHQgKiBDcmVhdGVzIHRoZSBhdXRvIGhlaWdodCBwbHVnaW4uXG5cdCAqIEBjbGFzcyBUaGUgQXV0byBIZWlnaHQgUGx1Z2luXG5cdCAqIEBwYXJhbSB7T3dsfSBjYXJvdXNlbCAtIFRoZSBPd2wgQ2Fyb3VzZWxcblx0ICovXG5cdHZhciBBdXRvSGVpZ2h0ID0gZnVuY3Rpb24oY2Fyb3VzZWwpIHtcblx0XHQvKipcblx0XHQgKiBSZWZlcmVuY2UgdG8gdGhlIGNvcmUuXG5cdFx0ICogQHByb3RlY3RlZFxuXHRcdCAqIEB0eXBlIHtPd2x9XG5cdFx0ICovXG5cdFx0dGhpcy5fY29yZSA9IGNhcm91c2VsO1xuXG5cdFx0dGhpcy5fcHJldmlvdXNIZWlnaHQgPSBudWxsO1xuXG5cdFx0LyoqXG5cdFx0ICogQWxsIGV2ZW50IGhhbmRsZXJzLlxuXHRcdCAqIEBwcm90ZWN0ZWRcblx0XHQgKiBAdHlwZSB7T2JqZWN0fVxuXHRcdCAqL1xuXHRcdHRoaXMuX2hhbmRsZXJzID0ge1xuXHRcdFx0J2luaXRpYWxpemVkLm93bC5jYXJvdXNlbCByZWZyZXNoZWQub3dsLmNhcm91c2VsJzogJC5wcm94eShmdW5jdGlvbihlKSB7XG5cdFx0XHRcdGlmIChlLm5hbWVzcGFjZSAmJiB0aGlzLl9jb3JlLnNldHRpbmdzLmF1dG9IZWlnaHQpIHtcblx0XHRcdFx0XHR0aGlzLnVwZGF0ZSgpO1xuXHRcdFx0XHR9XG5cdFx0XHR9LCB0aGlzKSxcblx0XHRcdCdjaGFuZ2VkLm93bC5jYXJvdXNlbCc6ICQucHJveHkoZnVuY3Rpb24oZSkge1xuXHRcdFx0XHRpZiAoZS5uYW1lc3BhY2UgJiYgdGhpcy5fY29yZS5zZXR0aW5ncy5hdXRvSGVpZ2h0ICYmIGUucHJvcGVydHkubmFtZSA9PT0gJ3Bvc2l0aW9uJyl7XG5cdFx0XHRcdFx0dGhpcy51cGRhdGUoKTtcblx0XHRcdFx0fVxuXHRcdFx0fSwgdGhpcyksXG5cdFx0XHQnbG9hZGVkLm93bC5sYXp5JzogJC5wcm94eShmdW5jdGlvbihlKSB7XG5cdFx0XHRcdGlmIChlLm5hbWVzcGFjZSAmJiB0aGlzLl9jb3JlLnNldHRpbmdzLmF1dG9IZWlnaHRcblx0XHRcdFx0XHQmJiBlLmVsZW1lbnQuY2xvc2VzdCgnLicgKyB0aGlzLl9jb3JlLnNldHRpbmdzLml0ZW1DbGFzcykuaW5kZXgoKSA9PT0gdGhpcy5fY29yZS5jdXJyZW50KCkpIHtcblx0XHRcdFx0XHR0aGlzLnVwZGF0ZSgpO1xuXHRcdFx0XHR9XG5cdFx0XHR9LCB0aGlzKVxuXHRcdH07XG5cblx0XHQvLyBzZXQgZGVmYXVsdCBvcHRpb25zXG5cdFx0dGhpcy5fY29yZS5vcHRpb25zID0gJC5leHRlbmQoe30sIEF1dG9IZWlnaHQuRGVmYXVsdHMsIHRoaXMuX2NvcmUub3B0aW9ucyk7XG5cblx0XHQvLyByZWdpc3RlciBldmVudCBoYW5kbGVyc1xuXHRcdHRoaXMuX2NvcmUuJGVsZW1lbnQub24odGhpcy5faGFuZGxlcnMpO1xuXHRcdHRoaXMuX2ludGVydmFsSWQgPSBudWxsO1xuXHRcdHZhciByZWZUaGlzID0gdGhpcztcblxuXHRcdC8vIFRoZXNlIGNoYW5nZXMgaGF2ZSBiZWVuIHRha2VuIGZyb20gYSBQUiBieSBnYXZyb2NoZWxlZ25vdSBwcm9wb3NlZCBpbiAjMTU3NVxuXHRcdC8vIGFuZCBoYXZlIGJlZW4gbWFkZSBjb21wYXRpYmxlIHdpdGggdGhlIGxhdGVzdCBqUXVlcnkgdmVyc2lvblxuXHRcdCQod2luZG93KS5vbignbG9hZCcsIGZ1bmN0aW9uKCkge1xuXHRcdFx0aWYgKHJlZlRoaXMuX2NvcmUuc2V0dGluZ3MuYXV0b0hlaWdodCkge1xuXHRcdFx0XHRyZWZUaGlzLnVwZGF0ZSgpO1xuXHRcdFx0fVxuXHRcdH0pO1xuXG5cdFx0Ly8gQXV0b3Jlc2l6ZSB0aGUgaGVpZ2h0IG9mIHRoZSBjYXJvdXNlbCB3aGVuIHdpbmRvdyBpcyByZXNpemVkXG5cdFx0Ly8gV2hlbiBjYXJvdXNlbCBoYXMgaW1hZ2VzLCB0aGUgaGVpZ2h0IGlzIGRlcGVuZGVudCBvbiB0aGUgd2lkdGhcblx0XHQvLyBhbmQgc2hvdWxkIGFsc28gY2hhbmdlIG9uIHJlc2l6ZVxuXHRcdCQod2luZG93KS5yZXNpemUoZnVuY3Rpb24oKSB7XG5cdFx0XHRpZiAocmVmVGhpcy5fY29yZS5zZXR0aW5ncy5hdXRvSGVpZ2h0KSB7XG5cdFx0XHRcdGlmIChyZWZUaGlzLl9pbnRlcnZhbElkICE9IG51bGwpIHtcblx0XHRcdFx0XHRjbGVhclRpbWVvdXQocmVmVGhpcy5faW50ZXJ2YWxJZCk7XG5cdFx0XHRcdH1cblxuXHRcdFx0XHRyZWZUaGlzLl9pbnRlcnZhbElkID0gc2V0VGltZW91dChmdW5jdGlvbigpIHtcblx0XHRcdFx0XHRyZWZUaGlzLnVwZGF0ZSgpO1xuXHRcdFx0XHR9LCAyNTApO1xuXHRcdFx0fVxuXHRcdH0pO1xuXG5cdH07XG5cblx0LyoqXG5cdCAqIERlZmF1bHQgb3B0aW9ucy5cblx0ICogQHB1YmxpY1xuXHQgKi9cblx0QXV0b0hlaWdodC5EZWZhdWx0cyA9IHtcblx0XHRhdXRvSGVpZ2h0OiBmYWxzZSxcblx0XHRhdXRvSGVpZ2h0Q2xhc3M6ICdvd2wtaGVpZ2h0J1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBVcGRhdGVzIHRoZSB2aWV3LlxuXHQgKi9cblx0QXV0b0hlaWdodC5wcm90b3R5cGUudXBkYXRlID0gZnVuY3Rpb24oKSB7XG5cdFx0dmFyIHN0YXJ0ID0gdGhpcy5fY29yZS5fY3VycmVudCxcblx0XHRcdGVuZCA9IHN0YXJ0ICsgdGhpcy5fY29yZS5zZXR0aW5ncy5pdGVtcyxcblx0XHRcdGxhenlMb2FkRW5hYmxlZCA9IHRoaXMuX2NvcmUuc2V0dGluZ3MubGF6eUxvYWQsXG5cdFx0XHR2aXNpYmxlID0gdGhpcy5fY29yZS4kc3RhZ2UuY2hpbGRyZW4oKS50b0FycmF5KCkuc2xpY2Uoc3RhcnQsIGVuZCksXG5cdFx0XHRoZWlnaHRzID0gW10sXG5cdFx0XHRtYXhoZWlnaHQgPSAwO1xuXG5cdFx0JC5lYWNoKHZpc2libGUsIGZ1bmN0aW9uKGluZGV4LCBpdGVtKSB7XG5cdFx0XHRoZWlnaHRzLnB1c2goJChpdGVtKS5oZWlnaHQoKSk7XG5cdFx0fSk7XG5cblx0XHRtYXhoZWlnaHQgPSBNYXRoLm1heC5hcHBseShudWxsLCBoZWlnaHRzKTtcblxuXHRcdGlmIChtYXhoZWlnaHQgPD0gMSAmJiBsYXp5TG9hZEVuYWJsZWQgJiYgdGhpcy5fcHJldmlvdXNIZWlnaHQpIHtcblx0XHRcdG1heGhlaWdodCA9IHRoaXMuX3ByZXZpb3VzSGVpZ2h0O1xuXHRcdH1cblxuXHRcdHRoaXMuX3ByZXZpb3VzSGVpZ2h0ID0gbWF4aGVpZ2h0O1xuXG5cdFx0dGhpcy5fY29yZS4kc3RhZ2UucGFyZW50KClcblx0XHRcdC5oZWlnaHQobWF4aGVpZ2h0KVxuXHRcdFx0LmFkZENsYXNzKHRoaXMuX2NvcmUuc2V0dGluZ3MuYXV0b0hlaWdodENsYXNzKTtcblx0fTtcblxuXHRBdXRvSGVpZ2h0LnByb3RvdHlwZS5kZXN0cm95ID0gZnVuY3Rpb24oKSB7XG5cdFx0dmFyIGhhbmRsZXIsIHByb3BlcnR5O1xuXG5cdFx0Zm9yIChoYW5kbGVyIGluIHRoaXMuX2hhbmRsZXJzKSB7XG5cdFx0XHR0aGlzLl9jb3JlLiRlbGVtZW50Lm9mZihoYW5kbGVyLCB0aGlzLl9oYW5kbGVyc1toYW5kbGVyXSk7XG5cdFx0fVxuXHRcdGZvciAocHJvcGVydHkgaW4gT2JqZWN0LmdldE93blByb3BlcnR5TmFtZXModGhpcykpIHtcblx0XHRcdHR5cGVvZiB0aGlzW3Byb3BlcnR5XSAhPT0gJ2Z1bmN0aW9uJyAmJiAodGhpc1twcm9wZXJ0eV0gPSBudWxsKTtcblx0XHR9XG5cdH07XG5cblx0JC5mbi5vd2xDYXJvdXNlbC5Db25zdHJ1Y3Rvci5QbHVnaW5zLkF1dG9IZWlnaHQgPSBBdXRvSGVpZ2h0O1xuXG59KSh3aW5kb3cuWmVwdG8gfHwgd2luZG93LmpRdWVyeSwgd2luZG93LCBkb2N1bWVudCk7XG5cbi8qKlxuICogVmlkZW8gUGx1Z2luXG4gKiBAdmVyc2lvbiAyLjMuNFxuICogQGF1dGhvciBCYXJ0b3N6IFdvamNpZWNob3dza2lcbiAqIEBhdXRob3IgRGF2aWQgRGV1dHNjaFxuICogQGxpY2Vuc2UgVGhlIE1JVCBMaWNlbnNlIChNSVQpXG4gKi9cbjsoZnVuY3Rpb24oJCwgd2luZG93LCBkb2N1bWVudCwgdW5kZWZpbmVkKSB7XG5cblx0LyoqXG5cdCAqIENyZWF0ZXMgdGhlIHZpZGVvIHBsdWdpbi5cblx0ICogQGNsYXNzIFRoZSBWaWRlbyBQbHVnaW5cblx0ICogQHBhcmFtIHtPd2x9IGNhcm91c2VsIC0gVGhlIE93bCBDYXJvdXNlbFxuXHQgKi9cblx0dmFyIFZpZGVvID0gZnVuY3Rpb24oY2Fyb3VzZWwpIHtcblx0XHQvKipcblx0XHQgKiBSZWZlcmVuY2UgdG8gdGhlIGNvcmUuXG5cdFx0ICogQHByb3RlY3RlZFxuXHRcdCAqIEB0eXBlIHtPd2x9XG5cdFx0ICovXG5cdFx0dGhpcy5fY29yZSA9IGNhcm91c2VsO1xuXG5cdFx0LyoqXG5cdFx0ICogQ2FjaGUgYWxsIHZpZGVvIFVSTHMuXG5cdFx0ICogQHByb3RlY3RlZFxuXHRcdCAqIEB0eXBlIHtPYmplY3R9XG5cdFx0ICovXG5cdFx0dGhpcy5fdmlkZW9zID0ge307XG5cblx0XHQvKipcblx0XHQgKiBDdXJyZW50IHBsYXlpbmcgaXRlbS5cblx0XHQgKiBAcHJvdGVjdGVkXG5cdFx0ICogQHR5cGUge2pRdWVyeX1cblx0XHQgKi9cblx0XHR0aGlzLl9wbGF5aW5nID0gbnVsbDtcblxuXHRcdC8qKlxuXHRcdCAqIEFsbCBldmVudCBoYW5kbGVycy5cblx0XHQgKiBAdG9kbyBUaGUgY2xvbmVkIGNvbnRlbnQgcmVtb3ZhbGUgaXMgdG9vIGxhdGVcblx0XHQgKiBAcHJvdGVjdGVkXG5cdFx0ICogQHR5cGUge09iamVjdH1cblx0XHQgKi9cblx0XHR0aGlzLl9oYW5kbGVycyA9IHtcblx0XHRcdCdpbml0aWFsaXplZC5vd2wuY2Fyb3VzZWwnOiAkLnByb3h5KGZ1bmN0aW9uKGUpIHtcblx0XHRcdFx0aWYgKGUubmFtZXNwYWNlKSB7XG5cdFx0XHRcdFx0dGhpcy5fY29yZS5yZWdpc3Rlcih7IHR5cGU6ICdzdGF0ZScsIG5hbWU6ICdwbGF5aW5nJywgdGFnczogWyAnaW50ZXJhY3RpbmcnIF0gfSk7XG5cdFx0XHRcdH1cblx0XHRcdH0sIHRoaXMpLFxuXHRcdFx0J3Jlc2l6ZS5vd2wuY2Fyb3VzZWwnOiAkLnByb3h5KGZ1bmN0aW9uKGUpIHtcblx0XHRcdFx0aWYgKGUubmFtZXNwYWNlICYmIHRoaXMuX2NvcmUuc2V0dGluZ3MudmlkZW8gJiYgdGhpcy5pc0luRnVsbFNjcmVlbigpKSB7XG5cdFx0XHRcdFx0ZS5wcmV2ZW50RGVmYXVsdCgpO1xuXHRcdFx0XHR9XG5cdFx0XHR9LCB0aGlzKSxcblx0XHRcdCdyZWZyZXNoZWQub3dsLmNhcm91c2VsJzogJC5wcm94eShmdW5jdGlvbihlKSB7XG5cdFx0XHRcdGlmIChlLm5hbWVzcGFjZSAmJiB0aGlzLl9jb3JlLmlzKCdyZXNpemluZycpKSB7XG5cdFx0XHRcdFx0dGhpcy5fY29yZS4kc3RhZ2UuZmluZCgnLmNsb25lZCAub3dsLXZpZGVvLWZyYW1lJykucmVtb3ZlKCk7XG5cdFx0XHRcdH1cblx0XHRcdH0sIHRoaXMpLFxuXHRcdFx0J2NoYW5nZWQub3dsLmNhcm91c2VsJzogJC5wcm94eShmdW5jdGlvbihlKSB7XG5cdFx0XHRcdGlmIChlLm5hbWVzcGFjZSAmJiBlLnByb3BlcnR5Lm5hbWUgPT09ICdwb3NpdGlvbicgJiYgdGhpcy5fcGxheWluZykge1xuXHRcdFx0XHRcdHRoaXMuc3RvcCgpO1xuXHRcdFx0XHR9XG5cdFx0XHR9LCB0aGlzKSxcblx0XHRcdCdwcmVwYXJlZC5vd2wuY2Fyb3VzZWwnOiAkLnByb3h5KGZ1bmN0aW9uKGUpIHtcblx0XHRcdFx0aWYgKCFlLm5hbWVzcGFjZSkge1xuXHRcdFx0XHRcdHJldHVybjtcblx0XHRcdFx0fVxuXG5cdFx0XHRcdHZhciAkZWxlbWVudCA9ICQoZS5jb250ZW50KS5maW5kKCcub3dsLXZpZGVvJyk7XG5cblx0XHRcdFx0aWYgKCRlbGVtZW50Lmxlbmd0aCkge1xuXHRcdFx0XHRcdCRlbGVtZW50LmNzcygnZGlzcGxheScsICdub25lJyk7XG5cdFx0XHRcdFx0dGhpcy5mZXRjaCgkZWxlbWVudCwgJChlLmNvbnRlbnQpKTtcblx0XHRcdFx0fVxuXHRcdFx0fSwgdGhpcylcblx0XHR9O1xuXG5cdFx0Ly8gc2V0IGRlZmF1bHQgb3B0aW9uc1xuXHRcdHRoaXMuX2NvcmUub3B0aW9ucyA9ICQuZXh0ZW5kKHt9LCBWaWRlby5EZWZhdWx0cywgdGhpcy5fY29yZS5vcHRpb25zKTtcblxuXHRcdC8vIHJlZ2lzdGVyIGV2ZW50IGhhbmRsZXJzXG5cdFx0dGhpcy5fY29yZS4kZWxlbWVudC5vbih0aGlzLl9oYW5kbGVycyk7XG5cblx0XHR0aGlzLl9jb3JlLiRlbGVtZW50Lm9uKCdjbGljay5vd2wudmlkZW8nLCAnLm93bC12aWRlby1wbGF5LWljb24nLCAkLnByb3h5KGZ1bmN0aW9uKGUpIHtcblx0XHRcdHRoaXMucGxheShlKTtcblx0XHR9LCB0aGlzKSk7XG5cdH07XG5cblx0LyoqXG5cdCAqIERlZmF1bHQgb3B0aW9ucy5cblx0ICogQHB1YmxpY1xuXHQgKi9cblx0VmlkZW8uRGVmYXVsdHMgPSB7XG5cdFx0dmlkZW86IGZhbHNlLFxuXHRcdHZpZGVvSGVpZ2h0OiBmYWxzZSxcblx0XHR2aWRlb1dpZHRoOiBmYWxzZVxuXHR9O1xuXG5cdC8qKlxuXHQgKiBHZXRzIHRoZSB2aWRlbyBJRCBhbmQgdGhlIHR5cGUgKFlvdVR1YmUvVmltZW8vdnphYXIgb25seSkuXG5cdCAqIEBwcm90ZWN0ZWRcblx0ICogQHBhcmFtIHtqUXVlcnl9IHRhcmdldCAtIFRoZSB0YXJnZXQgY29udGFpbmluZyB0aGUgdmlkZW8gZGF0YS5cblx0ICogQHBhcmFtIHtqUXVlcnl9IGl0ZW0gLSBUaGUgaXRlbSBjb250YWluaW5nIHRoZSB2aWRlby5cblx0ICovXG5cdFZpZGVvLnByb3RvdHlwZS5mZXRjaCA9IGZ1bmN0aW9uKHRhcmdldCwgaXRlbSkge1xuXHRcdFx0dmFyIHR5cGUgPSAoZnVuY3Rpb24oKSB7XG5cdFx0XHRcdFx0aWYgKHRhcmdldC5hdHRyKCdkYXRhLXZpbWVvLWlkJykpIHtcblx0XHRcdFx0XHRcdHJldHVybiAndmltZW8nO1xuXHRcdFx0XHRcdH0gZWxzZSBpZiAodGFyZ2V0LmF0dHIoJ2RhdGEtdnphYXItaWQnKSkge1xuXHRcdFx0XHRcdFx0cmV0dXJuICd2emFhcidcblx0XHRcdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRcdFx0cmV0dXJuICd5b3V0dWJlJztcblx0XHRcdFx0XHR9XG5cdFx0XHRcdH0pKCksXG5cdFx0XHRcdGlkID0gdGFyZ2V0LmF0dHIoJ2RhdGEtdmltZW8taWQnKSB8fCB0YXJnZXQuYXR0cignZGF0YS15b3V0dWJlLWlkJykgfHwgdGFyZ2V0LmF0dHIoJ2RhdGEtdnphYXItaWQnKSxcblx0XHRcdFx0d2lkdGggPSB0YXJnZXQuYXR0cignZGF0YS13aWR0aCcpIHx8IHRoaXMuX2NvcmUuc2V0dGluZ3MudmlkZW9XaWR0aCxcblx0XHRcdFx0aGVpZ2h0ID0gdGFyZ2V0LmF0dHIoJ2RhdGEtaGVpZ2h0JykgfHwgdGhpcy5fY29yZS5zZXR0aW5ncy52aWRlb0hlaWdodCxcblx0XHRcdFx0dXJsID0gdGFyZ2V0LmF0dHIoJ2hyZWYnKTtcblxuXHRcdGlmICh1cmwpIHtcblxuXHRcdFx0Lypcblx0XHRcdFx0XHRQYXJzZXMgdGhlIGlkJ3Mgb3V0IG9mIHRoZSBmb2xsb3dpbmcgdXJscyAoYW5kIHByb2JhYmx5IG1vcmUpOlxuXHRcdFx0XHRcdGh0dHBzOi8vd3d3LnlvdXR1YmUuY29tL3dhdGNoP3Y9OmlkXG5cdFx0XHRcdFx0aHR0cHM6Ly95b3V0dS5iZS86aWRcblx0XHRcdFx0XHRodHRwczovL3ZpbWVvLmNvbS86aWRcblx0XHRcdFx0XHRodHRwczovL3ZpbWVvLmNvbS9jaGFubmVscy86Y2hhbm5lbC86aWRcblx0XHRcdFx0XHRodHRwczovL3ZpbWVvLmNvbS9ncm91cHMvOmdyb3VwL3ZpZGVvcy86aWRcblx0XHRcdFx0XHRodHRwczovL2FwcC52emFhci5jb20vdmlkZW9zLzppZFxuXG5cdFx0XHRcdFx0VmlzdWFsIGV4YW1wbGU6IGh0dHBzOi8vcmVnZXhwZXIuY29tLyMoaHR0cCUzQSU3Q2h0dHBzJTNBJTdDKSU1QyUyRiU1QyUyRihwbGF5ZXIuJTdDd3d3LiU3Q2FwcC4pJTNGKHZpbWVvJTVDLmNvbSU3Q3lvdXR1KGJlJTVDLmNvbSU3QyU1Qy5iZSU3Q2JlJTVDLmdvb2dsZWFwaXMlNUMuY29tKSU3Q3Z6YWFyJTVDLmNvbSklNUMlMkYodmlkZW8lNUMlMkYlN0N2aWRlb3MlNUMlMkYlN0NlbWJlZCU1QyUyRiU3Q2NoYW5uZWxzJTVDJTJGLiUyQiU1QyUyRiU3Q2dyb3VwcyU1QyUyRi4lMkIlNUMlMkYlN0N3YXRjaCU1QyUzRnYlM0QlN0N2JTVDJTJGKSUzRiglNUJBLVphLXowLTkuXyUyNS0lNUQqKSglNUMlMjYlNUNTJTJCKSUzRlxuXHRcdFx0Ki9cblxuXHRcdFx0aWQgPSB1cmwubWF0Y2goLyhodHRwOnxodHRwczp8KVxcL1xcLyhwbGF5ZXIufHd3dy58YXBwLik/KHZpbWVvXFwuY29tfHlvdXR1KGJlXFwuY29tfFxcLmJlfGJlXFwuZ29vZ2xlYXBpc1xcLmNvbXxiZVxcLW5vY29va2llXFwuY29tKXx2emFhclxcLmNvbSlcXC8odmlkZW9cXC98dmlkZW9zXFwvfGVtYmVkXFwvfGNoYW5uZWxzXFwvLitcXC98Z3JvdXBzXFwvLitcXC98d2F0Y2hcXD92PXx2XFwvKT8oW0EtWmEtejAtOS5fJS1dKikoXFwmXFxTKyk/Lyk7XG5cblx0XHRcdGlmIChpZFszXS5pbmRleE9mKCd5b3V0dScpID4gLTEpIHtcblx0XHRcdFx0dHlwZSA9ICd5b3V0dWJlJztcblx0XHRcdH0gZWxzZSBpZiAoaWRbM10uaW5kZXhPZigndmltZW8nKSA+IC0xKSB7XG5cdFx0XHRcdHR5cGUgPSAndmltZW8nO1xuXHRcdFx0fSBlbHNlIGlmIChpZFszXS5pbmRleE9mKCd2emFhcicpID4gLTEpIHtcblx0XHRcdFx0dHlwZSA9ICd2emFhcic7XG5cdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHR0aHJvdyBuZXcgRXJyb3IoJ1ZpZGVvIFVSTCBub3Qgc3VwcG9ydGVkLicpO1xuXHRcdFx0fVxuXHRcdFx0aWQgPSBpZFs2XTtcblx0XHR9IGVsc2Uge1xuXHRcdFx0dGhyb3cgbmV3IEVycm9yKCdNaXNzaW5nIHZpZGVvIFVSTC4nKTtcblx0XHR9XG5cblx0XHR0aGlzLl92aWRlb3NbdXJsXSA9IHtcblx0XHRcdHR5cGU6IHR5cGUsXG5cdFx0XHRpZDogaWQsXG5cdFx0XHR3aWR0aDogd2lkdGgsXG5cdFx0XHRoZWlnaHQ6IGhlaWdodFxuXHRcdH07XG5cblx0XHRpdGVtLmF0dHIoJ2RhdGEtdmlkZW8nLCB1cmwpO1xuXG5cdFx0dGhpcy50aHVtYm5haWwodGFyZ2V0LCB0aGlzLl92aWRlb3NbdXJsXSk7XG5cdH07XG5cblx0LyoqXG5cdCAqIENyZWF0ZXMgdmlkZW8gdGh1bWJuYWlsLlxuXHQgKiBAcHJvdGVjdGVkXG5cdCAqIEBwYXJhbSB7alF1ZXJ5fSB0YXJnZXQgLSBUaGUgdGFyZ2V0IGNvbnRhaW5pbmcgdGhlIHZpZGVvIGRhdGEuXG5cdCAqIEBwYXJhbSB7T2JqZWN0fSBpbmZvIC0gVGhlIHZpZGVvIGluZm8gb2JqZWN0LlxuXHQgKiBAc2VlIGBmZXRjaGBcblx0ICovXG5cdFZpZGVvLnByb3RvdHlwZS50aHVtYm5haWwgPSBmdW5jdGlvbih0YXJnZXQsIHZpZGVvKSB7XG5cdFx0dmFyIHRuTGluayxcblx0XHRcdGljb24sXG5cdFx0XHRwYXRoLFxuXHRcdFx0ZGltZW5zaW9ucyA9IHZpZGVvLndpZHRoICYmIHZpZGVvLmhlaWdodCA/ICd3aWR0aDonICsgdmlkZW8ud2lkdGggKyAncHg7aGVpZ2h0OicgKyB2aWRlby5oZWlnaHQgKyAncHg7JyA6ICcnLFxuXHRcdFx0Y3VzdG9tVG4gPSB0YXJnZXQuZmluZCgnaW1nJyksXG5cdFx0XHRzcmNUeXBlID0gJ3NyYycsXG5cdFx0XHRsYXp5Q2xhc3MgPSAnJyxcblx0XHRcdHNldHRpbmdzID0gdGhpcy5fY29yZS5zZXR0aW5ncyxcblx0XHRcdGNyZWF0ZSA9IGZ1bmN0aW9uKHBhdGgpIHtcblx0XHRcdFx0aWNvbiA9ICc8ZGl2IGNsYXNzPVwib3dsLXZpZGVvLXBsYXktaWNvblwiPjwvZGl2Pic7XG5cblx0XHRcdFx0aWYgKHNldHRpbmdzLmxhenlMb2FkKSB7XG5cdFx0XHRcdFx0dG5MaW5rID0gJCgnPGRpdi8+Jyx7XG5cdFx0XHRcdFx0XHRcImNsYXNzXCI6ICdvd2wtdmlkZW8tdG4gJyArIGxhenlDbGFzcyxcblx0XHRcdFx0XHRcdFwic3JjVHlwZVwiOiBwYXRoXG5cdFx0XHRcdFx0fSk7XG5cdFx0XHRcdH0gZWxzZSB7XG5cdFx0XHRcdFx0dG5MaW5rID0gJCggJzxkaXYvPicsIHtcblx0XHRcdFx0XHRcdFwiY2xhc3NcIjogXCJvd2wtdmlkZW8tdG5cIixcblx0XHRcdFx0XHRcdFwic3R5bGVcIjogJ29wYWNpdHk6MTtiYWNrZ3JvdW5kLWltYWdlOnVybCgnICsgcGF0aCArICcpJ1xuXHRcdFx0XHRcdH0pO1xuXHRcdFx0XHR9XG5cdFx0XHRcdHRhcmdldC5hZnRlcih0bkxpbmspO1xuXHRcdFx0XHR0YXJnZXQuYWZ0ZXIoaWNvbik7XG5cdFx0XHR9O1xuXG5cdFx0Ly8gd3JhcCB2aWRlbyBjb250ZW50IGludG8gb3dsLXZpZGVvLXdyYXBwZXIgZGl2XG5cdFx0dGFyZ2V0LndyYXAoICQoICc8ZGl2Lz4nLCB7XG5cdFx0XHRcImNsYXNzXCI6IFwib3dsLXZpZGVvLXdyYXBwZXJcIixcblx0XHRcdFwic3R5bGVcIjogZGltZW5zaW9uc1xuXHRcdH0pKTtcblxuXHRcdGlmICh0aGlzLl9jb3JlLnNldHRpbmdzLmxhenlMb2FkKSB7XG5cdFx0XHRzcmNUeXBlID0gJ2RhdGEtc3JjJztcblx0XHRcdGxhenlDbGFzcyA9ICdvd2wtbGF6eSc7XG5cdFx0fVxuXG5cdFx0Ly8gY3VzdG9tIHRodW1ibmFpbFxuXHRcdGlmIChjdXN0b21Ubi5sZW5ndGgpIHtcblx0XHRcdGNyZWF0ZShjdXN0b21Ubi5hdHRyKHNyY1R5cGUpKTtcblx0XHRcdGN1c3RvbVRuLnJlbW92ZSgpO1xuXHRcdFx0cmV0dXJuIGZhbHNlO1xuXHRcdH1cblxuXHRcdGlmICh2aWRlby50eXBlID09PSAneW91dHViZScpIHtcblx0XHRcdHBhdGggPSBcIi8vaW1nLnlvdXR1YmUuY29tL3ZpL1wiICsgdmlkZW8uaWQgKyBcIi9ocWRlZmF1bHQuanBnXCI7XG5cdFx0XHRjcmVhdGUocGF0aCk7XG5cdFx0fSBlbHNlIGlmICh2aWRlby50eXBlID09PSAndmltZW8nKSB7XG5cdFx0XHQkLmFqYXgoe1xuXHRcdFx0XHR0eXBlOiAnR0VUJyxcblx0XHRcdFx0dXJsOiAnLy92aW1lby5jb20vYXBpL3YyL3ZpZGVvLycgKyB2aWRlby5pZCArICcuanNvbicsXG5cdFx0XHRcdGpzb25wOiAnY2FsbGJhY2snLFxuXHRcdFx0XHRkYXRhVHlwZTogJ2pzb25wJyxcblx0XHRcdFx0c3VjY2VzczogZnVuY3Rpb24oZGF0YSkge1xuXHRcdFx0XHRcdHBhdGggPSBkYXRhWzBdLnRodW1ibmFpbF9sYXJnZTtcblx0XHRcdFx0XHRjcmVhdGUocGF0aCk7XG5cdFx0XHRcdH1cblx0XHRcdH0pO1xuXHRcdH0gZWxzZSBpZiAodmlkZW8udHlwZSA9PT0gJ3Z6YWFyJykge1xuXHRcdFx0JC5hamF4KHtcblx0XHRcdFx0dHlwZTogJ0dFVCcsXG5cdFx0XHRcdHVybDogJy8vdnphYXIuY29tL2FwaS92aWRlb3MvJyArIHZpZGVvLmlkICsgJy5qc29uJyxcblx0XHRcdFx0anNvbnA6ICdjYWxsYmFjaycsXG5cdFx0XHRcdGRhdGFUeXBlOiAnanNvbnAnLFxuXHRcdFx0XHRzdWNjZXNzOiBmdW5jdGlvbihkYXRhKSB7XG5cdFx0XHRcdFx0cGF0aCA9IGRhdGEuZnJhbWVncmFiX3VybDtcblx0XHRcdFx0XHRjcmVhdGUocGF0aCk7XG5cdFx0XHRcdH1cblx0XHRcdH0pO1xuXHRcdH1cblx0fTtcblxuXHQvKipcblx0ICogU3RvcHMgdGhlIGN1cnJlbnQgdmlkZW8uXG5cdCAqIEBwdWJsaWNcblx0ICovXG5cdFZpZGVvLnByb3RvdHlwZS5zdG9wID0gZnVuY3Rpb24oKSB7XG5cdFx0dGhpcy5fY29yZS50cmlnZ2VyKCdzdG9wJywgbnVsbCwgJ3ZpZGVvJyk7XG5cdFx0dGhpcy5fcGxheWluZy5maW5kKCcub3dsLXZpZGVvLWZyYW1lJykucmVtb3ZlKCk7XG5cdFx0dGhpcy5fcGxheWluZy5yZW1vdmVDbGFzcygnb3dsLXZpZGVvLXBsYXlpbmcnKTtcblx0XHR0aGlzLl9wbGF5aW5nID0gbnVsbDtcblx0XHR0aGlzLl9jb3JlLmxlYXZlKCdwbGF5aW5nJyk7XG5cdFx0dGhpcy5fY29yZS50cmlnZ2VyKCdzdG9wcGVkJywgbnVsbCwgJ3ZpZGVvJyk7XG5cdH07XG5cblx0LyoqXG5cdCAqIFN0YXJ0cyB0aGUgY3VycmVudCB2aWRlby5cblx0ICogQHB1YmxpY1xuXHQgKiBAcGFyYW0ge0V2ZW50fSBldmVudCAtIFRoZSBldmVudCBhcmd1bWVudHMuXG5cdCAqL1xuXHRWaWRlby5wcm90b3R5cGUucGxheSA9IGZ1bmN0aW9uKGV2ZW50KSB7XG5cdFx0dmFyIHRhcmdldCA9ICQoZXZlbnQudGFyZ2V0KSxcblx0XHRcdGl0ZW0gPSB0YXJnZXQuY2xvc2VzdCgnLicgKyB0aGlzLl9jb3JlLnNldHRpbmdzLml0ZW1DbGFzcyksXG5cdFx0XHR2aWRlbyA9IHRoaXMuX3ZpZGVvc1tpdGVtLmF0dHIoJ2RhdGEtdmlkZW8nKV0sXG5cdFx0XHR3aWR0aCA9IHZpZGVvLndpZHRoIHx8ICcxMDAlJyxcblx0XHRcdGhlaWdodCA9IHZpZGVvLmhlaWdodCB8fCB0aGlzLl9jb3JlLiRzdGFnZS5oZWlnaHQoKSxcblx0XHRcdGh0bWwsXG5cdFx0XHRpZnJhbWU7XG5cblx0XHRpZiAodGhpcy5fcGxheWluZykge1xuXHRcdFx0cmV0dXJuO1xuXHRcdH1cblxuXHRcdHRoaXMuX2NvcmUuZW50ZXIoJ3BsYXlpbmcnKTtcblx0XHR0aGlzLl9jb3JlLnRyaWdnZXIoJ3BsYXknLCBudWxsLCAndmlkZW8nKTtcblxuXHRcdGl0ZW0gPSB0aGlzLl9jb3JlLml0ZW1zKHRoaXMuX2NvcmUucmVsYXRpdmUoaXRlbS5pbmRleCgpKSk7XG5cblx0XHR0aGlzLl9jb3JlLnJlc2V0KGl0ZW0uaW5kZXgoKSk7XG5cblx0XHRodG1sID0gJCggJzxpZnJhbWUgZnJhbWVib3JkZXI9XCIwXCIgYWxsb3dmdWxsc2NyZWVuIG1vemFsbG93ZnVsbHNjcmVlbiB3ZWJraXRBbGxvd0Z1bGxTY3JlZW4gPjwvaWZyYW1lPicgKTtcblx0XHRodG1sLmF0dHIoICdoZWlnaHQnLCBoZWlnaHQgKTtcblx0XHRodG1sLmF0dHIoICd3aWR0aCcsIHdpZHRoICk7XG5cdFx0aWYgKHZpZGVvLnR5cGUgPT09ICd5b3V0dWJlJykge1xuXHRcdFx0aHRtbC5hdHRyKCAnc3JjJywgJy8vd3d3LnlvdXR1YmUuY29tL2VtYmVkLycgKyB2aWRlby5pZCArICc/YXV0b3BsYXk9MSZyZWw9MCZ2PScgKyB2aWRlby5pZCApO1xuXHRcdH0gZWxzZSBpZiAodmlkZW8udHlwZSA9PT0gJ3ZpbWVvJykge1xuXHRcdFx0aHRtbC5hdHRyKCAnc3JjJywgJy8vcGxheWVyLnZpbWVvLmNvbS92aWRlby8nICsgdmlkZW8uaWQgKyAnP2F1dG9wbGF5PTEnICk7XG5cdFx0fSBlbHNlIGlmICh2aWRlby50eXBlID09PSAndnphYXInKSB7XG5cdFx0XHRodG1sLmF0dHIoICdzcmMnLCAnLy92aWV3LnZ6YWFyLmNvbS8nICsgdmlkZW8uaWQgKyAnL3BsYXllcj9hdXRvcGxheT10cnVlJyApO1xuXHRcdH1cblxuXHRcdGlmcmFtZSA9ICQoaHRtbCkud3JhcCggJzxkaXYgY2xhc3M9XCJvd2wtdmlkZW8tZnJhbWVcIiAvPicgKS5pbnNlcnRBZnRlcihpdGVtLmZpbmQoJy5vd2wtdmlkZW8nKSk7XG5cblx0XHR0aGlzLl9wbGF5aW5nID0gaXRlbS5hZGRDbGFzcygnb3dsLXZpZGVvLXBsYXlpbmcnKTtcblx0fTtcblxuXHQvKipcblx0ICogQ2hlY2tzIHdoZXRoZXIgYW4gdmlkZW8gaXMgY3VycmVudGx5IGluIGZ1bGwgc2NyZWVuIG1vZGUgb3Igbm90LlxuXHQgKiBAdG9kbyBCYWQgc3R5bGUgYmVjYXVzZSBsb29rcyBsaWtlIGEgcmVhZG9ubHkgbWV0aG9kIGJ1dCBjaGFuZ2VzIG1lbWJlcnMuXG5cdCAqIEBwcm90ZWN0ZWRcblx0ICogQHJldHVybnMge0Jvb2xlYW59XG5cdCAqL1xuXHRWaWRlby5wcm90b3R5cGUuaXNJbkZ1bGxTY3JlZW4gPSBmdW5jdGlvbigpIHtcblx0XHR2YXIgZWxlbWVudCA9IGRvY3VtZW50LmZ1bGxzY3JlZW5FbGVtZW50IHx8IGRvY3VtZW50Lm1vekZ1bGxTY3JlZW5FbGVtZW50IHx8XG5cdFx0XHRcdGRvY3VtZW50LndlYmtpdEZ1bGxzY3JlZW5FbGVtZW50O1xuXG5cdFx0cmV0dXJuIGVsZW1lbnQgJiYgJChlbGVtZW50KS5wYXJlbnQoKS5oYXNDbGFzcygnb3dsLXZpZGVvLWZyYW1lJyk7XG5cdH07XG5cblx0LyoqXG5cdCAqIERlc3Ryb3lzIHRoZSBwbHVnaW4uXG5cdCAqL1xuXHRWaWRlby5wcm90b3R5cGUuZGVzdHJveSA9IGZ1bmN0aW9uKCkge1xuXHRcdHZhciBoYW5kbGVyLCBwcm9wZXJ0eTtcblxuXHRcdHRoaXMuX2NvcmUuJGVsZW1lbnQub2ZmKCdjbGljay5vd2wudmlkZW8nKTtcblxuXHRcdGZvciAoaGFuZGxlciBpbiB0aGlzLl9oYW5kbGVycykge1xuXHRcdFx0dGhpcy5fY29yZS4kZWxlbWVudC5vZmYoaGFuZGxlciwgdGhpcy5faGFuZGxlcnNbaGFuZGxlcl0pO1xuXHRcdH1cblx0XHRmb3IgKHByb3BlcnR5IGluIE9iamVjdC5nZXRPd25Qcm9wZXJ0eU5hbWVzKHRoaXMpKSB7XG5cdFx0XHR0eXBlb2YgdGhpc1twcm9wZXJ0eV0gIT0gJ2Z1bmN0aW9uJyAmJiAodGhpc1twcm9wZXJ0eV0gPSBudWxsKTtcblx0XHR9XG5cdH07XG5cblx0JC5mbi5vd2xDYXJvdXNlbC5Db25zdHJ1Y3Rvci5QbHVnaW5zLlZpZGVvID0gVmlkZW87XG5cbn0pKHdpbmRvdy5aZXB0byB8fCB3aW5kb3cualF1ZXJ5LCB3aW5kb3csIGRvY3VtZW50KTtcblxuLyoqXG4gKiBBbmltYXRlIFBsdWdpblxuICogQHZlcnNpb24gMi4zLjRcbiAqIEBhdXRob3IgQmFydG9zeiBXb2pjaWVjaG93c2tpXG4gKiBAYXV0aG9yIERhdmlkIERldXRzY2hcbiAqIEBsaWNlbnNlIFRoZSBNSVQgTGljZW5zZSAoTUlUKVxuICovXG47KGZ1bmN0aW9uKCQsIHdpbmRvdywgZG9jdW1lbnQsIHVuZGVmaW5lZCkge1xuXG5cdC8qKlxuXHQgKiBDcmVhdGVzIHRoZSBhbmltYXRlIHBsdWdpbi5cblx0ICogQGNsYXNzIFRoZSBOYXZpZ2F0aW9uIFBsdWdpblxuXHQgKiBAcGFyYW0ge093bH0gc2NvcGUgLSBUaGUgT3dsIENhcm91c2VsXG5cdCAqL1xuXHR2YXIgQW5pbWF0ZSA9IGZ1bmN0aW9uKHNjb3BlKSB7XG5cdFx0dGhpcy5jb3JlID0gc2NvcGU7XG5cdFx0dGhpcy5jb3JlLm9wdGlvbnMgPSAkLmV4dGVuZCh7fSwgQW5pbWF0ZS5EZWZhdWx0cywgdGhpcy5jb3JlLm9wdGlvbnMpO1xuXHRcdHRoaXMuc3dhcHBpbmcgPSB0cnVlO1xuXHRcdHRoaXMucHJldmlvdXMgPSB1bmRlZmluZWQ7XG5cdFx0dGhpcy5uZXh0ID0gdW5kZWZpbmVkO1xuXG5cdFx0dGhpcy5oYW5kbGVycyA9IHtcblx0XHRcdCdjaGFuZ2Uub3dsLmNhcm91c2VsJzogJC5wcm94eShmdW5jdGlvbihlKSB7XG5cdFx0XHRcdGlmIChlLm5hbWVzcGFjZSAmJiBlLnByb3BlcnR5Lm5hbWUgPT0gJ3Bvc2l0aW9uJykge1xuXHRcdFx0XHRcdHRoaXMucHJldmlvdXMgPSB0aGlzLmNvcmUuY3VycmVudCgpO1xuXHRcdFx0XHRcdHRoaXMubmV4dCA9IGUucHJvcGVydHkudmFsdWU7XG5cdFx0XHRcdH1cblx0XHRcdH0sIHRoaXMpLFxuXHRcdFx0J2RyYWcub3dsLmNhcm91c2VsIGRyYWdnZWQub3dsLmNhcm91c2VsIHRyYW5zbGF0ZWQub3dsLmNhcm91c2VsJzogJC5wcm94eShmdW5jdGlvbihlKSB7XG5cdFx0XHRcdGlmIChlLm5hbWVzcGFjZSkge1xuXHRcdFx0XHRcdHRoaXMuc3dhcHBpbmcgPSBlLnR5cGUgPT0gJ3RyYW5zbGF0ZWQnO1xuXHRcdFx0XHR9XG5cdFx0XHR9LCB0aGlzKSxcblx0XHRcdCd0cmFuc2xhdGUub3dsLmNhcm91c2VsJzogJC5wcm94eShmdW5jdGlvbihlKSB7XG5cdFx0XHRcdGlmIChlLm5hbWVzcGFjZSAmJiB0aGlzLnN3YXBwaW5nICYmICh0aGlzLmNvcmUub3B0aW9ucy5hbmltYXRlT3V0IHx8IHRoaXMuY29yZS5vcHRpb25zLmFuaW1hdGVJbikpIHtcblx0XHRcdFx0XHR0aGlzLnN3YXAoKTtcblx0XHRcdFx0fVxuXHRcdFx0fSwgdGhpcylcblx0XHR9O1xuXG5cdFx0dGhpcy5jb3JlLiRlbGVtZW50Lm9uKHRoaXMuaGFuZGxlcnMpO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBEZWZhdWx0IG9wdGlvbnMuXG5cdCAqIEBwdWJsaWNcblx0ICovXG5cdEFuaW1hdGUuRGVmYXVsdHMgPSB7XG5cdFx0YW5pbWF0ZU91dDogZmFsc2UsXG5cdFx0YW5pbWF0ZUluOiBmYWxzZVxuXHR9O1xuXG5cdC8qKlxuXHQgKiBUb2dnbGVzIHRoZSBhbmltYXRpb24gY2xhc3NlcyB3aGVuZXZlciBhbiB0cmFuc2xhdGlvbnMgc3RhcnRzLlxuXHQgKiBAcHJvdGVjdGVkXG5cdCAqIEByZXR1cm5zIHtCb29sZWFufHVuZGVmaW5lZH1cblx0ICovXG5cdEFuaW1hdGUucHJvdG90eXBlLnN3YXAgPSBmdW5jdGlvbigpIHtcblxuXHRcdGlmICh0aGlzLmNvcmUuc2V0dGluZ3MuaXRlbXMgIT09IDEpIHtcblx0XHRcdHJldHVybjtcblx0XHR9XG5cblx0XHRpZiAoISQuc3VwcG9ydC5hbmltYXRpb24gfHwgISQuc3VwcG9ydC50cmFuc2l0aW9uKSB7XG5cdFx0XHRyZXR1cm47XG5cdFx0fVxuXG5cdFx0dGhpcy5jb3JlLnNwZWVkKDApO1xuXG5cdFx0dmFyIGxlZnQsXG5cdFx0XHRjbGVhciA9ICQucHJveHkodGhpcy5jbGVhciwgdGhpcyksXG5cdFx0XHRwcmV2aW91cyA9IHRoaXMuY29yZS4kc3RhZ2UuY2hpbGRyZW4oKS5lcSh0aGlzLnByZXZpb3VzKSxcblx0XHRcdG5leHQgPSB0aGlzLmNvcmUuJHN0YWdlLmNoaWxkcmVuKCkuZXEodGhpcy5uZXh0KSxcblx0XHRcdGluY29taW5nID0gdGhpcy5jb3JlLnNldHRpbmdzLmFuaW1hdGVJbixcblx0XHRcdG91dGdvaW5nID0gdGhpcy5jb3JlLnNldHRpbmdzLmFuaW1hdGVPdXQ7XG5cblx0XHRpZiAodGhpcy5jb3JlLmN1cnJlbnQoKSA9PT0gdGhpcy5wcmV2aW91cykge1xuXHRcdFx0cmV0dXJuO1xuXHRcdH1cblxuXHRcdGlmIChvdXRnb2luZykge1xuXHRcdFx0bGVmdCA9IHRoaXMuY29yZS5jb29yZGluYXRlcyh0aGlzLnByZXZpb3VzKSAtIHRoaXMuY29yZS5jb29yZGluYXRlcyh0aGlzLm5leHQpO1xuXHRcdFx0cHJldmlvdXMub25lKCQuc3VwcG9ydC5hbmltYXRpb24uZW5kLCBjbGVhcilcblx0XHRcdFx0LmNzcyggeyAnbGVmdCc6IGxlZnQgKyAncHgnIH0gKVxuXHRcdFx0XHQuYWRkQ2xhc3MoJ2FuaW1hdGVkIG93bC1hbmltYXRlZC1vdXQnKVxuXHRcdFx0XHQuYWRkQ2xhc3Mob3V0Z29pbmcpO1xuXHRcdH1cblxuXHRcdGlmIChpbmNvbWluZykge1xuXHRcdFx0bmV4dC5vbmUoJC5zdXBwb3J0LmFuaW1hdGlvbi5lbmQsIGNsZWFyKVxuXHRcdFx0XHQuYWRkQ2xhc3MoJ2FuaW1hdGVkIG93bC1hbmltYXRlZC1pbicpXG5cdFx0XHRcdC5hZGRDbGFzcyhpbmNvbWluZyk7XG5cdFx0fVxuXHR9O1xuXG5cdEFuaW1hdGUucHJvdG90eXBlLmNsZWFyID0gZnVuY3Rpb24oZSkge1xuXHRcdCQoZS50YXJnZXQpLmNzcyggeyAnbGVmdCc6ICcnIH0gKVxuXHRcdFx0LnJlbW92ZUNsYXNzKCdhbmltYXRlZCBvd2wtYW5pbWF0ZWQtb3V0IG93bC1hbmltYXRlZC1pbicpXG5cdFx0XHQucmVtb3ZlQ2xhc3ModGhpcy5jb3JlLnNldHRpbmdzLmFuaW1hdGVJbilcblx0XHRcdC5yZW1vdmVDbGFzcyh0aGlzLmNvcmUuc2V0dGluZ3MuYW5pbWF0ZU91dCk7XG5cdFx0dGhpcy5jb3JlLm9uVHJhbnNpdGlvbkVuZCgpO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBEZXN0cm95cyB0aGUgcGx1Z2luLlxuXHQgKiBAcHVibGljXG5cdCAqL1xuXHRBbmltYXRlLnByb3RvdHlwZS5kZXN0cm95ID0gZnVuY3Rpb24oKSB7XG5cdFx0dmFyIGhhbmRsZXIsIHByb3BlcnR5O1xuXG5cdFx0Zm9yIChoYW5kbGVyIGluIHRoaXMuaGFuZGxlcnMpIHtcblx0XHRcdHRoaXMuY29yZS4kZWxlbWVudC5vZmYoaGFuZGxlciwgdGhpcy5oYW5kbGVyc1toYW5kbGVyXSk7XG5cdFx0fVxuXHRcdGZvciAocHJvcGVydHkgaW4gT2JqZWN0LmdldE93blByb3BlcnR5TmFtZXModGhpcykpIHtcblx0XHRcdHR5cGVvZiB0aGlzW3Byb3BlcnR5XSAhPSAnZnVuY3Rpb24nICYmICh0aGlzW3Byb3BlcnR5XSA9IG51bGwpO1xuXHRcdH1cblx0fTtcblxuXHQkLmZuLm93bENhcm91c2VsLkNvbnN0cnVjdG9yLlBsdWdpbnMuQW5pbWF0ZSA9IEFuaW1hdGU7XG5cbn0pKHdpbmRvdy5aZXB0byB8fCB3aW5kb3cualF1ZXJ5LCB3aW5kb3csIGRvY3VtZW50KTtcblxuLyoqXG4gKiBBdXRvcGxheSBQbHVnaW5cbiAqIEB2ZXJzaW9uIDIuMy40XG4gKiBAYXV0aG9yIEJhcnRvc3ogV29qY2llY2hvd3NraVxuICogQGF1dGhvciBBcnR1cyBLb2xhbm93c2tpXG4gKiBAYXV0aG9yIERhdmlkIERldXRzY2hcbiAqIEBhdXRob3IgVG9tIERlIENhbHV3w6lcbiAqIEBsaWNlbnNlIFRoZSBNSVQgTGljZW5zZSAoTUlUKVxuICovXG47KGZ1bmN0aW9uKCQsIHdpbmRvdywgZG9jdW1lbnQsIHVuZGVmaW5lZCkge1xuXG5cdC8qKlxuXHQgKiBDcmVhdGVzIHRoZSBhdXRvcGxheSBwbHVnaW4uXG5cdCAqIEBjbGFzcyBUaGUgQXV0b3BsYXkgUGx1Z2luXG5cdCAqIEBwYXJhbSB7T3dsfSBzY29wZSAtIFRoZSBPd2wgQ2Fyb3VzZWxcblx0ICovXG5cdHZhciBBdXRvcGxheSA9IGZ1bmN0aW9uKGNhcm91c2VsKSB7XG5cdFx0LyoqXG5cdFx0ICogUmVmZXJlbmNlIHRvIHRoZSBjb3JlLlxuXHRcdCAqIEBwcm90ZWN0ZWRcblx0XHQgKiBAdHlwZSB7T3dsfVxuXHRcdCAqL1xuXHRcdHRoaXMuX2NvcmUgPSBjYXJvdXNlbDtcblxuXHRcdC8qKlxuXHRcdCAqIFRoZSBhdXRvcGxheSB0aW1lb3V0IGlkLlxuXHRcdCAqIEB0eXBlIHtOdW1iZXJ9XG5cdFx0ICovXG5cdFx0dGhpcy5fY2FsbCA9IG51bGw7XG5cblx0XHQvKipcblx0XHQgKiBEZXBlbmRpbmcgb24gdGhlIHN0YXRlIG9mIHRoZSBwbHVnaW4sIHRoaXMgdmFyaWFibGUgY29udGFpbnMgZWl0aGVyXG5cdFx0ICogdGhlIHN0YXJ0IHRpbWUgb2YgdGhlIHRpbWVyIG9yIHRoZSBjdXJyZW50IHRpbWVyIHZhbHVlIGlmIGl0J3Ncblx0XHQgKiBwYXVzZWQuIFNpbmNlIHdlIHN0YXJ0IGluIGEgcGF1c2VkIHN0YXRlIHdlIGluaXRpYWxpemUgdGhlIHRpbWVyXG5cdFx0ICogdmFsdWUuXG5cdFx0ICogQHR5cGUge051bWJlcn1cblx0XHQgKi9cblx0XHR0aGlzLl90aW1lID0gMDtcblxuXHRcdC8qKlxuXHRcdCAqIFN0b3JlcyB0aGUgdGltZW91dCBjdXJyZW50bHkgdXNlZC5cblx0XHQgKiBAdHlwZSB7TnVtYmVyfVxuXHRcdCAqL1xuXHRcdHRoaXMuX3RpbWVvdXQgPSAwO1xuXG5cdFx0LyoqXG5cdFx0ICogSW5kaWNhdGVzIHdoZW5ldmVyIHRoZSBhdXRvcGxheSBpcyBwYXVzZWQuXG5cdFx0ICogQHR5cGUge0Jvb2xlYW59XG5cdFx0ICovXG5cdFx0dGhpcy5fcGF1c2VkID0gdHJ1ZTtcblxuXHRcdC8qKlxuXHRcdCAqIEFsbCBldmVudCBoYW5kbGVycy5cblx0XHQgKiBAcHJvdGVjdGVkXG5cdFx0ICogQHR5cGUge09iamVjdH1cblx0XHQgKi9cblx0XHR0aGlzLl9oYW5kbGVycyA9IHtcblx0XHRcdCdjaGFuZ2VkLm93bC5jYXJvdXNlbCc6ICQucHJveHkoZnVuY3Rpb24oZSkge1xuXHRcdFx0XHRpZiAoZS5uYW1lc3BhY2UgJiYgZS5wcm9wZXJ0eS5uYW1lID09PSAnc2V0dGluZ3MnKSB7XG5cdFx0XHRcdFx0aWYgKHRoaXMuX2NvcmUuc2V0dGluZ3MuYXV0b3BsYXkpIHtcblx0XHRcdFx0XHRcdHRoaXMucGxheSgpO1xuXHRcdFx0XHRcdH0gZWxzZSB7XG5cdFx0XHRcdFx0XHR0aGlzLnN0b3AoKTtcblx0XHRcdFx0XHR9XG5cdFx0XHRcdH0gZWxzZSBpZiAoZS5uYW1lc3BhY2UgJiYgZS5wcm9wZXJ0eS5uYW1lID09PSAncG9zaXRpb24nICYmIHRoaXMuX3BhdXNlZCkge1xuXHRcdFx0XHRcdC8vIFJlc2V0IHRoZSB0aW1lci4gVGhpcyBjb2RlIGlzIHRyaWdnZXJlZCB3aGVuIHRoZSBwb3NpdGlvblxuXHRcdFx0XHRcdC8vIG9mIHRoZSBjYXJvdXNlbCB3YXMgY2hhbmdlZCB0aHJvdWdoIHVzZXIgaW50ZXJhY3Rpb24uXG5cdFx0XHRcdFx0dGhpcy5fdGltZSA9IDA7XG5cdFx0XHRcdH1cblx0XHRcdH0sIHRoaXMpLFxuXHRcdFx0J2luaXRpYWxpemVkLm93bC5jYXJvdXNlbCc6ICQucHJveHkoZnVuY3Rpb24oZSkge1xuXHRcdFx0XHRpZiAoZS5uYW1lc3BhY2UgJiYgdGhpcy5fY29yZS5zZXR0aW5ncy5hdXRvcGxheSkge1xuXHRcdFx0XHRcdHRoaXMucGxheSgpO1xuXHRcdFx0XHR9XG5cdFx0XHR9LCB0aGlzKSxcblx0XHRcdCdwbGF5Lm93bC5hdXRvcGxheSc6ICQucHJveHkoZnVuY3Rpb24oZSwgdCwgcykge1xuXHRcdFx0XHRpZiAoZS5uYW1lc3BhY2UpIHtcblx0XHRcdFx0XHR0aGlzLnBsYXkodCwgcyk7XG5cdFx0XHRcdH1cblx0XHRcdH0sIHRoaXMpLFxuXHRcdFx0J3N0b3Aub3dsLmF1dG9wbGF5JzogJC5wcm94eShmdW5jdGlvbihlKSB7XG5cdFx0XHRcdGlmIChlLm5hbWVzcGFjZSkge1xuXHRcdFx0XHRcdHRoaXMuc3RvcCgpO1xuXHRcdFx0XHR9XG5cdFx0XHR9LCB0aGlzKSxcblx0XHRcdCdtb3VzZW92ZXIub3dsLmF1dG9wbGF5JzogJC5wcm94eShmdW5jdGlvbigpIHtcblx0XHRcdFx0aWYgKHRoaXMuX2NvcmUuc2V0dGluZ3MuYXV0b3BsYXlIb3ZlclBhdXNlICYmIHRoaXMuX2NvcmUuaXMoJ3JvdGF0aW5nJykpIHtcblx0XHRcdFx0XHR0aGlzLnBhdXNlKCk7XG5cdFx0XHRcdH1cblx0XHRcdH0sIHRoaXMpLFxuXHRcdFx0J21vdXNlbGVhdmUub3dsLmF1dG9wbGF5JzogJC5wcm94eShmdW5jdGlvbigpIHtcblx0XHRcdFx0aWYgKHRoaXMuX2NvcmUuc2V0dGluZ3MuYXV0b3BsYXlIb3ZlclBhdXNlICYmIHRoaXMuX2NvcmUuaXMoJ3JvdGF0aW5nJykpIHtcblx0XHRcdFx0XHR0aGlzLnBsYXkoKTtcblx0XHRcdFx0fVxuXHRcdFx0fSwgdGhpcyksXG5cdFx0XHQndG91Y2hzdGFydC5vd2wuY29yZSc6ICQucHJveHkoZnVuY3Rpb24oKSB7XG5cdFx0XHRcdGlmICh0aGlzLl9jb3JlLnNldHRpbmdzLmF1dG9wbGF5SG92ZXJQYXVzZSAmJiB0aGlzLl9jb3JlLmlzKCdyb3RhdGluZycpKSB7XG5cdFx0XHRcdFx0dGhpcy5wYXVzZSgpO1xuXHRcdFx0XHR9XG5cdFx0XHR9LCB0aGlzKSxcblx0XHRcdCd0b3VjaGVuZC5vd2wuY29yZSc6ICQucHJveHkoZnVuY3Rpb24oKSB7XG5cdFx0XHRcdGlmICh0aGlzLl9jb3JlLnNldHRpbmdzLmF1dG9wbGF5SG92ZXJQYXVzZSkge1xuXHRcdFx0XHRcdHRoaXMucGxheSgpO1xuXHRcdFx0XHR9XG5cdFx0XHR9LCB0aGlzKVxuXHRcdH07XG5cblx0XHQvLyByZWdpc3RlciBldmVudCBoYW5kbGVyc1xuXHRcdHRoaXMuX2NvcmUuJGVsZW1lbnQub24odGhpcy5faGFuZGxlcnMpO1xuXG5cdFx0Ly8gc2V0IGRlZmF1bHQgb3B0aW9uc1xuXHRcdHRoaXMuX2NvcmUub3B0aW9ucyA9ICQuZXh0ZW5kKHt9LCBBdXRvcGxheS5EZWZhdWx0cywgdGhpcy5fY29yZS5vcHRpb25zKTtcblx0fTtcblxuXHQvKipcblx0ICogRGVmYXVsdCBvcHRpb25zLlxuXHQgKiBAcHVibGljXG5cdCAqL1xuXHRBdXRvcGxheS5EZWZhdWx0cyA9IHtcblx0XHRhdXRvcGxheTogZmFsc2UsXG5cdFx0YXV0b3BsYXlUaW1lb3V0OiA1MDAwLFxuXHRcdGF1dG9wbGF5SG92ZXJQYXVzZTogZmFsc2UsXG5cdFx0YXV0b3BsYXlTcGVlZDogZmFsc2Vcblx0fTtcblxuXHQvKipcblx0ICogVHJhbnNpdGlvbiB0byB0aGUgbmV4dCBzbGlkZSBhbmQgc2V0IGEgdGltZW91dCBmb3IgdGhlIG5leHQgdHJhbnNpdGlvbi5cblx0ICogQHByaXZhdGVcblx0ICogQHBhcmFtIHtOdW1iZXJ9IFtzcGVlZF0gLSBUaGUgYW5pbWF0aW9uIHNwZWVkIGZvciB0aGUgYW5pbWF0aW9ucy5cblx0ICovXG5cdEF1dG9wbGF5LnByb3RvdHlwZS5fbmV4dCA9IGZ1bmN0aW9uKHNwZWVkKSB7XG5cdFx0dGhpcy5fY2FsbCA9IHdpbmRvdy5zZXRUaW1lb3V0KFxuXHRcdFx0JC5wcm94eSh0aGlzLl9uZXh0LCB0aGlzLCBzcGVlZCksXG5cdFx0XHR0aGlzLl90aW1lb3V0ICogKE1hdGgucm91bmQodGhpcy5yZWFkKCkgLyB0aGlzLl90aW1lb3V0KSArIDEpIC0gdGhpcy5yZWFkKClcblx0XHQpO1xuXG5cdFx0aWYgKHRoaXMuX2NvcmUuaXMoJ2ludGVyYWN0aW5nJykgfHwgZG9jdW1lbnQuaGlkZGVuKSB7XG5cdFx0XHRyZXR1cm47XG5cdFx0fVxuXHRcdHRoaXMuX2NvcmUubmV4dChzcGVlZCB8fCB0aGlzLl9jb3JlLnNldHRpbmdzLmF1dG9wbGF5U3BlZWQpO1xuXHR9XG5cblx0LyoqXG5cdCAqIFJlYWRzIHRoZSBjdXJyZW50IHRpbWVyIHZhbHVlIHdoZW4gdGhlIHRpbWVyIGlzIHBsYXlpbmcuXG5cdCAqIEBwdWJsaWNcblx0ICovXG5cdEF1dG9wbGF5LnByb3RvdHlwZS5yZWFkID0gZnVuY3Rpb24oKSB7XG5cdFx0cmV0dXJuIG5ldyBEYXRlKCkuZ2V0VGltZSgpIC0gdGhpcy5fdGltZTtcblx0fTtcblxuXHQvKipcblx0ICogU3RhcnRzIHRoZSBhdXRvcGxheS5cblx0ICogQHB1YmxpY1xuXHQgKiBAcGFyYW0ge051bWJlcn0gW3RpbWVvdXRdIC0gVGhlIGludGVydmFsIGJlZm9yZSB0aGUgbmV4dCBhbmltYXRpb24gc3RhcnRzLlxuXHQgKiBAcGFyYW0ge051bWJlcn0gW3NwZWVkXSAtIFRoZSBhbmltYXRpb24gc3BlZWQgZm9yIHRoZSBhbmltYXRpb25zLlxuXHQgKi9cblx0QXV0b3BsYXkucHJvdG90eXBlLnBsYXkgPSBmdW5jdGlvbih0aW1lb3V0LCBzcGVlZCkge1xuXHRcdHZhciBlbGFwc2VkO1xuXG5cdFx0aWYgKCF0aGlzLl9jb3JlLmlzKCdyb3RhdGluZycpKSB7XG5cdFx0XHR0aGlzLl9jb3JlLmVudGVyKCdyb3RhdGluZycpO1xuXHRcdH1cblxuXHRcdHRpbWVvdXQgPSB0aW1lb3V0IHx8IHRoaXMuX2NvcmUuc2V0dGluZ3MuYXV0b3BsYXlUaW1lb3V0O1xuXG5cdFx0Ly8gQ2FsY3VsYXRlIHRoZSBlbGFwc2VkIHRpbWUgc2luY2UgdGhlIGxhc3QgdHJhbnNpdGlvbi4gSWYgdGhlIGNhcm91c2VsXG5cdFx0Ly8gd2Fzbid0IHBsYXlpbmcgdGhpcyBjYWxjdWxhdGlvbiB3aWxsIHlpZWxkIHplcm8uXG5cdFx0ZWxhcHNlZCA9IE1hdGgubWluKHRoaXMuX3RpbWUgJSAodGhpcy5fdGltZW91dCB8fCB0aW1lb3V0KSwgdGltZW91dCk7XG5cblx0XHRpZiAodGhpcy5fcGF1c2VkKSB7XG5cdFx0XHQvLyBTdGFydCB0aGUgY2xvY2suXG5cdFx0XHR0aGlzLl90aW1lID0gdGhpcy5yZWFkKCk7XG5cdFx0XHR0aGlzLl9wYXVzZWQgPSBmYWxzZTtcblx0XHR9IGVsc2Uge1xuXHRcdFx0Ly8gQ2xlYXIgdGhlIGFjdGl2ZSB0aW1lb3V0IHRvIGFsbG93IHJlcGxhY2VtZW50LlxuXHRcdFx0d2luZG93LmNsZWFyVGltZW91dCh0aGlzLl9jYWxsKTtcblx0XHR9XG5cblx0XHQvLyBBZGp1c3QgdGhlIG9yaWdpbiBvZiB0aGUgdGltZXIgdG8gbWF0Y2ggdGhlIG5ldyB0aW1lb3V0IHZhbHVlLlxuXHRcdHRoaXMuX3RpbWUgKz0gdGhpcy5yZWFkKCkgJSB0aW1lb3V0IC0gZWxhcHNlZDtcblxuXHRcdHRoaXMuX3RpbWVvdXQgPSB0aW1lb3V0O1xuXHRcdHRoaXMuX2NhbGwgPSB3aW5kb3cuc2V0VGltZW91dCgkLnByb3h5KHRoaXMuX25leHQsIHRoaXMsIHNwZWVkKSwgdGltZW91dCAtIGVsYXBzZWQpO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBTdG9wcyB0aGUgYXV0b3BsYXkuXG5cdCAqIEBwdWJsaWNcblx0ICovXG5cdEF1dG9wbGF5LnByb3RvdHlwZS5zdG9wID0gZnVuY3Rpb24oKSB7XG5cdFx0aWYgKHRoaXMuX2NvcmUuaXMoJ3JvdGF0aW5nJykpIHtcblx0XHRcdC8vIFJlc2V0IHRoZSBjbG9jay5cblx0XHRcdHRoaXMuX3RpbWUgPSAwO1xuXHRcdFx0dGhpcy5fcGF1c2VkID0gdHJ1ZTtcblxuXHRcdFx0d2luZG93LmNsZWFyVGltZW91dCh0aGlzLl9jYWxsKTtcblx0XHRcdHRoaXMuX2NvcmUubGVhdmUoJ3JvdGF0aW5nJyk7XG5cdFx0fVxuXHR9O1xuXG5cdC8qKlxuXHQgKiBQYXVzZXMgdGhlIGF1dG9wbGF5LlxuXHQgKiBAcHVibGljXG5cdCAqL1xuXHRBdXRvcGxheS5wcm90b3R5cGUucGF1c2UgPSBmdW5jdGlvbigpIHtcblx0XHRpZiAodGhpcy5fY29yZS5pcygncm90YXRpbmcnKSAmJiAhdGhpcy5fcGF1c2VkKSB7XG5cdFx0XHQvLyBQYXVzZSB0aGUgY2xvY2suXG5cdFx0XHR0aGlzLl90aW1lID0gdGhpcy5yZWFkKCk7XG5cdFx0XHR0aGlzLl9wYXVzZWQgPSB0cnVlO1xuXG5cdFx0XHR3aW5kb3cuY2xlYXJUaW1lb3V0KHRoaXMuX2NhbGwpO1xuXHRcdH1cblx0fTtcblxuXHQvKipcblx0ICogRGVzdHJveXMgdGhlIHBsdWdpbi5cblx0ICovXG5cdEF1dG9wbGF5LnByb3RvdHlwZS5kZXN0cm95ID0gZnVuY3Rpb24oKSB7XG5cdFx0dmFyIGhhbmRsZXIsIHByb3BlcnR5O1xuXG5cdFx0dGhpcy5zdG9wKCk7XG5cblx0XHRmb3IgKGhhbmRsZXIgaW4gdGhpcy5faGFuZGxlcnMpIHtcblx0XHRcdHRoaXMuX2NvcmUuJGVsZW1lbnQub2ZmKGhhbmRsZXIsIHRoaXMuX2hhbmRsZXJzW2hhbmRsZXJdKTtcblx0XHR9XG5cdFx0Zm9yIChwcm9wZXJ0eSBpbiBPYmplY3QuZ2V0T3duUHJvcGVydHlOYW1lcyh0aGlzKSkge1xuXHRcdFx0dHlwZW9mIHRoaXNbcHJvcGVydHldICE9ICdmdW5jdGlvbicgJiYgKHRoaXNbcHJvcGVydHldID0gbnVsbCk7XG5cdFx0fVxuXHR9O1xuXG5cdCQuZm4ub3dsQ2Fyb3VzZWwuQ29uc3RydWN0b3IuUGx1Z2lucy5hdXRvcGxheSA9IEF1dG9wbGF5O1xuXG59KSh3aW5kb3cuWmVwdG8gfHwgd2luZG93LmpRdWVyeSwgd2luZG93LCBkb2N1bWVudCk7XG5cbi8qKlxuICogTmF2aWdhdGlvbiBQbHVnaW5cbiAqIEB2ZXJzaW9uIDIuMy40XG4gKiBAYXV0aG9yIEFydHVzIEtvbGFub3dza2lcbiAqIEBhdXRob3IgRGF2aWQgRGV1dHNjaFxuICogQGxpY2Vuc2UgVGhlIE1JVCBMaWNlbnNlIChNSVQpXG4gKi9cbjsoZnVuY3Rpb24oJCwgd2luZG93LCBkb2N1bWVudCwgdW5kZWZpbmVkKSB7XG5cdCd1c2Ugc3RyaWN0JztcblxuXHQvKipcblx0ICogQ3JlYXRlcyB0aGUgbmF2aWdhdGlvbiBwbHVnaW4uXG5cdCAqIEBjbGFzcyBUaGUgTmF2aWdhdGlvbiBQbHVnaW5cblx0ICogQHBhcmFtIHtPd2x9IGNhcm91c2VsIC0gVGhlIE93bCBDYXJvdXNlbC5cblx0ICovXG5cdHZhciBOYXZpZ2F0aW9uID0gZnVuY3Rpb24oY2Fyb3VzZWwpIHtcblx0XHQvKipcblx0XHQgKiBSZWZlcmVuY2UgdG8gdGhlIGNvcmUuXG5cdFx0ICogQHByb3RlY3RlZFxuXHRcdCAqIEB0eXBlIHtPd2x9XG5cdFx0ICovXG5cdFx0dGhpcy5fY29yZSA9IGNhcm91c2VsO1xuXG5cdFx0LyoqXG5cdFx0ICogSW5kaWNhdGVzIHdoZXRoZXIgdGhlIHBsdWdpbiBpcyBpbml0aWFsaXplZCBvciBub3QuXG5cdFx0ICogQHByb3RlY3RlZFxuXHRcdCAqIEB0eXBlIHtCb29sZWFufVxuXHRcdCAqL1xuXHRcdHRoaXMuX2luaXRpYWxpemVkID0gZmFsc2U7XG5cblx0XHQvKipcblx0XHQgKiBUaGUgY3VycmVudCBwYWdpbmcgaW5kZXhlcy5cblx0XHQgKiBAcHJvdGVjdGVkXG5cdFx0ICogQHR5cGUge0FycmF5fVxuXHRcdCAqL1xuXHRcdHRoaXMuX3BhZ2VzID0gW107XG5cblx0XHQvKipcblx0XHQgKiBBbGwgRE9NIGVsZW1lbnRzIG9mIHRoZSB1c2VyIGludGVyZmFjZS5cblx0XHQgKiBAcHJvdGVjdGVkXG5cdFx0ICogQHR5cGUge09iamVjdH1cblx0XHQgKi9cblx0XHR0aGlzLl9jb250cm9scyA9IHt9O1xuXG5cdFx0LyoqXG5cdFx0ICogTWFya3VwIGZvciBhbiBpbmRpY2F0b3IuXG5cdFx0ICogQHByb3RlY3RlZFxuXHRcdCAqIEB0eXBlIHtBcnJheS48U3RyaW5nPn1cblx0XHQgKi9cblx0XHR0aGlzLl90ZW1wbGF0ZXMgPSBbXTtcblxuXHRcdC8qKlxuXHRcdCAqIFRoZSBjYXJvdXNlbCBlbGVtZW50LlxuXHRcdCAqIEB0eXBlIHtqUXVlcnl9XG5cdFx0ICovXG5cdFx0dGhpcy4kZWxlbWVudCA9IHRoaXMuX2NvcmUuJGVsZW1lbnQ7XG5cblx0XHQvKipcblx0XHQgKiBPdmVycmlkZGVuIG1ldGhvZHMgb2YgdGhlIGNhcm91c2VsLlxuXHRcdCAqIEBwcm90ZWN0ZWRcblx0XHQgKiBAdHlwZSB7T2JqZWN0fVxuXHRcdCAqL1xuXHRcdHRoaXMuX292ZXJyaWRlcyA9IHtcblx0XHRcdG5leHQ6IHRoaXMuX2NvcmUubmV4dCxcblx0XHRcdHByZXY6IHRoaXMuX2NvcmUucHJldixcblx0XHRcdHRvOiB0aGlzLl9jb3JlLnRvXG5cdFx0fTtcblxuXHRcdC8qKlxuXHRcdCAqIEFsbCBldmVudCBoYW5kbGVycy5cblx0XHQgKiBAcHJvdGVjdGVkXG5cdFx0ICogQHR5cGUge09iamVjdH1cblx0XHQgKi9cblx0XHR0aGlzLl9oYW5kbGVycyA9IHtcblx0XHRcdCdwcmVwYXJlZC5vd2wuY2Fyb3VzZWwnOiAkLnByb3h5KGZ1bmN0aW9uKGUpIHtcblx0XHRcdFx0aWYgKGUubmFtZXNwYWNlICYmIHRoaXMuX2NvcmUuc2V0dGluZ3MuZG90c0RhdGEpIHtcblx0XHRcdFx0XHR0aGlzLl90ZW1wbGF0ZXMucHVzaCgnPGRpdiBjbGFzcz1cIicgKyB0aGlzLl9jb3JlLnNldHRpbmdzLmRvdENsYXNzICsgJ1wiPicgK1xuXHRcdFx0XHRcdFx0JChlLmNvbnRlbnQpLmZpbmQoJ1tkYXRhLWRvdF0nKS5hZGRCYWNrKCdbZGF0YS1kb3RdJykuYXR0cignZGF0YS1kb3QnKSArICc8L2Rpdj4nKTtcblx0XHRcdFx0fVxuXHRcdFx0fSwgdGhpcyksXG5cdFx0XHQnYWRkZWQub3dsLmNhcm91c2VsJzogJC5wcm94eShmdW5jdGlvbihlKSB7XG5cdFx0XHRcdGlmIChlLm5hbWVzcGFjZSAmJiB0aGlzLl9jb3JlLnNldHRpbmdzLmRvdHNEYXRhKSB7XG5cdFx0XHRcdFx0dGhpcy5fdGVtcGxhdGVzLnNwbGljZShlLnBvc2l0aW9uLCAwLCB0aGlzLl90ZW1wbGF0ZXMucG9wKCkpO1xuXHRcdFx0XHR9XG5cdFx0XHR9LCB0aGlzKSxcblx0XHRcdCdyZW1vdmUub3dsLmNhcm91c2VsJzogJC5wcm94eShmdW5jdGlvbihlKSB7XG5cdFx0XHRcdGlmIChlLm5hbWVzcGFjZSAmJiB0aGlzLl9jb3JlLnNldHRpbmdzLmRvdHNEYXRhKSB7XG5cdFx0XHRcdFx0dGhpcy5fdGVtcGxhdGVzLnNwbGljZShlLnBvc2l0aW9uLCAxKTtcblx0XHRcdFx0fVxuXHRcdFx0fSwgdGhpcyksXG5cdFx0XHQnY2hhbmdlZC5vd2wuY2Fyb3VzZWwnOiAkLnByb3h5KGZ1bmN0aW9uKGUpIHtcblx0XHRcdFx0aWYgKGUubmFtZXNwYWNlICYmIGUucHJvcGVydHkubmFtZSA9PSAncG9zaXRpb24nKSB7XG5cdFx0XHRcdFx0dGhpcy5kcmF3KCk7XG5cdFx0XHRcdH1cblx0XHRcdH0sIHRoaXMpLFxuXHRcdFx0J2luaXRpYWxpemVkLm93bC5jYXJvdXNlbCc6ICQucHJveHkoZnVuY3Rpb24oZSkge1xuXHRcdFx0XHRpZiAoZS5uYW1lc3BhY2UgJiYgIXRoaXMuX2luaXRpYWxpemVkKSB7XG5cdFx0XHRcdFx0dGhpcy5fY29yZS50cmlnZ2VyKCdpbml0aWFsaXplJywgbnVsbCwgJ25hdmlnYXRpb24nKTtcblx0XHRcdFx0XHR0aGlzLmluaXRpYWxpemUoKTtcblx0XHRcdFx0XHR0aGlzLnVwZGF0ZSgpO1xuXHRcdFx0XHRcdHRoaXMuZHJhdygpO1xuXHRcdFx0XHRcdHRoaXMuX2luaXRpYWxpemVkID0gdHJ1ZTtcblx0XHRcdFx0XHR0aGlzLl9jb3JlLnRyaWdnZXIoJ2luaXRpYWxpemVkJywgbnVsbCwgJ25hdmlnYXRpb24nKTtcblx0XHRcdFx0fVxuXHRcdFx0fSwgdGhpcyksXG5cdFx0XHQncmVmcmVzaGVkLm93bC5jYXJvdXNlbCc6ICQucHJveHkoZnVuY3Rpb24oZSkge1xuXHRcdFx0XHRpZiAoZS5uYW1lc3BhY2UgJiYgdGhpcy5faW5pdGlhbGl6ZWQpIHtcblx0XHRcdFx0XHR0aGlzLl9jb3JlLnRyaWdnZXIoJ3JlZnJlc2gnLCBudWxsLCAnbmF2aWdhdGlvbicpO1xuXHRcdFx0XHRcdHRoaXMudXBkYXRlKCk7XG5cdFx0XHRcdFx0dGhpcy5kcmF3KCk7XG5cdFx0XHRcdFx0dGhpcy5fY29yZS50cmlnZ2VyKCdyZWZyZXNoZWQnLCBudWxsLCAnbmF2aWdhdGlvbicpO1xuXHRcdFx0XHR9XG5cdFx0XHR9LCB0aGlzKVxuXHRcdH07XG5cblx0XHQvLyBzZXQgZGVmYXVsdCBvcHRpb25zXG5cdFx0dGhpcy5fY29yZS5vcHRpb25zID0gJC5leHRlbmQoe30sIE5hdmlnYXRpb24uRGVmYXVsdHMsIHRoaXMuX2NvcmUub3B0aW9ucyk7XG5cblx0XHQvLyByZWdpc3RlciBldmVudCBoYW5kbGVyc1xuXHRcdHRoaXMuJGVsZW1lbnQub24odGhpcy5faGFuZGxlcnMpO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBEZWZhdWx0IG9wdGlvbnMuXG5cdCAqIEBwdWJsaWNcblx0ICogQHRvZG8gUmVuYW1lIGBzbGlkZUJ5YCB0byBgbmF2QnlgXG5cdCAqL1xuXHROYXZpZ2F0aW9uLkRlZmF1bHRzID0ge1xuXHRcdG5hdjogZmFsc2UsXG5cdFx0bmF2VGV4dDogW1xuXHRcdFx0JzxzcGFuIGFyaWEtbGFiZWw9XCInICsgJ1ByZXZpb3VzJyArICdcIj4mI3gyMDM5Ozwvc3Bhbj4nLFxuXHRcdFx0JzxzcGFuIGFyaWEtbGFiZWw9XCInICsgJ05leHQnICsgJ1wiPiYjeDIwM2E7PC9zcGFuPidcblx0XHRdLFxuXHRcdG5hdlNwZWVkOiBmYWxzZSxcblx0XHRuYXZFbGVtZW50OiAnYnV0dG9uIHR5cGU9XCJidXR0b25cIiByb2xlPVwicHJlc2VudGF0aW9uXCInLFxuXHRcdG5hdkNvbnRhaW5lcjogZmFsc2UsXG5cdFx0bmF2Q29udGFpbmVyQ2xhc3M6ICdvd2wtbmF2Jyxcblx0XHRuYXZDbGFzczogW1xuXHRcdFx0J293bC1wcmV2Jyxcblx0XHRcdCdvd2wtbmV4dCdcblx0XHRdLFxuXHRcdHNsaWRlQnk6IDEsXG5cdFx0ZG90Q2xhc3M6ICdvd2wtZG90Jyxcblx0XHRkb3RzQ2xhc3M6ICdvd2wtZG90cycsXG5cdFx0ZG90czogdHJ1ZSxcblx0XHRkb3RzRWFjaDogZmFsc2UsXG5cdFx0ZG90c0RhdGE6IGZhbHNlLFxuXHRcdGRvdHNTcGVlZDogZmFsc2UsXG5cdFx0ZG90c0NvbnRhaW5lcjogZmFsc2Vcblx0fTtcblxuXHQvKipcblx0ICogSW5pdGlhbGl6ZXMgdGhlIGxheW91dCBvZiB0aGUgcGx1Z2luIGFuZCBleHRlbmRzIHRoZSBjYXJvdXNlbC5cblx0ICogQHByb3RlY3RlZFxuXHQgKi9cblx0TmF2aWdhdGlvbi5wcm90b3R5cGUuaW5pdGlhbGl6ZSA9IGZ1bmN0aW9uKCkge1xuXHRcdHZhciBvdmVycmlkZSxcblx0XHRcdHNldHRpbmdzID0gdGhpcy5fY29yZS5zZXR0aW5ncztcblxuXHRcdC8vIGNyZWF0ZSBET00gc3RydWN0dXJlIGZvciByZWxhdGl2ZSBuYXZpZ2F0aW9uXG5cdFx0dGhpcy5fY29udHJvbHMuJHJlbGF0aXZlID0gKHNldHRpbmdzLm5hdkNvbnRhaW5lciA/ICQoc2V0dGluZ3MubmF2Q29udGFpbmVyKVxuXHRcdFx0OiAkKCc8ZGl2PicpLmFkZENsYXNzKHNldHRpbmdzLm5hdkNvbnRhaW5lckNsYXNzKS5hcHBlbmRUbyh0aGlzLiRlbGVtZW50KSkuYWRkQ2xhc3MoJ2Rpc2FibGVkJyk7XG5cblx0XHR0aGlzLl9jb250cm9scy4kcHJldmlvdXMgPSAkKCc8JyArIHNldHRpbmdzLm5hdkVsZW1lbnQgKyAnPicpXG5cdFx0XHQuYWRkQ2xhc3Moc2V0dGluZ3MubmF2Q2xhc3NbMF0pXG5cdFx0XHQuaHRtbChzZXR0aW5ncy5uYXZUZXh0WzBdKVxuXHRcdFx0LnByZXBlbmRUbyh0aGlzLl9jb250cm9scy4kcmVsYXRpdmUpXG5cdFx0XHQub24oJ2NsaWNrJywgJC5wcm94eShmdW5jdGlvbihlKSB7XG5cdFx0XHRcdHRoaXMucHJldihzZXR0aW5ncy5uYXZTcGVlZCk7XG5cdFx0XHR9LCB0aGlzKSk7XG5cdFx0dGhpcy5fY29udHJvbHMuJG5leHQgPSAkKCc8JyArIHNldHRpbmdzLm5hdkVsZW1lbnQgKyAnPicpXG5cdFx0XHQuYWRkQ2xhc3Moc2V0dGluZ3MubmF2Q2xhc3NbMV0pXG5cdFx0XHQuaHRtbChzZXR0aW5ncy5uYXZUZXh0WzFdKVxuXHRcdFx0LmFwcGVuZFRvKHRoaXMuX2NvbnRyb2xzLiRyZWxhdGl2ZSlcblx0XHRcdC5vbignY2xpY2snLCAkLnByb3h5KGZ1bmN0aW9uKGUpIHtcblx0XHRcdFx0dGhpcy5uZXh0KHNldHRpbmdzLm5hdlNwZWVkKTtcblx0XHRcdH0sIHRoaXMpKTtcblxuXHRcdC8vIGNyZWF0ZSBET00gc3RydWN0dXJlIGZvciBhYnNvbHV0ZSBuYXZpZ2F0aW9uXG5cdFx0aWYgKCFzZXR0aW5ncy5kb3RzRGF0YSkge1xuXHRcdFx0dGhpcy5fdGVtcGxhdGVzID0gWyAkKCc8YnV0dG9uIHJvbGU9XCJidXR0b25cIj4nKVxuXHRcdFx0XHQuYWRkQ2xhc3Moc2V0dGluZ3MuZG90Q2xhc3MpXG5cdFx0XHRcdC5hcHBlbmQoJCgnPHNwYW4+JykpXG5cdFx0XHRcdC5wcm9wKCdvdXRlckhUTUwnKSBdO1xuXHRcdH1cblxuXHRcdHRoaXMuX2NvbnRyb2xzLiRhYnNvbHV0ZSA9IChzZXR0aW5ncy5kb3RzQ29udGFpbmVyID8gJChzZXR0aW5ncy5kb3RzQ29udGFpbmVyKVxuXHRcdFx0OiAkKCc8ZGl2PicpLmFkZENsYXNzKHNldHRpbmdzLmRvdHNDbGFzcykuYXBwZW5kVG8odGhpcy4kZWxlbWVudCkpLmFkZENsYXNzKCdkaXNhYmxlZCcpO1xuXG5cdFx0dGhpcy5fY29udHJvbHMuJGFic29sdXRlLm9uKCdjbGljaycsICdidXR0b24nLCAkLnByb3h5KGZ1bmN0aW9uKGUpIHtcblx0XHRcdHZhciBpbmRleCA9ICQoZS50YXJnZXQpLnBhcmVudCgpLmlzKHRoaXMuX2NvbnRyb2xzLiRhYnNvbHV0ZSlcblx0XHRcdFx0PyAkKGUudGFyZ2V0KS5pbmRleCgpIDogJChlLnRhcmdldCkucGFyZW50KCkuaW5kZXgoKTtcblxuXHRcdFx0ZS5wcmV2ZW50RGVmYXVsdCgpO1xuXG5cdFx0XHR0aGlzLnRvKGluZGV4LCBzZXR0aW5ncy5kb3RzU3BlZWQpO1xuXHRcdH0sIHRoaXMpKTtcblxuXHRcdC8qJGVsLm9uKCdmb2N1c2luJywgZnVuY3Rpb24oKSB7XG5cdFx0XHQkKGRvY3VtZW50KS5vZmYoXCIuY2Fyb3VzZWxcIik7XG5cblx0XHRcdCQoZG9jdW1lbnQpLm9uKCdrZXlkb3duLmNhcm91c2VsJywgZnVuY3Rpb24oZSkge1xuXHRcdFx0XHRpZihlLmtleUNvZGUgPT0gMzcpIHtcblx0XHRcdFx0XHQkZWwudHJpZ2dlcigncHJldi5vd2wnKVxuXHRcdFx0XHR9XG5cdFx0XHRcdGlmKGUua2V5Q29kZSA9PSAzOSkge1xuXHRcdFx0XHRcdCRlbC50cmlnZ2VyKCduZXh0Lm93bCcpXG5cdFx0XHRcdH1cblx0XHRcdH0pO1xuXHRcdH0pOyovXG5cblx0XHQvLyBvdmVycmlkZSBwdWJsaWMgbWV0aG9kcyBvZiB0aGUgY2Fyb3VzZWxcblx0XHRmb3IgKG92ZXJyaWRlIGluIHRoaXMuX292ZXJyaWRlcykge1xuXHRcdFx0dGhpcy5fY29yZVtvdmVycmlkZV0gPSAkLnByb3h5KHRoaXNbb3ZlcnJpZGVdLCB0aGlzKTtcblx0XHR9XG5cdH07XG5cblx0LyoqXG5cdCAqIERlc3Ryb3lzIHRoZSBwbHVnaW4uXG5cdCAqIEBwcm90ZWN0ZWRcblx0ICovXG5cdE5hdmlnYXRpb24ucHJvdG90eXBlLmRlc3Ryb3kgPSBmdW5jdGlvbigpIHtcblx0XHR2YXIgaGFuZGxlciwgY29udHJvbCwgcHJvcGVydHksIG92ZXJyaWRlLCBzZXR0aW5ncztcblx0XHRzZXR0aW5ncyA9IHRoaXMuX2NvcmUuc2V0dGluZ3M7XG5cblx0XHRmb3IgKGhhbmRsZXIgaW4gdGhpcy5faGFuZGxlcnMpIHtcblx0XHRcdHRoaXMuJGVsZW1lbnQub2ZmKGhhbmRsZXIsIHRoaXMuX2hhbmRsZXJzW2hhbmRsZXJdKTtcblx0XHR9XG5cdFx0Zm9yIChjb250cm9sIGluIHRoaXMuX2NvbnRyb2xzKSB7XG5cdFx0XHRpZiAoY29udHJvbCA9PT0gJyRyZWxhdGl2ZScgJiYgc2V0dGluZ3MubmF2Q29udGFpbmVyKSB7XG5cdFx0XHRcdHRoaXMuX2NvbnRyb2xzW2NvbnRyb2xdLmh0bWwoJycpO1xuXHRcdFx0fSBlbHNlIHtcblx0XHRcdFx0dGhpcy5fY29udHJvbHNbY29udHJvbF0ucmVtb3ZlKCk7XG5cdFx0XHR9XG5cdFx0fVxuXHRcdGZvciAob3ZlcnJpZGUgaW4gdGhpcy5vdmVyaWRlcykge1xuXHRcdFx0dGhpcy5fY29yZVtvdmVycmlkZV0gPSB0aGlzLl9vdmVycmlkZXNbb3ZlcnJpZGVdO1xuXHRcdH1cblx0XHRmb3IgKHByb3BlcnR5IGluIE9iamVjdC5nZXRPd25Qcm9wZXJ0eU5hbWVzKHRoaXMpKSB7XG5cdFx0XHR0eXBlb2YgdGhpc1twcm9wZXJ0eV0gIT0gJ2Z1bmN0aW9uJyAmJiAodGhpc1twcm9wZXJ0eV0gPSBudWxsKTtcblx0XHR9XG5cdH07XG5cblx0LyoqXG5cdCAqIFVwZGF0ZXMgdGhlIGludGVybmFsIHN0YXRlLlxuXHQgKiBAcHJvdGVjdGVkXG5cdCAqL1xuXHROYXZpZ2F0aW9uLnByb3RvdHlwZS51cGRhdGUgPSBmdW5jdGlvbigpIHtcblx0XHR2YXIgaSwgaiwgayxcblx0XHRcdGxvd2VyID0gdGhpcy5fY29yZS5jbG9uZXMoKS5sZW5ndGggLyAyLFxuXHRcdFx0dXBwZXIgPSBsb3dlciArIHRoaXMuX2NvcmUuaXRlbXMoKS5sZW5ndGgsXG5cdFx0XHRtYXhpbXVtID0gdGhpcy5fY29yZS5tYXhpbXVtKHRydWUpLFxuXHRcdFx0c2V0dGluZ3MgPSB0aGlzLl9jb3JlLnNldHRpbmdzLFxuXHRcdFx0c2l6ZSA9IHNldHRpbmdzLmNlbnRlciB8fCBzZXR0aW5ncy5hdXRvV2lkdGggfHwgc2V0dGluZ3MuZG90c0RhdGFcblx0XHRcdFx0PyAxIDogc2V0dGluZ3MuZG90c0VhY2ggfHwgc2V0dGluZ3MuaXRlbXM7XG5cblx0XHRpZiAoc2V0dGluZ3Muc2xpZGVCeSAhPT0gJ3BhZ2UnKSB7XG5cdFx0XHRzZXR0aW5ncy5zbGlkZUJ5ID0gTWF0aC5taW4oc2V0dGluZ3Muc2xpZGVCeSwgc2V0dGluZ3MuaXRlbXMpO1xuXHRcdH1cblxuXHRcdGlmIChzZXR0aW5ncy5kb3RzIHx8IHNldHRpbmdzLnNsaWRlQnkgPT0gJ3BhZ2UnKSB7XG5cdFx0XHR0aGlzLl9wYWdlcyA9IFtdO1xuXG5cdFx0XHRmb3IgKGkgPSBsb3dlciwgaiA9IDAsIGsgPSAwOyBpIDwgdXBwZXI7IGkrKykge1xuXHRcdFx0XHRpZiAoaiA+PSBzaXplIHx8IGogPT09IDApIHtcblx0XHRcdFx0XHR0aGlzLl9wYWdlcy5wdXNoKHtcblx0XHRcdFx0XHRcdHN0YXJ0OiBNYXRoLm1pbihtYXhpbXVtLCBpIC0gbG93ZXIpLFxuXHRcdFx0XHRcdFx0ZW5kOiBpIC0gbG93ZXIgKyBzaXplIC0gMVxuXHRcdFx0XHRcdH0pO1xuXHRcdFx0XHRcdGlmIChNYXRoLm1pbihtYXhpbXVtLCBpIC0gbG93ZXIpID09PSBtYXhpbXVtKSB7XG5cdFx0XHRcdFx0XHRicmVhaztcblx0XHRcdFx0XHR9XG5cdFx0XHRcdFx0aiA9IDAsICsraztcblx0XHRcdFx0fVxuXHRcdFx0XHRqICs9IHRoaXMuX2NvcmUubWVyZ2Vycyh0aGlzLl9jb3JlLnJlbGF0aXZlKGkpKTtcblx0XHRcdH1cblx0XHR9XG5cdH07XG5cblx0LyoqXG5cdCAqIERyYXdzIHRoZSB1c2VyIGludGVyZmFjZS5cblx0ICogQHRvZG8gVGhlIG9wdGlvbiBgZG90c0RhdGFgIHdvbnQgd29yay5cblx0ICogQHByb3RlY3RlZFxuXHQgKi9cblx0TmF2aWdhdGlvbi5wcm90b3R5cGUuZHJhdyA9IGZ1bmN0aW9uKCkge1xuXHRcdHZhciBkaWZmZXJlbmNlLFxuXHRcdFx0c2V0dGluZ3MgPSB0aGlzLl9jb3JlLnNldHRpbmdzLFxuXHRcdFx0ZGlzYWJsZWQgPSB0aGlzLl9jb3JlLml0ZW1zKCkubGVuZ3RoIDw9IHNldHRpbmdzLml0ZW1zLFxuXHRcdFx0aW5kZXggPSB0aGlzLl9jb3JlLnJlbGF0aXZlKHRoaXMuX2NvcmUuY3VycmVudCgpKSxcblx0XHRcdGxvb3AgPSBzZXR0aW5ncy5sb29wIHx8IHNldHRpbmdzLnJld2luZDtcblxuXHRcdHRoaXMuX2NvbnRyb2xzLiRyZWxhdGl2ZS50b2dnbGVDbGFzcygnZGlzYWJsZWQnLCAhc2V0dGluZ3MubmF2IHx8IGRpc2FibGVkKTtcblxuXHRcdGlmIChzZXR0aW5ncy5uYXYpIHtcblx0XHRcdHRoaXMuX2NvbnRyb2xzLiRwcmV2aW91cy50b2dnbGVDbGFzcygnZGlzYWJsZWQnLCAhbG9vcCAmJiBpbmRleCA8PSB0aGlzLl9jb3JlLm1pbmltdW0odHJ1ZSkpO1xuXHRcdFx0dGhpcy5fY29udHJvbHMuJG5leHQudG9nZ2xlQ2xhc3MoJ2Rpc2FibGVkJywgIWxvb3AgJiYgaW5kZXggPj0gdGhpcy5fY29yZS5tYXhpbXVtKHRydWUpKTtcblx0XHR9XG5cblx0XHR0aGlzLl9jb250cm9scy4kYWJzb2x1dGUudG9nZ2xlQ2xhc3MoJ2Rpc2FibGVkJywgIXNldHRpbmdzLmRvdHMgfHwgZGlzYWJsZWQpO1xuXG5cdFx0aWYgKHNldHRpbmdzLmRvdHMpIHtcblx0XHRcdGRpZmZlcmVuY2UgPSB0aGlzLl9wYWdlcy5sZW5ndGggLSB0aGlzLl9jb250cm9scy4kYWJzb2x1dGUuY2hpbGRyZW4oKS5sZW5ndGg7XG5cblx0XHRcdGlmIChzZXR0aW5ncy5kb3RzRGF0YSAmJiBkaWZmZXJlbmNlICE9PSAwKSB7XG5cdFx0XHRcdHRoaXMuX2NvbnRyb2xzLiRhYnNvbHV0ZS5odG1sKHRoaXMuX3RlbXBsYXRlcy5qb2luKCcnKSk7XG5cdFx0XHR9IGVsc2UgaWYgKGRpZmZlcmVuY2UgPiAwKSB7XG5cdFx0XHRcdHRoaXMuX2NvbnRyb2xzLiRhYnNvbHV0ZS5hcHBlbmQobmV3IEFycmF5KGRpZmZlcmVuY2UgKyAxKS5qb2luKHRoaXMuX3RlbXBsYXRlc1swXSkpO1xuXHRcdFx0fSBlbHNlIGlmIChkaWZmZXJlbmNlIDwgMCkge1xuXHRcdFx0XHR0aGlzLl9jb250cm9scy4kYWJzb2x1dGUuY2hpbGRyZW4oKS5zbGljZShkaWZmZXJlbmNlKS5yZW1vdmUoKTtcblx0XHRcdH1cblxuXHRcdFx0dGhpcy5fY29udHJvbHMuJGFic29sdXRlLmZpbmQoJy5hY3RpdmUnKS5yZW1vdmVDbGFzcygnYWN0aXZlJyk7XG5cdFx0XHR0aGlzLl9jb250cm9scy4kYWJzb2x1dGUuY2hpbGRyZW4oKS5lcSgkLmluQXJyYXkodGhpcy5jdXJyZW50KCksIHRoaXMuX3BhZ2VzKSkuYWRkQ2xhc3MoJ2FjdGl2ZScpO1xuXHRcdH1cblx0fTtcblxuXHQvKipcblx0ICogRXh0ZW5kcyBldmVudCBkYXRhLlxuXHQgKiBAcHJvdGVjdGVkXG5cdCAqIEBwYXJhbSB7RXZlbnR9IGV2ZW50IC0gVGhlIGV2ZW50IG9iamVjdCB3aGljaCBnZXRzIHRocm93bi5cblx0ICovXG5cdE5hdmlnYXRpb24ucHJvdG90eXBlLm9uVHJpZ2dlciA9IGZ1bmN0aW9uKGV2ZW50KSB7XG5cdFx0dmFyIHNldHRpbmdzID0gdGhpcy5fY29yZS5zZXR0aW5ncztcblxuXHRcdGV2ZW50LnBhZ2UgPSB7XG5cdFx0XHRpbmRleDogJC5pbkFycmF5KHRoaXMuY3VycmVudCgpLCB0aGlzLl9wYWdlcyksXG5cdFx0XHRjb3VudDogdGhpcy5fcGFnZXMubGVuZ3RoLFxuXHRcdFx0c2l6ZTogc2V0dGluZ3MgJiYgKHNldHRpbmdzLmNlbnRlciB8fCBzZXR0aW5ncy5hdXRvV2lkdGggfHwgc2V0dGluZ3MuZG90c0RhdGFcblx0XHRcdFx0PyAxIDogc2V0dGluZ3MuZG90c0VhY2ggfHwgc2V0dGluZ3MuaXRlbXMpXG5cdFx0fTtcblx0fTtcblxuXHQvKipcblx0ICogR2V0cyB0aGUgY3VycmVudCBwYWdlIHBvc2l0aW9uIG9mIHRoZSBjYXJvdXNlbC5cblx0ICogQHByb3RlY3RlZFxuXHQgKiBAcmV0dXJucyB7TnVtYmVyfVxuXHQgKi9cblx0TmF2aWdhdGlvbi5wcm90b3R5cGUuY3VycmVudCA9IGZ1bmN0aW9uKCkge1xuXHRcdHZhciBjdXJyZW50ID0gdGhpcy5fY29yZS5yZWxhdGl2ZSh0aGlzLl9jb3JlLmN1cnJlbnQoKSk7XG5cdFx0cmV0dXJuICQuZ3JlcCh0aGlzLl9wYWdlcywgJC5wcm94eShmdW5jdGlvbihwYWdlLCBpbmRleCkge1xuXHRcdFx0cmV0dXJuIHBhZ2Uuc3RhcnQgPD0gY3VycmVudCAmJiBwYWdlLmVuZCA+PSBjdXJyZW50O1xuXHRcdH0sIHRoaXMpKS5wb3AoKTtcblx0fTtcblxuXHQvKipcblx0ICogR2V0cyB0aGUgY3VycmVudCBzdWNjZXNvci9wcmVkZWNlc3NvciBwb3NpdGlvbi5cblx0ICogQHByb3RlY3RlZFxuXHQgKiBAcmV0dXJucyB7TnVtYmVyfVxuXHQgKi9cblx0TmF2aWdhdGlvbi5wcm90b3R5cGUuZ2V0UG9zaXRpb24gPSBmdW5jdGlvbihzdWNjZXNzb3IpIHtcblx0XHR2YXIgcG9zaXRpb24sIGxlbmd0aCxcblx0XHRcdHNldHRpbmdzID0gdGhpcy5fY29yZS5zZXR0aW5ncztcblxuXHRcdGlmIChzZXR0aW5ncy5zbGlkZUJ5ID09ICdwYWdlJykge1xuXHRcdFx0cG9zaXRpb24gPSAkLmluQXJyYXkodGhpcy5jdXJyZW50KCksIHRoaXMuX3BhZ2VzKTtcblx0XHRcdGxlbmd0aCA9IHRoaXMuX3BhZ2VzLmxlbmd0aDtcblx0XHRcdHN1Y2Nlc3NvciA/ICsrcG9zaXRpb24gOiAtLXBvc2l0aW9uO1xuXHRcdFx0cG9zaXRpb24gPSB0aGlzLl9wYWdlc1soKHBvc2l0aW9uICUgbGVuZ3RoKSArIGxlbmd0aCkgJSBsZW5ndGhdLnN0YXJ0O1xuXHRcdH0gZWxzZSB7XG5cdFx0XHRwb3NpdGlvbiA9IHRoaXMuX2NvcmUucmVsYXRpdmUodGhpcy5fY29yZS5jdXJyZW50KCkpO1xuXHRcdFx0bGVuZ3RoID0gdGhpcy5fY29yZS5pdGVtcygpLmxlbmd0aDtcblx0XHRcdHN1Y2Nlc3NvciA/IHBvc2l0aW9uICs9IHNldHRpbmdzLnNsaWRlQnkgOiBwb3NpdGlvbiAtPSBzZXR0aW5ncy5zbGlkZUJ5O1xuXHRcdH1cblxuXHRcdHJldHVybiBwb3NpdGlvbjtcblx0fTtcblxuXHQvKipcblx0ICogU2xpZGVzIHRvIHRoZSBuZXh0IGl0ZW0gb3IgcGFnZS5cblx0ICogQHB1YmxpY1xuXHQgKiBAcGFyYW0ge051bWJlcn0gW3NwZWVkPWZhbHNlXSAtIFRoZSB0aW1lIGluIG1pbGxpc2Vjb25kcyBmb3IgdGhlIHRyYW5zaXRpb24uXG5cdCAqL1xuXHROYXZpZ2F0aW9uLnByb3RvdHlwZS5uZXh0ID0gZnVuY3Rpb24oc3BlZWQpIHtcblx0XHQkLnByb3h5KHRoaXMuX292ZXJyaWRlcy50bywgdGhpcy5fY29yZSkodGhpcy5nZXRQb3NpdGlvbih0cnVlKSwgc3BlZWQpO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBTbGlkZXMgdG8gdGhlIHByZXZpb3VzIGl0ZW0gb3IgcGFnZS5cblx0ICogQHB1YmxpY1xuXHQgKiBAcGFyYW0ge051bWJlcn0gW3NwZWVkPWZhbHNlXSAtIFRoZSB0aW1lIGluIG1pbGxpc2Vjb25kcyBmb3IgdGhlIHRyYW5zaXRpb24uXG5cdCAqL1xuXHROYXZpZ2F0aW9uLnByb3RvdHlwZS5wcmV2ID0gZnVuY3Rpb24oc3BlZWQpIHtcblx0XHQkLnByb3h5KHRoaXMuX292ZXJyaWRlcy50bywgdGhpcy5fY29yZSkodGhpcy5nZXRQb3NpdGlvbihmYWxzZSksIHNwZWVkKTtcblx0fTtcblxuXHQvKipcblx0ICogU2xpZGVzIHRvIHRoZSBzcGVjaWZpZWQgaXRlbSBvciBwYWdlLlxuXHQgKiBAcHVibGljXG5cdCAqIEBwYXJhbSB7TnVtYmVyfSBwb3NpdGlvbiAtIFRoZSBwb3NpdGlvbiBvZiB0aGUgaXRlbSBvciBwYWdlLlxuXHQgKiBAcGFyYW0ge051bWJlcn0gW3NwZWVkXSAtIFRoZSB0aW1lIGluIG1pbGxpc2Vjb25kcyBmb3IgdGhlIHRyYW5zaXRpb24uXG5cdCAqIEBwYXJhbSB7Qm9vbGVhbn0gW3N0YW5kYXJkPWZhbHNlXSAtIFdoZXRoZXIgdG8gdXNlIHRoZSBzdGFuZGFyZCBiZWhhdmlvdXIgb3Igbm90LlxuXHQgKi9cblx0TmF2aWdhdGlvbi5wcm90b3R5cGUudG8gPSBmdW5jdGlvbihwb3NpdGlvbiwgc3BlZWQsIHN0YW5kYXJkKSB7XG5cdFx0dmFyIGxlbmd0aDtcblxuXHRcdGlmICghc3RhbmRhcmQgJiYgdGhpcy5fcGFnZXMubGVuZ3RoKSB7XG5cdFx0XHRsZW5ndGggPSB0aGlzLl9wYWdlcy5sZW5ndGg7XG5cdFx0XHQkLnByb3h5KHRoaXMuX292ZXJyaWRlcy50bywgdGhpcy5fY29yZSkodGhpcy5fcGFnZXNbKChwb3NpdGlvbiAlIGxlbmd0aCkgKyBsZW5ndGgpICUgbGVuZ3RoXS5zdGFydCwgc3BlZWQpO1xuXHRcdH0gZWxzZSB7XG5cdFx0XHQkLnByb3h5KHRoaXMuX292ZXJyaWRlcy50bywgdGhpcy5fY29yZSkocG9zaXRpb24sIHNwZWVkKTtcblx0XHR9XG5cdH07XG5cblx0JC5mbi5vd2xDYXJvdXNlbC5Db25zdHJ1Y3Rvci5QbHVnaW5zLk5hdmlnYXRpb24gPSBOYXZpZ2F0aW9uO1xuXG59KSh3aW5kb3cuWmVwdG8gfHwgd2luZG93LmpRdWVyeSwgd2luZG93LCBkb2N1bWVudCk7XG5cbi8qKlxuICogSGFzaCBQbHVnaW5cbiAqIEB2ZXJzaW9uIDIuMy40XG4gKiBAYXV0aG9yIEFydHVzIEtvbGFub3dza2lcbiAqIEBhdXRob3IgRGF2aWQgRGV1dHNjaFxuICogQGxpY2Vuc2UgVGhlIE1JVCBMaWNlbnNlIChNSVQpXG4gKi9cbjsoZnVuY3Rpb24oJCwgd2luZG93LCBkb2N1bWVudCwgdW5kZWZpbmVkKSB7XG5cdCd1c2Ugc3RyaWN0JztcblxuXHQvKipcblx0ICogQ3JlYXRlcyB0aGUgaGFzaCBwbHVnaW4uXG5cdCAqIEBjbGFzcyBUaGUgSGFzaCBQbHVnaW5cblx0ICogQHBhcmFtIHtPd2x9IGNhcm91c2VsIC0gVGhlIE93bCBDYXJvdXNlbFxuXHQgKi9cblx0dmFyIEhhc2ggPSBmdW5jdGlvbihjYXJvdXNlbCkge1xuXHRcdC8qKlxuXHRcdCAqIFJlZmVyZW5jZSB0byB0aGUgY29yZS5cblx0XHQgKiBAcHJvdGVjdGVkXG5cdFx0ICogQHR5cGUge093bH1cblx0XHQgKi9cblx0XHR0aGlzLl9jb3JlID0gY2Fyb3VzZWw7XG5cblx0XHQvKipcblx0XHQgKiBIYXNoIGluZGV4IGZvciB0aGUgaXRlbXMuXG5cdFx0ICogQHByb3RlY3RlZFxuXHRcdCAqIEB0eXBlIHtPYmplY3R9XG5cdFx0ICovXG5cdFx0dGhpcy5faGFzaGVzID0ge307XG5cblx0XHQvKipcblx0XHQgKiBUaGUgY2Fyb3VzZWwgZWxlbWVudC5cblx0XHQgKiBAdHlwZSB7alF1ZXJ5fVxuXHRcdCAqL1xuXHRcdHRoaXMuJGVsZW1lbnQgPSB0aGlzLl9jb3JlLiRlbGVtZW50O1xuXG5cdFx0LyoqXG5cdFx0ICogQWxsIGV2ZW50IGhhbmRsZXJzLlxuXHRcdCAqIEBwcm90ZWN0ZWRcblx0XHQgKiBAdHlwZSB7T2JqZWN0fVxuXHRcdCAqL1xuXHRcdHRoaXMuX2hhbmRsZXJzID0ge1xuXHRcdFx0J2luaXRpYWxpemVkLm93bC5jYXJvdXNlbCc6ICQucHJveHkoZnVuY3Rpb24oZSkge1xuXHRcdFx0XHRpZiAoZS5uYW1lc3BhY2UgJiYgdGhpcy5fY29yZS5zZXR0aW5ncy5zdGFydFBvc2l0aW9uID09PSAnVVJMSGFzaCcpIHtcblx0XHRcdFx0XHQkKHdpbmRvdykudHJpZ2dlcignaGFzaGNoYW5nZS5vd2wubmF2aWdhdGlvbicpO1xuXHRcdFx0XHR9XG5cdFx0XHR9LCB0aGlzKSxcblx0XHRcdCdwcmVwYXJlZC5vd2wuY2Fyb3VzZWwnOiAkLnByb3h5KGZ1bmN0aW9uKGUpIHtcblx0XHRcdFx0aWYgKGUubmFtZXNwYWNlKSB7XG5cdFx0XHRcdFx0dmFyIGhhc2ggPSAkKGUuY29udGVudCkuZmluZCgnW2RhdGEtaGFzaF0nKS5hZGRCYWNrKCdbZGF0YS1oYXNoXScpLmF0dHIoJ2RhdGEtaGFzaCcpO1xuXG5cdFx0XHRcdFx0aWYgKCFoYXNoKSB7XG5cdFx0XHRcdFx0XHRyZXR1cm47XG5cdFx0XHRcdFx0fVxuXG5cdFx0XHRcdFx0dGhpcy5faGFzaGVzW2hhc2hdID0gZS5jb250ZW50O1xuXHRcdFx0XHR9XG5cdFx0XHR9LCB0aGlzKSxcblx0XHRcdCdjaGFuZ2VkLm93bC5jYXJvdXNlbCc6ICQucHJveHkoZnVuY3Rpb24oZSkge1xuXHRcdFx0XHRpZiAoZS5uYW1lc3BhY2UgJiYgZS5wcm9wZXJ0eS5uYW1lID09PSAncG9zaXRpb24nKSB7XG5cdFx0XHRcdFx0dmFyIGN1cnJlbnQgPSB0aGlzLl9jb3JlLml0ZW1zKHRoaXMuX2NvcmUucmVsYXRpdmUodGhpcy5fY29yZS5jdXJyZW50KCkpKSxcblx0XHRcdFx0XHRcdGhhc2ggPSAkLm1hcCh0aGlzLl9oYXNoZXMsIGZ1bmN0aW9uKGl0ZW0sIGhhc2gpIHtcblx0XHRcdFx0XHRcdFx0cmV0dXJuIGl0ZW0gPT09IGN1cnJlbnQgPyBoYXNoIDogbnVsbDtcblx0XHRcdFx0XHRcdH0pLmpvaW4oKTtcblxuXHRcdFx0XHRcdGlmICghaGFzaCB8fCB3aW5kb3cubG9jYXRpb24uaGFzaC5zbGljZSgxKSA9PT0gaGFzaCkge1xuXHRcdFx0XHRcdFx0cmV0dXJuO1xuXHRcdFx0XHRcdH1cblxuXHRcdFx0XHRcdHdpbmRvdy5sb2NhdGlvbi5oYXNoID0gaGFzaDtcblx0XHRcdFx0fVxuXHRcdFx0fSwgdGhpcylcblx0XHR9O1xuXG5cdFx0Ly8gc2V0IGRlZmF1bHQgb3B0aW9uc1xuXHRcdHRoaXMuX2NvcmUub3B0aW9ucyA9ICQuZXh0ZW5kKHt9LCBIYXNoLkRlZmF1bHRzLCB0aGlzLl9jb3JlLm9wdGlvbnMpO1xuXG5cdFx0Ly8gcmVnaXN0ZXIgdGhlIGV2ZW50IGhhbmRsZXJzXG5cdFx0dGhpcy4kZWxlbWVudC5vbih0aGlzLl9oYW5kbGVycyk7XG5cblx0XHQvLyByZWdpc3RlciBldmVudCBsaXN0ZW5lciBmb3IgaGFzaCBuYXZpZ2F0aW9uXG5cdFx0JCh3aW5kb3cpLm9uKCdoYXNoY2hhbmdlLm93bC5uYXZpZ2F0aW9uJywgJC5wcm94eShmdW5jdGlvbihlKSB7XG5cdFx0XHR2YXIgaGFzaCA9IHdpbmRvdy5sb2NhdGlvbi5oYXNoLnN1YnN0cmluZygxKSxcblx0XHRcdFx0aXRlbXMgPSB0aGlzLl9jb3JlLiRzdGFnZS5jaGlsZHJlbigpLFxuXHRcdFx0XHRwb3NpdGlvbiA9IHRoaXMuX2hhc2hlc1toYXNoXSAmJiBpdGVtcy5pbmRleCh0aGlzLl9oYXNoZXNbaGFzaF0pO1xuXG5cdFx0XHRpZiAocG9zaXRpb24gPT09IHVuZGVmaW5lZCB8fCBwb3NpdGlvbiA9PT0gdGhpcy5fY29yZS5jdXJyZW50KCkpIHtcblx0XHRcdFx0cmV0dXJuO1xuXHRcdFx0fVxuXG5cdFx0XHR0aGlzLl9jb3JlLnRvKHRoaXMuX2NvcmUucmVsYXRpdmUocG9zaXRpb24pLCBmYWxzZSwgdHJ1ZSk7XG5cdFx0fSwgdGhpcykpO1xuXHR9O1xuXG5cdC8qKlxuXHQgKiBEZWZhdWx0IG9wdGlvbnMuXG5cdCAqIEBwdWJsaWNcblx0ICovXG5cdEhhc2guRGVmYXVsdHMgPSB7XG5cdFx0VVJMaGFzaExpc3RlbmVyOiBmYWxzZVxuXHR9O1xuXG5cdC8qKlxuXHQgKiBEZXN0cm95cyB0aGUgcGx1Z2luLlxuXHQgKiBAcHVibGljXG5cdCAqL1xuXHRIYXNoLnByb3RvdHlwZS5kZXN0cm95ID0gZnVuY3Rpb24oKSB7XG5cdFx0dmFyIGhhbmRsZXIsIHByb3BlcnR5O1xuXG5cdFx0JCh3aW5kb3cpLm9mZignaGFzaGNoYW5nZS5vd2wubmF2aWdhdGlvbicpO1xuXG5cdFx0Zm9yIChoYW5kbGVyIGluIHRoaXMuX2hhbmRsZXJzKSB7XG5cdFx0XHR0aGlzLl9jb3JlLiRlbGVtZW50Lm9mZihoYW5kbGVyLCB0aGlzLl9oYW5kbGVyc1toYW5kbGVyXSk7XG5cdFx0fVxuXHRcdGZvciAocHJvcGVydHkgaW4gT2JqZWN0LmdldE93blByb3BlcnR5TmFtZXModGhpcykpIHtcblx0XHRcdHR5cGVvZiB0aGlzW3Byb3BlcnR5XSAhPSAnZnVuY3Rpb24nICYmICh0aGlzW3Byb3BlcnR5XSA9IG51bGwpO1xuXHRcdH1cblx0fTtcblxuXHQkLmZuLm93bENhcm91c2VsLkNvbnN0cnVjdG9yLlBsdWdpbnMuSGFzaCA9IEhhc2g7XG5cbn0pKHdpbmRvdy5aZXB0byB8fCB3aW5kb3cualF1ZXJ5LCB3aW5kb3csIGRvY3VtZW50KTtcblxuLyoqXG4gKiBTdXBwb3J0IFBsdWdpblxuICpcbiAqIEB2ZXJzaW9uIDIuMy40XG4gKiBAYXV0aG9yIFZpdmlkIFBsYW5ldCBTb2Z0d2FyZSBHbWJIXG4gKiBAYXV0aG9yIEFydHVzIEtvbGFub3dza2lcbiAqIEBhdXRob3IgRGF2aWQgRGV1dHNjaFxuICogQGxpY2Vuc2UgVGhlIE1JVCBMaWNlbnNlIChNSVQpXG4gKi9cbjsoZnVuY3Rpb24oJCwgd2luZG93LCBkb2N1bWVudCwgdW5kZWZpbmVkKSB7XG5cblx0dmFyIHN0eWxlID0gJCgnPHN1cHBvcnQ+JykuZ2V0KDApLnN0eWxlLFxuXHRcdHByZWZpeGVzID0gJ1dlYmtpdCBNb3ogTyBtcycuc3BsaXQoJyAnKSxcblx0XHRldmVudHMgPSB7XG5cdFx0XHR0cmFuc2l0aW9uOiB7XG5cdFx0XHRcdGVuZDoge1xuXHRcdFx0XHRcdFdlYmtpdFRyYW5zaXRpb246ICd3ZWJraXRUcmFuc2l0aW9uRW5kJyxcblx0XHRcdFx0XHRNb3pUcmFuc2l0aW9uOiAndHJhbnNpdGlvbmVuZCcsXG5cdFx0XHRcdFx0T1RyYW5zaXRpb246ICdvVHJhbnNpdGlvbkVuZCcsXG5cdFx0XHRcdFx0dHJhbnNpdGlvbjogJ3RyYW5zaXRpb25lbmQnXG5cdFx0XHRcdH1cblx0XHRcdH0sXG5cdFx0XHRhbmltYXRpb246IHtcblx0XHRcdFx0ZW5kOiB7XG5cdFx0XHRcdFx0V2Via2l0QW5pbWF0aW9uOiAnd2Via2l0QW5pbWF0aW9uRW5kJyxcblx0XHRcdFx0XHRNb3pBbmltYXRpb246ICdhbmltYXRpb25lbmQnLFxuXHRcdFx0XHRcdE9BbmltYXRpb246ICdvQW5pbWF0aW9uRW5kJyxcblx0XHRcdFx0XHRhbmltYXRpb246ICdhbmltYXRpb25lbmQnXG5cdFx0XHRcdH1cblx0XHRcdH1cblx0XHR9LFxuXHRcdHRlc3RzID0ge1xuXHRcdFx0Y3NzdHJhbnNmb3JtczogZnVuY3Rpb24oKSB7XG5cdFx0XHRcdHJldHVybiAhIXRlc3QoJ3RyYW5zZm9ybScpO1xuXHRcdFx0fSxcblx0XHRcdGNzc3RyYW5zZm9ybXMzZDogZnVuY3Rpb24oKSB7XG5cdFx0XHRcdHJldHVybiAhIXRlc3QoJ3BlcnNwZWN0aXZlJyk7XG5cdFx0XHR9LFxuXHRcdFx0Y3NzdHJhbnNpdGlvbnM6IGZ1bmN0aW9uKCkge1xuXHRcdFx0XHRyZXR1cm4gISF0ZXN0KCd0cmFuc2l0aW9uJyk7XG5cdFx0XHR9LFxuXHRcdFx0Y3NzYW5pbWF0aW9uczogZnVuY3Rpb24oKSB7XG5cdFx0XHRcdHJldHVybiAhIXRlc3QoJ2FuaW1hdGlvbicpO1xuXHRcdFx0fVxuXHRcdH07XG5cblx0ZnVuY3Rpb24gdGVzdChwcm9wZXJ0eSwgcHJlZml4ZWQpIHtcblx0XHR2YXIgcmVzdWx0ID0gZmFsc2UsXG5cdFx0XHR1cHBlciA9IHByb3BlcnR5LmNoYXJBdCgwKS50b1VwcGVyQ2FzZSgpICsgcHJvcGVydHkuc2xpY2UoMSk7XG5cblx0XHQkLmVhY2goKHByb3BlcnR5ICsgJyAnICsgcHJlZml4ZXMuam9pbih1cHBlciArICcgJykgKyB1cHBlcikuc3BsaXQoJyAnKSwgZnVuY3Rpb24oaSwgcHJvcGVydHkpIHtcblx0XHRcdGlmIChzdHlsZVtwcm9wZXJ0eV0gIT09IHVuZGVmaW5lZCkge1xuXHRcdFx0XHRyZXN1bHQgPSBwcmVmaXhlZCA/IHByb3BlcnR5IDogdHJ1ZTtcblx0XHRcdFx0cmV0dXJuIGZhbHNlO1xuXHRcdFx0fVxuXHRcdH0pO1xuXG5cdFx0cmV0dXJuIHJlc3VsdDtcblx0fVxuXG5cdGZ1bmN0aW9uIHByZWZpeGVkKHByb3BlcnR5KSB7XG5cdFx0cmV0dXJuIHRlc3QocHJvcGVydHksIHRydWUpO1xuXHR9XG5cblx0aWYgKHRlc3RzLmNzc3RyYW5zaXRpb25zKCkpIHtcblx0XHQvKiBqc2hpbnQgLVcwNTMgKi9cblx0XHQkLnN1cHBvcnQudHJhbnNpdGlvbiA9IG5ldyBTdHJpbmcocHJlZml4ZWQoJ3RyYW5zaXRpb24nKSlcblx0XHQkLnN1cHBvcnQudHJhbnNpdGlvbi5lbmQgPSBldmVudHMudHJhbnNpdGlvbi5lbmRbICQuc3VwcG9ydC50cmFuc2l0aW9uIF07XG5cdH1cblxuXHRpZiAodGVzdHMuY3NzYW5pbWF0aW9ucygpKSB7XG5cdFx0LyoganNoaW50IC1XMDUzICovXG5cdFx0JC5zdXBwb3J0LmFuaW1hdGlvbiA9IG5ldyBTdHJpbmcocHJlZml4ZWQoJ2FuaW1hdGlvbicpKVxuXHRcdCQuc3VwcG9ydC5hbmltYXRpb24uZW5kID0gZXZlbnRzLmFuaW1hdGlvbi5lbmRbICQuc3VwcG9ydC5hbmltYXRpb24gXTtcblx0fVxuXG5cdGlmICh0ZXN0cy5jc3N0cmFuc2Zvcm1zKCkpIHtcblx0XHQvKiBqc2hpbnQgLVcwNTMgKi9cblx0XHQkLnN1cHBvcnQudHJhbnNmb3JtID0gbmV3IFN0cmluZyhwcmVmaXhlZCgndHJhbnNmb3JtJykpO1xuXHRcdCQuc3VwcG9ydC50cmFuc2Zvcm0zZCA9IHRlc3RzLmNzc3RyYW5zZm9ybXMzZCgpO1xuXHR9XG5cbn0pKHdpbmRvdy5aZXB0byB8fCB3aW5kb3cualF1ZXJ5LCB3aW5kb3csIGRvY3VtZW50KTtcbiJdLCJzb3VyY2VSb290IjoiIn0=