/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/_mobi-ver.js":
/*!**************************!*\
  !*** ./src/_mobi-ver.js ***!
  \**************************/
/***/ (() => {

// Postavite vrednost CSS varijable --mobile-width na 480px
// $('html').css('--mobile-width', '480px');

// document.documentElement.style.setProperty('--mobile-width', '768px');

/***/ }),

/***/ "./src/_nav.js":
/*!*********************!*\
  !*** ./src/_nav.js ***!
  \*********************/
/***/ (() => {

// document.addEventListener('DOMContentLoaded', function () {
//     const mobMenu = document.querySelector(".mob-menu");
//     const menuToggle = document.querySelector(".hamburger");

//     menuToggle.addEventListener('click', function () {
//         const visibility = mobMenu.getAttribute('data-visible');

//         if (visibility === "false") {
//             mobMenu.setAttribute("data-visible", "true");
//             mobMenu.addClass("open");
//             menuToggle.classList.add('change');
//         } else {
//             mobMenu.setAttribute("data-visible", "false");
//             mobMenu.removeClass("open");
//             menuToggle.classList.remove('change');
//         }

//         console.log(visibility);
//     });
// });

// jQuery(document).ready(function($) {
//     var mobMenu = $(".mob-menu");
//     var menuToggle = $(".hamburger");

//     menuToggle.on("click", function() {
//         var visibility = mobMenu.attr("data-visible");

//         if (visibility === "false") {
//             mobMenu.attr("data-visible", "true");
//             mobMenu.addClass("open");
//             menuToggle.addClass("change");
//         } else {
//             mobMenu.attr("data-visible", "false");
//             mobMenu.removeClass("open");
//             menuToggle.removeClass("change");
//         }

//         console.log(visibility);
//     });
// });

jQuery(document).ready(function ($) {
  var mobMenu = $(".mob-menu");
  var menuToggle = $(".hamburger");
  menuToggle.on("click", function () {
    var visibility = mobMenu.attr("data-visible");
    if (visibility === "false") {
      mobMenu.attr("data-visible", "true");
      mobMenu.addClass("open");
      // mobMenu.addClass("active");
      menuToggle.addClass("change");

      // Nakon otvaranja menija, postepeno prikaži linkove iz navigacionog menija
      var navLinks = $('.phone-menu li');
      navLinks.each(function (index) {
        var link = $(this);
        setTimeout(function () {
          link.addClass('active');
        }, index * 100); // Promenite vreme kašnjenja (u milisekundama) po potrebi
      });
    } else {
      mobMenu.attr("data-visible", "false");
      mobMenu.removeClass("open");
      menuToggle.removeClass("change");

      // Ukloniti "active" klasu sa linkova kada se meni zatvori
      var navLinks = $('.phone-menu li');
      navLinks.removeClass('active');
      // mobMenu.removeClass("active");
    }

    // console.log(visibility);
  });
});

/***/ }),

/***/ "./src/app.js":
/*!********************!*\
  !*** ./src/app.js ***!
  \********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _nav_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_nav.js */ "./src/_nav.js");
/* harmony import */ var _nav_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_nav_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _mobi_ver_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./_mobi-ver.js */ "./src/_mobi-ver.js");
/* harmony import */ var _mobi_ver_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_mobi_ver_js__WEBPACK_IMPORTED_MODULE_1__);


$(document).ready(function () {
  $('#update-button').click(function () {
    // Pozivanje funkcije plug_update_version() kada korisnik klikne na dugme
    my_theme_update_available();
  });
});
document.addEventListener("DOMContentLoaded", function () {
  var notification = document.getElementById("update-notification");
  var updateLink = document.getElementById("update-link");

  // Proveri uslov da bi prikazao Update ili nesto
  var shouldShowNotification = true;
  if (shouldShowNotification) {
    notification.style.display = "block";

    // Rutina za klikom na link
    updateLink.addEventListener("click", function (event) {
      event.preventDefault();
      // Ovdje dodajte kod za prikaz detalja ažuriranja
    });
  }
});

// document.addEventListener("DOMContentLoaded", function() {
//     // Proverite da li pregledač podržava notifikacije
//     if (!("Notification" in window)) {
//       console.log("Vaš pregledač ne podržava notifikacije.");
//     } else {
//       // Proverite da li korisnik već dozvoljava notifikacije
//       if (Notification.permission === "granted") {
//         // Ako već ima dozvolu, možemo prikazati notifikaciju
//         showNotification();
//       } else if (Notification.permission !== "denied") {
//         // Ako korisnik nije odabrao još, pitajte za dozvolu
//         document.querySelector("#show-notification").addEventListener("click", requestNotificationPermission);
//       }
//     }
//   });

//   function requestNotificationPermission() {
//     Notification.requestPermission().then(function(permission) {
//       if (permission === "granted") {
//         showNotification();
//       }
//     });
//   }

//   function showNotification() {
//     var notificationOptions = {
//       body: "Ovo je vaša notifikacija.",
//       icon: "URL-DO-IKONICE" // Dodajte URL do ikonice koju želite koristiti
//     };

//     var notification = new Notification("Naslov notifikacije", notificationOptions);
//   }

/***/ }),

/***/ "./src/app.scss":
/*!**********************!*\
  !*** ./src/app.scss ***!
  \**********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"/dist/app": 0,
/******/ 			"dist/app": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = self["webpackChunksas_theme"] = self["webpackChunksas_theme"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	__webpack_require__.O(undefined, ["dist/app"], () => (__webpack_require__("./src/app.js")))
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["dist/app"], () => (__webpack_require__("./src/app.scss")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;