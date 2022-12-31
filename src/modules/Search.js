import $ from 'jquery';

class Search {
// 1. describe and create/initiate object
    constructor() {
        this.resultsDiv = $("#search-overlay__results");
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.events();
        this.isOverlayOpen = false;
        this.searchField = $("search-term");
    }
// 2. events
    events(){
        this.openButton.on("click", this.openOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));
        $(document).on("keydown", this.keyPressDispatcher.bind(this));
        this.searchField.on("keydown", this.typingLogic)
    }

// 3. methods (functions, actions...)
    openOverlay(){
      console.log("overlay opened.");
        this.searchOverlay.addClass("search-overlay--active");
        $("body").addClass("body-no-scroll");
        this.isOverlayOpen = true;
    }
    closeOverlay(){
      console.log("overlay closed.");
        this.searchOverlay.removeClass("search-overlay--active");
        $("body").removeClass("body-no-scroll");
        this.isOverlayOpen = false;
    }
    keyPressDispatcher(e) {
        if(e.keyCode == 83 && !this.isOverlayOpen) {
            this.openOverlay()
        }
        if(e.keyCode == 27 && this.isOverlayOpen) {
            this.closeOverlay()
        }
    }
    typingLogic() {
        clearTimeout(this.typingTimer);
        alert("hello from typing logic");
    }
}

export default Search;