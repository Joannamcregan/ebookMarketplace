/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/modules/AddProductExtension.js":
/*!********************************************!*\
  !*** ./src/modules/AddProductExtension.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class AddProductExtension {
  constructor() {
    this.mvxSubmit = jquery__WEBPACK_IMPORTED_MODULE_0___default()('input#mvx_frontend_dashboard_product_submit');
    this.scheduleSaleButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".sale_schedule");
    this.regularPrice = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#_regular_price');
    this.salePrice = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#_sale_price');
    this.manageStockCheckbox = jquery__WEBPACK_IMPORTED_MODULE_0___default()('input#_manage_stock');
    this.stockFieldGroup = jquery__WEBPACK_IMPORTED_MODULE_0___default()('div.stock_fields');
    this.stockInput = jquery__WEBPACK_IMPORTED_MODULE_0___default()('input#_stock');
    this.gtinInput = jquery__WEBPACK_IMPORTED_MODULE_0___default()('input[name="_mvx_gtin_code"]');
    this.productTitleSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()('.product-title-wrap');
    this.virtualCheckbox = jquery__WEBPACK_IMPORTED_MODULE_0___default()('input#_virtual');
    this.downloadableCheckbox = jquery__WEBPACK_IMPORTED_MODULE_0___default()('input#_downloadable');
    this.serviceCatCheckbox = jquery__WEBPACK_IMPORTED_MODULE_0___default()('ul.product_cat input[value=53]'); //58 for dev, 53 for prod
    this.paperbackCatCheckbox = jquery__WEBPACK_IMPORTED_MODULE_0___default()('ul.product_cat input[value=84]'); //51 for dev, 84 for prod
    this.hardcoverCatCheckbox = jquery__WEBPACK_IMPORTED_MODULE_0___default()('ul.product_cat input[value=85]'); //50 for dev, 85 for prod
    this.ebookCatCheckbox = jquery__WEBPACK_IMPORTED_MODULE_0___default()('ul.product_cat input[value=49]'); //48 for dev, 49 for prod
    this.audiobookCatCheckbox = jquery__WEBPACK_IMPORTED_MODULE_0___default()('ul.product_cat input[value=50]'); //49 for dev, 50 for prod
    this.physicalZineCheckbox = jquery__WEBPACK_IMPORTED_MODULE_0___default()('ul.product_cat input[value=86]'); //55 for dev, 86 for prod
    this.digitalZineCheckbox = jquery__WEBPACK_IMPORTED_MODULE_0___default()('ul.product_cat input[value=75]'); //56 for dev, 75 for prod
    this.uncategorizedCatCheckbox = jquery__WEBPACK_IMPORTED_MODULE_0___default()('ul.product_cat input[value=16]'); //16 for dev, somehow also 16 for prod
    this.catCheckboxes = jquery__WEBPACK_IMPORTED_MODULE_0___default()('ul.product_cat input[type=checkbox]');
    this.taxStatusDropdown = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#_tax_status');
    this.taxClassDropdown = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#_tax_class');
    this.titleInput = jquery__WEBPACK_IMPORTED_MODULE_0___default()('span.editing-content > input#post_title');
    this.downloadableDiv = jquery__WEBPACK_IMPORTED_MODULE_0___default()('div.show_if_downloadable');
    this.couponTitle = jquery__WEBPACK_IMPORTED_MODULE_0___default()('div.coupon-primary-info input#post_title');
    this.weightField = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#shipping_product_data input#_weight');
    this.perProductInsert = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#shipping_product_data a.insert');
    this.reviewButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc_mvx_frontend_dashboard_product_check');
    this.uploadImgButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()('a.upload_image_button');
    this.events();
  }
  events() {
    this.scheduleSaleButton.on('click', this.checkSalesPrices.bind(this));
    this.gtinInput.on('focusout', this.checkIsbn.bind(this));
    this.regularPrice.on('focusout', this.checkPrices.bind(this));
    this.downloadableCheckbox.on('change', this.updateCheckboxesDownloadable.bind(this));
    this.serviceCatCheckbox.on('change', this.updateCheckboxesService.bind(this));
    this.paperbackCatCheckbox.on('change', this.updateCheckboxesPaperback.bind(this));
    this.hardcoverCatCheckbox.on('change', this.updateCheckboxesHardcover.bind(this));
    this.ebookCatCheckbox.on('change', this.updateCheckboxesEbook.bind(this));
    this.audiobookCatCheckbox.on('change', this.updateCheckboxesAudiobook.bind(this));
    this.physicalZineCheckbox.on('change', this.updateCheckboxesPhysicalZine.bind(this));
    this.digitalZineCheckbox.on('change', this.updateCheckboxesDigitalZine.bind(this));
    this.mvxSubmit.on('click', this.showWaitMessage.bind(this));
    this.taxStatusDropdown.on('change', this.resetTaxStatus.bind(this));
    this.taxClassDropdown.on('change', this.resetTaxClass.bind(this));
    this.titleInput.on('click', this.setTaxInfo.bind(this));
    this.couponTitle.on('change', this.styleDashboardCouponOptions.bind(this));
    this.weightField.on('change', this.addShippingByWeight.bind(this));
    this.reviewButton.on('click', this.reviewBookInfo.bind(this));
    this.uploadImgButton.on('click', () => {
      this.reviewButton.removeClass('hidden');
      this.mvxSubmit.addClass('hidden');
    });
  }
  deleteProductFile() {
    this.reviewButton.removeClass('hidden');
    this.mvxSubmit.addClass('hidden');
  }
  reviewBookInfo(e) {
    if (jquery__WEBPACK_IMPORTED_MODULE_0___default()('div.downloadable_files i.ico_delete_icon').length > -1) {
      let deleteProductButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()('div.downloadable_files a.delete');
      deleteProductButton.on('click', this.deleteProductFile.bind(this));
    }
    if (this.titleInput.val() == '') {
      alert('Give your product a title');
    } else {
      if (this.regularPrice.val() == '') {
        alert('Give your product a price. If you want to make it free, please set the price to 0.');
      } else {
        let imgSrc = jquery__WEBPACK_IMPORTED_MODULE_0___default()('a.upload_image_button img').attr('src');
        if (imgSrc.indexOf('/woocommerce-placeholder') !== -1) {
          alert('Upload an image for your product.');
        } else {
          if (this.audiobookCatCheckbox.is(":checked") == false && this.ebookCatCheckbox.is(":checked") == false && this.digitalZineCheckbox.is(":checked") == false && this.paperbackCatCheckbox.is(":checked") == false && this.hardcoverCatCheckbox.is(":checked") == false && this.physicalZineCheckbox.is(":checked") == false && this.serviceCatCheckbox.is(":checked") == false) {
            alert('Select your product category.');
          } else {
            if (this.audiobookCatCheckbox.is(":checked")) {
              if (jquery__WEBPACK_IMPORTED_MODULE_0___default()('td.file_url_choose').length < 1) {
                alert('Click the Add File button and add your audiobook file.');
              } else if (jquery__WEBPACK_IMPORTED_MODULE_0___default()('td.file_url > input').val() == '') {
                alert('Add your audiobook file.');
              } else {
                this.mvxSubmit.removeClass('hidden');
                jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).addClass('hidden');
              }
            } else if (this.ebookCatCheckbox.is(":checked")) {
              if (jquery__WEBPACK_IMPORTED_MODULE_0___default()('td.file_url_choose').length < 1) {
                alert('Click the Add File button and add your ebook file.');
              } else if (jquery__WEBPACK_IMPORTED_MODULE_0___default()('td.file_url > input').val() == '') {
                alert('Add your ebook file.');
              } else {
                this.mvxSubmit.removeClass('hidden');
                jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).addClass('hidden');
              }
            } else if (this.digitalZineCheckbox.is(":checked")) {
              if (jquery__WEBPACK_IMPORTED_MODULE_0___default()('td.file_url_choose').length < 1) {
                alert('Click the Add File button and add your digital zine file.');
              } else if (jquery__WEBPACK_IMPORTED_MODULE_0___default()('td.file_url > input').val() == '') {
                alert('Add your digital zine file.');
              } else {
                this.mvxSubmit.removeClass('hidden');
                jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).addClass('hidden');
              }
            } else if (this.paperbackCatCheckbox.is(":checked")) {
              if (this.stockInput.val() == '' || Number(this.stockInput.val()) == 0 || isNaN(this.stockInput.val())) {
                alert('Enter the number of paperback books you have ready to ship in the Stock field on the Inventory tab. Enter the paperback weight in the Shipping tab.');
              } else if (this.weightField.val() == '') {
                alert("Enter your book's weight.");
              } else {
                this.mvxSubmit.removeClass('hidden');
                jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).addClass('hidden');
              }
            } else if (this.hardcoverCatCheckbox.is(":checked")) {
              if (this.stockInput.val() == '' || Number(this.stockInput.val()) == 0 || isNaN(this.stockInput.val())) {
                alert('Enter the number of hardcover books you have ready to ship in the Stock field on the Inventory tab. Enter the hardcover weight in the Shipping tab.');
              } else if (this.weightField.val() == '') {
                alert("Enter your book's weight.");
              } else {
                this.mvxSubmit.removeClass('hidden');
                jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).addClass('hidden');
              }
            } else if (this.physicalZineCheckbox.is(":checked")) {
              if (this.stockInput.val() == '' || Number(this.stockInput.val()) == 0 || isNaN(this.stockInput.val())) {
                alert('Enter the number of zines you have ready to ship in the Stock field on the Inventory tab.');
                this.stockInput.val(0);
              } else if (this.weightField.val() == '') {
                alert("Enter your zine's weight.");
              } else {
                this.mvxSubmit.removeClass('hidden');
                jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).addClass('hidden');
              }
            } else if (this.serviceCatCheckbox.is(":checked")) {
              let productDescription = tinymce.activeEditor.getContent();
              if (productDescription == '') {
                alert('Give your service a description.');
              } else {
                this.mvxSubmit.removeClass('hidden');
                jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).addClass('hidden');
              }
            } else {
              alert('Select a valid product category.');
            }
          }
        }
      }
    }
  }
  addShippingByWeight(e) {
    let weight = parseFloat(jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).val());
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('#shipping_product_data i.ico-delete-icon').trigger('click');
    this.perProductInsert.trigger('click');
    let perProductCost = jquery__WEBPACK_IMPORTED_MODULE_0___default()('td.item_cost input:visible');
    if (weight <= 1) {
      perProductCost.val(4.47);
      perProductCost.attr("placeholder", "4.47");
    } else if (weight <= 2) {
      perProductCost.val("5.22");
      perProductCost.attr("placeholder", "5.22");
    } else if (weight <= 3) {
      perProductCost.val("5.97");
      perProductCost.attr("placeholder", "5.97");
    } else if (weight <= 4) {
      perProductCost.val("6.72");
      perProductCost.attr("placeholder", "6.72");
    } else if (weight <= 5) {
      perProductCost.val("7.47");
      perProductCost.attr("placeholder", "7.47");
    } else if (weight <= 6) {
      perProductCost.val("8.22");
      perProductCost.attr("placeholder", "8.22");
    } else if (weight <= 7) {
      perProductCost.val("8.97");
      perProductCost.attr("placeholder", "8.97");
    } else if (weight <= 8) {
      perProductCost.val("9.72");
      perProductCost.attr("placeholder", "9.72");
    } else if (weight <= 9) {
      perProductCost.val("10.47");
      perProductCost.attr("placeholder", "10.47");
    } else if (weight <= 10) {
      perProductCost.val("11.22");
      perProductCost.attr("placeholder", "11.22");
    } else if (weight <= 11) {
      perProductCost.val("11.97");
      perProductCost.attr("placeholder", "11.97");
    } else if (weight <= 12) {
      perProductCost.val("12.72");
      perProductCost.attr("placeholder", "12.72");
    } else if (weight <= 13) {
      perProductCost.val("13.47");
      perProductCost.attr("placeholder", "13.47");
    } else if (weight <= 14) {
      perProductCost.val("14.22");
      perProductCost.attr("placeholder", "14.22");
    } else if (weight <= 15) {
      perProductCost.val("14.97");
      perProductCost.attr("placeholder", "14.97");
    } else {
      alert('More than 15 lbs? Visit https://www.usps.com/ship/mail-shipping-services.htm#mediamail for rate info.');
    }
    this.mvxSubmit.addClass('hidden');
    this.reviewButton.removeClass('hidden');
  }
  styleDashboardCouponOptions() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('option[value="fixed_product"]').prop('selected', 'selected');
  }
  setTaxInfo() {
    if (this.downloadableCheckbox.is(":checked")) {
      this.taxClassDropdown.val('digital-books-10302000');
    } else if (this.virtualCheckbox.is(":checked")) {
      this.taxClassDropdown.val('services-20030000');
    } else {
      this.taxClassDropdown.val('physical-books-35010000');
    }
    this.taxStatusDropdown.val('taxable');
    this.mvxSubmit.addClass('hidden');
    this.reviewButton.removeClass('hidden');
  }
  resetTaxClass() {
    if (this.downloadableCheckbox.is(":checked")) {
      if (this.audiobookCatCheckbox.is(":checked")) {
        this.taxClassDropdown.val('audiobooks-10301000');
      } else {
        this.taxClassDropdown.val('digital-books-10302000');
      }
    } else if (this.virtualCheckbox.is(":checked")) {
      this.taxClassDropdown.val('services-20030000');
    } else {
      this.taxClassDropdown.val('physical-books-35010000');
    }
    alert('Tax class is determined by product type.');
  }
  resetTaxStatus() {
    this.taxStatusDropdown.val('taxable');
    alert('Tax status must be set to Taxable.');
  }
  showWaitMessage() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-mvx--add-product-wait-message').css('display', 'block');
  }
  updateCheckboxesService() {
    if (this.serviceCatCheckbox.is(":checked")) {
      this.virtualCheckbox.prop('checked', true);
      this.downloadableCheckbox.prop('checked', false);
      this.paperbackCatCheckbox.prop('checked', false);
      this.hardcoverCatCheckbox.prop('checked', false);
      this.uncategorizedCatCheckbox.prop('checked', false);
      this.ebookCatCheckbox.prop('checked', false);
      this.audiobookCatCheckbox.prop('checked', false);
      // if (this.productDescription.text() == ''){
      //     alert('Give your service a description.');
      // }
      this.taxClassDropdown.val('services-20030000');
      this.taxStatusDropdown.val('taxable');
      this.digitalZineCheckbox.prop('checked', false);
      this.physicalZineCheckbox.prop('checked', false);
      this.downloadableDiv.removeClass('block');
      this.downloadableDiv.attr('style', 'display: none');
      this.mvxSubmit.addClass('hidden');
      this.reviewButton.removeClass('hidden');
    } else {
      this.virtualCheckbox.prop('checked', false);
      this.mvxSubmit.addClass('hidden');
      this.reviewButton.removeClass('hidden');
    }
  }
  updateCheckboxesHardcover() {
    if (this.hardcoverCatCheckbox.is(":checked")) {
      this.virtualCheckbox.prop('checked', false);
      this.downloadableCheckbox.prop('checked', false);
      this.paperbackCatCheckbox.prop('checked', false);
      this.uncategorizedCatCheckbox.prop('checked', false);
      this.ebookCatCheckbox.prop('checked', false);
      this.audiobookCatCheckbox.prop('checked', false);
      this.manageStockCheckbox.prop('checked', true);
      this.stockFieldGroup.css('display', 'block');
      if (this.stockInput.val() == '' || Number(this.stockInput.val()) == 0 || isNaN(this.stockInput.val())) {
        // alert('Enter the number of hardcover books you have ready to ship in the Stock field on the Inventory tab. Enter the hardcover weight in the Shipping tab.');
        this.stockInput.val(0);
      }
      this.taxClassDropdown.val('physical-books-35010000');
      this.taxStatusDropdown.val('taxable');
      this.digitalZineCheckbox.prop('checked', false);
      this.physicalZineCheckbox.prop('checked', false);
      this.serviceCatCheckbox.prop('checked', false);
      this.downloadableDiv.removeClass('block');
      this.downloadableDiv.attr('style', 'display: none');
      this.mvxSubmit.addClass('hidden');
      this.reviewButton.removeClass('hidden');
    } else {
      this.manageStockCheckbox.prop('checked', false);
      this.stockFieldGroup.css('display', 'none');
      this.mvxSubmit.addClass('hidden');
      this.reviewButton.removeClass('hidden');
    }
  }
  updateCheckboxesPaperback() {
    if (this.paperbackCatCheckbox.is(":checked")) {
      this.virtualCheckbox.prop('checked', false);
      this.downloadableCheckbox.prop('checked', false);
      this.hardcoverCatCheckbox.prop('checked', false);
      this.uncategorizedCatCheckbox.prop('checked', false);
      this.ebookCatCheckbox.prop('checked', false);
      this.audiobookCatCheckbox.prop('checked', false);
      this.manageStockCheckbox.prop('checked', true);
      this.stockFieldGroup.css('display', 'block');
      if (this.stockInput.val() == '' || Number(this.stockInput.val()) == 0 || isNaN(this.stockInput.val())) {
        // alert('Enter the number of paperback books you have ready to ship in the Stock field on the Inventory tab. Enter the paperback weight in the Shipping tab.');
        this.stockInput.val(0);
      }
      this.taxClassDropdown.val('physical-books-35010000');
      this.taxStatusDropdown.val('taxable');
      this.digitalZineCheckbox.prop('checked', false);
      this.physicalZineCheckbox.prop('checked', false);
      this.serviceCatCheckbox.prop('checked', false);
      this.downloadableDiv.removeClass('block');
      this.downloadableDiv.attr('style', 'display: none');
      this.mvxSubmit.addClass('hidden');
      this.reviewButton.removeClass('hidden');
    } else {
      this.manageStockCheckbox.prop('checked', false);
      this.stockFieldGroup.css('display', 'none');
      this.mvxSubmit.addClass('hidden');
      this.reviewButton.removeClass('hidden');
    }
  }
  updateCheckboxesEbook() {
    if (this.ebookCatCheckbox.is(":checked")) {
      this.virtualCheckbox.prop('checked', false);
      this.downloadableCheckbox.prop('checked', true);
      this.virtualCheckbox.prop('checked', true);
      this.paperbackCatCheckbox.prop('checked', false);
      this.hardcoverCatCheckbox.prop('checked', false);
      this.uncategorizedCatCheckbox.prop('checked', false);
      this.serviceCatCheckbox.prop('checked', false);
      this.audiobookCatCheckbox.prop('checked', false);
      this.taxClassDropdown.val('digital-books-10302000');
      this.taxStatusDropdown.val('taxable');
      this.digitalZineCheckbox.prop('checked', false);
      this.physicalZineCheckbox.prop('checked', false);
      this.downloadableDiv.addClass('block');
      this.downloadableDiv.attr('style', 'display: block');
      this.mvxSubmit.addClass('hidden');
      this.reviewButton.removeClass('hidden');
      // if ($('td.file_url_choose').length < 1){
      //     alert('Click the Add File button and add your ebook file.');
      // } else if ($('td.file_url > input').val() == '') {
      //     alert('Add your ebook file.');
      // }
    } else {
      this.downloadableCheckbox.prop('checked', false);
      this.mvxSubmit.addClass('hidden');
      this.reviewButton.removeClass('hidden');
    }
  }
  updateCheckboxesDigitalZine() {
    if (this.digitalZineCheckbox.is(":checked")) {
      this.virtualCheckbox.prop('checked', false);
      this.downloadableCheckbox.prop('checked', true);
      this.virtualCheckbox.prop('checked', true);
      this.paperbackCatCheckbox.prop('checked', false);
      this.hardcoverCatCheckbox.prop('checked', false);
      this.uncategorizedCatCheckbox.prop('checked', false);
      this.serviceCatCheckbox.prop('checked', false);
      this.audiobookCatCheckbox.prop('checked', false);
      this.taxClassDropdown.val('digital-books-10302000');
      this.taxStatusDropdown.val('taxable');
      this.physicalZineCheckbox.prop('checked', false);
      this.ebookCatCheckbox.prop('checked', false);
      this.downloadableDiv.addClass('block');
      this.downloadableDiv.attr('style', 'display: block');
      this.mvxSubmit.addClass('hidden');
      this.reviewButton.removeClass('hidden');
      // if ($('td.file_url_choose').length < 1){
      //     alert('Click the Add File button and add your digital zine file.');
      // } else if ($('td.file_url > input').val() == '') {
      //     alert('Add your digital zine file.');
      // }
    } else {
      this.downloadableCheckbox.prop('checked', false);
      this.mvxSubmit.addClass('hidden');
      this.reviewButton.removeClass('hidden');
    }
  }
  updateCheckboxesPhysicalZine() {
    if (this.physicalZineCheckbox.is(":checked")) {
      this.virtualCheckbox.prop('checked', false);
      this.downloadableCheckbox.prop('checked', false);
      this.hardcoverCatCheckbox.prop('checked', false);
      this.uncategorizedCatCheckbox.prop('checked', false);
      this.ebookCatCheckbox.prop('checked', false);
      this.serviceCatCheckbox.prop('checked', false);
      this.audiobookCatCheckbox.prop('checked', false);
      this.manageStockCheckbox.prop('checked', true);
      this.stockFieldGroup.css('display', 'block');
      if (this.stockInput.val() == '' || Number(this.stockInput.val()) == 0 || isNaN(this.stockInput.val())) {
        // alert('Enter the number of zines you have ready to ship in the Stock field on the Inventory tab.');
        this.stockInput.val(0);
      }
      this.taxClassDropdown.val('physical-books-35010000');
      this.taxStatusDropdown.val('taxable');
      this.paperbackCatCheckbox.prop('checked', false);
      this.digitalZineCheckbox.prop('checked', false);
      this.downloadableDiv.removeClass('block');
      this.downloadableDiv.attr('style', 'display: none');
      this.mvxSubmit.addClass('hidden');
      this.reviewButton.removeClass('hidden');
    } else {
      this.manageStockCheckbox.prop('checked', false);
      this.stockFieldGroup.css('display', 'none');
      this.mvxSubmit.addClass('hidden');
      this.reviewButton.removeClass('hidden');
    }
  }
  updateCheckboxesAudiobook() {
    if (this.audiobookCatCheckbox.is(":checked")) {
      this.virtualCheckbox.prop('checked', false);
      this.downloadableCheckbox.prop('checked', true);
      this.virtualCheckbox.prop('checked', true);
      this.paperbackCatCheckbox.prop('checked', false);
      this.hardcoverCatCheckbox.prop('checked', false);
      this.uncategorizedCatCheckbox.prop('checked', false);
      this.serviceCatCheckbox.prop('checked', false);
      this.ebookCatCheckbox.prop('checked', false);
      this.taxClassDropdown.val('audiobooks-10301000');
      this.taxStatusDropdown.val('taxable');
      this.digitalZineCheckbox.prop('checked', false);
      this.physicalZineCheckbox.prop('checked', false);
      this.downloadableDiv.addClass('block');
      this.downloadableDiv.attr('style', 'display: block');
      this.mvxSubmit.addClass('hidden');
      this.reviewButton.removeClass('hidden');
      // if ($('td.file_url_choose').length < 1){
      //     alert('Click the Add File button and add your audiobook file.');
      // } else if ($('td.file_url > input').val() == '') {
      //     alert('Add your audiobook file.');
      // }
    } else {
      this.downloadableCheckbox.prop('checked', false);
      this.mvxSubmit.addClass('hidden');
      this.reviewButton.removeClass('hidden');
    }
  }
  updateCheckboxesDownloadable() {
    if (this.downloadableCheckbox.is(":checked")) {
      this.taxStatusDropdown.val('taxable');
      this.downloadableDiv.addClass('block');
      this.downloadableDiv.attr('style', 'display: block');
    } else {
      this.ebookCatCheckbox.prop('checked', false);
      this.audiobookCatCheckbox.prop('checked', false);
      this.digitalZineCheckbox.prop('checked', false);
      this.taxStatusDropdown.val('taxable');
    }
  }
  checkPrices() {
    if (this.regularPrice.val() === '') {
      alert('Be sure to enter a price.');
    } else if (isNaN(this.regularPrice.val())) {
      alert("Your product's price must be a number.");
      this.regularPrice.val('');
    } else if (Number(this.regularPrice.val()) > 50 && !this.virtualCheckbox.is(":checked")) {
      alert('You set the price at $' + this.regularPrice.val() + ". Make sure that's the right amount before proceeding.");
    }
  }
  checkSalesPrices() {
    if (this.regularPrice.val() === '' || this.salePrice.val() === '') {
      alert('To schedule a sale, enter a value for the regular price and sale price.');
    }
    if (Number(this.salePrice.val()) >= Number(this.regularPrice.val())) {
      alert('Make sure your sale price is less than the regular price.');
    }
  }
  checkIsbn() {
    let isbnEntered = this.gtinInput.val();
    if (isbnEntered != '') {
      jquery__WEBPACK_IMPORTED_MODULE_0___default().ajax({
        beforeSend: xhr => {
          xhr.setRequestHeader('X-WP-Nonce', marketplaceData.nonce);
        },
        url: tomcBookorgData.root_url + '/wp-json/mvxtend/v1/checkIfISBNAssigned',
        type: 'GET',
        data: {
          'ISBNEntered': Number(isbnEntered)
        },
        success: response => {
          if (response > 0) {
            if (jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-vendxtend--dupliacteISBNError').length < 1) {
              let alertMessage = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').attr('id', 'tomc-vendxtend--dupliacteISBNError');
              this.productTitleSection.append(alertMessage);
            }
            jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-vendxtend--dupliacteISBNError').html('Our records show that the ISBN you entered, ' + response + ', is already registered to an existing product.');
            this.gtinInput.val('');
          } else {
            if (jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-vendxtend--dupliacteISBNError').length < 1) {
              let alertMessage = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').attr('id', 'tomc-vendxtend--dupliacteISBNError');
              this.productTitleSection.append(alertMessage);
            }
            jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-vendxtend--dupliacteISBNError').html('');
          }
        },
        failure: response => {
          // console.log(response);
        }
      });
    }
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (AddProductExtension);

/***/ }),

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

/***/ "./src/modules/CheckoutDisplay.js":
/*!****************************************!*\
  !*** ./src/modules/CheckoutDisplay.js ***!
  \****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class CheckoutDisplay {
  constructor() {
    this.zipCode = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#billing_postcode');
    this.billingCounty = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#billing_county');
    this.countyField = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#billing_county_field');
    this.events();
  }
  events() {
    this.zipCode.on('change', this.populate.bind(this));
  }
  populate() {
    if (this.zipCode.val().trim() == '43068') {
      this.billingCounty.html('');
      let option = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<option/>').val('franklin_ohio').html('Franklin');
      this.billingCounty.append(option);
      option = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<option/>').val('fairfield_ohio').html('Fairfield');
      this.billingCounty.append(option);
      option = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<option/>').val('licking_ohio').html('Licking');
      this.billingCounty.append(option);
      this.countyField.removeClass('hidden');
    } else if (this.zipCode.val().trim() == '43064') {
      this.billingCounty.html('');
      let option = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<option/>').val('madison_ohio').html('Madison');
      this.billingCounty.append(option);
      option = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<option/>').val('delaware_ohio').html('Delaware');
      this.billingCounty.append(option);
      option = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<option/>').val('franklin_ohio').html('Franklin');
      this.billingCounty.append(option);
      option = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<option/>').val('union_ohio').html('Union');
      this.billingCounty.append(option);
      this.countyField.removeClass('hidden');
    } else {
      this.billingCounty.html('');
      let option = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<option/>').val('default').html('N/A');
      this.billingCounty.append(option);
      this.countyField.addClass('hidden');
    }
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (CheckoutDisplay);

/***/ }),

/***/ "./src/modules/FAQDisplay.js":
/*!***********************************!*\
  !*** ./src/modules/FAQDisplay.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
class FAQDisplay {
  constructor() {
    this.questions = document.querySelectorAll('.tomc-faq-section h2');
    this.events();
  }
  events() {
    this.questions.forEach(question => {
      question.addEventListener('click', e => {
        question.closest('.tomc-faq-section').querySelector('.tomc-faq-a').classList.toggle('hidden');
      });
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (FAQDisplay);

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
    this.leaves = document.querySelectorAll('.expandable-leaf');
    this.introOverlay = document.getElementById('intro-overlay');
    this.closeValuesOverlayButtons = document.querySelectorAll('#values-overlay__close');
    this.closeValuesOverlayButton = document.getElementById('values-overlay__close');
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
    this.closeValuesOverlayButtons.forEach(button => {
      button.addEventListener('click', () => {
        this.introOverlay.classList.remove('flex');
        this.introOverlay.classList.add('hidden');
      });
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (FrontDisplay);

/***/ }),

/***/ "./src/modules/InstructionsDisplay.js":
/*!********************************************!*\
  !*** ./src/modules/InstructionsDisplay.js ***!
  \********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class Instructions {
  constructor() {
    this.sellBooksSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#sellBooksSpan');
    this.sellServicesSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#sellServicesSpan');
    this.sellBooksSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#sellBooksSection');
    this.sellServicesSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#sellServicesSection');
    this.ebookProductsSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#ebookProductsSpan');
    this.ebookProductsSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#ebookProductsSection');
    this.audiobookProductsSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#audiobookProductsSpan');
    this.audiobookProductsSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#audiobookProductsSection');
    this.physicalBookProductSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#physicalBookProductSpan');
    this.physicalBookProductSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#physicalBookProductSection');
    this.events();
    this.ebookSectionShowing = false;
    this.audiobookSectionShowing = false;
    this.physicalBookSectionShowing = false;
  }
  events() {
    this.sellBooksSpan.on('click', this.toggleSellBooks.bind(this));
    this.sellServicesSpan.on('click', this.toggleSellServices.bind(this));
    this.ebookProductsSpan.on('click', this.toggleEbookProducts.bind(this));
    this.audiobookProductsSpan.on('click', this.toggleAudiobookProducts.bind(this));
    this.physicalBookProductSpan.on('click', this.togglePhysicalBookProducts.bind(this));
  }
  toggleSellBooks() {
    this.sellBooksSection.toggleClass('hidden');
    this.sellBooksSpan.toggleClass('purple-span');
    this.sellBooksSpan.toggleClass('hollow-purple-span');
  }
  toggleSellServices() {
    this.sellServicesSection.toggleClass('hidden');
    this.sellServicesSpan.toggleClass('blue-span');
    this.sellServicesSpan.toggleClass('hollow-blue-span');
  }
  toggleEbookProducts() {
    this.ebookProductsSection.toggleClass('hidden');
    this.ebookProductsSpan.toggleClass('orange-button');
    this.ebookProductsSpan.toggleClass('hollow-orange-button');
  }
  toggleAudiobookProducts() {
    this.audiobookProductsSection.toggleClass('hidden');
    this.audiobookProductsSpan.toggleClass('blue-button');
    this.audiobookProductsSpan.toggleClass('hollow-blue-button');
  }
  togglePhysicalBookProducts() {
    this.physicalBookProductSection.toggleClass('hidden');
    this.physicalBookProductSpan.toggleClass('purple-button');
    this.physicalBookProductSpan.toggleClass('hollow-purple-button');
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Instructions);

/***/ }),

/***/ "./src/modules/LoginPage.js":
/*!**********************************!*\
  !*** ./src/modules/LoginPage.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class LoginPage {
  constructor() {
    this.showLogin = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-show-login');
    this.showRegister = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-show-registration');
    this.loginSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-login-section');
    this.registrationSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-register-section');
    this.events();
  }
  events() {
    this.showLogin.on('click', () => {
      this.loginSection.removeClass('hidden');
      this.registrationSection.addClass('hidden');
    });
    this.showRegister.on('click', () => {
      this.registrationSection.removeClass('hidden');
      this.loginSection.addClass('hidden');
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (LoginPage);

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

/***/ "./src/modules/NameYourPriceExtension.js":
/*!***********************************************!*\
  !*** ./src/modules/NameYourPriceExtension.js ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class NYPExtension {
  constructor() {
    this.enableOverlay = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-mvx-nyp-enable--overlay');
    this.enableOverlayCloseButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-mvx-nyp-enable--overlay svg.search-overlay__close');
    this.enableOverlayLink = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-name-price-open-overlay');
    this.manageOverlayLink = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-name-price-manage-overlay');
    this.enableOverlayCancel = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-mvx-nyp-cancel-button');
    this.minPriceInput = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-mvx-nyp-min-price');
    this.maxPriceInput = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-mvx-nyp-max-price');
    this.enableButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-mvx-nyp-enable-button');
    this.lowMinWarning = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-mvx-nyp-enable--low-min-warning');
    this.negativeMinError = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-mvx-nyp-enable--negative-min-error');
    this.lowerMaxError = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-mvx-nyp-enable--lower-max-error');
    this.zeroMaxError = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-mvx-nyp-enable--zero-max-error');
    this.disableOverlay = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-mvx-nyp-disable--overlay');
    this.disableOverlayCloseButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-mvx-nyp-disable--overlay svg.search-overlay__close');
    this.disableOverlayCancel = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-mvx-nyp-disable-cancel-button');
    this.disableOverlayLink = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-name-price-disable-overlay-link');
    this.disableButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-mvx-nyp-disable-button');
    this.events();
  }
  events() {
    this.enableOverlayCloseButton.on('click', this.closeEnableOverlay.bind(this));
    this.enableOverlayCancel.on('click', this.closeEnableOverlay.bind(this));
    this.enableOverlayLink.on('click', this.openEnableOverlay.bind(this));
    this.manageOverlayLink.on('click', this.openEnableOverlay.bind(this));
    this.enableButton.on('click', this.enableSettings.bind(this));
    this.minPriceInput.on('change', this.validateMinMax.bind(this));
    this.maxPriceInput.on('change', this.validateMinMax.bind(this));
    this.disableOverlayCloseButton.on('click', this.closeDisableOverlay.bind(this));
    this.disableOverlayCancel.on('click', this.closeDisableOverlay.bind(this));
    this.disableOverlayLink.on('click', this.openDisableOverlay.bind(this));
    this.disableButton.on('click', this.disableSettings.bind(this));
  }
  closeEnableOverlay() {
    this.enableOverlay.addClass('hidden');
  }
  closeDisableOverlay() {
    this.disableOverlay.addClass('hidden');
  }
  openDisableOverlay(e) {
    this.disableButton.attr('data-id', jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).data('id'));
    this.disableOverlay.removeClass('hidden');
  }
  openEnableOverlay(e) {
    this.minPriceInput.val(jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).data('min'));
    this.maxPriceInput.val(jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).data('max'));
    this.enableButton.attr('data-id', jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).data('id'));
    this.enableButton.attr('data-category', jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).data('category'));
    this.enableButton.removeClass('hidden');
    this.lowMinWarning.addClass('hidden');
    this.negativeMinError.addClass('hidden');
    this.lowerMaxError.addClass('hidden');
    this.zeroMaxError.addClass('hidden');
    if (jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).data('category') == 84 || jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).data('category') == 85 || this.enableButton.data('category') == 86) {
      if (parseInt(this.minPriceInput.val(), 10) < 10) {
        this.lowMinWarning.removeClass('hidden');
      }
    }
    this.enableOverlay.removeClass('hidden');
  }
  disableSettings(e) {
    jquery__WEBPACK_IMPORTED_MODULE_0___default().ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader('X-WP-Nonce', marketplaceData.nonce);
      },
      url: tomcBookorgData.root_url + '/wp-json/mvxtendNYP/v1/disableMVXNYP',
      type: 'POST',
      data: {
        'id': jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).data('id')
      },
      success: response => {
        location.reload(true);
      },
      failure: response => {
        //console.log(response);
      }
    });
  }
  enableSettings(e) {
    console.log('trying to open');
    jquery__WEBPACK_IMPORTED_MODULE_0___default().ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader('X-WP-Nonce', marketplaceData.nonce);
      },
      url: tomcBookorgData.root_url + '/wp-json/mvxtendNYP/v1/enableMVXNYP',
      type: 'POST',
      data: {
        'id': jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).data('id'),
        'min': this.minPriceInput.val(),
        'max': this.maxPriceInput.val()
      },
      success: response => {
        location.reload(true);
      },
      failure: response => {
        //console.log(response);
      }
    });
  }
  validateMinMax() {
    let allowEnable = true;
    if (parseInt(this.minPriceInput.val()) !== parseInt(this.minPriceInput.val())) {
      this.minPriceInput.val('');
    } else if (this.minPriceInput.val() != '') {
      this.minPriceInput.val(parseInt(this.minPriceInput.val()));
    }
    if (parseInt(this.maxPriceInput.val()) !== parseInt(this.maxPriceInput.val())) {
      this.maxPriceInput.val('');
    } else if (this.maxPriceInput.val() != '') {
      this.maxPriceInput.val(parseInt(this.maxPriceInput.val()));
    }
    if (this.maxPriceInput.val() < 0) {
      this.maxPriceInput.val(0);
    }
    if (parseInt(this.minPriceInput.val(), 10) < 0) {
      this.negativeMinError.removeClass('hidden');
      allowEnable = false;
    } else {
      this.negativeMinError.addClass('hidden');
    }
    if (parseInt(this.maxPriceInput.val(), 10) <= parseInt(this.minPriceInput.val(), 10)) {
      this.lowerMaxError.removeClass('hidden');
      allowEnable = false;
    } else {
      this.lowerMaxError.addClass('hidden');
    }
    if (parseInt(this.maxPriceInput.val(), 10) < 1) {
      this.zeroMaxError.removeClass('hidden');
      allowEnable = false;
    } else {
      this.zeroMaxError.addClass('hidden');
    }
    if (this.enableButton.data('category') == 84 || this.enableButton.data('category') == 85 || this.enableButton.data('category') == 86) {
      //paperbacks, hardcovers, physical zines
      if (parseInt(this.minPriceInput.val(), 10) < 10 || this.minPriceInput.val() == '') {
        this.lowMinWarning.removeClass('hidden');
      } else {
        this.lowMinWarning.addClass('hidden');
      }
    }
    if (allowEnable) {
      this.enableButton.removeClass('hidden');
    } else {
      this.enableButton.addClass('hidden');
    }
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (NYPExtension);

/***/ }),

/***/ "./src/modules/ProductDisplay.js":
/*!***************************************!*\
  !*** ./src/modules/ProductDisplay.js ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class ProductDisplay {
  constructor() {
    this.warningMessage = jquery__WEBPACK_IMPORTED_MODULE_0___default()('.tomc-product-view-warnings');
    this.warningList = jquery__WEBPACK_IMPORTED_MODULE_0___default()('.tomc-product-content-warnings');
    this.events();
  }
  events() {
    this.warningMessage.on('click', this.toggleWarningList.bind(this));
  }
  toggleWarningList() {
    if (this.warningList.hasClass('hidden')) {
      this.warningList.removeClass('hidden');
      this.warningMessage.text('hide trigger warnings');
    } else {
      this.warningList.addClass('hidden');
      this.warningMessage.text('show trigger warnings');
    }
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ProductDisplay);

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
  openSettingsOverlay(e) {
    if (!this.isOverlayOpen) {
      this.isOverlayOpen = true;
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).addClass('spinningIcon');
      jquery__WEBPACK_IMPORTED_MODULE_0___default().ajax({
        beforeSend: xhr => {
          xhr.setRequestHeader('X-WP-Nonce', marketplaceData.nonce);
        },
        url: tomcBookorgData.root_url + '/wp-json/tomcReaderSettings/v1/getReaderSettings',
        type: 'GET',
        success: response => {
          jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).removeClass('spinningIcon');
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
          // console.log(response);
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
        // console.log(response);
        jquery__WEBPACK_IMPORTED_MODULE_0___default()("#tomc-reader-settings-language-settings-saved-message").fadeIn().delay(3000).fadeOut();
      },
      error: response => {
        // console.log(response);
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
        // console.log(response);
      }
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Settings);

/***/ }),

/***/ "./src/modules/Roadmap.js":
/*!********************************!*\
  !*** ./src/modules/Roadmap.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class Roadmap {
  constructor() {
    this.sellBooksSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#sellBooksSpan");
    this.sellProductsSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#sellProductsSection");
    this.sellServicesSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#sellServicesSpan");
    this.sellServicesSection = "#sellServicesSection";
    this.sellEbooksSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#sellEbooksSpan");
    this.sellEbooksSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#sellEbooksSection");
    this.sellAudiobooksSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#sellAudiobooksSpan");
    this.sellAudiobooksSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#sellAudiobooksSection");
    this.sellPhysicalBooksSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#sellPhysicalBooksSpan");
    this.sellPhysicalBooksSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#sellPhysicalBooksSection");
    this.sellDigitalZinesSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#sellDigitalZinesSpan");
    this.sellDigitalZinesSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#sellDigitalZinesSection");
    this.sellPhysicalZinesSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#sellPhysicalZinesSpan");
    this.sellPhysicalZinesSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#sellPhysicalZinesSection");
    this.events();
  }
  events() {
    this.sellBooksSpan.on('click', () => {
      this.sellBooksSpan.toggleClass('roadmap--purple-span');
      this.sellBooksSpan.toggleClass('roadmap--hollow-purple-span');
      this.sellProductsSection.toggleClass('hidden');
    });
    this.sellServicesSpan.on('click', () => {
      this.sellServicesSpan.toggleClass('roadmap--blue-span');
      this.sellServicesSpan.toggleClass('roadmap--hollow-blue-span');
      this.sellServicesSection.toggleClass('hidden');
    });
    this.sellEbooksSpan.on('click', () => {
      this.sellEbooksSpan.toggleClass('roadmap--blue-span');
      this.sellEbooksSpan.toggleClass('roadmap--hollow-blue-span');
      this.sellEbooksSection.toggleClass('hidden');
    });
    this.sellAudiobooksSpan.on('click', () => {
      this.sellAudiobooksSpan.toggleClass('roadmap--purple-span');
      this.sellAudiobooksSpan.toggleClass('roadmap--hollow-purple-span');
      this.sellAudiobooksSection.toggleClass('hidden');
    });
    this.sellPhysicalBooksSpan.on('click', () => {
      this.sellPhysicalBooksSpan.toggleClass('roadmap--orange-span');
      this.sellPhysicalBooksSpan.toggleClass('roadmap--hollow-orange-span');
      this.sellPhysicalBooksSection.toggleClass('hidden');
    });
    this.sellDigitalZinesSpan.on('click', () => {
      this.sellDigitalZinesSpan.toggleClass('roadmap--blue-span');
      this.sellDigitalZinesSpan.toggleClass('roadmap--hollow-blue-span');
      this.sellDigitalZinesSection.toggleClass('hidden');
    });
    this.sellPhysicalZinesSpan.on('click', () => {
      this.sellPhysicalZinesSpan.toggleClass('roadmap--purple-span');
      this.sellPhysicalZinesSpan.toggleClass('roadmap--hollow-purple-span');
      this.sellPhysicalZinesSection.toggleClass('hidden');
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Roadmap);

/***/ }),

/***/ "./src/modules/SiteSearch.js":
/*!***********************************!*\
  !*** ./src/modules/SiteSearch.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class Search {
  constructor() {
    this.resultsDiv = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#search-overlay__results");
    this.openButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".js-search-trigger");
    this.closeButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".search-overlay__close");
    this.searchOverlay = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".search-overlay");
    this.searchField = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#search-term");
    this.rollResults = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#tomc-search--roll-results");
    this.triggersSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#search-overlay__warnings-section");
    this.languagesSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#search-overlay__languages-section");
    this.triggersContainer = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#search-overlay--triggers-container");
    this.languagesContainer = jquery__WEBPACK_IMPORTED_MODULE_0___default()("#search-overlay--languages-container");
    this.filtersSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#search-overlay__filters-section');
    this.triggersFilterOption = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#search-overlay__filter-out-warnings');
    this.languagesFilterOption = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#search-overlay__filter-languages');
    this.upArrow = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#search-overlay__toggle-filters-section__up');
    this.downArrow = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#search-overlay__toggle-filters-section__down');
    this.events();
    this.isOverlayOpen = false;
    this.chosenWarnings = [];
    this.chosenLanguages = [];
    this.filterTriggers = false;
    this.filterLanguages = false;
  }
  events() {
    this.openButton.on("click", this.openSearchOverlay.bind(this));
    this.closeButton.on("click", this.closeOverlay.bind(this));
    jquery__WEBPACK_IMPORTED_MODULE_0___default()(document).on("keydown", this.keyPressDispatcher.bind(this));
    this.rollResults.on('click', this.getResults.bind(this));
    this.triggersFilterOption.on('click', this.toggleTriggersOption.bind(this));
    this.languagesFilterOption.on('click', this.toggleLanguagesOption.bind(this));
    this.upArrow.on('click', this.toggleFiltersSection.bind(this));
    this.downArrow.on('click', this.toggleFiltersSection.bind(this));
  }
  toggleFiltersSection() {
    this.upArrow.toggleClass('hidden');
    this.downArrow.toggleClass('hidden');
    this.filtersSection.toggleClass('hidden');
  }
  toggleTriggersOption(e) {
    if (this.filterTriggers == false) {
      console.log('filter by triggers was false, now true');
      this.filterTriggers = true;
      this.triggersFilterOption.text("don't filter out triggering books");
      this.filtersSection.removeClass('hidden');
      this.triggersSection.removeClass('hidden');
      this.upArrow.removeClass('hidden');
    } else {
      this.filterTriggers = false;
      console.log('filter by triggers was true, now false');
      this.triggersFilterOption.text('filter out triggering books');
      this.triggersSection.addClass('hidden');
      jquery__WEBPACK_IMPORTED_MODULE_0___default()('.tomc-book-organization--option-span--trigger').removeClass('tomc-book-organization--option-selected');
      if (this.filterLanguages == false) {
        this.upArrow.addClass('hidden');
        this.downArrow.addClass('hidden');
        this.filtersSection.addClass('hidden');
      }
    }
  }
  toggleLanguagesOption(e) {
    if (this.filterLanguages == false) {
      this.filterLanguages = true;
      this.languagesFilterOption.text("don't filter books by language");
      this.filtersSection.removeClass('hidden');
      this.languagesSection.removeClass('hidden');
      this.upArrow.removeClass('hidden');
    } else {
      this.filterLanguages = false;
      this.languagesFilterOption.text('filter books by language');
      this.languagesSection.addClass('hidden');
      jquery__WEBPACK_IMPORTED_MODULE_0___default()('.tomc-book-organization--option-span--language').removeClass('tomc-book-organization--option-selected');
      if (this.filterTriggers == false) {
        this.upArrow.addClass('hidden');
        this.downArrow.addClass('hidden');
        this.filtersSection.addClass('hidden');
      }
    }
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
    if (this.chosenLanguages.length > 0) {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()("#tomc-search--no-languages-selected").addClass('hidden');
    } else {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()("#tomc-search--no-languages-selected").removeClass('hidden');
    }
  }
  openSearchOverlay(e) {
    if (!this.isOverlayOpen) {
      this.isOverlayOpen = true;
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).addClass('spinningIcon');
      jquery__WEBPACK_IMPORTED_MODULE_0___default().ajax({
        beforeSend: xhr => {
          xhr.setRequestHeader('X-WP-Nonce', marketplaceData.nonce);
        },
        url: tomcBookorgData.root_url + '/wp-json/tomcReaderSettings/v1/getReaderSettings',
        type: 'GET',
        success: response => {
          jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).removeClass('spinningIcon');
          for (let i = 0; i < response.length; i++) {
            if (response[i]['settingtype'] == 'trigger') {
              if (response[i]['triggerid']) {
                this.newSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<span />').addClass('tomc-book-organization--option-span--trigger tomc-book-organization--option-span tomc-book-organization--option-selected').attr('data-warning-id', response[i]['id']).attr('aria-label', response[i]['warning_name'] + ' is selected').html(response[i]['warning_name']).on('click', this.toggleWarningSelection.bind(this));
                this.chosenWarnings.push(Number(response[i]['id']));
              } else {
                this.newSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<span />').addClass('tomc-book-organization--option-span--trigger tomc-book-organization--option-span').attr('data-warning-id', response[i]['id']).attr('aria-label', response[i]['warning_name'] + ' is not selected').html(response[i]['warning_name']).on('click', this.toggleWarningSelection.bind(this));
              }
              this.triggersContainer.append(this.newSpan);
            } else if (response[i]['settingtype'] == 'language') {
              if (response[i]['languageid']) {
                this.newSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<span />').addClass('tomc-book-organization--option-span--language tomc-book-organization--option-span tomc-book-organization--option-selected').attr('data-language-id', response[i]['id']).attr('aria-label', response[i]['language_name'] + ' is selected').attr('id', 'search-overlay-language-option-' + response[i]['language_name']).html(response[i]['language_name']).on('click', this.toggleLanguageSelection.bind(this));
                this.chosenLanguages.push(Number(response[i]['id']));
              } else {
                this.newSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<span />').addClass('tomc-book-organization--option-span--language tomc-book-organization--option-span').attr('data-language-id', response[i]['id']).attr('aria-label', response[i]['language_name'] + ' is not selected').attr('id', 'search-overlay-language-option-' + response[i]['language_name']).html(response[i]['language_name']).on('click', this.toggleLanguageSelection.bind(this));
              }
              this.languagesContainer.append(this.newSpan);
            }
          }
          if (this.chosenLanguages < 1) {
            jquery__WEBPACK_IMPORTED_MODULE_0___default()('#search-overlay-language-option-English').addClass('tomc-book-organization--option-span--language tomc-book-organization--option-span tomc-book-organization--option-selected').attr('aria-label', 'English is selected');
            this.chosenLanguages.push(jquery__WEBPACK_IMPORTED_MODULE_0___default()('#search-overlay-language-option-English').data('language-id'));
          }
          this.searchOverlay.addClass("search-overlay--active");
          jquery__WEBPACK_IMPORTED_MODULE_0___default()("body").addClass("body-no-scroll");
          this.searchField.val('');
          setTimeout(() => this.searchField.focus(), 301);
        },
        error: response => {
          // console.log('error getting triggers');
        }
      });
      // return false;
    }
  }
  closeOverlay() {
    this.triggersContainer.html('');
    this.languagesContainer.html('');
    this.resultsDiv.html('');
    jquery__WEBPACK_IMPORTED_MODULE_0___default()("body").removeClass("body-no-scroll");
    this.isOverlayOpen = false;
    this.chosenLanguages = [];
    this.chosenWarnings = [];
    this.searchOverlay.removeClass("search-overlay--active");
  }
  getResults(e) {
    let routeEnding;
    let routeData;
    if (this.chosenLanguages.length > 0 || this.filterLanguages == false) {
      routeEnding = 'search';
      routeData = {
        'searchterm': this.searchField.val().substring(0, 300),
        'triggers': JSON.stringify(this.chosenWarnings),
        'hasTriggers': this.chosenWarnings > 0 ? 'yes' : 'no',
        'languages': JSON.stringify(this.chosenLanguages)
      };
    } else {
      routeEnding = 'searchWithoutLanguages';
      routeData = {
        'searchterm': this.searchField.val().substring(0, 300),
        'triggers': JSON.stringify(this.chosenWarnings),
        'hasTriggers': this.chosenWarnings > 0 ? 'yes' : 'no'
      };
    }
    if (this.searchField.val().length > 2) {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).addClass('contracting');
      jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-search--no-search-term').addClass('hidden');
      jquery__WEBPACK_IMPORTED_MODULE_0___default().ajax({
        beforeSend: xhr => {
          xhr.setRequestHeader('X-WP-Nonce', marketplaceData.nonce);
        },
        url: tomcBookorgData.root_url + '/wp-json/ebookMarketplace/v1/' + routeEnding,
        type: 'GET',
        data: routeData,
        success: response => {
          jquery__WEBPACK_IMPORTED_MODULE_0___default()(e.target).removeClass('contracting');
          let alreadyAddedBookIds = [];
          let alreadyAddedProductIds = [];
          let alreadyAddedAuthors = [];
          if (response.length < 1) {
            this.resultsDiv.html("<p class='centered-text'>Sorry! We couldn't find any matching results.</p>");
          } else {
            this.resultsDiv.html("");
            for (let i = 0; i < response.length; i++) {
              if (response[i]['resulttype'] === 'author') {
                if (jquery__WEBPACK_IMPORTED_MODULE_0___default().inArray(response[i]['id'], alreadyAddedAuthors) == -1) {
                  let newDiv = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<div />').addClass('tomc-search-result--author').attr('id', 'tomc-browse-genres--results--book-' + response[i]['id']);
                  let newTitle = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<h1 />').addClass('centered-text small-heading');
                  let newSpan = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<span />').html('Author ');
                  newTitle.append(newSpan);
                  let newLink = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<a />').attr('href', response[i]['author_url']).html(response[i]['pen_name']);
                  newTitle.append(newLink);
                  newDiv.append(newTitle);
                  this.resultsDiv.append(newDiv);
                  alreadyAddedAuthors.push(response[i]['id']);
                  newDiv.fadeIn();
                }
              } else if (jquery__WEBPACK_IMPORTED_MODULE_0___default().inArray(response[i]['id'], alreadyAddedBookIds) > -1) {
                if (jquery__WEBPACK_IMPORTED_MODULE_0___default().inArray(response[i]['productid'], alreadyAddedProductIds) == -1) {
                  let newLink = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<a />').addClass('centered-text').attr('href', response[i]['product_url']);
                  let newFormat = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').html(response[i]['type_name'].slice(0, -1));
                  newLink.append(newFormat);
                  jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-browse-genres--results--book-' + response[i]['id']).children('.tomc-browse--search-result-bottom-section').append(newLink);
                  alreadyAddedProductIds.push(response[i]['productid']);
                  newLink.fadeIn();
                }
              } else if (response[i]['resulttype'] === 'book') {
                let newDiv = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<div />').addClass('tomc-search-result').attr('id', 'tomc-browse-genres--results--book-' + response[i]['id']);
                let newTitle = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<h1 />').addClass('centered-text, small-heading').html(response[i]['title']);
                newDiv.append(newTitle);
                let newAuthor = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').html(response[i]['pen_name'].length > 0 ? 'by ' + response[i]['pen_name'] : 'by unknown or anonymous author');
                newDiv.append(newAuthor);
                let newBottomSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<div />').addClass('tomc-browse--search-result-bottom-section');
                let newCoverDescription = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<div />').addClass('tomc-search-result-cover-description');
                let newImage = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<img />').attr('src', response[i]['product_image_id']).attr('alt', 'the cover for ' + response[i]['title']);
                newCoverDescription.append(newImage);
                let newDescription = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').addClass('bottomSection-description').html(response[i]['book_description'].substring(0, 500) + '...');
                newCoverDescription.append(newDescription);
                newBottomSection.append(newCoverDescription);
                newBottomSection.append('<h4 class="centered-text">available in</h4>');
                let newLink = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<a />').addClass('centered-text').attr('href', response[i]['product_url']);
                let newFormat = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').html(response[i]['type_name'].slice(0, -1));
                newLink.append(newFormat);
                newBottomSection.append(newLink);
                newDiv.append(newBottomSection);
                this.resultsDiv.append(newDiv);
                newDiv.fadeIn();
                alreadyAddedBookIds.push(response[i]['id']);
                alreadyAddedProductIds.push(response[i]['productid']);
              } else if (response[i]['resulttype'] === 'genrebooks') {
                let newDiv = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<div />').addClass('tomc-search-result').attr('id', 'tomc-browse-genres--results--book-' + response[i]['id']);
                let newEm = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<em />').html('new in ' + this.searchField.val());
                newDiv.append(newEm);
                let newTitle = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<h1 />').addClass('centered-text, small-heading').html(response[i]['title']);
                newDiv.append(newTitle);
                let newAuthor = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').html(response[i]['pen_name'].length > 0 ? 'by ' + response[i]['pen_name'] : 'by unknown or anonymous author');
                newDiv.append(newAuthor);
                let newBottomSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<div />').addClass('tomc-browse--search-result-bottom-section');
                let newCoverDescription = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<div />').addClass('tomc-search-result-cover-description');
                let newImage = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<img />').attr('src', response[i]['product_image_id']).attr('alt', 'the cover for ' + response[i]['title']);
                newCoverDescription.append(newImage);
                let newDescription = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').addClass('bottomSection-description').html(response[i]['book_description'].substring(0, 500) + '...');
                newCoverDescription.append(newDescription);
                newBottomSection.append(newCoverDescription);
                newBottomSection.append('<h4 class="centered-text">available in</h4>');
                let newLink = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<a />').addClass('centered-text').attr('href', response[i]['product_url']);
                let newFormat = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').html(response[i]['type_name'].slice(0, -1));
                newLink.append(newFormat);
                newBottomSection.append(newLink);
                newDiv.append(newBottomSection);
                this.resultsDiv.append(newDiv);
                newDiv.fadeIn();
                alreadyAddedBookIds.push(response[i]['id']);
                alreadyAddedProductIds.push(response[i]['productid']);
              } else if (response[i]['resulttype'] === 'identitybooks') {
                let newDiv = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<div />').addClass('tomc-search-result').attr('id', 'tomc-browse-genres--results--book-' + response[i]['id']);
                let newEm = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<em />').html('new with main characters who are ' + response[i]['identity_name']);
                newDiv.append(newEm);
                let newTitle = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<h1 />').addClass('centered-text, small-heading').html(response[i]['title']);
                newDiv.append(newTitle);
                let newAuthor = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').html(response[i]['pen_name'].length > 0 ? 'by ' + response[i]['pen_name'] : 'by unknown or anonymous author');
                newDiv.append(newAuthor);
                let newBottomSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<div />').addClass('tomc-browse--search-result-bottom-section');
                let newCoverDescription = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<div />').addClass('tomc-search-result-cover-description');
                let newImage = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<img />').attr('src', response[i]['product_image_id']).attr('alt', 'the cover for ' + response[i]['title']);
                newCoverDescription.append(newImage);
                let newDescription = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').addClass('bottomSection-description').html(response[i]['book_description'].substring(0, 500) + '...');
                newCoverDescription.append(newDescription);
                newBottomSection.append(newCoverDescription);
                newBottomSection.append('<h4 class="centered-text">available in</h4>');
                let newLink = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<a />').addClass('centered-text').attr('href', response[i]['product_url']);
                let newFormat = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').html(response[i]['type_name'].slice(0, -1));
                newLink.append(newFormat);
                newBottomSection.append(newLink);
                newDiv.append(newBottomSection);
                this.resultsDiv.append(newDiv);
                newDiv.fadeIn();
                alreadyAddedBookIds.push(response[i]['id']);
                alreadyAddedProductIds.push(response[i]['productid']);
              } else if (response[i]['resulttype'] === 'readalikebooks') {
                let newDiv = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<div />').addClass('tomc-search-result').attr('id', 'tomc-browse-genres--results--book-' + response[i]['id']);
                let newEm = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<em />').html('If you loved ' + response[i]['readalike_title'] + ' by ' + (response[i]['readalike_author'] != null ? response[i]['readalike_author'] : 'unknown or anonymous') + ', you might love this book, too.');
                newDiv.append(newEm);
                let newTitle = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<h1 />').addClass('centered-text, small-heading').html(response[i]['title']);
                newDiv.append(newTitle);
                let newAuthor = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').html(response[i]['pen_name'].length > 0 ? 'by ' + response[i]['pen_name'] : 'by unknown or anonymous author');
                newDiv.append(newAuthor);
                let newBottomSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<div />').addClass('tomc-browse--search-result-bottom-section');
                let newCoverDescription = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<div />').addClass('tomc-search-result-cover-description');
                let newImage = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<img />').attr('src', response[i]['product_image_id']).attr('alt', 'the cover for ' + response[i]['title']);
                newCoverDescription.append(newImage);
                let newDescription = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').addClass('bottomSection-description').html(response[i]['book_description'].substring(0, 500) + '...');
                newCoverDescription.append(newDescription);
                newBottomSection.append(newCoverDescription);
                newBottomSection.append('<h4 class="centered-text">available in</h4>');
                let newLink = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<a />').addClass('centered-text').attr('href', response[i]['product_url']);
                let newFormat = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').html(response[i]['type_name'].slice(0, -1));
                newLink.append(newFormat);
                newBottomSection.append(newLink);
                newDiv.append(newBottomSection);
                this.resultsDiv.append(newDiv);
                newDiv.fadeIn();
                alreadyAddedBookIds.push(response[i]['id']);
                alreadyAddedProductIds.push(response[i]['productid']);
              } else if (response[i]['resulttype'] === 'genreIdentity') {
                let newDiv = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<div />').addClass('tomc-search-result').attr('id', 'tomc-browse-genres--results--book-' + response[i]['id']);
                let newEm = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<em />').html('new in ' + response[i]['genre_name'] + ' about ' + response[i]['identity_name']);
                newDiv.append(newEm);
                let newTitle = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<h1 />').addClass('centered-text, small-heading').html(response[i]['title']);
                newDiv.append(newTitle);
                let newAuthor = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').html(response[i]['pen_name'].length > 0 ? 'by ' + response[i]['pen_name'] : 'by unknown or anonymous author');
                newDiv.append(newAuthor);
                let newBottomSection = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<div />').addClass('tomc-browse--search-result-bottom-section');
                let newCoverDescription = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<div />').addClass('tomc-search-result-cover-description');
                let newImage = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<img />').attr('src', response[i]['product_image_id']).attr('alt', 'the cover for ' + response[i]['title']);
                newCoverDescription.append(newImage);
                let newDescription = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').addClass('bottomSection-description').html(response[i]['book_description'].substring(0, 500) + '...');
                newCoverDescription.append(newDescription);
                newBottomSection.append(newCoverDescription);
                newBottomSection.append('<h4 class="centered-text">available in</h4>');
                let newLink = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<a />').addClass('centered-text').attr('href', response[i]['product_url']);
                let newFormat = jquery__WEBPACK_IMPORTED_MODULE_0___default()('<p />').html(response[i]['type_name'].slice(0, -1));
                newLink.append(newFormat);
                newBottomSection.append(newLink);
                newDiv.append(newBottomSection);
                this.resultsDiv.append(newDiv);
                newDiv.fadeIn();
                alreadyAddedBookIds.push(response[i]['id']);
                alreadyAddedProductIds.push(response[i]['productid']);
              }
            }
          }
        },
        error: response => {
          // console.log('fail');
        }
      });
    } else {
      jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-search--no-search-term').removeClass('hidden');
    }
  }
  keyPressDispatcher(e) {
    if (e.keyCode == 83 && !this.isOverlayOpen && !jquery__WEBPACK_IMPORTED_MODULE_0___default()("input, textarea").is(':focus')) {
      this.openOverlay();
    }
    if (e.keyCode == 27 && this.isOverlayOpen) {
      this.closeOverlay();
    }
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (Search);

/***/ }),

/***/ "./src/modules/ValuesDisplay.js":
/*!**************************************!*\
  !*** ./src/modules/ValuesDisplay.js ***!
  \**************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class ValuesDisplay {
  constructor() {
    this.valuesOverlay = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#tomc-values-overlay');
    this.closeButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()(".values-overlay__close");
    this.events();
  }
  events() {
    this.closeButton.on("click", this.closeOverlay.bind(this));
  }
  closeOverlay() {
    this.valuesOverlay.addClass('hidden');
    this.valuesOverlay.removeClass('tomc-values-overlay');
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (ValuesDisplay);

/***/ }),

/***/ "./src/modules/VendorInfo.js":
/*!***********************************!*\
  !*** ./src/modules/VendorInfo.js ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "jquery");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);

class VendorInfo {
  constructor() {
    this.sellAsVendorButton = jquery__WEBPACK_IMPORTED_MODULE_0___default()('#sell-as-vendor-button');
    this.events();
  }
  events() {
    this.sellAsVendorButton.on('click', this.getVendorRoleAssignment.bind(this));
  }
  getVendorRoleAssignment() {
    jquery__WEBPACK_IMPORTED_MODULE_0___default().ajax({
      beforeSend: xhr => {
        xhr.setRequestHeader('X-WP-Nonce', marketplaceData.nonce);
      },
      url: tomcBookorgData.root_url + '/wp-json/tomcVendor/v1/assignVendorRole',
      type: 'POST',
      success: response => {
        // console.log(response);
        location.reload(true);
      },
      error: response => {
        // console.log(response);
      }
    });
  }
}
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (VendorInfo);

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
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _modules_SiteSearch__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./modules/SiteSearch */ "./src/modules/SiteSearch.js");
/* harmony import */ var _modules_MobileMenu__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/MobileMenu */ "./src/modules/MobileMenu.js");
/* harmony import */ var _modules_CategoryDisplay__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/CategoryDisplay */ "./src/modules/CategoryDisplay.js");
/* harmony import */ var _modules_FrontDisplay__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./modules/FrontDisplay */ "./src/modules/FrontDisplay.js");
/* harmony import */ var _modules_ReaderSettings__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./modules/ReaderSettings */ "./src/modules/ReaderSettings.js");
/* harmony import */ var _modules_LoginPage__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./modules/LoginPage */ "./src/modules/LoginPage.js");
/* harmony import */ var _modules_InstructionsDisplay__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./modules/InstructionsDisplay */ "./src/modules/InstructionsDisplay.js");
/* harmony import */ var _modules_ProductDisplay__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./modules/ProductDisplay */ "./src/modules/ProductDisplay.js");
/* harmony import */ var _modules_VendorInfo__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./modules/VendorInfo */ "./src/modules/VendorInfo.js");
/* harmony import */ var _modules_Roadmap__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./modules/Roadmap */ "./src/modules/Roadmap.js");
/* harmony import */ var _modules_FAQDisplay__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./modules/FAQDisplay */ "./src/modules/FAQDisplay.js");
/* harmony import */ var _modules_CheckoutDisplay__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./modules/CheckoutDisplay */ "./src/modules/CheckoutDisplay.js");
/* harmony import */ var _modules_ValuesDisplay__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! ./modules/ValuesDisplay */ "./src/modules/ValuesDisplay.js");
/* harmony import */ var _modules_NameYourPriceExtension__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! ./modules/NameYourPriceExtension */ "./src/modules/NameYourPriceExtension.js");
/* harmony import */ var _modules_AddProductExtension__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! ./modules/AddProductExtension */ "./src/modules/AddProductExtension.js");















const mobileMenu = new _modules_MobileMenu__WEBPACK_IMPORTED_MODULE_1__["default"]();
const marketplaceSearch = new _modules_SiteSearch__WEBPACK_IMPORTED_MODULE_0__["default"]();
const categoryDisplay = new _modules_CategoryDisplay__WEBPACK_IMPORTED_MODULE_2__["default"]();
const frontDisplay = new _modules_FrontDisplay__WEBPACK_IMPORTED_MODULE_3__["default"]();
const readerSettings = new _modules_ReaderSettings__WEBPACK_IMPORTED_MODULE_4__["default"]();
const loginPage = new _modules_LoginPage__WEBPACK_IMPORTED_MODULE_5__["default"]();
const instructions = new _modules_InstructionsDisplay__WEBPACK_IMPORTED_MODULE_6__["default"]();
const productDisplay = new _modules_ProductDisplay__WEBPACK_IMPORTED_MODULE_7__["default"]();
const vendorInfo = new _modules_VendorInfo__WEBPACK_IMPORTED_MODULE_8__["default"]();
const roadmap = new _modules_Roadmap__WEBPACK_IMPORTED_MODULE_9__["default"]();
const faqDisplay = new _modules_FAQDisplay__WEBPACK_IMPORTED_MODULE_10__["default"]();
const checkoutDisplay = new _modules_CheckoutDisplay__WEBPACK_IMPORTED_MODULE_11__["default"]();
const valuesDisplay = new _modules_ValuesDisplay__WEBPACK_IMPORTED_MODULE_12__["default"]();
const nypExtension = new _modules_NameYourPriceExtension__WEBPACK_IMPORTED_MODULE_13__["default"]();
const addProductExtension = new _modules_AddProductExtension__WEBPACK_IMPORTED_MODULE_14__["default"]();
})();

/******/ })()
;
//# sourceMappingURL=index.js.map