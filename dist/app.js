/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/_nav.js":
/*!*********************!*\
  !*** ./src/_nav.js ***!
  \*********************/
/***/ (() => {

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
        }, index * 100); // Change time delay (in milisec)
      });
    } else {
      mobMenu.attr("data-visible", "false");
      mobMenu.removeClass("open");
      menuToggle.removeClass("change");

      // Ukloni "active" klasu sa linkova kada se meni zatvori
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

// import './_three.min';
// import './_mobi-ver.js';
// import './_jquery.js';

//Ip Check Script
// document.addEventListener("DOMContentLoaded", function() {
//     // Koristimo javnu uslugu za dobijanje IP adrese klijenta
//     fetch("https://ipapi.co/json/")
//       .then(response => response.json())
//       .then(data => {
//         const clientIP = data.ip;
//         // console.log(clientIP);
//         // Prikazujemo IP adresu na stranici
//         document.getElementById("client-ip").textContent = "Vaša IP adresa: " + clientIP;
//       })
//       .catch(error => {
//         console.error("Greška prilikom dobijanja IP adrese: " + error);
//       });

//   });

document.addEventListener("DOMContentLoaded", function () {
  // Koristimo javnu uslugu za dobijanje IP adrese klijenta
  fetch("https://ipapi.co/json/").then(function (response) {
    return response.json();
  }).then(function (data) {
    var clientIP = data.ip;

    // Prikazujemo IP adresu na stranici
    var clientIpElement = document.getElementById("client-ip");
    clientIpElement.innerHTML = " Your IP Address : <span class='ip-address'>" + clientIP + "</span>";

    // Dodajemo CSS stil samo za tekstualni sadržaj unutar elementa sa klasom "ip-address"
    var ipAddressElement = document.querySelector('.ip-address');
    ipAddressElement.style.color = "#008000";
    ipAddressElement.style.fontSize = "32px";
  })["catch"](function (error) {
    console.error("Greška prilikom dobijanja IP adrese: " + error);
  });
});

// const sphere = document.getElementById('sphere');

// let isDragging = false;
// let previousX = 0;
// let previousY = 0;

// sphere.addEventListener('mousedown', (e) => {
//     isDragging = true;
//     previousX = e.clientX;
//     previousY = e.clientY;
// });

// document.addEventListener('mouseup', () => {
//     isDragging = false;
// });

// document.addEventListener('mousemove', (e) => {
//     if (isDragging) {
//         const deltaX = e.clientX - previousX;
//         const deltaY = e.clientY - previousY;

//         const sphere = document.getElementById('sphere');
//         const currentRotation = getComputedStyle(sphere).transform;

//         const match = currentRotation.match(/matrix3d\(([^)]+)\)/);

//         if (match) {
//             const values = match[1].split(', ');
//             const rotateX = (parseFloat(values[12]) || 0) + deltaX;
//             const rotateY = (parseFloat(values[13]) || 0) - deltaY;
//             sphere.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
//         }

//         previousX = e.clientX;
//         previousY = e.clientY;
//     }
// });

//   document.addEventListener("DOMContentLoaded", function () {
//     const notification = document.getElementById("#show-notification");
//     const updateLink = document.getElementById("update-link");

//     // Proveri uslov da bi prikazao Update ili nesto
//     const shouldShowNotification = true;

//     if (shouldShowNotification) {
//         notification.style.display = "block";

//         // Rutina za klikom na link
//         updateLink.addEventListener("click", function (event) {
//             event.preventDefault();
//             // Ovdje dodajte kod za prikaz detalja ažuriranja
//         });
//     }
// });

// Add this JavaScript code
jQuery(document).ready(function ($) {
  $('#activate-plugin-button').on('click', function () {
    if (confirm("Do you want to install and activate the plugin?")) {
      // Trigger an AJAX request to install and activate the plugin
      $.ajax({
        url: ajaxurl,
        // WordPress AJAX URL
        type: 'GET',
        data: {
          action: 'install_and_activate_plugin'
        },
        success: function success(response) {
          alert(response); // Display the response (success or error message)
        },

        error: function error(_error) {
          console.error(_error);
        }
      });
    } else {
      alert("Plugin installation and activation canceled by the user.");
    }
  });
});

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