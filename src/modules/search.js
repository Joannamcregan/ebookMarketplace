import $ from 'jquery';

class Search {
// 1. describe and create/initiate object
    constructor() {
        this.addSearchHTML();
        this.resultsDiv = $("#search-overlay__results");
        this.openButton = $(".js-search-trigger");
        this.closeButton = $(".search-overlay__close");
        this.searchOverlay = $(".search-overlay");
        this.searchField = $("#search-term");
        this.rollResults = $("#tomc-search--roll-results");
        this.events();
        this.isOverlayOpen = false;
        this.chosenWarnings = [];
        this.chosenLanguages = [];
    }
// 2. events
    events(){
        this.openButton.on("click", this.openSearchOverlay.bind(this));
        this.closeButton.on("click", this.closeOverlay.bind(this));
        $(document).on("keydown", this.keyPressDispatcher.bind(this));
        this.rollResults.on('click', this.getResults.bind(this));
    }

// 3. methods (functions, actions...)
    toggleWarningSelection(e){
        let labelName = $(e.target).text();
        if ($(e.target).hasClass('tomc-book-organization--option-selected')){
            $(e.target).removeClass('tomc-book-organization--option-selected');
            $(e.target).attr('aria-label', labelName + ' is not selected');
            for (let i = 0; i < this.chosenWarnings.length; i++){
                if (this.chosenWarnings[i] == $(e.target).data('warning-id')){
                    this.chosenWarnings.splice(i, 1);
                }
            }
        } else {
            this.chosenWarnings.push($(e.target).data('warning-id'));
            $(e.target).addClass('tomc-book-organization--option-selected');
            $(e.target).attr('aria-label', labelName + ' is selected');
        }
    }
    toggleLanguageSelection(e){        
        let labelName = $(e.target).text();
        if ($(e.target).hasClass('tomc-book-organization--option-selected')){
            $(e.target).removeClass('tomc-book-organization--option-selected');
            $(e.target).attr('aria-label', labelName + ' is not selected');
            for (let i = 0; i < this.chosenLanguages.length; i++){
                if (this.chosenLanguages[i] == $(e.target).data('language-id')){
                    this.chosenLanguages.splice(i, 1);
                }
            }
        } else {
            this.chosenLanguages.push($(e.target).data('language-id'));
            $(e.target).addClass('tomc-book-organization--option-selected');  
            $(e.target).attr('aria-label', labelName + ' is selected');
        }
        if (this.chosenLanguages.length > 0){
            $("#tomc-search--no-languages-selected").addClass('hidden');
        } else {
            $("#tomc-search--no-languages-selected").removeClass('hidden');
        }        
    }
    // openOverlay(){
    //     console.log('called it')
    //     this.searchOverlay.addClass("search-overlay--active");
    //     $("body").addClass("body-no-scroll");
    //     this.searchField.val('');
    //     setTimeout(() => this.searchField.focus(), 301);
    //     this.isOverlayOpen = true;
    //     return false;
    // }
    openSearchOverlay(){
        if (! this.isOverlayOpen){            
            this.isOverlayOpen = true;
            $.ajax({
                beforeSend: (xhr) => {
                    xhr.setRequestHeader('X-WP-Nonce', marketplaceData.nonce);
                },
                url: tomcBookorgData.root_url + '/wp-json/tomcReaderSettings/v1/getReaderSettings',
                type: 'GET',
                success: (response) => {
                    for(let i = 0; i < response.length; i++){
                        if (response[i]['settingtype']=='trigger'){
                            if (response[i]['triggerid']){
                                this.newSpan = $('<span />').addClass('tomc-book-organization--option-span tomc-book-organization--option-selected').attr('data-warning-id', response[i]['id']).attr('aria-label', response[i]['warning_name'] + ' is selected').html(response[i]['warning_name']).on('click', this.toggleWarningSelection.bind(this));
                                this.chosenWarnings.push(Number(response[i]['id']));
                            } else {
                                this.newSpan = $('<span />').addClass('tomc-book-organization--option-span').attr('data-warning-id', response[i]['id']).attr('aria-label', response[i]['warning_name'] + ' is not selected').html(response[i]['warning_name']).on('click', this.toggleWarningSelection.bind(this));
                            }
                            $("#search-overlay--triggers-container").append(this.newSpan);
                        } else if (response[i]['settingtype']=='language'){
                            if (response[i]['languageid']){
                                this.newSpan = $('<span />').addClass('tomc-book-organization--option-span tomc-book-organization--option-selected').attr('data-language-id', response[i]['id']).attr('aria-label', response[i]['language_name'] + ' is selected').attr('id', 'search-overlay-language-option-' + response[i]['language_name']).html(response[i]['language_name']).on('click', this.toggleLanguageSelection.bind(this));
                                this.chosenLanguages.push(Number(response[i]['id']));
                            } else {
                                this.newSpan = $('<span />').addClass('tomc-book-organization--option-span').attr('data-language-id', response[i]['id']).attr('aria-label', response[i]['language_name'] + ' is not selected').html(response[i]['language_name']).on('click', this.toggleLanguageSelection.bind(this));
                            }
                            $("#search-overlay--languages-container").append(this.newSpan);
                        }
                    }
                    if (this.chosenLanguages < 1){
                        $('#tomc-search-overlay-language-option-english').addClass('tomc-book-organization--option-span tomc-book-organization--option-selected').attr('aria-label', response[i]['language_name'] + ' is selected')
                    }
                    this.searchOverlay.addClass("search-overlay--active");
                    $("body").addClass("body-no-scroll");
                    this.searchField.val('');
                    setTimeout(() => this.searchField.focus(), 301);
                },
                error: (response) => {
                    console.log('error getting triggers');
                    console.log(response);
                }
            })
            return false;
        } 
    }
    closeOverlay(){
        this.searchOverlay.removeClass("search-overlay--active");
        $('#search-overlay--languages-container').html('');
        $('#search-overlay--triggers-container').html('');
        $("body").removeClass("body-no-scroll");
        this.isOverlayOpen = false;
    }
    getResults() {
        if (this.chosenLanguages.length > 0){
            console.log('passed first');
            if (this.searchField.val()){
                console.log('passed second');
                $('#tomc-search--no-search-term').addClass('hidden');
                $.ajax({
                    beforeSend: (xhr) => {
                        xhr.setRequestHeader('X-WP-Nonce', marketplaceData.nonce);
                    },
                    url: tomcBookorgData.root_url + '/wp-json/ebookMarketplace/v1/search',
                    type: 'GET',
                    data: {
                        'searchterm' : this.searchField.val().substring(0, 300),
                        'triggers' : JSON.stringify(this.chosenWarnings),
                        'languages' : JSON.stringify(this.chosenLanguages)
                    },
                    success: (response) => {
                        console.log('success');
                        console.log(response);
                    },
                    error: (response) => {
                        console.log('fail');
                        console.log(response);
                    }
                });
            } else {
                $('#tomc-search--no-search-term').removeClass('hidden');
            }            
        }
        
        // $.getJSON(marketplaceData.root_url + "/wp-json/ebookMarketplace/v1/search?term=" + this.searchField.val(), (results) => {
        //     this.resultsDiv.html(`
        //     <div class="search-result">
        //     ${results.length ? '' : "<p>Sorry! We weren't able to find anything that matches that search.</p>"}
        //         ${results.map(item => `
        //             <li>
        //             ${item.posttype == "author-profile" ? "See books by author " : ''}
        //             ${item.posttype == "curations" ? "Check out the curated bookshelf " : ""} 
        //                 <a href="${item.permalink}">
        //                     ${item.thumbnail ? `<img src="${item.thumbnail}" />` : ''} 
        //                     ${item.title}
        //                 </a>
        //                 ${item.posttype == "product" && item.title != "Gift Card" ? `<br> by ${item.productauthor}` : ""} 
        //                 ${item.posttype == "short" ? `<br> by ${item.shortauthor}` : ""}
        //                 ${item.excerpt ? '<br><br>' + item.excerpt : ''}
        //             </li>`).join("")}
        //     ${results.length ? "</li></div>" : '</div>'}
        //     `);
        //     this.isSpinnerVisible = false;
        // });
    }
    keyPressDispatcher(e) {
        if(e.keyCode == 83 && !this.isOverlayOpen && !$("input, textarea").is(':focus')) {
            this.openOverlay()
        }
        if(e.keyCode == 27 && this.isOverlayOpen) {
            this.closeOverlay()
        }
    }
    addSearchHTML() {
        $('body').append(`
            <main>
                <div class="search-overlay">
                    <div class="search-overlay__top">
                        <div class="overlay-main-container"> 
                        <i class="fa fa-window-close search-overlay__close" aria-hidden = "true"></i>
                        <div class="overlay-input-container">
                            <i class="fa fa-search search-overlay__icon" aria-hidden = "true"></i>
                            <input type="text" class="search-term" placeholder = "Search for books by title, author, genre, or character identity" id = "search-term">
                        </div>
                        </div>
                    </div>

                    <div class="container">
                        <div id="search-overlay__results">
                            <h1 class="centered-text">Content Warnings</h1>
                            <p class="centered-text">Select any triggers you want to avoid. We'll exclude books that have been tagged with corresponding content warnings from your search results.</p>
                            <div id="search-overlay--triggers-container" class="tomc-book-organization--options-container"></div>
                            <h1 class="centered-text">Languages</h1>
                            <p class="centered-text">Select any languages you read</p>
                            <div id="search-overlay--languages-container" class="tomc-book-organization--options-container"></div>
                            <div class="centered-text hidden tomc-book-organization--red-text" id="tomc-search--no-languages-selected">
                                <p>Choose as least one language to ensure your book shows up in search results.</p>
                            </div>
                            <div class="centered-text hidden tomc-book-organization--red-text" id="tomc-search--no-search-term">
                                <p>Enter a search term.</p>
                            </div>
                            <button class="purple-button" id="tomc-search--roll-results">let's roll!</button>
                        </div>
                    </div>
                </div>
            </main>
        `);
    }
}

export default Search;