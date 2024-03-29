/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/modules/CategoryDisplay.js":
/*!****************************************!*\
  !*** ./src/modules/CategoryDisplay.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class CategoryDisplay {
  constructor() {
    this.arrows = document.querySelectorAll('.arrow');
    this.events();
  }
  events() {
    this.arrows.forEach(arrow => {
      arrow.addEventListener('click', e => {
        e.preventDefault();
        let parentSection = arrow.parentElement.querySelector('.category-children');
        if (parentSection.classList.contains('not-displayed')) {
          parentSection.classList.remove('not-displayed');
          arrow.classList.add('fa-caret-up');
          arrow.classList.remove('fa-caret-down');
        } else {
          parentSection.classList.add('not-displayed');
          arrow.classList.add('fa-caret-down');
          arrow.classList.remove('fa-caret-up');
        }
      });
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (CategoryDisplay);

/***/ }),

/***/ "./src/modules/FrontDisplay.js":
/*!*************************************!*\
  !*** ./src/modules/FrontDisplay.js ***!
  \*************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class FrontDisplay {
  constructor() {
    this.leaves = document.querySelectorAll('.leaf');
    this.events();
  }
  events() {
    this.leaves.forEach(leaf => {
      leaf.addEventListener('click', e => {
        e.preventDefault();
        let parentSection = leaf.parentElement.parentElement.querySelector('.sub-leaf-section');
        if (parentSection.classList.contains('not-displayed')) {
          parentSection.classList.remove('not-displayed');
        } else {
          parentSection.classList.add('not-displayed');
        }
      });
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (FrontDisplay);

/***/ }),

/***/ "./src/modules/MobileMenu.js":
/*!***********************************!*\
  !*** ./src/modules/MobileMenu.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class MobileMenu {
  // 1. describe and create/initiate object
  constructor() {
    this.openButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".site-header__menu-trigger");
    this.closeButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".menu-overlay__close");
    this.searchOverlay = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".menu-overlay");
    this.events();
    this.isOverlayOpen = false;
  }
  // 2. events
  events() {
    this.openButton.on("click", this.openOverlay.bind(this));
    this.closeButton.on("click", this.closeOverlay.bind(this));
  }

  // 3. methods (functions, actions...)
  openOverlay() {
    this.searchOverlay.addClass("search-overlay--active");
    jquery__WEBPACK_IMPORTED_MODULE_0___default()("body").addClass("body-no-scroll");
    this.isOverlayOpen = true;
  }
  closeOverlay() {
    this.searchOverlay.removeClass("search-overlay--active");
    jquery__WEBPACK_IMPORTED_MODULE_0___default()("body").removeClass("body-no-scroll");
    this.isOverlayOpen = false;
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (MobileMenu);

/***/ }),

/***/ "./src/modules/ReaderSettings.js":
/*!***************************************!*\
  !*** ./src/modules/ReaderSettings.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class Settings {
  // 1. describe and create/initiate object
  constructor() {
    this.addSettingsHTML();
    this.settingsOverlay = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".tomc-settings-overlay");
    this.openButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".js-settings-trigger");
    this.closeButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".search-overlay__close");
    this.saveLanguageSettingsButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#tomc-reader-settings--save-language-settings");
    this.saveTriggerSettingsButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#tomc-reader-settings--save-trigger-settings");
    this.events();
    this.isOverlayOpen = false;
    this.chosenWarnings = [];
    this.chosenLanguages = [];
  }
  // 2. events
  events() {
    this.openButton.on("click", this.openSettingsOverlay.bind(this));
    this.closeButton.on("click", this.closeOverlay.bind(this));
    this.saveLanguageSettingsButton.on("click", this.saveLanguageSettings.bind(this));
    this.saveTriggerSettingsButton.on("click", this.saveTriggerSettings.bind(this));
  }

  // 3. methods (functions, actions...)
  addSettingsHTML() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('body').append(`
            <div class="tomc-settings-overlay">
                <div class="orange-translucent-background">
                    <div class="overlay-main-container"> 
                        <i class="fa fa-window-close search-overlay__close" aria-hidden = "true"></i>
                        <br>
                        <h1 class="centered-text">My Settings</h1>
                    </div>
                </div>
                <div class="settings-overlay--section">
                    <h2 class="centered-text">My Triggers</h2>
                    <p class="centered-text">Select triggers you want to avoid and we won't include books that have been tagged with them in your search results.</p>
                    <div id="settings-overlay--triggers-container" class="tomc-book-organization--options-container"></div>
                    <a href="#"><p class="centered-text">suggest a new trigger warning</p></a>
                    <p class="centered-text" style="display:none;" id="tomc-reader-settings-trigger-settings-saved-message">settings saved</p>
                    <button class="purple-button" id="tomc-reader-settings--save-trigger-settings">save trigger settings</button>
                </div>
                <div class="settings-overlay--section">
                    <h2 class="centered-text">Languages I Read</h2>
                    <p class="centered-text">Select languages you read and we'll include books tagged with them in your search results.</p>
                    <div id="settings-overlay--languages-container" class="tomc-book-organization--options-container"></div>
                    <p class="centered-text" style="display:none;" id="tomc-reader-settings-language-settings-saved-message">settings saved</p>
                    <button class="purple-button" id="tomc-reader-settings--save-language-settings">save language settings</button>
                </div>
            </div>
        `);
  }
  closeOverlay() {
    this.settingsOverlay.removeClass("search-overlay--active");
    jquery__WEBPACK_IMPORTED_MODULE_0___default()("#settings-overlay--triggers-container").html('');
    jquery__WEBPACK_IMPORTED_MODULE_0___default()("#settings-overlay--languages-container").html('');
    this.chosenLanguages = [];
    this.chosenWarnings = [];
    jquery__WEBPACK_IMPORTED_MODULE_0___default()("body").removeClass("body-no-scroll");
    this.isOverlayOpen = false;
  }
  toggleWarningSelection(e) {
    let labelName = jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).text();
    if (jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).hasClass('tomc-book-organization--option-selected')) {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).removeClass('tomc-book-organization--option-selected');
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).attr('aria-label', labelName + ' is not selected');
      for (let i = 0; i < this.chosenWarnings.length; i++) {
        if (this.chosenWarnings[i] == jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).data('warning-id')) {
          this.chosenWarnings.splice(i, 1);
        }
      }
    } else {
      this.chosenWarnings.push(jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).data('warning-id'));
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).addClass('tomc-book-organization--option-selected');
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).attr('aria-label', labelName + ' is selected');
    }
  }
  toggleLanguageSelection(e) {
    let labelName = jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).text();
    if (jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).hasClass('tomc-book-organization--option-selected')) {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).removeClass('tomc-book-organization--option-selected');
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).attr('aria-label', labelName + ' is not selected');
      for (let i = 0; i < this.chosenLanguages.length; i++) {
        if (this.chosenLanguages[i] == jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).data('language-id')) {
          this.chosenLanguages.splice(i, 1);
        }
      }
    } else {
      this.chosenLanguages.push(jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).data('language-id'));
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).addClass('tomc-book-organization--option-selected');
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).attr('aria-label', labelName + ' is selected');
    }
  }

  //potentially add below to the html when suggestions functionality added-----------------------
  // <div class="settings-overlay--section">
  //     <h2 class="centered-text">My Favorite Genres</h2>
  //     <div id="settings-overlay--genres-2-container"></div>
  //     <h2 class="centered-text">My Favorite Topics</h2>
  //     <div id="settings-overlay--genres-3-container"></div>
  // </div>
  openSettingsOverlay() {
    if (!this.isOverlayOpen) {
      this.isOverlayOpen = true;
      jquery__WEBPACK_IMPORTED_MODULE_0___default().ajax({
        beforeSend: xhr => {
          xhr.setRequestHeader('X-WP-Nonce', marketplaceData.nonce);
        },
        url: tomcBookorgData.root_url + '/wp-json/tomcReaderSettings/v1/getReaderSettings',
        type: 'GET',
        success: response => {
          console.log(response);
          for (let i = 0; i < response.length; i++) {
            if (response[i]['settingtype'] == 'trigger') {
              if (response[i]['triggerid']) {
                this.newSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<span />').addClass('tomc-book-organization--option-span tomc-book-organization--option-selected').attr('data-warning-id', response[i]['id']).attr('aria-label', response[i]['warning_name'] + ' is selected').html(response[i]['warning_name']).on('click', this.toggleWarningSelection.bind(this));
                this.chosenWarnings.push(Number(response[i]['id']));
              } else {
                this.newSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<span />').addClass('tomc-book-organization--option-span').attr('data-warning-id', response[i]['id']).attr('aria-label', response[i]['warning_name'] + ' is not selected').html(response[i]['warning_name']).on('click', this.toggleWarningSelection.bind(this));
              }
              jquery__WEBPACK_IMPORTED_MODULE_0___default()("#settings-overlay--triggers-container").append(this.newSpan);
            } else if (response[i]['settingtype'] == 'language') {
              if (response[i]['languageid']) {
                this.newSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<span />').addClass('tomc-book-organization--option-span tomc-book-organization--option-selected').attr('data-language-id', response[i]['id']).attr('aria-label', response[i]['language_name'] + ' is selected').html(response[i]['language_name']).on('click', this.toggleLanguageSelection.bind(this));
                this.chosenLanguages.push(Number(response[i]['id']));
              } else {
                this.newSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<span />').addClass('tomc-book-organization--option-span').attr('data-language-id', response[i]['id']).attr('aria-label', response[i]['language_name'] + ' is not selected').html(response[i]['language_name']).on('click', this.toggleLanguageSelection.bind(this));
              }
              jquery__WEBPACK_IMPORTED_MODULE_0___default()("#settings-overlay--languages-container").append(this.newSpan);
            }
          }
          this.settingsOverlay.addClass("search-overlay--active");
          jquery__WEBPACK_IMPORTED_MODULE_0___default()("body").addClass("body-no-scroll");
        },
        error: response => {
          console.log('error getting triggers');
          console.log(response);
        }
      });
    }
  }
  saveLanguageSettings() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default().ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader('X-WP-Nonce', marketplaceData.nonce);
      },
      url: tomcBookorgData.root_url + '/wp-json/tomcReaderSettings/v1/saveLanguageSettings',
      type: 'POST',
      data: {
        'languages': JSON.stringify(this.chosenLanguages)
      },
      success: response => {
        console.log(response);
        jquery__WEBPACK_IMPORTED_MODULE_0___default()("#tomc-reader-settings-language-settings-saved-message").fadeIn().delay(3000).fadeOut();
      },
      error: response => {
        console.log(response);
      }
    });
  }
  saveTriggerSettings() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default().ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader('X-WP-Nonce', marketplaceData.nonce);
      },
      url: tomcBookorgData.root_url + '/wp-json/tomcReaderSettings/v1/saveTriggerSettings',
      type: 'POST',
      data: {
        'triggers': JSON.stringify(this.chosenWarnings)
      },
      success: response => {
        jquery__WEBPACK_IMPORTED_MODULE_0___default()("#tomc-reader-settings-trigger-settings-saved-message").fadeIn().delay(3000).fadeOut();
      },
      error: response => {
        console.log(response);
      }
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Settings);

/***/ }),

/***/ "./src/modules/search.js":
/*!*******************************!*\
  !*** ./src/modules/search.js ***!
  \*******************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class Search {
  // 1. describe and create/initiate object
  constructor() {
    this.addSearchHTML();
    this.resultsDiv = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#search-overlay__results");
    this.openButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".js-search-trigger");
    this.closeButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".search-overlay__close");
    this.searchOverlay = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".search-overlay");
    this.searchField = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#search-term");
    this.events();
    this.isOverlayOpen = false;
    this.isSpinnerVisible = false;
    this.previousValue;
    this.typingTimer;
  }
  // 2. events
  events() {
    this.openButton.on("click", this.openOverlay.bind(this));
    this.closeButton.on("click", this.closeOverlay.bind(this));
    jquery__WEBPACK_IMPORTED_MODULE_0___default()(document).on("keydown", this.keyPressDispatcher.bind(this));
    this.searchField.on("keyup", this.typingLogic.bind(this));
  }

  // 3. methods (functions, actions...)
  openOverlay() {
    this.searchOverlay.addClass("search-overlay--active");
    jquery__WEBPACK_IMPORTED_MODULE_0___default()("body").addClass("body-no-scroll");
    this.searchField.val('');
    setTimeout(() => this.searchField.focus(), 301);
    this.isOverlayOpen = true;
    return false;
  }
  closeOverlay() {
    this.searchOverlay.removeClass("search-overlay--active");
    this.resultsDiv.html('');
    jquery__WEBPACK_IMPORTED_MODULE_0___default()("body").removeClass("body-no-scroll");
    this.isOverlayOpen = false;
  }
  typingLogic() {
    if (this.searchField.val() != this.previousValue) {
      clearTimeout(this.typingTimer);
      if (this.searchField.val()) {
        if (!this.isSpinnerVisible) {
          this.resultsDiv.html('<div class="generic-content"><div class="spinner-loader"></div></div>');
          this.isSpinnerVisible = true;
        }
        this.typingTimer = setTimeout(this.getResults.bind(this), 800);
      } else {
        this.resultsDiv.html('');
        this.isSpinnerVisible = false;
      }
    }
    this.previousValue = this.searchField.val();
  }
  getResults() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default().getJSON(marketplaceData.root_url + "/wp-json/ebookMarketplace/v1/search?term=" + this.searchField.val(), results => {
      this.resultsDiv.html(`
            <div class="search-result">
            ${results.length ? '' : "<p>Sorry! We weren't able to find anything that matches that search.</p>"}
                ${results.map(item => `
                    <li>
                    ${item.posttype == "author-profile" ? "See books by author " : ''}
                    ${item.posttype == "curations" ? "Check out the curated bookshelf " : ""} 
                        <a href="${item.permalink}">
                            ${item.thumbnail ? `<img src="${item.thumbnail}" />` : ''} 
                            ${item.title}
                        </a>
                        ${item.posttype == "product" && item.title != "Gift Card" ? `<br> by ${item.productauthor}` : ""} 
                        ${item.posttype == "short" ? `<br> by ${item.shortauthor}` : ""}
                        ${item.excerpt ? '<br><br>' + item.excerpt : ''}
                    </li>`).join("")}
            ${results.length ? "</li></div>" : '</div>'}
            `);
      this.isSpinnerVisible = false;
    });
  }
  keyPressDispatcher(e) {
    if (e.keyCode == 83 && !this.isOverlayOpen && !jquery__WEBPACK_IMPORTED_MODULE_0___default()("input, textarea").is(':focus')) {
      this.openOverlay();
    }
    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }
  addSearchHTML() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('body').append(`
            <div class="search-overlay">
                <div class="search-overlay__top">
                    <div class="overlay-main-container"> 
                    <i class="fa fa-window-close search-overlay__close" aria-hidden = "true"></i>
                    <div class="overlay-input-container">
                        <i class="fa fa-search search-overlay__icon" aria-hidden = "true"></i>
                        <input type="text" class="search-term" placeholder = "What are you looking for?" id = "search-term">
                    </div>
                    </div>
                </div>

                <div class="container">
                    <div id="search-overlay__results">
                    </div>
                </div>
            </div>
        `);
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Search);

/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/***/ ((module) => {

module.exports = window["jQuery"];

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
/************************************************************************/
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
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_search__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/search */ "./src/modules/search.js");
/* harmony import */ var _modules_MobileMenu__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/MobileMenu */ "./src/modules/MobileMenu.js");
/* harmony import */ var _modules_CategoryDisplay__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/CategoryDisplay */ "./src/modules/CategoryDisplay.js");
/* harmony import */ var _modules_FrontDisplay__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./modules/FrontDisplay */ "./src/modules/FrontDisplay.js");
/* harmony import */ var _modules_ReaderSettings__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./modules/ReaderSettings */ "./src/modules/ReaderSettings.js");





const mobileMenu = new _modules_MobileMenu__WEBPACK_IMPORTED_MODULE_1__["default"]();
const marketplaceSearch = new _modules_search__WEBPACK_IMPORTED_MODULE_0__["default"]();
const categoryDisplay = new _modules_CategoryDisplay__WEBPACK_IMPORTED_MODULE_2__["default"]();
const frontDisplay = new _modules_FrontDisplay__WEBPACK_IMPORTED_MODULE_3__["default"]();
const readerSettings = new _modules_ReaderSettings__WEBPACK_IMPORTED_MODULE_4__["default"]();
})();

/******/ })()
;
//# sourceMappingURL=index.js.map