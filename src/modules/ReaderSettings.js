import $ from 'jquery';

class Settings {
// 1. describe and create/initiate object
    constructor() {    
        this.addSettingsHTML();    
        this.settingsOverlay = $(".tomc-settings-overlay");
        this.openButton = $(".js-settings-trigger");
        this.closeButton = $(".search-overlay__close");
        this.events();
        this.isOverlayOpen = false;
    }
// 2. events
    events(){
        this.openButton.on("click", this.openSettingsOverlay.bind(this));
    }

// 3. methods (functions, actions...)
    addSettingsHTML(){
        $('body').append(`
            <div class="tomc-settings-overlay">
                <div class="orange-translucent-background">
                    <div class="overlay-main-container"> 
                        <i class="fa fa-window-close search-overlay__close" aria-hidden = "true" onclick="this.closeOverlay.bind(this)"></i>
                        <br>
                        <h1 class="centered-text">My Settings</h1>
                    </div>
                </div>
                <div class="settings-overlay--section">
                    <h2 class="centered-text">My Triggers</h2>
                    <p class="centered-text">Select triggers you want to avoid and we won't include books that have been tagged with them in your search results.</p>
                    <div id="settings-overlay--triggers-container" class="tomc-book-organization--options-container"></div>
                    <a href="#"><p class="centered-text">suggest a new trigger warning</p></a>
                </div>
                <div class="settings-overlay--section">
                    <h2 class="centered-text">Languages I Read</h2>
                    <p class="centered-text">Select languages you read and we'll include books tagged with them in your search results.</p>
                    <div id="settings-overlay--languages-container" class="tomc-book-organization--options-container"></div>
                </div>
                <button class="purple-button">save settings</button>
            </div>
        `);
    }

    closeOverlay(){
        this.settingsOverlay.removeClass("search-overlay--active");
        $("#settings-overlay--triggers-container").html('');
        $("#settings-overlay--languages-container").html('');
        $("body").removeClass("body-no-scroll");
        this.isOverlayOpen = false;
    }
    toggleWarningSelection(){
    console.log('toggle warning');
    }
    toggleLanguageSelection(){
        console.log('toggle language');
    }
    //potentially add below to the html when suggestions functionality added-----------------------
    // <div class="settings-overlay--section">
    //     <h2 class="centered-text">My Favorite Genres</h2>
    //     <div id="settings-overlay--genres-2-container"></div>
    //     <h2 class="centered-text">My Favorite Topics</h2>
    //     <div id="settings-overlay--genres-3-container"></div>
    // </div>
    openSettingsOverlay(){
        if (! this.isOverlayOpen){            
            this.isOverlayOpen = true;
            $.ajax({
                beforeSend: (xhr) => {
                    xhr.setRequestHeader('X-WP-Nonce', marketplaceData.nonce);
                },
                url: tomcBookorgData.root_url + '/wp-json/tomcReaderSettings/v1/getContentWarnings',
                type: 'GET',
                success: (response) => {
                    for(let i = 0; i < response.length; i++){
                        this.newSpan = $('<span />').addClass('tomc-book-organization--option-span').attr('data-warning-id', response[i]['id']).attr('aria-label', response[i]['warning_name'] + ' is not selected').html(response[i]['warning_name']).on('click', this.toggleWarningSelection.bind(this));
                        $("#settings-overlay--triggers-container").append(this.newSpan);                        
                    }    
                    $.ajax({
                        beforeSend: (xhr) => {
                            xhr.setRequestHeader('X-WP-Nonce', marketplaceData.nonce);
                        },
                        url: tomcBookorgData.root_url + '/wp-json/tomcReaderSettings/v1/getLanguages',
                        type: 'GET',
                        success: (response) => {
                            console.log(response);
                            for(let i = 0; i < response.length; i++){
                                this.newSpan = $('<span />').addClass('tomc-book-organization--option-span').attr('data-language-id', response[i]['id']).attr('aria-label', response[i]['language_name'] + ' is not selected').html(response[i]['language_name']).on('click', this.toggleLanguageSelection.bind(this));
                                $("#settings-overlay--languages-container").append(this.newSpan);                        
                            }
                            this.settingsOverlay.addClass("search-overlay--active");
                            $("body").addClass("body-no-scroll");
                        },
                        error: (response) => {
                            console.log('error getting languages.');
                            console.log(response);
                        }
                    })                
                },
                error: (response) => {
                    console.log('error getting triggers');
                    console.log(response);
                }
            })
        }
    }
}

export default Settings;