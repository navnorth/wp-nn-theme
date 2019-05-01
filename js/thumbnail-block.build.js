/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ([
/* 0 */
/***/ (function(module, exports) {

var __ = wp.i18n.__;
var _wp$editor = wp.editor,
    RichText = _wp$editor.RichText,
    MediaUpload = _wp$editor.MediaUpload,
    PlainText = _wp$editor.PlainText,
    InspectorControls = _wp$editor.InspectorControls;
var registerBlockType = wp.blocks.registerBlockType;
var _wp$components = wp.components,
    Button = _wp$components.Button,
    TextControl = _wp$components.TextControl,
    CheckboxControl = _wp$components.CheckboxControl;
var Component = wp.element.Component.Component;


wp.blocks.registerBlockType('wp-nn-theme/thumbnail-block', {
    title: 'Thumbnail Block',
    category: 'common',
    icon: 'format-image',
    attributes: {
        image_url: { type: 'string', default: wp_nn_theme.theme_path + '/images/default-image.png' },
        link_label: { type: 'string' },
        link_url: { type: 'string' },
        new_tab: { type: 'boolean' }
    },
    edit: function edit(props) {
        var attributes = props.attributes,
            className = props.className,
            setAttributes = props.setAttributes;


        var openLink = '';
        var imgUrl = wp_nn_theme.theme_path + '/images/default-image.png';
        if (attributes.new_tab) {
            openLink = '_blank';
        }

        if (attributes.image_url) {
            imgUrl = attributes.image_url;
        }

        function changeLinkLabel(changedLabel) {
            setAttributes({
                link_label: changedLabel
            });
        }

        function changeLinkUrl(changedUrl) {
            setAttributes({
                link_url: changedUrl
            });
        }

        function changeNewTab(checked) {
            setAttributes({
                new_tab: checked
            });
        }

        function changeImage(image) {
            setAttributes({
                image_url: image.sizes.full.url
            });
        }

        return [wp.element.createElement(
            InspectorControls,
            { key: 'inspector' },
            wp.element.createElement(
                'div',
                { style: { padding: '1em 0' } },
                wp.element.createElement(
                    'div',
                    { className: 'wp-nn-thumbnail-select-label' },
                    wp.element.createElement(
                        'label',
                        null,
                        wp.element.createElement(
                            'strong',
                            null,
                            'Select an Image:'
                        )
                    )
                ),
                wp.element.createElement(
                    'div',
                    { className: 'wp-nn-inspector-thumbnail-display' },
                    wp.element.createElement('img', { className: 'wp-nn-inspector-thumbnail-image', src: attributes.image_url }),
                    wp.element.createElement(MediaUpload, {
                        onSelect: changeImage,
                        type: 'image',
                        value: attributes.image_url,
                        render: function render(_ref) {
                            var open = _ref.open;
                            return wp.element.createElement(
                                'button',
                                { className: 'wp-nn-inspector-thumbnail-select-button', onClick: open },
                                'Upload Image'
                            );
                        }
                    })
                ),
                wp.element.createElement(TextControl, { onChange: changeLinkLabel, value: attributes.link_label, label: __('Link Label') }),
                wp.element.createElement(TextControl, { onChange: changeLinkUrl, value: attributes.link_url, label: __('Link Url') }),
                wp.element.createElement(CheckboxControl, {
                    label: __('Open Link in New Tab'),
                    checked: attributes.new_tab,
                    onChange: changeNewTab })
            )
        ), wp.element.createElement(
            'div',
            { className: className },
            wp.element.createElement(
                'div',
                { className: 'wp-nn-thumbnail-media' },
                wp.element.createElement('img', { src: attributes.image_url }),
                wp.element.createElement(
                    'div',
                    { className: 'wp-nn-thumbnail-desc' },
                    wp.element.createElement(
                        'a',
                        { className: 'wp-nn-thumbnail-link', href: attributes.link_url, target: openLink },
                        attributes.link_label
                    )
                )
            )
        )];
    },
    save: function save(props) {
        var className = props.className,
            attributes = props.attributes;

        return wp.element.createElement(
            'div',
            { className: className },
            wp.element.createElement(
                'div',
                { className: 'wp-nn-thumbnail-media' },
                wp.element.createElement('img', { src: attributes.image_url }),
                wp.element.createElement(
                    'div',
                    { className: 'wp-nn-thumbnail-desc' },
                    wp.element.createElement(
                        'a',
                        { className: 'wp-nn-thumbnail-link', href: attributes.link_url, target: attributes.new_tab },
                        attributes.link_label
                    )
                )
            )
        );
    }
});

/***/ })
/******/ ]);