"use strict";
self["webpackHotUpdatepractice"](0,{

/***/ 27:
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
Object(function webpackMissingModule() { var e = new Error("Cannot find module './heading.css'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());


class Heading {
    render() {
        const h1 = document.createElement('h1');
        const body = document.querySelector('body');
        h1.innerHTML = 'Webpack is awesome';
        body.appendChild(h1);
    }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Heading);

/***/ }),

/***/ 38:
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _wok_jpg__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(39);
Object(function webpackMissingModule() { var e = new Error("Cannot find module './work.scss'"); e.code = 'MODULE_NOT_FOUND'; throw e; }());



class WorkImage {
    render() {
        const img = document.createElement('img');
        img.src = _wok_jpg__WEBPACK_IMPORTED_MODULE_0__;
        img.alt = "Work Image";
        img.classList.add('kiwi-image');

        const bodyDomElement = document.querySelector('body');
        bodyDomElement.appendChild(img);
    }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (WorkImage);

/***/ })

},
/******/ function(__webpack_require__) { // webpackRuntimeModules
/******/ /* webpack/runtime/getFullHash */
/******/ (() => {
/******/ 	__webpack_require__.h = () => ("bb16dd8065fe33ef6f75")
/******/ })();
/******/ 
/******/ }
);